---
title: AVM Package
---

In addition to white-listed Java classes, we also have [AVM APIs](https://avm-api.aion.network/index.html) for you to write better Java smart contracts.

## [AVM Package](https://avm-api.aion.network/avm/package-summary.html)

There are three classes in the [avm](https://avm-api.aion.network/avm/package-summary.html) package, [Address](https://docs.aion.network/docs/avm-apis#section-address), [Blockchain](https://docs.aion.network/docs/avm-apis#section-blockchain) and [Result](https://docs.aion.network/docs/avm-apis#section-result), which can be used to access blockchain-specific functionality exposed by the AVM.

### [Address](https://avm-api.aion.network/avm/address)

Represents an **address** of account in the Aion Network.

### [Blockchain](https://avm-api.aion.network/avm/blockchain)

Every contract has an associated `Blockchain` which allows the application to interface with the environment the contract is running. Typically, it includes the **transaction** related functions like: [getCaller](https://avm-api.aion.network/avm/blockchain#getCaller(%29), [getData](https://avm-api.aion.network/avm/blockchain#getData(%29) and etc; functions for **block context** like [log](https://avm-api.aion.network/avm/blockchain#log(byte%5B%5D%), [putStorage](https://avm-api.aion.network/avm/blockchain#putStorage(byte%5B%5D,byte%5B%5D%29), [getBlockNumber](https://avm-api.aion.network/avm/blockchain#getBlockNumber(%29), [selfDestruct](https://avm-api.aion.network/avm/blockchain#selfDestruct(avm.Address%29) and so on; and other blockchain functionalities like [blake2b](https://avm-api.aion.network/avm/blockchain#blake2b(byte%5B%5D%29), [edVerify](https://avm-api.aion.network/avm/blockchain#edVerify(byte%5B%5D,byte%5B%5D,byte%5B%5D%29), [keccak256](https://avm-api.aion.network/avm/blockchain#keccak256(byte%5B%5D%29) and [sha256](https://avm-api.aion.network/avm/blockchain#sha256(byte%5B%5D%29).  [Read More](https://avm-api.aion.network/avm/blockchain).

### [Result](https://avm-api.aion.network/avm/result)

Represents a cross-call invocation result.

## [Userlib Package](https://avm-api.aion.network/org/aion/avm/userlib/package-summary.html)

Classes in the [userlib](https://avm-api.aion.network/org/aion/avm/userlib/package-summary.html) package and [userlib.abi](https://avm-api.aion.network/org/aion/avm/userlib/abi/package-summary.html) package are optionally packaged along-side your contract code as common-case utilities and quality of life routines.

### [AionBuffer](https://avm-api.aion.network/org/aion/avm/userlib/aionbuffer)

A buffer, much like an [NIO ByteBuffer](https://docs.oracle.com/javase/7/docs/api/java/nio/ByteBuffer.html), which allows the easy encoding/decoding of primitive values.
See a detailed contract example [here](https://docs.aion.network/docs/aionbuffer).

### [AionList](https://avm-api.aion.network/org/aion/avm/userlib/aionlist)

The Aion specific implementation of the Java List interface.
See a detailed contract example [here](https://docs.aion.network/docs/aion-list).

### [AionMap](https://avm-api.aion.network/org/aion/avm/userlib/aionmap)

The Aion specific implementation of the Java Map interface.
See a detailed contract example [here](https://docs.aion.network/docs/aion-map).

### [AionSet](https://avm-api.aion.network/org/aion/avm/userlib/aionset)
The Aion specific implementation of the Java Set interface.
See a detailed contract example [here](https://docs.aion.network/docs/aion-set).

## [Userlib ABI pacakge](https://avm-api.aion.network/org/aion/avm/userlib/abi/package-summary.html)

### [ABIDecoder](https://avm-api.aion.network/org/aion/avm/userlib/abi/abidecoder)

ABIDecoder is a utility class for decoding transaction data as high-level ABI types. This class contains static methods for parsing transaction data. [Read More
](https://docs.aion.network/docs/avm-abidecoder).

### [ABIEncoder](https://avm-api.aion.network/org/aion/avm/userlib/abi/abiencoder)

ABIEncoder is utility class for AVM ABI encoding. This class provides static helpers for encoding single data elements. It is typically more appropriate to use [ABIStreamingEncoder](https://docs.aion.network/docs/avm-apis#section--abistreamingencoder-https-avm-api-aion-network-org-aion-avm-userlib-abi-abistreamingencoder-).

### [ABIStreamingEncoder](https://avm-api.aion.network/org/aion/avm/userlib/abi/abistreamingencoder)

ABIStreamingEncoder is a utility class for AVM ABI encoding. Instances of this class are stateful, allowing several pieces of data to be serialized into the same buffer. [Read More](https://docs.aion.network/docs/abistreamingencoder).

### [ABIToken](https://avm-api.aion.network/org/aion/avm/userlib/abi/abitoken)
Identifiers of the tokens the ABI uses to describe extents of data in a serialized stream.