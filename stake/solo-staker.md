---
title: Solo Staker
---

## In Progress

This page is still in progress. Use with extreme caution.

## Introduction

Proof of work(PoW) combined with Proof of stake (PoS) is being introduced in Aion's new Unity consensus algorithm. In the PoS subsystem, participants that will stake their Aion tokens are required. Any token holder of the system can run a full node in the Aion blockchain network to produce PoS blocks, and these coin holders are called **stakers**

Any coin holder can cast their tokens as **stakes** to support a staker's participation in PoS consensus by submitting their tokens into the PoS staking system, and this action is called **bond**. These tokens must be rendered immobile(i.e. they cannot be freely transferred to other users) after submission and will contribute to the total influence of the staker in the PoS consensus.

A very simple CLI will be shipped as part of the Aion-Unity upgrade to easily for pool operators to register as a public pool and perform management actions.

This document aims to specify all requirements and information, including running a node, becoming a staker and participating in the PoS system via stakes, upon Aion Network with Unity consensus algorithm update.

> Note: This guide is based on [Engineering Design and Incentive Specification for Aion Unity](https://github.com/aionnetwork/unity-engineering-spec) by Ali Sharif and [*Aion Unity Smart Contracts*](https://github.com/aionnetwork/protocol_contracts).

## Operation Requirements

Since the pool operator is the entity that gets delegated staking rights from users of the system, the pool operator’s primary obligation with respect to the ADS protocol is to run an Aion-Unity full node, that is well connected to the blockchain network, in order to participate in the staking protocol as a block producer. In order to satisfactorily fulfill this obligation, the operator must run computer hardware with comparable or better specifications than:

- Intel i7 (Skylake, 6th generation) processor with 4 cores, 8 threads.
- 16 GB of DDR4 RAM.
- 512 GB SATA SSD.
- 50Mbps dedicated internet connection.

The operator is required to keep at least 99.9% (“three nines”) availability, which corresponds to at-most 8.77 hours of downtime per year. Pool operators are encouraged to host a web page, advertising self-reported up-times, and hardware specification, among other pertinent information about pool operations, to instill confidence in and advertise the operator’s operational capabilities.

## Staking Contract

All logic related to staking is implemented on an AVM smart contract called the _Staker Registry_. This contract will be deployed upon Aion-Unity upgrade. 

### Staker Type

### Solo Staker(Private Staking)

### Off-chain Staking Pools(Private Pools)

## Staking contract? p4

## Staker Key Management

## Staker Actions

Staking pool operators can perform the following actions during the course of the life-cycle of the staking pool using _management key_.
