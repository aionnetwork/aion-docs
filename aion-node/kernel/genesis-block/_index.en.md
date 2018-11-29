---
title: Genesis Block
weight: 1
chapter: false
---

# Genesis Block

## Genesis Parameters

The genesis file provided as part of the Aion kernel installation bundle was modified specifically for the test network. The complete file can be found in the `aion_folder/config/[network]/genesis.json`.

An abbreviated version of the genesis file is shown below, followed by details regarding each parameter and its meaning.

### `alloc`

The first parameter describes account allocation. These are accounts that are pre-allocated with balances. For the purposes of the test network, 10 accounts have been pre-allocated with a balance of 314159 AION each.

### `coinbase`

This field indicates the address of the account that successfully sealed the block. It is arbitrarily set to the 0th address here.

### `difficulty`

The difficulty field allows the network to determine the block rate. It is initialized with a low value 0x64 so that the test network can find its natural difficulty level.

### `energyLimit`

Each transaction in each block requires a dynamic amount of energy. energyLimit is the upper bound that limits the number of transactions included in a block.

### `extraData`

An arbitrary field that may be used to set messages. Typically this ends up being the signature of some participating mining pool. With respect to the test network, this field is set to be the hash of a special message.

### `networkBalanceAlloc`

This field is intended to be used to record the total balances for multiple networks. The value can then be dynamically updated and used to calculate rewards. Currently, this value is unused.

### `nonce`

This field indicates the value in which the PoW algorithm yields a valid solution. It is set arbitrarily to 0x00 for the genesis block.

### `parentHash`

This field indicates the hash of the parent (preceding) block that this block is referencing. For the purposes of the genesis, it is arbitrarily set to an all-zero hash.

### `timestamp`

The timestamp field is an arbitrarily set field. In our case, this timestamp corresponds to the first timestamp of the first commit in the Aion whitepaper repository.

## Mainnet

Ths following code is the genesis for the current mainnet:

```json
{
  "alloc": {
    "0xa0eeaeabdbc92953b072afbd21f3e3fd8a4a4f5e6a6e22200db746ab75e9a99a": {
      "balance": "465934586660000000000000000"
    }
  },
  "networkBalanceAlloc": {
    "0": {
      "balance": "465934586660000000000000000"
    }
  },
  "energyLimit": "15000000",
  "nonce": "0x00",
  "difficulty": "0x4000",
  "coinbase": "0x0000000000000000000000000000000000000000000000000000000000000000",
  "timestamp": "1524528000",
  "parentHash": "0x6a6d99a2ef14ab3b835dfc92fb918d76c37f6578a69825fbe19cd366485604b1",
  "chainId": "256"
}
```

## Testnet

This following code is the genesis file for the now depricated conquest testnet:

```json
{
  "alloc": {
    "0xa025f4fd54064e869f158c1b4eb0ed34820f67e60ee80a53b469f725efc06378": {
      "balance": "465934586660000000000000000"
    },
    "0xa0e6a0c9c85db355fdceccc44444618b3213b3d5c3c3e26dcfe039ed07f310cd": {
      "balance": "314159000000000000000000"
    },
    "0xa08849e680dbede69077b3be7d9c8c37f5849c46cce63eafb26bd2083ce32a48": {
      "balance": "314159000000000000000000"
    },
    "0xa00d29449981629c92658eaedb6b383e7d98ac2933d4d0783f6d60313a826f46": {
      "balance": "314159000000000000000000"
    },
    "0xa04be405fe794146df4a6a0cac0009933323d65e29dedfaf80a1f880fa8cd329": {
      "balance": "314159000000000000000000"
    },
    "0xa0dd7205acbaad446e7bd4e1755a9d1e8dd74b793656cc7af5876cba0f616bab": {
      "balance": "314159000000000000000000"
    },
    "0xa076b66cb825ca43aab11aa807ced2586023e6a62d8d600b0f3e16445a8d3ced": {
      "balance": "314159000000000000000000"
    },
    "0xa0438499953bab8e92399de99e1edab602119d75dd0e90da256efd461b0cfe29": {
      "balance": "314159000000000000000000"
    },
    "0xa05765005030df3d38502f6d3144a321631bd8663b5a87bc12d69a1330c9481a": {
      "balance": "314159000000000000000000"
    },
    "0xa046cc48bcde4b0b2ce2dbefb318f3778946b6c0011f691ecc4025cc145a93d3": {
      "balance": "314159000000000000000000"
    },
    "0xa07c95cc8729a0503c5ad50eb37ec8a27cd22d65de3bb225982ec55201366920": {
      "balance": "314159000000000000000000"
    }
  },
  "networkBalanceAllocs": {
    "0": {
      "balance": "465934586660000000000000000"
    }
  },
  "energyLimit": "15000000",
  "nonce": "0x00",
  "difficulty": "0x0010",
  "coinbase": "0x0000000000000000000000000000000000000000000000000000000000000000",
  "timestamp": "1525924800",
  "parentHash": "0x10E71BF64DCB8C60766CCB491AB6E3ACEC1AB07D0D5A088FCF533CBFBC801295",
  "chainId": "128"
}
```