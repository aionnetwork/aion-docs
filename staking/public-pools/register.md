---
title: Register
---

To become an ADS staking pool and be listed by the foundation supported Unity staking interface, the pool operator must sign up to the Pool Registry with the following information:

- `Block-signing address`: The address corresponding to the secret key that the pool operator will use to sign the blocks produced.
- `Commission rate`: The fee charged for operating the pool, due to market conditions, etc. This is a number between 0%-100% (up to four decimal place precision).
- `Metadata URL`: The metadata URL that hosts the pool information JSON file that includes the schema version, logo, description, name, tags and pool URL.
- `Metadata content hash`: The Blake2b hash of the pool information JSON object hosted at the metadata URL.

The pool operator has to register with a value more above the 1,000 AION minimum required self-bonded stake, otherwise, the registration will be rejected. After successful registration, the pool will automatically become active and can produce PoS blocks.

## Use the registerPool.sh

If you are familiar with using the terminal, you can simply use the `registerPool.sh` script to register as an ADS pool.

### Download the Script

Open a terminal and navigate to the desired directory where you want to save the scripts, then run the following commands to get the `UnityBootstrap` scripts:

```bash
wget https://github.com/jeff-aion/UnityBootstrap/archive/Amity-Oct18.tar.gz
tar xvzf Amity-Oct18.tar.gz
cd UnityBootstrap-Amity-Oct18/
```

### Run registerPool.sh

 We will use `registerPool.sh` to register a pool.

#### Usage

```text
./registerPool.sh node_address(ip:port) private_key signing_address commission_rate metadata_url metadata_content_hash value
```

#### Inputs

- `node_address`: node address in *ip:port* format. For example: *127.0.0.1:8545*<br>
- `private_key`: private key of the pool's **identity address**, a.k.a the pool operator's [management key](#management-keycold-key). Input either the full 64-bytes private key or the first 32-bytes of the private key both with `0x`. Note that each account can ONLY be registered as a pool once. <br>
- `signing_address`: 32-byte public key of the [signing address](#block-signing-keyhot-key). Input with `0x`. Each signing address can ONLY be used once. We suggest you use different keys for the management key and the block signing key since they have to be stored differently.<br>
- `commission_rate`: the commission rate with 4 decimal places of granularity. For example, if the fee to be charged is *2%*, input *20000*. This number should be between 0 to 1000000. Also, the value can at most have 4 decimal places, i.e: 2.1234% is valid but not 2.12345%. <br>
- `metadata_url`: the URL hosting the pool's meta-data JSON file. For example: https://jennijuju.github.io/stakeFrites.json<br>
- `metadata_content_hash`: Black2b hash of the JSON object hosted at the metadata URL which is 32-byte. <br>
- `value`: The initial amount you want to self-bond. This value needs to be equal or greater than the minimum self-bond requirement of 1,000 AION. Make sure that your management account (cold storage key) has sufficient balance. Note: The unit used in the script is `nAmp`, where ```1 AION = 1,000,000,000,000,000,000 nAmp```.

Make sure that:

1. The management key is kept in cold storage (HSM) at all times, and only be retrieved when management tasks need to be performed. If this key is compromised, the pool is compromised and must be shut down. Keep the block-signing key locally since you will need it for signing the PoS block later.
2. Management key will be used to register and self bond, so make sure it has sufficient balance to pay for gas and the desired stake. In the other hand, the signing address will be used for producing POS blocks which does not require any AION.

#### Example

The following example is to send a `pool registration` request to a local Unity node. The private key of the pool operator's management key is `0x******************************************` (input full 64-bytes works as well), and the public key of this private key is the identity address of the pool. `0xa058a2b28d2b3d58b74401919eccf74d5893f279c487428854125b297a19636b` is the block-signing address. The commission rate is set to *2%* and the rest two inputs are meta-data url and content hash. In addition, _1000 AION_ is self-bonded to register and active the pool.

```bash
./registerPool.sh localhost:8545 0x******************************************
0xa058a2b28d2b3d58b74401919eccf74d5893f279c487428854125b297a19636b 20000 https://jennijuju.github.io/stakeFrites.json 0x558729f5c8468f52b1f532ed53de5df98c0b94c66620c9e6f92b90f06f47a365 1000000000000000000000
```

The script will first retrieve the *identity address* from the private key that passed in, and then list the pool info as:

![Pool Info](https://files.readme.io/9a5cf55-poolInfo.png)

Then it sends a transaction to the *Pool Registry* to register the pool. If all the inputs are formatted correctly and your account has a balance, a transaction hash will be provided, you can then go to [Aion Dashboard](https://amity.aion.network/#/dashboard) to track your transaction. You have to wait for a while for your transaction to be mined. If you see *Transaction completed* thats means you have successfully registered an ADS staking pool. The script will then verify that your pool is active, showing your current stake and the coinbase contract address that was deployed. Save the coinbase address so that you can track the block you produced.

Make sure your management account has sufficient balance to pay for both self-bonded stake amount and the gas fee of contract transaction.

![Further pool info](https://files.readme.io/2502dd0-poolInfo.png)
