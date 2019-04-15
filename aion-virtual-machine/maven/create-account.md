# Create Account

1. [Local](#local)
2. [Remote](#remote)

Create an account on the network: `mvn aion4j:create-account`

## Local

To create a local account run:

```bash
mvn aion4j:create-account -Daddress=<ADDRESS>  -Dbalance=<BALANCE>
```

For example:

```bash
mvn aion4j:create-account -Daddress=0xa0f1002373877bd6987f23af0daa97f5d886d591cf308408cb396eda44f3456e  -Dbalance=3141
```

## Remote

To create an account on a public network, run:

```bash
mvn aion4j:create-account
    -Daddress=<ADDRESS>
    -Dweb3rpc.url=<HOST>:<PORT>
    -Premote
```

For example:

```bash
mvn aion4j:create-account -Daddress=0xa0f1002373877bd6987f23af0daa97f5d886d591cf308408cb396eda44f3456e -Dweb3rpc.url=https://aion.api.nodesmith.io/v1/avmtestnet/jsonrpc?apiKey=ab40c8f567874400a69c1e80a1399350 -Premote
```