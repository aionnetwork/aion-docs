---
title: Web3.js
description: There are two ways to install the Aion version of Web3.js. Using the minified Javascript file from the Aion Web3.js repository is the fastest and easiest way to get up and running with Web3.js. This method is also the easiest way to link up a website frontend. However, if you want to deal with the blockchain in a more backend-way, then you should look at using the Node JS console section.
---

There are two ways to install the Web3.js library into your project:

1. [Minified Javascript File](#minified-javascript-file)
2. [Node JS Console](#node-js-console)

## Minified Javascript File

This is the easiest option since it doesn't require you to have NPM install.

1. Go to the `aion_web3` Github repository [releases page](https://github.com/aionnetwork/aion_web3/releases).
2. Find the latest release and download the `web3.min.js` file.
3. Add the `web3.min.js` file into your project folder:

    ```bash
    example/
    ├── app.js
    ├── index.html
    └── web3.min.js
    ```

4. In your `HTML`, add include the `web3.min.js` file _before_ you call any other JavaScript files. This is the make sure that your JavaScript has access to the `Web3` object created by the `web3.min.js` file.

    ```html
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

    ```javascript
    // Create web3 object by connecting to a node.
    let web3 = new Web3(new Web3.providers.HttpProvider("https://aion.api.nodesmith.io/v1/mastery/jsonrpc?apiKey=ab40c8f567874400a69c1e80a1399350"));

    // Set editable object in DOM
    let message_input = document.getElementById("message_input");
    let hash_output = document.getElementById("hash_output");

    // Set hash_output to the output of .hashMessage
    let hashed_message = web3.eth.accounts.hashMessage(message_input);
    hash_output.textContent = hashed_message;
    ```

## Node JS Console

Follow this process if you want to add Web3.js into a node project, or you want to use the Web3.js console.

1. Clone the `aion_web3` Github repository:

    ```bash
    git clone https://github.com/aionnetwork/aion_web3
    ```

2. Move into the directory and install the dependencies:

    ```bash
    cd aion_web3
    npm install
    ```

    If you run into an error here, it may be because you don't have `lerna` installed. You can fix this by running `npm install lerna`, and then re-running `npm install`.

3. The Web3.js package is now installed in this location. You can run the console by calling it:

    ```bash
    node console.js
    ```

    If you want to open the console and automatically connect to a node, supply the node URL as an argument when calling `console.js`:

    ```bash
    node console.js http://192.168.33.10:8545
    ```

4. You can now interact with the node using Web3.js:

    ```javascript
    web3.eth.accounts.hashMessage("Hello World");
    > '0xc3406fc7d084a437f4327bf854c3806bda85f15053ebb8aac23c18cd28b68bdb'
    ```
