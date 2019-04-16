# Kernels

The kernel is essentially the engine that runs each node, and specifies how it can interact with other nodes. Aion has two kernels, one built using Java, and the other built using Rust.

This section details how you can install and configure a kernel. For information on using a kernel to interact with a blockchain network, see the [JSON RPC](/apis/json-rpc) section.

## Benefits of Multiple Kernels

Aion has two kernels available for use, one built upon Java, and another built upon Rust.

Security is a huge concern within blockchain networks. A major issue with a lot of blockchain protocol is that they only have a single kernel. If this kernel is compromised, the entire network can collapse. However with multiple kernel types, this attack vector is reduced. If the Java kernel is compromised, the Rust kernel can still continue mining and processing blocks. The same is true if the Rust kernel is compromised, the network can still function with the Java kernel.