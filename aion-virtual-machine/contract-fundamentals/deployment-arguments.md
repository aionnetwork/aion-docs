# Deployment Arguments

Deploy your contract and supply arguments at the same time.

When deploying your contract, you can call a `static` function that will run whenever the contract is deployed. Once the deployment has finished, this function will never run again. This is handy for when you need to supply arguments into your contract at the time of deployment.

To capture deployment arguments you must create an `ABIDecoder` object that uses the `Blockchain.getData()` function:

```java
static {
    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
}
```

Once this has been created you can collect your deployment arguments by declaring variables using the `ABIDecoder` object.

```java
static {
    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
    myStr = decoder.decodeOneString();
    myIntArray = decoder.decodeOneIntegerArray();
    myTwoDIntArray = decoder.decodeOne2DIntegerArray();
}
```

Each variable must be supplied and collected in order. If you deploy your contract with your variables in a particular order, you must declare those variables in the exact same order within your `static` function. For example, if you deploy your contract using Maven as the following:

```bash
mvn aion4j:deploy -Dargs="-T David -I[] 3141 592653 589 7932 3846 -I[][] 1,2,3 4,5,6"
```

Then you must declare those variables within the `static` function as the following:

```bash
myStr = decoder.decodeOneString();
myIntArray = decoder.decodeOneIntegerArray();
myTwoDIntArray = decoder.decodeOne2DIntegerArray();
```

## ABIDecoder Object

The following functions are available within the `ABIDecoder` object:

| java.lang.String     | decodeMethodName()            | Decode a method name from the data field.        |
|----------------------|-------------------------------|--------------------------------------------------|
| `boolean[][]`        | `decodeOne2DBooleanArray()`   | Decode a 2D boolean array from the data field.   |
| `byte[][]`           | `decodeOne2DByteArray()`      | Decode a 2D byte array from the data field.      |
| `char[][]`           | `decodeOne2DCharacterArray()` | Decode a 2D character array from the data field. |
| `double[][]`         | `decodeOne2DDoubleArray()`    | Decode a 2D double array from the data field.    |
| `float[][]`          | `decodeOne2DFloatArray()`     | Decode a 2D float array from the data field.     |
| `int[][]`            | `decodeOne2DIntegerArray()`   | Decode a 2D integer array from the data field.   |
| `long[][]`           | `decodeOne2DLongArray()`      | Decode a 2D long array from the data field.      |
| `short[][]`          | `decodeOne2DShortArray()`     | Decode a 2D short array from the data field.     |
| `Address`            | `decodeOneAddress()`          | Decode an address from the data field.           |
| `Address[]`          | `decodeOneAddressArray()`     | Decode an address array from the data field.     |
| `boolean`            | `decodeOneBoolean()`          | Decode a boolean from the data field.            |
| `boolean[]`          | `decodeOneBooleanArray()`     | Decode a boolean array from the data field.      |
| `byte`               | `decodeOneByte()`             | Decode a byte from the data field.               |
| `byte[]`             | `decodeOneByteArray()`        | Decode a byte array from the data field.         |
| `char`               | `decodeOneCharacter()`        | Decode a char from the data field.               |
| `char[]`             | `decodeOneCharacterArray()`   | Decode a character array from the data field.    |
| `double`             | `decodeOneDouble()`           | Decode a double from the data field.             |
| `double[]`           | `decodeOneDoubleArray()`      | Decode a double array from the data field.       |
| `float`              | `decodeOneFloat()`            | Decode a float from the data field.              |
| `float[]`            | `decodeOneFloatArray()`       | Decode a float array from the data field.        |
| `int`                | `decodeOneInteger()`          | Decode an integer from the data field.           |
| `int[]`              | `decodeOneIntegerArray()`     | Decode an integer array from the data field.     |
| `long`               | `decodeOneLong()`             | Decode a long from the data field.               |
| `long[]`             | `decodeOneLongArray()`        | Decode a long array from the data field.         |
| `short`              | `decodeOneShort()`            | Decode a short from the data field.              |
| `short[]`            | `decodeOneShortArray()`       | Decode a short array from the data field.        |
| `String`             | `decodeOneString()`           | Decode a string from the data field.             |
| `String[]`           | `decodeOneStringArray()`      | Decode a string array from the data field.       |
