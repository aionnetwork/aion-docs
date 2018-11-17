In the **config.xml** file, you can modify the <log> section depending on how much information you need displayed from the kernel.

# Log Levels

There are five log levels available for each of the modules (from least to most, where TRACE gets every log printout):

- ERROR
- WARN
- INFO
- DEBUG
- TRACE

If you don't want the log to be stored in your disk (only printed in terminal), set <log-file> to false:

```javascript
{
  "codes": [
    {
      "code": "<log>\n        <!--Enable/Disable logback service; if disabled, output will not be logged -->\n        <log-file>false</log-file>\n        <!--Sets the physical location on disk where log files will be stored.-->\n        <log-path>log</log-path>\n        <GEN>INFO</GEN>\n        <VM>ERROR</VM>\n        <SYNC>INFO</SYNC>\n        <CONS>INFO</CONS>\n        <DB>ERROR</DB>\n        <API>INFO</API>\n        <P2P>INFO</P2P>\n        <TX>INFO</TX>\n        <TXPOOL>INFO</TXPOOL>\n</log>",
      "language": "xml"
    }
  ]
}
```