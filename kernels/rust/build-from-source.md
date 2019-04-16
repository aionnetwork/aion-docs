# Build from Source

Follow this guide to build Aion Rust kernel from source.

## System Requirements

- Ubuntu 16.04 or Ubuntu 18.04
- `4GB` RAM
- `~40GB` available storage space
  - `~25GB` for testnet
  - `~15GB` for mainnet

## Prerequisites Installation

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

    - Ubuntu `16.04`:

        ```bash
        wget https://dl.bintray.com/boostorg/release/1.65.1/source/boost_1_65_1.tar.bz2
        tar xf boost_1_65_1.tar.bz2
        cd boost_1_65_1
        ./bootstrap.sh --prefix=/usr/lib/x86_64-linux-gnu/
        ./b2
        ./b2 install
        ```

    - Ubuntu `18.04`:

        ```bash
        sudo apt-get install libboost-all-dev -y
        ```

5. Install ZMQ:

    ```bash
    sudo apt-get install libzmq3-dev -y
    ```

6. **This step is optional**. If you plan on modifying the _Protobuf_ message, you need to install [Google Protobuf](https://github.com/stepancheg/rust-protobuf). You will also need to make sure that `protoc` is added to your `PATH` once _Profobuf_ is installed.

## Build the Binary

Once you have installed the prerequisites, follow these steps to build the everything.

1. Download the Aion Rust git repository:

    ```bash
    git clone https://github.com/aionnetwork/aionr.git
    cd aionr
    ```

2. Build the kernel from source:

    ```bash
    ./scripts/package.sh aionr-package
    ```

    `aionr-package` is the name that will be given to the Rust package when it as finished building. You can set this to anything you want by changing the last argument in the script call:

    ```bash
    ./scripts/package.sh example-package-name
    ```

    The package takes about 10 minutes to finish building.

3. When the build has finished, you can find the finished binary at `package/aionr-package`.
4. You can now launch the kernel normally by going to the package folder and executing the kernel:

    ```bash
    cd package/aionr-package
    ./aion --version

    > Create config file /home/user/.aion/config.toml, you can modify it if needed
    > Aion:
    >   version Aion(R)/v0.1.0.f9610e1/x86_64-linux-gnu/rustc-1.28.0
    >   Copyright (c) 2017-2018 Aion foundation.
    >
    ```