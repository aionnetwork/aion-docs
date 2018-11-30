# Recovery Period
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/ba19356-changelly-logo.png",
        "changelly-logo.png",
        227,
        57,
        "#30684e"
      ],
      "caption": "Changelly logo"
    }
  ]
}
[/block]
#### We are now in the recovery period of the token swap.

Changelly is now the **only** exchange available to do the token swap. Changelly will remain available **until 21st December 2018**. After that date you will not be able to perform the token swap using Changelly.
[block:callout]
{
  "type": "success",
  "body": "If you encounter any issues during your swap process not covered in this guide, please reach out on any of our official channels below or [support@aion.network](mailto:support@aion.network).\n\n[Aion Forum](https://forum.aion.network/)\n[Telegram](https://t.me/aion_blockchain)\n[Twitter](https://twitter.com/aion_network?lang=en)",
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

1. Download the `aion_ui.zip` file from the [Aion Wallet Repository](https://github.com/aionnetwork/Desktop-Wallet/releases/).
2. Extract the folder to your root `~` directory.
3. Open a terminal and run: `~/aion_ui/aion_ui.sh`.
4. The Aion Desktop Wallet is now open on your desktop. Run the above command again if you want to re-open the wallet.

### One-line Installation

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-setup-your-wallet"><i class="fa fa-chevron-right"></i>Setup Your Wallet</a></td></tr></tbody></table></div>

## macOS

1. Download the `AionWallet.dmg` application image from the [Aion Wallet Github repository](https://github.com/aionnetwork/Desktop-Wallet/releases/).
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
2. Download the `AionWalletSetup.exe` executable from the [Aion Wallet repository](https://github.com/aionnetwork/Desktop-Wallet/releases/).
3. Run `AionWalletSetup.exe` on your computer. Accept any security warnings that pop up.
4. Follow through the installation and restart your computer.
5. You can now open the wallet through the **Start Menu**.

#### Unsigned Executables

The `AionWalletSetup.exe` currently isn't signed, which means you may run into some security warnings during the installation process. Just click **OK** through these warnings. We are in the processes of getting all the Aion executable signed and recognized by Microsoft.

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-setup-your-wallet"><i class="fa fa-chevron-right"></i>Setup Your Wallet</a></td></tr></tbody></table></div>

-------------------

# Setup Your Wallet

This tutorial assumes that you want to create a new account within your wallet. If you already have an account setup in your wallet but you have forgotten your password, you can recover it by following the [I've Forgotten My Password guide](https://docs.aion.network/v1.1/docs/troubleshooting#section-i-ve-forgotten-my-password).

![The Aion Desktop Wallet](https://files.readme.io/90cc2c2-1-accounts.png)

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

<div class="nextSteps"><h2>What's Next?</h2><table><tbody><tr><td><a ui-sref="docs.show({'doc': 'interact-with-your-wallet'})" href="#section-currently-supported-exchanges"><i class="fa fa-chevron-right"></i>Check Token Compatibility</a></td></tr></tbody></table></div>

-------------------

# Currently Supported Exchanges

We are now in the recovery period of the token swap. Changelly is now the **only** exchange available to do the token swap. Changelly will remain available **until 21st December 2018**. After that date you will not be able to perform the token swap using Changelly.

## <a href="https://changelly.com/" target="_blank">Changelly</a>

For an up-to-date and detailed breakdown of Changelly's swap process please refer to <a href="https://medium.com/@Changelly/wanna-swap-your-aion-erc20-tokens-to-aion-coin-do-it-with-changelly-e2d722ec8ab8" target="_blank">their guide</a>.

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/994a87d-Changelly_1.0_home-unsigned.png",
        "Changelly_1.0 home-unsigned.png",
        1472,
        840,
        "#26213f"
      ]
    }
  ]
}
[/block]

-------------------

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

Once your transfer is complete, you can check your `Aion` coin balance using the [Aion Desktop Wallet](https://docs.aion.network/v1.1/docs/aion-desktop-wallet) or [Coinomi](https://www.coinomi.com/en/).

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