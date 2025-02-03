#include<stdio.h>

int main()
{
    int position=1;
    switch(position)
    {
        case 1:
            printf("You are in 1st position");
      
        case 2:
            printf("You are in 2nd position");
            break;

        case 3:
            printf("You are in 3rd position");
        

        default:
            printf("You are not in top 3 positions");
    }
}