# web3-avm-contract

The `web3.eth.contract` package is an abstraction of the `web3.eth.abi` package for easier use of AVM Contracts on the Aion Blockchain.

To first setup use of the package, use:

```javascript
let web3 = new Web3(new Web3.providers.HttpProvider('http://localhost:8545'));
```

## AVM Contract Deployment

```javascript
web3.avm.contract.jar(jarfile).args(["String"], ["Hello World"]).init();
```

<h3>Methods and Parameters</h3>

1. The `jar` method takes a compiled AVM Contract's jar file for use
2. The `args` method encodes the list of data types (first array) and values (second array) for the initializer of an AVM Contract
3. And finally, the `init` method calls the `web3.avm.abi.readyDeploy` method to get everything together and returns back the AVM Contract's data to be sent in a transaction

## AVM Contract Methods (Encode)

```javascript
web3.avm.contract.method("setString").inputs(["String"], ["Hello AVM"]).encode();
```

<h3>Methods and Parameters</h3>

1. The `method` method accepts and handles the name of the method you wish to call from a deployed AVM Contract.
2. The `inputs` method accepts and handles the list of data types (first array) and values (second array) for the method of an AVM Contract.
3. And finally, the `encode` method calls the `web3.avm.abi.encode` method on all the parameters and returns the encoded data to be sent in a transaction or read the blockchain state.

<h3>Notes</h3>

1. For Java Contract Deployment, the type must be `0x2`. The transaction object used in any transaction or call must be of type `0x1`.
2. The `to` field of a transaction object should always hold the contract address of the AVM Contract whose method you wish to use. This is the same with FastVM contracts.
3. It is important to note that because there are different types of use cases, the data generated from `web3.avm.contract.method` may be either used to send a transaction (`web3.eth.sendTransaction`) or read the state of the blockchain (`web3.eth.call`). Methods which are mutator methods ("set-functions") that alter the state of a variable are typically those which will require a transaction to be sent. This also accounts for those which might print some message to the blockchain itself.

<h3>Example</h3>

```javascript
let data = web3.avm.contract.method("setString").inputs(["String"], ["Hello AVM"]).encode();
const txObject = {
    from: fromAddress,
    to: contractAddress
    data: data,
    gasPrice: gasPrice,
    gas: gas,
    type: '0x1'
}
let unlock = await web3.eth.personal.unlockAccount(fromAddress, fromAddressPassword, 600);
let res = await web3.eth.sendTransaction(txObject);
return res;
```

For a method which, instead reads a variable from the blockchain:

```javascript
let data = web3.avm.contract.method("getString").encode();
const txObject = {
    from: fromAddress,
    to: contractAddress
    data: data,
    gasPrice: gasPrice,
    gas: gas,
    type: '0x1'
}
let ethRes = await web3.eth.call(txObject);
let avmRes = await web3.avm.contract.decode('string', ethRes);
return avmRes;
```

## AVM Contract Decoding

```javascript
web3.avm.contract.decode('string', data);
```

<h3>Method and Parameters</h3>

1\. The `decode` method of the package simply calls the `web3.avm.abi.decode` method
