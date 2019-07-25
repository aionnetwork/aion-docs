---
title: End to End
description: You can utilize the built in Java testing packages when creating your dApps on the Aion network. They allow you to deploy your Java smart contract and write tests to interact with the contract under a real Aion blockchain environment without actually running an Aion blockchain. In this section, we're going to be walking through the entire workflow of deploying a Java contract to the local kernel, writing some tests, and finally running those tests against your project.
table_of_contents: true
---

## Prerequisites

This guide assumes that you have the [IntelliJ IDE installed](https://www.jetbrains.com/idea/), along with the [Aion4j plugin](/developers/tools/intellij-plugin/install-the-plugin). You do not need to have an IntelliJ project ready, as we will be creating a new project in this guide.

## Set up a Project

We will use IntelliJ to create a new Java dApp project.

### Create a project

1. With IntelliJ open, go to **File** → **New** → **Project** or click **Create New Project** from the splash screen.
2. Select **Maven** from the options on the left.
3. Check **Create from archetype**.
4. Select `org.aion4j:avm-archetype` from the list and click **Next**.
5. Enter the **GroupID** and **ArtifactID** for your project. For more information on these values check out the [Apache Maven documentation](https://maven.apache.org/guides/mini/guide-naming-conventions.html). For this guide we're going to enter `aion`, `example`. 
6. Click **Next** when you have finished.
7. Click **Next**.
8. Click **Finish**.
9. An Import popup will appear at the bottom right of the screen once everything has loaded. Click **Enable Auto-Import**.

## Copy the Contract

We're going to use the contract below to create our tests. The contract assigns the variable `owner` to the address that deploys the contract. This _owner_ is allowed to transfer the ownership of the contract to another account. Ownership will only be transferred when the assigned _new owner_ accepts the ownership. Once the ownership transfer is completed, an `OwnershipTransferred` event will be logged along with the old owner address and the new owner address.

1\. Open the `HelloAvm` file within your project.

2\. Delete the entire contents of the file.

3\. Copy and paste the contract listed below into the `HelloAvm` file.

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
    private static String transferLogTopic;

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
        Blockchain.require(Blockchain.getCaller().equals(owner));
        newOwner = newOwnerAddress;
    }

    // New owner accepts the ownership. Update the owner address and log the transfer.
    @Callable
    public static void acceptOwnership() {
        Blockchain.require(Blockchain.getCaller().equals(newOwner));
        Blockchain.log(transferLogTopic.getBytes(), owner.toByteArray(), newOwner.toByteArray());
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

5\. Save the file.

## Write Tests

Now we are ready to test our contract without deploying the contract to the network. First up we need to create our test file.

1. Within the `src/test/java/exmaple`, open the `RuleTest` file.
2. Delete the contents of the file. You should be left with an empty `HelloAvmRuleTest` file.

Next we need to instantiate the `AvmRule` class. It creates an _in-memory_ representation of the Aion kernel and AVM. Add the following lines to the top of the `HelloAvmRuleTest`.

```java
@Rule
public AvmRule avmRule = new AvmRule(true);
```

There are two things to point out here:

1. `@Rule` indicates that an embedded AVM will be instantiated for each test method with this file. This means that each individual test will talk to a _fresh_ version of the kernel. If you want all your tests to be run in the same AVM and kernel, change `@Rule` to `@ClassRule`.
2. `AvmRule` takes a boolean argument where `true` enables _debug_ mode, giving you more verbose output from IntelliJ.

Next, we need to create an account for the test to use. The `avmRule` class comes with a default account and some tokens already in it. Add the following line to the test:

```java
private Address deployer = avmRule.getPreminedAccount();
```

We should also create a `contractAddress` variable. Add the following line into the test:

```java
private Address contractAddress;
```

We will assign contract in a method with `@Before` so that it will be run before the `@Test` method.

```java
@Before
public void deployContract() {...}
```

Then we will get the bytes that represent the contract jar, along with the deployment arguments in byte[] if required.

Use [ABIStreamingEnocder](/developers/fundamentals/packages/abi) to encode the deployment arguments:

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

![test-get-owner](/developers/basics/test-and-debug/images/test-get-owner.gif)

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

![test-transfer-ownership](/developers/basics/test-and-debug/images/test-transfer-ownership.gif)

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

![set-up](/developers/basics/test-and-debug/images/set-one-break-point.gif)

Then, we can `debug` the `testTransferOwnership`:

![fail](/developers/basics/test-and-debug/images/fail-requirement.gif)

We can see that `transferOwnership` is being called, and `Blockchain.require` is being checked and it fails since the caller address does not match the owner address.
