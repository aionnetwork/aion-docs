---
title: Maven CLI
table_of_contents: true
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
        return adminAddress;
    }
}
```

This contract is deployed on Aion Mastery, and the contract address is: `0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2`.

## Setup Node URL

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

## Call

You can use `aion4j: call` maven goal to get data from blockchain by calling a contract method.

- If you **have** setup your *rpc endpoint* as environment variables already, run:

    ```sh
    mvn aion4j:call -Dcontract=0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2 -Dmethod=getString  -Dargs="" -Premote
    ```

- If you **have not** setup your *rpc endpoint* as environment variables already, run:

    ```sh
    mvn aion4j:call -Dcontract=0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2 -Dmethod=getString  -Dargs="" -Dweb3rpc.url="Your RPC Endpoint Url" -Premote
    ```

where contract address is assigned to `-Dcontract` and `-Dmethod` is the method name we are calling. If the method require any arguments, you can pass them in with [`-Dargs`](/) .

If the `call` is successful, both `return data` and `decoded returned data` will be shown in the output:

```sh
...
[INFO] Response from Aion kernel:
{
  "result": "0x21000948656c6c6f2041564d",
  "id": "262348",
  "jsonrpc": "2.0"
}
[INFO] ****************  Method call result  ****************
[INFO] Data          :0x21000948656c6c6f2041564d
[INFO] Decoded value :Hello AVM
[INFO] ******************************************************
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time:  1.981 s
[INFO] Finished at: 2019-06-20T13:35:22-04:00
[INFO] ------------------------------------------------------------------------
```

*Note: `call` is directly executed in the VM of the node. Go to the next section to see how to [send a transaction](#transaction) to a contract if you want to change a state in the blockchain.

## Contract Transaction

To change a state in the blockchain, you will need an account with sufficient balance to send a transaction to the contract.

### Setup Account

Aion4j maven plugin supports client side transaction signing with private key. You can send a transaction to an Aion network without account management feature and your private key never leaves your machine.

Setup your **private key**  as an enviornment variable by runing the following command:

- Mac and Linux
  
    ```sh
    export pk=0xa01234567890abcdefghijk...
    ```

- Windows

    ```sh
    set pk=0xa01234567890abcdefghijk...
    ```

### Send Contract Transaction

Use `aion4j: contract-txn` maven goal to send your transaction to a contract method.

- If you **have** setup your *rpc endpoint* and *private key* as environment variables already, run:

    ```sh
    mvn aion4j:contract-txn -Dcontract=0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2 -Dmethod=setString  -Dargs="-T 'Hello Jennifer'" -Premote

    ```

- If you **have not** setup your *rpc endpoint* as environment variables already, run:

    ```sh
    mvn aion4j:contract-txn -Dcontract=0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2 -Dmethod=setString  -Dargs="-T 'Hello Jennifer'" -Dweb3rpc.url="Your RPC Endpoint Url" -Dpk="Your Private Key" -Premote
    ```

Contract address is assigned to `-Dcontract` and `-Dmethod` is the method name we are sending the transaction to. `-Dargs` is the keyword for passing in arguments. If your method does not require any arguements, this field is not required. Each [ABI type](/developers/fundamentals/avm-concepts/abi-types/s) has its own [selector](/developers/tools/maven-cli/variable-types/) and you need to define it following by the argumentment data. For example, `setString` requires a `string`, where the selector is `-T`.

You will get a `transaction hash` as an output like:

```sh
...
[INFO] ****************  Contract Txn result  ****************
[INFO] Transaction receipt       :0xe0ab2a5affd116a57c2bedfdc3c49efa1de2b99132f2df2017cf50a9550e43cc
[INFO] ******************************************************
[INFO] ------------------------------------------------------------------------
...
```

### Get Transaction Receipt

You can make sure your transaction is succeful and got mined in the blockchain by getting the receipt of your `transaction hash`. Aion4j maven plugin can [auto-fill result cache](https://github.com/bloxbean/aion4j-maven-plugin/wiki/Client-side-signing-with-private-key-&-property-auto-fill-with-result-cache#2-property-auto-fill-with-result-cache-for-remote-kernel) for remote kernel, which means it will stores the transaction hash of the last transaction.

Run the following to get the receipt of the most recent transaction:

```sh
mvn aion4j:get-receipt -Dtail -Dsilent -Premote
```

Or get the receipt of a specific transaction hash:

```sh
mvn aion4j:get-receipt -DtxHash=0xe0ab2a5affd116a57c2bedfdc3c49efa1de2b99132f2df2017cf50a9550e43cc -Dtail -Dsilent -Premote
```

By including `-Dtail -Dsilent`, it will pull the receipt every 10s until the transaction is mined, and only necessary log messages will be shown.

The receipt looks like:

```sh
[INFO] {
   "blockHash": "0x7518c4d7373bec1d3e6f5820a36ba01980c1f0fa282d34c31f9dd4ef05eeefe1",
  "nrgPrice": "0x174876e800",
  "logsBloom": "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
  "nrgUsed": "0x00bdab",
  "contractAddress": null,
  "transactionIndex": "0x0",
  "transactionHash": "0xe0ab2a5affd116a57c2bedfdc3c49efa1de2b99132f2df2017cf50a9550e43cc",
  "gasLimit": "0x1e8480",
  "cumulativeNrgUsed": "0xbdab",
  "gasUsed": "0x00bdab",
  "blockNumber": "0x2910e2",
  "root": "0ba22f967904cfb81523294e4455b8399761931e03b23610a78d8eee8fae8a56",
  "cumulativeGasUsed": "0xbdab",
  "from": "0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9",
  "to": "0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2",
  "logs": [],
  "gasPrice": "0x174876e800",
  "status": "0x1"
}
```

where `status: 0x1` means the transaction was sent successfully.
