---
title: End to End
toc: true
description: AvmRule is a Junit Rule designed for testing Java contract on an embedded AVM. It allows you to deploy your Java smart contract and write tests to interact with the contract under an real Aion blockchain enviornment without actually running an Aion blockchain. In this section, we're going to be walking through the entire workflow of deploying a Java contract to the local kernel, and write Junit tests to test and debug your contract. You can drop in as particular sections if you want to, or you can follow it through end-to-end.
---

## Prerequisites

- [Java 10 or up](https://www.oracle.com/technetwork/java/javase/downloads/jdk11-downloads-5066655.html).
- [IntelliJ IDE](https://www.jetbrains.com/idea/download/) (or any IDE you like that supports Junit 5).
- [avm.jar](#/)

## Set up a Project

We will use IntelliJ to create a Java project and set it up to a Java smart contract porject.

### Create a porject

1. Open IntelliJ
2. Click **Create a new Project**
3. Click **Java**
4. Add **Project SDK** (Java 10^)
5. Click **Next** and *Next**
6. Enter **Project name** and **Project location**
7. Click **Finish**

![project](/developers/fundamentals/test-and-debug/images/create-project.gif)

### Set up the Porject

For this project, we will have three directories:

- **src** folder to contain contract classes, which is generated automaically when we created the project.
- **lib** folder to contain *avm.jar*.
  
  ![lib](/developers/fundamentals/test-and-debug/images/add-lib.gif)
- **test** folder to contain test classes.

  ![test](/developers/fundamentals/test-and-debug/images/add-test.gif)

## Write the Contract

We will use a simple Ownable contract as an example. The contract assigns the account that deploys the contract as the owner upon deployment. The owner is allowed to transfer the ownership of the contract to another account later. Ownership will only be transferred when the assigned new owner accepts the ownership. Once the ownership tranfer completed, a `OwnershipTransferred` event will be logged along with the old owner address and the new owner address.

To write a Java smart ontract, we will first need to create a `Java Class` file:

1. Right click on **src** folder
2. Move to **New**
3. Click **Java Class**
4. Name it as `SimpleContract`

Then we can start to write the contract. Since this guide is to show you how to write tests and debug a contract, we will provide a sample contract. Learn about [AVM concepts](/developers/fundamentals/avm-concepts/callable-functions/) and [AVM API packages](/developers/fundamentals/packages/abi/), and see some [contract examples](/developers/fundamentals/contracts/contract-to-contract/) if you have questions  about the contract.

Copy and paste the following contract:

```java

import avm.Address;
import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.tooling.abi.Initializable;


public class SimpleOwnable {

    private static Address owner;

    private static Address newOwner;

    // Assign the log topic upon deployment.
    @Initializable
    private static String tranferLogTopic;


    static {
        // Assign the deployer as the owner.
        owner = Blockchain.getCaller();
        newOwner = new Address(new byte[32]);
    }

    // Save the address of the new owner, wait for acceptance.
    @Callable
    public static void transferOwnership(Address newOwnerAddress) {
        newOwner = newOwnerAddress;
    }

    // New owner accepts the ownership. Update the owner address and log the transfer.
    @Callable
    public static void acceptOwnership() {
        Blockchain.require(Blockchain.getCaller().equals(newOwner));
        Blockchain.log(tranferLogTopic.getBytes(), owner.toByteArray(), newOwner.toByteArray());
        owner = newOwner;
        newOwner = new Address(new byte[32]);
    }

    // Get the contract owner address.
    @Callable
    public static Address getOwnerAddress() {
        return owner;
    }

}
```

## Write Tests

 It creates an in-memory reprensectation of the Aion kernel and AVM. It not only allows developers to write tests for a single method, but also logical tests from deploying the contract and performing a series of interaction with the contracts under a Blockchain runtime enviornment. Every time we run a test, the built kernel and AVM instances are refreshed.

### Create Aion Blockchain Enviornment

### Deploy the Contract

### Single Method Test

### Contract Logic Test



