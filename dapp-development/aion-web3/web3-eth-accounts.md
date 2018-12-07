---
Title: web3-eth-accounts
---

The `web3.eth.accounts` contains functions to generate Aion accounts and sign transactions and data.

This package has NOT been audited and might potentially be unsafe. Take precautions to clear memory properly, store the private keys safely, and test transaction receiving and sending functionality properly before using in production!

To use this package standalone use:

```javascript
var Accounts = require('web3-eth-accounts');
var accounts = new Accounts();
```

## create

```javascript
web3.eth.accounts.create([entropy]);
```

Generates an account object with private key and public key.

<h3>Parameters</h3>

1. `entropy` - **String** (optional): A random string to increase entropy. If given it should be at least 32 characters. If none is given a random string will be generated using `randomhex <randomhex>`.

<h3>Returns</h3>

``Object`` - The account object with the following structure:

- `address` - **String**: The account address.
- `privateKey` - **String**: The accounts private key. This should never be shared or stored unencrypted in local storage! Also make sure to `null` the memory after usage.
- `signTransaction(tx [, callback])` - **Function**: The function to sign transactions. See `web3.eth.accounts.signTransaction()` for more information.
- `sign(data)` - **Function**: The function to sign transactions. See `web3.eth.accounts.sign()` for more information.

<h3>Examples</h3>

```javascript
web3.eth.accounts.create();
{
    address: "0xb8CE9ab6943e0eCED004cDe8e3bBed6568B2Fa01",
    privateKey: "0x348ce564d427a3311b6536bbcff9390d69395b06ed6c486954e971d960fe8709",
    signTransaction: function(tx){...},
    sign: function(data){...},
    encrypt: function(password){...}
}

web3.eth.accounts.create('2435@#@#@±±±±!!!!678543213456764321§34567543213456785432134567');
{
    address: "0xF2CD2AA0c7926743B1D4310b2BC984a0a453c3d4",
    privateKey: "0xd7325de5c2c1cf0009fac77d3d04a9c004b038883446b065871bc3e831dcd098",
    signTransaction: function(tx){...},
    sign: function(data){...},
    encrypt: function(password){...}
}

web3.eth.accounts.create(web3.utils.randomHex(32));
{
    address: "0xe78150FaCD36E8EB00291e251424a0515AA1FF05",
    privateKey: "0xcc505ee6067fba3f6fc2050643379e190e087aeffe5d958ab9f2f3ed3800fa4e",
    signTransaction: function(tx){...},
    sign: function(data){...},
    encrypt: function(password){...}
}
```

## privateKeyToAccount

```javascript
web3.eth.accounts.privateKeyToAccount(privateKey);
```

Creates an account object from a private key.

<h3>Parameters</h3>

1. `privateKey` - **String**: The private key to convert.

<h3>Returns</h3>

 - The account object with the following structure:

- `address` - **String**: The account address.
- `privateKey` - **String**: The accounts private key. This should never be shared or stored unencrypted in localstorage! Also make sure to ``null`` the memory after usage.
- `signTransaction(tx [, callback])` - **Function**: The function to sign transactions. See `web3.eth.accounts.signTransaction()` for more information.
- `sign(data)` - **Function**: The function to sign transactions. See `web3.eth.accounts.sign()` for more information.

-------

<h3>Examples</h3>

```javascript
web3.eth.accounts.privateKeyToAccount('0x348ce564d427a3311b6536bbcff9390d69395b06ed6c486954e971d960fe8709');
{
    address: '0xb8CE9ab6943e0eCED004cDe8e3bBed6568B2Fa01',
    privateKey: '0x348ce564d427a3311b6536bbcff9390d69395b06ed6c486954e971d960fe8709',
    signTransaction: function(tx){...},
    sign: function(data){...},
    encrypt: function(password){...}
}

web3.eth.accounts.privateKeyToAccount('0x348ce564d427a3311b6536bbcff9390d69395b06ed6c486954e971d960fe8709');
{
    address: '0xb8CE9ab6943e0eCED004cDe8e3bBed6568B2Fa01',
    privateKey: '0x348ce564d427a3311b6536bbcff9390d69395b06ed6c486954e971d960fe8709',
    signTransaction: function(tx){...},
    sign: function(data){...},
    encrypt: function(password){...}
}
```

