# Create Account

Create an account on the network: `mvn aion4j:create-account`

## Local

To create a local account run:

```bash
mvn aion4j:create-account -Daddress=<ADDRESS>  -Dbalance=<BALANCE>
```

For example:

```bash
mvn aion4j:create-account -Daddress=0xa0f1002373877bd6987f23af0daa97f5d886d591cf308408cb396eda44f3456e  -Dbalance=3141
```

## Remote