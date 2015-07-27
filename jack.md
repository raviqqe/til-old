- copy inst as a const-and-var operand inst
- table driven inst processing
  - const-and-var operand inst
  - var(buff)-and-var operand inst
- error code to string function
- check enum type values

- use parsec and hadkell to make compiler, and its build system

- look at ninja's code
- mpi network is (almost) complete
- if the function rarely fails, just exit on errors.

- struct network_info {
    rank,
    num of procs,
    datatypes
  }

# assumption

- number of processors is limited
- each processor has infinite memory

- today's good may be tommorow's damned.

# naming convention

- Module
- Function
- Type
- variable
- CONSTANT
- MacroFunction
- OTHER_MACRO

exception queue

# message calculus
- send v to p1, p2, ..., pn
- send v to p(v)
- receive v from p and execute P

# pi calculus
- x! is done by multiple processors
- x? is done by only one processor
- new x.P
- P | Q


member operators
not synch node but synch program

lucid lang
purify and dirty functions on declaration

* frame array = node array and red black tree
* no recursive call
* no recursive data structure (use stream)
* deploy user defined functions to each processors on initialisation of programs

# structures

* structure = named tuple
* streamed args
* curried structures as tuple
* パターンマッチは多相性に悪影響
* Human (name, age, race) = f x
g name
は、
human = f x
g human.name
より、冗長で可読性も低い？
* module is a structure
* do structures exist just for programmers?
* naming types

* concise is better than verbose
* python like indentation as syntax
* 構造体モナドのid 要らないかも
* アドレス/メモリの抽象化
* 引数なし関数はすぐ評価される？
  * 限界までその場で評価？
* get and set operators for monad
  * << and >> ?
* function, monad, value, expression
* function declaration as expression

* モナド入りの式とモナド入りの式を用いた関数は全てdirty
* monad as matter or something?
* clojure's repl
* the way to make functions pure and dirty
* import statement
* invalid as keyword
* purify on declaration and desecrate on use
  * both as functions

* serialize tree

# layer design

* language specification
* theoritic implementation
* physical implementation

# why so sequential?

raven showing jack

- matlab's matrix implementation
- list is good abstraction
- implementable on intrinsically parallel computers
- list complehension
- dag and symlink