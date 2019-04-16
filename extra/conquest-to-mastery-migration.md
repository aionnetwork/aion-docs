# Conquest to Mastery Migration

This section is only relevant if you are currently on Aion `v0.2.8`.

Migrating from Conquest to Mastery requires resetting the database. If you want to maintain your data on the Conquest testnet, please **backup your database folder.**

Before the migration, you should also backup the `keystore` and `config` folders from the aion kernel for the Conquest network.

1. Download the release build for the Mastery testnet from the [releases page](https://github.com/aionnetwork/aion/releases/tag/v0.3.0.q)
2. Extract the files to your desired location. This will also be where you will be running your testnet node
3. If you made any changes in the Conquest `config.xml` file (in the config folder), please copy the changes into the new Mastery `config.xml` file in its config folder
4. Remove the `<threads>1</threads>` inside the `config.xml` file if you are using RPC as your client API connection
5. Copy the **keystore** folder from the Conquest aion kernel folder into the Mastery aion kernel folder
6. Save all changes made, and relaunch the testnet from your new Mastery directory with:

```bash
./aion.sh
```