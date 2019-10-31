---
title: Manage Self-Bond
---

An ADS staking pool is eligible to receive delegated stake and produce PoS blocks only if the pool is in _active_ state. The pool is set to the _broken_ state if any of the following invariant is violated:

- If the pool's self-bond requirement in the _Pool Registry_ is violated, which is no less than `1000 AION`.
- If the pool's self-bond percentage in the _Pool Registry_ is violated, which is no less than `1%` of total delegated stake to the pool.

Self-bonded stake can be managed by pool operator's management account. Pool operators can earn staking rewards for their self-bonded stake just like any other delegators in the pool. Therefore, the pool operator's self-bonded stake **must** be delegated through the _Pool Registry Contract_ for maximum benefits.

## Increase Self-bonded Stake

The pool operator can send a stake to their own pool to satisfy the self-bond requirements to keep the pool _active_. Or the pool operator can withdraw the bonded stake to tear down the pool.

The pool's self-bond percentage is 1%, which means the pool operator has to delegate (self-bond) no less than 1% stake of the total delegated stake to the pool. For example, if a pool operator has bonded 10,000 AION to the pool, then the pool can receive up to 1,000,000 AION delegated stake.

### Use the delegate.sh

If you are familiar with using the terminal, you can simply use the `delegate.sh` script to delegate to your pool(self-bond).

#### Download the Script

Open a terminal and navigate to the desired directory where you want to save the scripts, then run the following commands to get the `UnityBootstrap` scripts:

```bash
wget https://github.com/jeff-aion/UnityBootstrap/archive/Amity-Oct18.tar.gz
tar xvzf Amity-Oct18.tar.gz
cd UnityBootstrap-Amity-Oct18/
```

#### Run delegate.sh

We will use `delegate.sh` to delegate a stake to a pool.

##### Usage

```text
./delegate.sh node_address(ip:port) delegator_private_key pool_identity_address amount
```

##### Inputs

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545* <br>
- `delegator_private_key`: private key of the delegator's account. For pool operator to self-bond, this should be the private key of the pool's management key. Input either the full 64-bytes private key or the first 32-bytes of the private key with `0x`. <br>
- `pool_identity_address`: Identity address of the pool that is delegating to. For pool operator this is also the public key of the management key. Input with `0x`. <br>
- `amount`: Amount of Aion to be delegated in nAmp, where 1 Aion = 1 *10^18 nAmp. For example, if desired delegation amount is *2000* Aion, input *2,000,000,000,000,000,000,000* for `amount`.

##### Example

The following example is to send a `delegation` request to a local unity node. The private key of the pool operator's management key(delegator) is `0x************************************************************` (input full 64-bytes works as well), and the pool delegated to is `0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a98`. The amount that is delegated is _333 AION.  

```bash
./delegate.sh localhost:8545 0x************************************************************ 0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9 200000000000000000000
```

