# Mining

This section contains information about mining on the Aion network. Get get started quickly follow through these steps:

1. Create Aion Wallet:
   - [Ledger](doc:ledger-hardware-wallet-guide)
   - [Desktop Wallet](doc:aion-desktop-wallet)
   - [Coinomni](https://www.coinomi.com/)

2. Download Mining Solver:
   - [EWBF Nvidia/CUDA](doc:external-resources#section-miners)
   - [lolMiner AMD/OpenGL](doc:external-resources#section-miners)

3. Connect Miners to Aion Network:
   - [Solo Miner](doc:solo-mining-pool)
   - [Pool Miner](doc:external-resources#section-public-pools)

## About Mining

A miner runs your system to solve a difficult mathematical problem by guessing the input value of a hash function. The difficulty of the problem is determined by network difficulty, which adjusts itself based on the network hash rate. Miners that correctly solve these problems are rewarded with `AION`. On average, someone is awarded once every 10 seconds.

This guide will take you through the set-up of various modules. There are two types of miners that can work with the kernel:

- [External Miner](doc:aion-mining-overview#section-external-miner)
- [Test Miner](doc:aion-mining-overview#section-test-miner)

### External Miner

If you wish to mine native `AION` coins, you will want to set up an external mining rig. It will connect your kernel to the network, and mine `AION` coins on the mainnet. We have provided all the software needed to begin mining, and it will require you to follow two modules (while running the [Aion node](doc:node-set-up)):

- [External Miner](doc:external-miner)
- [Mining Pools](doc:mining-pools)

Each of the above modules will need to be run simultaneously.

#### Mining Algorithms

Aion leverages an enhanced Equihash algorithm for its Proof of Work (PoW). Details regarding changes to the algorithm may be found in the in [wiki](https://github.com/aionnetwork/aion_miner/wiki/Aion-equihash_210_9--specification-and-migration-guide.).

### Test Miner

Test miner does not mine on the public network, but rather on your local kernel. It could be used to test and run your own chain, as it has a shorter set-up time and adequate functionality to mine for `AION` on the [Mastery Testnet](https://mastery.aion.network/#/dashboard). Mining tokens on the [testnet](https://mastery.aion.network/#/dashboard) is for development purposes only. `AION` awarded on the testnet is not worth anything.

Test mining does not require you to download additional files, provided that you already have the [Aion node](doc:node-set-up). You can learn how to set up a testnet [here](doc:mastery-testnet).

---

## Aion Mining Protocols

The following sections discuss the mining protocols used by the Aion network.

### Aion Equihash

The Aion proof of work (PoW) protocol is based on the Equihash algorithm: a memory hard PoW algorithm solving the [Generalized Birthday Problem](https://en.wikipedia.org/wiki/Birthday_problem). The original Equihash algorithm developed by Alex Biryukov and Dmitry Khovratovich may be found [here](https://github.com/khovratovich/equihash).

Memory hard problems feature several properties which make them ASIC resistant:

- Large memory usage (relative to CPU on-chip memory). This forces the algorithm to access system memory resulting in memory bandwidth acting as the upper bound on algorithm run time.
- Ineffective CPU & memory trade-off. Traditionally, CPU cycles and memory usage may be traded to offset one resource by another. Equihash is resistant to this type of trading by exponentially increasing CPU cycles when attempting to trade CPU cycles for memory usage.

Aion uses a modified version of the Equihash solver developed by John Tromp. The original version may be found [here](https://github.com/tromp/equihash).

The core challenge of Equihash is to find a complete binary tree of `2`<sup>`k`</sup> indices (`X` values) such that the `XOR` of the hashes of indices (along with block header and nonce) is equal to `0`. Additionally, the following conditions must be met:

- For each height subtree, the `XOR` of its `2i` leaf hashes must start with `i*n 0` bits.
- The leftmost leaf of any left subtree is less than the leftmost leaf of the corresponding subtree.

This document serves as a migration and development guide detailing changes required to convert the Tromp solver to generate solutions to the Aion PoW protocol. This document assumes a working knowledge of the Equihash algorithm as well as the Tromp Equihash solver. The reference implementation has been purposely left in a simplified and rather verbose state, ensuring each algorithm step is clearly outlined.

#### Algorithmic Parameters

The Equihash algorithm takes two integers `N` and `K`. `N` specifies the width in bits which must `XOR` to `0`. `K` specifies the number of steps in which the computation takes place.

In addition to Equihash algorithm parameters, a personalization parameter is added to [Blake2b](https://blake2.net/). The personalization parameters ensure the digests computed are unique to Aion. Given the same inputs to a non-Aion Blake2b algorithm, the digests produced are guaranteed to be different.

The Aion implementation of the Equihash algorithm uses parameters `N = 210` and `K = 9`, increasing the computational difficulty of the Aion PoW as compared to popular existing Equihash implementations. One of the notable effects of changing to Equihash parameters is increased memory usage. At a minimum, the amount of memory has been more than doubled from `144 MB` to `300 MB` based on some set of experimental parameters, though the reference implementation uses over `500 MB`.

The personalization parameter adds an additional layer of security by ensuring unrelated hash computations both within and outside of the Aion kernel may not be used in the PoW process.

The personalization used in the current implementation is `16 bytes` equal to `Aion0PoW + N + K**`, where `N` and `K` are integers in [little endian byte order](https://en.wikipedia.org/wiki/Endianness).

#### Equihash Solution Generation

The Tromp Equihash solver uses a two-stage bucket sort during its solution generation process. The number of bits to be processed in each sort is defined by two variables: `RESTBITS` and `BUCKBITS`. The values of `RESTBITS` and `BUCKBITS` must sum to `DIGITBITS` where ![equation](media/image1.gif). This document presents algorithm details where `BUCKBITS = 14` and `RESTBITS = 7`.

Following the Tromp solver, Equihash solver the Aion solver produces Equihash solutions by processing digests in `K+1` steps. These steps may be broken up into 3 primary groups referred to as `Digit X`.

#### Equihash Hash Generation

Digit `0` is responsible for generating the hashes and produce solution indices and to perform the first bucket sort based on the first `BUCKBITS`.

Input to the Blake2b algorithm is as follows: `H(x) = H(BlockHeader) + nonce + X`

- `H(BlockHeader)`: A `32 byte` hash of the current blocks block header (excluding nonce and solution) using default Blake2b settings with no personalization values.
- `nonce`: a randomly generated `32 byte` value.
- `X`: Hash index.

##### Digit `0`

When generating hashes a `64` byte hash is generated by the Blake2b hashing algorithm. Next the hashes are split into `J` byte segments L bytes long where ![equation](media/image2.gif)and ![equation](media/image3.gif). Calculations are performed using integer division. In the case of `N=210` and `K=9`, generated `64 byte` hashes are split into `J=2` segments with each segment `L=27 bytes` long.

Generated hashes are then sorted into buckets based on the first `BUCKBIT` bits. The actual number of bytes stored is determined by examining the number of bytes remaining to be processed. [Table 1](#section-table-1) shows the number of bytes to be stored at each step, subsequent sections explain how the tables values are calculated.

##### Digits `1` through `8`

Digits `1` through `8` perform largely the same function and are grouped together. Each step performs two functions. First, all pairs of hashes in each bucket are `XOR`ed to calculate the next set of collisions over the next `RESTBITS`. Next, the hashes must be stored in buckets for the following step. In order to calculate the bucket in which to store the hash for the next step, each pair of hashes is `XOR`ed, the next bucket ID calculated based on the `XOR` of the next `BUCKBIT` bits.

###### Digit `9`

Digit `9` is the final step in producing candidate Equihash solutions. First pairs with collisions on the last `RESTBITS` are found. Next, collisions on the last `DIGITBITS` of each pair are found, if the final set of `DIGITBIT` collisions are found to be `0` a candidate solution has been found. Each candidate solution is then processed to ensure it meets all remaining Equihash conditions. As these conditions have not changed with the parameter change, they will not be covered in depth within this document. The steps to process candidate solutions are largely unchanged from the original Tromp solver, though hash byte lengths have changed the number of bytes processed in each validation step.

One minor change to the validation procedure is in the final step of verifying byte `27`. As only the leading `2` bits are included in the calculation bit, shift operations are used to isolate these bits while the remaining `6` bits are discarded.

#### Hash Processing

Each step must process of a portion of the hash; `DIGITBITS` bits long. Due to the asymmetry in the processing of the 210,9 parameters, the bits to process in each step must be calculated individually. Figure 1 shows the bits to be processed at each step. The `prevbo` parameter within the implementation tracks the starting byte to process at each step; thus following figure 1 the appropriate bitshift operations are applied to isolate and XOR `DIGITBITS` at each step.

##### Hash Size

In order to reduce the total amount of memory used the Equihash solver attempts to minimize the number of bytes stored at each step, excluding bytes processed in previous steps. Stored hashes are reduced in chunks of `4 bytes`.

The number of bytes remaining to be processed is shown in [table 1](#section-table-1), the hash bytes values at may be calculated by subtracting the total number of bytes processed after that step from the total length of the hashed bytes.

###### Table 1

| Digit | Hash bytes |
| ----- | ---------- |
| 0     | 26         |
| 1     | 23         |
| 2     | 20         |
| 3     | 18         |
| 4     | 15         |
| 5     | 13         |
| 6     | 10         |
| 7     | 7          |
| 8     | 5          |
| 9     | 0          |

#### Solution Representation

As with existing Equihash implementations the format of the solutions generated is an array of `2`<sup>`k`</sup> integers representing the indices of the solution hashes. Solutions are encoded using Integer to Bit String (I2BS) as with existing Equihash implementations however the increased size of the solution index also results in an increase in the encoded solution size. Existing implementations use `21 bits` (`2`<sup>`k+1`</sup> possible index values) when representing each solution index saving `11` bits at each encoded integer ultimately resulting in an encoded size of `1344 bytes`. The Aion implementation also uses the I2BS encoding, however, `22 bits` must be used to represent each integer, saving `10 bits` per integer and resulting in an encoded solution size of `1408 bytes`. The actual conversion process follows the existing Equihash solution conversion process and is not covered in detail within this document.

##### Summary of Values

```text
N = 210
K = 9
Personalization: "Aion0PoW" + N + K (N & K in little endian byte order)
DIGITBITS = 21
BUCKBITS = 14
RESTBITS = 7
Header Length = 496 bytes
Nonce Length = 32 bytes (Little endian byte order)
Encoded Solution size: 1408 bytes
```

---

## Aion Stratum Protocol

In order to support the Aion PoW algorithm the stratum protocol definition has been modified to fit Aion. This document describes protocol version 1 which will be the first stratum standard supported by Aion.

### Specifications

A handshake occurs after a TCP connection is established from a miner to the pool. The miner starts the handshake with the following:

```json
{
  "id": 1, 
  "method": "mining.subscribe", 
  "params": [ 
    “MinerName/Version, “ProtocolVersion”
  ]
}
```

The server may choose to drop the client at this point if it does not support the given protocol version. Server replies back with the session `id` and `extraNonce` value:

```json
{
  “id”: 1,
  “result”: [
    “sessionId”,
    “extraNonce”
  ]
  “extraNonce”
}
```

The miner must then authorize with the following message:

```json
{
  “id”: 2,
  “mining.authorize”,
  “params”:[
    “workerName”
    “password” (Optional)
  ]
}
```

Once validation a miners subscription request a server may reply with a `set_difficulty` message if the server supports `varDiff` mining. Otherwise, the server may reply immediately with a `mining.notify` message.

```json
{
  “id”: null, 
  “method”: “mining.notify”,
  “params” : [
    “jobId”,
    “true”,
    “target”,
    “headerHash”
  ]
} 
```

Parameters:

1. Job ID in hex
2. Clean job, may be set to false to allow miners currently mining this block to continue without interruption. If true, instructs miners to drop the current job and begin work on the new job.
3. 64 character hex string target for the current job.
4. Hash of the header, used as input to the Equi2109 algorithm as well as block identification in the Aion kernel.

Clients submit jobs by sending:

```json
{
    “id”: “messageId”,
    “method”: “mining.submit”,
    “params”: [
        “workerId”,
        “jobId”,
        “nTime”,
        “extraNonce2”,
        “solution”
    ]
}
```

Parameters:

1. Worker Id to which to assign the share
2. Original job ID
3. Submit timestamp
4. Client generated extraNonce value
5. Calculated Equihash solution