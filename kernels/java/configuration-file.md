# Configuration File

Each network has a `config.xml` for the kernel, which controls the configuration settings each network can set. This file is _read-only_ once when the kernel is started. Any updates made in the `config.xml` file while the kernel is running will not take effect until you stop the kernel (`CTRL` + `C`) and restart it (`./aion.sh`).

## Locations

The Java kernel has seperate configuration files for each network. For example, the `config.xml` file for the Aion Mainnet network can be found in `~/aion/mainnet/config/config.xml`.

The tree structure below shows the folder hierarchy. Some files and folders have been removed to make things clearer:

```txt
├── aion.sh
├── avmtestnet
│   ├── config
|   │   └── config.xml
├── mainnet
│   ├── config
|   │   └── config.xml
├── mastery
│   ├── config
|   │   └── config.xml
```

## Frequent Use Cases

The following are some frequent use cases when the configurations should be modified.

### Importing a Pre-Existing Configuration

When booting up (using `./aion.sh`), the kernel will search for a pre-existing `config.xml` file. If you are booting the kernel for the first time and no `config.xml` file is present, then one will be created.

If a `config.xml` file is found (in the corresponding network folder):

1. The `config/[network]/config.xml` file is read.
2. The kernel checks the network ID within `config.xml` and matches it to an available network:
    - `256` -> `mainnet`
    - `128` -> `conquest`
    - `32` -> `mastery`
    - any positive number not listed above -> `custom`
3. `config/[network]/config.xml` and `config/[network]/genesis.json` are both deleted.
4. `/config/[network]/config.xml` is overwritten with the read configuration.
5. `database`, `log`, and `keystore` are all set with absolute paths based on the location read from the _old_ config.

If you are going to use a different network for the next execution, you must supply the `n [network]` option.

### Mining

To receive tokens for mining blocks, you first need to create an account using:

```bash
./aion.sh -a create
```

The [mining section](/mining) illustrates how to set this account to be able to receive tokens for mining.

To import accounts created using a different binary on the same network follow the guide on [exporting and importing accounts](/aion-node/kernel/import-accounts).

### Adding Known Peers

The default configuration from the release contains the seed nodes by default. Do not remove these nodes from the configuration. To include additional peers update the `config.xml` file by adding nodes using the permanent peer id, IP, and port of the computers you wish to connect to:

```xml
<net>
    <p2p>
        <ip>0.0.0.0</ip>
        <port>30303</port>
    </p2p>
    <nodes>
        <node>p2p://PEER_ID@IP:PORT</node>
    </nodes>
</net>
```

Make sure to keep your configuration IP at `127.0.0.1` to connect locally. To allow peers to connect to you, set it to `0.0.0.0`.

After running the kernel once, your configuration file will be updated with a permanent peer id. This id can be found at the top of the `config.xml` file.

```xml
<aion>
...
    <id>your_permanent_id</id>
...
</aion>
```

If instead of a permanent id your configuration has an `id` placeholder, you only need to start the kernel to be assigned a permanent `id`. You can share this `id` with peers that want to add your node to their configuration file. During kernel run time your peer list will expand to include other active nodes.

If you accidentally delete the seed nodes from your configuration, you can find them on the [seed nodes page](/aion-node/kernel/seed-nodes). Make sure to add the seed nodes for the network you want to connect to.

### Log System Settings

The log section in `config.xml` allows one to selectively set log-levels for each of the kernel modules. Available log-levels, from highest (most verbose) to lowest (least verbose), are:

- `TRACE`
- `DEBUG`
- `INFO`
- `WARN`
- `ERROR`
- `OFF`

These log levels maps directly to logback's log levels. `OFF` turns off all the logging for a particular module, and `TRACE` prints out all available logging information.

Note that the `ROOT` logger maps to the logback root logger, and captures all logs not emitted directly by any of the modules.

#### Absolute Paths

The logs now allow for absolute paths. Absolute paths refer to a very specific location on the your computer, and do not use aliases such as `~`.

#### Rolling Persistent Logs

The kernel's logger is configured to persist all generated log data into the log folder by default. The logs roll-over every data at midnight, and every time a log file gets larger than `100MB`.

To control the directory where the logs are stored to disk, you can change the `<log-path>` property to your directory of choice. To disable persistence to file entirely, set the `<log-file>` property to `false`.

```xml
<log>
    <!--Enable/Disable logback service; if disabled, output will not be logged -->
    <log-file>true</log-file>
    <!--Sets the physical location on disk where log files will be stored.-->
    <log-path>log</log-path>

    <ROOT>WARN</ROOT>
    <GEN>INFO</GEN>
    <VM>ERROR</VM>
    <SYNC>INFO</SYNC>
    <CONS>INFO</CONS>
    <DB>ERROR</DB>
    <API>INFO</API>
    <P2P>INFO</P2P>
    <GUI>INFO</GUI>
    <TX>INFO</TX>
    <TXPOOL>INFO</TXPOOL>
</log>
```