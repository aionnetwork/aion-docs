---
title: JCL Whitelist
description: The Java Class List (JCL) whitelist is a list of classes that are available to your Java contract.
---

Java classes that are not deterministic have been disabled within AVM due to restrictions and security concerns. While some of these classes are perfectly safe to use in regular Java applications, due to the nature and immutability of smart contracts, they can pose a signification threat to the blockchain network.

Any usage of Java classes that is not listed in the following table will cause a deployment failure.

## Whitelisted Classes

The following classes are available for use in your Java contracts.
| Class | Method | Params | Static |
| --- | --- | --- | --- |
| `java.lang.IllegalAccessError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IllegalAccessError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IllegalAccessError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IllegalAccessError` | `<init>` | | `false` |
| `java.lang.Number` | `byteValue` | | `false` |
| `java.lang.Number` | `shortValue` | | `false` |
| `java.lang.Number` | `intValue` | | `false` |
| `java.lang.Number` | `longValue` | | `false` |
| `java.lang.Number` | `floatValue` | | `false` |
| `java.lang.Number` | `doubleValue` | | `false` |
| `java.lang.Number` | `<init>` | | `false` |
| `java.lang.Character` | `valueOf` | `char` | `true` |
| `java.lang.Character` | `isLowerCase` | `char` | `true` |
| `java.lang.Character` | `isUpperCase` | `char` | `true` |
| `java.lang.Character` | `isDigit` | `char` | `true` |
| `java.lang.Character` | `isLetter` | `char` | `true` |
| `java.lang.Character` | `toLowerCase` | `char` | `true` |
| `java.lang.Character` | `toUpperCase` | `char` | `true` |
| `java.lang.Character` | `digit` | `char, int` | `true` |
| `java.lang.Character` | `charValue` | | `false` |
| `java.lang.Character` | `isLetterOrDigit` | `char` | `true` |
| `java.lang.Character` | `getNumericValue` | `char` | `true` |
| `java.lang.Character` | `isSpaceChar` | `char` | `true` |
| `java.lang.Character` | `isWhitespace` | `char` | `true` |
| `java.lang.Character` | `forDigit` | `int, int` | `true` |
| `java.lang.Character` | `compare` | `char, char` | `true` |
| `java.lang.Character` | `compareTo` | `class java.lang.Character` | `false` |
| `java.lang.Character` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.Character` | `hashCode` | `char` | `true` |
| `java.lang.Character` | `hashCode` | | `false` |
| `java.lang.Character` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Character` | `toString` | | `false` |
| `java.lang.Character` | `toString` | `char` | `true` |
| `java.util.ListIterator` | `add` | `class java.lang.Object` | `false` |
| `java.util.ListIterator` | `remove` | | `false` |
| `java.util.ListIterator` | `next` | | `false` |
| `java.util.ListIterator` | `hasNext` | | `false` |
| `java.util.ListIterator` | `nextIndex` | | `false` |
| `java.util.ListIterator` | `previous` | | `false` |
| `java.util.ListIterator` | `hasPrevious` | | `false` |
| `java.util.ListIterator` | `previousIndex` | | `false` |
| `java.util.ListIterator` | `set` | `class java.lang.Object` | `false` |
| `java.lang.EnumConstantNotPresentException` | `enumType` | | `false` |
| `java.lang.EnumConstantNotPresentException` | `constantName` | | `false` |
| `java.lang.EnumConstantNotPresentException` | `<init>` | `class java.lang.Class, class java.lang.String` | `false` |
| `java.lang.IndexOutOfBoundsException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IndexOutOfBoundsException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IndexOutOfBoundsException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IndexOutOfBoundsException` | `<init>` | | `false` |
| `java.lang.Byte` | `valueOf` | `class java.lang.String` | `true` |
| `java.lang.Byte` | `valueOf` | `byte` | `true` |
| `java.lang.Byte` | `valueOf` | `class java.lang.String, int` | `true` |
| `java.lang.Byte` | `parseByte` | `class java.lang.String` | `true` |
| `java.lang.Byte` | `parseByte` | `class java.lang.String, int` | `true` |
| `java.lang.Byte` | `decode` | `class java.lang.String` | `true` |
| `java.lang.Byte` | `byteValue` | | `false` |
| `java.lang.Byte` | `shortValue` | | `false` |
| `java.lang.Byte` | `intValue` | | `false` |
| `java.lang.Byte` | `longValue` | | `false` |
| `java.lang.Byte` | `floatValue` | | `false` |
| `java.lang.Byte` | `doubleValue` | | `false` |
| `java.lang.Byte` | `compareUnsigned` | `byte, byte` | `true` |
| `java.lang.Byte` | `toUnsignedInt` | `byte` | `true` |
| `java.lang.Byte` | `toUnsignedLong` | `byte` | `true` |
| `java.lang.Byte` | `compare` | `byte, byte` | `true` |
| `java.lang.Byte` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.Byte` | `compareTo` | `class java.lang.Byte` | `false` |
| `java.lang.Byte` | `hashCode` | | `false` |
| `java.lang.Byte` | `hashCode` | `byte` | `true` |
| `java.lang.Byte` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Byte` | `toString` | `byte` | `true` |
| `java.lang.Byte` | `toString` | | `false` |
| `java.lang.IllegalMonitorStateException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IllegalMonitorStateException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IllegalMonitorStateException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IllegalMonitorStateException` | `<init>` | | `false` |
| `java.lang.VerifyError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.VerifyError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.VerifyError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.VerifyError` | `<init>` | | `false` |
| `java.lang.String` | `isEmpty` | | `false` |
| `java.lang.String` | `getBytes` | | `false` |
| `java.lang.String` | `contentEquals` | `interface java.lang.CharSequence` | `false` |
| `java.lang.String` | `contentEquals` | `class java.lang.StringBuffer` | `false` |
| `java.lang.String` | `getChars` | `int, int, class [C, int` | `false` |
| `java.lang.String` | `equalsIgnoreCase` | `class java.lang.String` | `false` |
| `java.lang.String` | `compareToIgnoreCase` | `class java.lang.String` | `false` |
| `java.lang.String` | `regionMatches` | `boolean, int, class java.lang.String, int, int` | `false` |
| `java.lang.String` | `regionMatches` | `int, class java.lang.String, int, int` | `false` |
| `java.lang.String` | `startsWith` | `class java.lang.String, int` | `false` |
| `java.lang.String` | `startsWith` | `class java.lang.String` | `false` |
| `java.lang.String` | `endsWith` | `class java.lang.String` | `false` |
| `java.lang.String` | `indexOf` | `class java.lang.String` | `false` |
| `java.lang.String` | `indexOf` | `int` | `false` |
| `java.lang.String` | `indexOf` | `int, int` | `false` |
| `java.lang.String` | `lastIndexOf` | `class java.lang.String, int` | `false` |
| `java.lang.String` | `lastIndexOf` | `class java.lang.String` | `false` |
| `java.lang.String` | `lastIndexOf` | `int, int` | `false` |
| `java.lang.String` | `lastIndexOf` | `int` | `false` |
| `java.lang.String` | `substring` | `int, int` | `false` |
| `java.lang.String` | `substring` | `int` | `false` |
| `java.lang.String` | `concat` | `class java.lang.String` | `false` |
| `java.lang.String` | `replace` | `interface java.lang.CharSequence, interface java.lang.CharSequence` | `false` |
| `java.lang.String` | `replace` | `char, char` | `false` |
| `java.lang.String` | `matches` | `class java.lang.String` | `false` |
| `java.lang.String` | `contains` | `interface java.lang.CharSequence` | `false` |
| `java.lang.String` | `replaceFirst` | `class java.lang.String, class java.lang.String` | `false` |
| `java.lang.String` | `replaceAll` | `class java.lang.String, class java.lang.String` | `false` |
| `java.lang.String` | `trim` | | `false` |
| `java.lang.String` | `toCharArray` | | `false` |
| `java.lang.String` | `copyValueOf` | `class [C, int, int` | `true` |
| `java.lang.String` | `copyValueOf` | `class [C` | `true` |
| `java.lang.String` | `subSequence` | `int, int` | `false` |
| `java.lang.String` | `charAt` | `int` | `false` |
| `java.lang.String` | `length` | | `false` |
| `java.lang.String` | `valueOf` | `float` | `true` |
| `java.lang.String` | `valueOf` | `class java.lang.Object` | `true` |
| `java.lang.String` | `valueOf` | `char` | `true` |
| `java.lang.String` | `valueOf` | `boolean` | `true` |
| `java.lang.String` | `valueOf` | `int` | `true` |
| `java.lang.String` | `valueOf` | `class [C, int, int` | `true` |
| `java.lang.String` | `valueOf` | `long` | `true` |
| `java.lang.String` | `valueOf` | `class [C` | `true` |
| `java.lang.String` | `valueOf` | `double` | `true` |
| `java.lang.String` | `toLowerCase` | | `false` |
| `java.lang.String` | `toUpperCase` | | `false` |
| `java.lang.String` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.String` | `compareTo` | `class java.lang.String` | `false` |
| `java.lang.String` | `hashCode` | | `false` |
| `java.lang.String` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.String` | `toString` | | `false` |
| `java.lang.String` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.String` | `<init>` | `class [C` | `false` |
| `java.lang.String` | `<init>` | `class [C, int, int` | `false` |
| `java.lang.String` | `<init>` | `class [B, int, int` | `false` |
| `java.lang.String` | `<init>` | | `false` |
| `java.lang.String` | `<init>` | `class java.lang.StringBuilder` | `false` |
| `java.lang.String` | `<init>` | `class java.lang.StringBuffer` | `false` |
| `java.lang.String` | `<init>` | `class [B` | `false` |
| `java.lang.ReflectiveOperationException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ReflectiveOperationException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ReflectiveOperationException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ReflectiveOperationException` | `<init>` | | `false` |
| `java.lang.IllegalArgumentException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IllegalArgumentException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IllegalArgumentException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IllegalArgumentException` | `<init>` | | `false` |
| `java.lang.InterruptedException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.InterruptedException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.InterruptedException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.InterruptedException` | `<init>` | | `false` |
| `java.util.MapEntry` | `setValue` | `class java.lang.Object` | `false` |
| `java.util.MapEntry` | `getKey` | | `false` |
| `java.util.MapEntry` | `getValue` | | `false` |
| `java.util.MapEntry` | `hashCode` | | `false` |
| `java.util.MapEntry` | `equals` | `class java.lang.Object` | `false` |
| `java.util.function.Function` | `apply` | `class java.lang.Object` | `false` |
| `java.nio.BufferUnderflowException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.nio.BufferUnderflowException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.nio.BufferUnderflowException` | `<init>` | `class java.lang.String` | `false` |
| `java.nio.BufferUnderflowException` | `<init>` | | `false` |
| `java.lang.ExceptionInInitializerError` | `getException` | | `false` |
| `java.lang.ExceptionInInitializerError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ExceptionInInitializerError` | `<init>` | | `false` |
| `java.lang.ExceptionInInitializerError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ExceptionInInitializerError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IllegalStateException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IllegalStateException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IllegalStateException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IllegalStateException` | `<init>` | | `false` |
| `java.math.BigInteger` | `longValueExact` | | `false` |
| `java.math.BigInteger` | `intValueExact` | | `false` |
| `java.math.BigInteger` | `shortValueExact` | | `false` |
| `java.math.BigInteger` | `byteValueExact` | | `false` |
| `java.math.BigInteger` | `add` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `subtract` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `multiply` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `divide` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `remainder` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `gcd` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `negate` | | `false` |
| `java.math.BigInteger` | `mod` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `modPow` | `class java.math.BigInteger, class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `modInverse` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `shiftLeft` | `int` | `false` |
| `java.math.BigInteger` | `shiftRight` | `int` | `false` |
| `java.math.BigInteger` | `and` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `or` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `xor` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `not` | | `false` |
| `java.math.BigInteger` | `andNot` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `testBit` | `int` | `false` |
| `java.math.BigInteger` | `setBit` | `int` | `false` |
| `java.math.BigInteger` | `clearBit` | `int` | `false` |
| `java.math.BigInteger` | `flipBit` | `int` | `false` |
| `java.math.BigInteger` | `getLowestSetBit` | | `false` |
| `java.math.BigInteger` | `bitLength` | | `false` |
| `java.math.BigInteger` | `bitCount` | | `false` |
| `java.math.BigInteger` | `signum` | | `false` |
| `java.math.BigInteger` | `sqrt` | | `false` |
| `java.math.BigInteger` | `abs` | | `false` |
| `java.math.BigInteger` | `max` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `min` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `valueOf` | `long` | `true` |
| `java.math.BigInteger` | `intValue` | | `false` |
| `java.math.BigInteger` | `longValue` | | `false` |
| `java.math.BigInteger` | `floatValue` | | `false` |
| `java.math.BigInteger` | `doubleValue` | | `false` |
| `java.math.BigInteger` | `compareTo` | `class java.lang.Object` | `false` |
| `java.math.BigInteger` | `compareTo` | `class java.math.BigInteger` | `false` |
| `java.math.BigInteger` | `toByteArray` | | `false` |
| `java.math.BigInteger` | `hashCode` | | `false` |
| `java.math.BigInteger` | `equals` | `class java.lang.Object` | `false` |
| `java.math.BigInteger` | `toString` | `int` | `false` |
| `java.math.BigInteger` | `toString` | | `false` |
| `java.math.BigInteger` | `<init>` | `class java.lang.String, int` | `false` |
| `java.math.BigInteger` | `<init>` | `int, class [B` | `false` |
| `java.math.BigInteger` | `<init>` | `int, class [B, int, int` | `false` |
| `java.math.BigInteger` | `<init>` | `class [B` | `false` |
| `java.math.BigInteger` | `<init>` | `class [B, int, int` | `false` |
| `java.math.BigInteger` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ClassCastException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ClassCastException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ClassCastException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ClassCastException` | `<init>` | | `false` |
| `java.lang.NoSuchMethodError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.NoSuchMethodError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.NoSuchMethodError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.NoSuchMethodError` | `<init>` | | `false` |
| `java.lang.StringIndexOutOfBoundsException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.StringIndexOutOfBoundsException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.StringIndexOutOfBoundsException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.StringIndexOutOfBoundsException` | `<init>` | | `false` |
| `java.lang.Double` | `toHexString` | `double` | `true` |
| `java.lang.Double` | `parseDouble` | `class java.lang.String` | `true` |
| `java.lang.Double` | `isNaN` | | `false` |
| `java.lang.Double` | `isNaN` | `double` | `true` |
| `java.lang.Double` | `isInfinite` | `double` | `true` |
| `java.lang.Double` | `isInfinite` | | `false` |
| `java.lang.Double` | `isFinite` | `double` | `true` |
| `java.lang.Double` | `doubleToLongBits` | `double` | `true` |
| `java.lang.Double` | `longBitsToDouble` | `long` | `true` |
| `java.lang.Double` | `sum` | `double, double` | `true` |
| `java.lang.Double` | `max` | `double, double` | `true` |
| `java.lang.Double` | `min` | `double, double` | `true` |
| `java.lang.Double` | `valueOf` | `class java.lang.String` | `true` |
| `java.lang.Double` | `valueOf` | `double` | `true` |
| `java.lang.Double` | `byteValue` | | `false` |
| `java.lang.Double` | `shortValue` | | `false` |
| `java.lang.Double` | `intValue` | | `false` |
| `java.lang.Double` | `longValue` | | `false` |
| `java.lang.Double` | `floatValue` | | `false` |
| `java.lang.Double` | `doubleValue` | | `false` |
| `java.lang.Double` | `compare` | `double, double` | `true` |
| `java.lang.Double` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.Double` | `compareTo` | `class java.lang.Double` | `false` |
| `java.lang.Double` | `hashCode` | `double` | `true` |
| `java.lang.Double` | `hashCode` | | `false` |
| `java.lang.Double` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Double` | `toString` | | `false` |
| `java.lang.Double` | `toString` | `double` | `true` |
| `java.lang.CharSequence` | `subSequence` | `int, int` | `false` |
| `java.lang.CharSequence` | `charAt` | `int` | `false` |
| `java.lang.CharSequence` | `length` | | `false` |
| `java.lang.CharSequence` | `toString` | | `false` |
| `java.lang.Long` | `remainderUnsigned` | `long, long` | `true` |
| `java.lang.Long` | `highestOneBit` | `long` | `true` |
| `java.lang.Long` | `lowestOneBit` | `long` | `true` |
| `java.lang.Long` | `numberOfLeadingZeros` | `long` | `true` |
| `java.lang.Long` | `numberOfTrailingZeros` | `long` | `true` |
| `java.lang.Long` | `bitCount` | `long` | `true` |
| `java.lang.Long` | `reverse` | `long` | `true` |
| `java.lang.Long` | `signum` | `long` | `true` |
| `java.lang.Long` | `reverseBytes` | `long` | `true` |
| `java.lang.Long` | `parseUnsignedLong` | `class java.lang.String` | `true` |
| `java.lang.Long` | `parseUnsignedLong` | `class java.lang.String, int` | `true` |
| `java.lang.Long` | `parseUnsignedLong` | `interface java.lang.CharSequence, int, int, int` | `true` |
| `java.lang.Long` | `rotateLeft` | `long, int` | `true` |
| `java.lang.Long` | `parseLong` | `class java.lang.String` | `true` |
| `java.lang.Long` | `parseLong` | `interface java.lang.CharSequence, int, int, int` | `true` |
| `java.lang.Long` | `parseLong` | `class java.lang.String, int` | `true` |
| `java.lang.Long` | `rotateRight` | `long, int` | `true` |
| `java.lang.Long` | `toBinaryString` | `long` | `true` |
| `java.lang.Long` | `toOctalString` | `long` | `true` |
| `java.lang.Long` | `toUnsignedString` | `long, int` | `true` |
| `java.lang.Long` | `toUnsignedString` | `long` | `true` |
| `java.lang.Long` | `divideUnsigned` | `long, long` | `true` |
| `java.lang.Long` | `toHexString` | `long` | `true` |
| `java.lang.Long` | `sum` | `long, long` | `true` |
| `java.lang.Long` | `max` | `long, long` | `true` |
| `java.lang.Long` | `min` | `long, long` | `true` |
| `java.lang.Long` | `valueOf` | `long` | `true` |
| `java.lang.Long` | `valueOf` | `class java.lang.String` | `true` |
| `java.lang.Long` | `valueOf` | `class java.lang.String, int` | `true` |
| `java.lang.Long` | `decode` | `class java.lang.String` | `true` |
| `java.lang.Long` | `byteValue` | | `false` |
| `java.lang.Long` | `shortValue` | | `false` |
| `java.lang.Long` | `intValue` | | `false` |
| `java.lang.Long` | `longValue` | | `false` |
| `java.lang.Long` | `floatValue` | | `false` |
| `java.lang.Long` | `doubleValue` | | `false` |
| `java.lang.Long` | `compareUnsigned` | `long, long` | `true` |
| `java.lang.Long` | `compare` | `long, long` | `true` |
| `java.lang.Long` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.Long` | `compareTo` | `class java.lang.Long` | `false` |
| `java.lang.Long` | `hashCode` | `long` | `true` |
| `java.lang.Long` | `hashCode` | | `false` |
| `java.lang.Long` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Long` | `toString` | `long` | `true` |
| `java.lang.Long` | `toString` | | `false` |
| `java.lang.Long` | `toString` | `long, int` | `true` |
| `java.util.List` | `add` | `class java.lang.Object` | `false` |
| `java.util.List` | `add` | `int, class java.lang.Object` | `false` |
| `java.util.List` | `remove` | `class java.lang.Object` | `false` |
| `java.util.List` | `remove` | `int` | `false` |
| `java.util.List` | `subList` | `int, int` | `false` |
| `java.util.List` | `toArray` | | `false` |
| `java.util.List` | `size` | | `false` |
| `java.util.List` | `containsAll` | `interface java.util.Collection` | `false` |
| `java.util.List` | `addAll` | `interface java.util.Collection` | `false` |
| `java.util.List` | `removeAll` | `interface java.util.Collection` | `false` |
| `java.util.List` | `retainAll` | `interface java.util.Collection` | `false` |
| `java.util.List` | `clear` | | `false` |
| `java.util.List` | `set` | `int, class java.lang.Object` | `false` |
| `java.util.List` | `get` | `int` | `false` |
| `java.util.List` | `listIterator` | | `false` |
| `java.util.List` | `listIterator` | `int` | `false` |
| `java.util.List` | `isEmpty` | | `false` |
| `java.util.List` | `indexOf` | `class java.lang.Object` | `false` |
| `java.util.List` | `lastIndexOf` | `class java.lang.Object` | `false` |
| `java.util.List` | `contains` | `class java.lang.Object` | `false` |
| `java.util.List` | `hashCode` | | `false` |
| `java.util.List` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.ArithmeticException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ArithmeticException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ArithmeticException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ArithmeticException` | `<init>` | | `false` |
| `java.lang.TypeNotPresentException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.util.Collection` | `add` | `class java.lang.Object` | `false` |
| `java.util.Collection` | `remove` | `class java.lang.Object` | `false` |
| `java.util.Collection` | `toArray` | | `false` |
| `java.util.Collection` | `size` | | `false` |
| `java.util.Collection` | `containsAll` | `interface java.util.Collection` | `false` |
| `java.util.Collection` | `addAll` | `interface java.util.Collection` | `false` |
| `java.util.Collection` | `removeAll` | `interface java.util.Collection` | `false` |
| `java.util.Collection` | `retainAll` | `interface java.util.Collection` | `false` |
| `java.util.Collection` | `clear` | | `false` |
| `java.util.Collection` | `isEmpty` | | `false` |
| `java.util.Collection` | `contains` | `class java.lang.Object` | `false` |
| `java.util.Collection` | `hashCode` | | `false` |
| `java.util.Collection` | `equals` | `class java.lang.Object` | `false` |
| `java.nio.BufferOverflowException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.nio.BufferOverflowException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.nio.BufferOverflowException` | `<init>` | `class java.lang.String` | `false` |
| `java.nio.BufferOverflowException` | `<init>` | | `false` |
| `java.lang.ClassFormatError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ClassFormatError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ClassFormatError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ClassFormatError` | `<init>` | | `false` |
| `java.lang.Integer` | `remainderUnsigned` | `int, int` | `true` |
| `java.lang.Integer` | `highestOneBit` | `int` | `true` |
| `java.lang.Integer` | `lowestOneBit` | `int` | `true` |
| `java.lang.Integer` | `numberOfLeadingZeros` | `int` | `true` |
| `java.lang.Integer` | `numberOfTrailingZeros` | `int` | `true` |
| `java.lang.Integer` | `bitCount` | `int` | `true` |
| `java.lang.Integer` | `reverse` | `int` | `true` |
| `java.lang.Integer` | `signum` | `int` | `true` |
| `java.lang.Integer` | `reverseBytes` | `int` | `true` |
| `java.lang.Integer` | `parseInt` | `class java.lang.String` | `true` |
| `java.lang.Integer` | `parseInt` | `class java.lang.String, int` | `true` |
| `java.lang.Integer` | `parseInt` | `interface java.lang.CharSequence, int, int, int` | `true` |
| `java.lang.Integer` | `toBinaryString` | `int` | `true` |
| `java.lang.Integer` | `toOctalString` | `int` | `true` |
| `java.lang.Integer` | `toUnsignedString` | `int, int` | `true` |
| `java.lang.Integer` | `toUnsignedString` | `int` | `true` |
| `java.lang.Integer` | `parseUnsignedInt` | `class java.lang.String` | `true` |
| `java.lang.Integer` | `parseUnsignedInt` | `class java.lang.String, int` | `true` |
| `java.lang.Integer` | `parseUnsignedInt` | `interface java.lang.CharSequence, int, int, int` | `true` |
| `java.lang.Integer` | `divideUnsigned` | `int, int` | `true` |
| `java.lang.Integer` | `toHexString` | `int` | `true` |
| `java.lang.Integer` | `sum` | `int, int` | `true` |
| `java.lang.Integer` | `max` | `int, int` | `true` |
| `java.lang.Integer` | `min` | `int, int` | `true` |
| `java.lang.Integer` | `valueOf` | `int` | `true` |
| `java.lang.Integer` | `valueOf` | `class java.lang.String` | `true` |
| `java.lang.Integer` | `valueOf` | `class java.lang.String, int` | `true` |
| `java.lang.Integer` | `decode` | `class java.lang.String` | `true` |
| `java.lang.Integer` | `byteValue` | | `false` |
| `java.lang.Integer` | `shortValue` | | `false` |
| `java.lang.Integer` | `intValue` | | `false` |
| `java.lang.Integer` | `longValue` | | `false` |
| `java.lang.Integer` | `floatValue` | | `false` |
| `java.lang.Integer` | `doubleValue` | | `false` |
| `java.lang.Integer` | `compareUnsigned` | `int, int` | `true` |
| `java.lang.Integer` | `toUnsignedLong` | `int` | `true` |
| `java.lang.Integer` | `compare` | `int, int` | `true` |
| `java.lang.Integer` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.Integer` | `compareTo` | `class java.lang.Integer` | `false` |
| `java.lang.Integer` | `hashCode` | `int` | `true` |
| `java.lang.Integer` | `hashCode` | | `false` |
| `java.lang.Integer` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Integer` | `toString` | `int` | `true` |
| `java.lang.Integer` | `toString` | | `false` |
| `java.lang.Integer` | `toString` | `int, int` | `true` |
| `java.util.concurrent.TimeUnit` | `convert` | `long, class java.util.concurrent.TimeUnit` | `false` |
| `java.util.concurrent.TimeUnit` | `toDays` | `long` | `false` |
| `java.util.concurrent.TimeUnit` | `toHours` | `long` | `false` |
| `java.util.concurrent.TimeUnit` | `toMinutes` | `long` | `false` |
| `java.util.concurrent.TimeUnit` | `toSeconds` | `long` | `false` |
| `java.util.concurrent.TimeUnit` | `toMillis` | `long` | `false` |
| `java.util.concurrent.TimeUnit` | `toMicros` | `long` | `false` |
| `java.util.concurrent.TimeUnit` | `toNanos` | `long` | `false` |
| `java.util.concurrent.TimeUnit` | `values` | | `true` |
| `java.util.concurrent.TimeUnit` | `valueOf` | `class java.lang.String` | `true` |
| `java.lang.UnsupportedClassVersionError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.UnsupportedClassVersionError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.UnsupportedClassVersionError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.UnsupportedClassVersionError` | `<init>` | | `false` |
| `java.math.RoundingMode` | `values` | | `true` |
| `java.math.RoundingMode` | `valueOf` | `class java.lang.String` | `true` |
| `java.math.RoundingMode` | `valueOf` | `int` | `true` |
| `java.lang.ArrayStoreException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ArrayStoreException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ArrayStoreException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ArrayStoreException` | `<init>` | | `false` |
| `java.lang.ArrayIndexOutOfBoundsException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ArrayIndexOutOfBoundsException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ArrayIndexOutOfBoundsException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ArrayIndexOutOfBoundsException` | `<init>` | | `false` |
| `java.lang.NullPointerException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.NullPointerException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.NullPointerException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.NullPointerException` | `<init>` | | `false` |
| `java.lang.IllegalCallerException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IllegalCallerException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IllegalCallerException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IllegalCallerException` | `<init>` | | `false` |
| `java.lang.ThreadDeath` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ThreadDeath` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ThreadDeath` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ThreadDeath` | `<init>` | | `false` |
| `java.lang.Float` | `parseFloat` | `class java.lang.String` | `true` |
| `java.lang.Float` | `intBitsToFloat` | `int` | `true` |
| `java.lang.Float` | `toHexString` | `float` | `true` |
| `java.lang.Float` | `isNaN` | `float` | `true` |
| `java.lang.Float` | `isNaN` | | `false` |
| `java.lang.Float` | `isInfinite` | `float` | `true` |
| `java.lang.Float` | `isInfinite` | | `false` |
| `java.lang.Float` | `isFinite` | `float` | `true` |
| `java.lang.Float` | `sum` | `float, float` | `true` |
| `java.lang.Float` | `max` | `float, float` | `true` |
| `java.lang.Float` | `min` | `float, float` | `true` |
| `java.lang.Float` | `floatToIntBits` | `float` | `true` |
| `java.lang.Float` | `valueOf` | `float` | `true` |
| `java.lang.Float` | `valueOf` | `class java.lang.String` | `true` |
| `java.lang.Float` | `byteValue` | | `false` |
| `java.lang.Float` | `shortValue` | | `false` |
| `java.lang.Float` | `intValue` | | `false` |
| `java.lang.Float` | `longValue` | | `false` |
| `java.lang.Float` | `floatValue` | | `false` |
| `java.lang.Float` | `doubleValue` | | `false` |
| `java.lang.Float` | `compare` | `float, float` | `true` |
| `java.lang.Float` | `compareTo` | `class java.lang.Float` | `false` |
| `java.lang.Float` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.Float` | `hashCode` | | `false` |
| `java.lang.Float` | `hashCode` | `float` | `true` |
| `java.lang.Float` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Float` | `toString` | `float` | `true` |
| `java.lang.Float` | `toString` | | `false` |
| `java.util.Set` | `add` | `class java.lang.Object` | `false` |
| `java.util.Set` | `remove` | `class java.lang.Object` | `false` |
| `java.util.Set` | `toArray` | | `false` |
| `java.util.Set` | `toArray` | | `false` |
| `java.util.Set` | `size` | | `false` |
| `java.util.Set` | `containsAll` | `interface java.util.Collection` | `false` |
| `java.util.Set` | `addAll` | `interface java.util.Collection` | `false` |
| `java.util.Set` | `removeAll` | `interface java.util.Collection` | `false` |
| `java.util.Set` | `retainAll` | `interface java.util.Collection` | `false` |
| `java.util.Set` | `clear` | | `false` |
| `java.util.Set` | `isEmpty` | | `false` |
| `java.util.Set` | `contains` | `class java.lang.Object` | `false` |
| `java.util.Set` | `hashCode` | | `false` |
| `java.util.Set` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Exception` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.Exception` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.Exception` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.Exception` | `<init>` | | `false` |
| `java.lang.ClassNotFoundException` | `getException` | | `false` |
| `java.lang.ClassNotFoundException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ClassNotFoundException` | `<init>` | | `false` |
| `java.lang.ClassNotFoundException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ClassNotFoundException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.AbstractMethodError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.AbstractMethodError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.AbstractMethodError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.AbstractMethodError` | `<init>` | | `false` |
| `java.lang.NoSuchFieldError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.NoSuchFieldError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.NoSuchFieldError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.NoSuchFieldError` | `<init>` | | `false` |
| `java.lang.Error` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.Error` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.Error` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.Error` | `<init>` | | `false` |
| `java.lang.InstantiationError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.InstantiationError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.InstantiationError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.InstantiationError` | `<init>` | | `false` |
| `java.lang.Class` | `getSuperclass` | | `false` |
| `java.lang.Class` | `desiredAssertionStatus` | | `false` |
| `java.lang.Class` | `cast` | `class java.lang.Object` | `false` |
| `java.lang.Class` | `getName` | | `false` |
| `java.lang.Class` | `toString` | | `false` |
| `java.lang.NoSuchMethodException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.NoSuchMethodException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.NoSuchMethodException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.NoSuchMethodException` | `<init>` | | `false` |
| `java.lang.BootstrapMethodError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.BootstrapMethodError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.BootstrapMethodError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.BootstrapMethodError` | `<init>` | | `false` |
| `java.lang.Enum` | `clone` | | `false` |
| `java.lang.Enum` | `clone` | | `false` |
| `java.lang.Enum` | `name` | | `false` |
| `java.lang.Enum` | `ordinal` | | `false` |
| `java.lang.Enum` | `valueOf` | `class java.lang.Class, class java.lang.String` | `true` |
| `java.lang.Enum` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Enum` | `toString` | | `false` |
| `java.lang.Enum` | `<init>` | `class java.lang.String, int` | `false` |
| `java.lang.IncompatibleClassChangeError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IncompatibleClassChangeError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IncompatibleClassChangeError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IncompatibleClassChangeError` | `<init>` | | `false` |
| `java.util.Iterator` | `remove` | | `false` |
| `java.util.Iterator` | `next` | | `false` |
| `java.util.Iterator` | `hasNext` | | `false` |
| `java.lang.ClassCircularityError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.ClassCircularityError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.ClassCircularityError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.ClassCircularityError` | `<init>` | | `false` |
| `java.lang.Object` | `getClass` | | `false` |
| `java.lang.Object` | `clone` | | `false` |
| `java.lang.Object` | `hashCode` | | `false` |
| `java.lang.Object` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Object` | `toString` | | `false` |
| `java.lang.Object` | `<init>` | | `false` |
| `java.lang.AssertionError` | `<init>` | `int` | `false` |
| `java.lang.AssertionError` | `<init>` | `long` | `false` |
| `java.lang.AssertionError` | `<init>` | `float` | `false` |
| `java.lang.AssertionError` | `<init>` | `double` | `false` |
| `java.lang.AssertionError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.AssertionError` | `<init>` | | `false` |
| `java.lang.AssertionError` | `<init>` | `class java.lang.Object` | `false` |
| `java.lang.AssertionError` | `<init>` | `boolean` | `false` |
| `java.lang.AssertionError` | `<init>` | `char` | `false` |
| `java.lang.IllegalAccessException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IllegalAccessException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IllegalAccessException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IllegalAccessException` | `<init>` | | `false` |
| `java.lang.UnsatisfiedLinkError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.UnsatisfiedLinkError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.UnsatisfiedLinkError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.UnsatisfiedLinkError` | `<init>` | | `false` |
| `java.lang.InstantiationException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.InstantiationException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.InstantiationException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.InstantiationException` | `<init>` | | `false` |
| `java.lang.Throwable` | `getCause` | | `false` |
| `java.lang.Throwable` | `initCause` | `class java.lang.Throwable` | `false` |
| `java.lang.Throwable` | `getMessage` | | `false` |
| `java.lang.Throwable` | `getLocalizedMessage` | | `false` |
| `java.lang.Throwable` | `toString` | | `false` |
| `java.lang.Throwable` | `<init>` | | `false` |
| `java.lang.Throwable` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.Throwable` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.Throwable` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.RuntimeException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.RuntimeException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.RuntimeException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.RuntimeException` | `<init>` | | `false` |
| `java.lang.UnsupportedOperationException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.UnsupportedOperationException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.UnsupportedOperationException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.UnsupportedOperationException` | `<init>` | | `false` |
| `java.lang.Appendable` | `append` | `interface java.lang.CharSequence` | `false` |
| `java.lang.Appendable` | `append` | `interface java.lang.CharSequence, int, int` | `false` |
| `java.lang.Appendable` | `append` | `char` | `false` |
| `java.lang.StringBuilder` | `deleteCharAt` | `int` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, class java.lang.String` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, class [C` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, interface java.lang.CharSequence` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, class java.lang.Object` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, class [C, int, int` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, double` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, float` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, long` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, int` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, char` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, boolean` | `false` |
| `java.lang.StringBuilder` | `insert` | `int, interface java.lang.CharSequence, int, int` | `false` |
| `java.lang.StringBuilder` | `reverse` | | `false` |
| `java.lang.StringBuilder` | `indexOf` | `class java.lang.String, int` | `false` |
| `java.lang.StringBuilder` | `indexOf` | `class java.lang.String` | `false` |
| `java.lang.StringBuilder` | `lastIndexOf` | `class java.lang.String` | `false` |
| `java.lang.StringBuilder` | `lastIndexOf` | `class java.lang.String, int` | `false` |
| `java.lang.StringBuilder` | `replace` | `int, int, class java.lang.String` | `false` |
| `java.lang.StringBuilder` | `append` | `char` | `false` |
| `java.lang.StringBuilder` | `append` | `class java.lang.Object` | `false` |
| `java.lang.StringBuilder` | `append` | `class java.lang.String` | `false` |
| `java.lang.StringBuilder` | `append` | `interface java.lang.CharSequence, int, int` | `false` |
| `java.lang.StringBuilder` | `append` | `interface java.lang.CharSequence` | `false` |
| `java.lang.StringBuilder` | `append` | `interface java.lang.CharSequence, int, int` | `false` |
| `java.lang.StringBuilder` | `append` | `boolean` | `false` |
| `java.lang.StringBuilder` | `append` | `int` | `false` |
| `java.lang.StringBuilder` | `append` | `double` | `false` |
| `java.lang.StringBuilder` | `append` | `float` | `false` |
| `java.lang.StringBuilder` | `append` | `char` | `false` |
| `java.lang.StringBuilder` | `append` | `long` | `false` |
| `java.lang.StringBuilder` | `append` | `class java.lang.StringBuffer` | `false` |
| `java.lang.StringBuilder` | `append` | `class [C` | `false` |
| `java.lang.StringBuilder` | `append` | `class [C, int, int` | `false` |
| `java.lang.StringBuilder` | `append` | `interface java.lang.CharSequence` | `false` |
| `java.lang.StringBuilder` | `delete` | `int, int` | `false` |
| `java.lang.StringBuilder` | `subSequence` | `int, int` | `false` |
| `java.lang.StringBuilder` | `charAt` | `int` | `false` |
| `java.lang.StringBuilder` | `length` | | `false` |
| `java.lang.StringBuilder` | `toString` | | `false` |
| `java.lang.StringBuilder` | `<init>` | `int` | `false` |
| `java.lang.StringBuilder` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.StringBuilder` | `<init>` | `interface java.lang.CharSequence` | `false` |
| `java.lang.StringBuilder` | `<init>` | | `false` |
| `java.lang.SecurityException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.SecurityException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.SecurityException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.SecurityException` | `<init>` | | `false` |
| `java.lang.StrictMath` | `signum` | `double` | `true` |
| `java.lang.StrictMath` | `signum` | `float` | `true` |
| `java.lang.StrictMath` | `sin` | `double` | `true` |
| `java.lang.StrictMath` | `cos` | `double` | `true` |
| `java.lang.StrictMath` | `tan` | `double` | `true` |
| `java.lang.StrictMath` | `asin` | `double` | `true` |
| `java.lang.StrictMath` | `acos` | `double` | `true` |
| `java.lang.StrictMath` | `atan` | `double` | `true` |
| `java.lang.StrictMath` | `toRadians` | `double` | `true` |
| `java.lang.StrictMath` | `toDegrees` | `double` | `true` |
| `java.lang.StrictMath` | `exp` | `double` | `true` |
| `java.lang.StrictMath` | `log10` | `double` | `true` |
| `java.lang.StrictMath` | `sqrt` | `double` | `true` |
| `java.lang.StrictMath` | `cbrt` | `double` | `true` |
| `java.lang.StrictMath` | `IEEEremainder` | `double, double` | `true` |
| `java.lang.StrictMath` | `ceil` | `double` | `true` |
| `java.lang.StrictMath` | `floor` | `double` | `true` |
| `java.lang.StrictMath` | `rint` | `double` | `true` |
| `java.lang.StrictMath` | `atan2` | `double, double` | `true` |
| `java.lang.StrictMath` | `pow` | `double, double` | `true` |
| `java.lang.StrictMath` | `round` | `double` | `true` |
| `java.lang.StrictMath` | `round` | `float` | `true` |
| `java.lang.StrictMath` | `addExact` | `long, long` | `true` |
| `java.lang.StrictMath` | `addExact` | `int, int` | `true` |
| `java.lang.StrictMath` | `subtractExact` | `long, long` | `true` |
| `java.lang.StrictMath` | `subtractExact` | `int, int` | `true` |
| `java.lang.StrictMath` | `multiplyExact` | `long, long` | `true` |
| `java.lang.StrictMath` | `multiplyExact` | `long, int` | `true` |
| `java.lang.StrictMath` | `multiplyExact` | `int, int` | `true` |
| `java.lang.StrictMath` | `toIntExact` | `long` | `true` |
| `java.lang.StrictMath` | `multiplyFull` | `int, int` | `true` |
| `java.lang.StrictMath` | `multiplyHigh` | `long, long` | `true` |
| `java.lang.StrictMath` | `floorDiv` | `long, long` | `true` |
| `java.lang.StrictMath` | `floorDiv` | `long, int` | `true` |
| `java.lang.StrictMath` | `floorDiv` | `int, int` | `true` |
| `java.lang.StrictMath` | `floorMod` | `long, int` | `true` |
| `java.lang.StrictMath` | `floorMod` | `int, int` | `true` |
| `java.lang.StrictMath` | `floorMod` | `long, long` | `true` |
| `java.lang.StrictMath` | `abs` | `float` | `true` |
| `java.lang.StrictMath` | `abs` | `double` | `true` |
| `java.lang.StrictMath` | `abs` | `long` | `true` |
| `java.lang.StrictMath` | `abs` | `int` | `true` |
| `java.lang.StrictMath` | `fma` | `double, double, double` | `true` |
| `java.lang.StrictMath` | `fma` | `float, float, float` | `true` |
| `java.lang.StrictMath` | `ulp` | `double` | `true` |
| `java.lang.StrictMath` | `ulp` | `float` | `true` |
| `java.lang.StrictMath` | `sinh` | `double` | `true` |
| `java.lang.StrictMath` | `cosh` | `double` | `true` |
| `java.lang.StrictMath` | `tanh` | `double` | `true` |
| `java.lang.StrictMath` | `hypot` | `double, double` | `true` |
| `java.lang.StrictMath` | `expm1` | `double` | `true` |
| `java.lang.StrictMath` | `log1p` | `double` | `true` |
| `java.lang.StrictMath` | `copySign` | `float, float` | `true` |
| `java.lang.StrictMath` | `copySign` | `double, double` | `true` |
| `java.lang.StrictMath` | `getExponent` | `double` | `true` |
| `java.lang.StrictMath` | `getExponent` | `float` | `true` |
| `java.lang.StrictMath` | `nextAfter` | `float, double` | `true` |
| `java.lang.StrictMath` | `nextAfter` | `double, double` | `true` |
| `java.lang.StrictMath` | `nextUp` | `float` | `true` |
| `java.lang.StrictMath` | `nextUp` | `double` | `true` |
| `java.lang.StrictMath` | `nextDown` | `float` | `true` |
| `java.lang.StrictMath` | `nextDown` | `double` | `true` |
| `java.lang.StrictMath` | `scalb` | `double, int` | `true` |
| `java.lang.StrictMath` | `scalb` | `float, int` | `true` |
| `java.lang.StrictMath` | `log` | `double` | `true` |
| `java.lang.StrictMath` | `max` | `int, int` | `true` |
| `java.lang.StrictMath` | `max` | `double, double` | `true` |
| `java.lang.StrictMath` | `max` | `float, float` | `true` |
| `java.lang.StrictMath` | `max` | `long, long` | `true` |
| `java.lang.StrictMath` | `min` | `long, long` | `true` |
| `java.lang.StrictMath` | `min` | `double, double` | `true` |
| `java.lang.StrictMath` | `min` | `float, float` | `true` |
| `java.lang.StrictMath` | `min` | `int, int` | `true` |
| `java.lang.Comparable` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.NoClassDefFoundError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.NoClassDefFoundError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.NoClassDefFoundError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.NoClassDefFoundError` | `<init>` | | `false` |
| `java.lang.IllegalThreadStateException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.IllegalThreadStateException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.IllegalThreadStateException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.IllegalThreadStateException` | `<init>` | | `false` |
| `java.util.Arrays` | `fill` | `class [B, int, int, byte` | `true` |
| `java.util.Arrays` | `copyOfRange` | `class [B, int, int` | `true` |
| `java.util.Arrays` | `hashCode` | `class [B` | `true` |
| `java.util.Arrays` | `equals` | `class [B, class [B` | `true` |
| `java.lang.CloneNotSupportedException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.CloneNotSupportedException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.CloneNotSupportedException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.CloneNotSupportedException` | `<init>` | | `false` |
| `java.lang.NegativeArraySizeException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.NegativeArraySizeException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.NegativeArraySizeException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.NegativeArraySizeException` | `<init>` | | `false` |
| `java.lang.Runnable` | `run` | | `false` |
| `java.lang.Boolean` | `valueOf` | `boolean` | `true` |
| `java.lang.Boolean` | `valueOf` | `class java.lang.String` | `true` |
| `java.lang.Boolean` | `logicalXor` | `boolean, boolean` | `true` |
| `java.lang.Boolean` | `logicalAnd` | `boolean, boolean` | `true` |
| `java.lang.Boolean` | `logicalOr` | `boolean, boolean` | `true` |
| `java.lang.Boolean` | `booleanValue` | | `false` |
| `java.lang.Boolean` | `parseBoolean` | `class java.lang.String` | `true` |
| `java.lang.Boolean` | `compare` | `boolean, boolean` | `true` |
| `java.lang.Boolean` | `compareTo` | `class java.lang.Boolean` | `false` |
| `java.lang.Boolean` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.Boolean` | `hashCode` | | `false` |
| `java.lang.Boolean` | `hashCode` | `boolean` | `true` |
| `java.lang.Boolean` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Boolean` | `toString` | `boolean` | `true` |
| `java.lang.Boolean` | `toString` | | `false` |
| `java.lang.Short` | `reverseBytes` | `short` | `true` |
| `java.lang.Short` | `parseShort` | `class java.lang.String, int` | `true` |
| `java.lang.Short` | `parseShort` | `class java.lang.String` | `true` |
| `java.lang.Short` | `valueOf` | `short` | `true` |
| `java.lang.Short` | `valueOf` | `class java.lang.String` | `true` |
| `java.lang.Short` | `valueOf` | `class java.lang.String, int` | `true` |
| `java.lang.Short` | `decode` | `class java.lang.String` | `true` |
| `java.lang.Short` | `byteValue` | | `false` |
| `java.lang.Short` | `shortValue` | | `false` |
| `java.lang.Short` | `intValue` | | `false` |
| `java.lang.Short` | `longValue` | | `false` |
| `java.lang.Short` | `floatValue` | | `false` |
| `java.lang.Short` | `doubleValue` | | `false` |
| `java.lang.Short` | `compareUnsigned` | `short, short` | `true` |
| `java.lang.Short` | `toUnsignedInt` | `short` | `true` |
| `java.lang.Short` | `toUnsignedLong` | `short` | `true` |
| `java.lang.Short` | `compare` | `short, short` | `true` |
| `java.lang.Short` | `compareTo` | `class java.lang.Object` | `false` |
| `java.lang.Short` | `compareTo` | `class java.lang.Short` | `false` |
| `java.lang.Short` | `hashCode` | | `false` |
| `java.lang.Short` | `hashCode` | `short` | `true` |
| `java.lang.Short` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Short` | `toString` | `short` | `true` |
| `java.lang.Short` | `toString` | | `false` |
| `java.lang.LinkageError` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.LinkageError` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.LinkageError` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.LinkageError` | `<init>` | | `false` |
| `java.math.MathContext` | `getPrecision` | | `false` |
| `java.math.MathContext` | `getRoundingMode` | | `false` |
| `java.math.MathContext` | `hashCode` | | `false` |
| `java.math.MathContext` | `equals` | `class java.lang.Object` | `false` |
| `java.math.MathContext` | `toString` | | `false` |
| `java.math.MathContext` | `<init>` | `int, class java.math.RoundingMode` | `false` |
| `java.math.MathContext` | `<init>` | `class java.lang.String` | `false` |
| `java.math.MathContext` | `<init>` | `int` | `false` |
| `java.lang.NumberFormatException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.NumberFormatException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.NumberFormatException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.NumberFormatException` | `<init>` | | `false` |
| `java.util.NoSuchElementException` | `<init>` | `class java.lang.String` | `false` |
| `java.util.NoSuchElementException` | `<init>` | | `false` |
| `java.math.BigDecimal` | `longValueExact` | | `false` |
| `java.math.BigDecimal` | `toBigInteger` | | `false` |
| `java.math.BigDecimal` | `toPlainString` | | `false` |
| `java.math.BigDecimal` | `toBigIntegerExact` | | `false` |
| `java.math.BigDecimal` | `intValueExact` | | `false` |
| `java.math.BigDecimal` | `shortValueExact` | | `false` |
| `java.math.BigDecimal` | `byteValueExact` | | `false` |
| `java.math.BigDecimal` | `valueOf` | `long` | `true` |
| `java.math.BigDecimal` | `valueOf` | `double` | `true` |
| `java.math.BigDecimal` | `intValue` | | `false` |
| `java.math.BigDecimal` | `longValue` | | `false` |
| `java.math.BigDecimal` | `floatValue` | | `false` |
| `java.math.BigDecimal` | `doubleValue` | | `false` |
| `java.math.BigDecimal` | `compareTo` | `class java.lang.Object` | `false` |
| `java.math.BigDecimal` | `compareTo` | `class java.math.BigDecimal` | `false` |
| `java.math.BigDecimal` | `hashCode` | | `false` |
| `java.math.BigDecimal` | `equals` | `class java.lang.Object` | `false` |
| `java.math.BigDecimal` | `toString` | | `false` |
| `java.math.BigDecimal` | `<init>` | `int` | `false` |
| `java.math.BigDecimal` | `<init>` | `double, class java.math.MathContext` | `false` |
| `java.math.BigDecimal` | `<init>` | `double` | `false` |
| `java.math.BigDecimal` | `<init>` | `class java.lang.String, class java.math.MathContext` | `false` |
| `java.math.BigDecimal` | `<init>` | `class java.lang.String` | `false` |
| `java.math.BigDecimal` | `<init>` | `long, class java.math.MathContext` | `false` |
| `java.math.BigDecimal` | `<init>` | `long` | `false` |
| `java.math.BigDecimal` | `<init>` | `int, class java.math.MathContext` | `false` |
| `java.lang.StringBuffer` | `deleteCharAt` | `int` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, class [C` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, interface java.lang.CharSequence` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, interface java.lang.CharSequence, int, int` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, boolean` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, class java.lang.String` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, class java.lang.Object` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, class [C, int, int` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, float` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, long` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, double` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, int` | `false` |
| `java.lang.StringBuffer` | `insert` | `int, char` | `false` |
| `java.lang.StringBuffer` | `reverse` | | `false` |
| `java.lang.StringBuffer` | `getChars` | `int, int, class [C, int` | `false` |
| `java.lang.StringBuffer` | `indexOf` | `class java.lang.String, int` | `false` |
| `java.lang.StringBuffer` | `indexOf` | `class java.lang.String` | `false` |
| `java.lang.StringBuffer` | `lastIndexOf` | `class java.lang.String, int` | `false` |
| `java.lang.StringBuffer` | `lastIndexOf` | `class java.lang.String` | `false` |
| `java.lang.StringBuffer` | `substring` | `int` | `false` |
| `java.lang.StringBuffer` | `substring` | `int, int` | `false` |
| `java.lang.StringBuffer` | `replace` | `int, int, class java.lang.String` | `false` |
| `java.lang.StringBuffer` | `trimToSize` | | `false` |
| `java.lang.StringBuffer` | `setLength` | `int` | `false` |
| `java.lang.StringBuffer` | `setCharAt` | `int, char` | `false` |
| `java.lang.StringBuffer` | `append` | `class java.lang.StringBuffer` | `false` |
| `java.lang.StringBuffer` | `append` | `class java.lang.String` | `false` |
| `java.lang.StringBuffer` | `append` | `long` | `false` |
| `java.lang.StringBuffer` | `append` | `interface java.lang.CharSequence` | `false` |
| `java.lang.StringBuffer` | `append` | `interface java.lang.CharSequence, int, int` | `false` |
| `java.lang.StringBuffer` | `append` | `char` | `false` |
| `java.lang.StringBuffer` | `append` | `class java.lang.Object` | `false` |
| `java.lang.StringBuffer` | `append` | `int` | `false` |
| `java.lang.StringBuffer` | `append` | `class [C` | `false` |
| `java.lang.StringBuffer` | `append` | `char` | `false` |
| `java.lang.StringBuffer` | `append` | `boolean` | `false` |
| `java.lang.StringBuffer` | `append` | `class [C, int, int` | `false` |
| `java.lang.StringBuffer` | `append` | `interface java.lang.CharSequence` | `false` |
| `java.lang.StringBuffer` | `append` | `double` | `false` |
| `java.lang.StringBuffer` | `append` | `float` | `false` |
| `java.lang.StringBuffer` | `append` | `interface java.lang.CharSequence, int, int` | `false` |
| `java.lang.StringBuffer` | `ensureCapacity` | `int` | `false` |
| `java.lang.StringBuffer` | `capacity` | | `false` |
| `java.lang.StringBuffer` | `delete` | `int, int` | `false` |
| `java.lang.StringBuffer` | `subSequence` | `int, int` | `false` |
| `java.lang.StringBuffer` | `charAt` | `int` | `false` |
| `java.lang.StringBuffer` | `length` | | `false` |
| `java.lang.StringBuffer` | `toString` | | `false` |
| `java.lang.StringBuffer` | `<init>` | `int` | `false` |
| `java.lang.StringBuffer` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.StringBuffer` | `<init>` | `interface java.lang.CharSequence` | `false` |
| `java.lang.StringBuffer` | `<init>` | | `false` |
| `java.util.Map` | `remove` | `class java.lang.Object` | `false` |
| `java.util.Map` | `size` | | `false` |
| `java.util.Map` | `clear` | | `false` |
| `java.util.Map` | `get` | `class java.lang.Object` | `false` |
| `java.util.Map` | `containsValue` | `class java.lang.Object` | `false` |
| `java.util.Map` | `containsKey` | `class java.lang.Object` | `false` |
| `java.util.Map` | `put` | `class java.lang.Object, class java.lang.Object` | `false` |
| `java.util.Map` | `putAll` | `interface java.util.Map` | `false` |
| `java.util.Map` | `keySet` | | `false` |
| `java.util.Map` | `entrySet` | | `false` |
| `java.util.Map` | `isEmpty` | | `false` |
| `java.util.Map` | `values` | | `false` |
| `java.util.Map` | `hashCode` | | `false` |
| `java.util.Map` | `equals` | `class java.lang.Object` | `false` |
| `java.lang.Iterable` | `iterator` | | `false` |
| `java.lang.System` | `arraycopy` | `class java.lang.Object, int, class java.lang.Object, int, int` | `true` |
| `java.lang.LayerInstantiationException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.LayerInstantiationException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.LayerInstantiationException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.LayerInstantiationException` | `<init>` | | `false` |
| `java.lang.NoSuchFieldException` | `<init>` | `class java.lang.Throwable` | `false` |
| `java.lang.NoSuchFieldException` | `<init>` | `class java.lang.String, class java.lang.Throwable` | `false` |
| `java.lang.NoSuchFieldException` | `<init>` | `class java.lang.String` | `false` |
| `java.lang.NoSuchFieldException` | `<init>` | | `false` |
| `java.lang.NoSuchFieldException` | | `` | |
| `java.lang.NoSuchFieldException` | | `` | |

## Disabled Classes

Classes that are not deterministic have been disabled within AVM due to restrictions and security concerns. While some of these classes are perfectly safe to use in regular Java applications, due to the nature and immutability of smart contracts, they can pose a signification threat to the blockchain network.
