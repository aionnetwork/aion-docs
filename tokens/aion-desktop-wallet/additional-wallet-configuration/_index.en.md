---
title: Additional Wallet Configuration
weight: 1
chapter: true
---

# Additional Wallet Configuration

[block:api-header]
{
  "title": "Connect with a Remote Node"
}
[/block]
If you wish to sync your wallet to an Aion node that is not running on your local machine, you may do so after making two changes in:
- [the configuration for the Aion kernel](doc:additional-wallet-configuration#section-configure-aion-kernel)
- [your Aion Desktop Wallet "Settings" address](doc:additional-wallet-configuration#section-configure-wallet)

## Configure Aion kernel
You will first have to ensure that the **config.xml** file found in the aion/config folder of your aion kernel repository is modified such that the Java API accepts remote access. This will allow your wallet to connect with the node.
1. Navigate to the **aion/config/config.xml** file
2. Change the IP address of the Java API section to 0.0.0.0
3. Save the config file and re-launch the kernel and wallet for changes to take effect
[block:code]
{
  "codes": [
    {
      "code": "<java active=\"true\" ip=\"0.0.0.0\" port=\"8547\">",
      "language": "xml"
    }
  ]
}
[/block]
## Configure wallet
After configuring the node you wish to connect to, you will need to change wallet settings so the IP address points to the machine running it.
1. Launch the Aion Desktop Wallet and navigate to the "Settings" tab
2. Change the "Connection" tab to **Add connection**
3. Select a name for the connection, and input the URL, Port number, and an access key
3. Click "Save" to create the new connection, then "Apply" to make the changes
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/bc04828-2.PNG",
        "2.PNG",
        1300,
        864,
        "#f5f5fa"
      ]
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Delete or Switch Wallet"
}
[/block]
If you wish to no longer use the wallet stored on your machine, or switch to another one, you have the option to delete the current wallet database and restart a fresh wallet (or restore an existing Aion wallet from its seed mnemonic).
[block:callout]
{
  "type": "warning",
  "title": "Note",
  "body": "The deletion of your wallet database is permanent - you will not be able to recover the accounts unless you have the mnemonic and password backed up."
}
[/block]
1. Open up terminal and navigate to the home directory (or run ```cd``` from any directory)
2. Remove the hidden file **.aion** using the command ```rm -r .aion```
3. Relaunch the Aion Desktop Wallet, you should notice that you will be prompted to [add an account](doc:interact-with-your-wallet#section-add-an-account from seed mnemonic or create a new account and password