---
title: "Using an Exchange: Create a wallet that will receive your AION Coins"
excerpt: ""
---
[block:callout]
{
  "type": "success",
  "body": "If you encounter any issues during your swap process not covered in this guide, please reach out on any of our official channels below or [support@aion.network](mailto:support@aion.network).\n\n[Aion Forum](forum.aion.network)\n[Telegram](https://t.me/aion_blockchain)\n[Twitter](https://twitter.com/aion_network?lang=en)",
  "title": "Support"
}
[/block]

[block:api-header]
{
  "title": "Aion Desktop Wallet"
}
[/block]
At this time the Aion Desktop wallet and <a href="https://coinomi.com" target="_blank">Coinomi</a> are the only supported wallets for receiving your AION coins.  [Ledger is also available](https://docs.aion.network/docs/ledger-hardware-wallet-guide). This guide walks you through using the Aion Desktop Wallet only.

**Select your operating system:** 
[block:parameters]
{
  "data": {
    "0-2": "[![Windows Installation](https://files.readme.io/133dd97-if_windows_1296843_1.png)](#section-installation-for-windows)",
    "0-1": "[![Linux / Ubuntu Installation](https://files.readme.io/cac69d5-if_linux-server-system-platform-os-computer-penguin_652577_1.png)](#section-installation-for-linux-ubuntu)",
    "0-0": "[![Mac Installation](https://files.readme.io/ef347d5-if_apple-ios-system-platform-os-mac-linux_652586_1.png)](#section-installation-for-mac)",
    "h-0": "Mac",
    "h-1": "Linux / Ubuntu",
    "h-2": "Windows"
  },
  "cols": 3,
  "rows": 1
}
[/block]

[block:api-header]
{
  "title": "Installation for Mac"
}
[/block]
1. Download the [AionWallet.dmg](https://github.com/aionnetwork/Desktop-Wallet/releases/tag/1.1.0) application image
2. Extract and open the installer. A window containing **AionWallet.app** should appear.
3. Drag and drop **AionWallet.app** into the **Applications** folder.
4. You can now search for **AionWallet** using the normal tools (`command` + `space` and typing `AionWallet`) or by navigating to the **Applications** folder and double-clicking on **AionWallet**.
[block:callout]
{
  "type": "warning",
  "body": "You may encounter a warning that you cannot run the application - try to open the application anyway.\n\nIf the application still does not open:\n1. Go to **System Preferences** > **Privacy & Settings**\n2. At the lower half of the window that opens, you will see a request for the **AionWallet App** to run on your Mac\n3. Select to open now, and if prompted again confirm your choice by pressing open again",
  "title": "Encountered a warning"
}
[/block]
**If you would like to validate wallet executables are consistent and not tainted:**
Install Homebrew : /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
Install sha1sum utility : brew install md5sha1sum
Verify sha1sum in terminal : sha1sum -c AionWallet.dmg.sha1

<h2>What's Next?</h2>
<h3>&nbsp; &nbsp; &nbsp; > &nbsp;<a href="#setup">Setting up your wallet</a></h3>

---
&nbsp; 
&nbsp; 
[block:api-header]
{
  "title": "Installation for Linux Ubuntu"
}
[/block]

[block:callout]
{
  "type": "info",
  "title": "Already running Aion Desktop Wallet 1.0",
  "body": "To properly install the new Desktop Wallet release make sure that you have exported your keystore or written down your seed phrase. Once you have confirmed, execute the following command to remove release 1.0: \n```\nrm -rf ~/.aion\n```\nYou can now install version 1.1.0"
}
[/block]
1. Download the `aion_ui.zip` file from the [Aion Desktop Wallet repository](https://github.com/aionnetwork/Desktop-Wallet/releases/tag/1.1.0).
2. Unzip the `aion_ui.zip`
3. Open a terminal inside the unzipped folder and run `sh aion_ui.sh`.

**If you would like to validate wallet executables are consistent and not tainted:**
Verify sha1sum in terminal : sha1sum -c aion_ui.zip.sha1

<h2>What's Next?</h2>
<h3>&nbsp; &nbsp; &nbsp; > &nbsp;<a href="#setup">Setting up your wallet</a></h3>
[block:api-header]
{
  "title": "Installation for Windows"
}
[/block]
1. Download the `AionWalletSetup.exe` from the [Aion Desktop Wallet repository](https://github.com/aionnetwork/Desktop-Wallet/releases/tag/1.1.0).
2. Run the `AionWalletSetup.exe`.
3. Follow the instructions on screen. You may have to accept certain security pop-ups and install Java, depending on your Windows installation.
4. Launch the **Aion Desktop Wallet**.
[block:callout]
{
  "type": "warning",
  "title": "Encountered a warning",
  "body": "Upon installing the application you will this warning:\n\n**Windows Defender SmartScreen prevented an unregistered app form starting. Running this app might put your PC at risk.**\n\n1. Click **More info**.\n2. Click **Run anyway**.\n\nYou may then see a second pop up:\n\n**Do you want to allow this app from an unknown publisher to make changes to your device?\nPublisher: Unknown**\n\n3. Click **Yes**."
}
[/block]
**If you would like to validate wallet executables are consistent and not tainted:**
Download SHA1 checksum utility from here : https://download.cnet.com/MD5-SHA-Checksum-Utility/3000-2092_4-10911445.html
Launch utility by double clicking on MD5_and_SHA_Checksum_Utility.exe
Check SHA-1 combo-box and uncheck all other options
Upload AionWalletSetup.exe file by clicking on browse
Open AionWalletSetup.exe.sha1 in notepad
Copy the hash from AionWalletSetup.exe.sha1 and paste it in hash input box of MD5 and SHA utility
Click on Verify

<h2>What's Next?</h2>
<h3>&nbsp; &nbsp; &nbsp; > &nbsp;<a href="#setup">Setting up your wallet</a></h3>
[block:api-header]
{
  "title": "Setup"
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/90cc2c2-1-accounts.png",
        "1-accounts.png",
        864,
        576,
        "#f6f5fb"
      ],
      "sizing": "smart"
    }
  ]
}
[/block]
### Add an Account

There are two options to initialize your wallet by adding an account:
- Recover Previous Wallet (if you have an existing Aion Desktop Wallet with the corresponding mnemonic and password)
- Create New Account (new Aion Desktop Wallet user)

This tutorial assumes that you don't have an existing wallet and wish to create a new Aion account. For additional wallet functionality (including the recovery option), please refer to the [Aion Desktop Wallet full documentation](https://docs.aion.network/docs/interact-with-your-wallet).

#### Create New Account

1. Click on **Add account** on the wallet interface
2. Enter an account name (this can be edited later)
3. Enter a password.
4. Confirm chosen password.
5. Save and backup the seed mnemonic that appears. You will need it if you wish to recover your wallet later:
[block:callout]
{
  "type": "warning",
  "title": "Mnemonic Phrase",
  "body": "Please write down the mnemonic phrase on paper and store in a secure location. This phrase can be used to access your account without any additional passwords or verification. Handle with care!"
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/1185eaa-2-mnemonic.png",
        "2-mnemonic.png",
        864,
        575,
        "#f3f2f9"
      ]
    }
  ]
}
[/block]

[block:callout]
{
  "type": "warning",
  "title": "Note",
  "body": "Clicking on **Add account** later will automatically generate an account in your wallet. These accounts cannot be removed from the wallet."
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/e7a6eb6-3-overview.png",
        "3-overview.png",
        868,
        576,
        "#f4f3fa"
      ]
    }
  ]
}
[/block]
### Save Public Address

Notice there is a string address for your account called "Public address". This is your Aion wallet address, and can be used to receive your AION Coins in the token swap.

For additional information on using your Aion Desktop Wallet refer to this [user guide](https://docs.aion.network/docs/interact-with-your-wallet)

**Congrats! You now have an Aion wallet address to use for the Aion Token Swap.**