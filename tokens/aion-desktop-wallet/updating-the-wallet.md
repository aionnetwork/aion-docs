---
title: "Updating the Wallet"
excerpt: "Follow this process to make sure you don't lose any of your `AION`."
---
A new update for the Aion Desktop Wallet is available. In order to keep your `AION` safe, follow this procedure when updating.

## Linux

Since the Linux package runs from wherever you download it to, it is possible to have two version of the Aion Desktop Wallet available on your computer. If you want to avoid this, delete your current installation of the Aion Desktop Wallet before following these steps.

1. First off, open a terminal and make a copy of your Aion data:

```bash
cp -r ~/.aion ~/.aion-old
```

2. Download the latest Aion Desktop Wallet build from [Github](https://github.com/aionnetwork/Desktop-Wallet/releases).
3. Extract the folder to the desired directory and open a terminal.
4. Run the `.sh` file to start the wallet:

```bash
./aion_ui.sh
```

5. You should be able to see you old accounts. If they are there, feel free to delete the backup you made in step 1.

## Mac

1. First off, open a terminal and make a copy of your Aion data:

```bash
cp -r ~/.aion ~/.aion-old
```

2. Download the latest Aion Desktop Wallet build from [Github](https://github.com/aionnetwork/Desktop-Wallet/releases).
3. Open the `.dmg` file.
4. Copy the `AionWallet.app` application into your `Applications` folder.
5. Select **Replace** when asked what you want to do with the current Aion Wallet application.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/7c5b2dd-mac-rename.png",
        "mac-rename.png",
        511,
        198,
        "#cbcbcb"
      ],
      "caption": "Replace the Current Application"
    }
  ]
}
[/block]
6. Run your Aion Wallet from the `Applications` folder.
7. You should be able to see you old accounts. If they are there, feel free to delete the backup you made in step 1.

## Windows

1. First off, make a copy of your `.aion` folder. It should be in your home directory (`C:/Users/USERNAME/`).
2. Download the latest Aion Desktop Wallet build from [Github](https://github.com/aionnetwork/Desktop-Wallet/releases).
3. Open the `.exe` file.
4. The application will install.
5. You should be able to see you old accounts. If they are there, feel free to delete the backup you made in step 1.