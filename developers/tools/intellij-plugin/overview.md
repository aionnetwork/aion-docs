---
title: IntelliJ Overview
description: The Aion4j plugin for IntelliJ is packed with features that can help speed up your contract development. You can compile, deploy, and call your contract to a local or remote node, all from within the IntelliJ IDE.
weight: 1
table_of_contents: true
next_page: /developers/tools/intellij-plugin/install-the-plugin
---

## Intellj Plugin Overview

IntelliJ by Jetbrains is one of the most popular Java IDEs avaiable. It comes with a lot of built-in tool and debuggers to help you developer Java applications. [It's also free](https://www.jetbrains.com/idea/). To compliment IntelliJ, a plugin has been developed to enable contract developers to create Java contracts using IntelliJ and the Aion virtual machine.

### Features

The Aion plugin for IntelliJ is packed with features that can help speed up your contract development.

### Requirements

- IntelliJ `2018.3.0` and above
- Java 10 and above

#### Embedded AVM

The plugin contains an embedded version of the Aion virtual machine. This means you can compile and deploy your contract locally on any machine, all without having to connect to a actual node in the network. The embedded AVM is incredibly light-weight, as it's not actually running a full node on your machine.

#### Remote AVM Connections

Once you get to the point where you want to share your contract, you can deploy to a remote Aion node and call the contracts directly from there. This plugin manages the connection details and configuration, so you can get on with developing and testing your contract.

#### Easy to Use

Instead of having to memorize terminal commands and calls, you can control the entire plugin using the IntelliJ user interface. There's no need to leave IntelliJ at all to perform any actions with the AVM. Everything from deploying a contract to calling it on the network is possible in a few clicks.
