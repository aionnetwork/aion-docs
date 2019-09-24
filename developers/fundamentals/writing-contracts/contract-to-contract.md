---
title: Contract to Contract
Description: Java smart contracts are able to interact with other Java contracts on the Aion network. This page details how that is achieved.
table_of_contents: true
---

Contract-to-contract calls still follow the same rules as regular contract calls. See [Java Contract Fundamentals](/developers/fundamentals/avm-concepts/callable-functions) section for more information.

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

public class ReturnerExample {
    @Callable
    public static String getString(int index) {
        String[] myStr = { "Hello AVM!", "AVM is great" };
        return myStr[index];
    }
}
```

### Caller

Make sure to supply the address of the contract you want to call as a deployment argument. Supplying the contract address as a hardcoded variable within a contract is more expensive and less efficient​.

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

    private static Address returnerContractAddress;

    static {
        ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
        returnerContractAddress = decoder.decodeOneAddress(); //Set the contract address that you want to call
    }

    @Callable
    public static Address getReturnerContractAddress() {
        return returnerContractAddress;
    }

    @Callable
    public static String getStringInAnotherContract(int index) {
        ABIStreamingEncoder encoder = new ABIStreamingEncoder();
        byte[] data = encoder.encodeOneString("getString")
                             .encodeOneInteger(index)
                             .toBytes();
        Result getString = Blockchain.call(returnerContractAddress, BigInteger.ZERO, data, Blockchain.getRemainingEnergy());
        ABIDecoder decoder = new ABIDecoder(getString.getReturnData());
        String myString = decoder.decodeOneString();
        return myString;
    }
}
```

## Blockchain Call

To call a method in another Java contract, you can use [Blockchain.call()](https://avm-api.aion.network/avm/blockchain#call(avm.Address,java.math.BigInteger,byte%5B%5D,long%29)) method, and pass in the `target contract address`, `value` to transfer, `data` to pass and the `max energy` the invoked contract can use.

To get the right `data` you want to pass, you will need an **ABI StreamingEncoder**. [Learn More](/developers/fundamentals/aion-packages-abi#abistreamingencoder).
Use it to encode the `method` name as a `String` first and then the `arguments` corresponding to their types in order.

```java
 byte[] data = encoder.encodeOneString("getString").encodeOneInteger(index).toBytes();
```

Now you get everything you need to make a contract call.
If you are expecting some return data, you must create a `Result` object.

## AVM Result

The [AVM `Result`](https://avm-api.aion.network/avm/result) object represents a cross-call invocation result. To create a `Result` instance for the contract method call:

```java
Result getString = Blockchain.call(calleeContractAddress, BigInteger.ZERO, data, Blockchain.getRemainingEnergy());
```

Then, you must create an ABIDecoder object and use [`Result.getReturnData()`](https://avm-api.aion.network/avm/result)  to get the data returned by the invoked call. See [AVM ABIDecoder](/developers/fundamentals/aion-packages-abi#section-abistreamingencoder) section for more details.

```java
ABIDecoder decoder = new ABIDecoder(getString.getReturnData());
```

Once this has been created, you can decode the `return data` according to the return data type.

```java
String myString = decoder.decodeOneString();
```
