# Getting Started

So you want to build contracts on the Aion network? This site contains all the information you need to start building a solid backend for your applications.

## Understand Blockchain

The first blockchain started as a research project. Satoshi Nakamoto wrote the paper _Bitcoin: A Peer to Peer Electronic Cash System_ in 2008 in which he described a way of transferring value from one person to another without the need for physical currency or banks. Bitcoin itself is a very simple blockchain. At its core, it's just a list of accounts and the value held within them. In 2014 people realized that blockchains could be used to run small programs and a way to transfer money safely. The Bitcoin protocol isn't particularly well equipped for programs, so in 2015 Vitalik Buterin co-created Ethereum which allowed developers to create _smart contracts_ on a blockchain. Ethereum vastly improved the usability of blockchains and attracted the attention of companies like Microsoft, Bank of America, and Google.

### How they Work

Blockchain networks look like regular networks, with a group of computers all connected. However, they differ in the way that programs and applications run. On a regular network when a user wants to find the results of an application, they send the request to a particular server who runs a program and returns the answer to the user. An issue with this process is that there isn't any way to verify that the response the user got from the server is correct, or that the program the server ran was the program the user requested.

On a blockchain network when a request is sent from the user to the network, all the computers run the program and agree on the answer before sending it back to the user. This way the user can verify that the answer is the correct answer and that the correct program was run in the first place. Calling a program is refered to as a _transaction_. All transactions are saved in a database and shared with all the other computers on the blockchain network. Because of this, users can prove that they performed a certain action. For more information on how blockchains work, checkout the [Blockchain Concepts section](/developers/fundamentals/blockchain-concepts/overview).

### Account Management

One aspect of blockchain development that you need to understand is how accounts work. Everytime a transaction is made, the person making the request must pay a fee. This fee goes towards paying the network for the use of it's machines. It also acts as a kind of DDoS prevention, since it would be expensive for an attacker to spam the network with multiple transactions. The cost of the transaction depends on what the user wants to happen. Deploying a contract, making a request to a contract, and transfering value from one account to another all have different costs associated with them.

### Multiple Blockchains

So why are there so many different blockchains? The vast majority of blockchains are built on the Ethereum network, and they are all trying to address different problems within the blockchain space. Some are focused on the speed in which transactions can take place, others are trying to create the most stable network. The Aion network is different because it doesn't use any of the Ethereum infrastructure. The computers on the Aion blockchain run something called the [Aion Virtual Machine](/developers/fundamentals/aion-virtual-machine/overview). This virtual machine was created using the Java virtual machine, an incredibly robust and well tested virtual machine. Having a strong and well built virtual machine allows the Aion network to maintain it's _state_ and pass on that stability to developers building on the network.

## General Workflow

The workflow for blockchain development is fairly similar to regular application development. The major differences are surrounding deployment and user interaction. The basic process goes like this:

1. [Write](#write)
2. [Test](#test)
3. [Compile](#compile)
4. [Fund](#fund)
5. [Deploy](#deploy)
6. [Interact](#interact)

### Write

Aion applications are written in Java and can use all the available benefits already available to Java developers. There's no need to re-invent the wheel. There are some limitations when it comes to classes and programming methods however. Java classes that are not deterministic have been disabled within the Aion Virtual Machine due to restrictions and security concerns. While some of these classes are perfectly safe to use in regular Java applications, due to the nature and immutability of smart contracts they can pose a threat to the blockchain network. A list of available classes can be found on the [JCL Whitelist page](/developers/fundamentals/aion-virtual-machine/jcl-whitelist).

### Test

Because of the nature, speed, and permanency of blockchains, making changes to an application after deployment is either incredibly difficult or impossible. So you want to make sure that the application you’re creating is doing what you want it to do. The Aion ecosystem comes with a suite of tests straight out of the box.

### Compile

Compiling your software before you deploy it might not be a big issue for some developers out there, but if you’ve come from the web development world then this step might not be too familiar. Since the applications are written in Java, it just has to be fed through the `javac` compiler.

### Fund

As [previously mentioned](#account-management) every transaction requires a fee be paid. The money for this fee must be within you account before you can deploy anything. Luckily, there is are ways to get your applications deployed onto a test network for free! Services called _faucets_ exists that will give you test tokens for free that you can use to pay the test network. Once you are happy with your blockchain application running on the test network, you will have to fund your account with _real-world_ `AION` tokens in order to push things to the main network.

### Deploy

Now that you've got funds in your account you can send your contract to the network and get it deployed! This is a fairly simple process, with the main issues coming from lack of funds within your account. Once everything's deployed, you'll be given a _contract address_ which you can use in the _interaction_ step!

### Interact

Finally we can start interacting with your contract. Frameworks like Web3.js and Ethers.js abstract the complicated JSON-RPC layer and make interacting with the network much simpler. Aion specific features like the ABI serializer and Class Optimizer help speed up the contract itself, and make dealing with complicated networks much easier!

## Contract Tooling

Because the Aion network is built within the Java ecosystem, you are free to use any Java tooling you wish. However, we've created a couple of contract toolsets that can help speed up your development.

### Maven CLI

Maven might sound familiar to any current Java developers out there. At it's heart Maven is a build automation tool used primarily for Java projects, and we've laveraged it to help you build your Java contracts. Coupled with the Aion Virtual Machine, the Maven CLI toolkit allows you to write, test, deploy, and interact with your contract from whatever text-editor you prefer. You just need a terminal!

This toolkit comes with something called the _embedded AVM_, which is essentially a local version of the Aion Virtual Machine that runs on your computer. However, unlike other virtual machines, the embedded AVM only runs when given a command from Maven, so it takes up a few resources as possible! You can even create Java contracts on the tiny [Raspberry Pi](//www.raspberrypi.org/) micro-computer!

### IntelliJ Plugin

IntelliJ is an excellent IDE created by JetBrains. The Aion4j plugin is a completely free and open-source plugin available to Java contract developers. The plugin helps speed up contract development by not requiring developers to leave the IntelliJ interface for anything! You can create, test, compile, and deploy contracts right from within the IDE. The plugin also features some incredible account management features that allow you to create, delete, fund, and transfer accounts all without leaving the IntelliJ interface.

The Aion4j plugin also uses the _embedded AVM_, similar to the Maven CLI. However, IntelliJ simplies Java contract projects by hiding everything behind a friendly, easy to use interface.

## Interaction APIs

Once you've got your _backend_ contract written, it's time to create a way for users to interact with it! Computers on the Aion network communicate with each other using [JSON-RPC](https://github.com/aionnetwork/aion/wiki/JSON-RPC-API-Docs). While fast and robust, JSON-RPC is cumbersome to use and can quickly become too complicated. With that in mind, there are multiple frameworks available to simplify the communication between users and the network.

### Web3.js

<!-- TODO: What is this? JS Framework that lets you call from and send requests to the blockchain. -->
<!-- TODO: Define use cases -->

### Ethers.js

<!-- TODO: What is this? JS Framework that lets you call from and send requests to the blockchain. -->
<!-- TODO: Define use cases -->

### Web3J

<!-- TODO: What is this? Java build-tool that lets your standard Java app talk to the blockchain. -->
<!-- TODO: Define use cases -->
