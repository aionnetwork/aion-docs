# Environment Variables

The following environment variables must be assigned in order for JDK 11 to function properly.

## `JAVA11_HOME`

Run the following command to add the variable to your path:

`export PATH=$JAVA11_HOME/bin:$PATH:/opt/gradle/gradle-4.10.2/bin`

Reboot your machine, or refresh your environment variables some other way.

## Symlink your JDK 11 Installation

If you are still running into problems with your kernel, it may be that your JDK 11 installation is not properly sym-linked. Run the following to fix this issue:

```bash
ln -s [your jdk install folder] /usr/lib/jvm/jdk-11.0.1
```

# Need Help?

If you get stuck, try searching these docs 👆 or head over to our [Gitter channels](https://gitter.im/aionnetwork/Lobby) or [StackOverflow](https://stackoverflow.com/search?q=aion) for answers to some common questions.