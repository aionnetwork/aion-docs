---
title: "🎓 Debug your Java Smart Contract"
excerpt: "Don’t debug, let your IDE do it for you"
---
[block:callout]
{
  "type": "info",
  "title": "Guide Level: Intermediate",
  "body": "**You are a developer who**\n* Is experienced with Java \n* Is familiar with smart contracts\n* Understands debugging processes"
}
[/block]

[block:api-header]
{
  "title": "Get Started"
}
[/block]

[block:callout]
{
  "type": "warning",
  "title": "Requirements",
  "body": "* [Java 10^](https://www.oracle.com/technetwork/java/javase/downloads/jdk11-downloads-5066655.html)\n* [AVM jar](https://github.com/aionnetwork/AVM/releases)"
}
[/block]
This guide will walk you through on how to implement a simple Java contract, write unit tests for it, and run through a debugging process to find those bugs!

Create a Java project that depends on the AVM jar as a library. You can download the latest AVM build from the [GitHub repository](https://github.com/aionnetwork/AVM/releases).
[block:api-header]
{
  "title": "1. The Smart Contract"
}
[/block]
**Contract Logic**
* Only the owner of the contract (account deploying the contract) may add or remove members,
* Only members can introduce new proposals,
* Only members can vote on proposals,
* If more than 50% of members are in favor of a proposal and vote for it, the proposal will pass.

**Main Functions** 
* `addProposal` - allows a member to add a proposal description for a vote.
* `vote` - allows a member to vote on an available proposal by passing its Id. A proposal that has gotten majority of members’ votes will pass. Notice that a `ProposalPassed` event is generated to log the Id of the passed proposal
[block:code]
{
  "codes": [
    {
      "code": "package org.aion.avm;\n\nimport avm.Blockchain;\nimport org.aion.avm.tooling.abi.Callable;\nimport org.aion.avm.userlib.AionMap;\nimport org.aion.avm.userlib.AionSet;\nimport avm.Address;\nimport org.aion.avm.userlib.abi.ABIDecoder;\n\npublic class Voting {\n\n        private static AionSet<Address> members = new AionSet<>();\n    private static AionMap<Integer, Proposal> proposals = new AionMap<>();\n    private static Address owner;\n    private static int minimumQuorum;\n\n    static {\n        ABIDecoder decoder = new ABIDecoder(Blockchain.getData());\n\n        Address[] arg = decoder.decodeOneAddressArray();\n        for (Address addr : arg) {\n            members.add(addr);\n        }\n        updateQuorum();\n        owner = Blockchain.getCaller();\n    }\n\n    @Callable\n    public static void addProposal(String description) {\n        Blockchain.require(isMember(Blockchain.getCaller()));\n\n        Proposal proposal = new Proposal(description, Blockchain.getCaller());\n        int proposalId = proposals.size();\n        proposals.put(proposalId, proposal);\n\n        Blockchain.log(\"NewProposalAdded\".getBytes(), Integer.toString(proposalId).getBytes(), Blockchain.getCaller().toByteArray(), description.getBytes());\n    }\n\n    @Callable\n    public static void vote(int proposalId) {\n        Blockchain.require(isMember(Blockchain.getCaller()) && proposals.containsKey(proposalId));\n\n        Proposal votedProposal = proposals.get(proposalId);\n        votedProposal.voters.add(Blockchain.getCaller());\n\n        Blockchain.log(\"Voted\".getBytes(), Integer.toString(proposalId).getBytes(), Blockchain.getCaller().toByteArray());\n\n        if (!votedProposal.isPassed && votedProposal.voters.size() == minimumQuorum) {\n            votedProposal.isPassed = true;\n            Blockchain.log(\"ProposalPassed\".getBytes(), Integer.toString(proposalId).getBytes());\n        }\n    }\n\n    @Callable\n    public static void addMember(Address newMember) {\n        onlyOwner();\n        members.add(newMember);\n        updateQuorum();\n        Blockchain.log(\"MemberAdded\".getBytes(), newMember.toByteArray());\n    }\n\n    @Callable\n    public static void removeMember(Address member) {\n        onlyOwner();\n        members.remove(member);\n        updateQuorum();\n        Blockchain.log(\"MemberRemoved\".getBytes(), member.toByteArray());\n    }\n\n    @Callable\n    public static String getProposalDescription(int proposalId) {\n        return proposals.containsKey(proposalId) ? proposals.get(proposalId).description : null;\n    }\n\n    @Callable\n    public static Address getProposalOwner(int proposalId) {\n        return proposals.containsKey(proposalId) ? proposals.get(proposalId).owner : null;\n    }\n\n    @Callable\n    public static boolean hasProposalPassed(int proposalId) {\n        return proposals.containsKey(proposalId) && proposals.get(proposalId).isPassed;\n    }\n\n    @Callable\n    public static int getMinimumQuorum() {\n        return minimumQuorum;\n    }\n\n    @Callable\n    public static boolean isMember(Address address) {\n        return members.contains(address);\n    }\n\n    private static void onlyOwner() {\n        Blockchain.require(owner.equals(Blockchain.getCaller()));\n    }\n\n    private static void updateQuorum() {\n        minimumQuorum = members.size() / 2 + 1;\n    }\n\n    private static class Proposal {\n        String description;\n        Address owner;\n        boolean isPassed;\n        AionSet<Address> voters = new AionSet<>();\n\n        Proposal(String description, Address owner) {\n            this.description = description;\n            this.owner = owner;\n        }\n    }\n}",
      "language": "java",
      "name": "Voting.java"
    }
  ]
}
[/block]
**Notes**
The `static` block in the contract is only executed once at deployment. We set the initial members, `minimumQuorum`, and `owner` in this block. Although we initiated our contract with a set of members, the owner can also add and remove members afterwards.

We keep track of the members and their proposals using an `AionSet` and `AionMap`. Each proposal can be accessed from the map using its unique identifier.
[block:api-header]
{
  "title": "2. Create Unit Tests"
}
[/block]
We will be using `AvmRule` to write our tests. 
[block:callout]
{
  "type": "info",
  "title": "AvmRule",
  "body": "A Junit Rule designed for testing contracts on an embedded AVM. It creates an in-memory representation of the Aion kernel and AVM."
}
[/block]
Every time we run a test, the built kernel and AVM instances are refreshed.

Before testing our contract, we need to deploy it to an in-memory Aion blockchain and we’ll use `AvmRule` to accomplish this.

## 2.1 Instantiate AvmRule

Notice that the rule takes in a boolean argument - which enables/disables the debug mode. It’s good practice to write all your tests with the debugger enabled. 
[block:code]
{
  "codes": [
    {
      "code": "@Rule\npublic AvmRule avmRule = new AvmRule(true);",
      "language": "java",
      "name": "Java"
    }
  ]
}
[/block]
**Note** 
This line will instantiate an embedded AVM for each test method. If the rule is defined as a `@classRule`, only one instance of the AVM and kernel will be instantiated for the test class.

## 2.2 ResultWrapper
You can deploy your contract and call its methods using AvmRule `deploy` and `call` functions. 
The output of these functions will be returned as type `ResultWrapper` which will gives you the following info: 
* getReceiptStatus()
* getDappAddress()
* getDecodedReturnData()
* getLogs()
[block:code]
{
  "codes": [
    {
      "code": "// Example\n// calling the contract\nAvmRule.ResultWrapper result = avmRule.call(members[0], dappAddress, BigInteger.ZERO, txData);\n\n// validate the transaction was successful\nAssert.assertTrue(result.getReceiptStatus().isSuccess());",
      "language": "java"
    }
  ]
}
[/block]
## 2.3 Getting Contract Bytes

Now we have to get the bytes that correspond to the in-memory representation of the contract jar. In order to get the bytes, we will use the `getDappBytes` method from the `AvmRule`.

`getDappBytes` takes the following parameters: 
1. Main class of the contract
2. Contract constructor arguments, which can be accessed and decoded in the `static` block
3. Other classes that are necessary from the DApp jar

**Note** - classes in the `org.aion.avm.userlib` package must be explicitly passed in as parameters. 
[block:code]
{
  "codes": [
    {
      "code": "public byte[] getDappBytes(Class<?> mainClass, \n                           byte[] arguments, \n                           Class<?>... otherClasses)",
      "language": "java"
    }
  ]
}
[/block]
## 2.4 Deploy the Contract
Deploying the contract is easy and can be done so by using the `deploy` function!
[block:code]
{
  "codes": [
    {
      "code": "public ResultWrapper deploy(Address from, \n                            BigInteger value, \n                            byte[] dappBytes)",
      "language": "java"
    }
  ]
}
[/block]
`AvmRule` also gives the ability to create accounts with initial balances in the Aion kernel.

Let's deploy the Voting contract ([from above](#section-1-write-the-smart-contract)), with a set of 3 members.
[block:code]
{
  "codes": [
    {
      "code": "public class VotingContractTest {\n\n    @Rule\n    public AvmRule avmRule = new AvmRule(true);\n\n    public Address dappAddress;\n    public Address owner = avmRule.getPreminedAccount();\n    public Address[] members = new Address[3];\n\n    @Before\n    public void setup(){\n        for(int i =0; i< members.length; i++){\n            // create accounts with iniital balance\n            members[i] = avmRule.getRandomAddress(BigInteger.valueOf(10_000_000L));\n        }\n\n        // encode members array as an argument\n        byte[] deployArgument = ABIUtil.encodeOneObject(members);\n        // get the bytes representing the in memory jar\n        byte[] dappBytes = avmRule.getDappBytes(Voting.class, deployArgument, AionSet.class, AionMap.class);\n        //deploy and get the contract address\n        dappAddress = avmRule.deploy(owner, BigInteger.ZERO, dappBytes).getDappAddress();\n    }\n}",
      "language": "java",
      "name": "VotingContractTestDeploy.java"
    }
  ]
}
[/block]
## 2.5 Calling Methods
**Call the functions in your contract by**
1. Encoding the method name and its arguments
2. Then, passing the encoded bytes to the `AvmRule`’s `call` method.
[block:code]
{
  "codes": [
    {
      "code": "public ResultWrapper call(Address from, \n                          Address dappAddress, \n                          BigInteger value, \n                          byte[] transactionData)",
      "language": "java"
    }
  ]
}
[/block]
For example, let's create a new proposal. We will validate the proposal by checking that the `NewProposalAdded` event gets generated, and the event topics and data are correct ✓
[block:code]
{
  "codes": [
    {
      "code": "@Test\n    public void addProposalTest(){\n        String description = \"new proposal description\";\n        byte[] txData = ABIUtil.encodeMethodArguments(\"addProposal\", description);\n        AvmRule.ResultWrapper result = avmRule.call(members[0], dappAddress, BigInteger.ZERO, txData);\n        // assert the transaction was successful\n        Assert.assertTrue(result.getReceiptStatus().isSuccess());\n\n        // assert the event is generated\n        assertEquals(1, result.getLogs().size());\n        IExecutionLog log = result.getLogs().get(0);\n\n        // validate the topics and data\n        assertArrayEquals(LogSizeUtils.truncatePadTopic(\"NewProposalAdded\".getBytes()), log.getTopics().get(0));\n        assertArrayEquals(LogSizeUtils.truncatePadTopic(Integer.toString(0).getBytes()), log.getTopics().get(1));\n        assertArrayEquals(LogSizeUtils.truncatePadTopic(members[0].unwrap()), log.getTopics().get(2));\n        assertArrayEquals(description.getBytes(), log.getData());\n    }",
      "language": "java",
      "name": "VotingContractTestProposal.java"
    }
  ]
}
[/block]
Now, let's submit a proposal along with two votes for it. Since two distinct members voted for proposal (ID 0), the proposal should pass. Thus, we expect two different events to be generated for the last transaction - `Voted` and `ProposalPassed`.

You can also query a proposal’s status by its Id. You’ll see that the decoded data that is returned is `true`, meaning that the proposal has passed.
[block:code]
{
  "codes": [
    {
      "code": "@Test\n    public void voteTest(){\n        String description = \"new proposal description\";\n        byte[] txData = ABIUtil.encodeMethodArguments(\"addProposal\", description);\n        AvmRule.ResultWrapper result = avmRule.call(members[0], dappAddress, BigInteger.ZERO, txData);\n        Assert.assertTrue(result.getReceiptStatus().isSuccess());\n        assertEquals(1, result.getLogs().size());\n        //vote #1\n        txData = ABIUtil.encodeMethodArguments(\"vote\", 0);\n        result = avmRule.call(members[1], dappAddress, BigInteger.ZERO, txData);\n        Assert.assertTrue(result.getReceiptStatus().isSuccess());\n        assertEquals(1, result.getLogs().size());\n        //vote #2\n        txData = ABIUtil.encodeMethodArguments(\"vote\", 0);\n        result = avmRule.call(members[2], dappAddress, BigInteger.ZERO, txData);\n        Assert.assertTrue(result.getReceiptStatus().isSuccess());\n        Assert.assertEquals(2, result.getLogs().size());\n        //validate that the proposal is stored as passed\n        txData = ABIUtil.encodeMethodArguments(\"hasProposalPassed\", 0);\n        result = avmRule.call(members[2], dappAddress, BigInteger.ZERO, txData);\n        //decode the return data as boolean\n        Assert.assertTrue((boolean)result.getDecodedReturnData());\n    }\nview raw",
      "language": "java",
      "name": "VotingContractTestVote.java"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "3. Debug the Contract"
}
[/block]
It’s super easy to debug our contract — simply set the breaking points in the source code! Since we created our `AvmRule` with debugging enabled, the execution will be halted when the breaking point is reached. Let’s run through an example.

Take a look at the state of the smart contract after deployment.
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/52c3997-1.png",
        "1.png",
        1112,
        802,
        "#3d3f42"
      ]
    }
  ]
}
[/block]
You can see that the contract has:
* 3 members
* 0 proposals
* minimumQuorum = 2

