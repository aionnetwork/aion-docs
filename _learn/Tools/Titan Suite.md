---
title: "Titan Suite"
excerpt: "**IDE**: Build your Aion application online using this browser IDE."
---
[block:api-header]
{
  "title": "What is it?"
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/3aeb6bb-hero.PNG",
        "hero.PNG",
        2696,
        1568,
        "#f3ecd9"
      ],
      "caption": "https://titan-suite.com/"
    }
  ]
}
[/block]
[Titan Suite](https://titan-suite.com/) is a development kit which enables quick, simple, and secure dApp building experience for anyone wishing to build on Aion.

Titan Suite offers a web-based IDE (Integrated Development Environment) and a CLI (Command Line Interface) which both allows you to have a seamless experience creating smart contracts and deployment onto the network. 

Let's have a look at what you can do with Titan Suite. 
Features include: 
* Compile Solidity smart contracts
* Account Management
* Deploy contracts (Mainnet & Testnet)
* Syntax highlighting and linting
* Unit tests in Mocha (CLI Feature Only)
* Interact with any node
* Skeleton code generators (Currently available for React)

Looking for more? [Check out their Github](https://github.com/titan-suite)
[block:api-header]
{
  "title": "Using the IDE"
}
[/block]
### Setup
We have two options on how we can use the IDE.

**1. Web Based** 
* Head over to https://ide.titan-suite.com and use the IDE right in your browser!

**2. Desktop App**
You can also have IDE installed on your computer. You'll need to open this <a href="https://ide.titan-suite.com" target="_blank">link</a> in a Google Chrome browser
* Top right corner you'll see 3 vertical dots
* Click these dots - you'll see more options available 
* Choose "Install Titan IDE"

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/7059c62-download_ide.gif",
        "download_ide.gif",
        3390,
        2000,
        "#6a6965"
      ],
      "caption": "Installing IDE"
    }
  ]
}
[/block]
### Get Comfortable
If you followed any of the steps above - you should be greeted with a beautiful & sleek interface right off the get go. 

So, the IDE has 4 main sections: 
1. [File Explorer](#section--1-file-explorer-)
2. [Editor](#section--2-editor-)
3. [Console](#section--3-console-)
4. [Control Panel](#section--4-control-panel-)
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/3eb5ab5-new_blank_titan.png",
        "new_blank_titan.png",
        3055,
        1694,
        "#314436"
      ],
      "caption": "Titan IDE Components"
    }
  ]
}
[/block]
#### **1. File Explorer**
* **Add a file:** Click the "+" Button 
* **Delete a file:** Click the "Garbage" Icon 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/40cc982-add_Contract.gif",
        "add Contract.gif",
        3115,
        1735,
        "#2e2b27"
      ],
      "caption": "Adding a new contract"
    }
  ]
}
[/block]
#### **2. Editor**

This panel is where you can edit your contracts that you want to be compiled or deployed. It also has proper syntax highlighting for easier reading and editing. It's good to note that whatever file you have *open* in the **editor**, is the active file for the options in the the **control panel**.

#### **3. Console** 
You can find details of the transactions that you call (whether it be deploying or interacting with a contract) in the console found under the editor. Transaction receipts will be displayed, where you can expand to view more details of the transaction itself, and as well copy the receipt with one button.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/71cc9f0-contract_receipt.PNG",
        "contract_receipt.PNG",
        2051,
        1751,
        "#2f2b24"
      ],
      "caption": "Contract Deployment Receipt"
    }
  ]
}
[/block]
#### **4. Control Panel**
The control panel allows you to action different options based on the the file you have opened in your editor. Control Panel Options:
* [Compile Contracts](#section-compile-a-contract)
* [Account Management](#section-account-management)
* [Deploy/Interact with contracts](#section-deploy-a-contract)

### Compile a Contract
[block:callout]
{
  "type": "info",
  "body": "The FastVM is compatible with Solidity Smart Contracts written in 0.4.15 or lower."
}
[/block]

[block:callout]
{
  "type": "success",
  "body": "1. [Set the Provider](#section-set-the-provider)\n2. [Compile the Contract](#section--compile-contract-)",
  "title": "Two Steps to Compile a Contract"
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9c1fb58-compile.JPG",
        "compile.JPG",
        1126,
        1130,
        "#312d27"
      ],
      "caption": "'Compile' Tab View"
    }
  ]
}
[/block]
### Set the Provider
First, we have to connect to an Aion node. You can do this by setting the **Provider**. 
There are three available methods:  
**1. Web3 Providers**
* <a href="https://learn.aion.network/v1.0/docs/nodesmith" target="_blank">Nodesmith</a>
* <a href="https://learn.aion.network/v1.0/docs/blockdaemon" target="_blank">Blockdaemon</a>
* <a href="https://docs.aion.network/docs/kernel-overview" target="_blank">Host your own Aion Node</a>

**2. Inject the Web3 Provider**
* <a href="https://learn.aion.network/v1.0/docs/nodesmith" target="_blank">AIWA</a>

**3. In-browser Compiler**
* Check the *'Use in browser compiler'* box
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/5a0ecfa-use-browser-compile.JPG",
        "use-browser-compile.JPG",
        1115,
        733,
        "#373226"
      ],
      "caption": "'Use in browser compiler' view"
    }
  ]
}
[/block]
**Click the circle  :white-check-mark: to SET the provider (Green = :thumbsup: , Grey :thumbsdown:)**

