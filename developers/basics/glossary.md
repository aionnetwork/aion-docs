---
title: Aion Glossary
description: A collection of various terminology used throughout the Aion docs site.
draft: true
---

## ABI

An **ABI**(Application Binary Interface) is an interface between the byte-code of a contract and a program. They are used to create wrappers that make it easier for you to interact with contracts. It can be thought of as a map to your contract.

## Account

An **Account** is an objects that can sign and send any transaction to the network using their balance of Aion to pay the NRG cost.

All **Accounts** have the potential to contain a balance of Aion Coins and Tokens.

Every **Account** has a Private Key that can be used to send transactions and a Public Address (hexadecimal) that can be used to identify the **Account** and receive Coins and Tokens.

You can use the public address to see the details of an account using the Aion Dashboard's [Search function](/developers/tools/dashboard/using-search-function.md).

## ATS Token

<!-- Aion Token Standard -->

## Aion Virtual Machine

## Networks on Aion

The Aion Network has multiple official Networks that serve different purposes.

The **Mainnet** is the live Network where real transactions are processed.

The **Mastery** testnet is the Network where you can deploy contracts and experiment for free! Think of it as a playground. You can currently get Mastery Net `AION` at the [BlockX Labs faucet](https://faucets.blockxlabs.com/).

You can browse these networks on the [Aion Dashboard](https://mainnet.aion.network/#/dashboard) website.

## Node

A **Node** is a computer that is connected to a [network](#Networks-on-Aion). In our case, each node is running the Aion kernel. Each node talks to other **Nodes** on the network to do things like run applications or confirm transactions.

Unlike other networks, we have implemented the Aion virtual machine ([AVM](#Aion-Virtual-Machine)) on both the Java and Rust kernels. Operationally both these kernels function the same way and react identically when queried by the network.

The purpose of having two kernels is for redundancy. If one of the kernels is compromised, the other kernel is able to take the weight and keep the network alive.

Learn to set up your own **Node** [here](/developers/nodes/_index.md).

## Nonce

A **Nonce**, or "Number only used once", is a value found in various different objects on the network. For each object type, it serves a slightly different purpose.

An **Account Nonce** represents the number of transactions that account has sent. This prevents the same transaction from submitting multiple times.

A **Contract Nonce** represents the number of other contracts that this contract has deployed on the network. This prevents the same contract from being deployed multiple times.

A **Block Nonce** represents meaningless value in a block that is adjusted to satisfy the proof of work condition. This is the Nonce that is generally referred to in the blockchain industry.

A **Transaction Nonce** represents the number of transactions sent by the sender account the point of sending this transaction. It is the same number as the Account Nonce at the time of sending the transaction. This prevents the same transaction from submitting multiple times.

You can find the Nonce of an object on the network by navigating to their respective [Details Page](/developers/tools/dashboard/_index.md#Details-Pages) on the [Aion Dashboard](https://mainnet.aion.network/#/dashboard) website.

## NRG

**NRG** is the fee that is paid by an account in `AION` to process a transaction on the Network. This fee goes to the miners that solve the block where your transaction was processed in.

**NRG** is usually measured in nano-Amps (`nAmp`) which is equal to one quintillionth (10^18) of 1 `AION`. An `nAmp` is the smallest unit of Aion Coins.

## Transaction

A **Transaction** represent every change on an Aion network. This includes the transfer of tokens, transfer of `AION`, deployment of contracts, and contract interaction.

Each **Transaction** has a unique **Transaction Hash** that is used to identify the transaction. You can use the transaction hash to see the details of a transaction using the Aion Dashboard's [Search function](/developers/tools/dashboard/using-search-function.md).
