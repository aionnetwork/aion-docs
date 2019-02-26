# Transaction

1. [Retrieve Transaction By Hash](#retrieve-transaction-by-hash)
2. [Retrieve Transaction By Block Hash and Index](#retrieve-transaction-by-block-hash-and-index)
3. [Retrieve Transaction By Block Number and Index](#retrieve-transaction-by-block-number-and-index)
4. [Retrieve Transaction Receipt](#retrieve-transaction-receipt)
5. [Perform Transactions](#perform-transactions)
6. [Perform Transaction with Raw Data](#perform-transaction-with-raw-data)
7. [Perform Signatures](#perform-signatures)
8. [Complete Examples](#complete-examples)

## Retrieve Transaction By Hash

The examples below show how to query the APIs for the detailed information regarding a transaction given its hash. The functionality is compatible with [`eth_getTransactionByHash`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_gettransactionbyhash). In each code snippet, the transaction details are retrieved from the API and printed to the standard output.

```json
{
  "codes": [
    {
      "code": "// specify hash\nHash256 hash = Hash256.wrap(\"0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80\");\n\n// get tx with given hash\nTransaction tx = api.getChain().getTransactionByHash(hash).getObject();\n\n// print tx information\nSystem.out.format(\"transaction details:%n%s%n\", tx);",
      "language": "java"
    },
    {
      "code": "// specify hash\nlet hash = '0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80';\n\n// get tx with given hash\nlet tx = web3.eth.getTransaction(hash);\n\n// print tx information\nconsole.log(\"transaction details:\");\nconsole.log(tx);",
      "language": "javascript"
    }
  ]
}
```

Sample output:

```json
{
  "codes": [
    {
      "code": "transaction details:\nnrgPrice: 10000000000,\nnrg: 320922,\nnonce: 447,\ntransactionIndex: 0,\ninput: 0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400,\nblockNumber: 247726,\nfrom: 0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c,\nto: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\nvalue: 0,\nhash: 0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80,\ntimestamp: 1529590672338000",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "transaction details:\n{ nrgPrice: BigNumber { s: 1, e: 10, c: [ 10000000000 ] },\n  blockHash: '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab',\n  nrg: 2000000,\n  transactionIndex: 3,\n  nonce: 447,\n  input: '0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400',\n  blockNumber: 247726,\n  gas: 2000000,\n  from: '0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c',\n  to: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n  value: BigNumber { s: 1, e: 0, c: [ 0 ] },\n  hash: '0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80',\n  gasPrice: '0x2540be400',\n  timestamp: 1529590674 }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
```

## Retrieve Transaction By Block Hash and Index

The examples below show how to query the APIs for the detailed information regarding a transaction given its index and the block hash where it occurred. The functionality is compatible with [`eth_getTransactionByBlockHashAndIndex`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_gettransactionbyblockhashandindex). In each code snippet, the transaction details are retrieved from the API and printed to the standard output.

```json
{
  "codes": [
    {
      "code": "// specify block hash\nHash256 hash = Hash256.wrap(\"0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab\");\n// specify tx index = 0 -> first tx\nint index = 0;\n\n// get tx with given hash & index\nTransaction tx = api.getChain().getTransactionByBlockHashAndIndex(hash, index).getObject();\n\n// print tx information\nSystem.out.format(\"transaction details:%n%s%n\", tx);",
      "language": "java"
    },
    {
      "code": "// specify block hash\nlet hash = '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab';\n// specify tx index = 0 -> first tx\nlet index = 0;\n\n// get tx with given hash & index\nlet tx = web3.eth.getTransactionFromBlock(hash, index);\n\n// print tx information\nconsole.log(\"transaction details:\");\nconsole.log(tx);",
      "language": "javascript"
    }
  ]
}
```

Sample output:

```json
{
  "codes": [
    {
      "code": "transaction details:\nnrgPrice: 10000000000,\nnrg: 84107,\nnonce: 367,\ntransactionIndex: 0,\ninput: 0x1fec4cc691ae034f8976efbe9c89fa3a78c19d663bf61c76c6d3dd528259fb9cb565e8db00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a064ff11a1563ef09fd5d4671272275dd962d46f7498f8d297d60bf3e4bee1eda07e5b667332c1af7a14bb51b86fe92e1cc0d2a5f0de70613c26ff3584c312c7a0a3afd832901ba4e1bc947721babb13039194ac1b780f2b13b9b86b2ed08639a09bb6e70f50e6f512e0aa3033f2477ad04f75704bcf14ce1c9aca37492cf25ba0ce3ce58c28307850315f934cda934e65252b5115aaeca58ead64e88d9569ad00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400,\nblockNumber: 247726,\nfrom: 0xa05a3889b106e75baa621b8cc719679a3dbdd799afac1ca6b42d03dc93a23687,\nto: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\nvalue: 0,\nhash: 0xdb50c83faad497dc281df5a7ae5e2aa3294431d64a7868134895d33838882045,\ntimestamp: 1529590657509000",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "transaction details:\n{ nrgPrice: BigNumber { s: 1, e: 10, c: [ 10000000000 ] },\n  blockHash: '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab',\n  nrg: 2000000,\n  transactionIndex: 0,\n  nonce: 367,\n  input: '0x1fec4cc691ae034f8976efbe9c89fa3a78c19d663bf61c76c6d3dd528259fb9cb565e8db00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a064ff11a1563ef09fd5d4671272275dd962d46f7498f8d297d60bf3e4bee1eda07e5b667332c1af7a14bb51b86fe92e1cc0d2a5f0de70613c26ff3584c312c7a0a3afd832901ba4e1bc947721babb13039194ac1b780f2b13b9b86b2ed08639a09bb6e70f50e6f512e0aa3033f2477ad04f75704bcf14ce1c9aca37492cf25ba0ce3ce58c28307850315f934cda934e65252b5115aaeca58ead64e88d9569ad00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400',\n  blockNumber: 247726,\n  gas: 2000000,\n  from: '0xa05a3889b106e75baa621b8cc719679a3dbdd799afac1ca6b42d03dc93a23687',\n  to: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n  value: BigNumber { s: 1, e: 0, c: [ 0 ] },\n  hash: '0xdb50c83faad497dc281df5a7ae5e2aa3294431d64a7868134895d33838882045',\n  gasPrice: '0x2540be400',\n  timestamp: 1529590674 }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
```

## Retrieve Transaction By Block Number and Index

The examples below show how to query the APIs for the detailed information regarding a transaction given its index and the block number where it occurred. The functionality is compatible with [`eth_getTransactionByBlockNumberAndIndex`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_gettransactionbyblocknumberandindex). In each code snippet, the transaction details are retrieved from the API and printed to the standard output.

```json
{
  "codes": [
    {
      "code": "// specify block number\nlong number = 247726L;\n// specify tx index = 1 -> second tx\nint index = 1;\n\n// get tx with given number & index\nTransaction tx = api.getChain().getTransactionByBlockNumberAndIndex(number, index).getObject();\n\n// print tx information\nSystem.out.format(\"transaction details:%n%s%n\", tx);",
      "language": "java"
    },
    {
      "code": "// specify block number\nlet number = 247726;\n// specify tx index = 1 -> second tx\nlet index = 1;\n\n// get tx with given number & index\nlet tx = web3.eth.getTransactionFromBlock(number, index);\n\n// print tx information\nconsole.log(\"transaction details:\");\nconsole.log(tx);",
      "language": "javascript"
    }
  ]
}
```

Sample output:

```json
{
  "codes": [
    {
      "code": "transaction details:\nnrgPrice: 10000000000,\nnrg: 84047,\nnonce: 368,\ntransactionIndex: 0,\ninput: 0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400,\nblockNumber: 247726,\nfrom: 0xa05a3889b106e75baa621b8cc719679a3dbdd799afac1ca6b42d03dc93a23687,\nto: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\nvalue: 0,\nhash: 0x92aef634e0194a3c70a39163c45c2f2747ec86a8e40a9c6ddb93009741be8cb0,\ntimestamp: 1529590672530000",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "transaction details:\n{ nrgPrice: BigNumber { s: 1, e: 10, c: [ 10000000000 ] },\n  blockHash: '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab',\n  nrg: 2000000,\n  transactionIndex: 1,\n  nonce: 368,\n  input: '0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400',\n  blockNumber: 247726,\n  gas: 2000000,\n  from: '0xa05a3889b106e75baa621b8cc719679a3dbdd799afac1ca6b42d03dc93a23687',\n  to: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n  value: BigNumber { s: 1, e: 0, c: [ 0 ] },\n  hash: '0x92aef634e0194a3c70a39163c45c2f2747ec86a8e40a9c6ddb93009741be8cb0',\n  gasPrice: '0x2540be400',\n  timestamp: 1529590674 }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
```

## Retrieve Transaction Receipt

The examples below show how to query the APIs for the receipt for a transaction given its hash. The functionality is compatible with [`eth_getTransactionReceipt`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_gettransactionreceipt). In each code snippet, the transaction receipt is retrieved from the API and printed to the standard output.

```json
{
  "codes": [
    {
      "code": "// specify tx hash\nHash256 hash = Hash256.wrap(\"0x2a1d8dc09f2c6670690bbda74377f59c8737df9812cf7c794fa35409d200fe3f\");\n\n// get receipt for given tx hash\nTxReceipt txReceipt = api.getTx().getTxReceipt(hash).getObject();\n\n// print tx receipt\nSystem.out.format(\"transaction receipt:%n%s%n\", txReceipt);",
      "language": "java"
    },
    {
      "code": "",
      "language": "javascript"
    }
  ]
}
```

Sample output:

```json
{
  "codes": [
    {
      "code": "transaction receipt:\ntxIndex: 2,\nblockNumber: 247726,\nnrg: 320982,\nnrgCumulativeUsed: 489136,\nblockHash: 0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab,\ntxHash: 0x2a1d8dc09f2c6670690bbda74377f59c8737df9812cf7c794fa35409d200fe3f,\nfrom: 0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c,\nto: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\ncontractAddress: ,\nlog:\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xfd24c246254d45bcfec939758f58d63bd1565596fdc53994ae974bb54f83bb69,\n    0x0x7f21f0710cfd7a24883f3d41c47ad324b49e484b56d3010250110a9cd6876c76,\n    0x0x0000000000000000000000000000000000000000000000000000000000000006,\n    0x0x0000000000000000000000000000000000000000000000000000000000000001\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa064ff11a1563ef09fd5d4671272275dd962d46f7498f8d297d60bf3e4bee1ed,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa07e5b667332c1af7a14bb51b86fe92e1cc0d2a5f0de70613c26ff3584c312c7,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa0a3afd832901ba4e1bc947721babb13039194ac1b780f2b13b9b86b2ed08639,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa09bb6e70f50e6f512e0aa3033f2477ad04f75704bcf14ce1c9aca37492cf25b,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa0ce3ce58c28307850315f934cda934e65252b5115aaeca58ead64e88d9569ad,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0x1fa305c7f8521af161de570532762ed7a60199cde79e18e1d259af3459562521,\n    0x0x91ae034f8976efbe9c89fa3a78c19d663bf61c76c6d3dd528259fb9cb565e8db,\n    0x0x7f21f0710cfd7a24883f3d41c47ad324b49e484b56d3010250110a9cd6876c76\n  ]\n]",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "transaction receipt:\n{ blockHash: '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000002000000000004000000000000000000000000000000000010000000000000000000000000000000000002000000400040000000000000000000000000000000000000400400000000000000000000000000000000800000040000800000000001040000000000008000000000000000000000000084000010008000000005000000008000000200102000000000000000008000000000000000000020000040080000000000000000000000800000006000008000000000008000000000020000000000000000400000000002000200000000000000000000000080001000000200040000000000000000000000000000000000000000000000400',\n  nrgUsed: 320982,\n  contractAddress: null,\n  transactionIndex: 2,\n  transactionHash: '0x2a1d8dc09f2c6670690bbda74377f59c8737df9812cf7c794fa35409d200fe3f',\n  gasLimit: '0x1e8480',\n  cumulativeNrgUsed: 489136,\n  gasUsed: '0x04e5d6',\n  blockNumber: 247726,\n  root: '17e8253caf42481001da608479fa8250557b2a76226b6f3cbc9924c6768c4bd0',\n  cumulativeGasUsed: '0x776b0',\n  from: '0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c',\n  to: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n  logs:\n   [ { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 0,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 1,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 2,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 3,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 4,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 5,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 6,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 } ],\n  gasPrice: '0x02540be400',\n  status: '0x1' }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
```

## Perform Transactions

The examples below show how to use the APIs to send a transaction. The functionality is compatible with [`eth_sendTransaction`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_sendtransaction). In each code snippet, the transaction receipt is retrieved from the API and printed to the standard output. Other possible transaction parameters are energy price, energy limit, and data.

Note that these examples only consider best case scenarios where the account can be unlocked, the transaction execution does not produce any errors and the transaction is eventually included in a block. A separate tutorial will be provided with the recommended sanity checks to ensure the sent transaction was included in the main chain.

```json
{
  "codes": [
    {
      "code": "// specify accounts and amount\nAddress sender = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\nAddress receiver = Address.wrap(\"a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\");\nBigInteger amount = BigInteger.valueOf(1_000_000_000_000_000_000L); // = 1 AION\n\n// unlock sender\nboolean isUnlocked = api.getWallet().unlockAccount(sender, \"password\", 100).getObject();\nSystem.out.format(\"sender account %s%n\", isUnlocked ? \"unlocked\" : \"locked\");\n\n// create transaction\nTxArgs.TxArgsBuilder builder = new TxArgs.TxArgsBuilder().from(sender).to(receiver).value(amount);\n\n// perform transaction\nHash256 txHash = ((MsgRsp) api.getTx().sendTransaction(builder.createTxArgs()).getObject()).getTxHash();\nSystem.out.format(\"%ntransaction hash: %s%n\", txHash);\n\n// print receipt\nTxReceipt txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n// repeat till tx processed\nwhile (txReceipt == null) {\n    // wait 10 sec\n    sleep(10000);\n    txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n}\nSystem.out.format(\"%ntransaction receipt:%n%s%n\", txReceipt);",
      "language": "java"
    },
    {
      "code": "// specify accounts and amount\nlet sender = 'a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\nlet receiver = 'a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e';\nlet amount = 1000000000000000000; // = 1 AION\n\n// unlock sender\nlet isUnlocked = web3.personal.unlockAccount(sender, \"password\", 100)\nlet status = isUnlocked ? \"unlocked\" : \"locked\";\nconsole.log(\"sender account \" + status);\n\n// perform transaction\nlet txHash = web3.eth.sendTransaction({from: sender, to: receiver, value: amount});\nconsole.log(\"\\ntransaction hash: \" + txHash);\n\n// print receipt\nlet txReceipt = web3.eth.getTransactionReceipt(txHash);\n// repeat till tx processed\nwhile (txReceipt == null) {\n  // wait 10 sec\n  sleep(10000);\n  txReceipt = web3.eth.getTransactionReceipt(txHash);\n}\nconsole.log(\"\\ntransaction receipt:\");\nconsole.log(txReceipt);\n\nfunction sleep(ms) {\n  return new Promise(resolve => setTimeout(resolve, ms));\n}",
      "language": "javascript"
    }
  ]
}
```

Sample output:

```json
{
  "codes": [
    {
      "code": "sender account unlocked\n\ntransaction hash: 16b43e02eec679db7adccb1587183c6012879bb3ab753ecd324e6eab0c2b802a\n\ntransaction receipt:\ntxIndex: 0,\nblockNumber: 306854,\nnrg: 21000,\nnrgCumulativeUsed: 21000,\nblockHash: 0xf00500c28fdf2027b0151a0a75ca667d6f9b91a2a60a8c472ce6a94a256fc688,\ntxHash: 0x16b43e02eec679db7adccb1587183c6012879bb3ab753ecd324e6eab0c2b802a,\nfrom: 0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5,\nto: 0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e,\ncontractAddress: ,\nlog:",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "sender account unlocked\n\ntransaction hash: 0x652109fcfdce09008df6a805c0dfb6294d0a1bb004268675c1402cc2819f01ea\n\ntransaction receipt:\n{ blockHash: '0x863811cc0169e477375bafb2c223fb5e14f3b2965fe328143678dcb764b16298',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 21000,\n  contractAddress: null,\n  transactionIndex: 0,\n  transactionHash: '0x652109fcfdce09008df6a805c0dfb6294d0a1bb004268675c1402cc2819f01ea',\n  gasLimit: '0x07a120',\n  cumulativeNrgUsed: 21000,\n  gasUsed: '0x5208',\n  blockNumber: 257956,\n  root: '3267660f820bef9d7848a9324316be6e1db003165c8512c138ffa38a4d8fd374',\n  cumulativeGasUsed: '0x5208',\n  from: '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  to: '0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e',\n  logs: [],\n  gasPrice: '0x02540be400',\n  status: '0x1' }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
```

## Perform Transaction with Raw Data

The examples below show how to use the APIs to send a transaction. The functionality is compatible with [eth_sendTransaction](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_sendtransaction). In each code snippet, the transaction receipt is retrieved from the API and printed to the standard output. Other possible transaction parameters are energy price, energy limit, and data.

Note that these examples only consider best case scenarios where the account can be unlocked, the transaction execution does not produce any errors and the transaction is eventually included in a block. A separate tutorial will be provided with the recommended sanity checks to ensure the sent transaction was included in the main chain.

```json
{
  "codes": [
    {
      "code": "// specify accounts and amount\n        Address receiver = Address.wrap(\"a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\");\n        BigInteger amount = BigInteger.valueOf(1_000_000_000_000_000_000L); // = 1 AION\n\n// create an ECKey object\n        byte[] pkSender = ByteUtil.hexStringToBytes(\"734538ff61084843f207f7fd5dab9d42157b42dc7931b27c558ff5409ff5ac858ae3f9cc3fa12f323435200397230f5dea56721d017753c65b9b6ee7bffbbb36\");\n        ECKey ecKey = ECKeyFac.inst().create().fromPrivate(pkSender);\n\n// create transaction\n        BigInteger nonce = BigInteger.ZERO;\n        AionTransaction tx0 = new AionTransaction(nonce.toByteArray()\n            , receiver\n            , amount.toByteArray()\n            , new byte[0]\n            , NRG_LIMIT_TX_MAX\n            , NRG_PRICE_MIN);\n        tx0.sign(ecKey);\n\n// perform transaction\n        Hash256 txHash = ((MsgRsp) api.getTx().sendRawTransaction(ByteArrayWrapper.wrap(tx0.getEncoded())).getObject()).getTxHash();\n        System.out.format(\"%ntransaction hash: %s%n\", txHash);\n\n// print receipt\n        TxReceipt txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n\n// repeat till tx processed\n        while (txReceipt == null) {\n            // wait 10 sec\n            sleep(10000);\n            txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n        }",
      "language": "java"
    },
    {
      "code": "// perform transaction by send raw data, the raw data is a rlp encoded transaction data including the nonce, receiver, value, data, energy limit, energy price and sender's signature. See details in the Java API example\nlet txHash = web3.eth.sendRawTransaction('0xf8a500a0a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e880de0b6b3a76400008088000574203a97ac1b831e84808800000002540be40001b8608ae3f9cc3fa12f32343$\nconsole.log(\"\\ntransaction hash: \" + txHash);\n\n// print receipt\nlet txReceipt = web3.eth.getTransactionReceipt(txHash);\n// repeat till tx processed\nwhile (txReceipt == null) {\n  // wait 10 sec\n  sleep(10000);\n  txReceipt = web3.eth.getTransactionReceipt(txHash);\n}\nconsole.log(\"\\ntransaction receipt:\");\nconsole.log(txReceipt);\n\nfunction sleep(ms) {\n  return new Promise(resolve => setTimeout(resolve, ms));\n}",
      "language": "javascript",
      "name": "JavaScript"
    }
  ]
}
```

```json
{
  "codes": [
    {
      "code": "transaction hash: 2719a9bdb85b5e25ac3b11622fbdfe0f5e9e931fae7f9fb8b6e7a4c96807e0b3\n\ntransaction receipt:\ntxIndex: 0,\nblockNumber: 923,\nnrg: 21000,\nnrgCumulativeUsed: 21000,\nblockHash: 0x576153e865c3174f8d8ef0476c4c3abd8aa16ea968b78016f953867572c65388,\ntxHash: 0x2719a9bdb85b5e25ac3b11622fbdfe0f5e9e931fae7f9fb8b6e7a4c96807e0b3,\nfrom: 0xa0290daf95c1ba93e1930a8ec6a82f1ca8f52ab2e0f3b2ef3f34ee90ae033504,\nto: 0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e,\ncontractAddress: ,\nlog: ",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "transaction hash: 0xabc04dc5e9c9a5be1b73972393c763552b6ebee2ef1bcdb4a3949f3f9283f4a0\n\ntransaction receipt:\n{ blockHash: '0x5fc524d95122d778e0a7990e6b43481e43d19579daf4fbd25f3646a6ba535714',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 21000,\n  contractAddress: null,\n  transactionIndex: 0,\n  transactionHash: '0xabc04dc5e9c9a5be1b73972393c763552b6ebee2ef1bcdb4a3949f3f9283f4a0',\n  gasLimit: '0x1e8480',\n  cumulativeNrgUsed: 21000,\n  gasUsed: '0x5208',\n  blockNumber: 10,\n  root: '41f2aff0e31677906bc216c2805f9c9bd33e9959b442bed78a19c88f3698d683',\n  cumulativeGasUsed: '0x5208',\n  from: '0xa0290daf95c1ba93e1930a8ec6a82f1ca8f52ab2e0f3b2ef3f34ee90ae033504',\n  to: '0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e',\n  logs: [],\n  gasPrice: '0x02540be400',\n  status: '0x1' }",
      "language": "text",
      "name": "Javascript Ouput"
    }
  ]
}
```

## Perform Signatures

The example below shows how to use the web3 API to sign the given data using a given account and to get the signature. The functionality is compatible with [eth_sign](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_sign). In the code snippet below, the signature for the given data is retrieved from the API and printed to the standard output.

Note that this example only considers best case scenarios where the account can be unlocked.

```json
{
  "codes": [
    {
      "code": "// specify accounts and amount\nlet signer = 'a0290daf95c1ba93e1930a8ec6a82f1ca8f52ab2e0f3b2ef3f34ee90ae033504';\nlet data = '0x9dd2c369a187b4e6b9c402f030e50743e619301ea62aa4c0737d4ef7e10a3d49';//web3.sha3(\"xyz\")\n\n// unlock signer\nlet isUnlocked = web3.personal.unlockAccount(signer, \"password\", 100)\nlet status = isUnlocked ? \"unlocked\" : \"locked\";\nconsole.log(\"signer account \" + status);\n\n// perform sign the data\nlet signature = web3.eth.sign(signer, data);\nconsole.log(\"\\signature of the data: \" + signature);",
      "language": "javascript"
    }
  ]
}
```

```json
{
  "codes": [
    {
      "code": "signer account unlocked\nsignature of the data: 0x5354a32ccf6e4cfc990f03681119454d431fd0440c30836f5201d05c875a81c5ad178d2b5f52e13e8d2ab91876c410a5abff3d21ea58ac992e38ecda86cdc607",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
```

## Complete Examples

Each code example below retrieves and prints to the standard output the following:

1. The transaction details given its hash,
2. The transaction details for a given block hash and transaction index,
3. The transaction details for a given block number and transaction index,
4. The receipt for a given transaction hash, and
5. The transaction hash and receipt for a newly performed transaction.

```json
{
  "codes": [
    {
      "code": "package org.aion.tutorials;\n\nimport org.aion.api.IAionAPI;\nimport org.aion.api.type.*;\nimport org.aion.base.type.Address;\nimport org.aion.base.type.Hash256;\n\nimport java.math.BigInteger;\n\nimport static java.lang.Thread.sleep;\n\npublic class TransactionExample {\n\n    public static void main(String[] args) throws InterruptedException {\n\n        // connect to Java API\n        IAionAPI api = IAionAPI.init();\n        ApiMsg apiMsg = api.connect(IAionAPI.LOCALHOST_URL);\n\n        // failed connection\n        if (apiMsg.isError()) {\n            System.out.format(\"Could not connect due to <%s>%n\", apiMsg.getErrString());\n            System.exit(-1);\n        }\n\n        // 1. eth_getTransactionByHash\n\n        // specify hash\n        Hash256 hash = Hash256.wrap(\"0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80\");\n\n        // get tx with given hash\n        Transaction tx = api.getChain().getTransactionByHash(hash).getObject();\n\n        // print tx information\n        System.out.format(\"transaction details:%n%s%n\", tx);\n\n        // 2. eth_getTransactionByBlockHashAndIndex\n\n        // specify block hash\n        hash = Hash256.wrap(\"0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab\");\n        // specify tx index = 0 -> first tx\n        int index = 0;\n\n        // get tx with given hash & index\n        tx = api.getChain().getTransactionByBlockHashAndIndex(hash, index).getObject();\n\n        // print tx information\n        System.out.format(\"transaction details:%n%s%n\", tx);\n\n        // 3. eth_getTransactionByBlockNumberAndIndex\n\n        // specify block number\n        long number = 247726L;\n        // specify tx index = 1 -> second tx\n        index = 1;\n\n        // get tx with given number & index\n        tx = api.getChain().getTransactionByBlockNumberAndIndex(number, index).getObject();\n\n        // print tx information\n        System.out.format(\"transaction details:%n%s%n\", tx);\n\n        // 4. eth_getTransactionReceipt\n\n        // specify tx hash\n        hash = Hash256.wrap(\"0x2a1d8dc09f2c6670690bbda74377f59c8737df9812cf7c794fa35409d200fe3f\");\n\n        // get receipt for given tx hash\n        TxReceipt txReceipt = api.getTx().getTxReceipt(hash).getObject();\n\n        // print tx receipt\n        System.out.format(\"transaction receipt:%n%s%n\", txReceipt);\n\n        // 5. eth_sendTransaction\n\n        // specify accounts and amount\n        Address sender = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\n        Address receiver = Address.wrap(\"a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\");\n        BigInteger amount = BigInteger.valueOf(1_000_000_000_000_000_000L); // = 1 AION\n\n        // unlock sender\n        boolean isUnlocked = api.getWallet().unlockAccount(sender, \"password\", 100).getObject();\n        System.out.format(\"sender account %s%n\", isUnlocked ? \"unlocked\" : \"locked\");\n\n        // create transaction\n        TxArgs.TxArgsBuilder builder = new TxArgs.TxArgsBuilder().from(sender).to(receiver).value(amount);\n\n        // perform transaction\n        Hash256 txHash = ((MsgRsp) api.getTx().sendTransaction(builder.createTxArgs()).getObject()).getTxHash();\n        System.out.format(\"%ntransaction hash: %s%n\", txHash);\n\n        // print receipt\n        txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n        // repeat till tx processed\n        while (txReceipt == null) {\n            // wait 10 sec\n            sleep(10000);\n            txReceipt = api.getTx().getTxReceipt(txHash).getObject();\n        }\n        System.out.format(\"%ntransaction receipt:%n%s%n\", txReceipt);\n\n        // disconnect from api\n        api.destroyApi();\n\n        System.exit(0);\n    }\n}",
      "language": "java"
    },
    {
      "code": "const Web3 = require('/path/to/aion/web3');\nconst web3 = new Web3(new Web3.providers.HttpProvider(\"http://localhost:8545\"));\n\n// 1. eth_getTransactionByHash\n\n// specify hash\nlet hash = '0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80';\n\n// get tx with given hash\nlet tx = web3.eth.getTransaction(hash);\n\n// print tx information\nconsole.log(\"\\ntransaction details:\");\nconsole.log(tx);\n\n// 2. eth_getTransactionByBlockHashAndIndex\n\n// specify block hash\nhash = '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab';\n// specify tx index = 0 -> first tx\nlet index = 0;\n\n// get tx with given hash & index\ntx = web3.eth.getTransactionFromBlock(hash, index);\n\n// print tx information\nconsole.log(\"\\ntransaction details:\");\nconsole.log(tx);\n\n// 3. eth_getTransactionByBlockNumberAndIndex\n\n// specify block number\nlet number = 247726;\n// specify tx index = 1 -> second tx\nindex = 1;\n\n// get tx with given number & index\ntx = web3.eth.getTransactionFromBlock(number, index);\n\n// print tx information\nconsole.log(\"\\ntransaction details:\");\nconsole.log(tx);\n\n// 4. eth_getTransactionReceipt\n\n// specify tx hash\nhash = '0x2a1d8dc09f2c6670690bbda74377f59c8737df9812cf7c794fa35409d200fe3f';\n\n// get receipt for given tx hash\nlet txReceipt = web3.eth.getTransactionReceipt(hash);\n\n// print tx receipt\nconsole.log(\"\\ntransaction receipt:\");\nconsole.log(txReceipt);\n\n// 5. eth_sendTransaction\n\n// specify accounts and amount\nlet sender = 'a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\nlet receiver = 'a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e';\nlet amount = 1000000000000000000; // = 1 AION\n\n// unlock sender\nlet isUnlocked = web3.personal.unlockAccount(sender, \"password\", 100)\nlet status = isUnlocked ? \"unlocked\" : \"locked\";\nconsole.log(\"\\nsender account \" + status);\n\n// perform transaction\nlet txHash = web3.eth.sendTransaction({from: sender, to: receiver, value: amount});\nconsole.log(\"\\ntransaction hash: \" + txHash);\n\n// print receipt\ntxReceipt = web3.eth.getTransactionReceipt(txHash);\n// repeat till tx processed\nwhile (txReceipt == null) {\n  // wait 10 sec\n  sleep(10000);\n  txReceipt = web3.eth.getTransactionReceipt(txHash);\n}\nconsole.log(\"\\ntransaction receipt:\");\nconsole.log(txReceipt);\n\nfunction sleep(ms) {\n  return new Promise(resolve => setTimeout(resolve, ms));\n}",
      "language": "javascript"
    }
  ]
}
```

Sample output:

```json
{
  "codes": [
    {
      "code": "transaction details:\nnrgPrice: 10000000000,\nnrg: 320922,\nnonce: 447,\ntransactionIndex: 0,\ninput: 0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400,\nblockNumber: 247726,\nfrom: 0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c,\nto: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\nvalue: 0,\nhash: 0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80,\ntimestamp: 1529590672338000\n\ntransaction details:\nnrgPrice: 10000000000,\nnrg: 84107,\nnonce: 367,\ntransactionIndex: 0,\ninput: 0x1fec4cc691ae034f8976efbe9c89fa3a78c19d663bf61c76c6d3dd528259fb9cb565e8db00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a064ff11a1563ef09fd5d4671272275dd962d46f7498f8d297d60bf3e4bee1eda07e5b667332c1af7a14bb51b86fe92e1cc0d2a5f0de70613c26ff3584c312c7a0a3afd832901ba4e1bc947721babb13039194ac1b780f2b13b9b86b2ed08639a09bb6e70f50e6f512e0aa3033f2477ad04f75704bcf14ce1c9aca37492cf25ba0ce3ce58c28307850315f934cda934e65252b5115aaeca58ead64e88d9569ad00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400,\nblockNumber: 247726,\nfrom: 0xa05a3889b106e75baa621b8cc719679a3dbdd799afac1ca6b42d03dc93a23687,\nto: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\nvalue: 0,\nhash: 0xdb50c83faad497dc281df5a7ae5e2aa3294431d64a7868134895d33838882045,\ntimestamp: 1529590657509000\n\ntransaction details:\nnrgPrice: 10000000000,\nnrg: 84047,\nnonce: 368,\ntransactionIndex: 0,\ninput: 0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400,\nblockNumber: 247726,\nfrom: 0xa05a3889b106e75baa621b8cc719679a3dbdd799afac1ca6b42d03dc93a23687,\nto: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\nvalue: 0,\nhash: 0x92aef634e0194a3c70a39163c45c2f2747ec86a8e40a9c6ddb93009741be8cb0,\ntimestamp: 1529590672530000\n\ntransaction receipt:\ntxIndex: 2,\nblockNumber: 247726,\nnrg: 320982,\nnrgCumulativeUsed: 489136,\nblockHash: 0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab,\ntxHash: 0x2a1d8dc09f2c6670690bbda74377f59c8737df9812cf7c794fa35409d200fe3f,\nfrom: 0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c,\nto: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\ncontractAddress: ,\nlog:\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xfd24c246254d45bcfec939758f58d63bd1565596fdc53994ae974bb54f83bb69,\n    0x0x7f21f0710cfd7a24883f3d41c47ad324b49e484b56d3010250110a9cd6876c76,\n    0x0x0000000000000000000000000000000000000000000000000000000000000006,\n    0x0x0000000000000000000000000000000000000000000000000000000000000001\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa064ff11a1563ef09fd5d4671272275dd962d46f7498f8d297d60bf3e4bee1ed,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa07e5b667332c1af7a14bb51b86fe92e1cc0d2a5f0de70613c26ff3584c312c7,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa0a3afd832901ba4e1bc947721babb13039194ac1b780f2b13b9b86b2ed08639,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa09bb6e70f50e6f512e0aa3033f2477ad04f75704bcf14ce1c9aca37492cf25b,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0xdc3b8ebc415c945740a70187f1d472ad2d64a9e7a87047f38023aec56516976b,\n    0x0xa0ce3ce58c28307850315f934cda934e65252b5115aaeca58ead64e88d9569ad,\n    0x0x00000000000000000000000000000000000000000000000000000002540be400\n  ]\n],\n[\n  address: 0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a,\n  data: 0x,\n  topics:\n  [\n    0x0x1fa305c7f8521af161de570532762ed7a60199cde79e18e1d259af3459562521,\n    0x0x91ae034f8976efbe9c89fa3a78c19d663bf61c76c6d3dd528259fb9cb565e8db,\n    0x0x7f21f0710cfd7a24883f3d41c47ad324b49e484b56d3010250110a9cd6876c76\n  ]\n]\n\nsender account unlocked\n\ntransaction hash: 027412b1717f161efdec7199a4d7b697705dac72c4af6217f2bcb9ed807c30aa\n\ntransaction receipt:\ntxIndex: 0,\nblockNumber: 306878,\nnrg: 21000,\nnrgCumulativeUsed: 21000,\nblockHash: 0xa7d7f03626384670e7c2a161ddeceed4949f408f428d54e4e9172c9a1545e0fa,\ntxHash: 0x027412b1717f161efdec7199a4d7b697705dac72c4af6217f2bcb9ed807c30aa,\nfrom: 0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5,\nto: 0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e,\ncontractAddress: ,\nlog:",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "transaction details:\n{ nrgPrice: BigNumber { s: 1, e: 10, c: [ 10000000000 ] },\n  blockHash: '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab',\n  nrg: 2000000,\n  transactionIndex: 3,\n  nonce: 447,\n  input: '0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400',\n  blockNumber: 247726,\n  gas: 2000000,\n  from: '0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c',\n  to: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n  value: BigNumber { s: 1, e: 0, c: [ 0 ] },\n  hash: '0x5f2e74ade04ab9f6e8d4acd394f7f51832d4706d7268eea0ecc6391f94185b80',\n  gasPrice: '0x2540be400',\n  timestamp: 1529590674 }\n\ntransaction details:\n{ nrgPrice: BigNumber { s: 1, e: 10, c: [ 10000000000 ] },\n  blockHash: '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab',\n  nrg: 2000000,\n  transactionIndex: 0,\n  nonce: 367,\n  input: '0x1fec4cc691ae034f8976efbe9c89fa3a78c19d663bf61c76c6d3dd528259fb9cb565e8db00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a064ff11a1563ef09fd5d4671272275dd962d46f7498f8d297d60bf3e4bee1eda07e5b667332c1af7a14bb51b86fe92e1cc0d2a5f0de70613c26ff3584c312c7a0a3afd832901ba4e1bc947721babb13039194ac1b780f2b13b9b86b2ed08639a09bb6e70f50e6f512e0aa3033f2477ad04f75704bcf14ce1c9aca37492cf25ba0ce3ce58c28307850315f934cda934e65252b5115aaeca58ead64e88d9569ad00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400',\n  blockNumber: 247726,\n  gas: 2000000,\n  from: '0xa05a3889b106e75baa621b8cc719679a3dbdd799afac1ca6b42d03dc93a23687',\n  to: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n  value: BigNumber { s: 1, e: 0, c: [ 0 ] },\n  hash: '0xdb50c83faad497dc281df5a7ae5e2aa3294431d64a7868134895d33838882045',\n  gasPrice: '0x2540be400',\n  timestamp: 1529590674 }\n\ntransaction details:\n{ nrgPrice: BigNumber { s: 1, e: 10, c: [ 10000000000 ] },\n  blockHash: '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab',\n  nrg: 2000000,\n  transactionIndex: 1,\n  nonce: 368,\n  input: '0x1fec4cc69ce22f4a90d3d5ee88b4750e1c4ad0fbf9b2981ca82132742a48002f7e85e2fa00000000000000000000000000000040000000000000000000000000000000f000000000000000000000000000000005a082abceefa73078541d577ad576719c3f475b4ad0bd136918da43f0bce30429a0b612e3b6be803768451b7a331b1837face5be52b2b1fd253a31516bbdc1b50a044ba079d30fa1cdea965e93ab7cbaa9d18f8c02e569707bb320129a1840dada03cefb0ad4b6effd63825a1d6e345fc5b708f197b85c0a4f5583b125f52201aa0ee6827c6f05bd9192d444cb4fa0dec304829edf5c3c99d3df30d9618ebad1d00000000000000000000000000000005000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400000000000000000000000002540be400',\n  blockNumber: 247726,\n  gas: 2000000,\n  from: '0xa05a3889b106e75baa621b8cc719679a3dbdd799afac1ca6b42d03dc93a23687',\n  to: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n  value: BigNumber { s: 1, e: 0, c: [ 0 ] },\n  hash: '0x92aef634e0194a3c70a39163c45c2f2747ec86a8e40a9c6ddb93009741be8cb0',\n  gasPrice: '0x2540be400',\n  timestamp: 1529590674 }\n\ntransaction receipt:\n{ blockHash: '0x50a906f4ccaf05a3ebca69cc4f84a116e6aec881e3c4d080c4df505fea65afab',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000002000000000004000000000000000000000000000000000010000000000000000000000000000000000002000000400040000000000000000000000000000000000000400400000000000000000000000000000000800000040000800000000001040000000000008000000000000000000000000084000010008000000005000000008000000200102000000000000000008000000000000000000020000040080000000000000000000000800000006000008000000000008000000000020000000000000000400000000002000200000000000000000000000080001000000200040000000000000000000000000000000000000000000000400',\n  nrgUsed: 320982,\n  contractAddress: null,\n  transactionIndex: 2,\n  transactionHash: '0x2a1d8dc09f2c6670690bbda74377f59c8737df9812cf7c794fa35409d200fe3f',\n  gasLimit: '0x1e8480',\n  cumulativeNrgUsed: 489136,\n  gasUsed: '0x04e5d6',\n  blockNumber: 247726,\n  root: '17e8253caf42481001da608479fa8250557b2a76226b6f3cbc9924c6768c4bd0',\n  cumulativeGasUsed: '0x776b0',\n  from: '0xa0dd16394f16ea21c8b45c00b2e43850ae7e8f00fe54789ddd1881d33b21df0c',\n  to: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n  logs:\n   [ { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 0,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 1,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 2,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 3,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 4,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 5,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 },\n     { address: '0xa0e1cca4fe786118c0abb1fdf45c04e44354f971b25c04ed77ac46f13cae179a',\n       logIndex: 6,\n       data: '0x',\n       topics: [Array],\n       blockNumber: 247726,\n       transactionIndex: 2 } ],\n  gasPrice: '0x02540be400',\n  status: '0x1' }\n\nsender account unlocked\n\ntransaction hash: 0x3f66966ad038c8fbc5d31722d077e79675811f6c8d0d86fd9bc9445d18c7b07c\n\ntransaction receipt:\n{ blockHash: '0x76944e5c82875b34e06c88634fcff023967f1c28be7a3809b3e191c6df1ef8ce',\n  nrgPrice: '0x02540be400',\n  logsBloom: '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',\n  nrgUsed: 21000,\n  contractAddress: null,\n  transactionIndex: 0,\n  transactionHash: '0x3f66966ad038c8fbc5d31722d077e79675811f6c8d0d86fd9bc9445d18c7b07c',\n  gasLimit: '0x1e8480',\n  cumulativeNrgUsed: 21000,\n  gasUsed: '0x5208',\n  blockNumber: 306911,\n  root: 'a3710bbf0c04c6f66bf4b268365ffe38ad78429a778f63ffdbb3fd4aa7c66d53',\n  cumulativeGasUsed: '0x5208',\n  from: '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  to: '0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e',\n  logs: [],\n  gasPrice: '0x02540be400',\n  status: '0x1' }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
```