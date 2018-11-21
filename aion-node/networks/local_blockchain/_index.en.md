---
title: Local Blockchain
weight: 1
chapter: true
---

# Local Blockchain

Before getting started on this section, make sure you have already [set-up your node and created an account](/aion-node/node-setup).

## Connecting to a Local Blockchain

To connect to a custom blockchain network, use the `-n` network flag when calling the `aion` binary:

```bash
./aion.sh -n custom
```

## Modify Configure File Names

Note that your `aion/config/custom` folder contains two JSON files:

- `genesis.json`
- `testnet.json`

In order to create a custom blockchain network, you must:

1. Rename `genesis.json` to a different name.
2. Rename `testnet.json` file to `genesis.json`.

This lowers the difficulty of the network for testing & development purposes.

## Configure the `config.xml`

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

## Get Balance into Test Account

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

## Remove any Existing Databases

If applicable, delete the `aion/database/custom` folder and reboot the node in order for genesis to take in effect.