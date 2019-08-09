---
title: Setup Project
section: Web3J
description: Web3J allows you to integrate your Java blockchain application into an existing standard Java application. It does this by wrapping your blockchain application in a standard application wrapper. This article walks you through this process. We recommend that you follow this article through by using the supplied Counter contract. Once you are comfortable with the process, you can attempt to wrap your custom Java blockchain application.
weight: 300
---

## Prerequisites

First up, make sure that you have the following prerequisites:

- Java 10 or above

## Generate the Sample Contract

We will be using the following contract in this tutorial. It is a simple _Counter_ contract that increases or decreses the value of the `count` variable by an integer.

```java
package org.aion.web3;
import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.tooling.abi.Initializable;
import java.math.BigInteger;

public class Counter
{
    @Initializable
    private static int count;

    @Callable
    public static void incrementCounter(int increment){
        count += increment;
        Blockchain.log("CounterIncreased".getBytes(), BigInteger.valueOf(increment).toByteArray());
    }

    @Callable
    public static void decrementCounter(int decrement){
        count -= decrement;
        Blockchain.log("CounterDecreased".getBytes(), BigInteger.valueOf(decrement).toByteArray());
    }

    @Callable
    public static int getCount(){
        return count;
    }
}
```

You can either [compile the above contract yourself](developers/basics/compile/intellij/), or you can use the pre-compiled `jar` and `abi` files we have generated for you:

1. [`Counter-1.0-SNAPSHOT.jar`](https://github.com/jennijuju/aion-web3j-example/raw/master/contract/counter-1.0-SNAPSHOT.jar)
2. [`Counter-1.0-SNAPSHOT.abi`](https://raw.githubusercontent.com/jennijuju/aion-web3j-example/master/contract/counter-1.0-SNAPSHOT.abi)

Once you have your `.jar` and `.abi` files, move them to a convenient location.

## Generate the Contract Wrapper

In order for a standard Java application to interact with your Java contract, you need to wrap it within the Web3J wrapper. While the process is the same for any Java contract, the output is different. A wrapper for one Java contract will not work for any other Java contract.

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

7. Web3J now needs the `jar` and `abi` files from your blockchain application. Copy your `.jar` and `.abi` files into this folder:

    ```bash
    cp ~/Downloads/counter-1.0.SNAPSHOT.abi ~/Downloads/counter-1.0.SNAPSHOT.jar .
    ```

8. Generate your Aion contract wrapper:

    ```bash
    ./web3j-aion -a counter-1.0-SNAPSHOT.abi -b counter-1.0-SNAPSHOT.jar -o ~/Desktop -p aion
    ```

    The `-o ~/Desktop` directory in this command is the location where you wrapper will be saved. To keep thing simple we've told Gradle to save it to the desktop. You can find your `Counter.java` wrapper in the `~/Desktop/aion/` folder.

    For future reference, the following arguments are available:

    | Flag | Required | Description |
    |------|----------|-------------|
    | `-a`, `--abiFile` | `true` | ABI file in AVM format with a contract definition. |
    | `-b`, `--binFile` | `false` | BIN or JAR file with the contract compiled code in order to generate deploy methods. |
    | `-o`, `--outputDir`  | `true` | Destination base directory. |  
    | `-p`, `--package` | `true` | Base package name. |
    | `-t`, `--targetVm` | `false` | Target Aion virtual machine (AVM by default). |

If you used the example _counter_ contract, your `Counter.java` wrapper should look something like this:

```java
package org.aion.web3;
import java.math.BigInteger;

...

public class Counter extends AvmAionContract {
    private static final String BINARY = "00001b7b504b0304140008080800d4 ... ";
    public static final String FUNC_INCREMENTCOUNTER = "incrementCounter";
    public static final String FUNC_DECREMENTCOUNTER = "decrementCounter";
    public static final String FUNC_GETCOUNT = "getCount";

    @Deprecated
    protected Counter(String contractAddress, Web3j web3j, Credentials credentials, BigInteger gasPrice, BigInteger gasLimit) {
        super(BINARY, contractAddress, web3j, credentials, gasPrice, gasLimit);
    }

...
}
```

### Generate the Library

<!-- NOTE: What is this _library_? What does it do? What is it for? I have no idea what this section is for or why I'm doing it. -->

The library produced by this module must be present in your
_classpath_ when running an Aion Java contract wrapper. The Encoding and decoding do not work without it.

<!-- How do you add this _library_ into my classpath? -->

1. Move back into the `web3j-aion-master` folder you downloaded from GitHub:

    ```bash
    cd ~/Downloads/web3-aion-master
    ```

<!-- What is this that we're creating? What is a shadow jar? -->

2. Create **SOMETHING**:

    ```sh
    ./gradlew shadowJar

    > ...
    >
    > BUILD SUCCESSFUL in 8s
    > 7 actionable tasks: 3 executed, 4 up-to-date
    ```

3. Move into the newly created `libs` folder:

    ```bash
    cd avm/build/libs
    ```

4. You should be able to see a file called `web3j-aion-avm-0.1.0-SNAPSHOT-all.jar`.

<!-- What does this mean? How do I add this to my classpath? -->
You can use it by simply adding it to your classpath.

Make sure you put the contract wrapper and the library jar in your project. Check out this [project example](https://github.com/jennijuju/aion-web3j-example) for reference.

You're Java blockchain application is now wrapped within the Web3J wrapper. You should now be able to integrate it into other existing Java applications so that they can interact with the Aion blockchain.
