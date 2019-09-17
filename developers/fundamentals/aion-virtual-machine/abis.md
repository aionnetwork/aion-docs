---
title: ABIs
description: Application Binary Interfaces (ABIs) are essentially a map for developers to use when integrating external resources into a contract. Developers can use a contract's ABI to find out what functions are available, what parameters they take, and other important meta-data.
---

## Overview

The purpose of an ABI is to make it easier for developers to understand the logic behind a contract, and find out what elements it's made of. The alternative to ABIs would be having each developer share the contract itself with other developers that wanted to integrate with it. Not only would this be expensive in terms of data transfer, but it would make the task of understanding the contract substantially harder since each developer would have to trawl through the contract to learn exactly what goes where. Having an ABI lets developers quickly understand what is in a contract and, more importantly, how to interact with the contract.

Each ABI is generated at compile time when the contract itself is compiled. While the ABI generator runs alongside the Aion Virtual Machine (AVM), they are completely separate units and do not rely on each other. The AVM doesn't have a low-level ABI specification built baked into the system itself. This means that users can define an original encoding scheme since the AVM itself does not expect any particular ABI. However, we do have our own suggested ABI encoding specification. One of the main features of an Aion ABI is that they are human-readable; it's very easy for a developer to find out what information is contained within the ABI.

## Versions

Each ABI contains a version number that specifies what features it has available to it. Each new version contains all the features within the previous versions. So version `1` contains the new features and all the features from version `0.0`.

| Version Number | Added Features |
| -------------- | -------------- |
| `0.0` | Initial release. |
| `1`   | The use of `BigIntegers` is now available. |

## Binding

ABI binding is a feature available for the Web3.js framework. It allows you to call your deployed contract without you having to write any complicated functions or calls. An ABI definition would look something like this:

```javascript
// Create an ABI Object using the .abi file created from compiling the contract.
let abi = `0.0
org.aion.web3.Counter
Clinit: ()
public static void incrementCounter(int)
public static int getCount()`;
let abiObject = web3.avm.contract.Interface(abi);

// Initiate the binding within the web3 object.
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey);

// Calls to the network must be asynchronous.
async function contractTransaction() {

    // Call the incrementCounter while supplying `1` as an argument.
    let response = await web3.avm.contract.transaction.incrementCounter(1);

    // Print the reponse to the network.
    console.log(response);
};
```

If you wanted to just return a value from the network and not change any data, then you would need to add the `readOnly` only method to the contract call. For example, the `getCount` function just returns the current `count` value, and doesn't require any funds to run:

```javascript
let response = await web3.avm.contract.readOnly.getCount();
```

## ABI Types

The ABI encoding specifies how inputs to a contract are sent over the RPC layer and how to decode returned values from a call to a contract. The following ABI types are available when calling or interacting with a contract. No other types can be used. Each type can be used in an array, but only primitive types can be used within two-dimensional arrays.

| Minimum ABI Version | Type | Array Dimensions |
| --- | ---- | ---------------- |
| `0.0` | byte | 1D, 2D |
| `0.0` | boolean | 1D, 2D |
| `0.0` | char | 1D, 2D |
| `0.0` | short | 1D, 2D |
| `0.0` | int | 1D, 2D |
| `0.0` | float | 1D, 2D |
| `0.0` | long | 1D, 2D |
| `0.0` | double | 1D, 2D |
| `0.0` | Address | 1D |
| `0.0` | String | 1D |
| `1.0` and above | BigInteger | 1D |

### Internal Contract Calls

Calls from within the contract to another part in that same contract do not have to stick to these types. Only calls entering the contract, or returns leaving the contract must follow these types. Calls that remain within a contract can be of any type or class.

## More Information

A details explanation of further ABI concepts can be found on the [Aion Github AVM wiki](https://github.com/aionnetwork/AVM/wiki/ABI-Specification).
