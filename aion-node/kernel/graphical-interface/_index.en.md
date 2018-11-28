---
title: Graphical Interface
weight: 1
chapter: false
---

# Graphical Interface

The Aion Kernel _Core_ includes a graphical user interface (GUI) which facilitates kernel management and provides basic wallet functionality. There are some [known issues and limitations](https://github.com/aionnetwork/aion/wiki/Graphical-Interface#known-issues--limitations).

To run the GUI, first download and extract the Aion kernel as per the [Getting the Kernel] in the [Kernel section of the Aion Owner's Manual](https://github.com/aionnetwork/aion/wiki/Aion-Owner's-Manual#kernel). Then, from the `aion` folder, run the following command:

```bash
./aion\_gui.sh
```

## Known issues and Limitations

The following are some known issues and limitation within the current kernel build.

### Abnormal Kernel Termination

If a kernel process is launched by the GUI and then terminated by some mechanism other than the GUI, the GUI may not notice this termination and enter an inconsistent state.

#### Resolution

1. Exit GUI.
2. Delete `$HOME/.aion/kernel-pid` file.
3. Re-launch GUI.

### Slow Transaction History Update

Recently sent transactions sometimes are slow to appear.

#### Resolution

The transaction will show up given some time. A refresh can be fored:

1. Exit the GUI.
2. Re-open the GUI.
3. Unlock the master account. The transaction history will now show the complete list.

### Large Database causes Connection Latency

Upon launching the kernel process, it will run an integrity check to verify the blocks in its database. During this time, the kernel is running, but the GUI cannot yet connect to it. Therefore, with a large database, it will stay in the `CONNECTING...` state for some time with no feedback until this check is complete.

#### Resolution

Wait for the integrity check to complete, the progress of which can be monitored from the kernel log file.

## Setup and Launch

If setting up Aion for the first time:

1. Download and extract the Aion kernel.
2. You should now have a directory named aion containing the Aion kernel and GUI

If you have an already-configured copy of Aion version `0.3.0+`, verify that the `Java API` is enabled in your `config.xml`:

```xml
<java active="true" ip="127.0.0.1" port="8547"/>
```

To launch the GUI, run the following command from the `aion` directory:

```bash
./aion.sh
```

This window should open shortly:

![https://github.com/aionnetwork/aion/wiki/images/gui/dashboard1.png](media/image1.png)

## Kernel Control

### Launch or Terminate the Kernel

The GUI can be used to launch an instance of the kernel by clicking **Launch Kernel** in the dashboard screen. After a kernel has been launched, it can be terminated by clicking **Terminate kernel**. The status of the kernel is indicated in the bottom-right corner:

- `NOT RUNNING`: Kernel is not running

- `CONNECTING`: Kernel is running, but the GUI has not yet connected to it.

- `CONNECTED`: Kernel is running and GUI is connected to it.

- `DISCONNECTED`: Kernel is running but the GUI is not connected to it. This is the state when kernel termination is in progress, but kernel has not yet exited.

**Note: Upon kernel launch, it must run an integrity check for its database. During this time, the GUI will be in `CONNECTING` state. For large databases, this can take some time.**

The GUI can only terminate a kernel instance that it launched. Furthermore, it is expected that a system runs only one instance of the kernel at one time. You must ensure no other instance of the kernel is running before launching one from the GUI.

When the GUI exits, the kernel does not automatically exit. In this case, upon re-launching the GUI, it will remember the instance that it had previously launched.

![https://github.com/aionnetwork/aion/wiki/images/gui/dashboard-kernel-launched.png](media/image2.png)

### Kernel Configuration

In the **Settings** screen, the GUI provides a built-in text editor for modifying the `config.xml` configuration file of the kernel. The configuration can only be saved if the kernel is not currently running.

![https://github.com/aionnetwork/aion/wiki/images/gui/settings1.png](media/image3.png)

Changes in the text editor are not saved until **Apply & Save** is clicked. This performs a basic XML validation before saving.

If undesirable changes were made in the text editor, the original saved state of the file can be restored by clicking **Reset**.

## Account Management

Account management is performed in the **Accounts** screen of the GUI. Upon first usage, the wallet will not have any accounts and will look like this:

![https://github.com/aionnetwork/aion/wiki/images/gui/accounts-no-master-acct.png](media/image4.png)

Once a master account is created the Accounts screen has an unlock button. Click **Unlock** to unlock wallet. After one minute of inactivity, the wallet automatically locks.

![https://github.com/aionnetwork/aion/wiki/images/gui/accounts-with-master-acct.png](media/image5.png)

### Add a New Account

There are two options to initialize your wallet by adding an account:

- [Recover a Previous Wallet](#section-recover-wallet). If you have an existing wallet from the Aion GUI with the corresponding mnemonic and password, use this option.

- [Create New Account](#section-create-new-account) - Create a new Aion GUI user.

#### Recover wallet

1. Click **Add Account** from the Accounts screen.
2. Under **Recover from seed**, input your mnemonic.
3. Input corresponding wallet password.
4. Click **Recover**.

#### Create new account

1. Click **Add Account** from the Accounts screen
2. Under **Create account** input an account name. This can be changed later.
3. Input a password.
4. Confirm chosen password.
5. Save and backup the seed mnemonic that appears. You will need this if you wish to recover your wallet later.

Clicking on **Add account** after creating the first account will automatically generate an account in your wallet. These accounts cannot be removed from the wallet.

![https://github.com/aionnetwork/aion/wiki/images/gui/accounts-mnemonic-popup.png](media/image6.png)

### Import account

There are two options to import an existing account:

- Import using a keystore file and password.
- Import using a private key.

#### Import with Keystore File

1. Click on the keystore space, and navigate to select your desired `keystore UTC` file.
2. Input corresponding keystore password.

![https://github.com/aionnetwork/aion/wiki/images/gui/accounts-import-keystore.png](media/image7.png)

#### Import with Private Key

1. Input your private key.
2. Create a password to use to unlock the account. There is no way to change this password.

![https://github.com/aionnetwork/aion/wiki/images/gui/accounts-import-privkey.png](media/image8.png)

#### Remember Me

There is a **Remember Me** option when importing accounts. Selecting this will display your imported accounts even if you re-launch your wallet. If this option is not selected, you will have to reimport these accounts if you re-launch the Aion Desktop Wallet.

#### Export Account

You may wish to save your accounts created on the Aion Wallet elsewhere. In this case, you will need to export the wallet (using the icon right of the accounts listing) and save the keystore file in your desired location. Note that the password you input here will be the new password to access the keystore file:

![https://github.com/aionnetwork/aion/wiki/images/gui/accounts-export.png](media/image9.png)

## Transactions

### Send `AION`

You have the option to transact `AION` and send it to another wallet. The receiving wallet wallet must accept native `AION` coins.

1. Make sure the account you wish to send `AION` from is unlocked under the **Accounts** listing. Click on the lock icon to unlock an account.
2. Navigate to the **Send** option in the GUI and verify your account information on the left.
3. On the right panel, input the address you are sending to and the amount of `AION` you want to send.
4. Click on **Generate Transaction** to send the `AION`. You will be notified when the transaction finishes.

![https://github.com/aionnetwork/aion/wiki/images/gui/send1.png](media/image10.png)

### Receive `AION`

Under the **Receive** tab of the GUI, you can send your public wallet address by scanning the QR code to display the wallet address, or by copying the address to your desktop clipboard.

![https://github.com/aionnetwork/aion/wiki/images/gui/receive1.png](media/image11.png)