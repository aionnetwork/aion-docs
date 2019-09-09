const web3 = new Web3(new Web3.providers.HttpProvider("https://aion.api.nodesmith.io/v1/mastery/jsonrpc?apiKey=ab40c8f567874400a69c1e80a1399350"));
const privateKey = "269a1fd07297bd5e89ad1b55feaf809f90aaf7426c0d96579653939b5a468466cfb364bd76d41c6d322928a042b44c5e8e06bde11b2177f8888304f364e30f44";

// =================
// Deploy a contract
// =================
async function deployContract() {
    // Tell Web3.js where the compiled jar file is
    let jarPath = path.join(__dirname, 'project-files', 'SecretMessages.jar');

    // Set the deployment arguments.
    let data = web3.avm.contract.deploy(jarPath).args(['int'], [703]).init();

    // Create a transaction object.
    const transactionObject = {
        from: account.address,
        data: data,
        gasPrice: 10000000000,
        gas: 5000000,
        value: 0,
        type: '0x2' // AVM Java Contract deployment type.
    };

    const signedTransaction = await web3.eth.accounts.signTransaction(
        transactionObject, account.privateKey
    ).then((res) => signedCall = res);

    console.log(signedTransaction);
    const receipt = await web3.eth.sendSignedTransaction(
        signedTransaction.rawTransaction
    ).on('receipt', receipt => {
        console.log("Receipt received!\nTransaction Hash: ", receipt.transactionHash)
    });

    console.log("Contract Address: ", receipt.contractAddress);
}


// ===============
// Call a contract
// ===============
async function callContract() {
    const ctAddress = "0xa09235Ec0FB31F36c5bDca7D816dec2C087769C225978DF552d0361e2A2D5906";

    //calling method getString() which takes no argument, and returns a string
    let data = web3.avm.contract.method('getCount').inputs([], []).encode();

    console.log(data);

    const Tx = {
        from: account.address,
        to: ctAddress,
        data: data,
        gasPrice: 10000000000,
        gas: 2000000,
        type: 0x1 //method call
    };


    let res = await web3.eth.call(Tx);
    let avmRes = await web3.avm.contract.decode('int', res);
    console.log(avmRes);
    return avmRes;
}

// ============================
// Make a Change to the Network
// ============================
async function createAccount() {
    const account = web3.eth.accounts.create(web3.utils.randomHex(32));
    return account;
}

// ============================
// Make a Change to the Network
// ============================
async function changeTheBlockchain() {
    const ctAddress = "0xa09235Ec0FB31F36c5bDca7D816dec2C087769C225978DF552d0361e2A2D5906";

    //calling method incrementCounter() which takes one integer argument
    let data = web3.avm.contract.method('incrementCounter').inputs(['int'], [7]).encode();


    console.log(data);
    //construct a transaction
    const Tx = {
        from: account.address,
        to: ctAddress,
        data: data,
        gasPrice: 10000000000,
        gas: 2000000,
        type: 0x1
    };


    //client signing
    const signed = await web3.eth.accounts.signTransaction(
        Tx, account.privateKey
    ).then((res) => signedCall = res);

    console.log(signed);
    const re = await web3.eth.sendSignedTransaction(signed.rawTransaction).on('receipt', receipt => {
        console.log("Receipt received!\ntxHash =", receipt.transactionHash)
    });

    console.log(re);
    console.log(re.logs[0].topics) //make a note on event log
}