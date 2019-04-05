# Kernels

When interacting with the Aion blockchain network, the kernel is the lowest level. The kernel is essentially the engine that runs each node, and specifies how it can interact with other nodes. Aion has two kernels, one built using Java, and the other built using Rust.

## Two Kernels

Aion has two kernels available for use, one built on Java, and another built on Rust. There are several of reasons for multiple kernels, the main two being security and variability.

With two kernels available, developers can choose to create their contracts using either Java or Rust. In the future, Aion plans to increase the amount of kernels available to developers, thus extending the options for programming languages.

Security is a huge concern within blockchain networks. A major issue with a lot of blockchain protocol is that they only have a single kernel. If this kernel is compromised, the entire network can collapse. However with multiple kernel types, this attack vector is massively reduced. If the Java kernel is compromised, the Rust kernel can still continue mining and processing blocks.

## Smart Contract Languages

With multiple kernels available, contracts can be written in multiple languages. This is achieved through the use of the Aion Virtual Machine (AMV). Contracts are written in either Java or Rust and passed to the AVM. When the AVM compiles the contract it turns them into bytecode, which is read but either the Java or Rust kernel.