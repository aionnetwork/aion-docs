---
title: Accountability
---

### Is there slashing mechanism in place?

No, slashing will not be implemented in the initial mainnet release of Unity but it is a field we are actively researching and will likely be implemented in future versions of the Unity consensus model. 

### How does self-bonding work?

Public pool operators must deposit a self-bond amount of a minimum 1,000 AION to activate their pool and accept delegation. The self-bond amount must maintain a 1% ratio of total delegated stake. 

### Is self-bonding non-custodial (can delegators contribute to increasing the self-bond amount and how easy is it)?

The self-bond is managed with the "identity" key that is recommended to be kept in cold storage by pool operators. To increase the self-bond amount a pool operator must send the transaction to the contract, however, they can have their own contract on top of that to provide the ability for delegators (and others) to contribute directly to the self-bond. 

### How is double-signing being handled and are there slashing parameters?
Is there a minimum commission % for delegation?

No, there is no minimum and pool operators can charge anywhere between 0-100% commission fees. 

### How are you addressing the 0% staking pool commission fee dilemma?

Since there are no governance/voting rights associated with staking and no limited validator set, there is no incentive to have a "race to the bottom" for pool operator commission fees. We envision a free market to determine the appropriate fee structure.