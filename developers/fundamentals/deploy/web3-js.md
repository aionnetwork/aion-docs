---
title: Web3.js
toc: true
---

## Prerequisites

- [Node.js](https://nodejs.org/en/).
- An Aion account that has sufficient balance (For contract transaction only).
- A node to talk to Aion network.
- A compiled contract *.jar*.

*Note: We will use Node.js for this example, see the tutorial [here](https://www.w3schools.com/nodejs/) first if you are not familiar with it. You can also flowing the [API use instruction](https://github.com/aionnetwork/aion_web3#api-use) to use it in your web project(html).

We will deploy the following contract as an example:

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
        Blockchain.require(Blockchain.getCaller().equals(adminAddress));
        return adminAddress;
    }
}
```

A contract `contract.jar` that is compiled by using [Maven Aion4j plugin](/developers/fundamentals/compile/maven-cli/) is included in the project `contract folder`.

Here is the project structure:

```sh
├── contract
│   └── contract.jar
├── deploy.js
├── node_modules
│   ├── aion-lib
...
│   └── yaeti
├── package.json
└── package-lock.json

```

## Install aion-web3

Pull down the latest version of the `aion-web3` packages into your project by running the following command:

```sh
npm install aion-web3
```

Then you can create a JavaScript file and import the library at the top of the file:

```javascript
const Web3 = require("aion-web3");
```

## Contract Deployment

The following scrip deploys the contract to the Aion Network.

```javascript
// Import dependencies.
const Web3 = require("aion-web3");
let path = require('path');

const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const account = web3.eth.accounts.privateKeyToAccount(privateKey);

async function deploy() {

  // Import the contract jar.
  let jarPath = path.join(__dirname,'contract','contract.jar');

  // Encode the contract byte code and deployement arguments.
  let data = web3.avm.contract.deploy(jarPath).args(['string','address'],['Hello AVM', '0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9']).init();

  // Construct a transaction object.
  const transaction = {
    from: account.address,
    data: data,
    gasPrice: 10000000000,
    gas: 5000000,
    type: '0x2' //AVM java contract deployment.
  };

  // Sign the transaction.
  const signedTx = await web3.eth.accounts.signTransaction(
      transaction, account.privateKey
    ).then((res) => signedCall = res);

  // Send the transaction.
  const receipt = await web3.eth.sendSignedTransaction( 
      signedTx.rawTransaction
    ).on('receipt', receipt => {
       console.log("Receipt received!\ntxHash =", receipt.transactionHash)
  });

  console.log(receipt);
  console.log("Contract Address: " + receipt.contractAddress);
}
deploy();
```

For this script to run, you first need to change `NODE_URL` to the node you want to talk to, and the `PRIVATE_KEY` of the account you want to use to send the transaction.

```js
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const account = web3.eth.accounts.privateKeyToAccount(privateKey);
```

To deploy the contract, you need to import the contract byte code by importing the compiled jar, and then deploy the contract along with the deployment arguments.

```js
let jarPath = path.join(__dirname,'contract','contract.jar');
let data = web3.avm.contract.deploy(jarPath).args(['string','address'],['Hello AVM', '0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9']).init();
```

Here:

- `path.join(__dirname,'contract','contract.jar')` get the contract byte code from `contract.jar`, where the jar is located in `contract` folder.
- The contract takes two deployment arguemnts in order, where is a `String` and an `Address`.

> **WARNING**: You have to pass in the deployments arguemnts in the same order as the fields marked [`@Initialzable`](/developers/fundamentals/avm-concepts/initializable-fields/) in the contract.

Then you need to create a [transaction object](https://github.com/aionnetwork/aion_web3/wiki/API:-web3-eth#parameters-9) and filled in the field as desired:

```js
const transaction = {
    from: account.address,
    data: data,
    gasPrice: 10000000000,
    gas: 5000000,
    type: '0x2' //AVM java contract deployment.
    };
```

> **WARNING**: The `type` has to be set to `0x2` for Java contract deployment on Aion Network.

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
