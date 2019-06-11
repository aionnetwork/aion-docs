---
title: Initializable Fields
---

Fields can be annotated with `@Initializable` to indicate that the field is initialized as deployment arguments at the time of contract deployment.

Initializable fields must follow these rules:
- An `@Initializable` field must be static.
- The type of an `@Initializable` field must be a supported AVM ABI type. [Read More](https://docs.aion.network/docs/abi) 
- Data supplied in the data field MUST be supplied as the **exact same order** as  `@Initializable` field are define. If not, an *ABIException* will be throw.

During deployment, the `static{}` (also called [<clinit>](https://docs.oracle.com/javase/specs/jvms/se7/html/jvms-2.html#jvms-2.9)) will first try to decode the `data` field that is passed in to the contract to set the values of the `@Initializable` fields. 

It decodes the values in the **same order** as the fields marked `@Initializable` in the contract using an ABIDecoder ([Read More](https://docs.aion.network/docs/avm-abidecoder)).

For example:

```java
@Initializable
private static int myInt;

@Initializable
private static String myString;
```

The `static{}` for class would look something like:

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

The `static{}` function will do the following **in order** for deployment initialisation:

1. Instantiate an `ABIDecoder` with [Blockchain.getData()](https://avm-api.aion.network/avm/blockchain#getData%28%29) and try to decode an `Integer` and a `string`;
2. Set `owner` as  the address that deployed the contract.
3. Execute `increaseMyIntByOne()` and increase the value of myInt by one.