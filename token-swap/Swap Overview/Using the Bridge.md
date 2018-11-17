---
title: "Using the Bridge"
excerpt: "Transfer your tokens using the official Aion Token Swap Bridge."
---
[block:callout]
{
  "type": "danger",
  "title": "Don't Mess Up!",
  "body": "During the Token Swap, you will be taken to a web page that is automatically filled in. **Do not edit the AMOUNT TO SEND field**. If you change this field, you'll end up sending your Aion to the Aion Contract, and you might loose everything forever.\n\nA bunch of Aion users have ignored / missed this step, and have lost their `Aion`. Don't be like them."
}
[/block]

[block:callout]
{
  "type": "success",
  "body": "If you encounter any issues during your swap process not covered in this guide, please reach out on any of our official channels below or [support@aion.network](mailto:support@aion.network).\n\n[Aion Forum](https://docs.aion.network/v1.1/docs/forum.aion.network)\n[Telegram](https://t.me/aion_blockchain)\n[Twitter](https://twitter.com/aion_network?lang=en)",
  "title": "We're here if you need us!"
}
[/block]
# Install the Desktop Wallet

At this time the Aion Desktop wallet and [Coinomi](https://coinomi.com/) are the only supported wallets for receiving your AION coins. [Ledger is also available](https://docs.aion.network/docs/ledger-hardware-wallet-guide). This guide walks you through using the Aion Desktop Wallet only.

**Select Your Operating System**
[block:parameters]
{
  "data": {
    "0-2": "[![Windows Installation](https://files.readme.io/133dd97-if_windows_1296843_1.png)](#section-windows)",
    "0-1": "[![Mac Installation](https://files.readme.io/ef347d5-if_apple-ios-system-platform-os-mac-linux_652586_1.png)](#section-macos)",
    "0-0": "[![Linux / Ubuntu Installation](https://files.readme.io/cac69d5-if_linux-server-system-platform-os-computer-penguin_652577_1.png)](#section-linux)",
    "h-0": "Linux / Ubuntu",
    "h-1": "Mac",
    "h-2": "Windows",
    "0-3": "",
    "h-3": ""
  },
  "cols": 3,
  "rows": 1
}
[/block]

## Linux

Although it is possible to install the Aion Desktop Wallet on any Linux distribution, only Ubuntu is officially supported.

### Updating from Version 1.0

To properly install the new Desktop Wallet release make sure that you have exported your keystore or written down your seed phrase. Once you have confirmed, execute the following command to remove release 1.0:

```bash
rm -rf ~/.aion
```

You can now install version 1.1.0:

### Standard Installation

1. Download the `aion_ui.zip` file from the [Aion Wallet Repository](https://github.com/aionnetwork/Desktop-Wallet/releases/tag/1.1.0)
2. Extract the folder to your root `~` directory.
3. Open a terminal and run: `~/aion_ui/aion_ui.sh`.
4. The Aion Desktop Wallet is now open on your desktop. Run the above command again if you want to re-open the wallet.

### One-line Installation

```bash
wget https://github.com/aionnetwork/Desktop-Wallet/releases/download/1.1.0/aion_ui.zip && unzip ~/Downloads/aion_ui.zip ~/aion_ui && ~aion_ui/aion_ui.sh
```

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-setup-your-wallet"><i class="fa fa-chevron-right"></i>Setup Your Wallet</a></td></tr></tbody></table></div>

## macOS

1. Download the [AionWallet.dmg](https://github.com/aionnetwork/Desktop-Wallet/releases/tag/1.1.0) application image
2. Extract and open the installer. A window containing **AionWallet.app** should appear.
3. Drag and drop **AionWallet.app** into the **Applications** folder.

![Installing the Aion Wallet](https://files.readme.io/f0e1967-open_dmg.gif)

1. You can now search for **AionWallet** using the normal tools (`command` + `space` and typing `AionWallet`) or by navigating to the **Applications** folder and double-clicking on **AionWallet**.

#### Encountering a Warning

You may encounter a warning that you cannot run the application. If this happens:

1. Open **Applications** > **System Preferences** > **Privacy & Settings**.
2. At the lower half of the window, you will see a request for the **AionWallet App** to run on your Mac.
3. Select to **Open Now**, and if prompted again confirm your choice by pressing **Open** again.

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-setup-your-wallet"><i class="fa fa-chevron-right"></i>Setup Your Wallet</a></td></tr></tbody></table></div>

## Windows

The Aion Desktop Wallet is compatiable with Windows 7 and above.

1. If you don't already have it, [download and install the latest stable Java release](https://java.com/en/download/manual.jsp).
2. Download the `AionWalletSetup.exe` executable from the [Aion Wallet repository](https://github.com/aionnetwork/Desktop-Wallet/releases/download/1.1.0/AionWalletSetup.exe).
3. Run `AionWalletSetup.exe` on your computer. Accept any security warnings that pop up.
4. Follow through the installation and restart your computer.
5. You can now open the wallet through the **Start Menu**.

#### Unsigned Executables

The `AionWalletSetup.exe` currently isn't signed, which means you may run into some security warnings during the installation process. Just click **OK** through these warnings. We are in the processes of getting all the Aion executable signed and recognized by Microsoft.

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-setup-your-wallet"><i class="fa fa-chevron-right"></i>Setup Your Wallet</a></td></tr></tbody></table></div>

-------------------

# Setup Your Wallet

![The Aion Desktop Wallet](https://files.readme.io/90cc2c2-1-accounts.png)

This tutorial assumes that you want to create a new account within your wallet. If you already have an account setup in your wallet but you have forgotten your password, you can recover it by following the [I've Forgotten My Password guide](https://docs.aion.network/v1.1/docs/ive-forgotten-my-password).

## Create an Account

1. Open the Wallet.
2. Click **Add account**.
3. Enter an account name (this can be edited later).
4. Enter a password.
5. Confirm chosen password.
6. Save and backup the seed mnemonic that appears. Please write down the mnemonic phrase on paper and store in a secure location. This phrase can be used to access your account without any additional passwords or verification. Handle with care!

![Aion Wallet Showing an Account Mnemonic](https://files.readme.io/1185eaa-2-mnemonic.png)

#### Your Public Address

In the wallet there is a field called **Public address**. This is your Aion wallet address, and can be used to receive your `AION` coins in the token swap.

![Aion Wallet with a Public Address](https://files.readme.io/e7a6eb6-3-overview.png)

For additional information on using your Aion Desktop Wallet refer to the [Aion Wallet user guide](https://docs.aion.network/v1.1/docs/aion-desktop-wallet).

Congrats! You now have an Aion wallet address to use for the Aion Token Swap

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-check-token-compatibility"><i class="fa fa-chevron-right"></i>Check Token Compatibility</a></td></tr></tbody></table></div>

-------------------

# Check Token Compatibility

In order for you to swap your `AION ERC-20` Tokens into `AION` Coins, you will be using **MyEtherWallet** or **MyCrypto**. To use these interfaces you will need to have:

- `AION ERC-20` Tokens stored in one of the following wallets: **MetaMask**, **Ledger**, **Trezor**, **Digital Bitbox**, and **Secalot**
- An `AION` Coin wallet address using either the official [Aion Desktop wallet](doc:create-an-aion-wallet) (Windows, Mac, Linux), or a **Coinomi** wallet.

![MyEtherWallet & MyCrypto supported Wallets](https://files.readme.io/1a43064-wallet-logo-headers.jpg)

#### Alternative Method

You can also use a keystore file, your private key, or a mnemonic phrase to initiate the transfer using a partner in the next step. However, this method is not recommended as it is much less secure. Aion does not support this method.

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-generate-the-transaction"><i class="fa fa-chevron-right"></i>Generate the Transaction</a></td></tr></tbody></table></div>

-------------------

# Generate the Transaction

In this section you will generate the transaction using the Aion Token Bridge Transfer.
[block:callout]
{
  "type": "warning",
  "title": "Phishing Sites",
  "body": "[bridge.aion.network](https://bridge.aion.network/) is the only bridge user interface, and is certified using a `Aion Foundation [KY]` certificate. Always check for valid certificates when managing cryptocurrency. The Token Swap Bridge does not ask for private keys."
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/1f79976-Screen_Shot_2018-09-15_at_12.26.27.png",
        "7-1.png",
        3740,
        1853,
        "#fbfcfc"
      ]
    }
  ]
}
[/block]

1. Navigate to [bridge.aion.network](https://bridge.aion.network)
2. Enter the amount of `AION ERC-20` tokens you want to transfer into `AION` Coins. We recommend transferring a **small amount** on your first attempt, rather than attempting to move your entire `ERC-20` balance in one go.

![Token Bridge Page](https://files.readme.io/7e0ecf1-1-1.png)

1. Enter your **Aion Wallet Address**, also called **Public address**. This can be found by opening the **Aion Desktop Wallet** application, and navigating to **Accounts**.

![Aion Wallet showing a Public Address](https://files.readme.io/ce3aa72-account.png)

4. Confirm the address you entered perfectly matches your own wallet address. Once you are happy the address is correct, tick the checkbox.
5. Click **Generate Transfer**
6. Select **MyCrypto** or **MyEtherWallet**, depending on which interface you are using and move on the next page in this guide.

![Completed Token Bridge Transfer Page](https://files.readme.io/99198ab-image.png)

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-mycrypto"><i class="fa fa-chevron-right"></i>Transfer Tokens on MyCrypto</a></td></tr><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-myetherwallet"><i class="fa fa-chevron-right"></i>Transfer Tokens on MyEtherWallet</a></td></tr></tbody></table></div>

-------------------

# Process the Transaction

The followings steps differ between MyCrypto and MyEtherWallet. Make sure you are following the steps for your chosen method.

[block:parameters]
{
  "data": {
    "0-1": "<br>[![MyEtherWallet Logo](https://files.readme.io/11c8657-Layer_2_2.png)](#section-myetherwallet)<br>&nbsp;",
    "0-0": "<br>[![MyCrypto Logo](https://files.readme.io/b815967-Layer_2_3.png)](#section-mycrypto)<br>&nbsp;",
    "h-0": "MyCrypto",
    "h-1": "MyEtherWallet"
  },
  "cols": 2,
  "rows": 1
}
[/block]

## MyCrypto

#### Pre-Populated Fields

This step contains pre-populated fields that should not be changed. Editing these fields in any way could result in loss of coins.
[block:callout]
{
  "type": "danger",
  "title": "Don't Mess Up",
  "body": "During the Token Swap, you will be taken to a web page that is automatically filled in. **Do not edit the AMOUNT TO SEND field**. If you change this field, you'll end up sending your Aion to the Aion Contract, and you might loose everything forever.\n\nA bunch of Aion users have ignored / missed this step, and have lost their `Aion`. Don't be like them."
}
[/block]
Based on your inputs in the Bridge UI we have pre-populated the fields in MyCrypto. No other inputs are required for you to input. **Altering any of the fields can result in a transaction failure or loss of funds.**

1. You should now be on [legacy.mycrypto.com](legacy.mycrypto.com). Double check that the URL is `https://legacy.mycrypto.com/` and the certificate is signed by `MyCrypto, Inc (US)`.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/027387e-Screen_Shot_2018-09-15_at_11.38.41.png",
        "Screen Shot 2018-09-15 at 11.38.41.png",
        616,
        374,
        "#dfe5e5"
      ]
    }
  ]
}
[/block]
2. Select your wallet from the options listed and follow the on screen instructions.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/40604a9-Screen_Shot_2018-09-15_at_12.36.47.png",
        "Screen Shot 2018-09-15 at 12.36.47.png",
        463,
        514,
        "#f6f6f6"
      ]
    }
  ]
}
[/block]
3. The following fields are pre-populated:

    - **To Address**: the Aion Token contract (`0x4CEdA7906a5Ed2179785Cd3A40A69ee8bc99C466`)
    - **Data**: the code string of characters "Data" was generated by the Bridge Transfer UI using the inputs you provided.
    - **Gas Limit**: `100000`
[block:callout]
{
  "type": "danger",
  "title": "Don't Mess Up!",
  "body": "During the Token Swap, you will be taken to a web page that is automatically filled in. **Do not edit the AMOUNT TO SEND field**. If you change this field, you'll end up sending your Aion to the Aion Contract, and you might loose everything forever.\n\nA bunch of Aion users have ignored / missed this step, and have lost their `Aion`. Don't be like them."
}
[/block]
4. The **Amount to Send** field is empty. It is important that you **do not enter a value into this field**. The value of the transaction is stored within the **Data** field, and duplicating this information will cause an error.
5. Confirm that all the information is correct! :100:

[block:callout]
{
  "type": "danger",
  "title": "Leave 'Amount to Send' Blank",
  "body": "Do not enter a value in the **Amount to Send** field. Entering a value into the field **will** result in a **loss of funds**."
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/f28dce0-5956e25-test.jpg",
        "5956e25-test.jpg",
        840,
        645,
        "#e8e6e0"
      ]
    }
  ]
}
[/block]
6. Click **Generate Transaction**. The **Raw transaction** and **Signed transaction** fields are now visible.

[block:callout]
{
  "type": "danger",
  "title": "Don't Mess Up!",
  "body": "**Do not edit the AMOUNT TO SEND field**. If you change this field, you'll end up sending your Aion to the Aion Contract, and you might loose everything forever."
}
[/block]
7. Select **Send Transaction**.
8. In the **You are about to send...** confirmation window, double check that all the information is correct. Once you are sure, click **Yes, I am sure! Make transaction.**.
9. Make a note of the **TX Hash**. You can use this to monitor your token swap.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/d6861d7-foo.png",
        "foo.png",
        1440,
        150,
        "#74c36c"
      ]
    }
  ]
}
[/block]

