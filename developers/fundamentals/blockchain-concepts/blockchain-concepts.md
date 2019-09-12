---
title: Blockchain Concepts
description: To understand the value of the blockchain, we need to take a look at the value that the internet has created. The transformation of our society under the influence of this global network is an established fact. One of the reasons for the internet's impact is its function as an instant and global copy-machine. 
---

## Great for cat pictures, not Digital Assets

This instant-copy property is extremely useful. For example, if I have a cute picture of my cat Kazu on my phone, I can send it to you and yet still retain the photo on my phone. Moreover, I can send it to many other people and still keep my copy, and the people who’ve received the photo can choose to share it with others. All this transfer of data occurs at zero marginal cost. Through this, Kazu, my cat can become world-famous.

Over a decade ago, people set out to research and design digital cash. The idea was that this would enable us to send ‘value’ over the internet, just as easy as sending a cat picture. The most obvious problem faced was the _double-spend problem_.

If I have an _electronic coin_ on my computer, and I say I will send it to you, what is there to stop me from sending it to others as well? Or, what if the person who receives the coin duplicates it to make 10 copies?

### Introduction of Third Parties

Currently, we often use third parties to solve this problem of double-spending. Third-parties such as banks and online payment systems play an important role in the transfer of value over the internet.

## Transfer Value

Let's suppose Joe wants to send some dollars to Alice, and both parties decide to use PayPal. Joe tells PayPal to send Alice the amount, PayPal verifies Joe has enough money on his account, then deducts the agreed amount from Joes's account and adds the dollar value to Alice's account. Depending on the type of transaction, PayPal takes a cut from Joe, Alice, or both.

This transaction introduces some difficulty, as the two parties need to find a third party they both can trust, that third party needs to be willing and able to handle requests from both Alice and Joe.

## Cut Out the Middleman

The innovators from over a decade ago came to the conclusion that we needed to keep a record to trace the coins from one user to the next. This would be by keeping a ledger of the transactions that recorded what Joe sent to Alice, and using exactly what coin.

Now, if Joe tried to send that same coin to Eve, we will deny that transaction because in our ledger we know that Joe already sent the coin to Alice, and doesn't have it anymore.

## Consensus

**Who will keep this ledger?**

The answer was as simple as it was genius: _We all do! We just need to agree with each other._.

The first big implementation of blockchain was done by an individual (or group of people) under the pseudonym of Satoshi Nakamoto. It was called Bitcoin. This implementation involved a whitepaper and the core software for the Bitcoin blockchain.

People could run this program on their computer to become a recordkeeper and a validator of transactions. The entire network of connected computers had to agree on which transactions were valid and needed to be updated on the public ledger.

Once the nodes (the computers running the blockchain program) have found enough of these valid transactions (or after an amount of time pre-determined by the blockchain software), the nodes will try to make a _block_. To do this, they will need to solve a complex mathematical puzzle, using the transactions they want to include as _pieces_. This takes significant computing power and is usually referred to as _mining_.

If one node solves this puzzle, it announces it to the other nodes in the network. While the puzzle is complex to solve, it's very easy to verify. When the other nodes see a new block announced, they will verify it. When all the nodes have agreed this block is valid, they have reached consensus, and the transactions will be sealed in a block then included in the blockchain.

From there on, the nodes start the process again, looking for valid transactions, verifying them and trying to make a new block.

## Centralized Decentralized Distributed

We can consider PayPal a _centralized_ system, as to get money from Alice to Joe, both need to interact through PayPal. We can consider a more _classic_ bank transfer _decentralized_: if Joe wants to send to Alice, he gives an order to his bank, which then contacts Alice's bank to credit her account.

![The different types of networks.](/developers/fundamentals/blockchain-concepts/images/distributed-system.png)

A blockchain, however, is _distributed_. There is not one party like PayPal, nor are there different parties with uneven roles likes banks and clients. Everyone running a node is equal in the system, and the settlement of balances and state are handled by consensus.

## Immutability

Once a transaction is included in a block, it can never be changed or removed.

Since every computer connected to the chain has a complete copy of the blockchain, it is almost impossible to target and hack. If an attacker was to attempt and maliciously alter the blockchain, they would have to simultaneously hack more than half of the computers (or nodes) connected to the network.

One of the pieces needed to solve the puzzle for a new block is a code from the previous block, so every block is linked to the others. We call these linked blocks a chain of blocks, or, as you guessed it, a _blockchain_.
