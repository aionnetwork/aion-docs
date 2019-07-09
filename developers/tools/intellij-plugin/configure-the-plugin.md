---
title: Configure the Plugin
description: There are lots of configuration options available within the Aion4j plugin for IntelliJ to help speed up your contract development.
weight: 300
---

## Configuration Menu

This menu allows you to select which node to connect to, how much NRG you are willing to pay, and other configuration options.

To open the confirguation menu, right click anywhere within your project and select **Aion Virtual Machine** > **Configuration**. The confirguation menu is split into four sections: **Remote Kernel**, **Remote - Details**, **Embedded AVM**, and **Common**.

### Remote Kernel

This tab manages the options for when you are deploying to and calling from a remote node.

| Configuration Option | Description | Default | Example |
| --- | --- | --- | --- |
| **Web3 RPC URL** | The URL or IP address of the remote node you are connecting to. | | `https://aion.api.nodesmith.io/v1/mainnet/jsonrpc?apiKey=a1b2c4d567874400abcdefa1234567890`, `http://138.0.192.33:8545`, `http://localhost:8545` |
| **Private Key** | The private key you want to use to deploy, call, and make transactions. Leave this field blank if you are using the _Account & Password_ field. This private key must exist on the node in order for any transactions to work. | | `241b7c50abcd08db96035b0273298790b02b05869687e0db6712347e92e945985c7281891625858babcdcf0f0ddeab880a6811234d9a880b009378b47ee0abcd` |
| **Account** | The address of the account you want to use. Leave this field blank if you are using the _Private Key_ field. This account must be _unlocked_ on the remote node in order for any transactions to work. | | `0xa001e2afd2cf8eca0be0858326a50f68df006ea1e1db366d20ca52a1bba0ef13` |
| **Password** | The password associated with the account you want to use. Leave this field blank if you are using the _Private Key_ field. This account must be _unlocked_ on the remote node in order for any transactions to work. | | `wP!j!v7B6p^Av` |
| **Always ask for credentials** | Should the plugin store the supplied account and password information, or should it forget them after each session? We recommend you leave this checked. | Yes | |
| **Always compile before deploying** | Should the plugin run the `mvn clean install` command to compile your contract before every single deploy? | Yes | |

### Remote - Details

These options manage NRG prices for deploying and interacting with contracts on the Testnet (Mastery). These options do not effect embedded AVM features. We recommend that you do not change the values, unless you have a very specific need to do so.

| Configuration Option | Description | Default | Example |
| --- | --- | --- | --- |
| NRG (Deploy) | The maximum amount of NRG for transaction execution the sender is willing to pay for the transaction. | `5000000` |  |
| NRG Price (Deploy) | Fee charged per NRG transaction. | `100000000000` |  |
| NRG (Contract Transaction) | The maximum amount of NRG the sender is willing to pay for the transaction. | `2000000` |  |
| NRG Price (Contract Transaction) | Free charged per NRG transaction. | `100000000000` |  |
| Maven Profile for Remote Deployment | Tells Maven which profile you wish to use, as specified in your `pom.xml` file. [See Chaning Class Name](#changing-class-name) for more information. | | `alt-profile`, `production`, `dev` |
| Get Receipt | Specify whether you want the plugin to return transaction receipts from the node. | Yes | |

### Embedded AVM

The Embedded AVM tab represents customizations available to the embedded AVM as local functions. These customizations do not effect the way the plugin interacts with remote nodes.

| Configuration Option | Description | Default | Example |
| --- | --- | --- | --- |
| Preserver Debug Mode | When this is enabled, any breakpoints that are within IntelliJ will cause the compiled contract to stop. This is for debugging | No |  |
| Verbose Contract Error | Provides more details error messages from the Aion virtual machine. | No |  |
| Verbose Concurrent Executor | Provides details error messages from the Java virtual machine. | No |  |
| AVM Storage Path | External storage location for the AVM. Only provide this information if you want to share your AVM instance across multiple projects. |  | `~/avm`, `C:/AVM`, `/Users/john/home/avm` |
| Default Deployer / Caller Account | Set the address that you would like to deploy / call contracts from. | Taken from the `localDefaultAccount` field in the `pom.xml` file. | `0xa001e2afd2cf8eca0be0858326a50f68df006ea1e1db366d20ca52a1bba0ef13` |
| Ask Deployer / Caller Account every time. | Checking this box will force the plugin to ask you for an address every time a contract is deployed / called. | No | |

### Common

The common tab represents customizations that effect both local and remote functions.

| Configuration Option | Description | Default | Example |
| --- | --- | --- | --- |
| Deployment Arguments | Since the plugin is essentially a wrapper around Maven, you can ask the plugin to run Maven commands. These arguments are applicable for both remote and embedded mode. See the [Maven](/developers/tools/maven-cli) section for a list of available commands. |  | `'-T Alice -I 30 -A 0xa001e2afd2cf...', '-<type> <value> -<type> <value> ...'` |

## Pom File

The `pom.xml` file controls how Maven interacts with your project. In most cases you won't have to edit this file, however there are some situations where you may need to modify some of it's options.

### Changing Class Name

When you first create a project using the Aion plugin, the default class used by the `pom.xml` file is `HelloAvm` preceded by the package name you chose for your project:

```xml
    <properties>

        ...

        <contract.main.class>example.HelloAvm</contract.main.class>
    </properties>
```

This coresponds to the class of your contract `HelloAvm.java` file:

```java
package example;

...

public class HelloAvm
{

    ...

}
```

If you change either the package or class names within your contract, you need to change the `contract.main.class` field in your `pom.xml` file.

### Maven Profiles

The `pom.xml` file contains a `profiles` section where you can define custom profiles for your project. This isn't required for Aion contract development. See the [Apache Maven documentation](https://maven.apache.org/guides/introduction/introduction-to-profiles.html) for more details.

## IntelliJ Keyboard Shortcuts

IntelliJ allows users to assign keyboard shortcuts to individual plugins. To access this menu go to **Preferences** > **Keymap** > **Plug-ins** > **Aion4j AVM Integration**. Here you can set any keyboard shortcuts you want to. Depending on your IntelliJ installation, some default Aion plugin shortcuts may be overridden by other IntelliJ functions.

![IntelliJ Keymaps](/developers/tools/intellij-plugin/images/intellij-keymap.png)
