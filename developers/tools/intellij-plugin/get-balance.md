---
title: Get Balance
description: Every account has a balance associated with it, including empty accounts. Finding out the balance of an account is incredibly simple with the Aion4j plugin for IntelliJ.
weight: 800
---

The `get-balance` command is split into two section, [Default](#default-account) and [Specific](#specific-account).

## Default Account

Get the balance of the default account.

### Local

Run this command by right clicking anywhere in a contract and selecting **Aion Virtual Machine** → **Embedded** → **Get Balance (Default)**. The results are printed in the Maven Goal terminal.

![Get Default Balance Embedded](/developers/tools/intellij-plugin/images/get-balance-default-embedded.gif)

This balance is reset back to ~99999997205856*10^-18 `AION` every time you compile a contract.

### Remote

Return the balance of the account listed in the configuration window.

Run this command by right clicking anywhere within a contract and selecting **Aion Virtual Machine** → **Remote** → **Get Balance**.

This command requires an address to be in the **Address** field of the **Confirguration** → **Remote Kernel** window.

## Specific Account

Get the balance of a specific account.

### Local

Get the balance of a specific account.

Run this command by right clicking anywhere in a contract and selecting **Aion Virtual Machine** → **Embedded** → **Get Balance (Default)**. Then enter the address you want to find the balance of in the **Enter Account** window that is shown. The results are printed in the Maven Goal terminal.

![Get Default Balance Embedded](/developers/tools/intellij-plugin/images/get-balance-account-window-embedded.png)

Only accounts within the embedded AVM will show their balance. Accounts on the Mainnet or Testnet (Mastery) are not known to the embedded AVM.

### Remote

Return the balance of a specific contract.

Run this command by right clicking anywhere within a contract and selecting **Aion Virtual Machine** → **Remote** → **Get Balance**.
