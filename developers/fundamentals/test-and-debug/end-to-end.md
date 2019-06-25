---
title: End to End
toc: true
description: AvmRule is a Junit Rule designed for testing Java contract on an embedded AVM. It allows you to deploy your Java smart contract and write tests to interact with the contract under an real Aion blockchain enviornment without actually running an Aion blockchain. In this section, we're going to be walking through the entire workflow of deploying a Java contract to the local kernel, and write Junit tests to test and debug your contract. You can drop in as particular sections if you want to, or you can follow it through end-to-end.
---

## Prerequisites

- [Java 10 or up](https://www.oracle.com/technetwork/java/javase/downloads/jdk11-downloads-5066655.html).
- [IntelliJ IDE](https://www.jetbrains.com/idea/download/) (or any IDE you like that supports Junit 5).
- [avm.jar](https://github.com/aionnetwork/AVM/releases)


 It creates an in-memory reprensectation of the Aion kernel and AVM. It not only allows developers to write tests for a single method, but also logical tests from deploying the contract and performing a series of interaction with the contracts under a Blockchain runtime enviornment. Every time we run a test, the built kernel and AVM instances are refreshed.

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

## Write Tests

### Create Aion Blockchain Enviornment

### Deploy the Contract

### Single Method Test

### Contract Logic Test



