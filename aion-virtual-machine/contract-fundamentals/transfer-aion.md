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


        // Transfer AION from the contract address to the address listed in the "to" variable.
        @Callable
        public static void transferAion(Address to, long value) {
            onlyOwner();
            //check if there is sufficient balance in the contract
            Boolean enoughBalance;
            if (Blockchain.getBalanceOfThisContract().compareTo(BigInteger.valueOf(value)) == 1) enoughBalance=true;
            else enoughBalance = false;
            Blockchain.require(enoughBalance);
            Blockchain.call(to, BigInteger.valueOf(value), new byte[0], Blockchain.getRemainingEnergy());
        }

        // Only Owner modifier.
        private static void onlyOwner() {
            Blockchain.require(Blockchain.getCaller().equals(owner));
        }

```
