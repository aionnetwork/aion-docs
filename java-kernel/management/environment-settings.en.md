---
title: Environment Settings
---

# Environment Settings

The following environment variables must be assigned in order for JDK 11 to function properly.

## `JAVA11_HOME`

Run the following command to add the variable to your path:

`export PATH=$JAVA11_HOME/bin:$PATH:/opt/gradle/gradle-4.10.2/bin`

Reboot your machine, or refresh your environment variables some other way.

## Symlink your JDK 11 Installation

If you are still running into problems with your kernel, it may be that your JDK 11 installation is not properly sym-linked. Run the following to fix this issue:

```bash
ln -s [your JDK install folder] /usr/lib/jvm/jdk-11.0.1
```