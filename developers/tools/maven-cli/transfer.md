---
title: Transfer
description: You can also send tokens to and from contracts and accounts using the Maven CLI. Just like other transactions, the transaction receipt is not automatically returned once the transaction has finished, you need to request the receipt manually.
weight: 1200
table_of_contents: true
next_page: /developers/tools/maven-cli/variable-types
---

Send `AION` from one account or contract to another: `mvn aion4j:transfer`

```bash
mvn aion4j:transfer
    -Dweb3rpc.url=http://<HOST>:<PORT>
    -Dfrom=<SENDING ADDRESS>
    -Dto=<RECEIVING ADDRESS>
    -Dvalue=<AION AMOUNT>
    -Dpassword=<SENDING ADDRESS PASSWORD>
    -Premote
```

For example:

```bash
mvn aion4j:transfer -Dweb3rpc.url=http://138.91.123.106:8545 -Dfrom=0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8 -Dto=0xa03c7d96eec9f58bca9f83682d604cc5f6f9f4e2d67fca7318f848482ddb80a2 -Dvalue=1 -Dpassword=abcd1234 -Premote

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] Transfer successful
> [INFO] ****************  Transfer Txn result  ****************
> [INFO] Transaction receipt :0xafee6f73ad963092848a2b32d7dcaf2fb4038657fbd7d064c7a246b99e2b7ceb
>
> ...
```
