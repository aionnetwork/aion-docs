# Variable Types

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