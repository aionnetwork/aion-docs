# Database

Manage the database configuration for a Java kernel.

## Configuration

Each configuration file is located in the folder that corresponds to the network you are editing. See the [Configuration File](kernels/java/configuration-file) section for more information.

The current default database configuration is below, with the comments removed:

```xml
<db>
    <path>database</path>
    <check_integrity>false</check_integrity>
    <state-storage>FULL</state-storage>
    <vendor>leveldb</vendor>
    <enable_db_compression>false</enable_db_compression>
</db>
```

### Database location

The `path` tag is used for setting the physical location on the disk where data will be stored. The path is relative with respect to the current folder.

For example, if you set the path to `<path>database</path>`, it will create a new folder called `database` where it will store the data. If the path is set to \<path\>database/db1\</path\>, it will create two new folders called `database` inside the current folder and `db1` inside the `database` folder. The data will be stored in `db1`.

When setting the path for the database please make sure that:

- Your application has writing privileges on that path.
- There is no other database (using a different vendor) already using the path.

### Data Integrity

The `check_integrity` tag allows enabling and disabling the data integrity checks at the kernel startup. The options are:

- `true`
- `false`

You can set this to `false` to decrease the time it takes for the kernel to boot. However, disabling the integrity check increases the chance of corrupting the database.

### State Database Pruning

The `state-storage` tag allows setting the pruning mode for the state database. The options are:

- `FULL` mode disables state pruning.
- `TOP` mode stores the state only for the top 256 blocks. This mode limits sync to branching only within the stored blocks.
- `SPREAD` mode stores the state only for the top 128 blocks and at regular intervals, namely each block for which the number is a multiple of 10000. This mode provides all the functionality of a full node, but with significantly decreased storage at the minor cost of some additional computations.

The database can also be updated offline to the desired mode by running the command:

```bash
./aion.sh --state CHOSEN_MODE
```

### Database Type

The `vendor` tag is used for choosing the database driver/implementation. The current vendor options are:

- `leveldb`
- `h2`
- `rocksdb`

If you are changing vendors, you must either delete/move the previous database folder, or change the path of the database to a new valid location.

### Data compression

The `enable_db_compression` tag customizes the behavior of the database to turn on or off its internal compression implementation. Enabling compression will reduce the storage space required, but may increase execution times for the different operations reading and writing to the database. The options are:

- `true`
- `false`

## Database Contents

The Aion blockchain data is stored in several folders each representing a key-value database:

- `block` and `index` store the information about mined blocks.
- `details` and `storage` keep information on contract details and data storage.
- `state` is used for the state tree.
- `transaction` keeps the data related to transactions.
- `pendingtxCache` and `pendingtxPool` store permanent copies of pending transactions that the node received.

When the program is started it will print out its topmost known block number. In the case of an empty database, this will be the genesis block with a message like:

```text
INFO GEN - loaded genesis block <num=0, root=4f512c6f...>
```

For a database that has some stored data, the message will look something like the one below:

```text
INFO GEN - loaded block <num=33, root=a9182787... l=32>
```

To check that data was correctly written to the database stop the program (`Ctrl` + `C`) and restart it (`./aion.sh`). Compare the starting block number between the two runs. If any blocks were mined or synchronized while the program was running, the block number at the start of the program should reflect this change.

## Recovery

Aion already has some built-in methods for attempting to recover from corrupted data inside the database. If the logs show that database recovery is in progress, please allow the program to complete the recovery process.

If the recovery process failed, or you prefer to restart from genesis, do the following:

1. Delete the database folder.
2. Restart the program. It will automatically sync with the network and populate the database.

## Submitting Issues

Please submit any issues via [GitHub issues](https://github.com/aionnetwork/aion/issues). If you can replicate the issue you experienced please enable the debugging feature of the database by editing the `config.xml` file. Between the `log` tags update (or add) the following line:

```xml
<DB>DEBUG</DB>
```

After enabling the debug messages, run the program again and add the log information to the issue description. If you cannot replicate the issue please submit the old log information. When possible you can also add a copy of the corrupted database to the issue description.