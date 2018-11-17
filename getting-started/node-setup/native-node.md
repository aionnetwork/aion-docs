Native nodes are ran on your local machine or server. You can either run one of the [precompiled packages](#section-precompiled-packages), or [build your own](#section-build-your-own)

# Pre-compiled Packages

Use one of the pre-compiled packages to get up and running faster.

1. Connect to your machine via SSH or open a terminal if you are working on a local installation.
2. Change to your root `~` directory and update your system: 

```bash
cd ~
sudo apt update -y && sudo apt upgrade -y
```

3. Download and unzip the latest Aion build from https://github.com/aionnetwork/aion/releases: 

```bash
wget https://github.com/aionnetwork/aion/releases/download/v0.3.1/aion-v0.3.1.dcaf9e8-2018-08-30.tar.bz2
tar xvjf aion-v0.3.1.dcaf9e8-2018-08-30.tar.bz2
```

4. Create an address and keystore:

```bash
~/aion/aion.sh -a create
```

5. Enter a password. You should write this down, you'll need it later.
6. The terminal shows an account address. Copy it down somewhere, as you'll need this later.

```
user@local:~$ ~/.aion/aion.sh -a create
Please enter a password:
Please re-enter your password:
A new account has been created: 0xa09...

user@local:~$ _
```

7. The build script creates a keystore file in `aion/keystore`. Create a backup of the file:

**On a Local Machine**

```bash
cp ~/aion/keystore/* ~/Documents/aion-keystore 
```

**On a Remote Machine (via SSH)**

Replace `user` and `node_id_address` with your credentials.

```bash
scp user@node_ip_address:~/aion/keystore/* ~/Desktop
```

8. Start syncing your node:

```
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