---
title: Command Line
weight: 1
chapter: true
---

# Command Line

From a terminal, you can interact with Aion though the command line interface which offers the following options:

```bash
Usage: ./aion.sh [OPTIONS] [ARGUMENTS]
    -h, --help
        display help information

    ac, -a create, --account create
        create a new account

    al, -a list, --account list
        list all existing accounts

    ae, -a export, --account export <account>
        export private key of an account

    ai, -a import, --account import <key>
        import private key

    -c, --config [<network>]
        create config for the selected network
            options: mainnet, conquest, mastery

    -i, --info
        display information

    -v
        display version

    --version
        display version tag

    sc, -s create [<hostname> <ip>]
        create a ssl certificate for:
            - localhost (when no parameters are given), or
            - the given hostname and ip
  
    pb, --prune-blocks
        remove blocks on side chains and update block info
  
    -r, --revert <block_number>
        revert database state to given block number

    -n, --network <network>
        execute kernel with selected network
            options: mainnet, conquest, mastery

    -d, --datadir <directory>
        execute kernel with selected database directory

    ps, --state <prune_mode>
        reorganize the state storage
            options: FULL, TOP, SPREAD

    --dump-blocks [<block_count>]
        print top blocks from database

    --dump-state-size [<block_count>]
        retrieves the state size (node count) for the top blocks

    --dump-state [<block_count>]
        retrieves the state for the top main chain blocks

    --db-compact
        if using leveldb, it triggers its database compaction processes
```

## Multi-Arguments CLI

### Specifying `datadir (-d) && network (-n)`

```bash
./aion.sh -n [valid network] -d [valid datadir]
```

Creates new directory and copies the `config.xml` and `genesis.json` files with subpaths:

```bash
/home/aion/[datadir]/[network]/config/config.xml
/home/aion/[datadir]/[network]/config/genesis.json
/home/aion/[datadir]/[network]/keystore
/home/aion/[datadir]/[network]/database
/home/aion/[datadir]/[network]/log
```

If the parameters are not valid, the kernel will not execute.

### Generating new config file `(-c)`

```bash
./aion.sh -c [valid network]
```

Generates new `config.xml` file at the project's root directory.

```bash
/home/aion/config/config.xml
```

If the parameters are not valid, the kernel will not execute. If the config folder does't exist, the config folder and config file will be generated at the project's root directory.