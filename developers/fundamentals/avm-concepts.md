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

## Callablle Functions

In order for a function or method to be called from outside the contract (by a user on the blockchain, or from another contract) it needs to be annotated as @Callable.

## Fallback Functions

Mark a function as the default function to be called.

## JCL Whitelist

The Java Class List (JCL) whitelist is a list of classes that are available to your Java contracts.