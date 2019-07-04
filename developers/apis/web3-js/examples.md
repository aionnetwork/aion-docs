---
title: Examples
description: We've put together a few examples of how you can use Aion Web3.js in your projects. All these examples use the minified JavaScript file instead of the Node JS console. This is so you can copy and paste in the code examples into a boilerplate project.
---

We've put together a _boilerplate_ project that you can use to quickly start playing around with the examples listed here. You don't have to use this project, and you can create your own if you want. To set this project up:

1. Download the [`project.zip` file](/developers/apis/web3-js/project-assets/aion-web3-boilerplate-examples.zip).
2. Unzip the package somewhere.
3. Run `npm install -g serve` to install the Serve mini-server.
4. Run `serve` to start a local mini-server.
5. Go to [localhost:5000](//localhost:5000) to view the site.

The only package that is installed by NPM is the `serve` package. It sets up a local mini-server that allows you to interact with Aion Web3.js properly without having to spin up an entire server or virtual machine on your computer. You can find out more about Serve on Zeit's [GitHub repository](https://github.com/zeit/serve).

The code examples below only make changes to `index.html` and `script.js`. There is no need to change any of the other files. You should never make any changes to `web3.min.js` as doing so will likely break the framework library.

All the examples on this page return their outputs to the **browser console**. Make sure to call the function in your `script.js`.

## Connect to a Node

You can connect to a node using a single line:

```javascript
const web3 = new Web3(new Web3.providers.HttpProvider("ENTER_YOUR_NODE_URL_HERE"))
```

You can grab a node from [Nodesmith](//nodesmith.io/) or [Blockdaemon](//blockdaemon.com/) if you haven't got one already.

Once you're connected to a node, you can run something like `console.log(web3)` to print the `web3` object.

## Return a Variable from a Contract

You can return a variable held within a contract using Aion Web3.js. Here is the code we will be using for this example:

```javascript
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const account = web3.eth.accounts.privateKeyToAccount("PRIVATE_KEY");
const contractAddress = "CONTRACT_ADDRESS";
const methodName = "METHOD_NAME";

async function methodCall() {

    // Create the data object.
    let data = web3.avm.contract
        .method(methodName)
        .inputs(["int"], [13])
        .encode();

    // Create the transaction object.
    const transactionObject = {
        from: account.address,
        to: contractAddress,
        data: data,
        gasPrice: 10000000000,
        gas: 2000000,
        type: "0x1"
    };

    // Send the transaction object to the network and wait for a response.
    let initialResponse = await web3.eth.call(transactionObject);

    // Decode the reponse.
    let avmResponse = await web3.avm.contract.decode("string", initialResponse);

    // Print the response to the console.
    console.log(avmResponse);
}
```

To run this code you need to enter these 4 things on the top 4 lines:

1. A node connected to the network you want to use: `NODE_URL`
2. The private key of an account on the network you want to connect to: `PRIVATE_KEY`
3. The address of the contract you want to call: `CONTRACT_ADDRESS`
4. The name of the method you want to call: `METHOD_NAME`

If the method you want to call takes arguments, you need to enter them into the `inputs` section in the `data` object. You can add multiple arguments into the `inputs` section, and they should be entered in the same order as they appear in the contract.

```javascript
let data = web3.avm.contract
    .method(methodName)
    .inputs([["int"], [13]], [["string"], ["Hello World"]])
    .encode();
```

If your method does not take any arguments, then remove the `input` section in the `data` object:

```javascript
let data = web3.avm.contract
    .method(methodName)
    .encode();
```

You need to call the `methodCall()` function from the terminal inside your browser to get a response.
