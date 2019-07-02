---
title: Fallback Functions
description: Mark a function as the default function to be called when the data is null, empty, or doesn't match any method names.
---

If you want a method in the contract to be invoked when the data in the the transaction is null, emoty or doesn't match any method names, you can label it as `@Fallback`.

> Important:
> - A `@Fallback` method must be **static**, must **return void** and must **take no parameters**.
> - **Only one** method can be marked as @Fallback.

Here is a `@Fallback` function example:

```java
@Fallback
public static void fallback(){
  Blockchain.log("DefaultMethodCalled".getBytes());
}
```

This method will also be used when generating the main method.
