---
title: "Mechanism Design"
excerpt: "Introduction to game theory applications for smart contract design"
---
**Mechanism design** is a field of economics that starts with the required outcomes and engineers the rules of the game or system that will produce the desired outcome. This means mechanism design will architect for a scenario to meet certain criteria for results, whether it is cooperation, a payment structure, transparency, etc. 

Mechanism design theory is relevant to decentralized applications in an adversarial environment where specific outcomes are desired, the participants are assumed to act for self-serving motives, and the designer is interested in creating a system that will produce these outcomes. In this article we will learn how game theory analyzes systems to determine outcomes, and in the later part apply these tools for designing effective smart contracts.

[block:api-header]
{
  "title": "1. Game Theory Basics"
}
[/block]
## Why study game theory?

Game theory is the study of how self-motivated individuals will act in a game to meet their own needs. It is relevant for mechanism design because it will give us the skills to analyze a game and start thinking in terms of players, choices, incentives, and final outcomes. We will first look at the most basic game, made famous by John Nash. 

## Prisoner's Dilemma
Two members of a criminal gang are arrested and imprisoned. Each prisoner is in solitary confinement with no means of communicating with the other. The prosecutors lack sufficient evidence to convict the pair on the principal charge, but they have enough to convict both on a lesser charge. 

So, the prosecutors offer each prisoner a bargain at the same time. Each prisoner is given the opportunity either to betray the other by testifying that the other committed the crime, or to co-operate with the other by remaining silent. The outcomes are:
* If A and B betray each other - they will both serve two years in prison
* If A betrays B, and B remains silent - A will be set free and B will serve three years in prison (and vice versa)
* If A and B both remain silent - both of them will only serve one year in prison (on the lesser charge).
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/254a94f-prisoner_dilemma.PNG",
        "prisoner_dilemma.PNG",
        1282,
        1318,
        "#e7e8ea"
      ],
      "caption": "[The prisoner’s payoff matrix](https://en.wikipedia.org/wiki/Prisoner%27s_dilemma)",
      "sizing": "80",
      "border": true
    }
  ]
}
[/block]
If we look at the situation from prisoner A's perspective, there are two paths they could consider if B stays silent (left column). Comparing the payoff of -1 and 0, it is a clear decision to betray. If B betrays (right column), A will compare the -3 and -2 payoff, and again it is clear to betray. 

Since it is always a better outcome for each prisoner to betray, this game has one outcome: betray (for both prisoners). This is the famous **Nash equilibrium**. 

## New Terms
Game theory can be approached as the study of equilibrium. An **equilibrium** is generally defined as a state in which no player has an incentive to change their strategy.

A player’s **best response** is the strategy, or set of strategies, that maximizes the player’s payoff, given the strategies of the other players. 

A strategy is a **dominant strategy** for a player if it is optimal, no matter what strategy is used by the other players. 

The players are in a **Nash Equilibrium** if the strategy of each player is the best response to the strategies of the other players. Equivalently, in a Nash equilibrium, none of the players have any incentive to unilaterally deviate from its strategy. 

## Case Study
Let’s observe the process of finding the equilibrium the *Prisoner's Dilemma*.

### Step 1: Define the Players
Prisoner A and Prisoner B

### Step 2: List the most relevant choices available to each player
Prisoner A: Betray or stay silent
Prisoner B: Betray or stay silent

### Step 3: Create the scenarios matrix
A scenarios matrix displays the choices of each player in table or matrix format. To set up simply have a row for one player with their choices and a column for the second player, as in the matrix above. Other types of tables will also help organize the game, depending on the situation.

### Step 4: List how much each player values each choice
This is the part where the matrix is filled in with the outcomes of each choice with years of imprisonment

### Step 5: Find the Pure Strategy Nash Equilibrium
If a payoff of a choice is always better than the payoff of another choice, that is called a **pure  strategy**. If one choice isn’t always better than the other it is called a **mixed strategy**, where the choice depends on timing and circumstances.

In the prisoner’s dilemma, the prisoner is always better off betraying, given that he/she does not know the other prisoner’s choice. We arrive at this by calculating each choice separately in the matrix then analyzing all results. We compare A’s choices, holding B’s choice constant, and same for B. Nash equilibrium is not the best “socially optimal” outcome, in which both prisoners stay silent, yet it is what is best for each prisoner given the circumstances. The best response of each prisoner is the same as the other, both will betray.

