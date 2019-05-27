---
title: "AVM Hackathon Web3 Guide"
excerpt: "Connect your web application to your Java smart contract!"
---
[block:api-header]
{
  "title": "1. Aion Web3 [AVM Compatible]"
}
[/block]
New changes have been made to Aion Web3 in order to be compatible with the AVM

* You will need to include this minified JavaScript file in your web application 
* Download the Aion Web3 minified file here - https://github.com/aion-kelvin/AvmFuntime/blob/master/myhack/web3.min.js
* Load it in your html file. Below is an example

[block:callout]
{
  "type": "danger",
  "body": "",
  "title": "Please disable MetaMask in your browser, as it may override the Aion Web3"
}
[/block]

[block:code]
{
  "codes": [
    {
      "code": "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n  <meta charset=\"UTF-8\">\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n  <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">\n  <link rel = \"stylesheet\" type = \"text/css\" href = \"./src/css/style.css\" />\n  <title>Document</title>\n\n</head>\n<body>\n  <!-- BODY GOES HERE -->\n  \n  <!-- aion web3 avm file -->\n  <script type=\"text/javascript\" src=\"./src/js/web3.min.js\"></script>\n  <!-- application JS file -->\n  <script type=\"text/javascript\" src=\"./src/js/app.js\"></script>\n\n</body>\n</html>\n",
      "language": "html"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "2. You do NOT need to instantiate the contract on the client side."
}
[/block]
When you compile your contract in Java - there is no ABI. 

Thus, the workflow of interacting with your smart contract on the client side has been modified a little. 
## 2.1 Sample Java Smart Contract
[block:code]
{
  "codes": [
    {
      "code": "package org.aion.avm;\n\nimport org.aion.avm.api.ABIDecoder;\nimport org.aion.avm.api.Address;\nimport org.aion.avm.api.BlockchainRuntime;\nimport org.aion.avm.userlib.AionMap;\n\nimport java.math.BigInteger;\n\npublic class Donation {\n\n    public static final AionMap <Address, BigInteger> ledger;\n    public static Address owner;\n\n    static {\n        ledger = new AionMap<>();\n        owner = BlockchainRuntime.getCaller();\n    }\n\n    public static byte[] main() {\n        return ABIDecoder.decodeAndRunWithClass(Donation.class, BlockchainRuntime.getData());\n    }\n\n    public static void donate(){\n        Address caller = BlockchainRuntime.getCaller();\n        ledger.put(caller, ledger.getOrDefault(caller, BigInteger.ZERO).add(BlockchainRuntime.getValue()));\n        BlockchainRuntime.log(\"donate\".getBytes(), caller.unwrap(), BlockchainRuntime.getValue().toByteArray());\n    }\n\n    public static int getTotalDonations(){\n        return ledger.size();\n    }\n\n    public static byte[] getDonatedAmount(Address caller){\n        return ledger.getOrDefault(caller, BigInteger.ZERO).toByteArray();\n    }\n\n    public static void selfDestruct(){\n        //only owner\n        BlockchainRuntime.require(BlockchainRuntime.getCaller().equals(owner));\n        BlockchainRuntime.selfDestruct(owner);\n    }\n\n}\n",
      "language": "java"
    }
  ]
}
[/block]
## 2.2 Connect to Aion 
[block:callout]
{
  "type": "info",
  "title": "You still need to connect to an endpoint!",
  "body": "* Use your Nodesmith API Endpoint/Key\n* Change 'mainnet' or 'testnet' to **avmtestnet** to connect\n\nhttps://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=YOURAPIKEYHERE"
}
[/block]

[block:code]
{
  "codes": [
    {
      "code": "let web3 = new Web3(new Web3.providers.HttpProvider(\"http://000.00.000.00:8545\"));\n// or \nlet web3 = new Web3(new Web3.providers.HttpProvider(\"https://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=ENTERAPIKEY\"));",
      "language": "javascript",
      "name": "Initialize Web3"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "3. Make Contract Calls"
}
[/block]

## 3.1 Normal Aion Web3 Calls
This is how you're probably used to calling Web3 to make function calls to your smart contract
[block:code]
{
  "codes": [
    {
      "code": "let signedFunctionCall;\n\n// 1. Create the transaction object\nlet txObject = {\n    from: account.address, \n    to: ctAddress, \n    gas:54321, \n    data: contractInst.methods.incrementCounter().encodeABI() // 1.1 Encode Method\n};\n\n// 2. Sign it\nweb3.eth.accounts.signTransaction(\n    txObject, account.privateKey\n  ).then(\n    (res) => signedFunctionCall = res); \n\n\n// 3. Send Transaction \nweb3.eth.sendSignedTransaction(\n    signedFunctionCall.rawTransaction\n    ).on('transactionHash', txHash => { \n      console.log(\"txHash\", txHash) }\n    ).on('receipt',\n      receipt => { console.log(\"receipt\", receipt) }\n    );",
      "language": "javascript",
      "name": "Normal Aion Web3 Function Call"
    }
  ]
}
[/block]
## 3.2 AVM Aion Web3 Calls
Note, only the method definition itself changes. 
1. You will need to use `web3.avm.method` to define your method
2. Encode the method, and input as data in your transaction object. 
[block:code]
{
  "codes": [
    {
      "code": "// 2 ways to define\nvar method = web3.avm.method(\"contractFunctionName\").argTypes(web3.avm.TYPES.ADDRESS)\n// or\nvar method = web3.avm.method(\"contractFunctionName\").argTypes(\"address\")\n\n\n// 1. Define Method & Encode\nlet method = web3.avm.method(\"getDonatedAmount\").argTypes(\"Address\");\nlet data = method.encodeToHex(\"0xAIONADDRESSHERE\");\n\n\n// 2. Create the transaction object \nlet txObject = {\n  from: \"0xa0a8c0d2af828bb42c0a0f9d7c94c500a04e778821bbdd3743343aa7d2d995e2\",\n  to: ctAddress,\n  gas: 1000000,\n  data: data,\n  type: '0xf'\n};\n\n// 3. Send Transaction \nlet signedTx;\n\nweb3.eth.accounts.signTransaction(\n  tx, 'accountPrivateKeyHere'\n).then(function(res) {\n  signedTx = res;\n  \n  // Send Signed Transaction \n  web3.eth.sendSignedTransaction(\n    signedTx.rawTransaction\n  ).on('transactionHash', txHash => {\n    console.log(\"txHash\", txHash) // Print txHash\n  }).on('receipt',\n    receipt => { console.log(\"donate receipt\", receipt) } // Print txReceipt\n  );\n});",
      "language": "javascript",
      "name": "AVM Contract Method Defintion "
    }
  ]
}
[/block]
## 3.3 AVM Method - Argument Types 
These are the argument types you can use when defining your methods.
[block:code]
{
  "codes": [
    {
      "code": "BYTE : \"byte\",\nBOOLEAN : \"boolean\",\nCHAR : \"char\",\nSHORT : \"short\",\nINT : \"int\",\nLONG : \"long\",\nFLOAT : \"float\",\nDOUBLE : \"double\",\nSTRING : \"String\",\nADDRESS : \"Address\",\n\nBYTE_A : \"byte[]\",\nBOOLEAN_A : \"boolean[]\",\nCHAR_A : \"char[]\",\nSHORT_A : \"short[]\",\nINT_A : \"int[]\",\nLONG_A : \"long[]\",\nFLOAT_A : \"float[]\",\nDOUBLE_A : \"double[]\",\nSTRING_A : \"String[]\",\nADDRESS_A : \"Address[]\",\n\nBYTE_2A : \"byte[][]\",\nBOOLEAN_2A : \"boolean[][]\",\nCHAR_2A : \"char[][]\",\nSHORT_2A : \"short[][]\",\nINT_2A : \"int[][]\",\nLONG_2A : \"long[][]\",\nFLOAT_2A : \"float[][]\",\nDOUBLE_2A : \"double[][]\",",
      "language": "javascript",
      "name": "AVM Argument Types"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "4. Use AIWA"
}
[/block]
## 4.1 Nodesmith Endpoint
We will need to modify our endpoint in order to connect to the AVM Testnet.

Sign up for Nodesmith
Change your Nodesmith Endpoint to avmtestnet like so:
api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=YOURAPIKEY
## 4.2 Connect AIWA to AVM Testnet

You will need to connect to the AVM Testnet on your AIWA. 
* Open up your AIWA
* Top Right > Select your Network
* Select 'Custom'
* Enter the data below to connect to AVM Testnet Port
**URL:** https://api.nodesmith.io/v1/aion/avmtestnet/jsonrpc?apiKey=YOURAPIKEY
**Port:** 443
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/0e4d57e-aiwa_avm.PNG",
        "aiwa_avm.PNG",
        898,
        1492,
        "#36617e"
      ]
    }
  ]
}
[/block]
## 4.1 Detect AIWA in the browser

If you're not familiar with AIWA - [start here](doc:aiwa) 
Detect AIWA and use in your application
[block:code]
{
  "codes": [
    {
      "code": "let aiwa; \n// Detect AIWA\nwindow.onload = () => {\n  console.log(aionweb3);\n  if (aionweb3){\n    aiwa = aionweb3;\n    console.log(\"✓ AIWA injected successfully\");\n  }\n}",
      "language": "javascript",
      "name": "initAIWA.js"
    }
  ]
}
[/block]
## 4.3 Sign Transactions with AIWA

Safer than having a user enter their private key on the site (or storing a private key in the file), you can get AIWA to prompt up, so that users can review and sign their own transactions.

A little different than the plain web3 method.
[block:code]
{
  "codes": [
    {
      "code": "// 1. Define Method & Encode\nlet method = web3.avm.method(\"donate\").argTypes();\nlet data = method.encodeToHex();\n\n// 2. Create TX object\ntxObject = {\n  from: \"0xa0d6dec327f522f9c8d342921148a6c42f40a3ce45c1f56baa7bfa752200d9e5\",\n  to: ctAddress,\n  data: data,\n  gas: 2000000,\n  type: '0xf',\n  value: web3.utils.toNAmp(amount.toString())\n}\n\n// 3. Prompt AIWA\naiwa.eth.sendTransaction( // I assigned aiwa = aionweb3 previously\n  txObject\n).then(function(txHash){\n  console.log('txHash:', txHash);\n});",
      "language": "javascript",
      "name": "AIWA.js"
    }
  ]
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/203a95c-aiwa_interaction.PNG",
        "aiwa_interaction.PNG",
        2004,
        1680,
        "#ccd6e3"
      ],
      "caption": "Example of AIWA being used for a dApp"
    }
  ]
}
[/block]

[block:callout]
{
  "type": "success",
  "title": "Hey rockstar!",
  "body": "Kill the hackathon :gun: I know you can! You are the bomb.com :bomb:\n\nHope this helps - if not, I'm only a ping away on Slack! \n\nAlso, I will graciously accept some of your winning proceeds (you're too kind!).\n0xa0035a4ed024e8b0d0c0af82efc3a03ef5baadbd11602461d0da39b0291235c3\n\n**- <a href=\"https://twitter.com/KimCodeashian\" target=\"_blank\">Kimcodeashian</a>** :fire:"
}
[/block]