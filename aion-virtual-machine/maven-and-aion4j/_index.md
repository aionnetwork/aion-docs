# Maven and Aion4J

1. [Archetype Goals](#archetype-goals)
2. [Development Repository](#development-repository)

Maven is a Java development toolkit that allows you to manage a project's build, reporting, and documentation more easily. It does this by using a `pom.xml` file in the root of your project directory. More information about Maven specifically can be found on the [Apache Maven website](https://maven.apache.org/).

An Aion archetype for Maven is available. This allows you to quickly start a project and interact with the AVM from your local computer. This archetype also allows your easily deploy your contract to the AVM testnet, as well as interact with contracts already on the network.

# Aion4j

The Aion4j archetype is a template project that you can build on top of to create your own project. It comes with a `HelloWorld.java` contract and test.

To quote the Apache Maven website:

_"[an] archetype is a Maven project templating toolkit. An archetype is defined as an original pattern or model from which all other things of the same kind are made."_ - [Introduction to Archetypes](https://maven.apache.org/guides/introduction/introduction-to-archetypes.html)

More information on Maven archetypes specifically can be found on the [Apache Maven website](https://maven.apache.org/guides/introduction/introduction-to-archetypes.html).

## Archetype Goals

Each Maven archetype has goals assigned to it. These are functions that the archetype can run.

- `aion4j:clean`: Default phase for this goal is _clean_. To clean storage folder in case of embedded AVM deployment.
- `aion4j:deploy`: Deploy the contract / `dapp.jar` to an embedded AVM. This goal needs to invoked explicitly from the command line.
- `aion4j:call`: Call contract method. Uses `eth_call` method during remote kernel call.
- `aion4j:contract-txn`: Used to send a transaction while using a testnet kernel or remote kernel. It uses `eth_sendTransaction` API internally
- `aion4j:init`: Default phase for this goal is _initialize_. It initializes the project with required AVM dependencies. Currently it copies all required AVM `.jar`s to a `lib` folder under project's folder. You can also manually create this `lib` folder or point to an existing AVM `lib` folder through the plugin's configuration parameter.
- `aion4j:prepack`: Default phase _prepare-package_. Copy `org-aion-avm-userlib.jar` classes to target folder for packaging with the application's jar.
- `aion4j:class-verifier`: To verify the Java Class List whitelist classes in the contract.
- `aion4j:deploy`: Extend the deploy goal for remote deployment.

## Development Repository

The code for the Aion4j archetype can be found on [Github](https://github.com/satran004/aion4j-maven-plugin). This repository has been completed by a third party developer who was awarded a bounty through the [Aion Bounty Program](https://aion.network/bounty/).