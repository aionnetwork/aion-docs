---
title: "Write your first Java Smart Contract"
excerpt: ""
---
[block:callout]
{
  "type": "success",
  "title": "COMING SOON"
}
[/block]

[block:code]
{
  "codes": [
    {
      "code": "import avm.Blockchain;\nimport org.aion.avm.tooling.abi.Callable;\nimport org.aion.avm.userlib.AionMap;\nimport org.aion.avm.userlib.AionSet;\nimport avm.Address;\nimport org.aion.avm.userlib.abi.ABIDecoder;\n\npublic class Voting {\n\n  private static AionSet<Address> members = new AionSet<>();\n  private static AionMap<Integer, Proposal> proposals = new AionMap<>();\n  private static Address owner;\n  private static int minimumQuorum;\n\n  static {\n    ABIDecoder decoder = new ABIDecoder(Blockchain.getData());\n\n    Address[] arg = decoder.decodeOneAddressArray();\n      for (Address addr:arg) {\n      members.add(addr);\n    }\n    updateQuorum();\n    owner = Blockchain.getCaller();\n  }\n\n  @Callable\n  public static void addProposal(String description) {\n    Blockchain.require(isMember(Blockchain.getCaller()));\n\n    Proposal proposal = new Proposal(description, Blockchain.getCaller());\n    int proposalId = proposals.size();\n    proposals.put(proposalId, proposal);\n\n    Blockchain.log(\"NewProposalAdded\".getBytes(), Integer.toString(proposalId).getBytes(), Blockchain.getCaller().unwrap(),     description.getBytes());\n  }\n\n  @Callable\n  public static void vote(int proposalId) {\n    Blockchain.require(isMember(Blockchain.getCaller()) && proposals.containsKey(proposalId));\n\n    Proposal votedProposal = proposals.get(proposalId);\n    votedProposal.voters.add(Blockchain.getCaller());\n\n    Blockchain.log(\"Voted\".getBytes(), Integer.toString(proposalId).getBytes(), Blockchain.getCaller().unwrap());\n\n    if (!votedProposal.isPassed && votedProposal.voters.size() == minimumQuorum) {\n      votedProposal.isPassed = true;\n      Blockchain.log(\"ProposalPassed\".getBytes(), Integer.toString(proposalId).getBytes());\n    }\n  }\n\n  @Callable\n  public static void addMember(Address newMember) {\n    onlyOwner();\n    members.add(newMember);\n    updateQuorum();\n    Blockchain.log(\"MemberAdded\".getBytes(), newMember.unwrap());\n  }\n\n  @Callable\n  public static void removeMember(Address member) {\n    onlyOwner();\n    members.remove(member);\n    updateQuorum();\n    Blockchain.log(\"MemberRemoved\".getBytes(), member.unwrap());\n  }\n\n  @Callable\n  public static String getProposalDescription(int proposalId) {\n    return proposals.containsKey(proposalId) ? proposals.get(proposalId).description : null;\n  }\n\n  @Callable\n  public static Address getProposalOwner(int proposalId) {\n    return proposals.containsKey(proposalId) ? proposals.get(proposalId).owner : null;\n  }\n\n  @Callable\n  public static boolean hasProposalPassed(int proposalId) {\n    return proposals.containsKey(proposalId) && proposals.get(proposalId).isPassed;\n  }\n\n  @Callable\n  public static int getMinimumQuorum() {\n    return minimumQuorum;\n  }\n\n  @Callable\n  public static boolean isMember(Address address) {\n    return members.contains(address);\n  }\n\n  private static void onlyOwner() {\n    Blockchain.require(owner.equals(Blockchain.getCaller()));\n  }\n\n  private static void updateQuorum() {\n    minimumQuorum = members.size() / 2 + 1;\n  }\n\n  private static class Proposal {\n    String description;\n    Address owner;\n    boolean isPassed;\n    AionSet<Address> voters = new AionSet<>();\n\n    Proposal(String description, Address owner) {\n      this.description = description;\n      this.owner = owner;\n    }\n  }\n}",
      "language": "java"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "COMING SOON"
}
[/block]