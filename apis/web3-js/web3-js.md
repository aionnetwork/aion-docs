# Web3.js

Aion nodes only understand [bytecode](https://en.wikipedia.org/wiki/Bytecode), and have no idea what to do with Solidity, Python, or Java. Since bytecode isn't very nice to deal with, you can use the Web3 API.

When you make a request to Web3.js it converts it into a [JSON RPC](https://www.jsonrpc.org/specification) process. This abstracts the interaction between your code and the blockchain.
[block:callout]
{
  "type": "success",
  "title": "Run through the Tutorial",
  "body": "Check out the new [Web3 tutorial](https://learn.aion.network/docs/deploy-a-smart-contract-using-web3) over at [Aion University](https://learn.aion.network) to get started straight away!"
}
[/block]
# Prerequisites

Make sure the following software is installed locally on your machine before attempting to run Web3.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/3279be3-git-logo.png",
        "git-logo.png",
        300,
        150,
        "#953e19"
      ],
      "caption": "[Git](https://git-scm.com/)"
    }
  ]
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9bc1c9e-node-logo.png",
        "node-logo.png",
        300,
        150,
        "#41523d"
      ],
      "caption": "[Node.js](https://nodejs.org/en/)"
    }
  ]
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/f1fe0a3-npm-logo.png",
        "npm-logo.png",
        300,
        150,
        "#e18b8a"
      ],
      "caption": "[Node Package Manager](https://www.npmjs.com/)"
    }
  ]
}
[/block]
## Node Access

In order for Web3.js to interact with the blockchain, it needs access to an Aion node. You can set up your own node on your [local machine](doc:node-set-up), or connect to a [hosting service](https://docs.aion.network/docs/hosting-service).

# Install

The two main ways to install the Aion Web3.js framework are by [using NPM](#section-npm-install), or by [cloning the GitHub repository](#section-github-install).


## NPM Install

This is the simplest method of installing the Aion Web3.js framework. Just run:

```bash
npm install aion-web3
```

Then just include these two lines at the top of your project:

```javascript
const Web3 = require('aion-web3')
const web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
```

## GitHub Install

This method of installation is a bit more hands on, but allows for more granularity and customization.
[block:callout]
{
  "type": "info",
  "title": "Super Quick Install",
  "body": "Run this _one-liner_ if you're super busy and don't have time to read more than one line:\n\n```bash\ngit clone https://github.com/aionnetwork/aion_web3.git && cd aion_web3 && npm install && node console.js\n```"
}
[/block]
1. Clone the `aion_web3` repository from Github.

```bash
git clone https://github.com/aionnetwork/aion_web3.git
```

2. Change directory into the folder you just cloned. 

```bash
cd aion_web3
```

3. Install all the Node.js dependencies.

```bash
npm install
```

You may receive some warning here about certain dependencies and functions being _deprecated_. This is fine for now. We are working on replacing these dependencies.
 
4. Open the Node console to interact with Web3

```bash
node console.js
```

5. You should now see something like `aion-127.0.0.1:8545>` in your terminal.

You now have access to Web3.js. From now on, whenever you want to access the API, run `node console.js` from the `aion_web3` directory in a terminal window. However, unless you are connected to a node (a computer node, not Node.js), the is not much you can do.

## Connecting to a Node

To change the address of the node that you want to connect to, supply the URL as an argument after calling `console.js`:

```bash
node console.js https://aion-api-endoint.example.com/testnet
```

Or, for a more permanent solution, edit the following line in `console.js`:

```javascript
    var endpoint = process.argv[2] || 'https://aion-api-endoint.example.com/testnet';
```

The default value is `127.0.0.1:8545`.

# Testing

To make sure that everything is setup ok, run through the following steps to test your connection to the Aion blockchain:

1. Open a terminal and run:

```bash
node console.js
```

2. In the Node console enter:

```javascript
const high_baller = '0xa022a68ef27e5febe4570edb2ce5586974cb326f24fce2ebb23012c07dac90e0'
```

This line creates a constant variable called `high_baller` with a long string as it's value. This long string is the address of a mining group within the Aion network. Once you've entered the variable the console will output something like `undefined`.

3. Still in the node console, enter the following:

```javascript
web3.eth.getBalance(high_baller, (err, bal) => { balance = bal })
```

This line calls the `getBalance()` function within the `web3` object. The `high_baller` account is supplied as the first argument, and the result of this function is returned to a variable called `balance`. Again, once you've entered the variable the console will output something like `undefined`.

4. Entering `balance` will return the amount of NRG that the `high_baller` account contains:

```javascript
> balance
'43153146328612172515'
```

5. To convert this amount into `Aion` just run:

```javascript
web3.utils.fromNAmp(balance, 'aion')
```

If you ever forget which functions the `web3` object contains, just enter `web3` into the terminal and it will output a long list of everything that's available to you:

```javascript
> web3

Web3 {
  currentProvider: [Getter/Setter],
  _requestManager:
   RequestManager {
     provider:

continued...

```

Obviously, you can also just check out the Aion Web3.js documentation.

# Need Help?

If you get stuck, try searching these docs 👆 or head over to our [Gitter channels](https://gitter.im/aionnetwork/Lobby) or [StackOverflow](https://stackoverflow.com/search?q=aion) for answers to some common questions.