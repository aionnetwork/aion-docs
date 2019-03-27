# Local Functions

Compile, deploy, and call your contracts on your local machine, without having to connect to a remote node.

## Deploy

Compile and deploy the contract.

Activate this command by right clicking anywhere on the contract and selecting **Aion Virtual Machine** > **Embedded** > **Deploy**.

![Deploy to Embedded AVM](/aion-virtual-machine/intellij/images/deploy-to-embedded.gif)

You should see a notice when the contract has successfully deployed:

![Successful Deployment Notice](/aion-virtual-machine/intellij/images/successful-deployment-notice.png)

## Call

Call a contract.

Run this command by right clicking on a method name and selecting **Aion Virtual Machine** > **Embedded** > **Call**. If the method you selected takes arguments, you must provide them in the **Method parameters** window that is shown.

![Call Embedded Contract](/aion-virtual-machine/intellij/images/call-embedded-contract.gif)

By default the **Call** command will call the last deployed contract. However if you want to call a specific contract address, uncheck the **Use Last Deployed Contract Address** checkbox, and enter the address you want to use.

## Get Balance (Default)

Get the balance of the default account.

Run this command by right clicking anywhere in a contract and selecting **Aion Virtual Machine** > **Embedded** > **Get Balance (Default)**. The results are printed in the Maven Goal terminal.

![Get Default Balance Embedded](/aion-virtual-machine/intellij/images/get-balance-default-embedded.gif)

This balance is reset back to ~99999997205856 `AION` every time you compile a contract.

## Get Balance

Get the balance of a specific account.

Run this command by right clicking anywhere in a contract and selecting **Aion Virtual Machine** > **Embedded** > **Get Balance (Default)**. Then enter the address you want to find the balance of in the **Enter Account** window that is shown. The results are printed in the Maven Goal terminal.

![Get Default Balance Embedded](/aion-virtual-machine/intellij/images/get-balance-account-window-embedded.png)

Only accounts within the embedded AVM will show their balance. Accounts on the Mainnet or Testnet (Mastery) are not known to the embedded AVM.

## Create Account

Create an account with a specified amount of `AION`.

Run this command by right clicking anywhere in a contract and selecting **Aion Virtual Machine** > **Embedded** > **Create Account**. Then enter the address you want to create, and the amount of `AION` you want to be added into it. The address you enter must be a valid `AION` address.

Here's ten valid addresses that you can use to create accounts on the embedded AVM:

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

Addresses used on the embedded AVM have no real world value, and cannot be _transfered_ over to any other network.