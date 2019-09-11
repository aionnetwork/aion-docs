---
title: Custom Network
description: This section will show you how to customize your node config and genesis file. This will allow you to create a private network for testing your dApp.
table_of_contents: true
weight: 200
---

## Prerequisites

You need an [installed node](nodes-java-install-).

## Create a Custom Network

After you install the node, navigate into `aion` folder, open an terminal and run:

```sh
./aion.sh -n custom
```

This will create you a `custom` network folder, which includes *config*, *database*, *keystore* and *log* for your customized network.

## Customize Network Configuration

Go to your `/custom/config` folder, there are two files to help you custom your network, **config.xml** and **genesis.json**.

### config.xml

Following is the default `config.xml`:

```xml
<?xml version="1.0" encoding="utf-8"?>
<aion>
    <mode>aion</mode>
    <id>67f905a2-9219-4ce1-9dbe-253cd242e5c0</id>
    <api>
        <!--rpc config docs: https://github.com/aionnetwork/aion/wiki/JSON-RPC-API-Docs-->
        <rpc active="false" ip="127.0.0.1" port="8545">
            <cors-enabled>false</cors-enabled>
            <!--comma-separated list, APIs available: web3,net,debug,personal,eth,stratum-->
            <apis-enabled>web3,eth,personal,stratum</apis-enabled>
        </rpc>
        <java active="false" ip="127.0.0.1" port="8547">
            <secure-connect>true</secure-connect>
        </java>
        <nrg-recommendation>
            <!--default NRG price used by api if oracle disabled, minimum price recommended by oracle-->
            <default>10000000000</default>
            <!--max NRG price recommended by oracle-->
            <max>100000000000</max>
            <!--enable/diable nrg-oracle service. if disabled, api returns default NRG price if asked for nrgPrice-->
            <oracle-enabled>false</oracle-enabled>
        </nrg-recommendation>
    </api>
    <net>
        <id>0</id>
        <nodes>
        </nodes>
        <p2p>
            <ip>0.0.0.0</ip>
            <port>30303</port>
            <discover>false</discover>
            <max-temp-nodes>128</max-temp-nodes>
            <max-active-nodes>128</max-active-nodes>
        </p2p>
    </net>
    <sync>
        <blocks-queue-max>32</blocks-queue-max>
        <show-status>false</show-status>
        <!--requires show-status=true; comma separated list of options: [all, peer_states, requests, seeds, leeches, responses, none]-->
        <show-statistics>none</show-statistics>
        <compact enabled="false" slow-import="1000" frequency="600000"></compact>
    </sync>
    <consensus>
        <mining>true</mining>
        <miner-address>0000000000000000000000000000000000000000000000000000000000000000</miner-address>
        <cpu-mine-threads>2</cpu-mine-threads>
        <extra-data>AION</extra-data>
        <nrg-strategy>
            <clamped-decay upper-bound="20000000" lower-bound="15000000"></clamped-decay>
        </nrg-strategy>
    </consensus>
    <db>
        <!--Sets the physical location on disk where data will be stored.-->
        <path>database</path>
        <!--Boolean value. Enable/disable database integrity check run at startup.-->
        <check_integrity>false</check_integrity>
        <!--Data pruning behavior for the state database. Options: FULL, TOP, SPREAD.-->
        <!--FULL: the state is not pruned-->
        <!--TOP: the state is kept only for the top K blocks; limits sync to branching only within the stored blocks-->
        <!--SPREAD: the state is kept for the top K blocks and at regular block intervals-->
        <state-storage>FULL</state-storage>
        <!--Database implementation used to store data; supported options: leveldb, h2, rocksdb.-->
        <!--Caution: changing implementation requires re-syncing from genesis!-->
        <vendor>leveldb</vendor>
        <!--Boolean value. Enable/disable database compression to trade storage space for execution time.-->
        <enable_db_compression>false</enable_db_compression>
    </db>
    <log>
        <!--Enable/Disable logback service; if disabled, output will not be logged.-->
        <log-file>true</log-file>
        <!--Sets the physical location on disk where log files will be stored.-->
        <log-path>log</log-path>
        <GEN>INFO</GEN>
        <VM>ERROR</VM>
        <API>INFO</API>
        <SYNC>INFO</SYNC>
        <DB>WARN</DB>
        <CONS>INFO</CONS>
        <P2P>INFO</P2P>
    </log>
    <tx>
        <cacheMax>256</cacheMax>
    </tx>
</aion>
```

First, enable **rpc** connection so that your dApp can talk to this node via Json RPC by changing `active="false"` to `active=true`.

If you want to talk to this node remotely, change `ip="127.0.0.1"` to `ip="0.0.0.0"`.

If you are using `minified aion web3.js` to interact with the network, update `<cors-enabled>` to `true`.

For example, if your dApp is talking to this node remotely with minified web3.js injected in your web application, your config should looks like:

```xml
 <rpc active="true" ip="0.0.0.0" port="8545">
        <cors-enabled>true</cors-enabled>
        <!--comma-separated list, APIs available: web3,net,debug,personal,eth,stratum-->
        <apis-enabled>web3,eth,personal,stratum</apis-enabled>
    </rpc>
```

Next thing you may want to update is the mining reward address. Change `<miner-address>` to your address, so it can get AION through mining the blocks.

Last thing you can custom is how verbose you want your logs to be in `<log>` section. Ranking from the least verbose to the most:`ERROR < WARN < INFO < DEBUG < Trace`.

> Note: You need to restart your kernel if you change anything in the config file.

### genesis.json

[genesis.json](https://github.com/aionnetwork/aion/wiki/Genesis-Block) defines the genesis block of your network.

Here is the default genesis file:

```json
{
  "alloc": {
    "0x0000000000000000000000000000000000000000000000000000000000000000": {
      "balance": "465934586660000000000000000"
    }
  },
  "networkBalanceAllocs": {
    "0": {
      "balance": "465934586660000000000000000"
    }
  },
  "energyLimit": "15000000",
  "nonce": "0x00",
  "difficulty": "0x0010",
  "coinbase": "0x0000000000000000000000000000000000000000000000000000000000000000",
  "timestamp": "1525924800",
  "parentHash": "0x0000000000000000000000000000000000000000000000000000000000000000",
  "chainId": "0"
}
```

Before you start the kernel for the first time, you can allocate your accounts with initial balances by add the account and the desired balance in `alloc` block. By doing so, you can have multiple accounts with sufficient balance, instead of only have one account and waiting for mining reward.

You can also reset the kernel by deleting the `database` folder for your custom network. Then restart the kernel with the new genesis file.
