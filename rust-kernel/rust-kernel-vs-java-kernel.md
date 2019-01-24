---
title: Rust Kernel vs Java Kernel
---

# Rust Kernel vs Java Kernel

The major differences between the two kernel architectures.

## Additional Support APIs

The Rust kernel provides all the JSON RPC APIs provided by the Aion Java Kernel, and temporarily keeps [mining related functions](https://github.com/aionnetwork/aion/wiki/JSON-RPC-API-Docs#213-mining-related-functions), [eth_sign and web3_sha3](https://github.com/aionnetwork/aion/wiki/JSON-RPC-API-Docs#23-deprecated-endpoints) APIs.

The Rust kernel provides more APIs in the personal module, including:

- [personal_isAccountUnlocked](./JSON-RPC-APIs-Spec#personal_isaccountunlocked)
- [personal_listAccounts](./JSON-RPC-APIs-Spec#personal_listaccounts)
- [personal_lockAccount](./JSON-RPC-APIs-Spec#personal_lockaccount)
- [personal_sendTransaction](./JSON-RPC-APIs-Spec#personal_sendtransaction)
- [personal_sign](./JSON-RPC-APIs-Spec#personal_sign)
- [personal_signTransaction](./JSON-RPC-APIs-Spec#personal_signtransaction)

The Rust kernel provides [publish and subscribe](./JSON-RPC-APIs-Spec#pub_sub-module) through WebSocket and IPC connections. This module also allows users to subscribe to certain events and new blocks. The kernel will publish the new block header or event logs based on the subscription requirements.

## Data Format

The most common data format difference is the [QUANTITY format](./JSON-RPC-APIs-Spec#format). `QUANTITY` may be presented in a number, a hex number, or a hex number in a fixed size. The value of `QUANTITY` between the Rust kernel and the Java kernel is the same. Converting `QUANTITY` data into numbers before using it is recommended.