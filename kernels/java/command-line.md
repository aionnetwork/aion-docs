# Command Line

From a terminal, you can interact with Aion though the command line interface by running `./aion.sh`. The following options are completely optional, and are not required for the kernel to execute:

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
        execute kernel on the selected network
            options: mainnet, conquest, mastery

    -d, --datadir <directory>
        execute kernel with the selected database directory

    ps, --state <prune_mode>
        reorganize the state storage
            options: FULL, TOP, SPREAD

    --dump-blocks [<block_count>]
        print top blocks from the database

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

Creates new directory and copies the `config.xml` and `genesis.json` files with subpaths, while also starting a kernel running on the given network:

```bash
/home/aion/[datadir]/[network]/config/config.xml
/home/aion/[datadir]/[network]/config/genesis.json
/home/aion/[datadir]/[network]/keystore
/home/aion/[datadir]/[network]/database
/home/aion/[datadir]/[network]/log
```

If the parameters are not valid, the kernel will not execute.

### Generating new config file `(-c)`

Generate a new `config.xml` file, and place it in the corresponding network folder (`mainnet, conquest, mastery`).

```bash
./aion.sh -c [valid network]
```

For example, running:

```bash
./aion.sh -c mastery
```

Will create a `config.xml` file at `/home/aion/config/mastery/config.xml`.

If the parameters are not valid, the kernel will not execute. If the config folder does not exist, the config folder and config file will be generated at the project's root directory.

### Account Management

Here are some examples use cases for account management:

```bash
./aion.sh -a create -n [valid network] -d [valid datadir]
./aion.sh -a list -n [valid network] -d [valid datadir]
./aion.sh -a export [valid address] -n [valid network] -d [valid datadir]
./aion.sh -a import [private key] -n [valid network] -d [valid datadir]
```

The options can be given in any order. `./aion.sh -a list -n [valid network] -d [valid datadir]` and `./aion.sh -n [valid network] -a list -d [valid datadir]` have the same outcome.