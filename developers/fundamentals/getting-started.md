---
title: Getting Started
description: This page walks you through the workflow you can take to become proficient at blockchain development. Although the workflow may look similar to other blockchain development processes, this guide was created with the Aion Network in mind. After completing each step listed here, you should have a solid understanding of how to create your dApps on the Aion Network.
---

## Pick a Development Environment

The development environment is where you spend most of the time creating applications and interacting with the blockchain. There are two major setups available.

- [IntelliJ Plugin](/developers/tools/intellj-plugin)
- [Maven Command Line Interface Tool](/developers/tools/maven-cli)

Both of these environments achieve the same goals, they just use different routes to get there. The IntelliJ plugin is generally easier to use since everything can be performed using a user interface. However, if you're not comfortable with IntelliJ, or just prefer another IDE or text editor, then you may prefer to use the Maven CLI tool.

## Understand the Workflow

The workflow of creating dApps is somewhat different from _regular_ software development. This is mainly down to the unique features and restrictions that blockchain networks have.

The basic flow is:

1. Write
2. Compile
3. Test
4. Deploy
5. Call

The [developer quickstart](/developers/) runs through this process without you having to download anything or leave the browser.

## First Project

Once you've got the workflow down and have a solid understanding of the process for creating dApps, you are ready to create your first app. This app is incredibly basic and serves to show you how to use your chosen _development environment_.

Follow through the [IntelliJ end-to-end](/developers/tools/intellij-plugin/end-to-end/), or [Maven CLI end-to-end](/developers/tools/maven-cli/end-to-end/).

## Front End

Now that you're up to speed on how to create a simple application and store it on the blockchain, you should be ready to create a browser-based frontend so that your users can interact with your app. The two most common ways to create a front-end are to use Web3.js or Ethers.js, both of which are JavaScript frameworks created to help developers interact with the blockchain.

Examples of how to interact with the blockchain through each of these frameworks can be found on their respective examples pages:

- [Web3.js Examples](/developers/apis/web3-js/examples/)
- [Ethers.js Examples](/developers/apis/ethers-js/examples/)

## Testing

You may have been able to get up to this point without having to do much testing. Test-driven development (TDD) is important in any programming disciple, but especially more-so in dApp development.

Review the [end-to-end testing guide](/developers/basics/test-and-debug/end-to-end/) to get a solid understanding of how to run tests within IntelliJ.

## Aion Fundamentals

Having a solid understanding of both front-end and basic contract development is required before you jump into this section. Once you've got those parts down, you're ready to dive into the further complexities of how Aion smart contracts are created.

The [Fundamentals](/developers/fundamentals/) section walks through these points. Things like `@Callable` and `@Fallback` annotations are incredibly valuable when creating a dApp. It's a good idea to get a solid understanding of the packages section under fundamentals.

---

## Further Reading

That outlines the major sections of the Aion documentation. All that's left to do now is create a major project that shows off your skills. Some starting places would be a faucet or escrow service. The [AVM API](https://avm-api.aion.network/) website will be of help for pretty much any project you're creating.