### Step 6: Find the probability of a player making a certain choice
An extra step for mixed strategies that will help each player determine the best course of action particularly if other considerations are added to the game, ie. a continuation of the game on a longer timeline.
[block:api-header]
{
  "title": "2. Intro to Mechanism Design"
}
[/block]
In the above, we are given a scenario and calculated the equilibrium outcome. Mechanism design starts with the desired end result and searches for the situation that will give that exact result. For this reason it is also called “reverse” game theory. In dApps we might start with a requirement that defines a desired outcome, e.g., have two participants that will always cooperate.  

> “Look for the answer inside your question” - Rumi

As with all engineering, there is no size fits all prescription for any problem, and no end to the pursuit of better, smarter design. When studying for algorithms interviews, we study basic definitions, tools (data structures, run-time estimates), and examples of common algorithm patterns. Often the most effective way to arrive at a solution is to study the problem as close as possible. We can use the same approach to studying algorithms for interviews by looking at some examples from broad variety of games as our base knowledge. 
[block:api-header]
{
  "title": "3. Types of Games"
}
[/block]
There are many different kinds of games, and as with studying algorithms, the more examples you encounter, the better you will be at creatively applying your own design. Here we cover the few basic types, but we encourage you to explore this fascinating field:
* **Simultaneous action** - players make their decisions without any information about the decisions of others
* **Sequential** - players take turns in decision making, and can usually observe the decisions of others
* **Zero-sum** - whatever one player gains the other players lose 
* **Positive sum** - all players benefit by playing the game.

## 3.1 One-shot (Prisoner’s Dilemma)
Prisoner’s dilemma is a one-shot game where the stakes are high, but there are no repercussions because the game only happens one time.

## 3.2 Repeated game
If the prisoners are allowed to play the game many times, the best strategies change because they are able to cooperate. The best strategy may be to cooperate or defect alternatively. Investigating different strategies is a use of mixed strategy.

##  3.3 Auctions
An auction is any process where a buyer or buyer bids on a good to purchase from a seller or sellers. There are many different kinds of auctions. Before defining all the different types of auctions, let’s go over some auction basics. 

An auction has three parties: the buyer(s), the seller(s), and the auctioneer. Buyers make *bids* for the good in question, sellers make *offers* or *asks*, and the auctioneer facilitates the transaction. When the bid matches the ask, then this results in a price that allows for a transaction. More types of auctions: 
* **Ascending price auctions** - an auctioneer that starts taking bids at a low price, and continues asking for higher-valued bids until no one is willing to bid. 
* **Descending price auctions** - an auctioneer that starts by asking for a high price, and if there are no takers, reduces the ask until there is a buyer. 
* **Open cry auctions** - an auctioneer that announces the current bid or ask in a manner that all buyers and sellers are aware. 
* **Sealed bid auctions** - buyers and sellers do not know the bids, but only the auctioneer does. 

### New Terms
* **Asymmetric information** is the situation where one party knows more information than another.
* **Complete information** is where everyone has all the information.
 
### Google’s Generalized Second Price Auction
Google’s ad strategy on its searches are in the form of a Generalized Second Price (GSP) auction. Every time a user enters keywords and runs a search on Google, an auction among advertisers run, and advertisers compete for slots in the search results based on how they value the user’s keywords and the value of the user responding to the ads. In a second price auction, the advertisers submit their prices (they are willing to pay) privately to Google, and based on the auction rules are given a ranking. The rules are that the first place winner will pay $0.01 more than the second highest price, the second place winner will pay $0.01 than the third highest price, and so forth. This is different from an open auction where bidders are aware of the current highest price to compete with. There are many types of auctions and their design will accommodate various settings (bidders know each other’s values etc.) and achieve certain results (maximize revenue, encourage truthful bidding, etc.).

Suppose Alice, Bob, and Carol are all bidding for two ad spots, with probabilities of being clicked 0.8 and 0.5. They value the ad at $10, $6, and $2 respectively, and spots are sold with the cost per click advertising system. There are m slots for ads and n = 3 bidders.

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/620e779-adexample.png",
        "adexample.png",
        645,
        278,
        "#ebebeb"
      ],
      "caption": "[Second Price Auction between A, B, and C](https://samidavies.wordpress.com/2017/01/14/googles-going-once-going-twice/)"
    }
  ]
}
[/block]
Results of this auction are the following considerations:

**Revenue Maximization** 
Google’s expected revenue (“expected” is the probability result) is the sum of bids and probabilities of the ads being clicked which is 0.8(6) + 0.2(2) = $5.2.

