## Secure python_flask eval execution by 
1.blocking malcious keyword like os,eval,exec,bind,connect,python,socket,ls,cat,shell,bind <br>
2.Implementing regex: r'0x[0-9A-Fa-f]+|\\u[0-9A-Fa-f]{4}|%[0-9A-Fa-f]{2}|\.[A-Za-z0-9]{1,3}\b|[\\\/]|\.\.'


Bypass with python_flask ASCII code execution

open('/'+'f'+'l'+'a'+'g'+'.'+'t'+'x'+'t').read()

### / and . is the integer so that change that into character

open(chr(47)+'f'+'l'+'a'+'g'+chr(46)+'t'+'x'+'t').read()
