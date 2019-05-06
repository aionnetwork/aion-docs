# Contract to Contract

Contracts are able to interact with other contracts on the Aion network. Contract-to-contract calls still follow the same rules as regular contract calls. See the [Variable Types](aion-virtual-machine/contract-fundamentals/variable-types) section for more information.

## Example Contracts

You can use these contracts as templates. The `Caller` contract makes a call to the `Returner` contract.

### Returner

This is the contract that will be called by the `Caller` contract. If you want to test these contracts out, deploy this one first to get the contract address.

```java
package aion;

import avm.Address;
import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.userlib.abi.ABIDecoder;

public class ReceiverExample {

    @Callable
    public static String getString(int index) {

        String[] myStr = { "Hello AVM!", "AVM is great" };
        return myStr[index];
    }
}
```

### Caller

Make sure to supply the address of the contract you want to call as a deployment argument. Supplying the contract address as a hardcoded variable within a contract is more expensive and less efficent.

```java
package aion;
import avm.Address;
import avm.Blockchain;
import avm.Result;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.userlib.abi.ABIDecoder;
import org.aion.avm.userlib.abi.ABIEncoder;
import org.aion.avm.userlib.abi.ABIStreamingEncoder;

import java.math.BigInteger;

public class ContractInteractionCaller {

    private static Address calleeContractAddress;
    private static String secretMessage;

    static {
        ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
        calleeContractAddress = decoder.decodeOneAddress();
        secretMessage = decoder.decodeOneString();  //for showing the debugging
    }

    @Callable
    public static Address getCalleeContractAddress() {
        return calleeContractAddress;
    }

    @Callable
    public static String getStringInAnotherContract(int index) {
        ABIStreamingEncoder encoder = new ABIStreamingEncoder();
        byte[] data = encoder.encodeOneString("getString")
                .encodeOneInteger(index)
                .toBytes();
        Result getString = Blockchain.call(calleeContractAddress, BigInteger.valueOf(0), data, Blockchain.getRemainingEnergy());
        ABIDecoder decoder = new ABIDecoder(getString.getReturnData());
        String myString = decoder.decodeOneString();
        return myString;
    }

}

```
