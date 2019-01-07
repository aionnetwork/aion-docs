---
Title: Smart Contracts Demo dApp
---

# Smart Contracts Demo App

[block:embed]
{
  "html": "<iframe class=\"embedly-embed\" src=\"//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2FjdtQLtTlSQ4%3Ffeature%3Doembed&url=http%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DjdtQLtTlSQ4&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FjdtQLtTlSQ4%2Fhqdefault.jpg&key=f2aa6fc3595946d0afc3d76cbbd25dc3&type=text%2Fhtml&schema=youtube\" width=\"854\" height=\"480\" scrolling=\"no\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen=\"true\"></iframe>",
  "url": "https://www.youtube.com/watch?v=jdtQLtTlSQ4&feature=youtu.be",
  "title": "Aion dApp Docs",
  "favicon": "https://s.ytimg.com/yts/img/favicon-vfl8qSV2F.ico",
  "image": "https://i.ytimg.com/vi/jdtQLtTlSQ4/hqdefault.jpg"
}
[/block]

[block:api-header]
{
  "title": "Prerequisites"
}
[/block]
Before we begin, make sure you have the following:
- [Ubuntu 16.04](http://releases.ubuntu.com/16.04/) (desktop installation tutorial [here](https://tutorials.ubuntu.com/tutorial/tutorial-install-ubuntu-desktop#0))
- Aion [node](https://docs.aion.network/docs/node-set-up) set up in the [local blockchain test environment](https://docs.aion.network/docs/local-blockchain-network) 

You will also need:

- node.js version 8.9.1 [download and install](https://nodejs.org/en/download/)
- npm version 5.5.1 (typically included with node.js installation.)
- gulp version 3.9.1 [download and install](https://libraries.io/npm/gulp/3.9.1) 
[block:callout]
{
  "type": "warning",
  "body": "Currently the compiler binary is built for 64-bit Ubuntu 16.04, other versions of Ubuntu may not be fully compatible.",
  "title": "Ubuntu Versioning"
}
[/block]

[block:api-header]
{
  "title": "Introduction"
}
[/block]
We'll be walking you through a simple counter dApp built on Aion that you can interact with through terminal. There are four main steps in this tutorial, being:
1. [Setting up a Local Development Environment](https://docs.aion.network/docs/smart-contract-demo-dapp#section-1-setting-up-a-local-development-environment)
2. [Compiling the Smart Contract](https://docs.aion.network/docs/smart-contract-demo-dapp#section-2-compiling-the-smart-contract)
3. [Deploying the Smart Contract](https://docs.aion.network/docs/smart-contract-demo-dapp#section-3-deploying-the-smart-contract)
4. [Interacting with the Smart Contract](https://docs.aion.network/docs/smart-contract-demo-dapp#section-4-interacting-with-the-smart-contract) 
[block:callout]
{
  "type": "info",
  "body": "If you have any questions or encounter difficulties, feel free to connect with us on our [Gitter](https://gitter.im/aion)!",
  "title": "Reach out to us!"
}
[/block]

[block:api-header]
{
  "title": "1. Setting up a Local Development Environment"
}
[/block]
For testing and DApp development purposes, you should configure the Aion kernel to be running the testnet.json file as the genesis file, and modify the config.xml to run internal mining for a local blockchain. For the steps on how to do this, refer to the Local Blockchain Network [node set-up](https://docs.aion.network/docs/local-blockchain-network).
[block:api-header]
{
  "title": "2. Compiling the Smart Contract"
}
[/block]
Before deploying the smart contract, we’re going to need to compile our solidity code into an interface (ABI) and bytecode (bin) to allow us to deploy the contract on the blockchain.

- **Application Binary Interface (ABI)**: JavaScript Object that defines how the machine is to interact with the contract
- **Bytecode**: Compiled ‘code’

### **Configure your smart contract for compiling**

1. Download or clone the [aion_qa repository](https://github.com/aionnetwork/aion_qa)
2. Navigate into the DemoDApp directory and ```npm install``` (This command installs all the packages we'll need - you can find the dependencies in the **package.json** file)
3. Navigate to the DemoDApp/src directory and check that you have a contracts folder containing the **Counter.sol** file
4. Open **deploy_counter.js** file in the src folder and make the following changes:
  - line 10: edit directory path to where your aion/web3 is located (from home, or check the directory using the ```pwd``` command)
  - line 28: edit a0 to the index number your address is in (listed under *alloc* when you open the new config/genesis.json file) Note: Lists are indexed starting at 0
  - line 29: edit pw0 = “password associated with account address”
5. Save the changes
[block:api-header]
{
  "title": "3. Deploying the Smart Contract"
}
[/block]
To deploy the smart contract, you will need the contract ABI and bytecode as mentioned above, and an unlocked account with some `AION`.

### **Running a script to deploy the smart contract**

1. Navigate to the DemoDApp/src directory in terminal
2. Run script: 

```
node deploy_counter.js
```

This script deploys the Counter.sol contract and outputs the **contract address**. 

**Note**: Save this contract address for testing and interacting with this specific contract instance.
[block:callout]
{
  "type": "warning",
  "title": "Unlock Accounts",
  "body": "The provided repository for the demo app automatically unlocks your account. However, in practice, you will not be able to deploy your smart contract without having unlocked your account either manually or in code. Steps to manually unlock your account can be found [here](https://docs.aion.network/docs/using-aion-web3-console#section-unlock-account)."
}
[/block]

[block:api-header]
{
  "title": "4. Interacting with the Smart Contract"
}
[/block]
Once deployed, you will want to make function calls to the smart contract. We'll be interacting with the smart contract via the web3 API by calling functions and getters.

### **Enabling interaction and function calls**

1. Navigate to DemoDApp/src/ and open the **interact_counter.js** file
2. Make the same changes as in the deploy_counter.js script, modifying web3 directory, account, and password:
  - line 10: edit directory path to where your aion/web3 is located (from home, or check the directory using the ```pwd``` command)
  - line 28: edit a0 to the index number your address is in (listed under *alloc* when you open the new config/genesis.json file) 
Note: Lists are indexed starting at 0
  - line 29: edit pw0 = “password associated with account address”
3. Save the changes
4. Reopen terminal and run the script: 

```
node interact_counter.js {contractAddress}
```
5. Now you can interact and test your DApp through the console! Use the following commands: (Remember that those blocks get sealed by default around every 10 seconds, so your transactions will not show up immediately)
[block:parameters]
{
  "data": {
    "0-0": "```getCount```",
    "1-0": "```incrementCounter```",
    "2-0": "```decrementCounter```",
    "0-1": "Receive current count status",
    "1-1": "Increase counter by 1",
    "2-1": "Decrease counter by 1"
  },
  "cols": 2,
  "rows": 3
}
[/block]
**Congratulations! You have now created a simple, functional dapp that connects to your private blockchain.**
[block:api-header]
{
  "title": "Error Handling"
}
[/block]
This section will cover common issues one may face during the compilation, deployment, and interaction with their smart contract.

You can configure the **config.xml** file to show debug/error issues pertaining to API, VM, transactions, etc. if you wish to [understand more about the kernel log](https://docs.aion.network/docs/log-system-settings).

[block:parameters]
{
  "data": {
    "h-0": "Issue",
    "h-1": "Possible FIx",
    "0-0": "**No changes occur in kernel after configuration**",
    "1-0": "**Error output \"file can't be found\"** ",
    "2-0": "**Error output \"cannot find readline-sync\"**",
    "0-1": "Delete the **database** folder and restart the kernel. This allows the modified configurations to take effect.",
    "1-1": "Ensure your web3 file path is correct (use the ```pwd``` command if necessary)",
    "2-1": "Make sure to ```npm install``` in the main directory before deploying the smart contract for the first time"
  },
  "cols": 2,
  "rows": 3
}
[/block]