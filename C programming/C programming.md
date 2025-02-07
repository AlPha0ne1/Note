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
```
In order to know the total number of elements in array

![image](https://github.com/user-attachments/assets/539bafd4-f6d6-4647-93e1-38f4a33e1447)

# Note, that we dont need the & symbol before the variable in scanf(), because the variable is a char array.

```
int main()
{
    char message[3];
    printf("Give me a message = ");
    scanf("%s",message);
    printf("Message = %s", message);
    return 0;

}

```

# In case we need to take multiple words as input, we can use the fgets() function.
fgets() always reserves one space for the null terminator (\0).

```
int main() {
    char name[10];
    fgets(name, 10, stdin);

    printf("Hi %s.", name);
    
    return 0;
}

So, the buffer space is 9 characters including space.
```
# Take a string and a number from input, then output the letter in the string, which corresponds to that number.
For example:

Input: Hello 4

Output: o

Explanation: the letter with the index 4 in Hello is o, as the index starts from 0.

strlen() function cannot be used without the library string.h
```
#include <stdio.h>
#include <string.h>

int main() {
    char word[50];  
    int position;   

    // Taking input
    scanf("%s %d", word, &position);

    // Checking if the index is valid
    if (position >= 0 && position < strlen(word)) {
        printf("%c\n", word[position]);  // Output the character at the given index
    } else {
        printf("Invalid index\n");  // Handle invalid index cases
    }

    return 0;
}

```
# You are making a baggage fee calculator. It should take the weight of a bag as input, and output the fee.

Here are the rules: 

A bag weighing up to 23kg is free. After that, each kg is billed at $12. 

So, for example, a bag weighing 28kg will cost 5*12 = $60.

The given code calls a function called baggage() in main().

```
#include<stdio.h>

void baggage()
{
    int weight=0;
    printf("Enter the weight of baggage = ");
    scanf("%d", &weight);
    if (weight > 23 )
    {
        printf("%d", ((weight- 23 )* 12));
    }
    else
    {
        printf("0");
    }
    
}

int main() 
{
    
    baggage();
    return 0;
}
```
# Function with parameter

```
#include<stdio.h>

void character(char name[], int age)
{
    printf("My name is %s and I am %d years old", name, age);
}
int main() 
{
    character("Victor", 31);
    return 0;
}

```
# Pointer

Every variable in the memory has its unique address.
The address of a variable can be accessed using the & operator.

```
#include<stdio.h>

int main()
{
    int age = 244;
    printf("%p",&age);
    return 0;
}
```

A pointer is a variable that stores the memory address of another variable as its value.

```
#include<stdio.h>

int main()
{
    int age = 244;
    int *p = &age;
    printf("%p",p);
    return 0;
}
```
The asterisk * is also used to access the value stored at a memory address. It is called the dereference operator.

```
#include<stdio.h>

int main()
{
    int age = 244;
    int *p = &age;
    printf("%d",*p);
    return 0;
}
```
# Solving the pointers

```

#include <stdio.h>

void change(int *x, int y) 
{
  *x = y;  // Dereference x (i.e., update the value at x's address) and set it to y
  y = *x;  // Assign the value of *x to y (but this does NOT affect the caller)
}

int main() {
  int a = 8;
  int b = 3;
  change(&b, a);  // Pass b by reference (pointer) and a by value
  printf("%d", b);  // Output b

  return 0;
}

```

Key Takeaways
-------------
Pass-by-reference (int *x) allows modifying b inside change().
Pass-by-value (int y) does NOT affect a or anything in main().
Final output is 8 since b was updated to 8 in change().

# Another use-case of pointers are arrays.

The name of an array is actually a pointer to its first element.
For example:
```
#include <stdio.h>

int main() {
  int x[] = {1, 2, 3, 4};

  printf("%d", *x);

  return 0;
}
```

# x is an array.

x[2] is equivalent to: *(x+2)

Explanation 

*x + 2
*x gives the value at x[0], then +2 adds 2 to that value (not the correct interpretation of x[2]).

# One example is swapping values.  You have two variables values, which are taken from input, and you need to swap the values.

```
#include <stdio.h>

// Define the swap function
void swap(int *a, int *b) {
    int temp = *a;  // Store the value of *a in temp
    *a = *b;        // Assign the value of *b to *a
    *b = temp;      // Assign temp (original *a) to *b
}

