---
title: "🎓 Interact with Aion Web3 [Java Contracts]"
excerpt: "This guide is only compatible with Java smart contracts."
---
[block:callout]
{
  "type": "info",
  "title": "Guide Level: Beginner",
  "body": "**You are a developer who**\n* Wants to learn how to interact with their contract on the client-side (front-end)\n* Is interested in learning blockchain\n* Is experienced and looking to build on Aion"
}
[/block]

[block:api-header]
{
  "title": "Overview"
}
[/block]
This guide will go over what you need to know about using Aion Web3 to interact with your **Java** smart contract, so that you can build that unstoppable decentralized web application! 

What you will learn how to: 
* Use Maven or Intellji Plugins to deploy out contract
* Modify your contract and project structure
* Connect to the Aion Network Testnet
* Make calls to the contract from the client side (front-end) 


For those who already have deployed their contracts and want to see Web3 contract examples, [jump down to **Interact**](#section-4-interact).
[block:api-header]
{
  "title": "1. Setup"
}
[/block]

[block:callout]
{
  "type": "warning",
  "title": "Requirements",
  "body": "* [Java 10^](https://www.oracle.com/technetwork/java/javase/downloads/index.html)\n* [Maven 3.5.4^](https://docs.aion.network/docs/maven-and-aion4j-installation)\n* <a href=\"https://nodejs.org/en/\" target=\"_blank\">Node.js</a> (recommended version: 10.x)\n* <a href=\"https://www.npmjs.com/get-npm\" target=\"_blank\">NPM</a> (recommended version: 6.x)\n* [IntelliJ IDE](https://docs.aion.network/docs/install-intellij-plugin) *(Optional)*\n\nHead over to [Aion Docs](https://docs.aion.network/docs/maven-and-aion4j-installation) for installation guide."
}
[/block]
First let's set up your project. Follow this guide for the following steps:
**1. [Setup](doc:aion-deploy-java-smart-contract-maven#section-1-setup) **

**2. [Build your Project](doc:aion-deploy-java-smart-contract-maven#section-2-build-your-project)** - Only necessary for people using Maven CLI commands (IntelliJ does it automatically)

**3. Connect to Testnet**
 * [with Maven](doc:aion-deploy-java-smart-contract-maven#section-3-connect-to-the-aion-avm-testnet)
 * [with IntelliJ](https://docs.aion.network/docs/configure-intellij-plugin#section-configuration-menu)
[block:api-header]
{
  "title": "2. Java Smart Contract"
}
[/block]
Welcome back! Now that you have your project all set up - let's add in the contract we'll be using this tutorial. 

Below you'll find a simple smart contract which we've named as Counter.java. It acts as a counter that can be either increased or decreased by any number. Comments are written in-line so you can get a better understanding of what's going on.

## 2.1 Update Contract 
**In your project directory: **
1. Go into src/main/java/*yourPackageName*/HelloAvm.java
2. Remove all code after line 1
3. Copy and paste the following contract below
4. Rename your file to **Counter.java** (Right click file > Refactor > Rename)
5. Remember to save :floppy-disk: 
[block:code]
{
  "codes": [
    {
      "code": "// Keep your original line 1 code\n\nimport avm.Address;\nimport avm.Blockchain;\nimport org.aion.avm.tooling.abi.Callable;\nimport org.aion.avm.userlib.abi.ABIDecoder;\n\nimport java.math.BigInteger;\n\npublic class Counter {\n  private static Address owner;\n  private static int count = 0;\n  \n  static {\n    owner = Blockchain.getCaller();\n  }\n\n  @Callable\n  public static void incrementCounter(int increment){\n    count += increment;\n    Blockchain.log(\"CounterIncreased\".getBytes(),      BigInteger.valueOf(increment).toByteArray());\n  }\n\n  @Callable\n  public static void decrementCounter(int decrement){\n    count -= decrement;\n    Blockchain.log(\"CounterDecreased\".getBytes(), BigInteger.valueOf(decrement).toByteArray());\n  }\n\n  @Callable\n  public static int getCount(){\n    return count;\n  }\n\n}",
      "language": "java",
      "name": "Counter.java"
    }
  ]
}
[/block]
## 2.2 Update Test Cases
Remember to always create test cases for your contract. This ensures that your program's logic is working as intended. When compiling the contract, the test cases will automatically run and will not compile successfully if certain conditions aren't met. 

**In your project directory: **
1. Go into src/test/java/*yourPackageName*/HelloAvmRuleTest.java
2. Remove all code after line 1 
3. Copy and paste the following contract below
4. Rename your file to **Counter.java** (Right click file > Refactor > Rename)
5. Remember to save :floppy-disk: 
[block:code]
{
  "codes": [
    {
      "code": "// Keep your original line 1 code\n\nimport org.aion.avm.core.util.ABIUtil;\nimport avm.Address;\nimport org.aion.avm.tooling.AvmRule;\nimport org.aion.vm.api.interfaces.ResultCode;\nimport org.junit.Assert;\nimport org.junit.Before;\nimport org.junit.ClassRule;\nimport org.junit.Test;\n\nimport java.math.BigInteger;\n\n\npublic class CounterRuleTest {\n  @ClassRule\n  public static AvmRule avmRule = new AvmRule(false);\n\n  //default address with balance\n  private Address from = avmRule.getPreminedAccount();\n\n  private Address dappAddr;\n\n  @Before\n  public void deployDapp() {\n    //deploy Dapp:\n    // 1- get the Dapp byes to be used for the deploy transaction\n    // 2- deploy the Dapp and get the address.\n    byte[] deployArgument = ABIUtil.encodeOneObject(703);\n    byte[] dapp = avmRule.getDappBytes(Counter.class, deployArgument);\n    dappAddr = avmRule.deploy(from, BigInteger.ZERO, dapp).getDappAddress();\n  }\n\n  @Test\n  public void testIncrementCounter() {\n    //calling Dapps:\n    // 1- encode method name and arguments\n    // 2- make the call;\n    byte[] txData = ABIUtil.encodeMethodArguments(\"incrementCounter\", 2);\n    AvmRule.ResultWrapper result = avmRule.call(from, dappAddr, BigInteger.ZERO, txData);\n\n    // getReceiptStatus() checks the status of the transaction execution\n    ResultCode status = result.getReceiptStatus();\n    Assert.assertTrue(status.isSuccess());\n  }\n\n  @Test\n  public void testDecrementCounter() {\n    //calling Dapps:\n    // 1- encode method name and arguments\n    // 2- make the call;\n    byte[] txData = ABIUtil.encodeMethodArguments(\"decrementCounter\", 2);\n    AvmRule.ResultWrapper result = avmRule.call(from, dappAddr, BigInteger.ZERO, txData);\n\n    // getReceiptStatus() checks the status of the transaction execution\n    ResultCode status = result.getReceiptStatus();\n    Assert.assertTrue(status.isSuccess());\n  }\n\n  @Test\n  public void testGetCount() {\n    //calling Dapps:\n    // 1- encode method name and arguments\n    // 2- make the call;\n    byte[] txData = ABIUtil.encodeMethodArguments(\"getCount\");\n    AvmRule.ResultWrapper result = avmRule.call(from, dappAddr, BigInteger.ZERO, txData);\n\n    // getReceiptStatus() checks the status of the transaction execution\n    ResultCode status = result.getReceiptStatus();\n    Assert.assertTrue(status.isSuccess());\n  }\n}",
      "language": "java",
      "name": "CounterTest.java"
    }
  ]
}
[/block]

## 2.3 Update pom.xml file
Open up your pom.xml file and in line 19, enter the class name of the contract: `<contract.main.class>aion.Counter</contract.main.class>`


If you're using Maven commands for your project, you always need to build our project after any changes to your **contract** files or **pom.xml** file with the command below. 
```
mvn clean install
```
[block:api-header]
{
  "title": "3. Deployment"
}
[/block]
Currently there are 3 ways to deploy your contract which are Maven, IntelliJ, and using Web3. If you want to learn how to deploy via Web3, you can learn how to do so [here](https://docs.aion.network/docs/deploy-a-contract). It's good to note that IntelliJ and Maven are stronger choices for deployment as you can easily identify bugs and test your contract before deploying.

## 3.1 Connect to Testnet
Before deployment, make sure you've set up your [remote connection to the Testnet](doc:aion-deploy-java-smart-contract-maven#section-3-1-nodesmith-endpoint)

## 3.2 Deploy via Maven 
Remember you'll need an Aion account with [balance](https://faucets.blockxlabs.com/aion) to deploy your contract!

If you have already set your environment variables for your **private key** and Web3 RPC Url, use this Maven command.
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:deploy -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
Or, if you have not set any environment variables, use this command.
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:deploy -Dpk=YOUR_PRIVATE_KEY -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
After successfully deploying your contract, a transaction hash should be returned. You will need this transaction hash to retrieve your transaction receipt.

## 3.3 Deploy via IntelliJ
If you want to deploy the contract using the IntelliJ Plugin, in the IDE: 
* Right click anywhere on the smart contract 
* Select **Aion Virtual Machine** > **Remote** > **Deploy**. You will be prompted to enter a Node URL and Private Key (if you haven't filled them in already)
* Optional - You can deploy it to the Embedded AVM to see if it will deploy successfully (**Aion Virtual Machine** > **Embedded** > **Deploy**)

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/58e0e97-deploy_intellij.gif",
        "deploy_intellij.gif",
        1049,
        775,
        "#323333"
      ]
    }
  ]
}
[/block]
## 3.4 Contract Address / Transaction Receipt
IntelliJ/Maven caches the most recent transaction hashes, which makes it really easy to retrieve transaction receipts from the hash. In the transaction log, you'll see a value for contract address.

**With Maven**
[block:code]
{
  "codes": [
    {
      "code": "// Gets last transaction hash received\nmvn aion4j:get-receipt -Dtail -Dsilent -Premote\n\n// Get a specific transaction hash\nmvn aion4j:get-receipt -DtxHash=TRANSACTION_HASH -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
**With IntelliJ**
1. Right click anywhere on the smart contract
2. Select **Aion Virtual Machine** > **Remote** > **Get Receipts (Recent)**

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/910e43c-transaction_receipt.gif",
        "transaction_receipt.gif",
        1049,
        775,
        "#3a3b3b"
      ]
    }
  ]
}
[/block]
### 3.4 Contract Address
**IMPORTANT**: Remember to note down the **contract address** from the transaction receipt.  
[block:api-header]
{
  "title": "4. Interact"
}
[/block]

[block:callout]
{
  "type": "warning",
  "body": "1. Contract Address\n2. Endpoint to the Aion Network \n * [Nodesmith](doc:Nodesmith)\n * [Blockdaemon](doc:blockdaemon)\n3. Aion Web3 Package\n * `npm install --save aion-web3@1.2.5-beta.2 node-zip`",
  "title": "You'll need:"
}
[/block]
Web3 Docs: Check out full documentation for [Web3 here.](https://docs.aion.network/docs/web3-avm-contract)

## 4.1 Contract Call 
Now that we have our contract deployed on the network, we can interact with it. Like contract deployment, contract calls are **transactions**. We have to create a transaction object for calling our contract method, but now we can populate the 'to:' field to point to the contract address (where our smart contract lives now).

A **contract call** is when are you are simply reading data from the blockchain and not modifying it. Thus, a transaction is not needed. The function call is carried out by the node and since nothing is mined, no NRG is required.

In our Counter.java contract, the `getCount()` method simply returns a *constant*. This means that it does not change or modify any values in the contract, but just outputs the value of a specific variable. Hence, why it is a contract call. 

Here is an example script in JavaScript of calling the `getCount()` method to the network.
[block:code]
{
  "codes": [
    {
      "code": "// Import Dependencies\nconst Web3 = require(\"aion-web3\");\n\n// Create Web3 Object\nconst web3 = new Web3(new Web3.providers.HttpProvider(\"NODE_URL\"));\n\n// Contract Address\nconst contractAddr = \"0xa01234contractadress\";\n\n// Select Account\nconst privateKey = \"PRIVATE_KEY\";\nconst account = web3.eth.accounts.privateKeyToAccount(privateKey);\";\n\n\n// Make contract call function\nasync function contractCall() {\n  // Encode method call\n  // getString() - Takes 0 arguments, returns a string\n  let data = web3.avm.contract.method('getCount').inputs([],[]).encode();\n  \n  // Create transaction object\n  const txObject = {\n    from: account.address,\n    to: contractAddr,\n    data: data,\n    gasPrice: 10000000000,\n    gas: 2000000,\n    type: '0x1' // method call ('0x2' for deployment)\n  };\n\n  // Respo\n  let initResponse = await web3.eth.call(txObject);\n  // decode the response\n  let decodedResponse = await web3.avm.contract.decode('int', initResponse); \n\n  console.log(decodedResponse);\n  return decodedResponse;\n}\n\n// Call the Function\ncontractCall();",
      "language": "javascript",
      "name": "getCountExample.js"
    }
  ]
}
[/block]
## 4.2 Contract Transaction 
[block:callout]
{
  "type": "info",
  "body": "Since you are modifying the blockchain by sending instructions to the contract, this is a transaction. As with all transactions, it is necessary for the transaction to be **signed** and NRG to be required for execution."
}
[/block]
In our Counter.java contract, the `incrementCount()` method will change the state of the contract, hence why it is considered a *contract transaction*. 

Here is an example script in JavaScript for executing the `incrementCounter()` method. We'll be executing the method by telling the contract to increase the counter by 7. 
[block:code]
{
  "codes": [
    {
      "code": "// Import Dependencies\nconst Web3 = require(\"aion-web3\");\n\n// Create Web3 Object\nconst web3 = new Web3(new Web3.providers.HttpProvider(\"NODE_URL\"));\n\n// Contract Address\nconst contractAddr = \"0xa01234contractadress\";\n\n// Select Account\nconst privateKey = \"PRIVATE_KEY\";\nconst account = web3.eth.accounts.privateKeyToAccount(privateKey);\";\n\n// Create the Function\nasync function contractTransaction() {\n\n  // calling method incrementCounter() which takes one integer argument\n  let data = web3.avm.contract.method('incrementCounter').inputs(['int'],[7]).encode();\n  // Create transaction object\n  const txObject = {\n    from: account.address,\n    to: contractAddr,\n    data: data,\n    gasPrice: 10000000000,\n    gas: 2000000,\n    type: '0x1' // contract tx ('0x2 for deployment)\n  };\n\n  // Sign the Transaction\n  const signedTransaction = await web3.eth.accounts.signTransaction(\n    txObject, account.privateKey\n  ).then(res => signedCall = res);\n\n  // Send the Transaction\n  const transactionReceipt = await web3.eth.sendSignedTransaction( \n    signedTransaction.rawTransaction\n  ).on('receipt', receipt => {\n    console.log(\"Receipt received!\\ntransactionHash =\", receipt.transactionHash)\n  });\n\n  // Print the Receipt\n  console.log(transactionReceipt);\n  console.log(transactionReceipt.logs[0].topics);\n}\n\n// Call the Function\ncontractTransaction();",
      "language": "javascript",
      "name": "incrementCounterExample.js"
    }
  ]
}
[/block]
After you're all done that (remember to check the [transaction receipt](#section-3-4-contract-address-transaction-receipt) if the transaction successfully went through) - you can go ahead and call `getCount()` and see that you're contract counter state updated! Feel free to play around, change the contract by adding/modifying functions, and testing it with contract calls. 

# Need Help?

If you get stuck, try searching these docs 👆 or head over to our <a href="https://gitter.im/aionnetwork/Lobby" target="_blank">Gitter channels</a> or <a href="https://stackoverflow.com/search?q=aion" target="_blank">StackOverflow</a> for answers to some common questions.
[block:callout]
{
  "type": "info",
  "body": "Written by **<a href=\"https://twitter.com/KimCodeashian\" target=\"_blank\">Kimcodeashian</a>** :fire:"
}
[/block]