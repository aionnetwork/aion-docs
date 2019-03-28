# Troubleshooting

1. [AVM.jar is not found](#avmjar-is-not-found)

We've collected a few common errors and problems that you might run into when using Maven and Aion4j.

## AVM.jar is not found

This usually means that you're trying to run something on a remote node, but you haven't passed the `-Premote` argument. For example the following code will fail:

```bash
mvn aion4j:get-balance -Dweb3rpc.url=https://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=AABBCCDDEEFF112233445566 -Daccount=0xaabbccddeeff112233445566a1b2c3d4e5f6
```

Adding the `-Premote` argument to the end of the command should fix the problem.

```bash
mvn aion4j:get-balance -Dweb3rpc.url=https://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=AABBCCDDEEFF112233445566 -Daccount=0xaabbccddeeff112233445566a1b2c3d4e5f6 -Premote
```