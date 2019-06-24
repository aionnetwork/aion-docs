---
title: Web3.js
description: Aion nodes only understand JSON RPC, and have no idea what to do with high-level languages like Java, Python, on Solidity. Since JSON RPC can be a bit cumbersome to work with, developers can use the Web3.js framework to deal with blockchain interactions. Web3.js was originally created by the Ethereum Foundation for Ethereum-based blockchains. The Aion Foundation modified the calls that Web3.js makes to the JSON RPC layer so that the framework is able to communicate with the Aion network. 
---

The Aion specific framework can be [found on GitHub](https://github.com/aionnetwork/aion_web3). The Aion implementation of Web3.js (Aion Web3.js) is maintained by the Aion Foundation. At the start of 2019, further modifications were made to the Web3.js framework that allowed it to interact with the Aion Virtual Machine (AVM), allowing smart contract developers to create Java contracts and interact with them using this framework.

## How Web3.js Works

As previously mentioned, nodes on the Aion network can only be interacted with through JSON RPC. While this protocol is incredibly sturdy and robust, it can be a bit cumbersome to work with, especially when you're making repetitive calls. To abstract away from this issue, developers can use Web3.js to make those calls for them, while using a nice wrapper around the JSON RPC calls. This works through the use of a `Web3` object.

Take this structure as an example:

```text
example/
├── index.html
├── script.js
└── web3.min.js
```

Both the `web3.min.js` file and the `script.js` file are included at the bottom of the `index.html` file. The `web3.min.js` file is included first so that any subsequent JavaScript in the `script.js` file can have access to the `Web3` object created by the `web3.min.js` file. Once the `script.js` file has access to this `Web3` object it can interact with an Aion node, which in turn can interact with the rest of the blockchain.

![A diagram of a webpage using the Web3 object, supplied by the Aion Web3.js framework.](/developers/apis/web3-js/images/web3-diagram.png)

## API Documentation

The API documentation is hosted on the [`aion_web3` GitHub Wiki pages](https://github.com/aionnetwork/aion_web3/wiki). Checkout the [examples section](/developers/apis/web3-js/examples) to find out how to interact with the Aion Web3 API.
