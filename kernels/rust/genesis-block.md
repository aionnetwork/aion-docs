# Genesis Block

The specification for the genesis block on the Aion Rust kernel.

## Specification

### `name`

　　type: **String**  
　　Name of a chain.  
　　It will be showed in log when you start aion kernel.

### `dataDir`

　　type: **Option**/**String**
　　Name of dir to distinguish data from different chains.  
　　For example: data_dir is mainnet which means db path of this chain
is \~/.aion/chains/mainnet/db...

### `engine`

　　type: **Engine**
　　Engine is an enum with three
elements POWEquihashEngine(POWEquihashEngine), Null(NullEngine) and InstantSeal.  
　　Set kind of engine and its parameters.

#### `POWEquihashEngine`

#### `params`

##### `rampupUpperBound`

　　type: **Option**/**UInt**  
　　Upper bound of block number for block reward floating.

##### `rampupLowerBound`

　　type: **Option**/**UInt**  
　　Lower bound of block number for block reward floating.

##### `rampupStartValue`

　　type: **Option**/**UInt**  
　　Block reward minimum.

##### `rampupEndValue`

　　type: **Option**/**UInt**  
　　Block reward maximum.

##### `lowerBlockReward`

　　type: **Option**/**UInt**  
　　Block reward for block which number is less than rampupLowerBound.

##### `upperBlockReward`

　　type: **Option**/**UInt**  
　　Block reward for block which number is larger than rampupUpperBound.

##### `difficultyBoundDivisor`

　　type: **Option**/**UInt**  
　　Participate in the calculation of the difficulty unit of change.

##### `blockTimeLowerBound`

　　type: **Option**/**u64**
　　Lower bound of blocks interval.

##### `blockTimeUpperBound`

　　type: **Option**/**u64**
　　Upper bound of blocks interval.

##### `minimumDifficulty`

　　type: **Option**/**UInt**

#### `NullEngine`

　　Temporarily reserved

#### `params`

##### `blockReward`

　　type: **Option**/**UInt**

#### `InstantSeal`

　　Temporarily reserved

### `params`

#### `maximumExtraDataSize`

　　type: **Uint**  
　　Maximum size of extra data.

#### `minGasLimit`

　　type: **Unit**
　　Minimum gas limit.

#### `gasLimitBoundDivisor`

　　**non_zero**  
　　type: **Unit**
　　Gas limit bound divisor (how much gas limit can change per block)

#### `registrar`

　　type: **Option**/**Address**
　　Registrar contract address.

#### `transactionPermissionContract`

　　type: **Option**/**Address**
　　Transaction permission contract address.

### `genesis`

#### `seal`

　　type: **Seal**  
　　Seal is an enum with three elements `POWEquihash(POWEquihash)`, `Ethereum(Ethereum)` and `Generic(Bytes)`.

##### `POWEquihash`

###### `nonce`

　　type: **H256**

###### `solution`

　　type: *Bytes*

##### `Ethereum`

###### `nonce`

　　type: **H64**

###### `mixHash`

　　type: **H256**

##### `Generic`

#### `difficulty`

　　type: **Uint**

#### `author`

　　type: **Option**/**Address**
　　defaults to 0

#### `timestamp`

　　type: **Option**/**UInt**  
　　defaults to 0

#### `parentHash`

　　type: **Option**/**H256**  
　　type: **Option**/**H256**
　　defaults to 0

#### `gasLimit`

　　type: **Uint**

#### `transactionsRoot`

　　type: **Option**/**H256**

#### `receiptsRoot`

　　type: **Option**/**H256**

#### `stateRoot`

　　type: **Option**/**H256**

#### `gasUsed`

　　type: **Option**/**UInt**

#### `extraData`

　　type: **Option**/**Bytes**

### `accounts`

#### `builtin`

　　type: **Option**\**Builtin**  
　　Builtin contract

##### `name`

　　type: **String**  
　　Builtin name.

##### `activate_at`

　　type: **Option**/**UInt**  
　　Activation block.

##### `deactivate_at`

　　type: **Option**/**UInt**  
　　Deactivation block.

##### `owner_address`

　　type: **Option**/**Address**
　　Owner address.

##### `address`

　　type: **Option**/**Address**
　　contract address. if not specified, it's the same with builtin's key.

#### `balance`

　　type: **Option**/**UInt**

#### `nonce`

　　type: **Option**/**UInt**

#### `code`

　　type: **Option**/**Bytes**

#### `storage`

　　type: **Option**/**BTreeMap**/**UInt, Uint**

#### `storage_dword`

   type: **Option**/**BTreeMap**/**UInt, UInt**

#### `constructor`

　　type: **Option**/**Bytes**