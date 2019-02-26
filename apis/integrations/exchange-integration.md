# Exchange Integrations

## Hardware & Software Requirements

- Ubuntu 16.04
- `16GB` RAM
- Quad-core CPU with Intel [AVX Instruction Support](https://en.wikipedia.org/wiki/Advanced_Vector_Extensions#CPUs_with_AVX)
- `256GB` SSD (Could require expansion as the network transaction size scales)

## Running the Aion Kernel

There are two options for setting up the Aion Kernel:

1. [Precompiled Binary](https://docs.aion.network/docs/native-node-1#section-pre-compiled-packages)
2. [Compiling from Source](https://docs.aion.network/docs/native-node-1#section-build-your-own)

### Configuration Settings

We suggest you follow through the [Kernel](https://docs.aion.network/docs/kernel-overview) section of the documentation. As an exchange, you should disable the miner. You can enable _compression_ and _pruning_ to `SPREAD` mode for saving your disk usage. This might delay few milliseconds for the block import but will save a lot of disk usage.

## Keystore Generation

To generate an account, call the kernel using `./aion -a create`. Take a look at the [command-line](https://docs.aion.network/docs/command-line) guide for more information.

If you will be creating lots of key pairs, you can utilize our [Java Offline Tool](https://github.com/AionJayT/offlineTxTool/releases) to generate bulk key pairs quickly. There are also [test cases](https://github.com/AionJayT/offlineTxTool/tree/master/test/org/aion/tool) available.

## Client API Integration

There are currently two API's available for interacting with the Aion blockchain:

### Web3.js

This API has been packed into the Aion Kernel and is available from the [Aion Web3 Github repository](https://github.com/aionnetwork/aion_web3). Follow through the [Web3 API instructions](https://docs.aion.network/docs/aion-web3). If you intend to migrate any Solidity contracts, take a look at the [Aion and Solidity](https://docs.aion.network/docs/migrating-smart-contracts-from-ethereum) section.

### Java API

The Java API is targeted toward higher throughput applications and features a 300% performance increase over Web3. Follow through the [Java API](https://docs.aion.network/docs/java) section for more details.

## Connecting to the Testnet

The [Mastery Testnet](https://docs.aion.network/docs/mastery-testnet) section details how to connect to the Aion _Mastery_ Testnet. You can use the [Aion Faucet](https://faucets.blockxlabs.com/aion) to receive `AION` to test with.

## Frequently Asked Questions

### My Transactions are Failing

First, check to see if the sender has enough balance to send the transaction. If so, check to see if the NRG price (same as Ethereum Gas Price) is equal to or above 10 * 10^9 (see nrgPrice below). If the transaction is still failing, check the NRG limit. For basic transactions, NRG must be set at or above 21000. See [Aion Terminology](https://github.com/aionnetwork/aion/wiki/Aion-Terminology) for NRG decimal places.

If the user signs the transaction in the client side API, check to make sure the timestamp input is in microsecond unit.

You can usually put `0`  as the transaction nonce and the Kernel will fill in the correct nonce for the transaction. However, if you assign a specific number to the nonce using the API or an offline tool you must pull in the correct nonce.

```bash
transaction details:
nrgPrice: 10000000000,
nrg: 320922,
nonce: 447,
transactionIndex: 0,
input: 0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400,
blockNumber: 247726,
from: 0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c,
to: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,
value: 0,
hash: 0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80,
timestamp: 1529590672338000
```

### Dependency Libraries

We have posted a list of the [libraries and pre-compiled binaries](https://github.com/aionnetwork/aion/blob/master/docs/Pre-compiled_binaries.md) that we use. If you come across any libraries not included in the document, please [let us know](https://github.com/aionnetwork/aion/issues).

### Setup Multiple Nodes

First, give each node a unique `PEER_ID`. Then in each node's `config.xml`, add the peers.

```xml
<nodes>
     <node>p2p://PEER_ID1@IP1:PORT1</node>
     <node>p2p://PEER_ID2@IP2:PORT2</node>
 </nodes>
```