int main() {
    int x, y;

    scanf("%d %d", &x, &y);

    printf("x is %d, y is %d\n", x, y); 
    swap(&x, &y);
    printf("x is %d, y is %d\n", x, y); 

    return 0;
}
```
#  Moves the pointer p forward by 3 elements

```
int arr[] = {6, 3, 1, 8, 4};
int* p = arr;
p += 3;
printf("%d", *p);

Answer ---> 8
```
# A structure is a user-defined data type that groups related variables of different data types.

***** Do not forget to put a semicolon after structure declaration. ******

By using sprint to declare the value in struct.

```
#include <stdio.h>

struct student {
    int age;
    int grade;
    char name[40];
};

int main() {
    /* declare two variables */
    struct student s1;
    struct student s2;
    
    s1.age = 19;
    s1.grade = 9;
    sprintf(s1.name, "John Bighimer");
    
    s2.age = 22;
    s2.grade = 10;
    sprintf(s2.name, "Batman Jokerson");
    
    printf("Student: %s, %d\n", s1.name, s1.age);
    printf("Student: %s, %d\n", s2.name, s2.age);
    
    return 0;
}
```
# A struct variable can also be initialized in the declaration by listing initial values in order inside curly braces:

```
#include <stdio.h>

struct student {
    int age;
    int grade;
    char name[40];
};

int main() {
    /* declare two variables */
    struct student s1 = {19, 9, "John Birghimer"};
    struct student s2 = {22, 10, "Batman Jokerson"};
    
    printf("Student: %s, %d\n", s1.name, s1.age);
    printf("Student: %s, %d\n", s2.name, s2.age);
    
    return 0;
}

```
# Using strcpy()

You have to declare string.h.
You cannot directly assign a string to a char[] like cs2.title = "Advanced C++";. Instead, use strcpy(cs2.title, "Advanced C++"); to copy the string into the title array.

```
#include <stdio.h>
#include <string.h>

typedef struct course {
  int id;
  char title[40];
  float hours; 
};

int main() {
  struct course cs1 = {341279, "Intro to C++", 12.5};
  struct course cs2;

  cs2.id= 38293;
  strcpy(cs2.title,"Advanced to C++");
  cs2.hours= 12;

   
  /* display course info */
  printf("%d\t%s\t%4.2f\n", cs1.id, cs1.title, cs1.hours);
  printf("%d\t%s\t%4.2f\n", cs2.id, cs2.title, cs2.hours);
  
  return 0;
}

%4.2f = only takes 2 steps in float for example (24.00)
```

# Using typedef

The typedef keyword creates a type definition that simplifies code and makes a program easier to read. 
A structure tag is no longer used, instead a typedef name appears before the struct declaration.

```
#include <stdio.h>
#include <string.h>

typedef struct {
    int id;
    char title[40];
    float hours; 
} course;

int main() {
    course cs1;
    course cs2;

    cs1.id = 123456;
    strcpy(cs1.title, "JavaScript Basics");
    cs1.hours = 12.30;

    /* initialize cs2 */
    cs2.id = 341281;
    strcpy(cs2.title, "Advanced C++");
    cs2.hours = 14.25;
       
    /* display course info */
    printf("%d\t%s\t%4.2f\n", cs1.id, cs1.title, cs1.hours);
    printf("%d\t%s\t%4.2f\n", cs2.id, cs2.title, cs2.hours);
  
    return 0;
}

```

# The members of a structure may also be structures

example structure point

```
#include <stdio.h>

typedef struct{
    int x;
    int y;
}point;

typedef struct{
    float radius;
    point center;

}circle;


int main()
{
    circle c={4.565, {44,555}};
    printf("Circle radius is %.2f and circle center is %d %d", c.radius, c.center.x, c.center.y);
    return 0;
}
```

# Pointer to Structure

```
#include <stdio.h>
#include <string.h>

struct student
{
    int age;
    char name[60];
    float id;
    
};

void showstudentinfo(struct student *s)
{
    
    printf("Age = %d \n", s -> age);
    printf("Name = %s \n", s -> name);
    printf("id = %.2f \n", s -> id);

}

int main()
{
    struct student s1={12,"Sakura",22.334};
    struct student s2;

    s2.age=24;
    strcpy(s2.name, "Victor");
    s2.id= 888.444;


    printf("Student1 info \n");
    showstudentinfo(&s1);
    printf("\n");

    printf("Student2 info \n");
    showstudentinfo(&s2);

    return 0;
}
```

# As you can see, update_course() takes a pointer as the parameter, while display_course() takes the structure by value.

```
#include <stdio.h>
#include <string.h>

typedef struct 
{
    char name[20];
    int id;
    int age;
    
}course;

