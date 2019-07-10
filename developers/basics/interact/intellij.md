---
title: IntelliJ
description: This guide walks you through how to call blockchain applications on the local kernel and on remote networks using IntelliJ and the Aion4j plugin.
---

## Local

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Embedded** > **Call**. If the method you selected takes arguments, you must provide them in the **Method parameters** window that is shown.

![Call Embedded Contract](/developers/tools/intellij-plugin/images/call-embedded-contract.gif)

By default the **Call** command will call the last deployed contract. However if you want to call a specific contract address, uncheck the **Use Last Deployed Contract Address** checkbox, and enter the address you want to use.

## Remote

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Remote** > **Call**. If the method you selected takes arguments, you must provide them in the **Method parameters** window that is shown.

By default the **Call** command will call the last deployed contract. However if you want to call a specific contract address, uncheck the **Use Last Deployed Contract Address** checkbox, and enter the address you want to use.
