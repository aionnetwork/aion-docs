# Aion Docs

![Aion Logo](/aion-docs-logo.png)

Welcome to Aion Docs! This repository holds all the documentation for the Aion Network. The website [docs.aion.network](https://docs.aion.network/) gets content from this repository. The migration of content from this repo to the docs website is _not_ automatic and is a manual process. As such, this repository is always more up-to-date than the website. This repo should be seen as the source of truth for Aion Network documentation.

This repository **does not** maintain the [docs.aion.network](https://docs.aion.network) website itself. You'll find no `HTML` or `CSS` in these folders, except where used in code examples.

## Contributions

If you want to make a suggestion to an article, create an [Issue](https://github.com/aionnetwork/docs/issues). If you want to create a completely new article, check out the contribution guidelines below and make a [Pull Request](https://github.com/aionnetwork/docs/pulls)! If you just want to show us some love, click the star :star: button!

### Contribuition Guidelines

By following these guidelines you're helping to keep the Aion docs consistent.

#### General Writing

- Address readers in the second person by using _you_ to address them. Stay away from words like _I_, _we_, _our_, or _one_.

    > **You** can install the virtual machine.

- Follow each list of three or more items with a comma. This is known as the [Oxford or Serial Comma](https://en.wikipedia.org/wiki/Serial_comma).

    | Use | Don't Use |
    | --- | --------- |
    | One, two, three, and four. | One, two, three and four. |
    | Henry, Elizabeth, and George. | Henry, Elizabeth and George. |

- Write clearly and concisely. Sentences should be shorter than 25 words. Any longer and things tend to get a little _blurry_.
- Don’t use formal or complex words when easy or short ones will do. Keeping the docs simple to read makes it accessible for everyone, especially those us whose English as a second language.

    | Use | Don't Use |
    | --- | --------- |
    | Get | Aquire |
    | Help | Assist |
    | About | Approximately |

- Use consistent terminology. This isn't creative writing, so you don't need to describe the same thing differently every time you mention it.
- Use American English spelling.
- Try to not use acronyms. If you absolutely have to use acronyms, spell full phrase first and include the acronym in parentheses `()` the first time they are used in each document.

    > Decentralized Application (Dapp), Virtual Machine (VM)

- Avoid using specific version numbers whenever possible.

#### Formatting

All Aion documentation is written in GitHub Flavored Markdown. If you're using VSCode to write and edit documentation, you can install the [MarkdownLint extension](https://marketplace.visualstudio.com/items?itemName=DavidAnson.vscode-markdownlint) by David Anson. It helps to point out any formatting mistakes you've made in your writing.

Here are a few guidelines that will help keep everything nice and tidy.

- File names, folders, addresses, and variables should be written between code tags.

        > Copy ```example.json``` to ```~/var/www/html/aion-vm```.

- Things that the user must click on, or generally look out for, should be in **bold**.

    > Click **Log out** to end your session.

- Multi-line code blocks should have the language supplied in line with the markdown. This helps the syntax highlighter know which language classes to use. To select a particular language in markdown, add the language name to the end of the first code tag:

        ```python
        import example.py
        import crypto.py
        ```

- Capitalize all the significant words in titles

    > **T**his is a **P**ublic **S**ervice **A**nnouncement

## Maintenance

This repo is maintained with ❤️ by the [Aion](https://aion.network) :fire: Ecosystem :100: team!
