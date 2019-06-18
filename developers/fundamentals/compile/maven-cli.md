---
title: Maven CLI
toc: true
---

It  takes two steps for you to build and compile your Java smart contract:

## Define Main Class

You need to define the contract entry point by setting the contract main class in the `pom.xml`.  

For example:

```text
...
<contract.main.class>aion.HelloAVM</contract.main.class>
...
```

Here, `aion` is the package name and `HelloAVM` is the contract main class name.

## Build and Compile

Run the following command in the terminal to build and compile the contract:

```sh
mvn clean install
```

If **build success**, you will find three files under project's target folder:

- `original-*.jar`: .jar after build. In the build process, it verifies all the classes used in the contract are **JCL Whiltelisted** and all the JUnit tests pass.  
- `*.jar`: Post-processed jar after build. Post processes include: processing *@Initializable* anootated variables and *@Callable* annotated function through ABI Compiler; optimizing original .jar content.
- `*.abi`: Contract ABI information, defines how you call functions in a contract for the AVM and get data from the blockchain.
  
    ![result](/developers/fundamentals/compile/images/jars-and-abi.png)
  