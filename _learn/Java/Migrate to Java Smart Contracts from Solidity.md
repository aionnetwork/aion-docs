---
title: "Migrate to Java Smart Contracts from Solidity"
excerpt: ""
---
[block:callout]
{
  "type": "info",
  "title": "Guide Level: Intermediate",
  "body": "**You are a developer who**\n* Is familiar with Solidity smart contracts\n* Is comfortable with Java"
}
[/block]

[block:api-header]
{
  "title": "Smart Contract Migration"
}
[/block]
Here is an example of a Java smart contract and it's Solidity counterpart. You can see the side by side comparison and have a deeper understanding on how to construct your Java smart contract based on the Solidity contract.
[block:code]
{
  "codes": [
    {
      "code": "import avm.Blockchain;\nimport org.aion.avm.tooling.abi.Callable;\nimport org.aion.avm.userlib.AionMap;\nimport org.aion.avm.userlib.AionSet;\nimport avm.Address;\nimport org.aion.avm.userlib.abi.ABIDecoder;\n\npublic class Voting {\n\n  private static AionSet<Address> members = new AionSet<>();\n  private static AionMap<Integer, Proposal> proposals = new AionMap<>();\n  private static Address owner;\n  private static int minimumQuorum;\n\n  static {\n    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());\n\n    Address[] arg = decoder.decodeOneAddressArray();\n      for (Address addr:arg) {\n      members.add(addr);\n    }\n    updateQuorum();\n    owner = Blockchain.getCaller();\n  }\n\n  @Callable\n  public static void addProposal(String description) {\n    Blockchain.require(isMember(Blockchain.getCaller()));\n\n    Proposal proposal = new Proposal(description, Blockchain.getCaller());\n    int proposalId = proposals.size();\n    proposals.put(proposalId, proposal);\n\n    Blockchain.log(\"NewProposalAdded\".getBytes(), Integer.toString(proposalId).getBytes(), Blockchain.getCaller().unwrap(),     description.getBytes());\n  }\n\n  @Callable\n  public static void vote(int proposalId) {\n    Blockchain.require(isMember(Blockchain.getCaller()) && proposals.containsKey(proposalId));\n\n    Proposal votedProposal = proposals.get(proposalId);\n    votedProposal.voters.add(Blockchain.getCaller());\n\n    Blockchain.log(\"Voted\".getBytes(), Integer.toString(proposalId).getBytes(), Blockchain.getCaller().unwrap());\n\n    if (!votedProposal.isPassed && votedProposal.voters.size() == minimumQuorum) {\n      votedProposal.isPassed = true;\n      Blockchain.log(\"ProposalPassed\".getBytes(), Integer.toString(proposalId).getBytes());\n    }\n  }\n\n  @Callable\n  public static void addMember(Address newMember) {\n    onlyOwner();\n    members.add(newMember);\n    updateQuorum();\n    Blockchain.log(\"MemberAdded\".getBytes(), newMember.unwrap());\n  }\n\n  @Callable\n  public static void removeMember(Address member) {\n    onlyOwner();\n    members.remove(member);\n    updateQuorum();\n    Blockchain.log(\"MemberRemoved\".getBytes(), member.unwrap());\n  }\n\n  @Callable\n  public static String getProposalDescription(int proposalId) {\n    return proposals.containsKey(proposalId) ? proposals.get(proposalId).description : null;\n  }\n\n  @Callable\n  public static Address getProposalOwner(int proposalId) {\n    return proposals.containsKey(proposalId) ? proposals.get(proposalId).owner : null;\n  }\n\n  @Callable\n  public static boolean hasProposalPassed(int proposalId) {\n    return proposals.containsKey(proposalId) && proposals.get(proposalId).isPassed;\n  }\n\n  @Callable\n  public static int getMinimumQuorum() {\n    return minimumQuorum;\n  }\n\n  @Callable\n  public static boolean isMember(Address address) {\n    return members.contains(address);\n  }\n\n  private static void onlyOwner() {\n    Blockchain.require(owner.equals(Blockchain.getCaller()));\n  }\n\n  private static void updateQuorum() {\n    minimumQuorum = members.size() / 2 + 1;\n  }\n\n  private static class Proposal {\n    String description;\n    Address owner;\n    boolean isPassed;\n    AionSet<Address> voters = new AionSet<>();\n\n    Proposal(String description, Address owner) {\n      this.description = description;\n      this.owner = owner;\n    }\n  }\n}",
      "language": "java"
    },
    {
      "code": "pragma solidity 0.4.15;\n\ncontract Voting {\n\n  mapping(address => bool) private members;\n  uint128 numberOfMembers;\n\n  uint128 private minimumQuorum;\n  address private owner;\n\n  struct Proposal {\n    uint128 proposalId;\n    string description;\n    address proposalOwner;\n    bool isPassed;\n    uint128 numberOfVoters; \n    mapping(address => bool) voters;\n  }\n\n  mapping(uint128 => Proposal) private proposal; \n  uint128 numberOfProposals;\n\n  event NewProposalAdded (\n    uint128 proposalId, \n    address proposalOwner,\n    string description\n  );\n\n  event Voted (\n    uint128 proposalId, \n    address proposalOwner\n  );\n\n  event ProposalPassed (\n    uint128 proposalId\n  );\n\n  event MemberAdded (\n    address newMember\n  );\n\n  event MemberRemoved (\n    address member\n  );\n\n\n  function Voting(address[] addresses) public {\n    numberOfProposals = 0;\n    numberOfMembers = 0;        \n\n    for (uint128 i = 0; i < addresses.length; i++) {\n      members[addresses[i]] = true;\n      numberOfMembers++;\n    }\n    owner = msg.sender;\n    updateQuorum();\n  }\n\n  function getMinimumQuorum() public returns (uint128) { return minimumQuorum; }\n\n  function updateQuorum() public onlyOwner { minimumQuorum =  numberOfMembers/2 + 1; }\n\n  function isMember(address memberAddress) public returns (bool) {\n    return members[memberAddress];\n  }\n\n  modifier onlyOwner {\n    require(msg.sender == owner);\n    _;\n  }\n\n  function addProposal(string description) public onlyOwner {\n    require(isMember(msg.sender));\n\n    proposal[numberOfProposals].proposalId = numberOfProposals + 1;\n    proposal[numberOfProposals].description = description;\n    proposal[numberOfProposals].proposalOwner = msg.sender;\n    proposal[numberOfProposals].numberOfVoters = 0;\n    numberOfProposals++;\n\n    NewProposalAdded(numberOfProposals, msg.sender, description);\n  }\n\n\n  function vote(uint128 proposalId) public {\n    require(isMember(msg.sender));\n\n    proposal[proposalId].voters[msg.sender] = true;\n    proposal[proposalId].numberOfVoters = proposal[proposalId].numberOfVoters++;\n    Voted(proposalId, msg.sender);\n\n    if (!proposal[proposalId].isPassed && proposal[proposalId].numberOfVoters == minimumQuorum){\n      proposal[proposalId].isPassed = true;\n      ProposalPassed(proposalId);\n    }\n  }\n\n  function addMember(address newMember) public onlyOwner {\n    require(isMember(msg.sender));\n    members[newMember] = true;\n    updateQuorum();\n    MemberAdded(newMember);\n  }\n\n  function removeMember(address member) public onlyOwner {\n    require(isMember(msg.sender));\n    members[member] = true;\n    updateQuorum();\n    MemberRemoved(member);\n  }\n   \n  function getProposalDescription(uint128 proposalId) public returns (string) {\n    return bytes(proposal[proposalId].description).length != 0 ? proposal[proposalId].description : \"\";\n  }\n\n\n  function getProposalOwner(uint128 proposalId) public returns (address) {\n    return proposal[proposalId].proposalOwner != 0x0 ? proposal[proposalId].proposalOwner : 0x0;\n  }\n\n  function hasProposalPassed(uint128 proposalId) public returns (bool) {\n    return proposal[proposalId].isPassed ? proposal[proposalId].isPassed : false;\n  }\n}\n\n",
      "language": "javascript",
      "name": "Solidity"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "System Level"
}
[/block]

## FastVM (Solidity)
**Encoding/Decoding** 
See `encodeParams` and `decodeParams` methods in contract class in our java-api:
<a href="https://github.com/aionnetwork/aion_api/blob/master/src/org/aion/api/impl/Contract.java" target="_blank">https://github.com/aionnetwork/aion_api/blob/master/src/org/aion/api/impl/Contract.java</a>


## AVM (Java)
*For full ABI specification please refer to our official documentation*
https://github.com/aionnetwork/AVM/wiki/ABI-Specification

**Encoding/Decoding**
* <a href="https://github.com/aionnetwork/AVM/blob/master/org.aion.avm.userlib/src/org/aion/avm/userlib/abi/ABIEncoder.java" target="_blank">High-level ABI Encoder</a>
* <a href="https://github.com/aionnetwork/AVM/blob/master/org.aion.avm.userlib/src/org/aion/avm/userlib/abi/ABIDecoder.java" target="_blank">High-level ABI Decoder</a>
* <a href="https://github.com/aionnetwork/AVM/blob/master/org.aion.avm.userlib/src/org/aion/avm/userlib/abi/ABIToken.java" target="_blank">Constants defined here</a>

You have 2 options if you choose to run your own Aion Node:
1. [Java Kernel](https://docs.aion.network/docs/kernel-overview)
2. [Rust Kernel](https://docs.aion.network/docs/rust-kernel)

It's important to note that both kernels have the same functionality for development. 
[block:api-header]
{
  "title": "Connect to the Aion Network"
}
[/block]
1. [Nodesmith](https://nodesmith.io/) (Runs load-balanced nodes for free. Create an account and connect to the testnet or Mainnet with your Nodesmith endpoint)
2. [Blockdaemon](doc:blockdaemon) (Use a standalone containerized node)
3. Run your own [Java Node](https://docs.aion.network/docs/kernel-overview)
4. Run your own [Rust Node](https://docs.aion.network/docs/rust-kernel)
5. [Run it in Docker](https://hub.docker.com/r/sh39sxn/aion-kernel)

*It's important to note that both kernels have the same functionality for development*