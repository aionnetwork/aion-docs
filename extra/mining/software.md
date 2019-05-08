# Mining Software

There are two types of miners that are options for external mining:

- [CPU](doc:cpu-miner)
- [GPU-CUDA](doc:gpu-cuda-miner)

GPUs have a more specialized and specific architecture than CPUs, making them faster for mining and increases the potential `AION` reward. However, the specific hardware required for GPU-CUDA mining (NVIDIA 387.34+) may require separate installation onto your machine, and thus CPU mining may be more convenient.

---

## CPU Miner

**For testing only**: The CPU miner is for testing and developing on the test network only. Do not use this miner on the main network or in a production environment. It will not work.

### Prerequisities

You will need:
- [Ubuntu 16.04 or a later version](https://www.ubuntu.com/download/desktop) (installation tutorial [here](https://tutorials.ubuntu.com/tutorial/tutorial-install-ubuntu-desktop#0))
- [Aion node](doc:node-set-up)

### Setup

1. Download the the pre-built CPU miner binary aionminer_CPU.tar.bz2 from the aion_miner [release page](https://github.com/aionnetwork/aion_miner/releases) 
2. Extract the folder to your desired location
3. Open terminal and run aionminer with the desired parameter values:

| Parameter | Input | Description |
| --- | --- | --- |
| `-h` | help | Prints help message and quits |
| `-l` | location | Stratum `server`:`port` |
| `-u` | username | Aion address |
| `-a` | port | Local API port (default: `0` = do not bind) |
| `-d` | level | Debug print level (`0`: print all, `5`: fatal only, `2`: default) |
| `-b` | benchmark | Run in benchmark mode (default: `200` iterations) |
| `-t` | threads | Number of CPU threads `-e` [ext] Force CPU ext (`0` = SSE2, `1` = AVX, `2` = AVX2) |

**CPU Usage**: We recommend that you allocate between 25% - 75% of your system's total number of CPUs.

Please refer to the above CPU Miner Parameters. The following example will run the AION CPU miner with 4 threads connecting to a mining pool running locally, listening on port 3333 for incoming connections:

```bash
./aionminer -t 4 -l 127.0.0.1:3333 -u {0xacc}
```

### Running a Benchmark on your CPU

The default benchmark will assess the performance of your CPU configuration by running 200 blocks.

This example will run a benchmark on your CPU using a single thread:

```bash
./aionminer -b -t 1
```

---

## GPU-CUDA Miner

**Windows and Alternative Linux Distributions**: This external miner assumes you will be mining with a Linux Ubuntu machine. Our community has developed other mining software compatible with both Windows and other Linux distributions. Links can be found in our [external resources section](https://docs.aion.network/docs/external-resources).

### Prerequisites

You will need:

- [Ubuntu 16.04 or a later version](https://www.ubuntu.com/download/desktop) (installation tutorial [here](https://tutorials.ubuntu.com/tutorial/tutorial-install-ubuntu-desktop#0))
- [Aion node](doc:node-set-up)
- CUDA 9.0 compatible driver (NVIDIA 387.34+)

### Setup

1. Download the pre-built GPU miner binary aionminer_CUDA.tar.bz2 from the aion_miner [release page](https://github.com/aionnetwork/aion_miner/releases)
2. Extract the aionminer folder to the desired location
3. Run the aionminer file with the desired parameter values:

| Parameter | Input | Description |
| --- | --- | --- |
| `-h` | help | Print help message and quits |
| `-l` | location | Stratum `server`:`port` |
| `-u` | username | Aion address |
| `-a` | port | Local API port (default: `0` = do not bind) |
| `-d` | level | Debug print level (`0`: print all, `5`: fatal only, `2`: default) |
| `-b` | benchmark | Run in benchmark mode (default: `200` iterations) |
| `-ci` | information | Show CUDA information |
| `-cv` | solver | CUDA solver (0 = djeZo, 1 = tromp, default=1) |
| `-cd` | devices | Enable mining on spec. devices |
| `-cb` | blocks | Number of Blocks (per device) |
| `-ct` | threads | Number of threads per block (per device) |

Please refer to the above GPU-CUDA Miner Parameters. The following example will run the AION CUDA miner with 64 blocks and 64 threads per block on device 0 using solver version 1 (CUDA Tromp):

```bash
./aionminer -cd 0 -cv 1 -cb 64 -ct 64 -u {0xacc}
```

Running a benchmark on your GPU

This step is optional: The benchmark will assess the performance of your GPU configuration by running 200 blocks.

This example will run a benchmark on your GPU using 64 blocks and 64 threads per block on device 0 and the CUDA-Tromp solver:

```bash
./aionminer -cd 0 -cv 1 -cb 64 -ct 64 -b
```

---

## Test Miner

For mining on the Testnet (Mastery) network, or a local development environment.

### Prerequisites

You will need:

- [Ubuntu 16.04 or a later version](https://www.ubuntu.com/download/desktop) (installation tutorial [here](https://tutorials.ubuntu.com/tutorial/tutorial-install-ubuntu-desktop#0))
- [Aion node](doc:node-set-up)

### Setup

The internal miner runs on the local node and is provided with the kernel. It can be configured by modifying the `config.xml` file in the `aion/config/`. To setup internal mining, update the following fields in the consensus section:

| Field | Configuration |
| --- | --- |
| Mining | Set to true to enable internal mining. |
| Miner Address | The wallet address that will collect AION for mining blocks. The account address created in creating accounts section can be used for this purpose. |
| CPU Mine Threads | The number of logical CPU cores to use for mining. This number should be between 1 and 75% of your maximum CPU logical cores. The number of logical cores may be seen in either Task Manager (Windows) or System Monitor (Ubuntu). It is not recommended to go above 75% of the total logical cores. |
| Extra Data | Any hex string up to 32 bytes. |

Once the config file has been updated and saved, re-launch the kernel to run the new settings.  Mining is normally delayed 10 seconds to allow sufficient time for the kernel to fully start.

An example configuration for the consensus section:

```bash
{
  "codes": [
    {
      "code": "<consensus>\n  <mining>true</mining>\n  <miner-address>0xa0----------------your-account-address--------------------------</miner-address>\n  <cpu-mine-threads>2</cpu-mine-threads>\n  <extra-data>MyAion</extra-data>\n<consensus>",
      "language": "xml"
    }
  ]
}
```

**Configure File**: More information on the sections of the `config.xml` file can be found on the [GitHub repository](https://github.com/aionnetwork/aion).