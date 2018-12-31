---
title: Pre-compiled Package
weight: 2
---

# Pre-compiled Packages

Use one of the pre-compiled packages to get up and running faster. We have used the latest build as an example on this page. If you want to use a different version of the Aion kernel you will need to change the commands to fit the version you are using. We do not recommend always using the latest Aion kernel version.

1. Connect to your machine via SSH or open a terminal if you are working on a local installation.
2. Change to your root `~` directory and update your system:

```bash
cd ~
sudo apt update -y && sudo apt upgrade -y
```

1. Download and validate the [latest build from Github](https://github.com/aionnetwork/aion/releases):

```bash
wget https://github.com/aionnetwork/aion/releases/download/v0.3.2/aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2 https://github.com/aionnetwork/aion/releases/download/v0.3.2/SHA1SUMS
sha1sum -c SHA1SUMS
```

If the terminal outputs `aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2: OK` then the package passed the validation.

If it failed, **stop here and reboot your machine** - you may have been a victim to a [man-in-the-middle attack](https://en.wikipedia.org/wiki/Man-in-the-middle_attack). Consult your administrator to find out the next course of action.

1. Unzip the package and move the `aion` directory to your home `~` directory:

```bash
tar xvjf aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2
mv aion ~/
```

2. Move to your `aion` directory and create an address & keystore:

```bash
cd ~/
~/aion/aion.sh -a create
```

5. Enter a password. You should write this down, you'll need it later.
6. The terminal shows an account address. Copy it down somewhere, as you'll need this later.

```bash
user@local:~$ ~/.aion/aion.sh -a create
Please enter a password:
Please re-enter your password:
A new account has been created: 0xa09...

user@local:~$ _
```

7. The build script creates a keystore file in `aion/keystore`. Create a backup of the file:

## On a Local Machine

```bash
cp ~/aion/mainnet/keystore/* ~/Documents/aion-keystore
```

## On a Remote Machine over SSH

    # exit your remote machine
    exit

    # copy the aion keystore to your local machine
    scp user@node_ip_address:~/aion/mainnet/keystore/* ~/Desktop

8. Reconnect to your remote machine (if you disconnected) and start syncing your node:

```bash
~/aion/aion.sh
```

This process can take up to 72 hours depending on the speed of your network.