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