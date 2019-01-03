---
title: Build Your Own
weight: 3
---

# Build Your Own

If you want to compile your own package, follow these steps. You do not have to do this if you have downloaded one of the pre-compiled packages from Github.

## Prerequisites

- Ubuntu 16.04 or later version
- Oracle Java SE Development Kit 11
- Apache Ant 1.10
- 8GB RAM
- CPU with SSE4.2 support

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

5. Verify that the build works:

```bash
ant test
```

6. Once the build has finished, you should be able to see a file like `aion-v<KERNEL VERSION>.<GIT REVISION>-<BUILD DATE>.tar.bz2` within the `pack` directory. This is your kernel build.

You can use the [precompiled package instructions](#section-precompiled-packages) to install your Aion kernel. You do not have to install the kernel on the same machine you used to build the package.