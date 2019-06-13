---
title: Client-side Signing
---

This feature allows you to deploy a smart contract _without_ having to access the account management features on the node you are connected to. Certain hosting providers like Nodesmith and Blockdaemon block access to account management features on their nodes for security reasons. This allows you to ignore that restriction as all transactions can be signed locally before being made public on the network.

This is the preferred way to interact with a public network, as your private key never leaves your local machine.

Transaction signing using your private key is supported for the following Maven function:

- `aion4j:deploy`
- `aion4j:contract-txn`
- `aion4j:transfer`

## Use your Private Key

There are two ways to store and use your private key. The first method requires creating an environment variable and setting your private key to it. This is the recommended way since it's safer and much easier to use.

Alternatively, you can include your private key as an inline argument for each Maven command. This method will leave your private key exposed within your terminal history. You'll also have to manually include your private key for every transaction.

### Environment Variable

Storing your private key as an environment variable allows you to abstract away some of the processes involved with signing transactions. It is also marginally more secure than including your private key through inline arguments. However, this method does still require you to store your private key as plain text.

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

## Autofill and Caching

The embedded AVM includes the ability to automatically cache the results from certain commands. After running `aion4j:deploy`, the embedded AVM will cache the application address. When the `aion4j:call` command is used, the embedded AVM will call the address stored in memory. This all happens automatically and without any input from the user.

The same functionality is available when connecting to a remote kernel. The Maven plugin stores the transaction hash of the last deployment, the last contract deployment address, and the last transaction hash for other goals.

Due the this caching, you are able to run the following commands in sequence, assuming that you have your private key stored in the `pk` environment variable, and your `web3 rpc endpoint url` has been added into your `pom.xml`.

```bash
mvn clean install
mvn aion4j:deploy -Premote
mvn aion4j:get-receipt -Premote
mvn aion4j:contract-txn -Dmethod=sayHello -Premote
mvn aion4j:get-receipt -Premote
mvn aion4j:call -Dmethod=greet -Dargs="-T AVM" -Premote
```

### Clearing the Cache

Run `mvn clean` to clear the cache.
