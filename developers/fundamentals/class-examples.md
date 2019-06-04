---
title: Class Examples
description: This section contains contract examples to help you write your Java contract!
---

## Contract to Contract

How to have a Java contract interact with another Java contract deployed on an Aion network.

## Initialization

How to Initialize variables and run functions when deploying your contract.

The `<clinit>` of every class submitted as part of the contract (including all the code within `static {}` blocks) will be run when the contract is first deployed, and never again.  This makes `static {}` the ideal place to run any contract initialization logic.

### Example Contract

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

### Initialize variables

You can initialize contract variables by passing in arguments while you deploy your smart contract. To do that, you can use either `@Initializable fields` (in the first tab) or
an [**ABIDecoder** ]((https://docs.aion.network/docs/avm-abidecoder)to collect the data (in the second tab). 

#### [Using @Initializable field](https://docs.aion.network/docs/initializable-fields) 
Annotating variables with `@Initializable`  will collect the data that was passed into the contract upon deployment.

```java
@Initializable
private static String myString;
  
@Initializable
private static int[] intArray;
```

#### Using ABIDecoder
To capture deployment arguments you can an `ABIDecoder` object and use [Blockchain.getData()](https://avm-api.aion.network/avm/blockchain#getData%28%29) method to get the data that is passed into the contract upon deployment. You must decode those variables in the **exact same order** as they were passed in.

```java
static {
    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
    myStr = decoder.decodeOneString();
    myIntArray = decoder.decodeOneIntegerArray();
    myTwoDIntArray = decoder.decodeOne2DIntegerArray();
}
```

### Call contract methods
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

For example, set `myString` to *Hello AVM * upon contract deployment.
Deploy the contract and the log in the receipt of this deployment will be:
```text
"logs": [{
    "address": "0xa025257b822b5d18c64bdea28319ca356df7e9db5b31f5d9fbe837876cdd5245",
    "logIndex": "0x0",
    "data": "0x48656c6c6f2041564d",
    "topics": [
      "0x4d79537472696e67496e697469616c697a6174696f6e00000000000000000000",
      "0xa0d6dec327f522f9c8d342921148a6c42f40a3ce45c1f56baa7bfa752200d9e5"
    ]
```
where:
1.* 0x4d79537472696e67496e697469616c697a6174696f6e00000000000000000000* is the hex data of *MyStringInitialization*;
2. *0xa0d6dec327f522f9c8d342921148a6c42f40a3ce45c1f56baa7bfa752200d9e5* is the account deployed the contract;
3. *0x48656c6c6f2041564d* is the hex data of *Hello AVM*.

## Event Log

Log errors and outputs from your Java blockchain application once it's already been deployed. This works for both local and remote deployment.

## List

The Aion specific implementation of the Java List interface.

## Map

The Aion specific implementation of the Java Map interface.

## Buffer

A buffer, much like a ByteBuffer, allows the easy encoding/decoding of primitive values.

AionBuffer can be created either by allocation with a certain capacity, which allocates space for the buffer's content, or by wrapping an existing byte array into a buffer. [Read more](https://avm-api.aion.network/org/aion/avm/userlib/aionbuffer).

### Example Contract

```java
package aion;

import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;


public class BufferExample
{
    private static byte[] buyerInfo;

    @Callable
    public static void addBuyerInfo(Address ownerAddress, String carMake, String carModel, int price){
 		//Allocate a new AionBuffer
        buyerInfo = AionBuffer.allocate(Address.LENGTH + Integer.BYTES + carMake.length() + Integer.BYTES + carModel.length() + Integer.BYTES)
            .putAddress(ownerAddress)
            .putInt(carMake.length())
            .put(carMake.getBytes())
            .putInt(carModel.length())
            .put(carModel.getBytes())
            .putInt(price)
            .getArray();
    }

    @Callable
    public static String getBuyerInfo() {
        //Wrap an existing byte array into a buffer.
        AionBuffer buyerInfoBuffer = AionBuffer.wrap(buyerInfo);
        Address address = buyerInfoBuffer.getAddress();

        int carMakeLength = buyerInfoBuffer.getInt();
        byte[] carMakeArray = new byte[carMakeLength];
        buyerInfoBuffer.get(carMakeArray);
        String carMake=new String(carMakeArray);

        int carModelInt = buyerInfoBuffer.getInt();
        byte[] carModelArray = new byte[carModelInt];
        buyerInfoBuffer.get(carModelArray);
        String carModel=new String(carModelArray);

        int price = buyerInfoBuffer.getInt();
        return "Buyer address: " + address +
                "\n Car make: " + carMake +
                "\n Car model: " + carModel +
                "\n Date: " + price;
    }

}
```

## Modifer

A modifier alters the actions of other functions before those functions are executed.

## Set

The Aion specific implementation of the Java Set interface.

## Transfer Aion

Transfer AION from one address to another address. This works for contract to contract, wallet to contract, contract to wallet, and wallet to wallet.
