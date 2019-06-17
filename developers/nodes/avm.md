---
title: Aion Virtual Machine
description: The Aion Virtual Machine (AVM) is a Turing complete execution engine that is core to the Aion Network. The AVM runs Java bytecode on the blockchain, enabling developers to build blockchain-based applications in Java. Its goal is to provide a robust global ecosystem that is familiar to the mainstream developer audience to unlock the potential of blockchain applications without learning new tools, frameworks or languages. The AVM will run alongside the solidity-compatible FastVM.
---

## AVM & JVM

**AVM is not a modification or rewrite of the underlying JVM**, but a bytecode transformer and runtime library, which provides control over how developers are allowed to interact with the AVM. It isolates DApps from each other while restricting access to class libraries.

## Storage

The storage system is an object graph based on reachability from the user code’s static variables, at the time the contract terminates.  This means that **storage is transparent to the developer** and can be optimized by the AVM.

Additionally, the top-level execution engine speculatively **runs all transactions concurrently**, abandoning partial transactions when data hazards are detected.

## Performance

The AVM uses the JIT compiler which optimizes the DApp code. It also features multi-threading, allowing increased throughput via concurrent transaction execution as opposed to most blockchain VMs.

## Reliability & Maturity

The core of the JVM is a very mature piece of software, changing little between releases and being used for a myriad of purposes, across countless environments, for over 2 decades. Anything we can do to leverage that history avoids potential pit-falls.

## Developer-friendly

The Java-based AVM leverages the entire Java tooling ecosystem, making developer onboarding and experience extremely streamlined. You get the full developer package including the compiler and IDE straight out of the box! That said, the AVM taps into a well-established community that has claimed the top spot for the #1 language (Java) in the past few years
