//
// heap.c
// heap sort
//

#include <stdio.h>
#include <stdlib.h>
#include "heap_sift.h"

int main (int argc, char* argv[])
{
  int i, tmp;
  int n = argc - 1;
  int arr[n];
  
  for (i=0; i<n; i++)
    arr[i] = atoi(argv[i+1]);

  //BEGIN
  for (i=n/2; i>=0; i--)
    sift(i, n-1, arr);

  for (i=n-1; i>0; i--) {
    tmp = arr[i];
    arr[i] = arr[0];
    arr[0] = tmp;
    sift(0, i-1, arr);
  }
  //END
  
  for (i=0; i<n; i++)
    printf("%d\n", arr[i]);

  return 0;
}
