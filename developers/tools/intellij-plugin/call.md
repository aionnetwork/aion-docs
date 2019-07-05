---
title: Call
description: Calls to a contract can either be simple calls, or contract transactions. Calls do not necessarily incur a cost, but contract transactions always incur a cost as they are changing the state of the blockchain. Calls to a contract will always return something, whereas contract transaction may not depending on the function called.
weight: 600
---

Call a contract.

## Local

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Embedded** > **Call**. If the method you selected takes arguments, you must provide them in the **Method parameters** window that is shown.

![Call Embedded Contract](images/call-embedded-contract.gif)

By default the **Call** command will call the last deployed contract. However if you want to call a specific contract address, uncheck the **Use Last Deployed Contract Address** checkbox, and enter the address you want to use.

## Remote

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Remote** > **Call**.

If the method you selected takes arguments, you must provide them in the **Method parameters** window that is shown.

By default the **Call** command will call the last deployed contract. However if you want to call a specific contract address, uncheck the **Use Last Deployed Contract Address** checkbox, and enter the address you want to use.
