---
title: "Design Considerations for your Digital Asset"
excerpt: "This guide will walk you through the different types of tokens and when you should use them."
---

## Changing Landscape

The digital asset and token landscape is evolving! If you think this article deserves updating or needs a refresh, help us by **suggesting edits**. Much of this articles content was pioneered by [Sermin Voshmgir](https://twitter.com/sherminvo) at Crytoeconomics Research Lab.

In blockchain, tokens are a combination of value representation and/or access to rights. This broad scope makes it non-trivial for determining how you should design your token, however, we're here to help. In order to identify the desired characteristics of your token, we will walk through four considerations.

## Technical Considerations

How are your tokens technically derived? We've seen two types of tokens from a technical perspective Protocol Tokens and App tokens. 

### Protocol Tokens

These are part of the incentive mechanism that allow a decentralized protocol like Aion function. They act as a block validator incentive (miner rewards) and in transaction spam prevention.

### App Tokens

These are tokens that are issued on the application layer with a few lines of code through a smart contract. Many are based on pre-defined token standards like Ethereum's ERC-20 or Aion's [Aion Token Standard (ATS)](https://github.com/aionnetwork/AIP/issues/4). They can represent:

- Physical goods
- Digital goods
- The right to perform an action on a network
- The right to perform an action in the real world
  
## Rights Considerations

What type of rights are attached to your token? Your token may have a hybrid of these classifications but there are some clear conceptual buckets.

### Store of Value (Passive Token)

Right to an underlying economic value.

- *Security Tokens:* representing shares of a business
- *Asset-backed Tokens:* real-world assets represented as tokens to be transferred and traded in a trustless environment.
- *Currency Tokens:* representative of an amount of a currency. As an example, **a Bitcoin** represents **1BTC** worth of value.

### Access or Activity Rights (Active Token)

The token is required to participate in a network that no centralized party controls. In this classification we have:
  
- *Usage Tokens:* right to use network services.
- *Work Tokens:* right to produce value within a network.
- *Reputation/Reward Tokens:* Privileged right to do something within a network.

## Fungibility Considerations

What type of properties does your token hold?

### Fungible Tokens

- Only quantity matters, units of fungible assets of the same kind are indistinguishable.
- Any amount can be merged or divided into a larger or smaller amount of it making it indistinguishable from the rest.

### Non-Fungible Tokens

- Unique and can be distinguished from each other.
- Have varying properties.
- Everyone knows how many there are.
  
## Legal Considerations

Full disclosure, we are not advising on legal matters when it comes to tokens. Please hire a professional lawyer or coucil if you require a legal opinion. How will the token be regulated? International regulators are still trying to understand and classify different token types. Here is the current state of affairs:

### Currencies

Regulated by financial market authorities.

### Securities

No physical asset, just contracts, fall under securities law:

- equity tokens
- convertible bonds
- debenture tokens
- option tokens
- smart contract features
- bond token
- smart swap contracts

Having trouble reasoning about the legal properties of your token? Coinbase built a [nifty tool](https://docs.google.com/spreadsheets/d/1QxOV2dgxO3C_TyVE0-41ZwLlzPmB-EE1NNshJGuedCU/edit#gid=0) for determining if your token is a **utility** or **security**.