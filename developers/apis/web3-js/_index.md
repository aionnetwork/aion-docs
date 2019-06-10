---
title: Web3.js
description: Aion nodes only understand bytecode, and have no idea what to do with high level languages like Java, Python, on Solidity. Since bytecode isn't very nice to deal with, you can use the Web3.js framework to deal with frontend interaction.
---

## About

Web3.js was originally created by the Ethereum Foundation for Ethereum-based blockchains. Aion modified the calls that Web3.js makes to the JSON RPC layer so that the framework is able to communicate with the Aion network. The Aion specific framework can be [found on Github](https://github.com/aionnetwork/aion_web3). The Aion implementation of Web3.js (Aion Web3.js) is maintained by the Aion Foundation.

At the start of 2019, futher modifications were made to the Web3.js framework that allowed it to interact with the Aion Virtual Machine (AVM), allowing smart contract developers to create Java contracts and interact with them using this framework.

## Install

There are two ways to install the Web3.js library into your project:

- [Including the minified JavaScript file](#minifed-javascript-file).
- [Using NPM to download and install the packages](#npm-install).

### Minifed Javascript File

This is the easiest option, since it doesn't require you to have NPM install.

1. Go to the `aion_web3` Github repository [releases page](https://github.com/aionnetwork/aion_web3/releases).
2. Find the latest release and download the `web3.min.js` file.
3. Add the `web3.min.js` file into your project folder:

    ```
    example/
    ├── app.js
    ├── index.html
    └── web3.min.js
    ```

4. In your `html`, add include the `web3.min.js` file _before_ you call any other JavaScript files. This is the make sure that your JavaScript has access to the `Web3` object created by the `web3.min.js` file.

    ```
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Example Project</title>
        </head>
        <body>
            <h1>This is an Example Project</h1>
            <p>Input Message: <code id="message_input">Hello World</code></p>
            <p>Output Message: <code id="hash_output">0xc3406fc7d084a437f4327bf854c3806bda85f15053ebb8aac23c18cd28b68bdb</code></p>
        </body>
        <script src="web3.min.js"></script>
        <script src="app.js"></script>
    </html>
    ```

5. You should now be able to use the `Web3` object within your JavaScript.

    ```
    // Create web3 object by connecting to a node.
    let web3 = new Web3(new Web3.providers.HttpProvider("https://aion.api.nodesmith.io/v1/mastery/jsonrpc?apiKey=ab40c8f567874400a69c1e80a1399350"));

    // Set editable object in DOM
    let message_input = document.getElementById("message_input");
    let hash_output = document.getElementById("hash_output");

    // Set hash_output to the output of .hashMessage
    let hashed_message = web3.eth.accounts.hashMessage(message_input);
    hash_output.textContent = hashed_message;
    ```


### NPM Install

Follow this process if you want to add Web3.js into a node project, or you want to use the Web3.js console.

1. Clone the `aion_web3` Github repository:

    ```
    git clone https://github.com/aionnetwork/aion_web3
    ```

2. Move into the directory and install the dependencies:

    ```
    cd aion_web3
    npm install
    ```

    If you run into an error here, it may be because you don't have `lerna` installed. You can fix this by running `npm install lerna`, and then re-running `npm install`.

3. The Web3.js package is now installed in this location. You can run the console by calling it:

    ```
    node console.js
    ```

    If you want to open the console and automatically connect to a node, supply the node URL as an argument when calling `console.js`:

    ```
    node console.js http://192.168.33.10:8545
    ```

4. You can now interact with the node using Web3.js:

    ```
    web3.eth.accounts.hashMessage("Hello World");
    > '0xc3406fc7d084a437f4327bf854c3806bda85f15053ebb8aac23c18cd28b68bdb'
    ```

## Further Documentation

The API documentation is hosted on the [`aion_web3` Github Wiki pages](https://github.com/aionnetwork/aion_web3/wiki).