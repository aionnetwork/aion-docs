---
title: Contract Transaction
---

Call a contract.

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Remote** > **Contract Transactin**.

This is similiar to the **Call** command with some subtle differences. Call internally invokes `_call` which gets executed in the node and no NRG is required. **Contract Transaction** invokes `_sendTransaction` which sends a transaction to the network and needs NRG to execute.
