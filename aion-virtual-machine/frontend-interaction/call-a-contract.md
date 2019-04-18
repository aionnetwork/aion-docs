# Call a Contract

Call a contract on the blockchain from the browser.

## Example Script

The following script calls the `getCount` method from a contract on the AVM network. In order for this script to run, you need to fill in the `NODE_URL`, `PRIVATE_KEY`, and `CONTRACT_ADDRESS`.

```javascript
// Import Dependencies
const BN = require('bn.js');
const Web3 = require("aion-web3");

// Create web3 Object
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));

// Select Account
const privateKey = "PRIVATE_KEY";
const account = web3.eth.accounts.privateKeyToAccount(privateKey);

// Create the Function
async function contractCall() {

    // Create the Transaction Object
    let data = web3.avm.contract.method("getCount").encode();
    const transactionObject = {
        from: account.address,
        to: "CONTRACT_ADDRESS",
        data: data,
        gasPrice: 10000000000,
        gas: 2000000,
        type: "0x1",
    };

    // Query the Blockchain
    let initialResponse = await web3.eth.call(transactionObject);
    let avmResponse = await web3.avm.contract.decode("int", response);
    return avmResponse;
}

// Call the Function
contractCall();
```

### Import Dependencies

To begin the script, you must import the dependencies. For this script they are [BN](https://www.npmjs.com/package/bn.js) (which stands for Big Number) and the Aion implementation of [Web3.js](https://www.npmjs.com/package/aion-web3).

```javascript
const BN = require('bn.js');
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

### Create the Function

Create the function you will use to call the contract. All blockchain interaction are _asynchronous_, meaning that several of them can happen in parallel to each other.

```javascript
async function contractCall() {
    // Function logic goes in here.
}
```

### Create the Transaction Object

A transaction object must be created before sending the transaction to the network.

First, define the `data` variable. This is an object that is wrapped within the transasction object. It tells the network what actions you want to perform, and on which contract.

Next, create the transaction object itself. The transaction object **must** contain the following information:

| Object Key | Description |
| ---------- | ----------- |
| `from` | The address of the account that is sending this transaction. This usually comes from the `account` object. |
| `to` | The address of the contract that you want to call. |
| `data` | An object that contains information regarding the function you want to call within the contract. Any arguments you want to supply are contained within this object as well. |
| `gasPrice` | The amount of `AION` you're willing to pay for every unit of gas. This is usually set to `10000000000` |
| `gas` | The maximum you're willing to pay for the transaction. This is usually set to `2000000`. |
| `type` | The type of operating this transaction is performing. Deployments are `0x2`. All other operations are `0x1`. If you do not set the `type`, the network will assume you want to perform a `0x1` operation. You can safely leave this blank. |

```javascript
let data = web3.avm.contract.method("getCount").encode();

const transactionObject = {
    from: account.address,
    to: "CONTRACT_ADDRESS",
    data: data,
    gasPrice: 10000000000,
    gas: 2000000,
    type: "0x1",
};
```

### Query the Blockchain

Call the blockchain and wait for the response.

First off, create an `initialResponse` object using the response from calling the blockchain with the `transactionObject`. 

Once the `initialResponse` object is populated, call the contract with the response type you are expecting, and the `initialResponse` object. The response types available are defined in the [Variable Types](/aion-virtual-machine/contract-fundamental/variable-types) section.

Finally, return the response from the AVM.

```javascript
let initialResponse = await web3.eth.call(transactionObject);
let avmResponse = await web3.avm.contract.decode("int", initialResponse);
return avmResponse;
```