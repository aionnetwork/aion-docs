---
title: End-to-End
section: Web3J
description: In this walkthrough, we're going to create a simple Java contract and compile it. We're then going to run the compiled contract through the Web3J wrapping tool which will give us a Java class we can import into a standard Java application. Finally, we'll build a simple Java application and import the wrapped Java contract and have it interact with the blockchain.
draft: false
table_of_contents: true
header_image:
weight: 100
---

We'll be using [IntelliJ and the Aion4J](/developers/tools/intellij-plugin/install-the-plugin) plugin.

## Prerequisities

This project assumes that you're already familiar with IntelliJ and how to create Aion contracts using the Aion4j plugin. To find out more on how to do this, check out the [IntelliJ section](/developers/tools/intellij-plugin). You will also need to following software installed.

1. Java 10 or above.
2. IntelliJ

## Create the Contract

The contract we're going to create is a simple _getter-setter_ application. The user can either view the value of a `String` variable or change that variable.

1. Open IntelliJ and create a new Maven project using the latest AVM archetype.
2. Set the `GroupId` field to `aionexample` and the `ArtifactId` field to `gettersetter`.
3. Click **Next** through the rest project creation window and click **Finish**.
4. Click **Run Initialize** in the pop-up at the bottom right, or right-click within your project and select **Aion Virtual Machine** > **Run Intialize**.
5. To keep things simple we won't be using tests in this project. So within the `src` folder of your new project, delete the `test` folder.
6. Within the `src/main/java/aionexample` folder, right-click on `HelloAvm`, select **Refactor** → **Rename**, and rename `HelloAvm` to `GetterSetter`.
7. Depending on your IntelliJ setup, IntelliJ might rename all the instances of `HelloAvm` within the class to `GetterSetter`. If it doesn't however, do this manually. Make sure to set the `contract.main.class` field within your `pom.xml` file to `<contract.main.class>aionexample.GetterSetter</contract.main.class>`

You should now have the basis of your Java contract project. If you want, you can delete the `greet()` and `sayHello()` functions within your `GetterSetter` class since we won't be using them. But there's no harm in leaving them in there. You can also copy and paste the contract below:

```java
package aionexample;
import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;

public class GetterSetter
{
 private static String myStr = "Hello AVM";

 @Callable
 public static String getString() { return myStr; }

 @Callable
 public static void setString(String newStr) { myStr = newStr; }
}
```

7. Compile your contract by right-clicking on the `gettersetter` folder in the navigation panel and selecting **Aion Virtual Machine** → **Embedded** → **Deploy**.
8. You should now have a `gettersetter-1.0-SNAPSHOT.abi` and `gettersetter-1.0-SNAPSHOT.jar` files within your projects `target` folder. Copy them to somewhere handy like your desktop. These are the files we're going to wrap within the Web3J packages.
9. You can close this project now: **File** → **Close Project**.

A quick note here. Although the steps above say to _Deploy_ your contract, we're not deploying it anywhere special. The Aion4j plugin we're using compiles and deploys your Java contract in the **Deploy** command. Since we used the **Embedded** > **Deploy** feature, the Aion4j compiles and deploys your contract to the local kernel. It never leaves your machine. If you'd prefer to not use Aion4J to compile your project, you can use Maven:

```bash
mvn clean install
```

This requires that you have Maven installed and configured on your machine.

## Wrap the Contract

For a standard Java application to interact with your Java contract, you need to _wrap_ the contract within the Web3J wrapper. While the process is the same for any Java contract, the output is different. A wrapper for one Java contract will not work for any other Java contract.

1. Download the Aion Web3J package from GitHub:

    ```bash
    git clone https://github.com:web3j/web3j-aion.git
    ```

2. Move into the new folder:

    ```bash
    cd web3j-aion-master
    ```

3. Generate the binary distribution using Gradlew:

    ```bash
    ./gradlew distZip

    > Starting a Gradle Daemon (subsequent builds will be faster)
    >
    > ...
    >
    > BUILD SUCCESSFUL in 5s
    > 9 actionable tasks: 9 executed
    ```

 You might see a warning about `Deprecated Gradle features`. You can safely ignore this for now. It will be fixed in a future release.

4. Move into the distributions folder:

    ```bash
    cd codegen/build/distributions
    ```

