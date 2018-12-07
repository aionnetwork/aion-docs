---
title: Docker
---

# Docker

This guide will walk you through building a Docker image using the latest Aion kernel.

## Prerequisites

1. Ubuntu 16.04
2. Gradle (`apt install gradle -y`)

## Building Your Own Docker Image

1. Clone the latest kernel from the [AionNetwork/aion Github repository](https://github.com/aionnetwork/aion):

```bash
git clone https://github.com/aionnetwork/aion.git
```

2. Move into the `aion` folder and build the kernel using Gradle:

```bash
cd aion
./gradlew build
```