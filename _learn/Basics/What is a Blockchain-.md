---
title: "What is a Blockchain?"
excerpt: "For those just getting familiar with blockchain technology, consider learning more about what a blockchain network is and why it's possibly the most important human invention since fire.you also get to learn about the Aion blockchain; a multi-tier blockchain network and its modules."
---
[block:api-header]
{
  "title": "Great for cat pictures, not so for digital banknotes."
}
[/block]
To understand the value of the blockchain, we need to take a look at the value that the internet has created. The transformation of our society under influence of this global network is an established fact. One of the reasons for the internet's impact is its function as an instant and global copy-machine. 

This instant-copy property is extremely useful. For example, if I have a cute picture of my cat Kazu on my phone, I can send it to you and yet still retain the photo on my phone. Moreover, I can send it to many other people and still keep my copy, and the people who’ve received the photo can choose to share it with others. All this transfer of data occurs at zero marginal cost. Through this, Kazu, my cat can become world-famous. 

Over a decade ago, people set out to research and design digital cash. The idea was that this would enable us to send ‘value’ over the internet, just as easy as sending a cat picture. The most obvious problem faced was the *double-spend problem*.

If I have an “electronic coin” on my computer, and I say I will send it to you, what is there to stop me from sending it to others as well? Or, what if the person who receives the coin duplicates it to make 10 copies?

## Introduction of third parties
Currently, we often use third parties to solve this problem of double-spending. Third-parties such as banks and online payment systems play an important role in the transfer of value over the internet. 
[block:api-header]
{
  "title": "How does transfer of value work now?"
}
[/block]
Let's suppose Joe wants to send some dollars to Alice, and both parties decide to use PayPal. Joe tells PayPal to send Alice the amount, PapPal verifies Joe has enough money on his account, then deducts the agreed amount from Joes's account and adds the dollar value to Alice's account. Depending on the type of transaction, PayPal takes a cut from Joe, Alice, or both.

This transaction introduces some difficulty, as the two parties need to find a third party they both can trust, that third party needs to be willing and able to handle requests from both Alice and Joe.
[block:api-header]
{
  "title": "What if we cut out the middlemen?"
}
[/block]
The innovators from over a decade ago came to the conclusion that we needed to keep a record to trace the coins from one user to the next. This would be by keeping a ledger of the transactions that recorded what Joe sent to Alice, and using exactly what coin.

Now, if Joe tried to send that same coin to Eve, we will deny that transaction because in our ledger  we know that Joe already sent the coin to Alice, and doesn't have it anymore.
[block:api-header]
{
  "title": "Consensus"
}
[/block]
**Who will keep this ledger?**

The answer was as simple as it was genius: "We all do! We just need to agree.". 

The first big implementation of blockchain was done by an individual (or group os people) under the pseudonym of "Satoshi Nakamoto". It was called Bitcoin. This implementation involved a whitepaper and the core software for the Bitcoin blockchain.

People could run this program on their computer to become a recordkeeper and a validator of transactions. The entire network of connected computers had to agree on which transactions were valid and needed to be updated on the public ledger . 

Once the nodes (the computers running the blockchain program) have found enough of these valid transactions (or after an amount of time pre-determined by the blockchain software), the nodes will try to make a' 'block'. To do this, they will need to solve a complex mathematical puzzle, using the transactions they want to include as "pieces". This takes significant computer power and is usually referred to as 'mining'. 

If one node solves this puzzle, it announces it to the other nodes in the network. While the puzzle is complex to solve, it's very easy to verify. When the other nodes see a new block announced, they will verify it. When all the nodes have agree this block is valid, they have reached consensus, and the transactions will be sealed in a block then included in the blockchain.

From there on, the nodes start the process again, looking for valid transactions, verifying them and trying to make a new block.
[block:api-header]
{
  "title": "Centralized, decentralized, distributed"
}
[/block]
We can consider PayPal a **centralized** system, as to get money from Alice to Joe, both need to interact through PayPal. 

We can consider a more 'classic' bank transfer **decentralized**: if Joe wants to send to Alice, he gives an order to his bank, which then contacts Alice's bank to credit her account.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/3a6122c-hbgKYwe.png",
        "hbgKYwe.png",
        1699,
        1201,
        "#f2f2f2"
      ],
      "caption": "Baran, P. (1964). On Distributed Communications, Memorandum RM-3420-PR. Santa Monica, Calif.: RAND Corporation. Available at: http://www.rand.org/content/dam/rand/pubs/research_memoranda/2006/RM3420.pdf"
    }
  ]
}
[/block]
A blockchain, however, is **distributed**. There is not one party like PayPal, nor are there different parties with uneven roles likes banks and clients. Everyone running a node is equal in the system, and the settlement of balances and state are handled by consensus.


[block:api-header]
{
  "title": "Immutability"
}
[/block]
Once a transaction is included in a block, it can *never* be changed or removed.

Since every computer connected to the chain has a complete copy of the blockchain, it is almost impossible to target and hack. If an attacker was to attempt and maliciously alter the blockchain, they would have to simultaneously hack more than half of the computers (or nodes) connected to the network.

One of the pieces needed to solve the puzzle for a new block is a code from the previous block, so every block is linked to the others. We call these linked blocks a chain of blocks, or, as you guessed it, a **blockchain**.

[block:callout]
{
  "type": "success",
  "title": "This page was created by our community!",
  "body": "As part of our Content Creation Bounty, members of the Aion community helped build this page. We have reviewed and edited it, and would love to share the amazing content. Feel free to make suggestions to this page, or learn how to [become a content creator](https://aion.network/bounty/content-creation-bounty/) yourself."
}
[/block]