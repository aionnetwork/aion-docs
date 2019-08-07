---
title: Aion Dashboard
description: The Aion Dashboard is a tool you can use to view the current state of the blockchain network. It's useful for viewing a transaction status, checking account balances, and gathering all kinds of information on the network.
table_of_contents: true
draft: true
---

<!--come up with a better word for item -->

## Dashboard Landing Page

The [**Landing Page**](https://mainnet.aion.network/#/dashboard) is the home of the Aion Dashboard. It provides the current view of recent blocks and transactions on the network, as well as some current statistics. You can reach this page at any time via the Aion logo on the top left.

<!--to be renamed? -->
### Heads-up Display

The **Heads-up Display** shows some of the Network's current statistics. It is split into two sections: Network and Transaction.

![Dashboard HUD](/developers/tools/dashboard/images/dashboard-hud.png)

The **Network** section contains:

- Current Average Block Time <!--find out how calculated? -->
- Network Hash Rate
- Average Block Difficulty
- Consumed NRG per Block

The **Transaction** section contains:

- Transactions per second
- 24 hour peak of transactions per block
- Number of transactions within the last 24 hours

### Recent Blocks

The **Recent Blocks** section displays a list containing the four of the most recent blocks proposed in addition to the block that is currently being proposed.

![Recent Blocks](/developers/tools/dashboard/images/recent-blocks.png)

Each list item contains the:

- **Block number**
- **Proposer's address**: direct to the respective [**Accounts Details Page**](#Accounts) upon click
- **Number of transactions**
- **Time taken to propose**

You can click on the blue arrow to go to the respective [**Block Details Page**](#Blocks) for the block. Also, click on **View All** to see a longer list.

### Recent Transactions

The **Recent Transactions** section displays a list containing the ten most recent transactions on the network.

![Recent Transactions](/developers/tools/dashboard/images/recent-transactions.png)

Each list item includes:

- **Transaction age**: how long ago the transaction was proposed
- **Transaction Value**: amount of Aion sent within the transaction - direct to the respective [**Transaction Details Page**](#Transactions) upon click
- **From Address**: direct to the respective [**Accounts Details Page**](#Accounts) upon click
- **To Address**: direct to the respective [**Accounts Details Page**](#Accounts) upon click

You can click on **View All** to see a longer list.

## Navigation Bar

The **Navigation Bar** sits at the top of the window at all times. It contains some useful tools for navigating the Aion Dashboard.

### Explorer
<!-- explain better... probably with better terminology-->
The **Explorer** function is a dropdown menu that allows you to browse lists of each item type on the network. After selecting an the **Account** type, for example, you are provided with a list of accounts in which you can sort in various ways.

![Explorer](/developers/tools/dashboard/images/explorer.gif)

### Analytics

The **Analytics** function is a dropdown menu that features various charts relevant to the network such as **Hash Power** over time and **Transactions per hour**

![Analytics](/developers/tools/dashboard/images/analytics.gif)

### Switch Network

The **Mainnet** isn't the only network featured on the dashboard. By clicking on the **Mainnet** dropdown menu you are able to switch between the dashboards for other networks, such as the **Mastery** network, Aion's testnet.

![Switch Network](/developers/tools/dashboard/images/switch-network.gif)

For those with sensitive eyes, you can find the **dark mode** toggle here as well under the **explorer settings**.

### Search bar

The **Search Bar** allows you to easily find any item on the network wether it be an **Account**, **Transaction**, **Block**, etc.

![Input Contract Address in Search](/developers/tools/dashboard/images/input-contract-address.gif)

A detailed guide on the search function can be found [here](/developers/tools/dashboard/usingSearchFunction.md).

## Details Pages

Details pages contain information on the items on the network. You can find these pages through the [**Search Function**](/developers/tools/dashboard/usingSearchFunction.md) or by clicking on any of the address hex addresses on the site.

<!-- This section is currently very barren... might remove... might extend and move to another page... would also be much better with some sort of glossary as explaining each of these terms here would be very messy-->

### Accounts

The upper part of the **Account Details** page contains the following:

- Account Address
- Token currently viewing
- Balance of token currently viewing
- Nonce

![Account Details Upper](/developers/tools/dashboard/images/account-details-upper.png)

Here, you can click the **Aion (Default)** dropdown and select the ATS token you would like to see info on.

![Change Token View](/developers/tools/dashboard/images/change-token-view.gif)

The lower part of the **Account Details** page contains lists of the account's transactions, mind blocks, and token transfers.

![Account Details Lower](/developers/tools/dashboard/images/account-details-lower.gif)

### Blocks

The **Block Details** page contains the following:

<!--seems like a bad idea to have this long list here. thought id add it for the benefit of the docs-site search function if it works like that 😐 will probably end up chopping it down a bit-->
- Time Proposed
- Block Number
- Transaction Count
- Block Hash
- Parent Hash
- Miner
- Receipt Root
- Transaction Root
- State Root
- Difficulty
- Total Difficulty
- Nonce
- Block Reward
- NRG Reward
- NRG Consumed
- NRG Limit
- Block Size
- Bloom Filter
- Equihash Solution

![Block Details](/developers/tools/dashboard/images/block-details.png)

### Contracts

The upper part of the **Contract Details** page contains the following:

- Contract Address
- Block Number
- Creator Account
- AION Balance
- Nonce
- Contract Type

![Contract Details Upper](/developers/tools/dashboard/images/contract-details-upper.png)

The lower part of the **Contract Details** page contains lists of the contract's transactions, and events.

![Contract Details Lower](/developers/tools/dashboard/images/contract-details-lower.png)

### Tokens

The upper part of the **Token Details** page contains the following:

- Date Created
- Contract Address
- Transaction Hash
- Symbol
- Granularity
- Total Supply
- Liquid Supply

![Token Details Upper](/developers/tools/dashboard/images/token-details-upper.png)

The lower part of the **Token Details** page contains lists of the Token's transfers, and holders.

![Token Details Lower](/developers/tools/dashboard/images/token-details-lower.png)

### Transactions

The upper part of the **Transaction Details** page contains the following:

<!--seems like a bad idea to have this long list here. thought id add it for the benefit of the docs-site search function if it works like that 😐 will probably end up chopping it down a bit-->
- Time Sealed
- Coin
- Transaction Hash
- Block Number
- Value
- NRG Price
- NRG Consumed
- Status
- Index
- Nonce
- From Address
- To Address
- Transaction Logs
- Input Data

The lower part of the **Transaction Details** page contains lists of the Transaction's transfers.

![Transaction Details Upper](/developers/tools/dashboard/images/transaction-details.png)