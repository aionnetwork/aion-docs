---
title: Install
description: Installing Maven is quite simple, but differs between operating systems. If these instructions don't work for you check out the Apache Maven website to see detailed instructions for specific operating systems.
weight: 50
table_of_contents: true
next_page: /developers/tools/maven-cli/end-to-end
---

## Linux

The following instructions assume you have Ubuntu 18.04 or higher installed. Steps for other Linux distributions will differ.

1. Update your package list:

```bash
sudo apt update
```

2. Download and install Maven:

```bash
sudo apt install maven
```

## MacOS

1. Install [Homebrew](https://brew.sh/) if you haven't already:

```bash
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```

2. Download and install Maven:

```bash
brew install maven
```

## Windows

{{ youtube J6WfDipE7Qo }}

1. Download the [JDK installation file](https://www.oracle.com/technetwork/java/javase/downloads/jdk11-downloads-5066655.html), and open it to run through the installation. Leave the default options unless you have a specific reason to change them. If you change the default installation location, make a note of it.
2. Download the [Maven binary zip archive](http://apache.mirror.colo-serv.net/maven/maven-3/3.6.0/binaries/apache-maven-3.6.0-bin.zip).
3. Extract the Maven zip file.
4. Go into the extracted folder and copy the `apache-maven-3.6.0` folder to `C:/Program Files`.
5. Assign the `JAVA_HOME` system variable:
   1. Open the Start Menu.
   2. Search for `Environment Variables` and click **Edit the system environment variables**
   3. In the Systems Properties Window → Click **Environment Variables...**
   4. Under "System Variables" →  Click **New**.
   5. **Variable name**: Enter `JAVA_HOME`
   6. **Variable value**: Enter the path of your JDK installation into the field. If you didn't change anything during the JDK installation, it should be `C:\Program Files\Java\jdk-11.0.2`.

![Java Home Variable](/developers/tools/maven-cli/images/java-home-variable.jpg)

1. Assign the `MAVEN_HOME` system variable:
   1. Still under **System Variables** → click **New**
   2. **Variable name**: Enter `MAVEN_HOME` into the field.
   3. **Variable value**: Enter the path of your **Maven installation** into the field. If you followed along with _Step 4_, it will be `C:\Program Files\apache-maven-3.6.0`.

![Maven Home Variable](/developers/tools/maven-cli/images/maven-home-variable.jpg)

1. Add `%JAVA_HOME%` and `%MAVEN_HOME%` to your **PATH** variable:
   1. Still in the **Environment Variables** window → Under the "User variables for ..." → Select the variable named **Path** → Then click **Edit...**.
   2. Click **New** and enter `%JAVA_HOME%\bin`
   3. Click **New** again, and enter `%MAVEN_HOME%\bin`
   4. Click **OK** to close down the system windows.

![Java and Maven Paths](/developers/tools/maven-cli/images/java-and-maven-paths.jpg)

1. Open Command Prompt and enter `mvn --version` to check that everything is working.

![Command Prompt](/developers/tools/maven-cli/images/command-prompt.jpg)
