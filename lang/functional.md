# Functional programming

## Y\* combinator

$$
\lambda fs. (\lambda x. x x) (\lambda genfs. map (\lambda f arg_1 \dots arg_n. f (genfs genfs) arg_1 \dots arg_n) fs)
$$

where

$$
fs_i : [Function] \rightarrow X_{i,1} \rightarrow X_{i,2} \rightarrow ... \rightarrow X_{i,m_i} \rightarrow Y_i
$$
