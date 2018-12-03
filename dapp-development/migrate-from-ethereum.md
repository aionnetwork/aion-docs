There are several differences in type between Aion and Ethereum, all of which are listed below:

### Data Word

**Aion**: `128 bits`
**Ethereum**: `256 bits`

### Solidity Version

**Aion**: `v0.4.15`
**Ethereum**: `v0.4.25`

### Local Variable Count

**Aion**: 16 Data Word (`128 bits`)
**Ethereum**: 16 Data Word (`265 bits`)

### `INT` Size

**Aion**: `int8 - int128`
**Ethereum**: `int8 - int256`

### `UINT` Size

**Aion**: `uint8 - uint128`
**Ethereum**: `uint8 - uint256`

### Inline Assembly

**Aion**: Not Currently Supported
**Ethereum**: Supported

### Address

**Aion**: `32 bytes`
**Ethereum**: `20 bytes`

### Hash Function (Signatures and Wallet)

**Aion**: [Blake2b](https://en.wikipedia.org/wiki/BLAKE_(hash_function))
**Ethereum**: [Keccak-265](https://keccak.team/keccak_specs_summary.html)

### Signature Function

**Aion**: `ECDSA - curve ED25519`
**Ethereum**: `ECDSA – curve secp256k1`

### Compilers

**Aion**: Solidity
**Ethereum**: Solidity, LLL, Serpent