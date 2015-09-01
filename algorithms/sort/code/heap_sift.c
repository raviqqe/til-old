//
// heap_sift.c
// heap sort
//

//BEGIN
void sift (int s, int t, int arr[])
{
  int w = arr[s], i = s, j = 2 * s;

  while (j <= t) {
    if (j < t && arr[j] < arr[j+1])
      j += 1;
    if (w >= arr[j])
      break;
    arr[i] = arr[j];
    i = j;
    j = 2 * i;
  }

  arr[i] = w;
}
//END
