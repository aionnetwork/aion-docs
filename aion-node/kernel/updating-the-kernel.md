# Updating the Kernel

When a new version of the kernel is released, you will likely have to migrate your existing kernel to the new version.

1. Rename current Aion kernel.

```bash
mv ~/aion ~/aion-old
```

2. Download the new kernel `.tar.bz2` file and `SHA1SUMS` file from [GitHub](https://github.com/aionnetwork/aion/releases).

```bash
wget https://github.com/aionnetwork/aion/releases/download/v0.3.2/aion-v0.3.2.a0b68b7-2018-11-29.tar.bz2 -P ~/
wget https://github.com/aionnetwork/aion/releases/download/v0.3.2/SHA1SUMS -P ~/
```

3. Validate your download.

```bash
sha1sum -c ~/SHA1SUMS
> aion-v0.3.2.a0b68b7-2018-11-29.tar.bz2: OK
```

4. Extract the new kernel to the home `~` directory.

```bash
tar xvjf ~/aion-v0.3.2.a0b68b7-2018-11-29.tar.bz2
```

5. Start the kernel `~/aion/aion.sh` and them immediately cancel `CTRL + c` as soon as you see the AION logo. This process creates the mainnet directory structure.

```bash
~/aion/aion.sh
> Config Override
> <Protocol name: fork0.3.2 block#: 1920000 updated!
> 18-12-03 12:23:48.251 INFO  GEN  [main]: 
> -------------------------------- USED PATHS --------------------------------
> > Logger path:   /home/john/aion/mainnet/log
> > Database path: /home/john/aion/mainnet/database
> > Keystore path: /home/john/aion/mainnet/keystore
> > Config write:  /home/john/aion/mainnet/config/config.xml
> > Genesis write: /home/john/aion/mainnet/config/genesis.json
> > Fork write:    /home/john/aion/mainnet/config/fork.properties
> ----------------------------------------------------------------------------
> > Config read:   /home/john/aion/config/mainnet/config.xml
> > Genesis read:  /home/john/aion/config/mainnet/genesis.json
> > Fork read:     /home/john/aion/config/mainnet/fork.properties
> ----------------------------------------------------------------------------
>
>
> 18-12-03 12:23:48.253 INFO  GEN  [main]:
>                      _____
>       .'.       |  .~     ~.  |..          |
>     .'   `.     | |         | |  ``..      |
>   .''''''''`.   | |         | |      ``..  |
> .'           `. |  `._____.'  |          ``|
>
>                 v0.3.2.a0b68b7
>
>                     mainnet

CTRL + C

> $
```

5. Copy your existing `config.xml` file into the new directory as `config-old.xml`.

```bash
cp ~/aion-old/config/config.xml ~/aion/mainnet/config/config-old.xml
```

6. Open both `config.xml` and `config-old.xml` in a text editor. Copy over any settings you wish to migrate from your old aion kernel to the new one.

7. Depending on your infrastructure you may want to copy or resync the database. Copying the database requires you to shut down your kernel. Resyncing your kernel allows it to stay online during the process.

  - Copy the Database:

    ```bash
    cp -r ~/aion-old/database ~/aion/mainnet
    ```

  - Resync the database:

    ```bash
    ~/aion/aion.sh
    ```

8. Copy the keystore file into the new Aion kernel directory. You can press `TAB` while typing the command to auto-complete a file or folder. This is useful when typing in your keystore name.

```bash
cp ~/aion-old/keystore/UTC--2018... ~/aion/mainnet/keystore
```

9. If you want to create a backup of your olds from the old kernel, create a new directory in the new Aion kernel installation and copy the logs over.

```bash
mkdir ~/aion/log/
cp -r ~/aion-old/log ~/aion/log/aion-old/
```

10. Depending on your infrastructure, you may need to kill the existing process in order to run the new kernel. If you have no other Java applications running, you can issue the `killjava` command to end all Java processes. Or, using `pidof java` find out the `PID` of the old Aion kernel and kill it selectively using `kill 1234` (where `1234` is the `PID` of your Java process.)

```bash
pidof java
> 22175
kill 22175
```

11. Run the new kernel.

```bash
~/aion/aion.sh

> <Protocol name: fork0.3.2 block#: 1920000 updated!
> 18-12-03 13:49:58.381 INFO  GEN  [main]:
> -------------------------------- USED PATHS > --------------------------------
> > Logger path:   /home/john/aion/mainnet/log
> > Database path: /home/john/aion/mainnet/database
> > Keystore path: /home/john/aion/mainnet/keystore
> > Config write:  /home/john/aion/mainnet/config/config.xml
> > Genesis write: /home/john/aion/mainnet/config/genesis.json
> > Fork write:    /home/john/aion/mainnet/config/fork.properties
> -------------------------------------------------------------------------> ---
> > Config read:   /home/john/aion/mainnet/config/config.xml
> > Genesis read:  /home/john/aion/mainnet/config/genesis.json
> > Fork read:     /home/john/aion/mainnet/config/fork.properties
> -------------------------------------------------------------------------> ---
>
>
> 18-12-03 13:49:58.383 INFO  GEN  [main]:
>                      _____
>       .'.       |  .~     ~.  |..          |
>     .'   `.     | |         | |  ``..      |
>   .''''''''`.   | |         | |      ``..  |
> .'           `. |  `._____.'  |          ``|
>
>                 v0.3.2.a0b68b7
>
>                     mainnet
>
>
> 18-12-03 13:49:58.611 INFO  CONS [main]: Checking the integrity of the > total difficulty information...
> 18-12-03 13:49:58.616 INFO  CONS [main]: 1 blocks checked in under 1 sec.

...
```

### Testnet (Mastery) or Custom Network

If you want to perform a migration for the testnet (mastery) or a custom network, the steps are very similar. However, in step 5 you will select the network you want to use.

```bash
~/aion/aion.sh -n mastery
```

For more information on selecting networks, take a look at the [Aion kernel command line documentation](/aion-node/kernel/command-line).