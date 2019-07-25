---
title: Create a Project
description: When creating a new Aion project, developers can use Maven's built in project creation commands to download the latest version of the Aion archetype, and begin development with a fresh bolierplate template.
weight: 100
table_of_contents: true
next_page: /developers/tools/maven-cli/update-maven
---

To create a new Maven project, run the following command in the directory where you want your code to be stored:

```bash
mvn archetype:generate -DarchetypeGroupId=org.aion4j -DarchetypeArtifactId=avm-archetype -DarchetypeVersion=0.20
```

Take note of the `-DarchetypeVersion` above. You can find the [latest archetype version on GitHub](https://github.com/bloxbean/avm-archetype).

![Archetype Version Screenshot](/developers/tools/maven-cli/images/bloxbean-archetype-version.png)

## GroupId, ArtifactId, Version, and Package

The archetype generator will ask you for a `groupId`, `artifactid`, `version`, and `package`. You can put whatever you want in these fields, but it will help you further down the line if you follow these guidelines.

| Type | Description | Example |
| ---- | ----------- | ------- |
| `groupId` | Uniquely identifies your project across all projects. Must follow Apache's [reverse domain naming control](https://maven.apache.org/guides/mini/guide-naming-conventions.html) convention. | `org.apache.maven`, `org.example.commons` |
| `artifactId` | The name of the `.jar` file without version. | `commons-math`, `hello-world` |
| `version` | Which version of the project you're building. You can choose any typical version with numbers and dots. | `0.0.1`, `19.5`, `5.1.3-NIGHTLY` |
| `package` | [Apache is very specific about what to use here](https://docs.oracle.com/javase/specs/jls/se6/html/packages.html#7.7). However for the purposes of this HelloWorld project, the package name doesn't really matter. | `HelloWorld`, `gov.whitehouse.socks.mousefinder`, `edu.cmu.cs.bovik.cheese` |

Here's an example:

```bash
Confirm properties configuration:
    groupId: com.helloworld
    artifactId: hello-world
    version: 1.0-SNAPSHOT
    package: com.helloworld
```

## Project Structure

Once you've ran the archetype command and filled in the fields, you will have a file structure similar to this:

```text
hello-world/
├── pom.xml
└── src
    ├── main
    │   └── java
    │       └── com
    │           └── helloworld
    │               └── HelloAvm.java
    └── test
        └── java
            └── com
                └── helloworld
                    └── HelloAvmRuleTest.java
```

## Initialize

You can launch the Maven initializer to finalize the folder structure of your project, and create the `avm.jar` that will run your localized blockchain. Make sure you've moved into the same directory as your `pom.xml` file first.

```bash
cd hello-world
mvn initialize

> [INFO] Scanning for projects...

...

[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
[INFO] Total time:  0.476 s

...
```

That's it! Your project has been initialized and everything is ready for you to start developing your Java dApp.
