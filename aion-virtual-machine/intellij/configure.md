# Configure the Plugin

Fill in the configuration options available to help speed up your contract development.

## Configuration Menu

To open the confirguation menu, right click anywhere within your project and select **Aion Virtual Machine** > **Configuration**. The confirguation menu is split into four sections: **Remote Kernel**, **Remote - Details**, **Embedded AVM**, and **Common**.

### Remote Kernel

This tab manages the options for when you are deploying to and calling from a remote node.

| Configuration Option | Description | Default | Example |
| --- | --- | --- | --- |
| **Web3 RPC URL** | The URL or IP address of the remote node you are connecting to. | | `https://aion.api.nodesmith.io/v1/mainnet/jsonrpc?apiKey=a1b2c4d567874400abcdefa1234567890`, `http://138.0.192.33:8545`, `http://localhost:8545` |
| **Private Key** | The private key you want to use to deploy, call, and make transactions. Leave this field blank if you are using the _Account & Password_ field. This private key must exist on the node in order for any transactions to work. | | `241b7c50abcd08db96035b0273298790b02b05869687e0db6712347e92e945985c7281891625858babcdcf0f0ddeab880a6811234d9a880b009378b47ee0abcd` |
| **Account** | The address of the account you want to use. Leave this field blank if you are using the _Private Key_ field. This account must be _imported_ on the remote node in order for any transactions to work. | | `0xa001e2afd2cf8eca0be0858326a50f68df006ea1e1db366d20ca52a1bba0ef13` |
| **Password** | The password associated with the account you want to use. Leave this field blank if you are using the _Private Key_ field. This account must be _imported_ on the remote node in order for any transactions to work. | | `wP!j!v7B6p^Av` |
| **Always ask for credentials** | Should the plugin store the supplied account and password information, or should it forget them after each session? We recommend you leave this checked. | Yes | |
| **Always compile before deploying** | Should the plugin run the `mvn clean install` command to compile your contract before every single deploy? | Yes | |

### Remote - Details

These options manage NRG prices for deploying and interacting with contracts on the Testnet (Mastery). These options do not effect embedded AVM features. We recommend that you do not change the values, unless you have a very specific need to do so.

### Embedded AVM

### Common
