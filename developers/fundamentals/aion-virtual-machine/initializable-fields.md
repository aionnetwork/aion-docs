---
title: Initializable Fields
description: When deploying a contract, you can specify certain variables to be initialized during the deployment. This allows you to specify things like environment variables during the deploying of a contract, without having to hardcode them into the contract itself.
table_of_contents: true
---

When a contract is deployed, the network looks for the `static{}` function. This function is also called a [`<clinit>`](https://docs.oracle.com/javase/specs/jvms/se7/html/jvms-2.html#section-section-jvms-2.9). Anything specified within `static{}` will only ever be run once. For example, if your contract requires some environment variables to be specified at deployment time, you can declare them within `static{}`. However, if you want to declare them _outside_ of `static{}`, you can use the `@Initializeable` annotation. This allows you to declare the variables higher up in your contract, or inside a method within your contract.

All `@Initializable` fields must be static. The _type_ of an `@Initializable` field must be a supported [AVM ABI type](fundamentals-avm-concepts-abi-types-). The data supplied to the data field when deploying your contract must be supplied in the **exact same order** as the `@Initializable` field are defined. If not, an _ABIException_ will be thrown. The AVM uses the [ABIDecoder](fundamentals-packages-abi-#section-section-abidecoder-https-avm-api-aion-network-org-aion-avm-userlib-abi-abidecoder) or order to parse all `@Initializeable` annotations.

If you have two variables `myInt` and `myString` that you want to declare and _initialize_ them then you would use the `@Initializable` annotation.

```java
@Initializable
private static int myInt;

@Initializable
private static String myString;
```

Within the `static{}` for this contract, you would _decode_ the variables using the `ABIDecoder` class. Again, any variable you want to initialize need to be decoded in the order that you declared them:

```java
static {
 ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
 myInt = decoder.decodeOneInteger();
 myString = decoder.decodeOneString();
}
```

### Example

Below is an example of how to use the `@Initializable` annotation to supply environment variables into a contract in order to interact with an external API. The API call logic has been ignored here to keep this example simple.

```java
// Define environment variables apiKey and Region.
@Initializable
private static String apiKey;

@Initializable
private static int region;

// Set a placeholder for the owner of the contract and API response.
private static Address owner;
private static String initialApiResponse;

// Decode the arguments supplied when deploying the contract.
static {
 apiKey = decoder.decodeOneString();
 region = decoder.decodeOneInt();
 owner = Blockchain.getCaller();
 initialiApiResponse = callApi(apiKey, region);
}

// Can an external API using the onetime API key and region.
private static String callApi(String suppliedApiKey, int suppliedRegion) {
 // API call logic.
 return apiResponse;
}

// Have the owner of this contract return the response of the API.
public static String returnMessage() {
 onlyOwner();
 return initialiApiResponse;
}

// A modifer function that halts a function if it is not called by the owner of this contract.
private static void onlyOwner() {
 Blockchain.require(Blockchain.getCaller().equals(owner));
}
```

This contract can be deployed using the Maven CLI and the Aion4J plugin:

```bash
mvn aion4j:deploy -Dargs="-T 'ABAF21E45B23C00AA12311C32E' -I 3"
```
