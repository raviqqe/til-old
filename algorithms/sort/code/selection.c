//
// selection.c
// selection sort
//

#include <stdio.h>

int main (int argc, char* argv[])
{
  int i, j, min, pos;
  int n = argc - 1;
  int arr[n];
  
  for (i=0; i<n && i<n; i++)
    arr[i] = atoi(argv[i+1]);

  //BEGIN
  for (i=0; i<n-1; i++) {
    min = arr[i];
    pos = i;
    for (j=i+1; j<n; j++)
      if (arr[j] < min) {
        min = arr[j];
        pos = j;
      }
    arr[pos] = arr[i];
    arr[i] = min;
  }
  //END
  
  for (i=0; i<n; i++)
    printf("%d\n", arr[i]);

  return 0;
}
