---
title: "🎓 Interact with Aion Web3 [Solidity Contract]"
excerpt: "This guide is only compatible with Solidity smart contracts."
---
[block:callout]
{
  "type": "info",
  "title": "Guide Level: Beginner",
  "body": "**You are a developer who**\n* Is interested in learning blockchain\n* Is experienced and looking to build on Aion \n* A cool and curious cat who wants to deploy their first contract via Web3"
}
[/block]

[block:api-header]
{
  "title": "Overview"
}
[/block]
Want to learn how to use Aion Web3 for all your blockchain and smart contract needs? You've come to the right place :raised-hands: In this guide - we'll be going on a step by step journey on how to set up your environment, understand what it takes to deploy a smart contract, and how to interact with it. 

You'll walk away knowing how to connect to Aion's Mastery Testnet, building and sending transactions, and the confidence to start building great things on the Aion Network. 
[block:api-header]
{
  "title": "1. Setup"
}
[/block]
Alright rockstars, we'll need a few things to set the stage before we can deploy that smart contract!
[block:callout]
{
  "type": "warning",
  "title": "Requirements",
  "body": "* <a href=\"https://nodejs.org/en/\" target=\"_blank\">Node.js</a> (recommended version: 10.x)\n* <a href=\"https://www.npmjs.com/get-npm\" target=\"_blank\">NPM</a> (recommended version: 6.x)\n* A computer with an internet connection (Dial up works too)"
}
[/block]
## 1.1 Connect to the Aion Network 
First we'll need to have access to an Aion Node. In this guide, we'll be using <a href="https://nodesmith.io/" target="_blank">**Nodesmith**</a> to connect to the Aion Network.
[block:callout]
{
  "type": "info",
  "body": "* Host and manage the infrastructure of a full Aion node yourself\n\n* Wait over a day for the node to sync before you can begin interacting with the network",
  "title": "Nodesmith hosts Aion nodes so that you don't have to:"
}
[/block]
**Let's get started:**
1. <a href="https://dashboard.nodesmith.io/#/signUp" target="_blank">Sign Up</a> and verify your e-mail
2. <a href="https://dashboard.nodesmith.io" target="_blank">Login</a> to the developer portal with your account
3. Once on Dashboard, create & nickname your new project. Bam! You've got your API Key. We'll be using this key to send requests to our Nodesmith endpoint. 
4. On "Select Network", and switch to the 'Testnet (Mastery)' option 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/8f25f22-nodesmith-dashboard.jpg",
        "nodesmith-dashboard.jpg",
        2876,
        1251,
        "#e4f2ee"
      ],
      "caption": "Nodesmith Dashboard"
    }
  ]
}
[/block]

[block:callout]
{
  "type": "success",
  "title": "Other ways to connect to the Aion Network",
  "body": "* [Blockdaemon](https://blockdaemon.com/) (Node Hosting Service - *60 day free trial*)\n* [Download & Run the Aion Kernel](https://github.com/aionnetwork/aion/releases) (Run an Aion node on your computer - *Advanced Users Only*)"
}
[/block]
## 1.2 Aion Web3 Setup

Aion Web3 is an application programming interface that sits on top of the Aion Network. It allows you to interact with a local or remote Aion Node using an HTTP or IPC connection
[block:callout]
{
  "type": "success",
  "title": "We'll be using Web3 to",
  "body": "* Create an Aion Account\n* Compile, Deploy, and Interact with our smart contract"
}
[/block]
Let's start by creating a directory, moving inside it, then installing **Aion Web3** in there. 

Run these commands in your terminal or command prompt:
[block:code]
{
  "codes": [
    {
      "code": "# Create and move into our project folder\nmkdir aion_smart_contract_demo\ncd aion_smart_contract_demo\n\n# Download & Install Aion Web3\nnpm install https://github.com/aionnetwork/aion_web3",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
Easy peazy! Now that **web3** is installed, let's go ahead and open the **web3 console** and connect to the Aion network by typing the command below.

:loudspeaker:  * You'll need your Nodesmith endpoint for this step*
[block:code]
{
  "codes": [
    {
      "code": "node console.js <https://nodesmith-endpoint-url-here>",
      "language": "html",
      "name": "Terminal"
    }
  ]
}
[/block]
You should see something like this. 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9738cc5-console3.jpg",
        "console3.jpg",
        2338,
        1299,
        "#3a3b37"
      ],
      "caption": "Successfully opened the console and connected to our Nodesmith endpoint",
      "sizing": "smart"
    }
  ]
}
[/block]
## 1.3 Create/Import an Account
Great! Now we'll be using **Web3** to generate our very own Aion address. 
[block:callout]
{
  "type": "warning",
  "title": "Keep your private key safe!",
  "body": "* It acts as your digital signature\n* Helps confirm that you, the holder of the account, approve transactions on the network\n* The network is designed to approve any transactions were public & private keys match"
}
[/block]

