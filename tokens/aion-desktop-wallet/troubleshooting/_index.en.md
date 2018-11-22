# Obtaining Logs

If our support team have requested logs off you, follow the process for the operating system to retrieve them.

## Linux / macOS

The `log` file is stored at `~/.aion/logs`. You can copy the contents of the folder to your Desktop by running `cp -r ~/.aion/logs ~/Desktop`. You may need to run this command as `sudo`. The `log` file is now on your Desktop.

You can now email this file to [support@aion.network](mailto:support@aion.network) when requested.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/dbf2a51-terminal.gif",
        "terminal.gif",
        745,
        384,
        "#202020"
      ],
      "caption": "Running the copy command and then viewing the contents of a file in a terminal."
    }
  ]
}
[/block]
## Windows

To view the Aion Desktop Wallet logs in Windows, navigate to `c:\Users\Your_Username` replacing `Your_Username` with your Windows username. You may need to [enable viewing of hidden files and folders](//support.microsoft.com/en-ca/help/4028316/windows-view-hidden-files-and-folders-in-windows-10).
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/a404006-hidden_files_and_folders.gif",
        "hidden_files_and_folders.gif",
        520,
        293,
        "#032345"
      ],
      "caption": "Viewing hidden files and folders in Windows 10. Copyright [Microsoft](https://support.microsoft.com/en-ca/help/4028316/windows-view-hidden-files-and-folders-in-windows-10)"
    }
  ]
}
[/block]
You can now email this file to [support@aion.network](mailto:support@aion.network) when requested.

# Problems with Ledger

If you're having problems connecting your Ledger wallet to your Aion wallet, take a look at the troubleshooting steps below.

1. Make sure that the Aion app is installed on your Ledger wallet. Ledger have posted a guide on [how to install the Aion app](https://support.ledgerwallet.com/hc/en-us/articles/360008599834-Aion-AION-).
2. You need to have the Aion app **open** on your Ledger wallet when you connect. Open the Aion app on the Ledger and _then_ try to connect.
3. Make sure that the **contract data** is set to **on** within the Aion app on your Ledger.

If you're still having issues after following these steps, please reach out to us at [support@aion.network](mailto:support@aion.network) or through any of [our community groups](http://aion.network/community/). We have encountered a decent amount of issues with Ledger in the latest Aion Desktop Wallet build, are we're currently trying to find a solution.

# Windows and Antivirus Software

Due to the nature and fast release of the Aion Desktop Wallet, the `.exe` is not signed. This can cause certain installations of Windows and / or antivirus software such as McAfee and AVG to flag the wallet as malicious.

You may also encounter the following error: `CreateProcess failed code: 1450 insufficient system resources exist to complete the requested service.`

We recommend validating your download, and then adding exception in your antivirus software for the Aion Desktop Wallet. The exception can be made temporarily until you have completed the swap process.