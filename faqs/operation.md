---
title: Operation
---

### Can you run an Aion node in sentry mode for additional security?

Not at the moment, however, ooptimizations such as creating private maximally connected subnetworks between known PoS & PoW block producers can be replicated via the use of off-chain communication channels to share P2P addresses (IP & node id), and hard-coding those into the running node's P2P configuration of known nodes that I want to hold connections to.

### What type of infrastructure should be used to run validator nodes?

Any infrastructure can be used - with security and uptime being the upmost priorities. 

### Do pools need to deploy their own contract? Is there any smart contract related issues pools need to worry about?

No, pools do not need to deploy or directly write any smart contracts. The staking lifecycle (for a pool operator in the ADS paradigm) is managed by the Pool Registry. The staking interface only caters to delegators. The pool operators will interact with the pools using a CLI. Anyone can deploy their own pool registry contract if they want to, but it the staking interfaces will only be detecting the official ADS contract. 

### How secure are the smart contracts? Do we have audits?

Yes, we have tested, verified, and audited the smart contracts with industry-leading professional firms and external consultants. 

### Are both rewards and delegation handled by the smart contract(s)?

Yes, the entire lifecycle is managed via smart contracts.