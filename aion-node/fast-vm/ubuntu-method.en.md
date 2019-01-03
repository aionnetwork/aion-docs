---
title: Ubuntu Method
weight: 2
---

# Ubuntu Method

![Ubuntu Logo](/aion-node/fast-vm/images/ubuntu-logo.png)

This virtual machine is a modified version of the Ethereum Virtual Machine (EVM). Certain parameters and built-in processes of the virtual machine have been edited or disabled in order for it to work well with the Aion network.

One of the major changes between the EVN and the FastVM is that the word-size has been reduced from 256 to 128. Another major change is the introduction of LLVM JIT as the execution engine. We wrote a [detailed blog post](https://blog.aion.network/aionfastvm-c5ccd1628da0) about these changes.

## Prerequisites for FastVM

- Ubuntu 16.04 or 18.04
- Git

### Install FastVM

1. Run the following to install the required dependencies:

    ```bash
    sudo apt install build-essential llvm-4.0-dev libboost-all-dev libjsoncpp-dev
    ```

2. Clone the Aion FastVM repository:

    ```bash
    git clone https://github.com/aionnetwork/aion_fastvm.git
    ```

3. Build the virtual machine by using the `Makefile`:

    ```bash
    cd aion_fastvm
    make
    ```

4. Build the Solidity compiler:

    ```bash
    cd solidity
    make
    ```

5. You can now compile Solidity code by running `solc --abi --bin -o . <source_file>.sol`.