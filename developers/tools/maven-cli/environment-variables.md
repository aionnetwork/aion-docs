---
title: "Environment Variables"
section: Maven CLI
description: To make developing with the Maven CLI you can incorporate environment variables into your workflow. The Aion plugin for Maven is configured to watch for certain variables. If it finds these variables then it skips repetitive steps in the smart contract workflow.
weight:
draft: true
table_of_contents: true
next_page: 
header_image:
---

## Private Key

Adding the private key `pk` variable allows you to run Maven commands without having to specify which account you would like to use for a particular action. Actions such as deploying a contract can benefit from this massively. If Maven finds a `pk` variable within a user's terminal environment then it will automatically attempt to use that private key to sign transactions and deployments.

Instead of this:

```bash
mvn aion4j:deploy -Dpk=4b45d22a2f042d9... -Dweb3rpc.url=http://192.168.0.9 -Premote
```

You can run this:

```bash
mvn aion4j:deploy -Dweb3rpc.url=http://192.168.0.9 -Premote
```

When combined with the [`web3rpc` variable](#web3-rpc), this command shrinks down to:

```bash
mvn aion4j:deploy -Premote
```

## Web3 RPC

Technically the Web3 RPC variable we are referencing isn't an environment variable but is a modifiable option within your project's `pom.xml` file.

In your project's `pom.xml` file find the `<web3rpcUrl>` field. Within this field enter the URL of the node you want to connect to:

```xml
<plugin>

    ...

        <web3rpcUrl>https://aion.api.nodesmith.io/v1/mastery/jsonrpc?apiKey=abcdef123456...</web3rpcUrl>

    ...

</plugin>
```

With that variable supplied any calls made within Maven using the `-Premote` argument will automatically be routed to the specified node. You can tell Maven to ignore the node specified within the `pom.xml` file by supplying the `-Dweb3rpc` argument with a different node:

```bash
mvn aion4j:deploy -Dweb3rpc="https://new.aion.node/v1/mastery/jsonrpc?apiKey=123456abcdef..." -Premote
```
