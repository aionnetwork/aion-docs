---
title: "Install the Wallet"
excerpt: ""
---
The Aion Desktop Wallet is a local application that is **stored and ran from your local machine**. It is not a cloud application.
[block:parameters]
{
  "data": {
    "h-0": "Mac",
    "h-1": "Linux",
    "h-2": "Windows",
    "0-0": "[![Mac Logo](https://files.readme.io/ef347d5-if_apple-ios-system-platform-os-mac-linux_652586_1.png)](#section-mac)",
    "0-1": "[![Linux Logo](https://files.readme.io/cac69d5-if_linux-server-system-platform-os-computer-penguin_652577_1.png)](#section-linux)",
    "0-2": "[![Windows Logo](https://files.readme.io/133dd97-if_windows_1296843_1.png)](#section-windows)"
  },
  "cols": 3,
  "rows": 1
}
[/block]

[block:api-header]
{
  "title": "Linux"
}
[/block]
Although it is possible to install the Aion Desktop Wallet on any Linux distribution, only Ubuntu is officially supported.
[block:callout]
{
  "type": "danger",
  "title": "Updating from a previous version of Aion Desktop Wallet",
  "body": "To properly install the new Desktop Wallet release make sure that you have exported your keystore or written down your seed phrase. Once you have confirmed, execute the following command to remove release 1.0: \n```\nrm -rf ~/.aion\n```\nYou can now install version 1.1.0"
}
[/block]
1. Download the `aion_ui.zip` file from the [Aion Wallet Repository](https://github.com/aionnetwork/Desktop-Wallet/releases/tag/1.1.0)
2. Extract the folder to the desired directory. Your root `~` directory is fine.
3. Open a terminal and run: `aion_ui/aion_ui.sh`.

The Aion Desktop Wallet is now open on your desktop. In order to run the application again, call the `aion_ui.sh` script from a terminal.

---
[block:api-header]
{
  "title": "Mac"
}
[/block]
1. Download the `AionWallet.dmg` application image from the [Aion Wallet repository](https://github.com/aionnetwork/Desktop-Wallet/releases/download/1.1.0/AionWallet.dmg).
2. Open the `.dmg` file and `AionWallet.app` into your applications folder.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/f0e1967-open_dmg.gif",
        "open_dmg.gif",
        921,
        532,
        "#a0abae"
      ]
    }
  ]
}
[/block]
3. Go to your **Applications** folder, right click on **AionWallet.app**, and select **Open**.
4. Click **Open** on the security window that pops up.
5. You can now open the wallet through the **Applications** folder.

---
[block:api-header]
{
  "title": "Windows"
}
[/block]

[block:callout]
{
  "type": "warning",
  "body": "The `AionWalletSetup.exe` currently isn't signed, which means you may run into some security warnings during the installation process. Just click **OK** through them. We're in the processes of getting all the Aion installation executable signed.",
  "title": "Unsigned Executables"
}
[/block]
1. If you don't already have it, download and install the [latest stable Java release](https://java.com/en/download/manual.jsp).
2. Download the `AionWalletSetup.exe` executable from the [Aion Wallet repository](https://github.com/aionnetwork/Desktop-Wallet/releases/download/1.1.0/AionWalletSetup.exe).
3. Run the `.exe` on your computer. Accept any security warnings that pop up.
4. Follow through the installation and restart your computer.
5. You can now open the wallet through the **Applications** folder.