---
title: Web3.js
table_of_contents: true
---

## Prerequisites

- [Node.js](https://nodejs.org/en/).
- An Aion account that has sufficient balance (For contract transaction only).
- A node to talk to Aion network.
- A compiled contract *.jar*.

*Note: We will use Node.js for this example, see the tutorial [here](https://www.w3schools.com/nodejs/) first if you are not familiar with it. If you want to embed web3.js directely in your `html` page, you can follow the [import minified web3.js instruction](https://github.com/aionnetwork/aion_web3/wiki/GUIDE:-Install#minifed-javascript-file).

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

To deploy the contract, you need to import the contract byte code by importing the compiled jar, and then encode the contract byte code along with the deployment arguments.

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
const receipt = await web3.eth.sendSignedTransaction( signedTransaction.rawTransaction).on('receipt', receipt => {
console.log("Receipt received!\ntransactionHash =", receipt.transactionHash)
});
console.log(receipt);
console.log("Contract Address: " + receipt.contractAddress);
```

This fallback function will return the transaction hash and the receipt when the transaction is mined, a sample output is:

```sh
Receipt received!
txHash = 0x60e88c7b5332ae4407343ac5a5e2b208f5c32db1298181eb78c8f63ed65b1196
{ blockHash: '0x81631a01844e5eb85f01c8f34987f4c666e961d31fe73bac2a9a44c0d005489d',
  nrgPrice: '0x02540be400',
  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',
  nrgUsed: '0x0a7c2b',
  contractAddress: '0xA0cFb255359eB53fd7a73efffAE91Fd6232395C5C170cF903bfc1e7889cB0261',
  transactionIndex: 0,
  transactionHash: '0x60e88c7b5332ae4407343ac5a5e2b208f5c32db1298181eb78c8f63ed65b1196',
  gasLimit: '0x4c4b40',
  cumulativeNrgUsed: '0xa7c2b',
  gasUsed: 687147,
  blockNumber: 2719715,
  root: '213221305323f23cd4ff5986f34cf369389fe7c72a8c33db97d2080a851d8447',
  cumulativeGasUsed: 687147,
  from: '0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9',
  to: null,
  logs: [],
  gasPrice: '0x02540be400',
  status: true }
Contract Address: 0xA0cFb255359eB53fd7a73efffAE91Fd6232395C5C170cF903bfc1e7889cB0261
```

where `status: true` means the contract has been successfully deployed.