[block:callout]
{
  "type": "info",
  "body": "Check out the easy to use in-browser wallet, <a href=\"https://learn.aion.network/v1.0/docs/aiwa\" target=\"_blank\">AIWA</a>. Once an account has been created, you can export the private key to deploy a contract using web3!",
  "title": "Need a wallet interface?"
}
[/block]
We need an Aion address so we can receive <<glossary:AION Coins>> :money-with-wings: in it. An account will allow you to sign transactions, deploy contracts and interact with DApps!

Now back to the Web3 console, run these commands to create an account. 
[block:code]
{
  "codes": [
    {
      "code": "// Create an account locally\nlet account = web3.eth.accounts.create(); \n\n// OR you can Import an account\nlet account = web3.eth.accounts.privateKeyToAccount('PasteYourPrivateKeyHere')\n\n// Output details of our newly-created account\naccount;",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
**Notes**

* <a href="https://docs.aion.network/docs/web3-eth-accounts#section-create" target="_blank">`web3.eth.accounts.create()`</a> generates an account and the private key

* `account`: will display the details of the newly-created account.  The output will resemble the structure shown below.  Take note of the "address" field (lines 7-8) – this is your public Aion address.  The "privateKey" field contains your **private key**. 
[block:code]
{
  "codes": [
    {
      "code": "{ _privateKey:\n   <Buffer 61 1c 22 c0 c4 af 62 f7 2d a9 fe 1c 89 ba 81 19 1e 17 ff 00 8a d7 7c 0b b2 6e 52 f0 0b 96 2f d6 f7 ab 59 b5 bc aa 7c a6 d2 af 5a 72 cc 6a 88 6b e7 47 ... >,\n  privateKey:\n '0xprivatekey123privatekey123privatekey123privatekey123privatekey123privatekey123privatekey123privatekey123privatekey123privatekey1',\n  publicKey:\n   <Buffer f7 ab 59 b5 bc aa 7c a6 d2 af 5a 72 cc 6a 88 6b e7 47 4a 42 6b fc 69 18 a1 33 fd 21 c4 1c db 1f>,\n  address:\n   '0xa01bc25b03d85eef6687ef95ccf614f41dda861d670612cae2c8ba5811a1bf46',\n  signTransaction: [Function: signTransaction],\n  sign: [Function: sign],\n  encrypt: [Function: encrypt] }",
      "language": "json",
      "name": "Output"
    }
  ]
}
[/block]
## 1.4 Get AION in your Account
Alright let's get some AION in that account! :money-with-wings:
[block:callout]
{
  "type": "info",
  "title": "We need AION to:",
  "body": "* Deploy a contract\n* Interact with the contract\n* Send transactions"
}
[/block]
1. <a href="https://faucets.blockxlabs.com/aion" target="_blank">Head over to the Faucet here</a> 
2. **Blockchain Network:** Select Mastery
3. **Wallet:** Paste your Aion Address
4. Agree to *Terms of Service* and *Privacy Policy*
5. Verify you're not a robot (so human beings, dogs, cats are cool)
6. Press to pour! (Pretty self-explanatory)
7. :fireworks: 10 tokens wired to your given address, along with a transaction receipt that you can track search up on the [Testnet Dashboard](https://mastery.aion.network/#/dashboard)
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/1cea12e-Hero2.PNG",
        "Hero2.PNG",
        3148,
        1981,
        "#5a5a7b"
      ],
      "caption": "<a href=\"https://faucets.blockxlabs.com/aion\" target=\"_blank\">https://faucets.blockxlabs.com/</a>"
    }
  ]
}
[/block]
**Your account should now have 1 AION.**

