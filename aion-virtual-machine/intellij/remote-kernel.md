# Remote Kernel

Manage your contracts and accounts on a remote node from within IntelliJ.

Before you can perform any remote actions, you need to have completed the [Remote Kernel configuration options](/aion-virtual-machine/intellij/configure#remote-kernel).

## Deploy

Deploy your contract to the Aion network.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Deploy**. You will be prompted to enter a [node URL](/aion-virtual-machine/intellij/configure#remote-kernel) and [deployer address](/aion-virtual-machine/intellij/configure#remote-kernel) if you haven't filled them in already.

This command will compile your contract before attempting to deploy, unless you have specified that you do not want this to happen in the [configuration options](/aion-virtual-machine/intellij/configure#remote-kernel).

## Get Receipts

Keep pulling the transaction receipt for the most recent deployment / call every 10 seconds until the transaction is sealed in a block.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Get Receipts (Recent)**.

### Specify Receipt

Return the transaction receipt for a specific transaction by providing transaction hash.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Get Receipts (Recent)**. Then enter the hash of the transaction you wish to see. 

If you do not enter a valid hash, the plugin will default back to requesting the receipt for the most recent deploynent / call.

## Call

Call a contract.

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Remote** > **Call**.

If the method you selected takes arguments, you must provide them in the **Method parameters** window that is shown.

By default the **Call** command will call the last deployed contract. However if you want to call a specific contract address, uncheck the **Use Last Deployed Contract Address** checkbox, and enter the address you want to use.

## Contract Transaction

Call a contract.

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Remote** > **Contract Transactin**.

This is similiar to the **Call** command with some subtle differences. Call internally invokes `_call` which gets executed in the node and no NRG is required. **Contract Transaction** invokes `_sendTransaction` which sends a transaction to the network and needs NRG to execute.

## Get Balance

Return the balance of the account listed in the configuration window.

Run this command by right clicking anywhere within a contract and selecting **Aion Virtual Machine** > **Remote** > **Get Balance**. 

This command requires an address to be in the **Address** field of the **Confirguration** > **Remote Kernel** window.

### Specify Account

Return the balance of a specific contract.

Run this command by right clicking anywhere within a contract and selecting **Aion Virtual Machine** > **Remote** > **Get Balance**.

## Transfer

Transfer funds from one account to another.

Run this command by right clicking anywhere within a contract and selecting **Aion Virtual Machine** > **Remote** > **Transfer**.

The **Enter transfer information** window asks you to provide a **From Account** address and **Password**, or a **Private Key**. The **To Account** field is mandatory and takes a valid Aion address. The **Amount (in AMP)** field is mandatory and take the amount you want to send. This amount should be input as `AMP` (`1 AION` = `1000000000 AMP`). **NRG** and **NRG Price** and prefilled and can be left with their default values.

## Unlock Account

Unlocks the account on the remote node.

Run this command by right clicking anywhere within a contract and selecting **Aion Virtual Machine** > **Remote** > **Unlock Account**.

This allows you to use the specified account to deploy, call, and interact with contracts. This is not advised on public / shared nodes. Some hosting services disable the unlocking of account on their shared nodes.
