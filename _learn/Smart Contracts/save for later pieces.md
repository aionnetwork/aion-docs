---
title: "save for later pieces"
excerpt: ""
---
This tutorial will walk you through on several steps. 

1. Aion Node
2. Account Creation & Acquiring Account Balance
3. Smart Contract 
4. Deploy Smart Contract 
Interact w/ Smart Contract
Look at transaction hash in Aion Explorer
[block:callout]
{
  "type": "info",
  "title": "Other Methods to Connect to the Aion Network",
  "body": "* [BlockDaemon](https://blockdaemon.com/) (Node Hosting Service - *30 day trial*)\n* [Download & Run the Aion Kernel](https://github.com/aionnetwork/aion/releases) (Run an Aion node on your computer - *Advanced Users Only*)"
}
[/block]

[block:parameters]
{
  "data": {
    "0-0": "```incrementCounter```",
    "1-0": "```decrementCounter```",
    "0-1": "Increase counter by 1",
    "1-1": "Decrease counter by 1",
    "h-0": "Function",
    "h-1": "Return",
    "2-0": "```getCount```",
    "2-1": "Current counter status"
  },
  "cols": 2,
  "rows": 3
}
[/block]
*Read more about it on their <a href="https://medium.com/nodesmith-blog/tutorial-connect-to-the-aion-network-in-minutes-with-nodesmith-a5e5d6c49cb" target="_blank">blog post.</a>*


