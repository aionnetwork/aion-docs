---
title: Pre-compiled Contracts
---

# Pre-compiled Contracts

Rust Kernel v0.1.0 is compatible with Aion (Java) Kernel v0.3.2, supporting the pre-compiled contracts listed in [precompiled contract details](https://github.com/aionnetwork/aion/wiki/Precompiled-contract-details).

## Run Pre-Compiled Contract in Custom Network

Aion starts to support pre-compiled contract after `1920000` blocks in Mainnet and `1132000` blocks in Mastery. In order to support pre-compiled contracts from the first block, make sure the pre-compiled contracts activate at 0 block in the genesis block file.

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