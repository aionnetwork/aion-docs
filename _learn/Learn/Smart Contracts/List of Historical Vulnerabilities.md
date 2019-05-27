---
title: "List of Historical Vulnerabilities"
excerpt: ""
---
Blockchain technology has grown rapidly in the last few years, with its development spearheaded by the creation of smart contracts. However, the novelty of the industry and security issues surrounding smart contracts have challenged public trust and broader adoption of blockchain technologies.

Billions of USD are traded through exchanges, but millions can be swiftly lost in a seemingly innocuous bug in smart contract code. The following list contains a high-level introduction to some of the known attacks and are helpful to know of regardless if you are a dApp developer or a curious enthusiast.


[block:api-header]
{
  "title": "1. Re-entrancy"
}
[/block]
This occurs when external contract calls occur within a function that allows the original function to be called repeatedly. This can change the state of the system before the original function is executed - causing the conflicting calls to act in unintended ways.

For example, the 2016 reentrancy attack on [The DAO](https://en.wikipedia.org/wiki/The_DAO_(organization) allowed attackers to recursively call the target's withdraw function, which repeats because the attacker's balance is never updated by the contract. This allowed the attacker to gain control of 3.6 million ETH and resulted in the Ethereum community's decision to fork the blockchain into Ethereum and Ethereum Classic.

[block:code]
{
  "codes": [
    {
      "code": "function withdraw(uint _amount) {\n\trequire(balances[msg.sender] >= _amount);\n\tmsg.sender.call.value(_amount)();\n\tbalances[msg.sender] -= _amount;\n}",
      "language": "javascript",
      "name": "Code Example"
    }
  ]
}
[/block]
**Let's Review**
The above code sample contains a function that is vulnerable to a re-entrancy attack. Can you spot it? When the low level `call()` function sends balace to the `msg.sender` address - it exposes a vulnerability - if the address is a *smart contract*, the payment will trigger the fallback function with the remaining transaction gas. 
[block:api-header]
{
  "title": "2. Access Control Issues"
}
[/block]
Although not unique to smart contracts, access control can pose issues when external users are able to access private functionality. In this case, hackers are then able to gain authorization to manipulate the transactions or accounts associated with the smart contract through outdated calls and proxy contracts.

In the 2017 [Parity multi-sig attack](https://cointelegraph.com/news/parity-multisig-wallet-hacked-or-how-come), key functions were stored in a library that had been automatically deployed in every Parity Multisig wallet. The attacker realized that they could gain control over this library by initializing it as a wallet, subsequently changing the wallet owner list and withdrawing funds. Around 150,000 ETH were stolen from this vulnerability.
[block:code]
{
  "codes": [
    {
      "code": "function initContract() public {\n\towner = msg.sender;\n}",
      "language": "javascript",
      "name": "Code Example"
    }
  ]
}
[/block]
**Let's Review** 
In this example, the contract's initialization function sets the *caller* of the function as its *owner*. 
So basically, the logic is not attached to the contract's constructor, and it doesn't keep track of the fact if it's already been called - meaning anyone can call it and become the owner. 

For Parity's multi-sig wallet, the initialization function was detached from the wallet itself and instead, defined in a "library" contract. Users of the wallet were expected to initialize their own wallet, but like the example above - the function did not do a validation check if the wallet had already been initialized. What this means is that since the library itself was a smart contract, anyone could initialize it and therefore, destruct it or take funds. 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/0065821-i_accidentally_killed_it.png",
        "i accidentally killed it.png",
        580,
        527,
        "#eff3f0"
      ],
      "caption": "[¯\\_(ツ)_/¯](https://twitter.com/devops199/status/927912053297303552)"
    }
  ]
}
[/block]
Due to this hack, a great meme was born. One developer, now infamously known as devops199, was able to make himself the owner of the Parity library contract (since the contract was uninitialized) and chose to call the suicide wallet. The impact of this was that all funds are now locked into the multi-sig wallets that were deployed after July 20th. 

