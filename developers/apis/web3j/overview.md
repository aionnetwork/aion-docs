---
title: Overview
description: Web3J allows you to connect JVM applications to Aion blockchains with Web3J, a lightweight, reactive, type-safe library for Java, Android, Kotlin and Scala. It does this by wrapping your blockchain application in a standard application wrapper.
weight: 1
---

Web3J is a highly modular, reactive, type-safe Java and Android library for working with Smart Contracts and integrating with clients (nodes) on the Aion network. This allows you to work with the Aion blockchain, without the additional overhead of having to write your own integration code for the platform. Java and the Blockchain talk provides an overview of blockchain, Aion, and Web3J.

## How Web3J Works

The point of Web3J is to allow regular, off-chain, Java applications to talk to the blockchain. There are three steps to this process.

### Compile a Java Contract

This step is pretty simple. You write and test a Java contract and compile it on your computer. This process gives you a `.jar` file.

### Create an Importable Class

You take the `.jar` file and pass it through a script. This script turns your `.jar` file into bytecode. This bytecode is then placed within a Java class.

### Import the Class

Once you have this new Java class, you can import it into a new or existing standard Java application.

## Getting Started

If you're new to Web3J, we recommend following the end-to-end tutorial through. It will give you a good grasp on the basics of integrating Web3J into your standard Java applications. If you've used Web3J before and want to know the process for setting it up on an Aion blockchain, take a look at the [Setup Project](/developers/apis/web3j/setup-project) section.

## Official Documentation

Web3 Labs hosts and maintains the official Web3J documentation. Aion specific [examples](/developers/apis/web3j/examples) and [walkthroughs](/developers/apis/web3j/end-to-end) can be found here.

## Dependencies

It has five runtime dependencies:

- [RxJava](https://github.com/ReactiveX/RxJava) for its reactive-functional API
- [OKHttp](https://hc.apache.org/httpcomponents-client-ga/index.html) for HTTP connections
- [Jackson Core](https://github.com/FasterXML/jackson-core) for fast JSON serialisation/deserialisation
- [Bouncy Castle](https://www.bouncycastle.org/) ([Spongy Castle](https://rtyley.github.io/spongycastle/) on Android) for crypto
- [Jnr-unixsocket](https://github.com/jnr/jnr-unixsocket) for *nix IPC (not available on Android)
