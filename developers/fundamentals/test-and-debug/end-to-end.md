---
title: End to End
toc: true
description: AvmRule is a JUnit Rule designed for testing Java contract on an embedded AVM. It allows you to deploy your Java smart contract and write tests to interact with the contract under a real Aion blockchain environment without actually running an Aion blockchain. In this section, we're going to be walking through the entire workflow of deploying a Java contract to the local kernel and write JUnit tests to test and debug your contract. You can drop in as particular sections if you want to, or you can follow it through end-to-end.
---

## Prerequisites

- [Java 10 or up](https://www.oracle.com/technetwork/java/javase/downloads/jdk11-downloads-5066655.html).
- [IntelliJ IDE](https://www.jetbrains.com/idea/download/) (or any IDE you like that supports JUnit 5).
- [AVM Lastest Tooling Jars](https://github.com/aionnetwork/AVM/tree/latest-tooling)

## Set up a Project

We will use IntelliJ to create a Java project and set it up to a Java smart contract project.

### Create a project

1. Open IntelliJ
2. Click **Create a new Project**
3. Click **Java**
4. Add **Project SDK** (Java 10^)
5. Click **Next** and *Next**
6. Enter **Project name** and **Project location**
7. Click **Finish**

![project](/developers/fundamentals/test-and-debug/images/create-project.gif)

### Set up the Project

For this project, we will have three directories:

- **src** folder to contain contract classes, which is generated automatically when we created the project.
- **lib** folder to contain *avm.jar*.
  
  ![lib](/developers/fundamentals/test-and-debug/images/add-lib.gif)

- **test** folder to contain test classes.

  ![test](/developers/fundamentals/test-and-debug/images/add-test.gif)

## Write the Contract

We will use a simple Ownable contract as an example. The contract assigns the account that deploys the contract as the owner upon deployment. The owner is allowed to transfer the ownership of the contract to another account later. Ownership will only be transferred when the assigned new owner accepts the ownership. Once the ownership transfer is completed, an `OwnershipTransferred` event will be logged along with the old owner address and the new owner address.

To write a Java smart contract, we will first need to create a `Java Class` file:

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

    @Initializable
    private static String deployer;


    static {
        // Assign the deployer as the owner.
        owner = Blockchain.getCaller();
        newOwner = new Address(new byte[32]);

        // Log the deployer upon deployment
        Blockchain.log(deployer.getBytes());
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

Now we are ready to test our contract without deploying the contract to the network. Take a look at [Junit test fundamentals](https://www.vogella.com/tutorials/JUnit/article.html) if you are not familiar with it. We will use the `AvmRule` to write our tests, which is a Junit Rule designed for testing Java contract on an embedded AVM.

### Create Aion Blockchain Environment

First, we will instantiate the AvmRule. It creates an in-memory representation of the Aion kernel and AVM. It not only allows developers to write tests for a single method but also logical tests from deploying the contract and performing a series of interaction with the contracts under a Blockchain runtime environment. Every time we run a test, the built kernel and AVM instances are refreshed.

```java
@Rule
public AvmRule avmRule = new AvmRule(true);
```

Two things worth noticing here:

1. `@Rule` indicates that an embedded AVM will be instantiated for each test method, which means for each method, it is talking to a new kernel. If you want all your test to be run in the same AVM and kernel, define it as `@classRule`.
2. `AvmRule` takes a boolean argument, where `true` enables the debug mode. AvmRule with debug mode not only gives your kernel responses but also verbose contract errors and concurrent executor.

### Deploy the Contract

We need an account that has sufficient balance to deploy the contract, and a variable to hold the contract address:

```java
private Address deployer = avmRule.getPreminedAccount();
private Address contractAddress;
```

We will assign contract in a method with `@Before` so that it will be run before the `@Test` method.

```java
@Before
public  void deployContract() {...}
```

Then we will get the bytes that represent the contract jar, along with the deployment arguments in byte[] if required.

Use [ABIStreamingEnocder](/developers/fundamentals/packages/abi/#abistreamingencoder-https-avm-api-aion-network-org-aion-avm-userlib-abi-abistreamingencoder) to encode the deployment arguments:

```java
byte[] deploymentArguments = encoder.encodeOneString("OwnershipTransferred").encodeOneString("Jennifer").toBytes();
```

Then, we use `avmRule.getDappBytes` to get the contract bytes by providing the main class for the contract(contract entry point), deployment arguments, and any other classes that is needed for the contract jar:

```java
byte[] contract = avmRule.getDappBytes(SimpleOwnable.class, deploymentArguments);
```

After everything is set, we can deploy the contract and get the contract address:

```java
contractAddress = avmRule.deploy(deployer, BigInteger.ZERO, contract).getDappAddress();
```

Till now, we have:

```java
public class SimpleOwnableRuleTest {
    @Rule
    public AvmRule avmRule = new AvmRule(true);

    // Default address with balance
    private Address deployer = avmRule.getPreminedAccount();

    private Address contractAddress;

    @Before
    public  void deployContract() {
        ABIStreamingEncoder encoder = new ABIStreamingEncoder();
        byte[] deploymentArguments = encoder.encodeOneString("OwnershipTransferred").encodeOneString("Jennifer").toBytes();
        byte[] contract = avmRule.getDappBytes(SimpleOwnable.class, deploymentArguments);

        // Deploy the contract and get the contract address
        contractAddress = avmRule.deploy(deployer, BigInteger.ZERO, contract).getDappAddress();

}
```

### Single Method Test

Now we have a contract deployed in the kernel, we can start to interact with it and test if it works. In this example, we will see if the `owner` is set to the deployer account upon deployment by calling `getOwnerAddress`.

To do that, we will be using `avmRule.call`, which takes the caller address, the contract address, any value that is wanted to the contract along with the call, and the transaction data. The transaction data will first include the name of the method we want to call, then the arguments that are required.

Again, we can use ABIStreamingEncoder:

```java
ABIStreamingEncoder encoder = new ABIStreamingEncoder();
byte[] txData = encoder.encodeOneString("getOwnerAddress").toBytes();
```

Then, we will make the call and hold the result in an `AvmRule.ResultWrapper`:

```java
AvmRule.ResultWrapper result = avmRule.call(deployer, contractAddress, BigInteger.ZERO, txData);
```

Then we can make sure the transacton call is successful by checking the `status` in the receipt:

```java
ResultCode status = result.getReceiptStatus();
Assert.assertTrue(status.isSuccess());
```

If so, we check the return owner address is the same with the deployer address:

```java
Address res = (Address) result.getDecodedReturnData();
Assert.assertTrue(res.equals(deployer));
```

The complete test is:
```java
 @Test
public void testGetOwnerAddress() {

    ABIStreamingEncoder encoder = new ABIStreamingEncoder();
    byte[] txData = encoder.encodeOneString("getOwnerAddress").toBytes();
    AvmRule.ResultWrapper result = avmRule.call(deployer, contractAddress, BigInteger.ZERO, txData);

    ResultCode status = result.getReceiptStatus();
    Assert.assertTrue(status.isSuccess());

    // Cast the return type
    Address res = (Address) result.getDecodedReturnData();
    Assert.assertTrue(res.equals(deployer));
    }
```

Then we can run the test:

![test-get-owner](/developers/fundamentals/test-and-debug/images/test-get-owner.gif)

Great, it passed!

Let's write another test for `transferOwnership`, where the method can be only called by the owner, therefore, we need to make sure that anyone that is not an owner, should fail the call.

Again, we need to encode the transaction data, which is the method name and the arguments. This method requires an `Address`, we can use `avmRule.getRandomAddress` to get a random address:

```java
ABIStreamingEncoder encoder = new ABIStreamingEncoder();
Address newOwner = avmRule.getRandomAddress(BigInteger.ZERO);
byte[] txData = encoder.encodeOneString("transferOwnership").encodeOneAddress(newOwner).toBytes();
```

Then, we need a different address with sufficient balance, that is not the deployer(current owner) to make the call, and we are expecting the call to be failed. The complete test is as follows:

```java
@Test
public void testTransferOwnership() {

    ABIStreamingEncoder encoder = new ABIStreamingEncoder();
    Address newOwner = avmRule.getRandomAddress(BigInteger.ZERO);
    byte[] txData = encoder.encodeOneString("transferOwnership").encodeOneAddress(newOwner).toBytes();

    Address caller = avmRule.getRandomAddress(BigInteger.TEN.pow(10));
    AvmRule.ResultWrapper result = avmRule.call(caller, contractAddress, BigInteger.ZERO, txData);

    ResultCode status = result.getReceiptStatus();
    Assert.assertTrue(status.isFailed());
}
```

Then if we run the test:

![test-transfer-ownership](/developers/fundamentals/test-and-debug/images/test-transfer-ownership.gif)

The output shows that the test is passed because the call is failed as expected. Since we turned on the debug mode, we can see that the transaction is being reverted due to a revert exception in the AVM caused by `avm_require`:

```sh
i.RevertException
    at org.aion.avm.core.BlockchainRuntimeImpl.avm_require(BlockchainRuntimeImpl.java:413)
    at p.avm.Blockchain.avm_require(Blockchain.java:228)
    at SimpleOwnable.avm_transferOwnership(Unknown Source)
    at SimpleOwnable.avm_main(Unknown Source)
    at java.base/jdk.internal.reflect.NativeMethodAccessorImpl.invoke0(Native Method)
    at java.base/jdk.internal.reflect.NativeMethodAccessorImpl.invoke(NativeMethodAccessorImpl.java:62)
    at java.base/jdk.internal.reflect.DelegatingMethodAccessorImpl.invoke(DelegatingMethodAccessorImpl.java:43)
    at java.base/java.lang.reflect.Method.invoke(Method.java:566)
    at org.aion.avm.core.persistence.LoadedDApp.callMain(LoadedDApp.java:237)
    at org.aion.avm.core.DAppExecutor.call(DAppExecutor.java:62)
    at org.aion.avm.core.AvmImpl.commonInvoke(AvmImpl.java:411)
    at org.aion.avm.core.AvmImpl.runExternalInvoke(AvmImpl.java:329)
    at org.aion.avm.core.AvmImpl.backgroundProcessTransaction(AvmImpl.java:233)
    at org.aion.avm.core.AvmImpl.access$300(AvmImpl.java:35)
    at org.aion.avm.core.AvmImpl$AvmExecutorThread.run(AvmImpl.java:100)
```

### Breakpoint and Debug

We can set breakpoints in the contract for debugging purposes, or we can just use it as a pause, and monitor the transaction call execution.

We will use `testTransferOwnership` as an example. Let's see if the transaction is actually failed because the caller is not the current owner.

We first need to set the breakpoint in the contract:

![set-up](/developers/fundamentals/test-and-debug/images/set-one-break-point.gif)

Then, we can `debug` the `testTransferOwnership`:

![fail](/developers/fundamentals/test-and-debug/images/fail-requirement.gif)

We can see that `transferOwnership` is being called, and `Blockchain.require` is being checked and it fails since the caller address does not match the owner address.
