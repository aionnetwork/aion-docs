---
title: Fallback Functions
---

Mark a function as the default function to be called.

This function is invoked during balance transfers (if the data field is empty), or if the `method name` encoded into the data field is not found. A function marked as `@Fallback` must be public, static, void, and take no arguments.

Only one function can be marked @Fallback.

Here is a `@Fallback` function example:

```java
@Fallback
public static void fallback(){
  Blockchain.log("DefaultMethodCalled".getBytes());
}
```
