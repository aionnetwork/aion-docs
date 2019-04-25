# Include Web3.js

Add `aion-web3` into your website to allow it to access the Aion Virtual Machine (AVM) network.

There are two methods for including web3.js into your project:

1. Including a single minified JavaScript file.
2. Installing the complete Aion Web3.js NPM package.

## Minified JavaScript File

[Download the `web3.min.js`](avm.aion.network/web3.min.js). Include it in your HTML:

```html
<script src="web3.min.js"></script>
```

You can now interact with the `web3` object:

```html
<script src="web3.min.js"></script>
<script>
    console.log(web3);
</script>
```

## Using Node.js

1. Install [NPM](https://www.npmjs.com/) if you haven't already.
2. Move to your application directory.
3. Pull down the latest version of the `aion-web3` and `node-zip` packages into your project:

    ```bash
    npm install aion-web3@1.2.5-beta.2 node-zip
    ```

4. Create a JavaScript file and `require` the package at the top of the file:

    ```javascript
    const Web3 = require("aion-web3");
    ```

5. Write the rest of your script!

## Node.js Boilerplate Script

```javascript
const Web3 = require("aion-web3");

async function callContract() {
    console.log(Web3);
}

callContract();
```