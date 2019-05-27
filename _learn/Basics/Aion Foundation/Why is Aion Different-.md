---
title: "Why is Aion Different?"
excerpt: ""
---
[block:api-header]
{
  "title": "Problem"
}
[/block]
There are many blockchains that focus on specific features like privacy, scalability, security, speed, cost and more. As a developer building a decentralized application you must choose one of these “purpose-built blockchains” for your business use case, often sacrificing one value at the expense of gaining another (for example, speed vs security).
[block:api-header]
{
  "title": "What is the Aion Network?"
}
[/block]
<<glossary:Aion>>  is a stand-alone blockchain network for developers that wish to:

1. Avoid “vendor lock-in" that ties the destiny of their application to a single blockchain network.

2. Borrow features specific to purpose-built blockchains by acting as a hub that connects all blockchains to one another, commonly referred to as "blockchain interoperability".

Mainstream adoption of blockchains has been limited because of scalability, privacy, and interoperability challenges. Aion is the first multi-tier blockchain network designed to address these challenges. Core to our hypothesis is the idea that many blockchains will be created to solve unique business challenges within unique industries.
[block:api-header]
{
  "title": "A Multi-Tier Blockchain Network"
}
[/block]
The Aion blockchain is like a computer network, providing a protocol and standard for dissimilar systems to communicate. However, in addition to information, the Aion network will pass logic and value among participating blockchains to create a contiguous value chain where every transaction occurs on-chain, with logic and value passing among chains as freely as liquid assets.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/03b0978-1.PNG",
        "1.PNG",
        1472,
        980,
        "#f7f7f7"
      ],
      "caption": "Example of a simple multi-tier blockchain network, consisting of all the major actors"
    }
  ]
}
[/block]
These infrastructures, protocols, and concepts will work together to guarantee transmission from an origin to its destination through inter-chain communication. The value of these technologies is that they enable one blockchain to transact with another blockchain, as well as one blockchain to transact with every connected blockchain.

[block:api-header]
{
  "title": "Connecting Networks"
}
[/block]
Connecting networks are networks that facilitate interchain communication and interchain transactions between multiple private or public blockchain networks. Connecting networks are defined by requirements that specify their role within the context of the Aion network. Connecting networks and interchain transactions provide a universal interface that enables blockchain developers and users to route messages from one network to another. Specifically, a connecting network should provide the following core functionalities:
* Route messages between different blockchain networks through a common bridging protocol that involves translation and propagation of the message, which must be considered final
* Provide decentralized accountability
* Provide a bridging protocol

Aion network protocols specify standards for the external components. While the actual functionality and internal components of each connecting network might vary by vendor and intended purpose, these core functionalities should be implemented.

Point-to-point connections such as inter-blockchain relays or purpose-specific networks such as BTC Relay exist as central hubs. Such protocols, while simple and efficient, often result in complicated state channels that can give rise to contentious situations and are often at the mercy of one or a select group of individuals that run the relaying networks.

A connecting network instead uses bridges and a trust-free blockchain network to validate and ensure the correctness of flowing transactions. By introducing a third party that routes messages from point A to point B, the networks themselves do not have to manage difficult
or unclear situations.

### Inter-chain Transactions

An inter-chain transaction is a trust-free message between blockchain networks, a critical infrastructure component powering inter-chain communication. Inter-chain transactions allow any connected blockchain networks to exchange information, like computers on the internet.

Inter-chain transactions are initially created on a source blockchain and then processed and forwarded by bridges and connecting networks
before finally reaching the target blockchain. As stated previously, the creator of an inter-chain transaction must pay a transaction fee for the communication cost using AION tokens, thereby incentivizing all the participants in each junction of the route.

Inter-chain transactions are designed to be somewhat analogous to packets by specifying the hops they should perform from the source to target network, which potentially means passing through numerous connecting networks.

