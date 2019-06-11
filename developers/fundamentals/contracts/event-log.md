---
title: Event Log
---

A log logs an event that contains actions and information as desired to the blockchain. 

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