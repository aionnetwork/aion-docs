# Deploy a Contract

Deploy a contract using Web3.js.

If you need to deploy a contract without using either the IntelliJ or Maven plugins, then you can use Web3.js.

## Example Script

```javascript
// Import Dependencies
const Web3 = require("aion-web3");

// Create web3 Object
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));

// Select Account
const privateKey = "PRIVATE_KEY";
const account = web3.eth.accounts.privateKeyToAccount(privateKey);

// Define the Path
let path = require('path');

// Create the Function
async function deploy() {

    // Supply the Contract
    let jarPath = path.join(__dirname,'contracts','Counter.jar');

    // Create the Transaction Object
    let data = web3.avm.contract.deploy(jarPath).args(['int'],[703]).init();
    const transaction = {
        from: account.address,
        data: data,
        gasPrice: 10000000000,
        gas: 5000000,
        type: '0x2'
    };

    // Sign the Transaction
    const signedTransaction = await web3.eth.accounts.signTransaction(
        transaction, account.privateKey
    ).then((res) => signedCall = res);

    // Send the Transaction
    const receipt = await web3.eth.sendSignedTransaction(
        signedTransaction.rawTransaction
    ).on('receipt', receipt => {
       console.log("Receipt received!\nTransaction Hash =", receipt.transactionHash)
    });

    // Print the Receipt
    console.log(receipt);
    console.log("Contract Address: " + receipt.contractAddress);
}

// Call the Function
deploy();
```

### Import Dependencies

To begin the script, you must import the dependencies. The only dependency for this script is the [Web3.js](https://www.npmjs.com/package/aion-web3) package itself.

```javascript
const Web3 = require("aion-web3");
```

### Create web3 Object

A `web3` object must be present on a webpage in order for the browser to interact with a blockchain network. This is done by calling the imported Aion Web3 dependency, and specifying an AVM node or provider.

If you are using a node hosting service like Nodesmith, just paste in your endpoint URL as the `HttpProvider`:

```javascript
const web3 = new Web3(new Web3.providers.HttpProvider("https://aion.api.nodesmith.io/v1/avmtestnet/jsonrpc?apiKey=abcd1234..."));
```

If you want to connect to a specific node, enter the IP address and port number of the node:

```javascript
const web3 = new Web3(new Web3.providers.HttpProvider("http://39.99.123.225:8545"));
```

### Select Account

Every action on a blockchain network is performed by an account. You must select an account in order to call a method in a contract. The best way to do this is to generate your account object from your private key.

```javascript
const privateKey = "0x42fae930c886c9fad55c27fed86b1802f3d55a1c351b9fd827036b9ff9b3f25d36fa718770c7670ba4608f23d5131721f6de8e9459f4a14442854aad1dd15e0f";
const account = web3.eth.accounts.privateKeyToAccount(privateKey);
```

Since this is likely not going to change between calls, it makes sense to set the `account` variable _outside_ of the function. This way is it in the global _scope_ of the script.

### Define the Path

When deploying a contract, the deployment script needs to know where the contract `.jar` file is stored. The easiest way to do this is to use the `path` package, and create a `path` object that you can reference later in the script.

```javascript
let path = require('path');
```

### Create the Function

Create the function you will use to call the contract. All blockchain interaction are _asynchronous_, meaning that several of them can happen in parallel to each other.

```javascript
async function deploy() {
    // Function logic goes in here.
}
```

### Supply the Contract

When deploying a contract, the deployment script needs to know where the contract `.jar` file is stored. Once a `path` object [has been created](#define-the-path), the contract location can be supplied to the script.

```javascript
let jarPath = path.join(__dirname,'contracts-folder','Counter.jar');
```

In this example the folder structure looks like this:

```txt
├── deploy.js
├── contracts-folder
    └── Counter.jar
```

### Create the Transaction Object

A transaction object must be created before deploying the contract to the network.

First, define the `data` variable. This is an object that is wrapped within the transasction object. It tells the network what contract you want to deploy, and any arguments you want to supply when the contract is deployed. See the [Deployment Arguments](/aion-virtual-machine/contract-fundamentals/deployment-arguments) section for more information on which types you can and cannot supply when deploying a contract.

Deployment variables come in a `[type][value]` pair. For example, `.args(['string'],['Douglas Adams'])` means you want to supply the string `Douglas Adams` to the `static{}` method on deployment.

Next, create the transaction object itself. The transaction object **must** contain the following information:

| Object Key | Description |
| ---------- | ----------- |
| `from` | The address of the account that is sending this transaction. This usually comes from the `account` object. |
| `data` | An object that contains information regarding the function you want to call within the contract. Any arguments you want to supply are contained within this object as well. |
| `gasPrice` | The amount of `AION` you're willing to pay for every unit of gas. This is usually set to `10000000000` |
| `gas` | The maximum you're willing to pay for the transaction. This is usually set to `2000000`. |
| `type` | The type of operating this transaction is performing. Deployments are `0x2`. All other operations are `0x1`. If you do not set the `type`, the network will assume you want to perform a `0x1` operation. |

```javascript
let data = web3.avm.contract.deploy(jarPath).args(['int'],[703]).init();
const transaction = {
    from: account.address,
    data: data,
    gasPrice: 10000000000,
    gas: 5000000,
    type: '0x2'
};
```

### Sign the Transaction

All deployments must be signed so that the network can confirm which contracts came from which accounts.

This is done by calling the `signTransaction` method from the `web3` object, and waiting for the response. The private key of the `account` object is used to sign the transaction.

The `signTransaction` creates the `signedTransaction` object.

```javascript
const signedTransaction = await web3.eth.accounts.signTransaction(
    Tx, account.privateKey
).then((res) => signedCall = res);
```

### Send the Transaction

Once a transaction has been successfully signed, it can be sent to the network. 

This is done by calling the `sendSignedTransaction` method from the `web3.object`, and waiting for the response. The `rawTransaction` object, contained within the `signedTransaction` created when you signed the transaction, is supplied to the `sendSignedTransaction` method.

The response from the network is recorded. This is known as the transaction receipt.

```javascript
const receipt = await web3.eth.sendSignedTransaction(
    signedTransaction.rawTransaction
).on('receipt', receipt => {
    console.log("Receipt received!\ntxHash =", receipt.transactionHash)
});
```

### Print the Receipt

Print the transaction receipt from the attempted deployment.

This step is optional. Printing out the receipt into the terminal can help you debug any issues if the contract is not deploying.

Assuming that the deployment was successful, the `receipt` object contains the address of the newly deployed contract.

```javascript
console.log(receipt);
console.log("Contract Address: " + receipt.contractAddress);
```