The script sends a transaction to the *Pool Registry* to delegate to the pool. If all the inputs are formatted correctly, a transaction hash will be provided, you can then go to [Aion Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined and you will see the updated stake amount in the pool. *Delegation completed* indicated the transaction is successful.

![Delegate](https://files.readme.io/34b9592-delegate.png)

Make sure your management account has sufficient balance for both delegation (amount of stake to be delegated) and paying for the gas fee of contract transaction.

## Reduce Self-bonded Stake

A pool operator can withdraw the self-bonded stake (undelegate) by violating the self-bond requirement to tear down the pool.

For a period, measured in the number of blocks since the un-delegation action, the coin will be in the thawing lockout state, where it will be held in the staking contract and will neither contribute to stake securing the system nor will it be liquid until the unbonding period has elapsed. The lockout time is set to be 8640 blocks, which is approximately 1 day under normal network conditions.

### Use undelegate.sh

You can simply use the `undelegate.sh` script to undelegate your stake from your pool(reduce self-bonded stake).

#### Download the Script

Open a terminal and navigate into a desired directory where you want to save the scripts, then run the following commands to get the `UnityBootstrap` scripts:

```bash
wget https://github.com/jeff-aion/UnityBootstrap/archive/Amity-Oct18.tar.gz
tar xvzf Amity-Oct18.tar.gz
cd UnityBootstrap-Amity-Oct18/

```

#### Run undelegate.sh

We will use `undelegate.sh` to undelegate stake to a pool.

##### Usage

```text
./undelegate.sh node_address(ip:port) delegator_private_key pool_identity_address amount fee
```

##### Inputs

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545* <br>
- `delegator_private_key`: private key of the delegator's account. For pool operator to withdraw self-bonded stake, this should be the private key of the pool's management key. Input either the full 64-bytes private key or the first 32-bytes of the private key with `0x`. <br>
- `pool_identity_address`: Identity address of the pool that is delegating to. For the pool operator, this is also the public key of the management key. Input with `0x`. <br>
- `amount`: Amount of Aion to be delegated in nAmp, where 1 Aion = 1 *10^18 nAmp. For example, if desired delegation amount is *2000* Aion, input *2,000,000,000,000,000,000,000* for `amount`.
- `fee`: The amount of the stake will be transferred to the account that invokes the `finalizeUndelegate` action as a bounty(to cover the gas fee). The fee should be less than the amount to be undelegated.
[block:callout]
{
  "type": "info",
  "title": "Finalise Undelegation",
  "body": "As for now, the pool operator can put *0* for the fee since Aion foundation will be finalising the un-delegation for the users."
}
[/block]

##### Example

The following example is to send a `undelegation` request to a local unity node. The private key of the pool operator's management key(delegator) is *0x9dd45a8661524d3e7272dd49c74b10c80cdf633e59c047e7a8f6d8c6e0962c9f* (input full 64-bytes works as well), and the pool delegated to is *0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9*. The amount that is undelegated is *20 Aion* and *0 Aion* is paid for finalizing the undelegation.  

```bash
./undelegate.sh localhost:8545 0x9dd45a8661524d3e7272dd49c74b10c80cdf633e59c047e7a8f6d8c6e0962c9f 0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9 2000000000000000000000 0
```

The script sends a transaction to the *Pool Registry* to undelegate to the pool. If all the inputs are formated correctly, a transaction hash will be provided, you can then go to [Aion Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined and you will see the updated stake amount in the pool. You will get an *pending undelegate id* if the transaction is successful and *Delegation completed* will be printed as well.

## Finalise an Undelegation

Any anonymous user of the system can finalise an undelegation and get the bounty fee that the delegator set up requesting an undelegation.

One will only be able to finalise an undelegation that has passed the thawing lockout period.

### Run finalizeUndelegate.sh

If you are familiar with using the terminal, you can simply use the `finalizeUndelegate.sh` script to finalise an un-delegation.

#### Download the Script

Open a terminal and navigate into a desired directory where you want to save the scripts, then run the following commands to get the `UnityBootstrap` scripts:

```bash
wget https://github.com/jeff-aion/UnityBootstrap/archive/Amity-Oct18.tar.gz
tar xvzf Amity-Oct18.tar.gz
cd UnityBootstrap-Amity-Oct18/

```

1. We will use `finalizeUndelegate.sh` to finalize an un-delegation.

**Usage**:

```text
./finalizeUndelegate.sh node_address caller_private_key undelegate_Id
```

**Inputs**:

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545* <br>
- `caller_private_key`: private key of the caller's account.Input either the full 64-bytes private key or the first 32-bytes of the private key with `0x`. <br>
- `undelegate_id`: the id for the pending undelegation.

**Example**:

The following example is to send a `finalizeUndelegate` request to a local unity node. The private key of the caller is *0x9dd45a8661524d3e7272dd49c74b10c80cdf633e59c047e7a8f6d8c6e0962c9f* (input full 64-bytes works as well), and the id of the undelegation to be finalised is *2*.

```bash
./finalizeUndelegate.sh localhost:8545 0x9dd45a8661524d3e7272dd49c74b10c80cdf633e59c047e7a8f6d8c6e0962c9f 2
```

The script sends a transaction to the *Pool Registry* to finalise an un-delegation. If all the inputs are formatted correctly, a transaction hash will be provided, you can then go to [Aion Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined. *Transaction completed* indicated the transaction is successful.

Make sure you have sufficient balance to pay for the gas fee (NRG) for contract transactions.
