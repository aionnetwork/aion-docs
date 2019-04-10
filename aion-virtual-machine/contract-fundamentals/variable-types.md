# Variable Types

1. [Call & Deploy Types](#call--deploy-types)
2. [Arrays](#arrays)

When calling or deploying a contract with arguments, you must specify the type of variable you are submitting. For example, if you wanted to call a function within a contract with an address you would pass the `-A` selector followed by the address itself.

## Call & Deploy Types

Here are the types available to call and deploy your contract with. Any variable type _not_ in this list can still be used within a contract, but cannot be used to call functions or other contracts, and they cannot be used to deploy contracts.

### Address

- Inline selector: `-A`
- Available within 2D Arrays: `false`
- Maven Example: `mvn aion4j:deploy -Dargs='-A 0xa04462684b510796c186d19abfa6929742f79394583d6efb1243bbb473f21d9f'`

### Boolean

- Inline selector: `-Z`
- Available within 2D Arrays: `true`
- Maven Example: `mvn aion4j:deploy -Dargs='-Z true'`

### Byte

- Inline selector: `-B`
- Available within 2D Arrays: `true`
- Maven Example: `mvn aion4j:deploy -Dargs='-B a0'`

### Character

- Inline selector: `-C`
- Available within 2D Arrays: `true`
- Maven Example: `mvn aion4j:deploy -Dargs='-C A'`

### Double

- Inline selector: `-D`
- Available within 2D Arrays: `true`
- Maven Example: `mvn aion4j:deploy -Dargs='-D 3.141592654'`

### Float

- Inline selector: `-F`
- Available within 2D Arrays: `true`
- Maven Example: `mvn aion4j:deploy -Dargs='-F 3.141'`

### Integer

- Inline selector: `-I`
- Available within 2D Arrays: `true`
- Maven Example: `mvn aion4j:deploy -Dargs='-I 42'`

### Long

- Inline selector: `-L`
- Available within 2D Arrays: `true`
- Maven Example: `mvn aion4j:deploy -Dargs='-L 3141592653589793238462643383279502884197169'`

### Short

- Inline selector: `-S`
- Available within 2D Arrays: `true`
- Maven Example: `mvn aion4j:deploy -Dargs='-S 314159'`

### String

- Inline selector: `-T`
- Available within 2D Arrays: `false`
- Maven Example: `mvn aion4j:deploy -Dargs='-T "Don't panic."'`

## Arrays

Using arrays for inline arguments is pretty simple. They are structured by adding the same variable type within the same deployment call.

An array of string would look like this:

```java
-T 'Time is an illusion. Lunchtime doubly so.' 'Don\'t Panic.' 'The ships hung in the sky in much the same way that bricks don\'t.'
```

An array of integers would look like this:

```java
-I 3141 592653 589 7932 3846
```

To create an array with only a single item, you must include square brackets `[]` after declaring the variable type:

```java
-I[] 3141
-T[] "Don't panic."
```

Entering them into your constructor class when deploying your contract is pretty straight forward: For example if you wanted to supply an array of three addresses using Maven, you could add them in like this:

```bash
mvn aion4j:deploy -Dargs="-a 0xa04462684b510796c186d19abfa6929742f79394583d6efb1243bbb473f21d9f 0xa0f1002373877bd6987f23af0daa97f5d886d591cf308408cb396eda44f3456e 0xa08ff81385e37fa8a7a3ab045ac0d25187fdfbae58ae54cc5ab44d90cdac6648"
```

If you are using IntelliJ, add the `-Dargs` into the **Deployment Arguments** section, under the **Common** configurations tab.

![Array Deployment Arguments](/aion-virtual-machine/images/array-deployment-arguments.png)

### Two Dimensional Arrays

To create a two-dimensional array (2D array), supply two empty square bracket `[]` blocks, followed by the data you want to input in the array. Sub-array of data should be separated by a single space. A 2D integer array would look like this:

```java
-I[][] '1 2 3' '4 5 6'
```

You can also enter integers without quotes like this:

```java
-I[][] 1,2,3 4,5,6
```

`Strings` and `Addresses` are not available as 2D arrays.