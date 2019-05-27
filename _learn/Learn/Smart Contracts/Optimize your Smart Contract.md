---
title: "Optimize your Smart Contract"
excerpt: ""
---
How does one optimize a smart contract? Let's dive in on different methods on how to reduce the cost of your. The two keywords is "Optimize" and "smart contract". Optimize is just way of rearranging or rewriting the code (the instructions in a program) to maximize efficiency and speed in retrieval, storage or execution. Smart contract can be optimized to reduce cost, improve efficiency, speed and also remove vulnerabilities.
[block:api-header]
{
  "title": "What is a Transaction Fee?"
}
[/block]
For every transaction that happens on the blockchain, whether cryptocurrency or contract interactions, it is essential for it to recorded on the blockchain for it to be considered as a valid transfer. Who's validating these transfer? The validation process of checking transactions and then adding it to the blockchain is done by a group of people called *miners*. Miners are powerful computers and software that sum up a particular portion of the network to confirm these transactions. Of course, the amount of computational power and energy consumed to record these transactions are a huge, thus why the incentives for this are to collect *transaction fees*. 

Miners are compensated via [*block rewards*](https://www.investopedia.com/terms/b/block-reward.asp) each time a block (which contains a collection of transactions) is added to the blockchain. For this reason, miners have a financial incentive to prioritize the validation of transactions that include a higher fee. 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/06f5210-miners.png",
        "miners.png",
        1024,
        260,
        "#c8d1d5"
      ],
      "caption": "Block rewards going to miners during a transaction\n[Source](https://vladimirribakov.com/concerns-bitcoin-fees-unconfirmed-transactions-growing/)"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "How are transaction cost determined?"
}
[/block]
Let's start with the basics of contract code execution. Mentioned previously, smart contracts are run on miner's machines who get compensated gas for allocating their computing resources. Both creators and users of this smart contracts will be charged a certain amount of gas for *renting* the computing resources from miners. Thus, *gas* is equivalent to how much *work* a set of actions take to perform. 

**Transaction costs** are calculated by multiplying *'gas'* and *'gas price'*. If you're a developer, you have to be mindful when writing these contracts, otherwise, the end users (and as well the creator) may end up using lots of *gas*. 

