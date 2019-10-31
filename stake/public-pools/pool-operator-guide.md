---
title: Pool Operator Guide
---

## Introduction

In Unity PoS networks, *delegation* allows coin holders to transfer their rights to participate in the proof of stake protocol to *staking pools*. The rationale for stake-delegation is that we should not expect stakers with a small amount of stake to have expertise or time to run a full node to write blocks on rare occasions.

Delegation allows all coin holders of Aion to contribute to PoS security, regardless of the number of coins they own, or their technical capabilities. **Pool operators** can register a pool in the `Pool Registry` contract to be a public pool.  All foundation-supported delegation and staking user-interfaces will only support pools that are registered in this *Pool Registry*.

A very simple CLI will be shipped as part of the Open Application Network(OAN)-Unity upgrade for pool operators to easily register as a public pool and perform management actions.

This document aims to specify all requirements and information for running a public pool on the OAN with Unity consensus.

> Note: This guide is based on [Engineering Design and Incentive Specification for Aion Unity](https://github.com/aionnetwork/unity-engineering-spec) and [*Aion Unity Smart Contracts*](https://github.com/aionnetwork/protocol_contracts).

## Operation Requirements

Since the pool operator is the entity that gets delegated staking rights from users of the system, the pool operator’s primary obligation for being a block producer is to run an OAN-Unity full node that is well connected to the blockchain network. To meet this requirement, the operator must run computer hardware with comparable or better specifications than the following:

- Intel i7 (Skylake, 6th generation) processor with 2 cores, 8 threads.
- 8 GB of DDR4 RAM.
- 100GB SATA SSD.
- 50Mbps dedicated internet connection.

The operator is required to keep at least **99.9% **(“three nines”) availability, which corresponds to at-most 8.77 hours of downtime per year. Pool operators are encouraged to host a web page, advertising self-reported up-times, and hardware specification, among other pertinent information about pool operations, to instill confidence in and advertise the operator’s operational capabilities.

## Pool Operator Key Management

The pool operator is required to manage the following two keys, which correspond to a distinct function in the operation of the pool:

### Management Key (Cold Key)

- The **pool operator** uses this key to register the pool in the _Pool Registry_. This public key is the identity address of the pool and any entity will use this public key to address the pool for on-chain transactions (e.g. delegators will use this key to identify the pool they want to delegate to).
- This key should be kept in cold storage (HSM) at all times, and only be retrieved when the management tasks (described above) need to be performed. This key is **irreplaceable** and if the key is compromised, so is the pool, therefore the pool operator MUST shut down the pool (e.g. The attacker can take over pool operations and shut down the pool,etc.).
- The **pool operator** uses this key to perform all pool management tasks, including:
  - Register as an ADS public pool.
  - Update pool's commission rate.
  - Update self-bonded stake.
  - Update block-signing address.
  - Update pool's meta-data URL and/or content hash.
  - Tear down the pool.

### Block-signing key(hot key)

- This key entitles the rights to the pool operator to produce PoS blocks on behalf of the stake delegated to the pool.
- This key is required to be kept online and connected to the OAN-Unity Network so that the pool operator signs the block if it won the PoS lottery.
- This private key is suggested to be loaded in the memory of an appropriately permissioned process, or in a commercial HSM that supports ED25519 signatures.
- The pool operator is responsible for providing this key upon pool registration in _Pool Registry_. While *submitseed*(the RPC call), the pool operator is responsible to input the same block signing address as the one they have set in the Staker Registry. Otherwise, the block will be considered as invalid.
- A pool operator should revoke this key and replace it with a new one in the _Staker Registry_ using the _management key_ if the key is compromised (the attacker can censor transactions within the blocks supported by the delegated stake).

> Note: Do not use an exchange address for any of the keys while registering for a pool since the pool operator needs to control the private keys for these accounts to perform pool actions.

## Pool's Meta-data Protocol

When a pool operator registers a new ADS public staking pool and adds it to the on-chain _Pool Registry_ of all active staking pools, they are required to provide metadata about the pool (e.g. logo, web-page, human-readable name, etc.). The metadata describing public staking pools will be consumed by OAN-Unity delegation interfaces, making it easier for both pool operators and delegators:

- The pool operators have a transparent and easy process to maintain rich contextual descriptors about their staking pools, which automatically get pulled into, and updated across all user interfaces implementing the ADS. Without such standardization, staking pools would have to manage relationships with all relevant ADS front-end providers to get listed and service contextual-information requirements (e.g. logo, pool descriptions, etc.)
- The delegators can rely on a rich set of descriptors provided by the pool operators, which are widely available across all user interfaces implementing the ADS, and thus providing meaningful data points to inform their delegation decisions.

When a staking pool registers to the _ADS Pool Registry_, the pool operator must provide a _metadata URL_ and the _metadata content-hash_.

### Meta-data JSON File and URL

The pool operator must host a JSON file, and the JSON file only at the metadata URL (HTTPS over TLS), with the following schema:

- `Schema version`: A version number, to identify the schema. This is here to enable upgradability.
- `Logo`: A thumbnail containing the logo of the pool. The image must be base64 encoded PNG, with the dimensions of 256 pixels-square.
- `Description`: A “tell me about yourself”-style, short description for users to consume when making stake delegation decisions. This field shall not exceed 256 characters.
- `Name`: A human-readable name for the pool. This field shall not exceed 64 characters.
- `Tags`: These serve as keywords for any search functionality to be exposed by any ADS user interface. This is a JSON array. The size of this array shall not exceed 10 elements, with each element not exceeding 35 (valid) characters.
- `Pool URL`: This is a URL, pointing interested delegators to the homepage of the pool, for additional information to peruse, to help make their delegation management decisions.

> Note: The JSON must be valid according to the RFC 7159 JSON specification [Bra14]. The document must be less than 1024*1024 bytes (1 MB). All characters must be UTF8 encoded. The document hosting service must guarantee three nines availability (99.9% uptime).

### Meta-data Content hash

The Blake2b hash of the meta-data content JSON object.

When a pool operator updates the metadata hosted at the meta-data URL, they must also update the meta-data content hash on-chain.

## Pool Operator Actions

Staking pool operators can perform the following actions during the life-cycle of the staking pool using _management key_.

![Pool Operator Actions](https://files.readme.io/867401e-Screenshot_from_2019-10-30_14-17-36.png)

### ADS Pool Registration and Setup

To facilitate easy discoverability of ADS staking pools by users and staking interfaces of the system, the pool operator is responsible for registering with the *Pool Registry* as a public pool. During the pool registration process, the _Pool Registry_ will automatically register the pool as a staker in _Staker Registry_.

The following figure describes the setup of a staking pool.

![ADS Pool Registration adn Setup](https://files.readme.io/2c5707f-Screenshot_from_2019-10-30_14-16-15.png)

#### Pool Registration

The pool operator must sign up to the Pool Registry with the following information:

- `Block-signing address`: The address corresponding to the secret key that the pool operator will use to sign the blocks produced.
- `Commission rate`: The fee charged for operating the pool, due to market conditions, etc. This is a number between 0%-100% (up to four decimal place precision).
- `Metadata URL`: The metadata URL that hosts the pool information JSON file that includes the schema version, logo, description, name, tags and pool URL.
- `Metadata content hash`: The Blake2b hash of the pool information JSON object hosted at the metadata URL.

Pool operator has to register the pool with a amount(sending the AION along with the registration call) that is equal or more than the required minimum self-bonded stake (1000 AION) of an ADS pool, otherwise, the registration will be rejected.

_Pool Registry smart contract_ method:

```java
/**
* Registers a pool in the registry.
* Note that the minimum self bond value should be passed along the call.
*
* @param signingAddress the signing address fo the pool
* @param commissionRate the pool commission rate with 4 decimal places of granularity (between [0, 1000000])
* @param metaDataUrl url hosting the metadata json file
* @param metaDataContentHash Blake2b hash of the json object hosted at the metadata url
*/
void registerPool(Address signingAddress, int commissionRate, byte[] metaDataURL, byte[] metaDataContentHash)
```

After a successful registration, the pool is automatically in an active state and can produce PoS blocks.

##### Staker Registration

As a pool operator, this is an implementation detail. If you are a solo staker this is important (solo staking guide to come in the future). The pool operator does not have to worry about the staker information and should be only interacting with the *Pool Registry*.

For a pool, the staker registration is done through the *Pool Registry* upon pool registration. The pool will also have an identity key, a management key and a coinbase address as a staker, where the identity address is set to pool operator's management key; the management key is set to the pool registry address and coinbase address is set to the freshly deployed coinbase contract address.

During the pool registration process, the contract will:

1. Deploy a `Coinbase Contract` and save the returning address.
2. Register the pool as a staker in *Staker Registry*.

```java
## In Staker Registry
/**
 * Registers a staker. The caller address will be the management address of the new staker.
 * Note that the minimum bond value should be passed along the call.
 *
 * @param identityAddress  the identity of the staker; can't be changed
 * @param signingAddress  the address of the key used for signing PoS blocks
 * @param coinbaseAddress the address of the key used for collecting block rewards
 */
void registerStaker(Address identityAddress, Address signingAddress, Address coinbaseAddress)
...

## In Pool Registry
byte[] registerStakerCall = new byte[getStringSize(methodName) + getAddressSize() * 3];
new ABIStreamingEncoder(registerStakerCall)
                .encodeOneString(methodName)
                .encodeOneAddress(caller)
                .encodeOneAddress(signingAddress)
                .encodeOneAddress(coinbaseAddress);
secureCall(STAKER_REGISTRY, selfStake, registerStakerCall, Blockchain.getRemainingEnergy());
...
```

After registering as a staker, the pool state will be updated and the pool is added to the pool registry.

#### Coinase Address

As mentioned above, the Pool Registry will deploy a coinbase contract for the pool operator to manage the rewards among the delegators. All rewards distribution is done automatically when any event where the rewards-per-unit-stake changes (e.g. delegate, undelegate, withdraw, etc.) occurs.

The pool operator does not need to manage the coinbase contract and all rewards distribution and fees are all managed there.

### Manage Commission Rate

The pool operator can change the commission fee charged for operating the pool due to market conditions, etc.

#### Commission Rate Change Lockout Period

There is a delay between the commission change request and when it is applied. This lockout period exists so delegators have time to respond to the fee-change (e.g. maintain their delegation with the current pool or transfer their delegation to another pool). The lockout time is set to be 60480 blocks, which at ~10 second block time(normal network conditions) is approximately 7 days.

#### Update Commission Rate

Two disparate transactions, an initiating transaction, and a finalizing transaction have to be made by the pool operator to update the commission rate.

It is assumed that pool operators have sufficient motivation to promptly come back online after requesting to update the commission rate after the lockout period has elapsed to activate the new commission rate.

1. **Initiating Transaction**: The pool operator can use the _management key_ to request an update of the pool's commission rate in _Pool Registry_:
  
```java
/**
 * Request to update the pool's commission rate.
 * @param newCommissionRate the new pool commission rate with 4 decimal places of granularity (between [0, 1000000])
 * @return commission rate update request id
 */
long requestCommissionRateChange(int newCommissionRate)
```

2. **Finalizing Transaction**: The pool operator can use the _management key_ to finalise the request of updating the pool's commission rate in _Pool Registry_:
  
```java
/**
 * Finalize a commission rate update operation.
 * @param id commission rate update request id
 */
void finalizeCommissionRateChange(long id){
```

### Manage the Pool State

A staking pool can either be in the _active_ state or the _broken_ state. The staking pool is eligible to receive delegated stake only if the staking pool is in the active state, which means the pool operator fulfils all responsibilities within the protocol. In addition, the pool is banned from producing new blocks if it is in _broken_ stake.

The pool starts in the _active_ state upon registration and remains so until. If any of the following public pool invariants are violated, the pool is set to the broken state:

- If the pool's self-bond requirement in the _Pool Registry_ is violated, which is no less than 1000 AION.
- If the pool's self-bond percentage in the _Pool Registry_ is violated, which is no less than 1% of the total delegated stake to the pool.

#### Tear-down the Pool

If a pool operator no longer wishes to operate a pool, they should:

- Send a "message" to the delegators by updating the pool's meta-data, stating that they no longer wish to be an active pool.
- Undelegate their self-bonded stake such that it violates the pool invariants and puts the pool into a _broken_ state.

### Manage Self-bonded Stake

The pool operator can send or withdraw bonded coins towards satisfying the self-bond requirement to keep the pool _active_.

Pool operators can earn staking rewards for their self-bonded stake just like any other delegator in the pool. Therefore, the pool operator's self-bonded stake **must** be delegated through the _Pool Registry Contract_ for maximum benefits.

The pool's self-bond percentage is **1%**, which means the pool operator has to delegate (self-bond) no less than 1% stake of the total delegated stake to the pool to keep the pool in active state. For example, if a pool operator delegates 10,000 AION to the pool, then the pool can receive up to 1,000,000 AION delegated stake. Any delegation that would put a pool into broken state will be reverted.

#### Delegate to Increase Self-bonded Stake

The pool operator can use _management key_ to delegate to their pool to increase self-bonded stake:

```java
/**
* Delegates stake to a pool.
*
* @param pool the pool address(pool operator's management key)
*/
void delegate(Address pool)
```

#### Undelegate to Withdraw Self-bonded Stake

Due to security constraints of the AVM computation metering system, two disparate transactions: an initiating transaction(undelegate) and a finalizing transaction(finalise undelegation) have to be implemented.

The pool operator can use _management key_ to undelegate and withdraw the stake to their pool to reduce their self-bonded stake:

```java
/**
* Revokes stake to a pool.
*
* @param pool   the pool address(pool operator's management key)
* @param amount the amount of stake to undelegate
* @param fee    the amount of the stake that will be transferred to the account that involves finalizeUndelegate
* @return pending un-delegation id
*/
long undelegate(Address pool, BigInteger amount, BuigInteger fee) {
```

For a period, measured in the number of blocks since the un-delegation action, the coin will be in the thawing lockout state, where it will be held in the staking contract and will neither contribute to stake securing the system nor will it be liquid until the unbonding period has elapsed. The lockout time is set to be 8640 blocks, which is approximately 1 day under normal network conditions.

The finalization action has to be taken for un-delegation and it has to be performed after un-bonding thawing lockout period(8640 blocks):

```java
/**
* Finalizes an undelegate operation, specified by the pending un-delegation id.
*
* @param id the pending un-delegate identifier
*/
static void finalizeUndelegate(long id)
```

As for now, the pool operator can put 0 for the fee since the foundation will be finalizing the un-delegation for the users. However, anyone can finalize an undelegation when the lockout period has passed if they want to.

### Update Meta-data

The pool operator can change the metadata displayed in the interfaces by updating the meta-data content hash and metadata URL. Since the meta-data only contains display information about the staking pool, this feature can be used by pools to communicate updates and announcements to the delegators.

#### Update Meta-data Content Hash and Url

The pool operator can use the _management key_ to update the pool's meta-data content hash and the url hosts the meta-data JSON obeject in _Pool Registry_:

```java
/**
* Update the meta-data content hash and url for the pool.
* @param newMetaDataUrl the updated url that hosts the meta-data Json file
* @param newMetaDataContentHash the new meta-data content hash for the pool
*/
updateMetaData(byte[] newMetaDataUrl, byte[] newMetaDataContentHash)
```

### Update Block-signing Address

The pool operator must update the block-signing address using _management key_ in the Staker Registry_ if they suspect their hot-key has been compromised.

```java
/**
* Update the signing address of a pool(staker).
* @param newAddress the new signing address
*/
void setSigningAddress(Address newAddress)
```

#### Block-signing Address Cooling Period

There is a block-signing address cooling period for the pool operator to update the signing address. The pool operator is allowed to update the signing address every 60480 blocks, which is approximately 7 days under normal network conditions.