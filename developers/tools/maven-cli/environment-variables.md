---
title: "Environment Variables"
section: Maven CLI
description: 
weight:
draft: true
table_of_contents: true
next_page: 
header_image:
---

To make developing with the Maven CLI you can incorporate environment variables into your workflow. The Aion plugin for Maven is configured to watch for certain variables. If it finds these variables then it skips repetative steps in the smart contract workflow.

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

When combined with the `web3rpc` variable, this command shrinks down to:

```bash
mvn aion4j:deploy -Premote
```
