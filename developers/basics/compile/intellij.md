---
title: Intellij
description: Learn how to compile your dApps using the IntelliJ IDE and the Aion4j plugin. In IntelliJ, each contract is compiled before it is deployed. During your development cycle, it is very unlikely that you will need to manually compile a contract within IntelliJ. However, if you do find the need to compile a contract without deploying it, then follow this process.
header_image: /developers/images/developers-header.png
table_of_contents: true
next_page: /developers/basics/deploy/intellij
---

## Manual Compilation

1\. Open the terminal within IntelliJ

2\. Call `clean` and `install` commands from Maven:

```bash
mvn clean install
```

3\. Your project should now compile.

![Manually ](/developers/basics/compile/images/intellij-compile.gif)

If your contract successfully compile you will find three files under project's `target` folder:

- `original-*.jar`: In the build process, the AVM verifies all the classes used in the contract are available in the [JCL Whitelist](/developers/fundamentals/jcl-whitelist) and all the test classes pass.  
- `*.jar`: The `.jar` file that will be deployed to the network. There is some post-processing that happens to the `original-*.jar` to create this `.jar` file, including processing the `@Initializable` and `@Callable` annotations, and removing unused classes according to the class optimizer.
- `*.abi`: This file is the ABI for the application. It defines the callable functions within the application, as well as any arguments they take.

## Disable Automatic Compilation

Keep in mind that when you select to deploy your application again in IntelliJ, the IDE will automatically re-compile your contracts. If you want to disable this automatic re-compile, follow these steps:

1. Open the Aion4j Configuration window by right-clicking in the editor pane and click **Aion Virtual Machine** → **Configuration**.
2. Uncheck the **Always compile before deploying** box.
