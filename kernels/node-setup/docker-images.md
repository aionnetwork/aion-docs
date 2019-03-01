# Docker Images

There are currently docker images for both the Java and Rust kernels. In order to spin up one of these nodes, you need to be using an operating system capable of installing Docker. See the [Docker documentation](https://docs.docker.com/install/) for a comprehensive list of supported operating systems.

## Java

### Java Prerequisites

To use this Docker image your system must meet the following requirements:

- `8GB` RAM (`16GB` recommended)
- 2 CPU cores
- 1GB HDD space

The HDD space required only takes the Docker image into account. You will need significant space for storing the blockchain itself. The current ledger is around `20GB` in size.

### Install the Java Image

1. Pull down Aion Docker image.

    ```bash
    docker pull aionnetwork/aion:0.3.3

    > 0.3.3-latest: Pulling from aionnetwork/aion-staging
    > 6cf436f81810: Downloading  14.83MB/32.37MB
    > ...
    > Digest: sha256: efa8e77...
    ```

2. Create local storage for Aion image.

    ```bash
    docker volume create aion-mainnet

    > aion-mainnet
    ```

3. Run the image.

    ```bash
    docker run -it -p 8545:8545 -p 8547:8547 -p 30303:30303 --mount source=aion-mainnet,destination=/aion/mainnet aionnetwork/aion:0.3.3

    >                     _____
    >      .'.       |  .~     ~.  |..          |
    >    .'   `.     | |         | |  ``..      |
    >  .''''''''`.   | |         | |      ``..  |
    >.'           `. |  `._____.'  |          ``|
    >
    >                v0.3.3.2886431
    >                    mainnet
    >                   using FVM
    ```

    See the [Running the Java Container](#running-the-java-container) section for more information on what arguments to supply with the `docker run` command.

4. Start making something cool.

### Running the Java Container

## Rust

### Rust Prerequisites

To use this Docker image your system must meet the following requirements:

- `4GB` RAM (`8GB` recommended)
- 2 CPU cores
- 1GB HDD space

The HDD space required only takes the Docker image into account. You will need significant space for storing the blockchain itself. The current ledger is around `20GB` in size.

### Install the Rust Image

1. Pull down Aion Docker image.

    ```bash
    docker pull aionnetwork/aionr:0.1.1

    > 0.1.1-latest: Pulling from aionnetwork/aionr-staging
    > 6cf436f81810: Downloading  14.83MB/...
    > ...
    > Digest: sha256: efa8e77...
    ```

2. Create local storage for Aion image.

    ```bash
    docker volume create aionr-mainnet

    > aionr-mainnet
    ```

3. Run the image.

    ```bash
    docker run -it -p 8545:8545 -p 8547:8547 -p 30303:30303 --mount source=aionr-mainnet,destination=/aion/mainnet aionnetwork/aionr:0.1.1

    > 2019-03-01 21:12:54
    >              _____    ____    _   _
    >      /\     |_   _|  / __ \  | \ | |
    >     /  \      | |   | |  | | |  \| |
    >    / /\ \     | |   | |  | | | . ` |
    >   / ____ \   _| |_  | |__| | | |\  |
    >  /_/    \_\ |_____|  \____/  |_| \_|
    >
    > 2019-03-01 21:12:54 Starting Aion(R)/v0.1.1.6622125/x86_64-linux-gnu/rustc-1.28.0
    > 2019-03-01 21:12:54 Configured for Mainnet using POWEquihashEngine engine
    > 2019-03-01 21:12:54 Genesis hash: 30793b4ea012c6d3a58c85c5b049962669369807a98e36807c1b02116417f823
    ```

    See the [Running the Java Container](#running-the-java-container) section for more information on what arguments to supply with the `docker run` command.

4. Start making something cool.

### Running the Rust Container