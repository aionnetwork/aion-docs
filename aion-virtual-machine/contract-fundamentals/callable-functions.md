# Callable Functions

In order for a function or method to be called from outside the contract (by a user on the blockchain, or from another contract) it needs to be annotated as `@Callable`.

The code below is taken from the sample `HelloAvm` contract that is packaged with the [Maven toolkit](/aion-virtual-machine/maven) and the [IntelliJ plugin](/aion-virtual-machine/intellij).

```java
@Callable
public static String greet(String name) {
    return "Hello " + name;
}
```

The [Aion IntelliJ plugin](/aion-virtual-machine/intellij) automatically warns you if you try to use a invalid type. See the [ABI Type Check](/aion-virtual-machine/intellij/abi-type-check) section for more details.

## Within the Contract

If you are calling a function from another place within the contract, you do not have to assign the `@Callable` annotation to the function you want to call.

The following code will compile and execute:

```java
@Callable
public static String greet() {
    String name = getName();
    return "Hello " + name;
}

public static String getName() {
    return "Bob";
}
```

The transaction will output:

```bash
[INFO] ****************  Method call result  ****************
[INFO] Data       : Hello Bob
[INFO] Energy used: 266219
[INFO] *********************************************************
```

It is possible to have functions that do not have the `@Callable` annotation, and your contract will compile just fine. For example, the `getName()` function above does not have a `@Callable` annotation assigned to it, but it returns the string `Bob` to the `greet()` function. Howeverm, any attempt to call `getName()` directly will result in a `Method call failed: InvocationTargetException: Dapp call failed. Code: FAILED_REVERT` error.

```bash
[ERROR] Failed to execute goal org.aion4j:aion4j-maven-plugin:0.5.0:call (default-cli) on project example: Method call failed: InvocationTargetException: Dapp call failed. Code: FAILED_REVERT, Reason: null -> [Help 1]
```