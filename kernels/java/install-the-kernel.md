# Install the Kernel

This section walks you through installing the kernel from a package. You can either generate your own package by [building the kernel from source](build-from-source), or you can download a [pre-built package from Github](https://github.com/aionnetwork/aion/releases).

We have used the latest build as an example on this page. If you want to use a different version of the Aion kernel you will need to change the commands to fit the version you are using. We do not recommend always using the latest Aion kernel version.

## Prerequisites

- [Ubuntu 16.04 or later](http://releases.ubuntu.com/16.04/)
- [Open JDK 11](https://download.java.net/java/GA/jdk11/13/GPL/openjdk-11.0.1_linux-x64_bin.tar.gz)
- [Apache Ant 1.10](http://ant.apache.org/bindownload.cgi)
- `8GB` RAM
- CPU with `SSE4.2` support

## Run the Installation

1. Connect to your machine via SSH or open a terminal if you are working on a local installation.
2. Change to your root `~` directory and update your system:

    ```bash
    cd ~
    sudo apt update -y && sudo apt upgrade -y
    ```

3. Unzip the package and move the `aion` directory to your home `~` directory:

    ```bash
    tar xvjf aion-v0.3.3.22362091d-2019-03-07.tar.bz2
    mv aion ~/
    ```

4. Move to your `aion` directory and create an address & keystore:

    ```bash
    cd ~/
    ~/aion/aion.sh -a create
    ```

5. Enter a password and write it down, you'll need it later.
6. The terminal shows an account address. Write it down somewhere, you'll need this later.

    ```bash
    ~/.aion/aion.sh -a create

    > Please enter a password:
    > Please re-enter your password:
    > A new account has been created: 0xa09...
    ```

7. The build script creates a keystore file in `aion/keystore`. Create a backup of the file:

    **On a Local Machine**:

    ```bash
    cp ~/aion/mainnet/keystore/* ~/Documents/aion-keystore
    ```

    Make a copy of this `keystore` file and store it somewhere other than the computer you are installing the Java kernel on. Move onto Step 8.

    **On a Remote Machine over SSH**

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

    Move onto Step 8.

8. Run the Aion Java kernel:

    ```bash
    ~/aion/aion.sh
    ```

    The kernel will now begin to _sync_ with the other nodes on the network. This process can take up to 72 hours depending on the speed of your network and the size of the database you are syncing.

Everything is now complete. You have successfully install the Aion Java kernel on your system.