---
title: Migrating from the Java Kernel
---

# Migrating from the Java Kernel

## RPC APIs and Providers

### APIs

Rust Aion Kernel supports all the APIs Aion Kernel provided. [JSON-RPC APIs Rust vs Java](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Rust-Kernel-vs-Java-Kernel) page provides more details.

### Providers

Rust Aion Kernel and Aion Kernel both opens port 8545(default) for HTTP request. Rust Aion Kernel opens port 8546 for WebSocket and $BASE/jsonrpc.ipc for IPC connections.

## Web3

The Aion Rust kernel is fully compatible with [aion-web3.js](https://github.com/aionnetwork/aion_web3).

## Genesis File

See the [genesis specification](genesis-block-spec).

## Import Accounts

### Import an Accounts from an Existing Aion Keystore

1. Move into the Aion package directory:

    ```bash
    cd aion
    ```

2. Import the Keystore using the `./aion` binary:

    ```bash
    ./aion account import <path/to/keystore/files>
    ```

You can also supply the pre-built startup scripts with arguments:

```bash
./mainnet.sh account import <path/to/keystore/files>
```

### Import Account from a Private Key

1. Move into the Aion package directory:

    ```bash
    cd aion
    ```

2. ad.

    ```bash
    ./aion account import-by-key 119d1575a893df1ae02bf11111...
    ```

You can also supply the pre-built startup scripts with arguments:

```bash
./custom.sh account import-by-key <private key>
```

## Mining

To get mining rewards, an account needs to add into `config.toml` file.

```toml
[mining]
author = "0xa0f055bf27aa273f89e88f6d79..."
```

Unlike the Aion Java kernel, the Aion Rust kernel does not have an internal miner. The Rust kernel is compatible with the `aion_miner` and `aion_pool2`. You can find them both on Github:

- [Aion Miner](https://github.com/aionnetwork/aion_miner)
- [Aion Pool2](https://github.com/aionnetwork/aion_pool2)

The default mining port for the Rust kernel is `8008`, but you can change this in the configuration file:

```toml
[stratum]
port = 8008
```

These are the mining launch options for the Rust kernel:

```bash
Options:
  -h [ --help ]                   Print help messages
  -l [ --location ] arg           Stratum server:port
  -u [ --username ] arg           Username (Aion Addess)
  -a [ --apiPort ] arg            Local port (default 0 = do not bind)
  -d [ --level ] arg              Debug print level (0 = print all, 5 = fatal 
                                  only, default: 2)
  -b [ --benchmark ] [=arg(=200)] Run in benchmark mode (default: 200 
                                  iterations)
  -t [ --threads ] arg            Number of CPU threads
  -e [ --ext ] arg                Force CPU ext (0 = SSE2, 1 = AVX, 2 = AVX2)
  --ci                            Show CUDA info
  --cv arg                        CUDA solver (0 = djeZo, 1 = tromp, default=1)
  --cd arg                        Enable mining on spec. devices
  --cb arg                        Number of blocks (per device)
  --ct arg                        Number of threads per block (per device)
```

Here is an example of the `aionminer` connecting to a  local kernel using 1 thread.

```bash
./aionminer -l 127.0.0.1:8008 -t 1
```