## signTransaction

```javascript
web3.eth.accounts.signTransaction(tx, privateKey [, callback]);
```

Signs an Aion transaction with a given private key.

<h3>Parameters</h3>

1. `tx` - **Object**: The transaction object as follows:

    - `nonce` - **String**: (optional) The nonce to use when signing this transaction. Default will use `web3.eth.getTransactionCount()`.
    - `chainId` - **String**: (optional) The chain id to use when signing this transaction. Default will use `web3.eth.net.getId()`.
    - `to` - **String**: (optional) The recevier of the transaction, can be empty when deploying a contract.
    - `data` - **String**: (optional) The call data of the transaction, can be empty for simple value transfers.
    - `value` - **String**: (optional) The value of the transaction in NRG.
    - `gasPrice` - **String**: (optional) The gas price set by this transaction, if empty, it will use `web3.eth.gasPrice()`
    - `gas` - **String**: The gas provided by the transaction.

2. `privateKey` - **String**: The private key to sign with.
3. `callback` - **Function**: (optional) Optional callback, returns an error object as first parameter and the result as second.

<h3>Returns</h3>

`Promise` returning `Object`: The signed data RLP encoded transaction, or if `returnSignature` is `true` the signature values as follows:

- `messageHash` - **String**: The hash of the given message.
- `r` - **String**: First 32 bytes of the signature
- `s` - **String**: Next 32 bytes of the signature
- `v` - **String**: Recovery value + 27
- `rawTransaction` - **String**: The RLP encoded transaction, ready to be send using `web3.eth.sendSignedTransaction`.

<h3>Examples</h3>

```javascript
web3.eth.accounts.signTransaction({
    to: '0xF0109fC8DF283027b6285cc889F5aA624EaC1F55',
    value: '1000000000',
    gas: 2000000
}, '0x4c0883a69102937d6231471b5dbb6204fe5129617082792ae468d01a3f362318')
.then(console.log);
{
    messageHash: '0x88cfbd7e51c7a40540b233cf68b62ad1df3e92462f1c6018d6d67eae0f3b08f5',
    v: '0x25',
    r: '0xc9cf86333bcb065d140032ecaab5d9281bde80f21b9687b3e94161de42d51895',
    s: '0x727a108a0b8d101465414033c3f705a9c7b826e596766046ee1183dbc8aeaa68',
    rawTransaction: '0xf869808504e3b29200831e848094f0109fc8df283027b6285cc889f5aa624eac1f55843b9aca008025a0c9cf86333bcb065d140032ecaab5d9281bde80f21b9687b3e94161de42d51895a0727a108a0b8d101465414033c3f705a9c7b826e596766046ee1183dbc8aeaa68'
}

web3.eth.accounts.signTransaction({
    to: '0xF0109fC8DF283027b6285cc889F5aA624EaC1F55',
    value: '1000000000',
    gas: 2000000,
    gasPrice: '234567897654321',
    nonce: 0,
    chainId: 1
}, '0x4c0883a69102937d6231471b5dbb6204fe5129617082792ae468d01a3f362318')
.then(console.log);
{
    messageHash: '0x6893a6ee8df79b0f5d64a180cd1ef35d030f3e296a5361cf04d02ce720d32ec5',
    r: '0x9ebb6ca057a0535d6186462bc0b465b561c94a295bdb0621fc19208ab149a9c',
    s: '0x440ffd775ce91a833ab410777204d5341a6f9fa91216a6f3ee2c051fea6a0428',
    v: '0x25',
    rawTransaction: '0xf86a8086d55698372431831e848094f0109fc8df283027b6285cc889f5aa624eac1f55843b9aca008025a009ebb6ca057a0535d6186462bc0b465b561c94a295bdb0621fc19208ab149a9ca0440ffd775ce91a833ab410777204d5341a6f9fa91216a6f3ee2c051fea6a0428'
}
```

## recoverTransaction

Not currently supported

## hashMessageAion

```javascript
web3.eth.accounts.hashMessageAion(message);
```

