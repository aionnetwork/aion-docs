**Format:**

Most hex strings and hash strings start with "0x".

  - ADDRESS: A 32-byte hex string; start with "0xa0".

  - QUANTITY: A number. For Inputs, it can be an integer number, an
    integer string, or a hex string starting with "0x"that presents a
    number.

  - DATA: An encoded hex string that presents any information; starting
    with "0x" and having even length.

  - TAG: A string presents the dynamic blocks. It can be "earliest",
    "latest", or "pending".

  - TX: A transaction object contains:
    
      - from: ADDRESS (optional). The account address the transaction is
        sent from.
    
      - to: ADDRESS (optional). The account address the transaction is
        directed to; it is optional when deploy a contract.
    
      - gas: QUANTITY (optional). The maximum amount of the gas sender
        willing to be provided for the transaction execution. The
        regular transaction uses 21000 gas.
    
      - gasPrice: QUANTITY (optional). The amount of the gasPrice used
        for each paid gas. Minimum value accepted is 1e10 nAmp (1 AION =
        1e18 nAmp).
    
      - value: QUANTITY (optional) The value(in nAmp) sent with this
        transaction; optional when the transaction is to interact with
        contract.
    
      - data: DATA (optional) Hash of the method signature and encoded
        parameters; use to work with contracts. For details see Solidity
        Contract ABI.

**APIs**

**eth\_\* modules**

**eth\_accounts**

Gets all acounts.

  - Params:
    
      - none

  - Result:
    
      - Array (ADDRESS): All the accounts stored in current kernel.

**eth\_blockNumber**

Gets the highest block number.

  - Params
    
      - none

  - Result:
    
      - QUANTITY (Integer): The highest block number of the current
        kernel.

**eth\_call**

Executes a new message call immediately without creating a transaction
on the block chain.

  - Params:
    
      - TX: The transaction that calls contract function.
    
      - QUANTITY or String (optional): Block number or block tag.

  - Result::
    
      - DATA: The return value of executed contract.

  - Note: *eth\_call consumes zero gas, but gas field may be needed by
    some executions; the method can be failed when the provided gas
    limit is too low.*

**eth\_coinbase**

The client coinbase address; where mining rewards go.

  - Params:
    
      - none

  - Result:
    
      - ADDRESS: The current coinbase address.

**eth\_compileSolidity**

