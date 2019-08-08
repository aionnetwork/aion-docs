---
title: Examples
section: Web3J
description: Web3J allows you to deploy, call, and send transactions to a contract straight from the framework itself. This article walks you through each of those workflows.
---

## Prerequisites

In order to interact with the network you will need a node to connect to, and an account with sufficent balance to perform the operations you need to. For ease of use, you can spin up a test node using [Nodesmith](/developers/nodes/hosting-services/), and you can get some test coins from the [Aion Faucet](/tools/faucets).

### Setup an Account and Node

Once you have your node and account setup, you can use them in your Java application by using the following code:

```java
 private static String NODE_ENDPOINT = "YOUR_NODE_URL"
 private static String PRIVATE_KEY = "YOUR_PRIVATE_KEY";

 private static final Aion aion = Aion.build(new HttpService(NODE_ENDPOINT));
 private static final TransactionManager manager = new AionTransactionManager(
 aion, new Ed25519KeyPair(PRIVATE_KEY), VirtualMachine.AVM
 );
```

### Deploy

In order to deploy a contract, you need to use a contract wrapper created by Web3J. To review how to create a contract wrapper, see the [Setup Project](/developers/apis/web3j/setup-project) section.

Use the contract wrapper we generated earlier to get the deployment data, set the energy, sign with your account, and send the transaction:

<!-- Where is the  -->
```java
final Counter counterContract = Counter.deploy(aion, manager, AionGasProvider.INSTANCE, 1).send();
```

Get the transaction hash and the receipt:

```java
 System.out.println("Tx Hash:"+ counterContract.getTransactionReceipt());
 System.out.println("Contract Address: " + counterContract.getContractAddress());
```

### Contract Call

Simple calls to the network do not change the _state_ of the blockchain, they simply ask for a particular variable or value. Because of this they are substantially simpler than [Transaction Calls](#transaction) which _do_ change the blockchain.

```java
final Counter counterContract = Counter.load("Your_Contract_Address", aion, manager, AionGasProvider.INSTANCE);
Integer result = counterContract.call_getCount().send();
System.out.println("Current count is: " + result);
```

### Transaction

To change a state in the blockchain, you will need an account with sufficient balance to send a transaction to the contract.

Use contract wrapper to generator an instance for a deployed contract and send a transaction to the desired method and make sure the transaction is senr successfully:

```java
final Counter counterContract = Counter.load("Your_Contract_Address, aion, manager, AionGasProvider.INSTANCE)
 TransactionReceipt tx = counterContract.send_incrementCounter(1).send();
 System.out.println("Success? " + tx.isStatusOK());
 if(tx.isStatusOK()) {
 System.out.println("Transaction hash: " + tx.getTransactionHash());
 }
```