optimize smart contract waste
[block:api-header]
{
  "title": "Old shit"
}
[/block]
Let's take a look at how to Optimize these smart contracts. The two keywords is "Optimize" and "smart contract". Optimize is just ways of rearranging or rewrite(the instructions in a program) to maximize efficiency and speed in retrieval, storage or execution. Smart contract can be optimized to reduce cost,improve efficiency,speed and also remove vulnerabilities.
   Let take a look at this simple C-program(image below).
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/86c0682-image_11.png",
        "image 11.png",
        800,
        722,
        "#2e2c2b"
      ],
      "caption": "Initial C-program for optimization."
    }
  ]
}
[/block]
If this program is compiled(converting the program into a machine code or lower-level form in which the program can be processed) without optimization,it will take this program some time to run but if optimized, it will be runner immediately. The reason for that is that [compiler ](https://en.wikipedia.org/wiki/Compiler) understands that variable **x **in *main()* function is been used nowhere in the next code,therefore call to *calculate()* function can be totally removed from the program. The result of the optimization can be seen in the image below.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/567112a-image_111.png",
        "image 111.png",
        800,
        238,
        "#2c2b29"
      ],
      "caption": "Optimized version from the Initial C-program."
    }
  ]
}
[/block]
Let's try and change the return statement in the *main()* function,changes can be seen in the image below.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/05f977d-image_1111.png",
        "image 1111.png",
        800,
        722,
        "#2e2c2b"
      ],
      "caption": "No automatic optimization is available."
    }
  ]
}
[/block]
In this scenario, the compiler will be powerless to help with the optimization. The only remaining option is a Manual optimization.
[block:api-header]
{
  "title": "Manual Optimization"
}
[/block]
Manual Optimization is a creative process,because there are many places and opportunities for improvement in real programs. We can also use [Profiler](https://en.wikipedia.org/wiki/Profiler), a tool used for Profiling([instrumenting ](https://en.wikipedia.org/wiki/Instrumentation_(computer_programming) ) programs source code) to find errors in the programs and when the error is found, you can use one of many known approaches for optimization,efficient algorithm and so on.
Let's take a broad view at *calculate()* function from the example above. On every internet loop iteration, the variable **r **changes from 0 to 1 and back.The initial value is 0,so you need just to know if there will be odd iterations or not. If any of parameters **a **or **b **is even the number of iterations is even and return value is 0. So here is a manually optimized version of *calculate() * function,the image can be seen below.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/c5cf6f8-image_A.png",
        "image A.png",
        800,
        340,
        "#2d2b2a"
      ],
      "caption": "Manually optimized version of calculate() function.",
      "sizing": "smart"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Dangerous Optimization"
}
[/block]
Optimizations are very great,they make programs and contracts run quicker and also makes them consume less memory, to lower number of I/O operations, etc. However,some of them can decrease performance or even be dangerous.
The first bottleneck is with different environments and parameters. Let take for example, if program is optimized for running on a cluster of computers,but we use it on a single machine.Or programs was optimized for speed and input files are fully loaded into memory. It is possible to get problems when there is not enough memory on a computer or file is too big.
   Most times optimizations could lead to vulnerabilities. In many programs standard *memset() * function is used for cleanse of sensitive data like keys and passwords. But compilers often just remove these calls because updated variables are not used anymore. That is why recently memory cleanse function in openSSL Looked the following way(image below)
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9e1c7db-image_B.png",
        "image B.png",
        800,
        722,
        "#302d2b"
      ],
      "caption": "Memory cleanse function from OpenSSL project (https://bit.ly/2zAt4ab)."
    }
  ]
}
[/block]
Of course *memset()* function problem is an exception to the rules. Optimizers generate correct code, and circumstances of use could lead to errors. But humans are the source of incorrect code.
Manual optimizations are extremely dangerous.you can see the optimized version of *calculate()* function in the image above, but that was incorrect optimization. I started with the correct statement
*If any of parameters **a **or **b ** is even then number of iterations is even and return value is 0.* 
This is material conditional, so if condition is false then it implies nothing. Is there a situation when **a ** and **b ** is odd, but number of loop iterations is even? The answer is “yes”. If **a** or **b ** is a negative number then there will be no loop iterations at all. So the correct manually optimized code is seen in the following image
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/fde9578-image_c.png",
        "image c.png",
        800,
        353,
        "#2d2c2a"
      ],
      "caption": "Correct manually optimized code."
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Global Variable Cost (Storage)"
}
[/block]
Global variables are mainly stored or persisted in a contract's state on the blockchain. This tends to be the most costly operation in terms of transaction fees. Its very important for you to have minimum memory footprint for your stored global variables. This is a very good programming practice in all languages,but it is especially important in a constrained environment such as the etherum blockchain. An example woulf be using the expensive type string when you could use a uint to denote something.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/67042fa-Screenshot_2018-11-26_Optimizing_your_Solidity_contracts_gas_usage__Coinmonks__Medium.png",
        "Screenshot_2018-11-26 Optimizing your Solidity contract’s gas usage – Coinmonks – Medium.png",
        700,
        84,
        "#ececec"
      ]
    }
  ]
}
[/block]
**Observation**
  It is quite imperative to realize that a uint == unit 255 and for whatever reason, a uint256 takes less fee to store than a uint8. So,if you are trying to optimize data types as you should, just realize this caveat.
Remove as much duplication within structs as you can and if you have member variables within structs that are storing same value,remove the duplicates if you can without sacrificing security.

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/62b0d85-Screenshot_2018-11-26_Optimizing_your_Solidity_contracts_gas_usage__Coinmonks__Medium1.png",
        "Screenshot_2018-11-26 Optimizing your Solidity contract’s gas usage – Coinmonks – Medium(1).png",
        626,
        236,
        "#eeeeee"
      ]
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Contract Size"
}
[/block]
Contract size plays in major role in determine transaction fees, the overall size of your contract plays a part in the transaction fee for all interactions with it. You can break the contract into smaller separate contracts to reduce users transaction costs when interacting. Take take for instance, if you have a [Dapp](https://ethereum.stackexchange.com/questions/383/what-is-a-dapp)(decentralized application) that supports truck and car rentals,it's suggestible you make a single contract and share common parts but if the car market is down and no one is renting cars,it doesn't make sense for the truck rental users to have to pay for the contract bloat of unused code.it may be wise for you to break the contract up into an Auto and Moto contract respectively.