Read more about this security breach <a href="https://medium.com/crypt-bytes-tech/parity-wallet-security-alert-vulnerability-in-the-parity-wallet-service-contract-1506486c4160" target="_blank">here</a>.
[block:api-header]
{
  "title": "3. Integer Overflow and Underflow"
}
[/block]
Simple arithmetic variable types are often used to define values, such as `uint`. If a variable exceeds the maximum value, overflow occurs and the value will be reset to 0. Conversely, when an unsigned variable decrements past 0, underflow occurs and the maximum possible value results. This makes the code vulnerable to theft or DOS, especially when the code does not verify balance and the user has control over updating the uint value.

Referring back to the DAO re-entrancy attack, the attacker was able to repeatedly withdraw from the target account because balances remained positive (as they did not update). In actuality, the balance underflows. Other impact includes [BatchOverflow(multiple tokens)](https://blog.peckshield.com/2018/04/22/batchOverflow/)  and [ProxyOverflow (multiple tokens)](https://peckshield.com/2018/04/25/proxyOverflow/).
[block:code]
{
  "codes": [
    {
      "code": "mapping (address => uint128) public balanceOf;\n\n// INSECURE\nfunction transfer(address _to, uint128 _value) {\n    /* Check if sender has balance */\n    require(balanceOf[msg.sender] >= _value);\n    /* Add and subtract new balances */\n    balanceOf[msg.sender] -= _value;\n    balanceOf[_to] += _value;\n}\n\n// SECURE\nfunction transfer(address _to, uint128 _value) {\n    /* Check if sender has balance and for overflows */\n    require(balanceOf[msg.sender] >= _value && balanceOf[_to] + _value >= balanceOf[_to]);\n\n    /* Add and subtract new balances */\n    balanceOf[msg.sender] -= _value;\n    balanceOf[_to] += _value;\n}",
      "language": "javascript",
      "name": "Code Example"
    }
  ]
}
[/block]
**Let's Review** 
Here's a straightforward token transfer. If a balance reaches the maximum uint value (2^128) it will loop back to 0. The same goes for underflow, but instead of going to 0, it gets set to the maximum value. In the secure code sample (line 15) adds a validation check to avoid that issue.

How can we avoid this in our code? Well, think about whether or not the uint value has an opportunity to approach a large number. How about how the uint variable changes state, and who has the authority to execute these changes? If anybody can call these functions which update the unit value, does this pose a security issue? 

Please be wary that there are around [20 cases for overflow and underflow](https://github.com/ethereum/solidity/issues/796#issuecomment-253578925)
[block:api-header]
{
  "title": "4. Unchecked Return Value Handling"
}
[/block]
Solidity supports low-level interface functions such as `call()` and `send()`. These functions will return true or false; however, the code will continue to run and the errors will not lead to reversal in the execution if left unchecked. Such being said, developers should ensure to check the outcomes of `call`, `send`, `delegatecall`, and `callcode` in order to avoid unwanted surprises.

In the [2016 King of the Ether Throne](https://www.kingoftheether.com/postmortem.html) dApp issue, insufficient gas allocation caused the failure of multiple refund transactions. Part of the issue may have been caused by a failed `<address>.send(<amount>)` call, which were inherently overlooked as the return value of a fail was unchecked.
[block:code]
{
  "codes": [
    {
      "code": "function withdraw(uint256 _amount) public {\n\trequire(balances[msg.sender] >= _amount);\n\tbalances[msg.sender] -= _amount;\n\tetherLeft -= _amount;\n\tmsg.sender.send(_amount);\n}",
      "language": "javascript",
      "name": "Code Example"
    }
  ]
}
[/block]
**Let's Review**
So what can go wrong if you don't check the return value of `send()`? Well, if the call is used to send ether to a smart contract that **does not** support it (due to not having a payable fallback function implemented), the EVM will return the value as `false`. 

As you can see, there is no function to check the return value, meaning the changes executed by the function to the contract state will not be reversed, and the `etherLeft` variable will be representing an incorrect value.
[block:api-header]
{
  "title": "5. Denial of Service"
}
[/block]
Denial of service may cause a smart contract to be disabled permanently. A DOS may be caused by artificially manipulating gas prices for a return function to end up exceeding the gas limit, preventing the transaction from occurring at all. Maliciously altering access controls and taking advantage of bugs can also lead to a denial of service.

The [GovernMental](https://www.reddit.com/r/ethereum/comments/4ghzhv/governmentals_1100_eth_jackpot_payout_is_stuck/) application occurred such an issue when the 1100 ETH prize became stuck when the gas price for a transaction exceeded the gas limit, blocking the payout completely.

[block:code]
{
  "codes": [
    {
      "code": "function becomePresident() payable {\n    require(msg.value >= price); // must pay the price to become president\n    president.transfer(price);   // we pay the previous president\n    president = msg.sender;      // we crown the new president\n    price = price * 2;           // we double the price to become president\n}",
      "language": "javascript",
      "name": "Code Example"
    }
  ]
}
[/block]
*Code sample inspired by [King of the Ether](http://blockchain.unica.it/projects/ethereum-survey/attacks.html#kotet)*

**Let's Review**
This function inside of a game contract is responsible for allowing others to become president. One can become president by publicly bribing the previous president. BUT, what if the previous president is a smart contract, and that smart contract causes reversion on payment? Well, the transfer of power will not go through and the malicious smart contract keeps his throne for eternity. Reminds you of a dictatorship, doesn't it?
[block:api-header]
{
  "title": "6. Front Running"
}
[/block]
*also known as - Transaction-Ordering Dependence*

An attack does not have to be executed in a single transaction, but rather the order of transactions within a block can also be manipulated to behave maliciously. For example, an individual can reveal a solution or secret, and the attacker can copy the solution and send it with a higher gas cost to be picked up by miners earlier.

Researchers at Cornell revealed that it was possible to [front-run transactions on the Bancor Network](https://hackernoon.com/front-running-bancor-in-150-lines-of-python-with-ethereum-api-d5e2bfd0d798) as a miner, as they have the ability to re-order transactions they've mined in a block. Demonstrations by individuals later demonstrated the possibility to front-run Bancor as a general user as well.

[block:code]
{
  "codes": [
    {
      "code": "pragma solidity ^0.4.18;\n\ncontract Bounty {\n\n    bytes32 puzzle;\n    \n    function Bounty(bytes32_puzzle) public payable {\n        puzzle = _puzzle;\n    }\n    \n    function claim(bytes32 solution) public {\n        if (sha256(solution) == puzzle){\n            msg.sender.transfer(this.balance);\n        }\n        else\n            revert();\n    }\n   \n}",
      "language": "javascript",
      "name": "Code example"
    }
  ]
}
[/block]
**Let's Review**
In this contract, the developer sets a hash value along with an amount of Ether, and sets this payable amount as a prize for solving the 'puzzle'. To the developer who can solve the hash solution to the puzzle will have the prize transferred to their address. There is no vulnerability in the smart contract itself, but if someone did a quick scan of the network and finds that someone else proposed the correct solution, they can resubmit the *correct* solution it with their own address with a higher gas price. This poses the risk that they can get their transaction picked up before the initial one and essentially *steal* the prize. 
[block:api-header]
{
  "title": "7. Timestamp Dependence"
}
[/block]
*also known as timestamp dependence*

Each block is sealed by a miner at a precise time, and the current time can be displayed in Solidity with `block.timestamp` or `now`. However, there is a possibility of a delay with the reported time, and miners can influence the timestamp by sending a transaction with a block timestamp slightly set in the future. If accepted, this may provide an unfair advantage to the attacker gaining from the pre-set transaction timestamp.

[block:code]
{
  "codes": [
    {
      "code": "function play() public {\n\trequire(now > 1521763200 && neverPlayed == true);\n\tneverPlayed = false;\n\tmsg.sender.transfer(1500 ether);\n}",
      "language": "javascript",
      "name": "Code example"
    }
  ]
}
[/block]
**Let's Review**
This function will only accept calls that surpass a particular date. Miners are able to influence their block's timestamp (only to some extent) which means they may try to mine a block containing their transaction with the timestamp set in the *future*. If the situation and timing is right, the block will be accepted on the network and the miner will receive the prize before any others could even attempt to play.