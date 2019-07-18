---
title: Endpoint URL
description: You can define the URL of the endpoint that you want to use, within your configuration file. This enables you to use remote commands without having to specify the web3 endpoint URL every time. If you are storing your project in a public repository, you may want to remove this endpoint URL, as some node hosting-services like Nodesmith include your API key within the URL itself.
weight: 350
---

To save the URL endpoint you wish to use within your project, open the `pom.xml` file and enter your endpoint URL between the `web3rpcurl` tags:

```xml
<plugins>
    <plugin>
        ...
        <configuration>
            <mode>remote</mode>
            <avmLibDir>${avm.lib.dir}</avmLibDir>
            <web3rpcUrl>https://aion.api.nodesmith.io/v1/mainnet/jsonrpc?apiKey=abcd1234de56...</web3rpcUrl>
        </configuration>
        ...
    </plugin>
    ...
</plugins>
```

Once you have added your endpoint URL into your project's `pom.xml` you will be able to run things like `mvn aion4j:deploy -Premote` without having the specify the `-Dweb3rpc.url` argument.
