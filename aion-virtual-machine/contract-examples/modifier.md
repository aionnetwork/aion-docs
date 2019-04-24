# Modifier

A modifier alters the actions of other functions before those functions are executed.

## Example Contract

This contract contains a common modifer function, `onlyOwner`. Calling this modifer at the top of a function causes that function to only be called by the owner of the contract. The contract owner is set when the contract is deployed.

```java
package aion;

import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import avm.Address;

public class ModifierExample {

    // Create an empty address variable.
    private static Address owner;

    static {
        // Set the owner of this contract as the address that deployed it. This cannot be altered.
        owner = Blockchain.getCaller();
    }

    // Check if the current caller of a function matches the owner address.
    private static void onlyOwner() {
        Blockchain.require(Blockchain.getCaller().equals(owner));
    }

    // If the address calling this function matches the owner address, return true. Otherwise, throw an exception.
    @Callable
    public static boolean isOwnerCalling() {
        onlyOwner();
        return true;
    }
}
```

In the above example, the `isOwnerCalling` function will fail if the address that calls the function is the owner.
