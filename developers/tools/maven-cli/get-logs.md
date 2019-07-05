---
title: Get Logs
description: Reviewing the logs from a node can be useful when attempting to debug issues with contracts or the node itself. Logs can also be useful at finding choke points or memory issues within your contracts.
---

Return logs from a remote node: `mvn aion4j:get-logs`

In order to have a node return logs, you must specify:

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
