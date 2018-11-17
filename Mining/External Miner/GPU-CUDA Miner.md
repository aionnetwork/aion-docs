---
title: "GPU-CUDA Miner"
excerpt: ""
---
[block:callout]
{
  "type": "info",
  "title": "Windows and Alternative Linux Distributions",
  "body": "This external miner assumes you will be mining with a Linux Ubuntu machine. Our community has developed other mining software compatible with both Windows and other Linux distributions. Links can be found in our [external resources section](https://docs.aion.network/docs/external-resources)."
}
[/block]

[block:api-header]
{
  "title": "Prerequisites"
}
[/block]
You will need:
- [Ubuntu 16.04 or a later version](https://www.ubuntu.com/download/desktop) (installation tutorial [here](https://tutorials.ubuntu.com/tutorial/tutorial-install-ubuntu-desktop#0))
- [Aion node](doc:node-set-up)
- CUDA 9.0 compatible driver (NVIDIA 387.34+)
[block:api-header]
{
  "title": "Set-up"
}
[/block]
1. Download the pre-built GPU miner binary aionminer_CUDA.tar.bz2 from the aion_miner [release page](https://github.com/aionnetwork/aion_miner/releases)
2. Extract the aionminer folder to the desired location
3. Run the aionminer file with the desired parameter values:
[block:parameters]
{
  "data": {
    "h-0": "**Parameter**",
    "h-1": "**Input**",
    "h-2": "**Description**",
    "0-0": "```-h```",
    "1-0": "```-l```",
    "2-0": "```-u```",
    "3-0": "```-a```",
    "4-0": "```-d```",
    "5-0": "```-b```",
    "6-0": "```ci```",
    "7-0": "```-cv```",
    "8-0": "```-cd```",
    "9-0": "```-cb```",
    "10-0": "```-ct```",
    "0-1": "help",
    "1-1": "location",
    "2-1": "username",
    "3-1": "port",
    "4-1": "level",
    "5-1": "benchmark",
    "6-1": "information",
    "7-1": "solver",
    "8-1": "devices",
    "9-1": "blocks",
    "10-1": "threads",
    "0-2": "Print this help message and quits",
    "1-2": "Stratum server:port",
    "2-2": "Username (aion address)",
    "3-2": "Local API port (default: 0 = do not bind)",
    "4-2": "Debug print level (0 : print all, 5 : fatal only, default: 2)",
    "5-2": "[=arg(=200)] Run in benchmark mode (default: 200 iterations)",
    "6-2": "Show CUDA info",
    "7-2": "CUDA solver (0 = djeZo, 1 = tromp, default=1)",
    "8-2": "Enable mining on spec. devices",
    "9-2": "Number of blocks (per device)",
    "10-2": "Number of threads per block (per device)"
  },
  "cols": 3,
  "rows": 11
}
[/block]
Please refer to the above GPU-CUDA Miner Parameters. The following example will run the AION CUDA miner with 64 blocks and 64 threads per block on device 0 using solver version 1 (CUDA Tromp):

```
./aionminer -cd 0 -cv 1 -cb 64 -ct 64 -u {0xacc}
```
[block:api-header]
{
  "title": "Running a benchmark on your GPU (optional):"
}
[/block]
The benchmark will assess the performance of your GPU configuration by running 200 blocks.

This example will run a benchmark on your GPU using 64 blocks and 64 threads per block on device 0 and the CUDA-Tromp solver:

```
./aionminer -cd 0 -cv 1 -cb 64 -ct 64 -b
```