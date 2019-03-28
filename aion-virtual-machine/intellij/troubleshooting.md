# Troubleshooting

Here are some issues you might face when installing and setting up the Aion IntelliJ plugin. If you can't find what you're looking for here, [post your issue on StackOverflow](https://stackoverflow.com/search?q=aion) using the `aion` tag, or drop us an email at [support@aion.network](mailto:support@aion.network).

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

## Println not Working on Remote Node

`BlockchainRuntime.println` will not return anything from a remote node. This is because `BlockchainRuntime.println` prints to the local console only. So when you try to run it on a remote node, the node itself will print it to it's own console, but the kernel will not return anything to you. `BlockchainRuntime.println` returns data when ran on an local kernel (embedded AVM).

## Using Constructor Arguments

To send arguments to a constructor method when deploying a contract, open the **Configuration** window (**right click** > **Aion Virtual Machine** > **Configuration**) and go to the **Common** tab. Enter your constructor arguments into the **Deployment Arguments** section. Remember to specify variable types.