Here you'll find the API calls for querying the following information:
* all client accounts
* coinbase account
* account balance
* account transaction count

The final subsection contains code illustrating all of the above interactions.
[block:api-header]
{
  "title": "Retrieve All Client Accounts"
}
[/block]
The examples below show how to query the APIs for the list of addresses owned by the client. The functionality is compatible with [`eth_accounts`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_accounts). In each code snippet, the addresses are retrieved from the API and printed to the standard output.
[block:code]
{
  "codes": [
    {
      "code": "// get accounts from API\nList<Address> accounts = api.getWallet().getAccounts().getObject();\n\n// print accounts to standard output\nSystem.out.format(\"the keystore contains %d accounts, as follow:%n\", accounts.size());\nfor (Address account : accounts) {\n    System.out.format(\"\\t%s%n\", account.toString());\n}",
      "language": "java"
    },
    {
      "code": "// get accounts from API\nlet accounts = web3.eth.accounts;\n\n// print accounts to standard output\nconsole.log(\"the keystore contains \" + accounts.length + \" accounts, as follow:\");\nconsole.log(accounts);",
      "language": "javascript"
    },
    {
      "code": "// get accounts from API\nlet accounts = web3.personal.listAccounts;\n\n// print accounts to standard output\nconsole.log(\"the keystore contains \" + accounts.length + \" accounts, as follow:\");\nconsole.log(accounts);",
      "language": "javascript",
      "name": "JavaScript (alternative)"
    }
  ]
}
[/block]
Sample output:
[block:code]
{
  "codes": [
    {
      "code": "the keystore contains 4 accounts, as follow:\n\ta0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\n\ta04164b007f75fb77e79ebfd90ace768e5d8ab26855035df4f2b9e03c1ca40f4\n\ta06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\n\ta0eb00973749a0f7b7f8e66e2a13bc2725e3a02804d44a0b88c1666512031591",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "the keystore contains 4 accounts, as follow:\n[ '0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e',\n  '0xa04164b007f75fb77e79ebfd90ace768e5d8ab26855035df4f2b9e03c1ca40f4',\n  '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  '0xa0eb00973749a0f7b7f8e66e2a13bc2725e3a02804d44a0b88c1666512031591' ]",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Retrieve Coinbase Account"
}
[/block]
The examples below show how to query the APIs for the address configured to receive the mining rewards. The functionality is compatible with [`eth_coinbase`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_coinbase). In each code snippet, the address is retrieved from the API and printed to the standard output.
[block:code]
{
  "codes": [
    {
      "code": "// get miner account\nAddress account = api.getWallet().getMinerAccount().getObject();\n\n// print retrieved value\nSystem.out.format(\"coinbase account = %s%n\", account.toString());",
      "language": "java"
    },
    {
      "code": "// get miner account\nlet miner = web3.eth.coinbase;\n\n// print retrieved value\nconsole.log(\"coinbase account = \" + miner);",
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
      "code": "coinbase account = a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "coinbase account = 0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Retrieve Account Balance"
}
[/block]
The examples below show how to query the APIs for the balance of a given address.
The functionality is compatible with [`eth_getBalance`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_getbalance). In each code snippet, the balance is retrieved from the API and printed to the standard output.
[block:code]
{
  "codes": [
    {
      "code": "// interpret string as address\nAddress account = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\n\n// get account balance\nBigInteger balance = api.getChain().getBalance(account).getObject();\n\n// print balance\nSystem.out.format(\"%s has balance = %d nAmp (over %d AION)%n\",\n                  account.toString(),\n                  balance,\n                  balance.divide(BigInteger.TEN.pow(18)));",
      "language": "java"
    },
    {
      "code": "// set address\nlet account = 'a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\n\n// get account balance\nlet balance = web3.eth.getBalance(account);\n\n// print balance\nconsole.log(account + \" has balance = \" + balance + \" nAmp (\" + balance.shiftedBy(-18).toString() + \" AION)\");\n",
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
      "code": "a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 has balance = 1003070000000000000 nAmp (over 1 AION)",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 has balance = 1003070000000000000 nAmp (1.00307 AION)",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Retrieve Account Transaction Count"
}
[/block]
The examples below show how to query the APIs for the number of transactions sent by a given address. The functionality is compatible with [`eth_getTransactionCount`](https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_gettransactioncount). In each code snippet, the transaction count is retrieved from the API and printed to the standard output.
[block:code]
{
  "codes": [
    {
      "code": "// interpret string as address\n// note that hex prefix '0x' is optional\nAddress account = Address.wrap(\"0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\n\n// get number of transactions sent by account\nBigInteger txCount = api.getChain().getNonce(account).getObject();\n\n// print performed transactions",
      "language": "java"
    },
    {
      "code": "// set address\n// note that hex prefix '0x' is optional\naccount = '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\n\n// get number of transactions sent by account\nlet txCount = web3.eth.getTransactionCount(account);\n\n// print performed transactions\nconsole.log(account + \" performed \" + txCount + \" transactions\");",
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
      "code": "a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 performed 33 transactions",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 performed 33 transactions",
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
1. all keystore addresses,
2. the coinbase (miner) address,
3. the balance for a given account,
4. the number of transactions performed by a given account, and
5. the balance and number of transactions performed by each account in the keystore.

[block:code]
{
  "codes": [
    {
      "code": "package org.aion.tutorials;\n\nimport org.aion.api.IAionAPI;\nimport org.aion.api.type.ApiMsg;\nimport org.aion.base.type.Address;\n\nimport java.math.BigInteger;\nimport java.util.List;\n\npublic class AccountExample {\n\n    public static void main(String[] args) {\n\n        // connect to Java API\n        IAionAPI api = IAionAPI.init();\n        ApiMsg apiMsg = api.connect(IAionAPI.LOCALHOST_URL);\n\n        // failed connection\n        if (apiMsg.isError()) {\n            System.out.format(\"Could not connect due to <%s>%n\", apiMsg.getErrString());\n            System.exit(-1);\n        }\n\n        // 1. eth_accounts\n\n        // get accounts from API\n        List<Address> accounts = api.getWallet().getAccounts().getObject();\n\n        // print accounts to standard output\n        System.out.format(\"the keystore contains %d accounts, as follow:%n\", accounts.size());\n        for (Address account : accounts) {\n            System.out.format(\"\\t%s%n\", account.toString());\n        }\n\n        // 2. eth_coinbase\n\n        // get miner account\n        Address account = api.getWallet().getMinerAccount().getObject();\n\n        // print retrieved value\n        System.out.format(\"%ncoinbase account = %s%n\", account.toString());\n\n        // 3. eth_getBalance\n\n        // interpret string as address\n        account = Address.wrap(\"a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\n\n        // get account balance\n        BigInteger balance = api.getChain().getBalance(account).getObject();\n\n        // print balance\n        System.out.format(\"%n%s has balance = %d nAmp (over %d AION)%n\",\n                          account.toString(),\n                          balance,\n                          balance.divide(BigInteger.TEN.pow(18)));\n\n        // 4. eth_getTransactionCount\n\n        // interpret string as address\n        // note that hex prefix '0x' is optional\n        account = Address.wrap(\"0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\");\n\n        // get number of transactions sent by account\n        BigInteger txCount = api.getChain().getNonce(account).getObject();\n\n        // print performed transactions\n        System.out.format(\"%n%s performed %d transactions%n\", account.toString(), txCount);\n\n        // 5. eth_getBalance & eth_getTransactionCount for each keystore account\n\n        // print balance & tx count to standard output\n        System.out.format(\"%nthe keystore contains %d accounts, as follow:%n\", accounts.size());\n        for (Address acc : accounts) {\n            System.out.format(\"\\t%s balance = %22d nAmp, tx count = %2d%n\",\n                              acc.toString(),\n                              api.getChain().getBalance(acc).getObject(),\n                              api.getChain().getNonce(acc).getObject());\n        }\n\n        // disconnect from api\n        api.destroyApi();\n\n        System.exit(0);\n    }\n}",
      "language": "java"
    },
    {
      "code": "const Web3 = require('/path/to/aion/web3');\nconst web3 = new Web3(new Web3.providers.HttpProvider(\"http://localhost:8545\"));\n\n// 1.a) eth_accounts\n\n// get accounts from API\nlet accounts = web3.eth.accounts;\n\n// print accounts to standard output\nconsole.log(\"the keystore contains \" + accounts.length + \" accounts, as follow:\");\nconsole.log(accounts);\n\n// 1.b) eth_accounts\n\n// get accounts from API\naccounts = web3.personal.listAccounts;\n\n// print accounts to standard output\nconsole.log(\"\\nthe keystore contains \" + accounts.length + \" accounts, as follow:\");\nconsole.log(accounts);\n\n// 2. eth_coinbase\n\n// get miner account\nlet miner = web3.eth.coinbase;\n\n// print retrieved value\nconsole.log(\"\\ncoinbase account = \" + miner);\n\n// 3. eth_getBalance\n\n// set address\nlet account = 'a06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\n\n// get account balance\nlet balance = web3.eth.getBalance(account);\n\n// print balance\nconsole.log(\"\\n\" + account + \" has balance = \" + balance + \" nAmp (\" + balance.shiftedBy(-18).toString() + \" AION)\");\n\n// 4. eth_getTransactionCount\n\n// set address\n// note that hex prefix '0x' is optional\naccount = '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5';\n\n// get number of transactions sent by account\nlet txCount = web3.eth.getTransactionCount(account);\n\n// print performed transactions\nconsole.log(\"\\n\" + account + \" performed \" + txCount + \" transactions\");\n\n// 5. eth_getBalance & eth_getTransactionCount for each keystore account\n\n// print balance & tx count to standard output\nconsole.log(\"\\nthe keystore contains \" + accounts.length + \" accounts, as follow:\");\naccounts.forEach(print);\n\nfunction print(acc, index) {\n    console.log(\"\\t\" + acc + \" balance = \" + web3.eth.getBalance(acc) + \" nAmp, tx count = \" + web3.eth.getTransactionCount(acc));\n}",
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
      "code": "the keystore contains 4 accounts, as follow:\n\ta0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\n\ta04164b007f75fb77e79ebfd90ace768e5d8ab26855035df4f2b9e03c1ca40f4\n\ta06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5\n\ta0eb00973749a0f7b7f8e66e2a13bc2725e3a02804d44a0b88c1666512031591\n\ncoinbase account = a0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\n\na06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 has balance = 1003070000000000000 nAmp (over 1 AION)\n\na06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 performed 33 transactions\n\nthe keystore contains 4 accounts, as follow:\n\ta0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e balance = 1251613319407197678222 nAmp, tx count = 35\n\ta04164b007f75fb77e79ebfd90ace768e5d8ab26855035df4f2b9e03c1ca40f4 balance =    5000000000000000000 nAmp, tx count =  0\n\ta06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 balance =    1003070000000000000 nAmp, tx count = 33\n\ta0eb00973749a0f7b7f8e66e2a13bc2725e3a02804d44a0b88c1666512031591 balance =                      0 nAmp, tx count =  0",
      "language": "text",
      "name": "Java Output"
    },
    {
      "code": "the keystore contains 4 accounts, as follow:\n[ '0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e',\n  '0xa04164b007f75fb77e79ebfd90ace768e5d8ab26855035df4f2b9e03c1ca40f4',\n  '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  '0xa0eb00973749a0f7b7f8e66e2a13bc2725e3a02804d44a0b88c1666512031591' ]\n\nthe keystore contains 4 accounts, as follow:\n[ '0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e',\n  '0xa04164b007f75fb77e79ebfd90ace768e5d8ab26855035df4f2b9e03c1ca40f4',\n  '0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5',\n  '0xa0eb00973749a0f7b7f8e66e2a13bc2725e3a02804d44a0b88c1666512031591' ]\n\ncoinbase account = 0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e\n\na06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 has balance = 1003070000000000000 nAmp (1.00307 AION)\n\n0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 performed 33 transactions\n\nthe keystore contains 4 accounts, as follow:\n\t0xa0bd0ef93902d9e123521a67bef7391e9487e963b2346ef3b3ff78208835545e balance = 1.253111308690440988407e+21 nAmp, tx count = 35\n\t0xa04164b007f75fb77e79ebfd90ace768e5d8ab26855035df4f2b9e03c1ca40f4 balance = 5000000000000000000 nAmp, tx count = 0\n\t0xa06f02e986965ddd3398c4de87e3708072ad58d96e9c53e87c31c8c970b211e5 balance = 1003070000000000000 nAmp, tx count = 33\n\t0xa0eb00973749a0f7b7f8e66e2a13bc2725e3a02804d44a0b88c1666512031591 balance = 0 nAmp, tx count = 0\nBlock Functionality",
      "language": "text",
      "name": "JavaScript Output"
    }
  ]
}
[/block]