# Migrations

When a new version of the kernel is released, you will likely have to migrate your existing kernel to the new version.

1. Download the new binary from [GitHub](https://github.com/aionnetwork/aion/releases).

### Example Directory Structure

```bash
/home/aion/
~/aion_pool2
~/aion
~/aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2
```

**NOTE**
If you extract the tar without moving it to another directory, it will override the ~/aion directory. This is a best practice when extracting archive files, avoiding potentially hundreds of files not being placed into their own directory or mixing with existing directory structure.

### Create a new directory
`mkdir aion032`

### move archive to new folder
`mv aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2 aion032/`

### change current working directory
`cd aion032`
~/aion032

### uncompress archive 
`tar vxjf aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2`

-x extract files from an achive
-v verbosely list files processed
-j filter the archive throuigh bzip2
-f specify file

### new file structure

After extraction of the archive you will have a directory structure like this

```~/aion032
├── aion
│   ├── aion_gui.sh
│   ├── aion.sh
│   ├── config
│   ├── jars
│   ├── native
│   ├── rt
│   ├── script
│   └── web-console
└── aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2```

### Create Mainnet Directory
run `./aion.sh` to create the structure and and kill the process (ctrl-c). The structure will look like this.

```~/aion032/aion
├── aion_gui.sh
├── aion.sh
├── config
├── jars
├── mainnet
│   ├── config
│   │   ├── config.xml
│   │   ├── fork.properties
│   │   └── genesis.json
│   ├── database
│   ├── keystore
│   └── log
│       └── aion.log
├── native
├── rt
├── script
└── web-console```

### Config File

You can copy your existing config.xml into the new directory and append the name (to not override new config file). 

`cp ~/aion/config/config.xml ~/aion032/aion/mainnet/config/config_030.xml`

Open both in your text editor of choice and update config.xml with the settings in config_030.xml (this is the least risk of missing a configuration detail)

### Database COPY or resync
Depending on your infrastructure you may want to copy or resync the database.
To copy the database, you need to shut down your existing kernel. This may not be possible for some, so the best option may be to resync (This will happen pretty quickly with Lighning sync ~3 hours).

#### Copy database 
`cp -r ~/aion/database aion032/aion/mainnet/`


### Keystore
Copy the keystore file into the v0.3.2 directory.

`cp ~/aion/keystore/UTC--2018..... ~/aion032/aion/mainnet/keystore

### Backup Logs


### Test server config
Depending on your infrastructure, you may need to kill the existing process (Aion v030) in order to run the new kernel. Please consult your IT upgrade practices. 
`./aion.sh`

### Run the new version

`aion@server:/home/aion/aion032/aion$ ./aion.sh`
```
<Protocol name: fork0.3.2 block#: 1920000 updated!
18-11-29 10:12:08.337 INFO  GEN  [main]: 
-------------------------------- USED PATHS --------------------------------
> Logger path:   /home/aion/aion032/aion/mainnet/log
> Database path: /home/aion/aion032/aion/mainnet/database
> Keystore path: /home/aion/aion032/aion/mainnet/keystore
> Config write:  /home/aion/aion032/aion/mainnet/config/config.xml
> Genesis write: /home/aion/aion032/aion/mainnet/config/genesis.json
> Fork write:    /home/aion/aion032/aion/mainnet/config/fork.properties
----------------------------------------------------------------------------
> Config read:   /home/aion/aion032/aion/mainnet/config/config.xml
> Genesis read:  /home/aion/aion032/aion/mainnet/config/genesis.json
> Fork read:     /home/aion/aion032/aion/config/mainnet/fork.properties
----------------------------------------------------------------------------


18-11-29 10:12:08.344 INFO  GEN  [main]: 
                     _____                  
      .'.       |  .~     ~.  |..          |
    .'   `.     | |         | |  ``..      |
  .''''''''`.   | |         | |      ``..  |
.'           `. |  `._____.'  |          ``|

                v0.3.2.2cfa29c

                    mainnet```


## Create Mastery directory structure
If you run mastery testnet, the above instructures are exactly the same except you will need to run 
`./aion.sh -n mastery`

in order to create the mastery testnet directory structure. The directory structure is the same as mainnet, but just under the mastery directory. Please move all your mastery related config, database, and keystores into the appropriate directory.
```.
├── aion_gui.sh
├── aion.sh
├── config
├── jars
├── mainnet
│   ├── config
│   │   ├── config.xml
│   │   ├── fork.properties
│   │   └── genesis.json
│   ├── database
│   ├── keystore
│   └── log
│       └── aion.log
├── mastery
│   ├── config
│   │   ├── config.xml
│   │   ├── fork.properties
│   │   └── genesis.json
│   ├── database
│   ├── keystore
│   └── log
│       └── aion.log
├── native
├── rt
├── script
└── web-console
```