---
title: "🎓 Build a Decentralized App on Aion"
excerpt: "Learn how to create a complete, decentralized application on the Aion Network."
---
[block:callout]
{
  "type": "info",
  "title": "Guide Level: Beginner",
  "body": "**You are a developer who**\n* Understands basic front-end knowledge(HTML, CSS, JavaScript - The application itself is written in React 15.6.1)\n* Is familiar with basic blockchain concepts\n* Is comfortable with smart contracts and how it works on blockchains\n* Solidity Language v0.4.15 (Optional - but you can read the docs [here](https://solidity.readthedocs.io/en/v0.4.15/))"
}
[/block]

[block:api-header]
{
  "title": "Overview"
}
[/block]
Learn to build a fun, decentralized application on the Aion Network. If you want to know more on how this demo dApp came to be, read the <a href="https://medium.com/@kimcodeashian/aion-demo-dapp-roulette-884ade64ce2d" target="_blank">blog post!</a> 

Before we dive in, let's get a sneak peak of what you're going build! :hammer: 
**Pet Roulette** is a game of luck and it is built on top of the Aion Network. 

*The rules are*: 
* 7 accounts choose an animal to win the round
* Each account can place one bet per round
* Bets must be within 1 and 100 AION

Try your luck & place your bets!! 😉💸🐘

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/df19360-Pet-Roulette.PNG",
        "Pet-Roulette.PNG",
        3564,
        1980,
        "#5f7292"
      ],
      "caption": "https://aion-roulette.netlify.com"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "Let's BUIDL🎓"
}
[/block]
**What you'll learn:**
1. [Setup your Environment](#section-1-setup-your-environment)
2. [Write the Smart Contract (Solidity v0.4.15)](#section-2-write-the-smart-contract)
3. [Compile/Deploy the Smart Contract via ~ Titan Suite](#section-3-deploy-the-smart-contract)
4. [Connect the front-end application with your contract](#section-4-connect-to-front-end-application)
5. [Run the application!](#section-5-run-the-application)
6. [Understand the smart contract activity and transaction receipts](#section-6-how-to-read-transactions)
[block:api-header]
{
  "title": "1. Setup your Environment"
}
[/block]
Alright rockstars, we'll need a few things to set the stage 🎬
[block:callout]
{
  "type": "warning",
  "title": "Requirements",
  "body": "* <a href=\"https://nodejs.org/en/\" target=\"_blank\">Node.js</a> (recommended version: 10.x)\n* <a href=\"https://www.npmjs.com/get-npm\" target=\"_blank\">NPM</a> (recommended version: 6.x)\n* Text Editor of your choice (Atom, Sublime, VS Code, etc)\n* <a href=\"https://nodesmith.io/\" target=\"_blank\">Nodesmith API Endpoint</a>\n* <a href=\"https://www.google.com/chrome//\" target=\"_blank\">Google Chrome Browser</a>\n* <a href=\"https://getaiwa.com\" target=\"_blank\">AIWA</a> (Aion Wallet - Chrome Extension)"
}
[/block]
## 1.1 Installation
We'll be cloning the tutorial starter <a href="https://github.com/aion-kimcodeashian/aion-roulette-tutorial" target="_blank">Github Repo</a>. In your command line, navigate to where you would like the project directory.
1.  Clone the <a href="https://github.com/aion-kimcodeashian/aion-roulette-tutorial" target="_blank">Github Repo</a>
2. Navigate into the project directory
[block:code]
{
  "codes": [
    {
      "code": "git clone https://github.com/aion-kimcodeashian/aion-roulette-tutorial.git\ncd aion-roulette-tutorial",
      "language": "curl",
      "name": "Terminal"
    }
  ]
}
[/block]
3. Install **webpack** & **http-server** on your system
[block:code]
{
  "codes": [
    {
      "code": "npm i --global webpack webpack-cli http-server",
      "language": "curl",
      "name": "Terminal"
    }
  ]
}
[/block]
* <a href="https://www.npmjs.com/package/webpack" target="_blank">**webpack**</a> - Bundles JavaScript files for usage in a browser.
* <a href="https://www.npmjs.com/package/http-server" target="_blank">**http-server**</a> - A lightweight server that hosts your web app locally for development (`localhost:8080`)


4. Install all the NPM dependencies for the project
[block:code]
{
  "codes": [
    {
      "code": "npm install",
      "language": "curl",
      "name": "Terminal"
    }
  ]
}
[/block]
You can see the dependencies installed in the package.json file. The important dependencies to note are:
* <a href="https://react-legacy.netlify.com/docs/hello-world.html" target="_blank">**React.js**</a> - JavaScript library for building user interfaces
* [**aion-web3**](https://docs.aion.network/docs/web3) - Aion's web3 API (application programming interface) on top of the Aion network

## 1.2 Project Structure
If you open up your project in your text editor, it should look like this 

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/db487b8-project_directory_3.PNG",
        "project directory 3.PNG",
        810,
        1329,
        "#4d4951"
      ],
      "caption": "Demo dApp Project Structure"
    }
  ]
}
[/block]
* ***index.js*** - We'll be editing this file as it deals with all the client-side interactions of the dApp. We use React to render the DOM and make calls to interact with our smart contract
* ***webpack.config.js*** - webpack file that bundles all of the React, JavaScript and CSS files into ***build.js***
* ***build.js*** - compiled JavaScript file that is injected in ***index.html ***
* ***index.html*** -  the webpage that serves the application
* ***package.json***  -  file used to give information to NPM that allows it to identify the project and handle the project's dependencies
[block:api-header]
{
  "title": "2. Write the Smart Contract"
}
[/block]
Here's where the magic of your application will happen. Let's write out smart contract!
[block:callout]
{
  "type": "info",
  "title": "Aion's FastVM currently only supports Solidity Language up to v0.4.15.",
  "body": "<a href=\"https://solidity.readthedocs.io/en/v0.4.15/\" target=\"_blank\">Solidity (v0.4.15) Docs</a>"
}
[/block]
## 2.1 SafeMath
**Practice Safe Math!** :wink: 

What *is* it? **SafeMath **is a Solidity math library especially designed to support safe math operations. *Safe* means that it prevents overflow when working with `uint`. 

* `using SafeMath for uint;` - lets the contract know that we'll be using the SafeMath library for `uint` variables :1234: 

Open up the Casino.sol file (found in `/contracts/Casino.sol`). You should see the SafeMath library and an empty Casino contract. 
[block:code]
{
  "codes": [
    {
      "code": "pragma solidity 0.4.15;\n\nlibrary SafeMath {\n  function mul(uint _a, uint _b) internal constant returns (uint c)\n  { if (_a == 0) {\n     return 0;\n  }\n    c = _a * _b;\n    require(c / _a == _b);\n    return c;\n  }\n  function div(uint _a, uint _b) internal constant returns (uint){\n    require(_b > 0);\n    return _a / _b;\n  }\n  function sub(uint _a, uint _b) internal constant returns (uint){\n    require(_b <= _a);\n    return _a - _b;\n  }\n  function add(uint _a, uint _b) internal constant returns (uint c){\n    c = _a + _b;\n    require(c >= _a);\n    return c;\n  }\n}\n\ncontract Casino {\n  using SafeMath for uint;\n  \n}\n",
      "language": "javascript",
      "name": "Casino.sol"
    }
  ]
}
[/block]
## 2.2 Basic Functionality
Let's lay down the basic functionalities of this contract.

[block:code]
{
  "codes": [
    {
      "code": "contract Casino {\n  using SafeMath for uint;\n  address owner;\n  \n  // Constructor\n  function Casino() public {\n    owner = msg.sender;\n  }\n  \n  // Make sure contract has balance > maximumBet so\n  // distributePrizes() will be able to execute without failure\n  function() public payable {}\n  \n  // refund all tokens back to owner\n  function refund() public onlyOwner {\n    uint totalBalance = this.balance;\n    owner.transfer(totalBalance);\n  }\n  \n  function kill() public {\n    if(msg.sender == owner) selfdestruct(owner);\n  }\n}",
      "language": "javascript",
      "name": "Casino.sol"
    }
  ]
}
[/block]
* `Casino()` - The constructor function. On deployment of the smart contract, it'll store the creator as owner of the smart contract. Which is stored in `address public owner`
* `payable()` - Allows any AION amount send to be stored in the contract 💸
* `kill()` - Destroy the smart contract if there's any vulnerability or hack. It'll refund any remaining AION balance back to the owner 💣

## 2.3 Variables
Now, let's create variables for the things we have to keep track of. Inline comments are provided to explain what each line is responsible for.
[block:code]
{
  "codes": [
    {
      "code": "contract Casino {\n  using SafeMath for uint;\n  address owner;\n  \n  // The minimum bet a user has to make to participate in the game\n  uint public minimumBet = 1; // Equal to 1.00 AION\n  \n  // The maximum bet a user has to make to participate in the game\n  uint public maximumBet = 100; // Equal to 100 AION\n  \n  // The total number of bets the users have made\n  uint public numberOfBets;\n  \n  // The maximum amount of bets can be made for each game\n  uint public maxAmountOfBets = 7;\n  \n  // The total amount of AION bet for this current game\n  uint public totalBet;\n  \n  // The total amount of AION paid out (contract paid out)\n  uint public totalPaid;\n  \n  // The number / animal that won the last game\n  uint public lastLuckyAnimal;\n  \n  // The current round number\n  uint public numberRound;\n  \n  // Array of players in each round\n  address[] public players;\n  \n  // Player object\n  struct Player {\n    uint amountBet;\n    uint numberSelected;\n  }\n  \n  // The address of the player and => the user info\n  mapping(address => Player) public playerInfo;\n  \n  // Events that get logged in the blockchain\n  event AnimalChosen(uint value);\n  event WinnerTransfer(address to, uint value);\n  \n  // Modifier: Only allow the execution of functions when bets are completed\n  modifier onEndGame(){\n    if(numberOfBets >= maxAmountOfBets) _;\n  }\n  modifier onlyOwner() {\n    require(msg.sender == owner);\n    _;\n  }\n  \n  function Casino() public {\n    owner = msg.sender;\n  }\n  \n  function() public payable {}\n  \n  function refund() public onlyOwner {\n    uint totalBalance = this.balance;\n    owner.transfer(totalBalance);\n  }\n  \n  function kill() public {\n    if(msg.sender == owner) selfdestruct(owner);\n  }\n}",
      "language": "javascript",
      "name": "Casino.sol"
    }
  ]
}
[/block]
These are all the **variables** we'll need to successfully track the game. 

**Events ** will be emitted on the blockchain when certain functions have executed (and can be read in the transaction receipts on the <a href="https://mastery.aion.network" target="_blank">Dashboard</a>). That way we can keep track of which Animal was chosen, and the winners' accounts and their winning portions. Read more about it under the [How to Read Transactions](#section-6-how-to-read-transactions) section. 

## 2.4 Functions
Let's recall the logic and functionality of the game:
1. [`checkPlayerExists()` - Only one account can place a bet per round](#section-1-check-if-account-has-already-placed-a-bet)
2. [`bet()` - Place a bet - pick an animal & bet amount (animals are mapped from 1-10)](#section-2-player-places-a-bet-on-an-animal)
3. [`generateNumberWinner()` - Generate random winning animal (random number)](#section-3-generate-winning-animal)
4. [`distributePrizes()` - Identify & send AION to the winners' addresses](#section-4-distribute-aion-to-winners)

[block:callout]
{
  "type": "info",
  "body": "* Add the following functions inside the **Casino** contract code.\n* Inline comments & descriptions are provided."
}
[/block]
### 1.  Check if account has already placed a bet
[block:code]
{
  "codes": [
    {
      "code": "function checkPlayerExists(address player) public constant returns (bool){\n    for(uint i = 0; i < players.length; i++){\n       if(players[i] == player) return true;\n    }\n    return false;\n  }",
      "language": "javascript",
      "name": "Casino.sol"
    }
  ]
}
[/block]
### 2. Player places a bet on an animal
* Allow a player to place a bet
* Stores the player address, the number they chose, AION amount betted
* Updates relevant variables (player array, total betting pool, bets placed etc..)
[block:code]
{
  "codes": [
    {
      "code": "function bet(uint numberSelected) payable {\n  // Check that the max amount of bets hasn't been met yet\n  require(numberOfBets <= maxAmountOfBets);\n  \n  // Check that the number to bet is within the range\n  require(numberSelected >= 1 && numberSelected <= 10);\n  \n  // Check that the player doesn't exists\n  require(checkPlayerExists(msg.sender) == false);\n  \n  // Check that the amount paid is bigger or equal the minimum bet\n  require(msg.value >= minimumBet);\n  \t\n  // Store player's address, bet amount, and animal chose\n  playerInfo[msg.sender].amountBet = msg.value;\n  playerInfo[msg.sender].numberSelected = numberSelected;\n  \t\n  numberOfBets++; // Increase number of bets placed\n  players.push(msg.sender); // Add player into array \n  totalBet += msg.value; // Increase total AION prize pool \n  \n  // Check if the round is completed, if so - draw the winning animal \n  if(numberOfBets >= maxAmountOfBets) generateNumberWinner(); \n }",
      "language": "javascript",
      "name": "Casino.sol"
    }
  ]
}
[/block]
### 3. Generate winning animal
* We do this by generating a number from 1-10 that are mapped to the animals respectively

[block:callout]
{
  "type": "warning",
  "body": "This is **NOT** a secure random number generator method."
}
[/block]

[block:code]
{
  "codes": [
    {
      "code": "function generateNumberWinner() private onEndGame {\n  uint numberGenerated = block.number % 10 + 1; // This isn't secure\n  lastLuckyAnimal = numberGenerated; // Store animal chosen\n  distributePrizes(); // Call function to distribute prizes\n}",
      "language": "javascript",
      "name": "Casino.sol"
    }
  ]
}
[/block]
### 4. Distribute AION to winners
* Store winning players in an array
* Proportion their winnings based on their bet amount (by dividing the winner bet pool)
* Distribute AION to winner accounts found in the array we created
* Reset/Update relevant variables (players, number, round, total bets, etc) 
[block:code]
{
  "codes": [
    {
      "code": "  function distributePrizes() private onEndGame {\n    address[100] memory winners; // Create a temporary in memory array with fixed size\n    uint count = 0;              // Winner count - how many winners\n    uint winnerBetPool = 0;      // Total Winner Bet Pool - used to portion prize amount \n\n    // Store winners in array, and tally winner bet pool\n    for(uint i = 0; i < players.length; i++){\n      address playerAddress = players[i];\n      if(playerInfo[playerAddress].numberSelected == lastLuckyAnimal){\n        winners[count] = playerAddress;\n        winnerBetPool += playerInfo[playerAddress].amountBet;\n        count++;\n      }\n    }\n\n    // If winning players, then distribute AION \n    if (count > 0){\n      for(uint j = 0; j < count; j++){\n        if(winners[j] != address(0)) // Check that the address in this fixed array is not empty\n        address playerAddressW = winners[j]; // Grab winning addresses\n        uint winnerAIONAmount = SafeMath.div(SafeMath.mul(totalBet, playerInfo[playerAddressW].amountBet), winnerBetPool);\n        winners[j].transfer(winnerAIONAmount); // Calculate winner proportions to the prize pool\n\n        totalPaid += winnerAIONAmount; // Add to Total Payout\n        WinnerTransfer(winners[j], winnerAIONAmount);\n      }\n      totalBet = 0; // Clear total bets, if no winner - totalBets get rolled over\n    }\n    \n    players.length = 0; // Delete all the players array\n    numberOfBets = 0;   // Reset number of bets\n    numberRound++;      // Increase Round Number\n  }\n}",
      "language": "javascript",
      "name": "Casino.sol"
    }
  ]
}
[/block]

[block:callout]
{
  "type": "info",
  "title": "DId you get lost?",
  "body": "Check out the final version of the smart contract on the <a href=\"https://github.com/aion-kimcodeashian/aion-roulette/blob/master/contracts/Casino.sol\" target=\"_blank\">Github Repo!</a>"
}
[/block]

[block:api-header]
{
  "title": "3. Deploy the Smart Contract"
}
[/block]
Now it's time to make sure our code ***compiles*** and ***deploys*** our smart contract deploys. We'll be using <a href="https://titan-suite.com" target="_blank">Titan Suite</a> for this step. 

**Titan Suite** is a one stop shop for all your smart contract needs. Whether you want to edit, compile, or deploy your contract onto the Aion Network, it can do it all! It's both an IDE and a CLI tool but for this purpose  -  we'll use the IDE. 

What's great about the IDE is that it lints your contract for you. So, if your code isn't perfect or you missed a few things -  it will tell you!
[block:callout]
{
  "type": "warning",
  "title": "Requirements",
  "body": "* <a href=\"https://ide.titan-suite.com\" target=\"_blank\">Titan Suite IDE</a>\n* <a href=\"https://nodesmith.io\" target=\"_blank\">Nodesmith API Endpoint</a>\n* An Aion address - You can use your <a href=\"https://getaiwa.com/\" target=\"_blank\">AIWA</a> account or create an account in the IDE itself\n\n*Pssst... if you need testnet AION - check out the <a href=\"https://faucets.blockxlabs.com/aion\" target=\"_blank\">AION faucet</a>!*"
}
[/block]
If you're not familiar with Titan Suite, get comfortable with this [guide here.](doc:titan-suite)

[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/7d75cde-new_blank_titan.png",
        "new_blank_titan.png",
        3055,
        1694,
        "#314436"
      ],
      "caption": "https://ide.titan-suite.com/"
    }
  ]
}
[/block]
## 3.1 Compile
1. Head over to Titan Suite's IDE and create a new file called ***Casino.sol*** and set the language to **Solidity**
2. Copy & paste the finalized ***Casino.sol*** contract into the IDE
3. [Compile your contract](doc:titan-suite#section-compile-a-contract) - You will need to enter your **Nodesmith API Endpoint** as the *Provider Address*
4. Once your contract has successfully compiled. Copy the **ABI** of the contract. You can do so by clicking the clipboard icon beside the 'Details' button. Go back into your text editor and paste the ABI in the ***Casino.json*** file. We'll be using the **ABI **to interact with our contract on the client-side of our application.

[block:callout]
{
  "type": "info",
  "body": "**ABI** -  A list of the contract's functions and arguments (in JSON format). An account wishing to use a smart contract's function uses the ABI to hash the function definition so it can create the FastVM bytecode required to call the function."
}
[/block]
## 3.2 Deployment

Deploy your contract in [3 easy steps](doc:titan-suite#section-deploy-a-contract)!

1. Navigate to the ***Accounts*** tab and [create/import an account](doc:titan-suite#section-account-management). You'll need to have some AION balance in order to deploy the contract.
2. Go to the ***Run*** tab and fill in the necessary information (*Provider Address, Account*)
3. In the dropdown list, select the **Casino** contract & click **'Deploy'** 
[block:callout]
{
  "type": "success",
  "title": "Deployment Successful?",
  "body": "Awesome! Remember to **copy the contract address**! We'll need it later to instantiate the contract on the client-side! \n\nYou can find it in the transaction receipt in the console portion of the IDE."
}
[/block]
## 3.3 Deposit AION to Contract 
Remember the `payable()` function we added to our smart contract? This function allows the contract to receive AION. 

The winning payout logic and flow of the smart contract goes a little something like this.

[block:callout]
{
  "type": "info",
  "title": "When the last player successfully places their bet",
  "body": "1. A winning animal is generated\n2. Winners are identified and payouts occur"
}
[/block]
This is executed inside of **one** transaction. Because of this, the contract balance is not updated until **after** the transaction has been sealed. Essentially, the contract would try to payout a balance it **does not** have (according to the blockchain), and thus the transaction would ***revert*** or ***fail***. 

To avoid this, we have to deposit the maximum bet amount *(under the assumption that the last better placed a bet with the max amount)*, so that the contract already carries the balance in order to carry through the transaction.

You can do this by going to your AIWA (or whatever Aion wallet you use) and 
1. Send the **maximum bet amount** *(in this case it's 100 AION)*
2. To your **contract address**

Now your contract is all locked & loaded! 🔫
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/41e2503-AIWA.PNG",
        "AIWA.PNG",
        898,
        1489,
        "#e0eef0"
      ],
      "caption": "Sending 100 AION to Contract Address"
    }
  ]
}
[/block]

[block:api-header]
{
  "title": "4. Connect to Front End Application"
}
[/block]
Navigate back to your text editor and open up the ***index.js*** file (found in `/src/js/index.js`)
[block:code]
{
  "codes": [
    {
      "code": "import React from 'react'\nimport ReactDOM from 'react-dom'\nimport Web3 from 'aion-web3'\nimport casinoJSON from './../../contracts/Casino.json' // import our contract JSON\n\n// Initializing Variables\nlet web3;\nlet aiwa;\nlet aiwaInjected = false;\nlet myContract;\nlet contractAddress = \"0xYourContractAddressHere\";\nlet account = \"Not Detected - Please download AIWA to play this game\";\n\n// On load, inject AIWA\nwindow.onload = () => {\n\n}\n\n// Main React App\nclass App extends React.Component {\n  constructor(props) {\n    super(props)\n    this.state = {\n      lastLuckyAnimal: \"\",\n      numberOfBets: 0,\n      minimumBet: 0,\n      maximumBet: 0,\n      totalBet: 0,\n      totalPaid: 0,\n      maxAmountOfBets: 0,\n      roundNumber: 0,\n      accounts: account,\n      doesPlayerExist: false,\n    }\n    this.updateState = this.updateState.bind(this)\n  }\n\n  componentDidMount() {\n    console.log('componentDidMount');\n    this.initializeContract();\n  }\n\n  initializeContract() {\n\n  }\n\n  // Update DOM from Contract information\n  updateState() {\n    console.log('updateState hit');\n\n  }\n\n  // Listen for user events and executes the voteNumber method\n  setupListeners() {\n    console.log('setupListeners hit');\n    let liNodes = this.refs.numbers.querySelectorAll('li')\n\n    liNodes.forEach(number => {\n      number.addEventListener('click', event => {\n        event.preventDefault();\n        if (this.state.doesPlayerExist) { // If player exists, do not allow voting\n          alert(\"This account has already placed a bet. Wait until next round!\")\n        } else {\n          event.target.className = 'number-selected'\n          console.log('number selected', event.target.value);\n          this.voteNumber(event.target.value, done => {\n            // Remove the other number selected\n            for (let i = 0; i < liNodes.length; i++) {\n              liNodes[i].className = ''\n            }\n          })\n        }\n      })\n    })\n  }\n\n  // Send Number to Contract\n  voteNumber(number, cb) {\n\n  }\n\n  render() {\n    return (\n    <div className=\"main-container\">\n      <h1>Welcome to Aion Roulette🚀</h1>\n      <div className=\"rules\">\n        <div className=\"block\">\n          <b>Round #:</b> &nbsp;\n          <span>{this.state.roundNumber}</span>\n        </div>\n        <div className=\"block \">\n          <b>Number of Bets:</b> &nbsp;\n          <span>{this.state.numberOfBets}</span>\n          /\n          <span>{this.state.maxAmountOfBets}</span>\n        </div>\n        <div className=\"block\">\n          <b>Last Winning Animal:</b> &nbsp;\n          <span>{this.state.lastLuckyAnimal}</span>\n        </div>\n        <div className=\"block\">\n          <b>Total AION pool:</b> &nbsp;\n          <span>{this.state.totalBet} AION</span>\n        </div>\n        <div className=\"block empty\"></div>\n        <div className=\"block\">\n          <b>Min Bet:</b> &nbsp;\n          <span>{this.state.minimumBet} AION</span>\n        </div>\n        <div className=\"block\">\n          <b>Max Bet:</b> &nbsp;\n          <span>{this.state.maximumBet} AION</span>\n        </div>\n        <div className=\"block\">\n          <b>Total AION paid out:</b> &nbsp;\n          <span>{this.state.totalPaid} AION</span>\n        </div>\n      </div>\n\n      <hr />\n      <h2 className=\"link\">\n        When {this.state.maxAmountOfBets} bets have been placed - an animal will be randomly selected and a payout will occur.\n        <br/>\n        Winners who guessed correctly will split the amount in the AION pool!\n        <br/>\n        If no winner, total AION pool will rollover.\n        <br/>\n        See the smart contract in action <a href=\"https://mastery.aion.network/#/account/a0e51f852783e5edd470657e8e3581b091816c37aa783e7e52f3a4638d16349c\" target=\"_blank\">here!</a>\n        <a href=\"https://twitter.com/KimCodeashian/status/1086077442026921984\" target=\"_blank\" className=\"info\"> &#9432; </a>\n      </h2>\n\n      <hr />\n      <div className=\"play\">\n        <h3>Let's Play!</h3>\n        <p>\n          <span>1. How much AION do you want to bet? <input className=\"bet-input\" ref=\"aion-bet\" type=\"number\" placeholder=\"0\"/> AION</span>\n          <span>2. Now pick an animal!</span>\n        </p>\n        <ul ref=\"numbers\" className=\"numbers\">\n          <li value=\"1\"></li>\n          <li value=\"2\"></li>\n          <li value=\"3\"></li>\n          <li value=\"4\"></li>\n          <li value=\"5\"></li>\n          <li value=\"6\"></li>\n          <li value=\"7\"></li>\n          <li value=\"8\"></li>\n          <li value=\"9\"></li>\n          <li value=\"10\"></li>\n        </ul>\n      </div>\n\n      <hr />\n      <div className=\"footer\">\n        <div className=\"footer-content\">\n        <p><i>Only working with the Mastery Test Network 📡</i></p>\n        <p><i>You can only vote once per account.</i></p>\n        <p><i>Your account is: <strong>{this.state.accounts}</strong></i></p>\n        <p><i>Your vote will be reflected when the next block is mined.</i></p>\n        <p className=\"link\"><i>Don't have AIWA? <a href=\"https://learn.aion.network/v1.0/docs/aiwa\" target=\"_blank\">Start here</a></i></p>\n        <p className=\"link\"><i>Need Testnet AION? <a href=\"https://faucets.blockxlabs.com/aion\" target=\"_blank\">Faucet</a></i></p>\n        </div>\n      </div>\n\n      <div className=\"madeWithLove\">\n        <p>Made with 🔥 by <a href=\"https://twitter.com/kimcodeashian\" target=\"_blank\">KimCodeashian</a> 🤘</p>\n      </div>\n    </div>\n    )\n  }\n}\n\nReactDOM.render(\n  <App />,\n  document.querySelector('#root')\n)\n",
      "language": "javascript",
      "name": "index.js"
    }
  ]
}
[/block]
Basic structure: 
* Import necessary libraries, data (*React*, *Reactdom*, *aion-web3*, *Casino.json*)
* Initialize global variables for *AIWA*, *web3*, *contract instance*, and *contract address*. 
* **Enter your contract address in line 11**
* App constructor with state variables pre-defined, corresponding to the contract variables (we'll update these when we connect with the contract)
* `render()` - Responsible for updating the DOM of our app. As our state (variables) updates, the application will update and the web browser will re-render accordingly

[block:callout]
{
  "type": "info",
  "body": "If you'd like to see the bare application before we fill in the code:\n1. In your terminal (in the project directory)\n2. Run the local server with this command ```http-server```\n3. Go to `http://localhost:8080/`"
}
[/block]
### Functions
We'll be filling out these necessary functions to get our dApp up and running! :runner: 
1. `window.onload()` - Detect if the browser has AIWA
2. `initializeContract()` - Intialize the Contract
3. `updateState()` - Update the Application State
4. `voteNumber()` - Allow users to place their bets 

## 4.1 Detect for AIWA :eyes: 
What is <a href="https://getaiwa.com" target="_blank">AIWA</a>? AIWA stands for Aion Wallet and it is pretty straightforward to use. If you're familiar with MetaMask, the developer experience is quite similar. A neat feature is that it will auto-inject a Web3 API connection to Aion.

When the browser loads, first thing we have to do is to check if the user has AIWA installed. Update the `window.onload()` function. 
[block:code]
{
  "codes": [
    {
      "code": "// On load, inject AIWA\nwindow.onload = () => {\n  if (aionweb3){\n    aiwa = aionweb3;\n    aiwaInjected = true\n    console.log(\"✓ AIWA injected successfully\");\n  }\n}",
      "language": "javascript",
      "name": "index.js"
    }
  ]
}
[/block]
## 4.2 Initialize the Contract

This is where our handy ABI comes in 😉! Remember, we imported it from our Casino.json file?

* You'll need your Nodesmith API endpoint
* If AIWA is not detected - we'll be using Nodesmith as our fallback connection. This way, the contract information can still be displayed! Although, If the user doesn't have AIWA, they will not be able to place bets 😢.
[block:code]
{
  "codes": [
    {
      "code": "initializeContract() {\n  \n  if (!aiwaInjected) {\n    // Fallback Nodesmith Connection\n    web3 = new Web3(new Web3.providers.HttpProvider(\"https://api.nodesmith.io/v1/aion/testnet/jsonrpc?apiKey=ENTERYOURAPIKEYHERE\"));\n\n    // Contract Instance\n    myContract = new web3.eth.Contract(casinoJSON.info.abiDefinition, contractAddress);\n    console.log('Contract Instantiated:', myContract);\n  \n  } else {\n    // Contract Instance w/ AIWA\n    myContract = new aiwa.Contract(casinoJSON.info.abiDefinition, contractAddress);\n    console.log('Contract Instantiated:', myContract);\n  }\n  \n  this.updateState();     // Populate DOM w/ contract info\n  this.setupListeners();\n  setInterval(function(){ // Poll contract info every 5s\n    this.updateState()\n  }.bind(this), 5000)\n}",
      "language": "javascript",
      "name": "index.js"
    }
  ]
}
[/block]
## 4.3 Update the Application State
Now that we have initialized our contract, let's go ahead and:
1. Update our state with the information stored in our contract (*minimum bet, total pool, how many bets, etc*)
2. Check if AIWA is active. If so: 
  * Update the page to reflect user's current Aion address
  * And do a quick check if the account has already placed a bet
[block:callout]
{
  "type": "info",
  "body": "All our contract calls are made using **Aion Web3** API methods.\n* <a href=\"https://docs.aion.network/docs/web3\" target=\"_blank\">Web3 Documentation</a>"
}
[/block]

[block:code]
{
  "codes": [
    {
      "code": "// Update DOM from Contract information\nupdateState() {\n  console.log('updateState hit');\n  \n  if (aiwaInjected){ // update active account\n    this.setState({\n      accounts: aiwa.eth.accounts.toString(),\n    })\n    \n    // Check if account has already placed a bet\n    myContract.methods.checkPlayerExists(aiwa.eth.accounts.toString()).call({})\n    .then(function(result){\n      console.log('doesPlayerExist:', result);\n      this.setState({\n        doesPlayerExist: result\n      })\n    }.bind(this));\n  }\n\n  // Update minimum bet value\n  myContract.methods.minimumBet().call({})\n  .then(function(result){\n    console.log('min bet:', result);\n    this.setState({\n      minimumBet: result\n    })\n  }.bind(this));\n\n  // Update maximum bet value\n  myContract.methods.maximumBet().call({})\n  .then(function(result){\n    console.log('min bet:', result);\n    this.setState({\n      maximumBet: result\n    })\n  }.bind(this));\n\n  // Update total amount in bets\n  myContract.methods.totalBet().call({})\n  .then(function(result){\n    console.log('total bet:', result);\n    // Do the Division for 18 decimal points (AION), float 2 points\n    let totalPool = (result / 1*Math.pow(10,-18)).toFixed(2);\n\n    this.setState({\n      totalBet: totalPool\n    })\n  }.bind(this));\n\n  // Update AION amount paid out\n  myContract.methods.totalPaid().call({})\n  .then(function(result){\n    console.log('total AION paid out:', result);\n    // Do the Division for 18 decimal points (AION), float 2 points\n    let totalPaidOut = (result / 1*Math.pow(10,-18)).toFixed(2);\n\n    this.setState({\n      totalPaid: totalPaidOut\n    })\n  }.bind(this));\n\n  // Update numberOfBets\n  myContract.methods.numberOfBets().call({})\n  .then(function(result){\n      console.log('number of bets:', result);\n      this.setState({\n        numberOfBets: result\n      })\n  }.bind(this));\n\n  // Update maximum amount of bets\n  myContract.methods.maxAmountOfBets().call({})\n  .then(function(result){\n      console.log('maxAmountOfBets:', result);\n      this.setState({\n        maxAmountOfBets: result\n      })\n  }.bind(this));\n\n  // Update round number\n  myContract.methods.numberRound().call({})\n  .then(function(result){\n      console.log('roundNumber:', result);\n      let round = parseInt(result, 10) + 1;\n      this.setState({\n        roundNumber: round\n      })\n  }.bind(this));\n\n  // Update last winner\n  myContract.methods.lastLuckyAnimal().call({})\n  .then(function(result){\n    console.log('Last Lucky Animal:', result);\n    let winner;\n    \n\t\t// Map out numbers to animals\n    switch(result) {\n      case '1':\n        winner = \"Cow\";\n        break;\n      case '2':\n        winner = \"Beaver\";\n        break;\n      case '3':\n        winner = \"Penguin\";\n        break;\n      case '4':\n        winner = \"Pig\";\n        break;\n      case '5':\n        winner = \"Chick\";\n        break;\n      case '6':\n        winner = \"Walrus\";\n        break;\n      case '7':\n        winner = \"Cat\";\n        break;\n      case '8':\n        winner = \"Monkey\";\n        break;\n      case '9':\n        winner = \"Elephant\";\n        break;\n      case '10':\n        winner = \"Lion\";\n        break;\n      default:\n        winner = \"N/A\";\n    }\n\n    this.setState({\n      lastLuckyAnimal: winner\n    })\n  }.bind(this));\n}",
      "language": "javascript",
      "name": "index.js"
    }
  ]
}
[/block]
## 4.4 Place your Bets
Player Interaction Flow: 
1. Enter a number value for amount of AION to be betted
2. Click on an animal to place the bet
  * Once clicked, AIWA should pop up and prompt the user to review the transaction and ask for sign off. 
  * `setupListeners()` is the function that listens for this click event


`voteNumber()` Logic: 
* Checks if the bet amount is in between the minimum and maximum bet value
* Initializes a transaction object (which encodes the `bet()` method in the smart contract, and relevant information that we'll need to send to the contract)
* Prompts AIWA to allow the user to review and send the transaction. 


[block:callout]
{
  "type": "info",
  "body": "Read more about web3's <a href=\"https://docs.aion.network/docs/web3-eth#section-sendtransaction\" target=\"_blank\">sendTransaction() method</a>"
}
[/block]

[block:code]
{
  "codes": [
    {
      "code": "// Send Number to Contract\nvoteNumber(number, cb) {\n  \n  let voteCallObject; // Initialize tx object\n  let bet = (this.refs['aion-bet'].value).toString(); // Grab Aion Bet Amount\n  console.log('bet =', bet);\n  \n  if (!aiwaInjected) { // Check AIWA is enabled\n    alert(\"You will need to have AIWA enabled to place a vote\");\n\n  } else if (!bet || parseFloat(bet) < this.state.minimumBet) {\n    alert('You must bet more than the minimum')\n    cb()\n\n  } else {\n    // Create TX Object\n    voteCallObject = {\n      from: this.state.accounts,\n      to: contractAddress,\n      gas: 2000000,\n      value: web3.utils.toNAmp(bet),\n      data: myContract.methods.bet(number).encodeABI()\n    }\n\n    // Prompt AIWA\n    aiwa.eth.sendTransaction(\n      voteCallObject\n    ).then(function(txHash){\n      console.log('txHash:', txHash);\n      if (window.confirm('Click \"OK\" to see transaction hash.')) {\n        window.open(\n          'https://mastery.aion.network/#/transaction/'+ txHash,\n          '_blank' // <- This is what makes it open in a new window.\n        );\n      };\n      cb()\n    });\n  }\n}",
      "language": "javascript",
      "name": "index.js"
    }
  ]
}
[/block]

[block:callout]
{
  "type": "info",
  "title": "Did you get lost?",
  "body": "See the completed version on the <a href=\"https://github.com/aion-kimcodeashian/aion-roulette/\" target=\"_blank\">GitHub Repo</a>"
}
[/block]

[block:api-header]
{
  "title": "5. Run the Application!"
}
[/block]
**Congrats!** :fireworks:  You just finished coding up the front-end application! Now all you have to do is save your files & rebuild it. 

Rebuild your application by running this command (in the main project directory `/aion-roulette-tutorial`)
[block:code]
{
  "codes": [
    {
      "code": "npm run-script build",
      "language": "curl",
      "name": "Terminal"
    }
  ]
}
[/block]
And - let's spin up the local server so you can see your application and smart contract in action!
[block:code]
{
  "codes": [
    {
      "code": "http-server",
      "language": "curl",
      "name": "Terminal"
    }
  ]
}
[/block]
Check it out on your <a href="http://localhost:8080" target="_blank">localhost:8080</a>

You should be able to see the full decentralized application YOU just built on Aion's testnet!! 
It should look very similar to the <a href="https://aion-roulette.netlify.com" target="_blank">'real deal'</a> 😜

[block:api-header]
{
  "title": "6. How to Read Transactions"
}
[/block]
Alrighty  - now that you've got your application up and running (and presumably you've played around with it). You should probably see some activity on the <a href="https://mastery.aion.network/#/dashboard" target="_blank">Aion Mastery Dashboard.</a>

[block:callout]
{
  "type": "info",
  "body": "Check out the <a href=\"https://mastery.aion.network/#/account/a0e51f852783e5edd470657e8e3581b091816c37aa783e7e52f3a4638d16349c\" target=\"_blank\">contract activity</a> that is currently live with the **Aion Pet Roulette dApp**."
}
[/block]
If you click on **"Transaction Hash"** :bookmark-tabs: - you'll dive into a more detailed view of exactly what happens on the blockchain.

There are two types of contraction interactions:
1. **Bet Transaction** - A player places a bet on an animal
2. **Payout Transaction** - The last player of the round places a bet on an animal, which triggers the contract to generate a number from 1–10 and distribute prizes (all in 1 transaction)

Here are two screenshots that break down and translate what you see in the ***Transaction Details***. 
[block:callout]
{
  "type": "info",
  "body": "**Events** are what emits the **Txn Logs** (which we coded in the smart contracts). This is a great way to log what happens on the chain."
}
[/block]
## 6.1 Bet Transaction
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/ebe255c-Roulette_-_Vote_-_Explained.png",
        "Roulette - Vote - Explained.png",
        1960,
        1303,
        "#f8f5ea"
      ],
      "caption": ""
    }
  ]
}
[/block]
## 6.2 Payout Transaction
[block:image]
{
  "images": [
    {
      "image": [
        "https://files.readme.io/4f9c39f-Roulette_-_Payouts_-_explained.png",
        "Roulette - Payouts - explained.png",
        1817,
        1292,
        "#eeedde"
      ],
      "caption": ""
    }
  ]
}
[/block]
# Need Help?

If you get stuck, try searching these docs 👆 or head over to our <a href="https://gitter.im/aionnetwork/Lobby" target="_blank">Gitter channels</a> or <a href="https://stackoverflow.com/search?q=aion" target="_blank">StackOverflow</a> for answers to some common questions.
[block:callout]
{
  "type": "info",
  "title": "",
  "body": "Written by **<a href=\"https://twitter.com/KimCodeashian\" target=\"_blank\">Kimcodeashian</a>** :fire:"
}
[/block]