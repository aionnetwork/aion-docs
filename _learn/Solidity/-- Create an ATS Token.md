---
title: "🎓 Create an ATS Token"
excerpt: ""
---
[block:callout]
{
  "type": "info",
  "title": "Guide Level: Intermediate",
  "body": "**You are a developer who:** \n* knows/understands smart contracts in Solidity\n* is comfortable with deploying contracts onto Aion (if not, [start here](https://learn.aion.network/docs/titan-suite#section-deploy-a-contract))\n* wants to build meaningful applications with its own native currency\n* likes to have fun"
}
[/block]

[block:api-header]
{
  "title": "Overview"
}
[/block]
Let's learn how to create our own Token on the Aion blockchain! Why would anyone want to do this? Well, you can learn how to create a token for fun, to learn, for a possible ICO, or to drive your animal-frenzied card collectibles DApp. :crocodile: :cow2: :camel:

Below is some information you'll need to understand what an ATS is and how it operates. Or jump down and [dive right in!](#section-make-your-own-ats)
[block:api-header]
{
  "title": "What IS an ATS?"
}
[/block]
ATS is an abbreviation for "Aion Token Standard" - and that standard is the protocol that allows tokens to be used natively on the Aion blockchain and along with other connected blockchain networks - given that it's setup to do so.

The purpose of its creation is to allow developers to create a fungible token that intersects functionality requirements of current DApp developers and the innovation to allow cross-chain token movements.

Similarly to how `ERC-20` is to Ethereum, ATS is a super-set and improved token for Aion. It derives from the `ERC-777` implementation standard.

It's good to note that the standard itself is still a _work in progress_, but most functionalities are available today. Find more information on Aion Network <a href="https://github.com/aionnetwork/AIP/issues/4"  target="_blank">GitHub.</a>

[block:api-header]
{
  "title": "Difference between ATS and ERC-20"
}
[/block]
To grasp a better understanding of the ATS, let's dig into the pain points with the ERC-20.

**Below are some inherent setbacks of the ERC-20 protocol: **

1. What happens when you send an ERC-20 to an account with no withdrawal method or contracts that do not validate or support them at all? Well, these tokens get stuck or lost permanently and it happens every day. 
 
 ERC-20 has no validation protocol in place - meaning there is no confirmation that the destination where the token is sent to, is compatible with the token or not. In most of these scenarios, these assets cannot be retrieved back, and are lost forever. 

2. In order to send tokens to a smart contract, it requires 2 transactions. What is the downfall of this? Well, we know that more transactions mean higher gas requirements, and higher gas requirements mean higher cost - all this to simply just transfer tokens? 

 In more technical details, the transaction is a result from calling upon these two functions:
 * `function approve(address _spender, uint _value) returns (bool success);`
 * `function transferFrom(address _from, address _to, uint _value) returns (bool success);`

**ATS Functionality:**

1. Validation checks stop tokens attempting to transfer to a smart contract that does not have a withdraw feature (or compatibility with token).

* Reduces transactions from 2 to 1 to a smart contract transfer by using the `send()` function

* Send/Receive **hooks ** allow more control to token holders and their tokens. They can also hook a contract to execute.

* Approval of **operators** (which can either be a smart contract or address) to authorize use of funds by transferring or burning on behalf of the token holder. (e.g. automatic payments) 

* Support cross chain token movement between different blockchain networks and respective bridges (this is a *future implementation*).

[block:api-header]
{
  "title": "So how does it work?"
}
[/block]
This diagram provides a high-level overview of the proposed contract architecture related to fungible tokens to enable cross-chain movements and communicate with bridges.

