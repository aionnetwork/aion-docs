---
title: 
weight: 1
chapter: false
---

# Enabling Secure connection for Aion Java API

Securing traffic between client application and Kernel is common security case. AION provides a conventional mechanism to enable secure connection for Java API client. Please refer to steps below.

## Requirements

1. AION Kernel `v0.3.2` or later version
1. AION Java API `v0.1.13` or later version

## Configuration

To turn on the Java API service with a secure connection. The first step is going to the `${network folder}/config/config.xml`, find the settings inside the API category. There is a string `<java active="true"`, the default is `false`. Therefore set it to `true`. For the secure-connect, the default is `true`.

```xml
<api>
...
    <java active="true" ip="127.0.0.1" port="8547">
    <secure-connect>true</secure-connect>
    </java>
...
</api>
```

Once config enable the api secure connection, the kernel will automatically generate the curve keypair, you can find the key pair files in the `zmq_keystore` folder.

```bash
drwxr-xr-x 10 jay jay 4096 Nov 23 15:27 ./
drwxr-xr-x 10 jay jay 4096 Nov 23 15:12 ../
-rwxr-xr-x 1 jay jay 571 Nov 23 11:37 aion_gui.sh*
-rwxr-xr-x 1 jay jay 6015 Nov 23 11:37 aion.sh*
drwxr-xr-x 6 jay jay 4096 Nov 23 15:11 config/
drwxr-xr-x 5 jay jay 4096 Nov 23 15:11 console/
drwxr-xr-x 2 jay jay 4096 Nov 23 15:11 jars/
drwxr-xr-x 6 jay jay 4096 Nov 23 15:27 mainnet/
drwxr-xr-x 3 jay jay 4096 Nov 23 15:11 native/
drwxr-xr-x 7 jay jay 4096 Nov 23 15:11 rt/
drwxr-xr-x 2 jay jay 4096 Nov 23 15:11 script/
drwxr-xr-x 2 jay jay 4096 Nov 23 15:27 zmq_keystore/
aion@aion-1234567:~/workspace/aion/pack/aion$ cd zmq_keystore/

aion@aion-1234567:\~/workspace/aion/pack/aion/zmq\_keystore$ ll

total 16

drwxr-xr-x 2 jay jay 4096 Nov 23 15:27 ./

drwxr-xr-x 10 jay jay 4096 Nov 23 15:27 ../

\-rwxr----- 1 jay jay 40 Nov 23 15:27
UTC--18-11-23T20-27-45Z--zmqCurvePubkey\*

\-rwxr----- 1 jay jay 40 Nov 23 15:27
UTC--18-11-23T20-27-45Z--zmqCurveSeckey\*

jay@jay-GL63-8RC:\~/workspace/aion/pack/aion/zmq\_keystore$

Create a folder "zmq\_keystore" under the client API executing path and
copy the public key (\*\*\*\*\*\*--zmqCurvePubkey) to the folder.

**Client configuration**

When you execute the client API, it will generate a default config into
the config folder under the API client executing path.

aion@aion-1234567:\~/workspace/aion/aion\_api/pack$ cd config/

aion@aion-1234567:\~/workspace/aion/aion\_api/pack/config$ nano
apiconfig.xml

Inside the config file, set the secure-connect to "true"

\<?xml version="1.0" encoding="utf-8"?\>

\<aion\_api\>

\<secure-connect\>true\</secure-connect\>

\<log\>

\<SOL\>INFO\</SOL\>

\<EXE\>INFO\</EXE\>

\<BSE\>INFO\</BSE\>

\<CHN\>INFO\</CHN\>

\<CNT\>INFO\</CNT\>

\<ADM\>INFO\</ADM\>

\<TRX\>INFO\</TRX\>

\<NET\>INFO\</NET\>

\<WLT\>INFO\</WLT\>

\</log\>

\</aion\_api\>
