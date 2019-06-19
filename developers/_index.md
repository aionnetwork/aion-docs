---
title: Developer Quickstart
description: New to Blockchain Development and don't know where to start? Follow this quickstart through understand the general workflow of blockchain development.
---

## Write & Compile

First up is writing and compiling your contract. Compiling your software before you deploy it might not be a big issue for any current Java developers out there, but if you've come from the web development world then this step might not be too familiar. All you need to know right now is that before an application can run on the Aion network, it needs to be passed through a Java compiler.

> Below here is a simple Java class. The user can set the `myStr` variable, or call the `getString()` method to find out what the string is. Fill in the **Default String** field below to change the default value of the `myStr` variable, then hit **Compile**.

{{< developers-quickstart/write >}}

---

## Test

Next up is testing. Because of the nature, speed, and permanency of blockchains, making changes to an application after deployment is either incredibly difficult or impossible. So you want to make sure that the application you're creating is going to work, and won't fail at some point in the future. The Aion ecosystem comes with a suite of tests straight out of the box. Take a look at the [Test and Debug](/developers/test-and-debug) section for more details.

> The test below checks whether the `getString()` method in our code above actually works. Hit the **Run Test** button below to see the results of the test.

{{< developers-quickstart/test >}}

---

## Deploy

This section comes in two phases:

- Loading an account with test coins.
- Deploying the application.

### Load an Account

To deploy an application to a blockchain, you need to pay the network. So you need to create an account, add funds into it, and then you can use that account to deploy your application. The easiest way to create an account is to use an online browser wallet like [AIWA](/developers/tools/wallets) and [Syna](/developers/tools/wallets). Once you've got your account you can add funds to it. If you're just testing your application, you can use a test network like Mastery. Since these
test networks don't have any real value, you can get free _test tokens_ from _faucets_.

{{< developers-quickstart/load-an-account >}}

### Deploy the Application

Once you've got funds in your account you can deploy your application. The most popular methods are through the Aion IntelliJ plugin, through the Maven CLI tool, or through a JavaScript framework like Web3.js or Ethers.js.

{{< developers-quickstart/deploy >}}

---

## Call

Now that your application is on the blockchain you can call it! The easiest way is either through IntelliJ or the Maven CLI tool. If you want to link up your blockchain application to a frontend, you can use a JavaScript framework like Ethers.js or Web3.js. These frameworks act as the middle man between your frontend and the blockchain.

{{< developers-quickstart/call >}}

---

## That's It

That's pretty much the whole process! Depending on which tools you use, and where you want to deploy your application to, there may be some changes. For example, if you're deploying an application to the main Aion network, then you'll need to get actual `AION` coin from an exchange.

{{< developers-quickstart/scripts >}}
