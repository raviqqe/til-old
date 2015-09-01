//
// bubble.c
// bubble sort
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
  for (i=n-1; i>0; i--) {
    for (j=0; j<i; j++) {
      if (arr[j] > arr[j+1]) {
        tmp = arr[j];
        arr[j] = arr[j+1];
        arr[j+1] = tmp;
      }
    }
  }
  //END
  
  for (i=0; i<n; i++)
    printf("%d\n", arr[i]);

  return 0;
}
