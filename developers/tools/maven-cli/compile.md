---
title: Compile
description: Translate your code from Java source-code down to Java bytecode, so that it can run on the Aion blockchain. This command is the same for both local and remote deployment. Regardless of where your contract is going to end up, you must compile it on your local machine first. There is no way to compile your contract using a remote node.
weight: 600
table_of_contents: true
next_page: /developers/tools/maven-cli/deploy
---

Compile your contract: `mvn clean install`

To compile your contract, run the following command from the same location as your `pom.xml` file:

```bash
mvn clean install

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] --- maven-jar-plugin:2.4:jar (default-jar) @ hello-world ---
> [INFO] Building jar: /Users/aion/code/hello-world/target/hello-world-1.0-SNAPSHOT.jar
>
> ...
```

This command is actually two standard Maven commands: `clean` and `install`. Once the process has finished, you will have a `.jar` application in the `targets` folder.

The class you want to compile should be listed within the `contract.main.class` section of your project's `pom.xml` file.

```xml
<properties>
    ...
    <contract.main.class>aion.HelloAVM</contract.main.class>
</properties>
```

If your contract successfully compiles you will find three files under the project's `target` folder:

- `original-*.jar`: In the build process, the AVM verifies all the classes used in the contract are available in the [JCL Whitelist](/developers/fundamentals/aion-virtual-machine/jcl-whitelist) and all the test classes pass.  
- `*.jar`: The `.jar` file that will be deployed to the network. There is some post-processing that happens to the `original-*.jar` to create this `.jar` file, including processing the `@Initializable` and `@Callable` annotations, and removing unused classes according to the class optimizer.
- `*.abi`: This file is the ABI for the application. It defines the callable functions within the application, as well as any arguments they take.
