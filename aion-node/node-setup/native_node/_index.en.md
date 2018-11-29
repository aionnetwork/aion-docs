---
title: Native Node
weight: 1
chapter: true
---

# Native Node

Native nodes are ran on your local machine or server. You can either run one of the [precompiled packages](#section-precompiled-packages), or [build your own](#section-build-your-own)

Make sure you're running **Ubuntu 16.04 or higher**. Currently we cannot support all Unix, however it may be possible to run the kernel on other Linux distributions. Sadly the kernel will definately not work on a Mac. Take a look at the [community made Docker image](https://github.com/satran004/aion-fastvm-docker) if you want to test things out on other systems.

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
wget https://github.com/aionnetwork/aion/releases/download/v0.3.2/aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2
```

1. Unzip the package:

```bashg
tar xvjf aion-v0.3.2.2cfa29c-2018-11-28.tar.bz2
```

2. Create an address and keystore:

```bash
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
cp ~/aion/keystore/* ~/Documents/aion-keystore
```

## On a Remote Machine over SSH

Replace `user` and `node_id_address` with your credentials.

```bash
scp user@node_ip_address:~/aion/keystore/* ~/Desktop
```

1. Start syncing your node:

```bash
~/aion/aion.sh
```

This process can take up to 72 hours depending on the speed of your network.

---

# Build Your Own

If you want to compile your own package, follow these steps. You do not have to do this if you have downloaded one of the pre-compiled packages from Github.

## Prerequisites

- Ubuntu 16.04 or later version
- Oracle Java SE Development Kit 11
- Apache Ant 1.10
- 8GB RAM
- CPU need to support SSE4.2

## Build Process

1. Update your `apt` cache and install required dependencies:

```bash
sudo apt update
sudo apt install -y git g++ cmake wget llvm-4.0 lsb-release libjsoncpp1 libjsoncpp-dev libboost1.58-all-dev libzmq5 libstdc++6 libgcc1 libpgm-5.2-0
```

2. Clone the Aion repository:

```bash
git clone --recursive https://github.com/aionnetwork/aion
```

3. Edit you `$PATH` by changing your `.bash_rc` file:

```bash
export JAVA_TOOL_OPTIONS=-Dfile.encoding=UTF8
export JAVA_HOME=$HOME/IDE/java/jdk-10.0.1
export ANT_HOME=$HOME/IDE/apache-ant-1.10.3
PATH="$ANT_HOME/bin:$JAVA_HOME/bin:$PATH"
```

4. Move into the `aion` directory and build the project using `ant`:

```bash
cd aion
ant pack_build
```

5. Verify the build code:

```bash
ant test
```

6. Once the build has finished, you should be able to see a file like `aion-v<KERNEL VERSION>.<GIT REVISION>-<BUILD DATE>.tar.bz2` within the `pack` directory. This is your kernel build.

You can use the [precompiled package instructions](#section-precompiled-packages) to install your Aion kernel. You do not have to install the kernel on the same machine you used to build the package.