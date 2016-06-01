# CUDA

## Running multiple processes each of which utilizes a GPU

Mask GPUs for each process.

```
$ CUDA_VISIBLE_DEVICES=0 run_command
```


## `/dev/nvidia-uvm` is missing

When `/dev/nvidia-uvm` is missing, try running sample codes.
(On Fedora 23, they would be found in `/usr/local/cuda/samples`.)
