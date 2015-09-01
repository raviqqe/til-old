//
// quick.c
// quick sort
//

#include <stdio.h>

int main (int argc, char* argv[])
{
  int i, j, tmp;
  int n = argc - 1;
  int arr[n];
  
  for (i=0; i<n; i++)
    arr[i] = atoi(argv[i+1]);

  //BEGIN
  //work in progress
  //END
  
  for (i=0; i<n; i++)
    printf("%d\n", arr[i]);

  return 0;
}
