# Pre-built Images

If you don't want to build your own Java kernel node from source, you can use one of the pre-compiles images available from Github.

We have used the latest build as an example on this page. If you want to use a different version of the Aion kernel you will need to change the commands to fit the version you are using. We do not recommend always using the latest Aion kernel version.

## Prerequisites

- [Ubuntu 16.04 or later](http://releases.ubuntu.com/16.04/)
- [Open JDK 11](https://download.java.net/java/GA/jdk11/13/GPL/openjdk-11.0.1_linux-x64_bin.tar.gz)
- [Apache Ant 1.10](http://ant.apache.org/bindownload.cgi)
- `8GB` RAM
- CPU with `SSE4.2` support

## Install the Kernel

1. Connect to your machine via SSH or open a terminal if you are working on a local installation.
2. Change to your root `~` directory and update your system:

```bash
cd ~
sudo apt update -y && sudo apt upgrade -y
```

1. Download and validate the [latest build from Github](https://github.com/aionnetwork/aion/releases):

```bash
wget https://github.com/aionnetwork/aion/releases/download/v0.3.3/aion-v0.3.3.22362091d-2019-03-07.tar.bz2 https://github.com/aionnetwork/aion/releases/download/v0.3.3/SHA1SUMS
sha1sum -c SHA1SUMS
```

If the terminal outputs `aion-v0.3.3.22362091d-2019-03-07.tar.bz2: OK` then the package passed the validation.

If it failed, **stop here and reboot your machine** - you may have been a victim to a [man-in-the-middle attack](https://en.wikipedia.org/wiki/Man-in-the-middle_attack. Retry the steps above. If you still aren't able to validate the package, then consult an IT professional. Man in the middle attacks are serious, and can result in you losing your funds from the node.

1. Unzip the package and move the `aion` directory to your home `~` directory:

```bash
tar xvjf aion-v0.3.3.22362091d-2019-03-07.tar.bz2
mv aion ~/
```

2. Move to your `aion` directory and create an address & keystore:

```bash
cd ~/
~/aion/aion.sh -a create
```

1. Enter a password and write it down, you'll need it later.
2. The terminal shows an account address. Write it down somewhere, you'll need this later.

```bash
~/.aion/aion.sh -a create

> Please enter a password:
> Please re-enter your password:
> A new account has been created: 0xa09...
```

7. The build script creates a keystore file in `aion/keystore`. Create a backup of the file:

### On a Local Machine

```bash
cp ~/aion/mainnet/keystore/* ~/Documents/aion-keystore
```

Make a copy of this `keystore` file and store it somewhere other than the computer you are installing the Java kernel on. Move onto Step 8.

### On a Remote Machine over SSH

    ```bash
    # exit your remote machine
    exit

    # copy the aion keystore to your local machine
    scp user@node_ip_address:~/aion/mainnet/keystore/* ~/Desktop
    ```

Make a copy of this `keystore` file and store it somewhere other than the computer you are installing the Java kernel on. Reconnect to your remote machine:

    ```bash
    ssh user@remote-node-ip
    ```

8. Run the Aion Java kernel:

```bash
~/aion/aion.sh
```

This process can take up to 72 hours depending on the speed of your network and the size of the database you are syncing.