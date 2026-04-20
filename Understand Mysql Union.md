# Total 654 rows

select * From employees;

<img width="984" height="307" alt="image" src="https://github.com/user-attachments/assets/36b8c506-089a-4fa7-a06f-aa7ae2b5413d" />

# Total 9 rows

selct * from departments;

<img width="835" height="499" alt="image" src="https://github.com/user-attachments/assets/a0bf99d1-7d96-4882-8599-d3d4eea52f85" />

# Combind those records (1,4,5,6 are substitute records)
## total 663 rows, only rows are added columns won't change

select * from employees Union Select dept_no,dept_name,1,4,5,6 FROM departments;   

<img width="1021" height="546" alt="image" src="https://github.com/user-attachments/assets/fd5a7eb4-76e9-4391-8fa3-6568a56d957d" />

