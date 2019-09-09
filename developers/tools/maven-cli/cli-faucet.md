---
title: CLI Faucet
description: A faucet is a way for you to get free coins or tokens to test you applications on the Aion testnet. This is because deploying an application on a blockchain network requires funds. These funds are then taken and distributed to the network so that they can process your request. The Maven CLI and Aion4:j plugin have a built in faucet that can help you speed up your blockchain application development! Now there's no need to leave your development workflow just to get some test tokens!
---

If you want to know how to use the CLI faucet in your projects, check out the [Account Management section](/developers/tools/maven-cli/account-management). This page discusses how the faucet works and how it's protected from abuse.

## Faucet Flow

This is the general flow when a developer requests a new account and a _top-up_ from the CLI faucet.

1. The Maven plugin creates an account and prints out both sets of keys to the terminal.
2. The plugin checks the balance of the newly formed account. It _should_ be `0`.
