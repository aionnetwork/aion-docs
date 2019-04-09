# Deployment Arguments

When deploying your contract, you can call a `static` function that will run whenever the contract is deployed. Once the deloyment has finished, this function will never be ran again. This is handy for when you need to supply arguments into your contract at the time of deployment.

To capture deployment arguments you must create an `ABIDecoder` object that uses the `Blockchain.getData()` function:

```java
static {
    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
}
```

Once this has been created you can collect your deployment arguments by declaring variables using the `ABIDecoder` object.

```java
    private static String myStr;
    private static int[] int1DArray;
    private static int[][] int2DArray;
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

Then you must declare those varibles within the `static` function as the following:

```bash
myStr = decoder.decodeOneString();
myIntArray = decoder.decodeOneIntegerArray();
myTwoDIntArray = decoder.decodeOne2DIntegerArray();
```

## ABIDecoder Object

The following functions are available within the `ABIDecoder` object:

<!-- TODO: find out what is contained within the decoder object. -->
