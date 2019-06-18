---
title: ABI Types
description: While AVM applications don't need to use the ABI, it is provided as a convenience for invoking methods within a specific DApp instance in a type-safe way.
---

The ABI(Application Binary Interface) allows the consumer to interface with the functionality in a pre-defined, strongly-typed, binary-level format. In our case, the DApp provides this functionality. Another account or Java smart contract can call this, with the arguments supplied within the transaction. The transaction data **contains** the information on which method to call, and the required arguments values.

## Supported Data types

The ABI describes how method names and data types (as either **method arguments** or ** return values**) are encoded.

The ABI supports the following data types:

| Type | Array Dimensions |
| ---- | ---------------- |
| byte | 1D, 2D |
| boolean | 1D, 2D |
| char | 1D, 2D |
| short | 1D, 2D |
| int | 1D, 2D |
| float | 1D, 2D |
| long | 1D, 2D |
| double | 1D, 2D |
| Address | 1D |
| String | 1D |
