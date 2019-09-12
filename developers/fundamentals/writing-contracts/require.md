---
title: Require
description: You can use Blockchain.require() to add requirements or restrictions for an action to be executed. It checks the provided condition is true or not. If it is false, it triggers a revert. This is sometimes called a modifier.
table_of_contents: true
---

You can view further documentation into [Blockchain.require()](https://avm-api.aion.network/avm/blockchain#require%28boolean%29) on the [AVM API website](https://avm-api.aion.network/).

## Example Contract

This contract contains a common requirement function, `onlyOwner`. Calling this function at the top of a function to make sure that function to only be executed by the owner of the contract. The contract owner is set when the contract is deployed.

```java
package aion;

import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import avm.Address;

public class ModifierExample {

    // Create an empty address variable.
    private static Address owner;
    private static String myStr = "Hello AVM";

    static {
        // Set the owner of this contract as the address that deployed it. This cannot be altered.
        owner = Blockchain.getCaller();
    }
  
   @Callable
    public static String getString() {
        return myStr;
    }

    @Callable
    public static void setString(String newStr) {
        onlyOwner();
        myStr = newStr;
    }

    // Check if the current caller of a function matches the owner address.
    private static void onlyOwner() {
        Blockchain.require(Blockchain.getCaller().equals(owner));
    }
}
```

In the above example, the `setString` function will fail if the address that calls the function is not the owner.

`Blockchain.caller()` will only get the caller address when it's called by a contract transaction, since for method call, `from` account is not required.
