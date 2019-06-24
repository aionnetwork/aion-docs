---
title: Examples
description: Outlined on this page are some examples on how to use Ethers.js on the Aion network. These examples have been designed to be copy-and-pasteable into your existing code. If you have some suggestion for further examples to include here, click on the GitHub icon at the bottom left of the screen to be take to this page in the AionNetwork/Docs repository.
---

## Base Contract

For the examples on this page, we'll be using the following _getter-setter_ contract.

```java
package aion.example;

import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.tooling.abi.Initializable;

public class HelloAvm
{
   @Initializable
   private static String myStr;

    // Set the myStr variable to whatever the user inputs.
    @Callable
    public static void setString(String newStr) {
       myStr = newStr;
   }

   // Return the myStr variable to the user.
   @Callable
    public static String getString() {
       return myStr;
   }
}
```

## Contract Call

Get data from the blockchain  by performing a contract method call.


```javascript
"use strict"

const { aion } = require("@ethersproject-aion/ethers");

const RPCProvider = require("@ethersproject-aion/providers").JsonRpcProvider;
let provider = new RPCProvider("Node URL");
console.log("PROVIDER", provider);

// Select account.
let privateKey = "Private Key";
let wallet = new aion.Wallet(privateKey,provider);
console.log("WALLET", wallet, wallet._signingKey());

let abi = `
    0.0
    aion.ethersExample.HelloAVM
    public static void setString(String)
    public static String getString()
`

// Contract interface.
let iface = aion.utils.AvmInterface.fromString(abi);
console.log("INTERFACE", iface);

(async function() {
    try {
        let contractAddress = "contract address";

        // Create contract interface.
        let contract = new aion.AvmContract(contractAddress, iface, wallet);

        let result = await contract.readonly.getString();
        console.log("My string is", result);
    } catch (error) {
        console.log(error);
    }
})();
```

## Contract Transaction

Send a transaction to a contract, and alter the state of the blockchain.

Sending a transaction to a contract is different from a call, because calls cannot change the _state of a contract_, only return a value. Contract transactions are able to change values within a contract, and thus require `AION` to run.

```javascript
"use strict"

const { aion } = require("@ethersproject-aion/ethers");

const RPCProvider = require("@ethersproject-aion/providers").JsonRpcProvider;
let provider = new RPCProvider("Node URL");
console.log("PROVIDER", provider);

// Select account.
let privateKey = "Private Key";
let wallet = new aion.Wallet(privateKey, provider);
console.log("WALLET", wallet, wallet._signingKey());


let abi = `
    0.0
    aion.ethersExample.HelloAVM
    public static void setString(String)
    public static String getString()
`

// Contract interface.
let iface = aion.utils.AvmInterface.fromString(abi);
console.log("INTERFACE", iface);

(async function () {
    try {
        // Check if account has sufficient balance.
        let balance = await wallet.getBalance();
        console.log("BALACE:", aion.utils.formatEther(balance));

        let contractAddress = "contract address";

        // Create contract interface.
        let contract = new aion.AvmContract(contractAddress, iface, wallet);

        let tx = await contract.transaction.setString("Hello Ethers Aion!");
        console.log("Treansaction Hash", tx.hash);

        let receipt = await tx.wait();
        console.log("Receipt:", receipt);

        let result = await contract.readonly.getString();
        console.log("RESULT After", result);
    } catch (error) {
        console.log(error);
    }
})();
```

