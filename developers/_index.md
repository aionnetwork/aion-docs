---
title: Developers
description: This space is for developers to get their hand dirty working on the Aion network. These pages contain code example, API references, and workflow tutorials for the various parts of the ecosystem. If you're new to blockchain programming and want to get involved, then this is the place to be. If you're looking for more general information about the blockchain ecosystem and how you can incorporate it into your project, you should check out one of the other sections.
---

## Quickstart

Blockchain applications follow a 5 step process: `write`, `test`, `compile`, `deploy`, `call`.

### Write

First up is to write your contract. This is the most creative and individual part of the _blockchain development_ process. Since Java is already a widely used programming language, most text editors have syntax support built in. Editors like VSCode, Sublime, and Atom all have great Java linters that help you notice where there might be errors in your code. There's also a bunch of great IDEs available: IntelliJ, Eclipse, and NetBeans are the top three.

### Test

Next up is testing. Because of the nature, speed, and permanency of blockchains, making changes to an application after deployment is either incredibly difficult or impossible. So you want to make sure that the application you're creating is going to work, and won't fail at some point in the future. The Aion ecosystem comes with a suite of tests straight out of the box. Take a look at the [Test and Debug](/developers/test-and-debug) section for more details.

### Compile

This section comes in two phases:

- Loading an account with test coins.
- Deploying the application.

#### Load an Account

To deploy an application to a blockchain, you need to pay the network. So you need to create an account, add funds into it, and then you can use that account to deploy your application. The easiest way to create an account is to use an online browser wallet like [AIWA](/developers/tools/wallets) and [Syna](/developers/tools/wallets). Once you've got your account you can add funds to it. If you're just testing your application, you can use a test network like Mastery. Since these
test networks don't have any real value, you can get free _test tokens_ from _faucets_.

#### Deploy the Application

Once you've got funds in your account you can deploy your application. The most popular methods are through the Aion IntelliJ plugin, through the Maven CLI tool, or through a JavaScript framework like Web3.js or Ethers.js.

### Call

Now that your application is on the blockchain you can call it! The easiest way is either through IntelliJ or the Maven CLI tool. If you want to link up your blockchain application to a frontend, you can use a JavaScript framework like Ethers.js or Web3.js. These frameworks act as the middle man between your frontend and the blockchain.

### That's It

That's pretty much the whole process! Depending on which tools you use, and where you want to deploy your application to, there may be some changes. For example, if you're deploying an application to the main Aion network, then you'll need to get actual `AION` coin from an exchange.

## Blockchain 101

Developing on a blockchain has some key differences with other types of development.

### Compiling

First up, blockchain applications need to be compiled before they can run. This isn't specific, and may not be an issue for any current Java or C++ developers out there. There's plenty of languages that require programs to be compiled before they can run. However, developers from a web development background may consider this a substantial change in their workflow. The actual process of compiling your code is very simple, however, the way to test things changes slightly. In a standard
JavaScript environment you can just throw a `console.log` into the script, refresh the webpage, and view the browser console to see the outcome. This is less easy to do in Java development. As such, there is a heavier reliance on _code linters_ and testing.

### Test Driven Development

Due to the nature of blockchain development, things take time. Requests take time to be sent to a node, responses take time to be calculated, and transactions take time to be propagated through the network. Because of this, test-driven development is ket to creating stable, efficient, and useful applications on the blockchain. The Aion platform has testing built in, with unit tests being created automatically as soon as you create your project!

### Permenancy

For a lot of people and applications, the idea of a permanent, immutable database is one of the main reasons to use blockchain technology. It should also be noted that this can cause some issues, especially in poorly designed or untested software. The only strengthens the importance of proper testing and quality assurance processes.

### Accounts and Funding

In order to deploy and call applications on the blockchain, you need funds called _coins_ or _tokens_. To get these coins on a test network, you can use one of the free _faucets_ available. These are essentially websites that give you free _test coins_ to deploy your application to a test network. These coins have no value, as the test networks often get reset, and everything on them is wiped clean. 

To get coins in the first place though, you need to have an account. There are several ways to create accounts, the easiest being through a browser wallet. These are extensions to Chrome or Firefox that allow you to interact with your blockchain accounts through your browser.

### Speed

Speed is a glaring issue with blockchain development. The more requests that are being made to a network, the slower the network generally works. There are processes in place to help this issue, but for the most part, blockchains perform substantially slower than regular networks. Because of this, developers need to put some thought into how their users are going to interact with their application, and what to do when waiting for the network to respond to a request. One solution to
this is to make good use of asynchronous processes. They've been around for a while, and they've drastically improved the speed of transactions and processes all around the tech world. They're one of the foundations of blockchain applications. With long processing times sometimes up into the minutes, developers can't expect users to wait until things are done. This is why proper UX and asynchronous process are imperative.

### ABIs

When a blockchain application is compiled, and an application binary interface (ABI) is created. It is essentially a list of all the methods and variables available within the application. While you could just share the source code itself, it can often be a hassle to scroll through an application with hundreds of lines of code, just to find the variable names you're looking for. Instead, ABIs let you easily share the available functions and variables with other developers. They're kind of like mini-docs for your application.