Transaction can take up to 2 minutes to start to process, and can take up to 3 hours to fully complete during peak times.

You have now finished sending the transaction using a partner! :+1:

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-monitor-swap-progress"><i class="fa fa-chevron-right"></i>Track the Progress of your Token Swap</a></td></tr></tbody></table></div>

## MyEtherWallet

#### Pre-Populated Fields
[block:callout]
{
  "type": "danger",
  "title": "Don't Mess Up",
  "body": "During the Token Swap, you will be taken to a web page that is automatically filled in. **Do not edit the AMOUNT TO SEND field**. If you change this field, you'll end up sending your Aion to the Aion Contract, and you might loose everything forever.\n\nA bunch of Aion users have ignored / missed this step, and have lost their `Aion`. Don't be like them."
}
[/block]
This step contains pre-populated fields that should not be changed. Editing these fields in any way could result in loss of coins.

Based on your inputs in the Bridge UI we have pre-populated the fields in MyEtherWallet. No other inputs are required for you to input. **Altering any of the fields can result in a transaction failure or loss of funds.**

1. You should now be on [MyEtherWallet.com](MyEtherWallet.com). Double check that the URL is `https://www.myetherwallet.com/` and the certificate is `MyEtherWallet Inc (US)`.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/fda35a0-Screenshot_from_2018-09-14_15-14-26.png",
        "Screenshot from 2018-09-14 15-14-26.png",
        637,
        394,
        "#7c7c7d"
      ]
    }
  ]
}
[/block]
2. Select your wallet from the options listed.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9a1cb78-Untitled.jpg",
        "Untitled.jpg",
        579,
        558,
        "#f7f8f8"
      ]
    }
  ]
}
[/block]
3. Go to the **Send Ether and Tokens** tab if you aren't already on it. You should notice three pre-filled fields:

    - **To Address**: the Aion Token contract (`0x4CEdA7906a5Ed2179785Cd3A40A69ee8bc99C466`)
    - **Data**: the code string of characters "Data" was generated by the Bridge Transfer UI using the inputs you provided.
    - **Gas Limit**: `100000`
