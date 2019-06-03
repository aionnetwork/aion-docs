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

In addition to white-listed Java classes, we also have AVM APIs for you to write better Java smart contracts.

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
