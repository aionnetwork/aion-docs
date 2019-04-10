# Get Balance

Return the balance from an account: `mvn aion4j:get-balance`

## Local

To return the balance of the default account, run:

```bash
mvn aion4j:get-balance

> ...
> [INFO] --- aion4j-maven-plugin:0.5.2-beta2:get-balance (default-cli) @ helloworld ---
> Created default account a092de3423a1e77f4c5f8500564e3601759143b7c0e652a7012d35eb67b283ca with balance 100000000000000
> [INFO] Address        : 0xa092de3423a1e77f4c5f8500564e3601759143b7c0e652a7012d35eb67b283ca
> [INFO] Balance        : 100000000000000
> ...
```

To get the balance of a specific account, supply the `-Daddress` argument:

```bash
mvn aion4j:get-balance -Daddress=0xa0f1002373877bd6987f23af0daa97f5d886d591cf308408cb396eda44f3456e

> ...
> [INFO] --- aion4j-maven-plugin:0.5.2-beta2:get-balance (default-cli) @ helloworld ---
> [INFO] Address        : 0xa0f1002373877bd6987f23af0daa97f5d886d591cf308408cb396eda44f3456e
> [INFO] Balance        : 3141
```

## Remote

Due to the caching that the Aion4j plugin provides, if you do not specify an account, Maven will request the balance of the account you last used to call / deploy a contract.

```bash
mvn aion4j:get-balance -Premote

>
>
>
```