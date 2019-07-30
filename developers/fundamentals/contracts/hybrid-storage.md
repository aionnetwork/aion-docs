---
title: Hybrid Storage
description: AVM Hybrid Storage is a storage design that allows developer to use both object graphs and manual storage at the same time.
table_of_contents: true
---

Learn about our [AVM Hybrid Storage](https://blog.aion.network/avm-hybrid-storage-38f9892a5577) here!.

## Example Contract

You can use this contract as a template.

```java
package aion;import avm.*;

import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.userlib.AionBuffer;
import org.aion.avm.userlib.AionMap;

import java.math.BigInteger;


public class HybridStorageExample
{

    private static Address owner;
    private static final AionMap<String, Integer> carStock = new AionMap<>(); //key: car make; value: stock

    static {
        owner = Blockchain.getCaller();
    }

    @Callable
    public static void addCarStock(String make, int currentStock) {
        onlyOwner();
        Blockchain.require(!carStock.containsKey(make));
        carStock.put(make, currentStock);
    }

    @Callable
    public static void updateCarStock(String make, int newStock) {
        onlyOwner();
        Blockchain.require(carStock.containsKey(make));
        carStock.put(make, newStock);
    }

    @Callable
    public static void removeCarMake(String make) {
        onlyOwner();
        carStock.remove(make);
    }

    @Callable
    public static int getCarStock(String make, String model) {
        Blockchain.require(carStock.containsKey(make));
        return carStock.get(make);
    }

    @Callable
    public static void addPurchaseInfo(long orderID, String customerID, String stockNumber, int price){
        onlyOwner();
       byte[] newOrderInfo = AionBuffer.allocate(Integer.BYTES + customerID.length() + Integer.BYTES + stockNumber.length() + Integer.BYTES)
                                            .putInt(customerID.length())
                                            .put(customerID.getBytes())
                                            .putInt(stockNumber.length())
                                            .put(stockNumber.getBytes())
                                            .putInt(price)
                                            .getArray();

       Blockchain.putStorage(AionBuffer.allocate(32).put32ByteInt(BigInteger.valueOf(orderID)).getArray(),newOrderInfo);
    }

    @Callable
    public static String getOrderInformation(long orderID) {
        byte[] orderInfo = Blockchain.getStorage(AionBuffer.allocate(32).put32ByteInt(BigInteger.valueOf(orderID)).getArray());
        AionBuffer orderInfoBuf = AionBuffer.wrap(orderInfo);

        int customerIDLength =  orderInfoBuf.getInt();
        byte[] customerID = new byte[customerIDLength];
        orderInfoBuf.get(customerID);

        int stockNumberIDLength =  orderInfoBuf.getInt();
        byte[] stockNumber = new byte[stockNumberIDLength];
        orderInfoBuf.get(stockNumber);

        int price = orderInfoBuf.getInt();

        return "Order ID: " + orderID + "\nCustomer ID: " + new String(customerID)
                + "\nStock Number: " + new String(stockNumber)
                + "\nPrice: " + price;

    }

    private static void onlyOwner() {
        Blockchain.require(owner.equals(Blockchain.getCaller()));
    }
}
```
