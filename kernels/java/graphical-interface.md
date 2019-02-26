# Graphical Interface

The Aion Kernel _Core_ includes a graphical user interface (GUI) which facilitates kernel management and provides basic wallet functionality. There are some [known issues and limitations](https://github.com/aionnetwork/aion/wiki/Graphical-Interface#known-issues--limitations).

To run the GUI, first download and extract the Aion kernel as per the [Getting the Kernel] in the [Kernel section of the Aion Owner's Manual](https://github.com/aionnetwork/aion/wiki/Aion-Owner's-Manual#kernel). Then, from the `aion` folder, run the following command:

```bash
./aion\_gui.sh
```

## Known issues and Limitations

The following are some known issues and limitation within the current kernel build.

### Abnormal Kernel Termination

If a kernel process is launched by the GUI and then terminated by some mechanism other than the GUI, the GUI may not notice this termination and enter an inconsistent state.

**Resolution**:

1. Exit GUI.
2. Delete `$HOME/.aion/kernel-pid` file.
3. Re-launch GUI.

### Slow Transaction History Update

Recently sent transactions sometimes are slow to appear.

**Resolution**:

The transaction will show up given some time. A refresh can be fored:

1. Exit the GUI.
2. Re-open the GUI.
3. Unlock the master account. The transaction history will now show the complete list.

### Large Database causes Connection Latency

Upon launching the kernel process, it will run an integrity check to verify the blocks in its database. During this time, the kernel is running, but the GUI cannot yet connect to it. Therefore, with a large database, it will stay in the `CONNECTING...` state for some time with no feedback until this check is complete.

**Resolution**:

Wait for the integrity check to complete, the progress of which can be monitored from the kernel log file.

## Setup and Launch

If setting up Aion for the first time:

1. Download and extract the Aion kernel.
2. You should now have a directory named aion containing the Aion kernel and GUI

If you have an already-configured copy of Aion version `0.3.0+`, verify that the `Java API` is enabled in your `config.xml`:

```xml
<java active="true" ip="127.0.0.1" port="8547"/>
```

To launch the GUI, run the following command from the `aion` directory:

```bash
./aion.sh
```

This window should open shortly: