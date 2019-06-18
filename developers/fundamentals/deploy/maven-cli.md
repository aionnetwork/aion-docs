---
title: Maven CLI
toc: true
---

## Prerequisites

- Private key to an Aion account. (Check how to create a new account here.)
- Enough Balance. (Get Aion test tokens here.)
- A rpc endpoint. (Set up your own node or using Aion's node hosting serives.)
- AVM maven project and compiled contract *.jar*.

## Setup Node URL and Account

You can setup your account and rpc endpoint as environment variables, or you can jump to [Deploy](#deploy) section and setup variables upon deployment.

### Setup Node URL
The aion4j plugin needs the **url of rpc endpoint** to talk an Aion network.

- **Option 1**: Setup RPC Endpoint in `pom.xml`.
  - Use a node
  
    ```xml
    ...
    <profile>
    <id>remote</id>
    ...
    <web3rpcUrl>http://localhost:8545</web3rpcUrl>
    ...
    </profile>
    ...
    ```

  - Use NodeSmith(node hosting service) API endpoint
  
    ```xml
    ...
    <profile>
    <id>remote</id>
    ...
    <web3rpcUrl>https://aion.api.nodesmith.io/v1/mastery/jsonrpc?apiKey=abcdefg12345678</web3rpcUrl>
    ...
    </profile>
    ...
    ```

- **Option 2:** Setup RPC Endpoint as enviorment variables
  
  - Mac and Linux

    ```sh
    export web3rpc_url=http://localhost:8545
    ```

  - Windows

    ```sh
    set web3rpc_url=http://localhost:8545
    ```

### Setup Account

An account that has sufficient balance for contract deployment is required as well. Aion4j maven plugin supports client side transaction signing with private key. You can deploy a smart contract on an Aion network without account management feature and your private key never leaves your machine.

Setup your **private key**  as an enviornment variable by runing the following command:

- Mac and Linux
  
    ```sh
    export pk=0xa01234567890abcdefghijk...
    ```

- Windows

    ```sh
    set pk=0xa01234567890abcdefghijk...
    ```

## Deploy

*Note: Deploy your contract to the [embedded AVM local kernel](/developers/tools/maven-cli/deploy/#local) to test it before you deploy the contract to the real network.

We will deploy the following contract as an example.

```java
public class HelloAVM
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

We need to pass in two arguments into the contract, *myStr* and *adminAddress*,  upon deployment. Learn about [deployment initialization](/developers/fundamentals/contracts/initialization/) if you are not familiar with it.

- If you **have** setup your *rpc endpoint* and *private key* as environment variables already, run:

    ```sh
    mvn aion4j:deploy -Dargs="-T 'Hello AVM' -A 0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9" -Premote
    ```

- If you **haven't** setup your *rpc endpoint* and *private key* as environment variables already, set them in the CLI as following:
  
    ```sh
    mvn aion4j:deploy -Dargs="-T 'Hello AVM' -A 0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9" -Dweb3rpc.url="Your RPC Endpoint Url" -Dpk="Your Private Key" -Premote
    ```

Here, `-Dargs` is the keyword for passing in deployment arguments. If your contract does not require any deployment arguements, this field is not required. Each [ABI type](#/) has its own [selector](#/) and you need to define it following by the argumentment data. For example,  `-T` is the selector for a string and `-A` is the selector for an Address.

You will get a transaction hash as an output like:

```sh
...
[INFO] Transaction # : 0x534ddf6e76699b74c0de650b1aae05c963aa5a850f58d4c68d0ab241ffcfecf2
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time:  2.070 s
[INFO] Finished at: 2019-06-11T15:09:49-04:00
[INFO] ------------------------------------------------------------------------
```

where `0x534ddf6e76699b74c0de650b1aae05c963aa5a850f58d4c68d0ab241ffcfecf2` is your transaction hash.

## Get Contract Address

You can get the `contract address` of the contract by getting the receipt of your `transaction hash`. Aion4j maven plugin can [auto-fill result cache](https://github.com/bloxbean/aion4j-maven-plugin/wiki/Client-side-signing-with-private-key-&-property-auto-fill-with-result-cache#2-property-auto-fill-with-result-cache-for-remote-kernel) for remote kernel, which means it will stores the transaction hash of the last transaction.

Run the following to get the receipt of the most recent transaction:

```sh
mvn aion4j:get-receipt -Premote
```

Or get the receipt of a specific transaction hash:

```sh
mvn aion4j:get-receipt -DtxHash=0x534ddf6e76699b74c0de650b1aae05c963aa5a850f58d4c68d0ab241ffcfecf2 -Premote
```

The receipt looks like:

```sh
[INFO] {
  "blockHash": "0xb6f98426a432b166b2dda2da8c93e767169ffda10dfc7293ad924e9fdc5929b3",
  "nrgPrice": "0x174876e800",
  "logsBloom": "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
  "nrgUsed": "0x0e225e",
  "contractAddress": "0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2",
  "transactionIndex": "0x1",
  "transactionHash": "0x534ddf6e76699b74c0de650b1aae05c963aa5a850f58d4c68d0ab241ffcfecf2",
  "gasLimit": "0x4c4b40",
  "cumulativeNrgUsed": "0xe9d1d",
  "gasUsed": "0x0e225e",
  "blockNumber": "0x27f6c8",
  "root": "5f17ec1b1e2c41835f14e2dd0b544ef14ba0ac7d6486f9f2133462f894313060",
  "cumulativeGasUsed": "0xe9d1d",
  "from": "0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9",
  "to": null,
  "logs": [],
  "gasPrice": "0x174876e800",
  "status": "0x1"
}
```

where `0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2` is your contract address.
