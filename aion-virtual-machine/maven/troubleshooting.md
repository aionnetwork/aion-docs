# Troubleshooting

1. [AVM.jar is not found](#avmjar-is-not-found)
2. [Arrays into Deployment Arguments not working](#arrays-into-deployment-arguments-not-working)

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

## Arrays into Deployment Arguments not working

If you're having problem trying to deploy a contract with an array but it's not working, it could be that you're declairing the array wrong. You only need to define the array type once. The following will deploy an array of integers:

```bash
mvn aion4j:deploy -Dargs="-i 123 456 789"
```

The following will not deploy an array, but three individual integers:

```bash
mvn aion4j:deploy -Dargs="-i 123 -i 456 -i 789"
```

Take a look at the [Array section within the Variable and Types page](/aion-virtual-machine/variable-types#arrays).