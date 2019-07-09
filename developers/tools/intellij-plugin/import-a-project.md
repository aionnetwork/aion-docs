---
title: Import a project
table_of_contents: true
description: You can import existing projects into the IntelliJ IDE. If you are importing a project that utilizes the Aion4j plugin and the AVM, you need to follow these instructions in order for the project to be compiles and built properly.
weight: 275
---

If you have an existing AVM maven project and you want to import it to IntelliJ IDE, follow the steps below:

1. If you are on `Welcome to IntelliJ IDEA` page, click **Import Project**; If you have a project open, Click **File -> New -> Project from Existing Sources**
2. Navigate to your AVM project.
3. Click **OK**.
4. Choose **Import Project from external model** and select **Maven**.
5. Click **Next** and **Next** and **Next**.
6. Select SDK. make sure its JDK 11^.
7. Click **Next**.
8. Enter your project name and location.
9. Click **Finish**.

Ta-da! Your project is successfully imported!

![import](/developers/tools/intellij-plugin/images/import-existing-avm-project.gif)
