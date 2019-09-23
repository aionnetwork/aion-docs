# Getting Started

So you want to build contracts on the Aion network? This site contains all the information you need to start building a solid backend for your applications.

## Understand Blockchain

The first blockchain started as a research project. Satoshi Nakamoto wrote the paper _Bitcoin: A Peer to Peer Electronic Cash System_ in 2008 in which he described a way of transferring value from one person to another without the need for physical currency or banks. Bitcoin itself is a very simple blockchain. At its core, it's just a list of accounts and the value held within them. In 2014 people realized that blockchains could be used to run small programs and a way to transfer money safely. The Bitcoin protocol isn't particularly well equipped for programs, so in 2015 Vitalik Buterin co-created Ethereum which allowed developers to create _smart contracts_ on a blockchain. Ethereum vastly improved the usability of blockchains and attracted the attention of companies like Microsoft, Bank of America, and Google.

### How they work

Blockchain networks look like regular networks, with a group of computers all connected. However, they differ in the way that programs and applications run. On a regular network when a user wants to find the results of an application, they send the request to a particular server who runs a program and returns the answer to the user. An issue with this process is that there isn't any way to verify that the response the user got from the server is correct, or that the program the server ran was the program the user requested.

On a blockchain network when a request is sent from the user to the network, all the computers run the program and agree on the answer before sending it back to the user. This way the user can verify that the answer is the correct answer and that the correct program was run in the first place. Calling a program is called a _transaction_. All transactions are saved in a database and shared with all the other computers on the blockchain network. Because of this, users can prove that they performed a certain action. For more information on how blockchains work, checkout the Blockchain Concepts section](/developers/fundamentals/blockchain-concepts/overview).

So why are there so many different blockchains? The vast majority of blockchains are built on the Ethereum network, and they are all trying to address different problems within the blockchain space. Some are focused on the speed in which transactions can take place, others are trying to create the most stable network. The Aion network is different because it doesn't use any of the Ethereum infrastructure. The computers on the Aion blockchain run something called the [Aion Virtual Machine](/developers/fundamentals/aion-virtual-machine/overview). This virtual machine was created using the Java virtual machine, an incredibly robust and well tested virtual machine. Having a strong and well built virtual machine allows the Aion network to maintain it's _state_ and pass on that stability to developers building on the network.

## General Workflow

This is how contract development works:

1. Write
2. Test
3. Compile
4. Deploy
5. Interact

## Contract Tooling

These are the suggested tools for creating your contracts.

### Maven CLI

<!-- TODO: What is it? -->
<!-- TODO: How does the embedded AVM work? -->

### IntelliJ Plugin

<!-- TODO: What is it? -->
<!-- TODO: How does it work with Maven CLI and the embedded AVM? -->

## Interaction APIs

### What we mean by frontend

<!-- TODO: explain what we mean by frontend, and how it works in the blockchain world. -->

### Web3.js

<!-- TODO: What is this? JS Framework that lets you call from and send requests to the blockchain. -->
<!-- TODO: Define use cases -->

### Ethers.js

<!-- TODO: What is this? JS Framework that lets you call from and send requests to the blockchain. -->
<!-- TODO: Define use cases -->

### Web3J

<!-- TODO: What is this? Java build-tool that lets your standard Java app talk to the blockchain. -->
<!-- TODO: Define use cases -->
