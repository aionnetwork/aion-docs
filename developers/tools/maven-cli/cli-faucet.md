---
title: CLI Faucet
description: A faucet is a way for you to get free coins or tokens to test your applications on the Aion testnet. This is because deploying an application on a blockchain network requires funds. These funds are then taken and distributed to the network so that they can process your request. The Maven CLI and Aion4:j plugin has a built-in faucet that can help you speed up your blockchain application development! Now there's no need to leave your development workflow just to get some test tokens!
---

If you want to know how to use the CLI faucet in your projects, check out the [Account Management section](/developers/tools/maven-cli/account-management). This page discusses how the faucet works and how it's protected from abuse.

## Faucet Flow

This is the general flow when a developer requests a new account and a _top-up_ from the CLI faucet.

1. The Maven plugin creates an account and prints out both sets of keys to the terminal.
1. The plugin checks the balance of the newly formed account. It _should_ be `0`.
1. A call is made to a web service to retrieve a _challenge_. The user's machine then tries to generate a solution to the challenge.
1. Once a solution is found the Maven plugin send the solution back to the web service for validation.
1. If according to the web service, the solution is correct then a call is placed to the faucet service. The developer's public address is included in this call.
2. Assuming that the supplied address has requested a _top-up_ below the threshold then a transaction from the faucet to that account is initiated.

## Protections

To protect the faucet from abuse several checks are made. The first protection is to have the user's machine to perform a HashCat challenge. This problem is computationally complex.

The complexity of this challenge increases if the user sends multiple requests to the faucet over a short period. The IP address of each user is logged for 24 hours to check who is sending requests. Repeated requests from the same IP during 24 hours will increase the difficulty of a challenge.

Lastly, the faucet contract limits each account to three transfers within 24 hours.
