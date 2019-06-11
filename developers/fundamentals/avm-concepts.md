---
title: AVM Concepts
description: By knowing and understanding these concepts, you can speed up your Java contract development and improve the efficiency of your code. Take a look at this section to reduce the cost of deploying your contracts, as well as taking advantage of some of the AVM's most powerful features.
---

## ABI Decoder

ABIDecoder is a utility class for decoding transaction data as high-level ABI types

## ABI Encoder

ABIStreamingEncoder is a utility class for AVM ABI encoding. Instances of this class are stateful, allowing several pieces of data to be serialized into the same buffer.

## ABI Types

While AVM applications don't need to use the ABI, it is provided as a convenience for invoking methods within a specific DApp instance in a type-safe way.

## AVM APIs

In addition to white-listed Java classes, we also have [AVM APIs](https://avm-api.aion.network/index.html) for you to write better Java smart contracts.

### [AVM Package](https://avm-api.aion.network/avm/package-summary.html)

There are three classes in the [avm](https://avm-api.aion.network/avm/package-summary.html) package, [Address](https://docs.aion.network/docs/avm-apis#section-address), [Blockchain](https://docs.aion.network/docs/avm-apis#section-blockchain) and [Result](https://docs.aion.network/docs/avm-apis#section-result), which can be used to access blockchain-specific functionality exposed by the AVM.

#### [Address](https://avm-api.aion.network/avm/address)

Represents an **address** of account in the Aion Network.

#### [Blockchain](https://avm-api.aion.network/avm/blockchain)

Every contract has an associated `Blockchain` which allows the application to interface with the environment the contract is running. Typically, it includes the **transaction** and **block context**, and other blockchain functionality. 

#### [Result](https://avm-api.aion.network/avm/result)

Represents a cross-call invocation result.

### [Userlib Package](https://avm-api.aion.network/org/aion/avm/userlib/package-summary.html)

Classes in the [userlib](https://avm-api.aion.network/org/aion/avm/userlib/package-summary.html) package and [userlib.abi](https://avm-api.aion.network/org/aion/avm/userlib/abi/package-summary.html) package are optionally packaged along-side your contract code as common-case utilities and quality of life routines.

#### [AionBuffer](https://avm-api.aion.network/org/aion/avm/userlib/aionbuffer)

A buffer, much like an [NIO ByteBuffer](https://docs.oracle.com/javase/7/docs/api/java/nio/ByteBuffer.html), which allows the easy encoding/decoding of primitive values.
See a detailed contract example [here](https://docs.aion.network/docs/aionbuffer).

#### [AionList](https://avm-api.aion.network/org/aion/avm/userlib/aionlist)

The Aion specific implementation of the Java List interface.
See a detailed contract example [here](https://docs.aion.network/docs/aion-list).

#### [AionMap](https://avm-api.aion.network/org/aion/avm/userlib/aionmap)

The Aion specific implementation of the Java Map interface.
See a detailed contract example [here](https://docs.aion.network/docs/aion-map).

#### [AionSet](https://avm-api.aion.network/org/aion/avm/userlib/aionset)
The Aion specific implementation of the Java Set interface.
See a detailed contract example [here](https://docs.aion.network/docs/aion-set).

### [Userlib ABI pacakge](https://avm-api.aion.network/org/aion/avm/userlib/abi/package-summary.html)

#### [ABIDecoder](https://avm-api.aion.network/org/aion/avm/userlib/abi/abidecoder)

ABIDecoder is a utility class for decoding transaction data as high-level ABI types. This class contains static methods for parsing transaction data. [Read More
](https://docs.aion.network/docs/avm-abidecoder).

#### [ABIEncoder](https://avm-api.aion.network/org/aion/avm/userlib/abi/abiencoder)

ABIEncoder is utility class for AVM ABI encoding. This class provides static helpers for encoding single data elements. It is typically more appropriate to use [ABIStreamingEncoder](https://docs.aion.network/docs/avm-apis#section--abistreamingencoder-https-avm-api-aion-network-org-aion-avm-userlib-abi-abistreamingencoder-).

#### [ABIStreamingEncoder](https://avm-api.aion.network/org/aion/avm/userlib/abi/abistreamingencoder)

ABIStreamingEncoder is a utility class for AVM ABI encoding. Instances of this class are stateful, allowing several pieces of data to be serialized into the same buffer. [Read More](https://docs.aion.network/docs/abistreamingencoder).

#### [ABIToken](https://avm-api.aion.network/org/aion/avm/userlib/abi/abitoken)
Identifiers of the tokens the ABI uses to describe extents of data in a serialized stream.

## Initializable Fields

Fields can be annotated with `@Initializable` to indicate that the field is initialized as deployment arguments at the time of contract deployment.

* An `@Initializable` field must be static.
* The type of an `@Initializable` field must be a supported AVM ABI type. [Read More](#abi-types) 
* Data supplied in the data field MUST be supplied as the **exact same order** as  `@Initializable` field are define. If not, an *ABIException* will be throw.

During deployment, the `static{}` (also called [<clinit>](https://docs.oracle.com/javase/specs/jvms/se7/html/jvms-2.html#jvms-2.9)) will first try to decode the `data` field that is passed in to the contract to set the values of the `@Initializable` fields. 
It decodes the values in the** same order ** as the fields marked `@Initializable` in the contract using an ABIDecoder ([Read More](https://docs.aion.network/docs/avm-abidecoder)).

For example:

```java
@Initializable
private static int myInt;

@Initializable
private static String myString;
```

The `static{}` for this will be like:

```java
static {
  ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
  myInt = decoder.decodeOneInteger();
  myString = decoder.decodeOneString();
}
```

Any instructions in a user-provided `static{}` block will be run after decoding and setting the `@Initializable fields`.

For example:

```java
@Initializable
private static int myInt;

@Initializable
private static String myString;

private static Address owner;

static {
    owner = Blockchain.getCaller();
    increaceMyIntByOne();
}

private static void increaseMyIntByOne() {
    myInt += 1;
}
```

`static{}` will do the following **in order** for deployment initialisation:
* Instantiate an `ABIDecoder` with [Blockchain.getData()](https://avm-api.aion.network/avm/blockchain#getData%28%29) and try to decode an `Integer` and a `string`;
* Set `owner` as  the address that deployed the contract.
* Execute `increaseMyIntByOne()` and increase the value of myInt by one.

## Callablle Functions

In order for a function or method to be called from outside the contract (by a user on the blockchain, or from another contract) it needs to be annotated as `@Callable`.

Mark a function as callable from outside of the contract.

In order for a function or method to be called from **outside** the contract (by a user on the blockchain, or from another contract) it needs to be annotated as `@Callable`.

Keep in mind that a `@Callable` function must be **public** and **static**. The **return type** and **method arguments type** must be a [supported AVM ABI type](#abi-types).

For example:

```java
@Callable
public static String greet(String name) {
    return "Hello " + name;
}
```

If you are calling a function within contract, you do not have to assign the `@Callable` annotation to the function you want to call. The function to be called can be `public`, `private` or `@Callable`.


It is possible to have functions that do not have the `@Callable` annotation, and your contract will be able to compile. However, any attempt to call a `non-Callable` function from outside of the contract will be **reverted**, even if is a public function.

## Fallback Functions

Mark a function as the default function to be called.

## JCL Whitelist

The Java Class List (JCL) whitelist is a list of classes that are available to your Java contracts.
