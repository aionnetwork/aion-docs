Aion(Rust) Kernel, by default, only support local connection and does
not allow any tool or website to connect to the Kernel.

*Default Configuration:*

\[http\]

interface = "local"

hosts = \["none"\] \# equivalent to \[\]

cors = \["none"\] \# equivalent to \[\]

\[websockets\]

interface = "local"

origins = \["none"\] \# equivalent to \[\]

hosts = \["none"\] \# equivalent to \[\]

\[wallet\]

interface = "local"

\[stratum\]

interface = "local"

**Enable Remote Connections**

In order to let DApps and other tools connect to the Kernel remotely,
edit configuration interface field in each section:

  - interface = "local" or interface = "127.0.0.1" only allows the
    connections to "127.0.0.1" or "localhost";

  - interface = \[public IP address\] only allows the connections to
    that public address;

  - interface = "0.0.0.0" allows all the connections.

**Enable Connections from Other Hosts and Tools**

In order to let other web hosts to communicate with Kernel, you need to
add the host name into the hosts field
in \[rpc\] and \[websockets\] section; if you want to grant
permission for all websites, let hosts = \["all"\].

Kernel, by default, enabled Cross-Origin Resource Sharing. To make sure
other developing tools or extension tools connect to Kernel, edit
configuration cors field in \[rpc\] section or originsfield
in \[websockets\]:

  - cors = \["none"\] and origins = \["none"\] does NOT allow any
    origin;

  - cors = \["all"\] and origins = \["all"\] allows requests from any
    origin;

  - cors = \["chrome-extension://\*","moz-extension://\*"\] and origins
    = \["chrome-extension://\*","moz-extension://\*"\] allows the
    requests from chrome and firefox extensions.
