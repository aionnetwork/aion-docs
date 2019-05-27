---
title: "[Migration] From Ethereum to Aion"
excerpt: ""
---
Before getting started, you should have working knowledge of Solidity language and basics of using the Solidity compiler. If not, you can get familiar with the [Solidity Documentation v4.15.](https://solidity.readthedocs.io/en/v0.4.15/) 
[block:callout]
{
  "type": "info",
  "title": "Disclaimer",
  "body": "Learn how Smart Contracts are written on Aion. There are some notable differences or patterns you will need to follow in order to write a smart contract that is compatible on Aion. Will provide a smart contract written on Ethereum vs Aion and what's different."
}
[/block]

[block:api-header]
{
  "title": "Things to Remember"
}
[/block]
The table below shows a list of core differences between ETHEREUM and AION that must be taken note of when Migrating already implemented Smart contracts from the Ethereum network to the Aion network.
[block:parameters]
{
  "data": {
    "h-0": "Difference",
    "h-1": "Ethereum",
    "h-2": "Aion",
    "0-0": "Data Word\n*basic computational unit*",
    "1-0": "Local Variable Count",
    "2-0": "int Size",
    "3-0": "uint Size",
    "4-0": "Inline Assembly",
    "5-0": "Address",
    "0-1": "256 bits",
    "0-2": "128 bits",
    "1-1": "16 data word (256 bits)",
    "1-2": "16 data word (128 bits)",
    "3-1": "uint8 - uint256",
    "3-2": "uint8 - uint128",
    "2-1": "int8 - int256",
    "2-2": "int8 - int128",
    "4-1": "Supported",
    "4-2": "Not Supported (currently)",
    "5-1": "20 bytes",
    "5-2": "32 bytes",
    "6-0": "Hash Function (signatures & wallet)",
    "6-1": "[Keccak-256](https://keccak.team/keccak.html)",
    "6-2": "Blake2b",
    "7-0": "Signature Function",
    "8-0": "Compilers",
    "7-1": "[Elliptic Curve Digital Signature Algorithm(ECDSA) – curve secp256k1](http://www.secg.org/sec2-v2.pdf)",
    "7-2": "Elliptic Curve Digital Signature Algorithm(ECDSA) - curve ED25519",
    "8-1": "Solidity, LLL, Serpent, Julia, Mutan, Vyper",
    "8-2": "Solidity",
    "9-0": "View",
    "9-1": "Supported",
    "9-2": "Not Supported",
    "11-0": "Virtual Machine",
    "11-1": "[EVM](https://bitcoinexchangeguide.com/ethereum-virtual-machine-evm-top-9-things-you-should-know-about/)",
    "11-2": "[Aion FastVM](https://github.com/aionnetwork/aion_fastvm/wiki)",
    "10-0": "Solidarity Version",
    "10-1": "between 0.4.18 and 0.4.20.",
    "10-2": "0.4.9"
  },
  "cols": 3,
  "rows": 12
}
[/block]

[block:api-header]
{
  "title": "Examples"
}
[/block]
##int & uint Size
[block:code]
{
  "codes": [
    {
      "code": "function getMetadata(uint256 _tokenId, string) public view returns (bytes32[4] buffer, uint256 count) {\n...\n}",
      "language": "javascript",
      "name": "Ethereum"
    }
  ]
}
[/block]

[block:code]
{
  "codes": [
    {
      "code": "function getMetadata(uint128 _tokenId, string) public returns (bytes32[4] buffer, uint128 count) {\n...\n}",
      "language": "javascript",
      "name": "Aion"
    }
  ]
}
[/block]
**Differences**
1. Updated *uint256* to *uint128*
2. *view* not supported & removed

[block:api-header]
{
  "title": "ABI Differences"
}
[/block]
Its necessary for you to use the **Aion Official Web3 API or Java API Library** because the ABI encoding has been reformed to align with the Virtual machine(VM) changes. For example, integer array `[1,2]` is encoded as


Ethereum uses the [*EVM*](https://bitcoinexchangeguide.com/ethereum-virtual-machine-evm-top-9-things-you-should-know-about/) to compile smart contracts, while Aion uses a more optimized implementation of the *EVM*, coined [*FastVM*](https://github.com/aionnetwork/aion_fastvm/wiki). 

You can compile it using the [Aion Official Web3 API](https://github.com/aionnetwork/aion_web3),  [Java API Library](https://github.com/aionnetwork/aion_api), [FastVM](https://github.com/aionnetwork/aion_fastvm/wiki/Compile-Smart-Contract) (only compatible with Ubuntu 16.04)

Code snippets below show the outputs when you encode the integer array `[1,2]`
[block:code]
{
  "codes": [
    {
      "code": "0x0000000000000000000000000000000000000000000000000000000000000002\n0x0000000000000000000000000000000000000000000000000000000000000001\n0x0000000000000000000000000000000000000000000000000000000000000002",
      "language": "javascript",
      "name": "Ethereum Virtual Machine (EVM)"
    }
  ]
}
[/block]

[block:code]
{
  "codes": [
    {
      "code": "00000000000000000000000000000002\n00000000000000000000000000000001\n00000000000000000000000000000002\n",
      "language": "javascript",
      "name": "Aion FastVM"
    }
  ]
}
[/block]
# Need Help?

If you get stuck, try searching these docs 👆 or head over to our [Gitter channels](https://gitter.im/aionnetwork/Lobby) or [StackOverflow](https://stackoverflow.com/search?q=aion) for answers to some common questions.