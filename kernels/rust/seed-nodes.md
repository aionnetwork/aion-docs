# Seed Nodes

Aion seed nodes are the 24/7 running nodes keeping the most adequate and reliable chain, and are the best solution for runnning an initial synchronization and time-check.

## Deployment Details

Here is the list of world regions and the seed nodes IP addresses representing them:

### America North

- `13.92.157.19`
- `40.78.84.78`
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