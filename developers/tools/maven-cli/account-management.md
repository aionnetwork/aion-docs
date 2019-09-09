---
title: Account Management
description: The Maven CLI toolset has some useful ways to create, fund, and interact with your account.
---

The account management Maven _goal_ allows you to create, fund, list, and clear accounts both on the local (embedded) AVM, and on a remote node. All account management actions start with:

```bash
mvn aion4j:account
```

All remote actions require you to either specify your [endpoint URL](tools-maven-cli-endpoint-url) within the `pom.xml` file, or supply it as an argument when making a call. The supply your endpoint URL as an inline argument add `-Dweb3rpc.url="YOUR_ENDPOINT_URL"` to each command below. For example:

```bash
mvn aion4j:account -Dcreate -Dweb3rpc.url="https://aion.api.nodesmith.io/v1/mastery/jsonrpc?apiKey=ab40c8f5...."
```

This rest of the remote code examples in this article assume that you have entered your endpoint URL within your project's `pom.xml` file. Check out the [Endpoint URL section](tools-maven-cli-endpoint-url) if you need a refresher.

## Create an Account

### Local

Create a new account with no balance: `mvn aion4j:account -Dcreate`

To create an account with a starting balance, supply the `-Dbalance` argument with the above command, followed by the amount of `NAmp` you want the account to be funded with. For example, to create a new account with `2 AION` run:

```bash
mvn aion4j:account -Dcreate -Dbalance=2000000000000000000
```

### Remote

Create a new account with no balance: `mvn aion4j:account -Dcreate -Premote`

To create an account and also top it up using the Maven CLI faucet, add `-Dtopup` to the above command:

```bash
mvn aion4j:account -Dcreate -Dtopup
```

Check out the [Maven CLI Faucet section](tools-maven-cli-faucet) for more information on how the faucet works.

## Fund an Account

### Local

Add funds to the default account: `mvn aion4j:account -Dtopup -Dbalance=AMOUNT`

The `-Dbalance` argument takes `NAmp` as a parameter. `1 AION` is equal to `1000000000000000000 NAmp` (`1` with 18 `0`s).

```bash
mvn aion4j:account -Dtopup -Dbalance=2000000000000000000`
```

To specify a particular account include the `-Daccount` argument:

```bash
mvn aion4j:account -Dtopup -Daddress=a0cd996... -Dbalance=2000000000000000000`
```

### Remote

Add funds to an account: `mvn aion4j:account -Dtopup -Dpk=... -Daddress=... -Premote`.

Both the _private key_ and the _public address_ of the account you want to fund are required. This is to double-check that you are requesting funding for the correct account. The Maven CLI toolset _could_ determine the _public address_ by just using your _private key_. But by requiring both, the toolset can confirm that the information you have entered is correct and where you want to funds to be sent.

Check out the [Maven CLI Faucet section](tools-maven-cli/faucet) for more information on how the faucet works.

## List Accounts

### Local

List all your local accounts: `mvn aion4j:account -Dlist`.

To list the balances of all your local accounts use the `-Dlist-with-balance` argument:

```bash
mvn aion4j:account -Dlist-with-balance
```

If there are no local accounts, Maven will output the following:

```bash
mvn aion4j:account -Dlist

> ...
> [INFO] Mode : local (Embedded Avm)
> [INFO] No account to show
> ...
```

### Remote

List all your remote accounts: `mvn aion4j:account -Dlist -Premote`.

To list the balances of all your local accounts use the `-Dlist-with-balance` argument:

```bash
mvn aion4j:account -Dlist-with-balance -Premote
```

If there are no remote accounts, Maven will output the following:

```bash
mvn aion4j:account -Dlist -Premote

> ...
> [INFO] Mode : remote (Aion Kernel)
> [INFO] No account to show
> ...
```

## Clear Accounts

Remove all your accounts from the Maven CLI cache: `account -Dlist-clear`.

To run this function on a remote node, add the `-Premote` argument onto the command:

```bash
mvn aion4j:account -Dlist-clear -Premote
```

This command just clears the stored cache of amount accounts that Maven is aware of. These accounts are never actually _deleted_ from the blockchain. If you create an account on a remote node, give it balance, and use the `-Dlist-clear` command, that account still exists and will still contain `AION`. However, you will no longer have access to the private key, and will not be able to use that account again.
