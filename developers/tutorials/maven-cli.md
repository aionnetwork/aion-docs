---
title: Maven CLI
section: Tutorials
description: The Aion4j plugin for Maven is packed with features that can help speed up your contract development. You can compile, deploy, and call your contract to a local or remote node using simple CLI. In this section, we're going to be walking through the entire workflow of creating and deploying a Java smart contract to the Aion testnet. You can drop in as particular sections if you want to, or you can follow it through end-to-end.
table_of_contents: true
weight: 90
next_page: /developers/tools/maven-cli/create-an-account
---

## Prerequisites

- [Java SDK 10^](https://www.oracle.com/technetwork/java/javase/downloads/jdk12-downloads-5295953.html).
- [Maven](/developers/tools/maven-cli/install/)
- A RPC endpoint.

## Create a Project

Maven AVM archetype creates a basic Java smart contract project template that you can use to build your applications. Go to your desired folder and open the terminal:

```bash
mvn archetype:generate -DarchetypeGroupId=org.aion4j -DarchetypeArtifactId=avm-archetype -DarchetypeVersion=LATEST
```

The code snippet above uses the `LATEST` tag for the archetype version. This will download and use the latest archetype version available on the Apache Maven repository. You can also find the latest archetype version on the [Maven CLI Aion4j plugin repository](https://github.com/bloxbean/avm-archetype).

Archetype generator will ask you for a set of [pom configuration](https://maven.apache.org/pom.html). Enter your `groupID`, `artifactID`, you can leave the `version` as default, and enter the package name. For example:

```sh
groupId: org.aion
artifactId: AVM101
version: 1.0-SNAPSHOT
package: contract
```

![create-project](/developers/tools/maven-cli/images/create-project.gif)

## Initialize Project

This step pulls the `avm.jar` libraries that's going to run all your contracts locally. To do so, go into the project folder you just created, open `pom.xml`, and update `<aion4j.plugin.version>x.x.x</aion4j.plugin.version>` to [the most recent version](https://github.com/bloxbean/aion4j-maven-plugin). For instance:

```xml
...
 <properties>
        ...
        <aion4j.plugin.version>0.6.7</aion4j.plugin.version>
       ...
    </properties>
...
```

Save it and run the following command in the terminal:

```sh
mvn initialize
```

and you will see all the AVM related jars in the lib folder:

```sh
.
├── lib
│   ├── avm.jar
│   ├── org-aion-avm-api.jar
│   ├── org-aion-avm-tooling.jar
│   ├── org-aion-avm-userlib.jar
│   └── version
├── pom.xml
...
```

## View your Contract

The Aion AVM Maven Archetype includes a sample HelloAVM contract and corresponding unit tests. Within the `src` folder, there are two directories:

- `main`: This is where your contracts are stored.
- `test`: Unit tests are stored here.

To view your contract go to `src` → `main` → `java` → `Your package name` → `HelloAvm`. This is your contract.

## Edit your Contract

The sample contract you get from contains for [`@Callable`](/developers/fundamentals/avm-concepts/callable-functions/) function, `sayHello`, `greet`, `getString` and `setString`. For demonstration purpose, let's remove `sayHello` and `greet`. Now our contract is a basic `setter/getter` contract.

```java
package contract;

import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;

public class HelloAvm
{
    private static String myStr = "Hello AVM";

    @Callable
    public static String getString() {
        Blockchain.println("Current string is " + myStr);
        return myStr;
    }

    @Callable
    public static void setString(String newStr) {
        myStr = newStr;
        Blockchain.println("New string is " + myStr);
    }

}
```

## Run Tests and Debug

All the Junit tests for your contract are stored in the `src/test/java/Your pacakge name/` folder, and you get a standard AVM rule test when you create the AVM project called `HelloAvmRuleTest`.

We will modify the tests for our contracts.

First, remove `testSayHello` since we have removed the method from our contract.

Then, let get the decoded data from `testGetString`, and make sure it is the same as the one we set in `testSetString`. Check out [AVM Junit test tutorial](/developers/fundamentals/test-and-debug/end-to-end/) to learn about how AVMRule test works.

The modified the test can be like the following:

```java
    @Test
    public void testGetString() {

        byte[] txData = ABIUtil.encodeMethodArguments("getString");
        AvmRule.ResultWrapper result = avmRule.call(from, dappAddr, BigInteger.ZERO, txData);

        TransactionStatus status = result.getReceiptStatus();
        String res = (String) result.getDecodedReturnData();
        Assert.assertTrue(status.isSuccess());
    }
```

And your tests can be like:

```java
package contract;
import avm.Address;
import org.aion.avm.embed.AvmRule;
import org.aion.avm.tooling.ABIUtil;
import org.aion.types.TransactionStatus;
import org.junit.Assert;
import org.junit.BeforeClass;
import org.junit.ClassRule;
import org.junit.Test;

import java.math.BigInteger;

public class HelloAvmRuleTest {
    @ClassRule
    public static AvmRule avmRule = new AvmRule(true);

    //default address with balance
    private static Address from = avmRule.getPreminedAccount();

    private static Address dappAddr;

    @BeforeClass
    public static void deployDapp() {
        //deploy Dapp:
        // 1- get the Dapp byes to be used for the deploy transaction
        // 2- deploy the Dapp and get the address.
        byte[] dapp = avmRule.getDappBytes(contract.HelloAvm.class, null);
        dappAddr = avmRule.deploy(from, BigInteger.ZERO, dapp).getDappAddress();
    }

    @Test
    public void testSetString() {
        //calling Dapps:
        // 1- encode method name and arguments
        // 2- make the call;
        byte[] txData = ABIUtil.encodeMethodArguments("setString","Hello Alice");
        AvmRule.ResultWrapper result = avmRule.call(from, dappAddr, BigInteger.ZERO, txData);

        // getReceiptStatus() checks the status of the transaction execution
        TransactionStatus status = result.getReceiptStatus();
        Assert.assertTrue(status.isSuccess());
    }

    @Test
    public void testGetString() {
        //calling Dapps:
        // 1- encode method name and arguments
        // 2- make the call;
        byte[] txData = ABIUtil.encodeMethodArguments("getString");
        AvmRule.ResultWrapper result = avmRule.call(from, dappAddr, BigInteger.ZERO, txData);

        // getReceiptStatus() checks the status of the transaction execution
        TransactionStatus status = result.getReceiptStatus();
        Assert.assertTrue(status.isSuccess());
    }
}
```

Now, open a terminal from your project and run the following command to see if all your tests are passing:

```sh
mvn clean test
```

You will see that your project got compiled, and tests are run, the sample output is:

```sh
...
[INFO] -------------------------------------------------------
[INFO]  T E S T S
[INFO] -------------------------------------------------------
[INFO] Running contract.HelloAvmRuleTest
Output from transaction 0000000000000000000000000000000000000000000000000000000000000000
New string is Hello Alice

Output from transaction 0000000000000000000000000000000000000000000000000000000000000000
Current string is Hello Alice

[INFO] Tests run: 2, Failures: 0, Errors: 0, Skipped: 0, Time elapsed: 0.115 s - in contract.HelloAvmRuleTest
[INFO]
[INFO] Results:
[INFO]
[INFO] Tests run: 2, Failures: 0, Errors: 0, Skipped: 0
[INFO]
[INFO]
...
```

We can see that two tests are passed.

## Deploy to Local

Now we've made some basic changes and ran some tests, we're going try deploying the contract to the local kernel.

First, we need to compile and build our contract, open an terminal under your project root folder and run:

```sh
mvn clean install
```

If build successfully,you will see your compiled `contract jar`: AVM101-1.0-SNAPSHOT.jar and `contract abi` information: AVM101-1.0-SNAPSHOT.abi under `target` folder.

Then run:

```sh
mvn aion4j:deploy
```

You've just compiled your contract and deployed it to the local kernel. It's that easy. In your output, there is an AVM storage path where you data are stored for you to interact later, your deployer address and deployed contract address.

```sh
[INFO] --------------------------< org.aion:AVM101 >---------------------------
[INFO] Building AVM101 1.0-SNAPSHOT
[INFO] --------------------------------[ jar ]---------------------------------
[INFO]
[INFO] --- aion4j-maven-plugin:0.6.7:deploy (default-cli) @ AVM101 ---
[INFO] Deploying /home/jennifer/Integration/Doc/AVM101/target/AVM101-1.0-SNAPSHOT.jar to the embedded Avm ...
[INFO] Avm storage path : /home/jennifer/Integration/Doc/AVM101/target/storage
[INFO] ****************  Dapp deployment status ****************
[INFO] Contract Address: 0b7c8a9d0055a4794679ba1b34cfb90f53aa5f04614ddc35793edfa65577d50a
[INFO] Energy used: 690263
[INFO] Deployer Address: 0xa092de3423a1e77f4c5f8500564e3601759143b7c0e652a7012d35eb67b283ca
[INFO] *********************************************************
[INFO] /home/jennifer/Integration/Doc/AVM101/target/AVM101-1.0-SNAPSHOT.jar was deployed successfully to the embedded AVM.
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time:  2.887 s
[INFO] Finished at: 2019-07-15T11:11:31-04:00
[INFO] ------------------------------------------------------------------------
```

Copy `contract address` and save it somewhere for later use!

## Call from Local

Let's try and call the contract we just deployed.

Let's first call `setString` to set it to `AVM is great` by running the following command in the terminal:

```sh
mvn aion4j:call -Dcontract=0b7c8a9d0055a4794679ba1b34cfb90f53aa5f04614ddc35793edfa65577d50a -Dmethod=setString -Dargs="-T 'AVM is great'"
```

where `-Dcontract` is the contract address, `-Dmethod` is the method we want to call and `-Dargs` are the corresponding arguments type [selectors](/developers/tools/maven-cli/variable-types/) and data we want to pass in.

In the `setString` method, we have `Blockchain.println("New string is " + myStr);`, which will also be printed in the embedded AVM output. This can be used to debug your contract as well.

```sh
[INFO] Calling contract method ...
Output from transaction 0000000000000000000000000000000000000000000000000000000000000000
New string is AVM is great
```

Then let's call `getString` to see if we actually set `myStr` to `AVM is great`:

```sh
mvn aion4j:call -Dcontract=0b7c8a9d0055a4794679ba1b34cfb90f53aa5f04614ddc35793edfa65577d50a -Dmethod=getString
```

And we can see the decoded return data is correct:

```sh
[INFO] --------------------------< org.aion:AVM101 >---------------------------
[INFO] Building AVM101 1.0-SNAPSHOT
[INFO] --------------------------------[ jar ]---------------------------------
[INFO]
[INFO] --- aion4j-maven-plugin:0.6.7:call (default-cli) @ AVM101 ---
[INFO] Contract Address : 0b7c8a9d0055a4794679ba1b34cfb90f53aa5f04614ddc35793edfa65577d50a
[INFO] Method           : getString
[INFO] Arguments        : null
[INFO] Calling contract method ...
Output from transaction 0000000000000000000000000000000000000000000000000000000000000000
Current string is AVM is great

[INFO] ****************  Method call result  ****************
[INFO] Data       : AVM is great
[INFO] Energy used: 55265
[INFO] *********************************************************
[INFO] Method call successful
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time:  1.187 s
[INFO] Finished at: 2019-07-16T10:37:45-04:00
[INFO] ------------------------------------------------------------------------
```

> **Note**: For embedded AVM contract interaction, we don't differentiate contract call and contract transaction. Everything is treated as a `call`.

## Deploy to Aion network

Deploying to a remote kernel follows the same process as deploying to a local kernel. We just need to grab a node URL, create an account, and add funds into it.

### Remote Node URL

If you've got a node running on your network, grab the URL address. If you're not running your own node, you can grab one from Nodesmith for free!

1. Head over to [nodesmith.io](https://nodesmith.io/) and sign up for free.
2. Once you've logged in, click **Aion** from the sidebar and copy the `mastery` URL from the 2nd line.

Now that you've got a node URL, the last thing you need is an account with a sufficient balance.

### Account and Tokens

Whenever you deploy something to a live blockchain network, that transaction needs to be paid for with funds from an account. Luckily, when you're deploying to a test network then you can use test-tokens that don't actually cost anything.

First up, let's create an account. Open a terminal in your project top level, where the `pom.xml` is, and run:

```sh
mvn aion4j:create-account
```

You will see that an account is created successfully. Save your account public address, also save your private key somewhere safe and private!

> Note: Never expose your private key!

So now, we have both our node and account. But there's one issue, we still don't have any funds. You can check your balance by running:

```sh
 mvn aion4j:get-balance -Daddress=`Your Account Public Address` -Dweb3rpc.url=`Your Node` -Premote
```

The balance for your new account should be 0 Aion:

```sh
[INFO] Response from Aion kernel:
 {
  "result": "0x0",
  "id": "682472",
  "jsonrpc": "2.0"
}
[INFO] Address   :  `Your account`
[INFO] Balance   :  0 (0.000000000000 Aion)
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
```

 So our last step before we can deploy is to add funds into our account.

1. Copy your address again.
2. In your browser, go to [faucets.blockxlabs.com](https://faucets.blockxlabs.com) and sign up.
3. Once you're logged in, click **Aion** and paste in the address you just copied.
4. Click **Press to Pour** to get your tokens.
5. After a few seconds, run `get-balance` again. You should be able to see your balance is now 10 Aion.

### Actually Deploying

Now that we've got our node setup and an account with some test tokens in it, we can actually get around to deploying our application!

Run following command in your project top level:

```sh
mvn aion4j:deploy -Dpk=`Your private key` -Dweb3rpc.url=`Your Node`-Premote
```

Then you will see your signed raw transaction data and a transaction hash. Copy it.

Because we're dealing with an actual network here, and not just a local kernel, the deployment has to be confirmed by all the nodes on the network. To make sure your transaction has been mined, run:

```sh
mvn aion4j:get-receipt -Dtail -Dsilient -Dweb3rpc.url=`Your Node` -Dtxhash=`Your transaction #` -Premote
```

It will keep pulling the transaction receipt every 10 seconds:

```text
[INFO] Waiting for transaction to mine ...Trying (1 of 15 times)
[INFO] Waiting for transaction to mine ...Trying (2 of 15 times)
[INFO] Waiting for transaction to mine ...Trying (3 of 15 times)
```

Once it's mined,  you will see your transaction receipt, for example:

```sh
[INFO] Txn Receipt:

[INFO] {
  "blockHash": "0xba081ae5055de0df5c9918ae9e922e6f1596967605bbfb162494649eed4bdf70",
  "nrgPrice": "0x174876e800",
  "logsBloom": "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
  "nrgUsed": "0x0a8867",
  "contractAddress": "0xa06a4c35cf6c8058a7bb483e34ab6a0f0d909252e4e12eb79dc0b997e2a05f62",
  "transactionIndex": "0x0",
  "transactionHash": "0x28b63ebd1142093a6339d552bd26e2d2f9e278b278c43555b699d509e2eb433a",
  "gasLimit": "0x4c4b40",
  "cumulativeNrgUsed": "0xa8867",
  "gasUsed": "0x0a8867",
  "blockNumber": "0x2b285b",
  "root": "5733accf5e285ae49edabe7908b5308936984d80f726d000acf9d384a20f78e1",
  "cumulativeGasUsed": "0xa8867",
  "from": "0xa053280904639beab6af26f314c0911f8cfe97189daec237e89c2dfb4be06524",
  "to": null,
  "logs": [],
  "gasPrice": "0x174876e800",
  "status": "0x1"
}
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time:  1.471 s
[INFO] Finished at: 2019-07-16T11:20:25-04:00
[INFO] ------------------------------------------------------------------------

```

And you can find the contract address:

```text
"contractAddress": "0xa06a4c35cf6c8058a7bb483e34ab6a0f0d909252e4e12eb79dc0b997e2a05f62",
```

Copy and save it for later interaction.

## Interact from Remote

The process for interact with your contract on the network is the same as calling it from the local kernel. Except for that you need to differentiate if the method is constant or not.

### Contract Transaction

If a method will change a state in the blockchain, then it is not constant and you need to send a `contract transaction` to the contract. For example, `setString` will change the value of `myStr`, so it requires a contract transaction:

```sh
mvn aion4j:contract-txn -Dpk=`Your Private Key` -Dweb3rpc.url=`Your Node` -Dcontract=`Your contract address` -Dmethod=setString -Dargs="-T 'Hello Jennifer'" -Premote
```

It will return you a transaction hash:

```sh
...
[INFO] ****************  Contract Txn result  ****************
[INFO] Transaction receipt       :`Your Receipt`
[INFO] ******************************************************
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time:  2.020 s
[INFO] Finished at: 2019-07-16T11:37:44-04:00
[INFO] ------------------------------------------------------------------------
```

Get the receipt of the transaction hash to make sure it is mined and the status is 0x1:

```sh
mvn aion4j:get-receipt -Dtail -Dsilient -Dweb3rpc.url=`Your Node` -DtxHash=`Your Transaction Hash` -Premote
```

### Call

If you just want to get data from  the contract, then it is a constant method.

You can call the method the same way as you call it locally plus the `-Premote`:

```sh
mvn aion4j:call -Dweb3rpc.url=`Your node`-Dcontract=`Your contract address` -Dmethod=getString -Premote
```

## Summary

And there you have it. You created a contract, tested it, deploy it to the local kernel, made some local calls, created an account with funds, connected maven to an Aion node, deployed the contract to the Aion Testnet, and finally interacted it! You're now ready to go and create some incredible blockchain applications!
