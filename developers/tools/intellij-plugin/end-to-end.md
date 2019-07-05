---
title: End to End
description: The Aion4j plugin for IntelliJ is packed with features that can help speed up your contract development. You can compile, deploy, and call your contract to a local or remote node, all from within the IntelliJ IDE. In this section, we're going to be walking through the entire workflow of creating and deploying a Java smart contract to the Aion testnet. You can drop in as particular sections if you want to, or you can follow it through end-to-end.
table_of_contents: true
---

## Prerequisites

- [Java SDK 11^](https://www.oracle.com/technetwork/java/javase/downloads/jdk12-downloads-5295953.html).
- [IntelliJ](https://www.jetbrains.com/idea/) and [Aion4j](/developers/tools/intellij-plugin/install-the-plugin) plugin installed.
- A RPC endpoint.

## Create a Project

IntelliJ and Maven work together to create a basic project template that you can use to build your applications.

1. Open IntelliJ
2. Select **Maven** from the left panel.
3. Click **Create new Project**.
4. Import the **Project SDK**.
5. Check the **Create from archetype** checkbox.
6. Expand `org.aion4j:avm-archetype` and select the latest version.
7. Enter a **Group ID** and an **Artifact ID**. You can leave **Version** as the default.
8. Click **Next**.
9. Leave the Maven defaults selected and click **Next**.
10. Click **Finish**.
11. Wait for the project to be set up. Click `Enable Auto Import` in the bottom right corner pop up window.

![create-project](/developers/tools/intellij-plugin/images/create-project.gif)

## Initialize Project

This step pulls the `avm.jar` file that's going to run all your contracts locally.

1. Right-click anywhere in your project.
2. Select **Aion Virtual Machine** > **Run Initialize**.

## View your Contract

The Aion AVM Maven Archetype includes a sample contract and corresponding unit tests. Within the `src` folder is two directories:

- `main`: This is where the main logic of your application (ie your contracts) are stored.
- `test`: Any tests you use are stored here. The Aion IntelliJ plugin creates some tests for you to use straight away.

To view your contract open `src` > `main` > `java` > the name of your project > `HelloAvm`. This is your contract. By default, it's just a simple _Hello World_ type contract, with a `getString()` and `setString()` method.

![contract](/developers/tools/intellij-plugin/images/the-contract.gif)

## Edit your Contract

We're going to customize this contract a little bit, so you can have a taste of how IntelliJ and the Aion plugin work together.

1. Open your contract in the editor.
2. Remove the `sayHello()` and `greet` functions. Make sure to remove their associated `@Callable` annotations too.
3. Change the `myStr` variable to `String hasn't been set yet.`

## Run Tests and Debug

All the Junit tests for your contract are stored in the `src/test/java/Your project name/` folder, and you get a standard AVM rule test when you create the AVM project called `HelloAvmRuleTest`. The test class has three _actual_ tests `@Test`, and one function that runs at the start of every test `@BeforeClass`. Learn about [AVM JUnit test](/developers/fundamentals/test-and-debug/end-to-end/) if you are not familiar with it.

Since we removed the `sayHello()` function from our contract, the `testSayHello()` function in this test class will fail, so take it out.

To run a test, just click on the `run` button next to the test function.

![Running the testGetString() method](/developers/tools/intellij-plugin/images/test-getstring.gif)

You can also set a breakpoint in your contract and run the test in _debug_ mode, which gives you more information on what's happening in the test.

![Running the test in debug mode](/developers/tools/intellij-plugin/images/debug-getstring.gif)

Finally, you can run all the tests in the class at once by selecting the icon next to the class name.

![Run all the tests](/developers/tools/intellij-plugin/images/run-all-tests.png)

## Deploy to Local

Now we've made some basic changes and ran some tests, we're going try deploying the contract to the local kernel.

1. Right click on the root folder of your project in the navigation panel.
2. Click **OK**.
3. Click **Aion Virtual Machine** > **Embedded** > **Deploy**.

![Deployment Successful](/developers/tools/intellij-plugin/images/deploy.gif)

And you're done. You've just compiled your contract and deployed it to the local kernel. It's that easy.

## Call from Local

Let's try and call the contract we just deployed.

1. Right click on `getString()`.
2. Click **Aion Virtual Machine** > **Embedded** > **Call**.
3. Click **OK**.

You'll be able to see the results of the call in the terminal window.

![Method Call Results](/developers/tools/intellij-plugin/images/method-call-results.png)

Let's try setting a new string.

1. Right click on `setString()`.
2. Click **Aion Virtual Machine** > **Embedded** > **Call**.
3. Enter a new string into the `newStr` field.

    ![Enter a New String](/developers/tools/intellij-plugin/images/enter-new-string.png)

4. Click **OK**.

Now try calling the `getString()` method again. You should be able to see your new string in the terminal window.

## Deploy to Aion network

Deploying to a remote kernel follows the same process as deploying to a local kernel. We just need to grab a node URL, create an account, and add funds into it.

### Remote Node URL

If you've got a node running on your network, grab the URL address. If you're not running your own node, you can grab one from Nodesmith for free!

1. Head over to [nodesmith.io](https://nodesmith.io/) and sign up for free.
2. Once you've logged in, click **Aion** from the sidebar and copy the `mastery` URL from the 2nd line.

Now that you've got a node URL you need to enter it into IntelliJ.

1. In IntelliJ right-click anywhere within your contract, or on the top level folder in the navigation pane.
2. Click **Aion Virtual Machine** > **Configuration**.
3. Paste in your node URL into the **Web3 Rpc Url** field.
4. Click **OK**.

### Account and Tokens

Whenever you deploy something to a live blockchain network, that transaction needs to be paid for with funds from an account. Luckily, when you're deploying to a test network then you can use test-tokens that don't actually cost anything.

First up, let's create an account.

1. In IntelliJ right-click anywhere within your contract, or on the top level folder in the navigation pane.
2. Click **Aion Virtual Machine** > **Remote** > **Create Account**.
3. The terminal window will then print out both your _public address_ and _private key_.

    ![Public and Private Keys in IntelliJ](/developers/tools/intellij-plugin/images/public-private-key.png)

4. Highlight and copy the `Private Key`.
5. Right-click anywhere within your contract, or on the top level folder in the navigation pane.
6. Click **Aion Virtual Machine** > **Configuration**.
7. Paste your private key into the **Private Key** field.
8. Click **OK**.
9. Back in the terminal window, highlight and copy your `Address`.
10. Right-click anywhere within your contract, or on the top level folder in the navigation pane.
11. Click **Aion Virtual Machine** > **Configuration**.
12. Paste your `Address` into the **Account (default)** field.
13. Click **OK**.

So now, we have both our node and account in IntelliJ. But there's one issue, we still don't have any funds. If you call **Aion Virtual Machine** > **Remote** > **Get Balance (Default)**, you'll be able to see in the terminal window that you balance is set to `0 (0.000000000000 Aion)`. So our last step before we can deploy is to add funds into our account.

1. Copy your address again. You can view it by opening **Aion Virtual Machine** > **Configuration** and copying the **Account (default)** field.
2. In your browser, go to [faucets.blockxlabs.com](https://faucets.blockxlabs.com) and sign up.
3. Once you're logged in, click **Aion** and paste in the address you just copied.
4. Click **Press to Pour** to get your tokens.
5. After a few seconds, you should be able to see your balance after calling **Aion Virtual Machine** > **Remote** > **Get Balance (Default)**.

### Actually Deploying

Now that we've got our node setup and an account with some test tokens in it, we can actually get around to deploying our application!

1. Right click on the top level folder in the navigation pane.
2. Click **Aion Virtual Machine** > **Remote** > **Deploy**.
3. Click **OK**.
4. The Aion plugin will now attempt to deploy the application.

Because we're dealing with an actual network here, and not just a local kernel, the deployment has to be confirmed by all the nodes on the network. The terminal window will output:

```text
[INFO] Waiting for transaction to mine ...Trying (1 of 15 times)
[INFO] Waiting for transaction to mine ...Trying (2 of 15 times)
[INFO] Waiting for transaction to mine ...Trying (3 of 15 times)
```

Once it's done you should be able to see:

```text
[INFO] BUILD SUCCESS
```

If you scroll up, you can find the contract address:

```text
"contractAddress": "0xa0e6f3c3479ba2a9853ea68f9325d3035841e92599d406939e3b274f1ceb82f4",
```

## Interact from Remote

The process for interact with your contract on the network is the same as calling it from the local kernel. Except for that you need to differentiate if the method is [constant](/developers/fundamentals/interact/intellij/#contract-transaction) or not.

1. Right click on the function you want to call.
2. Click **Aion Virtual Machine** > **Remote** > **Contract Transaction/Call**.
3. Enter any arguments the function needs and click **OK**.
4. The response from the network is printed in the terminal window below.

## Summary

And there you have it. You created a contract, tested it, deploy it to the local kernel, made some local calls, created an account with funds, connected IntelliJ to an Aion node, deployed the contract to the Aion Testnet, and finally called it! You're now ready to go and create some incredible blockchain applications!
