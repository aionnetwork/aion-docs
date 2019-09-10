# Project Structure

A project is made up of one or multiple _contracts_. Contracts is made up of one or multiple _classes_. A project directory looks something like this:

```text
exampleproject <------------------------------- Project
├── lib
├── pom.xml
└── src <-------------------------------------- Contract
    └── main
        └── java
            └── aionexample
                └── ExampleProject.java <------ Class
                └── HelperClass.java <--------- Class
```

There is only one contract in the above example. A project that has multiple contracts would look something like this:

```text
exampleproject <------------------------------- Project
├── lib
├── pom.xml
├── counter <---------------------------------- Contract
|   └── src  
|       └── main
|           └── java
|               └── aionexample
|                   └── ExampleProject.java <-- Class
|                   └── HelperClass.java <----- Class
└── runner  <---------------------------------- Contract
    └── src  
        └── main
            └── java
                └── aionexample
                    └── ExampleProject.java  <- Class
                    └── HelperClass.java  <---- Class
```

When a _contract_ is compiled, all the classes within that contract are packaged together. In the example above, if we compile the `counter` contract, then the compiler will package `ExampleProject.java` and `HelperClass.java` together into one contract and deploy it to a single address. Each class **does not** get it's own contract address.