##### **Compile Contract**
* Hit that 'Start to Compile' button
* If successful, the dropdown menu below should have your contract file name
* After you choose a contract from the menu, you'll be able to see the details of the compiled contract (bytecode and ABI). 

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/cb08503-compile_details_button.JPG",
        "compile details button.JPG",
        1032,
        353,
        "#332e24"
      ],
      "caption": "Copy the compiled contract's output by clicking on the clipboard icon to the right of `Details` Button"
    }
  ]
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9e0aaef-compile_details.JPG",
        "compile details.JPG",
        2505,
        1139,
        "#2a2926"
      ],
      "caption": "Contract Details"
    }
  ]
}
[/block]
### Account Management
In order to deploy or interact with a contract, we'll need an account with AION balance in it.
* [Using a Web3 Provider](#section--using-web3-provider-)
* [Injecting a Web3 Provider](#section--injecting-a-web3-provider-)

#### **Using Web3 Provider**
[block:callout]
{
  "type": "info",
  "body": "* [Create an Account](#section--create-an-account-)\n* [Import an Account](#section--import-an-account-)",
  "title": "If using a Web3 Provider (or Local Node)"
}
[/block]
##### **Create an Account**
* Click 'Create an Account' - (yes, to create an account)
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/57798be-create_accoutn.JPG",
        "create_accoutn.JPG",
        1118,
        936,
        "#4e4b45"
      ],
      "caption": "'Accounts' Tab View"
    }
  ]
}
[/block]
* **Note**: The account details will be copied to your clipboard. It will **not** show up on the accounts list just yet. Save this information in a **SAFE** place on your computer. You will need to use your private key for the **'Import Private Key** 

The copied 'Account Details' should look similar to the snippet below: 
[block:code]
{
  "codes": [
    {
      "code": "{\n \"privateKey\":\"********************************************************************************************************************************\",\n  \"address\":\"0xa0200dd3ad49590652b3b9903bd879c29d97099c5c032778f6f2a82d01ce864b\"\n}",
      "language": "json",
      "name": "CreateAccount.JSON"
    }
  ]
}
[/block]
#### **Import an Account ** 
[block:callout]
{
  "type": "warning",
  "body": "**You will need your private key ready for this step!**"
}
[/block]
* Click the 'Import Private Key' Button
* Enter your *private key* in the window that pops up
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/667575f-import_private_key.JPG",
        "import_private_key.JPG",
        1330,
        933,
        "#27231d"
      ],
      "caption": "Import Private Key Window"
    }
  ]
}
[/block]
* Click 'Confirm'
**You have now successfully imported your account into Titan!**

#### **Injecting a Web3 Provider**
If you're using an in-browser wallet application, such as [AIWA](https://learn.aion.network/v1.0/docs/aiwa), your active account should show up in the accounts list automatically.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/4904e7d-aiwa_account.JPG",
        "aiwa_account.JPG",
        1083,
        661,
        "#343028"
      ],
      "caption": "Account injected by AIWA"
    }
  ]
}
[/block]
* Click 'Unlock', then enter your password you set for your AIWA wallet app
* You can now use this account in the 'Run' Tab

[block:callout]
{
  "type": "info",
  "body": "Hop over to <a href=\"https://faucets.blockxlabs.com/aion\" target=\"_blank\">the faucet </a> and get 10 AION coins (For Mastery Testnet)",
  "title": "Need some test AION balance?"
}
[/block]
### Deploy a Contract
Alright, time to deploy a contract onto the network.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/263d3d5-deploy_settings.JPG",
        "deploy settings.JPG",
        1186,
        1246,
        "#2d2b27"
      ],
      "caption": "'Run' Tab View"
    }
  ]
}
[/block]
*Let's set the stage*
1. **Provider Address**: [Set your provider](#section-set-the-provider)
2. **Account:** Select your account from the dropdown menu. Click the refresh button to see active accounts. *If no accounts are show, you'll have to [create/import/unlock an account](#section-account-management) in the 'Accounts' tab.*
3. **Gas Limit**, **Gas Price**: Set the desired Gas Limit, Gas Price, Value.

#### Deployment
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/8ea90ea-deployment_stage.JPG",
        "deployment stage.JPG",
        1178,
        647,
        "#353026"
      ]
    }
  ]
}
[/block]
* Select your [compiled contract](#section-compile-a-contract) from the dropdown list, set the parameters (if there are parameters), then click 'Deploy'

Once deployed, you should see a receipt in the console under the text editor. Remember you can expand that to find more details such as the **contract address**, and the **transaction hash**.  You can use this information to look at <a href="https://mastery.aion.network/#/dashboard" target="_blank">the explorer</a> to see it on the blockchain. 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/764f032-deploy_contract.gif",
        "deploy contract.gif",
        2940,
        1805,
        "#292925"
      ],
      "caption": "Deploying a contract (using a Web3 Provider)"
    }
  ]
}
[/block]
### Interact with a Contract
Two ways to load your contract:
1. **Deployed via Titan:** You should be able to interact with it immediately in the Run tab - scrolling down past the Deploy button. 
2. **Load Contract from Address:** Make sure your [contract is compiled](#section-compile-a-contract), enter the contract address in the 'Load contract from address' input, then click the 'At Address'. 
[block:callout]
{
  "type": "info",
  "body": "You can recompile the contract by clicking on the 'refresh' button next to the contract selection dropdown. *Make sure to have the file open in the editor tab that you would like have compiled*"
}
[/block]
*Let's Interact!*
* Click the Contract to expand it and reveal all public functions within it
* Each public function is represented as a button that you can click and pass parameters to
* Each function would produce a transaction that can be viewed in the Console section (beneath the Editor)
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/42c0ce0-interact_contract.gif",
        "interact contract.gif",
        2940,
        1805,
        "#292825"
      ],
      "caption": "Interacting with a contract"
    }
  ]
}
[/block]

[block:callout]
{
  "type": "info",
  "body": "Written by <a href=\"https://twitter.com/KimCodeashian\" target=\"_blank\">Kimcodeashian</a> :fire:",
  "title": ""
}
[/block]