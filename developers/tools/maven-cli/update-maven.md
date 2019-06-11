---
title: Update Maven
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

2. Rename or delete the `lib` folder within your project. Renaming the project to something like `lib-old` is safer since you can revert to it if something goes wrong:

    ```bash
    mv lib lib-old
    ```

3. Re-initialize your project:

    ```bash
    mvn initialize
    ```

4. You're done! You can now build your project using a new version of Maven.
