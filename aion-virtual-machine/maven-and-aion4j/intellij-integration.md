# IntelliJ Integration

1. [Configure the AVM Archetype in IntelliJ](#configure-the-avm-archetype-in-intellij)
2. [Create a New AVM Project](#create-a-new-avm-project)
3. [Open an Existing Project](#open-an-existing-project)

If you have IntelliJ installed, you can link up the Maven archetype into the IDE. This way you don't need to manually run any Maven commands when managing a project.

## Configure the AVM Archetype in IntelliJ

1. Select **File** > **New** > **Project**, or **Create New Project** from the splash screen.
2. Select **Maven** on the left.
3. Check **Create from Archetype** and click **Add Archetype...**.
4. Enter the following information in the **Add Archetype** window:

```text
Group Id: org.aion4j
Artifact Id: avm-archetype
Version: 0.5
```

![Add Archetype Window](/aion-virtual-machine/maven-and-aion4j/images/add-archetype-window.jpg)

1. Leave the **Repository** field blank.
2. Click **OK**.

You should now see `org.aion4j:avm-archetype` within the list of available archetypes. You can have multiple versions of the same archetype, which you can view by clicking the dropdown arrow.

![Maven Aion4J Version](/aion-virtual-machine/maven-and-aion4j/images/maven-aion4j-version.jpg)

## Create a New AVM Project

Now that the archetype has been added into IntelliJ you can create a new project using it.

1. With IntelliJ open, go to **File** > **New** > **Project** or click **Create New Project** from the splash screen.
2. Select **Maven** from the options on the left.
3. Check **Create from archetype**.
4. Select `org.aion4j:avm-archetype` from the list and click **Next**.
5. Enter the **GroupID**, **ArtifactID**, and **Version** for your project. For more information on these values check out the [Apache Maven documentation](https://maven.apache.org/guides/mini/guide-naming-conventions.html). Click **Next** when you have finished.
6. Validate that everything on this screen is correct and click **Next**.

![Validate Project Information](/aion-virtual-machine/maven-and-aion4j/images/validate-project-information.jpg)

7. Click **Finish**.

Maven will start building your project. You should be able to see this in the console window within IntelliJ. This process takes a few seconds. Once it's finished you should be able to see the following hierarchy in the explorer pane.

![Explorer Pane](/aion-virtual-machine/maven-and-aion4j/images/explorer-pane.jpg)

## Open an Existing Project

Opening an AVM based project in IntelliJ is the same as opening any other project. IntelliJ will automatically detect when an Aion4J archetype is present and will load in the project as needed.