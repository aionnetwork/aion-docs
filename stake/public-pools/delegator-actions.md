---
title: Delegator Actions
---

Pool operator is also a delegator in the network, therefore, they can also transfer delegated stake among the pools and withdraw the rewards.

## Transfer Delegation

Due to security constraints of the AVM computation metering system, two disparate transactions: an initiating transaction(transfer delegation) and a finalizing transaction(finalise transfer) have to be implemented.

A delegator can transfer the delegated stake from a pool to another.

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
long transferDelegation(Address fromPool, Address toPool, BigInteger amount, BigInteger fee)
```

When this action occurs, the stake will be locked for a transfer-pending period to not violate security invariant of the Unity consensus. The lockout time is set to be 60 blocks, which is approximately 6 minutes under normal network conditions.

And anyone in the network can invoke _finalizeTransfer_ to get the bounty that delegator set.

```java
/**
 * Finalizes a transfer operation.
 *
 * @param id pending transfer id
 */
void finalizeTransfer(long id)
```

### Use transferDelegation.sh

If you are familiar with using the terminal, you can simply use the `transferDelegation.sh` script to transfer your stake from a pool to another.

#### Download the Script

Open a terminal and navigate into a desired directory where you want to save the scripts, then run the following commands to get the `UnityBootstrap` scripts:

```bash
wget https://github.com/jeff-aion/UnityBootstrap/archive/Amity-Oct18.tar.gz
tar xvzf Amity-Oct18.tar.gz
cd UnityBootstrap-Amity-Oct18/

```

#### Run transferDelegation.sh

We will use `transferDelegation.sh` to transfer the stake.

##### Usage

```text
./transferDelegation.sh node_address(ip:port) delegator_private_key from_pool_identity_address to_pool_identity_address amount fee
```

##### Inputs

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545*
- `delegator_private_key`: private key of the delegator's account. Input either the full 64-bytes private key or the first 32-bytes of the private key with `0x`.
- `from_pool_identity_address`: Identity address of the pool that is transferring the stake from. Input with `0x`.
- `to_pool_identity_address`: Identity address of the pool that is transferring the stake to. Input with `0x`.
- `amount`: Amount of Aion to be delegated in nAmp, where 1 Aion = 1 *10^18 nAmp. For example, if desired delegation amount is *2000* Aion, input *2,000,000,000,000,000,000,000* for `amount`.
- `fee`: The amount of the stake will be transferred to the account that invokes the `finalizeTransfer` action as a bounty(to cover the gas fee). The fee should be less than the amount to be transferred.

##### Example

The following example is to send a `transferDelegation` request to a local unity node. The private key of the pool operator's management key(delegator) is *0x************************************** (input full 64-bytes works as well), and we are transferring 200 Aion from *0xa051aa0dabe2ef29acd7138e069759743ee65b98c8f65cc6d0b005de988c46e0* to *0xa0d1534d71baed7762b4ee6f684cf31046cc50d1618eb637c94b749c64011a0b*. *0* fees will be paid for the account that finalizes the transfer.

```bash
./transferDelegation.sh localhost:8545 0x************************************************ 0xa051aa0dabe2ef29acd7138e069759743ee65b98c8f65cc6d0b005de988c46e0 0xa0d1534d71baed7762b4ee6f684cf31046cc50d1618eb637c94b749c64011a0b 200000000000000000000 0

```

The script sends a transaction to the *Pool Registry* to transfer the stake from a pool to another. If all the inputs are formatted correctly, a transaction hash will be provided, you can then go to [Aion Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined and you will see your updated stake amount in the pool you are transferring from.

Make sure your account has sufficient balance for paying the gas fee of contract transaction.

The finalisation action has to be taken for a transfer and it has to be performed after transfer pending period(60 blocks):

### Use finalizeTransfer.sh

If you are familiar with using the terminal, you can simply use the `finalizeTransfer.sh` script finalise a transfer.

#### Download the Script

Open a terminal and navigate into a desired directory where you want to save the scripts, then run the following commands to get the `UnityBootstrap` scripts:

```bash
wget https://github.com/jeff-aion/UnityBootstrap/archive/Amity-Oct18.tar.gz
tar xvzf Amity-Oct18.tar.gz
cd UnityBootstrap-Amity-Oct18/

```

#### Run finalizeTransfer.sh

We will use `finalizeTransfer.sh` to finalise a transfer.

##### Usage

```text
./finalizeTransfer.sh node_address caller_private_key transfer_Id
```

##### Inputs

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545*
- `caller_private_key`: private key of the caller's account.Input either the full 64-bytes private key or the first 32-bytes of the private key with `0x`.
- `undelegate_id`: the id for the pending transfer.

##### Example

The following example is to send a `finalizeTransfer` request to a local unity node. The private key of the caller is *0x9dd45a8661524d3e7272dd49c74b10c80cdf633e59c047e7a8f6d8c6e0962c9f* (input full 64-bytes works as well), and the id of the transfer to be finalized is *1*.

```bash
./finalizeUndelegate.sh localhost:8545 0x9dd45a8661524d3e7272dd49c74b10c80cdf633e59c047e7a8f6d8c6e0962c9f 1
```

The script sends a transaction to the *Pool Registry* to finalize a transfer. If all the inputs are formated correctly, a transaction hash will be provided, you can then go to [Aion Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined. A pending transfer id will be returned as well. *Transaction completed* indicated the transaction is successful.

> Note: Make sure the transfer you are trying to finalize has passed the lockout period. Your account needs sufficient balance for paying for the gas fee of contract transaction.

## Withdraw Rewards

The delegator can withdraw accumulated rewards to their address. As soon as the withdraw transfer is committed on-chain, the delegator should be able to see the liquid balance in their account.

```java
/**
* Withdraws block rewards from one pool.
*
* @param pool the pool address
*/
BigInteger withdraw(Address pool)
```

### Use withdrawRewards.sh

If you are familiar with using the terminal, you can simply use the `withdrawRewards.sh` script to transfer your stake from a pool to another.

#### Download the Script

Open a terminal and navigate into a desired directory where you want to save the scripts, then run the following commands to get the `UnityBootstrap` scripts:

```bash
wget https://github.com/jeff-aion/UnityBootstrap/archive/Amity-Oct18.tar.gz
tar xvzf Amity-Oct18.tar.gz
cd UnityBootstrap-Amity-Oct18/

```

#### Run withdrawRewards.sh

We will use `withdrawRewards.sh` to withdraw a reward.

##### Usage

```text
    ./withdrawRewards.sh node_address delegator_private_key pool_identity_address
```

##### Inputs

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545*
- `delegator_private_key`: private key of the delegator's account. Input either the full 64-bytes private key or the first 32-bytes of the private key with `0x`.
- `pool_identity_address`: identity address of the pool.

##### Example

The following example is to send a `withdraw` request to a local unity node. The private key of the delegator is *0x9dd45a8661524d3e7272dd49c74b10c80cdf633e59c047e7a8f6d8c6e0962c9f* (input full 64-bytes works as well), and we are withdrawing the rewards from *0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9*.

```bash
./withdrawRewards.sh localhost:8545 0x9dd45a8661524d3e7272dd49c74b10c80cdf633e59c047e7a8f6d8c6e0962c9f 0xa048630fff033d214b36879e62231cc77d81f45d348f6590d268b9b8cabb88a9
```

The script sends a transaction to the *Pool Registry* to finalize a transfer. If all the inputs are formated correctly, a transaction hash will be provided, you can then go to [Aion Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined. *Withdraw completed* indicated the transaction is successful.

Make sure you have sufficient balance for paying for the gas fee of contract transaction.
