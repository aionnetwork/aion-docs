---
title: Manage Commission Rate
---

The pool operator can change the commission fee charged for operating the pool due to market conditions, etc.

There is a delay between the commission change request and when it is applied. This lockout period exists so delegators have time to respond to **the** fee-change (e.g. maintain their delegation with the current pool or transfer their delegation to another pool). The lockout time is set to be 60480 blocks, which at ~10 second block time(normal network conditions) is approximately 7 days.

Due to security constraints of the AVM computation metering system, two disparate transactions: an initiating transaction(request commission rate change) and a finalizing transaction(finalize commission rate change) have to be implemented.

## Request Commission Rate Change

The pool operator needs to send a request for changing the commission rate to the Pool Registry.

### Use requestCommissionRateChange.sh

If you are familiar with using the terminal, you can simply use the `requestCommissionRateChange.sh` script to transfer your stake from a pool to another.

#### Download the Script

Open a terminal and navigate into a desired directory where you want to save the scripts, then run the following commands to get the scripts:

```bash
wget https://github.com/aionnetwork/staking_pool_scripts/archive/Amity-Oct29.tar.gz
 tar xvf Amity-Oct29.tar.gz
cd staking_pool_scripts-Amity-Oct29/

```

#### Run the Script

We will use `requestCommissionRateChange.sh` to send a commission rate change request.

##### Usage

```text
./requestCommissionRateChange.sh node_address(ip:port) pool_private_key new_commission_rate
```

##### Inputs

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545*
- `pool_private_key`: private key of the pool operator's management key. Input either the full 64-bytes private key or the first 32-bytes of the private key with `0x`.
- `new_commission_rate`: new commission rate with 4 decimal places of granularity. For example, if the fee to be charged is 2%, input 20000. This number should be between 0 to 1000000. Also, the value can at most have 4 decimal places, i.e: 2.1234% is valid but not 2.12345%.

##### Example

The following example is to send a `requestCommissionRateChange` request to a local unity node. The private key of the pool operator's management key is *0x************************************** (input full 64-bytes works as well), and the new commission fee is 2.5%.

```bash
./requestCommissionRateChange localhost:8545 0x************************************************ 25000
```

###### Output

The script sends a transaction to the *Pool Registry* to update the commission rate. If all the inputs are formatted correctly, a transaction hash will be provided, you can then go to [OAN Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined. You will get a `request id` to finalize later and you will see  "Requesting commission rate change completed".
[block:callout]
{
  "type": "warning",
  "title": "Sufficient Balance",
  "body": "Make sure your account has sufficient balance for paying the gas fee of contract transaction."
}
[/block]
The finalization action has to be taken for a  commission change request and it has to be performed after the lockup period, 60480 blocks, which at ~10 second block time(normal network conditions) is approximately 7 days:
[block:callout]
{
  "type": "warning",
  "title": "Finalise the Request",
  "body": "The pool operator is responsible for finalizing this request."
}
[/block]

### Use finalizeCommissionRateChange.sh

If you are familiar with using the terminal, you can simply use the `finalizeCommissionRateChange.sh` script finalize a commission rate change request.

#### Download the finalizeCommissionRateChange.sh Script

Open a terminal and navigate into a desired directory where you want to save the scripts, then run the following commands to get the scripts:

```bash
wget https://github.com/aionnetwork/staking_pool_scripts/archive/Amity-Oct29.tar.gz
 tar xvf Amity-Oct29.tar.gz
cd staking_pool_scripts-Amity-Oct29/

```

#### Run the finalizeCommissionRateChange.sh Script

We will use `finalizeCommissionRateChange.sh` to finalize a commission rate change request.

##### Use the finalizeCommissionRateChange.sh Script

```text
 ./finalizeCommissionRateChange.sh node_address(ip:port) pool_private_key request_Id
```

##### Inputs for the finalizeCommissionRateChange.sh Script

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545*
- `pool_private_key`: private key of the pool operator's management key. Input either the full 64-bytes private key or the first 32-bytes of the private key with `0x`.
- `request_Id`: the id for the request.

##### Example for finalizeCommissionRateChange Script

The following example is to send a `finalizeCommissionRateChange` request to a local unity node. The private key of the caller is *0x*********************************************** (input full 64-bytes works as well), and the id of the transfer to be finalized is *1*.

```bash
./finalizeCommissionRateChange.sh localhost:8545 0x**************************************** 1
```

###### Output for finalizeCommissionRateChange Script

The script sends a transaction to the *Pool Registry* to finalize a commission change request. If all the inputs are formated correctly, a transaction hash will be provided, you can then go to [OAN Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined. *Transaction completed* indicated the transaction is successful.

> Note: Make sure the request you are trying to finalize has passed the lockout period. Your account needs sufficient balance for paying for the gas fee of contract transaction.
