---
title: Web3.js
description: You can deploy your dApps using the Aion Web3.js JavaScript framework. This guide assumes that you have Node.js installed, have an Aion account with sufficient balance to deploy a contract, access to an Aion node connected to the Aion network, and a compiled Java dApp.
draft: true
table_of_contents: true
next_page: /developers/basics/interact/web3-js/
---

## Node Application

Follow these steps if you want to deploy a contract from your local machine using Node.js through your computers terminal.

1. Create the following `script.js` file:

    ```javascript
    // Import dependencies.
    const Web3 = require("aion-web3");
    let path = require('path');

    const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
    const privateKey = "PRIVATE_KEY";
    const account = web3.eth.accounts.privateKeyToAccount(privateKey);

    async function deploy() {
        // Import the contract jar.
        let jarPath = path.join(__dirname, 'contract', 'APPLICATION_NAME.jar');

        // Encode the contract byte code and deployement arguments.
        let data = web3.avm.contract.deploy(jarPath).args(['string', 'address'], ['Hello AVM', '0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9']).init();

        // Create the transaction object.
        const transaction = {
            from: account.address,
            data: data,
            gasPrice: 10000000000,
            gas: 5000000,
            type: '0x2'
        };

        // Sign the Transaction.
        const signedTransaction = await web3.eth.accounts.signTransaction(transaction, account.privateKey).then((transactionResponse) => signedCall = transactionResponse);
        // Send the Transaction.
        const receipt = await web3.eth.sendSignedTransaction(signedTransaction.rawTransaction).on('receipt', receipt => {
            console.log("Receipt received!\ntransactionHash =", receipt.transactionHash)
        });
        console.log(receipt);
        console.log("Contract Address: " + receipt.contractAddress);

    }
    deploy();
    ```

2. Within the script you just created, edit the `NODE_URL`, `PRIVATE_KEY` and `APPLICATION_NAME` fields.

    ```javascript
    const web3 = new Web3(new Web3.providers.HttpProvider("https://aion.api.nodesmith.io/v1/mainnet/jsonrpc?apiKey=abcd1234abcd1234"));
    const privateKey = "PRIVATE_KEY";

    ...

    let jarPath = path.join(__dirname, 'myContracts', 'example-1.0-SNAPSHOT.jar');
    ```

    `path.join(__dirname,'myContracts','contract.jar')` get the contract byte code from `contract.jar`, where the jar is located in `myContracts` folder.

3. If there are any deployment arguments to go with your contract you must include them in the `data` object.

    To deploy the contract, you need to import the contract byte code by importing the compiled jar, and then encode the contract byte code along with the deployment arguments.

    ```js
    let data = web3.avm.contract.deploy(jarPath)
        .args(['string','address'],['Hello AVM', '0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9'])
        .init();
    ```

    The contract takes two deployment arguments in order, where is a `String` and an `Address`.

    > **WARNING**: You have to pass in the deployments arguments in the same order as the fields marked [`@Initialzable`](/developers/fundamentals/avm-concepts/initializable-fields/) in the contract.

4. Then you need to create a [transaction object](https://github.com/aionnetwork/aion_web3/wiki/API:-web3-eth#parameters-9) and filled in the field as desired:

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

5. Then you can use your account to [sign the transaction](https://github.com/aionnetwork/aion_web3/wiki/API:-web3-eth-accounts#signtransaction) and [send](https://github.com/aionnetwork/aion_web3/wiki/API:-web3-eth#sendsignedtransaction) it.

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

    This fallback function will return the transaction hash and the receipt when the transaction is mined.

6. Run your deployment script with the command below:

    ```bash
    node script.js
    ```

    Here is a sample output:

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

Upon success, you will be provided with the **Transaction Hash** and the **Contract Address** which can be looked up on the [Aion Dashboard](https://mainnet.aion.network/#/dashboard) for details.