Hashes the given message to be passed `web3.eth.accounts.recover()` function. The data will be UTF-8 HEX decoded and enveloped as follows: `"\x19Aion Signed Message:\n" + message.length + message` and hashed using _keccak256_.

<h3>Parameters</h3>

1. `message` - **String**: A message to hash, if its HEX it will be UTF8 decoded before.

<h3>Returns</h3>

**String**: The hashed message

<h3>Examples</h3>

```javascript
web3.eth.accounts.hashMessage("Hello World")
> "0x3b1797d9df54bbc4c13683164300c63d9b3b316e5e2ba8fc69328c89e5498c81"

// the below results in the same hash
web3.eth.accounts.hashMessage(web3.utils.utf8ToHex("Hello World"))
> "0x3b1797d9df54bbc4c13683164300c63d9b3b316e5e2ba8fc69328c89e5498c81"
```

## sign

```javascript
web3.eth.accounts.sign(data, privateKey);
```

Signs arbitrary data. This data is before UTF-8 HEX decoded and enveloped as follows: `"\x19Aion Signed Message:\n" + message.length + message`.

<h3>Parameters</h3>

1. `data` - **String** or **Buffer**: The data to sign. If its a string it will be UTF8 decoded beforehand
2. `privateKey` - **String**: The private key to sign with.

<h3>Returns</h3>

`Object`: The signed data RLP encoded signature as follows:

- `message` - **String**: The given message.
- `messageHash` - **String**: The hash of the given message.
- `signature` - **String**: The signature that signed the message.

<h3>Examples</h3>

```javascript
web3.eth.accounts.sign('Some data', '0x4c0883a69102937d6231471b5dbb6204fe5129617082792ae468d01a3f362318');
{ message: 'Some data',
  messageHash:
 '0x74157d54c1a80702b1fe96b4cfb190580e8ea466fc934b4ee008666addf30ee8',
  signature:
   '0xbcc7adafde278ba931ffe9fc220f49a042c6a80402d44bb04af4235c583b7e3531700a85b6118888aaf872049ea3b417ab4bd46934a026c6817b435d678bdb6faed61f4af81021074779e7ff46ba364fa43068ba16b70faebe825da4fa86650c' 
}

```

## recover

```javascript
web3.eth.accounts.recover(signatureObject);
web3.eth.accounts.recover(message, signature);
```

Recovers the Aion address which was used to sign the given data.

<h3>Parameters</h3>

1. `message|signatureObject` - `String|Object`: Either a string of the plaintext message, or an Object of the following form: 

    - `messageHash` - **String**: The hash of the given message already prefixed with `"\x19Aion Signed Message:\n" + message.length + message`.
    - `signature` - **String**: Signature of message

2. `signature` - **String**: Signature of message; this param is ignored if message param is Object


<h3>Returns</h3>

**String**: The Aion address used to sign this data.

<h3>Examples</h3>

```javascript
web3.eth.accounts.recover({
    messageHash: '0x74157d54c1a80702b1fe96b4cfb190580e8ea466fc934b4ee008666addf30ee8',
    signature: '0xbcc7adafde278ba931ffe9fc220f49a042c6a80402d44bb04af4235c583b7e3531700a85b6118888aaf872049ea3b417ab4bd46934a026c6817b435d678bdb6faed61f4af81021074779e7ff46ba364fa43068ba16b70faebe825da4fa86650c'
    });
> '0xa08413ec770b92f222e14c7c345379e589eac829a40d0fc9ea9186e485717ef1'

// message, signature
web3.eth.accounts.recover('Some data', '0xbcc7adafde278ba931ffe9fc220f49a042c6a80402d44bb04af4235c583b7e3531700a85b6118888aaf872049ea3b417ab4bd46934a026c6817b435d678bdb6faed61f4af81021074779e7ff46ba364fa43068ba16b70faebe825da4fa86650c');
'0xa08413ec770b92f222e14c7c345379e589eac829a40d0fc9ea9186e485717ef1');
> '0xa08413ec770b92f222e14c7c345379e589eac829a40d0fc9ea9186e485717ef1'
```

## encrypt

```javascript
web3.eth.accounts.encrypt(privateKey, password);
```

