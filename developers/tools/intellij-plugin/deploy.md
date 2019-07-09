---
title: Deploy
description: Once a blockchain application has been written, it can be compiled and deployed to a local or remote blockchain network. Deploying blockchain applications is similar to how regular applications are deployed currently, however there are some differences. One major difference is that to deploy an application to a public blockchain network, an account must be supplied with tokens in order to cover the deployment costs. However, when deploying to a local network through the Aion4j plugin there is no need to create an account or supply it with test tokens, as everything is contained within the local network.
weight: 500
---

Compile and deploy the contract.

## Local

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Embedded** > **Deploy**.

![Deploy to Embedded AVM](/developers/tools/intellij-plugin/images/deploy-to-embedded.gif)

You should see a notice when the contract has successfully deployed:

![Successful Deployment Notice](/developers/tools/intellij-plugin/images/successful-deployment-notice.png)

## Remote

Run this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Remote** > **Deploy**. You will be prompted to enter a [node URL](configure#remote-kernel) and [deployer address](configure#remote-kernel) if you haven't filled them in already.

This command will compile your contract before attempting to deploy, unless you have specified that you do not want this to happen in the [configuration options](configure#remote-kernel).