Note: The scope of this AIP (*<a href="https://github.com/aionnetwork/AIP/" target ="_blank">Aion Improvement Proposal</a>*) is limited to the ATS contract highlighted. In the diagram below the Aion blockchain is the Home chain.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/c80fb57-HLA.png",
        "HLA.png",
        815,
        409,
        "#f7f7f6"
      ]
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "1. Make your own ATS!"
}
[/block]
## 1.1 ATS Template
Below is an template of the implementation of the ATS contract. We'll be modifying this contract so that you can deploy your own Token onto the network! Go ahead and just copy the code, and jump down to the [Let's Get Started section](#section-2-lets-get-started). See ya down there :sunglasses:
[block:code]
{
  "codes": [
    {
      "code": "pragma solidity 0.4.15;\n\n/**\n * @title SafeMath\n * @dev Math operations with safety checks that throw on error\n * @notice This is a softer (in terms of throws) variant of SafeMath:\n *         https://github.com/OpenZeppelin/openzeppelin-solidity/pull/1121\n */\nlibrary SafeMath {\n\n    /**\n    * @dev Multiplies two numbers, throws on overflow.\n    */\n    function mul(uint128 _a, uint128 _b) internal constant returns (uint128 c) {\n        // Gas optimization: this is cheaper than asserting 'a' not being zero, but the\n        // benefit is lost if 'b' is also tested.\n        // See: https://github.com/OpenZeppelin/openzeppelin-solidity/pull/522\n        if (_a == 0) {\n            return 0;\n        }\n        c = _a * _b;\n        require(c / _a == _b);\n        return c;\n    }\n\n    /**\n    * @dev Integer division of two numbers, truncating the quotient.\n    */\n    function div(uint128 _a, uint128 _b) internal constant returns (uint128) {\n        // Solidity automatically throws when dividing by 0\n        // therefore require beforehand avoid throw\n        require(_b > 0);\n        // uint128 c = _a / _b;\n        // assert(_a == _b * c + _a % _b); // There is no case in which this doesn't hold\n        return _a / _b;\n    }\n\n    /**\n    * @dev Subtracts two numbers, throws on overflow (i.e. if subtrahend is greater than minuend).\n    */\n    function sub(uint128 _a, uint128 _b) internal constant returns (uint128) {\n        require(_b <= _a);\n        return _a - _b;\n    }\n\n    /**\n    * @dev Adds two numbers, throws on overflow.\n    */\n    function add(uint128 _a, uint128 _b) internal constant returns (uint128 c) {\n        c = _a + _b;\n        require(c >= _a);\n        return c;\n    }\n}\n\ninterface ATS {\n    \n    /// Returns the name of the token\n    function name() public constant returns (string);\n\n    /// Returns the symbol of the token\n    function symbol() public constant returns (string);\n    \n    /// Returns the totalSupply of the token, assuming a fixed number of\n    /// token circulation, this number should not change.\n    function totalSupply() public constant returns (uint128);\n\n    /// Returns the currently liquid supply of the token, assuming a fixed\n    /// number of (total) tokens are available, this number should never\n    /// exceed the totalSupply() of the token.\n    function liquidSupply() public constant returns (uint128);\n\n    function balanceOf(address owner) public constant returns (uint128);\n\n    function granularity() public constant returns (uint128);\n\n    /// Default Operators removed, rationale behind this is that default operators\n    /// Rationale behind this is that all operators should be (opt-in), this includes\n    // function defaultOperators() public constant returns (address[]);\n    \n    function isOperatorFor(address operator, address tokenHolder) public constant returns (bool);\n    function authorizeOperator(address operator) public;\n    function revokeOperator(address operator) public;\n\n    function send(address to, uint128 amount, bytes holderData) public;\n    function operatorSend(address from, address to, uint128 amount, bytes holderData, bytes operatorData) public;\n\n    /// Some functionality should still include a burn (for example slashing ERC20 tokens from a validator)\n    function burn(uint128 amount, bytes holderData) public;\n    function operatorBurn(address from, uint128 amount, bytes holderData, bytes operatorData) public;\n\n    /// @notice Interface for a bridge/relay to execute a `send`\n    /// @dev this name was suggested by Michael Kitchen, who suggested\n    /// it makes sense to thaw an token from solid to liquid\n    ///\n    /// @dev function is called by foreign entity to `thaw` tokens\n    /// to a particular user.\n    function thaw(address localRecipient, uint128 amount, bytes32 bridgeId, bytes bridgeData, bytes32 remoteSender, bytes32 remoteBridgeId, bytes remoteData) public;    \n    \n    /// @notice Interface for a user to execute a `freeze`, which essentially\n    /// is a functionality that locks the token (into the special address)\n    /// \n    /// @dev function is called by local user to `freeze` tokens thereby\n    /// transferring them to another network.\n    function freeze(bytes32 remoteRecipient, uint128 amount, bytes32 bridgeId, bytes localData) public;\n    function operatorFreeze(address localSender, bytes32 remoteRecipient, uint128 amount, bytes32 bridgeId, bytes localData) public;\n\n    /// Event to be emit at the time of contract creation. Rationale behind the event is a few things:\n    ///\n    /// * It allows one to filter for new ATS tokens being created, in the interest of clarity\n    ///   this is a big help. We can simply filter for this event.\n    ///\n    /// * It indicates the `totalSupply` of the network. `totalSupply` is very important in\n    ///   our standard, therefore it makes sense to include it as an emission.\n    event Created(\n        uint128 indexed     _totalSupply,\n        /// This is a horrible name I know, up for debate\n        address indexed     _creator);\n\n    event Sent(\n        address indexed     _operator,\n        address indexed     _from,\n        address indexed     _to,\n        uint128             _amount,\n        bytes               _holderData,\n        bytes               _operatorData);\n\n    event Thawed(\n        address indexed localRecipient,\n        uint128 amount,\n        bytes32 indexed bridgeId,\n        bytes bridgeData,\n        bytes32 indexed remoteSender,\n        bytes32 remoteBridgeId,\n        bytes remoteData);\n\n    event Froze(\n        address indexed localSender,\n        bytes32 indexed remoteRecipient,\n        uint128 amount,\n        bytes32 indexed bridgeId,\n        bytes localData);\n\n    event Minted(\n        address indexed     _operator,\n        address indexed     _to,\n        uint128             _amount,\n        bytes               _operatorData);\n\n    event Burned(\n        address indexed     _operator,\n        address indexed     _from,\n        uint128             _amount,\n        bytes               _holderData,\n        bytes               _operatorData);\n\n    event AuthorizedOperator(\n        address indexed     _Eoperator,\n        address indexed     _tokenHolder);\n\n\n    event RevokedOperator(\n        address indexed     _operator,\n        address indexed     _tokenHolder);\n}\n\n/**\n * @title ERC20 interface\n * @dev see https://github.com/aionnetwork/AIP/issues/4\n *\n * @notice ATS contracts by default are required to implement ERC20 interface\n */\ncontract ERC20 {\n    function totalSupply() public constant returns (uint128);\n\n    function balanceOf(address _who) public constant returns (uint128);\n\n    function allowance(address _owner, address _spender) public constant returns (uint128);\n\n    function transfer(address _to, uint128 _value) public returns (bool);\n\n    function approve(address _spender, uint128 _value) public returns (bool);\n\n    function transferFrom(address _from, address _to, uint128 _value) public returns (bool);\n\n    event Transfer(\n        address indexed from,\n        address indexed to,\n        uint128 value\n    );\n\n    event Approval(\n        address indexed owner,\n        address indexed spender,\n        uint128 value\n    );\n}\n\n\ncontract AionInterfaceRegistry {\n    function getManager(address target) public constant returns(address);\n    function setManager(address target, address manager) public;\n    function getInterfaceDelegate(address target, bytes32 interfaceHash) public constant returns (address);\n    function setInterfaceDelegate(address target, bytes32 interfaceHash, address delegate) public;\n}\n\ncontract AionInterfaceImplementer {\n    // TODO: this needs to be deployed, this is just a placeholder address\n    AionInterfaceRegistry air = AionInterfaceRegistry(0xa0d270e7759e8fc020df5f1352bf4d329342c1bcdfe9297ef594fa352c7cab26);\n\n    function setInterfaceDelegate(string _interfaceLabel, address impl) internal {\n        bytes32 interfaceHash = sha3(_interfaceLabel);\n        air.setInterfaceDelegate(this, interfaceHash, impl);\n    }\n\n    function getInterfaceDelegate(address addr, string _interfaceLabel) internal constant returns(address) {\n        bytes32 interfaceHash = sha3(_interfaceLabel);\n        return air.getInterfaceDelegate(addr, interfaceHash);\n    }\n\n    function setDelegateManager(address _newManager) internal {\n        air.setManager(this, _newManager);\n    }\n}\n\ninterface ATSTokenRecipient {\n    function tokensReceived(\n        address operator,\n        address from,\n        address to,\n        uint128 amount,\n        bytes userData,\n        bytes operatorData\n    ) public;\n}\n\ninterface ATSTokenSender {\n    function tokensToSend(\n        address operator,\n        address from,\n        address to,\n        uint128 amount,\n        bytes userData,\n        bytes operatorData\n    ) public;\n}\n\n/**\n * @title ATSImpl\n * @dev see https://github.com/qoire/ATS/blob/master/contracts/ATSImpl.sol\n *\n */\n\ncontract ATSImpl is ATS, ERC20, AionInterfaceImplementer {\n    using SafeMath for uint128;\n\n    /* -- Constants -- */\n\n    address constant internal addressTypeMask = 0xFF00000000000000000000000000000000000000000000000000000000000000;\n    address constant internal zeroAddress = 0x0000000000000000000000000000000000000000000000000000000000000000;\n\n    /* -- ATS Contract State -- */\n\n    string internal mName;\n    string internal mSymbol;\n    uint128 internal mGranularity;\n    uint128 internal mTotalSupply;\n\n    mapping(address => uint128) internal mBalances;\n    mapping(address => mapping(address => bool)) internal mAuthorized;\n\n    // for ERC20\n    mapping(address => mapping(address => uint128)) internal mAllowed;\n\n\n    /* -- Constructor -- */\n    //\n    /// @notice Constructor to create a ReferenceToken\n    \n    function ATSImpl() {\n        \n        mName = YOUR_TOKEN_NAME;\n        mSymbol = YOUR_TOKEN_SYMBOL;\n        mTotalSupply = YOUR_TOKEN_TOTAL_SUPPLY *10**18;\n        mGranularity = YOUR_TOKEN_TOTAL_GRANULARITY;\n\t\trequire(mGranularity >= 1);\n        initialize(mTotalSupply);\n\n        // register onto CIR\n        setInterfaceDelegate(\"AIP004Token\", this);\n    }\n\n    function initialize(uint128 _totalSupply) internal {\n        mBalances[msg.sender] = _totalSupply;\n        Created(_totalSupply, msg.sender);\n    }\n\n    /* -- ERC777 Interface Implementation -- */\n    //\n    /// @return the name of the token\n    function name() public constant returns (string) { return mName; }\n\n    /// @return the symbol of the token\n    function symbol() public constant returns (string) { return mSymbol; }\n\n    /// @return the granularity of the token\n    function granularity() public constant returns (uint128) { return mGranularity; }\n\n    /// @return the total supply of the token\n    function totalSupply() public constant returns (uint128) { return mTotalSupply; }\n\n    /// @notice Return the account balance of some account\n    /// @param _tokenHolder Address for which the balance is returned\n    /// @return the balance of `_tokenAddress`.\n    function balanceOf(address _tokenHolder) public constant returns (uint128) { return mBalances[_tokenHolder]; }\n\n    /// @notice Send `_amount` of tokens to address `_to` passing `_userData` to the recipient\n    /// @param _to The address of the recipient\n    /// @param _amount The number of tokens to be sent\n    function send(address _to, uint128 _amount, bytes _userData) public {\n        doSend(msg.sender, msg.sender, _to, _amount, _userData, \"\", true);\n\n    }\n\n    /// @notice Authorize a third party `_operator` to manage (send) `msg.sender`'s tokens.\n    /// @param _operator The operator that wants to be Authorized\n    function authorizeOperator(address _operator) public {\n        require(_operator != msg.sender);\n        mAuthorized[_operator][msg.sender] = true;\n        AuthorizedOperator(_operator, msg.sender);\n    }\n\n    /// @notice Revoke a third party `_operator`'s rights to manage (send) `msg.sender`'s tokens.\n    /// @param _operator The operator that wants to be Revoked\n    function revokeOperator(address _operator) public {\n        require(_operator != msg.sender);\n        mAuthorized[_operator][msg.sender] = false;\n        RevokedOperator(_operator, msg.sender);\n    }\n\n    /// @notice Check whether the `_operator` address is allowed to manage the tokens held by `_tokenHolder` address.\n    /// @param _operator address to check if it has the right to manage the tokens\n    /// @param _tokenHolder address which holds the tokens to be managed\n    /// @return `true` if `_operator` is authorized for `_tokenHolder`\n    function isOperatorFor(address _operator, address _tokenHolder) public constant returns (bool) {\n        return (_operator == _tokenHolder || mAuthorized[_operator][_tokenHolder]);\n    }\n\n    /// @notice Send `_amount` of tokens on behalf of the address `from` to the address `to`.\n    /// @param _from The address holding the tokens being sent\n    /// @param _to The address of the recipient\n    /// @param _amount The number of tokens to be sent\n    /// @param _userData Data generated by the user to be sent to the recipient\n    /// @param _operatorData Data generated by the operator to be sent to the recipient\n    function operatorSend(address _from, address _to, uint128 _amount, bytes _userData, bytes _operatorData) public {\n        require(isOperatorFor(msg.sender, _from));\n        doSend(msg.sender, _from, _to, _amount, _userData, _operatorData, true);\n    }\n\n    function burn(uint128 _amount, bytes _holderData) public {\n        doBurn(msg.sender, msg.sender, _amount, _holderData, \"\");\n    }\n\n    function operatorBurn(address _tokenHolder, uint128 _amount, bytes _holderData, bytes _operatorData) public {\n        require(isOperatorFor(msg.sender, _tokenHolder));\n        doBurn(msg.sender, _tokenHolder, _amount, _holderData, _operatorData);\n    }\n\n    /* -- Helper Functions -- */\n\n    /// @notice Internal function that ensures `_amount` is multiple of the granularity\n    /// @param _amount The quantity that want's to be checked\n    function requireMultiple(uint128 _amount) internal constant {\n        require(_amount.div(mGranularity).mul(mGranularity) == _amount);\n    }\n\n    /// @notice Check whether an address is a regular address or not.\n    /// @param _addr Address of the contract that has to be checked\n    /// @return `true` if `_addr` is a regular address (not a contract)\n    ///\n    /// Ideally, we should propose a better system that extcodesize\n    ///\n    /// *** TODO: CHANGE ME, going to require a resolution on best approach ***\n    ///\n    /// Given that we won't be able to detect code size.\n    ///\n    /// @param _addr The address to be checked\n    /// @return `true` if the contract is a regular address, `false` otherwise\n    function isRegularAddress(address _addr) internal constant returns (bool) {\n        // if (_addr == 0) { return false; }\n        // uint size;\n        // assembly { size := extcodesize(_addr) }\n        // return size == 0;\n        return true;\n    }\n\n    /// @notice Helper function actually performing the sending of tokens.\n    /// @param _operator The address performing the send\n    /// @param _from The address holding the tokens being sent\n    /// @param _to The address of the recipient\n    /// @param _amount The number of tokens to be sent\n    /// @param _userData Data generated by the user to be passed to the recipient\n    /// @param _operatorData Data generated by the operator to be passed to the recipient\n    /// @param _preventLocking `true` if you want this function to throw when tokens are sent to a contract not\n    ///  implementing `erc777_tokenHolder`.\n    ///  ERC777 native Send functions MUST set this parameter to `true`, and backwards compatible ERC20 transfer\n    ///  functions SHOULD set this parameter to `false`.\n    function doSend(\n        address _operator,\n        address _from,\n        address _to,\n        uint128 _amount,\n        bytes _userData,\n        bytes _operatorData,\n        bool _preventLocking\n    )\n        internal\n    {\n        requireMultiple(_amount);\n\n        callSender(_operator, _from, _to, _amount, _userData, _operatorData);\n\n        require(_to != address(0));             // forbid sending to 0x0 (=burning)\n        require(_to != address(this));          // forbid sending to the contract itself\n        require(mBalances[_from] >= _amount);   // ensure enough funds\n\n        mBalances[_from] = mBalances[_from].sub(_amount);\n        mBalances[_to] = mBalances[_to].add(_amount);\n\n        callRecipient(_operator, _from, _to, _amount, _userData, _operatorData, _preventLocking);\n\n        Sent(_operator, _from, _to, _amount, _userData, _operatorData);\n    }\n\n    /// @notice Helper function actually performing the burning of tokens.\n    /// @param _operator The address performing the burn\n    /// @param _tokenHolder The address holding the tokens being burn\n    /// @param _amount The number of tokens to be burnt\n    /// @param _holderData Data generated by the token holder\n    /// @param _operatorData Data generated by the operator\n    function doBurn(address _operator, address _tokenHolder, uint128 _amount, bytes _holderData, bytes _operatorData)\n        internal\n    {\n        requireMultiple(_amount);\n        require(balanceOf(_tokenHolder) >= _amount);\n\n        mBalances[_tokenHolder] = mBalances[_tokenHolder].sub(_amount);\n        mTotalSupply = mTotalSupply.sub(_amount);\n\n        callSender(_operator, _tokenHolder, 0x0, _amount, _holderData, _operatorData);\n        Burned(_operator, _tokenHolder, _amount, _holderData, _operatorData);\n    }\n\n    /// @notice Helper function that checks for ERC777TokensRecipient on the recipient and calls it.\n    ///  May throw according to `_preventLocking`\n    /// @param _operator The address performing the send or mint\n    /// @param _from The address holding the tokens being sent\n    /// @param _to The address of the recipient\n    /// @param _amount The number of tokens to be sent\n    /// @param _userData Data generated by the user to be passed to the recipient\n    /// @param _operatorData Data generated by the operator to be passed to the recipient\n    /// @param _preventLocking `true` if you want this function to throw when tokens are sent to a contract not\n    ///  implementing `ERC777TokensRecipient`.\n    ///  ERC777 native Send functions MUST set this parameter to `true`, and backwards compatible ERC20 transfer\n    ///  functions SHOULD set this parameter to `false`.\n    function callRecipient(\n        address _operator,\n        address _from,\n        address _to,\n        uint128 _amount,\n        bytes _userData,\n        bytes _operatorData,\n        bool _preventLocking\n    )\n        internal\n    {\n        address recipientImplementation = getInterfaceDelegate(_to, \"AIP004TokenRecipient\");\n        if (recipientImplementation != 0) {\n            ATSTokenRecipient(recipientImplementation).tokensReceived(\n                _operator, _from, _to, _amount, _userData, _operatorData);\n        } else if (_preventLocking) {\n            require(isRegularAddress(_to));\n        }\n    }\n\n    /// @notice Helper function that checks for ERC777TokensSender on the sender and calls it.\n    ///  May throw according to `_preventLocking`\n    /// @param _from The address holding the tokens being sent\n    /// @param _to The address of the recipient\n    /// @param _amount The amount of tokens to be sent\n    /// @param _userData Data generated by the user to be passed to the recipient\n    /// @param _operatorData Data generated by the operator to be passed to the recipient\n    ///  implementing `ERC777TokensSender`.\n    ///  ERC777 native Send functions MUST set this parameter to `true`, and backwards compatible ERC20 transfer\n    ///  functions SHOULD set this parameter to `false`.\n    function callSender(\n        address _operator,\n        address _from,\n        address _to,\n        uint128 _amount,\n        bytes _userData,\n        bytes _operatorData\n    )\n        internal\n    {\n        address senderImplementation = getInterfaceDelegate(_from, \"AIP004TokenSender\");\n        if (senderImplementation == 0) { return; }\n        ATSTokenSender(senderImplementation).tokensToSend(_operator, _from, _to, _amount, _userData, _operatorData);\n    }\n\n    function liquidSupply() public constant returns (uint128) {\n        return mTotalSupply.sub(balanceOf(this));\n    }\n\n\n    /* -- Cross Chain Functionality -- */\n\n    function thaw(\n        address localRecipient,\n        uint128 amount,\n        bytes32 bridgeId,\n        bytes bridgeData,\n        bytes32 remoteSender,\n        bytes32 remoteBridgeId,\n        bytes remoteData)\n    public {\n\n    }\n\n    function freeze(\n        bytes32 remoteRecipient,\n        uint128 amount,\n        bytes32 bridgeId,\n        bytes localData)\n    public {\n\n    }\n\n    function operatorFreeze(address localSender,\n        bytes32 remoteRecipient,\n        uint128 amount,\n        bytes32 bridgeId,\n        bytes localData)\n    public {\n\n    }\n\n    /* -- ERC20 Functionality -- */\n    \n    function decimals() public constant returns (uint8) {\n        return uint8(18);\n    }\n\n    /// @param _to The address of the recipient\n    /// @param _amount The number of tokens to be transferred\n    /// @return `true`, if the transfer can't be done, it should fail.\n    function transfer(address _to, uint128 _amount) public returns (bool success) {\n        doSend(msg.sender, msg.sender, _to, _amount, \"\", \"\", false);\n        return true;\n    }\n\n    /// @param _from The address holding the tokens being transferred\n    /// @param _to The address of the recipient\n    /// @param _amount The number of tokens to be transferred\n    /// @return `true`, if the transfer can't be done, it should fail.\n    function transferFrom(address _from, address _to, uint128 _amount) public returns (bool success) {\n        require(_amount <= mAllowed[_from][msg.sender]);\n\n        mAllowed[_from][msg.sender] = mAllowed[_from][msg.sender].sub(_amount);\n        doSend(msg.sender, _from, _to, _amount, \"\", \"\", false);\n        return true;\n    }\n\n    ///  `msg.sender` approves `_spender` to spend `_amount` tokens on its behalf.\n    /// @param _spender The address of the account able to transfer the tokens\n    /// @param _amount The number of tokens to be approved for transfer\n    /// @return `true`, if the approve can't be done, it should fail.\n    function approve(address _spender, uint128 _amount) public returns (bool success) {\n        mAllowed[msg.sender][_spender] = _amount;\n        Approval(msg.sender, _spender, _amount);\n        return true;\n    }\n\n    ///  This function makes it easy to read the `allowed[]` map\n    /// @param _owner The address of the account that owns the token\n    /// @param _spender The address of the account able to transfer the tokens\n    /// @return Amount of remaining tokens of _owner that _spender is allowed\n    ///  to spend\n    function allowance(address _owner, address _spender) public constant returns (uint128 remaining) {\n        return mAllowed[_owner][_spender];\n    }\n}\n",
      "language": "javascript",
      "name": "ATSImpl.sol"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "2. Let's Get Started"
}
[/block]
## 2.1 Setup
[block:callout]
{
  "type": "success",
  "title": "Everything you need to succeed",
  "body": "**Aion Testnet Node Connection**\n* <a href=\"https://nodesmith.io/\" target=\"_blank\">Nodesmith</a>\n\n**Titan Suite for Contract Compilation & Deployment**\n* <a href=\"https://ide.titan-suite.com/\" target=\"_blank\">Titan Suite IDE</a>\n\n**Aion Wallet**\n* <a href=\"https://getaiwa.com/\" target=\"_blank\">AIWA</a>\n\n**AION balance**\n* Use the <a href=\"https://faucets.blockxlabs.com/aion\" target=\"_blank\">faucet!</a>\n\n*Guides are available for everything listed above, found under 'Tool Guides'*"
}
[/block]
## 2.2 Modifying the Template
1. Open the <a href="https://ide.titan-suite.com/" target="_blank">Titan Suite's IDE</a>, and paste the [contract template](#section-ats-template)
2. In the IDE, go to `line 282`. In the next steps, you'll be setting the constructor for your token
3. Define the following variables to your liking. Be mindful of each variable type.

[block:parameters]
{
  "data": {
    "h-0": "Variable",
    "h-1": "Type",
    "h-2": "Description",
    "h-3": "Example",
    "0-0": "`mName`",
    "1-0": "`mSymbol`",
    "2-0": "`mTotalSupply`",
    "3-0": "`mGranularity`",
    "0-1": "`string`",
    "1-1": "`string`",
    "2-1": "`uint128`",
    "3-1": "`uint128`",
    "0-2": "The name of your token.",
    "1-2": "The symbol of your token.",
    "2-2": "The total number of minted tokens. This variable is multipled by 10 to the power of 18. It is important that you leave the `*10**18` at the end of the variable.",
    "3-2": "The smallest number of tokens (in the basic unit) which MAY be minted, sent, burned, frozen, or thawed in any transaction.\nLeave this as 1. In the future this will be customizable.",
    "0-3": "`Bitcoin`, `Dogecoin`, `Luunies`",
    "1-3": "`BTC`, `DOGE`, `LUU`",
    "2-3": "`1000000*10**18, 3141592654*10**18`,\n\n`100*10**18`",
    "3-3": "`1`"
  },
  "cols": 4,
  "rows": 4
}
[/block]

[block:callout]
{
  "type": "info",
  "body": "ATS Tokens **granularity** should only be set to 1. \n\nThis means that your token, by default, will have 18 decimals. 1 token is represented by 10^18 of its smallest unit of measurement to offer greater precision. \n\nWith that in mind, your total supply should be: \n`mTotalSupply` = totalAmountOfTokens * 10^18",
  "title": "Important to Remember"
}
[/block]

[block:api-header]
{
  "title": "3. Deployment"
}
[/block]
## 3.1 Compile
Below is an example of the contract being modified for a unique token, then being compiled. You can use your provider address from [Nodesmith](doc:nodesmith). If you're unsure on how to compile with Titan Suite - check out this quick <a href="https://learn.aion.network/v1.0/docs/titan-suite#section-compile-a-contract" target="_blank">guide</a> that will walk you through.  

We recommend you run things through the _Mastery_ test network before using the main network, this way you don't loose any real `AION` coins if something goes wrong.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/6a86c92-compile_contract.gif",
        "compile_contract.gif",
        1476,
        870,
        "#2c2b28"
      ],
      "caption": "Compiling the ATS contract"
    }
  ]
}
[/block]
## 3.2 Deploy
Let's deploy our ATS onto the Aion Network. For the purpose of this guide, we'll be deploying to the testnet (so if you mess up, you don't lose any real AION value - but you DO gain valuable knowledge and experience :wink:)
[block:callout]
{
  "type": "warning",
  "body": "* You'll need a wallet with AION balance. (You can use <a href=\"https://getaiwa.com/\" target=\"_blank\">AIWA</a>)\n* Make sure the account is <a href=\"https://learn.aion.network/v1.0/docs/titan-suite#section-account-management\" target=\"_blank\">unlocked</a> to use for deployment.\n* Unsure on how to deploy via Titan Suite? <a href=\"https://learn.aion.network/v1.0/docs/titan-suite#section-deploy-a-contract\" target=\"_blank\">Familiarize yourself here</a>"
}
[/block]
Steps:
1. Import or create a new account over in the **Accounts** tab. Take a look at the [Titan Suite - Account Management](https://learn.aion.network/docs/titan-suite#section-account-management) section if you need a refresher.
2. In the **Run** tab double check that the **Provide Address**, **Account**, **Gas Limit**, and **Gas Price** are all set. These _should_ be filled in automatically by Titan Suite.
3. Choose **'ATSimpl'** as the contract for deployment
4. Hit that 'Deploy' button! It should take about 30 seconds for your contract to deploy, depending on the speed of the network.
6. Finally, make a note of your contract address. You can do this by expanding the contract details section, and navigating to the **Contract Address** field.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9847f69-deploy_contract.gif",
        "deploy_contract.gif",
        1476,
        870,
        "#2c2b28"
      ],
      "caption": "Deploying the ATS contract"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "4. Activate your Token"
}
[/block]
Now that you've deployed your token contract - you'll probably want to see it on the <a href="https://mastery.aion.network/#/tokens" target="_blank">Token Dashboard</a>. But, you'll notice it's not on the dashboard just yet. Don't fear :ghost:! All you need to do is send **one** transaction to activate your token. Let's do this using AIWA.

