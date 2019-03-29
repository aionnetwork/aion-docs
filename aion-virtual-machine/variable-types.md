# Variable & Types

For the most part, variables and types work in the same way as they do in regular Java applications. However, there are a few caveats you should know about.

## Overview

Here's a quick overview of the types available, as well as their Maven and Aion IntelliJ Plugin type selectors.

| Type | Inline Selector | Inline Example |
| ---- | -------- | ------- |
| Address | `-a` | `-a 0xa04462684b510796c186d19abfa6929742f79394583d6efb1243bbb473f21d9f` |
| Boolean | `-z` | `-z true` |
| Byte | `-b` | `-b a0` |
| Character | `-c` | `-c C` |
| Double | `-d` | `-d 3.141592654` |
| Float | `-f` | `-f 3.141` |
| Integer | `-i` | `-i 42` |
| Long | `-l` | `-l 12345678910111213141516171819` |
| Short | `-s` | `-s 32767` |
| String | `-T` | `-T Don't panic.` |

## Arrays

Using arrays for inline arguments is pretty simple. They are structured by adding the same variable type within the same deployment call. A array of string would look like this:

```text
-T 'Time is an illusion. Lunchtime doubly so.' 'Don\'t Panic.' 'The ships hung in the sky in much the same way that bricks don\'t.'
```

An array of integers would look like this:

```text
-i 3141 592653 589 7932 3846
```

Entering them into your constructor class when deploying your contract is pretty straight forward: For example if you wanted to supply an array of three addresses, you could add them in like this:

```bash
mvn aion4j:deploy -Dargs="-a 0xa04462684b510796c186d19abfa6929742f79394583d6efb1243bbb473f21d9f 0xa0f1002373877bd6987f23af0daa97f5d886d591cf308408cb396eda44f3456e 0xa08ff81385e37fa8a7a3ab045ac0d25187fdfbae58ae54cc5ab44d90cdac6648"
```

If you are using IntelliJ, add the `-Dargs` into the **Deployment Arguments** section, under the **Common** configurations tab.

![Array Deployment Arguments](/aion-virtual-machine/images/array-deployment-arguments.png)