**Incentive Compatible** 
The utility (benefit) of each participant is 0 if their link is not clicked, or do not get a slot, because they pay nothing and receive no customers. The expected utility of bidder ***j*** being given slot ***i*** is  s<sub>i</sub> ( v<sub>j</sub> - p<sub>j</sub> ) and 0 if not given a slot. If the bidders place bids that match their true values, it is considered to encourage truthfulness and is termed “*incentive compatible*”.

A flaw of this auction in practice is that participants may have something between no information about their competitors to partial information. If they do, they can strategize to lie about their true values. If Alice bids her true value $10, her utility is .8($10 - $6) = $3.2 (80% probability of the ad being clicked, her value for the click, and her price for the ad slot of first place). If she is sneaky and knows the second competitor’s value, she can bid less, but just enough to get a second rank. If she bids $5, then her utility is .5($10 - $2)=$4. This is quite possible since competitors will often be in same auctions together over time and will learn each other’s behavior patterns. It turns out that designing auctions that maximize revenue is difficult without complete information about bidders’ values. GSP is no exception here and it does not maximize revenue.

**Social Welfare Maximization** 
Social welfare measures how desirable a situation is for everyone involved. Although this doesn’t affect direct revenue for Google, it is a benefit that would incentivize users to choose Google’s platform over a competitors. The participants in this auction would be advertisers, google, users who use the search, etc. This is a chance to take many other factors into consideration, such as the quality of the ad being clicked. Thus in the auction design it is possible to take quality into account.



### Conclusion
Google’s GSP is not perfect, it fails to maximize revenue when customers learn each other’s behaviors over time. Its design does not always meet the desired outcome, and there are other types of auctions (Vickrey-Clarke-Groves auction) that could possibly perform better.

## 3.4 Double Auctions
Double auction is the situation of buying and selling goods to determine one market price for a group of buyers and sellers. Buyers submit their “bid” prices and sellers submit their “ask” prices simultaneously and the auctioneer will choose one price p that optimally clears the market. All buyers who bid prices greater or equal to the p will buy and all sellers who ask prices lower or equal to p will sell, thus clearing the market. 

Double auctions are relevant to a spectrum of decentralized application challenges, particularly within enterprise, business 2 business models, supply chains, and markets including decentralized exchanges.

### New Terms
* A** competitive equilibrium** is a situation in which supply equals demand.
* **Theory of price** is the economic study where the price of a good or service is based on the relationship between the supply and demand for it.
* **Supply auctions** have many sellers, but only one buyer. 
* **Demand auctions** have many buyers, but only one seller. 
* **Double auctions** have many buyers and sellers. 


[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/214331c-doubleauction_ex.PNG",
        "doubleauction_ex.PNG",
        1499,
        1098,
        "#fafafa"
      ],
      "sizing": "80",
      "border": true,
      "caption": "[Example of discrete supply and demand](http://www.sci.brooklyn.cuny.edu/~parsons/projects/mech-design/publications/cda.pdf)"
    }
  ]
}
[/block]
### The Ideal Price
The ideal price of a double auction would satisfy these properties:
1. **Rational Individuality (IR)**: 
  * We assume individuals are acting rationally and will not lose from participating in the auction. 
  * Buyers will not buy at a price higher than they are willing to pay and sellers will not sell at a price lower than they are willing to take.
2. **Balanced Budget (BB)** has two flavors:
  * Strong balanced budget (SBB): The auctioneer should not lose or gain money, all money is transferred completely from buyers to sellers
  * Weak balanced budget (WBB): Auctioneer may gain some, but will not lose money.
3. **Truthfulness (TF) or Incentive Compatibility (IC) or strategy-proofness (SP)** also has two flavors of strong and weak:
  * Strong property is dominant strategy incentive compatibility (DSIC): reporting their true value (what the individual values in the good or service) should be a dominant strategy for all players. Players should not have incentive to change their choice after spying on their neighbours. 
  * Weaker property is Nash equilibrium incentive compatibility (NEIC): There exists a Nash equilibrium in which all players report their true valuations. If all but one player is untruthful, it is still best for the remaining player to be truthful.
4. **Economic Efficiency (EE)**: 
  * The total social value should be the best possible. After trade, the items should be in the hands of those who value it the most, for example transfering from the sellers to the buyers.

According to the Myerson-Satterthwaite Theorem, it is not possible to achieve all of these requirements, but some mechanisms will satisfy some of them.

### Average Mechanism
Order the buyers in decreasing order of their bid and seller in increasing order of their bid. Find the breakeven position k. Set the price to be the average of kth values. Let the first k sellers sell to the first k buyers at price p = ( b<sub>k</sub> + s<sub>k</sub> ) / 2.

