# web3-avm-abi

The `web3.avm.abi` functions let you decode and encode parameters to ABI (Application Binary Interface) for function calls to the Aion Virtual Machine (AVM).

## encode

```javascript
web3.avm.abi.encode(types, values);
```

Encodes a set of parameters' data types and their values to create an ABI signature.

<h3>Parameters</h3>

1. `types` - `Array<String>`: An array of strings which identify the data types used parameters. This array needs to be the same length as the `values` array as for every data type, there must be a matching value.
2. `values` - `Array<Mixed>`: An array of strings, numbers, or arrays which contains the values to be used as parameters. This array needs to be the same length as the `types` array as for every argument value, there must be a matching data type.

<h3>Returns</h3>

`String` - The ABI signature of the parameters' data types and values

<h3>Example</h3>

```javascript
web3.avm.abi.encode([ "string" ], [ "Hello World" ])
> 0x21000b48656c6c6f20576f726c64
```

## encodeMethod

```javascript
web3.avm.abi.encodeMethod(method, types, values);
```

Encodes the method's signature to its ABI signature with its name, arguments data types, and arguments values; based on abstraction from the aforementioned `web3.avm.encode` method.

<h3>Parameters</h3>

1. `method` - `String`: The method name to encode
2. `types` - `Array<String>`: An array of strings which identify the data types used by the method in its arguments. This array needs to be the same length as the `values` array as for every data type, there must be a matching value.
3. `values` - `Array<Mixed>`: An array of strings, numbers, or arrays which contains the values to be used by the method as arguments. This array needs to be the same length as the `types` array as for every argument value, there must be a matching data type.

<h3>Returns</h3>

`String` - The ABI signature of the method.

<h3>Example</h3>

```javascript
web3.avm.abi.encodeMethod("setString", [ "string" ], [ "Hello World" ]) 
> 0x210009736574537472696e6721000b48656c6c6f20576f726c64
```

## decode

```javascript
web3.avm.abi.decode(type, data);
```

Encodes a hex string based on the data type used for the hex string.

<h3>Parameters</h3>

1. `type` - `String`: A string which identifies the data-type to use decode `data` into
2. `data` - `Hexstring`: A hex string which is usually the ABI Signature of something encoded from the AVM

<h3>Returns</h3>

`Mixed` - The decoded result of the encoded data.

<h3>Example</h3>

```javascript
web3.avm.abi.decode("string", 0x21000b48656c6c6f20576f726c64)
> "Hello World"
```

## getCoder

```javascript
web3.avm.abi.getCoder(type);
```

Returns a data type coder which handles the encoding and decoding for data types and their values for the AVM.

<h3>Parameters</h3>

1. `type` - `String`: Used to define the type of data type coder to return

<h3>Returns</h3>

`Object` - An object `Coder` which is used to handle the encoding and decoding of data types and their values for the AVM

<h3>Example</h3>

```javascript
web3.avm.abi.getCoder('string')
> StringCoder { type: 'String', tag: 33, localName: null }
```

## getReader

```javascript
web3.avm.abi.getReader(data);
```

Returns a reader used to handle the decoding of data which was originally encoded for the AVM.

<h3>Parameters</h3>

1. `data` - `Uint8Array`: The data to be read and decoded

<h3>Returns</h3>

`Object` - An object `Reader` which is used for the decoding of data which was originally encoded for the AVM

<h3>Example</h3>

```javascript
web3.avm.abi.getReader(0x21000b48656c6c6f20576f726c64)
> Reader {
  _data: Uint8Array [ 33, 0, 11, 72, 101, 108, 108, 111, 32, 87, 111, 114, 108, 100 ],
  _offset: 0
}
```

## getWriter

```javascript
web3.avm.abi.getWriter();
```

Returns a writer used to handle the encoding of data for the AVM.

<h3>Returns</h3>

`Object` - An object `Writer` which is used for the encoding of data for the AVM

<h3>Example</h3>

```javascript
web3.avm.abi.getWriter()
> Writer { _data: Uint8Array [] }
```

## readyDeploy

```javascript
web3.avm.abi.readyDeploy(jarPath, encodedArgs);
```

Performs big-endian encoding on a compiled AVM Contract's jar and the encoded arguments for that contract's initializer. This combined result is then used to deploy through normal means of sending a transaction.

<h3>Parameters</h3>

1. `jarPath` - `Jar File`: A jar file of a compiled AVM Contract
2. `encodedArgs` - `Hexstring`: A hex string which is usually the ABI Signature of something encoded from the AVM

<h3>Returns</h3>

`Mixed` - The combined encoded data for the deployment of an AVM Contract.

<h3>Example</h3>

```javascript
web3.avm.abi.readyDeploy(path.join(__dirname, 'contracts', 'HelloAVM-1.0-SNAPSHOT.jar'), 0x210009736574537472696e6721000b48656c6c6f20576f726c64)
```