---
title: Rust
description: The Rust implementation of the Aion kernel. You can interact with this kernel directly through the JSON RPC layer. Further documentation regarding the kernel can be found on the Aion Rust Kernel GitHub repository at https://github.com/aionnetwork/aionr
---

There are two methods for installing the Rust kernel on your machine:

1. Install directly only a local [Ubuntu installation](#ubuntu-installation)
2. Using the [Aion Rust Kernel Docker Image](#docker-image)

### Native Ubuntu Installation

{{< youtube IsAdOz5vPhk >}}

This section walks you through installing the kernel from a package. You can either generate your own package by building the kernel from source, or you can download a [pre-built package from GitHub](https://github.com/aionnetwork/aionr/releases).

#### System Requirements

To run the kernel, your computer must meet the following requirements.

- [Ubuntu 16.04](http://releases.ubuntu.com/16.04/) or [Ubuntu 18.04](http://releases.ubuntu.com/18.04/)
- `4GB` RAM
- `~40GB` available storage
  - `~25GB` for testnet
  - `~15GB` for mainnet

These storage size requirements are estimates only. Since the databases for each network grow everytime a transaction is mined, these values will only increase in size.

#### Library Dependencies

The Rust kernel depends on the following libraries.

- `g++`
- `gcc`
- `libboost-all-dev` (version `1.65.0` or higher)
- `libzmq3-dev`
- `libjsoncpp-dev`
- `python-dev`
- `libudev-dev`
- `llvm-4.0-dev`

To install these dependencies, follow the steps for your version of Ubuntu.

##### Ubuntu 16.04

```bash
sudo apt update
sudo apt install g++ gcc libzmq3-dev libjsoncpp-dev python-dev libudev-dev llvm-4.0-dev -y

# Ubuntu 16.04 repositories only have libboost-1.58 while Aion Rust Kernel requires libboost-1.65.0.
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

##### Ubuntu 18.04

```bash
sudo apt update
sudo apt install g++ gcc libzmq3-dev libjsoncpp-dev python-dev libudev-dev libboost-all-dev llvm-4.0-dev
```

#### Run the Installation

### Docker Image

This section covers how to configure and run the Aion Rust kernel Docker container.

#### Quickstart

Follow these steps to get started quickly, or skip this section if you want to learn how to run the container in more detail.

```bash
# Pull the kernel image.
docker pull aionnetwork/aionr:latest

# Create some local storage for the container:
docker volume create aionr-mainnet

# Run the container:
docker run -it -p 8545:8545 -p 8546:8546 -p 30303:30303 --mount source=aionr-mainnet,destination=/aionr/mainnet aionnetwork/aionr:latest
```

#### Rust Prerequisites

To use this Docker image your system must meet the following requirements:

- `8GB` RAM (`16GB` recommended)
- 2 CPU cores
- 1GB HDD space
- Docker `v18.0.0`

The HDD space required only takes the Docker image into account. You will need a significant amount of space for storing the blockchain itself. The database is currently around `22GB` in size, although this can be [pruned](https://docs.aion.network/docs/database#section-state-database-pruning).

#### Installation

1. Pull down the latest Docker image.

    ```bash
    docker pull aionnetwork/aionr:latest

    > latest: Pulling from aionnetwork/aionr
    > f476d66f5408: Pull complete
    > ...
    > Status: Downloaded newer image for aionnetwork/aionr:latest
    ```

2. Create local storage for Aion image.

    ```bash
    docker volume create aionr-mainnet

    > aionr-mainnet
    ```

3. Run the image.

    ```bash
    docker run -it -p 8545:8545 -p 8546:8546 -p 30303:30303 --mount source=aionr-mainnet,destination=/aionr/mainnet aionnetwork/aionr:latest

    >             _____    ____    _   _
    >     /\     |_   _|  / __ \  | \ | |
    >    /  \      | |   | |  | | |  \| |
    >   / /\ \     | |   | |  | | | . ` |
    >  / ____ \   _| |_  | |__| | | |\  |
    > /_/    \_\ |_____|  \____/  |_| \_|
    >
    >
    >2019-07-12 17:14:11 Starting Aion(R)/v0.2.5.a60ae38/x86_64-linux-gnu/rustc-1.28.0
    ```

4. Press `CTRL` + `c` to shut down and exit the container.

#### Arguments and Configuration

There are several arguments that you can supply with the `docker run` command.

##### Configure the Rust Kernel

Once the kernel Docker image is pulled you can configure it by running the `docker exec` command in a separate terminal window:

```bash
docker exec -it <CONTAINER_NAME or CONTAINER_ID> /bin/bash
```

>List of `CONTAINER_ID`s and `CONTAINER_NAME`s can be found with command: `$ docker container list`

This starts a standard terminal session within the container. You will need to install a text editor before you can edit any files, as the container doesn’t come with one pre-installed:

```bash
apt install nano

OR

apt install vim
```

The configuration file locations will be printed upon starting the node:

```bash
2019-07-12 17:41:08 Config path /aionr/mainnet/mainnet.toml
2019-07-12 17:41:08 Genesis spec path /aionr/mainnet/mainnet.json
2019-07-12 17:41:08 Keys path /root/.aion/keys/mainnet
2019-07-12 17:41:08 DB path /root/.aion/chains/mainnet/db/a98e36807c1b0211
```

Then you can edit the `.toml` file associated with the network you are running. For example, if you are running the Rust kernel on Mainnet, then you should edit the `mainnet/mainnet.toml` file. If you are running the Rust kernel on the Testnet (Mastery), then you should edit the `mastery/mastery.toml` file.

```bash
nano mainnet/mainnet.toml
```

##### Rust Networks

By default, running the image will start a node on the mainnet. To specify a network; for instance, the mastery testnet, use:

```bash
docker run -it aionnetwork/aionr:latest /aionr/mastery.sh
```

##### Rust Ports

The Aion Docker image is configured to run the Rust WebSocket and RPC servers, as well as allow connections from other Aion nodes. When running the Docker container, it is necessary to publish those ports if you use to wish these functionalities.

| Port | Connection Type |
| ---- | ------- |
| `30303` | P2P |
| `8545` | JSON-RPC |
| `8546` | WebSocket |

##### Rust Storage

In most cases, storage should be attached so that configuration and blockchain sync state can be persisted between each time the kernel is launched. You will need a separate Docker volume for each Aion Network, so it is recommended to include the network name in the volume name. To create a volume:

```bash
docker volume create <VOLUME_NAME>
```

To start the Docker image with the volume, where `<VOLUME-NAME>` is the volume name and `<NETWORK>` is the Aion network name (`mainnet`, `mastery`, `custom`, etc.):

```bash
docker run -it --mount source=<VOLUME-NAME>,destination=/aionr/<NETWORK> aionnetwork/aionr:latest ./<Network>.sh
```

That’s it! You’re done.

See the  [aionr repo](https://github.com/aionnetwork/aionr) and [Kernel wiki pages](https://github.com/aionnetwork/aionr/wiki/) on GitHub for more on installation and configuration.
