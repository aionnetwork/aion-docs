---
title: Updating the Wallet
weight: 20
---

# Updating the Wallet

When updating your Aion Desktop Wallet, the process is different depending on your operating system adn which version you are updating from.

## Linux

The update process for Linux does not change depending on your current version number.

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

5. You should be able to see your old accounts. If they are there, feel free to delete the backup you made in step 1.
6. Delete your _old_ `aion_ui.sh` file.

## Mac

1. First off, open a terminal and make a copy of your Aion data:

```bash
cp -r ~/.aion ~/.aion-old
```

2. Download the latest Aion Desktop Wallet build from [Github](https://github.com/aionnetwork/Desktop-Wallet/releases).
3. Open the `.dmg` file.
4. Copy the `AionWallet.app` application into your `Applications` folder.
5. Select **Replace** when asked what you want to do with the current Aion Wallet application.
6. Run your Aion Wallet from the `Applications` folder.
7. You should be able to see your old accounts. If they are there, feel free to delete the backup you made in step 1.

## Windows

1. First off, make a copy of your `.aion` folder. It should be in your home directory (`C:/Users/USERNAME/`).
2. Download the latest Aion Desktop Wallet build from [Github](https://github.com/aionnetwork/Desktop-Wallet/releases).
3. Open the `.exe` file.
4. The application will install.
5. You should be able to see your old accounts. If they are there, feel free to delete the backup you made in step 1.