---
title: Create Account
description: The nature of blockchain development requires applications and users to have accounts. The IntelliJ IDE, along with the Aion4j plugin, allows developers to create accounts on the fly, and use them to deploy and interact with dApps.
table_of_contents: true
next_page: /developers/tools/intellij-plugin/deploy
weight: 400
---

To send transactions, deploy contracts and interact with them, you need an AION account with sufficient balance.

### Local

Create an account with a specified amount of `AION` for testing on embedded AVM locally.

Right click anywhere in your AVM project and selecting **Aion Virtual Machine** → **Embedded** → **Create Account**. Then enter the address you want to create, and the amount of `AION` you want to be added into it. The address you enter must be a valid `AION` address. The `Balance` is in nAmp, where 1 AION = 10^18 nAmp.

Here's ten sample addresses that you can use to create accounts on the embedded AVM (you are not limited to using just these addresses):

```text
0xa001e2afd2cf8eca0be0858326a50f68df006ea1e1db366d20ca52a1bba0ef13
0xa0f1002373877bd6987f23af0daa97f5d886d591cf308408cb396eda44f3456e
0xa02f908cc59e88f06e9efd549ae757796948088c608937b11456f07963cf6bd8
0xa0671b56a2c64d2f687ca3c207c75282fac3a61d045d0f8130a2f56db58d4c42
0xa09c0ac0da4dd00df9d20085bd13351d61a9332d349e7f3222c8007da2289518
0xa08ff81385e37fa8a7a3ab045ac0d25187fdfbae58ae54cc5ab44d90cdac6648
0xa0dac2efc128b3544b8568dc1d11bac84d5946f989fc8dc46294bb5ffe7d0397
0xa07a20490c9c89f91436c1fdcf31965f40fc6246486900f60023c6c229da5218
0xa08b1808419af0008f6e22827ad571a1dab7dde488bc1c4da90ca56c37d99165
0xa022a61e4c9cc38868ba6697b6deecc086ba7b218996f416974f99893bb2c8d7
```

Addresses used on the embedded AVM have no real world value, and cannot be _transferred_ over to any other network.

### Remote

Create an account by right clicking anywhere in your AVM project and select **Aion Virtual Machine** → **Remote** → **Create Account**. It will generate you an Aion key pair that includes public address and private key.

Here's a sample output:

```sh
[INFO] ------------------------------------------------------------------------
[INFO]
[INFO] --- aion4j-maven-plugin:0.6.7:create-account (default-cli) @ project101 ---
[INFO] Account creation successful
[INFO] Address : 0xa0837756504ff78fd0dabfec0218a1c417c492164c83561e88eeaca152119e9a
[INFO] Private Key: HERE IS A PRIVATE KEY
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time: 3.258 s
[INFO] Finished at: 2019-07-04T10:27:47-04:00
[INFO] Final Memory: 6M/24M
[INFO] ------------------------------------------------------------------------
[INFO] Maven execution finished
```

Then you can go to our [faucet](/developers/tools/faucets) to get some test Aion!

> **Important:** Keep your private key private and safe!
