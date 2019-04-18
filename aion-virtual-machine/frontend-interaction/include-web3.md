# Include Web3.js

Add `aion-web3` into your website to allow it to access the Aion Virtual Machine (AVM) network.

## Installation Instructions

1. Install [NPM](https://www.npmjs.com/) if you haven't already.
2. Move to your application directory.
3. Pull down the latest version of the `aion-web3` package into your project:

    ```bash
    npm install aion-web3
    ```

4. Create a JavaScript file and `require` the package at the top of the file:

    ```javascript
    const Web3 = require("aion-web3");
    ```

5. Write the rest of your script!

## Boilerplate Script

```javascript
const Web3 = require("aion-web3");

async function callContract() {
    // Put logic here.
}

function main() {
    callContract();
}
```