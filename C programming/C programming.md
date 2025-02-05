```
&lt; less than

&gt; greater than

!= not equal to

== equal to

<b>&lt;=</b> less than or equal to

&gt;= greater than or equal to
```
# Scanf()

scanf() is used as user input
------------------------------
int num1
scanf ("Enter num1", &num1);

# Increment & Decrement

As it's common to increment and decrement a variable's value by 1 in loops, C provides special increment and decrement operators.

For example, num=num+1&nbsp;can be shortened to num++:

```
#include <stdio.h>

int main() {
    int num = 1;
    while (num < 5) {
        printf("%d \n", num);
        num++;
    }

    return 0;
}

```
# Shorthand Operators

Sometimes you might need to increase or decrease the value of a variable by a different value than 1. 
For these cases, C provides shorthand operators, too!
For example, num=num+3 can be shortened to num+=3:

# While and do while loop differences

![image](https://github.com/user-attachments/assets/36c7ea47-6902-46b9-b310-7b86bae2d30d)

```
#include <stdio.h>

int main() {
    int num = 0;
    do {
        printf("%d \n", num);
        num += 3;  
    } while (num < 10);

    return 0;
}
```


Your program needs to output star * symbols, based on the input.
For example, for the input 5, the output should be *****.
Task:
Take an integer number from input, then output that number of star symbols.

```
#include<stdio.h>

int main(){
    int num=0;
    scanf("Enter star numbers %d", &num);
    int i=0;
    while (i < num)
    {
        printf("*");
        i++;
    }
    return 0;
}

```

# How many numbers will the following loop output?

```
for(int x=3;x<10;x++) {
  if(x == 5) {
    continue; 
  }
  if(x == 7) {
    break;
  }
  printf("%d \n", x);
}
```
# To successfully read the data type using != 1

```
#include <stdio.h>

int main()
{
    float height;
    printf("Enter your height = ");
    
    // Check if scanf successfully reads a float
    if (scanf("%f", &height) != 1)
    {
        printf("Your data type is wrong\n");
        return 1;  // Exit with error
    }
    
    if (height > 90)
    {
        printf("Allowed to go\n");
    }
    else if (height < 90)
    {
        printf("You cannot go\n");
    }
    
    return 0;
}
```
# Create a program that calculates and outputs the number of win for the given team.

```
#include <stdio.h>

int main() {
    int results[] = {0, 1, 0, 0, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 1, 1, 0, 1};
    int totalWins = 0;
    int totalgames= sizeof(results)/ sizeof(results[0]);
    for (int i=0; i< totalgames; i++)
    {
        if (results[i] == 1)
        {
            totalWins++;
        }
    }
    printf("%d", totalWins);
    
    
    return 0;
}

In order to know the total number of elements in array

![image](https://github.com/user-attachments/assets/539bafd4-f6d6-4647-93e1-38f4a33e1447)

```
