---
title: "CPU Miner"
excerpt: ""
---
[block:callout]
{
  "type": "info",
  "title": "For Testing Only",
  "body": "The CPU miner is for testing and developing on the test network only. Do not use this miner on the main network or in a production environment. It will not work."
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
[block:api-header]
{
  "title": "Set-up"
}
[/block]
1. Download the the pre-built CPU miner binary aionminer_CPU.tar.bz2 from the aion_miner [release page](https://github.com/aionnetwork/aion_miner/releases) 
2. Extract the folder to your desired location
3. Open terminal and run aionminer with the desired parameter values:

[block:parameters]
{
  "data": {
    "0-0": "```-h```",
    "1-0": "```-l```",
    "2-0": "```-u```",
    "3-0": "```-a```",
    "4-0": "```-d```",
    "5-0": "```-b```",
    "6-0": "```-t```",
    "0-1": "help",
    "1-1": "location",
    "2-1": "username",
    "3-1": "port",
    "4-1": "level",
    "5-1": "benchmark",
    "6-1": "threads",
    "0-2": "Print this help message and quits",
    "1-2": "Stratum server:port",
    "2-2": "Username (aion address)",
    "3-2": "Local API port (default: 0 = do not bind)",
    "4-2": "Debug print level (0 : print all, 5 : fatal only, default: 2)",
    "5-2": "[=arg(=200)] Run in benchmark mode (default: 200 iterations)",
    "6-2": "Number of CPU threads -e [ext] Force CPU ext (0 = SSE2, 1 = AVX, 2 = AVX2)",
    "h-0": "Parameter",
    "h-1": "Input",
    "h-2": "Description"
  },
  "cols": 3,
  "rows": 7
}
[/block]

[block:callout]
{
  "type": "warning",
  "title": "CPU Threads",
  "body": "We recommend that you allocate between 25% - 75% of your system's total number of CPUs."
}
[/block]
Please refer to the above CPU Miner Parameters. The following example will run the AION CPU miner with 4 threads connecting to a mining pool running locally, listening on port 3333 for incoming connections:

```
./aionminer -t 4 -l 127.0.0.1:3333 -u {0xacc}
```
[block:api-header]
{
  "title": "Running a Benchmark on your CPU"
}
[/block]
The default benchmark will assess the performance of your CPU configuration by running 200 blocks.

This example will run a benchmark on your CPU using a single thread: 

```
./aionminer -b -t 1
```