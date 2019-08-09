---
title: Web3J Walkthrough
section: Web3J
description: This guide will walk you through creating a Java application and connecting it to the blockchain using the Web3J packages.
draft: true
table_of_contents: true
header_image:
---

## Prerequisities

This project assumes that you're already familar with IntelliJ and how to create Aion contracts using the Aion4j plugin. To find out more on how to do this, check out the [IntelliJ section](/developers/tools/intellij-plugin). You will also need to following software installed.

1. Java 10 or above.
2. IntelliJ

## Walkthrough

In this walkthrough we're going to create a simple Java contract and compile it. We're then going to run the compiled contract through the Web3J wrapping tool which will give us a Java class we can import into a standard Java application. Finally we'll build a simple Java application and import the wrapped Java contract and have it interact with the blockchain.

We'll be using [IntelliJ and the Aion4J](/developers/tools/intellij-plugin/install-the-plugin) plugin.

### Create the Contract

The contract we're going to create is a simple _getter-setter_ application. The use can either view the value of a `String` variable, or change that variable.

1. Open IntelliJ and create a new Maven project using the latest AVM archetype.
2. Set the `GroupId` field to `aionexample` and the `ArtifactId` field to `gettersetter`.
3. Click **Next** through the rest project creation window and click **Finish**.
4. Click **Run Initialize** in the pop-up at the bottom right, or right click within your project and select **Aion Virtual Machine** > **Run Intialize**.
5. To keep things simple we won't be using tests in this project. So within the `src` folder of your new project, delete the `test` folder.
6. Within the `src/main/java/aionexample` folder, right click on `HelloAvm`, select **Refactor** → **Rename**, and rename `HelloAvm` to `GetterSetter`.
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

7. Compile your contract by right clicking on the `gettersetter` folder in the navigation panel and selecting **Aion Virtual Machine** → **Embedded** → **Deploy**.
8. You should now have a `gettersetter-1.0-SNAPSHOT.abi` and `gettersetter-1.0-SNAPSHOT.jar` files within your projects `target` folder. Copy them to somewhere handy like your desktop. These are the files we're going to wrap within the Web3J packages.
9. You can close this project now: **File** → **Close Project**.

### Wrap the Contract

In order for a standard Java application to interact with your Java contract, you need to _wrap_ the contract within the Web3J wrapper. While the process is the same for any Java contract, the output is different. A wrapper for one Java contract will not work for any other Java contract.

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

    ```sh
    unzip web3j-aion-0.1.0-SNAPSHOT.zip

    > Archive:  web3j-aion-0.1.0-SNAPSHOT.zip
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

    The `-o `~/Desktop` directory in this command is the location where you wrapper will be saved. To keep thing simple we've told the script to save it to the desktop. You can now find your `GetterSetter.java` wrapper in the `~/Desktop/gettersetter/` folder.

    For future reference, the following arguments are available for the `web3j-aion` script:

    | Flag | Required | Description |
    |------|----------|-------------|
    | `-a`, `--abiFile` | `true` | ABI file in AVM format with a contract definition. |
    | `-b`, `--binFile` | `false` | BIN or JAR file with the contract compiled code in order to generate deploy methods. |
    | `-o`, `--outputDir`  | `true` | Destination base directory. |  
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

### Set Up your Application and Import the Wrapper

In this step we're going to create an incredibly simple Java application that prints out the `myStr` variable within our contract. This application will also deploy our contract for us.

1. Create a new Java project in IntelliJ called `GetTheString`.
2. Within your projects root folder create a new directory called `lib`.
3. Within this new `lib` folder, paste the `web3j-aion-avm-0.1.0-SNAPSHOT-all.jar` file we created and saved into `~/Desktop/gettersetter` in the previous step.
4. Copy the `GetterSetter.java` file from within `~/Desktop/gettersetter` into the `src` folder.
5. Within the `src` folder, create a new Java class called `GetTheString`.

Your project folder should look something like this now:

```txt
GetTheString/
├── GetTheString.iml
├── lib
│   └── web3j-aion-avm-0.1.0-SNAPSHOT-all.jar
└── src
    ├── GetTheString.java
    └── GetterSetter.java
```

Now we have the framework to start interacting with the blockchain. Next up, we're going to deploy our contract and interact with it using the Aion test network.

### Deploy and Interact

First up we need to tell our Java application to deploy our contract to the Aion test network. To do this you'll need an Aion node on the _Mastery_ testnet, and an account with sufficent balance to deploy and call a contract. You can use [Nodesmith to connect to a node](/developers/nodes/hosting-services), and the [Aion Testnet Faucet](/developers/tools/faucets) to get some free test tokens.

Now that you've got those two details, we're ready to start writing our Java application.

1. Open the `GetTheString` file.
2. Within the `GetTheString` class definiton add these two lines, filling in your information:

    ```java
    private static String NODE_ENDPOINT = "YOUR_NODE_URL";
    private static String PRIVATE_KEY = "YOUR_PRIVATE_KEY";
    ```

3. Create an `aion` object by adding this line:

    ```java
    private static final Aion aion = Aion.build(new HttpService(NODE_ENDPOINT));
    ```

4. Create `TranasactionManager` object called `manager`:

    ```java
    private static final TransactionManager manager = new AionTransactionManager(aion, new Ed25519KeyPair(PRIVATE_KEY), VirtualMachine.AVM);
    ```

    
