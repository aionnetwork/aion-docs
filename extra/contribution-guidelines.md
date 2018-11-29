# How to Contribute

If you want to suggest any changes to the docs or edit the docs yourself, [raise an issue](https://github.com/mohnjatthews/aion-docs/issues) or [make a pull request](https://github.com/mohnjatthews/aion-docs/pulls) on the [aion-docs GitHub repository](https://github.com/mohnjatthews/aion-docs).

# General Writing

By following these guidelines you're helping to keep the Aion docs sounding consistent.

1. Write articles in the present tense rather than past or future.
[block:parameters]
{
  "data": {
    "h-0": "Good",
    "h-1": "Bad",
    "0-0": "The virtual machine **runs** the script.",
    "0-1": "The virtual machine **will run** the script."
  },
  "cols": 2,
  "rows": 1
}
[/block]
2. Address readers in second person by using _you_ to address them. Stay away from words like _I_, _we_, _our_, or _one_.

    > **You** can install the virtual machine.

3. Follow each list of three or more items with a comma. This is known as the [Oxford or Serial Comma](https://en.wikipedia.org/wiki/Serial_comma).
[block:parameters]
{
  "data": {
    "h-0": "Use",
    "h-1": "Don't use",
    "0-0": "One, two, three, and four.",
    "0-1": "One, two, three and four.",
    "1-0": "Henry, Elizabeth, and George.",
    "1-1": "Henry, Elizabeth and George."
  },
  "cols": 2,
  "rows": 2
}
[/block]
4. Write clearly and concisely. Sentences should be shorter than 25 sentences. Any longer and things tend to get a little _blurry_.
5. Don’t use formal or long words when easy or short ones will do.
[block:parameters]
{
  "data": {
    "h-0": "Use",
    "h-1": "Don't use",
    "0-0": "Get",
    "0-1": "Acquire",
    "1-0": "Help",
    "1-1": "Assist",
    "2-0": "About",
    "2-1": "Approximately"
  },
  "cols": 2,
  "rows": 3
}
[/block]
6. Use consistent terminology. This isn't creative writing, so you don't need to describe the same thing differently every time you mention it.
7. Use American English spelling.
8. Spell out acronyms and include them in parentheses the first time they are used in **each document**.
    
    > Decentralized Application (DApp)

    > Virtual Machine (VM)

9. Capitalize all the significant words in titles.

    > **T**his is a **P**ublic **S**ervice **A**nnouncement

10. Avoid using specific version numbers whenever possible.

# Formatting

Here are a few guidelines that should help to keep all the Aion documentation nice and tidy.

  - File names, folders, addresses, and variables should be written between ```<code>``` tags.

    > Copy ```example.json``` to ```~/var/www/html/aion-vm```.

  - Things that the user must click on, or generally look out for, should be in **bold**.

    > Click **Log out** to end your session.

  - Multi-line code blocks should have the language supplied in line with the markdown. This helps the syntax highlighter know which language classes to use. To select a particular language in markdown, add the language name to the end of the first code tag:

        ```python
        import example.py
        import crypto.py
        ```

# Suggestions

If you think of something that we should add or change, let us know!