5. Extract the `web3j-aion-0.1.0-SNAPSHOT.zip` file:

    ```bash
    unzip web3j-aion-0.1.0-SNAPSHOT.zip

    > Archive: web3j-aion-0.1.0-SNAPSHOT.zip
    > creating: web3j-aion-0.1.0-SNAPSHOT/
    > creating: web3j-aion-0.1.0-SNAPSHOT/lib/
    >
    > ...
    >
    > creating: web3j-aion-0.1.0-SNAPSHOT/bin/
    > inflating: web3j-aion-0.1.0-SNAPSHOT/bin/web3j-aion.bat 
    > inflating: web3j-aion-0.1.0-SNAPSHOT/bin/web3j-aion
    ```

6. Move into `bin` folder:

    ```bash
    cd web3j-aion-0.1.0-SNAPSHOT/bin
    ```

7. Web3J now needs the `jar` and `abi` files we made in IntelliJ. Copy your `.jar` and `.abi` files into this folder:

    ```bash
    cp ~/Desktop/gettersetter-1.0-SNAPSHOT.abi ~/Desktop/gettersetter-1.0-SNAPSHOT.jar .
    ```

8. Generate your Aion contract wrapper:

    ```bash
    ./web3j-aion -a gettersetter-1.0-SNAPSHOT.abi -b gettersetter-1.0-SNAPSHOT.jar -o ~/Desktop -p gettersetter

    > Generating gettersetter.GetterSetter ...
    >
    > ...
    >
    > File written to /Users/aion/Desktop
    ```

The `-o ~/Desktop` directory in this command is the location where you wrapper will be saved. To keep thing simple we've told the script to save it to the desktop. You can now find your `GetterSetter.java` wrapper in the `~/Desktop/gettersetter/` folder.

For future reference, the following arguments are available for the `web3j-aion` script:

