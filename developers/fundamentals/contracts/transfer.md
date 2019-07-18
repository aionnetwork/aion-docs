---
title: Transfer
---

The **receiver** account can only be an **account** or a **Java contract address** that is deployed on Aion. **nAmp** is used as the unit to display decimals. [1 Aion = 10^18 nAmp](https://github.com/aionnetwork/aion/wiki/Aion-Terminology). Insufficient balance in the contract will cause a **Failed_Exception**. Once AION is transferred into the smart contract, they will be locked in the contract unless there are functions to transfer them to other accounts.

```java
package aion;

import avm.Address;
import avm.Blockchain;
import avm.Result;
import org.aion.avm.tooling.abi.Callable;

import java.math.BigInteger;

public class SendAionToken {

    // Create an empty address for the owner.
    private static Address owner;

    static {
        // Set the owner as the account that deployed the contract.
        owner = Blockchain.getCaller();
    }

    // Transfer AION from the contract address to the address listed in the "to" variable.
    @Callable
    public static void transferAion(Address to, byte[] value) {
        onlyOwner();
        Blockchain.call(to, new BigInteger(value), new byte[0], Blockchain.getRemainingEnergy());
    }

    // Get the token from the contract as the contract's owner.
    @Callable
    public static void retrieveToken(byte[] value) {
        onlyOwner();
        Blockchain.call(owner, new BigInteger(value), new byte[0], Blockchain.getRemainingEnergy());
    }


    //Destroys this contract and refund all balance to the beneficiary address.
    @Callable
    public static void destroyTheContract(Address beneficiary){
        onlyOwner();
        Blockchain.selfDestruct(beneficiary);
    }
    // Only Owner modifier.
    private static void onlyOwner() {
        Blockchain.require(Blockchain.getCaller().equals(owner));
    }
}
```