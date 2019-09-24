---
title: Accounts
description: What accounts are. Why they're necessary.
---

## Transactions

Go through how transactions work in blockchain & review that you have to pay a fee for every change to the _state_ of the network.

## Account Creation

Talk about how wallets/accounts are made, how their public & private keys work, how signing stuff happens, and how accounts are assigned / found within Web3.js context.

## Accessing an Account

There's loads of different ways to view your account: online wallets, offline wallets, browser-based wallets, web3.js, ethers.js, IntelliJ, Maven. How examples of all these with screenshots if possible.

## Funding an Accout

Publish stuff to mainnet requires actual money from an exchange, since you're actually paying the network to do something. But if you're running stuff on a testnet then you can just get free money from a faucet.

## Protection & Recovery

Accounts are kinda fickle. Talk about how seed phrases work (how home wallets will show you _every_ possible public/private key combo with a seed phrase, where some wallets will only show the first one). If someone has your private key then they have complete access to your account. Private keys on a testnet can open the associated private key on the mainnet, they're built the exact same way. Talk about splitting up your money across account to. How hard wallets work, why hot wallets are dangerous. Why you should never publish a private key anywhere and the use of `.env` files is super useful.
