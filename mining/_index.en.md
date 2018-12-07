---
Title: Mining
Chapter: true
---

# Mining

## Quickstart

Run through the following sections to get set up quickly.

Create Aion Wallet:

- [Ledger](doc:ledger-hardware-wallet-guide)
- [Desktop Wallet](doc:aion-desktop-wallet)
- [Coinomni](https://www.coinomi.com/)

Download Mining Solver:

- [EWBF Nvidia/CUDA](doc:external-resources#section-miners)
- [lolMiner AMD/OpenGL](doc:external-resources#section-miners)
- [GMiner Nvidia/CUDA](doc:external-resources#section-miners)

Connect Miners to Aion Network:

- [Solo Miner](doc:solo-mining-pool)
- [Pool Miner](doc:external-resources#section-public-pools)

## What Mining Is

A miner runs your system to solve a difficult mathematical problem by guessing the input value of a hash function. The difficulty of the problem is determined by network difficulty, which adjusts itself based on the network hash rate. Miners that correctly solve these problems are rewarded with `AION`. On average, someone is awarded once every 10 seconds.

This guide will take you through set-up of various modules. There are two types of miners that can work with the kernel:

- [External Miner](doc:aion-mining-overview#section-external-miner) 
- [Test Miner](doc:aion-mining-overview#section-test-miner)

## External Miner

If you wish to mine native `AION` coins, you will want to set up an external mining rig. It will connect your kernel to the network, and mine `AION` coins on the mainnet. We have provided all the software needed to begin mining, and it will require you to follow two modules (while running the [Aion node](doc:node-set-up)):

- [External Miner](doc:external-miner)
- [Mining Pools](doc:mining-pools)

Each of the above modules will need to be run simultaneously.

Aion leverages an enhanced Equihash algorithm for its Proof of Work (PoW). Details regarding changes to the algorithm may be found in the in [wiki](https://github.com/aionnetwork/aion_miner/wiki/Aion-equihash_210_9--specification-and-migration-guide).

## Test Miner

Test miner does not mine on the public network, but rather on your local kernel. It could be used to test and run your own chain, as it has a shorter set-up time and adequate functionality to mine for `AION` on the [Mastery Testnet](https://mastery.aion.network/#/dashboard). Mining tokens on the [testnet](https://mastery.aion.network/#/dashboard) is for development purposes only. `AION` awarded on the testnet is not worth anything.

Test mining does not require you to download additional files, provided that you already have the [Aion node](doc:node-set-up). You can learn how to setup a testnet [here](doc:mastery-testnet).
