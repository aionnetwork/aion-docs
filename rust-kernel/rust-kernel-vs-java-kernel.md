---
title: Rust Kernel vs Java Kernel
---

**Additional Support APIs**

Aion Rust provides all the JSON RPC APIs provided by Aion(Java) Kernel,
and temporarily keeps [<span class="underline">mining related
functions</span>](https://github.com/aionnetwork/aion/wiki/JSON-RPC-API-Docs#213-mining-related-functions), [<span class="underline">eth\_sign
and
web3\_sha3</span>](https://github.com/aionnetwork/aion/wiki/JSON-RPC-API-Docs#23-deprecated-endpoints) APIs.

Aion Rust provides more APIs in personal module,
    including:

  - [<span class="underline">personal\_isAccountUnlocked</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#personal_isaccountunlocked)

  - [<span class="underline">personal\_listAccounts</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#personal_listaccounts)

  - [<span class="underline">personal\_lockAccount</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#personal_lockaccount)

  - [<span class="underline">personal\_sendTransaction</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#personal_sendtransaction)

  - [<span class="underline">personal\_sign</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#personal_sign)

  - [<span class="underline">personal\_signTransaction</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#personal_signtransaction)

Aion Rust provide [<span class="underline">publish and
subscribe</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#pub_sub-module) through
websocket and IPCs. This module allows users to subscribe curtain events
and new blocks. Kernel will publish the new block header or event logs
based on the subscription requirements.

**Data Format**

The most common data format difference
is [<span class="underline">QUANTITY
format</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#format).
QUANTITY may be presented in a number, a hex number, or a hex number in
a fixed size. The value of QUANTITY between Aion Rust Kernel and
Aion(Java) Kernel is the same. Converting QUANTITY data into numbers
before using it is recommended.
