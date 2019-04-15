# Get Logs

Return logs from a remote node: `mvn aion4j:get-logs`

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