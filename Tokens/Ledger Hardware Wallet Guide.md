---
title: "Ledger Hardware Wallet Guide"
excerpt: ""
---
The Ledger Nano S is a hardware wallet that connects to your computer through USB. It functions as a more secure way to store your private keys for AION accounts, and supports various other cryptocurrencies as well. An individual accessing a Ledger hardware wallet would need to have both the physical device and PIN code to access their crypto assets, and each transaction will need to be confirmed through the hardware wallet in order to be processed.

You will need to install the Aion app on your Ledger device to manage AION coins with the Aion Desktop Wallet (walkthrough below). The Aion app is developed and supported by the [Aion community](https://aion.network/). 
[block:api-header]
{
  "title": "Prerequisites"
}
[/block]
Make sure you have done the following before you begin transacting Aion coins through your Ledger hardware wallet. 
- [Initialize](https://support.ledgerwallet.com/hc/en-us/articles/360000613793) your Ledger device 
- [Update](https://support.ledgerwallet.com/hc/en-us/articles/360002731113) your Ledger device to the latest firmware 
- [Download](https://github.com/aionnetwork/Desktop-Wallet/releases/tag/1.1.0) and install the latest Aion Desktop Wallet release installation [guide ](page:create-an-aion-wallet)
- Ledger Live is [ready to use](https://support.ledgerwallet.com/hc/en-us/articles/360006395233) 

### Connection Issues

If you are running Windows or Linux, you may encounter connection issues. In this case, please refer the the troubleshooting guide provided by Ledger [here](https://support.ledgerwallet.com/hc/en-us/articles/115005165269-Fix-connection-issues).
[block:api-header]
{
  "title": "Install the Aion App"
}
[/block]
1. Open the **Manager** in [Ledger Live](https://www.ledger.com/pages/ledger-live) 
2. Connect and unlock your Ledger Nano S 
3. If asked, allow the manager on your device by pressing the right button 
4. Find **Aion** in the app catalogue
5. Click the **Install** button of the app 
    - an installation window appears 
    - your device will display **Processing...** 
    - the app installation is confirmed 
[block:api-header]
{
  "title": "View Accounts on the Ledger Hardware Wallet"
}
[/block]
6. Connect and unlock your Ledger device. Open the Aion app.
7. Navigate to **Settings** within the Aion app on your device, and ensure that **Contract data** is set to **yes**
8. Open the Aion Desktop Wallet, and select **Import account**: 

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/13fb18c-1.png",
        "1.png",
        846,
        562,
        "#f5f5fb"
      ]
    }
  ]
}
[/block]
9. Select **Ledger**, click **Connect to Ledger**, and finally **Import**.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/e78874d-2.png",
        "2.png",
        849,
        564,
        "#f3f2fa"
      ]
    }
  ]
}
[/block]
10. Choose the account you wish to open, then click **Continue**:
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/661c454-3.png",
        "3.png",
        851,
        562,
        "#f1f0f5"
      ]
    }
  ]
}
[/block]
11. Notice that the account you opened from the Ledger hardware wallet is now available (along with its balance) on your Aion Desktop Wallet under the "Accounts" tab: 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/d8bcd24-5.png",
        "5.png",
        853,
        561,
        "#f4f3f9"
      ]
    }
  ]
}
[/block]
12. Make sure that the account you wish to send from is unlocked (click to unlock): 
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/f3d475d-4.png",
        "4.png",
        851,
        562,
        "#f3f3f9"
      ]
    }
  ]
}
[/block]
13. Navigate to the "Send" tab on the Aion Desktop Wallet, verify your account information on the left panel.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/479554c-5.png",
        "5.png",
        851,
        562,
        "#eeedf5"
      ]
    }
  ]
}
[/block]
14. Enter your transaction details on the right: **To address** and **Amount to send**
15. Click on **Generate transaction** and note the "sending transaction" feedback:
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/e48c87b-sending_transaction.png",
        "sending transaction.png",
        406,
        244,
        "#d5d2da"
      ]
    }
  ]
}
[/block]
16. Your Ledger device will now ask for confirmation to send the transaction. **Verify transaction details on the Ledger device display, before approving the transaction.**
[block:api-header]
{
  "title": "Receive AION"
}
[/block]
17. Navigate to the "Receive" tab of the desktop where you will find your public account address. Use either the QR code or public address to provide the sender with your public key, and verify this address on your Ledger device before using it:
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/8ca48e2-6.png",
        "6.png",
        851,
        562,
        "#f1f1f6"
      ]
    }
  ]
}
[/block]

[block:callout]
{
  "type": "info",
  "title": "Contact Us",
  "body": "If you are having issues with connecting your Ledger device with the Aion Desktop Wallet, feel free to reach out to us!\n- [Aion Forum](https://forum.aion.network/)\n- [Reddit](https://www.reddit.com/r/AionNetwork/)\n- Email [support@aion.network](mailto:support@aion.network)"
}
[/block]
# Troubleshooting

If you're having problems connecting your Ledger wallet to your Aion wallet, take a look at the troubleshooting steps below.

1. Make sure that the Aion app is installed on your Ledger wallet. Ledger have posted a guide on [how to install the Aion app](https://support.ledgerwallet.com/hc/en-us/articles/360008599834-Aion-AION-).
2. You need to have the Aion app **open** on your Ledger wallet when you connect. Open the Aion app on the Ledger and _then_ try to connect.
3. Make sure that the **contract data** is set to **on** within the Aion app on your Ledger.