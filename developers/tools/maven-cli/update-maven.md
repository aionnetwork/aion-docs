---
title: Update Maven
description: Because Maven is a command-line tool, updating any projects with a new Maven package requires some modification of the project configuration file and removal of the library folder.
weight: 200
table_of_contents: true
next_page: /developers/tools/maven-cli/client-side-signing
---

Follow this process to update the Aion plugin for Maven. All terminal commands are the same across operating systems.

1. Change the `aion4j` version variable within your projects `pom.xml` file:

```xml
<name>helloworld</name>
<properties>

    ...
    <aion4j.plugin.version>0.5.4</aion4j.plugin.version>
    ...

</properties>
```

1. Run the following line in a terminal or command prompt:

    ```bash
    mvn aion4j:init -Dforcecopy  
    ```

    This will pull in the latest `jar` files.

1. Re-initialize your project:

    ```bash
    mvn initialize
    ```

1. You're done! You can now build your project using a new version of Maven.
