---
title: ABI Types
description: While Java blockchain appliactions don't need to use an ABI, they are handy if you're sharing a contract with other developers. If they don't have access to the original Java classes, developers can use the ABI to learn what methods and variables are available.
---

The following ABI types are available when calling or interacting with a Java contract, form outside of the contract. No other types can be used. Each type can be used in an array, however only primative types can be used within two-dimensional arrays.

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

> Note: Our [ABI specification](https://github.com/aionnetwork/AVM/wiki/ABI-Specification) lives entirely in the tooling & userlib space.
