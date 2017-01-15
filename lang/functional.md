# Functional programming

## Y\* combinator

```
\fs.
  (\x. x x)
  (\genfs. map (\f arg1 ... argN. f (genfs genfs) arg1 ... argN) fs)
```

where

$$
fs\_i : [Function] -> X\_{i,1} -> X\_{i,2} -> ... -> X\_{i,m\_i} -> Y\_i
$$