[block:callout]
{
  "type": "danger",
  "title": "Don't Mess Up!",
  "body": "**Do not edit the AMOUNT TO SEND field**. If you change this field, you'll end up sending your Aion to the Aion Contract, and you might loose everything forever."
}
[/block]
4. The **Amount to Send** field is empty. It is important that you **do not enter a value into this field**. The value of the transaction is stored within the **Data** field, and duplicating this information will cause an error.
5. Confirm that all the information is correct! :100:

[block:callout]
{
  "type": "danger",
  "title": "Leave 'Amount to Send' Blank",
  "body": "Do not enter a value in the **Amount to Send** field. Entering a value into the field will result in a **loss of funds**."
}
[/block]

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/cc83d4e-1b6dbc8-1.png",
        "1b6dbc8-1.png",
        1714,
        869,
        "#dce3de"
      ]
    }
  ]
}
[/block]

6. Click **Generate Transaction**. The **Raw transaction** and **Signed transaction** fields are now visible.
[block:callout]
{
  "type": "danger",
  "title": "Don't Mess Up",
  "body": "**Do not edit the AMOUNT TO SEND field**. If you change this field, you'll end up sending your Aion to the Aion Contract, and you might loose everything forever."
}
[/block]
7. Select **Send Transaction**
8. In the **You are about to send...** confirmation window, double check that all the information is correct. Once you are sure, click **Yes, I am sure! Make transaction.**.
9. Make a note of the **TX Hash**. You can use this to monitor your token swap. 

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9b8a7f5-foo.png",
        "foo.png",
        1440,
        150,
        "#74c36c"
      ]
    }
  ]
}
[/block]

