If you forget the password to your Aion wallet, follow these steps to attempt to recover your wallet. You need to have your `mnemonic` / `seed phrase` ready. 


[block:callout]
{
  "type": "warning",
  "body": "If you do not have access to your `mnemonic` / `seed phrase`, or can't remember it, then unfortunately you cannot recover you wallet.",
  "title": "Mnemonic / Seed Phrase"
}
[/block]
These instructions differ slightly between [Mac/Linux](#section-mac-and-linux) and [Windows](#section-windows).

# Mac and Linux

1\. Open a terminal window.
2\. Run `mv ~/.aion ~/.aion-old`.
3\. Open the Aion wallet application.
4\. Click **Add account**.
5\. Under **Recover from seed**, enter your **Mnemonic**.
6\. Enter a new **Password**.
7\. Click **Recover**.
8\. If your account is now listed on the **Accounts** page, run the following command to delete your old wallet information: `rm ~/.aion-old`.

# Windows

1\. Go to your **Documents** folder.
2\. Turn on **Show hidden files and folders**.
3\. Rename `.aion` to `.aion-old`.
4\. Open the Aion wallet application.
5\. Click **Add account**.
6\. Under **Recover from seed**, enter your **Mnemonic**.
7\. Enter a new **Password**.
8\. Click **Recover**.
9\. If your account is now listed on the **Accounts** page, go back to your **Documents** folder and delete the `.aion-old` folder.