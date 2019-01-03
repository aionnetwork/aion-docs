---
title: Docker Method
weight: 3
---

# Docker Method

![Docker Logo](/aion-node/fast-vm/images/docker-logo.png)

This Docker image has been created by a member of the Aion community and is supported by the Aion Foundation.

Docker allows you to run virtual machines using the underlying Unix sub-system on your Linux or macOS computer. Windows works in a similar way, hosting a small virtual machine within Hyper-V, allowing for fewer components and has less moving parts than a standard virtual machine. We're really glossing over how Docker works right here, so if you'd like to know more you should check out the [Docker website](https://www.docker.com/).

The benefit this Docker image has over install the FastVM directly onto Ubuntu is that there is very little setup required. Also, this method can run on any operating system with Docker installed.

## Prerequisites

You must have [Docker](https://www.docker.com/) installed on your machine in order to run the Docker image. Docker runs on Linux, macOS, and Windows.

Docker for Windows has some very specific system requirements. Take a look at the [Docker documentation](https://docs.docker.com/docker-for-windows/install/) to find out what you'll need.

## Install

1. Make sure that [Docker](https://www.docker.com/) is installed:

    ```bash
    docker --version
    > Docker version 18.09.0, build 4d60db4
    ```

2. Pull the latest Docker image:

    ```bash
    docker pull satran004/aion-fastvm:0.3.2
    ```

3. If you are on Linux or macOS, add the following line to your `.bash_rc` or `.bash_profile` file:

    ```bash
    alias solc='docker run --rm -v "$(pwd):/project" satran004/aion-fastvm:0.3.2 solc'
    ```

    If you are on Windows, you do not need to change anything.

4. You can now compile Solidity code by running `solc --abi --bin -o . <source_file>.sol`:

    ```bash
    git clone https://github.com/satran004/aion-fastvm-docker.git ~/aion-fastvm-docker
    cd ~/aion-fastvm-docker/sample
    solc --abi --bin -o . Math.sol
    ls
    > Math.abi Math.bin Math.sol
    ```

## Troubleshooting

- I get _unauthorized: incorrect username or password_ after pulling the docker image.

    You need to make sure you are logged into Docker via the terminal. Run `docker login` and enter your credentials. If you are on macOS, you also need to login to the Docker application.

    ![Docker Login Screen on macOS](/aion-node/fast-vm/images/docker-login-screen-on-macos.png)