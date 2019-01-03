---
Title: Java API
---

# Java API

The Java API provides high throughput connection to the kernel and is ideal for Java applications.

## Setup

The use of the Java API is enabled from the kernel configuration file `config.xml` (`aion/config/config.xml`). The active attribute must be set to "true" before starting the kernel to allow the API to interact with the Aion network through the local kernel.

```json
{
  "codes": [
    {
      "code": "<api>\n  <java active=\"true\" ip=\"127.0.0.1\" port=\"8547\"></java>\n  <!-- other API settings -->\n</api>",
      "language": "xml"
    }
  ]
}
```

## Dependencies

An application interacting with the Aion kernel through the Java API must include the following `jar` dependencies:

- `modAionBase.jar`
- `modAionApi-[version].jar`

The modAionBase.jar contains the classes in [modAionBase](https://github.com/aionnetwork/aion/tree/master/modAionBase). The `jar` file can be found in the `mod` folder delivered with every [kernel release](https://github.com/aionnetwork/aion/releases), or it can be compiled from the sources available online inside the module.

The latest release for `modAionApi-[version].jar` is available online in the [`aion_api`](https://github.com/aionnetwork/aion_api/releases) project. Alternatively, the file can be created by compiling the source files.

## Use

To use the Java API in an application, first, the `IAionAPI` object must be initialized. Then a connection must be established to a kernel, as shown below:

```json
{
  "codes": [
    {
      "code": "// connect to Java API\nIAionAPI api = IAionAPI.init();\nApiMsg apiMsg = api.connect(IAionAPI.LOCALHOST_URL);\n\n// failed connection\nif (apiMsg.isError()) {\n    System.out.format(\"Could not connect due to <%s>%n\", apiMsg.getErrString());\n    System.exit(-1);\n}\n\n// code to use API\n// ...\n\n// disconnect from api  \napi.destroyApi();",
      "language": "java"
    }
  ]
}
```

If the kernel is running on the same machine as the application using the API, the connection is established through the call:

```java
api.connect(IAionAPI.LOCALHOST_URL);
```

Otherwise, the host and port where the kernel is running must be passed as parameters, for example, assuming the IP is `123.123.123.123` and the port is `4567`:

```java
api.connect("tcp://123.123.123.123:4567");
```