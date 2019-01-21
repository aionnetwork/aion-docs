---
title: Build Your Own
weight: 3
---

# Build Your Own

If you want to compile your own package, follow these steps. You do not have to do this if you have downloaded one of the pre-compiled packages from Github.

## Prerequisites

- [Ubuntu 16.04 or later](http://releases.ubuntu.com/16.04/)
- [Open JDK 11](https://download.java.net/java/GA/jdk11/13/GPL/openjdk-11.0.1_linux-x64_bin.tar.gz)
- [Apache Ant 1.10](http://ant.apache.org/bindownload.cgi)
- 8GB RAM
- CPU with `SSE4.2` support

## Build Process

1. Update your `apt` cache and install required dependencies:

    ```bash
    sudo apt update
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

## FastVM and the Solidity Compiler

To build the FastVM and the Solidity compiler native library from source code run `ant full_build` before running `./gradlew build`. This will take quite a while and requires Ubuntu 16.04.