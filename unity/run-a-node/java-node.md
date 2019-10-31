---
title: Java Node
---

Follow this guide to quickly set up your own Aion Unity node and sync up with the network!

## Amity Network Reset - Oct 31st

If you are already running an old version of Amity, it is recommended to backup your keystore files (or you can create new ones for the new network later) and delete everything else. Make sure to clear your database! You can then use this guide for instructions on running a Java node.

## Native Ubuntu Install

Follow these steps to install an Aion Java node as a native Ubuntu application.

### Prerequisites

- [Ubuntu 16.04 or later](http://releases.ubuntu.com/16.04/)
- [Open JDK 11 or up](https://download.java.net/java/GA/jdk11/13/GPL/openjdk-11.0.1_linux-x64_bin.tar.gz)
- [Apache Ant 1.10](http://ant.apache.org/bindownload.cgi)
- `8GB` RAM
- `~20GB` HDD/SSD Space
- CPU with `SSE4.2` Support

### Get the Java Build

1. Download the Unity Java Kernel package [here](https://aionstorage.file.core.windows.net/aionfiles/UnityTestnet/JavaKernel/aion-v0.4.2.2230019f7-2019-10-22.tar.bz2?st=2019-10-24T12%3A43%3A13Z&se=2019-11-25T11%3A43%3A00Z&sp=rl&sv=2018-03-28&sr=f&sig=1yRIxxzu9UJPghzA6SlKyqimYzin1gX2J%2BZLzRvb%2BVM%3D):

2. If you are going to be connecting to your node over SSH, you need to copy this package to the node using [SCP](https://www.ssh.com/ssh/scp/):

```bash
scp ~/Downloads/PACKAGE_NAME USER@NODE_IP_ADDRESS:~/
```

For example:

```bash
scp ~/Downloads/aion-v1.0-rc2.69f7a8c-2019-10-31.tar.bz2 john@10.0.2.11:~/
```

3. Unzip the package:

```bash
tar xvf aion-v1.0-rc2.69f7a8c-2019-10-31.tar.bz2
```

### Start the Node

1. Navigate into the Aion kernel folder in the terminal from where you unzip the build:

```bash
cd aion/
```

2. Launch the Rust kernel on the _Amity Test Network_:

```bash
./aion.sh -n amity
```

When the kernel starts up, you should see it trying to sync with the network and importing blocks.

```bash
john@node:~/aion_java$ bash aion.sh -n amity
Warning! The linux kernel must be greater than or equal to version 4.
<Protocol name: fork0.3.2 block#: 0 updated!
<Protocol name: fork0.5.0 block#: 82200 updated!
<Protocol name: fork0.4.0 block#: 0 updated!
19-09-30 13:28:41.905 INFO  GEN  [main]:
-------------------------------- USED PATHS --------------------------------
> Logger path:   /home/john/aion_java/amity/log

...

19-09-30 13:28:41.907 INFO  GEN  [main]:
                        _____
        .'.       |  .~     ~.  |..          |
    .'   `.     | |         | |  ``..      |
    .''''''''`.   | |         | |      ``..  |
.'           `. |  `._____.'  |          ``|

            v0.4.1.a92f73b4c

                    amity

                using FVM & AVM


19-09-30 13:28:42.154 INFO  CONS [main]: Unity enabled at fork number 82200
19-09-30 13:28:42.492 INFO  GEN  [main]: loaded block <num=124503, root=905d4aa6... l=32, td=53224687071401549457037086807865>
19-09-30 13:28:42.591 INFO  GEN  [main]: <node-started endpoint=p2p://b96fff95-bf97-440c-9dc6-7686d6b8a999@0.0.0.0:30303>

...
```

3. Make sure your network is fully synced:

```bash
19-09-30 13:34:40.670 INFO  SYNC [sync-ib]: <import-status: STORED 40 blocks from node = a40104, starting with hash = 8e439c, number = 140083, txs = 0>
19-09-30 13:34:41.285 INFO  SYNC [sync-ib]: <import-status: STORED 40 blocks from node = a40404, starting with hash = 15abde, number = 139843, txs = 0>
19-09-30 13:34:42.202 INFO  P2P  [p2p-ts]:
======================================================================== p2p-status-b96fff =========================================================================
temp[  7] inbound[  0] outbound[  2] active[  5]                                         s - seed node, td - total difficulty, # - block number, bv - binary version

        s               td          #                                                             hash              ip  port     conn              bv           ci
--------------------------------------------------------------------------------------------------------------------------------------------------------------------
id:a40404 y 247491618301161535735372616176104     148338 3ba8f7d4673c6931663d55f602921208f1c562e6c2721b9403723ee683536a98  35.228.234.246 30303 outbound   0.4.1.4b316f9    636800107
id:a40104 y 247491618301161535735372616176104     148338 3ba8f7d4673c6931663d55f602921208f1c562e6c2721b9403723ee683536a98    13.82.30.156 30303 outbound   0.4.1.4b316f9    566971405

19-09-30 13:34:42.498 INFO  SYNC [sync-ib]: <import-status: STORED 40 blocks from node = a40104, starting with hash = d8796f, number = 140123, txs = 0>
19-09-30 13:34:42.729 INFO  SYNC [sync-ib]: <import-status: node = 131c1d, hash = 1fe9aa, number = 139595, txs = 0, result = IMPORTED_BEST, time elapsed = 0 ms>
19-09-30 13:34:42.730 INFO  SYNC [sync-ib]: <import-status: node = 131c1d, hash = c877fd, number = 139596, txs = 0, result = IMPORTED_BEST, time elapsed = 0 ms>
```

Your kernel will stop syncing once you are fully synced and your block number should be the same one as your peers' block number.

> Note: Steps above are the mandatory steps for you to launch a kernel on the _Amity Test Network_. For more configuration of the kernel, check out [detailed installation guide](https://github.com/aionnetwork/aion/wiki/Installation#32-adding-known-peers).

### Configuration

#### RPC

Check if the RPC connection is open to enable getting the transactions later!

```bash
nano amity/config/config.xml
```

and `rpc active` should be set to true:

```text
<rpc active="true" ip="127.0.0.1" port="8545">
```

#### Internal Mining

When you are running a node, you can turn on the internal miner to mine PoW network as well. If you want to participate in the PoW network, make sure you enable *mining* in the config file.

```bash
nano amity/config/config.xml
```

Find `<mining>` and make sure it is set to *true*. Change the `<miner-address>` to an account that you want to use as the coinbase address that will collect the mining rewards!

If you want to disable the internal miner, simply set `<mining>` to *false*.

## Docker Image

Follow the [Aion node(Java) installation using docker image guide](https://docs.aion.network/docs/nodes-java-install#section-docker-image).

Replace `docker pull aionnetwork/aion:latest` to `docker pull aionfarbod/aion-kernel:v1.0.rc2-20191031`.
