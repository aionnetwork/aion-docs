# Command Line

1. [Compile](#compile)
2. [Deploy](#deploy)
3. [Call](#call)
4. [Explore](#explore)

These are the features and commands you can run to interact with the AVM via a Unix terminal.

## Compile

The AVM doesn't have a `compile` command. This is because `javac` is already built into your Java installation. The easiest way to compile an application is to use the `compile.sh` [script](https://github.com/aionnetwork/AVM/blob/master/scripts/compile.sh) available in the [AVM repository](https://github.com/aionnetwork/AVM/).

To compile an application using the `compile.sh` script, run the following:

```bash
./compile.sh [MAIN_CLASS_FULL_NAME] [SOURCE_FILES]
```

For example:

```bash
./compile.sh HelloWorld HelloWorld.java

> usage: dirname path
> /usr/bin/javac
> Cleaning the build folder...
> Compiling the source code...
> Assembling the final jar...
> Success!
```

This will create a `dapp.jar` file in the `build` folder. You can change where the `.jar` is created by editing the `compile.sh` script.

## Deploy

To deploy a `.jar` file, run the following:

```bash
java -jar avm.jar deploy [PATH_TO_THE_JAR]
```

For example:

```bash
java -jar avm.jar deploy build/dapp.jar

> Running block with 1 transactions
> *******************************************************************************************
> Dapp deployment request
> Storage      : ./storage
> Dapp Jar     : build/dapp.jar
> Sender       : a025f4fd54064e869f158c1b4eb0ed34820f67e60ee80a53b469f725efc06378
> *******************************************************************************************
> Dapp deployment status
> Result status: SUCCESS
> Dapp Address : 0f3b39f4e8b4bd60d55d8e803547365d44d169770795ca9192eec3e20163e111
> Energy cost  : 2671773
```

## Call

To make a call to a deployed application, run the following:

```bash
java -jar avm.jar call [APPLICATION_ADDRESS] -m [METHOD_NAME] -a [ARGUMENTS]
```

For example:

```bash
java -jar avm.jar call 0f3b39f4e8b4bd60d55d8e803547365d44d169770795ca9192eec3e20163e111 -m sayHello

> Running block with 1 transactions
> *******************************************************************************************
> Dapp call request
> Storage      : ./storage
> Dapp Address : 0f3b39f4e8b4bd60d55d8e803547365d44d169770795ca9192eec3e20163e111
> Sender       : a025f4fd54064e869f158c1b4eb0ed34820f67e60ee80a53b469f725efc06378
> Method       : sayHello
> Arguments    : 
> Output from transaction 9914c4bc58153ea0d1581fa938bf09181374b849e6f8f714839643478824ef79
> Hello World!
> 
> *******************************************************************************************
> Dapp call result
> Result status: SUCCESS
> Return value : void
> Energy cost  : 63602
```

## Explore

The check the storage of a deployed application, run the following:

```bash
java -jar avm.jar explore [DEPLOYED_APPLICATION_ADDRESS]
```

For example: 

```bash
java -jar avm.jar explore 0f3b39f4e8b4bd60d55d8e803547365d44d169770795ca9192eec3e20163e111

> Running block with 1 transactions
> Class(HelloWorld): 
> 	const_0: ref(instance(String, 1))
> Class(AionBuffer): 
> 	avm_BYTE_MASK: int(255)
> 	avm_BYTE_SIZE: int(8)
> Class(AionList): 
> 	avm_DEFAULT_CAPACITY: int(5)
> Class(AionList$AionListIterator): 
> Class(AionMap): 
> 	avm_DEFAULT_ORDER: int(4)
> 	const_0: ref(instance(String, 2))
> Class(AionMap$AionAbstractCollection): 
> Class(AionMap$AionMapEntry): 
> Class(AionMap$AionMapEntryIterator): 
> Class(AionMap$AionMapEntrySet): 
> Class(AionMap$AionMapIterator): 
> Class(AionMap$AionMapKeyIterator): 
> Class(AionMap$AionMapKeySet): 
> Class(AionMap$AionMapValueIterator): 
> Class(AionMap$AionMapValues): 
> Class(AionMap$BInternalNode): 
> Class(AionMap$BLeafNode): 
> Class(AionMap$BNode): 
> Class(AionPlainMap): 
> 	avm_DEFAULT_CAPACITY: int(1)
> Class(AionPlainMap$AionMapEntry): 
> Class(AionPlainSet): 
> 	avm_kStartSize: int(1)
> Class(AionPlainSet$AionSetIterator): 
> Class(AionSet): 
> 	avm_PRESENT: ref(instance(Object, 3))
> 	const_0: ref(instance(String, 4))
> String(1): 
> 	hashCode: int(1), 
> 	string: "Hello World!"
> String(2): 
> 	hashCode: int(2), 
> 	string: "AionMap does not allow empty key."
> Object(3): 
> 	(opaque) refs: 0[]
> String(4): 
> 	hashCode: int(3), 
> 	string: "toArray"
```