You can inspect the contents of each collection as well. For instance — by calling the `addProposal`, you will be able to see the updated `AionMap`.

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/c43ce6f-2.png",
        "2.png",
        980,
        692,
        "#454644"
      ]
    }
  ]
}
[/block]
Let’s put the debugger to the test! We’ll be purposely creating a simple mistake in the way the proposal is evaluated as passed. I’ll modify the proposal passing criteria as shown below. Notice that the equals condition has been changed to less than or equal.

[block:code]
{
  "codes": [
    {
      "code": "if (!votedProposal.isPassed && votedProposal.voters.size() <= minimumQuorum)",
      "language": "java"
    }
  ]
}
[/block]
Now when the first owner submits their vote, the proposal will pass.

Take a look as we debug the method call and run through the function step by step.

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/f51301b-3.gif",
        "3.gif",
        1664,
        922,
        "#282d32"
      ]
    }
  ]
}
[/block]
You can see that, although minimumQuorum is equal to 2, the voter count for the proposal is only 1. Our modified if statement (from above) has been satisfied, and on line 48 the isPassed flag is set to true. 
 
 From there, you can easily identify where the bug was in your code.

**All the debugging features in any IDE on the market can be used to test and debug a Java smart contract. Go ahead and give it a try yourself!**

# Need Help?

If you get stuck, try searching these docs 👆 or head over to our <a href="https://gitter.im/aionnetwork/Lobby" target="_blank">Gitter channels</a> or <a href="https://stackoverflow.com/search?q=aion" target="_blank">StackOverflow</a> for answers to some common questions.

[block:callout]
{
  "type": "info",
  "title": "",
  "body": "Written by [Shidokht Hejazi](https://blog.aion.network/@shidokht)"
}
[/block]