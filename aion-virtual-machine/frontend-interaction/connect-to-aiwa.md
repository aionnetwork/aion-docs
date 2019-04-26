# Connect to AIWA

Connect a webpage to AIWA.

## Send Transaction Example

```java
 //send transaction to the smart contract
    //calling method "incrementCounter", passing in one arg which is a `int`
     incrementCounterTransaction   = async (increment) => {

        //set web3
        let web3 = new Web3(
            new Web3.providers.HttpProvider("https://aion.api.nodesmith.io/v1/avmtestnet/jsonrpc?apiKey=ec13c1ff5f65488fa6432f5f79e595f6")
        );


        //the contract method you want to call
        let data = web3.avm.contract.method('incrementCounter').inputs(['int'],[increment]).encode();

        const txObject = {
            from: window.aionweb3.account[0], //get current account from aiwa
            to: "0xa0FA8118c6B9065789E10eC8a00d618dF053E9f4c7F37258E7b1288bBB148601",
            data: data,
            gas: 2000000,
            type: "0x1"  //for any transaction except for java contract deployment
        };

        try {
            await window.aionweb3.sendTransaction(txObject); //sign and send transaction via Aiwa
        } catch (err) {
            console.log(err);
        }
    };
```