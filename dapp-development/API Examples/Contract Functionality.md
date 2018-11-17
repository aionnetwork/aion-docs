---
title: "Contract Functionality"
excerpt: ""
---
This section will illustrate the API calls for querying the following information:
* available compilers
* current energy price
* energy estimate
* contract code
* contract storage

and performing the following actions:
* compile Solidity code
* deploy a contract
* execute a contract function
* call a contract function

The final subsection contains code illustrating all of the above interactions.
[block:api-header]
{
  "title": "Retrieve Available Compilers"
}
[/block]
The JavaScript example below shows how to query the APIs for the list of available code compilers.
The functionality is compatible with [`eth_getCompilers`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_getcompilers).
Only the Solidity compiler is currently supported.

The Aion blockchain currently does not support:
* [`eth_compileLLL`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_compilelll)
* [`eth_compileSerpent`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_compileserpent)
[block:code]
{
  "codes": [
    {
      "code": "// get list of available compilers\nlet compilers = web3.eth.getCompilers();\n\n// print\nconsole.log(\"available compilers:\");\nconsole.log(compilers);",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "available compilers:\n[ 'solidity' ]",
      "language": "text"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Compile Solidity Code"
}
[/block]
The examples below show how to use the APIs to compile solidity code.
The functionality is compatible with [`eth_compileSolidity`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_compilesolidity).
In each code snippet, the given contract is compiled and the output is printed to the standard output.

[block:code]
{
  "codes": [
    {
      "code": "// contract source code\nString source_ticker = \"contract ticker { uint public val; function tick () { val+= 1; } }\";\n\n// compile code\nMap<String, CompileResponse> result = api.getTx().compile(source_ticker).getObject();\n\n// print result\nSystem.out.println(result);",
      "language": "java"
    },
    {
      "code": "// contract source code\nconst source_ticker = 'contract ticker { uint public val; function tick () { val+= 1; } }';\n\n// compile code\nlet result = web3.eth.compile.solidity(source_ticker);\n\n// print result\nconsole.log(result);",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "{ticker=code :0x605060405234156100105760006000fd5b610015565b60c2806100236000396000f30060506040526000356c01000000000000000000000000900463ffffffff1680633c6bb43614603b5780633eaf5d9f146062576035565b60006000fd5b341560465760006000fd5b604c6075565b6040518082815260100191505060405180910390f35b3415606d5760006000fd5b6073607e565b005b60006000505481565b6001600060008282825054019250508190909055505b5600a165627a7a723058201c1817d957da90680b7c55720aff16e7a4407b31f7480f63210748a5cc4efb0c0029,\nsource :contract ticker { uint public val; function tick () { val+= 1; } },\nlanguage :,\nlanguageVersion: ,\ncompilerVersion: ,\ncompilerOption: ,\nabiDefString: [{\"outputs\":[{\"name\":\"\",\"type\":\"uint128\"}],\"constant\":true,\"payable\":false,\"inputs\":[],\"name\":\"val\",\"type\":\"function\"},{\"outputs\":[],\"constant\":false,\"payable\":false,\"inputs\":[],\"name\":\"tick\",\"type\":\"function\"}],\nabiDefinition:\n[\nconstant: true,\nanonymous: false,\npayable: false,\ntype: function,\nname: val,\ninputs:\noutputs:\n[\nindexed: false,\ntype: uint128,\nname: ,\nparamLengths:\n[\n]\n\n]\nisEvent: false,\nisConstructor: false,\nisFallback: false,\nhashed: 3c6bb436\n\n],\n[\nconstant: false,\nanonymous: false,\npayable: false,\ntype: function,\nname: tick,\ninputs:\noutputs:\nisEvent: false,\nisConstructor: false,\nisFallback: false,\nhashed: 3eaf5d9f\n\n]\nuserDoc: constant: false,\nname: ,\ntype: ,\ninputs:\noutputs:\n,\ndeveloperDocconstant: false,\nname: ,\ntype: ,\ninputs:\noutputs:\n\n}",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "{ ticker:\n   { code: '0x605060405234156100105760006000fd5b610015565b60c2806100236000396000f30060506040526000356c01000000000000000000000000900463ffffffff1680633c6bb43614603b5780633eaf5d9f146062576035565b60006000fd5b341560465760006000fd5b604c6075565b6040518082815260100191505060405180910390f35b3415606d5760006000fd5b6073607e565b005b60006000505481565b6001600060008282825054019250508190909055505b5600a165627a7a723058201c1817d957da90680b7c55720aff16e7a4407b31f7480f63210748a5cc4efb0c0029',\n     info:\n      { abiDefinition: [Array],\n        languageVersion: '0',\n        language: 'Solidity',\n        compilerVersion: '0.4.15+commit.ecf81ee5.Linux.g++',\n        source: 'contract ticker { uint public val; function tick () { val+= 1; } }' } } }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Retrieve Energy Price"
}
[/block]
The examples below show how to query the APIs for the current price per NRG in [nAmp](https://github.com/aionnetwork/aion/wiki/Aion-Terminology).
The functionality is compatible with [`eth_gasPrice`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_gasprice).
In each code snippet, the NRG price is retrieved from the API and printed to the standard output.

[block:code]
{
  "codes": [
    {
      "code": "// get NRG price\nlong price = api.getTx().getNrgPrice().getObject();\n\n// print price\nSystem.out.println(\"current NRG price = \" + price + \" nAmp\");",
      "language": "java"
    },
    {
      "code": "// get NRG price\nlet price = web3.eth.gasPrice\n\n// print price\nconsole.log(\"current NRG price = \" + price + \" nAmp\");",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "current NRG price = 10000000000 nAmp",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "current NRG price = 10000000000 nAmp",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Estimate Energy Required"
}
[/block]
The examples below show how to use the APIs to estimate the NRG required to allow the transaction to complete.
The functionality is compatible with [`eth_estimateGas`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_estimategas).
In each code snippet, the NRG estimate is retrieved from the API and printed to the standard output.

[block:code]
{
  "codes": [
    {
      "code": "// compile contract source code\nString source_ticker = \"contract ticker { uint public val; function tick () { val+= 1; } }\";\nMap<String, CompileResponse> result = api.getTx().compile(source_ticker).getObject();\n\n// get NRG estimate for contract\nlong estimate = api.getTx().estimateNrg(result.get(\"ticker\").getCode()).getObject();\n\n// print estimate\nSystem.out.println(\"NRG estimate for contract = \" + estimate + \" NRG\");\n\n// transaction data\nAddress sender = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\nAddress receiver = Address.wrap(\"a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\");\nBigInteger amount = BigInteger.valueOf(1_000_000_000_000_000_000L); // = 1 AION\nByteArrayWrapper data = ByteArrayWrapper.wrap(\"test.message\".getBytes());\n\n// prepare transaction\nTxArgs tx = new TxArgs.TxArgsBuilder().data(data).from(sender).to(receiver).value(amount).createTxArgs();\n\n// get NRG estimate for transaction\nestimate = api.getTx().estimateNrg(tx).getObject();\n\n// print estimate\nSystem.out.println(\"NRG estimate for transaction = \" + estimate + \" NRG\");",
      "language": "java"
    },
    {
      "code": "// compile contract source code\nconst source_ticker = 'contract ticker { uint public val; function tick () { val+= 1; } }';\nlet result = web3.eth.compile.solidity(source_ticker);\n\n// get NRG estimate for contract\nlet estimate = web3.eth.estimateGas({data:result.ticker.code});\n\n// print estimate\nconsole.log(\"NRG estimate for contract = \" + estimate + \" NRG\");\n\n// transaction data\nlet sender = 'a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\nlet receiver = 'a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e';\nlet amount = 1000000000000000000; // = 1 AION\nlet data = '0x746573742e6d657373616765'; // hex for \"test.message\"\n\n// get NRG estimate for transaction\nestimate = web3.eth.estimateGas({data: data, from: sender, to: receiver, value: amount})\n\n// print estimate\nconsole.log(\"NRG estimate for transaction = \" + estimate + \" NRG\");",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "NRG estimate for contract = 233661 NRG\nNRG estimate for transaction = 21768 NRG",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "NRG estimate for contract = 233661 NRG\nNRG estimate for transaction = 21768 NRG",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Retrieve Contract Code"
}
[/block]
The examples below show how to use the APIs to retrieve the code for a contract.
The functionality is compatible with [`eth_getCode`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_getcode). In each code snippet, the contract code is retrieved from the API and printed to the standard output.
[block:code]
{
  "codes": [
    {
      "code": "// set contract account\nAddress contractAccount = Address.wrap(\"a0960fcb7d6423a0446243916c7c6360543b3d2f9c5e1c5ff7badb472b782b79\");\n\n// get code from latest block\nlong blockNumber = -1L; // indicates latest block\nbyte[] code = api.getTx().getCode(contractAccount, blockNumber).getObject();\n\n// print code\nSystem.out.println(\"0x\" + IUtils.bytes2Hex(code));",
      "language": "java"
    },
    {
      "code": "// set contract account\nlet ctAcc = 'a0960fcb7d6423a0446243916c7c6360543b3d2f9c5e1c5ff7badb472b782b79';\n\n// get code from latest block\nlet code = web3.eth.getCode(ctAcc, 'latest');\n\n// print code\nconsole.log(code);",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "0x60506040526000356c01000000000000000000000000900463ffffffff1680630fd5f53f146100545780634985e85c146100e25780638da5cb5b1461015f578063ceb35b0f146101905761004e565b60006000fd5b34156100605760006000fd5b6100e06004808035906010019082018035906010019191908080600f01601080910402601001604051908101604052809392919081815260100183838082843782019150505050505090909190808060100135903590916020019091929080356effffffffffffffffffffffffffffff1916906010019091905050610203565b005b34156100ee5760006000fd5b6101426004808035906010019082018035906010019191908080600f0160108091040260100160405190810160405280939291908181526010018383808284378201915050505050509090919050506103af565b604051808383825281601001526020019250505060405180910390f35b341561016b5760006000fd5b610173610457565b604051808383825281601001526020019250505060405180910390f35b341561019c5760006000fd5b6102016004808035906010019082018035906010019191908080600f0160108091040260100160405190810160405280939291908181526010018383808284378201915050505050509090919080806010013590359091602001909192905050610466565b005b600060005080600101549054339091149190141615156102235760006000fd5b828260026000506000876040518082805190601001908083835b60108310151561026357805182525b60108201915060108101905060108303925061023d565b6001836010036101000a03801982511681845116808217855250505050505090500191505060405180910390209060001916909060001916908252816010015260200190815260100160002090506000508282909180600101839055555050508060036000506000858582528160100152602001908152601001600020905060006101000a81548160ff02191690836f01000000000000000000000000000000900402179055507fdb8f9fd4bfba5ae615ae02e8b4d281b887225fd3d34a5ac7b8d78df768bb63e7856040518080601001828103825283818151815260100191508051906010019080838360005b8381101561036d5780820151818401525b601081019050610351565b50505050905090810190600f16801561039a5780820380516001836010036101000a031916815260100191505b509250505060405180910390a15b5b50505050565b6000600060026000506000846040518082805190601001908083835b6010831015156103f157805182525b6010820191506010810190506010830392506103cb565b6001836010036101000a03801982511681845116808217855250505050505090500191505060405180910390209060001916909060001916908252816010015260200190815260100160002090506000508060010154905491509150610452565b915091565b60006000508060010154905482565b600060005080600101549054339091149190141615156104865760006000fd5b818160026000506000866040518082805190601001908083835b6010831015156104c657805182525b6010820191506010810190506010830392506104a0565b6001836010036101000a038019825116818451168082178552505050505050905001915050604051809103902090600019169090600019169082528160100152602001908152601001600020905060005082829091806001018390555550505081817fa226db3f664042183ee0281230bba26cbf7b5057e50aee7f25a175ff45ce4d7f60405160405180910390a25b5b5050505600a165627a7a723058201a36e96ba95136c7bf35a644bf8d3382c49dafc64e9362b025ed6f4eb99ed0640029",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "0x60506040526000356c01000000000000000000000000900463ffffffff1680630fd5f53f146100545780634985e85c146100e25780638da5cb5b1461015f578063ceb35b0f146101905761004e565b60006000fd5b34156100605760006000fd5b6100e06004808035906010019082018035906010019191908080600f01601080910402601001604051908101604052809392919081815260100183838082843782019150505050505090909190808060100135903590916020019091929080356effffffffffffffffffffffffffffff1916906010019091905050610203565b005b34156100ee5760006000fd5b6101426004808035906010019082018035906010019191908080600f0160108091040260100160405190810160405280939291908181526010018383808284378201915050505050509090919050506103af565b604051808383825281601001526020019250505060405180910390f35b341561016b5760006000fd5b610173610457565b604051808383825281601001526020019250505060405180910390f35b341561019c5760006000fd5b6102016004808035906010019082018035906010019191908080600f0160108091040260100160405190810160405280939291908181526010018383808284378201915050505050509090919080806010013590359091602001909192905050610466565b005b600060005080600101549054339091149190141615156102235760006000fd5b828260026000506000876040518082805190601001908083835b60108310151561026357805182525b60108201915060108101905060108303925061023d565b6001836010036101000a03801982511681845116808217855250505050505090500191505060405180910390209060001916909060001916908252816010015260200190815260100160002090506000508282909180600101839055555050508060036000506000858582528160100152602001908152601001600020905060006101000a81548160ff02191690836f01000000000000000000000000000000900402179055507fdb8f9fd4bfba5ae615ae02e8b4d281b887225fd3d34a5ac7b8d78df768bb63e7856040518080601001828103825283818151815260100191508051906010019080838360005b8381101561036d5780820151818401525b601081019050610351565b50505050905090810190600f16801561039a5780820380516001836010036101000a031916815260100191505b509250505060405180910390a15b5b50505050565b6000600060026000506000846040518082805190601001908083835b6010831015156103f157805182525b6010820191506010810190506010830392506103cb565b6001836010036101000a03801982511681845116808217855250505050505090500191505060405180910390209060001916909060001916908252816010015260200190815260100160002090506000508060010154905491509150610452565b915091565b60006000508060010154905482565b600060005080600101549054339091149190141615156104865760006000fd5b818160026000506000866040518082805190601001908083835b6010831015156104c657805182525b6010820191506010810190506010830392506104a0565b6001836010036101000a038019825116818451168082178552505050505050905001915050604051809103902090600019169090600019169082528160100152602001908152601001600020905060005082829091806001018390555550505081817fa226db3f664042183ee0281230bba26cbf7b5057e50aee7f25a175ff45ce4d7f60405160405180910390a25b5b5050505600a165627a7a723058201a36e96ba95136c7bf35a644bf8d3382c49dafc64e9362b025ed6f4eb99ed0640029\n",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Retrieve Stored Value"
}
[/block]
The examples below show how to use the APIs to retrieve stored values from a contract.
The functionality is compatible with [`eth_getStorageAt`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_getstorageat).
In each code snippet, the stored values are retrieved from the API and printed to the standard output.
The contract for which the values are retrieved is [personnel.sol](https://github.com/aionnetwork/aion_qa/blob/master/Web3/test/contracts/personnel.sol) which uses the first two values to store the owner address.

[block:code]
{
  "codes": [
    {
      "code": "// view contract creation tx\nHash256 txHash = Hash256.wrap(\"0xb42a5f995450531f66e7db40efdfad2c310fa0f8dbca2a88c31fdc4837368e48\");\nTxReceipt receipt = api.getTx().getTxReceipt(txHash).getObject();\nSystem.out.println(receipt);\n\n// set contract account\nAddress contractAccount = receipt.getContractAddress();\n\n// get value from storage\nlong blockNumber = -1L; // code for latest\nString valuePos0 = api.getChain().getStorageAt(contractAccount, 0, blockNumber).getObject();\nString valuePos1 = api.getChain().getStorageAt(contractAccount, 1, blockNumber).getObject();\n\n// print values\n// in this case the first two values are the contract owner\nSystem.out.println(\"concatenated values = \" + valuePos0 + valuePos1);",
      "language": "java"
    },
    {
      "code": "// view contract creation tx\nlet txHash = '0xb42a5f995450531f66e7db40efdfad2c310fa0f8dbca2a88c31fdc4837368e48';\nlet receipt = web3.eth.getTransactionReceipt(txHash);\nconsole.log(receipt);\n\n// set contract account\nlet contractAccount = receipt.contractAddress;\n\n// get value from storage\nlet valuePos0 = web3.eth.getStorageAt(contractAccount, 0, 'latest');\nlet valuePos1 = web3.eth.getStorageAt(contractAccount, 1, 'latest');\n\n// print values\n// in this case the first two values are the contract owner\nconsole.log(\"\\nconcatenated values = \" + valuePos0 + valuePos1);",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "txIndex: 0,\nblockNumber: 298287,\nnrg: 349674,\nnrgCumulativeUsed: 349674,\nblockHash: 0x2e9b90a21f9702fde90807e42db0107ce85b8c14a99c1f9f76182ec20599eebc,\ntxHash: 0xb42a5f995450531f66e7db40efdfad2c310fa0f8dbca2a88c31fdc4837368e48,\nfrom: 0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e,\nto: 0x,\ncontractAddress: a076ddb4cf37f7cd1360de9cf2336f75f06c38655da09d4e3f9b690acf57c2e1,\nlog:\n\nconcatenated values = a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "{ blockHash: '0x2e9b90a21f9702fde90807e42db0107ce85b8c14a99c1f9f76182ec20599eebc',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 349674,\n  contractAddress: '0xa076ddb4cf37f7cd1360de9cf2336f75f06c38655da09d4e3f9b690acf57c2e1',\n  transactionIndex: 0,\n  transactionHash: '0xb42a5f995450531f66e7db40efdfad2c310fa0f8dbca2a88c31fdc4837368e48',\n  gasLimit: '0x4c4b40',\n  cumulativeNrgUsed: 349674,\n  gasUsed: '0x0555ea',\n  blockNumber: 298287,\n  root: 'e433bbbc1714c2301faf7ac447c5881f345c32f8853e121694e430219cacb9d5',\n  cumulativeGasUsed: '0x555ea',\n  from: '0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e',\n  to: '0x',\n  logs: [],\n  gasPrice: '0x02540be400',\n  status: '0x1' }\n  \nconcatenated values = 0xa0bd0ef93902d9e123521a67bef7391e0x9487e963b2346ef3b3ff78208835545e\n\n",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Deploy Contract"
}
[/block]
The examples below show how to use the APIs to deploy a contract.
In each code snippet, after deploying the contract the resulting account address, transaction hash and receipt are printed to the standard output.

Note that these examples only consider best case scenarios where the account can be unlocked, the transaction execution does not produce any errors and the transaction is eventually included in a block. A separate tutorial will be provided with the recommended sanity checks to ensure the deployed contract is included in the main chain.
[block:code]
{
  "codes": [
    {
      "code": "// contract source code\nString source_personnel =\n        \"contract Personnel { address public owner; modifier onlyOwner() { require(msg.sender == owner); _;} \"\n                + \"mapping(bytes32 => address) private userList; /** 3 LSB bits for each privilege type */ \"\n                + \"mapping(address => bytes1) private userPrivilege; function Personnel(){ owner = msg.sender; } \"\n                + \"event UserAdded(string _stamp); event AddressAdded(address indexed _addr); \"\n                + \"function getUserAddress(string _stamp) constant returns (address){ return userList[sha3(_stamp)]; } \"\n                + \"function addUser(string _stamp, address _addr, bytes1 _userPrivilege) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; userPrivilege[_addr] = _userPrivilege; \"\n                + \"UserAdded(_stamp); } function addAddress(string _stamp, address _addr) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; AddressAdded(_addr); } }\";\n\n// compile code\nMap<String, CompileResponse> result = api.getTx().compile(source_personnel).getObject();\nCompileResponse contract = result.get(\"Personnel\");\n\n// unlock owner\nAddress owner = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\nboolean isUnlocked = api.getWallet().unlockAccount(owner, \"password\", 100).getObject();\nSystem.out.format(\"owner account %s%n\", isUnlocked ? \"unlocked\" : \"locked\");\n\n// deploy contract\nContractDeploy.ContractDeployBuilder builder = new ContractDeploy.ContractDeployBuilder()\n        .compileResponse(contract).value(BigInteger.ZERO).nrgPrice(NRG_PRICE_MIN)\n        .nrgLimit(NRG_LIMIT_CONTRACT_CREATE_MAX).from(owner).data(ByteArrayWrapper.wrap(Bytesable.NULL_BYTE));\n\nDeployResponse contractResponse = api.getTx().contractDeploy(builder.createContractDeploy()).getObject();\n\n// print response\nHash256 txHash = contractResponse.getTxid();\nAddress contractAccount = contractResponse.getAddress();\nSystem.out.format(\"%ntransaction hash:%n\\t%s%ncontract address: %n\\t%s%n\", txHash, contractAccount);\n\n// get & print receipt\nTxReceipt txReceipt = api.getTx().getTxReceipt(txHash).getObject();\nSystem.out.format(\"%ntransaction receipt:%n%s%n\", txReceipt);",
      "language": "java"
    },
    {
      "code": "// contract source code\nString source_personnel =\n        \"contract Personnel { address public owner; modifier onlyOwner() { require(msg.sender == owner); _;} \"\n                + \"mapping(bytes32 => address) private userList; /** 3 LSB bits for each privilege type */ \"\n                + \"mapping(address => bytes1) private userPrivilege; function Personnel(){ owner = msg.sender; } \"\n                + \"event UserAdded(string _stamp); event AddressAdded(address indexed _addr); \"\n                + \"function getUserAddress(string _stamp) constant returns (address){ return userList[sha3(_stamp)]; } \"\n                + \"function addUser(string _stamp, address _addr, bytes1 _userPrivilege) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; userPrivilege[_addr] = _userPrivilege; \"\n                + \"UserAdded(_stamp); } function addAddress(string _stamp, address _addr) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; AddressAdded(_addr); } }\";\n\n// unlock owner\nAddress owner = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\nboolean isUnlocked = api.getWallet().unlockAccount(owner, \"password\", 100).getObject();\nSystem.out.format(\"owner account %s%n\", isUnlocked ? \"unlocked\" : \"locked\");\n\n// clear old deploy\napi.getContractController().clear();\n\n// deploy contract\nApiMsg msg = api.getContractController()\n        .createFromSource(source_personnel, owner, NRG_LIMIT_CONTRACT_CREATE_MAX, NRG_PRICE_MIN);\n\nif (msg.isError()) {\n    System.out.println(\"deploy contract failed! \" + msg.getErrString());\n} else {\n    // get contract\n    IContract contractResponse = api.getContractController().getContract();\n\n    // print response\n    Hash256 txHash = contractResponse.getDeployTxId();\n    Address contractAccount = contractResponse.getContractAddress();\n    System.out.format(\"%ntransaction hash:%n\\t%s%ncontract address: %n\\t%s%n\", txHash, contractAccount);\n\n    // get & print receipt\n    TxReceipt txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n    System.out.format(\"%ntransaction receipt:%n%s%n\", txReceipt);\n}",
      "language": "java",
      "name": "Java (alternative: contract controller)"
    },
    {
      "code": "// contract source code\nconst source_personnel = \"contract Personnel { address public owner; modifier onlyOwner() { require(msg.sender == owner); _;} \"\n                + \"mapping(bytes32 => address) private userList; /** 3 LSB bits for each privilege type */ \"\n                + \"mapping(address => bytes1) private userPrivilege; function Personnel(){ owner = msg.sender; } \"\n                + \"event UserAdded(string _stamp); event AddressAdded(address indexed _addr); \"\n                + \"function getUserAddress(string _stamp) constant returns (address){ return userList[sha3(_stamp)]; } \"\n                + \"function addUser(string _stamp, address _addr, bytes1 _userPrivilege) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; userPrivilege[_addr] = _userPrivilege; \"\n                + \"UserAdded(_stamp); } function addAddress(string _stamp, address _addr) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; AddressAdded(_addr); } }\";\n\n// compile code\nlet result = web3.eth.compile.solidity(source_personnel);\nlet abi = result.Personnel.info.abiDefinition;\nlet code = result.Personnel.code;\n\n// unlock owner\nlet owner = 'a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\nlet isUnlocked = web3.personal.unlockAccount(owner, \"password\", 100);\nconsole.log(\"owner account \" + (isUnlocked ? \"unlocked\" : \"locked\"));\n\n// deploy contract\nlet response = web3.eth.contract(abi).new({from: owner, data: code, gasPrice: 10000000000, gas: 5000000});\n\n// print response\nlet txHash = response.transactionHash;\nlet contractAccount = response.address;\n// note that the address is not defined in the response\nconsole.log(\"\\ntransaction hash:\\n\\t\" + txHash + \"\\ncontract address:\\n\\t\" + contractAccount);\n\n// get & print receipt\ntxReceipt = web3.eth.getTransactionReceipt(txHash);\n// repeat till tx processed\nwhile (txReceipt == null) {\n  // wait 10 sec\n  sleep(10000);\n  txReceipt = web3.eth.getTransactionReceipt(txHash);\n}\n// getting the address from the receipt\ncontractAccount = txReceipt.contractAddress;\nconsole.log(\"\\ncontract address:\\n\\t\" + contractAccount);\n// print full receipt\nconsole.log(\"\\ntransaction receipt:\");\nconsole.log(txReceipt);\n\nfunction sleep(ms) {\n  return new Promise(resolve => setTimeout(resolve, ms));\n}",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "owner account unlocked\n\ntransaction hash:\n\t226b57f1b342892718e3776c6d9e53256e26b53714e291c4aff892b5ab9c259b\ncontract address:\n\ta0c751cd789de21265f16d1c2cf6e9c5bf56fd1cbeb30704fd2b017e4ef65e8f\n\ntransaction receipt:\ntxIndex: 0,\nblockNumber: 307647,\nnrg: 349674,\nnrgCumulativeUsed: 349674,\nblockHash: 0x8882810ca8481b5532055c00beb44a121e0ca47c77fca099f4aa204649024282,\ntxHash: 0x226b57f1b342892718e3776c6d9e53256e26b53714e291c4aff892b5ab9c259b,\nfrom: 0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5,\nto: 0x,\ncontractAddress: a0c751cd789de21265f16d1c2cf6e9c5bf56fd1cbeb30704fd2b017e4ef65e8f,\nlog:",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "owner account unlocked\n\ntransaction hash:\n\t0x1957290572a6785f550adcaaeedccc6c71c78ba60f7e236b23ae8ae0ccb798a1\ncontract address:\n\tundefined\n\ncontract address:\n\t0xa0effc1986a633667d32cccc3402457a6badfed493dcb545c11ef5fd3decdc0e\n\ntransaction receipt:\n{ blockHash: '0x574b8ffef09084283aa3febfca060ba33724f5d8cd028877941e56dff782c318',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 349674,\n  contractAddress: '0xa0effc1986a633667d32cccc3402457a6badfed493dcb545c11ef5fd3decdc0e',\n  transactionIndex: 0,\n  transactionHash: '0x1957290572a6785f550adcaaeedccc6c71c78ba60f7e236b23ae8ae0ccb798a1',\n  gasLimit: '0x4c4b40',\n  cumulativeNrgUsed: 349674,\n  gasUsed: '0x0555ea',\n  blockNumber: 313456,\n  root: '0bb58744440f2cd6951081956dfbe0e447dec5e34b80324ff1ccce0950242b94',\n  cumulativeGasUsed: '0x555ea',\n  from: '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  to: '0x',\n  logs: [],\n  gasPrice: '0x02540be400',\n  status: '0x1' }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Execute Contract Function"
}
[/block]
The examples below show how to use the APIs to execute a contract function. In each code snippet, a function to add information to the contract is executed after which we use a get function to verify the value was added. The transaction hashes for both calls are printed to the standard output. Note that the get call does not create a transaction.
[block:code]
{
  "codes": [
    {
      "code": "// input values\nHash256 txHash = Hash256.wrap(\"0xb35c28a10bc996f1cdd81425e6c90d4c841ed6ba6c7f039e76d448a6c869d7bc\");\nString source_personnel =\n        \"contract Personnel { address public owner; modifier onlyOwner() { require(msg.sender == owner); _;} \"\n                + \"mapping(bytes32 => address) private userList; /** 3 LSB bits for each privilege type */ \"\n                + \"mapping(address => bytes1) private userPrivilege; function Personnel(){ owner = msg.sender; } \"\n                + \"event UserAdded(string _stamp); event AddressAdded(address indexed _addr); \"\n                + \"function getUserAddress(string _stamp) constant returns (address){ return userList[sha3(_stamp)]; } \"\n                + \"function addUser(string _stamp, address _addr, bytes1 _userPrivilege) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; userPrivilege[_addr] = _userPrivilege; \"\n                + \"UserAdded(_stamp); } function addAddress(string _stamp, address _addr) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; AddressAdded(_addr); } }\";\nString addressToAdd = \"a0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab\";\nString keyToAdd = \"key-ab123\";\n\n// get contract object parameters\nTxReceipt txReceipt = api.getTx().getTxReceipt(txHash).getObject();\nAddress contractAccount = txReceipt.getContractAddress();\nAddress ownerAddress = txReceipt.getFrom();\nString abiDefinition = ((Map<String, CompileResponse>) api.getTx().compile(source_personnel).getObject())\n        .get(\"Personnel\").getAbiDefString();\n\n// get contract object using ownerAddress & contractAccount & abiDefinition\nIContract ctr = api.getContractController().getContractAt(ownerAddress, contractAccount, abiDefinition);\n\n// unlock account\napi.getWallet().unlockAccount(ownerAddress, \"password\");\n\n// execute function: adding a user address\nContractResponse rsp = ctr.newFunction(\"addAddress\").setFrom(ownerAddress).setParam(ISString.copyFrom(keyToAdd))\n        .setParam(IAddress.copyFrom(addressToAdd)).setTxNrgLimit(NRG_LIMIT_TX_MAX).setTxNrgPrice(NRG_PRICE_MIN)\n        .build().execute().getObject();\n\nSystem.out.println(\"ADD response:\\n\" + rsp);\n\n// wait for tx to be processed\nThread.sleep(30000L);\n// get & print receipt\ntxReceipt = api.getTx().getTxReceipt(rsp.getTxHash()).getObject();\nSystem.out.format(\"ADD transaction receipt:%n%s%n\", txReceipt);\n\n// call function: getting a user address\nrsp = ctr.newFunction(\"getUserAddress\").setParam(ISString.copyFrom(keyToAdd)).build().execute().getObject();\n\nSystem.out.println(\"GET response:\\n\" + rsp);\n\n// checking that received value matches input\nString received = Address.wrap((byte[]) rsp.getData().get(0)).toString();\nif (!received.equals(addressToAdd)) {\n    System.out.format(\"%nThe received value:%n%s%ndoes not match the given parameter:%n%s%n\",\n                      received,\n                      addressToAdd);\n} else {\n    System.out.format(\"%nThe received value:%n%s%nmatches the given parameter:%n%s%n\", received, addressToAdd);\n}",
      "language": "java"
    },
    {
      "code": "// input values\nlet txHash = '0xb35c28a10bc996f1cdd81425e6c90d4c841ed6ba6c7f039e76d448a6c869d7bc';\nconst source_personnel = \"contract Personnel { address public owner; modifier onlyOwner() { require(msg.sender == owner); _;} \"\n                + \"mapping(bytes32 => address) private userList; /** 3 LSB bits for each privilege type */ \"\n                + \"mapping(address => bytes1) private userPrivilege; function Personnel(){ owner = msg.sender; } \"\n                + \"event UserAdded(string _stamp); event AddressAdded(address indexed _addr); \"\n                + \"function getUserAddress(string _stamp) constant returns (address){ return userList[sha3(_stamp)]; } \"\n                + \"function addUser(string _stamp, address _addr, bytes1 _userPrivilege) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; userPrivilege[_addr] = _userPrivilege; \"\n                + \"UserAdded(_stamp); } function addAddress(string _stamp, address _addr) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; AddressAdded(_addr); } }\";\nlet addressToAdd = \"0xa0ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab\";\nlet keyToAdd = \"key-ab456\";\n\n// get contract object parameters\nlet txReceipt = web3.eth.getTransactionReceipt(txHash);\nlet contractAccount = txReceipt.contractAddress;\nlet ownerAddress = txReceipt.from;\nlet abiDefinition = web3.eth.compile.solidity(source_personnel).Personnel.info.abiDefinition;\n\n// get contract object using ownerAddress & contractAccount & abiDefinition\nlet ctr = web3.eth.contract(abiDefinition).at(contractAccount);\n\n// unlock account\nweb3.personal.unlockAccount(ownerAddress, \"password\", 100);\n\n// execute function: adding a user address\nlet rsp = ctr.addAddress(keyToAdd, addressToAdd, {from: ownerAddress, gas: 2000000, gasPrice: 10000000000});\n\nconsole.log(\"ADD response: \" + rsp);\n\n// get & print receipt\ntxReceipt = web3.eth.getTransactionReceipt(rsp);\n// repeat till tx processed\nwhile (txReceipt == null) {\n  // wait 10 sec\n  sleep(10000);\n  txReceipt = web3.eth.getTransactionReceipt(rsp);\n}\nconsole.log(\"\\nADD transaction receipt:\")\nconsole.log(txReceipt);\n\n// call function: getting a user address\nrsp = ctr.getUserAddress(keyToAdd);\n\nconsole.log(\"\\nGET response: \" + rsp);\n\n// checking that received value matches input\nif (!rsp == addressToAdd) {\n    console.log(\"\\nThe received value:\\n%s\\n does not match the given parameter:\\n%s\\n\", rsp, addressToAdd);\n} else {\n    console.log(\"\\nThe received value:\\n%s\\nmatches the given parameter:\\n%s\\n\", rsp, addressToAdd);\n}\n\nfunction sleep(ms) {\n  return new Promise(resolve => setTimeout(resolve, ms));\n}",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "ADD response:\nconstant: false,\ndata:\ntransactionHash: 8e2f8e2b18033aed17bead6dddca8ec2a8290bdb3e317ec82cc5ed89eea6c4b4,\nstatus: Transaction Done.,\nerror: null\n\nADD transaction receipt:\ntxIndex: 0,\nblockNumber: 314761,\nnrg: 44010,\nnrgCumulativeUsed: 44010,\nblockHash: 0xe6a5d4fbde342bc11f3e6b9c9bd97ab8a0db12b60a2581dbc330fcc9510ba6cc,\ntxHash: 0x8e2f8e2b18033aed17bead6dddca8ec2a8290bdb3e317ec82cc5ed89eea6c4b4,\nfrom: 0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5,\nto: 0xa0f2bc28cc71bf81e38e91bcfdd1a89e8b67af39b65d3a046b1627482a0a72e5,\ncontractAddress: ,\nlog:\n[\n  address: 0xa0f2bc28cc71bf81e38e91bcfdd1a89e8b67af39b65d3a046b1627482a0a72e5,\n  data: 0x,\n  topics:\n  [\n    0x0xa226db3f664042183ee0281230bba26cbf7b5057e50aee7f25a175ff45ce4d7f,\n    0x0xa0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab\n  ]\n]\n\nGET response:\nconstant: true,\ndata:\n[a0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab]\ntransactionHash: 0000000000000000000000000000000000000000000000000000000000000000,\nstatus: Api failed.,\nerror: null\n\n\nThe received value:\na0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab\nmatches the given parameter:\na0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "ADD response: 0xb1bdd53910ae2fb4155f48bfc0b65f02faf3221f90a929168526e334f828f771\n\nADD transaction receipt:\n{ blockHash: '0x544f3af1d55207705a1c38cb89cc0a5295a2d874993159f3edf3389397a8f094',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000004000000400000000000000000000000000000000000000000000000000000000000000000000000000000000400000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000080000000000000000000000000000000000000020000000000400000000000000000000000000000000000000000000002000000000000000000000200000000400000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 68010,\n  contractAddress: null,\n  transactionIndex: 0,\n  transactionHash: '0xb1bdd53910ae2fb4155f48bfc0b65f02faf3221f90a929168526e334f828f771',\n  gasLimit: '0x1e8480',\n  cumulativeNrgUsed: 68010,\n  gasUsed: '0x0109aa',\n  blockNumber: 314695,\n  root: '97bf8fa45395ce9da3304152b6d7379036bbfafa0a26241916ac6f821f075a73',\n  cumulativeGasUsed: '0x109aa',\n  from: '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  to: '0xa0f2bc28cc71bf81e38e91bcfdd1a89e8b67af39b65d3a046b1627482a0a72e5',\n  logs:\n   [ { address: '0xa0f2bc28cc71bf81e38e91bcfdd1a89e8b67af39b65d3a046b1627482a0a72e5',\n       logIndex: 0,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 314695,\n       transactionIndex: 0 } ],\n  gasPrice: '0x02540be400',\n  status: '0x1' }\n\nGET response: 0xa0ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab\n\nThe received value:\n0xa0ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab\nmatches the given parameter:\n0xa0ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Call Contract Function"
}
[/block]
The examples below show how to use the APIs to call a contract function.
The functionality is compatible with [`eth_call`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_call).

**Java**: The example in [Execute Contract Function](#ctr-execute) also applies where `ctr.newFunction("getUserAddress").setParam(ISString.copyFrom(keyToAdd)).build().execute()` defaults to a call (does not create a transaction).

**JavaScript**: The same example as in [Execute Contract Function](#ctr-execute) applies where `ctr.getUserAddress(keyToAdd)` defaults to a call (does not create a transaction).
[block:code]
{
  "codes": [
    {
      "code": "// input values\nHash256 txHash = Hash256.wrap(\"0xb35c28a10bc996f1cdd81425e6c90d4c841ed6ba6c7f039e76d448a6c869d7bc\");\nString source_personnel =\n        \"contract Personnel { address public owner; modifier onlyOwner() { require(msg.sender == owner); _;} \"\n                + \"mapping(bytes32 => address) private userList; /** 3 LSB bits for each privilege type */ \"\n                + \"mapping(address => bytes1) private userPrivilege; function Personnel(){ owner = msg.sender; } \"\n                + \"event UserAdded(string _stamp); event AddressAdded(address indexed _addr); \"\n                + \"function getUserAddress(string _stamp) constant returns (address){ return userList[sha3(_stamp)]; } \"\n                + \"function addUser(string _stamp, address _addr, bytes1 _userPrivilege) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; userPrivilege[_addr] = _userPrivilege; \"\n                + \"UserAdded(_stamp); } function addAddress(string _stamp, address _addr) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; AddressAdded(_addr); } }\";\nString addressToAdd = \"a0ab234ab234ab234ab234ab234ab234ab234ab234ab234ab234ab234ab234ab\";\nString keyToAdd = \"key-ab123\";\n\n// get contract object parameters\nTxReceipt txReceipt = api.getTx().getTxReceipt(txHash).getObject();\nAddress contractAccount = txReceipt.getContractAddress();\nAddress ownerAddress = txReceipt.getFrom();\nString abiDefinition = ((Map<String, CompileResponse>) api.getTx().compile(source_personnel).getObject())\n        .get(\"Personnel\").getAbiDefString();\n\n// get contract object using ownerAddress & contractAccount & abiDefinition\nIContract ctr = api.getContractController().getContractAt(ownerAddress, contractAccount, abiDefinition);\n\n// unlock account\napi.getWallet().unlockAccount(ownerAddress, \"password\");\n\n// call function: adding a user address\nContractResponse rsp = ctr.newFunction(\"addAddress\").setFrom(ownerAddress).setParam(ISString.copyFrom(keyToAdd))\n        .setParam(IAddress.copyFrom(addressToAdd)).setTxNrgLimit(NRG_LIMIT_TX_MAX).setTxNrgPrice(NRG_PRICE_MIN)\n        .build().call().getObject();\n\nSystem.out.println(\"ADD response:\\n\" + rsp);\n\n// call function: getting a user address\nrsp = ctr.newFunction(\"getUserAddress\").setParam(ISString.copyFrom(keyToAdd)).build().call().getObject();\n\nSystem.out.println(\"GET response:\\n\" + rsp);\n\n// checking that received value matches input\nString received = Address.wrap((byte[]) rsp.getData().get(0)).toString();\nif (!received.equals(addressToAdd)) {\n    System.out.format(\"The received value:%n%s%ndoes not match the given parameter:%n%s%n\",\n                      received,\n                      addressToAdd);\n} else {\n    System.out.format(\"The received value:%n%s%nmatches the given parameter:%n%s%n\", received, addressToAdd);\n}",
      "language": "java"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "ADD response:\nconstant: true,\ndata:\ntransactionHash: 0000000000000000000000000000000000000000000000000000000000000000,\nstatus: Api failed.,\nerror: null\n\nGET response:\nconstant: true,\ndata:\n[a0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab]\ntransactionHash: 0000000000000000000000000000000000000000000000000000000000000000,\nstatus: Api failed.,\nerror: null\n\nThe received value:\na0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab\ndoes not match the given parameter:\na0ab234ab234ab234ab234ab234ab234ab234ab234ab234ab234ab234ab234ab\n",
      "language": "text",
      "name": "Java Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Complete Examples"
}
[/block]
Each code example below illustrates APIs interactions for the following use cases:
1. get available compilers,
2. compile solidity code,
3. get current NRG price,
4. estimate needed NRG,
5. get contract code,
6. get stored value,
7. deploy a contract,
8. execute a contract function, and
9. call a contract function.
[block:code]
{
  "codes": [
    {
      "code": "package org.aion.tutorials;\n\nimport org.aion.api.IAionAPI;\nimport org.aion.api.IContract;\nimport org.aion.api.IUtils;\nimport org.aion.api.sol.IAddress;\nimport org.aion.api.sol.ISString;\nimport org.aion.api.type.*;\nimport org.aion.base.type.Address;\nimport org.aion.base.type.Hash256;\nimport org.aion.base.util.ByteArrayWrapper;\nimport org.aion.base.util.Bytesable;\n\nimport java.math.BigInteger;\nimport java.util.Map;\n\nimport static org.aion.api.ITx.*;\n\npublic class ContractExample {\n\n    public static void main(String[] args) throws InterruptedException {\n\n        // connect to Java API\n        IAionAPI api = IAionAPI.init();\n        ApiMsg apiMsg = api.connect(IAionAPI.LOCALHOST_URL);\n\n        // failed connection\n        if (apiMsg.isError()) {\n            System.out.format(\"Could not connect due to <%s>%n\", apiMsg.getErrString());\n            System.exit(-1);\n        }\n\n        // 1. eth_getCompilers\n\n        // not available/needed at present\n\n        // 2. eth_compileSolidity\n\n        // contract source code\n        String source_ticker = \"contract ticker { uint public val; function tick () { val+= 1; } }\";\n\n        // compile code\n        Map<String, CompileResponse> result = api.getTx().compile(source_ticker).getObject();\n\n        // print result\n        System.out.println(result);\n\n        // 3. eth_gasPrice\n\n        // get NRG price\n        long price = api.getTx().getNrgPrice().getObject();\n\n        // print price\n        System.out.println(\"\\ncurrent NRG price = \" + price + \" nAmp\");\n\n        // 4. eth_estimateGas\n\n        // get NRG estimate for contract\n        long estimate = api.getTx().estimateNrg(result.get(\"ticker\").getCode()).getObject();\n\n        // print estimate\n        System.out.println(\"\\nNRG estimate for contract = \" + estimate + \" NRG\");\n\n        // transaction data\n        Address sender = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\n        Address receiver = Address.wrap(\"a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\");\n        BigInteger amount = BigInteger.valueOf(1_000_000_000_000_000_000L); // = 1 AION\n        ByteArrayWrapper data = ByteArrayWrapper.wrap(\"test.message\".getBytes());\n\n        // prepare transaction\n        TxArgs tx = new TxArgs.TxArgsBuilder().data(data).from(sender).to(receiver).value(amount).createTxArgs();\n\n        // get NRG estimate for transaction\n        estimate = api.getTx().estimateNrg(tx).getObject();\n\n        // print estimate\n        System.out.println(\"\\nNRG estimate for transaction = \" + estimate + \" NRG\");\n\n        // 5. eth_getCode\n\n        // set contract account\n        Address contractAccount = Address.wrap(\"a0960fcb7d6423a0446243916c7c6360543b3d2f9c5e1c5ff7badb472b782b79\");\n\n        // get code from latest block\n        long blockNumber = -1L; // indicates latest block\n        byte[] code = api.getTx().getCode(contractAccount, blockNumber).getObject();\n\n        // print code\n        System.out.println(\"\\n0x\" + IUtils.bytes2Hex(code));\n\n        // 6. eth_getStorageAt\n\n        // view contract creation tx\n        Hash256 txHash = Hash256.wrap(\"0xb42a5f995450531f66e7db40efdfad2c310fa0f8dbca2a88c31fdc4837368e48\");\n        TxReceipt receipt = api.getTx().getTxReceipt(txHash).getObject();\n        System.out.println(\"\\n\" + receipt);\n\n        // set contract account\n        contractAccount = receipt.getContractAddress();\n\n        // get value from storage\n        String valuePos0 = api.getChain().getStorageAt(contractAccount, 0, blockNumber).getObject();\n        String valuePos1 = api.getChain().getStorageAt(contractAccount, 1, blockNumber).getObject();\n\n        // print values\n        // in this case the first two values are the contract owner\n        System.out.println(\"concatenated values = \" + valuePos0 + valuePos1);\n\n        // 7.a) deploy contract\n\n        // contract source code\n        String source_personnel =\n                \"contract Personnel { address public owner; modifier onlyOwner() { require(msg.sender == owner); _;} \"\n                        + \"mapping(bytes32 => address) private userList; /** 3 LSB bits for each privilege type */ \"\n                        + \"mapping(address => bytes1) private userPrivilege; function Personnel(){ owner = msg.sender; } \"\n                        + \"event UserAdded(string _stamp); event AddressAdded(address indexed _addr); \"\n                        + \"function getUserAddress(string _stamp) constant returns (address){ return userList[sha3(_stamp)]; } \"\n                        + \"function addUser(string _stamp, address _addr, bytes1 _userPrivilege) \"\n                        + \"onlyOwner{ userList[sha3(_stamp)] = _addr; userPrivilege[_addr] = _userPrivilege; \"\n                        + \"UserAdded(_stamp); } function addAddress(string _stamp, address _addr) \"\n                        + \"onlyOwner{ userList[sha3(_stamp)] = _addr; AddressAdded(_addr); } }\";\n\n        // compile code\n        result = api.getTx().compile(source_personnel).getObject();\n        CompileResponse contract = result.get(\"Personnel\");\n\n        // unlock owner\n        Address owner = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\n        boolean isUnlocked = api.getWallet().unlockAccount(owner, \"password\", 100).getObject();\n        System.out.format(\"\\nowner account %s%n\", isUnlocked ? \"unlocked\" : \"locked\");\n\n        // deploy contract\n        ContractDeploy.ContractDeployBuilder builder = new ContractDeploy.ContractDeployBuilder()\n                .compileResponse(contract).value(BigInteger.ZERO).nrgPrice(NRG_PRICE_MIN)\n                .nrgLimit(NRG_LIMIT_CONTRACT_CREATE_MAX).from(owner).data(ByteArrayWrapper.wrap(Bytesable.NULL_BYTE));\n\n        DeployResponse contractResponse = api.getTx().contractDeploy(builder.createContractDeploy()).getObject();\n\n        // print response\n        txHash = contractResponse.getTxid();\n        contractAccount = contractResponse.getAddress();\n        System.out.format(\"%ntransaction hash:%n\\t%s%ncontract address: %n\\t%s%n\", txHash, contractAccount);\n\n        // get & print receipt\n        TxReceipt txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n        System.out.format(\"%ntransaction receipt:%n%s%n\", txReceipt);\n\n        // 7.b) deploy contract\n\n        isUnlocked = api.getWallet().unlockAccount(owner, \"password\", 100).getObject();\n        System.out.format(\"%nowner account %s%n\", isUnlocked ? \"unlocked\" : \"locked\");\n\n        // clear old deploy\n        api.getContractController().clear();\n\n        // deploy contract\n        ApiMsg msg = api.getContractController()\n                .createFromSource(source_personnel, owner, NRG_LIMIT_CONTRACT_CREATE_MAX, NRG_PRICE_MIN);\n\n        if (msg.isError()) {\n            System.out.println(\"deploy contract failed! \" + msg.getErrString());\n        } else {\n            // get contract\n            IContract contractRsp = api.getContractController().getContract();\n\n            // print response\n            txHash = contractRsp.getDeployTxId();\n            contractAccount = contractRsp.getContractAddress();\n            System.out.format(\"%ntransaction hash:%n\\t%s%ncontract address: %n\\t%s%n\", txHash, contractAccount);\n\n            // get & print receipt\n            txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n            System.out.format(\"%ntransaction receipt:%n%s%n\", txReceipt);\n        }\n\n        // 8. execute a contract function\n\n        // input values\n        txHash = Hash256.wrap(\"0xb35c28a10bc996f1cdd81425e6c90d4c841ed6ba6c7f039e76d448a6c869d7bc\");\n        String addressToAdd = \"a0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab\";\n        String keyToAdd = \"key-ab123\";\n\n        // get contract object parameters\n        txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n        contractAccount = txReceipt.getContractAddress();\n        Address ownerAddress = txReceipt.getFrom();\n        String abiDefinition = ((Map<String, CompileResponse>) api.getTx().compile(source_personnel).getObject())\n                .get(\"Personnel\").getAbiDefString();\n\n        // get contract object using ownerAddress & contractAccount & abiDefinition\n        IContract ctr = api.getContractController().getContractAt(ownerAddress, contractAccount, abiDefinition);\n\n        // unlock account\n        api.getWallet().unlockAccount(ownerAddress, \"password\");\n\n        // execute function: adding a user address\n        ContractResponse rsp = ctr.newFunction(\"addAddress\").setFrom(ownerAddress).setParam(ISString.copyFrom(keyToAdd))\n                .setParam(IAddress.copyFrom(addressToAdd)).setTxNrgLimit(NRG_LIMIT_TX_MAX).setTxNrgPrice(NRG_PRICE_MIN)\n                .build().execute().getObject();\n\n        System.out.println(\"ADD response:\\n\" + rsp);\n\n        // wait for tx to be processed\n        Thread.sleep(30000L);\n        // get & print receipt\n        txReceipt = api.getTx().getTxReceipt(rsp.getTxHash()).getObject();\n        System.out.format(\"ADD transaction receipt:%n%s%n\", txReceipt);\n\n        // 9. eth_call\n\n        // call function: getting a user address\n        rsp = ctr.newFunction(\"getUserAddress\").setParam(ISString.copyFrom(keyToAdd)).build().call().getObject();\n\n        System.out.println(\"GET response:\\n\" + rsp);\n\n        // checking that received value matches input\n        String received = Address.wrap((byte[]) rsp.getData().get(0)).toString();\n        if (!received.equals(addressToAdd)) {\n            System.out.format(\"The received value:%n%s%ndoes not match the given parameter:%n%s%n\",\n                              received,\n                              addressToAdd);\n        } else {\n            System.out.format(\"The received value:%n%s%nmatches the given parameter:%n%s%n\", received, addressToAdd);\n        }\n\n        // disconnect from api\n        api.destroyApi();\n\n        System.exit(0);\n    }\n}",
      "language": "java"
    },
    {
      "code": "const Web3 = require('/path/to/aion/web3');\nconst web3 = new Web3(new Web3.providers.HttpProvider(\"http://localhost:8545\"));\n\n// 1. eth_getCompilers\n\n// get list of available compilers\nlet compilers = web3.eth.getCompilers();\n\n// print\nconsole.log(\"available compilers: \" + compilers + \"\\n\");\n\n// 2. eth_compileSolidity\n\n// contract source code\nconst source_ticker = 'contract ticker { uint public val; function tick () { val+= 1; } }';\n\n// compile code\nlet result = web3.eth.compile.solidity(source_ticker);\n\n// print result\nconsole.log(result);\n\n// 3. eth_gasPrice\n\n// get NRG price\nlet price = web3.eth.gasPrice\n\n// print price\nconsole.log(\"\\ncurrent NRG price = \" + price + \" nAmp\");\n\n// 4. eth_estimateGas\n\n// compile contract source code\nresult = web3.eth.compile.solidity(source_ticker);\n\n// get NRG estimate for contract\nlet estimate = web3.eth.estimateGas({data:result.ticker.code});\n\n// print estimate\nconsole.log(\"\\nNRG estimate for contract = \" + estimate + \" NRG\");\n\n// transaction data\nlet sender = 'a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\nlet receiver = 'a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e';\nlet amount = 1000000000000000000; // = 1 AION\nlet data = '0x746573742e6d657373616765'; // hex for \"test.message\"\n\n// get NRG estimate for transaction\nestimate = web3.eth.estimateGas({data: data, from: sender, to: receiver, value: amount})\n\n// print estimate\nconsole.log(\"\\nNRG estimate for transaction = \" + estimate + \" NRG\");\n\n// 5. eth_getCode\n\n// set contract account\nlet ctAcc = 'a0960fcb7d6423a0446243916c7c6360543b3d2f9c5e1c5ff7badb472b782b79';\n\n// get code from latest block\nlet code = web3.eth.getCode(ctAcc, 'latest');\n\n// print code\nconsole.log(\"\\n\" + code + \"\\n\");\n\n// 6. eth_getStorageAt\n\n// view contract creation tx\nlet txHash = '0xb42a5f995450531f66e7db40efdfad2c310fa0f8dbca2a88c31fdc4837368e48';\nlet receipt = web3.eth.getTransactionReceipt(txHash);\nconsole.log(receipt);\n\n// set contract account\nlet contractAccount = receipt.contractAddress;\n\n// get value from storage\nlet valuePos0 = web3.eth.getStorageAt(contractAccount, 0, 'latest');\nlet valuePos1 = web3.eth.getStorageAt(contractAccount, 1, 'latest');\n\n// print values\n// in this case the first two values are the contract owner\nconsole.log(\"\\nconcatenated values = \" + valuePos0 + valuePos1);\n\n// 7. deploy contract\n\n// contract source code\nconst source_personnel = \"contract Personnel { address public owner; modifier onlyOwner() { require(msg.sender == owner); _;} \"\n                + \"mapping(bytes32 => address) private userList; /** 3 LSB bits for each privilege type */ \"\n                + \"mapping(address => bytes1) private userPrivilege; function Personnel(){ owner = msg.sender; } \"\n                + \"event UserAdded(string _stamp); event AddressAdded(address indexed _addr); \"\n                + \"function getUserAddress(string _stamp) constant returns (address){ return userList[sha3(_stamp)]; } \"\n                + \"function addUser(string _stamp, address _addr, bytes1 _userPrivilege) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; userPrivilege[_addr] = _userPrivilege; \"\n                + \"UserAdded(_stamp); } function addAddress(string _stamp, address _addr) \"\n                + \"onlyOwner{ userList[sha3(_stamp)] = _addr; AddressAdded(_addr); } }\";\n\n// compile code\nresult = web3.eth.compile.solidity(source_personnel);\nlet abi = result.Personnel.info.abiDefinition;\ncode = result.Personnel.code;\n\n// unlock owner\nlet owner = 'a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\nlet isUnlocked = web3.personal.unlockAccount(owner, \"password\", 100);\nconsole.log(\"\\nowner account \" + (isUnlocked ? \"unlocked\" : \"locked\"));\n\n// deploy contract\nlet response = web3.eth.contract(abi).new({from: owner, data: code, gasPrice: 10000000000, gas: 5000000});\n\n// print response\ntxHash = response.transactionHash;\ncontractAccount = response.address;\n// note that the address is not defined in the response\nconsole.log(\"\\ntransaction hash:\\n\\t\" + txHash + \"\\ncontract address:\\n\\t\" + contractAccount);\n\n// get & print receipt\ntxReceipt = web3.eth.getTransactionReceipt(txHash);\n// repeat till tx processed\nwhile (txReceipt == null) {\n  // wait 10 sec\n  sleep(10000);\n  txReceipt = web3.eth.getTransactionReceipt(txHash);\n}\n// getting the address from the receipt\ncontractAccount = txReceipt.contractAddress;\nconsole.log(\"\\ncontract address:\\n\\t\" + contractAccount);\n// print full receipt\nconsole.log(\"\\ntransaction receipt:\");\nconsole.log(txReceipt);\n\nfunction sleep(ms) {\n  return new Promise(resolve => setTimeout(resolve, ms));\n}\n\n// 8. execute a contract function\n\n// input values\ntxHash = '0xb35c28a10bc996f1cdd81425e6c90d4c841ed6ba6c7f039e76d448a6c869d7bc';\nlet addressToAdd = \"0xa0ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab\";\nlet keyToAdd = \"key-ab456\";\n\n// get contract object parameters\ntxReceipt = web3.eth.getTransactionReceipt(txHash);\ncontractAccount = txReceipt.contractAddress;\nlet ownerAddress = txReceipt.from;\nlet abiDefinition = web3.eth.compile.solidity(source_personnel).Personnel.info.abiDefinition;\n\n// get contract object using ownerAddress & contractAccount & abiDefinition\nlet ctr = web3.eth.contract(abiDefinition).at(contractAccount);\n\n// unlock account\nweb3.personal.unlockAccount(ownerAddress, \"password\", 100);\n\n// execute function: adding a user address\nlet rsp = ctr.addAddress(keyToAdd, addressToAdd, {from: ownerAddress, gas: 2000000, gasPrice: 10000000000});\n\nconsole.log(\"\\nADD response: \" + rsp);\n\n// get & print receipt\ntxReceipt = web3.eth.getTransactionReceipt(rsp);\n// repeat till tx processed\nwhile (txReceipt == null) {\n  // wait 10 sec\n  sleep(10000);\n  txReceipt = web3.eth.getTransactionReceipt(rsp);\n}\nconsole.log(\"\\nADD transaction receipt:\")\nconsole.log(txReceipt);\n\n// 9. eth_call\n\n// call function: getting a user address\nrsp = ctr.getUserAddress(keyToAdd);\n\nconsole.log(\"\\nGET response: \" + rsp);\n\n// checking that received value matches input\nif (!rsp == addressToAdd) {\n    console.log(\"\\nThe received value:\\n%s\\n does not match the given parameter:\\n%s\\n\", rsp, addressToAdd);\n} else {\n    console.log(\"\\nThe received value:\\n%s\\nmatches the given parameter:\\n%s\\n\", rsp, addressToAdd);\n}\n\nfunction sleep(ms) {\n  return new Promise(resolve => setTimeout(resolve, ms));\n}",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "{ticker=code :0x605060405234156100105760006000fd5b610015565b60c2806100236000396000f30060506040526000356c01000000000000000000000000900463ffffffff1680633c6bb43614603b5780633eaf5d9f146062576035565b60006000fd5b341560465760006000fd5b604c6075565b6040518082815260100191505060405180910390f35b3415606d5760006000fd5b6073607e565b005b60006000505481565b6001600060008282825054019250508190909055505b5600a165627a7a723058201c1817d957da90680b7c55720aff16e7a4407b31f7480f63210748a5cc4efb0c0029,\nsource :contract ticker { uint public val; function tick () { val+= 1; } },\nlanguage :,\nlanguageVersion: ,\ncompilerVersion: ,\ncompilerOption: ,\nabiDefString: [{\"outputs\":[{\"name\":\"\",\"type\":\"uint128\"}],\"constant\":true,\"payable\":false,\"inputs\":[],\"name\":\"val\",\"type\":\"function\"},{\"outputs\":[],\"constant\":false,\"payable\":false,\"inputs\":[],\"name\":\"tick\",\"type\":\"function\"}],\nabiDefinition:\n[\nconstant: true,\nanonymous: false,\npayable: false,\ntype: function,\nname: val,\ninputs:\noutputs:\n[\nindexed: false,\ntype: uint128,\nname: ,\nparamLengths:\n[\n]\n\n]\nisEvent: false,\nisConstructor: false,\nisFallback: false,\nhashed: 3c6bb436\n\n],\n[\nconstant: false,\nanonymous: false,\npayable: false,\ntype: function,\nname: tick,\ninputs:\noutputs:\nisEvent: false,\nisConstructor: false,\nisFallback: false,\nhashed: 3eaf5d9f\n\n]\nuserDoc: constant: false,\nname: ,\ntype: ,\ninputs:\noutputs:\n,\ndeveloperDocconstant: false,\nname: ,\ntype: ,\ninputs:\noutputs:\n\n}\n\ncurrent NRG price = 10000000000 nAmp\n\nNRG estimate for contract = 233661 NRG\n\nNRG estimate for transaction = 21768 NRG\n0x60506040526000356c01000000000000000000000000900463ffffffff1680630fd5f53f146100545780634985e85c146100e25780638da5cb5b1461015f578063ceb35b0f146101905761004e565b60006000fd5b34156100605760006000fd5b6100e06004808035906010019082018035906010019191908080600f01601080910402601001604051908101604052809392919081815260100183838082843782019150505050505090909190808060100135903590916020019091929080356effffffffffffffffffffffffffffff1916906010019091905050610203565b005b34156100ee5760006000fd5b6101426004808035906010019082018035906010019191908080600f0160108091040260100160405190810160405280939291908181526010018383808284378201915050505050509090919050506103af565b604051808383825281601001526020019250505060405180910390f35b341561016b5760006000fd5b610173610457565b604051808383825281601001526020019250505060405180910390f35b341561019c5760006000fd5b6102016004808035906010019082018035906010019191908080600f0160108091040260100160405190810160405280939291908181526010018383808284378201915050505050509090919080806010013590359091602001909192905050610466565b005b600060005080600101549054339091149190141615156102235760006000fd5b828260026000506000876040518082805190601001908083835b60108310151561026357805182525b60108201915060108101905060108303925061023d565b6001836010036101000a03801982511681845116808217855250505050505090500191505060405180910390209060001916909060001916908252816010015260200190815260100160002090506000508282909180600101839055555050508060036000506000858582528160100152602001908152601001600020905060006101000a81548160ff02191690836f01000000000000000000000000000000900402179055507fdb8f9fd4bfba5ae615ae02e8b4d281b887225fd3d34a5ac7b8d78df768bb63e7856040518080601001828103825283818151815260100191508051906010019080838360005b8381101561036d5780820151818401525b601081019050610351565b50505050905090810190600f16801561039a5780820380516001836010036101000a031916815260100191505b509250505060405180910390a15b5b50505050565b6000600060026000506000846040518082805190601001908083835b6010831015156103f157805182525b6010820191506010810190506010830392506103cb565b6001836010036101000a03801982511681845116808217855250505050505090500191505060405180910390209060001916909060001916908252816010015260200190815260100160002090506000508060010154905491509150610452565b915091565b60006000508060010154905482565b600060005080600101549054339091149190141615156104865760006000fd5b818160026000506000866040518082805190601001908083835b6010831015156104c657805182525b6010820191506010810190506010830392506104a0565b6001836010036101000a038019825116818451168082178552505050505050905001915050604051809103902090600019169090600019169082528160100152602001908152601001600020905060005082829091806001018390555550505081817fa226db3f664042183ee0281230bba26cbf7b5057e50aee7f25a175ff45ce4d7f60405160405180910390a25b5b5050505600a165627a7a723058201a36e96ba95136c7bf35a644bf8d3382c49dafc64e9362b025ed6f4eb99ed0640029\ntxIndex: 0,\nblockNumber: 298287,\nnrg: 349674,\nnrgCumulativeUsed: 349674,\nblockHash: 0x2e9b90a21f9702fde90807e42db0107ce85b8c14a99c1f9f76182ec20599eebc,\ntxHash: 0xb42a5f995450531f66e7db40efdfad2c310fa0f8dbca2a88c31fdc4837368e48,\nfrom: 0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e,\nto: 0x,\ncontractAddress: a076ddb4cf37f7cd1360de9cf2336f75f06c38655da09d4e3f9b690acf57c2e1,\nlog:\n\n\nconcatenated values = a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\nowner account unlocked\n\ntransaction hash:\n\tbc3863dbc07a0020778a632622ebcd4ffea02f8790682a7bc70581c850aaf30f\ncontract address:\n\ta0ae5633cd573960ca4d92b5127e49071214440bd070fc67bce495f214b7557e\n\ntransaction receipt:\ntxIndex: 0,\nblockNumber: 314963,\nnrg: 349674,\nnrgCumulativeUsed: 349674,\nblockHash: 0x331eae747c79f23d57bd28bf52257e8da35f65f4bfd5390e1831b66e4eea3c41,\ntxHash: 0xbc3863dbc07a0020778a632622ebcd4ffea02f8790682a7bc70581c850aaf30f,\nfrom: 0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5,\nto: 0x,\ncontractAddress: a0ae5633cd573960ca4d92b5127e49071214440bd070fc67bce495f214b7557e,\nlog:\n\n\nowner account unlocked\n\ntransaction hash:\n\tbf9627f42dcb942f8f06cd82a8b8764452d3fb1fe73d19ccf10526aa8ce5ecd0\ncontract address:\n\ta0764b1ca325a15656e87216f6c4d80dc8d9e22fb99e4aa5e2529d1c8c8f4c25\n\ntransaction receipt:\ntxIndex: 0,\nblockNumber: 314965,\nnrg: 349674,\nnrgCumulativeUsed: 349674,\nblockHash: 0xbdc4b952822bf7091a55dad2f232f8ca11a6ba5146c404f5714f64447512931c,\ntxHash: 0xbf9627f42dcb942f8f06cd82a8b8764452d3fb1fe73d19ccf10526aa8ce5ecd0,\nfrom: 0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5,\nto: 0x,\ncontractAddress: a0764b1ca325a15656e87216f6c4d80dc8d9e22fb99e4aa5e2529d1c8c8f4c25,\nlog:\n\nADD response:\nconstant: false,\ndata:\ntransactionHash: db546561c8cef16a81fea509053a9917e65269bd7261191b8dd9272a9fa2fcc3,\nstatus: Transaction Done.,\nerror: null\n\nADD transaction receipt:\ntxIndex: 0,\nblockNumber: 314967,\nnrg: 44010,\nnrgCumulativeUsed: 44010,\nblockHash: 0x52ef01f0938a8dd29b67ba18bd62ad3312f172e78580ad51034994878a5865e5,\ntxHash: 0xdb546561c8cef16a81fea509053a9917e65269bd7261191b8dd9272a9fa2fcc3,\nfrom: 0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5,\nto: 0xa0f2bc28cc71bf81e38e91bcfdd1a89e8b67af39b65d3a046b1627482a0a72e5,\ncontractAddress: ,\nlog:\n[\n  address: 0xa0f2bc28cc71bf81e38e91bcfdd1a89e8b67af39b65d3a046b1627482a0a72e5,\n  data: 0x,\n  topics:\n  [\n    0x0xa226db3f664042183ee0281230bba26cbf7b5057e50aee7f25a175ff45ce4d7f,\n    0x0xa0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab\n  ]\n]\n\nGET response:\nconstant: true,\ndata:\n[a0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab]\ntransactionHash: 0000000000000000000000000000000000000000000000000000000000000000,\nstatus: Api failed.,\nerror: null\n\nThe received value:\na0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab\nmatches the given parameter:\na0ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab123ab",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "available compilers: solidity\n\n{ ticker:\n   { code: '0x605060405234156100105760006000fd5b610015565b60c2806100236000396000f30060506040526000356c01000000000000000000000000900463ffffffff1680633c6bb43614603b5780633eaf5d9f146062576035565b60006000fd5b341560465760006000fd5b604c6075565b6040518082815260100191505060405180910390f35b3415606d5760006000fd5b6073607e565b005b60006000505481565b6001600060008282825054019250508190909055505b5600a165627a7a723058201c1817d957da90680b7c55720aff16e7a4407b31f7480f63210748a5cc4efb0c0029',\n     info:\n      { abiDefinition: [Array],\n        languageVersion: '0',\n        language: 'Solidity',\n        compilerVersion: '0.4.15+commit.ecf81ee5.Linux.g++',\n        source: 'contract ticker { uint public val; function tick () { val+= 1; } }' } } }\n\ncurrent NRG price = 10000000000 nAmp\n\nNRG estimate for contract = 233661 NRG\n\nNRG estimate for transaction = 21768 NRG\n\n0x60506040526000356c01000000000000000000000000900463ffffffff1680630fd5f53f146100545780634985e85c146100e25780638da5cb5b1461015f578063ceb35b0f146101905761004e565b60006000fd5b34156100605760006000fd5b6100e06004808035906010019082018035906010019191908080600f01601080910402601001604051908101604052809392919081815260100183838082843782019150505050505090909190808060100135903590916020019091929080356effffffffffffffffffffffffffffff1916906010019091905050610203565b005b34156100ee5760006000fd5b6101426004808035906010019082018035906010019191908080600f0160108091040260100160405190810160405280939291908181526010018383808284378201915050505050509090919050506103af565b604051808383825281601001526020019250505060405180910390f35b341561016b5760006000fd5b610173610457565b604051808383825281601001526020019250505060405180910390f35b341561019c5760006000fd5b6102016004808035906010019082018035906010019191908080600f0160108091040260100160405190810160405280939291908181526010018383808284378201915050505050509090919080806010013590359091602001909192905050610466565b005b600060005080600101549054339091149190141615156102235760006000fd5b828260026000506000876040518082805190601001908083835b60108310151561026357805182525b60108201915060108101905060108303925061023d565b6001836010036101000a03801982511681845116808217855250505050505090500191505060405180910390209060001916909060001916908252816010015260200190815260100160002090506000508282909180600101839055555050508060036000506000858582528160100152602001908152601001600020905060006101000a81548160ff02191690836f01000000000000000000000000000000900402179055507fdb8f9fd4bfba5ae615ae02e8b4d281b887225fd3d34a5ac7b8d78df768bb63e7856040518080601001828103825283818151815260100191508051906010019080838360005b8381101561036d5780820151818401525b601081019050610351565b50505050905090810190600f16801561039a5780820380516001836010036101000a031916815260100191505b509250505060405180910390a15b5b50505050565b6000600060026000506000846040518082805190601001908083835b6010831015156103f157805182525b6010820191506010810190506010830392506103cb565b6001836010036101000a03801982511681845116808217855250505050505090500191505060405180910390209060001916909060001916908252816010015260200190815260100160002090506000508060010154905491509150610452565b915091565b60006000508060010154905482565b600060005080600101549054339091149190141615156104865760006000fd5b818160026000506000866040518082805190601001908083835b6010831015156104c657805182525b6010820191506010810190506010830392506104a0565b6001836010036101000a038019825116818451168082178552505050505050905001915050604051809103902090600019169090600019169082528160100152602001908152601001600020905060005082829091806001018390555550505081817fa226db3f664042183ee0281230bba26cbf7b5057e50aee7f25a175ff45ce4d7f60405160405180910390a25b5b5050505600a165627a7a723058201a36e96ba95136c7bf35a644bf8d3382c49dafc64e9362b025ed6f4eb99ed0640029\n\n{ blockHash: '0x2e9b90a21f9702fde90807e42db0107ce85b8c14a99c1f9f76182ec20599eebc',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 349674,\n  contractAddress: '0xa076ddb4cf37f7cd1360de9cf2336f75f06c38655da09d4e3f9b690acf57c2e1',\n  transactionIndex: 0,\n  transactionHash: '0xb42a5f995450531f66e7db40efdfad2c310fa0f8dbca2a88c31fdc4837368e48',\n  gasLimit: '0x4c4b40',\n  cumulativeNrgUsed: 349674,\n  gasUsed: '0x0555ea',\n  blockNumber: 298287,\n  root: 'e433bbbc1714c2301faf7ac447c5881f345c32f8853e121694e430219cacb9d5',\n  cumulativeGasUsed: '0x555ea',\n  from: '0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e',\n  to: '0x',\n  logs: [],\n  gasPrice: '0x02540be400',\n  status: '0x1' }\n\nconcatenated values = 0xa0bd0ef93902d9e123521a67bef7391e0x9487e963b2346ef3b3ff78208835545e\n\nowner account unlocked\n\ntransaction hash:\n\t0xc62efed241bca72bbf04bf018e86f55ddf76c37c90734e70eb4029821eb3d371\ncontract address:\n\tundefined\n\ncontract address:\n\t0xa0c12a380d25c48eb1ef57902ab9e9d88a260ea6d0c984269debd911e8ce6770\n\ntransaction receipt:\n{ blockHash: '0xebc27704b64416ff78aa53141652612220ff603fbd0ead7b9ec52e692137f897',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 349674,\n  contractAddress: '0xa0c12a380d25c48eb1ef57902ab9e9d88a260ea6d0c984269debd911e8ce6770',\n  transactionIndex: 0,\n  transactionHash: '0xc62efed241bca72bbf04bf018e86f55ddf76c37c90734e70eb4029821eb3d371',\n  gasLimit: '0x4c4b40',\n  cumulativeNrgUsed: 349674,\n  gasUsed: '0x0555ea',\n  blockNumber: 315024,\n  root: '262b17599aae7369a19c08880a4164eb329ae2ff93f3c047ec6a7693782307cb',\n  cumulativeGasUsed: '0x555ea',\n  from: '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  to: '0x',\n  logs: [],\n  gasPrice: '0x02540be400',\n  status: '0x1' }\n\nADD response: 0xb4636988594e8c76f5a666c8fb9d9fd85eee62bc41b0c6376050150665dc07f2\n\nADD transaction receipt:\n{ blockHash: '0x01c1363c109ef49b735603141fbb6c30f8ecb7bf4d9c51e27fd8ce8090cfb493',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000004000000400000000000000000000000000000000000000000000000000000000000000000000000000000000400000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000080000000000000000000000000000000000000020000000000400000000000000000000000000000000000000000000002000000000000000000000200000000400000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 44010,\n  contractAddress: null,\n  transactionIndex: 0,\n  transactionHash: '0xb4636988594e8c76f5a666c8fb9d9fd85eee62bc41b0c6376050150665dc07f2',\n  gasLimit: '0x1e8480',\n  cumulativeNrgUsed: 44010,\n  gasUsed: '0x00abea',\n  blockNumber: 315026,\n  root: 'c24aa18c7b77d72d2a554feada58228fe9938f6de3cc6124e3bf103eff0bbc10',\n  cumulativeGasUsed: '0xabea',\n  from: '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  to: '0xa0f2bc28cc71bf81e38e91bcfdd1a89e8b67af39b65d3a046b1627482a0a72e5',\n  logs:\n   [ { address: '0xa0f2bc28cc71bf81e38e91bcfdd1a89e8b67af39b65d3a046b1627482a0a72e5',\n       logIndex: 0,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 315026,\n       transactionIndex: 0 } ],\n  gasPrice: '0x02540be400',\n  status: '0x1' }\n\nGET response: 0xa0ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab\n\nThe received value:\n0xa0ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab\nmatches the given parameter:\n0xa0ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab456ab",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]