---
title: Examples
section: Web3J
description: Web3J allows you to deploy, call, and send transactions to a contract straight from the framework itself. This article walks you through each of those workflows.
weight: 500
---

These examples assume you have already created a wrapper for your application. See the [end-to-end walkthrough for more details](apis-web3j-walkthrough).

## Connect to a Node

To link your Java application to an Aion Node, use the following code:

```java
private static String NODE_ENDPOINT = "YOUR_NODE_URL"
```

## Define an Account

To set an account that you wish to use in your Java application, supply the private key for the account you want to use:

```java
private static String PRIVATE_KEY = "YOUR_PRIVATE_KEY";
```

## Initialize the Aion and TransactionManager Objects

Before you can interact or deploy anything to the Aion network, you need to create an `aion` object and a `manager` object using the `Aion` and `TransactionManager` types respectivly:

```java
private static final Aion aion = Aion.build(new HttpService(NODE_ENDPOINT));
private static final TransactionManager manager = new AionTransactionManager(
aion, new Ed25519KeyPair(PRIVATE_KEY), VirtualMachine.AVM
);
```

## Deploy

To deploy your contract to an Aion blockchain, call your wrapper's object along with the `deploy` function:

```java
final Counter counterContract = Counter.deploy(aion, manager, AionGasProvider.INSTANCE, 1).send();
```

Make sure the include any deployment arguments that are necessary:

```java
final Counter counterContract = Counter.deploy(aion, manager, AionGasProvider.INSTANCE, "This is a deployment argument").send();
```

To get the transaction hash and the receipt of your deployment use the following code:

```java
 System.out.println("Tx Hash:"+ counterContract.getTransactionReceipt());
 System.out.println("Contract Address: " + counterContract.getContractAddress());
```

## Contract Call

Simple calls to the network do not change the _state_ of the blockchain, they simply ask for a particular variable or value. Because of this, they are substantially simpler than [Transaction Calls](#transaction) which _do_ change the blockchain.

```java
Integer result = counterContract.call_getCount().send();
```

You can use the response from the blockchain as a standard variable:

```java
System.out.println("Current count is: " + result);
```

## Contract Transaction

To change a state in the blockchain, you will need an account with sufficient balance to send a transaction to the contract:

```java
TransactionReceipt transactionReceipt = counterContract.send_incrementCounter(1).send();
```

You can find out if the transaction was successful by checking the `transactionReceipt` variable.

```java
System.out.println("Success? " + tx.isStatusOK());
```

## Load

To load a contract into your Java application that has already been deployed, call your wrapper object followed by the `load` function. You must include the contract address as the first argument in the `load` function.

```java
final Counter counterContract = Counter.load("Your_Contract_Address", aion, manager, AionGasProvider.INSTANCE);
```
