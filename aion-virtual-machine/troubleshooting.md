# Troubleshooting

Here are some issues you might face when installing and setting up the Aion IntelliJ or Maven plugin. If you can't find what you're looking for here, [post your issue on StackOverflow](https://stackoverflow.com/search?q=aion) using the `aion` tag, or drop us an email at [support@aion.network](mailto:support@aion.network).

## Cannot Start Maven: Cannot run program

If you get the following error message, you may have an unsupported version of Java installed:

```bash
[FATAL_ERROR] Cannot start Maven: Cannot run program "/Library/Java/JavaVirtualMachines/1.6.0.jdk/Contents/Home/bin/java" (in directory "/private/var/folders/78/srvycpg54732ptgzj7qcvqh00000gn/T/archetypetmp"): error=2, No such file or directory
```

You must have at least Java 10 install. To find out what version of Java you have installed run:

```bash
java --version

> java 11 2018-09-25
> Java(TM) SE Runtime Environment 18.9 (build 11+28)
> Java HotSpot(TM) 64-Bit Server VM 18.9 (build 11+28, mixed mode)
```

## Cannot get the newest Aion4j Plugin

If the version of aion4j plugin in your `pom.xml` is the same as here https://github.com/satran004/aion4j-maven-plugin#current-release-version-050 and you get following error messgae when you try to initialize your project

```bash
Failure to find org.aion4j:aion4j-maven-plugin:jar:0.5.0 in https://repo.maven.apache.org/maven2
```

delete your $homedir/.m2/repository/org/aion4j folder to cleanup the cache and try again.

## Println not Working on Remote Node

`BlockchainRuntime.println` will not return anything from a remote node. This is because `BlockchainRuntime.println` prints to the local console only. So when you try to run it on a remote node, the node itself will print it to it's own console, but the kernel will not return anything to you. `BlockchainRuntime.println` returns data when ran on an local kernel (embedded AVM).

## Using Constructor Arguments

To send arguments to a constructor method when deploying a contract, open the **Configuration** window (**right click** > **Aion Virtual Machine** > **Configuration**) and go to the **Common** tab. Enter your constructor arguments into the **Deployment Arguments** section. Remember to specify variable types.

## AVM.jar is not found

This usually means that you're trying to run something on a remote node, but you haven't passed the `-Premote` argument. For example the following code will fail:

```bash
mvn aion4j:get-balance -Dweb3rpc.url=https://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=AABBCCDDEEFF112233445566 -Daccount=0xaabbccddeeff112233445566a1b2c3d4e5f6
```

Adding the `-Premote` argument to the end of the command should fix the problem.

```bash
mvn aion4j:get-balance -Dweb3rpc.url=https://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=AABBCCDDEEFF112233445566 -Daccount=0xaabbccddeeff112233445566a1b2c3d4e5f6 -Premote
```

### realpath: command not found

This issue happens on some version of macOS when running the AVM directly (not using Maven) from the terminal. You can safely ignore the warning, it does not impact the outcome of the compilation.

### java.lang.IllegalArgumentException: Unknown argument: sayHello

This is an issue when running the AVM directly (not using Maven) through the terminal. Make sure you give the `-m` argument when calling the `sayHello` function.

### InvocationTargetException: Method argument parsing error: NullPointerException

You need to include a variable type for your argument. See the [Variable Types page](/aion-virtual-machine/troubleshooting).