---
title: "[Old Version] List of Historical Big Vulnerabilities"
excerpt: ""
---
[block:callout]
{
  "type": "warning",
  "title": "Bounty",
  "body": "This page is under development - please **[read the rules](https://aion.network/bounty/content-creation-bounty/)** on how to contribute. Make sure you've familiarized yourself with the **[Tone and Voice Guidelines](https://docs.aion.network/page/voice-guidelines)** for content contributions. Keywords you can focus on for this page **blockchain limitations**, **blockchain vulnerabilities**, **blockchain research**, **legal issues blockchain**"
}
[/block]
Blockchain technology has grown rapidly in the last few years, with its development spearheaded by the creation of smart contracts. However, the novelty of the industry and security issues surrounding smart contracts have challenged public trust and broader adoption of blockchain technologies.

Billions of USD are traded through exchanges, but millions can be swiftly lost in a seemingly innocuous bug in smart contract code. The following list contains a high-level introduction to some of the known attacks and are helpful to know of regardless if you are a dApp developer or a curious enthusiast.
[block:parameters]
{
  "data": {
    "0-0": "**1. Reentrancy** ",
    "1-0": "**2. Access Control Issues** ",
    "2-0": "**3. Integer Overflow and Underflow** ",
    "0-1": "This occurs when external contract calls occur within a function that allows the original function to be called repeatedly. This can change the state of the system before the original function is executed - causing the conflicting calls to act in unintended ways.\n\nFor example, the 2016 reentrancy attack on [The DAO](https://en.wikipedia.org/wiki/The_DAO_(organization) allowed attackers to recursively call the target's withdraw function, which repeats because the attacker's balance is never updated by the contract. This allowed the attacker to gain control of 3.6 million ETH and resulted in the Ethereum community's decision to fork the blockchain into Ethereum and Ethereum Classic.\n<br />",
    "1-1": "Although not unique to smart contracts, access control can pose issues when external users are able to access private functionality. In this case, hackers are then able to gain authorization to manipulate the transactions or accounts associated with the smart contract through outdated calls and proxy contracts.\n\nIn the 2017 [Parity multi-sig attack](https://cointelegraph.com/news/parity-multisig-wallet-hacked-or-how-come), key functions were stored in a library that had been automatically deployed in every Parity Multisig wallet. The attacker realized that they could gain control over this library by initializing it as a wallet, subsequently changing the wallet owner list and withdrawing funds. Around 150000 ETH were stolen from this vulnerability.\n<br />",
    "2-1": "Simple arithmetic variable types are often used to define values, such as `uint`. If a variable exceeds the maximum value, overflow occurs and the value will be reset to 0. Conversely, when an unsigned variable decrements past 0, underflow occurs and the maximum possible value results. This makes the code vulnerable to theft or DOS, especially when the code does not verify balance and the user has control over updating the uint value.\n\nReferring back to the DAO reentrancy attack, the attacker was able to repeatedly withdraw from the target account because balances remained positive (as they did not update). In actuality, the balance underflows.",
    "3-0": "**4. Unchecked Return Value Handling**",
    "3-1": "Solidity supports low-level interface functions such as `call()` and `send()`. These functions will return true or false; however, the code will continue to run and the errors will not lead to reversal in the execution if left unchecked. Such being said, developers should ensure to check the outcomes of `call`, `send`, `delegatecall`, and `callcode` in order to avoid unwanted surprises.\n\nIn the [2016 King of the Ether Throne](https://www.kingoftheether.com/postmortem.html) dApp issue, insufficient gas allocation caused the failure of multiple refund transactions. Part of the issue may have been caused by a failed `<address>.send(<amount>)` call, which were inherently overlooked as the return value of a fail was unchecked.",
    "4-0": "**5. Denial of Service**",
    "4-1": "Denial of service may cause a smart contract to be disabled permanently. A DOS may be caused by artificially manipulating gas prices for a return function to end up exceeding the gas limit, preventing the transaction from occurring at all. Maliciously altering access controls and taking advantage of bugs can also lead to a denial of service.\n\nThe [GovernMental](https://www.reddit.com/r/ethereum/comments/4ghzhv/governmentals_1100_eth_jackpot_payout_is_stuck/) application occurred such an issue when the 1100 ETH prize became stuck when the gas price for a transaction exceeded the gas limit, blocking the payout completely.",
    "5-0": "**6. Front Running**",
    "5-1": "An attack does not have to be executed in a single transaction, but rather the order of transactions within a block can also be manipulated to behave maliciously. For example, an individual can reveal a solution or secret, and the attacker can copy the solution and send it with a higher gas cost to be picked up by miners earlier.\n\nResearchers at Cornell revealed that it was possible to [front-run transactions on the Bancor Network](https://hackernoon.com/front-running-bancor-in-150-lines-of-python-with-ethereum-api-d5e2bfd0d798) as a miner, as they have the ability to re-order transactions they've mined in a block. Demonstrations by individuals later demonstrated the possibility to front-run Bancor as a general user as well.",
    "6-0": "**7. Timestamp Dependence**",
    "6-1": "Each block is sealed by a miner at a precise time, and the current time can be displayed in Solidity with `block.timestamp` or `now`. However, there is a possibility of a delay with the reported time, and miners can influence the timestamp by sending a transaction with a block timestamp slightly set in the future. If accepted, this may provide an unfair advantage to the attacker gaining from the pre-set transaction timestamp.",
    "h-0": "Topic",
    "h-1": "Description"
  },
  "cols": 2,
  "rows": 7
}
[/block]