void updatecourse(course *c)
{
    printf("Enter new name: ");
    scanf("%s", c->name);
    printf("Enter new id: ");
    scanf("%d", &c->id);
    printf("Enter new age: ");
    scanf("%d", &c->age);

}

void displaycourse(course c)
{
    printf("Name: %s\n", c.name);
    printf("Id: %d\n", c.id);
    printf("Age: %d\n", c.age);
}

int main()
{
    course c;
    updatecourse(&c);
    displaycourse(c);
    return 0;
}

```
****For a function to change the actual values in a struct variable: Pointer parameters are required****

# Array to structure

```
#include<stdio.h>
#include<string.h>

typedef struct 
{
    int id1;
    int id2;
    int id3;
}box;

int main()
{
    box boxes[3]={{1,2,3},{4,5,6},{7,8,9}};
    int i,volume;
    for (i=0;i<3;i++)
    {
        volume= boxes[i].id1* boxes[i].id2* boxes[i].id3;

        
    }
    printf(" Box %d has volume %d \n", i, volume );
    return 0;
}

```
# Union

A union allows to store different data types in the same memory location.

It is like a structure because it has members. However, a union variable uses the same memory location for all its member's and ****only one member at a time can occupy the memory location.*****

```
#include <stdio.h>

union val {
    int int_num;
    float fl_num;
    char str[20]; 
};

int main() {
    union val test;
    test.int_num = 42;
    printf("%d", test.int_num);
    return 0;
}

```
# Accessing Union Memebers
```
#include <stdio.h>
#include <string.h>

union val{
    int age;
    char name[60];
    float id;


};

int main()
{
    union val test;
    test.age=12;
    test.id= 11.133;
    strcpy(test.name, "Victor");

    printf("Age = %d \n ", test.age);
    printf("ID = %.2f \n ", test.id);
    printf("Name = %s \n ", test.name);

    return 0;
}
```
The last assignment overrides previous assignments, which is why str stores a value 
It actually prints only the name.

the statement -> strcpy(test.name, "Victor"); and printf("Name = %s \n ", test.name); must be the last to print the name.

# Structures With Unions 

```
#include <stdio.h>
#include <string.h>

typedef struct {
  char make[20];
  int model_year;
  int id_type; /* 0 for id_num, 1 for VIN */
  union {
    int id_num;
    char VIN[20]; 
  } id;
} vehicle;

int main() {  
  vehicle car1;
  strcpy(car1.make, "Ford");
  car1.model_year = 2017;
  car1.id_type = 0;
  car1.id.id_num = 123098;
  strcpy(car1.id.VIN, "ABC8904");
  
  printf("Make: %s\n", car1.make);
  printf("Model Year: %d\n", car1.model_year);
  if (car1.id_type == 1)
    printf("ID: %d\n", car1.id.id_num);
  else
    printf("ID: %s\n", car1.id.VIN);

  return 0;
}
```
# Pointers to Union

```
#include <stdio.h>

union val
{
    int num;
    float id;
};

int main()
{
    union val course;
    union val *ptr = NULL; //union val *ptr = &course;
    ptr = &course;
    ptr -> num=10;
    printf("Course Number = %d \n ", course.num);
    return 0;
}

```
# Union as Functional Parameters

```
#include <stdio.h>

union val
{
    float id;
    char name[60];
};

void set_id(union val *item)
{
    item-> id= 57.357;

}
void show_id(union val item)
{
    printf("Id = %.2f \n ", item.id);
}

int main()
{
    union val item;
    set_id(&item);
    show_id(item);
    return 0;
}
```
# An array is a data structure that stores collection values that are all the same type. Arrays of unions allow storing values of different types.

```
#include <stdio.h>

union type {
  int i_val;
  float f_val;
  char ch_val[40];
};

int main() {
  union type arr[3];
  arr[0].i_val = 42;
  arr[1].f_val = 3.14;
  strcpy(arr[2].ch_val, "xskjfjdskfj");
  printf("1st element is %d, 2nd is %.2f, and the 3rd is %s", arr[0].i_val, arr[1].f_val, arr[2].ch_val);
  
  return 0;
}

```
# Array with Unions

```
#include <stdio.h>

union val {
  int int_num;
  float fl_num;
  char str[20]; 
};

