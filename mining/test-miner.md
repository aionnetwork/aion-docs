---
Title: Test Miner
---

# Test Miner

## Prerequisites

You will need:

- [Ubuntu 16.04 or a later version](https://www.ubuntu.com/download/desktop)
- [Aion node](doc:node-set-up)

Set-Up

The internal miner runs on the local node and is provided with the kernel. It can be configured by modifying the `config.xml` file in the `aion/config/`. To setup internal mining, update the following fields in the consensus section:

```json
{
  "data": {
    "h-0": "Field",
    "h-1": "Configuration",
    "0-0": "**Mining**",
    "1-0": "**Miner-address**",
    "2-0": "**Cpu-mine-threads**",
    "3-0": "**extraData**",
    "3-1": "Any hex string up to 32 bytes",
    "2-1": "The number of logical CPU cores to use for mining. This number should be between 1 and 75% of your maximum CPU logical cores. \n\nThe number of logical cores may be seen in either Task Manager (Windows) or System Monitor (Ubuntu). It is not recommended to go above 75% of the total logical cores.",
    "1-1": "The wallet address that will collect AION for mining blocks. The account address created in creating accounts section can be used for this purpose",
    "0-1": "Set to true to enable internal mining"
  },
  "cols": 2,
  "rows": 4
}
```

Once the config file has been updated and saved, re-launch the kernel to run the new settings.  Mining is normally delayed 10 seconds to allow sufficient time for the kernel to fully start.

An example configuration for the consensus section:

```json
{
  "codes": [
    {
      "code": "<consensus>\n  <mining>true</mining>\n  <miner-address>0xa0----------------your-account-address--------------------------</miner-address>\n  <cpu-mine-threads>2</cpu-mine-threads>\n  <extra-data>MyAion</extra-data>\n<consensus>",
      "language": "xml"
    }
  ]
}
```

More information on the sections of the `config.xml` file can be found on the [GitHub repository](https://github.com/aionnetwork/aion/blob/e22231526367328e84ee9b342288eeb7bc0e9ed3/modBoot/resource/config.xml).