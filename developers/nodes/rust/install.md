---
title: Rust
description: The Rust implementation of the Aion kernel. You can interact with this kernel directly through the JSON RPC layer. Further documentation regarding the kernel can be found on the Aion Rust Kernel Github repository at https://github.com/aionnetwork/aionr
---

There are two methods for installing the Rust kernel on your machine:

1. Install directly only a local [Ubuntu installation](#ubuntu-installation)
2. Using the [Aion Rust Kernel Docker Image](#docker-image)

### Native Ubuntu Installation

{{< youtube IsAdOz5vPhk >}}

This section walks you through installing the kernel from a package. You can either generate your own package by building the kernel from source, or you can download a [pre-built package from Github](https://github.com/aionnetwork/aionr/releases).

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

Under construction.

### Docker Image

Under construction.