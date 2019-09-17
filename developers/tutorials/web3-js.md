---
title: End to End
section: Web3.js
description: In this tutorial we're going to run through the entire end-to-end process of setting up your Web3.js project, connecting to a node, deploying a contract, and then interacting with it. This is a great place to get started with building web front-ends for your applications. We'll be supplying a sample contract for you to use, so you don't have to write any Java in this tutorial, and can focus on the JavaScript.
---

## Project Set Up

Our project is going to be made up of three files:

```bash
aion-web3-examples/
├── index.html
├── script.js
└── web3.min.js
```

Our frontend HTML will be held within `index.html` and all our custom JavaScript will be in `script.js`. The `web3.min.js` file is what gives us the `Web3` object and allows us to interact with the network, and we won't be making any changes to this file.

### Index

Create a file called `index.html` and paste in the following code:

```html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Aion Web3 Examples</title>
    </head>

    <body>
        <main>
            <h1>Aion Web3 Examples</h1>
        </main>
    </body>

    <script src="web3.min.js"></script> <!-- Make sure that web3.min.js is included before any other scripts. -->
    <script src="script.js"></script> <!-- Your custom Javascript code will go in here. -->
</html>
```

We're keeping thing incredibly simple here. The most important thing to note is that we've included `web3.min.js` _before_ our custom JavaScript. This is because our custom JavaScript code will rely on the `Web3` object supplied by `web3.min.js`.

### Web3 JavaScript

You can download the latest `web3.min.js` file from the Aion Web3 GitHub repository. Navigate to the releases section and click the latest `web3.min.js` file. Or if you have `wget` installed on your machine, you can download the `web3.min.js` file by running this command:

```bash
wget https://github.com/aionnetwork/aion_web3/releases/download/v1.1.5/web3.min.js
```

### Custom JavaScript

Create a file called `script.js` and paste in the following code:

```javascript
const web3 = new Web3(new Web3.providers.HttpProvider("NODE_URL"));
```

This variable creates a new `web3` object using the `Web3` object supplied by `web3.min.js`. The only thing that's missing is the URL of the node we want to use.

### Aion Node

This is the last step in our project set up. We need to paste in the URL of the Aion node that we want to connect to. The easiest way to connect to a node is to use a node [hosting service](nodes-hosting-services) like [Nodesmith](https://nodesmith.io/) or [Blockdaemon](https://blockdaemon.com/). Both these services have free options that allow you to spin up an Aion node on the test network.

If you'd prefer to spin up your own Aion node, take a look at the [Java](nodes-java-overview) or [Rust](nodes-rust-overview) kernel sections. Keep in mind that it can take quite a while for a node to fully sync to the network.

Once you have your node URL, paste it into your `script.js` file:

```javascript
const web3 = new Web3(new Web3.providers.HttpProvider("https://aion.api.nodesmith.io/v1/mastery/jsonrpc?apiKey=ab40c8f..."));
```

Finally, we just need to set the private key you plan on using for this project. Hard coding a private key into _anything_ is a bad idea, but since this is a simple tutorial it's ok. Add the following code and enter the private key for the account you want to use:

```javascript
const privateKey = "269a1fd07297b...";
```

## The Project

We're going to be creating a _secret messages_ application. The owner of the app sets a message and defines who can have access to the messages. Only users who have already been authorized can access the messages.

Since this tutorial is focused on using the Web3.js framework, you won't be building the backend logic. Instead, we've written and deployed everything for you. So all you have to do is tell your JavaScript the address, but we'll get to that shortly. If you're interested, here is the Java that controls the backend:

```java
package aionexample;
import avm.Address;
import avm.Blockchain;
import org.aion.avm.tooling.abi.Callable;
import org.aion.avm.tooling.abi.Initializable;
import org.aion.avm.userlib.abi.ABIDecoder;

public class SecretMessages
{
    private static Address owner;
    @Initializable
    private static String secretMessage;
    @Initializable
    private static int secretKey;

    // Initialize the project with deployment arguments.
    static {
        owner = Blockchain.getCaller();
        ABIDecoder decoder = new ABIDecoder(Blockchain.getData());
        secretMessage = decoder.decodeOneString();
        secretKey = decoder.decodeOneInteger();
    }

    // Return the secret message, if the user input the correct secret key.
    @Callable
    public static String getMessage(int keyInput) {
        if (keyInput == secretKey) {
            return secretMessage;
        } else {
            return "Wrong secret key.";
        }
    }

    // Set the secret message and secret key. Only the owner of this contract
    // can call this function.
    @Callable
    public static void setMessage(String newMessage, int newKey) {
        onlyOwner();
        secretMessage = newMessage;
        secretKey = newKey;
    }

    // If the caller of a function with the onlyOwner() modifier attached does
    // not match the owner variable, halt the function and return an error.
    private static void onlyOwner() {
        Blockchain.require(Blockchain.getCaller().equals(owner));
    }
}
```

We're not going to discuss compiling and deploying the backend logic here. But if you'd rather deploy things yourself, take a look at the [Maven](tutorials-maven-cli) or [IntelliJ Plugin](tutorials-intellij-plugin) tutorials for a refresher.

### The Jar and ABI Files

As previously mentioned, you will need the compiled `.jar` and `.abi` files from the above contract.

<!-- TODO: add links to these two files. -->
1. Download the `SecretMessages.jar` file here.
2. Download the `SecretMessages.abi` file here.

We will be using these files later on in the project. For now, put them in a folder next to your `index.html`, `script.js`, and `web3.min.js` files. Your project directory should look like this:

```bash
aion-web3-examples/
├── index.html
├── project-files
│   ├── SecretMessages.abi
│   └── SecretMessages.jar
├── script.js
└── web3.min.js
```

## Deploy a Contract

Now that we've got all our project files together, we can start using Web3.js to deploy the application. Within your `script.js` file, create a new `async` function called `deployContract()`.

```javascript
async function deployContract() {

}
```

We have to use the `async` operator because Web3.js uses asynchronous operations that can only be called from `async` enabled functions.

Next up we need to create the `data` object that will form part of our `transaction` object. Within the `data` object we need to include any deployment arguments that are necessary for our contract to be deployed. Looking back at our contract we can see that we declare three private variables:

1. `owner`
2. `secretMessage`
3. `secretKey`

The `owner` variable automatically gets set to whichever account deploys the contract, so we don't need to manually set that variable. However, both `secretMessage` and `secretKey` need to be defined when deploying our contract. It's important to set the variables in the order that they're defined within the contract. 

There are four steps to creating our `data` object:

1. Grab the `web3` object and tell it we are using an AVM contract:

    ```javascript
    let data = web3.avm.contract
    ```

2. Call the `deploy` function and point it to the `jarPath` variable we just created:

    ```javascript
    let data = web3.avm.contract.deploy(jarPath)
    ```

3. Add on the deployment arguments we want to supply to the contract in the **same order** that they are defined using the `@Initializable` annotation:

    ```javascript
    let data = web3.avm.contract.deploy(jarPath).args(['string', 'int'], ['The password is RED', 3141])
    ```

4. Call the `init` function to initialize the `data` object.



## Call a Contract

Now that we've got the contract deployed, we can start to interact with it using the Web3.js framework.

Just like the deployment function, the `callContract()`

## Change the Blockchain

## Send Aion to an Account
