# Variable Types

For the most part, variables and types work in the same way as they do in regular Java applications. However, there are a few caveats you should know about.

Here's a quick overview of the types available, as well as their Maven and Aion IntelliJ Plugin type selectors. Also, note that the `Address` and `String` types cannot be used in two-dimensional arrays.

| Type | Inline Selector | Inline Maven / IntelliJ Example | Two Dimension Array Available? |
| ---- | -------- | ------- | ----- |
| Address | `-A` | `-A 0xa04462684b510796c186d19abfa6929742f79394583d6efb1243bbb473f21d9f` | `False` |
| Boolean | `-Z` | `-Z true` | `True` |
| Byte | `-B` | `-B a0` | `True` |
| Character | `-C` | `-C C` | `True` |
| Double | `-D` | `-D 3.141592654` | `True` |
| Float | `-F` | `-F 3.141` | `True` |
| Integer | `-I` | `-I 42` | `True` |
| Long | `-L` | `-L 12345678910111213141516171819` | `True` |
| Short | `-S` | `-S 32767` | `True` |
| String | `-T` | `-T "Don't panic."` | `False` |