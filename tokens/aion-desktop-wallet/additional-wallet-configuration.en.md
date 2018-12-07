---
title: Additional Wallet Configuration
---

# Additionaln Wallet Configuration

## Connect with a Remote Node

If you wish to sync your wallet to an Aion node that is not running on your local machine, you may do so after making two changes in:

- [The configuration for the Aion kernel](https://docs.aion.network/docs/configure)
- [Your Aion Desktop Wallet **Settings** address](https://docs.aion.network/docs/configure)

## Configure Aion Kernel

You will first have to ensure that the `config.xml` file found in the `aion/config` folder of your aion kernel repository is modified such that the Java API accepts remote access. This will allow your wallet to connect with the node.

1. Navigate to the `aion/config/config.xml` file.
2. Change the IP address of the Java API section to `0.0.0.0`.
3. Save the config file and re-launch the kernel and wallet for changes to take effect.

```json
{
  "codes": [
    {
      "code": "<java active=\"true\" ip=\"0.0.0.0\" port=\"8547\">",
      "language": "xml"
    }
  ]
}
```

## Configure Wallet

After configuring the node you wish to connect to, you will need to change wallet settings so the IP address points to the machine running it.

1. Launch the Aion Desktop Wallet and go to the **Settings** tab.
2. Change the **Connection** tab to **Add connection**.
3. Select a name for the connection, and input the `URL`, `Port number`, and `access key`.
4. Click **Save** to create the new connection, then **Apply** to make the changes.

![Desktop Wallet Settings Tab](https://files.readme.io/bc04828-2.PNG)

## Delete or Switch Wallet

If you wish to no longer use the wallet stored on your machine, or switch to another one, you have the option to delete the current wallet database and restart a fresh wallet (or restore an existing Aion wallet from its seed mnemonic).

Keep in mind that **deleting your wallet database is permanent**. You will not be able to recover the accounts unless you have the mnemonic and password backed up.

### Linux / Mac

1. Open a terminal.
2. Remove the hidden folder `.aion`:

```bash
rm -rf ~/.aion
```

3. Relaunch the **Aion Desktop Wallet**. You can now click on **Add an Account**.

### Windows

1. Go to `C:/Users/YOUR_USERNAME`.
2. Turn on **Show hidden files and folders**.
3. Delete `.aion`.
4. Relaunch the **Aion Desktop Wallet**. You can now click on **Add an Account**.