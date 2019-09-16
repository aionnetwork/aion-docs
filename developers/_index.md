---
title: Developer Quickstart
description: Blockchain development has a workflow that is significantly different to other types of software development. It's important to have a solid understanding of this workflow before you jump into the deep-end. We've created this application so that you can write, test, deploy, and call a Java contract all from within your browser. There's a huge amount of stuff we're not going to go into on this page. So once you've finished up here, we suggest taking a closer look into either the IntelliJ or Maven CLI sections to get a thorough understanding of the available functions within those tools.
header_image: /developers/images/developers-header.png
---

## Write and Compile

First up is writing and compiling your contract. Compiling your software before you deploy it might not be a big issue for any current Java developers out there, but if you've come from the web development world then this step might not be too familiar. All you need to know right now is that before an application can run on the Aion network, it needs to be passed through a Java compiler.

> Below here is a simple Java class. The user can set the `myStr` variable, or call the `getString()` method to find out what the string is. Fill in the **Default String** field below to change the default value of the `myStr` variable, then hit **Compile**.

{{< developers-quickstart/write >}}

---

## Test

Next up is testing. Because of the nature, speed, and permanency of blockchains, making changes to an application after deployment is either incredibly difficult or impossible. So you want to make sure that the application you're creating is doing what you want it to do. The Aion ecosystem comes with a suite of tests straight out of the box. Take a look at the [Test and Debug](basics-test-and-debug-end-to-end) section for more details.

> The test below checks whether the `getString()` method in our code above actually works. Hit the **Run Test** button below to see the results of the test.

{{< developers-quickstart/test >}}

---

## Deploy

This section comes in two phases: loading an account with some test coins, and actually deploying the application. All deployments and transactions on the Aion network require coins or tokens in order to process. Luckily, because we're on a test network, these tokens don't hold any actual value, so we can get some for free!

### Load an Account

> Click the **Create Account** button below to generate a brand new account! If you'd like to see more information about the account (such a `nonce` or `private-key`), take a look in the browser console. Once you've got an account, click **Get Funds** to grab some free _test tokens_ from the network.

{{< developers-quickstart/load-an-account >}}

### Deploy the Application

> Once you’ve got funds in your account you can deploy your application! Click the **Deploy** button to send your application to the network.

{{< developers-quickstart/deploy >}}

---

## Call

Now that everything's stored on the network, we can ask the blockchain what the value of the `myStr` variable is. If everything went correctly, it should be the value that you set back in the [Write & Compile step](#write-and-compile).

> Now that your application is on the blockchain you can call it! Click the call button to see the response from the network.

{{< developers-quickstart/call >}}

---

## Next Steps

That's pretty much the whole process! Next up is to try your hand at doing all this manually. Checkout the [IntelliJ](tools-intellij-plugin-end-to-end) or [Maven CLI](tools-maven-cli-end-to-end) end-to-end guides to get a full run-down on how to use those tools.

{{< developers-quickstart/scripts >}}
