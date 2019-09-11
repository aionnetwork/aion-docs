---
title: Aion Dashboard
description: The Aion Dashboard is a tool you can use to view the current state of the network. It's useful for viewing a transaction status, checking account balances, and gathering all kinds of information about the network.
table_of_contents: true
---

## Landing Page

The [Landing Page](https://mainnet.aion.network/#/dashboard) is the home of the Aion Dashboard. It provides the current view of recent blocks and transactions on the network, as well as some current statistics. You can reach this page at any time by clicking the Aion logo on the top left.

### Heads-up Display

The _Heads-up Display_ shows some of the Network's current statistics. It is split into two sections: Network and Transaction.

![Dashboard HUD](/developers/tools/dashboard/images/dashboard-hud.png)

The **Network** section contains:

- Current Average Block Time
- Network Hash Rate
- Average Block Difficulty
- Consumed NRG per Block

The **Transaction** section contains:

- Transactions per second
- 24-hour peak of transactions per block
- Number of transactions within the last 24 hours

### Recent Blocks

The **Recent Blocks** section displays a list containing the four of the most recent blocks proposed in addition to the block that is currently being proposed.

![Recent Blocks](/developers/tools/dashboard/images/recent-blocks.png)

Each list object contains the:

- Block number
- Proposer's address: direct to the respective [**Accounts Details Page**](#Accounts) when clicked
- Number of transactions
- Time taken to propose this block

You can click on the blue arrow to go to the respective [**Block Details Page**](#Blocks) for the block. Also, click on **View All** to see a longer list.

### Recent Transactions

The **Recent Transactions** section displays a list containing the ten most recent transactions on the network.

![Recent Transactions](/developers/tools/dashboard/images/recent-transactions.png)

Each list object includes:

- Transaction age: how long ago the transaction was proposed
- Transaction Value: the amount of Aion sent within the transaction - direct to the respective [**Transaction Details Page**](#Transactions) when clicked
- From Address: direct to the respective [**Accounts Details Page**](#Accounts) when clicked
- To Address: direct to the respective [**Accounts Details Page**](#Accounts) when clicked

You can click on **View All** to see a longer list.

## Navigation Bar

The **Navigation Bar** sits at the top of the window at all times. It contains some useful tools for navigating the Aion Dashboard.

### Explorer

The **Explorer** function is a dropdown menu that allows you to browse lists of each object type on the network. After selecting the **Account** type, for example, you are provided with a list of accounts in which you can sort in various ways.

![Explorer](/developers/tools/dashboard/images/explorer.gif)

### Analytics

The **Analytics** function is a dropdown menu that features various charts relevant to the network such as **Hash Power** over time and **Transactions per hour**

![Analytics](/developers/tools/dashboard/images/analytics.gif)

### Switch Network

The **Mainnet** isn't the only network featured on the dashboard. By clicking on the **Mainnet** dropdown menu you can switch between the dashboards for other networks, such as the **Mastery** network, Aion's testnet.

![Switch Network](/developers/tools/dashboard/images/switch-network.gif)

For those with sensitive eyes, you can find the **dark mode** toggle here as well under the **explorer settings**.

### Search bar

The **Search Bar** allows you to easily find any object on the network whether it be an **Account**, **Transaction**, **Block**, etc.

![Input Contract Address in Search](/developers/tools/dashboard/images/input-contract-address.gif)

A detailed guide on the search function can be found [here](tools-dashboard-usingSearchFunction.md).

## Details Pages

Details pages contain information on the objects on the network. You can find these pages through the [**Search Function**](tools-dashboard-usingSearchFunction.md) or by clicking on any of the hex addresses on the site.

### Accounts

**Accounts** on an Aion network are the things that can sign and send any transaction to the network using their balance of Aion to pay the NRG cost. This page will be helpful to determine an account's balance or see their past transactions.

The upper part of the **Account Details** page contains the following:

- Account Address
- Token currently viewing
- Balance of token currently viewing
- Nonce

![Account Details Upper](/developers/tools/dashboard/images/account-details-upper.png)

Here, you can click the **Aion (Default)** dropdown and select the ATS token that you would like to see info on.

![Change Token View](/developers/tools/dashboard/images/change-token-view.gif)

The lower part of the **Account Details** page contains lists of the account's transactions, mind blocks, and token transfers.

![Account Details Lower](/developers/tools/dashboard/images/account-details-lower.gif)

### Blocks

**Blocks** are each a ledger of transactions that take place on an Aion network. This page will be helpful when trying to determine a block's difficulty, included transactions, block reward, block size and more.

The **Block Details** page contains the following:

- Block Hash
- Parent Hash
- Miner
- Receipt Root
- Transaction Root
- State Root
- Block Difficulty
- Total Difficulty
- Nonce
- Included Transactions

![Block Details](/developers/tools/dashboard/images/block-details.png)

### Contracts

**Contracts** are protocols that any account can deploy onto an Aion network. This page will be helpful when deploying a contract and what to monitor its properties.

The upper part of the **Contract Details** page contains the following:

- Contract Address
- Block Number
- Creator Account
- AION Balance
- Nonce
- Contract Type

![Contract Details Upper](/developers/tools/dashboard/images/contract-details-upper.png)

The lower part of the **Contract Details** page contains lists of the contract's transactions and events.

![Contract Details Lower](/developers/tools/dashboard/images/contract-details-lower.png)

### Tokens

**Tokens** are a special kind of contract that act as currency that can be transferred between accounts. This page can help determine a token's properties, its holders, and its transfers.

The upper part of the **Token Details** page contains the following:

- Date Created
- Contract Address
- Transaction Hash
- Symbol
- Granularity
- Total Supply
- Liquid Supply

![Token Details Upper](/developers/tools/dashboard/images/token-details-upper.png)

The lower part of the **Token Details** page contains lists of the Token's transfers and holders.

### Transactions

**Transactions** represent every change on an Aion network. This includes the transfer of tokens, deployment of contracts, or contract interaction. This page will be helpful when making a transaction and monitoring its status.

The upper part of the **Transaction Details** page contains the following:

- Coin
- Transaction Hash
- Block Number
- Value
- NRG Price
- NRG Consumed
- Status
- Nonce
- From Address
- To Address
- Input Data

![Transaction Details Upper](/developers/tools/dashboard/images/transaction-details.png)
