---
title: Manage Meta-Data
---

## Meta-data JSON File and URL

Please ONLY have the meta-data JSON file at the URL you registered your pool with so that the foundation supported staking interface can interpret the pool information correctly. For example, [steakFrites.json](https://jennijuju.github.io/stakeFrites.json) is hosting the meta-data JSON file of one of the pool. Pool's website and any additional information can be hosted at the pool URL, i.e: `https://jennijuju.github.io/`, and it should be included in the JSON file as the `Pool URL`.

The pool operator must host a JSON file at the metadata URL (HTTPS over TLS), with the following schema:

- `Schema version`: A version number, to identify the schema. This is here to enable upgradability.
- `Logo`: A thumbnail containing the logo of the pool. The image must be base64 encoded PNG, with the dimensions of 256 pixels-square. The logo is encoded using this [online tool](https://www.base64-image.de/).
- `Description`: A “tell me about yourself”-style, short description for users to consume when making stake delegation decisions. This field shall not exceed 256 characters.
- `Name`: A human-readable name for the pool. This field shall not exceed 64 characters.
- `Tags`: These serve as keywords for any search functionality to be exposed by any ADS user interface. This is a JSON array. The size of this array shall not exceed 10 elements, with each element not exceeding 35 (valid) characters.
- `Pool URL`: This is a URL, pointing interested delegators to the homepage of the pool, for additional information to peruse, to help make their delegation management decisions.

### Example

An example can be found [here](http://jennijuju.github.io/stakeFrites.json).

## Meta-data Content Hash

This is the Blake2b hash of the meta-data content JSON object. When a pool operator updates the metadata hosted at the meta-data URL, they must also update the meta-data content hash on-chain.

### Use hashFile.sh

Pool operator can hash the JSON file using the hashFile script.

#### Download the Script

Open a terminal and navigate to the desired directory where you want to save the scripts, then run the following commands to get the `UnityBootstrap` scripts:

```bash
wget https://github.com/jeff-aion/UnityBootstrap/archive/Amity-Oct18.tar.gz
tar xvzf Amity-Oct18.tar.gz
cd UnityBootstrap-Amity-Oct18/
```

#### Run hashFile.sh

We will use `hashFile.sh` to get the hash of meta

##### Usage

```text
./hashFile.sh path_to_file
```

##### Inputs

- `path_to_file`: The relative path to the meta-data JSON file.

##### Example

For the example below, the meta-data json file is located in `j3npool`.

```bash
 ./hashFile.sh ../j3npool/metadata.json
```

And the output we get is:

```text
Meta-data content hash:
0x30fa5bbcfb38c774e3123ef7874a56a34ce508ff057ed23f7ef5cff62e16367b
```
