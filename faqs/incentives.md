---
title: Incentives
---
### What does the yield curve look like for PoS blocks?

The PoS distribution curve is linear and diminishes proportionally with increased participation. 
What is the competition relationship between PoW and PoS in terms of block produced?
Despite both mechanisms producing blocks on the same blockchain, each algorithm has its unique difficulty and reward distributions so they do not compete over the same rewards.

### Does PoS compete with PoW for total rewards? How can a pool calculate expected returns from PoS blocks?

No, they do not compete for total rewards, each has its own reward distribution. A pool can calculate its annual rate of return based on the fixed block reward divided by total participation (numbers to be finalized and provided). 

### Are rewards still generated during the unbonding period?

Rewards are not generated during the unbonding period. As soon as a delegator (user) unbonds stake from a pool that stake will be removed the pool's stake even during the unbonding period.

### Are rewards automatically compounding/restaked when generated or users have to withdraw them from the pool and restake them?

On the protocol layer/ staking contracts, there is a feature for auto-redelegation, which means if a user enables this flag rewards will be compounded to stake. This feature is not part of the MVP/Beta release of the product (Staking interface) users will have for delegating to pools. However, this feature is of high priority and I am hoping to get it done as soon as we are live.

### What is the unbonding period?
There is no bonding period, but there is an unbonding period that will be around 24hrs (final numbers are still being tested)

### Is there a maximum stake per node?
There are no limits in place yet, however, the total eligible stake amount depends on the self bond amount, which has a 1:100 ratio to maintain (i.e. a 1,000 AION self bond allows 100,000 AION in delegated stake capacity and so on).

### Are rewards immediately liquid?
Rewards are almost immediately available for delegators but there is an undelegate lock up period of up to 24 hours (exact number to be confirmed).