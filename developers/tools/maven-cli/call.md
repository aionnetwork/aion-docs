---
title: Call
description: Calls to a contract can either be simple calls, or contract transactions. Calls do not necessarily incur a cost, but contract transactions always incur a cost as they are changing the state of the blockchain. Calls to a contract will always return something, whereas contract transaction may not depending on the function called.
weight: 800
table_of_contents: true
next_page: /developers/tools/maven-cli/contract-transactions
---

Interact with a deployed contract: `mvn aion4j:call`

## Local

To call a function from a deployed contract on a local node, run the following command:

```bash
mvn aion4j:call -Dmethod=<method_name>
```

For example:

```bash
mvn aion4j:call -Dmethod=sayHello

> [INFO] Scanning for projects...
>
> ...
>
> [INFO] ****************  Method call result  ****************
> [INFO] Data       : Hello World!
> [INFO] Energy used: 66414
> [INFO] *********************************************************
>
> ...
```

The `-Dmethod` argument controls which function is called within the `HelloWorld.java` contract. In this case, we called the `greet` function.

The `-Dargs` argument controls variables we want to supply to the method. If no variables are required by the function, then you do not need to include this argument. Multiple variables can be supplied between double quotes `"`. In this case, we have supplied the string `Bob`. Check out the [Variable Types](tools-maven-cli-variable-types) page for more information.

## Remote

In order to call a contract on a remote node you must have:

1. The **contract** `address`.
2. The `address` of the **account** you want to use to call the contract. This is not the same as the contract address.
3. The URL of the `host` remote node you want to connect to.
    a. You may also need the `port` number of the node. This isn't always necessary when using a node hosting service.
4. The `function` name you want to call from the contract.
5. Any `arguments` that you want to supply to the function.

Run the following to call a function in a contract on a remote node:

```bash
mvn aion4j:call -Dweb3rpc.url=http://<HOST>:<PORT> -Daddress=<CALLER_ADDRESSS> -Dcontract=<CONTRACT_ADDRESS> -Dmethod=<FUNCTION_NAME> -Dargs="<TYPE> <ARGUMENTS>" -Premote
```

For example:

```bash
mvn aion4j:call -Dweb3rpc.url=http://138.91.123.106:8545 -Daddress=0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8 -Dcontract=0x0f5d9fe9f554a736c0e6cfeb2571f8a1f92103bf4ce26e825692dfe50b66bc2a -Dmethod=sayHello -Dargs="-T 'Bob'" -Premote

> ...
>
> [INFO] ****************  Method call result  ****************
> [INFO] Data       : Hello World!
> [INFO] Energy used: 66414
> [INFO] *********************************************************
>
> ...
```

## Supplying Arguments

Arguments can be supplied when calling a function by adding the `-Dargs` tag and entering the required types and variables. For example:

```bash
mvn aion4j:call -Dweb3rpc.url=http://138.91.123.106:8545 -Daddress=0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8 -Dcontract=0x0f5d9fe9f554a736c0e6cfeb2571f8a1f92103bf4ce26e825692dfe50b66bc2a -Dmethod=greet -Dargs="-T 'Bob'" -Premote

> ...
>
> [INFO] ****************  Method call result  ****************
> [INFO] Data       : Hello Bob
> [INFO] Energy used: 66414
> [INFO] *********************************************************
>
> ...
```

## Calling a Specific Contract

You do not have to supply a contract address because the Aion4j plugin caches the last deployed contract address. However, if you want to call a specific contract then you can supply the contract `address` using the `-Daddress` tag:

```bash
mvn aion4j:call -Dcontract=0xa02631d5d3eacf4d6e9b4c4c79dd7f797920f1b24a67ba5b81c9a477254917c8
```

Make sure to add `-Premote` to the command when calling a remote node.
