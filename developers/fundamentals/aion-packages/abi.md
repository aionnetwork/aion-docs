---
title: ABI Packages
table_of_contents:  true
description: Defines classes related to encoding/decoding the high-level data types serialized into transaction payload data.
---

## ABIDecoder

`ABIDecoder` is a utility class for decoding transaction data as high-level ABI types. This class contains [static methods](https://avm-api.aion.network/org/aion/avm/userlib/abi/abidecoder) for parsing transaction data.

### Instantiate an ABIDecoder

First you need to create a new `ABIDecoder` object. `ABIDecoder` wraps the given data and provides methods for decoding that stream of data as primitives and objects.

```java
ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
```

### Decode the Data

Once you have the `ABIDecoder`, you can decode the data by calling the corresponding [methods](https://avm-api.aion.network/org/aion/avm/userlib/abi/abidecoder) to the data type. Within your `static` function, you must decode those variables in the **exact same order** as they are encoded. For example, if a `String` and an `int[]` are encoded into one byte array, you can decode them as the following:

```java
public static void decodeMyData() {
    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
    String myStr = decoder.decodeOneString();
    int[] myIntArray = decoder.decodeOneIntegerArray();
}
```

## ABIEncoder

ABIEncoder is utility class for AVM ABI encoding. This class provides static helpers for encoding single data elements. It is typically more appropriate to use [ABIStreamingEncoder](/developers/fundamentals/aion-packages/abi#section-abistreamingencoder).

## ABIStreamingEncoder

`ABIStreamingEncoder` is a utility class for [AVM ABI encoding](https://avm-api.aion.network/org/aion/avm/userlib/abi/abistreamingencoder). Instances of this class are stateful, allowing several pieces of data to be serialized into the same buffer.

### Instantiate an ABIStreamingEncoder

First you need to create a new `ABIStreamingEncoder` object. `ABIStreamingEncoder` will set the buffer size to 64KiB if you do the following:

```java
ABIStreamingEncoder encoder = new ABIStreamingEncoder();
```

Or you can write into an existing byte array:

```java
byte[] encodedData = new byte[100];
ABIStreamingEncoder encoder = new ABIStreamingEncoder(encodedData);
```

### Encode the data

Once you have the `ABIStreamingEncoder`, you can encode multiple values by calling the corresponding [methods](https://avm-api.aion.network/org/aion/avm/userlib/abi/abistreamingencoder) to their types. For example, you can encode a `String` and an `integer` into one byte array using the following example. `toBytes()` creates and returns a byte array representing everything that has been encoded so far:

```java
 int i = 100;
 byte[] data = encoder.encodeOneString("myString")
                      .encodeOneInteger(i)
                      .toBytes();
```

## ABIToken

Identifiers of the tokens the ABI uses to describe extents of data in a serialized stream.
