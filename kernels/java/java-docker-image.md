# Java Docker Image

This section covers how to configure and run the Aion Java kernel Docker container.

## Quickstart

Follow these steps to get started quickly, or skip this section if you want to learn how to run the container in more detail.

```bash
# Pull the Rust kernel image.
docker pull aionnetwork/aion:0.3.3

# Create some local storage for the container:
docker volume create aion-mainnet

# Run the container:
docker run -it -p 8545:8545 -p 8547:8547 -p 30303:30303 --mount source=aion-mainnet,destination=/aion/mainnet aionnetwork/aion:0.3.3
```

## Java Prerequisites

To use this Docker image your system must meet the following requirements:

- `8GB` RAM (`16GB` recommended)
- 2 CPU cores
- 1GB HDD space
- Docker `v18.0.0`

The HDD space required only takes the Docker image into account. You will need a significant amount of space for storing the blockchain itself. The database is currently around `22GB` in size, although this can be [pruned](https://docs.aion.network/docs/database#section-state-database-pruning).

## Install the Java Image

1. Pull down the latest Java Docker image.

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

4. Press `CTRL` + `c` to shut down and exit the container.

```bash
19-03-04 10:59:01.821 INFO  GEN  [shutdown]: Starting shutdown process...
...
19-03-04 10:59:05.887 INFO  GEN  [shutdown]: ---------------------------------------------
19-03-04 10:59:05.888 INFO  GEN  [shutdown]: | Aion kernel graceful shutdown successful! |
19-03-04 10:59:05.888 INFO  GEN  [shutdown]: ---------------------------------------------
```

## Java Arguments and Configuration

There are several arguments that you can supply with the `docker run` command.

### Configure the Java Kernel

Once the kernel Docker image is pulled you can configure it by running the `docker exec` command in a separate terminal window:

```bash
docker exec -it <CONTAINER_NAME or CONTAINER_HASH> /bin/bash
```

This starts a standard terminal session within the container. You will need to install a text editor before you can edit any files, as the container doesn't come with one pre-installed:

```bash
sudo apt install nano

OR

sudo apt install vim
```

Then you can edit the `config.xml` file associated with the network you are running. For example, if you are running the Java kernel on Mainnet, then you should edit the `mainnet/config.xml` file. If you are running the Rust kernel on the Testnet (Mastery), then you should edit the `mastery/config.xml` file.

### Java Networks

By default, running the image will start a node on the mainnet. To specify a network; for instance, the mastery testnet, use:

```bash
docker run aionnetwork/aion:0.3.3 /aion/aion.sh -n mastery
```

### Java Ports

The Aion Docker image is configured to run the Java API and RPC servers, as well as allow connections from other Aion nodes. When running the Docker container, it is necessary to publish those ports if you use to wish these functionalities.

| Port | Connection Type |
| ---- | ------- |
| `30303` | P2P |
| `8545` | JSON-RPC |
| `8547` | Java API |

### Java Storage

In most cases, storage should be attached so that configuration and blockchain sync state can be persisted between each time the kernel is launched. You will need a separate Docker volume for each Aion Network, so it is recommended to include the network name in the volume name. To create a volume:

```bash
docker volume create VOLUME-NAME
```

To start the Docker image with the volume, where VOLUME-NAME is the volume name and NETWORK is the Aion network name:

```bash
docker run -it --mount source=VOLUME-NAME,destination=/aion/NETWORK aionnetwork/aion:0.3.3
```

For the list of network names, see:

```bash
docker run -it aionnetwork/aion:0.3.3 /aion/aion.sh -h
```