Encrypts a private key to the web3 keystore v3 standard.

<h3>Parameters</h3>

1. `privateKey` - **String**: The private key to encrypt.
2. `password` - **String**: The password used for encryption.

<h3>Returns</h3>

`Object`: The encrypted keystore v3 JSON.

<h3>Examples</h3>

```javascript
web3.eth.accounts.encrypt('0x4c0883a69102937d6231471b5dbb6204fe5129617082792ae468d01a3f362318', 'test!')
{
    version: 3,
    id: '04e9bcbb-96fa-497b-94d1-14df4cd20af6',
    address: '2c7536e3605d9c16a7a3d7b1898e529396a65c23',
    crypto: {
        ciphertext: 'a1c25da3ecde4e6a24f3697251dd15d6208520efc84ad97397e906e6df24d251',
        cipherparams: { iv: '2885df2b63f7ef247d753c82fa20038a' },
        cipher: 'aes-128-ctr',
        kdf: 'scrypt',
        kdfparams: {
            dklen: 32,
            salt: '4531b3c174cc3ff32a6a7a85d6761b410db674807b2d216d022318ceee50be10',
            n: 262144,
            r: 8,
            p: 1
        },
        mac: 'b8b010fff37f9ae5559a352a185e86f9b9c1d7f7a9f1bd4e82a5dd35468fc7f6'
    }
}
```

## decrypt

```javascript
web3.eth.accounts.decrypt(keystoreJsonV3, password);
```

Decrypts a keystore v3 JSON, and creates the account.

<h3>Parameters</h3>

1. `encryptedPrivateKey` - **String**: The encrypted private key to decrypt.
2. `password` - **String**: The password used for encryption.

<h3>Returns</h3>

`Object`: The decrypted account.

<h3>Examples</h3>

```javascript
web3.eth.accounts.decrypt({
    version: 3,
    id: '04e9bcbb-96fa-497b-94d1-14df4cd20af6',
    address: '2c7536e3605d9c16a7a3d7b1898e529396a65c23',
    crypto: {
        ciphertext: 'a1c25da3ecde4e6a24f3697251dd15d6208520efc84ad97397e906e6df24d251',
        cipherparams: { iv: '2885df2b63f7ef247d753c82fa20038a' },
        cipher: 'aes-128-ctr',
        kdf: 'scrypt',
        kdfparams: {
            dklen: 32,
            salt: '4531b3c174cc3ff32a6a7a85d6761b410db674807b2d216d022318ceee50be10',
            n: 262144,
            r: 8,
            p: 1
        },
        mac: 'b8b010fff37f9ae5559a352a185e86f9b9c1d7f7a9f1bd4e82a5dd35468fc7f6'
    }
}, 'test!');
{
    address: "0x2c7536E3605D9C16a7a3D7b1898e529396a65c23",
    privateKey: "0x4c0883a69102937d6231471b5dbb6204fe5129617082792ae468d01a3f362318",
    signTransaction: function(tx){...},
    sign: function(data){...},
    encrypt: function(password){...}
}
```

## wallet

```javascript
web3.eth.accounts.wallet;
```

Contains an in memory wallet with multiple accounts. These accounts can be used when using `web3.eth.sendTransaction()`.

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet;
> Wallet {
    0: {...}, // account by index
    "0xF0109fC8DF283027b6285cc889F5aA624EaC1F55": {...},  // same account by address
    "0xf0109fc8df283027b6285cc889f5aa624eac1f55": {...},  // same account by address lowercase
    1: {...},
    "0xD0122fC8DF283027b6285cc889F5aA624EaC1d23": {...},
    "0xd0122fc8df283027b6285cc889f5aa624eac1d23": {...},

    add: function(){},
    remove: function(){},
    save: function(){},
    load: function(){},
    clear: function(){},

    length: 2,
}
```

## wallet.create

```javascript
web3.eth.accounts.wallet.create(numberOfAccounts [, entropy]);
```

Generates one or more accounts in the wallet. If wallets already exist
they will not be overridden.

<h3>Parameters</h3>

1. `numberOfAccounts` - `Number`: Number of accounts to create. Leave empty to create an empty wallet.
2. `entropy` - **String** (optional): A string with random characters as
    additional entropy when generating accounts. If given it should be
    at least 32 characters.

<h3>Returns</h3>

`Object`: The wallet object.

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet.create(2, '54674321§3456764321§345674321§3453647544±±±§±±±!!!43534534534534');
> Wallet {
    0: {...},
    "0xF0109fC8DF283027b6285cc889F5aA624EaC1F55": {...},
    "0xf0109fc8df283027b6285cc889f5aa624eac1f55": {...},
    ...
}
```

