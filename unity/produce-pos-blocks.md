---
title: Produce PoS Blocks
---

## External Staker Update

If you are already running Amity prior to the network reset on Oct 31st, make sure to follow this guide once again to get the latest release and instructions.

## Introduction

We have a very simple external staker tool available for stakers to sign PoS blocks on Unity. If the staker wins the lottery, the staker can use this tool to interact with a Unity-enabled node over RPC.

Once launched, the external staker repeatedly queries the node over RPC and submits signed staking blocks. Please note that it aggressively sends a signed block as soon as it produces it; the nodes must reject future blocks if they want to.

## Prerequisites

- [Open JDK 11 or up](https://download.java.net/java/GA/jdk11/13/GPL/openjdk-11.0.1_linux-x64_bin.tar.gz)

## Get the External Staker

Open a terminal and run the following command:

```bash
 wget https://github.com/aionnetwork/block_signer/archive/Oct30signer.tar.gz
tar xvf Oct30signer.tar.gz
 cd block_signer-Oct30signer/

```

## Launch the External Staker

We will be using `block_signer.jar`  for interacting with a Unity-enabled node via RPC.

**Usage**:

```text
 <signingAddressPrivateKey> <identityAddress> <ip> <port>
```

**Inputs**:

- `signingPrivateKey`: First 32-byte or the full 64-byte private key of the pool operator's signing key with `0x`.
- `identityAddress`: The pool's identity address, which is also the public key of the pool operator's management key.
- `IP` (optional): the IP address of the node. Make sure that the RPC port is open. If this argument is not provided, *127.0.0.1* is used as default.
- `port` (optional): the port on which the node is accepting RPC requests. If this argument is not provided, *8545* is used as default.

**Example**:

- Local node
  
```bash
java -jar block_signer.jar 0x******************************************************************* 0xa0df2de13945675e009445e8bc6f3ec2f0a54262a6dc78c76c1a58e333322b64
```

- External node

```bash
java -jar block_signer.jar 0x******************************************************************* 0xa0df2de13945675e009445e8bc6f3ec2f0a54262a6dc78c76c1a58e333322b64 32.101.5.8 8545
```

Then the external staker should be trying to produce PoS blocks now! A successful RPC call for `submitsignature` indicates that the staker has produced a PoS block:

```text
[2019-10-15T22:24:57.872Z org.aion.harness.main.RPC] -->{"jsonrpc":"2.0","method":"submitsignature","params":["0xb6296b4d1798c35cd517b717528ad075c528615c6b727145f91e8b95edaff0570be0b8d86d06740abb4ad71b6e0e966d62c29b2ceeb2f61fadae07091e205809", "0x7b9e11df3b1bd6c69959ffb2f49eb238737e31047f3cf94b819f3a1ac559e989"],"id":1}
```

## Note

### Opening an RPC Port for Java Client

Navigate to your Aion kernel folder and run the following command in a terminal:

```bash
nano amity/config/config.xml
```

and set RPC active to true:

```text
<rpc active="true" ip="127.0.0.1" port="8545">
```

### Opening an RPC Port for Rust Client

Navigate to your Aion kernel folder and run the following command in a terminal:

```bash
nano amity/amity.toml
```

and make sure `http` connection is set to:

```text
[http]
disable = false
port = 8545
```
