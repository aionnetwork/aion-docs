---
title: Rust Node
---

Follow this guide to quickly set up your own Aion Unity node and sync up with the network!

## Amity Network Reset - Oct 31st

If you are already running an old version of Amity, it is recommended to backup your keystore files (or you can create new ones for the new network later) and delete everything else. Make sure to clear your database, which is located in your home folder (~/.aion). You can then use this guide for instructions on running a Rust node.

## Native Ubuntu Install

Follow these steps to install an Aion Rust node as a native Ubuntu application.

### Prerequisites

Your node must have the following specifications.

- [Ubuntu 16.04 or later](http://releases.ubuntu.com/16.04/)
- [Open JDK 11 or up](https://download.java.net/java/GA/jdk11/13/GPL/openjdk-11.0.1_linux-x64_bin.tar.gz)
- `4GB` RAM
- `~20GB` HDD/SSD Space
- 2 core CPU

Follow these steps to install all the necessary prerequisites.

1. Update your system and install the build dependencies:

```bash
sudo apt-get update
sudo apt install g++ gcc libjsoncpp-dev python-dev libudev-dev llvm-4.0-dev cmake wget curl git pkg-config lsb-release -y
```

2. Install Rust `v1.28.0`:

```bash
curl https://sh.rustup.rs -sSf | sh -s -- --default-toolchain 1.28.0 --default-host x86_64-unknown-linux-gnu
```

Select option `1` when prompted.

3. Initialize the Rust install and check that it is working:

```bash
source $HOME/.cargo/env
cargo --version

> cargo 1.28.0 (96a2c7d16 2018-07-13)
```

4. Install Boost `v1.65.1`

```bash
# Ubuntu 16.04:
wget https://dl.bintray.com/boostorg/release/1.65.1/source/boost_1_65_1.tar.bz2
tar xvf boost_1_65_1.tar.bz2
cd boost_1_65_1
./bootstrap.sh --libdir=/usr/lib/x86_64-linux-gnu/
./b2
./b2 install

# OR

# Ubuntu 18.04
sudo apt-get install libboost-all-dev -y
```

5. Install ZMQ:

```bash
sudo apt-get install libzmq3-dev -y
```

6. Install Java JDK 11:

```bash
sudo apt install openjdk-11-jdk
```

7. **This step is optional**: If you plan on modifying the _Protobuf_ message, you need to install [Google Protobuf](https://github.com/stepancheg/rust-protobuf). You will also need to make sure that `protoc` is added to your `PATH` once _Profobuf_ is installed.

8. Install Apache Ant:

```bash
sudo apt install ant -y
```

9. Set Environment Variables:

```bash
export JAVA_HOME=<jdk_directory_location>
export ANT_HOME=<apache_ant_directory>
export LIBRARY_PATH=$JAVA_HOME/lib/server
export PATH=$PATH:$JAVA_HOME/bin:$ANT_HOME/bin
export LD_LIBRARY_PATH=$LIBRARY_PATH:/usr/local/lib
```

### Get the Rust Build

1. Download the Unity Rust Kernel package [here](https://aionstorage.file.core.windows.net/aionfiles/Amity-20191031/aionr-amity-20191031-2.tar.gz?st=2019-10-31T15%3A51%3A59Z&se=2019-11-25T15%3A51%3A00Z&sp=rl&sv=2018-03-28&sr=f&sig=pJk1P9A6Kqemcn2i0CxAZSn7KrEYAQREP3QQ4aj0KVQ%3D):

2. If you are going to be connecting to your node over SSH, you need to copy this package to the node using [SCP](https://www.ssh.com/ssh/scp/):

```bash
scp ~/Downloads/PACKAGE_NAME USER@NODE_IP_ADDRESS:~/
```

For example:

```bash
scp ~/Downloads/aionr-amity-20191031-2.tar.gz john@10.0.2.11:~/
```

3. On the node, unzip the package:

```bash
cd ~/
tar xvf aionr-amity-20191031-2.tar.gz
```

### Start the Rust Node

1. Navigate to where you just unzipped the package.

```bash
cd aion_package
```

2. Launch the Rust kernel on the _Amity Test Network_:

```bash
./amity.sh
```

When the kernel starts up, you should see it trying to sync with the network and importing blocks.

```bash
john@node:~/aionr-amity-20191031-2$ ./amity.sh                                                                         │
2019-09-30 13:12:32                                                                                                    │
                _____    ____    _   _                                                                                 │
        /\     |_   _|  / __ \  | \ | |                                                                                │
       /  \      | |   | |  | | |  \| |                                                                                │
      / /\ \     | |   | |  | | | . ` |                                                                                │
     / ____ \   _| |_  | |__| | | |\  |                                                                                │
    /_/    \_\ |_____|  \____/  |_| \_|                                                                                │
                                                                                                                       │
                                                                                                                       │
2019-09-30 13:12:32        build: Aion(R)/v0.2.6-1.994c15f/x86_64-linux-gnu/rustc-1.28.0                               │
2019-09-30 13:12:32  config path: /home/john/aion_rust/amity/amity.toml                                                │
2019-09-30 13:12:32 genesis path: /home/john/aion_rust/amity/amity.json                                                │
2019-09-30 13:12:32    keys path: /home/john/.aion/keys/amity                                                          │
2019-09-30 13:12:32      db path: /home/john/.aion/chains/amity/db/4483ac46e210cb4a                                    │
2019-09-30 13:12:32           id: b7bad827-211a-4a05-ac6e-26e3ed322c5d                                                 │
2019-09-30 13:12:32      binding: 0.0.0.0:30303                                                                        │
2019-09-30 13:12:32      network: Amity                                                                                │
2019-09-30 13:12:33      genesis: fc1b51d54cc0df5f75bad1e6fd27547d44b692384483ac46e210cb4a48b120cd                     │
2019-09-30 13:12:33     state db: archive                                                                              │
2019-09-30 13:12:33         apis: rpc-http(y) rpc-ws(n) rpc-ipc(n)                                                     │
2019-09-30 13:12:33         seed: p2p://a4010411-8c7e-496c-9c4e-c89318280274@13.82.30.156:30303                        │
2019-09-30 13:12:33         seed: p2p://a4020411-729a-4584-86f1-e19ab97cf9ce@13.69.15.78:30303                         │
2019-09-30 13:12:33         seed: p2p://a4030411-729a-4584-86f1-e19ab97cf9cq@34.68.147.170:30303                       │
...
```

4. Make sure your network is fully synced! Your kernel will stop syncing once you are fully synced and your block number should be the same one as your peers' block number.

### Configuration

#### RPC

Check if the RPC connection is open to enable getting the transactions later!

```bash
cat amity/amity.toml

...

> [http]
> disable = false
> port = 8545

...
```

## Docker Image

Follow the [Aion node(Rust) installation using docker image guide](https://docs.aion.network/docs/nodes-rust-install#section-docker-image).

Replace `docker pull aionnetwork/aion:latest` to `docker pull chaionclibackup/aionr:201910231-2`.
