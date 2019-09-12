---
title: Initializaion
description: Call functions and supply arguments as soon as a contract is deployed to a network.
table_of_contents: true
---

The `<clinit>` of every class submitted as part of the contract (including all the code within `static {}` blocks) will be run when the contract is first deployed, and never again.  This makes `static {}` the ideal place to run any contract initialization logic.

## Example Contract

```java
package aion;

import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.userlib.abi.ABIDecoder;

public class ClinitExample {

    @Initializable
    private static String myString;
  
    @Initializable
    private static int[] intArray;

    static {
        // Log myString upon deployment.
        logMyString("MyStringInitialization");
    }

    //Emit Event
    @Callable
    public static void logMyString(String topic){
        Blockchain.log(topic.getBytes(), Blockchain.getCaller().toByteArray(), myString.getBytes());
    }


    // Return the private String.
    @Callable
    public static String getString() {
        return myString;
    }
  
    @Callable
    public static int getIntFromArray(int index) {
        return intArray[index];
    }
}
```

## Initialize variables

You can initialize contract variables by passing in arguments while you deploy your smart contract. To do that, you can use either `@Initializable fields` (in the first tab) or an [**ABIDecoder**](/developers/fundamentals/packages/abi/#abidecoder) to collect the data (in the second tab).

### [Using @Initializable field](/developers/fundamentals/aion-virtual-machine/initializable-fields/)

Annotating variables with `@Initializable`  will collect the data that was passed into the contract upon deployment.

```java
@Initializable
private static String myString;

@Initializable
private static int[] intArray;
```

### Using ABIDecoder

To capture deployment arguments you can an `ABIDecoder` object and use [Blockchain.getData()](https://avm-api.aion.network/avm/blockchain#getData%28%29) method to get the data that is passed into the contract upon deployment. You must decode those variables in the **exact same order** as they were passed in.

```java
static {
    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
    myStr = decoder.decodeOneString();
    myIntArray = decoder.decodeOneIntegerArray();
    myTwoDIntArray = decoder.decodeOne2DIntegerArray();
}
```

## Call Contract Methods

You can also call contract methods within `static {}` function, method can be both `@Callable` method and private method.  For example:

```java
static {
    logMyString("MyStringInitialization");
}

//Emit Event
@Callable
public static void logMyString(String topic){
    Blockchain.log(topic.getBytes(), Blockchain.getCaller().toByteArray(), myString.getBytes());
}
```

Here we are calling `logMyString(String topic)` to log the initial string value of `myString` under topic`MyStringIntialization` and the account that deployed the contract.

For example, set `myString` to *Hello AVM* upon contract deployment.
Deploy the contract and the log in the receipt of this deployment will be:

```json
"logs": [{
    "address": "0xa025257b822b5d18c64bdea28319ca356df7e9db5b31f5d9fbe837876cdd5245",
    "logIndex": "0x0",
    "data": "0x48656c6c6f2041564d",
    "topics": [
      "0x4d79537472696e67496e697469616c697a6174696f6e00000000000000000000",
      "0xa0d6dec327f522f9c8d342921148a6c42f40a3ce45c1f56baa7bfa752200d9e5"
    ]
```

Where:

1. `0x4d79537472696e67496e697469616c697a6174696f6e00000000000000000000` is the hex data of *MyStringInitialization*.
2. `0xa0d6dec327f522f9c8d342921148a6c42f40a3ce45c1f56baa7bfa752200d9e5` is the account deployed the contract;
3. `0x48656c6c6f2041564d` is the hex data of _Hello AVM.
