---
title: Contract Transaction
description: Contract transactions are the same as calls, except transactions always initiate a state-change. This means that something within the contract, like a variable, changes. This changes the state of the blockchain, which incurs a cost. Transaction calls can also change the state, or value, of something _without_ the contract having to return anything. Calls do not necessarily initiate a state-change. Calls are able to simply request the content or value of a variable. Calls will always return something, whereas contract transaction may not.
table_of_contents: true
next_page: /developers/tools/intellij/get-balance
weight: 700
---

Call a contract.

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** → **Remote** → **Contract Transactin**.

This is similiar to the **Call** command with some subtle differences. Call internally invokes `_call` which gets executed in the node and no NRG is required. **Contract Transaction** invokes `_sendTransaction` which sends a transaction to the network and needs NRG to execute.
