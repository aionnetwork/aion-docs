---
title: "Mastery Testnet"
excerpt: "This testnet environment was released with the latest v0.3.0 Moldoveanu Peak mainnet. You may wish to  to configure your Aion node here to deploy and test out smart contracts."
---
This is the guide for the [Aion Mastery testnet](https://mastery.aion.network/#/dashboard). 

If you don't have an existing testnet you wish to migrate, you can:
1. Download Mastery [here](https://github.com/aionnetwork/aion/releases/tag/v0.3.0.q)
2. Extract the files and navigate into the **aion** directory
3. Launch the testnet kernel by running:

```
./aion.sh
```
This will begin syncing your node from genesis. Note that any changes made to **config.xml** requires you to re-deploy the node.
[block:callout]
{
  "type": "info",
  "title": "Database",
  "body": "Migrating from Conquest to Mastery requires resetting the database. If you want to maintain your data on the Conquest testnet, please **backup your database folder.**"
}
[/block]

[block:api-header]
{
  "title": "Migrating from Conquest to Mastery"
}
[/block]
Before the migration, you should also backup the **keystore** and **config** folders from the aion kernel for the Conquest network.

1. Download the release build for the Mastery testnet from the [releases page](https://github.com/aionnetwork/aion/releases/tag/v0.3.0.q)
2. Extract the files to your desired location. This will also be where you will be running your testnet node
3. If you made any changes in the Conquest **config.xml** file (in the config folder), please copy the changes into the new Mastery **config.xml** file in its config folder
4. Remove the `<threads>1</threads>` inside the **config.xml** file if you are using RPC as your client API connection
5. Copy the **keystore** folder from the Conquest aion kernel folder into the Mastery aion kernel folder
6. Save all changes made, and relaunch the testnet from your new Mastery directory with:

```
./aion.sh
```
[block:api-header]
{
  "title": "Reset Configuration Settings"
}
[/block]
If your configuration settings are broken, or if you just want to start with a fresh configuration file with the default settings, you can reset the file:
1. Remove the config.xml file
2. In terminal, execute 

```
./aion.sh -c
```
This will create a new config.xml file with the default config settings. Alternatively, you can copy and paste the contents of [this file](https://github.com/aionnetwork/aion/blob/testnet_q3_mastery/modBoot/resource/config.xml). 

Make sure you have the seed nodes from the above linked file in your **config.xml** file before starting the kernel.
[block:api-header]
{
  "title": "Obtaining Test Currency"
}
[/block]
To interact with the testnet, you will require currency. You can find a faucet for our mastery network [here](https://gitter.im/aionnetwork/mastery_faucet)