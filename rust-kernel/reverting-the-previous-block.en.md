Aion Rust Kernel allows users to revert database to a curtain block
number. This functionality is meant for removing from the database all
blocks greater than the one given as parameter. **The revert feature
makes permanent changes to the database. If you are unsure about using
it, back-up the database first.**

$ ./aion \[--chain=\<config/path/of/chain\>.toml\] revert --to=10

\> Loading config file from \<config/path/of/chain\>.toml

\> 2019-01-02 18:19:38 Configured for \<network\_name\> using
POWEquihashEngine engine

\> 2019-01-02 18:19:39 Attempting to revert best block from 24 to 10 ...

\> 2019-01-02 18:19:39 Revert BlockChain to \#10 completed in 310 ms

Or with quick launch script:

$ ./mainnet.sh revert --to=10

\> 2019-01-23 10:40:01 Configured for Mainnet using POWEquihashEngine
engine

\> 2019-01-23 10:40:02 Attempting to revert best block from 20077 to 10
...

\> 2019-01-23 10:40:02 \#20000

\> 2019-01-23 10:40:02 \#19000

\> 2019-01-23 10:40:02 \#18000

\> 2019-01-23 10:40:02 \#17000

\> 2019-01-23 10:40:02 \#16000

\> 2019-01-23 10:40:02 \#15000

\> 2019-01-23 10:40:02 \#14000

\> 2019-01-23 10:40:02 \#13000

\> 2019-01-23 10:40:02 \#12000

\> 2019-01-23 10:40:02 \#11000

\> 2019-01-23 10:40:02 \#10000

\> 2019-01-23 10:40:02 \#9000

\> 2019-01-23 10:40:02 \#8000

\> 2019-01-23 10:40:02 \#7000

\> 2019-01-23 10:40:02 \#6000

\> 2019-01-23 10:40:02 \#5000

\> 2019-01-23 10:40:02 \#4000

\> 2019-01-23 10:40:02 \#3000

\> 2019-01-23 10:40:02 \#2000

\> 2019-01-23 10:40:02 \#1000

\> 2019-01-23 10:40:02 Revert BlockChain to \#10 completed in 1255 ms
