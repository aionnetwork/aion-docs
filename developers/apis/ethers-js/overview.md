---
title: Overview
description: Aion nodes only understand JSON RPC, and have no idea what to do with high-level languages like Java, Python, on Solidity. Since JSON RPC can be a bit cumbersome to work with, developers can use the Ethers.js framework to deal with blockchain interactions. Ethers.js was originally created for use on Ethereum-based blockchains. The creator of Ether.js has since expanded the framework to include the Aion network.
table_of_content: true
weight: 1
---

Some of the features of Ethers.js include:

- Keep your private keys in your client, safe and sound.
- Import and export JSON wallets.
- Import and export mnemonic phrases.
- Meta-classes create JavaScript objects from any contract ABI, including ABIv2 and Human-Readable ABI.
- Connect to Aion nodes through `JSON-RPC`.
- Tiny (~`88kb` compressed; `284kb` uncompressed).
- A large collection of test cases which are maintained and added to.
- Fully TypeScript ready, with definition files and full TypeScript source.
- MIT License (including all dependencies), making it completely open source to do with as you please.

## How Ethers.js Works

As previously mentioned, nodes on the Aion network can only be interacted with through JSON RPC. While this protocol is incredibly sturdy and robust, it can be a bit cumbersome to work with, especially when you're making repetitive calls. To abstract away from this issue, developers can use Ethers.js to make those calls for them, while using a nice wrapper around the JSON RPC calls.

Take this structure as an example:

```text
example/
├── index.html
├── script.js
└── ethers.min.js
```

Both the `ethers.min.js` file and the `script.js` file are included at the bottom of the `index.html` file. The `ethers.min.js` file is included first so that any subsequent JavaScript in the `script.js` file can have access to the `ethers` object created by the `ethers.min.js` file. Once the `script.js` file has access to this `ethers` object it can interact with an Aion node, which in turn can interact with the rest of the blockchain.

![A diagram of a webpage using the ethers object, supplied by the ethers.js framework.](https://raw.githubusercontent.com/aionnetwork/docs/master/developers/apis/ethers-js/images/ethers-diagram.png)

## API Documentation

Since Ether.js has been developers by a community member, the [documentation is contained on their third-party site](https://docs.ethers.io/ethers.js/html/). Check out the [examples section](apis-ethers-js-examples) for more details information on how to use Ethers.js with Aion.