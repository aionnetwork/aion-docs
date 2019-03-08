# Native Node

Native nodes run on your local machine or server. You can either run one of the [precompiled packages](#section-precompiled-packages), or [build your own](#section-build-your-own)

Make sure you're running **Ubuntu 16.04 or higher**. Currently we cannot support all Unix, however, it may be possible to run the kernel on other Linux distributions. Sadly the kernel will not work on a Mac. Take a look at the [community made Docker image](https://github.com/satran004/aion-fastvm-docker) if you want to test things out on other systems.

## Pre-compiled Packages

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

### On a Local Machine

```bash
cp ~/aion/mainnet/keystore/* ~/Documents/aion-keystore
```

### On a Remote Machine over SSH

    # exit your remote machine
    exit

    # copy the aion keystore to your local machine
    scp user@node_ip_address:~/aion/mainnet/keystore/* ~/Desktop

8. Reconnect to your remote machine (if you disconnected) and start syncing your node:

```bash
~/aion/aion.sh
```

This process can take up to 72 hours depending on the speed of your network.

---

## Build Your Own

If you want to compile your own package, follow these steps. You do not have to do this if you have downloaded one of the pre-compiled packages from Github.

### Prerequisites

- [Ubuntu 16.04 or later](http://releases.ubuntu.com/16.04/)
- [Open JDK 11](https://download.java.net/java/GA/jdk11/13/GPL/openjdk-11.0.1_linux-x64_bin.tar.gz)
- [Apache Ant 1.10](http://ant.apache.org/bindownload.cgi)
- 8GB RAM
- CPU with `SSE4.2` support

### Build Process

1. Update your `apt` cache and install required dependencies:

```bash
sudo apt 
sudo apt-get install -y git g++ cmake wget llvm-4.0 lsb-release libjsoncpp1 libjsoncpp-dev libboost1.58-all-dev libzmq5 libstdc++6 libgcc1 libpgm-5.2-0
```

2. Clone the Aion repository:

```bash
git clone --recursive https://github.com/aionnetwork/aion
```

3. Move into the `aion` folder:

```bash
cd aion
```

4. Check that your environment settings are correct:

```bash
export JAVA_TOOL_OPTIONS=-Dfile.encoding=UTF8
export JAVA_HOME=/usr/lib/jvm/jdk-11.0.1
export ANT_HOME=$HOME/IDE/apache-ant-1.10.3
PATH="$ANT_HOME/bin:$JAVA_HOME/bin:$PATH"
```

5. Link the Java executable to the JDK folder:

```bash
ln -s YOUR/JDK/INSTALLATION/PATH /usr/lib/jvm/jdk-11.0.1
```

6. Load in the changes you just made to your `bashrc`/`bash_profile` file:

```bash
source ~/.bashrc
```

7. Build the package:

```bash
./gradlew build
```

8. Verify the code by running through the test cases:

```bash
./gradlew test -x aion_api:test
```

9. Pack everything up:

```bash
./gradlew pack
```

10. Inside the `pack` folder you should see a file similar to `aion-v<KERNEL_VERSION>.<GIT_REVISION>-<BUILD_DATE>.tar.bz2`:

```bash
ls pack

> aion-v0.1.12.2c5119a-2018-02-28.tar.bz2
```

This is your kernel build.

11. To pack everything into a Docker image run `./gradlew packDocker`.

### FastVM and the Solidity Compiler

To build the FastVM and the Solidity compiler native library from source code run `ant full_build` before running `./gradlew build`. This will take quite a while and requires Ubuntu 16.04.