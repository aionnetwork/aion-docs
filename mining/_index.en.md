---
Title: Mining
Chapter: true
Weight: 4
---

# Mining

This is an update.

## Quickstart

Run through the following sections to get set up quickly.

Create Aion Wallet:

- [Ledger](/tokens/ledger-hardware-wallet)
- [Desktop Wallet](/tokens/aion-desktop-wallet)
- [Coinomni](https://www.coinomi.com/)

Download Mining Solver:

- [EWBF Nvidia/CUDA](external-resources#section-miners)
- [lolMiner AMD/OpenGL](external-resources#section-miners)
- [GMiner Nvidia/CUDA](external-resources#section-miners)

## What Mining Is

A miner runs your system to solve a difficult mathematical problem by guessing the input value of a hash function. The difficulty of the problem is determined by network difficulty, which adjusts itself based on the network hash rate. Miners that correctly solve these problems are rewarded with `AION`. On average, someone is awarded once every 10 seconds.

This guide will take you through the set-up of various modules. There are two types of miners that can work with the kernel:

- [External Miner](#external-miner)
- [Test Miner](#test-miner)

## External Miner

If you wish to mine native `AION` coins, you will want to set up an external mining rig. It will connect your kernel to the network, and mine `AION` coins on the mainnet. We have provided all the software needed to begin mining, and it will require you to follow two modules (while running the [Aion node](/aion-node)):

- [External Miner](external-miner)
- [Mining Pools](mining-pools)

Each of the above modules will need to be run simultaneously.

Aion leverages an enhanced Equihash algorithm for its Proof of Work (PoW). Details regarding changes to the algorithm may be found in the in [wiki](https://github.com/aionnetwork/aion_miner/wiki/Aion-equihash_210_9--specification-and-migration-guide).

## Test Miner

Test miner does not mine on the public network, but rather on your local kernel. It could be used to test and run your own chain, as it has a shorter set-up time and adequate functionality to mine for `AION` on the [Mastery Testnet](https://mastery.aion.network/#/dashboard). Mining tokens on the [testnet](https://mastery.aion.network/#/dashboard) are for development purposes only. `AION` awarded on the testnet is not worth anything.

Test mining does not require you to download additional files, provided that you already have the [Aion node](/aion-node). You can learn how to set up a [testnet here](kernel/networks/mastery-testnet).
