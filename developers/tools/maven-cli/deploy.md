---
title: Deploy
description: Once a blockchain application has been written, it can be compiled and deployed to a local or remote blockchain network. Deploying blockchain applications is similar to how regular applications are deployed currently, however there are some differences. One major difference is that to deploy an application to a public blockchain network, an account must be supplied with tokens in order to cover the deployment costs. However, when deploying to a local network through the Aion4j plugin, there is no need to create an account or supply it with test tokens, as everything is contained within the local network.
weight: 700
---

Deploy your contract on a blockchain network: `mvn aion4j:deploy`

Before you deploy your contract, make sure you have [compiled it](compile).

## Local

Run the following command from the same location as your `pom.xml` file:

```bash
mvn aion4j:deploy

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] BUILD SUCCESS
> [INFO] ------------------------------------------------------------------------
> [INFO] Total time:  1.032 s
>
> ...
```

You can also supply arguments to your contract during deployment:

```bash
mvn aion4j:deploy -Dargs="-T 'Hello World'"
```

See the [Deployment Arguments](/aion-virtual-machine/contract-fundamentals/deployment-arguments) section to find out how to supply arguments into your contract when deploying.

## Remote

To deploy a contract to a remote node you will need to supply the `host` and `port` of your remote node.

The account you are using to deploy the contract must have funds in it in order to pay for the deployment. If not, you will get a `transaction dropped` error. You can get test `AION` [using a faucet](/tokens/test-tokens).

### Transaction Signing

All transactions must be signed. This is so that the network can confirm who sent which transaction. Transactions that happen on a local node are automatically signed so you don't need to worry about then. Transactions on remote nodes must be manually signed.

You can sign the transaction _before_ sending it to the network, also known as [Client-Side Signing](client-side-signing). This is the safest option. To do this, add the private key of the account you want to deploy with to your environment variables. Or add the private key as an argument when deploying.

### Deploy though Client-Side Signing

Run this command to deploy the contract, assuming you have your private key stored as an environment variable (see [Client-Side Singing](client-side-signing) for more information):

```bash
mvn aion4j:deploy -Dweb3rpc.url=http://<HOST>:<PORT> -Premote
```

For example:

```bash
mvn aion4j:deploy -Dweb3rpc.url=http://138.91.123.106:8545 -Premote

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] /Users/aion/hello-world/target/hello-world-1.0-SNAPSHOT.jar was deployed successfully.
> [INFO] Transaction  : 0x6007cb6662418923ab966d443b23abb8e7a03043279d77e661f764bfc643ce83
>
> ...
```

If you do not have your private key stored as an environment variable, or want to use a different key to what you have stored, you must supply it as an argument when deploying:

```bash
mvn aion4j:deploy -Dweb3rpc.url=http://138.91.123.106:8545 -Dpk=4b45d22a2f042d9... -Premote
```

#### Node Hosting Service

If you are using a node hosting service like Blockdaemon or Nodesmith you do not need to supply a port number.

For example:

```bash
mvn aion4j:deploy -Dweb3rpc.url=https://aion.api.nodesmith.io/v1/avmtestnet/jsonrpc?apiKey=abcdef1234564400a69ab440a1123456 -Premote
```
