# Summary of Google C++ Style Guide

## Background

C++ sucks.


## Header files

### Include guard

```
#ifndef FOO_H_
#define FOO_H_

...

#endif // FOO_H_
```


### Inline functions

Use inline functions if they have 10 lines or less.

(My opinion: the modern compilers are smarter than humen. So, we don't need
it and just use their optimization options.)


### Function parameter ordering

```
Foo(input_1, ..., input_n, output_1, ..., output_n);
```


### Names and order of includes

foo.cc

```
#include "dir1/foo.h" // header this source implements

#include <sys/types.h> // C system files
#include <unistd.h>
#include <iostream> // then C++ system files
#include <vector>

#include "dir1/bar.h"
#include "dir2/baz.h" // alphabetically
```


## Scoping

### Namespaces

```
galaxy {
earth {

...

} // namespace earth
} // namespace galaxy
```

* Anonymous namespaces are allowed and encouraged only in .cc files
* Don't use anonymous namespaces in .h files.
* Don't use inline namespaces.

* Using delactives is banned.
* Using declaration (e.g. using ::foo::bar;) is allowed in .cc files and in
  functions, methods, or classes in .h files.
* Namespace aliases (e.g. namespace fb = ::foo::bar;) are allowed in .cc files,
  and named namespace in .h files, and in functions and methods.

* Don't use nested classes.

* Prefer non-member functions or static member functions to global functions.

* Static variables in functions or global variables of class type are
  forbidden.


## Classes

### Doing work in constructors

* Don't raise errors in constructors.
* Use Init() methods or factory functions to do complex initialization.


### Initialization


## Google-specific magic


## Other C++ features


## Naming

Eschew abbreviation.

### File names

file\_name.cc
file\_name.h

### Type names

```
typedef std::vector<int> SomeType;
class ClassName { ... };
struct StructName { ... };
enum SomeEnum { ... };
```

### Varable names

```
int variable_name;
char all_lower_case[256];
```





## Comments


## Formatting

### Line length

At most, 80 characters per line.

### Non-ASCII characters

If needed, use UTF-8.

### Spaces vs tabs

2 spaces.

But, for private / public / protected labels in classes;

```
class Foo {
 private:
  int x;
  int y;

 public:
  int getter();
  int setter(int value);
};
```