Ideally, the inte-rchain transaction format would include three parts:
* Payload data that is specific to the creator and is typically regular transaction data, but potentially could be extended to arbitrary
data, at the discretion of the creator and the source network.
* Metadata about the inter-chain transaction that contains routing information and fees.
* Merkle proof that is only used when the sender wants to bypass the bridge.
The bridge and connecting network validators shall not interpret the data, but do check the integrity of the transaction as a whole. Privacy sensitive information applications could choose to encrypt the data if necessary.

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/844f426-2.PNG",
        "2.PNG",
        1156,
        490,
        "#e7e7e8"
      ],
      "caption": "Visual depiction of an inter-chain transaction"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Routing"
}
[/block]
The routing of inter-chain transactions is a multi-phase process. In each phase, the validators verify the transaction and reach consensus on whether the transaction should be forwarded or rejected. If a transaction gets rejected at any point, any state change as a result of the inter-chain transaction will be reverted, at least in the connecting network.

The routing path can be divided into two subpaths: the forward path and backward path. In the forward path, an inter-chain transaction flows from the source chain all the way to the target chain. In the backward path, a confirmation of the inter-chain transaction is passed back.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/2f5c253-3.PNG",
        "3.PNG",
        1495,
        719,
        "#fbfbfb"
      ],
      "caption": "Depiction of an ICT lifecycle, beginning with emission from chain A, and ending with confirmation"
    }
  ]
}
[/block]
If a bridge refuses to broadcast an inter-chain transaction for any reason, the sender may choose to pass the inter-chain transaction, including proof, directly to the connecting network. The connecting network will validate the inter-chain transaction based on its knowledge of a merkle hash chain of the participating network and broadcast it if valid.

The design of the interchain transaction is still under consideration and a detailed paper on the workings of interchain transactions will be published as the project progresses.

[block:api-header]
{
  "title": "State"
}
[/block]
Interchain transaction state is introduced to represent the different stages/status of a transaction from the perspective of the connecting network.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/e0bb159-4.PNG",
        "4.PNG",
        1238,
        508,
        "#fbfbfb"
      ],
      "caption": "Flow chart of the possible states that can occur within the lifetime of an ICT"
    }
  ]
}
[/block]
* When an inter-chain transaction is observed in the participating network by the bridge validators for the first time, the state changes to received.
* If over two thirds of the bridge validators vote yes for the inter-chain transaction, the connecting network will change the state of the inter-chain transaction to on hold, which will trigger an event where a corresponding connecting network token will be locked until the transaction is processed.
* If less than two thirds of the bridge validators vote yes for the inter-chain transaction, the state changes to rejected.
* The on-hold transaction will be forwarded by bridge validators that connect the connecting network and the next blockchain on the route.
* Once a confirmation is received from the target blockchain, the state changes to confirmed.
* If no confirmation is received, the state changes to timed out.
* For confirmed interchain transactions, the state changes to finalized and all locked fees are distributed to the connecting network and bridge validators.
[block:api-header]
{
  "title": "Bridges"
}
[/block]
A bridge is a communication protocol that facilitates communication between the participating network and the connecting network. A bridge is composed of its own distinct network of validators that assures translation of protocols and accountability between networks.

Bridges are directional; the source blockchain is the chain where transactions are emitted and the target blockchain is the chain where the transactions are forwarded.

A bridge has two main responsibilities:
* Signing and broadcasting an inter-chain transaction only if they have been sealed in the source blockchain and an inter-chain transaction forwarding fee has been paid.
* Informing the connecting network of the merkle hash updates of the participating network.

Bridge validators will use a lightweight BFT-based algorithm to reach consensus. Transactions get approved only after receiving over two thirds of the total votes (weighted).

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/b7adc5c-5.PNG",
        "5.PNG",
        1429,
        869,
        "#f9f9f9"
      ],
      "caption": "High level overview of bridge to connecting network relationship"
    }
  ]
}
[/block]

For more technical details - you can read all about it [here](https://aion.network/media/en-aion-network-technical-introduction.pdf)!