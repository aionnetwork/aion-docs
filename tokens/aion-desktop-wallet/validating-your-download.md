---
title: "Validating your Download"
excerpt: "How to validate your download and make sure you are not the victim of a man in the middle attack."
---
In order to validate that your download and lower your chances of being caught in a [man-in-the-middle attack](https://en.wikipedia.org/wiki/Man-in-the-middle_attack), follow the instructions for your operating system.

# Linux

In the directory when your `aion_ui.zip` file is, download the `.sha1` file from the [releases Github page](https://github.com/aionnetwork/Desktop-Wallet/releases). Then run the following in a terminal window:

```bash
sha1sum -c aion_ui.zip.sha1
```

If the output is `aion_ui.zip: OK` then the file successfully passed the check and is genuine.

# macOS

In the directory when your `AionWallet.dmg` file is, download the `.sha1` file from the [releases Github page](https://github.com/aionnetwork/Desktop-Wallet/releases). Then run the following in a terminal window:

```bash
sha1sum -c AionWallet.dmg
```

If the output is `AionWallet.dmg: OK` then the file successfully passed the check and is genuine.

# Windows

Since Windows does not come with a built in hash checking system, you need to install an application called [Microsoft File Checksum Integrity Verifier](https://www.microsoft.com/en-us/download/details.aspx?id=11533). This tool is not officially sported by Microsoft or Aion.