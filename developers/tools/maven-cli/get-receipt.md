---
title: Get Receipt
---

Return a transaction receipt.

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

## Automatic Responses

When requesting a transaction receipt, you can include `-Dtail` and `-Dsilent` to get back a cleaner response from the kernel.

| Argument | Description |
| -------- | ----------- |
| `-Dtail` | Keep requesting the receipt every 10 seconds until it is received. |
| `-Dsilent` | Removes unimportant logs. |

For example:

```bash
mvn aion4j:get-receipt -DtxHash=0x014aa6362f512079163d15c4e7e6111244c48b060f0d3e3ee7140036f136cf6a -Dweb3rpc.url=https://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=12343567890abcdef...  -Dtail -Dsilent -Premote

> [INFO] Scanning for projects...
> ...
> [INFO] web3rpc.url is set to https://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=12343567890abcdef...
> [INFO] Waiting for transaction to mine ...Trying (1 of 15 times)
> [INFO] Waiting for transaction to mine ...Trying (2 of 15 times)
> ...
> [INFO] BUILD SUCCESS
> [INFO] ------------------------------------------------------------------------
> [INFO] Total time:  02:18 min
> [INFO] Finished at: 2019-03-29T11:58:10-04:00
> [INFO] ------------------------------------------------------------------------
```
