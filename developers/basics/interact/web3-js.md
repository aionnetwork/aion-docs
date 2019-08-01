---
title: Web3.js
description: We will be using Node.js and aion-web3.js library to interact with a Java smart contract on the blockchain.
table_of_contents: true
next_page: /developers/basics/test-and-debug/end-to-end/
draft: false
---

## Prerequisites

- [Node.js](https://nodejs.org/en/).
- Java contract address.
- An Aion account that has sufficient balance (For contract transaction only).
- A node to talk to Aion network.

*Note: We will use Node.js for this example, see the tutorial [here](https://www.w3schools.com/nodejs/) first if you are not familiar with it. If you want to embed web3.js directely in your `html` page, you can follow the [import minified web3.js instruction](https://github.com/aionnetwork/aion_web3/wiki/GUIDE:-Install#minifed-javascript-file).

We will interact with the following contract as an example:

```java
public class HelloAvm
{
    @Initializable
    public static String myStr;

    @Initializable
    public static Address adminAddress;

    @Callable
    public static String getString(){
        return myStr;
    }

    @Callable
    public static void setString(String newStr) {
        myStr = newStr;
    }

    @Callable
    public static Address getAdminAddress(){
        return adminAddress;
    }
}
```

This contract is deployed on [Aion Mastery](https://mastery.aion.network/#/contract/a0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2), and the contract address is: `0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2`.

## Install aion-web3

Pull down the latest version of the `aion-web3` packages into your project by running the following command:

```sh
npm install aion-web3
```

Then you can create a JavaScript file and import the library at the top of the file:

```javascript
const Web3 = require("aion-web3");
```

## Call

The following script calls the `getString()` method from the contract.

```javascript
// Import Dependencies
const Web3 = require("aion-web3");

// Set up node
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));

// Create the Function
async function contractCall() {
    // Encode method name and required arguments
    let data = web3.avm.contract.method("getString").inputs([],[])encode();

    // Query the Blockchain
    let initialResponse = await web3.eth.call({to: "0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2", data: data});

    // Decode the return data
    let avmResponse = await web3.avm.contract.decode("string", initialResponse);

    console.log("My string: " + avmResponse);
    return avmResponse;
}

// Call the Function
contractCall();
```

For this script to run, you first need to change `NODE_URL` to the node you want to talk to.

```js
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
```

To make a contract call, you will need the contract address and the data that execute the call. You can encode the method name along with any agrguments that is required by doing the following:

```js
let data = web3.avm.contract.method("getString").inputs([],[]).encode();
```

Here, we are calling `getString` and no argument is required for this method.

Assign the contract address to `to` and encoded data to `data`. Then you can query the blockchain using `web3.eth.call`:

```js
let initialResponse = await web3.eth.call({to: "0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2", data: data});
```

The output of this is the returned data in bytecode, running

```js
console.log("My string in bytes: " + initialResponse);
```

will give you:

```sh
My string in bytes: 0x21000948656c6c6f2041564d
```

where `0x21000948656c6c6f2041564d` is the returned data.

Finally, you can decode the returned data by defining the type of it, for our example, it is a string:

```js
let avmResponse = await web3.avm.contract.decode("string", initialResponse);
```

## Contract Transaction

To change a state in the blockchain, you will need an account with sufficient balance to send a transaction to the contract.

The following script sends a transaction to the contract by calling `setString()` method and changes `myStr` to "AVM is awesome.".

```javascript
// Install dependency.
const Web3 = require("aion-web3");

// Set up node and account.
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const account = web3.eth.accounts.privateKeyToAccount(privateKey);

async function sendtx() {

    // Encode method name and arguments.
    let data = web3.avm.contract.method('setString').inputs(['string'],["AVM is awesome"]).encode();
    const transaction = {
        from: account.address,
        to: "0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2",
        gasPrice: 10000000000,
        gas: 2000000,
        data: data
    };

    // Sign the Transaction.
    const signedTransaction = await web3.eth.accounts.signTransaction(
        transaction, account.privateKey
    ).then((transactionResponse) => signedCall = transactionResponse);

    // Send the Transaction.
    const transactionReceipt = await web3.eth.sendSignedTransaction( 
        signedTransaction.rawTransaction
    ).on('receipt', receipt => {
        console.log("Receipt received!\ntransactionHash =", receipt.transactionHash)
    });

    // Get the receipt.
    console.log(transactionReceipt);
}

sendtx();
```

For this script to run, you first need to change `NODE_URL` to the node you want to talk to, and the `PRIVATE_KEY` of the account you want to use to send the transaction.

```js
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const account = web3.eth.accounts.privateKeyToAccount(privateKey);
```

To make a contract transaction, you will need the contract address and the transaction data. You can encode the method name along with any agrguments that is required by doing the following:

```js
    let data = web3.avm.contract.method('setString').inputs(['string'],["AVM is awesome"]).encode();
```

Here, we are calling `setString` and a `new string` as in type `String` is required.

Create a [transaction object](https://github.com/aionnetwork/aion_web3/wiki/API:-web3-eth#parameters-9) and filled in the field as desired:

```js
const transaction = {
        from: account.address,
        to: "0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2",
        gasPrice: 10000000000,
        gas: 2000000,
        data: data
    };
```

Then you can use your account to [sign the transaction](https://github.com/aionnetwork/aion_web3/wiki/API:-web3-eth-accounts#signtransaction) and [send](https://github.com/aionnetwork/aion_web3/wiki/API:-web3-eth#sendsignedtransaction) it.

```js
// Sign the Transaction.
const signedTransaction = await web3.eth.accounts.signTransaction(transaction, account.privateKey).then((transactionResponse) => signedCall = transactionResponse);

// Send the Transaction.
const transactionReceipt = await web3.eth.sendSignedTransaction( signedTransaction.rawTransaction).on('receipt', receipt => {
console.log("Receipt received!\ntransactionHash =", receipt.transactionHash)
});
console.log(transactionReceipt);

```

This fallback function will return the transaction hash and the receipt when the transaction is mined, a sample output is:

```sh
Receipt received!
transactionHash = 0xb5190f6cb6e0732bf6ff212edf6b0d18cae06642dd5c98095a5799bb30e59062
{ blockHash: '0xa9ef7d2bcb439a177218f7c6da31149b273f7f8740383ba1e7b51fa9a31206cb',
  nrgPrice: '0x02540be400',
  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',
  nrgUsed: '0x00bdab',
  contractAddress: null,
  transactionIndex: 0,
  transactionHash: '0xb5190f6cb6e0732bf6ff212edf6b0d18cae06642dd5c98095a5799bb30e59062',
  gasLimit: '0x1e8480',
  cumulativeNrgUsed: '0xbdab',
  gasUsed: 48555,
  blockNumber: 2718848,
  root: 'd811974eed0fe7529b4a3fa08bc49ce26b0ef944c3872508462e8e11c785df70',
  cumulativeGasUsed: 48555,
  from: '0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9',
  to: '0xa0ceaa5b83fe4a8911928072b7e63ee32d880bef82fcbf91747721cfdd528db2',
  logs: [],
  gasPrice: '0x02540be400',
  status: true }
```

where `status: true` means the transaction has been successfully sent.
