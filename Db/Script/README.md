# ScriptInterface
Defines the interface that any PHP change script must implement.

With the complexity of managing multiple schema's in multiple cluster's we can't afford the luxury of simple sql scripts any more.
That being said, this proposal stipulates that only PHP change scripts will be supported from now own.

## ScriptAbstract
Boilerplate Script to ease stamping out change scripts. Most scripts can extend this class and only find it necessary to specify the appropriate <Adapter>AwareInterface, and override getSqlStatements() to return the sql to be executed.

It may be necessary that a script requires multiple adapters, reading from one and writing to another, etc. ScriptAbstract may still be an appropriate base class, or not. Up to the developer to make that decision.