# Contract Fundamentals

This section contains information on how to write and manage with your Java smart contracts. There are certain caveats that you may need to address when interacting with your contracts.

## [Arrays](arrays)

Arrays in smart contracts have some changes to regular usage, and certain functions that you would normally find in a Java class are disabled. This is done to keep the blockchain network fast and secure. [Read more](arrays).

## [Callable Functions](callable-functions)

In order to call a function within a contract, it must have the `@Callable` annotation attached. If not, this function will not be picked up by the ABI and will not be available to call from _outside_ the contract. [Read more](callable-functions).

## [Deployment Arguments](deployment-arguments)

You can supply arguments to your contract during deployment. This can have massive effects on your contract as a whole, since calculations can happen at runtime. [Read more](deployment-arguments).

## [Variable Types](variable-types)

When calling or deploying a contract with arguments, you must specify the type of variable you are submitting. [Read more](variable-types).