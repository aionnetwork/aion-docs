# Mining Pools

This section will take you through the installation of the [Aion solo mining pool](doc:solo-mining-pool), which should be used with the [external miner](doc:external-miner). During the initial Kilimanjaro (Aion Phase 1) launch, only the Aion solo miner was officially supported on the network. We have since released Aion pool mining software for individuals to run their own pools:

## Solo Pool vs. Public Pool

A solo pool has one node mining for rewards at the network difficulty, with the full payout to the one account. With a public pool (not covered in this document), a group of nodes work together, distributing a reward proportional to each node's work when a block is mined by the pool. Often, there are fees associated with joining a public pool, and although rewards are received more consistently in a public pool, this may not guarantee benefit over solo-mining.

You can find a list of public pools that mine Aion under [External Resources](doc:external-resources).

---

## Solo Pool

### Prerequisites

In order to run the solo mining pool, you must already have:

- Aion [node](doc:node-set-up) and [external miner](doc:external-miner)
- Python 2.7

Python `2.7` is included by default with Ubuntu desktop, but it may need to be installed separately in Ubuntu Server:

```bash
sudo apt-get update
sudo apt-get install build-essential make
sudo apt-get install python2.7 python-dev
```

### Update Configure File

You will have to modify the **config.xml** file in the aion directory (aion/config/config.xml) before running the mining pool. Update the following fields in the *consensus* section:

| Field | Configuration |
| --- | --- |
| Mining | Set to `false` to disable internal mining. |
| Miner Address | The wallet address that will collect mined rewards. |

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

In the *APIs enabled* section, verify that the `stratum` option is included.

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

1. Download the latest prepackaged mining pool file **aion-solo-pool-{version}.tar.gz** from the aion_miner [release page](https://github.com/aionnetwork/aion_miner/releases)
2. Extract the file to the desired directory
3. Open terminal in **aion-solo-pool-{VERSION}** directory, run the command

```bash
./configure.sh
```

**Note**: The **configure.sh** script may take several minutes to complete, and should only be run once.

4. Once the script completes, run:

```bash
./run_quickstart.sh
```

5. Launch the Aion kernel in a **separate terminal** (Navigate to the **aion** directory and run:

```bash
./aion.sh
```

If you now have the kernel, miner, and solo-mining-pool running, congrats! You're now mining on Aion.

You can check your balance by entering your address at the top of the [Aion dashboard](https://mainnet.aion.network/#/dashboard).