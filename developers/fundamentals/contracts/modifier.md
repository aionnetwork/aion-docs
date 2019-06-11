---
title: Modifier
---

A modifier alters the actions of other functions before those functions are executed.

## Example Contract

This contract contains a common modifier function, `onlyOwner`. Calling this modifier at the top of a function causes that function to only be called by the owner of the contract. The contract owner is set when the contract is deployed.

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

In the above example, the `isOwnerCalling` function will fail if the address that calls the function is not the owner.

## Blockchain.caller()

`Blockchain.getCaller()` will only get the caller address when it's called by a contract transaction, since for method call, `from` account is not required.

## Blockchain.require()

Here we are using `Blockchain.require(boolean condition)` to check the provided condition is true or not. If it is false, it triggers a [revert](https://avm-api.aion.network/avm/blockchain#revert%28%29).
