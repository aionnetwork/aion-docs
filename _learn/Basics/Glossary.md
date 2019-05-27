---
title: "Glossary"
excerpt: "Blockchain made simple. Get to know the crazy mumble jumble of blockchain terms! Written in humanly terms so that anyone can understand."
---
## ABI
ABI  stands for Application Binary Interface. An ABI is always linked to an application, and it essentially describes what that application does. It acts as a map of the application so that other programs can refer to the map rather than searching through the application itself.

## Address
Imagine it's your birthday and your friend wants to send you a birthday card. They need to know what your house address is before they can send you the card. Addresses work the same way in Aion. If your friend wants to send you some AION, they need to know your address. Each address is unique and is 66 characters long. Every single Aion address starts with 0xa. 

Aion Address:
`0xa0e51f852783e5edd470657e8e3581b091816c37aa783e7e52f3a4638d16349c`

## AION
The native asset of the Aion blockchain. It can be used to as a form of payment (transfer of value) to others, [NRG](#section-nrg) costs for transactions, and rewarding network operators for [mining](#section-mining). 

## Block
A block that holds a group of blockchain transactions. For example, think of a block like a package of cookies. There's a set number of cookies that a box can fit. Each cookie in the box represents a transaction (whether it's a cryptocurrency transaction or smart contract transaction). 

## Blockchain
Made of two words: block and chain. Simply put, it is a chain of blocks that are lined and secured by cryptography. Commonly described as a "digital ledger" which stores data in a distributed network. For example, imagine everyone on their computers had a live spreadsheet that had information on how much everyone has, and blockchain is the network that when the spreadsheet gets updated, so does every other copy. The records are public and verifiable and since there is no one computer that owns the spreadsheet - it's harder to hack. 

Learn more: [What is a Blockchain?](doc:what-is-a-blockchain-network) 

## Block Rewards
When a miner has successfully mined (*'created'*) a block - they get a reward by collecting the transaction fees (*'that others sent'*) and coins as a reward. Block rewards are great incentives for miners to keep mining the network - powering the blockchain.

## Byte Code
Computers aren't very good at understanding human language. When they get given a bunch of code, they have to translate it into simple instructions before they can do anything with it. Once they have a step by step guide on what to do, then they can actually run the code.

Byte code is a bunch of instructions that a computer can understand. It's not designed to be easy for a human to read (it actually looks super confusing), but that's not the point. It's designed to be as efficient as possible for the computer to understand.

When a program gets compiled with Aion, it gets translated into byte code. This code is then run by other computers on the network. Again, this code isn't designed to be understood easily by humans. It's designed to be super easy for computers to understand.

## Cryptocurrency
Digital money that operates on top of the blockhain technology. Since it runs on a blockchain network, there is no need for a third party to maintain it (hence, decentralized). Cryptocurrency can be transferred from one use to another without going through an intermediary such as a bank.

## dApp
A decentralized application. Regular applications like Netflix and Wikipedia generally has two points of contact, your computer, and their servers.

This is what happens when you want to view an article on Wikipedia:
1. You click on a link to view an article.
2. The Wikipedia receives your request.
3. It searches for the article in the Wikipedia database.
4. It sends the article back to you.
5. Your computer shows it on the screen.

This is how the majority of the internet works. There are some differences between server technologies and new browser processes, but this is basically what everything boils down to. You request something from a server, and the server sends it back to you.

There are some problems with this method, mainly about making sure the data you receive is correct. For example, if someone wanted you to see an edited version of an article, all they have to do is change it on the Wikipedia server. There is no way to guarantee that what you are reading is the correct, unaltered article. Some of you may point out that there is a section at the bottom of each Wikipedia article that states when it was last edited, which is correct. But how do you know that the last edited section hasn't also be altered by a hacker covering their tracks?

In a decentralized application, the user asks a large network of computers for the article, and they collectively respond with all the data. This way the user can be 100% sure that the article they are getting back is completely correct since every single computer on the network has to send the exact same article. If one of the computers tries to change the article, all the other computers will disagree with the change, and it will be obvious that something isn't quite right.

## Decentralized 
This term appears in a lot when talking blockchain. It refers to a system that does not have a central point of control or authority to verify/confirm/keep transaction data, such as a traditional banking system.  Each computer that is connected to the blockchain has a unique version of all the data received and stored on the network, and not only just a copy of the data. This makes the system 'crowd-maintained' with no one person/organization that can alter the data. 

## Decryption
Process of turning cipher-text (looks like meaningless and random data) back into plain text. 

## Digital Signature
A digital piece code that says you have signed this transaction to do a certain functionality, such as a transfer of coins or calling a smart contract) with your information. 

## Encryption
Process of turning normal text message (plain text) into cipher-text. 

## Fungible
Having two things that are exactly the same in value. A single $10 bill has exactly the same value as two $5 bills. It's the same with most cryptocurrencies. My Bitcoin 1BTC has the exact same value as your Bitcoin 1BTC. Another word for this is interchangeable.

