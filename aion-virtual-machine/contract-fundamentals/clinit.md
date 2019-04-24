# Clinit

Run functions and initialize variables when deploying your contract.

The `Clinit` blocks initialize arguments into your contract when it gets deployed. Everything within the `static` section is ran when the contract is deployed. Once the contract has been deployed, the `static` function is never ran again.

## Example Contract

You can use this contract as a template.

```java
package aion;

import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.userlib.abi.ABIDecoder;

public class ClinitExample {

    // Create private variables to use within this contract.
    private static String myString;
    private static int[] intArray;

    static {
        // Get arguments supplied to the contract when deployed.
        ABIDecoder decoder = new ABIDecoder(Blockchain.getData());

        // Set the first argument as myString.
        myString = decoder.decodeOneString();

        // Set the second argument as intArray.
        intArray = decoder.decodeOneIntegerArray();
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

## Troubleshooting

### This Contract does not Compile

If no deployment arguments are supplied when you compile the above contract, you will see the following error:

```bash
[ERROR] Failed to execute goal org.aion4j:aion4j-maven-plugin:0.5.3:deploy (default-cli) on project contractexamples: Contract jar deployment failed: InvocationTargetException: NullPointerException -> [Help 1]
```

You must deploy the contract with arguments. See the [Deployment Arguments](/aion-virtual-machine/contract-fundamentals/deployment-arguments) section or the [IntelliJ Configuration](/aion-virtual-machine/intellij/configure.md#common) section for more details.