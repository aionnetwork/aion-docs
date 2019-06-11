---
title: Callable Functions
---

Mark a function as callable from outside of the contract.

In order for a function or method to be called from **outside** the contract (by a user on the blockchain, or from another contract) it needs to be annotated as `@Callable`.

A `@Callable` function must be **public** and **static**.\n* `Return type` and `method arguments type` must be a supported [AVM ABI type](https://docs.aion.network/docs/abi).

```java
@Callable
public static String greet(String name) {
    return "Hello " + name;
}
```

If you are calling a function within contract, you do not have to assign the `@Callable` annotation to the function you want to call. The function to be called can be `public`, `private` or `@Callable`.

It is possible to have functions that do not have the `@Callable` annotation, and your contract will be able to compile. However, any attempt to call a `non-Callable` function from outside of the contract will be **reverted**, even if is a public function.