| Flag | Required | Description |
|------|----------|-------------|
| `-a`, `--abiFile` | `true` | ABI file in AVM format with a contract definition. |
| `-b`, `--binFile` | `false` | BIN or JAR file with the contract compiled code in order to generate deploy methods. |
| `-o`, `--outputDir` | `true` | Destination base directory. |
| `-p`, `--package` | `true` | Base package name. |
| `-t`, `--targetVm` | `false` | Target Aion virtual machine (AVM by default). |`

9. We also need to create a `shadowJar` file. Back in the root of the Web3J repository run:

 ```bash
 ./gradlew shadowJar

 > <===========--> 90% EXECUTING [2s]
 >
 > ...
 >
 > BUILD SUCCESSFUL in 9s
 > 7 actionable tasks: 3 executed, 4 up-to-date
 ```

10. Copy this new `.jar` into the `gettersetter` folder on your desktop:

 ```bash
 cp avm/build/libs/web3j-aion-avm-0.1.0-SNAPSHOT-all.jar ~/Desktop/gettersetter
 ```

We now have the two files we need to include within our Java project. Next up is creating the Java project to house everything.

## Set Up your Application and Import the Wrapper

In this step, we're going to create an incredibly simple Java application that prints out the `myStr` variable within our contract. This application will also deploy our contract for us.

1. Create a new Java project in IntelliJ called `GetTheString`.
2. Within your projects root folder create a new directory called `lib`.
3. Within this new `lib` folder, paste the `web3j-aion-avm-0.1.0-SNAPSHOT-all.jar` file we created and saved into `~/Desktop/gettersetter` in the previous step.
4. Copy the `GetterSetter.java` file from within `~/Desktop/gettersetter` into the `src` folder.
5. Within the `src` folder, create a new Java class called `GetTheString`. Your project folder should look something like this now:

    ```txt
    GetTheString/
    ├── GetTheString.iml
    ├── lib
    │  └── web3j-aion-avm-0.1.0-SNAPSHOT-all.jar
    └── src
    ├── GetTheString.java
    └── GetterSetter.java
    ```

Lastly, we need to tell IntelliJ that we want to use the `lib` folder as this project library location.

1. Go to **File** > **Project Structure**.
2. Select **Libraries** from the left panel.
3. Click the `+` icon and select **Java**.
4. In the window that opens, go into the `lib` folder within your `GetTheString` project folder.
5. Select the `web3j-aion-avm-0.1.0-SNAPSHOT-all.jar` file and click **Open**.
6. Click **OK** on the confirmation window. Then click **Apply** and **OK** within the **Project Structure** window.

Now we have the framework to start interacting with the blockchain. Next up, we're going to deploy our contract and interact with it using the Aion test network.

## Write, Deploy, and Interact

First up we need to tell our Java application to deploy our contract to the Aion test network. To do this you'll need an Aion node on the _Mastery_ testnet, and an account with sufficient balance to deploy and call a contract. You can use [Nodesmith to connect to a node](/developers/nodes/hosting-services), and the [Aion Testnet Faucet](/developers/tools/faucets) to get some free test tokens.

### Write

Now that you've got those two details, we're ready to start writing our Java application.

1. Open the `GetTheString` file.
2. At the very top of the file add the following lines to import the packages we need:

    ```java
    import org.web3j.aion.VirtualMachine;
    import org.web3j.aion.crypto.Ed25519KeyPair;
    import org.web3j.aion.protocol.Aion;
    import org.web3j.aion.tx.AionTransactionManager;
    import org.web3j.aion.tx.gas.AionGasProvider;
    import org.web3j.protocol.core.methods.response.TransactionReceipt;
    import org.web3j.protocol.http.HttpService;
    import org.web3j.tx.TransactionManager;
    ```

3. Within the `public class GetTheString` class definiton add these two lines, filling in your information:

    ```java
    private static String NODE_ENDPOINT = "YOUR_NODE_URL";
    private static String PRIVATE_KEY = "YOUR_PRIVATE_KEY";
    ```

4. Create an `aion` object by adding this line:

    ```java
    private static final Aion aion = Aion.build(new HttpService(NODE_ENDPOINT));
    ```

5. Create `TranasactionManager` object called `manager`:

    ```java
    private static final TransactionManager manager = new AionTransactionManager(aion, new Ed25519KeyPair(PRIVATE_KEY), VirtualMachine.AVM);
    ```

6. Create a `main()` class that will house all our further code:

    ```java
    public static void main(String [] args) throws Exception {

    }
    ```

### Deploy

We can now get to deploying your contract. Since we've already set up the scaffolding in the rest of this class, all we need to do is call one function.

1. Call the `.deploy` function within your `GetterSetter` object:

    ```java
    final GetterSetter getterSetterContract = GetterSetter.deploy(aion, manager, AionGasProvider.INSTANCE).send();
    ```

2. You can also request the transaction receipt and contract address once your Java contract has been deployed:

    ```java
    System.out.println("Tx Hash:"+ counterContract.getTransactionReceipt());
    System.out.println("Contract Address: " + counterContract.getContractAddress());
    ```

3. You should now be able to run your application. Click **Run** > **Run...** from the title bar. 

You may get an error about `JDK7 types`. You can safely ignore this. It can take up to 30 seconds to deploy your contract. Once it's deployed you should be able to see the transaction hash and contract address:

    ```bash
    WARNING: Unable to load JDK7 types (annotations, java.nio.file.Path): no Java7 support added
    Tx Hash:Optional[TransactionReceipt{transactionHash='0x82ed1b830d5420f4d0ed591f1' ...
    Contract Address: 0xa0a6468149676f ...
    ```

### Interact

So now that we're able to deploy our contract, we should be able to interact with it. There are two functions within our contract `getString` and `setString`. Let's start by calling the `getString` method and checking the response.

1. Create a variable called `result` of type `String`, and have it set to the response of the `getString` method:

    ```java
    String firstResult = getterSetterContract.call_getString().send();
    ```

2. Print out the `result` variable:

    ```java
    System.out.println("Current string is: " + firstResult);
    ```

3. Run your project again to see the results.

    ```bash
    > WARNING: Unable to load JDK7 types (annotations, java.nio.file.Path): no Java7 support added
    >
    > ...
    >
    > Current string is: Hello AVM
    ```

Next, let's try setting the string. Since we're going to change the state of the blockchain this action will use funds from your account, so [make sure there is enough](https://beta-docs.aion.network/developers/tools/intellij-plugin/get-balance/) `AION` in there to facilitate the request.

1. Create a variable called `transactionReceipt` of type `TransactionReceipt`, and have it set to the response of the `setString` method. Add the string you want to set the `myStr` variable to as an argument:

    ```java
    TransactionReceipt transactionReceipt = getterSetterContract.send_setString("Hello World!").send();
    ```

2. Print out whether or not the transaction was successful and the string was set:

    ```java
    System.out.println("String Set: " + transactionReceipt.isStatusOK());
    ```

3. Call the `getString` method again using the same code from earlier:

    ```java
    String secondResult = getterSetterContract.call_getString().send();
    System.out.println("Current string is: " + secondResult);
    ```

4. Run your project again to see the results.

    ```bash
    > WARNING: Unable to load JDK7 types (annotations, java.nio.file.Path): no Java7 support added
    >
    > ...
    >
    > Current string is: Hello AVM
    > String Set: true
    > Current string is: Hello World!
    ```

And there you have it! You've successfully written, deployed, and interacted with a Java contract on the Aion test network using Web3J! Check out the official Web3J documentation for more information on what you can do with the framework.
