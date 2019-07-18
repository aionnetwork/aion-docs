---
title: Initializable Fields
description: A static field can be labelled @Initializable if it should be initialized through a deployment argument.
---

> **Important:**

> - An `@Initializable` field must be static.
> - The type of an `@Initializable` field must be a supported [AVM ABI type](/developers/fundamentals/avm-concepts/abi-types/).
> - Data supplied in the data field must be supplied in the exact same order as the  `@Initializable` field are defined. If not, an _ABIException_ will be thrown.

During deployment, the `static{}` (also called [`<clinit>`](https://docs.oracle.com/javase/specs/jvms/se7/html/jvms-2.html#jvms-2.9)) will first try to decode the `data` field that is passed into the contract to set the values of the `@Initializable` fields.

It decodes the values in the **same order** as the fields marked `@Initializable` in the contract using an [ABIDecoder](/developers/fundamentals/packages/abi/#abidecoder-https-avm-api-aion-network-org-aion-avm-userlib-abi-abidecoder).

For example:

```java
@Initializable
private static int myInt;

@Initializable
private static String myString;
```

The `static{}` for this class would look something like:

```java
static {
    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
    myInt = decoder.decodeOneInteger();
    myString = decoder.decodeOneString();
}
```

Any instructions in a user-provided `static{}` block will run after decoding and setting the `@Initializable fields`.

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

The `static{}` function will do the following **in order**:

1. Instantiate an `ABIDecoder` with [Blockchain.getData()](https://avm-api.aion.network/avm/blockchain#getData%28%29) and try to decode an `Integer` and a `string`;
2. Set `owner` as the address that deployed the contract.
3. Execute `increaseMyIntByOne()` and increase the value of myInt by one.
