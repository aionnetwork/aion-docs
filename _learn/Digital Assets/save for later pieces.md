---
title: "save for later pieces"
excerpt: ""
---
[block:api-header]
{
  "title": "ATS - Let's get started"
}
[/block]
Let me preface this by letting you know you can find more detailed information here on the <a href="https://github.com/aionnetwork/AIP/issues/4" target="_blank">Github Page</a>

### Definitions
* Bridge Operator: A organization(s) / project (s) / account that execute the required functions to enable a cross-chain transaction on behalf of the token holder
* Bridge Registry: A smart contract registry that maintains a mapping of `bridgeId`, Bridge Contracts and `networkId`
* Bridge Contract: A smart contract designed to receive, verify and emit events and signature bundles from/to a specific bridge
* Token Issuer: The project / user / account that owns the Token Contract
* Token Contract: A smart contract that is deployed using this token standard
* Token Holder: An account / user that has ownership over a token balance
* Token Sender: An account / user that is sending a token
* Token Receiver: An account / user that is receiving a token
* Home chain: The blockchain network where the cross-chain transaction originates and is emitted from
* Remote chain: The blockchain network that is the destination for the cross-chain transaction

[block:api-header]
{
  "title": "References"
}
[/block]
https://eips.ethereum.org/EIPS/eip-777

### Description [ May not need ]
Fungible tokens have proven to be one of the core building blocks of the current decentralized web era. This next-generation fungible token standard reflects the evolving needs of dApp developers for core functionality and security.

The Aion Fungible Token Standard has been designed to address the shortcomings of token standards on other existing blockchains by blurring the line between layer one and layer two. At the core of the design is the ability to perform cross chain token transfers while maintaining security and stable total supply. Additional features include safe transfers, token callbacks, and mint/burn interface.

This standard aims to provide a reliable interface which 3rd party tools can use when building products on top of Aion.

__
ATS 
- approve operator (trusted notary - eg monthly basis does somethign on a cadence)
- allows authorization to use funds from certain account address to do something w/ ur funds
- can hook a contract to execute  
- integrated scheme (one time manual cost, mostly automated after) 
- can authorize/revoke 
- burn option (decreases total amt of circulating token, eg. use case - ????)
[block:api-header]
{
  "title": "Random Notes"
}
[/block]
Erc20 tokens exist on Ethereum platform. 

Native currency on the Aion Network is AION. But besides that, the platform can support other tokens and these can work like 
•	Currencies
•	Shares of a company
•	Loyalty Points
•	Gold Certificates


Token created by a smart contract 
Contract not only responsible for:
•	Creating Transactions
•	Handling Transactions / transfer them
•	Keeping track of balance of each token holder

To get some tokens – send eth to smart contract – will give you amount of tokens in return 

Sounds pretty easy but it’s also quite risky
Once sc contract
Cannot be changed anymoe – if error made
Quite catastrophi
Imagine if bug in code that causes ppl to lose their tokens
Or would allow others to steal tokens


INTEROPERABILITY
Each token contract can be different from each other 
-	So if you want your token to be available on an exchange, exchange has to write custom code to talk to your contract to support the trade 


Defines 6 mandatory functions that your smart contract should implement and  3 optional ones

Option – name, symbol, decimals it hsoudl support
Mandatory
-	Create method of totalSupply of token (when reached, SC will refuse to create new tokens)


1. Intro & Deploy
2. Interact - intro to calls such as sender / mint
3. Advanced shit 
[block:api-header]
{
  "title": "Summary"
}
[/block]
* Some functions of AIP cannot be applied today as it needs infrastructure such as
 - bridging
 - other shit i'll fill in later 


What is it?
Superset / improvement of the ERC-20 Protocol / Standard. Derives from ERC-777 Implementation Standard.

- Standard itself is still a WIP, but most functionalities are available 

Main differences 
- adapted to support cross chain token support in the future
- contract implementation itself has been adapted for use in Aion (not applicable as of yet)

Problems w/ ERC 20
- Having others act on your behalf 
- (eg. someone can't take ur money, have to write a transfer/cheque & can cancel before receipient )




Token Implementation

**Contract Implementation Summary**

Whole purpose of standard is to avoid problems in erc20 since smart contracts don't talk to each other. purpose of this standard is that if you implement features such as
 (
before executing transfer - checking sender (not person / contract) & has implemented the correct interface - ping the sender that we're executing - call the recipient to check if (contract w/ interface) then send. 

in a sitautation where neither has interface implemented, call is not executed

when you send money to a contract - and doesn't have interface implemented - THROW
effectively prevents you from sending to contracts that don't support ATS standard 


[block:api-header]
{
  "title": "Create"
}
[/block]
Environment Setup
- NPM
- Node
- Fork(/Clone) ATS Repository

Testing Setup 
- TestNet - lets connect via NodeSmith 
- Compile & Deploying 



Code 
- ATS Example code
- Fill out notes pertaining to each line / functionality / what it means
- 

Compiling [via web3]
- 
Deploying [via web3]
- 

Interact 
- Mint  (give themselves money - called initialize) 
- Only applicable thing they can do is 
- send (what does send do)
- burn (what does burn do)
(optional) 
- operator (try it out - maybe dummy contract that does something useful - eg. send 1 token everyday to this address)  

- call sender
- call recipient 


Update 
- Update Solidity
- Cross compilation of the compiler 
- JS version of Compiler (A week / not all nodes can compile)  - act of compiling opens up opportunity for ddoss attack - should be client side  
[block:api-header]
{
  "title": "Cross Platform"
}
[/block]
Future - Bridging - More to come