Gets the compiled hash and ABIs of the contracts.

  - Params:
    
      - String: The contract source code.

  - Result:
    
      - Objects:
        
          - ${contractName}:Object
            
              - code: DATA. Compiled the contract hash.
            
              - info:
                
                  - abiDefinition: For details
                    see [<span class="underline">Solidity Contract
                    ABI</span>](https://solidity.readthedocs.io/en/develop/abi-spec.html#json).
                
                  - compilerVersion: String.
                
                  - language: String.
                
                  - languageVersion: String.
                
                  - source: String. The contract source code.

**eth\_estimateGas**

Generates and returns an estimate of how much gas is necessary to allow
the transaction to complete.

  - Params:
    
      - TX: The transaction object.
    
      - QUANTITY / String(optional): Block number or block tag.

  - Result:
    
      - QUANTITY(number in HEX): Estimate gas usage.

  - Note: *The transaction will not be added to the blockchain. Notice
    that the estimate may be different from the amount of gas actually
    used by the transaction, for a variety of reasons including EVM
    mechanics and node performance.*

**eth\_gasPrice**

Returns the current price per gas.

  - Params:
    
      - none

  - Results:
    
      - QUANTITY(HEX string): The current default gas price.

**eth\_getBalance**

Returns the balance of the account of the given address.

  - Params:
    
      - ADDRESS: An account needs to check.
    
      - QUANTITY / String(optional): Block number or block tag.

  - Result:
    
      - QUANTITY: The balance at the given block.

**eth\_getBlockByHash**

Gets a block information by its block hash.

  - Params:
    
      - DATA(32-bytes): A block hash.
    
      - Boolean: whether returns the full transaction object in this
        block.

  - Result:
    
      - Object: A block object
        
          - difficulty: QUANTITY(number in HEX).
        
          - extraData: DATA.
        
          - gasLimit: QUANTITY.
        
          - gasUsed: QUANTITY.
        
          - hash: DATA(32-bytes). Block hash.
        
          - logsBloom: DATA(256-bytes).
        
          - miner: ADDRESS. The account of the miner mined this block
        
          - nonce: DATA(32-bytes). Hash of the generated proof-of-work.
        
          - number: QUANTITY(number). The block number.
        
          - parentHash: DATA(32-bytes). The parent block hash of this
            block.
        
          - receiptsRoot: DATA(32-bytes). The root of the transaction
            trie of the block.
        
          - size: QUANTITY. The size of the block.
        
          - solution: DATA.
        
          - stateRoot: DATA(32-bytes). The root of the final state trie
            of the block.
        
          - timestamp: QUANTITY(number).
        
          - totalDifficulty: QUANTITY.
        
          - transactions: Array(transaction object) or Array(transaction
            hash). The transactions are sealed in this block.
        
          - transactionsRoot: DATA(32-bytes). The root of the
            transaction trie of the block.

**eth\_getBlockByNumber**

Gets a block information by its block number.

  - Params:
    
      - QUANTITY / String(optional): Block number or block tag.
    
      - Boolean: whether returns the full transaction object in this
        block.

  - Result: Same as eth\_getBlockByHash.

**eth\_getBlockTransactionCountByHash**

Gets the transaction counts in the given hash block.

  - Params:
    
      - DATA(32-bytes): block hash.

  - Result:
    
      - QUANTITY: The number of transactions in the given block.

**eth\_getBlockTransactionCountByNumber**

Gets the transaction counts in the given number block.

  - Params:
    
      - QUANTITY / String(optional): Block number or block tag.

  - Result: Same as eth\_getBlockTransactionCountByHash.

**eth\_getCode**

Returns code at a given address.

  - Params:
    
      - ADDRESS
    
      - QUANTITY / String(optional): Block number or block tag.

  - Result:
    
      - DATA: The code deployed at the given address.

**eth\_getCompilers**

Return all the supported compilers.

  - Params:
    
      - none

  - Result:
    
      - Array(String): The list of compiler names; Rust Kernel currently
        only support solidity.

**eth\_getFilterChanges**

Polling method for a filter, which returns an array of logs which
occurred since last poll.

  - Params:
    
      - QUANTITY: filter ID.

  - Result:
    
      - Array:
        
          - Array(block hash): if the given filter is created by
            eth\_newBlockFilter. **Or**
        
          - Array(transaction hash): if the given filter is created by
            eth\_newPendingTransactionFilter. **Or**
        
          - Array(Log Object): if the given filter is created by
            eth\_newFilter.
            
              - address: ADDRESS. address from this log originated.
            
              - blockHash: DATA(32-bytes). Where the log is.
            
              - blockNumber(Integer): QUANTITY. Where the log is.
            
              - data: DATA. Arguments of the log.
            
              - logIndex: QUANTITY. the log position in this block.
            
              - topics: Array(DATA(32-bytes)).
            
              - transactionHash: DATA(32-bytes). The transaction creates
                the log.
            
              - transactionIndex: QUANTITY. The transaction position in
                the block.
            
              - transactionLogIndex: QUANTITY. The log position in the
                transaction.
            
              - type: String.
            
              - removed: BOOLEAN. when the log was removed, due to a
                chain reorganization. false if its a valid log.

**eth\_getFilterLogs**

Returns an array of all logs matching filter with given ID.

  - Params:
    
      - QUANTITY: filter ID.

  - Result:
    
      - [<span class="underline">Array(Log
        Object)</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#log-object)

**eth\_getLogs**

Returns an array of all logs matching the given criteria.

  - Params:
    
      - Object:
        
          - fromBlock: QUANTITY or TAG(optional). Block number or tag;
            default value is "latest".
        
          - toBlock: QUANTITY or TAG(optional). Block number or tag;
            default value is "latest".
        
          - addresss: ADDRESS (optiional). Deployed contract address.
        
          - topics: Array(DATA) (optional). The event signatures of the
            logs.
        
          - limit: QUANTITY (optional). Maximum number of entries to
            retrieve (latest first).

  - Result:
    
      - [<span class="underline">Array(Log
        Object)</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#log-object).

**eth\_getStorageAt**

Returns the value from a storage position at a given address.

  - Params:
    
      - ADDRESS: Address of the storage.
    
      - QUANTITY: The position in the storage address.
    
      - QUANTITY / String: Block number or block tag.

  - Result:
    
      - DATA: The value at this storage position.

**eth\_getTransactionByBlockHashAndIndex**

Get the transaction object by the given block hash and the transaction
index.

  - Params:
    
      - QUANTITY / String: Block number or block tag.
    
      - DATA: Transaction position in the block.

  - Result:
    
      - Transaction Object:
        
          - blockHash: DATA(32-bytes). Block hash.
        
          - blockNumber: QUANTITY(Integer). Block number.
        
          - contractAddress: ADDRESS / null. If this transaction deploys
            a contract, "contractAddress" is contract address;
            otherwise, "contractAddress" field is null.
        
          - from: ADDRESS. The sender's address.
        
          - gas: QUANTITY(number). The gas limit in this transaction.
        
          - gasPrice: QUANTITY(number in HEX). The gasPrice in this
            transaction.
        
          - hash: DATA(32-bytes). Transaction hash.
        
          - input: DATA. The data send along with the transaction.
        
          - nonce: QUANTITY(number). Nonce in this transaction.
        
          - value: QUANTITY(number in HEX) - The value transferred in
            nAmp.
        
          - timestamp: DATA(number).
        
          - to: ADDRESS. Receiver's address.
        
          - transactionIndex: QUANTITY(number). The position in block.

**eth\_getTransactionByBlockNumberAndIndex**

Get the transaction object by the given block number and the transaction
index.

  - Params:
    
      - DATA(32-byte): Block hash.
    
      - DATA: Transaction position in the block.

  - Result: Same
    as [<span class="underline">eth\_getTransactionByBlockHashAndIndex</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#eth_getTransactionByBlockHashAndIndex).

**eth\_getTransactionByHash**

Gets a transaction by its hash

  - Params:
    
      - DATA(32-byte): Transaction hash.

  - Result:
    
      - [<span class="underline">Transaction
        Object</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#tx-object)

**eth\_getTransactionCount**

Gets the transaction counts for the given account.

  - Params:
    
      - ADDRESS: The address need to check.
    
      - QUANTITY / String: Block number or block tag.

  - Result:
    
      - QUANTITY: The number of transactions send from this address.

**eth\_getTransactionReceipt**

Gets a transaction receipt by its hash.

  - Params:
    
      - DATA(32-bytes): transaction hash.

  - Result:
    
      - Receipt object:
        
          - blockHash: DATA(32-byte). Block hash.
        
          - blockNumber: QUANTITY. Block number.
        
          - contractAddress: ADDRESS | null. If this transaction deploys
            a contract, "contractAddress" is contract address;
            otherwise, "contractAddress" field is null.
        
          - cumulativeGasUsed: QUANTITY. The total amount of gas used
            when this transaction was executed in the block.
        
          - from: ADDRESS. The sender's address.
        
          - gasLimit: QUANTITY. gas in this transaction.
        
          - gasPrice: QUANTITY. gasPrice in this transaction.
        
          - gasUsed: QUANTITY. Actual gas usage for this transaction.
        
          - nrgLimit: Same as gasLimit.
        
          - nrgUsed: Same as nrgUsed
        
          - cumulativeNrgUsed: Same as cumulativeGasUsed.
        
          - logs: Array([<span class="underline">Log
            Object</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#log-object)).The
            logs are created by this transaction.
        
          - logsBloom: DATA(256-bytes).
        
          - root: DATA(32-byte). Post-transaction state root.
        
          - status: QUANTITY. Either 1 (success) or 0 (failure).
        
          - to: ADDRESS. Receiver's address.
        
          - transactionHash: DATA(32-byte). Transaction hash.
        
          - transactionIndex: QUANTITY(number). The position in block.

**eth\_hashrate**

Gets miner's hashrate.

  - Params:
    
      - none

  - Result:
    
      - String. Float number string.

**eth\_mining**

Return if any miner connect this kernel is mining.

  - Params:
    
      - none

  - Result:
    
      - Boolean: Whether the client/kernel is mining.

**eth\_newBlockFilter**

Create a block filter.

  - Params:
    
      - none

  - Result:
    
      - QUANTITY(number in HEX). New created filter ID.

**eth\_newFilter**

Create a log filter.

  - Params: Same
    as [<span class="underline">eth\_getLogs</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#eth_getlogs)

  - Result:
    
      - QUANTITY(number in HEX). New created filter ID.

**eth\_newPendingTransactionFilter**

Create a pending Transaction filter.

  - Params:
    
      - none

  - Result:
    
      - QUANTITY(number in HEX). New created filter ID.

**eth\_protocolVersion**

Return the current protocol version.

  - Params:
    
      - none

  - Result:
    
      - String. The version of protocol.

**eth\_sendRawTransaction**

Send a signed transaction.

  - Params:
    
      - DATA: Signed raw data.

  - Result:
    
      - DATA(32-byte). Transaction hash.

**eth\_sendTransaction**

Send a transaction.

  - Params:
    
      - TX

  - Result:
    
      - DATA(32-byte). Transaction hash.

**eth\_sign**

Sign any message.

  - Params:
    
      - ADDRESS: The signer's address.
    
      - DATA: The message to sign.

  - Result:
    
      - DATA. Signed data.

**eth\_signTransaction**

Sign a transaction.

  - Params:
    
      - TX: The object to sign.

  - Result:
    
      - Object:
        
          - raw: A signed transaction.
        
          - tx: A readable tx object.

**eth\_submitHashrate**

Used for submitting mining hashrate.

  - DATA: a hexadecimal string representation (32 bytes) of the hash
    rate.

  - String: ID. A random hexadecimal(32 bytes) ID identifying the
    client.

<!-- end list -->

  - Result:
    
      - BOOLEAN. Returns true if submitting went through succesfully and
        false otherwise.

**eth\_submitWork**

Used for submitting a proof-of-work solution.

  - Params:
    
      - DATA: 8 Bytes - The nonce found (64 bits).
    
      - DATA: 32 Bytes - The header's pow-hash (256 bits).
    
      - DATA: 32 Bytes - The mix digest (256 bits).

  - Result:
    
      - BOOLEAN. returns *true* if the provided solution is valid,
        otherwise *false*.

**eth\_syncing**

Return if client is syncing with other peers.

  - Params:
    
      - none

  - Result:
    
      - BOOLEAN Or Object: If the highest block number in the net is
        less than current client 's blockNumber + 4, return *false*;
        otherwise, return an object:
        
          - currentBlock: QUANTITY(number in HEX). The current block
            number at the current node.
        
          - highestBlock: QUANTITY(number in HEX). The highest block
            number in the current chain.
        
          - startingBlock: QUANTITY(number in HEX). The block number
            where the current node started to sync.

**eth\_uninstallFilter**

Uninstall filter

  - Params:
    
      - QUANTITY: Filter ID.

  - Result:
    
      - BOOLEAN. *True* if the filter was successfully uninstalled,
        otherwise *false*.

**personal\_\* module**

**personal\_isAccountUnlocked**

Gets whether the account is unlocked.

  - Params:
    
      - ADDRESS: The account need to check.

  - Result:
    
      - BOOLEAN: If the account is unlocked, return true; otherwise,
        return false.

**personal\_lockAccount**

Locks the given account.

  - Params:
    
      - ADDRESS: The account need to lock.
    
      - String: The password of the account.

  - Result:
    
      - BOOLEAN: If lock the account successful, return true; otherwise,
        return false.

**personal\_newAccount**

Creates a new account.

  - Params:
    
      - String: The password for this account.

  - Result:
    
      - ADDRESS: The new account address.

**personal\_sendTransaction**

Send a transaction.

  - Params:
    
      - TX: Transaction need to be sent.
    
      - String: Password to unlocked the sender's(from) account.

  - Result:
    
      - DATA(32-byte): Transaction hash.

**personal\_sign**

Sign any message.

  - Params:
    
      - ADDRESS: The signer's address.
    
      - DATA: The message to sign.
    
      - STRING: Password to unlock the sender's(from) account.

  - Result:
    
      - DATA: Signed data.

**personal\_signTransaction**

Sign the transaction.

  - Params: Same
    as [<span class="underline">personal\_sendTransaction</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#personal_sendtransaction).

  - Result:
    
      - Object： Same
        as [<span class="underline">eth\_signTransaction</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#eth_signTransaction)

**personal\_unlockAccount**

Unlocks the given account.

  - Params:
    
      - ADDRESS: The account need to unlock
    
      - String: Password to unlock the account.
    
      - Number: The number of second the account need to stay unlocked;
        null means unlock the account only for one. time use.

  - Result:
    
      - BOOLEAN: If unlock the account successful, return true;
        otherwise, return false.

**net\_\* module**

**net\_listening**

Returns true if client is actively listening for network connections.

  - Params:
    
      - none

  - Result:
    
      - BOOLEAN: True when listening, otherwise false.

**net\_peerCount**

Returns number of peers currently connected to the client.

  - Params:
    
      - none

  - Result:
    
      - QUANTITY: The number of connected peers.

**net\_version**

Returns the current network id.

  - Params:
    
      - none

  - Result:
    
      - String: Network version.

**Pub\_sub module**

Pub\_sub module is only accessible through Websocket or IPC connection.
This module allows users to subscribe curtain events and new blocks.
Kernel will publish the new block header or event logs based on the
subscription requirements.

**eth\_subscribe**

Register a subscription for block heads or event logs.

  - Params:
    
      - String: "newHeads" or "logs"
    
      - Object: Empty object for "newHeads",
        or [<span class="underline">a filter
        object</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#log-filter-object) for
        "logs".

  - Result:
    
      - DATA: Subscribe ID.

**eth\_unsubscribe**

Remove the subscription by its subscribe ID.

  - Params:
    
      - DATA： Subscribe ID.

  - Result:
    
      - Boolean: If the subscription is remove or not.

**Other module**

**rpc\_modules**

Gets the current client modules and their versions.

  - Params:
    
      - none

  - Result:
    
      - String: The current client modules and their versions.

**submitblock**

Used for submitting a proof-of-work solution.Same
as [<span class="underline">eth\_submitWork</span>](https://github.com/aionnetwork/aionr/wiki/JSON-RPC-APIs-Spec#eth_submitwork).

**web3\_clientVersion**

Get kernel version.

  - Params:
    
      - none

  - Result:
    
      - String: Kernel version.

**web3\_sha3**

Encode data using Keccak

  - Params:
    
      - DATA: The data to be encoded.

  - Result:
    
      - DATA: Encoded data.