## wallet.add

```javascript
web3.eth.accounts.wallet.add(account);
```

Adds an account using a private key or account object to the wallet.

<h3>Parameters</h3>

1. `account` - `String|Object`: A private key or account object created with `web3.eth.accounts.create()`.

<h3>Returns</h3>

`Object`: The added account.

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet.add('0x4c0883a69102937d6231471b5dbb6204fe5129617082792ae468d01a3f362318');
{
    index: 0,
    address: '0x2c7536E3605D9C16a7a3D7b1898e529396a65c23',
    privateKey: '0x4c0883a69102937d6231471b5dbb6204fe5129617082792ae468d01a3f362318',
    signTransaction: function(tx){...},
    sign: function(data){...},
    encrypt: function(password){...}
}

web3.eth.accounts.wallet.add({
    privateKey: '0x348ce564d427a3311b6536bbcff9390d69395b06ed6c486954e971d960fe8709',
    address: '0xb8CE9ab6943e0eCED004cDe8e3bBed6568B2Fa01'
});
{
    index: 0,
    address: '0xb8CE9ab6943e0eCED004cDe8e3bBed6568B2Fa01',
    privateKey: '0x348ce564d427a3311b6536bbcff9390d69395b06ed6c486954e971d960fe8709',
    signTransaction: function(tx){...},
    sign: function(data){...},
    encrypt: function(password){...}
}
```

## wallet.remove

```javascript
web3.eth.accounts.wallet.remove(account);
```

Removes an account from the wallet.

<h3>Parameters</h3>

1. `account` - `String|Number`: The account address, or index in the wallet.

<h3>Returns</h3>

`Boolean`: `true` if the wallet was removed. `false` if it couldn\'t be
found.

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet;
> Wallet {
    0: {...},
    "0xF0109fC8DF283027b6285cc889F5aA624EaC1F55": {...}
    1: {...},
    "0xb8CE9ab6943e0eCED004cDe8e3bBed6568B2Fa01": {...}
    ...
}

web3.eth.accounts.wallet.remove('0xF0109fC8DF283027b6285cc889F5aA624EaC1F55');
> true

web3.eth.accounts.wallet.remove(3);
> false
```

## wallet.clear

```javascript
web3.eth.accounts.wallet.clear();
```

Securely empties the wallet and removes all its accounts.

<h3>Parameters</h3>

none

<h3>Returns</h3>

`Object`: The wallet object.

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet.clear();
> Wallet {
    add: function(){},
    remove: function(){},
    save: function(){},
    load: function(){},
    clear: function(){},

    length: 0
}
```

## wallet.encrypt

```javascript
web3.eth.accounts.wallet.encrypt(password);
```

Encrypts all wallet accounts to and array of encrypted keystore v3
objects.

<h3>Parameters</h3>

1. `password` - **String**: The password which will be used for encryption.

<h3>Returns</h3>

`Array`: The encrypted keystore v3.

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet.encrypt('test');
> [ { version: 3,
    id: 'dcf8ab05-a314-4e37-b972-bf9b86f91372',
    address: '06f702337909c06c82b09b7a22f0a2f0855d1f68',
    crypto:
     { ciphertext: '0de804dc63940820f6b3334e5a4bfc8214e27fb30bb7e9b7b74b25cd7eb5c604',
       cipherparams: [Object],
       cipher: 'aes-128-ctr',
       kdf: 'scrypt',
       kdfparams: [Object],
       mac: 'b2aac1485bd6ee1928665642bf8eae9ddfbc039c3a673658933d320bac6952e3' } },
  { version: 3,
    id: '9e1c7d24-b919-4428-b10e-0f3ef79f7cf0',
    address: 'b5d89661b59a9af0b34f58d19138baa2de48baaf',
    crypto:
     { ciphertext: 'd705ebed2a136d9e4db7e5ae70ed1f69d6a57370d5fbe06281eb07615f404410',
       cipherparams: [Object],
       cipher: 'aes-128-ctr',
       kdf: 'scrypt',
       kdfparams: [Object],
       mac: 'af9eca5eb01b0f70e909f824f0e7cdb90c350a802f04a9f6afe056602b92272b' } }
]
```