Steps:
1. Open AIWA and select the account you deployed your contract with. (Do the same for a second account which you'll be transferring to)
2. Select the dropdown button next to **AION** and click **Add Token**.
3. Paste in the contract address that you just copied in the previous step. All the other field should automatically populate in AIWA.
4. Click **Submit**.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/270df3f-add_token_to_aiwa.gif",
        "add_token_to_aiwa.gif",
        1508,
        860,
        "#f6f7f8"
      ],
      "caption": "Adding your Token to AIWA"
    }
  ]
}
[/block]
Now it's time to send our first transaction! 
1. Switch to your newly added Token on AIWA
2. Click the dropdown button next to **AION** and select your Token. You should now see you newly minted coins!
3. Click then **Send** button
5. Enter the receiving address & amount to send
6. Verify information is correct, then hit the **Send** button
7. You should now be able to see your token on the <a href="https://mastery.aion.network/#/tokens" target="_blank">Token Dashboard!</a>
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/3a57301-send_first_transfer.gif",
        "send_first_transfer.gif",
        1502,
        860,
        "#e0e5eb"
      ],
      "caption": "Sending your new Token"
    }
  ]
}
[/block]
**Share you contract address with your friends! They'll be able to add their token to their AIWA wallets in the same way you did!**

# Need Help?

If you get stuck, try searching these docs 👆 or head over to our <a href="https://gitter.im/aionnetwork/Lobby" target="_blank">Gitter channels</a> or <a href="https://stackoverflow.com/search?q=aion" target="_blank">StackOverflow</a> for answers to some common questions.
[block:callout]
{
  "type": "info",
  "title": "",
  "body": "Written by** <a href=\"https://twitter.com/KimCodeashian\" target=\"_blank\">Kimcodeashian</a>** :fire:"
}
[/block]