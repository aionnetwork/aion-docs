---
title: Validator Set
---

### Is there a limit to # of validators?

No, the total number of validators/stakers can scale infinitely. 

### Why or why not?

We believe that accessibility is key to decentralization and we designed Unity as such. Having low barriers to entry allows a free-market that is more collusion resistant. Unity is unique in that it is a hybrid system where both PoW and PoS algorithms produce blocks and therefore doesn't have share similar attack vectors of solely PoS networks. 

### What are the security risks of have an unlimited validator set?

The main attack vector is a 51% attack since there are no governance rights that are associated to staking. However, since PoS and PoW are running concurrently and produce blocks in an ordered sequence of each other (1 PoW block, 1 PoS block, 1 PoW block and so on...), an attacker would have to successfully attack both algorithms at the same time to pre-mine enough blocks to successfully fork the network. The attacker running a staking pool will have to acquire enough stake to overpower the total staked amount, which ends up being very costly as they will need to have a very high self-bond (which also follows similar economic costs to other PoS networks). If the attacker wanted to run several pools at once, there will be the added cost of running infrastructure and marketing delegations to multiple pools.
We also aim to introduce slashing in future versions of the protocol to further harden the security threshold and punish attackers.