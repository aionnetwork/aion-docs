---
title: "Optimize your Solidity Contract"
---

How does one optimize a smart contract? Let's dive in on different methods on how to reduce the cost of your. The two keywords is "Optimize" and "smart contract". Optimize is just way of rearranging or rewriting the code (the instructions in a program) to maximize efficiency and speed in retrieval, storage or execution. Smart contract can be optimized to reduce cost, improve efficiency, speed and also remove vulnerabilities.

## Transaction Fee

For every transaction that happens on the blockchain, whether cryptocurrency or contract interactions, it is essential for it to recorded on the blockchain for it to be considered as a valid transfer. Who's validating these transfer? The validation process of checking transactions and then adding it to the blockchain is done by a group of people called _miners_. Miners are powerful computers and software that sum up a particular portion of the network to confirm these transactions. Of course, the amount of computational power and energy consumed to record these transactions are a huge, thus why the incentives for this are to collect _transaction fees_.

Miners are compensated via [block rewards](https://www.investopedia.com/terms/b/block-reward.asp) each time a block (which contains a collection of transactions) is added to the blockchain. For this reason, miners have a financial incentive to prioritize the validation of transactions that include a higher fee.

## How Transaction Costs are Determined

Let's start with the basics of contract code execution. Mentioned previously, smart contracts are run on miner's machines who get compensated gas for allocating their computing resources. Both creators and users of this smart contracts will be charged a certain amount of gas for _renting_ the computing resources from miners. Thus, _gas_ is equivalent to how much _work_ a set of actions take to perform.

Transaction costs are calculated by multiplying _gas_ and _gas price_. If you're a developer, you have to be mindful when writing these contracts, otherwise, the end users (and as well the creator) may end up using lots of _gas_.

Also, there is something called a _block gas limit_. Block gas limit is responsible for defining the maximum amount of gas of all transactions mined in a block combined. Read more about the difference between gas limit & block gas limit [here](https://ethereum.stackexchange.com/questions/7359/are-gas-limit-in-transaction-and-block-gas-limit-different).

## Thinking about Optimization

Best way to optimize code is to think and write optimized code. To start, the developer should be familiar with a term called [_opcodes_](https://medium.com/@blockchain101/solidity-bytecode-and-opcode-basics-672e9b1a88c2). Let's dive into some of these instructions and get a better understanding of their their behavior.

| Operation | Gas | Description |
| --------- | --- | ----------- |
| ADD/SUB | 3 | Arithmetic operation |
| MUL/DIV | 5 | Arithmetic operation |
| ADDMOD/MULMOD | 8 | Arithmetic operation |
| AND/OR/XOR | 3 | Bitwise logic operation | 
| LT/GT/SLT/SGT/EQ | 3 | Comparison operation |
| POP | 2 | Stack operation |
| PUSH/DUP/SWAP | 3 | Stack operation |
| MLOAD/MSTORE | 3 | Memory operation |
| JUMP | 8 | Unconditional jump |
| JUMPI | 10 | Conditional jump |
| SLOAD | 200 | Storage operation |
| SSTORE | 5,000/20,000 | Storage operation |
| BALANCE | 400 | Get balance of an account |
| CREATE | 32,000 | Create a new account using CREATE |
| CALL | 25,000 | Create a new account using CALL |

**Notes:**

- Stack operations (e.g., POP, PUSH), arithmetic operations (e.g., ADD, SUB), bitwise operations (e.g., OR, XOR), and comparison operations (e.g., LT/GT) are cheap because being a stack-based virtual machine, EVM favors such stack-related operations
- Loading a word (i.e., 256 bits) from the memory (e.g., MLOAD) or saving a word to the memory (e.g., MSTORE) are also cheap. For those who don’t know what memory is in solidity, please refer to the solidity document. And search for data allocation (3 types basically, storage, memory, calldata).
- It is worth noting that the gas consumption will be multiplied if many words in memory are read or written.
- Loading a word from the storage (i.e., SLOAD) or saving a word to the storage (i.e., SSTORE) are expensive.
- Memory is temporary but the storage is the persistent memory.
- A SSTORE operation costs 20,000 units of gas if the storage word is set to non-zero from zero; otherwise, it costs 5,000.
- EVM has a number of block chain-specific operations which are very expensive, such as BALANCE, CREATE and CALL.
- A conditional jump (i.e, JUMPI) is more expensive than an unconditional jump (i.e., JUMP).

## Transaction Types

Reducing the gas consumed by a contract is important in two situations:

1. Cost of deploying a contract
2. Cost to call the contract functions

### Costs of Contract Deployment

For smart contracts, most of the optimizations are done at compilation. More details about it in the [Documentation FAQs](https://solidity.readthedocs.io/en/develop/frequently-asked-questions.html#are-comments-included-with-deployed-contracts-and-do-they-increase-deployment-gas).

Everything that is unnecessary for execution is removed during compilation. This includes, amongst others, comments, variable names and type names. You can reduce the size of the contract by removing useless code.

### Cost for Function Calls

When contracts' functions are called, for the execution of function it costs gas. Hence optimizing functions to use less gas is important. There can be many different ways of doing it when individual contract is considered. Here are few that might save gas during execution,

#### Reduce Expensive operations**

Expensive operations are the opcodes that has more gas values such as SSTORE. Below are some methods of reducing expensive operations.

##### Use of [Short Circuiting rules](https://solidity.readthedocs.io/en/develop/types.html#booleans)

The operators `||` and `&&` apply the common short-circuiting rules. This means that in the expression `f(x) || g(y), if f(x)` evaluates to `true`, `g(y)` will not be evaluated even if it may have side-effects.

So if a logical operation includes a expensive operation and a low cost operation arranging in a way that the expensive operation can be short circuited will reduce gas at some executions.

If `f(x)` is low cost and `g(y)` is expensive arranging logical operations

- `OR` :  `f(x) || g(y)`
- `AND` :  `f(x) && g(y)`

will save more gas if short circuited.

If `f(x)` has a considerably higher probability of returning false compared to `g(y)` arranging AND operations as `f(x) && g(y)` might cause to save more gas in execution by short circuiting.

If `f(x)` has a considerably higher probability of returning true compared to `g(y)`  arranging OR operations as `f(x) || g(y)` might cause to save more gas in execution by short circuiting.

##### Expensive Operations in a Loop

```javascript
uint sum = 0;
function p3 ( uint x ){
    for ( uint i = 0 ; i < x ; i++) {
        sum += i;
    }
 }
```

The `sum` storage variable is read and written every time inside the loop, storage operations that are expensive take place at every iteration. This can be avoided by introducing a local variable as follow to save gas.

#### Other Loop Related Patterns

##### Loop Combining

```javascript
function p5 ( uint x ){
    uint m = 0;
    uint v = 0;
    for ( uint i = 0 ; i < x ; i++) //loop-1
        m += i;
    for ( uint j = 0 ; j < x ; j++) /loop-2
        v -= j;
}
```

Both for loops can be combined to save gas costs (Think 2 for 1 deal!)

```javascript
function p5 ( uint x ){
    uint m = 0;
    uint v = 0;
    for ( uint i = 0 ; i < x ; i++)
       m += i;
       v -= j;
}
```

Find more loop patterns [here](https://arxiv.org/pdf/1703.03994.pdf).

### Using Fixed-size Byte Arrays**

It is possible to use an array of bytes as byte[], but it is wasting a lot of space, 31 bytes every element, to be exact, when passing in calls. It is better to use bytes. As a rule of thumb, use bytes for arbitrary-length raw byte data and string for arbitrary-length string (UTF-8) data. If you can limit the length to a certain number of bytes, always use one of bytes1 to bytes32 because they are much cheaper.

Fixed lengths always save gas. Read more [here](https://solidity.readthedocs.io/en/latest/types.html#fixed-size-byte-arrays).

### Stop Using Libraries

Not using libraries when implementing the functionality is cheaper for simple usages.

Calling library for a simple usages may be costly. If the functionality is simple and feasible to implement inside the contract as it avoids the step of calling the library. execution cost for the functionality only will still be the same for both.

These are some ways of saving gas and there may be many other methods depending on the requirements.

## Summary

Here are few tips when writing contracts consume _less_:

- Efficient use of data location (memory, storage, and stack). Using them when they're not necessary may cost us more gas
- Avoid loops and recursion 
- Focus on the amount of data that you read/write from the blockchain
- Cost of data storage on the blockchain. 
- Be mindful of using data structures and data types in contract code. When possible, use mapping over arrays. `bytes32` is cheaper than `string` type. If you can limit the length to a certain number of bytes - best to use `bytes1` to `bytes32` since they're cheaper.
- Test, test, test! Deploy your smart contracts on our [testnet server](https://mastery.aion.network/#/dashboard). This way you're not using real-value transactions to test your contracts.
- Use [Titan Suite](https://titan-suite.com/) to estimate gas consumption before deploying contracts on the network. Titan Suite allows you to interact with an interface to write, test, and deploy your smart contract on various Aion networks.