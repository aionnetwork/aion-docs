# Precompiled Contracts

There are three precompiled contracts available to both the Java and Rust kernels. These are:

- [Blake2bHash](https://github.com/aionnetwork/AIP/issues/8)
- [TransactionHash](https://github.com/aionnetwork/AIP/issues/10)
- [EDVerify](https://github.com/aionnetwork/aion_fastvm/pull/24)

## Run Pre-Compiled Contract in Custom Network

In order to support precompiled contracts from the first block, make sure the precompiled contracts activate at `0` block in the genesis block file.

```json
"accounts": {
    "0000000000000000000000000000000000000000000000000000000000000010": {
        "builtin": {
            "name": "ed_verify",
            "activate_at": 0
        }
    },
    "0000000000000000000000000000000000000000000000000000000000000011": {
        "builtin": {
            "name": "blake2b_hash",
            "activate_at": 0
        }
    },
    "0000000000000000000000000000000000000000000000000000000000000012": {
        "builtin": {
            "name": "tx_hash",
            "activate_at": 0
        }
    }
}
...
```