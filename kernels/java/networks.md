# Networks

There are four options available for connecting to an Aion network:

1. [Mainnet](#mainnet)
2. [Testnet (Mastery)](#testnet-mastery)
3. [AVM Testnet](#avm-testnet)
4. [Reset Configuration Settings](#reset-configuration-settings)
5. [Custom Networks](#custom-networks)

## Mainnet

This is the live network where real transactions are processed. `AION` has real-world value here, and transactions are processed by real-world miners.

The Java kernel will automatically connect to this network when launched unless another network is specified using the `-n <network>` argument.

## Testnet (Mastery)

This is the test network (sometimes called _Mastery_). It is intended to be used as a testing environment for developers and miners to configure their applications before releasing them onto the main network. `AION` has no value on this network.

You can connect and sync to the Testnet by passing in the `-n mastery` argument:

```bash
./aion.sh -n mastery
```

## AVM Testnet

This is the test network specifically for the Aion Virtual Machine (AVM). Both the Mainnet and Testnet (Mastery) sections are specifically for the [FastVM](/extra/fastvm-node-setup).

You can connect and sync to the AVM Testnet by passing in the `-n avmtestnet` argument:

```bash
./aion.sh -n avmtestnet
```

## Reset Configuration Settings

If your configuration settings are broken, or if you just want to start with a fresh configuration file with the default settings, you can reset the file:

1. Remove the `config.xml` file
2. Launch the kernel by running `./aion.sh -n` followed by the network you want to connect to:

```bash
./aion.sh -n mainnet

# or

./aion.sh -n mastery

# or

./aion.sh -n avmtestnet
```

This will create a new `config.xml` file with the default config settings.

## Custom Networks

To connect to a custom blockchain network, use the `-n custom` argument when calling the `aion` binary:

```bash
./aion.sh -n custom
```

### Modify Configure File Names

Note that your `aion/custom/config` folder contains two JSON files:

- `genesis.json`
- `testnet.json`

In order to create a custom blockchain network, you must:

1. Rename `genesis.json` to a different name.

This lowers the difficulty of the network for testing & development purposes.

### Configure the `config.xml`

1. Navigate to the `aion/custom/config` folder and open `config.xml`.
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

If applicable, delete the `aion/custom/database` folder and reboot the node in order for genesis to take in effect.