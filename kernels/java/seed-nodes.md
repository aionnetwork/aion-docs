# Seed Nodes

Aion _seed nodes_ are node that run 24/7. They help keep the network up to date, and hold the most reliable chain. Use these nodes when running an initial sync of your node.

## Deployment Details

Here is the list of the seed nodes available to each region:

### America North

- `13.92.157.19`
- `40.78.84.78`
- `66.207.217.190`

### America South

- `191.232.164.119`

### Asia East

- `52.231.187.227`

### Europe West

- `51.144.42.220`

## Configuration Example

```xml
<nodes>
    <node>p2p://c33d2207-729a-4584-86f1-e19ab97cf9ce@51.144.42.220:30303</node>
    <node>p2p://c33d302f-216b-47d4-ac44-5d8181b56e7e@52.231.187.227:30303</node>
    <node>p2p://c33d4c07-6a29-4ca6-8b06-b2781ba7f9bf@191.232.164.119:30303</node>
    <node>p2p://741b979e-6a06-493a-a1f2-693cafd37083@66.207.217.190:30303</node>
    <node>p2p://741b979e-6a06-493a-a1f2-693cafd37083@13.92.157.19:30303</node>
    <node>p2p://741b979e-6a06-493a-a1f2-693cafd37083@40.78.84.78:30303</node>
</nodes>
```

See the [Configuration File](configuration-file) section for more details.