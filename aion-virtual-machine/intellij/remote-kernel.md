# Remote Kernel

Manage your contracts and accounts on a remote node from within IntelliJ.

Before you can perform any remote actions, you need to have completed the [Remote Kernel configuration options](/aion-virtual-machine/intellij/configure#remote-kernel).

## Deploy

Deploy your contract to the Testnet (Mastery).

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Deploy**. You will be prompted to enter a [node URL](/aion-virtual-machine/intellij/configure#remote-kernel) and [deployer address](/aion-virtual-machine/intellij/configure#remote-kernel) if you haven't filled them in already.

This command will compile your contract before attempting to deploy, unless you have specified that you do not want this to happen in the [configuration options](/aion-virtual-machine/intellij/configure#remote-kernel).

## Get Receipts

Return the transaction receipt for the most recent deployment / call.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Get Receipts (Recent)**.

### Specify Receipt

Return the transaction receipt for a specific transaction.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Get Receipts (Recent)**. Then enter the hash of the transaction you wish to see. If you do not enter a valid hash, the plugin will default back to requesting the receipt for the most recent deploynent / call.

## Call

Call a contract.

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Remote** > **Call**. If the method you selected takes arguments, you must provide them in the **Method parameters** window that is shown.

By default the **Call** command will call the last deployed contract. However if you want to call a specific contract address, uncheck the **Use Last Deployed Contract Address** checkbox, and enter the address you want to use.

## Contract Transactions

## Get Balance

Return the balance of the account listed in the configuration window.

### Specify Account

Return the balance of a specific contract.

## Transfer

Transfer funds from one account to another.

## Unlock Account

Unlocks the account on the remote node.

This allows you to use the specified account to deploy, call, and interact with contracts.