wallet.decrypt
--------------

```javascript
web3.eth.accounts.wallet.decrypt(keystoreArray, password);
```

Decrypts keystore v3 objects.

<h3>Parameters</h3>

1. `keystoreArray` - `Array`: The encrypted keystore v3 objects to decrypt.
2. `password` - **String**: The password which will be used for encryption.

<h3>Returns</h3>

`Object`: The wallet object.

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet.decrypt([
  { version: 3,
  id: '83191a81-aaca-451f-b63d-0c5f3b849289',
  address: '06f702337909c06c82b09b7a22f0a2f0855d1f68',
  crypto:
   { ciphertext: '7d34deae112841fba86e3e6cf08f5398dda323a8e4d29332621534e2c4069e8d',
     cipherparams: { iv: '497f4d26997a84d570778eae874b2333' },
     cipher: 'aes-128-ctr',
     kdf: 'scrypt',
     kdfparams:
      { dklen: 32,
        salt: '208dd732a27aa4803bb760228dff18515d5313fd085bbce60594a3919ae2d88d',
        n: 262144,
        r: 8,
        p: 1 },
     mac: '0062a853de302513c57bfe3108ab493733034bf3cb313326f42cf26ea2619cf9' } },
   { version: 3,
  id: '7d6b91fa-3611-407b-b16b-396efb28f97e',
  address: 'b5d89661b59a9af0b34f58d19138baa2de48baaf',
  crypto:
   { ciphertext: 'cb9712d1982ff89f571fa5dbef447f14b7e5f142232bd2a913aac833730eeb43',
     cipherparams: { iv: '8cccb91cb84e435437f7282ec2ffd2db' },
     cipher: 'aes-128-ctr',
     kdf: 'scrypt',
     kdfparams:
      { dklen: 32,
        salt: '08ba6736363c5586434cd5b895e6fe41ea7db4785bd9b901dedce77a1514e8b8',
        n: 262144,
        r: 8,
        p: 1 },
     mac: 'd2eb068b37e2df55f56fa97a2bf4f55e072bef0dd703bfd917717d9dc54510f0' } }
], 'test');
> Wallet {
    0: {...},
    1: {...},
    "0xF0109fC8DF283027b6285cc889F5aA624EaC1F55": {...},
    "0xD0122fC8DF283027b6285cc889F5aA624EaC1d23": {...}
    ...
}
```

## wallet.save

```javascript
web3.eth.accounts.wallet.save(password [, keyName]);
```

Stores the wallet encrypted and as string in local storage. This function is _browser only_.

<h3>Parameters</h3>

1. `password` - **String**: The password to encrypt the wallet.
2. `keyName` - **String**: (optional) The key used for the local storage
    position, defaults to `"web3js_wallet"`.

<h3>Returns</h3>

`Boolean`

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet.save('test#!$');
> true
```

## wallet.load

```javascript
web3.eth.accounts.wallet.load(password [, keyName]);
```

Loads a wallet from local storage and decrypts it. This function is _browser only_.

<h3>Parameters</h3>

1. `password` - **String**: The password to decrypt the wallet.
2. `keyName` - **String**: (optional) The key used for the localstorage position, defaults to `"web3js_wallet"`.

<h3>Returns</h3>

`Object`: The wallet object.

<h3>Examples</h3>

```javascript
web3.eth.accounts.wallet.load('test#!$', 'myWalletKey');
> Wallet {
    0: {...},
    1: {...},
    "0xF0109fC8DF283027b6285cc889F5aA624EaC1F55": {...},
    "0xD0122fC8DF283027b6285cc889F5aA624EaC1d23": {...}
    ...
}
```