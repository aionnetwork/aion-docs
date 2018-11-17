---
title: "Aion Conquest Testnet (Depreciated)"
excerpt: "If you're working on dApps and wish to connect to an environment to test your smart contracts, configure your node to run on the Conquest testnet."
---
[block:callout]
{
  "type": "danger",
  "title": "Depreciated",
  "body": "The most recent Aion testnet release can be found [here](doc:mastery-testnet). Please migrate to the new Mastery testnet for the latest updates and Aion functionalities."
}
[/block]
There will be three changes you will need to make in order to connect to the testnet:
- configure the connected nodes
- rename the genesis JSON files
- set the blockchain database path
[block:callout]
{
  "type": "warning",
  "title": "Aion Node",
  "body": "Make sure you have already [set-up your node](doc:node-set-up)."
}
[/block]
You will also be able to [switch back to mainnet.](doc:aion-conquest-testnet#section-set-the-database-path) 
[block:api-header]
{
  "title": "Configure the Connected Nodes"
}
[/block]
1. Navigate to the **aion/config/config.xml** file
2. Replace existing connected nodes with the following:
[block:code]
{
  "codes": [
    {
      "code": "<nodes>\n    <node>p2p://a25d1000-8c7e-496c-9c4e-c89318280274@40.117.138.214:30303</node>\n    <node>p2p://a25d2000-729a-4584-86f1-e19ab97cf9ce@104.211.28.191:30303</node>\n    <node>p2p://a25d3000-216b-47d4-ac44-5d8181b56e7e@23.101.139.58:30303</node>\n    <node>p2p://a25d4000-6a29-4ca6-8b06-b2781ba7f9bf@23.101.134.120:30303</node>\n</nodes>",
      "language": "xml",
      "name": null
    }
  ]
}
[/block]
3. If applicable, delete the **aion/database** folder and re-launch the node in order for the kernel to run the updated configuration
[block:api-header]
{
  "title": "Rename Genesis JSON Files"
}
[/block]
Note that your **aion/config** folder contains two JSON files: **genesis.json** and **testnet.json**. (The default genesis file will connect you to the Aion mainnet)
1. Rename the original genesis.json file to a different name
2. Rename the original testnet.json file to "genesis.json"

This lowers the difficulty of the network for testing & development purposes.
[block:api-header]
{
  "title": "Set the Database Path"
}
[/block]
Make sure that your database starts syncing from genesis in order for the new configurations to take place. This can be done by changing the path of the database, so a new one will begin syncing:
1. Navigate and open the config.xml file in the aion/config folder
2. Set the path for your testnet database (you must rename the default "database" to another name):
[block:code]
{
  "codes": [
    {
      "code": "<db>\n\t\t<!--Sets the physical location on disk where data will be stored.-->\n\t\t<path>database</path>\n\t\t\n    <!--Additional database configurations-->\n    \n</db>",
      "language": "xml"
    }
  ]
}
[/block]
3. Save all your files and launch the Aion node ( `./aion.sh` in the **aion** directory)
[block:callout]
{
  "type": "info",
  "title": "Switching Back to Mainnet",
  "body": "1. Replace `<nodes>` section with to mainnet seed nodes:\n\n```xml\n<nodes>\n    <node>p2p://c33d1066-8c7e-496c-9c4e-c89318280274@13.92.155.115:30303</node>\n    <node>p2p://c33d2207-729a-4584-86f1-e19ab97cf9ce@51.144.42.220:30303</node>\n    <node>p2p://c33d302f-216b-47d4-ac44-5d8181b56e7e@52.231.187.227:30303</node>\n    <node>p2p://c33d4c07-6a29-4ca6-8b06-b2781ba7f9bf@191.232.164.119:30303</node>\n    <node>p2p://c33d5a94-20d8-49d9-97d6-284f88da5c21@13.89.244.125:30303</node>\n    <node>p2p://741b979e-6a06-493a-a1f2-693cafd37083@66.207.217.190:30303</node>\n</nodes>\n```\n\n2. Rename your genesis JSON files again (so the original genesis file is called **genesis.json**)\n3. Set the database path back to the mainnet database. By default :\n```xml\n<path>database</path>\n```"
}
[/block]