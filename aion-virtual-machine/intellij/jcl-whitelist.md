# JCL Whitelist

The Java Class List (JCL) is a list of classes that are available to your Java contracts.

## Available Classes

The following classes are available for use in your Java contracts.

```java
class java.lang.AssertionError
class java.lang.Boolean
class java.lang.Byte
class java.lang.Character
class java.lang.Class
class java.lang.Double
class java.lang.Enum
class java.lang.EnumConstantNotPresentException
class java.lang.Error
class java.lang.Exception
class java.lang.Float
class java.lang.Integer
class java.lang.Long
class java.lang.Math
class java.lang.Number
class java.lang.Object
class java.lang.RuntimeException
class java.lang.Short
class java.lang.StrictMath
class java.lang.String
class java.lang.StringBuffer
class java.lang.StringBuilder
class java.lang.System
class java.lang.Throwable
class java.lang.TypeNotPresentException
class java.math.BigDecimal
class java.math.BigInteger
class java.math.MathContext
class java.math.RoundingMode
class java.util.Arrays
class java.util.concurrent.TimeUnit
class java.util.NoSuchElementException
interface java.lang.CharSequence
interface java.lang.Comparable
interface java.lang.Iterable
interface java.lang.Runnable
interface java.util.Collection
interface java.util.function.Function
interface java.util.Iterator
interface java.util.List
interface java.util.ListIterator
interface java.util.Map
interface java.util.Map$Entry
interface java.util.Set
```

## Disabled Classes

The following classes have been disabled within the blockchain run time due to restrictions and security concerns. While some of these classes are perfectly safe to use in regular Java applications, due to the nature and immutability of contracts, they can pose a signification threat to the network.