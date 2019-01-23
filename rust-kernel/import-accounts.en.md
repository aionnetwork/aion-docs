Aion Rust Kernel can import accounts from previous binaries, Aion(Java)
Kernel, and private keys.

**Import from previous Aion Rust binary**

If a new Aion Rust Kernel binary is coming out,

  - you can simply replace the old binary file with the new binary and
    launch it with the old config.toml file. Any data from the old
    binary, including chains(databases), keys(accounts) and caches, will
    be accessible for new binary.

**OR**

  - you can setup a new work base folder by adding base\_path in
    configuration:

\[aion\]

base\_path = "new/location/path"

and import old accounts using CLI:

\# aion\_new: new binary name

./aion\_new --config="/config/toml/path" account import
"old\_base/keys/chain\_name/\*"

**Import account from Aion(Java) Kernel**

If you use Aion(Java) Kernel and want to import its keystore files into
Rust Kernel, go to Rust Kernel directory and enter: ./aion account
import \<path/to/aion/keystore/files\> And you can find imported
keystore files in $BASE/keys/\<chain\_name\>

**Import from private keys**

To import private keys into Rust Kernel, go to Rust Kernel directory and
enter:

./aion account import-by-key \<private key\>

Loading config file from path/to/config.toml

please type password:

please repeat password:

A new account has been created: \<new\_aion\_address\>

**View accounts in the current Kernel**

Check if the accounts imported into the current keys, enter

./aion account list

The imported accounts should be showed in the list.

**Operate with a specific network**

If you want to do the account management for a specific network, you
can:

  - if the network is mainnet, mastery, or custom, use the commands
    above and replace ./aionwith the quick run
    script ./mainnet.sh, ./mastery.sh, or ./custom.sh;

  - Or if the network is not packed in the binary folder, run:

./aion --config=path/to/configuration/file --chain=path/to/chain/file
\<operation commands\>
