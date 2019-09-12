---
title: Userlib Packages
description: Classes in the userlib package and userlib.abi package are optionally packaged along-side your contract code as common-case utilities and quality of life routines.
table_of_contents: true
---

Classes in the [userlib](https://avm-api.aion.network/org/aion/avm/userlib/package-summary.html) package and [userlib.abi](https://avm-api.aion.network/org/aion/avm/userlib/abi/package-summary.html) package are optionally packaged along-side your contract code as common-case utilities and quality of life routines.

## AionBuffer

The Aion specific implementation of the Java Buffer interface. Allows the easy encoding/decoding of primitive values. Take a look at the [AVM API page for AionBuffer](https://avm-api.aion.network/org/aion/avm/userlib/aionbuffer).

```java
package aion;
import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;

public class BufferExample
{
    private static byte[] buyerInfo;

    @Callable
    public static void addBuyerInfo(Address ownerAddress, String carMake, String carModel, int price){

        // Allocate a new AionBuffer
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

## AionList

The Aion specific implementation of the Java List interface. A list is an ojbect that contains one or more of the same type of element. You cannon have a list that contains both `String` and `int` elements.

Take a look at the [AVM API page for AionList](https://avm-api.aion.network/org/aion/avm/userlib/aionlist).

### Create an AionList Object

```java
private static AionList<String> carList = new AionList<>();
private static AionList<String> carListCopy = new AionList<>();
private static AionList<String> carSubList = new AionList<>();
```

### Add an Element to an AionList

```java
public static void addCar(String newCarBrand) {
    carList.add(newCarBrand);
}
```

### Remove a Single Element from an AionList

```java
public static void removeCar(String carBrand) {
    carList.remove(carBrand);
}
```

### Remove all Elements from an AionList

```java
public static void clearCarSet() {
    carList.clear();
}
```

### Check an Element Exists in an AionList

```java
public static boolean checkCar(String carBrand) {
    return carList.contains(carBrand);
}
```

### Get the Size of an AionList

```java
public static int getCarSetSize() {
    return carList.size();
}
```

### Add all Elements in a Collection to an AionList

```java
public static void copyCarSet(){
    carListCopy.addAll(carList);
}
```

### Check if an AionList contains all the Elements of another Collection

```java
public static boolean compareTwoCarSets() {
    return carListCopy.containsAll(carList);
}
```

### Check if an AionList is Empty

```java
public static boolean carListIsEmpty() {
    return carListCopy.isEmpty() ? true: false;
}
```

### Remove all Elements from an AionList not within another Object

```java
public static void keepCarSet() {
    carList.retainAll(carListCopy);
}
```

## AionMap

The Aion specific implementation of the Java Map interface. An object that maps keys to values. A map cannot contain duplicate keys. Each key is _mapped_ to only one value.

Take a look at the [AVM API page for AionMap](https://avm-api.aion.network/org/aion/avm/userlib/aionmap).

### Create a Map

```java
private static final AionMap<Integer, car> cars = new AionMap<>();
```

### Add an Element into a Map

```java
public static void addCar(String make, String model, String color) {
    car newCar = new car();

    newCar.make = make;
    newCar.model = model;
    newCar.color = color;

    cars.put(cars.size(), newCar);
}
```

### Get a Single Element from a Map

To send an element from within a map array to another part of the Java contract, supply the element's `id` to the map array:

```java
public static AionMap getCar(int id) {
    return cars.get(id);
}
```

To return an entire element from within a map array to somewhere _outside_ the Java contract, you need to specify each attribute of the element.

```java
public static String carToFrontend(int id) {
    return "Make: " + cars.get(id).make + " | Model: " + cars.get(id).model + " | Color: " + cars.get(id).color;
}
```

### Get All Elements from a Map

To send all the element from within a map array to another part of the Java contract, simply request the whole array:

```java
public static AionMap getMap() {
    return cars;
}
```

To return the entire map array to somewhere _outside_ the Java contract, you need to loop through the array and parse everything into a `String` or another type:

```java
public static String getCars() {
    Set<Integer> carIds = cars.keySet();
    String returnString = "\n";

    // Loop through each car based on their ID.
    for (int id : carIds) {
        String make = cars.get(id).make;
        String model = cars.get(id).model;
        String color = cars.get(id).color;

        // Add the car details to a String.
        returnString = returnString + "ID: " + id + " | Make: " + make + " | Model: " + model + " | Color: " + color + "\n";
    }

    // Return the complete String.
    return returnString;
}
```

## AionSet

The Aion specific implementation of the Java Set interface. A set is a collection of elements with absoultely no duplicate elements. Each element in the set is completely unique.

Take a look at the [AVM API page for AionSet](https://avm-api.aion.network/org/aion/avm/userlib/aionset).

### Create an AionSet Object

```java
private static AionSet<String> carSet = new AionSet<>();
private static AionSet<String> carSetCopy = new AionSet<>();
```

### Add an Element to an AionSet

```java
public static void addCar(String newCarBrand) {
    carSet.add(newCarBrand);
}
```

### Remove an Element from an AionSet

```java
public static void removeCar(String carBrand) {
    carSet.remove(carBrand);
}
```

### Remove all Elements from an AionSet

```java
public static void clearCarSet() {
    carSet.clear();
}
```

### Check is an Element is within an AionSet

```java
public static boolean checkCar(String carBrand) {
    return carSet.contains(carBrand) ? true : false;
}
```

### Get the Size of an AionSet

```java
public static int getCarSetSize() {
    return carSet.size();
}
```

### Add all Elements from an Existing Object into an AionSet

```java
public static void copyCarSet(){
    carSetCopy.addAll(carSet);
}
```

### Compare Two AionSets

```java
public static boolean compareTwoCarSets() {
    return carSetCopy.containsAll(carSet);
}
```

### Remove all Elements from an AionSet found within another Object

```java
public static void removeCarSetCopy() {
    carSet.removeAll(carSetCopy);
}
```

### Remove all Elements from an AionSet not found within another Object

```java
public static void keepCarSet() {
    carSet.retainAll(carSetCopy);
}
```
