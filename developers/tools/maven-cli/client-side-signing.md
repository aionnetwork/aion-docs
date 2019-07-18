---
title: Client-side Signing
description: This feature allows you to deploy a smart contract without having to access the account management features on the node you are connected to. Certain hosting providers like Nodesmith and Blockdaemon block access to account management features on their nodes for security reasons. This allows you to ignore that restriction as all transactions can be signed locally before being made public on the network. This is the preferred way to interact with a public network, as your private key never leaves your local machine.
weight: 300
---

Transaction signing using your private key is supported for the following Maven function:

- `aion4j:deploy`
- `aion4j:contract-txn`
- `aion4j:transfer`

## Use your Private Key

There are two ways to store and use your private key. The first method requires creating an environment variable and setting your private key to it. This is the recommended way since it's safer and much easier to use.

Alternatively, you can include your private key as an inline argument for each Maven command. This method will leave your private key exposed within your terminal history. You will have to manually include your private key for every transaction.

### Environment Variable

Storing your private key as an environment variable allows you to abstract away some of the processes involved with signing transactions. It is also marginally more secure than including your private key through inline arguments. However, this method does still require you to store your private key as plain text somewhere on your computer.

#### Linux and macOS

Run the following command in a terminal, pasting in your private key:

```bash
export pk=0x5e444d8bf64f9f6d9022cd245341e69d8b51af793367df3894...
```

#### Windows

Run the following command in Command Prompt, pasting in your private key:

```cmd
set pk=0x5e444d8bf64f9f6d9022cd245341e69d8b51af793367df3894.....
```

When you run a Maven command that can take a private key as an argument, Maven will first search through your environment variables for the `pk` variable. If the `pk` variable cannot be found, the Maven command will fail.

### Inline Argument

To include a private key as an inline argument, pass the `-Dpk=` argument followed by your private key:

```bash
mvn aion4j:deploy -Dpk=0x5e444d8bf64f9f6d9022cd245341e69d8b51af793367df3894...  -Premote
```

If you have a private key saved in the `pk` environment variable, but also include a private key as an inline argument, Maven will use the key supplied as an inline argument.