Also, there is something called a **block gas limit**. Block gas limit is responsible for defining the maximum amount of gas of all transactions mined in a block combined. Read more about the difference between gas limit & block gas limit[here](https://ethereum.stackexchange.com/questions/7359/are-gas-limit-in-transaction-and-block-gas-limit-different)


[block:api-header]
{
  "title": "Thinking about Optimization"
}
[/block]
Best way to optimize code is to think and write optimized code. To start, the developer should be familiar with a term called [*'opcodes'*](https://medium.com/@blockchain101/solidity-bytecode-and-opcode-basics-672e9b1a88c2). Let's dive into some of these instructions and get a better understanding of their their behavior.

[block:parameters]
{
  "data": {
    "h-0": "Operation",
    "h-1": "Gas",
    "h-2": "Description",
    "0-0": "ADD/SUB",
    "0-1": "3",
    "0-2": "Arithmetic operation",
    "1-2": "Arithmetic operation",
    "2-2": "Arithmetic operation",
    "3-2": "Bitwise logic operation",
    "4-2": "Comparison operation",
    "5-2": "Stack operation",
    "6-2": "Stack operation",
    "7-2": "Memory operation",
    "8-2": "Unconditional jump",
    "9-2": "Conditional jump",
    "10-2": "Storage operation",
    "11-2": "Storage operation",
    "12-2": "Get balance of an account",
    "13-2": "Create a new account using CREATE",
    "14-2": "Create a new account using CALL",
    "14-0": "CALL",
    "13-0": "CREATE",
    "12-0": "BALANCE",
    "11-0": "SSTORE",
    "10-0": "SLOAD",
    "9-0": "JUMPI",
    "8-0": "JUMP",
    "7-0": "MLOAD/MSTORE",
    "6-0": "PUSH/DUP/SWAP",
    "5-0": "POP",
    "4-0": "LT/GT/SLT/SGT/EQ",
    "3-0": "AND/OR/XOR",
    "2-0": "ADDMOD/MULMOD",
    "1-0": "MUL/DIV",
    "1-1": "5",
    "2-1": "8",
    "3-1": "3",
    "4-1": "3",
    "5-1": "2",
    "6-1": "3",
    "7-1": "3",
    "8-1": "8",
    "9-1": "10",
    "10-1": "200",
    "11-1": "5,000/20,000",
    "12-1": "400",
    "13-1": "32,000",
    "14-1": "25,000"
  },
  "cols": 3,
  "rows": 15
}
[/block]
**Notes:**
* Stack operations (e.g., POP, PUSH), arithmetic operations (e.g., ADD, SUB), bitwise operations (e.g., OR, XOR), and comparison operations (e.g., LT/GT) are cheap because being a stack-based virtual machine, EVM favors such stack-related operations
* Loading a word (i.e., 256 bits) from the memory (e.g., MLOAD) or saving a word to the memory (e.g., MSTORE) are also cheap. For those who don’t know what memory is in solidity, please refer to the solidity document. And search for data allocation (3 types basically, storage, memory, calldata).
* It is worth noting that the gas consumption will be multiplied if many words in memory are read or written.
* Loading a word from the storage (i.e., SLOAD) or saving a word to the storage (i.e., SSTORE) are expensive.
* Memory is temporary but the storage is the persistent memory.
* A SSTORE operation costs 20,000 units of gas if the storage word is set to non-zero from zero; otherwise, it costs 5,000.
* EVM has a number of block chain-specific operations which are very expensive, such as BALANCE, CREATE and CALL.
* A conditional jump (i.e, JUMPI) is more expensive than an unconditional jump (i.e., JUMP).
[block:api-header]
{
  "title": "Type of Transactions Costs"
}
[/block]
Reducing the gas consumed by a contract is important in two situations:
1. Cost of deploying a contract
2. Cost to call the contract functions

### Costs of Contract Deployment
For smart contracts, most of the optimizations are done at compilation. More details about it in the [Documentation FAQs](https://solidity.readthedocs.io/en/develop/frequently-asked-questions.html#are-comments-included-with-deployed-contracts-and-do-they-increase-deployment-gas) 

[block:callout]
{
  "type": "info",
  "title": "",
  "body": "Everything that is unnecessary for execution is removed during compilation. This includes, amongst others, comments, variable names and type names."
}
[/block]
You can reduce the *size* of the contract by removing useless code. 
For example: 

[block:code]
{
  "codes": [
    {
      "code": "function p1 ( uint x ){ \n    if ( x > 5)\n\t\tif ( x*x < 20)\n        XXX \n }",
      "language": "javascript",
      "name": "Example"
    }
  ]
}
[/block]
**Notes**
* line 3 & 4 will never be executed and these type of useless code can be avoided by carefully going through the contract logic, thus reducing the size of the smart contract

### Cost for Function Calls
When contracts' functions are called, for the execution of function it costs gas. Hence optimizing functions to use less gas is important. There can be many different ways of doing it when individual contract is considered. Here are few that might save gas during execution,

**1. Reduce Expensive operations**

 Expensive operations are the opcodes that has more gas values such as SSTORE. Below are some methods of reducing expensive operations.

**A)** Use of [Short Circuiting rules](https://solidity.readthedocs.io/en/develop/types.html#booleans)
[block:callout]
{
  "type": "info",
  "body": "The operators || and && apply the common short-circuiting rules. This means that in the expression f(x) || g(y), if f(x) evaluates to true, g(y) will not be evaluated even if it may have side-effects."
}
[/block]
So if a logical operation includes a expensive operation and a low cost operation arranging in a way that the expensive operation can be short circuited will reduce gas at some executions.

If f(x) is low cost and g(y) is expensive arranging logical operations
* OR :  `f(x) || g(y)`
* AND :  `f(x) && g(y)`

will save more gas if short circuited.

If `f(x)` has a considerably higher probability of returning false compared to `g(y)` arranging AND operations as `f(x) && g(y)` might cause to save more gas in execution by short circuiting.

If `f(x)` has a considerably higher probability of returning true compared to `g(y)`  arranging OR operations as `f(x) || g(y)` might cause to save more gas in execution by short circuiting.

**B)** Expensive Operations in a Loop
[block:code]
{
  "codes": [
    {
      "code": " uint sum = 0;\n function p3 ( uint x ){\n     for ( uint i = 0 ; i < x ; i++)\n         sum += i; \n }",
      "language": "javascript",
      "name": "Example"
    }
  ]
}
[/block]
**Notes**
* `sum` storage variable is read and written every time inside the loop, storage operations that are expensive take place at every iteration. This can be avoided by introducing a local variable as follow to save gas.
[block:code]
{
  "codes": [
    {
      "code": " uint sum = 0;\n function p3 ( uint x ){\n     uint temp = 0;\n     for ( uint i = 0 ; i < x ; i++)\n         temp += i; \n }\n sum += temp;",
      "language": "javascript",
      "name": "Example"
    }
  ]
}
[/block]
**2. Other Loop Related Patterns**
Loop Combining
[block:code]
{
  "codes": [
    {
      "code": "function p5 ( uint x ){\n    uint m = 0;\n    uint v = 0;\n    for ( uint i = 0 ; i < x ; i++) //loop-1\n        m += i;\n    for ( uint j = 0 ; j < x ; j++) /loop-2\n        v -= j; \n}",
      "language": "javascript",
      "name": "Example"
    }
  ]
}
[/block]
Both for loops can be combined to save gas costs (Think 2 for 1 deal!)
[block:code]
{
  "codes": [
    {
      "code": "function p5 ( uint x ){\n    uint m = 0;\n    uint v = 0;\n    for ( uint i = 0 ; i < x ; i++) //loop-1\n       m += i;\n       v -= j; \n}",
      "language": "javascript",
      "name": "Example"
    }
  ]
}
[/block]
Find more loop patterns [here](https://arxiv.org/pdf/1703.03994.pdf)

**3. Using Fixed-size Byte Arrays**

It is possible to use an array of bytes as byte[], but it is wasting a lot of space, 31 bytes every element, to be exact, when passing in calls. It is better to use bytes. As a rule of thumb, use bytes for arbitrary-length raw byte data and string for arbitrary-length string (UTF-8) data. If you can limit the length to a certain number of bytes, always use one of bytes1 to bytes32 because they are much cheaper.

Fixed lengths always save gas.
Read more [here](https://solidity.readthedocs.io/en/latest/types.html#fixed-size-byte-arrays)

**4. Removing useless code as explained earlier under contract deployment will save gas even when functions are executed, if the that can be done inside functions.**

**5. Not using libraries when implementing the functionality is cheaper for simple usages.**

Not using libraries when implementing the functionality is cheaper for simple usages.

Calling library for a simple usages may be costly. If the functionality is simple and feasible to implement inside the contract as it avoids the step of calling the library. execution cost for the functionality only will still be the same for both.

These are some ways of saving gas and there may be many other methods depending on the requirements.
[block:api-header]
{
  "title": "Summary"
}
[/block]
Here are few tips when writing contracts consume *less*:
* Efficient use of data location (memory, storage, and stack). Using them when they're not necessary may cost us more gas
* Avoid loops and recursion 
* Focus on the amount of data that you read/write from the blockchain
* Cost of data storage on the blockchain. 
* Be mindful of using data structures and data types in contract code. When possible, use mapping over arrays. `bytes32` is cheaper than `string` type. If you can limit the length to a certain number of bytes - best to use `bytes1` to `bytes32` since they're cheaper.
* Test, test, test! Deploy your smart contracts on our [testnet server](https://mastery.aion.network/#/dashboard). This way you're not using real-value transactions to test your contracts. 
* Use [Titan Suite](https://titan-suite.com/) to estimate gas consumption before deploying contracts on the network. Titan Suite allows you to interact with an interface to write, test, and deploy your smart contract on various Aion networks.