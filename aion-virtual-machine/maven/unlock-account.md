# Unlock Account

Unlock an account: `mvn aion4j:unlock-account`

Instead of unlocking your account, we suggest [signing your transactions on your local machine](/aion-virtual-machine/maven/client-side-signing) as it is a much safer method. Also, some node hosting services do not allow you to unlock accounts on their nodes.

To unlock an account on a remote AVM node, you need to know the `address` and `password` of the account you wish to unlock, as well as the `host` and `port` of the node that you want to connect to.

```bash
mvn aion4j:unlock -Dweb3rpc.url=http://<HOST>:<PORT> -Daddress=<ADDRESS> -Dpassword=<PASSWORD> -Premote
```

For example:

```bash
mvn aion4j:unlock -Dweb3rpc.url=http://138.91.123.106:8545 -Daddress='0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8' -Dpassword='abcd1234' -Premote

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] Web3Rpc request data: {"method":"personal_unlockAccount","jsonrpc":"2.0","params":["0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8","abcd1234","600"]}
> [INFO] Account unlocked successfully
>
> ...
```