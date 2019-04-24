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

import avm.Blockchain;
import avm.Result;
import avm.Address;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.userlib.abi.ABIDecoder;
import org.aion.avm.userlib.abi.ABIEncoder;

import java.math.BigInteger;

public class CallerExample {

    // Create an empty Address variable.
    private static Address calleeContractAddress;

    // Get the address from a deployment variable.
    static {
        ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
        calleeContractAddress = decoder.decodeOneAddress();
    }

    // Get an String from another contract.
    @Callable
    public static String getString(int index) {
        // Define the function to call, and encode it.
        byte[] methodName = ABIEncoder.encodeOneString("getString");

        // Encode any variables that the receiving function needs.
        byte[] argIndex = ABIEncoder.encodeOneInteger(1);

        // Add both arrays together into a data variable.
        byte[] data = concatenateArrays(methodName, argIndex);

        // Call the remote contract.
        Result getString = Blockchain.call(receiverContractAddress, BigInteger.valueOf(0), data,
                Blockchain.getRemainingEnergy());

        // Decode the response.
        ABIDecoder decoder = new ABIDecoder(getString.getReturnData());

        // Set myString as the first variable returned from the remote contract.
        String myInt = decoder.decodeOneInteger();
        return myString;
    }

    // Combine multiple byte arrays together. This is helpful when creating the data byte array to send to another contract.
    private static byte[] concatenateArrays(byte[]... arrays) {
        int length = 0;
        for (byte[] array : arrays) {
            length += array.length;
        }
        byte[] result = new byte[length];
        int writtenSoFar = 0;
        for (byte[] array : arrays) {
            System.arraycopy(array, 0, result, writtenSoFar, array.length);
            writtenSoFar += array.length;
        }
        return result;
    }
}
```
