---
title: Account Creation and Management
---

As mentioned in the [ADS public pool operator guide](https://learn.aion.network/docs/public-pool-operator), the staking pool operator is required to manage two keys: [management key](https://learn.aion.network/docs/public-pool-operator#section-management-key-cold-key-) and [block-signing key](https://learn.aion.network/docs/public-pool-operator#section-block-signing-key-hotkey-). In this guide, we will walk you through how you can create new accounts and export the keys.

## Java Client

### Create New Accounts

1. Open a terminal and navigate into your Aion kernel folder.
2. Use the following commands to create a new account, make sure you include the network to be `amity`:

```bash
./aion.sh -n amity -a create
```

3. The kernel will ask you to enter the password:

```bash
Please enter a password:
Please re-enter your password:
```

4. Then an account is created, save your public address somewhere:

```bash
A new account has been created: 0xa0afad82790c7a00a55c60594e6317ab94337aa0580c6e2282444d83d95922b5
The account was stored in: ./amity/keystore
```

### Export an account

1. You can export your account by running the following command, replacing `0xa0a...` with your _public address_:

```bash
./aion.sh -n amity -a export 0xa0a...
```

2. Enter your password:

```bash
Searching for account in: ./amity/keystore
Please enter your password:
Your private key is: 0x0e0e...
```

Make sure to save your private key somewhere safe and never expose it to anyone else.

### List Java Accounts

If you ever forget what your public address is, run this command to view all the accounts listed within the keystore:

```bash
./aion.sh -n amity -a l

> All accounts from: ./amity/keystore
> 0xa0575851a8ec20a6e1c9ed5ccdf15590704622919067e5af7ef82b246dd5c880
```

## Rust

### Create an Account

1. Navigate to wherever you unpackaged your Aion Rust node:

```bash
cd ~/aion_rust
ls

> aion  amity  amity.sh  custom  custom.sh  libs  mainnet  mainnet.sh  mastery  mastery.sh
```

2. Create an account on the _Amity Test Network_:

```bash
./amity.sh account new
```

3. Enter a password for this account and confirm it:

```bash
> please type password:
> please repeat password:
```

4. The Rust kernel will output your public key:

```bash
> 05bd7529c9ab655fb62878a1528c099acb60889abf585d0a445071
```

### Export an Account

If you want to see the private key of an account run the following steps:

1. List the available accounts within the keystore:

```bash
./amity.sh account list
> 0xa03f0682a605bd7529c9ab655fb62878a1528c099acb60889abf585d0a445071
```

2. Copy the public key to your clipboard.
3. Call the `export-to-key` to get the private key for that account:

```bash
./amity.sh account export-to-key 0xa03f0682a605bd7529c9ab655fb62878a1528c099acb60889abf585d0a445071
```

4. The kernel will output the private key to that account after you enter the password used when creating the account:

```bash
> please type password:
> Your private key is: 0x96f9a21a9e37554128a8fc82bc9e4296f391035bcae87c3a8205a206ffaccf434c6ec723a7b30f6161aa836dc833ecfff93ff5dfbad5cfb8d106112239824de9
```

### List Rust Accounts

You can use the `call` function to show all the keys stored within this kernel's keystore:

```bash
./amity.sh account list

> 0xa03f0682a605bd7529c9ab655fb62878a1528c099acb60889abf585d0a445071
> 0xa0915f5c6deac82078a3818f910b42ec50cd0cea2459a08f48a2dcf73ed1c599
```
