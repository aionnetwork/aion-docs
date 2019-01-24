# CMD & Config
Parameter prioritization at startup： CMD > config > default  
## CMD
**Table of CMD contents**  
> [SUBCMD](#subcmd)  
>
>> [daemon](#daemon)  
>>
>>> [daemon pid file](#daemon-pid-file)  
>>>
>> [account](#account)  
>>
>>> [account new](#account-new)  
>>>
>>> [account list](#account-list)  
>>>
>>> [account import](#account-import)  
>>>
>>>> [account import path](#account-import-path)  
>>>>
>>> [account import by key](#account-import-by-key)  
>>>
>>>> [account private key](#account-private-key)  
>>>>
>>> [account export to key](#account-export-to-key)  
>>>
>>>> [account address](#account-address)  
>>>>
>> [import](#import)  
>>
>>> [import format](#import-format)  
>>>
>>> [import file](#import-file)  
>>>
>> [export](#export)  
>>
>>> [export blocks format](#export-blocks-format)  
>>>
>>> [export blocks from](#export-blocks-from)  
>>>
>>> [export blocks to](#export-blocks-to)  
>>>
>>> [export blocks file](#export-blocks-file)  
>>>
>> [revert](#revert)  
>>
>>> [revert blocks to](#revert-blocks-to)  
>>>
>> [db](#db)  
>>
>>> [db kill](#db-kill)  
>>>
> [OPTIONS](#options)  
>
>> [Operating Options](#operating-options)  
>>
>>> [chain](#chain)  
>>>
>>> [keys path](#keys-path)  
>>>
>>> [base path](#base-path)  
>>>
>>> [db path](#db-path)  
>>>
>> [Miscellaneous Options](#miscellaneous-options)  
>>
>>> [help](#help)  
>>>
>>> [full help](#full-help)  
>>>
>>> [version](#version)  
>>>
>>> [no config](#no-config)  
>>>
>>> [default config](#default-config)  
>>>
>>> [no seal check](#no-seal-check)  
>>>
>>> [config](#config)  
>>>
>> [Account Options](#account-options)  
>>
>>> [fast unlock](#fast-unlock)  
>>>
>>> [keys iterations](#keys-iterations)  
>>>
>>> [refresh time](#refresh-time)  
>>>
>>> [unlock](#unlock)  
>>>
>>> [password](#password)  
>>>
>> [Network Options](#network-options)  
>>
>>> [sync from boot nodes only](#sync-from-boot-nodes-only)  
>>>
>>> [max peers](#max-peers)  
>>>
>>> [net id](#net-id)  
>>>
>>> [local node](#local-node)  
>>>
>>> [boot nodes](#boot-nodes)  
>>>
>>> [ip black list](#ip-black-list)  
>>>
>> [RPC Options](#rpc-options)  
>>
>>> [rpc processing threads](#rpc-processing-threads)  
>>>
>> [Http Options](#http-options)  
>>
>>> [no http](#no-http)  
>>>
>>> [http port](#http-port)  
>>>
>>> [http interface](#http-interface)  
>>>
>>> [http apis](#http-apis)  
>>>
>>> [http hosts](#http-hosts)  
>>>
>>> [http cors](#http-cors)  
>>>
>>> [http server threads](#http-server-threads)  
>>>
>> [WebSockets Options](#websockets-options)  
>>
>>> [no ws](#no-ws)  
>>>
>>> [ws port](#ws-port)  
>>>
>>> [ws interface](#ws-interface)  
>>>
>>> [ws apis](#ws-apis)  
>>>
>>> [ws origins](#ws-origins)  
>>>
>>> [ws hosts](#ws-hosts)  
>>>
>>> [ws max connections](#ws-max-connections)  
>>>
>> [IPC Options](#ipc-options)  
>>
>>> [no ipc](#no-ipc)  
>>>
>>> [ipc path](#ipc-path)  
>>>
>>> [ipc apis](#ipc-apis)  
>>>
>> [Wallet Options](#wallet-options)  
>>
>>> [enable wallet](#enable-wallet)  
>>>
>>> [secure connect](#secure-connect)  
>>>
>>> [wallet interface](#wallet-interface)  
>>>
>>> [wallet port](#wallet-port)  
>>>
>>> [zmq key path](#zmq-key-path)  
>>>
>> [Stratum Options](#stratum-options)  
>>
>>> [no stratum](#no-stratum)  
>>>
>>> [stratum interface](#stratum-interface)  
>>>
>>> [stratum port](#stratum-port)  
>>>
>>> [stratum secret](#stratum-secret)  
>>>
>> [Sealing/Mining Options](#sealing/mining-options)  
>>
>>> [force sealing](#force-sealing)  
>>>
>>> [remove solved](#remove-solved)  
>>>
>>> [infinite pending block](#infinite-pending-block)  
>>>
>>> [dynamic gas price](#dynamic-gas-price)  
>>>
>>> [reseal on txs](#reseal-on-txs)  
>>>
>>> [reseal min period](#reseal-min-period)  
>>>
>>> [reseal max period](#reseal-max-period)  
>>>
>>> [work queue size](#work-queue-size)  
>>>
>>> [relay set](#relay-set)  
>>>
>>> [gas floor target](#gas-floor-target)  
>>>
>>> [gas cap](#gas-cap)  
>>>
>>> [tx queue mem limit](#tx-queue-mem-limit)  
>>>
>>> [tx queue strategy](#tx-queue-strategy)  
>>>
>>> [tx queue ban count](#tx-queue-ban-count)  
>>>
>>> [tx queue ban time](#tx-queue-ban-time)  
>>>
>>> [min gas price](#min-gas-price)  
>>>
>>> [max gas price](#max-gas-price)  
>>>
>>> [local max gas price](#local-max-gas-price)  
>>>
>>> [blk price window](#blk-price-window)  
>>>
>>> [max blk traverse](#max-blk-traverse)  
>>>
>>> [gas price percentile](#gas-price-percentile)  
>>>
>>> [author](#author)  
>>>
>>> [tx gas limit](#tx-gas-limit)  
>>>
>>> [tx time limit](#tx-time-limit)  
>>>
>>> [extra data](#extra-data)  
>>>
>> [Database Options](#database-options)  
>>
>>> [no persistent txqueue](#no-persistent-txqueue)  
>>>
>>> [disable wal](#disable-wal)  
>>>
>>> [scale verifiers](#scale-verifiers)  
>>>
>>> [pruning](#pruning)  
>>>
>>> [pruning history](#pruning-history)  
>>>
>>> [pruning memory](#pruning-memory)  
>>>
>>> [cache size blocks](#cache-size-blocks)  
>>>
>>> [cache size queue](#cache-size-queue)  
>>>
>>> [cache size state](#cache-size-state)  
>>>
>>> [db compaction](#db-compaction)  
>>>
>>> [fat db](#fat-db)  
>>>
>>> [cache size](#cache-size)  
>>>
>>> [num verifiers](#num-verifiers)  
>>>
>> [Log Options](#log-options)  
>>
>>> [no color](#no-color)  
>>>
>>> [log level](#log-level)  
>>>
>>> [log targets](#log-targets)  
>>>
>>> [log file](#log-file)  
>>>

## Config
### Location
Default config file path is `$HOME/.aion/config.toml` .  
You can create and fill parameters you want in it.  
### Generation
If `$HOME/.aion/config.toml` doesn't exist when start aion, it will automatically generate a default config file on the default config file path.  
You can also use `$ ./aion --default-config` to create a new default config as `$HOME/.aion/default_config.toml`  
It will list all parameters with default value .  
Note that parameters which default value is None will be presented as comments.  
### Designation
You can use `$ ./aion --default-config="YOUR_CONFIG_PATH"` to start aion with the config file you specified.  
### Disable
You can use `$ ./aion --no-config` to start aion without config file.

**Table of config contents**  
> [aion](#operating-options)  
>
>> [chain](#chain)  
>>
>> [keys_path](#keys-path)  
>>
>> [base_path](#base-path)  
>>
>> [db_path](#db-path)  
>>
> [account](#account-options)  
>
>> [fast_unlock](#fast-unlock)  
>>
>> [keys_iterations](#keys-iterations)  
>>
>> [refresh_time](#refresh-time)  
>>
>> [unlock](#unlock)  
>>
>> [password](#password)  
>>
> [network](#network-options)  
>
>> [sync_from_boot_nodes_only](#sync-from-boot-nodes-only)  
>>
>> [max_peers](#max-peers)  
>>
>> [net_id](#net-id)  
>>
>> [local_node](#local-node)  
>>
>> [boot_nodes](#boot-nodes)  
>>
>> [ip_black_list](#ip-black-list)  
>>
> [rpc](#rpc-options)  
>
>> [processing_threads](#rpc-processing-threads)  
>>
> [http](#http-options)
>
>> [disable](#no-http)  
>>
>> [port](#http-port)  
>>
>> [interface](#http-interface)  
>>
>> [apis](#http-apis)  
>>
>> [hosts](#http-hosts)  
>>
>> [cors](#http-cors)  
>>
>> [server_threads](#http-server-threads)  
>>
> [websockets](#websockets-options)  
>
>> [disable](#no-ws)  
>>
>> [port](#ws-port)  
>>
>> [interface](#ws-interface)  
>>
>> [apis](#ws-apis)  
>>
>> [origins](#ws-origins)  
>>
>> [hosts](#ws-hosts)  
>>
>> [max_connections](#ws-max-connections)  
>>
> [ipc](#ipc-options)  
>
>> [disable](#no-ipc)  
>>
>> [path](#ipc-path)  
>>
>> [apis](#ipc-apis)  
>>
> [wallet](#wallet-options)  
>
>> [disable](#enable-wallet)  
>>
>> [secure_connect](#secure-connect)  
>>
>> [interface](#wallet-interface)  
>>
>> [port](#wallet-port)  
>>
>> [zmq_key_path](#zmq-key-path)  
>>
> [stratum](#stratum-options)  
>
>> [disable](#no-stratum)  
>>
>> [interface](#stratum-interface)  
>>
>> [port](#stratum-port)  
>>
>> [secret](#stratum-secret)  
>>
> [mining](#sealing/mining-options)  
>
>> [force_sealing](#force-sealing)  
>>
>> [remove_solved](#remove-solved)  
>>
>> [infinite_pending_block](#infinite-pending-block)  
>>
>> [dynamic_gas_price](#dynamic-gas-price)  
>>
>> [reseal_on_txs](#reseal-on-txs)  
>>
>> [reseal_min_period](#reseal-min-period)  
>>
>> [reseal_max_period](#reseal-max-period)  
>>
>> [work_queue_size](#work-queue-size)  
>>
>> [relay_set](#relay-set)  
>>
>> [gas_floor_target](#gas-floor-target)  
>>
>> [gas_cap](#gas-cap)  
>>
>> [tx_queue_mem_limit](#tx-queue-mem-limit)  
>>
>> [tx_queue_strategy](#tx-queue-strategy)  
>>
>> [tx_queue_ban_count](#tx-queue-ban-count)  
>>
>> [tx_queue_ban_time](#tx-queue-ban-time)  
>>
>> [min_gas_price](#min-gas-price)  
>>
>> [max_gas_price](#max-gas-price)  
>>
>> [local_max_gas_price](#local-max-gas-price)  
>>
>> [blk_price_window](#blk-price-window)  
>>
>> [max_blk_traverse](#max-blk-traverse)  
>>
>> [gas_price_percentile](#gas-price-percentile)  
>>
>> [author](#author)  
>>
>> [tx_gas_limit](#tx-gas-limit)  
>>
>> [tx_time_limit](#tx-time-limit)  
>>
>> [extra_data](#extra-data)  
>>
> [db](#database-options)  
>
>> [no_persistent_txqueue](#no-persistent-txqueue)  
>>
>> [disable_wal](#disable-wal)  
>>
>> [scale_verifiers](#scale-verifiers)  
>>
>> [pruning](#pruning)  
>>
>> [pruning_history](#pruning-history)  
>>
>> [pruning_memory](#pruning-memory)  
>>
>> [cache_size_blocks](#cache-size-blocks)  
>>
>> [cache_size_queue](#cache-size-queue)  
>>
>> [cache_size_state](#cache-size-state)  
>>
>> [db_compaction](#db-compaction)  
>>
>> [fat_db](#fat-db)  
>>
>> [cache_size](#cache-size)  
>>
>> [num_verifiers](#num-verifiers)  
>>
> [log](#log-options)  
>
>> [no_color](#no-color)  
>>
>> [level](#log-level)  
>>
>> [targets](#log-targets)  
>>
>> [log_file](#log-file)  
>>

## SUBCMD  
### daemon  
Use Aion as a daemon
```
$ aion daemon
```
#### daemon pid file  
```
$ aion daemon <PID-FILE>
```

Path to the pid file  
**This argument must be included when running this subcommand.**  
### account  
Manage accounts
```
$ aion account
```
#### account new  
Create a new account
```
$ aion account new
```
#### account list  
List existing accounts
```
$ aion account list
```
#### account import  
Import account
```
$ aion account import
```
##### account import path  
```
$ aion account import <PATH>...
```

Path to the accounts  
**This argument must be included when running this subcommand.**  
**This argument can have multiple.**  
#### account import by key  
Import account by private key
```
$ aion account import by key
```
##### account private key  
```
$ aion account import by key <key>
```

account private key  
**This argument must be included when running this subcommand.**  
#### account export to key  
Export account to private key
```
$ aion account export to key
```
##### account address  
```
$ aion account export to key <address>
```

account address  
**This argument must be included when running this subcommand.**  
### import  
Import blockchain
```
$ aion import
```
#### import format  
```
$ aion import --format=[FORMAT]
```
* e.g.:`--format=hex ` 

Import in a given format. FORMAT must be either 'hex' or 'binary'. (default: auto)  
#### import file  
```
$ aion import <FILE>
```

Path to the file to import from  
**This argument must be included when running this subcommand.**  
### export  
Export blockchain
```
$ aion export
```
#### export blocks format  
```
$ aion export --format=[FORMAT]
```
* e.g.:`--format=hex ` 

Export in a given format. FORMAT must be either 'hex' or 'binary'. (default: binary)  
#### export blocks from  
```
$ aion export --from=[BLOCK]
```
* e.g.:`--from=1 ` 

Export from block BLOCK, which may be an index or hash.  
*default: "1"*  
#### export blocks to  
```
$ aion export --to=[BLOCK]
```
* e.g.:`--to=latest ` 

Export to (including) block BLOCK, which may be an index, hash or latest.  
*default: "latest"*  
#### export blocks file  
```
$ aion export [FILE]
```

Path to the exported file  
### revert  
Revert blockchain
```
$ aion revert
```
#### revert blocks to  
```
$ aion revert --to=[BLOCK]
```
* e.g.:`--to=0 ` 

Revert Database to (including) block BLOCK, which may be an index, hash.  
*default: "0"*  
### db  
Manage the database representing the state of the blockchain on this system
```
$ aion db
```
#### db kill  
Clean the database
```
$ aion db kill
```
## OPTIONS  
### Operating Options  
>**config:**  
>```
>[aion]
>```

#### chain  
```
$ aion --chain=[CHAIN]
```
* e.g.:`--chain=mainnet ` 

Specify the blockchain type. CHAIN may be a JSON chain specification file.  
*default: "mainnet"*  
>**config:**  
>```
>[aion]
>chain = "mainnet"
>```

#### keys path  
```
$ aion --keys-path=[PATH]
```
* e.g.:`--keys-path=.aion/keys` 

Specify the path for JSON key files to be found  
>**config:**  
>```
>[aion]
>#keys_path = None
>```
>* e.g.:`keys_path =".aion/keys"` 

#### base path  
```
$ aion -d/--base-path=[PATH]
```
* e.g.:`-d/--base-path="/root/.aion" ` 

Specify the base data storage path.  
>**config:**  
>```
>[aion]
>#base_path = None
>```
>* e.g.:`base_path = "/root/.aion"` 

#### db path  
```
$ aion --db-path=[PATH]
```
* e.g.:`--db-path=/root/.aion/db ` 

Specify the database directory path  
>**config:**  
>```
>[aion]
>#db_path = None
>```
>* e.g.:`db_path ="/root/.aion/db"` 


### Miscellaneous Options  
#### help  
```
$ aion -h/--help
```
Show help information.  
#### full help  
```
$ aion --full-help
```
Show full help information.  
#### version  
```
$ aion -v, --version
```
Show information about version.  
#### no config  
```
$ aion --no-config
```
Don't load a configuration file.  
#### default config  
```
$ aion --default-config
```
Print DEFAULT configuration to $HOME/.aion/default_config.toml.  
#### no seal check  
```
$ aion --no-seal-check
```
Skip block seal check. Used to make import and export blocks faster, if checking seal is not necessary.  
#### config  
```
$ aion -c/--config=[CONFIG]
```
* e.g.:`-c/--config=$HOME/.aion/config.toml ` 

Specify a configuration. CONFIG may be a configuration file .  
*default: "$HOME/.aion/config.toml"*  

### Account Options  
>**config:**  
>```
>[account]
>```

#### fast unlock  
```
$ aion --fast-unlock
```
Use drastically faster unlocking mode. This setting causes raw secrets to be stored unprotected in memory, so use with care.  
>**config:**  
>```
>[account]
>fast_unlock = false
>```

#### keys iterations  
```
$ aion --keys-iterations=[NUM]
```
* e.g.:`--keys-iterations=10240 ` 

Specify the number of iterations to use when deriving key from the password (bigger is more secure)  
*default: 10240*  
>**config:**  
>```
>[account]
>keys_iterations = 10240
>```

#### refresh time  
```
$ aion --accounts-refresh=[TIME]
```
* e.g.:`--accounts-refresh=5 ` 

Specify the cache time of accounts read from disk. If you manage thousands of accounts set this to 0 to disable refresh.  
*default: 5*  
>**config:**  
>```
>[account]
>refresh_time = 5
>```

#### unlock  
```
$ aion --unlock=[ACCOUNTS]...
```

Unlock ACCOUNTS for the duration of the execution. ACCOUNTS is a comma-delimited list of addresses.  
**This argument can have multiple .**  
*default: []*  
>**config:**  
>```
>[account]
>unlock = []
>```
>* e.g.:`unlock =["a05a27f0c1ea16ed4433c9efc86ac08effbf2cd4530d08a2b35393b05e489df5","a064f2fbf5d703733d723ba5f08109d96196467331d5b4568835a634e81c5715"]` 

#### password  
```
$ aion --password=[FILE]...
```
* e.g.:`--password="/root/password" ` 

Provide a list of files containing passwords for unlocking accounts. Leading and trailing whitespace is trimmed.  
**This argument can have multiple.**  
*default: []*  
>**config:**  
>```
>[account]
>password = []
>```
>* e.g.:`password = "/root/password"` 


### Network Options  
>**config:**  
>```
>[network]
>```

#### sync from boot nodes only  
```
$ aion --sync-boot-nodes-only
```
Indicates if only sync from bootnodes.  
>**config:**  
>```
>[network]
>sync_from_boot_nodes_only = false
>```

#### max peers  
```
$ aion --max-peers=[NUM]
```
* e.g.:`--max-peers=64 ` 

Allow up to NUM peers.  
*default: 64*  
>**config:**  
>```
>[network]
>max_peers = 64
>```

#### net id  
```
$ aion --net-id=[INDEX]
```
* e.g.:`--net-id=256 ` 

Override the network identifier from the chain we are on.  
*default: 256*  
>**config:**  
>```
>[network]
>net_id = 256
>```

#### local node  
```
$ aion --local-node=[NODE]
```
* e.g.:`--local-node=p2p://00000000-0000-0000-0000-000000000000@0.0.0.0:30303 ` 

Override the local node. NODE should be a p2p node.  
*default: "p2p://00000000-0000-0000-0000-000000000000@0.0.0.0:30303"*  
>**config:**  
>```
>[network]
>local_node = "p2p://00000000-0000-0000-0000-000000000000@0.0.0.0:30303"
>```

#### boot nodes  
```
$ aion --boot-nodes=[NODES]...
```
* e.g.:`--boot-nodes=p2p://c33d1066-8c7e-496c-9c4e-c89318280274@13.92.155.115:30303 ` 

Override the boot nodes from our chain. NODES should be p2p nodes.  
**This argument can have multiple.**  
*default: [  
    "p2p://c33d1066-8c7e-496c-9c4e-c89318280274@13.92.155.115:30303",  
    "p2p://c33d2207-729a-4584-86f1-e19ab97cf9ce@51.144.42.220:30303",  
    "p2p://c33d302f-216b-47d4-ac44-5d8181b56e7e@52.231.187.227:30303",  
    "p2p://c33d4c07-6a29-4ca6-8b06-b2781ba7f9bf@191.232.164.119:30303",  
    "p2p://c33d5a94-20d8-49d9-97d6-284f88da5c21@13.89.244.125:30303",  
    "p2p://741b979e-6a06-493a-a1f2-693cafd37083@66.207.217.190:30303"  
]*  
>**config:**  
>```
>[network]
>boot_nodes = ["p2p://c33d1066-8c7e-496c-9c4e-c89318280274@13.92.155.115:30303", "p2p://c33d2207-729a-4584-86f1-e19ab97cf9ce@51.144.42.220:30303", "p2p://c33d302f-216b-47d4-ac44-5d8181b56e7e@52.231.187.227:30303", "p2p://c33d4c07-6a29-4ca6-8b06-b2781ba7f9bf@191.232.164.119:30303", "p2p://c33d5a94-20d8-49d9-97d6-284f88da5c21@13.89.244.125:30303", "p2p://741b979e-6a06-493a-a1f2-693cafd37083@66.207.217.190:30303"]
>```

#### ip black list  
```
$ aion --black_ip_list=[IPs]
```

IP list whose connecting requests are to be rejected.  
*default: []*  
>**config:**  
>```
>[network]
>ip_black_list = []
>```
>* e.g.:`ip_black_list = ["1.2.3.4","2.3.4.5"]` 


### Rpc Options  
>**config:**  
>```
>[rpc]
>```

#### rpc processing threads  
```
$ aion --rpc--processing-threads=[NUM]
```

Turn on additional processing threads for JSON-RPC servers (for all severs i.e for websocket and ipc). Setting this to a non-zero value allows parallel execution of cpu-heavy queries.  
>**config:**  
>```
>[rpc]
>#processing_threads = None
>```
>* e.g.:`processing_threads = 5` 


### Http Options  
>**config:**  
>```
>[http]
>```

#### no http  
```
$ aion --no-http
```
Disable the Http API server.  
>**config:**  
>```
>[http]
>disable = false
>```

#### http port  
```
$ aion --http-port=[PORT]
```
* e.g.:`--http-port=8545 ` 

Specify the port portion of the HTTP API server.  
*default: 8545*  
>**config:**  
>```
>[http]
>port = 8545
>```

#### http interface  
```
$ aion --http-interface=[IP]
```
* e.g.:`--http-interface=local ` 

Specify the hostname portion of the HTTP API server, IP should be an interface's IP address, or all (all interfaces) or local. all means 0.0.0.0 , local means 127.0.0.1 .  
*default: "local"*  
>**config:**  
>```
>[http]
>interface = "local"
>```

#### http apis  
```
$ aion --http-apis=[APIS]...
```
* e.g.:`--http-apis=all ` 

Specify the APIs available through the HTTP interface. APIS is a comma-delimited list of API name. Possible name are all, web3, eth, stratum, net, personal, rpc. You can also disable a specific API by putting '-' in the front: all,-personal.NOTE that HTTP doesn’t support pubsub  
**This argument can have multiple .**  
*default: [
    "all",
    "-pubsub"
]*  
>**config:**  
>```
>[http]
>apis = ["all", "-pubsub"]
>```

#### http hosts  
```
$ aion --http-hosts=[HOSTS]...
```
* e.g.:`--http-hosts=none ` 

List of allowed Host header values. This option will validate the Host header sent by the browser, it is additional security against some attack vectors. Special options: "all", "none",.  
**This argument can have multiple .**  
*default: [
    "none"
]*  
>**config:**  
>```
>[http]
>hosts = ["none"]
>```

#### http cors  
```
$ aion --http-cors=[URL]...
```
* e.g.:`--http-cors=none ` 

Specify CORS header for HTTP JSON-RPC API responses. Special options: "all", "none".  
**This argument can have multiple .**  
*default: [
    "none"
]*  
>**config:**  
>```
>[http]
>cors = ["none"]
>```

#### http server threads  
```
$ aion --http-server-threads=[NUM]
```

Enables multiple threads handling incoming connections for HTTP JSON-RPC server.  
>**config:**  
>```
>[http]
>#server_threads = None
>```
>* e.g.:`server_threads = 3` 

### WebSockets Options  
>**config:**  
>```
>[websockets]
>```

#### no ws  
```
$ aion --no-ws
```
Disable the WebSockets server.  
>**config:**  
>```
>[websockets]
>disable = false
>```

#### ws port  
```
$ aion --ws-port=[PORT]
```
* e.g.:`--ws-port=8546 ` 

Specify the port portion of the WebSockets server.  
*default: 8546*  
>**config:**  
>```
>[websockets]
>port = 8546
>```

#### ws interface  
```
$ aion --ws-interface=[IP]
```
* e.g.:`--ws-interface=local ` 

Specify the hostname portion of the WebSockets server, IP should be an interface's IP address, or all (all interfaces) or local. all means 0.0.0.0 , local means 127.0.0.1 .  
*default: "local"*  
>**config:**  
>```
>[websockets]
>interface = "local"
>```

#### ws apis  
```
$ aion --ws-apis=[APIS]...
```
* e.g.:`--ws-apis=all ` 

Specify the APIs available through the WebSockets interface. APIS is a comma-delimited list of API name. Possible name are web3, eth, stratum, net, personal, rpc, pubsub.  
**This argument can have multiple .**  
*default: [
    "all",
    "-pubsub"
]*  
>**config:**  
>```
>[websockets]
>apis = ["all", "-pubsub"]
>```

#### ws origins  
```
$ aion --ws-origins=[URL]...
```
* e.g.:`--ws-origins=none ` 

Specify Origin header values allowed to connect. Special options: "all", "none".  
**This argument can have multiple.**  
*default: [
    "none"
]*  
>**config:**  
>```
>[websockets]
>origins = ["none"]
>```

#### ws hosts  
```
$ aion --ws-hosts=[HOSTS]...
```
* e.g.:`--ws-hosts=none ` 

List of allowed Host header values. This option will validate the Host header sent by the browser, it is additional security against some attack vectors. Special options: "all", "none".  
**This argument can have multiple.**  
*default: [
    "none"
]*  
>**config:**  
>```
>[websockets]
>hosts = ["none"]
>```

#### ws max connections  
```
$ aion --ws-max-connections=[CONN]
```
* e.g.:`--ws-max-connections=100 ` 

Maximum number of allowed concurrent WebSockets JSON-RPC connections.  
*default: 100*  
>**config:**  
>```
>[websockets]
>max_connections = 100
>```


### IPC Options  
>**config:**  
>```
>[ipc]
>```

#### no ipc  
```
$ aion --no-ipc
```
Disable JSON-RPC over IPC service.  
>**config:**  
>```
>[ipc]
>disable = false
>```

#### ipc path  
```
$ aion --ipc-path=[PATH]
```
* e.g.:`--ipc-path=$BASE/jsonrpc.ipc ` 

Specify custom path for JSON-RPC over IPC service.  
*default: "$BASE/jsonrpc.ipc"*  
>**config:**  
>```
>[ipc]
>path = "$BASE/jsonrpc.ipc"
>```

#### ipc apis  
```
$ aion --ipc-apis=[APIS]...
```
* e.g.:`--ipc-apis=all ` 

Specify custom API set available via JSON-RPC over IPC. Possible name are web3, eth, stratum, net, personal, rpc, pubsub.  
**This argument can have multiple.**  
*default: [
    "all",
    "-pubsub"
]*  
>**config:**  
>```
>[ipc]
>apis = ["all", "-pubsub"]
>```


### Wallet Options  
>**config:**  
>```
>[wallet]
>```

#### enable wallet  
```
$ aion --enable-wallet
```
Enable Wallet API  
>**config:**  
>```
>[wallet]
>disable = false
>```

#### secure connect  
```
$ aion --secure-connect
```
Run wallet server for secure connect  
>**config:**  
>```
>[wallet]
>secure_connect = false
>```

#### wallet interface  
```
$ aion --wallet-interface=[IP]
```
* e.g.:`--wallet-interface=local ` 

Specify the hostname portion of the Wallet API server, IP should be an interface's IP address, or all (all interfaces) or local. all means 0.0.0.0 , local means 127.0.0.1 .  
*default: "local"*  
>**config:**  
>```
>[wallet]
>interface = "local"
>```

#### wallet port  
```
$ aion --wallet-port=[PORT]
```
* e.g.:`--wallet-port=8547 ` 

Specify the port portion of the Wallet API server.  
*default: 8547*  
>**config:**  
>```
>[wallet]
>port = 8547
>```

#### zmq key path  
```
$ aion --zmq-key-path=[PATH]
```

Specify zmq key path for wallet server secure connect   
>**config:**  
>```
>[wallet]
>#zmq_key_path = None
>```
>* e.g.:`zmq_key_path = "/root/.aion/zmq"` 


### Stratum Options  
>**config:**  
>```
>[stratum]
>```

#### no stratum  
```
$ aion --no-stratum
```
Run Stratum server for miner push notification.  
>**config:**  
>```
>[stratum]
>disable = false
>```

#### stratum interface  
```
$ aion --stratum-interface=[IP]
```
* e.g.:`--stratum-interface=local ` 

Interface address for Stratum server. all means 0.0.0.0 , local means 127.0.0.1 .  
*default: "local"*  
>**config:**  
>```
>[stratum]
>interface = "local"
>```

#### stratum port  
```
$ aion --stratum-port=[PORT]
```
* e.g.:`--stratum-port=8008 ` 

Port for Stratum server to listen on.  
*default: 8008*  
>**config:**  
>```
>[stratum]
>port = 8008
>```

#### stratum secret  
```
$ aion --stratum-secret=[STRING]
```

Secret for authorizing Stratum server for peers.  
>**config:**  
>```
>[stratum]
>#secret = None
>```
>* e.g.:`secret = "9b64f3ba5f081016196467331d5b4568835a634e81c575d70352fbf9d9733d72"` 


### Sealing/Mining Options  
>**config:**  
>```
>[mining]
>```

#### force sealing  
```
$ aion --force-sealing
```
Force the node to author new blocks as if it were always sealing/mining.  
>**config:**  
>```
>[mining]
>force_sealing = false
>```

#### remove solved  
```
$ aion --remove-solved
```
Move solved blocks from the work package queue instead of cloning them. This gives a slightly faster import speed, but means that extra solutions submitted for the same work package will go unused.  
>**config:**  
>```
>[mining]
>remove_solved = false
>```

#### infinite pending block  
```
$ aion --infinite-pending-block
```
Pending block will be created with maximal possible gas limit and will execute all transactions in the queue. Note that such block is invalid and should never be attempted to be mined.  
>**config:**  
>```
>[mining]
>infinite_pending_block = false
>```

#### dynamic gas price  
```
$ aion --dynamic-gas-price
```
use dynamic gas price which adjust with --gas-price-percentile, --max-blk-traverse, --blk-price-window  
>**config:**  
>```
>[mining]
>dynamic_gas_price = false
>```

#### reseal on txs  
```
$ aion --reseal-on-txs=[SET]
```
* e.g.:`--reseal-on-txs=own ` 

Specify which transactions should force the node to reseal a block. SET is one of: none - never reseal on new transactions; own - reseal only on a new local transaction; ext - reseal only on a new external transaction; all - reseal on all new transactions.  
*default: "own"*  
>**config:**  
>```
>[mining]
>reseal_on_txs = "own"
>```

#### reseal min period  
```
$ aion --reseal-min-period=[MS]
```
* e.g.:`--reseal-min-period=4000 ` 

Specify the minimum time between reseals from incoming transactions. MS is time measured in milliseconds.  
*default: 4000*  
>**config:**  
>```
>[mining]
>reseal_min_period = 4000
>```

#### reseal max period  
```
$ aion --reseal-max-period=[MS]
```
* e.g.:`--reseal-max-period=120000 ` 

Specify the maximum time since last block to enable force-sealing. MS is time measured in milliseconds.  
*default: 120000*  
>**config:**  
>```
>[mining]
>reseal_max_period = 120000
>```

#### work queue size  
```
$ aion --work-queue-size=[ITEMS]
```
* e.g.:`--work-queue-size=20 ` 

Specify the number of historical work packages which are kept cached lest a solution is found for them later. High values take more memory but result in fewer unusable solutions.  
*default: 20*  
>**config:**  
>```
>[mining]
>work_queue_size = 20
>```

#### relay set  
```
$ aion --relay-set=[SET]
```
* e.g.:`--relay-set=cheap ` 

Set of transactions to relay. SET may be: cheap - Relay any transacticon in the queue (this may include invalid transactions); strict - Relay only executed transactions (this guarantees we don't relay invalid transactions, but means we relay nothing if not mining); lenient - Same as strict when mining, and cheap when not.  
*default: "cheap"*  
>**config:**  
>```
>[mining]
>relay_set = "cheap"
>```

#### gas floor target  
```
$ aion --gas-floor-target=[GAS]
```
* e.g.:`--gas-floor-target=15000000 ` 

Amount of gas per block to target when sealing a new block.  
*default: "15000000"*  
>**config:**  
>```
>[mining]
>gas_floor_target = "15000000"
>```

#### gas cap  
```
$ aion --gas-cap=[GAS]
```
* e.g.:`--gas-cap=20000000 ` 

A cap on how large we will raise the gas limit per block due to transaction volume.  
*default: "20000000"*  
>**config:**  
>```
>[mining]
>gas_cap = "20000000"
>```

#### tx queue mem limit  
```
$ aion --tx-queue-mem-limit=[MB]
```
* e.g.:`--tx-queue-mem-limit=2 ` 

Maximum amount of memory that can be used by the transaction queue. Setting this parameter to 0 disables limiting.  
*default: 2*  
>**config:**  
>```
>[mining]
>tx_queue_mem_limit = 2
>```

#### tx queue strategy  
```
$ aion --tx-queue-strategy=[S]
```
* e.g.:`--tx-queue-strategy=gas_price ` 

Prioritization strategy used to order transactions in the queue. S may be: gas - Prioritize txs with low gas limit; gas_price - Prioritize txs with high gas price; gas_factor - Prioritize txs using gas price and gas limit ratio.  
*default: "gas_price"*  
>**config:**  
>```
>[mining]
>tx_queue_strategy = "gas_price"
>```

#### tx queue ban count  
```
$ aion --tx-queue-ban-count=[C]
```
* e.g.:`--tx-queue-ban-count=1 ` 

Number of times maximal time for execution (--tx-time-limit) can be exceeded before banning sender/recipient/code.  
*default: 1*  
>**config:**  
>```
>[mining]
>tx_queue_ban_count = 1
>```

#### tx queue ban time  
```
$ aion --tx-queue-ban-time=[SEC]
```
* e.g.:`--tx-queue-ban-time=180 ` 

Banning time (in seconds) for offenders of specified execution time limit. Also number of offending actions have to reach the threshold within that time.  
*default: 180*  
>**config:**  
>```
>[mining]
>tx_queue_ban_time = 180
>```

#### min gas price  
```
$ aion --min-gas-price=[NUM]
```
* e.g.:`--min-gas-price=10000000000 ` 

Minimum amount of Wei per GAS to be paid for a transaction to be accepted for mining.  
*default: 10000000000*  
>**config:**  
>```
>[mining]
>min_gas_price = 10000000000
>```

#### max gas price  
```
$ aion --max-gas-price=[NUM]
```
* e.g.:`--max-gas-price=9000000000000000000 ` 

Maximum amount of Wei per GAS to be paid for a transaction to be accepted for mining.  
*default: 9000000000000000000*  
>**config:**  
>```
>[mining]
>max_gas_price = 9000000000000000000
>```

#### local max gas price  
```
$ aion --local-max-gas-price=[NUM]
```
* e.g.:`--local-max-gas-price=100000000000 ` 

Maximum amount of Wei per GAS to be set for a new local transaction to be accepted for mining when using dynamic gas price.  
*default: 100000000000*  
>**config:**  
>```
>[mining]
>local_max_gas_price = 100000000000
>```

#### blk price window  
```
$ aion --blk-price-window=[BLOCKS]
```
* e.g.:`--blk-price-window=20 ` 

Take BLOCKS blk_price in blocks which have transactions for dynamic gas price adjustment. It'll not work without --dynamic-gas-price.  
*default: 20*  
>**config:**  
>```
>[mining]
>blk_price_window = 20
>```

#### max blk traverse  
```
$ aion --max-blk-traverse=[BLOCKS]
```
* e.g.:`--max-blk-traverse=64 ` 

Maximum amount of blocks can be traversed. It'll not work without --dynamic-gas-price.  
*default: 64*  
>**config:**  
>```
>[mining]
>max_blk_traverse = 64
>```

#### gas price percentile  
```
$ aion --gas-price-percentile=[PCT]
```
* e.g.:`--gas-price-percentile=60 ` 

Set PCT percentile block price value from last blk_price_window blocks as default gas price when sending transactions. It'll not work without --dynamic-gas-price.  
*default: 60*  
>**config:**  
>```
>[mining]
>gas_price_percentile = 60
>```

#### author  
```
$ aion --author=[ADDRESS]
```
* e.g.:`--author=a064f2fbf5d703733d723ba5f08109d96196467331d5b4568835a634e81c5715 ` 

Specify the block author (aka "coinbase") address for sending block rewards from sealed blocks. NOTE: MINING WILL NOT WORK WITHOUT THIS OPTION.  
>**config:**  
>```
>[mining]
>#author = None
>```
>* e.g.:`author = "a064f2fbf5d703733d723ba5f08109d96196467331d5b4568835a634e81c5715"` 

#### tx gas limit  
```
$ aion --tx-gas-limit=[GAS]
```
* e.g.:`--tx-gas-limit=100000000000 ` 

Apply a limit of GAS as the maximum amount of gas a single transaction may have for it to be mined.  
>**config:**  
>```
>[mining]
>#tx_gas_limit = None
>```
>* e.g.:`tx_gas_limit = "100000000000"` 

#### tx time limit  
```
$ aion --tx-time-limit=[MS]
```
* e.g.:`--tx-time-limit=600 ` 

Maximal time for processing single transaction. If enabled senders/recipients/code of transactions offending the limit will be banned from being included in transaction queue for 180 seconds.  
>**config:**  
>```
>[mining]
>#tx_time_limit = None
>```
>* e.g.:`tx_time_limit = 600` 

#### extra data  
```
$ aion --extra-data=[STRING]
```
* e.g.:`--extra-data="aion" ` 

Specify a custom extra-data for authored blocks, no more than 32 characters.  
>**config:**  
>```
>[mining]
>#extra_data = None
>```
>* e.g.:`extra_data = "aion"` 


### Database Options  
>**config:**  
>```
>[db]
>```

#### no persistent txqueue  
```
$ aion --no-persistent-txqueue
```
Don't save pending local transactions to disk to be restored whenever the node restarts.  
>**config:**  
>```
>[db]
>no_persistent_txqueue = false
>```

#### disable wal  
```
$ aion --disable-wal
```
Disables DB WAL, which gives a significant speed up but means an unclean exit is unrecoverable.  
>**config:**  
>```
>[db]
>disable_wal = false
>```

#### scale verifiers  
```
$ aion --scale-verifiers
```
Automatically scale amount of verifier threads based on workload. Not guaranteed to be faster.  
>**config:**  
>```
>[db]
>scale_verifiers = false
>```

#### pruning  
```
$ aion --pruning=[METHOD]
```
* e.g.:`--pruning=archive ` 

Configure pruning of the state/storage trie. METHOD may be one of auto, archive, fast: archive - keep all state trie data. No pruning. fast - maintain journal overlay. Fast but 50MB used. auto - use the method most recently synced or default to fast if none synced.  
*default: "archive"*  
>**config:**  
>```
>[db]
>pruning = "archive"
>```

#### pruning history  
```
$ aion --pruning-history=[NUM]
```
* e.g.:`--pruning-history=64 ` 

Set a minimum number of recent states to keep when pruning is active.  
*default: 64*  
>**config:**  
>```
>[db]
>pruning_history = 64
>```

#### pruning memory  
```
$ aion --pruning-memory=[MB]
```
* e.g.:`--pruning-memory=32 ` 

The ideal amount of memory in megabytes to use to store recent states. As many states as possible will be kept within this limit, and at least --pruning-history states will always be kept.  
*default: 32*  
>**config:**  
>```
>[db]
>pruning_memory = 32
>```

#### cache size blocks  
```
$ aion --cache-size-blocks=[MB]
```
* e.g.:`--cache-size-blocks=8 ` 

Specify the prefered size of the blockchain cache in megabytes.  
*default: 8*  
>**config:**  
>```
>[db]
>cache_size_blocks = 8
>```

#### cache size queue  
```
$ aion --cache-size-queue=[MB]
```
* e.g.:`--cache-size-queue=40 ` 

Specify the maximum size of memory to use for block queue.  
*default: 40*  
>**config:**  
>```
>[db]
>cache_size_queue = 40
>```

#### cache size state  
```
$ aion --cache-size-state=[MB]
```
* e.g.:`--cache-size-state=25 ` 

Specify the maximum size of memory to use for the state cache.  
*default: 25*  
>**config:**  
>```
>[db]
>cache_size_state = 25
>```

#### db compaction  
```
$ aion --db-compaction=[TYPE]
```
* e.g.:`--db-compaction=auto ` 

Database compaction type. TYPE may be one of: ssd - suitable for SSDs and fast HDDs; hdd - suitable for slow HDDs; auto - determine automatically.  
*default: "auto"*  
>**config:**  
>```
>[db]
>db_compaction = "auto"
>```

#### fat db  
```
$ aion --fat-db=[BOOL]
```
* e.g.:`--fat-db=auto ` 

Build appropriate information to allow enumeration of all accounts and storage keys. Doubles the size of the state database. BOOL may be one of on, off or auto.  
*default: "auto"*  
>**config:**  
>```
>[db]
>fat_db = "auto"
>```

#### cache size  
```
$ aion --cache-size=[MB]
```
* e.g.:`--cache-size=64 ` 

Set total amount of discretionary memory to use for the entire system, overrides other cache and queue options.  
>**config:**  
>```
>[db]
>#cache_size = None
>```
>* e.g.:`cache_size =64` 

#### num verifiers  
```
$ aion --num-verifiers=[INT]
```
* e.g.:`--num-verifiers=5 ` 

Amount of verifier threads to use or to begin with, if verifier auto-scaling is enabled.  
>**config:**  
>```
>[db]
>#num_verifiers = None
>```
>* e.g.:`num_verifiers = 5` 


### Log Options  
>**config:**  
>```
>[log]
>```

#### no color  
```
$ aion --no-color
```
Don't use terminal color codes in output.  
>**config:**  
>```
>[log]
>no_color = false
>```

#### log level  
```
$ aion --log-level=[LEVEL]
```
* e.g.:`--log-level=info ` 

Specify all modules' log level. LEVEL may be one of: off, error, warn, info, debug, trace.  
*default: "info"*  
>**config:**  
>```
>[log]
>level = "info"
>```

#### log targets  
```
$ aion --log-targets=[LOGGINGs]...
```
* e.g.:`--log-targets=vm=trace,"sync=warn" ` 

Specify the log target you want and specify it's log level. Must conform to the same format as RUST_LOG.eq 'own_tx=debug'.  
[Targets Table](./Log-Targets)  
**This argument can have multiple.**  
*default: []*  
>**config:**  
>```
>[log]
>targets = []
>```
>* e.g.:`targets =["vm=trace","sync=warn"]` 

#### log file  
```
$ aion --log-file=[FILENAME]
```
* e.g.:`--log-file="/root/logfile" ` 

Specify a filename into which logging should be appended.  
>**config:**  
>```
>[log]
>#log_file = None
>```
>* e.g.:`log_file = "/root/logfile"` 

