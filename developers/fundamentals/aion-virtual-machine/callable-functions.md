---
title: Callable Functions
description: Mark a function as entry point to the contract.
table_of_contents: true
next_page: /developers/fundamentals/aion-virtual-machine/fallback-functions/
---

In order for a function or method to be called from **outside** the contract (by a user on the blockchain, or from another contract) it needs to be annotated as `@Callable`.

> **Important:**
>
> - A `@Callable` function must be **public** and **static**.
<<<<<<< HEAD
> - `Return type` and `method arguments type` must be a supported [AVM ABI type](fundamentals-avm-concepts-abi-types-).
> - Only functions in the contract main class should be labelled as `@Callable`.
=======
> - `Return type` and `method arguments type` must be a supported [AVM ABI type](/developers/fundamentals/aion-virtual-machine/abi-types/).
>>>>>>> dev

```java
@Callable
public static String greet(String name) {
    return "Hello " + name;
}
```

If you are calling a function within contract, you do not have to assign the `@Callable` annotation to the function you want to call. The function to be called can be `public`, `private` or `@Callable`.

It is possible to have functions that do not have the `@Callable` annotation, and your contract will be able to compile. However, any attempt to call a `non-Callable` function from outside of the contract will be **reverted**, even if it is a public function.

One of our AVM  tool, called the [ABI compiler](https://github.com/aionnetwork/AVM/blob/1536a6d98e1aea82756cd7ceff247db8797ac885/org.aion.avm.tooling/src/org/aion/avm/tooling/abi/ABICompiler.java#section-section-L118), is run on an input jar, it collects the list of methods labelled `@Callable`. This information is used in 2 places:

- If we generate a main method for the contract (We only generate a main method if there was no main method in the user code!).
- When generating `Contract ABI`.