**Non-fungible** on the other hand, is the opposite. This is when two things don't have the same value. My bottle of wine is worth $30, but yours is older and from a more prestigious vineyard, so it's worth $100.

## Fork
Like a fork in the road, the blockchain gets split into two separate blockchains, that run parallel on different parts of the network. 

## Genesis Block
This is the very first block on a blockchain. When a builder is building a wall, they must place the first brick and secure it in place before moving onto the next brick. When the builder has finished building the wall, every single brick on the wall can be traced back to the original brick.

In a similar way, every single block on the Aion blockchain can be traced back to the genesis block. Knowing where the genesis block is, or what was on it, isn't really important for day to day Dapp development. But it is useful to figure out how old a particular block is. If you know when the genesis block was made, and how far away the current block is from the genesis block, you can figure out how old the current block is.

## Mining
Since there are no banks or any intermediary that verifies and confirms transactions on the blockchain, how does the network verify the sender actually has the funds that they're trying to send?

By mining, which is the process of using advanced computers to confirm all the transactions on a blockchain. The computer itself is the 'miner'. The person or organization that holds the miner gets to collect the [rewards](#section-block-rewards) that are granted when a [block](#section-block) is successfully mined. 


## Node
A node is a computer that is connected to a network. In our case, each node is running the Aion kernel. Each node talks to other nodes on the network to do things like run applications, or confirm transactions.

## Nonce 
A nonce is a Number that is only used once. In cryptocurrency, it's used by miners to guess the solution to a math problem. Sounds a bit odd, but let us explain.

For miners to get a reward, they have to solve an incredibly difficult mathematic problem. This problem has a single answer. The problem is so difficult that it would take an incredibly long time for a single computer to find the solution, but a few hundred computers can usually find the answer pretty quickly.

Imagine that the miners had to figure out which number, when multiplied by 9, makes 36. A miner could start guessing which number is the correct answer. They'd start at 1, but figure out that 1 x 9 = 9. So then they'd give 2 a go, but find out that 2 x 9 = 18. So they'd try 3, but find 3 x 9 = 27. Finally they'd try 4 x 9 and get the answer 36. This is the answer that the miners were looking for, so that makes 36 the nonce.

## NRG
When you go to the post office to deliver a parcel, you need to pay the post office clerk money to deliver the parcel. How much money depends on how big the parcel is, where it is going, and how fast you want it to get there.

NRG and blockchain networks work in a similar way, except instead of a parcel, there is a transaction. And instead of a post office clerk, there is a blockchain miner. You ask the miner to put your transaction on the blockchain. They look at it, figure out how much work it will take them to do that, and then ask you for a fee. Once you pay the fee, they take your transaction and put it on the blockchain.

In this case, the fee is NRG, which is a fancy way of saying very small amount of Aion coin.

## Parent Hash
Just like every human has a biological parent, every single block in a blockchain has a parent. Block #5 was preceded by block #4, and block #3 came before that, and so on. This goes all the way back to block #1, also called the genesis block. That bit's pretty simple. The parent of a block is the block that came before it.

The hash part is something different. When a block is put together, a complicated math equation is ran against it, which gives us a bunch of numbers and letters. These numbers and letters (called a hash) look random, but they can actually be used to find out what information the block contains. Every single block has a hash associated with it, and each hash is exactly the same length (they all have the same amount of letters and numbers). Also, each block has a completely unique hash. No two blocks will ever have the same hash.

## Private Key
This is the password for your [address](#section-address). It contains a unique combination of letters and numbers that allow access to your address and is used to sign transactions you send to the network. It must **never** be revealed to anyone but you.

## Protocols
Protocols are a set of formal rules that describe how to interact with the network and exchange data.

## Smart Contracts
Smart contracts are contracts whose terms are recorded in a computer language instead of legal language, and stored on the blockchain. These contracts will automatically execute when a certain condition is met. A great analogy is to image smart contracts as a vending machine. You have to pay money in exchange for a bag of chips. If you don't put enough money in, the chips won't fall - thus you have to satisfy the condition of paying the actual price of the chips in order to receive them. There is no human interaction verifying that you've paid, but rather a program that can verify that you satisfied the conditions and executed itself. 

Check out our [Smart Contracts](doc:smart-contracts) section!

## Solidity
Solidity is a programming language that can be converted into byte code and ran on an Aion node. It was originally created by the Ethereum foundation to run on Ethereum nodes. It looks very similar to JavaScript but contains more features that help it run on a blockchain network.

## Testnet
A test version that is like the main network blockchain, but allows developers to test and develop before their code and application before deploying it on the real network. 

## Transaction Fee
All transactions that happen on the network, whether you're sending cryptocurrency or interacting with a decentralized application, involves a small transaction fee, [NRG](#section-nrg) . These fees are then gives as [rewards](#section-block-rewards) to the miner that successfully mines a block.  

## Wallet
Similar to your mobile wallet where you store your payment details such as your cards, bank accounts etc. A cryptocurrency wallet allows you to store different cryptocurriences, like AION. You will need a digital wallet in order to send and receive your digital assets.