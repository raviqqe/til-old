# Rust

## Shared parameters among enum members

```
use self::Foo::*;

enum Foo {
  Bar { x: usize },
  Baz { x: usize },
}

fn main() {
  let foo = Bar { x: 123 };

  match foo {
    Bar { x } | Baz { x } => println!("{:?}", x),
  }
}
```
