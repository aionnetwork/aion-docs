# Event

An event in Java is an object that is created when something changes.

## Example Contract

You can use this contract as template.

```java
package aion;

import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import avm.Address;

public class EventExample {

    public static void emitEvent() {
        String eventTopic = "Emit Event"; // topic
        Address eventCaller = Blockchain.getCaller(); // data
        Blockchain.log(eventTopic.getBytes(), eventCaller.unwrap());
    }
}
```