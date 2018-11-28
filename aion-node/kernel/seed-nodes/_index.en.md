---
title: Seed Nodes
weight: 1
chapter: false
---

# Seed Nodes

Aion seed nodes are the 24/7 running nodes keeping the most adequate and reliable chain, and are the best solution for runnning an initial synchronization and time-check.

## Deployment Details

Here is the list of world regions and the seed nodes IP addresses representing them:

### America North

- `13.92.155.115`
- `13.89.244.125`
- `66.207.217.190`

### America South

- `191.232.164.119`

### Europe West

- `51.144.42.220`

### Asia East

- `52.231.187.227`

```xml
<nodes>
    <node>p2p://c33d1066-8c7e-496c-9c4e-c89318280274@13.92.155.115:30303</node>
    <node>p2p://c33d2207-729a-4584-86f1-e19ab97cf9ce@51.144.42.220:30303</node>
    <node>p2p://c33d302f-216b-47d4-ac44-5d8181b56e7e@52.231.187.227:30303</node>
    <node>p2p://c33d4c07-6a29-4ca6-8b06-b2781ba7f9bf@191.232.164.119:30303</node>
    <node>p2p://c33d5a94-20d8-49d9-97d6-284f88da5c21@13.89.244.125:30303</node>
    <node>p2p://741b979e-6a06-493a-a1f2-693cafd37083@66.207.217.190:30303</node>
</nodes>
```

## Configuration Files

Each seed node configuration file is found at `config/config.xml`.

### Q4 Mastery

```xml
<nodes>
    <node>p2p://a30d1000-8c7e-496c-9c4e-c89318280274@168.62.170.146:30303</node>
    <node>p2p://a30d2000-729a-4584-86f1-e19ab97cf9ce@23.96.22.19:30303</node>
    <node>p2p://a30d3000-216b-47d4-ac44-5d8181b56e7e@137.117.56.84:30303</node>
</nodes>
```

### Q3 Conquest

```xml
<nodes>
    <node>p2p://a25d1000-8c7e-496c-9c4e-c89318280274@40.117.138.214:30303</node>
    <node>p2p://a25d2000-729a-4584-86f1-e19ab97cf9ce@104.211.28.191:30303</node>
    <node>p2p://a25d3000-216b-47d4-ac44-5d8181b56e7e@23.101.139.58:30303</node>
    <node>p2p://a25d4000-6a29-4ca6-8b06-b2781ba7f9bf@23.101.134.120:30303</node>
</nodes>
```

### Q2 Ascent

```xml
<nodes>
  <node>p2p://c33d5406-6359-4198-a15a-bbe3110390e8@52.231.206.150:30303</node>
</nodes>
```