This mechanism satisfies individual rationality because the buyers who bought the good value it at least p and sellers value at most p, because of the ordering. Balanced budget is satisfied because all money transfers are between buyers and sellers. It is economically efficient because the transferred items are owned by those who value it most. It is however not truthful because a buyer k has incentive to report a lower value and seller has incentive to report a higher value k. They are the buyer and seller who are at the breakeven, and may not report a truthful value because their price gets averaged.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/f868fdf-doubleauction_2.PNG",
        "doubleauction_2.PNG",
        1527,
        1136,
        "#fafbfb"
      ],
      "caption": "[Equilibrium price is averaged of $20 - $25 and buyer and seller has incentive to be untruthful and market will still allow them to trade](http://www.sci.brooklyn.cuny.edu/~parsons/projects/mech-design/publications/cda.pdf)",
      "sizing": "80",
      "border": true
    }
  ]
}
[/block]
If you think of bargaining in the street market, you will try to buy for a lower price than you are willing to pay if you can.

### Vickrey-Clarke-Groves Mechanism
In the previous design, all criteria were met except for truthfulness. Vickrey-Clarke-Groves (VCG) will meet the truthfulness criteria, but will require the auctioneer to pay for the subsidy. From before, if we order buyers and sellers, the buyer *k* and seller *k* are the ones at the breakeven. The rules are that the buyer *k* will pay the ask price s (of the seller) and seller *k* will receive the bid price *b* (of the buyer), only if *b* > *s*. Even if *b* = *s* the trade will not happen. Supplier will receive $25 and buyer will pay $20 from figure 2. The auctioneer will lose $25-$20 = $5, as they are forced to pay for the difference in this scenario. Thus is it not a balanced budget. Real world example of this is government paying farmers a subsidy because of the greater good for society.

### Trade reduction mechanism
This mechanism gives up a single deal in order to maintain truthfulness. This satisfies IR and truthfulness. It is only weakly BB because the auctioneer is left with the surplus of an untraded item, but at least does not need to pay. It is not EE because buyer *k* and seller *k* don’t trade, although the buyer values the item more than the seller.

## Case Study: Concurrent Double Auctions in a Supply Chain
The basic double auction model uses a single market, but it can be extended to handle multiple markets. Consider where buyers in one market become sellers in the next market. The chain of markets is a supply chain model. This is called a concurrent double auction.

In a supply chain, there is the added constraint of quantity of goods produced should match the quantity bought. It should be BB as an intermediary will want to avoid subsidizing the price in its market. It may be a second price auction if bidders have limited information about their competitor’s valuations. An example of a concurrent auction would be the supply chain for lemonade, where the first market is for lemons, between the farmer and lemonade factory, and the second market is between the grocery store and the lemonade producer, and the final market for lemonade between the grocery and the customer.

Depending on the specific requirements of the business use-case, we can design for certain outcomes using auction theory as discussed previously.

It should be noted that the relationship between prices of lemons and lemonade is not obvious. For instance, the price is not determined by the cost of production of the farmer, but in the long run (when players learn more about consumer preferences), it is determined by the value of the final consumer and how much they are willing to pay for the final lemonade.
In the case where buyer-seller relationships in the supply chain are not a simple chain, graph theory can be applied, ie. acyclic graphs.
[block:callout]
{
  "type": "info",
  "body": "Written by [Angela Lee](https://medium.com/@angelalee.one) // [Mavennet](https://mavennet.com/)"
}
[/block]
###### Sources
------
<sub>https://en.wikipedia.org/wiki/Prisoner%27s_dilemma</sub>
<sub>http://mba.tuck.dartmouth.edu/pages/faculty/robert.shumsky/gametheorymodels.pdf</sub>
<sub>https://samidavies.wordpress.com/2017/01/14/googles-going-once-going-twice/</sub>
<sub>https://www.ignitionframework.com/basics-game-theory-mixed-strategy-equilibria-reaction-functions/</sub>
<sub>https://en.wikipedia.org/wiki/Double_auction</sub>
<sub>http://www.sci.brooklyn.cuny.edu/~parsons/projects/mech-design/publications/cda.pdf</sub>
<sub>https://en.wikipedia.org/wiki/Algorithmic_game_theory</sub>
<sub>Nisan, Noam; Ronen, Amir (1999), "Algorithmic mechanism design", Proceedings of the 31st ACM Symposium on Theory of Computing (STOC '99), pp. 129–140, doi:10.1145/301250.301287, ISBN 978-1581130676</sub>