---
title: ABI Type Check
description: ABI type check feature warns you if any non-allowed data types are used as an input into a function, or a return value from a function. Certain types are blocked from being called from outside the contract to increase the security and consistency of the network.
table_of_contents: true
next_page: /developers/tools/intellij-plugin/unlock-account
weight: 1100
---

## Return Type Error

Only specific variable types can be used as return data from a `public` function. The following function will cause the plugin to show an error:

```java
@Callable
public static BigDecimal exampleFunction() {
    BigDecimal foo = new BigDecimal("3141");
    return foo;
}
```

![Return Type Error](https://raw.githubusercontent.com/aionnetwork/docs/master/developers/tools/intellij-plugin/images/return-type-error.png)

## Argument Type Error

Only specific variable types can be used as argument data from a `public` function. The following function will cause the plugin to show an error:

```java
@Callable
public static String exampleFunction(BigDecimal foo) {
    String bar = foo.toString();
    return bar;
}
```

![Argument Type Error](https://raw.githubusercontent.com/aionnetwork/docs/master/developers/tools/intellij-plugin/images/argument-type-error.png)

## Private Functions

Restricted variable types (those not listed in the [Variable Types](fundamentals-aion-virtual-machine-abi-types) section) can be used freely between `private` functions, and can be fed into `public` functions.

```java
private static BigDecimal setBigDecimal()) {
    // Create a big decimal.
    BigDecimal foo = BigDecimal.valueOf(1.23456);

    // Return the big decimal.
    return foo;
}

@Callable
public static String getBigDecimal() {
    // Get a big decimal from the setBigDecimal() function.
    BigDecimal foo = setBigDecimal();

    // Convert the big decimal into a string.
    String bar = foo.toString();

    // Return the string.
    return bar;
}
```

In this example, you would be able to call `getBigDecimal()` and it would return data. However, you would not be able to access `setBigDecimal()` directly.
