---
title: Create an Account
description: The nature of blockchain development requires applications and users to have accounts. The Maven CLI allows developers to create accounts on the fly, and use them to deploy and interact with dApps.
weight: 400
table_of_contents: true
next_page: /developers/tools/maven-cli/get-balance
---

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

> Save your account address and private key is a safe place. Never share you private key with anyone. If someone knows your private key, they can withdraw all the funds within your account.
