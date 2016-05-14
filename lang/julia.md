# Julia

## Building from source

```
$ git clone https://github.com/JuliaLang/julia
$ cd julia
$ make -j $num_of_cpu_cores
```


## Packages

When failed to add a package, you may have to build it.

```
$ Pkg.build("package_name")
```
