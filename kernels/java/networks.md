# Networks

There are three options for connecting to an Aion network.

- Mainnet: this is the live network, where real transactions are processed. `AION` has real-world value here, and transactions are processed by real-world miners.
- [Testnet](#section-testnet): this test network is sometimes called _Mastery_. It is intended to be used as a testing environment for developers and miners to configure their applications before releasing them on the main network. `AION` has no value on this network, and cannot be exchanged for any real-world money.
- [Custom Network](#section-custom-network): you can create a custom blockchain network for your infrastructure.

## Testnet

You can now connect and sync to the _Mastery_ testnet using the same binary as the mainnet.

```bash
./aion.sh -n mastery
```

This will begin syncing your node from genesis. Note that any changes made to `config.xml` requires you to re-deploy the node. For more indepth instructions on how to install a local node on the _Mastery_ test nework, see [Native Node](/aion-node/node-setup/native_node).

### Migrating from Conquest to Mastery

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

### Reset Configuration Settings

If your configuration settings are broken, or if you just want to start with a fresh configuration file with the default settings, you can reset the file:

1. Remove the `config.xml` file
2. Launch the kernel by running:

```bash
./aion.sh -n mastery
```

This will create a new `config.xml` file with the default config settings. Alternatively, you can copy and paste the contents of [this file](https://github.com/aionnetwork/aion/blob/testnet_q3_mastery/modBoot/resource/`config.xml`).

Make sure you have the seed nodes from the above linked file in your `config.xml` file before starting the kernel.

### Obtaining Test Currency

To interact with the testnet, you will require currency. Follow the [Test Faucet guide](dapp-development/test-coin-faucet) to learn how to get test coins.

---

Before getting started on this section, make sure you have already [set-up your node and created an account](/aion-node/node-setup).

## Custom Network

To connect to a custom blockchain network, use the `-n` network flag when calling the `aion` binary:

```bash
./aion.sh -n custom
```

### Modify Configure File Names

Note that your `aion/config/custom` folder contains two JSON files:

- `genesis.json`
- `testnet.json`

In order to create a custom blockchain network, you must:

1. Rename `genesis.json` to a different name.
2. Rename `testnet.json` file to `genesis.json`.

This lowers the difficulty of the network for testing & development purposes.

### Configure the `config.xml`

1. Navigate to the `aion/config/custom` folder and open `config.xml`.
2. Delete all the seed nodes in the `<nodes>` section:

```json
{
  "codes": [
    {
      "code": "<nodes>\n</nodes>",
      "language": "xml"
    }
  ]
}
```

3. Set `<mining>` to true in the `<consensus>` section to enable internal mining:

```json
{
  "codes": [
    {
      "code": "<consensus>\n  <mining>true</mining>\n<consensus>",
      "language": "xml"
    }
  ]
}
```

### Get Balance into Test Account

1. Open the new `genesis.json` file
2. Replace one of the current addresses in the `alloc` object with your newly created account address:

```json
{
  "codes": [
    {
      "code": "{\n  \"alloc\": {\n    \"0x------------------your-account-address--------------------------\": {\n      \"balance\": \"314159000000000000000000\"\n    },\n    \"0xa0353561f8b6b5a8b56d535647a4ddd7278e80c2494e3314d1f0605470f56925\": {\n      \"balance\": \"314159000000000000000000\"\n    },\n    \"0xa0274c1858ca50576f4d4d18b719787b76bb454c33749172758a620555bf4586\": {\n      \"balance\": \"314159000000000000000000\"\n    },\n    ...\n  },",
      "language": "json"
    }
  ]
}
```

### Remove any Existing Databases

If applicable, delete the `aion/database/custom` folder and reboot the node in order for genesis to take in effect.