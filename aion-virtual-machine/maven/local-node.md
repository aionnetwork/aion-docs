# Local Node

1. [Compile](#compile)
2. [Deploy](#deploy)
3. [Call](#call)
4. [Accounts](#accounts)

Also called the _Embedded AVM_, compiling your code and deploying it to the local node is incredibly simple, and it just a case of running a few commands. Once that's done you can call the methods in your contract from the local kernel.

Take a look at the [Remote](https://docs.aion.network/docs/maven/remote-node) section for information on how to .

## Compile

To compile your contract, run the following command from the same location as your `pom.xml` file:

```bash
mvn clean install

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] --- maven-jar-plugin:2.4:jar (default-jar) @ hello-world ---
> [INFO] Building jar: /Users/aion/code/hello-world/target/hello-world-1.0-SNAPSHOT.jar
>
> ...
```

This command is actually two standard Maven commands: `clean` and `install`. Once the process has finished, you will have a `.jar` application in the `targets` folder.

## Deploy

Before you deploy your contract, make sure you have [compiled it](#section-compile). To deploy your contract, run the following command from the same location as your `pom.xml` file:

```bash
mvn aion4j:deploy

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] BUILD SUCCESS
> [INFO] ------------------------------------------------------------------------
> [INFO] Total time:  1.032 s
>
> ...
```

See the [Deployment Arguments](/aion-virtual-machine/contract-fundamentals/deployment-arguments) section to find out how to supply arguments into your contract when deploying.

## Call

To call a function from a deployed contract on the embedded AVM, run the following command:

```bash
mvn aion4j:call -Dmethod=<method_name> -Dargs="<arg_type> <arg_value> <arg_type> <arg_value> ..."
```

For example:

```bash
mvn aion4j:call -Dmethod=greet -Dargs="-T Bob"

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] ****************  Method call result  ****************
> [INFO] Data       : Hello Bob
> [INFO] Energy used: 66414
> [INFO] *********************************************************
>
> ...
```

There are some things to note here:

The `-Dmethod` argument controls which function is called within the `HelloWorld.java` contract. In this case, we called the `greet` function.

The `-Dargs` argument controls variables we want to supply to the method. If no variables are required by the function, then you do not need to include this argument. Multiple variables can be supplied between double quotes `"`. In this case, we have supplied the string `Bob`. Checkout the [Variable Types](/aion-virual-machine/variable-types) page for more info on what you can use here.

## Accounts

The embedded AVM comes with a _pre-mined_ account, meaning there is already `AION` in the account.

### Get Balance

To get the balance of the default account run:

```bash
mvn aion4j:get-balance

> ...
>
> [INFO] ----------- AVM classpath Urls Ends --------------
> [INFO] Address        : 0xa092de3423a1e77f4c5f8500564e3601759143b7c0e652a7012d35eb67b283ca
> [INFO] Balance        : 100000000000000
>
> ...
```

### Create an Account

To create another account using the embedded AVM run the following command:

```bash
mvn aion4j:create-account  -Dbalance=<value>
```

### Specify Account

If you want to run a command on the embedded AVM using a specific account (not the default account), add the following argument to your command:

```bash
-Daddress=<ACCOUNT_ADDRESS>
```

For example:

```bash
mvn aion4j:get-balance -Daddress="0xabcdef123456..."
```