int main() {  
  union val nums[10];
  int k;
  
  /* create an array of ints */
  for (k = 0; k < 10; k++) {
    nums[k].int_num = k;
  }
  
  /* display array values */
  for (k = 0; k < 10; k++) {
    printf("%d  ", nums[k].int_num);
  }
  
  return 0;
}
```

# Dynamic allocation (heap)

Dynamic memory allocation is the process of allocating and freeing memory as needed. Now you can prompt at runtime for the number of array elements and then create an array with that many elements. Dynamic memory is managed with pointers that point to newly allocated blocks of memory in an area called the heap.

```
#include <stdio.h>

int main() {
    int arr[10];
    printf("%ld", sizeof(arr)); /* output: 40 */
    return 0;
}
```
# Memory Management Function

The stdlib.h library includes memory management functions. 

The statement #include <stdlib.h> at the top of your program gives you access to the following:

malloc(bytes) Returns a pointer to a contiguous block of memory that is of size bytes.

calloc(num_items, item_size) Returns a pointer to a contiguous block of memory that has num_items items, each of size item_size bytes. Typically used for arrays, structures, and other derived data types. The allocated memory is initialized to 0.

realloc(ptr, bytes) Resizes the memory pointed to by ptr to size bytes. The newly allocated memory is not initialized.

free(ptr)  Releases the block of memory pointed to by ptr. 

# Malloc Function

The malloc() function allocates a specified number of contiguous bytes in memory.

```
#include <stdio.h>
#include <stdlib.h>

int main() 
{
  int *ptr;
  ptr=malloc(10*sizeof(*ptr));
  if (ptr != NULL)
  {
    *(ptr+2)=50;
  }
  printf("3rd element equals to %d", *(ptr+2));
  return 0;
}


3rd elem equals to 50
```

# Free Function

The free() function is a memory management function that is called to release memory. By freeing memory, you make more available for use later in your program.

```
#include <stdio.h>
#include <stdlib.h>

int main() {  
  int *ptr;
  ptr = malloc(10*sizeof(*ptr));  /* a block of 10 ints */
  if (ptr != NULL)
    *(ptr+2) = 50;  /* assign 50 to third int */
  printf("%d\n", *(ptr+2));  /* 50 */

  free(ptr);

  return 0;
}

```
# Calloc Function

The calloc() function allocates memory based on the size of a specific item, such as a structure.
The program below uses calloc to allocate memory for a structure and malloc to allocate memory for the string within the structure:

```
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct {
  int num;
  char *info;
} record;

int main() {
  record *recs;
  int num_recs = 2;
  int k;
  char str[ ] = "This is information";

  recs = calloc(num_recs, sizeof(record));
  if (recs != NULL) {
    for (k = 0; k < num_recs; k++) {
      (recs+k)->num = k;
      (recs+k)->info = malloc(sizeof(str));
      strcpy((recs+k)->info, str);
    }
  }

  for (k = 0; k < num_recs; k++) {
    printf("%d\t%s\n", (recs+k)->num, (recs+k)->info);
  }

  return 0;
}

OUTPUT

0	This is information
1	This is information
```
calloc allocates blocks of memory within a contiguous block of memory for an array of structure elements. You can navigate from one structure to the next with pointer arithmetic.

After allocating room for a structure, memory must be allocated for the string within the structure. Using a pointer for the info member allows any length string to be stored.

Dynamically allocated structures are the basis of linked lists and binary trees as well as other data structures.

# Realloc Function

The realloc() function expands a current block to include additional memory.

```
#include <stdio.h>
#include <stdlib.h>

int main() {
  int *ptr;
  ptr = malloc(10*sizeof(*ptr));  /* a block of 10 ints */
  if (ptr != NULL) {
    *(ptr+2) = 50;  /* assign 50 to third int */
  }
  ptr = realloc(ptr, 100*sizeof(*ptr)); /* 100 ints */
  *(ptr+30) = 75;
  printf("%d %d", *(ptr+2), *(ptr+30));

  return 0;
}
```

# Realloc Function Next program

```
#include <stdio.h>
#include <stdlib.h>

int main() 
{
  
  int *arr=malloc(sizeof(int));      // Step 1: Allocate memory for 1 integer
  *arr = 13;                         // Step 2: Store the value 13 in the allocated memory
  arr= realloc(arr, 2*sizeof(int));  // Step 3: Reallocate memory for 2 integers
  *(arr+1)=*arr;                     // Step 4: Copy value of first integer to second integer
  printf("%d", *(arr+1));
  return 0;
}


Whether the original content (13) remains depends on realloc’s behavior:
If it expands in place, arr[0] is still 13.
If it moves to a new location, arr[0] will still be 13 because realloc copies the old data to the new block.

```
