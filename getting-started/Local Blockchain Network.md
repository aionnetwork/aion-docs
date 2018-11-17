---
title: "Local Blockchain Network"
excerpt: "You may wish to run your own private Aion blockchain to build and test your dApp."
---
[block:callout]
{
  "type": "warning",
  "body": "Make sure you have already [set-up your node and created an account](doc:node-set-up).",
  "title": "Aion Node"
}
[/block]

[block:api-header]
{
  "title": "Modify Configure File Names"
}
[/block]
Note that your **aion/config** folder contains two JSON files: **genesis.json** and **testnet.json**. 
1. Rename the original genesis.json file to a different name
2. Rename the original testnet.json file to "genesis.json"

This lowers the difficulty of the network for testing & development purposes.
[block:api-header]
{
  "title": "Configure the config.xml"
}
[/block]
1. Navigate to the **aion/config** folder and open **config.xml**
2. Delete all the seed nodes in the <nodes> section:
[block:code]
{
  "codes": [
    {
      "code": "<nodes>\n</nodes>",
      "language": "xml"
    }
  ]
}
[/block]
3. Set <mining> to true in the <consensus> section to enable internal mining:
[block:code]
{
  "codes": [
    {
      "code": "<consensus>\n  <mining>true</mining>\n<consensus>",
      "language": "xml"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Get Balance into Test Account"
}
[/block]
1. Open the new **genesis.json** file
2. Replace one of the current addresses in the "alloc" object with your newly created account address:

[block:code]
{
  "codes": [
    {
      "code": "{\n  \"alloc\": {\n    \"0x------------------your-account-address--------------------------\": {\n      \"balance\": \"314159000000000000000000\"\n    },\n    \"0xa0353561f8b6b5a8b56d535647a4ddd7278e80c2494e3314d1f0605470f56925\": {\n      \"balance\": \"314159000000000000000000\"\n    },\n    \"0xa0274c1858ca50576f4d4d18b719787b76bb454c33749172758a620555bf4586\": {\n      \"balance\": \"314159000000000000000000\"\n    },\n    ...\n  },",
      "language": "json"
    }
  ]
}
[/block]

[block:callout]
{
  "type": "warning",
  "body": "If applicable, delete the **aion/database** folder and re-launch the node in order for genesis to take in effect",
  "title": "Remove any existing database"
}
[/block]