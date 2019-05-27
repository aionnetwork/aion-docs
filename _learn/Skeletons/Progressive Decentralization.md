---
title: "Progressive Decentralization"
excerpt: ""
---
[block:api-header]
{
  "title": "Let's start off with decentralization"
}
[/block]
Why should anyone care about decentralization? Although we may be familiar with the high level concept of it, how many dots have been connected and do well fully understand the social and political ramifications of it?

Decentralization is not an easy change to execute. Let's quickly jump into time machine and travel back to the 'early Internet era' - 1995. Could we have imagined our infinitely connected world we live in today, would have blossomed from this new technology? Even back then, well known technologists were voicing their lack of confidence of the fate of internet.

> *“I predict the Internet will soon go spectacularly supernova and in 1996 catastrophically collapse.”* Robert Metcalfe, in InfoWorld, 1995

We should start by trying to allow the world to see decentralization for what it is: the premise of a new world order. 

Change is hard, scary and confusing. It destroys your previous references and leaves you in a world where you have to re-think everything again. It’s a lot of work to adapt, but the earlier your start, the easiest it is, just like it happened for Internet.
[block:api-header]
{
  "title": "Cryptokitties"
}
[/block]
Let's use cryptokitties as a framework...
Why no ICO?
Why flat fee of 3.75%?
This fee number will never be able to change due to immutability 

[block:api-header]
{
  "title": "Immutability is the problem and solution"
}
[/block]
Immutability, another word for unchangeable, is blockchain's double edged sword in paving the way to meaningful adoption. The idea of unchangeable, final version code is frightening to programmers - you can't go back and modify certain logic to adapt to changing environments. It sometimes may even feel like choosing between 2 one-way only paths, which naturally brings anxiety to a lot of decisions and people.

Although it may seem obvious, we have to remember an important fact. The fact that decentralization lies on a spectrum and is not a single state. It goes from the most centralized systems possible such as central banks, to purely decentralized forms where data and value is distributed across the network. 

There comes vast benefits that greatly improve the life of everyday people offered by blockchain. The distribution of permanent and universal rules allows for fairness and transparency combined with the trust security. But, since it's usually implemented with an all-or-nothing mindset, it creates a lot of friction for blockchain agile development and unnecessary obstacles.

Iteration is necessary for development; total control is not. Agility and iteration go hand in hand when developing better products, and better products result in more adoption.
[block:api-header]
{
  "title": "Progressive Decentralization"
}
[/block]
// Maybe blurb about cryptokitties and how they encountered these immutability uncertainties ?

When building dApps, there are no rules that say you have to commit to 100% decentralization, but rather negotiate and apply certain aspects of it. This means structuring your smart contracts that allows the creators to have certain powers, then incrementally locking those powers away in a transparent and fair way. 

The most important point is that the locking mechanisms are public and immutable from the very beginning. Creators will not be able to modify these terms that could take advantage of the application or users. Finding a balance is the key, and when done in a correct manner, progressive decentralization will allow the transparency and flexibility for creators modify certain aspects of the application. 

Just because we’re building decentralized apps doesn’t mean we should throw out all the best practices from traditional client-server product development.
[block:api-header]
{
  "title": "How to do it?"
}
[/block]
There are many ways to apply progressive decentralization into your dApp considerations. There's no one size fits all solution and one must take in all the factors and constraints, then decide what approach is best suited. 

Let's go over some ways that devs can approach:
1. Create multiple contracts that have appropriate specialties of concern, along with ability to replace those contracts (by redirecting to a new contract address). [Decentraland](https://github.com/decentraland/marketplace-contracts) is a good example of a decentralized application that uses upgrade-able contracts.
2. Configurable variables with permissions to modify values independently. Check out [Etheremon](https://www.etheremon.com/), which allows certain permissions to groups of users who become moderators.
3. Define a set of increasing levels in the contract, each allowing creators access to certain functions and capabilities. The levels can only be increased which means backtracking is not an option. Let's lay out an example - on the first level, creators still have access to change with variables. At level 2, the contract locks these variables in but some other functions and variables still have special permissions granted to creators. At the final level, contract locks all these functions and variables in. 

Although pure decentralists may find this process too centralized - this is merely just a starting point. There are further measures to balance decentralization with iteration. The solution combines transparency of the purpose and the conditions and constraints in the contracts. 
Some constraints could be:
* **Selection**: Only selective variables and functions can be modified, only the ones that need future iteration.
* **Range**: For game economies, there are general ranges but not be nailed down to an exact number Providing a range allows the users to be confident that the iteration will fall in the given and reasonable scope. 
* **Direction**: Similarly to the other concepts, allow certain updates and iterations to move in a direction (whether forwards or back), but never backtracking.
[block:api-header]
{
  "title": "Accountability"
}
[/block]
Progressive decentralization sounds great in theory, but how do we keep the creators and developers accountable for their product roadmap? And to eventually complete the decentralization aspect of their smart contracts? How do you provide confidence to users who have faith in the overall application but are skeptical until they see it? 

Progressive decentralization includes tenets to keep creators accountable:
* **Time/block-based maturity**: Finalize certain configuration variables, revoke special permissions from creators or developers once a certain time or block number has been reached. Once the time/block condition has been met, the contract will automatically execute these changes.
 
// Should we include CryptoKitties example or?
Imagine, for example, that CryptoKitties had a runway of 360,000 blocks (around 60 days’ time) from the moment it launched to adjust the Kitties’ breeding cooldown variables. We could tweak the cooldown mechanics until that point, giving ourselves the breathing room to perfect the balance, while still guaranteeing players that we wouldn’t have that power indefinitely.

* **Usage-based maturity**: Lock values and special permissions after a set number of users have been acquired or transactions have been completed. This is a little harder to estimate as it's hard to gauge user acquisition or if the amount of transactions will reflect that a certain quality threshold has been met. 

// CryptoKitties example - Keep or remove?
For example, Cryptokitties could have added configurable fees into the contract after 10,000 transactions. 

* **Economic Incentive**: You can align the creator's incentives in parallel with decentralization. For example, profit margins can increase as the smart contract becomes more decentralized. Transaction fees can be increased as decentralization increases. This creates a financial incentive for developers to reach full decentralization and at an appropriate pace. 

[block:api-header]
{
  "title": "No One Size Fits All Solution"
}
[/block]
There's no right or wrong path when progressively decentralizing your application. The best way to analyze appropriate implementation is based on the project and goals itself. By using that as a starting point, it'll be easier to justify what requirements and constraints are needed and can be achieved by the concepts that are mentioned in this article. 

The idea behind progressive decentralization is being able to take a normal application and improve it by utilizing the immense power that blockchain and smart contracts have to offer. 

Of course, developers shouldn't dive head in first and that's why progressive decentralization can benefit users in the long run by: 
1. Allowing developers and creators to experiment and adjust with variables 
2. Providing a better product to consumers
3. Giving a better overall experience to users and developers

Mass adoption starts by creating a beautiful experience for end users that better their lives and brings more awareness and praise to the power of decentralization. 

Sources
___
<sup>https://hackernoon.com/why-decentralization-matters-a-12-min-overview-for-the-layman-6ec572d35af6</sup>
<sup>https://medium.freecodecamp.org/why-progressive-decentralization-is-blockchains-best-hope-31a497f2673b</sup>