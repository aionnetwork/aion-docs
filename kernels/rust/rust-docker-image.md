# Rust

This section covers how to configure and run the Aion Rust Docker container.

## Quickstart

Follow these steps to get started quickly, or skip this section if you want to learn how to run the container in more detail.

```bash
# Pull the Rust kernel image.
docker pull aionnetwork/aionr:0.1.1

# Create some local storage for the container:
docker volume create aionr-mainnet

# Run the container:
docker run -it -p 8545:8545 -p 8547:8547 -p 30303:30303 --mount source=aionr-mainnet,destination=/aion/mainnet aionnetwork/aionr:0.1.1
```

## Prerequisites

To use this Docker image your system must meet the following requirements:

- `4GB` RAM (`8GB` recommended)
- 2 CPU cores
- 1GB HDD space
- Docker `v18.0.0`

The HDD space required only takes the Docker image into account. You will need a significant amount of space for storing the blockchain itself. The database is currently around `22GB` in size, although this can be [pruned](https://github.com/aionnetwork/aionr/wiki/CMD-&-Config#pruning).

## Install the Image

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

4. Press `CTRL` + `c` to shut down and exit the container.

## Arguments and Configuration

There are several arguments that you can supply with the `docker run` command.

### Configure the Kernel

Once the kernel is running you can configure it by running the `docker exec` command in a separate terminal window:

```bash
docker exec -it <CONTAINER_NAME or CONTAINER_HASH> /bin/bash
```

This starts a standard terminal session within the container, meaning you can write and edit files.

Then you can edit the `.toml` file associated with the network you are running. For example, if you are running the Rust kernel on Mainnet, then you should edit the `mainnet/mainnet.toml` file. If you are running the Rust kernel on the Testnet (Mastery), then you should edit the `mastery/mastery.toml` file.

### Networks

The Rust kernel will connect to the Mainnet network by default. You can supply `./mastery.sh` as an argument to connect to the Testnet (Mastery) network.

```bash
docker run aionnetwork/aionr:0.1.1 ./mastery.sh
```

This argument tells Docker to call the `mastery.sh` script located within the container once everything has booted.

To connect to a custom network, supply `./custom.sh` as an argument.

```bash
docker run aionnetwork/aionr:0.1.1 ./custom.sh
```

### Ports

You can map ports from your local machine to the docker container. This is necessary as certain aspects of the Rust kernel are only enabled if certain ports are available. The following ports are required for the Rust kernel:

| Port | Connection Type |
| ---- | ------- |
| `30303` | P2P |
| `8545` | JSON-RPC |
| `8546` | WebSocket |
| `8547` | Java API |
| `8008` | Stratum Protocol |

### Storage

It is essential that you specify persistent storage when running the `docker run` command. If you do not, the entire blockchain database will be lost when you exit or shutdown the container.

First, you need to create the volume, and then attach it to the container.

```bash
# Create the storage
docker create volume aionrdata

# Run the container with the storage attached
docker run --mount type=volume,src=aionrdata,dst=/root/.aion aionnetwork/aionr:0.1.1
```