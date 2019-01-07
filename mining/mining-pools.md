---
Title: Mining Pools
---

# Mining Pools

This section will take you through the installation of the Aion solo mining pool, which should be used with the [external miner](/mining/external-miner). During the initial Kilimanjaro (Aion Phase 1) launch, only the Aion solo miner was officially supported on the network. We have since released Aion pool mining software for individuals to run their own pools:

- [Blog Post](https://blog.aion.network/new-aion-pool-software-6e3232527fa) (overview and features)
- [Github](https://github.com/aionnetwork/aion_pool2) (guide and installation)

## Solo Pool vs. Public Pool

A solo pool has one node mining for rewards at the network difficulty, with the full payout to the one account. With a public pool (not covered in this document), a group of nodes works together, distributing a reward proportional to each node's work when a block is mined by the pool. Often, there are fees associated with joining a public pool, and although rewards are received more consistently in a public pool, this may not guarantee benefit over solo-mining.

You can find a list of public pools that mine Aion under [External Resources](external-resources).

## Solo-mining Pools

### Prerequisites

In order to run the solo mining pool, you must already have:

- Aion [node](/aion-node) and [external miner](/mining/external-miner)
- Python v2.7*

Python is included by default with Ubuntu desktop, but may need to be installed separately in Ubuntu server (see below):

### Update Configure File

You will have to modify the **config.xml** file in the aion directory (aion/config/config.xml) before running the mining pool. Update the following fields in the *consensus* section:

```json
{
  "data": {
    "h-0": "Field",
    "h-1": "Configuration",
    "0-0": "**Mining**",
    "1-0": "**Miner-address**",
    "0-1": "Set to false to disable internal mining",
    "1-1": "The wallet address that will collect mined rewards. The account address created in creating accounts section can be used for this purpose"
  },
  "cols": 2,
  "rows": 2
}
```

Example of an updated consensus section to enable external mining:

```json
{
  "codes": [
    {
      "code": "<consensus>\n  <mining>false</mining>\n  <miner-address>0xa0----------------your-account-address--------------------------</miner-address>\n  <cpu-mine-threads>8</cpu-mine-threads>\n  <extra-data>AION</extra-data>\n<consensus>",
      "language": "xml"
    }
  ]
}
```

In the *APIs enabled* section, verify that the "stratum" option is included.

```json
{
  "codes": [
    {
      "code": "<apis-enabled>web3,eth,personal,stratum</apis-enabled>",
      "language": "xml"
    }
  ]
}
```

### Install and Run

1. Download the latest prepackaged mining pool file `aion-solo-pool-{version}.tar.gz` from the [`aion_miner` release page](https://github.com/aionnetwork/aion_miner/releases)
2. Extract the file to the desired directory
3. Open terminal in `aion-solo-pool-{VERSION}` directory, run the command

```bash
./configure.sh
```

The `configure.sh` script may take several minutes to complete, and should only be run once.

4. Once the script completes, run:

```bash
./run_quickstart.sh
```

5. Launch the Aion kernel in a **separate terminal**. Navigate to the **aion** directory and run:

```bash
./aion.sh
```

If you now have the kernel, miner, and solo-mining-pool running, congrats! You're now mining on Aion. You can check your balance by inputting your address at the top of the Aion [dashboard](https://mainnet.aion.network/#/dashboard).