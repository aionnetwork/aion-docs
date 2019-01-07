---
title: Mastery Testnet
weight: 20
---

# Mastery Testnet

You can now connect and sync to the _Mastery_ testnet using the same binary as the mainnet.

```bash
./aion.sh -n mastery
```

This will begin syncing your node from the genesis block. Note that any changes made to `config.xml` require you to re-deploy the node. For more in-depth instructions on how to install a local node on the _Mastery_ test network, see [Native Node](/en//aion-node/native-node).

## Migrating from Conquest to Mastery

This section is only relevant if you are currently on Aion `v0.2.8`.

Migrating from Conquest to Mastery requires resetting the database. If you want to maintain your data on the Conquest testnet, please **backup your database folder.**

Before the migration, you should also back up the `keystore` and `config` folders from the aion kernel for the Conquest network.

1. Download the release build for the Mastery testnet from the [releases page](https://github.com/aionnetwork/aion/releases/tag/v0.3.0.q)
2. Extract the files to your desired location. This will also be where you will be running your testnet node
3. If you made any changes in the Conquest `config.xml` file (in the config folder), please copy the changes into the new Mastery `config.xml` file in its config folder
4. Remove the `<threads>1</threads>` inside the `config.xml` file if you are using RPC as your client API connection
5. Copy the **keystore** folder from the Conquest aion kernel folder into the Mastery aion kernel folder
6. Save all changes made, and relaunch the testnet from your new Mastery directory with:

```bash
./aion.sh
```

## Reset Configuration Settings

If your configuration settings are broken, or if you just want to start with a fresh configuration file with the default settings, you can reset the file:

1. Remove the `config.xml` file
2. Launch the kernel by running:

```bash
./aion.sh -n mastery
```

This will create a new `config.xml` file with the default config settings. Make sure you have the seed nodes from the above-linked file in your `config.xml` file before starting the kernel.

## Obtaining Test Currency

To interact with the testnet, you will require currency. Follow the [Test Faucet guide](/en/tokens/get-test-coins/) to learn how to get test coins.