Transaction can take up to 2 minutes start to process, and can take up to 3 hours to fully complete during peak times.

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-monitor-swap-progress"><i class="fa fa-chevron-right"></i>Track the Progress of your Token Swap</a></td></tr></tbody></table></div>

# Monitor Swap Progress

1. Navigate to <a href="https://bridge.aion.network">bridge.aion.network</a>.
2. Input the **TX Hash** into the search bar.

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/5a35744-4-1.png",
        "4-1.png",
        3740,
        1853,
        "#fcfcfb"
      ]
    }
  ]
}
[/block]

3. The Aion Token Transfer Bridge displays the progress of your token transfer. The transfer is expected to take between 30-45 minutes.

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/d12f665-7-1.png",
        "7-1.png",
        3740,
        1853,
        "#fbfcfc"
      ]
    }
  ]
}
[/block]

## Check Aion Wallet

Once your transfer is complete, you can check your `Aion` coin balance using the [Aion Desktop Wallet](https://docs.aion.network/page/create-an-aion-wallet) or [Coinomi](https://docs.aion.network/page/create-an-aion-wallet).

[block:callout]
{
  "type": "info",
  "body": "The bridge transfer does not create a standalone transaction. Bridge transfers are internal transactions managed by the Aion Token Bridge contract. They are not displayed in the regular transaction history for your account.",
  "title": "No Transaction History"
}
[/block]

**Congratulations! You have now completed the Aion Token Swap, and are now holding native Aion Coins.** :+1:

-------------------

# Token Swap Feedback

[block:embed]
{
  "html": "<iframe class=\"embedly-embed\" src=\"//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Faionnetwork.typeform.com%2Fto%2FwmVKzn%3Ftypeform-embed%3Dembedly-full&url=https%3A%2F%2Faionnetwork.typeform.com%2Fto%2FwmVKzn&image=https%3A%2F%2Fimages.typeform.com%2Fimages%2FepLTu56KhuZb&key=f2aa6fc3595946d0afc3d76cbbd25dc3&type=text%2Fhtml&schema=typeform\" width=\"300\" height=\"500\" scrolling=\"no\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen=\"true\"></iframe>",
  "url": "https://aionnetwork.typeform.com/to/wmVKzn",
  "title": "Token Swap Feedback",
  "favicon": "https://aionnetwork.typeform.com/favicon.ico",
  "image": "https://images.typeform.com/images/epLTu56KhuZb"
}
[/block]