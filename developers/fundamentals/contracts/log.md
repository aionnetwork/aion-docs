---
title: Log
toc: true
---

A log is used to store arguments and data in a transaction receipt on the blockchain. For AVM, a [log](#https://avm-api.aion.network/avm/blockchain#log(byte%5B%5D%29) can have 0 to 4 topic(s) and at least one data field.

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

## Example Receipt

```text
## Example receipt

Here is a sample receipt for the example contract deployment.

```text
{
  "blockHash": "0xaa632f36c3112f9d647f4d5985180ab9b13b06bf1139ae2de5bf83bf719d57c8",
  "nrgPrice": "0x174876e800",
  "logsBloom": "0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000020000000000000000000000000000000000000200000000000000000001000000000000000000002a000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000400000000000000000000000800000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000100000000000000000000000000000",
  "nrgUsed": "0x08076f",
  "contractAddress": "0xa0b43cd19dac758ee2a47c82bdb2bafb203355af16245ce09f07ae4818600c2b",
  "transactionIndex": "0x0",
  "transactionHash": "0x7f3b1828fae1b56811728f38128f0dab28ee71b9dfc5cf1c797f899a20bca6af",
  "gasLimit": "0x4c4b40",
  "cumulativeNrgUsed": "0x8076f",
  "gasUsed": "0x08076f",
  "blockNumber": "0xf1af",
  "root": "7664b317cd47190b0f7bdb56c5be185bbd4257197d6fabb9d866425d7f00435e",
  "cumulativeGasUsed": "0x8076f",
  "from": "0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9",
  "to": null,
  "logs": [{
    "address": "0xa0b43cd19dac758ee2a47c82bdb2bafb203355af16245ce09f07ae4818600c2b",
    "logIndex": "0x0",
    "data": "0x31353537383932343130",
    "topics": [
      "0x4a617661436f6e74726163744465706c6f796d656e7400000000000000000000",
      "0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9"
    ],
    "blockNumber": "0xf1af",
    "transactionIndex": "0x0"
  }],
  "gasPrice": "0x174876e800",
  "status": "0x1"
}
```

In the *logs* section, we can see that
1. The first topic is `0x4a617661436f6e74726163744465706c6f796d656e7400000000000000000000` which is the hex data for string `JavaContractDeployment`.
2. The second topic is `0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9` which is the account deployed the contract.
3. The `data` is `0x31353537383932343130` which is the time when block is forged.
```