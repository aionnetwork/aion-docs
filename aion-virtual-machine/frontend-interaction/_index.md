# Frontend Interaction

In order for users to interact with your blockchain application, they will need some kind of interface. This section deals with how to connect your Java contract to a browser using the Aion Web3.js framework. You can find the raw API information for Web3.js in the [APIs Web3.js](apis/web3-js) section.

## Web3.js

Web3.js is a JavaScript framework that was originally created by the Ethereum Foundation for the Ethereum network. It was released on GitHub as open-source software. Aion took this framework and modified it to fit the Aion Virtual Machine. Because of this, there are some differences between Ethereum and Aion development.

## Examples in this Section

The examples in this section reference a contract that has been deployed on the AVM testnet. The contract is below:

```java
import avm.Address;
import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.userlib.abi.ABIDecoder;

import java.math.BigInteger;

public class Counter
{
    private static Address owner;
    private static int count;

    static {
        ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
        count = decoder.decodeOneInteger();
        owner = Blockchain.getCaller();
    }

    @Callable
    public static void incrementCounter(int increment){

        count += increment;
        Blockchain.log("CounterIncreased".getBytes(), BigInteger.valueOf(increment).toByteArray());
    }

    @Callable
    public static void decrementCounter(int decrement){
        count -= decrement;
        Blockchain.log("CounterDecreased".getBytes(), BigInteger.valueOf(decrement).toByteArray());
    }

    @Callable
    public static int getCount(){
        return count;
    }
}
```