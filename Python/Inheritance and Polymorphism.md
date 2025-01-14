# Inheritance

Boys class and Girls class use super().__init__() to inherit the Student Class.

# Polymorphism

If the same method is used by both classes that is called polymorphism. In this code that method is def watch()
```
class Student:
    def __init__ (self, name, age):
        self.name =name
        self.age =age

## Boys
class Boys(Student):
    
    def __init__ (self, name, age, game, anime):
        super().__init__ (name,age)
        self.game =game
        self.anime =anime
    
    def play(self):
        return f"{self.name} loves to play {self.game}, He is {self.age} years old"
    
    def watch(self):
        return f"{self.name} loves to watch {self.anime}"

## Girls
class Girls(Student):
    def __init__ (self,name,age, anime):
        super().__init__(name,age)
        self.anime =anime
        
    def watch(self):
        return f"{self.name} loves to watch {self.anime}, She is {self.age} years old"

def main():
    boy = Boys("Victor", 20, "Shinobi_striker","Demon Slayer")
    girl = Girls("Sakura",19, "Haikyuu")
    
    print(boy.play())
    print(boy.watch())
    print(girl.watch())
    
main()
```




