---
title: Caching
description: The embedded AVM includes the ability to automatically cache the results from certain commands.
weight: 325
table_of_contents: true
next_page: /developers/tools/maven-cli/endpoint-url
---

After running `aion4j:deploy`, the embedded AVM will cache the application address. When the `aion4j:call` command is used, the embedded AVM will call the address stored in memory. This all happens automatically and without any input from the user. The same functionality is available when connecting to a remote kernel. The Maven plugin stores the transaction hash of the last deployment, the last contract deployment address, and the last transaction hash for other goals.

Due the this caching, you are able to run the following commands in sequence, assuming that you have your private key stored in the `pk` [environment variable](/developers/tools/maven-cli/client-side-signing), and your `web3 rpc endpoint url` has been [added into your `pom.xml`](/developers/tools/maven-cli/endpoint-url).

```bash
mvn clean install
mvn aion4j:deploy -Premote
mvn aion4j:get-receipt -Premote
mvn aion4j:contract-txn -Dmethod=sayHello -Premote
mvn aion4j:get-receipt -Premote
mvn aion4j:call -Dmethod=greet -Dargs="-T AVM" -Premote
```

### Clearing the Cache

Run `mvn clean` to completely clear the cache.
