# Kernel Updates

The basic process for performing a kernel update is:

1. Replace the old packages with the new ones from Github.
2. Copy `config.xml` files from old kernel folder.
3. Start the kernel.

## Packages

Follow these steps to update your kernel package:

1. Move your current kernel installation to another location. This serves as a backup in case anything goes wrong:

```bash
mv ~/aion
mv ~/older-aion-version
```

2. Download the new kernel `.tar.bz2` file and `SHA1SUMS` file from the [Aion Releases page](https://github.com/aionnetwork/aion/releases).
3. Extract the new kernel to the home `~` directory.

```bash
mkdir ~/aion
tar xvf ~/aion.tar.bz2 -C ~/aion
```

4. Start and then close (`CTRL` + `c`) the new Aion kernel. This initializes the file and folder structure of the kernel:

```bash
cd ~/aion
bash aion.sh

>                      _____
>       .'.       |  .~     ~.  |..          |
>     .'   `.     | |         | |  ``..      |
>   .''''''''`.   | |         | |      ``..  |
> .'           `. |  `._____.'  |          ``|
>
>                 v0.3.3.5874501
>                     mainnet

CTRL + c

bash aion.sh -n master

>                      _____
>       .'.       |  .~     ~.  |..          |
>     .'   `.     | |         | |  ``..      |
>   .''''''''`.   | |         | |      ``..  |
> .'           `. |  `._____.'  |          ``|
>
>                 v0.3.3.5874501
>                     mastery
```

5. Copy your old configuration files to the new kernel location:

```bash
# Mainnet
cp ~/older-aion-version/mainnet/config/config.xml ~/aion/mainnet/config/config.xml

# Testnet (Mastery)
cp ~/older-aion-version/mastery/config/config.xml ~/aion/mastery/config/config.xml
```

Next up is making some changes to your configuration files.

## Configuration Files

There may be some chanegs you need to make to your configuration files, depending on which version you are updating from and to.

### 0.3.2 to 0.3.3

If you are still running version `0.3.2` of the Java kernel, you need to follow these steps to update your `config.xml` file.

#### Nodes

You need to change the nodes for **both** Mainnet and the Testnet (Mastery).

##### Mainnet

**Add** the following lines into the `<nodes>` section:

```xml
<node>p2p://c39d0a10-20d8-49d9-97d6-284f88da5c25@13.92.157.19:30303</node>
<node>p2p://c38d2a32-20d8-49d9-97d6-284f88da5c83@40.78.84.78:30303</node>
<node>p2p://c37d6b45-20d8-49d9-97d6-284f88da5c51@104.40.182.54:30303</node>
```

**Remove** the following lines from the `<nodes>` section:

```xml
<node>p2p://c33d1066-8c7e-496c-9c4e-c89318280274@13.92.155.115:30303</node>
<node>p2p://c33d5a94-20d8-49d9-97d6-284f88da5c21@13.89.244.125:30303</node>
```

Your `<nodes>` section should look like this:

```xml
<nodes>
    <node>p2p://c33d2207-729a-4584-86f1-e19ab97cf9ce@51.144.42.220:30303</node>
    <node>p2p://c33d302f-216b-47d4-ac44-5d8181b56e7e@52.231.187.227:30303</node>
    <node>p2p://c33d4c07-6a29-4ca6-8b06-b2781ba7f9bf@191.232.164.119:30303</node>
    <node>p2p://741b979e-6a06-493a-a1f2-693cafd37083@66.207.217.190:30303</node>
    <node>p2p://c39d0a10-20d8-49d9-97d6-284f88da5c25@13.92.157.19:30303</node>
    <node>p2p://c38d2a32-20d8-49d9-97d6-284f88da5c83@40.78.84.78:30303</node>
    <node>p2p://c37d6b45-20d8-49d9-97d6-284f88da5c51@104.40.182.54:30303</node>
</nodes>
```

##### Testnet (Mastery)

**Add** the following lines into the `<nodes>` section:

```xml
<node>p2p://a30d5000-8c7e-496c-9c4e-c89318280275@104.42.186.213:30303</node>
```

**Remove** the following lines from the `<nodes>` section:

```xml
<node>p2p://a30d5000-8c7e-496c-9c4e-c89318280275@104.42.186.213:30303</node>
```

Your `<nodes>` section should look like this:

```xml
<nodes>
    <node>p2p://a30d1000-8c7e-496c-9c4e-c89318280274@168.62.170.146:30303</node>
    <node>p2p://a30d2000-729a-4584-86f1-e19ab97cf9ce@23.96.22.19:30303</node>
    <node>p2p://a30d4000-729a-4584-86f1-e19ab97cf9cq@13.90.81.122:30303</node>
    <node>p2p://a30d5000-8c7e-496c-9c4e-c89318280275@104.42.186.213:30303</node>
</nodes>
```

#### Sync

**This step is optional**. Add the following lines to the end of the `<sync>` section in **both** the Mainnet and Testnet (Mastery) config files:

```xml
<!--Trigger compact when IO time is slow. slow-import and frequency values are in milliseconds-->
<compact enabled="false" slow-import="1000" frequency="600000"></compact>
```

Your `<sync>` section should look like this:

```xml
<sync>
    <!-- Downloaded blocks queue limit. This affects memory footprint -->
    <blocks-queue-max>32</blocks-queue-max>
    <!-- Display syncing status -->
    <show-status>false</show-status>
    <!--requires show-status=true; comma separated list of options: [all, peer_states, requests, seeds, leeches, responses, none]-->
    <show-statistics>none</show-statistics>
    <!--Trigger compact when IO time is slow. slow-import and frequency values are in milliseconds-->
    <compact enabled="false" slow-import="1000" frequency="600000"></compact>
</sync>
```

#### Database

**This step is optional**. Change the `check_integrity` value from `true` to `false`. You can do this for **both** the Mainnet and Testnet (Mastery) config files:

```xml
<check_integrity>false</check_integrity>
```

Your `<db>` section should look like this:

```xml
<db>
    <!--Sets the physical location on disk where data will be stored.-->
    <path>database</path>
    <!--Boolean value. Enable/disable database integrity check run at startup.-->
    <check_integrity>true</check_integrity>
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
```

### 0.3.2.1 to 0.3.3

Version `0.3.2.1` was an optional update. If you are running this version, you do not need to make any changes to the `<nodes>` section. You still have to make some `<sync>` changes. Do this for **both** your Mainnet and Testet (Mastery) configs.

Add the following lines to the end of the `<sync>` section:

```xml
<!--Trigger compact when IO time is slow. slow-import and frequency values are in milliseconds-->
<compact enabled="false" slow-import="1000" frequency="600000"></compact>
```

Your `<sync>` section should look like this:

```xml
<sync>
    <!-- Downloaded blocks queue limit. This affects memory footprint -->
    <blocks-queue-max>32</blocks-queue-max>
    <!-- Display syncing status -->
    <show-status>false</show-status>
    <!--requires show-status=true; comma separated list of options: [all, peer_states, requests, seeds, leeches, responses, none]-->
    <show-statistics>none</show-statistics>
    <!--Trigger compact when IO time is slow. slow-import and frequency values are in milliseconds-->
    <compact enabled="false" slow-import="1000" frequency="600000"></compact>
</sync>
```

### Example Config Files

#### Mainnet Configuration File

Here is an example `0.3.3` Mainnet configuration file:

```xml
<?xml version="1.0" encoding="utf-8"?>
<aion>
    <mode>aion</mode>
    <id>8c821833-0203-4968-9a71-778d5262cc71</id>
    <api>
        <!--rpc config docs: https://github.com/aionnetwork/aion/wiki/JSON-RPC-API-Docs-->
        <rpc active="false" ip="127.0.0.1" port="8545">
            <cors-enabled>false</cors-enabled>
            <!--comma-separated list, APIs available: web3,net,debug,personal,eth,stratum-->
            <apis-enabled>web3,eth,personal,stratum,ops</apis-enabled>
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
        <id>256</id>
        <nodes>
            <node>p2p://c33d2207-729a-4584-86f1-e19ab97cf9ce@51.144.42.220:30303</node>
            <node>p2p://c33d302f-216b-47d4-ac44-5d8181b56e7e@52.231.187.227:30303</node>
            <node>p2p://c33d4c07-6a29-4ca6-8b06-b2781ba7f9bf@191.232.164.119:30303</node>
            <node>p2p://741b979e-6a06-493a-a1f2-693cafd37083@66.207.217.190:30303</node>
            <node>p2p://c39d0a10-20d8-49d9-97d6-284f88da5c25@13.92.157.19:30303</node>
            <node>p2p://c38d2a32-20d8-49d9-97d6-284f88da5c83@40.78.84.78:30303</node>
            <node>p2p://c37d6b45-20d8-49d9-97d6-284f88da5c51@104.40.182.54:30303</node>
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
    </sync>
    <consensus>
        <mining>false</mining>
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
        <check_integrity>true</check_integrity>
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
        <ROOT>WARN</ROOT>
        <VM>ERROR</VM>
        <GUI>INFO</GUI>
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

#### Testnet (Mastery) Configuration File

Here is an example `0.3.3` Testnet (Mastery) configuration file:

```xml
<?xml version="1.0" encoding="utf-8"?>
<aion>
    <mode>aion</mode>
    <id>131c10d8-b31d-4b93-a839-a18e69e8dc6a</id>
    <api>
        <!--rpc config docs: https://github.com/aionnetwork/aion/wiki/JSON-RPC-API-Docs-->
        <rpc active="true" ip="127.0.0.1" port="8545">
            <cors-enabled>false</cors-enabled>
            <!--comma-separated list, APIs available: web3,net,debug,personal,eth,stratum-->
            <apis-enabled>web3,eth,personal,stratum,ops</apis-enabled>
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
        <id>32</id>
        <nodes>
            <node>p2p://a30d1000-8c7e-496c-9c4e-c89318280274@168.62.170.146:30303</node>
            <node>p2p://a30d2000-729a-4584-86f1-e19ab97cf9ce@23.96.22.19:30303</node>
            <node>p2p://a30d5000-8c7e-496c-9c4e-c89318280275@104.42.186.213:30303</node>
            <node>p2p://a30d4000-729a-4584-86f1-e19ab97cf9cq@13.90.81.122:30303</node>
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
    </sync>
    <consensus>
        <mining>true</mining>
        <miner-address>a08fc457b39b03c30dc71bdb89a4d0409dd4fa42f6539a5c3ee4054af9b71f23</miner-address>
        <cpu-mine-threads>1</cpu-mine-threads>
        <extra-data>AION</extra-data>
        <nrg-strategy>
            <clamped-decay upper-bound="20000000" lower-bound="15000000"></clamped-decay>
        </nrg-strategy>
    </consensus>
    <db>
        <!--Sets the physical location on disk where data will be stored.-->
        <path>database</path>
        <!--Boolean value. Enable/disable database integrity check run at startup.-->
        <check_integrity>true</check_integrity>
        <!--Data pruning behavior for the state database. Options: FULL, TOP, SPREAD.-->
        <!--FULL: the state is not pruned-->
        <!--TOP: the state is kept only for the top K blocks; limits sync to branching only within the stored blocks-->
        <!--SPREAD: the state is kept for the top K blocks and at regular block intervals-->
        <state-storage>FULL</state-storage>
        <!--Database implementation used to store data; supported options: leveldb, h2, rocksdb.-->
        <!--Caution: changing implementation requires re-syncing from genesis!-->
        <vendor>leveldb</vendor>
        <!--Boolean value. Enable/disable database compression to trade storage space for execution time.-->
        <enable_db_compression>true</enable_db_compression>
    </db>
    <log>
        <!--Enable/Disable logback service; if disabled, output will not be logged.-->
        <log-file>true</log-file>
        <!--Sets the physical location on disk where log files will be stored.-->
        <log-path>log</log-path>
        <GEN>INFO</GEN>
        <ROOT>WARN</ROOT>
        <VM>ERROR</VM>
        <GUI>INFO</GUI>
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