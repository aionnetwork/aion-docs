---
title: Intellij
table_of_contents: true
---

## Prerequisites

- [Aion4j AVM IntelliJ Plugin](/developers/tools/intellij/install-the-plugin/)
- Private key to an Aion account that has sufficient balance.
- A rpc endpoint.
- AVM maven project and [compiled](/developers/fundamentals/compile/intellij/) contract *.jar*.

## Setup RPC Endpoint URL and Account

The Aion4j plugin needs an **url of rpc endpoint** to talk an Aion network and an **account** that has sufficient balance for contract deployment is required as well. Aion4j IntelliJ plugin supports client side transaction signing with private key. You can deploy a smart contract on an Aion network without account management feature and your private key never leaves your machine.

To setup the RPC endpoint URL and the account, open the `Configuration` window in the plugin, or you can use keyboard shortcut `Ctrl+Shift+A,C`.

 ![Configuration](/developers/fundamentals/deploy/images/configuration.gif)

## Deploy

*Note: Deploy your contract to the [embedded AVM local kernel](/developers/tools/maven-cli/deploy/#local) to test it before you deploy the contract to the real network.

We will deploy the following contract as an example.

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
        return adminAddress;
    }
}
```

Open the Aion4j plugin in your project top level by right click on the project folder,and select `Config Deploy Args`, or select the project folder and use keyboard shortcut `Ctrl+Shift+X,D`. A pop up window will ask you to input `Deployment Arguments`.

![Deployment-popup](/developers/fundamentals/deploy/images/deployment-argument.gif)

We need to pass in two arguments into this contract, *myStr* and *adminAddress*,  upon deployment. Learn about [deployment initialization](/developers/fundamentals/contracts/initialization/) if you are not familiar with it.

If your contract does not require any deployment arguments, this field is not required. Each [ABI type](/developers/fundamentals/avm-concepts/abi-types/) has its own [selector](/developers/tools/maven-cli/variable-types/) and you need to define it following by the argument data. For example,  `-T` is the selector for a string and `-A` is the selector for an Address.

Click `OK` to deploy your contract. Then Aion4j plugin will build and compile your contract, run your test cases, if everything pass it will deploy the contract to your node.

 ![deployment-output](/developers/fundamentals/deploy/images/deploy.gif)
A sample output of a successful deployment is:

```sh
...

[INFO] /home/jennifer/Integration/Doc/sampleContract/target/contract-1.0-SNAPSHOT.jar was deployed successfully.
[INFO] Transaction # : 0x67cd924022968d58643568d10baa382551651bac18ce53e9a91b2e004f5a3cc7
[INFO] Waiting for transaction to mine ...Trying (1 of 15 times)
[INFO] Waiting for transaction to mine ...Trying (2 of 15 times)
[INFO] Waiting for transaction to mine ...Trying (3 of 15 times)
[INFO] Txn Receipt: 

[INFO] {
  "blockHash": "0x4c7add753709f59b357f77518de83145ddf455273f55f9a734c329fd96f14463",
  "nrgPrice": "0x174876e800",
  "logsBloom": "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
  "nrgUsed": "0x0a7b0f",
  "contractAddress": "0xa0a907bee91602f464fd656a69489e73239614ba07bfb153e8857147eb9cef3c",
  "transactionIndex": "0x0",
  "transactionHash": "0x67cd924022968d58643568d10baa382551651bac18ce53e9a91b2e004f5a3cc7",
  "gasLimit": "0x4c4b40",
  "cumulativeNrgUsed": "0xa7b0f",
  "gasUsed": "0x0a7b0f",
  "blockNumber": "0x28f666",
  "root": "b41a71d7af81892b3426175804976e41fde10c2c767eab17d38d8615152408f2",
  "cumulativeGasUsed": "0xa7b0f",
  "from": "0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9",
  "to": null,
  "logs": [],
  "gasPrice": "0x174876e800",
  "status": "0x1"
}
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time: 41.208 s
[INFO] Finished at: 2019-06-19T14:56:09-04:00
[INFO] Final Memory: 17M/60M
[INFO] ------------------------------------------------------------------------
[INFO] Maven execution finished
```

where:

- `Transaction # :0x67cd924022968d58643568d10baa382551651bac18ce53e9a91b2e004f5a3cc7` is the transaction hash.

- Then it calls [`aion4j:get-receipt -Dtail -Dsilent`](/developers/tools/maven-cli/get-receipt/#cleaner-responses) automatically. And you will get the receipt when the transaction is mined:
  
    ```sh
  {
    "blockHash": "0x4c7add753709f59b357f77518de83145ddf455273f55f9a734c329fd96f14463",
    "nrgPrice": "0x174876e800",
    "logsBloom": "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
    "nrgUsed": "0x0a7b0f",
    "contractAddress": "0xa0a907bee91602f464fd656a69489e73239614ba07bfb153e8857147eb9cef3c",
    "transactionIndex": "0x0",
    "transactionHash": "0x67cd924022968d58643568d10baa382551651bac18ce53e9a91b2e004f5a3cc7",
    "gasLimit": "0x4c4b40",
    "cumulativeNrgUsed": "0xa7b0f",
    "gasUsed": "0x0a7b0f",
    "blockNumber": "0x28f666",
    "root": "b41a71d7af81892b3426175804976e41fde10c2c767eab17d38d8615152408f2",
    "cumulativeGasUsed": "0xa7b0f",
    "from": "0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9",
    "to": null,
    "logs": [],
    "gasPrice": "0x174876e800",
    "status": "0x1"
    }
  ```

- Check the `status` in your receipt, where `0x1` means successfully deployed, and then you can find your contract address in the receipt.
  
  ```sh
  "contractAddress": "0xa0a907bee91602f464fd656a69489e73239614ba07bfb153e8857147eb9cef3c"
  ```
