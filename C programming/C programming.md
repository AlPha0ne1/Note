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



