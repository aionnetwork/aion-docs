# Contract Transaction

Call a transaction on a contract: `mvn aion4j:contract-txn`

Contract transactions are the same as [Calls](call), except transactions always initiate a state-change. This means that something within the contract, like a variable, changes. This _changes_ the _state_ of the blockchain, which incurs a cost.

Calls do not necessarily initiate a state-change. Calls are able to simply request the content or value of a variable.