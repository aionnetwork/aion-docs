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

2. Rename or delete the `lib` folder within your project. Renaming the project to something like `lib-old` is safer since you can revert to it if something goes wrong. Run the following line in a terminal or command prompt:

    ```bash
    mv lib lib-old
    ```

3. Re-initialize your project:

    ```bash
    mvn initialize
    ```

4. Check that your project successfully builds. If it does, you can remove the old `lib` folder:

    **Linux / MacOS**

    ```bash
    rm -rf lib-old
    ```

    **Windows**

    ```bash
    rmdir lib-old
    ```

5. You're done! You can now build your project using a new version of Maven.
