# c coding guide

## separate and hide implementation of struct type

```
typedef struct {
  some_type_t member_1_;
  any_type_t member_2_;
  ...
} impl_struct_t_;

typedef impl_struct_t_ public_struct_t;
```


