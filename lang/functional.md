# Functional programming

## Y\* combinator

$$
\lambda f. (\lambda x. x~x)~\lambda g. map~(\lambda f~a_1~\dots~a_n. f~(g~g)~a_1~\dots~a_n)~f
$$

where

$$
f : [Function]
f[i] : [Function] \rightarrow X_{i,1} \rightarrow X_{i,2} \rightarrow ... \rightarrow X_{i,m_i} \rightarrow Y_i
$$
