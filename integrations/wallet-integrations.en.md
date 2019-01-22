# Wallet Integrations

This guide is intended to help ease the process for integrating the native `AION` coin with an external wallet provider.

## Infrastructure

To set up a node please refer to [Aion Node Setup Guide](aion-node)

For more options:

1. [Blockdaemon](https://app.blockdaemon.com/dashboard) one of our partners for node hosting(often used for testing)
2. We have other [partners](https://nodesmith.io/) who work on hosting Aion nodes that we can get you alpha access
3. There's an [Aion node on Azure](https://azuremarketplace.microsoft.com/en-in/marketplace/apps/nuco-networks.aionnode?tab=Overview)

## Accounts and Keys

Generating a random Seed Key (12 word mnemonic) for a user

```json
{
  "codes": [
    {
      "code": "// import crypto libraries\nvar bip39 = require('bip39');\nvar crypto = require('crypto');\n\n// generate 16 byte random bytes\nvar  randomBytes = crypto.randomBytes(16);\n\n// generate 12 word mnemonic from random bytes\nvar mnemonic = bip39.entropyToMnemonic(randomBytes.toString('hex'));\nconsole.log(mnemonic);",
      "language": "javascript",
      "name": ""
    }
  ]
}
```

### Aion Derivation Path: 44'/425'

BIP44 standard describe this derivation path as `m / purpose' / coin_type' / account' / change' / address_index'`. One can generate multiple accounts by varying these derivation paths such as 44'/425'/0'/0'/0' , 44'/425'/0'/0'/1' and so on.

### Generate Key Pair From Mnemonic and Aion Derivation Path

You will get the same key pair every time from same mnemonic & derivation path combination.

Following code generates a key pair from
Derivation path: 44'/425'/0'/0'/0'
Mnemonic: "monitor identify enter shield fog melt dance fine zone siren swamp dizzy"

Derivation path for 3rd-party wallets might vary depending on their implementation. In that case only the root account (first account) will be the same, every next account after that will depend on the last 3 digit sections in the derivation path (0'/0'/0').

```json
{
  "codes": [
    {
      "code": "// import crypto libraries\nvar bip39 = require('bip39');\n\n// import ed25519 HD derivation library\nconst { derivePath, getMasterKeyFromSeed, getPublicKey } = require('ed25519-hd-key');\n\n// sample mnemonic\nvar mnemonic = \"monitor identify enter shield fog melt dance fine zone siren swamp dizzy\";\n\n// generate seed from mnemonic\nvar seed = bip39.mnemonicToSeed(mnemonic).toString('hex');\n\n// Sample aion derivation path 44'/425'/0'/0'/0';\nconst { key, chainCode} = derivePath(\"m/44'/425'/0'/0'/0'\", seed);\nconsole.log(\"Mnemonic => \"+mnemonic);\n\n// prints public - private key pair\nconsole.log(\"Public Key => \"+getPublicKey(key).toString('hex').substring(2,66));\nconsole.log(\"Private Key => \"+key.toString('hex')+getPublicKey(key).toString('hex').substring(2,66));",
      "language": "javascript",
      "name": "JavaScript"
    }
  ]
}
```

Expected output:

```bash
Mnemonic => monitor identify enter shield fog melt dance fine zone siren swamp dizzy
Public Key => 99da6a3d2fcacb38a8a72809854f33e1702b8502f90dd549f807ac6299a2735a
Private Key => 0ae3f0696a4e4912771a34f0b22e9a2a36192c9a2ca57f23e6e8c6fa8b653a2299da6a3d2fcacb38a8a72809854f33e1702b8502f90dd549f807ac6299a2735a
```

### Generating Aion Account Address From Key Pair

Aion account is generated from 32 byte blake2b hash of the public key and then substituting first byte of the hash with 'a0'.

```json
{
  "codes": [
    {
      "code": "// import aion-keystore library\nconst Accounts = require('aion-keystore');\nconst accs = new Accounts();\n\nconst privateKey = \"0ae3f0696a4e4912771a34f0b22e9a2a36192c9a2ca57f23e6e8c6fa8b653a2299da6a3d2fcacb38a8a72809854f33e1702b8502f90dd549f807ac6299a2735a\";\n\n// load account from private key\nconst acc = accs.privateKeyToAccount(privateKey);\nconsole.log(\"Account => \"+ acc.address);",
      "language": "javascript",
      "name": "JavaScript"
    }
  ]
}
```

Expected output:

```bash
Account => 0xa028d16f0e006e182b2744a9359cc17115c26b7ac7f10e1a8e65170fe7828c12
```

### Account Import / Export Using Keystore Files (Storage)

Aion Keystore files can be imported or exported using [aion-keystore npm package](https://www.npmjs.com/package/aion-keystore)
Keystore import/export sample code is suggested [here](https://github.com/qoire/aion-keystore/blob/master/test/test_account.js)

If you will be creating a large amount key pairs, you can utilize our [Java Offline Tool ](https://github.com/AionJayT/offlineTxTool/releases )to generate bulk key pairs quickly. There are also [Test Cases](https://github.com/AionJayT/offlineTxTool/tree/master/test/org/aion/tool) available.
[block:api-header]
{
  "title": "Transactions"
}
```

### Signing Raw Transaction Offline (Promise)

```json
{
  "codes": [
    {
      "code": "// import aion-keystore library\nconst Accounts = require('aion-keystore');\n\n// in node.js\nconst privateKey = \"0xefbc7a4bb0bf24624f97409473027b62f7ff76e3d232f167e002e1f5872cc2884dcff097bf9912b71d619fc78100de8cf7f55dfddbc2bf5f9fdc36bd670781ee\";\nconst accs = new Accounts();\n\n// load account from private key\nconst acc = accs.privateKeyToAccount(privateKey);\n\n// construct transaction payload\nconst transaction = {\n  to: \"0xa050486fc4a5c236a9072961a5b7394885443cd53a704b2630d495d2fc6c268b\",\n  data: \"\",\n  gasPrice: 10000000000,\n  gas: 21000,\n  value: new BN(\"1000000000000000000\"),\n  nonce: 1,\n  timestamp: Date.now() * 1000\n};\nacc.signTransaction(transaction)\n.then((signed) => {\n  console.log(signed);\n}).catch((err) => {\n  console.log(err);\n});",
      "language": "javascript",
      "name": "JavaScript"
    }
  ]
}
```

Expected output

```json
{
  "codes": [
    {
      "code": "{\n    messageHash: '0xfa466752c7a073d6bfd745d89f811a803e2d0654c74230ab01e656eb52fd4369',\n    signature: '0x4dcff097bf9912b71d619fc78100de8cf7f55dfddbc2bf5f9fdc36bd670781ee84be4c9fdfa713e23c6b1b7f74e77f2a65037b82088611ae496c40ffc182fce2683787da136b19872cc7d9ac95a1c3400e2345202a7b09ec67c876587818010b',\n    rawTransaction: '0xf8a001a0a050486fc4a5c236a9072961a5b7394885443cd53a704b2630d495d2fc6c268b880de0b6b3a764000080845b8457118252088800000002540be40001b8604dcff097bf9912b71d619fc78100de8cf7f55dfddbc2bf5f9fdc36bd670781ee84be4c9fdfa713e23c6b1b7f74e77f2a65037b82088611ae496c40ffc182fce2683787da136b19872cc7d9ac95a1c3400e2345202a7b09ec67c876587818010b'\n}",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
```

### Signing Raw Transactions Offline (Callback)

```json
{
  "codes": [
    {
      "code": "// import aion-keystore library\nconst Accounts = require('aion-keystore');\n\n// in node.js\nconst privateKey = \"0xefbc7a4bb0bf24624f97409473027b62f7ff76e3d232f167e002e1f5872cc2884dcff097bf9912b71d619fc78100de8cf7f55dfddbc2bf5f9fdc36bd670781ee\";\nconst accs = new Accounts();\n\n// load account from private key\nconst acc = accs.privateKeyToAccount(privateKey);\n\n// construct transaction payload\nconst transaction = {\n  to: \"0xa050486fc4a5c236a9072961a5b7394885443cd53a704b2630d495d2fc6c268b\",\n  data: \"\",\n  gasPrice: 10000000000,\n  gas: 21000,\n  value: new BN(\"1000000000000000000\"),\n  nonce: 1,\n  timestamp: Date.now() * 1000\n};\n\nacc.signTransaction(transaction, (err, res) => {\n  if (err) {\n    console.log(err);\n    return;\n  }\n\n  console.log(res);\n  // outputs same as above (promise example)\n});",
      "language": "javascript",
      "name": "JavaScript"
    }
  ]
}
```

Expected output

```json
{
  "codes": [
    {
      "code": " {\n    messageHash: '0xfa466752c7a073d6bfd745d89f811a803e2d0654c74230ab01e656eb52fd4369',\n    signature: '0x4dcff097bf9912b71d619fc78100de8cf7f55dfddbc2bf5f9fdc36bd670781ee84be4c9fdfa713e23c6b1b7f74e77f2a65037b82088611ae496c40ffc182fce2683787da136b19872cc7d9ac95a1c3400e2345202a7b09ec67c876587818010b',\n    rawTransaction: '0xf8a001a0a050486fc4a5c236a9072961a5b7394885443cd53a704b2630d495d2fc6c268b880de0b6b3a764000080845b8457118252088800000002540be40001b8604dcff097bf9912b71d619fc78100de8cf7f55dfddbc2bf5f9fdc36bd670781ee84be4c9fdfa713e23c6b1b7f74e77f2a65037b82088611ae496c40ffc182fce2683787da136b19872cc7d9ac95a1c3400e2345202a7b09ec67c876587818010b'\n  }\n",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
```

### Sending Transaction

```json
{
  "codes": [
    {
      "code": "//const accs = require('aion-keystore');\nconst BN = require('bn.js');\nconst Web3 = require(\"aion-web3\");\n\nconst web3 = new Web3(new Web3.providers.HttpProvider(\"https://api.nodesmith.io/v1/aion/testnet/jsonrpc?apiKey=730f950a5d3c4c39951c3ecbdcf30771\"));\n\n//run the node\n//import the private key\nconst privateKey = \"YOUR_PRIVATE_KEY\";\nconst acc = web3.eth.accounts.privateKeyToAccount(privateKey);\nconsole.log(acc);\n\nconst toAccount = \"TO_ACCOUNT\";\n\n\n\nweb3.eth.getBalance(acc.address).then(console.log);\n\n//construct a transaction\nconst Tx = {\n  from: acc.address,\n  to: toAccount,\n  data: \"\",\n  gasPrice: 10000000000,\n  gas: 21000,\n  value: new BN(\"30000000000000000\")\n};\n\n\nasync function signTx() {\n\n\n  let cur_nonce = web3.eth.getTransactionCount(Tx.from, /*'pending'*/(err, nonce) => {\n    if (err) {\n      console.log('getting nonce error >', err);\n      return;\n    } else {\n      console.log('Current nonce is: ', nonce);\n      return nonce;\n    }\n  });\n\n\n  let nonce_increment = 0;\n  Tx.nonce = cur_nonce + nonce_increment;\n\n  //console.log(\"Nonce assigned => \" + Tx.nonce);\n\n  let signedTx = await acc.signTransaction(Tx, (err, res) => {\n    if (err) {\n      console.log('signTx error >', err);\n      return;\n    } else {\n      console.log('signTx', res);\n      return res;\n    }\n  });\n\n\n  try {\n    web3.eth.sendSignedTransaction(\n      signedTx.rawTransaction\n      ).on('transactionHash',\n        txHash => { \n        console.log(\"txHash\", txHash) }\n      ).on('receipt',\n        receipt => { console.log(\"Here is your receipt:\\n\", receipt) }\n      ).on('error',\n        error => { \n          if (Tx.nonce != cur_nonce) {\n             console.log(\"Your transaction is in the pending queue.\");\n             return;\n          }\n          else\n            console.log(\"error\", receipt) \n        });\n  } catch(err){\n    console.log('something went wrong ->', err);\n  };\n};\n\n\nsignTx();",
      "language": "javascript",
      "name": "JavaScript"
    }
  ]
}
```

## Validation

```bash
cd aion/web3
node console.js 127.0.0.01:8545 (You can also connect to remote ip)
aion-127.0.0.1:8545> eth.getTransactionReceipt('0x97bdc27dd4e6b0700b1bcb3ed5c912bedfae7bf5014e473ada55871cdccd8eee')
```

Expected output

```json
{
  "codes": [
    {
      "code": "{ blockHash:\n   '0x315bb2a990f48de1da64b7f8a3f933e1e3a4c16c458942ece26e71256e3b8dd1',\n  nrgPrice: '0x02540be400',\n  logsBloom:\n   '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 21000,\n  contractAddress: null,\n  transactionIndex: 0,\n  transactionHash:\n   '0x97bdc27dd4e6b0700b1bcb3ed5c912bedfae7bf5014e473ada55871cdccd8eee',\n  gasLimit: '0x55f0',\n  cumulativeNrgUsed: 21000,\n  gasUsed: '0x5208',\n  blockNumber: 21,\n  root:\n   'db0dfe69eedb1be75476d7b2c43e7c223e0c0ab67c29055763673cfffd29c61d',\n  cumulativeGasUsed: '0x5208',\n  from:\n   '0xa07c95cc8729a0503c5ad50eb37ec8a27cd22d65de3bb225982ec55201366920',\n  to:\n   '0xa0dd7205acbaad446e7bd4e1755a9d1e8dd74b793656cc7af5876cba0f616bab',\n  logs: [],\n  gasPrice: '0x02540be400',\n  status: '0x1' }",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
```

## Monitoring

### Get Balance

```bash
cd aion/web3
node console.js 127.0.0.01:8545 (You can also connect to remote ip)
aion-127.0.0.1:8545> eth.getBalance('0xa0a1e55cbbffc99d9dcaf56e5350847267471cd6d69d4dead14953e5e82d97bf')
```

Expected output

```json
{
  "codes": [
    {
      "code": "BigNumber { s: 1, e: 20, c: [ 1520197, 24825377779973 ] }",
      "language": "javascript",
      "name": "Output"
    }
  ]
}
```

## Mastery Testnet & Faucet

This testnet environment was released with the latest v0.3.0 Moldoveanu Peak mainnet. You may wish to to configure your Aion node here to deploy and test out smart contracts.

### [Mastery Testnet Guide](https://docs.aion.network/docs/mastery-testnet)

### [Mastery Faucet](https://faucets.blockxlabs.com/aion)

## Using Ledger Nano S

### Account Import From Ledger Nano S

This feature takes HD derivation path as an input and returns 64-byte hex String where former 32 bytes is public key and latter is account address. Input is strictly in this sequence: 

1st Byte: Beginning of the message (‘0xeo’ for Aion)
2nd Byte: Signifies the message intention (02 for getting public key and account address)
3rd Byte: For future use (if address needs to be confirmed or just returned)
4th Byte: For future use (00 chain code)
5th Byte: Length of derivation path + 1
6th Byte: Length of derivation path / 4
7th Byte to End: Hex String of derivation path

#### Example

Input: For 44’/425’/0’/0’/0’
e002010015058000002c800001a9800000008000000080000000

Output: It may vary based on Nano S mnemonic but structure will remain same
b808763388bc601f5138e310c0b80c0db1efc9f9fb107697c209fe1e2d698e96a0208c72fad2b444b7d7195
bd0452c0f6c2f34cfa94a3691c1637da46430d196

where:
Public-key: b808763388bc601f5138e310c0b80c0db1efc9f9fb107697c209fe1e2d698e96
Account: a0208c72fad2b444b7d7195bd0452c0f6c2f34cfa94a3691c1637da46430d196

### Integrating Aion Ledger Nano S With Wallet

Driver Location: https://github.com/LedgerHQ/ledger-app-aion/tree/master/hid_driver

Ubuntu Driver Usage Example: `./aion --param=e002010015058000002c800001a9800000008000000080000000`

Windows Driver Usage Example: `npm run get:aion-hid e002010015058000002c800001a9800000008000000080000001`

### Signing Transaction on Nano S

This feature takes derivation path and RLP encoded transaction as an input and returns 64-byte signature as an output. Input is strictly in this sequence:

1st Byte :  Beginning of the message (‘0xeo’ for Aion)
2nd Byte: Signifies the message intention (04 for signing transaction)
3rd Byte: For future use (Identify the beginning but not required now as max Tx size is 230 bytes)
4th Byte: For future use (00 chain code)
5th Byte:  Length of derivation path + 1+ encoded transaction
6th Byte: Length of derivation path / 4
7th Byte till end of dongle path: Dongle path bytes
End: RLP encoded transaction bytes

#### Example

Input: For 44’/425’/0’/0’/0’

```json
{
  "codes": [
    {
      "code": "e0040000cf058000002c800001a9800000008000000080000000f8b800a0a0185ef98ac4841900b49ad9b432af2db7235e09ec3755e5ee36e9c4947007dd89056bc75e2d63100000b87ca0f2daa8de60d0e911fb468492242d60e15757408aff2902a0f2daa8de60d0e911fb468492242d604e1e11ec6f142bfee15757408aff2902a0f2daa8de60d0e911fb468492242d604e1e11ec6f142bfee15757408aff2902a0f2daa8de60d0e911fb468492242d604e1e11ec6f14a0f2daa0f2daa0f2daa0f2daa0f28332298e8252088502540be40001",
      "language": "text",
      "name": "Input"
    }
  ]
}
```

Output: 64 byte signature

```json
{
  "codes": [
    {
      "code": "1a4879c0de1c9fbabcfd0d4c0f792d9feea831d4223a2425bd6a3d360913c2d65fdda4efafa2f6eaf624e4be7cbb9e42e1c13b6415b4d37d88dade8f11224800",
      "language": "text",
      "name": "Output"
    }
  ]
}
```

[Official Aion Ledger app GitHub](https://github.com/LedgerHQ/ledger-app-aion/tree/master/test/javascript-testcases)