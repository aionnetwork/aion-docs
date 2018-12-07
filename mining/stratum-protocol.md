---
Title: Stratum Protocol
---

In order to support the Aion PoW algorithm the stratum protocol definition has been modified to fit Aion. This document describes protocol version 1 which will be the first stratum standard supported by Aion.

## Specifications

A handshake occurs after a TCP connection is established from a miner to the pool. The miner starts the handshake with the following:

```json
{
  "id": 1, 
  "method": "mining.subscribe",
  "params": [
    “MinerName/Version, “ProtocolVersion”
  ]
}
```

The server may choose to drop client at this point if it does not support the given protocol version. Server replies back with the session `id` and `extraNonce` value:

```json
{
  “id”: 1,
  “result”: [
    “sessionId”,
    “extraNonce”
  ]
  “extraNonce”
}
```

The miner must then authorize with the following message:

```json
{
  “id”: 2,
  “mining.authorize”,
  “params”:[
    “workerName”
    “password” (Optional)
  ]
}
```

Once validation a miners subscription request a server may reply with a `set_difficulty` message if the server supports `varDiff` mining. Otherwise, the server may reply immediately with a `mining.notify` message.

```json
{
  “id”: null, 
  “method”: “mining.notify”,
  “params” : [
    “jobId”,
    “true”,
    “target”,
    “headerHash”
  ]
}
```

Parameters:

1. Job ID in hex
2. Clean job, may be set to false to allow miners currently mining this block to continue without interruption. If true, instructs miners to drop the current job and begin work on the new job.
3. 64 character hex string target for the current job.
4. Hash of the header, used as input to the Equi2109 algorithm as well as block identification in the Aion kernel.

Clients submit jobs by sending:

```json
{
    “id”: “messageId”,
    “method”: “mining.submit”,
    “params”: [
        “workerId”,
        “jobId”,
        “nTime”,
        “extraNonce2”,
        “solution”
    ]
}
```

Parameters:

1. Worker Id to which to assign the share
2. Original job ID
3. Submit timestamp
4. Client generated extraNonce value
5. Calculated Equihash solution