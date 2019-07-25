---
title: AVM Packages
description: There are three classes in the avm package, Address, Blockchain and Result, which can be used to access blockchain-specific functionality exposed by the AVM.
table_of_contents: true
---

There are three classes in the [avm](https://avm-api.aion.network/avm/package-summary.html) package, [Address](https://docs.aion.network/docs/avm-apis#section-address), [Blockchain](https://docs.aion.network/docs/avm-apis#section-blockchain) and [Result](https://docs.aion.network/docs/avm-apis#section-result), which can be used to access blockchain-specific functionality exposed by the AVM.

## Address

Represents an **address** of account in the Aion Network. You can view more information on the [AVM API documentation](https://avm-api.aion.network/avm/address)

## Blockchain

Every contract has an associated `Blockchain` which allows the application to interface with the environment the contract is running. Typically, it includes the **transaction** related functions like: [getCaller](https://avm-api.aion.network/avm/blockchain#getCaller%28%29), [getData](https://avm-api.aion.network/avm/blockchain#getData%28%29) and etc; functions for **block context** like [log](https://avm-api.aion.network/avm/blockchain#log%28byte%5B%5D%), [putStorage](https://avm-api.aion.network/avm/blockchain#putStorage%28byte%5B%5D,byte%5B%5D%29), [getBlockNumber](https://avm-api.aion.network/avm/blockchain#getBlockNumber%28%29), [selfDestruct](https://avm-api.aion.network/avm/blockchain#selfDestruct%28avm.Address%29) and so on; and other blockchain functionalities like [blake2b](https://avm-api.aion.network/avm/blockchain#blake2b%28byte%5B%5D%29), [edVerify](https://avm-api.aion.network/avm/blockchain#edVerify%28byte%5B%5D,byte%5B%5D,byte%5B%5D%29), [keccak256](https://avm-api.aion.network/avm/blockchain#keccak256%28byte%5B%5D%29) and [sha256](https://avm-api.aion.network/avm/blockchain#sha256%28byte%5B%5D%29).  You can view more information on the [AVM API documentation](https://avm-api.aion.network/avm/blockchain)

## Result

Represents a cross-call invocation result. You can view more information on the [AVM API documentation](https://avm-api.aion.network/avm/result)