---
title: Get Receipts
description: Just like regular real-world transactions, when a transaction is processed on a blockchain network a receipt is generated. This receipt lists pieces of information that can be helpful in debugging contracts, as well as vital information such as a contract's block hash and contract address. The Aion4j plugin automatically receives the receipt of each transaction, so you shouldn't need to use this feature unless you are looking for the receipt of a specific historical transaction.
weight: 1000
---

Get the transaction receipt for a particular transaction. This function is only available through a remote node.

### Last Receipt

Keep pulling the transaction receipt for the most recent deployment / call every 10 seconds until the transaction is sealed in a block.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Get Receipt (Recent)**.

### Specific Receipt

Return the transaction receipt for a specific transaction by providing transaction hash.

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Get Receipt**. Then enter the hash of the transaction you wish to see.

If you do not enter a valid hash, the plugin will default back to requesting the receipt for the most recent deploynent / call.
