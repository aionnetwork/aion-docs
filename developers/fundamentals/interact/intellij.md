---
title: IntelliJ
toc: true
---
## Prerequisites

- Java contract address.
- Private key to an Aion account that has sufficient balance (For contract transaction only).
- A rpc endpoint.

We will interact with the following contract as an example:

```java
public class HelloAvm
{
    @Initializable
    public static String myStr;

    @Initializable
    public static Address adminAddress;

    @Callable
    public static String getString(){
        return myStr;
    }

    @Callable
    public static void setString(String newStr) {
        myStr = newStr;
    }

    @Callable
    public static Address getAdminAddress(){
        Blockchain.require(Blockchain.getCaller().equals(adminAddress));
        return adminAddress;
    }
}
```

This contract is deployed on Aion Mastery, and the contract address is: `0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2`.

## Setup RPC Endpoint URL and Account

The Aion4j plugin needs an **url of rpc endpoint** to talk an Aion network and an **account** that has sufficient balance for contract transaction. Aion4j IntelliJ plugin supports client side transaction signing with private key. You can interact with a smart contract on an Aion network without account management feature and your private key never leaves your machine.

To setup the RPC endpoint URL and the account, open the `Configuration` window in the plugin, or you can use keyboard shortcut `Ctrl+Shift+A,C`.

 ![Configuration](/developers/fundamentals/deploy/images/configuration.gif)

## Call

Right click on the method you want to call, and select `Remote - Call` in Aion4j IntelliJ plugin. Aion4j  plugin can [auto-fill result cache](https://github.com/bloxbean/aion4j-maven-plugin/wiki/Client-side-signing-with-private-key-&-property-auto-fill-with-result-cache#2-property-auto-fill-with-result-cache-for-remote-kernel) for remote kernel, which means it stores the contract address of the last deployment. You can input your contract address if you want to call another contract.

 ![IntelliJ-call](/developers/fundamentals/interact/images/intellij-call.gif)

If the `call` is successful, both `return data` and `decoded returned data` will be shown in the output:

```sh
...
[INFO] Response from Aion kernel: 
{
  "result": "0x21000e48656c6c6f204a656e6e69666572",
  "id": "645392",
  "jsonrpc": "2.0"
}
[INFO] ****************  Method call result  ****************
[INFO] Data          :0x21000e48656c6c6f204a656e6e69666572
[INFO] Decoded value :Hello Jennifer
[INFO] ******************************************************
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time: 3.807 s
[INFO] Finished at: 2019-06-20T15:41:35-04:00
[INFO] Final Memory: 10M/37M
[INFO] ------------------------------------------------------------------------
[INFO] Maven execution finished
```

*Note: `call` is directly executed in the VM of the node. Go to the next section to see how to [send a transaction](#transaction) to a contract if you want to change a state in the blockchain.

## Transaction

To change a state in the blockchain, you will need an account with sufficient balance to send a transaction to the contract.

Right click on the method you want to send the transaction to, and select `Remote - Contract Transaction` in Aion4j IntelliJ plugin. Input arguments that are required using the right [format](#/). You can also send `AION` to the contract while you making the transaction. Aion4j plugin can [auto-fill result cache](https://github.com/bloxbean/aion4j-maven-plugin/wiki/Client-side-signing-with-private-key-&-property-auto-fill-with-result-cache#2-property-auto-fill-with-result-cache-for-remote-kernel) for remote kernel, which means it stores the contract address of the last deployment. You can input your contract address if you want to call another contract.

 ![IntelliJ-txn](/developers/fundamentals/interact/images/intellij-contract-txn.gif)

 A sample output of a successful deployment is:

```sh
...
[INFO] Response from Aion kernel: 
{
  "result": "0xf85ce26c9075027e42f2d1306ed4cf57d7cd565653a7a54ecdc142a8da963c38",
  "id": "131491",
  "jsonrpc": "2.0"
}
[INFO] ****************  Contract Txn result  ****************
[INFO] Transaction receipt       :0xf85ce26c9075027e42f2d1306ed4cf57d7cd565653a7a54ecdc142a8da963c38
[INFO] ******************************************************
[INFO] Waiting for transaction to mine ...Trying (1 of 15 times)
[INFO] Waiting for transaction to mine ...Trying (2 of 15 times)
[INFO] Waiting for transaction to mine ...Trying (3 of 15 times)
[INFO] Txn Receipt: 

[INFO] {
  "blockHash": "0x5cd1c7dc745c47f57ff0126c1b75ee07d8f75fabd2cd025f72dfd0b3e4ceb760",
  "nrgPrice": "0x174876e800",
  "logsBloom": "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
  "nrgUsed": "0x00bc48",
  "contractAddress": null,
  "transactionIndex": "0x0",
  "transactionHash": "0xf85ce26c9075027e42f2d1306ed4cf57d7cd565653a7a54ecdc142a8da963c38",
  "gasLimit": "0x1e8480",
  "cumulativeNrgUsed": "0xbc48",
  "gasUsed": "0x00bc48",
  "blockNumber": "0x29117f",
  "root": "7e8a6a75529b018886204ff25c56a2043e19bcb52fbab30f748d04759e1972d5",
  "cumulativeGasUsed": "0xbc48",
  "from": "0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9",
  "to": "0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2",
  "logs": [],
  "gasPrice": "0x174876e800",
  "status": "0x1"
}
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time: 32.130 s
[INFO] Finished at: 2019-06-20T15:51:41-04:00
[INFO] Final Memory: 10M/37M
[INFO] ------------------------------------------------------------------------
[INFO] Maven execution finished
```

where:

- `Transaction # :0xf85ce26c9075027e42f2d1306ed4cf57d7cd565653a7a54ecdc142a8da963c38` is the transaction hash.

- Then it calls [`aion4j:get-receipt -Dtail -Dsilent`](/developers/tools/maven-cli/get-receipt/#cleaner-responses) automatically. And you will get the receipt when the transaction is mined:
  
    ```sh
  {
  "blockHash": "0x5cd1c7dc745c47f57ff0126c1b75ee07d8f75fabd2cd025f72dfd0b3e4ceb760",
  "nrgPrice": "0x174876e800",
  "logsBloom": "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
  "nrgUsed": "0x00bc48",
  "contractAddress": null,
  "transactionIndex": "0x0",
  "transactionHash": "0xf85ce26c9075027e42f2d1306ed4cf57d7cd565653a7a54ecdc142a8da963c38",
  "gasLimit": "0x1e8480",
  "cumulativeNrgUsed": "0xbc48",
  "gasUsed": "0x00bc48",
  "blockNumber": "0x29117f",
  "root": "7e8a6a75529b018886204ff25c56a2043e19bcb52fbab30f748d04759e1972d5",
  "cumulativeGasUsed": "0xbc48",
  "from": "0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9",
  "to": "0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2",
  "logs": [],
  "gasPrice": "0x174876e800",
  "status": "0x1"
    }
  ```

- Check the `status` in your receipt, where `0x1` means the transaction is successfully sent.