You can check the balance of your account by:
* <a href="https://mastery.aion.network/#/dashboard" target="_blank">Aion Dashboard</a> (Paste your account address into the search bar)
* Through **web3** with the following command

[block:code]
{
  "codes": [
    {
      "code": "eth.getBalance(account.address).then(console.log);",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
The output is given in <a href="https://github.com/aionnetwork/aion/wiki/Aion-Terminology" target="_blank"><<glossary:nAmps>>.</a>
[block:code]
{
  "codes": [
    {
      "code": "1000000000000000000\n",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
[/block]
**Notes**
* Alternatively, you can use `web3.utils.fromNAmp` to to convert NAmp to AION
[block:api-header]
{
  "title": "2. Smart Contract"
}
[/block]
Let's get the show on the road! 
[block:callout]
{
  "type": "success",
  "title": "Smart Contracts 101",
  "body": "1. [Compile](#section-compile)\n2. [Deploy](#section-deploy)\n3. [Interact](#section-interact)"
}
[/block]
We write smart contracts in a programming language called <<glossary:Solidity>>. If you haven't heard of it before, that's okay! You can read up all about it <a href="https://solidity.readthedocs.io/en/v0.4.15/" target="_blank">here</a>.

Below you'll find a simple smart contract which we've named as Counter.sol. It acts as a counter that can be either increased or decreased. Comments are written in-line so you can get a better understanding of what's going on. 

**Create the Smart Contract File**
* Navigate in the project folder we made earlier (the *aion_smart_contract_demo* directory)
* Create a new file and name it *'Counter.sol'* 
* Paste the following code in and save :floppy-disk: 
[block:code]
{
  "codes": [
    {
      "code": "/*\n  sol Counter\n  Simple Counter Contract - Increase / Decrease by 1\n*/\n\npragma solidity ^0.4.10;\n\ncontract Counter {\n\n  /* State Variables */\n  // State variables are values which are permanently stored in contract storage.\n  int private count; // = 0\n  address owner;\n\n  /* Events */\n  event CounterIncreased(bool counter);\n  event CounterDecreased(bool counter);\n\n  /* Functions */\n  // Functions are the executable units of code within a contract.\n  function Counter() public {\n    owner = msg.sender;\n  }\n\n  // Increase counter by 1\n  function incrementCounter() public {\n    count += 1;\n    CounterIncreased(true);\n  }\n  \n  // Decrease counter by 1\n  function decrementCounter() public {\n    count -= 1;\n    CounterDecreased(true);\n  }\n  \n  // Getter function that returns the current counter status\n  function getCount() public constant returns (int) {\n    return count;\n  }\n}",
      "language": "javascript",
      "name": "Counter.sol"
    }
  ]
}
[/block]
## 2.1 Compile
Before we deploy the smart contract, we’re going to need to compile our solidity code into an interface (**ABI**) and bytecode (**bin**).
[block:callout]
{
  "type": "info",
  "title": "Compile Smart Contracts for",
  "body": "* **Application Binary Interface (ABI)**: JavaScript Object that defines how the machine is to interact with the contract\n \n* **Bytecode**: Compiled ‘code’"
}
[/block]
Let's load the Solidity program into Web3 and compile our contract now :thumbsup: 
Enter each line into your Web3 console:
[block:code]
{
  "codes": [
    {
      "code": "// Read the solidity program from file\nlet counterSol = fs.readFileSync(\"../Counter.sol\", \"utf8\"); \n\n// Compile the contract\nweb3.eth.compileSolidity(counterSol).then((res) => compiled = res); \n\n// Display the compilation result\ncompiled; ",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
**Notes**
* `fs.readFileSync("./Counter.sol", "utf8")`: Takes our Counter.sol contract, reads it then stores it in a variable we named `counterSol`

* `web3.eth.compileSolidity(counterSol)`: Lets web3 know that we want to compile this contract

* `compiled`: Displays the output of the Solidity compiler (shown below).  It contains the ABI Definition and VM bytecode, which we *need* to deploy to the network and interact with.
[block:code]
{
  "codes": [
    {
      "code": "{ Counter:\n   { code:\n      '0x605060405234156100105760006000fd5b5b3360016000508282909180600101839055555050505b61002c565b6101858061003b6000396000f30060506040526000356c01000000000000000000000000900463ffffffff1680635b34b96614610049578063a87d942c1461005f578063f5c5ad831461008957610043565b60006000fd5b34156100555760006000fd5b61005d61009f565b005b341561006b5760006000fd5b6100736100f3565b6040518082815260100191505060405180910390f35b34156100955760006000fd5b61009d610105565b005b6001600060008282825054019250508190909055507f6816b015b746c8c8f573c271468a9bb4b1f0cb04ff12291673f7d2320a4901f76001604051808215151515815260100191505060405180910390a15b565b60006000600050549050610102565b90565b6001600060008282825054039250508190909055507f09a2ae7b00cae5ecb77463403c1d5d6c03cf6db222a78e22cbcafbe0a1ac9eec6001604051808215151515815260100191505060405180910390a15b5600a165627a7a72305820f68f8fcfd955a33bf1d1a62e3955a0c63f5618d3e8959171be1e7591bc53d4bd0029',\n     info:\n      { abiDefinition: [Array],\n        languageVersion: '0',\n        language: 'Solidity',\n        compilerVersion: '0.4.15+commit.ecf81ee5.Linux.g++',\n        source:\n         '/*\\n  sol Counter\\n  Simple Counter Contract - Increase / Decrease by 1\\n*/\\n\\npragma solidity ^0.4.10;\\n\\ncontract Counter {\\n\\n  /* State Variables */\\n  // State variables are values which are permanently stored in contract storage.\\n  int private count; // = 0\\n  address owner;\\n\\n  /* Events */\\n  event CounterIncreased(bool counter);\\n  event CounterDecreased(bool counter);\\n\\n  /* Functions */\\n  // Functions are the executable units of code within a contract.\\n  function Counter() public {\\n    owner = msg.sender;\\n  }\\n\\n  // Increase counter by 1\\n  function incrementCounter() public {\\n    count += 1;\\n    CounterIncreased(true);\\n  }\\n  \\n  // Decrease counter by 1\\n  function decrementCounter() public {\\n    count -= 1;\\n    CounterDecreased(true);\\n  }\\n  \\n  // Getter function that returns the current counter status\\n  function getCount() public constant returns (int) {\\n    return count;\\n  }\\n}\\n' \n      } \n   } \n}\n\n",
      "language": "json",
      "name": "Output"
    }
  ]
}
[/block]
## 2.2 Deploy
Awesome! Now that we've compiled our contract, it's time for **deployment**. By deploying a smart contract, we're sending a **transaction** to the network.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/79574ba-houston.jpg",
        "houston.jpg",
        490,
        603,
        "#7a7c75"
      ],
      "caption": "Your smart contract being deployed to Aion Network."
    }
  ]
}
[/block]

[block:callout]
{
  "type": "success",
  "title": "We'll be using Web3 to:",
  "body": "* Build this transaction\n* Sign it on the client-side\n* Deploy the contract (by sending the signed transaction)"
}
[/block]
### Building the Transaction
Before we even deploy the contract, we have to define the deployment transaction, and then sign it using our private key. 
[block:code]
{
  "codes": [
    {
      "code": "let contractInst = new eth.Contract(compiled.Counter.info.abiDefinition);\n\nlet deploy = contractInst.deploy( {data:compiled.Counter.code, arguments: []} ).encodeABI();\n\nlet deployTx = { gas: 4000000, gasPrice: 10000000000, data: deploy, from: account.address };\n\neth.accounts.signTransaction( deployTx, account.privateKey ).then( (res) => signedTx = res );\n\nsignedTx;",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
**Notes**

* <a href="https://docs.aion.network/docs/web3-eth-contract#section-new" target="_blank">`new eth.Contract()`</a>: Instantiates a new contract using the ABI definition we received from the compiler

* <a href="https://docs.aion.network/docs/web3-eth-contract#section-deploy" target="_blank">`contractInst.deploy().encodeABI()`</a>: Encodes the ABI of the contract's constructor; in this case, the constructor takes zero arguments, hence the arguments is a blank list

* `deployTx`: Creates a <a href="https://docs.aion.network/docs/web3-eth#section-sendTransaction" target="_blank">transaction object</a> with the encoded ABI

* <a href="https://docs.aion.network/docs/web3-eth#section-signTransaction" target="_blank">`eth.accounts.signTransaction()`</a>: Signs the transaction using your account's private key

* `signedTx`: Displays the signed transaction – the output's structure is shown in the snippet below.
[block:code]
{
  "codes": [
    {
      "code": "{ \n  messageHash:\n   '0xa14c3b0606610d6f27f3313f37d1a49eb743efe86783665af7024d0175ae94d7',\n  signature:\n\n '0xf7ab59b5bcaa7ca6d2af5a72cc6a886be7474a426bfc6918a133fd21c41cdb1f63e13a4867162094dff943ce52b3bd550b59fca8480b084a5e8f4fd4c6d6efcdf568db315b0e7f977b175d39a96b73ea7df136d1ffcb43b4143c0ece8fc47407',\n  rawTransaction:\n   '0xf9023e008080b901c0605060405234156100105760006000fd5b5b3360016000508282909180600101839055555050505b61002c565b6101858061003b6000396000f30060506040526000356c01000000000000000000000000900463ffffffff1680635b34b96614610049578063a87d942c1461005f578063f5c5ad831461008957610043565b60006000fd5b34156100555760006000fd5b61005d61009f565b005b341561006b5760006000fd5b6100736100f3565b6040518082815260100191505060405180910390f35b34156100955760006000fd5b61009d610105565b005b6001600060008282825054019250508190909055507f6816b015b746c8c8f573c271468a9bb4b1f0cb04ff12291673f7d2320a4901f76001604051808215151515815260100191505060405180910390a15b565b60006000600050549050610102565b90565b6001600060008282825054039250508190909055507f09a2ae7b00cae5ecb77463403c1d5d6c03cf6db222a78e22cbcafbe0a1ac9eec6001604051808215151515815260100191505060405180910390a15b5600a165627a7a72305820f68f8fcfd955a33bf1d1a62e3955a0c63f5618d3e8959171be1e7591bc53d4bd002987057aa53e5f8850833d09008800000002540be40001b860f7ab59b5bcaa7ca6d2af5a72cc6a886be7474a426bfc6918a133fd21c41cdb1f63e13a4867162094dff943ce52b3bd550b59fca8480b084a5e8f4fd4c6d6efcdf568db315b0e7f977b175d39a96b73ea7df136d1ffcb43b4143c0ece8fc47407' \n}\n",
      "language": "json",
      "name": "Output"
    }
  ]
}
[/block]
### Deploying the Contract
Up until now, we have not used any AION from our account since we haven't actually *sent* a transaction to the network. We only built the transaction in the last step. 

Now let's send the transaction to the network.
Run this command into the Web3 console
[block:code]
{
  "codes": [
    {
      "code": "web3.eth.sendSignedTransaction( signedTx.rawTransaction \n  ).on('receipt', receipt => { \n     console.log(\"Receipt received!\\ntxHash =\", receipt.transactionHash, \n                 \"\\ncontractAddress =\", receipt.contractAddress);\n  \t ctAddress = receipt.contractAddress;\n});",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
**Success!** :tada:
If everything goes as planned and contract deployment is a success , you should see the output below. 
[block:code]
{
  "codes": [
    {
      "code": "Receipt received! \ntxHash = 0x83d4e490605437be85fed385a27889882f8f7bbd443a7b33b05a01d954e009cb \ncontractAddress = 0xa0e5C73F2Aa1dbfD3bDc3cEb2D3BBEBCE467aeDf53D556e56A0eDe250f2B3d89",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
[/block]
You can also see more details <a href="https://mastery.aion.network/#/dashboard" target="_blank">Aion Dashboard</a> by pasting the transaction hash you received. 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/a793b36-deployment_success.PNG",
        "deployment_success.PNG",
        2928,
        1830,
        "#f8f8f9"
      ],
      "caption": "Confirmed Transaction Hash"
    }
  ]
}
[/block]
## 2.3 Interact

Now that we have our contract deployed on the network, we can interact with it. Like contract deployment, contract calls are **transactions**. The transaction object uses the same structure as before, but now we can populate the **'to:'** field to point to the contract address (where our smart contract lives now).

### Getter Function
In our Counter.sol contract, the `getCount()` function simply returns a constant. This means that it does not change or modify any values in the contract, but just outputs the value of a specific variable. 
[block:callout]
{
  "type": "info",
  "body": "As long as you are only reading data from the blockchain and not changing the blockchain, you don't need to carry out a transaction. The function you call is carried out by the node and since nothing is mined, you do not need to pay any NRG."
}
[/block]
So, since we're simply reading information from our contract, we can use <a href="https://docs.aion.network/docs/web3-eth#section-call" target="_blank">`web3.eth.call()`</a> without sending <<glossary:NRG>> or signing the transaction.
[block:code]
{
  "codes": [
    {
      "code": "let txCall = {\n\tfrom: account.address, \n\tto: ctAddress, \n\tgas: 54321, \n        data: contractInst.methods.getCount().encodeABI()\n};\n\nweb3.eth.call(txCall).then((res) => console.log(web3.utils.hexToNumber(res)));",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
**Notes**
* `txCall`: Transaction object with `getCount()` method
* `web3.utils.hexToNumber(res)`: We take the return and convert it from hexadecimal to decimal format

As expected, it is *zero* - which is the initial value of the contract's count variable.
[block:code]
{
  "codes": [
    {
      "code": "0",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
[/block]
### Function Calls

Let's try to use the `incrementCounter()` method, which modifies the state of the contract by increasing the counter by 1.  
[block:callout]
{
  "type": "info",
  "body": "Since you are modifying the blockchain by sending instructions to the contract, this is a *transaction*. As with all transactions, it is **necessary** for the transaction to be *signed* and *NRG* to be required for execution."
}
[/block]
Again, let's construct the transaction object and sign it - just like before.
[block:code]
{
  "codes": [
    {
      "code": "// Create the transaction object\nlet txCallIncrement = {\n    from: account.address, \n    to: ctAddress, \n    gas:54321, \n    data: contractInst.methods.incrementCounter().encodeABI()\n};\n\n// Sign it\nweb3.eth.accounts.signTransaction(\n    txCallIncrement, account.privateKey\n  ).then((res) => signedIncrementCall = res); \n\n// Output the signed transaction \nsignedIncrementCall;",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
**Notes**
* `txCallIncrement`: Transaction object with the `incrementCounter()` method
* <a href="https://docs.aion.network/docs/web3-eth#section-signTransaction" target="_blank">`eth.accounts.signTransaction()`</a>: Signs the transaction using your account's private key
* `signedIncrementCall`: Similarly to the code snippet for the contract deployment, the signed transaction has a `rawTransaction`
[block:code]
{
  "codes": [
    {
      "code": "{ \n  messageHash:\n   '0x6226521beacc1808ac93c4b9f18da4d34286bd3e1ecfda199c3593d4d19ee1ec',\n  signature:\n   '0xf7ab59b5bcaa7ca6d2af5a72cc6a886be7474a426bfc6918a133fd21c41cdb1f6db340a0d24ab5f0dd8f72bd189074d8734dba6edd88642bf5c8436df5a3278e92b446d5222335e13785657d34a1d6bbeb73438fc4568713700dea97f6a74f04',\n  rawTransaction:\n   '0xf89f02a0a0e5c73f2aa1dbfd3bdc3ceb2d3bbebce467aedf53d556e56a0ede250f2b3d8980845b34b96687057aa64e9c1d1882d4318800000002540be40001b860f7ab59b5bcaa7ca6d2af5a72cc6a886be7474a426bfc6918a133fd21c41cdb1f6db340a0d24ab5f0dd8f72bd189074d8734dba6edd88642bf5c8436df5a3278e92b446d5222335e13785657d34a1d6bbeb73438fc4568713700dea97f6a74f04' \n}\n",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
[/block]
### Waiting for Confirmation

Now, we're going to send the transaction and set up a <a href="https://nodejs.org/docs/latest/api/events.html#events_emitter_on_eventname_listener" target="_blank">handler</a> as before, looking for the *'transactionHash'* and *'receipt'* event.
[block:code]
{
  "codes": [
    {
      "code": "web3.eth.sendSignedTransaction(\n    signedIncrementCall.rawTransaction\n    ).on('transactionHash', txHash => { \n      console.log(\"txHash\", txHash) }\n    ).on('receipt',\n      receipt => { console.log(\"receipt\", receipt) }\n    );",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
This means that the **transaction hash** and the **receipt** will be displayed when they are available from our Aion node.  

You will notice that the transaction hash appears before the receipt does. Why is that? 
[block:callout]
{
  "type": "info",
  "body": "**Transaction hashes** are created as soon as the node *receives* the transaction\n\nThe **receipt** is available only *after* the node has processed the transaction - which may take up to 10 - 20 seconds on the Mastery TestNet.",
  "title": "Things to know"
}
[/block]
The output on your console should look something like this.
[block:code]
{
  "codes": [
    {
      "code": "txHash 0x911c71347ee575c9b0b0f6e29bd8545b355a31fc4621ebf05cc0d114327da4bd\n\nreceipt { blockHash:\n   '0x98bfe8c010d74527795fca38d51053bcabe98401e5fe8f55a67bb6baa8b14be0',\n  nrgPrice: '0x02540be400',\n  logsBloom:\n   '000000000000000000000000000000000000000000000000000000000000000080000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000100000000000\n0000000000000000000000000400000000000000000000000000000000000000000000000000000000000000000000000000000800000000000000000000000000000000000000000000000000000000000000000000\n0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000002000000000000040000000000000000000000000000000000\n',\n  nrgUsed: '0x00aa7e',\n  contractAddress: null,\n  transactionIndex: 0,\n  transactionHash:\n   '0x911c71347ee575c9b0b0f6e29bd8545b355a31fc4621ebf05cc0d114327da4bd',\n  gasLimit: '0x00d431',\n  cumulativeNrgUsed: '0xaa7e',\n  gasUsed: 43646,\n  blockNumber: 971622,\n  root:\n   '04e198cf56e0e8b1b0a78d41f2ae0ddd9160276c387039a0c66f68f0ec46db44',\n  cumulativeGasUsed: 43646,\n  from:\n   '0xa01bc25b03d85eef6687ef95ccf614f41dda861d670612cae2c8ba5811a1bf46',\n  to:\n   '0xa0e5c73f2aa1dbfd3bdc3ceb2d3bbebce467aedf53d556e56a0ede250f2b3d89',\n  logs:\n   [ { address:\n        '0xa0e5C73F2Aa1dbfD3bDc3cEb2D3BBEBCE467aeDf53D556e56A0eDe250f2B3d89',\n       logIndex: 0,\n       data: '0x00000000000000000000000000000001',\n       topics: [Array],\n       blockNumber: 971622,\n       transactionIndex: 0,\n       id: null } ],\n  gasPrice: '0x02540be400',\n  status: true }\n",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
[/block]
Alright, so everything looks good. :thumbsup: We have our transaction hash and the receipt - so let's see if it actually updated!

Use <a href="https://docs.aion.network/docs/web3-eth#section-call" target="_blank">`web3.eth.call()`</a> to execute the `getCount()`method one more time. 
We will use the same transaction object we created for it earlier (`txCall`).
[block:code]
{
  "codes": [
    {
      "code": "web3.eth.call(txCall).then((res) => console.log(web3.utils.hexToNumber(res)));\n",
      "language": "javascript",
      "name": "console.js"
    }
  ]
}
[/block]
**Notes**
* `txCall`: Transaction object with `getCount()`method
* `web3.utils.hexToNumber(res)`: We take the return and convert it from hexadecimal to decimal format

Since we called the `incrementCounter()` method once, it is expected that the counter increased by 1. 
[block:code]
{
  "codes": [
    {
      "code": "1",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
[/block]
Well there you have it! You can continue to increment/decrement this counter to your hearts content and get a good feel of things. After that, you're ready to start deploying more complex contracts and create awesome DApps on the Aion Network - and we cannot wait to see it!

# Need Help?

If you get stuck, try searching these docs 👆 or head over to our <a href="https://gitter.im/aionnetwork/Lobby" target="_blank">Gitter channels</a> or <a href="https://stackoverflow.com/search?q=aion" target="_blank">StackOverflow</a> for answers to some common questions.
[block:callout]
{
  "type": "info",
  "body": "Written by **<a href=\"https://twitter.com/KimCodeashian\" target=\"_blank\">KimCodeashian</a>** :fire:",
  "title": ""
}
[/block]