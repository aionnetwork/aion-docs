Aion Rust Kernel provides the interfaces on port 8547 for wallet
functions like [Aion JAVA
APIs](https://github.com/aionnetwork/aion_api). These are all the APIs
on port 8547 that Aion Rust Kernel supports on the current release.

## Enable Wallet

Aion Rust Kernel, by default, disables the wallet functionalities. To
enable wallet, you need to launch the Kernel with --enable-wallet option
or update configuration with

\[wallet\]

disable = false

## Enable Secure Connection

Like [Aion JAVA APIs](https://github.com/aionnetwork/aion_api), Aion
Rust Kernel can start the wallet APIs service with a secure connection
by editing configuration with

\[wallet\]

secure\_connect = true

or launching Kernel with option --secure-connect.

## Wallet Configuration

The Kernel generates a pair of zmq key files
under $HOME/.aion/zmq directory. Open Aion Desktop Wallet and go to
Settings tab. Select "Add connection", enter the connection info, copy
the content of $HOME/.aion/zmq/zmqCurvePubkey into "Access Key" field,
save the connection, and click "Apply" button. The connection between
Aion Wallet and the Kernel should be established.
