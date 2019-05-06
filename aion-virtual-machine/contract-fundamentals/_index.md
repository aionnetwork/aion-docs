# Contract Fundamentals

This section contains information on how to write and manage with your Java smart contracts. There are certain caveats that you may need to address when interacting with your contracts.

## [Aion Map](aion-map)

The Aion blockchain implementation of the Java `Map` object. Due to the nature of blockchain, there are some changes to the regular Java implementation. [Read more](aion-map).

## [Callable Functions](callable-functions)

Public functions can be called from anywhere. For Java smart contracts, it must have the `@Callable` annotation attached. If not, this function will not be available to call from _outside_ the contract. [Read more](callable-functions).

## [Clinit](clinit)

Manage what happens when you deploy your contract. Once this deployment has happened, and everything within this `Clinit` function has finished, the `Clinit` is never ran again. [Read more](clinit).

## [Contract to Contract](contract-to-contract)

Contracts are able to interact with other contracts on the Aion network. Contract-to-contract calls still follow the same rules as regular contract calls. [Read more](contract-to-contract).

## [Deployment Arguments](deployment-arguments)

You can supply arguments to your contract during deployment. Arguments sent here are directed to the Clinit. [Read more](deployment-arguments).

## Event(event)

An event in Java is an object that is created when something changes. [Read more](event).

## [JCL Whitelist](jcl-whitelist)

The Java Class List (JCL) whitelist is a list of classes that are available to your Java contracts. Due to the nature of blockchain, some non-determanistic Java classes are not available for blockchain applications. [Read more](jcl-whitelist).

## [Modifer](modifer)

A modifier alters the actions of other functions before those functions are executed. These are especially useful when you need to limit the access to a function for the owner of the contract only. [Read more](modifer).

## [Transfer Aion](transfer-aion)

Transfer `AION`, or other tokens, between two addresses. [Read more](transfer-aion).

## [Variable Types](variable-types)

When calling or deploying a contract with arguments, you must specify the type of variable you are submitting. Only certain variable types can be used as arrays. [Read more](variable-types).