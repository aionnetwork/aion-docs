# Transfer AION

Transfer `AION` from the contract to another account or contract.

## Example Contract

```java
package aion;

import avm.Address;
import avm.Blockchain;
import avm.Result;
import org.aion.avm.tooling.abi.Callable;

import java.math.BigInteger;

public class TransferAionExample {

    // Create an empty address for the owner.
    private static Address owner;

    static {
        // Set the owner as the address that deployed the contract.
        owner = Blockchain.getCaller();
    }

    // Transfer AION from the contract to the address listed in the "to" variable.
    @Callable
    public static boolean transferAion(Address to, long value) {
        onlyOwner();
        Result result = Blockchain.call(to, BigInteger.valueOf(value), new byte[0], Blockchain.getRemainingEnergy());
        return result.isSuccess();
    }

    // Only Owner modifier.
    private static void onlyOwner() {
        Blockchain.require(Blockchain.getCaller().equals(owner));
    }
}
```
