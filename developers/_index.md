---
title: Developers
description: This space is for developers to get their hand dirty working on the Aion network. These pages contain code example, API references, and workflow tutorials for the various parts of the ecosystem. If you're new to blockchain programming and want to get involved, then this is the place to be. If you're looking for more general information about the blockchain ecosystem and how you can incorporate it into your project, you should check out one of the other sections.
---

## Quickstart

Blockchain applications follow a 5 step process: `write`, `test`, `compile`, `deploy`, `call`.

---

### Write

First up is to write your contract. This is the most creative and individual part of the _blockchain development_ process. Since Java is already a widely used programming language, most text editors have syntax support built in. Editors like VSCode, Sublime, and Atom all have great Java linters that help you notice where there might be errors in your code. There's also a bunch of great IDEs available: IntelliJ, Eclipse, and NetBeans are the top three.

{{< developers-quickstart/write >}}

---

### Test

Next up is testing. Because of the nature, speed, and permanency of blockchains, making changes to an application after deployment is either incredibly difficult or impossible. So you want to make sure that the application you're creating is going to work, and won't fail at some point in the future. The Aion ecosystem comes with a suite of tests straight out of the box. Take a look at the [Test and Debug](/developers/test-and-debug) section for more details.

{{< developers-quickstart/test >}}

---

### Deploy

This section comes in two phases:

- Loading an account with test coins.
- Deploying the application.

#### Load an Account

To deploy an application to a blockchain, you need to pay the network. So you need to create an account, add funds into it, and then you can use that account to deploy your application. The easiest way to create an account is to use an online browser wallet like [AIWA](/developers/tools/wallets) and [Syna](/developers/tools/wallets). Once you've got your account you can add funds to it. If you're just testing your application, you can use a test network like Mastery. Since these
test networks don't have any real value, you can get free _test tokens_ from _faucets_.

{{< developers-quickstart/load-an-account >}}

#### Deploy the Application

Once you've got funds in your account you can deploy your application. The most popular methods are through the Aion IntelliJ plugin, through the Maven CLI tool, or through a JavaScript framework like Web3.js or Ethers.js.

{{< developers-quickstart/deploy >}}

### Call

Now that your application is on the blockchain you can call it! The easiest way is either through IntelliJ or the Maven CLI tool. If you want to link up your blockchain application to a frontend, you can use a JavaScript framework like Ethers.js or Web3.js. These frameworks act as the middle man between your frontend and the blockchain.

{{< developers-quickstart/call >}}

### That's It

That's pretty much the whole process! Depending on which tools you use, and where you want to deploy your application to, there may be some changes. For example, if you're deploying an application to the main Aion network, then you'll need to get actual `AION` coin from an exchange.

{{< developers-quickstart/scripts >}}