---
title: "🎓 Deploy your Java contract with Maven"
excerpt: "Utilize Maven for all your Java Smart Contract needs and deploy your contract to the AVM Testnet."
---
[block:callout]
{
  "type": "info",
  "title": "Guide Level: Beginner",
  "body": "**You are a developer who**\n* Is familiar with the concepts of smart contracts\n* Is familiar with blockchain development workflows"
}
[/block]
We will be using [Maven](https://github.com/bloxbean/aion4j-maven-plugin) to :
* Create a project
* Build your Java smart contract (Compile)
* Connect to the Aion Mastery(Testnet)
* Deploy your contract to the Mastery
* Interact with your contract

Aion4j Maven Plugin provides end to end development support for AVM based smart contract in Java. It supports development on both embedded AVM or a remote Aion kernel (such as the Aion Mastery), which we'll be going through in this guide).

For all the latest changes, please check the full [Maven Documentation](https://docs.aion.network/docs/maven-and-aion4j): 
[block:api-header]
{
  "title": "Prerequisites"
}
[/block]

[block:callout]
{
  "type": "warning",
  "title": "Requirements",
  "body": "* [Java 10^](https://www.oracle.com/technetwork/java/javase/downloads/index.html)\n* [Maven 3.5.4^](https://docs.aion.network/docs/maven-and-aion4j-installation)\n\nHead over to [Aion Docs](https://docs.aion.network/docs/maven-and-aion4j-installation) for installation guide."
}
[/block]

[block:api-header]
{
  "title": "1. Setup"
}
[/block]
The fastest way to create a AVM project is using a Maven archetype - **avm-archetype**. Archetype is a Maven project templating toolkit. This is an existing Java tool. 
[block:callout]
{
  "type": "info",
  "body": "An archetype is defined as an original pattern or model from which all other things of the same kind are made."
}
[/block]
## 1.1 Create a Project
Create a new project by running the following Maven command (in your desired project directory).
* `-DarchetypeVersion` = [current Archetype Version](https://github.com/bloxbean/avm-archetype/releases)
[block:code]
{
  "codes": [
    {
      "code": "mvn archetype:generate -DarchetypeGroupId=org.aion4j -DarchetypeArtifactId=avm-archetype -DarchetypeVersion=0.17",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
The project automatically generates a sample HelloAVM contract. Smart contract pre-made templates will be coming soon.

## 1.2 GroupId, ArtifactId, Version, and Package
The archetype generator will ask you for a `groupId`, `artifactid`, `version`, and `package`. You can put whatever you want in these fields, but it will help you further down the line if you follow these guidelines.

| Type | Description | Example |
| ---- | ----------- | ------- |
| `groupId` | Uniquely identifies your project across all projects. Must follow Apache's [reverse domain naming control](https://maven.apache.org/guides/mini/guide-naming-conventions.html) convention. | `org.apache.maven`, `org.example.commons` |
| `artifactId` | The name of the `.jar` file without version. Also, the **name of your project**. | `commons-math`, `hello-world` |
| `version` | Which version of the project you're building. You can choose any typical version with numbers and dots. | `0.0.1`, `19.5`, `5.1.3-NIGHTLY` |
| `package` | [Apache is very specific about what to use here](https://docs.oracle.com/javase/specs/jls/se6/html/packages.html#7.7). However for the purposes of this HelloWorld project, the package name doesn't really matter. | `HelloWorld`, `gov.whitehouse.socks.mousefinder`, `edu.cmu.cs.bovik.cheese` |

Here's an example:

```bash
Confirm properties configuration:
    groupId: com.helloworld
    artifactId: hello-world
    version: 1.0
    package: com.helloworld
```
Your `pom.xml` will have the information you entered during configuration. Using the sample configuartion above, the `pom.xml` will look like this.
[block:code]
{
  "codes": [
    {
      "code": "<project xmlns=\"http://maven.apache.org/POM/4.0.0\" \n         xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n         xsi:schemaLocation=\"http://maven.apache.org/POM/4.0.0\n                             http://maven.apache.org/maven-v4_0_0.xsd\">\n  \n    <modelVersion>4.0.0</modelVersion>\n    <groupId>com.helloworld</groupId>\n    <artifactId>hello-world</artifactId>\n    <version>1.0</version>\n    \n    <name>hello-world</name>\n\n  ...\n</project>\n",
      "language": "xml",
      "name": "pom.xml"
    }
  ]
}
[/block]
## 1.3 Project Structure
Once you've run the archetype command and filled in the fields, you will have a file structure similar to this:

```text
hello-world/
├── pom.xml
└── src
    ├── main
    │   └── java
    │       └── com
    │           └── helloworld
    │               └── HelloAvm.java
    └── test
        └── java
            └── com
                └── helloworld
                    └── HelloAvmRuleTest.java
```

## 1.4 Initialize your Project 
When you initialize your project, Maven will copy the required AVM jars to the lib folder.  There are two ways to initialize: 
```bash
mvn initialize

or 

mvn aion4j:init (works for archetype 16 and below)
```
**Note:** During build, the plugin checks for APIs which are not accepted in the Java smart contract and will show the error accordingly.

[block:api-header]
{
  "title": "2. Build your Project"
}
[/block]
To compile any changes to your contract, save your changes, then compile and package (within your project directory) with this Maven command:
```bash
mvn clean install
```

Remember to always compile your Java contract before deployment!
[block:api-header]
{
  "title": "3. Connect to the Aion Mastery"
}
[/block]
## 3.1 Nodesmith Endpoint
We will need to modify our endpoint in order to connect to the Aion Mastery.
1.  Sign up for [Nodesmith](doc:nodesmith) 
2.  Copy your [Nodesmith Endpoint](doc:nodesmith) to `mastery`: 
*aion.api.nodesmith.io/v1/**mastery**/jsonrpc?apiKey=YOURAPIKEY*

## 3.2 Set Web3 Connection 
There are 2 Ways to connect to the Aion Network.

### 1. Update pom.xml file for Web3 RPC Url Connection
We will be editing the **Web3 RPC Url** (`<web3rpcUrl></web3rpcUrl>`) in our `pom.xml` file, with our endpoint (You can use any endpoint - in this example below we'll be using Nodesmith).
[block:code]
{
  "codes": [
    {
      "code": "<profiles>\n <profile>\n  <id>remote</id>\n  <build>\n    <plugins>\n      <plugin>\n        ...\n        <configuration>\n           <mode>remote</mode>\n           <avmLibDir>${avm.lib.dir}</avmLibDir>\n           <web3rpcUrl>https://api.nodesmith.io/v1/aion/mastery/\n             jsonrpc?apiKey=xxxxxxxxxxxxxx</web3rpcUrl>\n        </configuration>\n        ...",
      "language": "xml",
      "name": "pom.xml"
    }
  ]
}
[/block]
### 2. Set your environment variables
It is important to note that if you set your environment variables, it will override any existing information that is already in your `pom.xml` file. So, if you've already set your Web3 RPC Url in your `pom.xml` file, you can just **set your private key** (instead of setting your Web3 RPC Url again)

**Mac and Linux**
[block:code]
{
  "codes": [
    {
      "code": "export pk=YOUR_PRIVATE_KEY\nexport web3rpc_url=YOUR_NODESMITH_ENDPOINT",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
**Windows**
[block:code]
{
  "codes": [
    {
      "code": "set pk=YOUR_PRIVATE_KEY\nset web3rpc_url=YOUR_NODESMITH_ENDPOINT",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "4. Account Management"
}
[/block]

[block:callout]
{
  "type": "success",
  "body": "* An Aion Address (Create one with [AIWA](https://learn.aion.network/v1.0/docs/aiwa))\n* [Nodesmith Endpoint](doc:nodesmith)\n* Token Balance: [Faucet](https://faucets.blockxlabs.com/aion)",
  "title": "You will need"
}
[/block]
To deploy a contract, you will need AION balance. If you do not currently have an Aion account, easiest way is to download [AIWA](doc:aiwa) and have an Aion address generated for you. With **AIWA**, you will be able to see the balance of your account, your account address, and access to your private key to that account. 

## Account Balance
If you're using AIWA, you can check the account balance by making sure your network is connected to the Aion Mastery. 

Or, you can get any account balance with this Maven command. 
* `mvn aion4j:get-balance`: 
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:get-balance -Daddress=<ACCOUNT_ADDRESS> -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
* See [Aion Docs](https://docs.aion.network/docs/maven-and-aion4j-remote-avm#section-get-balance) for all account-related commands for connecting to a remote network.
[block:api-header]
{
  "title": "5. Deployment"
}
[/block]
**What happens when you deploy a Java Contract?**

The peer-to-peer network shares compatible versions that are running the same Aion kernel. That includes the AVM, and ledger history, and a transaction pool the miners. 

The AVM is the virtual machine running the Aion kernel, that allows us to execute Java programs. When deploying the contract, an address will be generated for your smart contract called a "contract address". 
[block:callout]
{
  "type": "danger",
  "body": "**Remember to make sure your updated contract is [compiled](#section-2-compile) - before deployment**"
}
[/block]
** Deploy your contract!** 
If you have already [set your environment variables](#section-2-set-your-environment-variables) for your private key and Web3 RPC Url, use this Maven command. 
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:deploy -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
Or, if you **have not** set any environment variables, use this command.
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:deploy -Dpk=YOUR_PRIVATE_KEY -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
**After successfully deploying your contract, a transaction hash should be returned. You will need this transaction hash to retrieve your transaction receipt (in the next step).** 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/cfc511c-txhash_highlight.png",
        "txhash_highlight.png",
        739,
        113,
        "#1a1a10"
      ]
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "6. Transaction Receipts"
}
[/block]
With all contract deployments and calls, a transaction receipt will be generated if it gets successfully mined. The transaction receipt can tell you information such as the transaction hash, contract address, status...etc.

There are 2 ways of checking your transaction receipts.
### 1. Get the last transaction receipt
Whatever your last transaction was to the network (whether its deploying a contract or transferring money), this maven command will bring up the last transaction receipt.
* `mvn aion4j:get-receipt`: command to get receipt
* `-Dtail`: Keep checking for transaction receipt from transaction hash every 10s until successfully mined
* `-Dsilent`: Ignore all necessary logs
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:get-receipt -Dtail -Dsilent -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
### 2. Get transaction receipt from the transaction hash
A transaction hash is generated anytime you interact with the blockchain. Save important transaction hashes so you can grab the transaction receipt from it, like so. 

[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:get-receipt -DtxHash=TRANSACTION_HASH -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
**Here's an example of retrieving a transaction receipt from the hash. **
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:get-receipt -DtxHash=0x0323167e8cf8b67a03a70fc7c74905847c84d0304adb234a26158e2365f1ac63 -Premote\n\n\n> [INFO] Scanning for projects...\n>\n> ...\n>\n> [INFO] Txn Receipt:\n> [INFO]  {\"result\":{\"blockHash\":\"0xd4c6e6d3c7503b09c652fb03ea5f705ba3382bfb5419aa833866a26ad0c84caa\",\n\"nrgPrice\":\"0x174876e800\",\n\"logsBloom\":\"00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000\",\n\"nrgUsed\":\"0x2db96c\",\n\"contractAddress\":\"0x0fc49f0ca77603058f1d2f29ad881737bebf78a8c79ef96f14965a401b81eb0c\",\n\"transactionIndex\":\"0x0\",\n\"transactionHash\":\"0x0323167e8cf8b67a03a70fc7c74905847c84d0304adb234a26158e2365f1ac63\",\n\"gasLimit\":\"0x4c4b40\",\n\"cumulativeNrgUsed\":\"0x2db96c\",\n\"gasUsed\":\"0x2db96c\",\n\"blockNumber\":\"0x677\",\n\"root\":\"65caca665e3d625a1ddfa1d5f626ec32ac2f94b15624014fe6925ebd25390b65\",\n\"cumulativeGasUsed\":\"0x2db96c\",\n\"from\":\"0xa0e24c8317dc98ecb8d5abb7fb9cc77ce3fb801e05d7e3dfb94e48dbc8715f4c\",\n\"to\":null,\n\"logs\":[],\n\"gasPrice\":\"0x174876e800\",\n\"status\":\"0x1\"},\n\"id\":0,\n\"jsonrpc\":\"2.0\"}\n>\n> ...",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "7. Contract Interaction"
}
[/block]
There are two ways to interact with a contract, with a **contract transaction** or a **contract call**.

## 7.1. Contract Transaction 
A **contract transaction** is when you are modifying the blockchain by sending instructions to the contract. It is considered a transaction since it has to be signed by an account and NRG is required for execution.

Maven caches the most recent contract address, so now we will send a contract transaction, executing the method `greet'. On success, txHash is cached as last transaction. 

`-Dvalue=<value>` is **optional** and is used when you need to send AION to the contract. 
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:contract-txn -Dmethod=greet -Dargs=\"-T ‘Hello AVM’\" [-Dvalue=<value>] -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
For specific contract addresses:
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:contract-txn -Dcontract=YOURCONTRACTADDRESS -Dmethod=greet -Dargs=\"-T 'Hi AVM'\" [-Dvalue=<value>] -Premote\n",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
**Always** check the [transaction receipt](#section-6-transaction-receipts) to ensure that the transaction has been successfully mined into the block

**Argument Types**
Check ABI types here: https://docs.aion.network/docs/variable-types
## 7.2. Contract Call

A **contract call** is when are you are simply reading data from the blockchain and not modifying it. Thus, a transaction is not needed. The function call is carried out by the node and since nothing is mined, no NRG is required.
[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:call -Dmethod=sayHello -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]
For specific contract addresses: 

[block:code]
{
  "codes": [
    {
      "code": "mvn aion4j:call -Dmethod=sayHello -Dcontract=YOUR_CONTRACT_ADDRESS -Premote",
      "language": "shell",
      "name": "Terminal"
    }
  ]
}
[/block]