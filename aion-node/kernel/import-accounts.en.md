---
title: Import Accounts
---

# Import Accounts

When switching to a new code binary, you may need to import your accounts from the old binary. In the following, we will describe the process of exporting accounts from a previous build and importing them to the latest release.

For the purpose of this tutorial we denote:

- `aion-old` the folder with the release that contains the accounts we want to import.
- `aion-new` the new release that will be used in the future.

1. In a terminal, navigate to the old folder and get a list of all your accounts:

```bash
cd aion-old
./aion.sh -a list
```

As output, you will get the list of public keys for your accounts, for example:

```bash
0xa0abcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdab
0xa012341234123412341234123412341234123412341234123412341234123412
```

2. Next, get the private key associated with each account you want to export:

```bash
./aion.sh -a export 0xa0abcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdab
```

Your private key will be displayed after your successfully enter your password.

```bash
Please enter your password:
Your private key is: 0xabcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234
```

3. Use this private key to import the account:

```bash
cd aion-new
./aion.sh -a import 0xabcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234
```

After entering the correct password associated with the account twice, the account will be imported.

```bash
Please enter a password:
Please re-enter your password:
The private key was imported, the address is: 0xa0abcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdab
```

4. Verify that the account exists in the new installation.

```bash
./aion.sh -a list
```

This should show your newly imported account.

```bash
0xa0abcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdabcdab
```