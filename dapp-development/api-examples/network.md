---
Title: Network
---

This page will take you through the API calls for querying the following information:
* syncing status
* current peer count
* network listening status

The APIs at present do not support querying for the network identifier similar to [`net_version`](https://github.com/ethereum/wiki/wiki/JSON-RPC#net_version).

The final subsection contains code illustrating all of the above interactions.
[block:api-header]
{
  "title": "Retrieve Syncing Status"
}
[/block]
The examples below show how to query the APIs for the kernel's sync status.
The functionality is compatible with [`eth_syncing`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_syncing).
In each code snippet, the sync status is retrieved from the API and printed to the standard output.

[block:code]
{
  "codes": [
    {
      "code": "// get sync status\nSyncInfo status = api.getNet().syncInfo().getObject();\n\n// print status\nSystem.out.format(\"{ currentBlock: %d,%n  highestBlock: %d,%n  startingBlock: %d }%n\",\n                  status.getChainBestBlock(),\n                  status.getNetworkBestBlock(),\n                  status.getStartingBlock());",
      "language": "java"
    },
    {
      "code": "// get sync status\nlet status = web3.eth.syncing;\n\n// print status\nconsole.log(status);",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "{ currentBlock: 306442,\n  highestBlock: 306442,\n  startingBlock: 306413 }",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "{ currentBlock: 306442,\n  highestBlock: 306442,\n  startingBlock: 306413 }",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Retrieve Current Number of Peers"
}
[/block]
The examples below show how to query the APIs for the number of active peers.
The functionality is compatible with [`net_peerCount`](https://github.com/ethereum/wiki/wiki/JSON-RPC#net_peercount).
In each code snippet, the number of active peers is retrieved from the API and printed to the standard output.
[block:code]
{
  "codes": [
    {
      "code": "// get peer count\nint peerCount = api.getNet().getPeerCount().getObject();\n\n// print count\nSystem.out.format(\"number of active peers = %d%n\", peerCount);",
      "language": "java"
    },
    {
      "code": "// get peer information\nList<Node> peers = api.getNet().getActiveNodes().getObject();\n\n// print count\nSystem.out.format(\"number of active peers = %d%n\", peers.size());",
      "language": "java",
      "name": "Java (alternative: access peer details)"
    },
    {
      "code": "// get peer count\nlet peers = web3.net.peerCount;\n\n// print count\nconsole.log(\"number of active peers = \" + peers);",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "number of active peers = 6",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "number of active peers = 6",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Retrieve Network Listening Status"
}
[/block]
The examples below show how to query the APIs to determine if the kernel is actively listening for network connections.
The functionality is compatible with [`net_listening`](https://github.com/ethereum/wiki/wiki/JSON-RPC#net_listening).
In each code snippet, the listening status is retrieved from the API and printed to the standard output.
[block:code]
{
  "codes": [
    {
      "code": "// get listening status\nboolean listening = api.getNet().isListening().getObject();\n\n// print status\nSystem.out.format(\"%slistening for connections%n\", (listening ? \"\" : \"not \"));",
      "language": "java"
    },
    {
      "code": "// get listening status\nlet listening = web3.net.listening;\n\n// print status\nconsole.log((listening ? \"\" : \"not \") + \"listening for connections\",);",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "listening for connections",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "listening for connections",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Complete Examples"
}
[/block]
Each code example below retrieves and prints to the standard output the following:
1. the syncing status,
2. the number of active peers, and
3. if the client is listening for connections.
[block:code]
{
  "codes": [
    {
      "code": "package org.aion.tutorials;\n\nimport org.aion.api.IAionAPI;\nimport org.aion.api.type.ApiMsg;\nimport org.aion.api.type.Node;\nimport org.aion.api.type.SyncInfo;\n\nimport java.util.List;\n\npublic class NetworkExample {\n\n    public static void main(String[] args) {\n\n        // connect to Java API\n        IAionAPI api = IAionAPI.init();\n        ApiMsg apiMsg = api.connect(IAionAPI.LOCALHOST_URL);\n\n        // failed connection\n        if (apiMsg.isError()) {\n            System.out.format(\"Could not connect due to <%s>%n\", apiMsg.getErrString());\n            System.exit(-1);\n        }\n\n        // 1. eth_syncing\n\n        // get sync status\n        SyncInfo status = api.getNet().syncInfo().getObject();\n\n        // print status\n        System.out.format(\"{ currentBlock: %d,%n  highestBlock: %d,%n  startingBlock: %d }%n\",\n                          status.getChainBestBlock(),\n                          status.getNetworkBestBlock(),\n                          status.getStartingBlock());\n\n        // 2.a) net_peerCount\n\n        // get peer count\n        int peerCount = api.getNet().getPeerCount().getObject();\n\n        // print count\n        System.out.format(\"%nnumber of active peers = %d%n\", peerCount);\n\n        // 2.b) net_peerCount\n\n        // get peer information\n        List<Node> peers = api.getNet().getActiveNodes().getObject();\n\n        // print count\n        System.out.format(\"%nnumber of active peers = %d%n\", peers.size());\n\n        // 3. net_listening\n\n        // get listening status\n        boolean listening = api.getNet().isListening().getObject();\n\n        // print status\n        System.out.format(\"%n%slistening for connections%n\", (listening ? \"\" : \"not \"));\n\n        // disconnect from api\n        api.destroyApi();\n\n        System.exit(0);\n    }\n}",
      "language": "java"
    },
    {
      "code": "const Web3 = require('/path/to/aion/web3');\nconst web3 = new Web3(new Web3.providers.HttpProvider(\"http://localhost:8545\"));\n\n// 1. eth_syncing\n\n// get sync status\nlet status = web3.eth.syncing;\n\n// print status\nconsole.log(status);\n\n// 2. net_peerCount\n\n// get peer count\nlet peers = web3.net.peerCount;\n\n// print count\nconsole.log(\"\\nnumber of active peers = \" + peers);\n\n// 3. net_listening\n\n// get listening status\nlet listening = web3.net.listening;\n\n// print status\nconsole.log(\"\\n\" +  (listening ? \"\" : \"not \") + \"listening for connections\",);",
      "language": "javascript"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "{ currentBlock: 306442,\n  highestBlock: 306442,\n  startingBlock: 306413 }\n\nnumber of active peers = 6\n\nnumber of active peers = 6\n\nlistening for connections",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "{ currentBlock: 306442,\n  highestBlock: 306442,\n  startingBlock: 306413 }\n\nnumber of active peers = 6\n\nlistening for connections{ currentBlock",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]