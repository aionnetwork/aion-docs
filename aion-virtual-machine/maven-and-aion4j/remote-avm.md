# Remote AVM

1. [Compile](#compile)
2. [Deploy](#deploy)
3. [Call](#call)
4. [Accounts](#accounts)
5. [Transaction Receipts](#transaction-receipts)
6. [Transfer](#transfer)
7. [Logs](#logs)

Dealing with a remote AVM node using Maven is similar to dealing with the embedded AVM.

## Compile

There is no way to compile your contract using a remote node. This shouldn't be a problem however since you can compile the contract locally and deploy the contract to a remote node.

See [Embedded AVM Compiling](https://docs.aion.network/docs/maven-and-aion4j-embedded-avm#section-compile) for information on how to compile your contract.

## Deploy

To deploy your contract to a remote node, you will need to have compiled it first. Take a look at [Embedded AVM Compiling](https://docs.aion.network/docs/maven-and-aion4j-embedded-avm#section-compile). After running `mvn clean install` within your project folder, you will have a `.jar` file in the `targets` directory.

```text
hello-world/
├── lib
├── pom.xml
├── src
└── target
    ├── hello-world-1.0-SNAPSHOT.jar
```

To deploy a contract to a remote AVM node you will need to supply the `host` and `port` of your remote AVM node, as well as the `address` of the deployer. The account needs to be **unlocked**, and **must have funds** in it in order to pay for the deployment. Run this command to deploy the contract:

```bash
mvn aion4j:deploy -Dweb3rpc.url=http://<HOST>:<PORT> -Daddress=<DEPLOYER_ADDRESS> -Dpassword=<PASSWORD> -Premote
```

For example:

```bash
mvn aion4j:deploy -Dweb3rpc.url=http://138.91.123.106:8545 -Daddress='0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8' -Premote

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] /Users/aion/hello-world/target/hello-world-1.0-SNAPSHOT.jar was deployed successfully.
> [INFO] Transaction # : 0x6007cb6662418923ab966d443b23abb8e7a03043279d77e661f764bfc643ce83
>
> ...
```

**Remember**: the account you are using to deploy the contract must have funds in it in order to pay for the deployment. If not, you will get a `transaction dropped` error.

## Call

Run the following to call a function in a contract on a remote node:

```bash
mvn aion4j:call -Dweb3rpc.url=http://<HOST>:<PORT> -Daddress=<CALLER_ADDRESS> -Dcontract=<CONTRACT_ADDRESS> -Dmethod=<FUNCTION_NAME> -Dargs="<TYPE> <ARGUMENTS>" -Premote
```

For example:

```bash
mvn aion4j:call -Dweb3rpc.url=http://138.91.123.106:8545 -Daddress=0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8 -Dcontract=0x0f5d9fe9f554a736c0e6cfeb2571f8a1f92103bf4ce26e825692dfe50b66bc2a -Dmethod=sayHello -Premote
```

If you receive `[INFO] Data :0x` back from your request, it is likely because you either used an incorrect argument type or didn't spell the function name correctly.

## Accounts

There are several ways to interact with accounts hosted on remote AVM nodes.

### Get Balance

To get the balance of an account on a remote AVM node you will need to supply the `host` and `port` of your remote AVM node, as well as the `account` you want to get the balance of.

```bash
mvn aion4j:get-balance -Dweb3rpc.url=http://<HOST>:<PORT> -Daddress=<ACCOUNT_ADDRESS>
```

For example:

```bash
mvn aion4j:get-balance -Dweb3rpc.url=http://138.91.123.106:8545 -Daddress=0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8

> [INFO] Scanning for projects...
>
> ...
>

```

This function is handy when you're trying to figure out if your connection to a remote node is working. As long as you input a valid address (like the one supplied in this example), the node should always return something valid. If you are receiving an error, it is likely because your `web3rpc.url` variable is wrong, or your node is incorrectly setup.

### Create Account

To create an account on a remote AVM node you will need to supply the `host` and `port` of your remote AVM node, as well as the `password` you want to assign to the account.

```bash
mvn aion4j:create-account -Dweb3rpc.url=http://<HOST>:<PORT> -Dpassword=<PASSWORD> -Premote
```

For example:

```bash
mvn aion4j:create-account -Dweb3rpc.url=http://10.0.3.33:8545 -Dpassword="abcd1234"  -Premote

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] Account creation successful
> [INFO] Address : 0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8
>
> ...
```

### Unlock Account

To unlock an account on a remote AVM node, you need to know the `address` and `password` of the account you wish to unlock, as well as the `host` and `port` of the node that you want to connect to.

```bash
mvn aion4j:unlock -Dweb3rpc.url=http://<HOST>:<PORT> -Daddress=<ADDRESS> -Dpassword=<PASSWORD> -Premote
```

For example:

```bash
mvn aion4j:unlock -Dweb3rpc.url=http://138.91.123.106:8545 -Daddress='0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8' -Dpassword='abcd1234' -Premote

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] Web3Rpc request data: {"method":"personal_unlockAccount","jsonrpc":"2.0","params":["0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8","abcd1234","600"]}
> [INFO] Account unlocked successfully
>
> ...
```

## Transaction Receipts

After you have deployed a contract, you can get the transaction receipt by running:

```bash
mvn aion4j:get-receipt -DtxHash=<TRANSACTION_HASH> -Dweb3rpc.url=http://<HOST>:<PORT> -Premote
```

For example:

```bash
mvn aion4j:get-receipt -DtxHash=0x6007cb6662418923ab966d443b23abb8e7a03043279d77e661f764bfc643ce83 -Dweb3rpc.url=http://138.91.123.106:8545 -Premote

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] Txn Receipt:
> [INFO] {"result":{"blockHash":"0xfe61f30c69cfe8f729da4c94e41abb2da0715c2998a16cbfdf8727c5fda99686","nrgPrice":"0x174876e800","logsBloom":"000000","nrgUsed":"0x2de622","contractAddress":"0x0f5d9fe9f554a736c0e6cfeb2571f8a1f92103bf4ce26e825692dfe50b66bc2a","transactionIndex":"0x0","transactionHash":"0x6007cb6662418923ab966d443b23abb8e7a03043279d77e661f764bfc643ce83","gasLimit":"0x4c4b40","cumulativeNrgUsed":"0x2de622","gasUsed":"0x2de622","blockNumber":"0xa5fc","root":"9bd92d7dee3fb4456d1282a86dad0071ed43ae74e39be81669ab04ac90879347","cumulativeGasUsed":"0x2de622","from":"0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8","to":"0x","logs":[],"gasPrice":"0x174876e800","status":"0x1"},"id":null,"jsonrpc":"2.0"}
>
> ...
```

This function returns a large amount of JSON data. The contract address of the contract you deployed is in the field `contractAddress`.

## Transfer

Send `AION` from one account to another on the AVM testnet. You can also send `AION` to and from contracts.

```bash
mvn aion4j:transfer
    -Dweb3rpc.url=http://<HOST>:<PORT>
    -Dfrom=<SENDING ADDRESS>
    -Dto=<RECEIVING ADDRESS>
    -Dvalue=<AION AMOUNT>
    -Dpassword=<SENDING ADDRESS PASSWORD>
    -Premote
```

For example:

```bash
mvn aion4j:transfer -Dweb3rpc.url=http://138.91.123.106:8545 -Dfrom=0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8 -Dto=0xa03c7d96eec9f58bca9f83682d604cc5f6f9f4e2d67fca7318f848482ddb80a2 -Dvalue=1 -Dpassword=abcd1234 -Premote

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] Transfer successful
> [INFO] ****************  Transfer Txn result  ****************
> [INFO] Transaction receipt :0xafee6f73ad963092848a2b32d7dcaf2fb4038657fbd7d064c7a246b99e2b7ceb
>
> ...
```

## Logs

I order to have a node return logs, you must specify:

- The node `host` and `port` variables.
- The starting (`fromBlock`) and ending (`toBlock`) blocks that you wish to capture log data for. Log data will be returned _inclusive_ of these blocks.
- The `address` or addresses that you wish to capture log data.

```bash
mvn aion4j:get-logs
    -Dweb3rpc.url=http://<HOST>:<PORT>
    -DfromBlock=<FROM BLOCK>
    -Daddress=<ADDRESS>
    -Dtopics=<TOPICS optional>
    -Dblockhash=<BLOCKHASH optional>
    -Premote
```

For example:

```bash
mvn aion4j:get-logs -Dweb3rpc.url=http://host:port [-DfromBlock=<blockno>] [-DtoBlock=<blockno>] [-Daddress=[comma separated addresses]] [-Dtopics=[comma separated topics]] [-Dblockhash=<blockhash>] -Premote
```