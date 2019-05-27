---
title: "Aion Token Standard"
excerpt: "A fungible token standard to meet the functionality requirements of current dApp developers and enable cross-chain token movements."
---

### Value Proposition

To enable the creation and management of innovative fungible cross-chain digital assets on the Aion blockchain and other connected networks.

### Motivation

The primary motivation for the proposal is to provide the dApp's that are building on the Aion blockchain with a common standard to implement fungible tokens while enabling cross-chain functionality for their asset with minimal effort. The secondary motivation is to define the required contract interfaces and events to communicate with bridges and identify any upgrade requirements for current token standards on remote blockchains to allow communication with bridges.

### Description

Fungible tokens have proven to be one of the core building blocks of the current decentralized web era. This next-generation fungible token standard reflects the evolving needs of dApp developers for core functionality and security.

The Aion Fungible Token Standard has been designed to address the shortcomings of token standards on other existing blockchains by blurring the line between layer one and layer two. At the core of the design is the ability to perform cross chain token transfers while maintaining security and stable total supply. Additional features include safe transfers, token callbacks, and mint/burn interface.

This standard aims to provide a reliable interface which 3rd party tools can use when building products on top of Aion.

### High-Level Architecture

This diagram provides a high-level overview of the proposed contract architecture related to fungible tokens to enable cross-chain movements and communicate with bridges.

Note: The scope of this AIP is limited to the ATS contract highlighted. In the diagram below the Aion blockchain is the Home chain.

![High Level Diagram of the Aion Token Standard](high_level_ats_diagram.png)

Find more information on the [Aion Network AIP Issues page](https://github.com/aionnetwork/AIP/issues/4).