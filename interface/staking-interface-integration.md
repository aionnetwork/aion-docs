---
title: Staking Interface Integration
---

## Staking Interface Integration Guide

This document is designed as a guide for interfaces like exchanges and wallets to set up interaction with Aion staking related contracts.

> Note: This guide is based on [Engineering Design and Incentive Specification for Aion Unity](https://github.com/aionnetwork/unity-engineering-spec) by Ali Sharif and [*Aion Unity Smart Contracts*](https://github.com/aionnetwork/protocol_contracts).

Specific guidance and requirements are laid out in this document for the responsibilities of any user interface (UI) for the Aion Public Delegation Standard (ADS).

The specifications are requirements for what the UI must achieve, but no guidance is provided as to how to achieve it for implementation flexibility based on the medium (desktop, web, mobile), target audience, etc.

Assumptions made:

- Familiarity with staking concepts
- Familiarity with Aion staking mechanism [Engineering Design and Incentive Specification for Aion Unity](https://github.com/aionnetwork/unity-engineering-spec)
- Pool mechanism

### Operational Requirements

Staking interface provider is required to have access to an Aion node to interact with delegation and staking contracts. Services like [Nodesmith](https://nodesmith.io/) provide easy access to Aion network.  

If you want to maintain your custom infrastructure here's a link to a guide to set up your custom node [link to guide](https://docs.aion.network/v1.0/docs/node-set-up).

### Key Management

For interface providers (such as crypto wallets or exchange) there are built-in key management systems that don't have to follow a certain standard to allow for participation in Aion staking.

### Implementation Examples

For advanced users, there's a set of Shell scripts provided by Aion to interact with the pool registry contract - [Unity Bootstrap](https://github.com/aionnetwork/staking_pool_scripts)

### Pool Registry Presentation

The user interface shall produce a list of all active and retired pools in the stake PoolRegistry. For each pool set of specific information should be presented (e.g. fee, capacity remaining, rewards estimates, etc.). The user should be able to delegate to **multiple pools** and view all their outstanding delegations and rewards earned from each delegation (at the block-level resolution).

#### Metadata-Proxy Server

The user interface should retrieve the list of staking pools and associated metadata from the metadata-proxy server (defined in §2.10 of [Engineering Design and Incentive Specification for Aion-Unity](https://github.com/aionnetwork/unity-engineering-spec)). If the metadata is malformed (i.e. any of the metadata rules defined in §2.10 are violated), the metadata will be unavailable on the proxy servers; UI should be designed to handle such scenarios.

UI should be configurable to query several metadata-proxy servers to promote diversity in metadata-proxy server providers.

To help users make rational decisions concerning their stake delegations, the PoolRegistry listing should be default-sorted using some weighted function of:

– the fees charged by the pool  
– the apparent performance of the pool (see §2.15.2 of [Engineering Design and Incentive Specification for Aion-Unity](https://github.com/aionnetwork/unity-engineering-spec)), and – the remaining contribution capacity.

> The goal of this proposed “attractiveness score” is to promote reliable pools, have not yet reached saturation, and have a low cost. Further research is required to specify this function precisely.

### Calculating Apparent Performance of Pools

The wallets should report some notion of up-time for a pool; this measure is critical to gauging the reliability of a pool, and directly impacts the rewards a delegator can expect to receive by delegating to this pool (delegators should rationally choose pools with the highest possible historical up-times, since even if a pool offers low fees, a spotty up-time track-record will manifest itself in diminished rewards).

> For more information on how to calculate the performance please refer to section [Calculating Apparent Performance of Pools Advanced](#pool-performance)

### Pool Life-cycle Notifications

The UI is responsible to produce notifications for all key life-cycle events for the pools a user has delegated staking rights to, to enable a user to make appropriate delegation decisions.

Management Actions: The UI must notify a user when a pool goes into the broken stake, changes its metadata or its fees (§2.7 of [Engineering Design and Incentive Specification for Aion-Unity](https://github.com/aionnetwork/unity-engineering-spec)). Any broken pools must be identified. The user should be able to transfer any delegations from a broken pool to an active pool at any time.

Inactive and Underperforming Pools The should monitor the attractiveness score (§2.15.1 of [Engineering Design and Incentive Specification for Aion-Unity](https://github.com/aionnetwork/unity-engineering-spec)) of all the pools the user has delegated stake too, to notify the user of any significant drops in this metric. Particularly, any significant drops in this metric imply one or more of the following things:

– A large amount of stake has left the pool.  
– The pool’s average up-time has dropped significantly (operator has stopped producing blocks). – The pool operator has hiked up the fee significantly.  
– The rewards earned by the user have diminished significantly.  

This way, if the pool ceases to operate without being properly retired, it’s delegators will be incentivized to re-delegate.

Aion Web3js - getpastlogs function documentation used in this example https://github.com/aionnetwork/aion_web3/wiki/API:-web3-eth#getpastlogs

Usage example using aion-web3

```java
/**
Allows pulling the list of the registered pools.
Implementers are gonna have to parse contract events to get the list of all pools and their states.
*/

const Web3 = require("aion-web3");

// Set up node
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));

//Create contract instance
const abi = "POOL_REGISTRY_ABI";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";

const abiObj = web3.avm.contract.Interface(abi);
web3.avm.contract.initBinding(contract, abiObj, null, web3);


//Get past logs
async function logs(){

    //past log obj
    let pastLogObject = {
        "fromBlock": BLOCK_DEPLOYED,
        "topics" : [ //Order matters.
            "0x414950303431546f6b656e437265617465640000000000000000000000000000", // e.g. 32-bytes representation of "ADSDelegated".getBytes() as a filter
            "0x0000000000000000000000000000000000000000000000000de0b6b3a7640000",
            null /*optional */,     ]
    }
    try {
        avmResponse = await web3.avm.contract.getPastLogs(pastLogObject);
        if(avmResponse.length){ //Log can be found -> event is triggered.
            console.log("Logs: ", avmResponse);
            //..filtering actions here
        } else {
            console.log("Log cannot be found.");
        }
    } catch (error) {
      console.log("Past event error: ", error);
      return false;
    }
 }
 logs();

```

## Getters

### Get Pool Information

Function that returns pool information: coinbaseAddress, commissionRate, poolState, metaDataHash, metaDataUrl

```java
/**
 * Returns pool information.
 *
 * @param pool      the pool address
 * @return coinbaseAddress, commissionRate, isSelfStakeSatisfied(pool), metaDataHash, metaDataUrl
 */
public static byte[] getPoolInfo(Address pool)
```

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, null, web3);

async function methodCall() {
    // Set value to be delegated
    web3.avm.contract.setValue(amountToDelegate);

    // Make a call transation to the PoolRegistry
    let avmResponse = await web3.avm.contract.call.getPoolInfo(poolAddress);

    // Print the response to the console.
    console.log(avmResponse);
}
```

### Get Rewards

A function that returns the outstanding rewards of a delegator

```java
/**
 * Returns the outstanding rewards of a delegator.
 *
 * @param pool      the pool address
 * @param delegator the delegator address
 * @return the amount of outstanding rewards
 */
public static BigInteger getRewards(Address pool, Address delegator)
```

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, null, web3);

async function methodCall() {
    // Set value to be delegated
    web3.avm.contract.setValue(amountToDelegate);

    // Make a call transation to the PoolRegistry
    let avmResponse = await web3.avm.contract.call.getRewards(poolAddress, delegatorAddress);

    // Print the response to the console.
    console.log(avmResponse);
}
```

### Get Stake

A function that returns the stake of a delegator in a pool

```java
/**
 * Returns the stake of a delegator to a pool.
 *
 * @param pool      the pool address
 * @param delegator the delegator address
 * @return the amount of stake
 */
public static BigInteger getStake(Address pool, Address delegator)
```

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, null, web3);

async function methodCall() {
    // Set value to be delegated
    web3.avm.contract.setValue(amountToDelegate);

    // Make a call transation to the PoolRegistry
    let avmResponse = await web3.avm.contract.call.getStake(poolAddress, delegatorAddress);

    // Print the response to the console.
    console.log(avmResponse);
}
```

### Get Total Stake

Returns array that has two elements:
 1. the total stake of the pool
 2. the stake that was transferred but has not been finalized yet.

```java
/**
* Returns the total stake of a pool.
*
* @param pool the pool address
* @return the amount of stake. returned array has two elements:
* first element represents the total stake of the pool, and the second element represents the stake that was transferred but has not been finalized yet.
*/
public static BigInteger[] getTotalStake(Address pool)
```

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, null, web3);

async function methodCall() {
    // Set value to be delegated
    web3.avm.contract.setValue(amountToDelegate);

    // Make a call to the PoolRegistry
    let avmResponse = await web3.avm.contract.call.getTotalStake(poolAddress);

    // Print the response to the console.
    console.log(avmResponse);
}
```

## Asynchronous Tasks

> NOTE: This section is critical to how interactions with PoolRegistry work. Please read carefully, for any clarification refer to [Engineering Design and Incentive Specification for Aion Unity](https://github.com/aionnetwork/unity-engineering-spec)

There are several instances of “asynchronous” tasks in the Aion-Unity staking and stake delegation systems:

- Undelegation of Stake: This is a managed-wrapper around the unbond functionality ex- posed in the Staker Registry.
    - Incentive: A fixed fee incentive mechanism should be implemented (as defined for the unbond function in Staker Registry).
- Transfer Delegated Stake: This is a managed-wrapper around the transfer functionality exposed in the Staker Registry.
    - Incentive: A fixed fee incentive mechanism should be implemented (as defined for the unbond function in Staker Registry §3.4).
- Auto Rewards Delegation: Rewards earned by delegators in the system can be automati- cally cast to stake on behalf of the delegator.
    - Incentive: The delegator must specify a fee as a percentage of the coin transfer amount (with four (4) decimal precision) that callers of the finalization function could collect. Bounty-seekers could then scrape accounts registered for this finalization function; they would wait for enough coins to be accumulated such that the fee collected upon the function call exceeds the caller’s transaction cost by some profit threshold.
- Update Commission Rate: Update of the commission rate (by an operator) is subject to a lock-out period to give delegators time to react to fee changes, before rate-change is imposed.
    - Incentive: This is the only asynchronous transaction in the Pool Registry that exclusively affects the pool operators. It is assumed that pool operators have sufficient motivation to promptly come back online after the lockout period has elapsed in order to make the finalization transaction to make the new commission rate effective. There- fore, no incentive mechanisms shall be built-in for this call.


These features are asynchronous in the sense that they cannot be implemented within one transaction initiated by the user; they require some action by the protocol itself (not initiated by a user), after some condition on contract or chain state has been met.

In the case of unbonding, transfer stake, and update comission rate they are examples of time-locks, which require an action from the system, delayed into the future from some trigger-action. On the other hand, auto rewards delegation (in it’s most trivial incarnation) is a case of the protocol taking an action on behalf of the user upon an event (disbursement of rewards).

Therefore, we had to flatten the aforementioned features into two disparate transactions: an initiating transaction and a finalizing transaction. The initiating transaction is sent by a user looking to affect their state (unbond, transfer or enable auto rewards delegation, update comission rate). For unbond, transfer or enable auto rewards delegation the finalizing transaction can be performed by anyone in the system (including the user himself) to unwind the initiated action. For update comission rate it has to be performed by pool operator.

We considered incentives that people would have to make finalization calls on other users’ behalf.

The following mechanisms were considered:

1. The finalization function could be called by the initiator of the asynchronous transaction.

2. If the asynchronous transaction involves the movement of coins (e.g. auto rewards delegation), one could attach a fee that callers of the finalization function could collect. The idea is that bounty-seekers could scrape accounts registered for this finalization function; they would wait for enough coins to be accumulated such that the fee collected upon a function call exceeds the caller’s transaction cost by some profit threshold.

3. The staking pool could be expected to perform the transaction on behalf of its delegates (this service could be included in the fees charged by the pool). In this case, we propose the following extension to the scheme: the ability to batch multiple finalization calls into a single transaction, to minimize the total transaction numbers on the network.

4. The transaction initiator could provide a nominal amount of coins as a bounty when sending the initial transaction in the asynchronous transfer, which could be collected by the caller of the finalization transaction

In the case of auto rewards delegation, strategy 2 is recommended. In the case of the time-lock interactions (transfer stake, transfer delegation, unbond, undelegate), strategy 3 is recommended, with the possibility of a sufficiently motivated user calling the finalization transaction (as a last resort), since no restrictions are placed on the caller of finalization transactions.

## Delegate

To delegate stake, a user must send their coins to the PoolRegistry in a delegate transaction. When a delegate is invoked, the PoolRegistry records the delegation and adds the stake to the pool’s balance in the StakerRegistry.

When the user delegates to a pool, they invoke a function in the staking contract, with the cold address of the staking pool as a transaction parameter.

![Delegate](/resources/interface/delegate.png)

Smart contract reference - call delegate method https://github.com/aionnetwork/protocol_contracts/blob/master/pool-registry/src/main/java/org/aion/unity/PoolRegistry.java

PoolRegistry contract method:

```java
/**
 * Delegates stake to a pool.
 *
 * @param pool the pool address
 */
public static void delegate(Address pool)
```

For advanced users, there's a set of Shell scripts provided by Aion to interact with the pool registry contract - [Unity Bootstrap](https://github.com/aionnetwork/staking_pool_scripts)

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {
    // Set value to be delegated
    web3.avm.contract.setValue(amountToDelegate);

    // Make a delegation transation to the pool
    let avmResponse = await web3.avm.contract.transaction.delegate(poolAddress);

    // Print the response to the console.
    console.log(avmResponse);
}
```

## Undelegate

The un-delegation of stake is a **two-step process** (since unbonding of stake is involved). When a user calls the undelegate function in the PoolRegistry, an undelegateTo is triggered in the StakerRegistry, which returns the corresponding undelegateId, which uniquely identifies the thawing of this parcel of stake. After the thawing period has elapsed, any user can call the finalizeUndelegate function, either through the PoolRegistry or directly in the StakerRegistry with the unvoteId (undelegateId) of the delegator, to release the liquid coins back to their account.

![Undelegate](/resources/interface/undelegate.png)

### Step 1: Initiate Undelegation

When a user decides that they want to withdraw any fraction of their funds from the PoolRegistry, they can perform an undelegate action in the PoolRegistry contract. For a period measured in a number of blocks since the un-staking action, the coin will be in the thawing state; it will be held in the staking contract, but will neither contribute to stake securing the system nor will it be liquid until the unbonding period has elapsed.

Smart contract reference - call undelegate method https://github.com/aionnetwork/protocol_contracts/blob/master/pool-registry/src/main/java/org/aion/unity/PoolRegistry.java

Contract reference

```java
 /**
 * Revokes stake to a pool.
 *
 * @param pool   the pool address
 * @param amount the amount of stake to undelegate
 * @param fee the amount of stake that will be transferred to the account that invokes finalizeUndelegate
 */
public static long undelegate(Address pool, BigInteger amount, BigInteger fee)
```

For advanced users, there's a set of Shell scripts provided by Aion to interact with the pool registry contract - [Unity Bootstrap](https://github.com/aionnetwork/staking_pool_scripts)

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {

    // Make a transation to the pool
    let avmResponse = await web3.avm.contract.transaction.undelegate(poolAddress, amountToUndelegate, fee);

    // Print the response to the console.
    console.log(avmResponse);
}
```

### Step 2: Finalize Undelegation

Any user can call the finalizeUndelegate function, either through the PoolRegistry or directly in the StakerRegistry with the undelegateId of the delegator, to release the liquid coins back to their account. If thawing period hasn't elapsed the transaction will be failing.

Contract reference

```java
/**
 * Finalizes an undelegate operation.
 *
 * @param id pending undelegation id
 */
public static void finalizeUndelegate(long id)
```

For advanced users, there's a set of Shell scripts provided by Aion to interact with the pool registry contract - [Unity Bootstrap](https://github.com/aionnetwork/staking_pool_scripts)

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {

    // Make a transation to the pool
    let avmResponse = await web3.avm.contract.transaction.finalizeUndelegate(poolAddress, pendingUndelegationId);

    // Print the response to the console.
    console.log(avmResponse);
}
```

## Re-delegate

Delegates block rewards to a pool

Smart Contract reference https://github.com/aionnetwork/protocol_contracts/blob/master/pool-registry/src/main/java/org/aion/unity/PoolRegistry.java

Contract reference

```java
/**
* Delegates block rewards to a pool
*
* @param pool the pool address
*/
public static void redelegateRewards(Address pool)
```

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {
    // Set value to be redelegated
    web3.avm.contract.setValue(amountToRedelegate);

    // Make a transation to the pool
    let avmResponse = await web3.avm.contract.transaction.redelegateRewards(poolAddress, fee);

    // Print the response to the console.
    console.log(avmResponse);
}
```

## Auto-redelegation

A user can enable this feature after the fact of deligation as a separate transaction. Once enabled, this feature enables any user to call the auto-redelegate function to commit a delegator’s earned rewards as stake. At any point, the delegator can disable this feature.

### Auto rewards delegation

– Opt-in auto rewards delegation: If the user did not opt into the auto-rewards delegation scheme, they can do so at any time while their stake is delegated, by sending a transaction to the PoolRegistry contract.  
– Opt-out auto rewards delegation: If the user chooses to opt-out of the auto-rewards delegation scheme, they can do so at any time while their stake is delegated, by sending a transaction to the PoolRegistry contract.

![Auto Redelegation](/resources/interface/auto-redelegate.png)

### Enable auto-redelegation as a separate transaction

Contract reference

```java
/**
* Enables auto-redelegation on a pool.
*
* @param pool the pool address
* @param feePercentage the auto-redelegation fee
*/
public static void enableAutoRewardsDelegation(Address pool, int feePercentage)
```

For advanced users, there's a set of Shell scripts provided by Aion to interact with the pool registry contract - [Unity Bootstrap](https://github.com/aionnetwork/staking_pool_scripts)

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {

    // Make a transation to the pool
    let avmResponse = await web3.avm.contract.transaction.enableAutoRewardsDelegation(poolAddress, feePercentage);

    // Print the response to the console.
    console.log(avmResponse);
}
```

### Disable Auto-Redelegation

Contract reference

```java
/**
* Disables auto-redelegation on a pool.
*
* @param pool the pool address
*/
public static void disableAutoRewardsDedelegation(Address pool)
```

For advanced users, there's a set of Shell scripts provided by Aion to interact with the pool registry contract - [Unity Bootstrap](https://github.com/aionnetwork/staking_pool_scripts)

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {

    // Make a transation to the pool
    let avmResponse = await web3.avm.contract.transaction.disableAutoRewardsDedelegation(poolAddress);

    // Print the response to the console.
    console.log(avmResponse);
}
```

## Transfer Delegation

A delegator must initiate a transfer of stake between stakers (pools) at PoolRegistry, which in-turn reflects the transfer in the StakerRegistry. A transferId is returned, which uniquely identifies this transfer. After the transfer lockout period has elapsed, any user can call finalize through PoolRegistry to move the stake between the source and destination stakers.

It's a two-step process: Initiate Transfer and Transfer Finalization

– Transfer-delegation: The user should be able to, without triggering the unbonding period, transfer the delegation of any proportion of their stake to another staking pool.

> NOTE: pool operator cannot transfer their stake to another pool

![Transfer](/resources/interface/stake-transfer.png)

### Step 1: Initiate Transfer

```java
 /**
     * Transfers delegation from one pool to another pool.
     *
     * @param fromPool the from pool address
     * @param toPool   the to pool address
     * @param amount   the amount of stake to transfer
     * @param fee the amount of stake that will be transferred to the account that invokes finalizeTransfer
     * @return the pending transfer id
     */
    public static long transferDelegation(Address fromPool, Address toPool, BigInteger amount, BigInteger fee)
```

For advanced users, there's a set of Shell scripts provided by Aion to interact with the pool registry contract - [Unity Bootstrap](https://github.com/aionnetwork/staking_pool_scripts)

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {

    // Make a transation to the pool
    let avmResponse = await web3.avm.contract.transaction.transferDelegation(fromPool, toPool, amountToTransfer, fee);

    // Print the response to the console.
    console.log(avmResponse);
}
```

### Step 2: Transfer Finalization

```java
/**
 * Finalizes a transfer operation.
 *
 * @param id pending transfer id
 */
public static void finalizeTransfer(long id)
```

For advanced users, there's a set of Shell scripts provided by Aion to interact with the pool registry contract - [Unity Bootstrap](https://github.com/aionnetwork/staking_pool_scripts)

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {

    // Make a transation to the pool
    let avmResponse = await web3.avm.contract.transaction.finalizeTransfer(pendingTransferId);

    // Print the response to the console.
    console.log(avmResponse);
}
```

## Withdrawal

 Rewards are continually withdrawn from a pool’s coinbase contract any time the stake apportionment in the pool changes (via a delegation, un-delegation, etc.) and managed by the PoolRegistry (see §2.14.1 for details). A withdraw is yet another trigger for the pool’s coinbase to be emptied of accumulated rewards (if any exist). Then, the F1 rewards sharing algorithm is invoked to compute the rewards owed to the delegator, which are promptly disbursed before winding down the transaction.

![Withdrawal](/resources/interface/withdrawal.png)

Contract example

```java
/**
 * Withdraws block rewards from one pool.
 *
 * @param pool the pool address
 */
public static BigInteger withdrawRewards(Address pool)
```

Usage example using aion-web3

```java
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
const privateKey = "PRIVATE_KEY";
const contractAddress = "POOL_REGISTRY_CONTRACT_ADDRESS";
const abi = "POOL_REGISTRY_ABI";


// Build web3js ABI object
abiObject = web3.avm.contract.Interface(abi);

// Bind ABI object to exsting contract on the network
web3.avm.contract.initBinding(contractAddress, abiObject, privateKey, web3);

async function methodCall() {

    // Make a transation to the pool
    let avmResponse = await web3.avm.contract.transaction.withdrawRewards(poolAddress);

    // Print the response to the console.
    console.log(avmResponse);
}
```

## Appendix

### <a name="pool-perfomance"></a> Calculating Apparent Performance of Pools Advanced

Since there is no explicit way to capture an up-time metric in the design of Aion-Unity PoS, we instead propose a simple solution to find a proxy for the availability of the pool operator that we are calling apparent performance.

A pool is considered established if it has been active for at least 1 week ( 60, 480 blocks). For any established pool with sufficient size (in terms of delegated stake), we can effectively infer some notion of up-time. The reason that an inference is the best we can do is the stake amount can fluctuate over time and the rewards are unpredictable (distributed stochastically) at every block, with no protocol-defined mechanism to measure the availability of a pool operator. The apparent performance measure can be constructed as follows:

First, we define a moving window of 60, 480 blocks ( 1 week) over which we define the following averaged metrics.

Since the stake amount can fluctuate over time, to get a stable measure for the amount of stake delegated to a pool over a period of time, we take some average (either over the complete interval or with gaps) of the active stake delegated to a pool over the last 1 week’s worth of blocks.

Then perform a similar calculation as above, except over the stake delegated to all the pools, to get an average for the total stake delegated to the system over the last week.

With these two averages in hand, we can determine the expected ratio of blocks this pool should have produced in proportion to the total blocks produced over the last week.

Finally, we need to find the ratio of the expected blocks produced over the last week to the actual blocks produced, which will give us some measure of apparent performance (a number between 0 and 1).
Several factors could skew this calculation. First of all, the notional 1 week might not be a long enough time over which to compute these averages. Furthermore, large swings in stake contributions could skew the computation of the arithmetic mean; this may potentially be fixed by sizing the window as a function of the standard deviation of the time-series function of stake contribution magnitudes.

When a new pool is created, there is no data to determine it’s apparent performance. New pools should be distinguished from the established pool (e.g. displayed in a separate section of the UI) since no reasonable measure for future performance can be inferred.

### Smart Contract Design

Design of the smart contract implementation of the staking and delegation system in Aion-Unity. The system consists of three distinct contracts (with their relationship depicted in Figure 3):

![Smart Contract Design](https://files.readme.io/39cb4a7-sc-design.png)

• **Staker Registry Contract**: This contract tracks all stake and stakers in the system and is core to the Aion-Unity protocol (i.e. this is a privileged contract, whose state is required by the protocol to resolve PoS consensus). Anyone wishing to cast their coins to the stake (including other contracts, e.g. delegation contracts), need to register here. Key indirection (as described in §2.15) is built-in here; when one signs up to be a staker, one needs to provide their coinbase, signing, identity and management addresses.

• **Pool Registry Contract**: This contract is non-core to the system (i.e. has no special privileges in the system). This is the implementation of the Aion Delegation standard (ADS) and is responsible for:

– keeping a registry of all staking pools and associated meta-data,
– receiving coins (as a delegation to a pool) and casting them to stake,
– managing the internal state of each pool (including delegation and rewards), – and splitting the rewards among the pool operator and delegators.

• **Pool Coinbase Contract**: An instance of this contract is spawned by the Pool Registry contract for each pool it instantiates. The pool’s coinbase contract receives block rewards on behalf of the pool. For a particular pool, when the operator or any of the delegators request a withdrawal (in the PoolRegistry), the coins are withdrawn from this contract by the PoolRegistry. This is an implementation artifact; the end-user should never need to understand the function of this contract.

We now outline the rationale for this design: recall that the PoolRegistry has no special privileges. The standard way block rewards are disbursed is by crediting the coinbase account cited in the block header. Since all pools and their states are managed in the PoolRegistry contract, if the block rewards for all pools were paid to the PoolRegistry contract, the contract could not figure out which pool the disbursement was intended for (since no contract code gets executed by the protocol upon block reward outlay). Therefore, the PoolRegistry must spawn and manage a unique contract (per pool) to receive block rewards in the standard way, and then retrieve these rewards from this contract when withdrawals are requested by any delegator or operator.
