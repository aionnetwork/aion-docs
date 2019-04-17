# Get Receipts

Get the transaction receipt for a particular transaction. This function is only available through a remote node.

## Last Receipt

Keep pulling the transaction receipt for the most recent deployment / call every 10 seconds until the transaction is sealed in a block.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Get Receipts (Recent)**.

## Specific Receipt

Return the transaction receipt for a specific transaction by providing transaction hash.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Get Receipts (Recent)**. Then enter the hash of the transaction you wish to see. 

If you do not enter a valid hash, the plugin will default back to requesting the receipt for the most recent deploynent / call.