---
title: User Guide
---

# Rust Kernel User Guide

This documentation relates to the rust kernel implementation and releases for the Aion Network. This is different from the Java kernel implementation.

## System Requirements

- [Ubuntu 16.04](http://releases.ubuntu.com/16.04/) or [Ubuntu 18.04](http://releases.ubuntu.com/18.04/)
- 16GB RAM
- ~40GB Hard Drive Space
  - ~24GB for Testnet
  - ~12GB for Mainnet
  - ~6GB reserved for redundancy

## Library Dependencies

The following is a list of the libraries that the Aion Rust kernel depends upon.

- g++, gcc
- libboost-all-dev: version 1.65.0
- libzmq3-dev
- libjsoncpp-dev
- python-dev
- libudev-dev
- llvm-4.0-dev

To install these dependencies, follow the steps for your version of Ubuntu.

### Ubuntu 16.04

```bash
sudo apt update
sudo apt install g++ gcc libzmq3-dev libjsoncpp-dev python-dev libudev-dev llvm-4.0-dev

# Ubuntu 16.04 repository only have libboost-1.58 while Aion Rust Kernel requires libboost-1.65.0.
# To build the correct version libboost in the system, run the following command:
sudo apt install wget lbzip2 cmake

# Get the source code libboost 1.65.1
wget https://dl.bintray.com/boostorg/release/1.65.1/source/boost_1_65_1.tar.bz2
tar xf boost_1_65_1.tar.bz2
cd boost_1_65_1

# Configure the library destination folder and install libboost 1.65.1
./bootstrap.sh --libdir=/usr/lib/x86_64-linux-gnu/
./b2
sudo ./b2 install
```

### Ubuntu 18.04

```bash
sudo apt update
sudo apt install g++ gcc libzmq3-dev libjsoncpp-dev python-dev libudev-dev libboost-all-dev llvm-4.0-dev
```

## Kernel Packages

If you want to use a pre-compiled package, download the latest kernel package from the [Github releases page](https://github.com/aionnetwork/aionr/releases). Or if you want to build the kernel from source, follow the [Build the Kernel](https://github.com/aionnetwork/aionr#build-the-kernel) instructions in the readme.

## Configuration

Settings for the Aion Rust kernel are configurable.

### Data Location

The precompiled packages found on the [Github released page](https://github.com/aionnetwork/aionr/releases) come with `toml` configuration files and _genesis_ files for the mainnet, mastery testnet, and custom networks:

```bash
<package directory>/
  ├── aion                      # the executable binary

  ├── custom                    # custom(solo) network setting directory
  │   ├── custom.json           # custom(solo) network genesis block file
  │   └── custom.toml           # custom(solo) network configuration
  ├── custom.sh                 # custom(solo) network quick launch script

  ├── mainnet                   # mainnet network setting directory
  │   ├── mainnet.json          # mainnet network genesis block file
  │   └── mainnet.toml          # mainnet network configuration
  ├── mainnet.sh                # mainnet network quick launch script

  ├── mastery                   # mastery network setting directory
  │   ├── mastery.json          # mastery network genesis block file
  │   └── mastery.toml          # mastery network configuration
  └── mastery.sh                # mastery network quick launch script
```

If the kernel is built from source and starts without any options, it will create a hidden directory at `~/.aion`. The default configuration file `config.toml` will be set to connect to the mainnet.

When the kernel is ran for the first time, it will create a hidden folder within the users home `~` directory:

```bash
.aion
├── cache   # cached data for the kernel
├── chains  # chain database
├── logs    # any logs that the kernel outputs
└── cache   # accounts for each chain
```

To relocate the base directory, edit the `config.toml` configuration file:

```toml
[aion]
base_path = "new/location/path"
```

### Peer Connection

The default config will auto assign a peer ID on the first boot, and will continue to use that ID afterwards. If you want to generate a custom ID, you can manually enter a valid peer ID into the `config.toml` file. Peer ID can be changed any point.

A peer ID looks like `00000000-0000-0000-0000-000000000000`.

```toml
[network]
#   local_node = "p2p://<PEER_ID>@<IP>:<PORT>"
#       <PEER_ID>: custom peer ID
#       <IP>: the public ip address
#       <PORT>: the port where other nodes listen on

# Default Peer ID Configuration
local_node = "p2p://00000000-0000-0000-0000-000000000000@0.0.0.0:30303"
```

If the `local_node` variable is left as the default setting, the kernel will create a random peer ID for you. You can change this at any time to a valid peer ID.

If you just want start a single node without connecting any other node, leave the `boot_nodes` field empty.

```toml
  boot_nodes = []
```

### JSON RPC Configuration

Aion Rust support JSON RPC via HTTP, Websocket and IPC.

```toml
[http]           # HTTP JSON RPC configures
disable = false # Disable HTTP JSON RPC option
port = 8545     # default port
apis = ["all"]  # possible values: all, safe, web3, eth, stratum, net, personal, rpc

[websockets]    # websocket JSON RPC configures
disable = false # Disable websocket option
port = 8546     # default port
apis = ["all"]  # possible values: all, safe, web3, eth, stratum, net, personal, rpc, pubsub

[ipc]           # ipc JSON RPC configures
disable =false  # Disable IPC option
path = "$BASE/jsonrpc.ipc" # default ipc file 
apis = ["all"]  # possible values: all, safe, web3, eth, stratum, net, personal, rpc, pubsub
```

To see the complete JSON RPC configuration options, take a look at the [Aion Rust Configuration](https://github.com/aionnetwork/aionr/wiki/CMD-&-Config#operating-options).

## Accounts

Aion Rust Kernel allows you to manage your accounts through a command line interfact.

When running commands against the kernel, use the `--config` or `--chain` options to specific why network you want to use. If you do not, the kernel will default to performing actions against the mainnet. To help speed things up, the precompiled kernel package comes with three scripts you can use to connect to a specific network:

```bash
<package directory>/
  ├── aion                      # the executable binary
  ├── custom.sh                 # custom(solo) network quick launch script
  ├── mainnet.sh                # mainnet network quick launch script
  └── mastery.sh                # mastery network quick launch script
```

These scripts can take in arguments, just like `./aion` can.

### Create Account

1. Move into the Aion package directory:

    ```bash
    cd aion
    ```

2. Use the `aion` binary to create a new account:

    ```bash
    ./aion account new
    ```

You can also supply the pre-built startup scripts with arguments:

```bash
./mastery.sh account new
```

### Import an Accounts from an Existing Aion Keystore

1. Move into the Aion package directory:

    ```bash
    cd aion
    ```

2. Import the Keystore using the `./aion` binary:

    ```bash
    ./aion account import <path/to/keystore/files>
    ```

You can also supply the pre-built startup scripts with arguments:

```bash
./mainnet.sh account import <path/to/keystore/files>
```

### Import Account from a Private Key

1. Move into the Aion package directory:

    ```bash
    cd aion
    ```

2. ad.

    ```bash
    ./aion account import-by-key 119d1575a893df1ae02bf11111...
    ```

You can also supply the pre-built startup scripts with arguments:

```bash
./custom.sh account import-by-key <private key>
```

## Launch the Rust Kernel

The binary package contains:

```bash
<package directory>/
  ├── aion                      # the executable binary 

  ├── custom                    # custom(solo) network setting directory
  │   ├── custom.json           # custom(solo) network genesis block file
  │   └── custom.toml           # custom(solo) network configuration
  ├── custom.sh                 # custom(solo) network quick launch script

  ├── mainnet                   # mainnet network setting directory
  │   ├── mainnet.json          # mainnet network genesis block file
  │   └── mainnet.toml          # mainnet network configuration
  ├── mainnet.sh                # mainnet network quick launch script

  ├── mastery                   # mastery network setting directory
  │   ├── mastery.json          # mastery network genesis block file
  │   └── mastery.toml          # mastery network configuration
  └── mastery.sh                # mastery network quick launch script
```

To run the kernel, move into the package directory and run `./aion`, supplying any options you wish to include:

```bash
cd aionr-0.1.1-20190123
./aion --version # this command will not start the kernel, but will output the current version.

> Create config file /home/john/.aion/config.toml, you can modify it if needed
> Aion:
>   version Aion(R)/v0.1.0.f9610e1/x86_64-linux-gnu/rustc-1.28.0
>   Copyright (c) 2017-2018 Aion foundation.
```

### Use a Specific Network

Switching a configuration file changes the connecting network.

#### Mainnet

There are three ways to launch the Rust kernel using the mainnet:

1. Run `./aion`. This launches the kernel with default settings and will create `config.toml` in `~/.aion`if no `config.toml` exists there already.
2. Run the pre-build launch script, found within the `.aion` folder:

    ```bash
    ./mainnet.sh
    ```
3. Run `./aion` while specifying the network as an argument:

    ```bash
    ./aion --config=mainnet/mainnet.toml
    ```

#### Testnet (Mastery)

There are two ways to lanuch the Rust kernel using the testnet (also called Mastery):

1. Run the pre-build launch script, found within the `.aion` folder:

    ```bash
    ./mastery.sh
    ```
2. Run `./aion` while specifying the testnet as an argument:

    ```bash
    ./aion --config=mastery/mastery.toml
    ```

#### Custom Network

There are two ways to lanuch the Rust kernel using a custom network:

1. Run the pre-build launch script, found within the `.aion` folder:

    ```bash
    ./custom.sh
    ```
2. Run `./aion` while specifying the testnet as an argument:

    ```bash
    ./aion --config=custom/custom.toml
    ```

### Use a Specific Chain

A chain file defines the _genesis block_ of each chain, and the data directory name:

```bash
"dataDir": "yourDirName"
```

After you launch the kernel with the chain file, the kernel will create a new data folder with the given name under the `~/.aion/chains` and `~/.aion/keys` folders:

```bash
.aion
├── cache
│   └── yourDirName
├── chains
│   └── yourDirName
└── keys
    └── yourDirName
```

To switch a chain when launching the kernel run:

```bash
./aion [--config=path/to/a/config.toml] --chain=path/to/new/chain.json
```

The `--chain` option overwrites the chain field in `config.toml`. The `--config`, `--chain` and `chain field` in the configuration file all take the absolute path and the relative path from the directory you launch the kernel from.

## Mining

Unlike the Aion Java kernel, the Aion Rust kernel does not have an internal miner. In order to allow mining connections, the Rust kernel requests an author by launching it with `--author=<AION_ACCOUNT>`. Or you can add the Aion account in the configuration file:

```toml
[mining]
author = "0xa0f055bf27aa273f89e88f6d79..."
```

Aion(Rust) Kernel only reseals the local transactions by default. To seal the transactions from other nodes, edit configuration:

```toml
[mining]
reseal_on_txs = "all"   #reseal all the transactions from both the local node and the external nodes
# OR
reseal_on_txs = "ext"   #reseal only the transactions from the external nodes
```

### Rust Kernel Miner

The Rust kernel is compatible with the `aion_miner` and `aion_pool2`. You can find them both on Github:

- [Aion Miner](https://github.com/aionnetwork/aion_miner)
- [Aion Pool2](https://github.com/aionnetwork/aion_pool2)

The default mining port for the Rust kernel is `8008`, but you can change this in the configuration file:

```toml
[stratum]
port = 8008
```

These are the mining launch options for the Rust kernel:

```bash
Options:
  -h [ --help ]                   Print help messages
  -l [ --location ] arg           Stratum server:port
  -u [ --username ] arg           Username (Aion Addess)
  -a [ --apiPort ] arg            Local port (default 0 = do not bind)
  -d [ --level ] arg              Debug print level (0 = print all, 5 = fatal 
                                  only, default: 2)
  -b [ --benchmark ] [=arg(=200)] Run in benchmark mode (default: 200 
                                  iterations)
  -t [ --threads ] arg            Number of CPU threads
  -e [ --ext ] arg                Force CPU ext (0 = SSE2, 1 = AVX, 2 = AVX2)
  --ci                            Show CUDA info
  --cv arg                        CUDA solver (0 = djeZo, 1 = tromp, default=1)
  --cd arg                        Enable mining on spec. devices
  --cb arg                        Number of blocks (per device)
  --ct arg                        Number of threads per block (per device)
```

Here is an example of the `aionminer` connecting to a  local kernel using 1 thread.

```bash
./aionminer -l 127.0.0.1:8008 -t 1
```

### Mining Pool

Launching the Rust kernel with `stratum` module enabled allows your to connect to a mining pool. Open the respective `config.toml` file and make sure the `apis` variable is set to `stratum` or `all`:

```bash
[rpc]
apis = ["stratum"]  
```