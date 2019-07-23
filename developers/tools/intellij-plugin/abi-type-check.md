---
title: ABI Type Check
description: ABI type check feature warns you if any non-allowed data types are used as an input into a function, or a return value from a function. Certain types are blocked from being called from outside the contract to increase the security and consistency of the network.
table_of_contents: true
next_page: /developers/tools/intellij/unlock-account
weight: 1100
---

## Return Type Error

Only specific variable types can be used as return data from a `public` function. The following function will cause the plugin to show an error:

```java
@Callable
public static BigInteger exampleFunction() {
    BigInteger foo = new BigInteger("3141");
    return foo;
}
```

![Return Type Error](/developers/tools/intellij-plugin/images/return-type-error.png)

## Argument Type Error

Only specific variable types can be used as argument data from a `public` function. The following function will cause the plugin to show an error:

```java
@Callable
public static String exampleFunction(BigInteger foo) {
    String bar = foo.toString();
    return bar;
}
```

![Argument Type Error](/developers/tools/intellij-plugin/images/argument-type-error.png)

## Private Functions

Restricted variable types (those not listed in the [Variable Types](/developers/fundamentals/avm-concepts/abi-types) section) can be used freely between `private` functions, and can be fed into `public` functions.

```java
private static BigInteger setBigInteger() {
    // Create a big integer.
    BigInteger foo = new BigInteger("3141592653589793238462643383279");

    // Return the big integer.
    return foo;
}

@Callable
public static String getBigInteger(int bigInt) {
    // Get a big integer from the setBigInteger() function.
    BigInteger foo = setBigInteger();

    // Convert the big integer into a string.
    String bar = foo.toString();

    // Return the string.
    return bar;
}
```

In this example, you would be able to call `getBigInteger()` and it would return data. However, you would not be able to access `setBigInteger()` directly.
