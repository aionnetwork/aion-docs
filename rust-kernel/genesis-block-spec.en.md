## Spec

### name

　　type: *String*  
　　Name of a chain.  
　　It will be showed in log when you start aion kernal.

### dataDir

　　type: *Option\<String\>*  
　　Name of dir to distinguish data from different chains.  
　　For example: data\_dir is mainnet which means db path of this chain
is \~/.aion/chains/mainnet/db...

### engine

　　type:Engine  
　　Engine is an enum with three
elements POWEquihashEngine(POWEquihashEngine), Null(NullEngine) and InstantSeal.  
　　Set kind of engine and its parameters.

#### POWEquihashEngine

#### params

##### rampupUpperBound

　　type: *Option\<Uint\>*  
　　Upper bound of block number for block reward floating.

##### rampupLowerBound

　　type: *Option\<Uint\>*  
　　Lower bound of block number for block reward floating.

##### rampupStartValue

　　type: *Option\<Uint\>*  
　　Block reward minimum.

##### rampupEndValue

　　type: *Option\<Uint\>*  
　　Block reward maximum.

##### lowerBlockReward

　　type: *Option\<Uint\>*  
　　Block reward for block which number is less than rampupLowerBound.

##### upperBlockReward

　　type: *Option\<Uint\>*  
　　Block reward for block which number is larger than rampupUpperBound.

##### difficultyBoundDivisor

　　type: *Option\<Uint\>*  
　　Participate in the calculation of the difficulty unit of change.

##### blockTimeLowerBound

　　type: *Option\<u64\>*  
　　Lower bound of blocks interval.

##### blockTimeUpperBound

　　type: *Option\<u64\>*  
　　Upper bound of blocks interval.

##### minimumDifficulty

　　type: *Option\<Uint\>*

#### NullEngine

　　Temporarily reserved

#### params

##### blockReward

　　type: *Option\<Uint\>*

#### InstantSeal

　　Temporarily reserved

### params

#### maximumExtraDataSize

　　type: *Uint*  
　　Maximum size of extra data.

#### minGasLimit

　　type: *Uint*  
　　Minimum gas limit.

#### gasLimitBoundDivisor

　　**non\_zero**  
　　type: *Uint*  
　　Gas limit bound divisor (how much gas limit can change per block)

#### registrar

　　type: *Option\<Address\>*  
　　Registrar contract address.

#### transactionPermissionContract

　　type: *Option\<Address\>*  
　　Transaction permission contract address.

### genesis

#### seal

　　type: *Seal*  
　　Seal is an enum with three
elements POWEquihash(POWEquihash), Ethereum(Ethereum) and Generic(Bytes).

##### POWEquihash

###### nonce

　　type: *H256*

###### solution

　　type: *Bytes*

##### Ethereum

###### nonce

　　type: *H64*

###### mixHash

　　type: *H256*

##### Generic

#### difficulty

　　type: *Uint*

#### author

　　type: *Option\<Address\>*  
　　defaults to 0

#### timestamp

　　type: *Option\<Uint\>*  
　　defaults to 0

#### parentHash

　　type: *Option\<H256\>*  
　　defaults to 0

#### gasLimit

　　type: *Uint*

#### transactionsRoot

　　type: *Option\<H256\>*

#### receiptsRoot

　　type: *Option\<H256\>*

#### stateRoot

　　type: *Option\<H256\>*

#### gasUsed

　　type: *Option\<Uint\>*

#### extraData

　　type: *Option\<Bytes\>*

### accounts

#### builtin

　　type: *Option\<Builtin\>*  
　　Builtin contract

##### name

　　type: *String*  
　　Builtin name.

##### activate\_at

　　type: *Option\<Uint\>*  
　　Activation block.

##### deactivate\_at

　　type: *Option\<Uint\>*  
　　Deactivation block.

##### owner\_address

　　type: *Option\<Address\>*  
　　Owner address.

##### address

　　type: *Option\<Address\>*  
　　contract address. if not specified, it's the same with builtin's key.

#### balance

　　type: *Option\<Uint\>*

#### nonce

　　type: *Option\<Uint\>*

#### code

　　type: *Option\<Bytes\>*

#### storage

　　type: *Option\<BTreeMap\<Uint, Uint\>\>*

#### storage\_dword

　　type: *Option\<BTreeMap\<Uint, Uint\>\>*

#### constructor

　　type: *Option\<Bytes\>*
