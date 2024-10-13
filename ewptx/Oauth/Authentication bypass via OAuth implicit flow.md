# Oauth Implicit Flow

The OAuth Implicit Flow is a simplified version of OAuth 2.0 primarily designed for client-side web applications (like single-page apps). It skips the need for an intermediary step (authorization code exchange) and directly issues an access token to the client via the browser. The key idea is to reduce complexity, but at the cost of reduced security.

For Example

1. You visit a photo-sharing web app.
2. The app asks you to login using your Google account.
3. You are redirected to Google’s login page and authorize the photo-sharing app to access your Google Photos.
4. Instead of receiving an authorization code, the photo-sharing app immediately gets an access token via the redirect URL after you authenticate.
5. The app uses this access token to fetch your Google Photos and display them.

In this flow, the access token is sent from the OAuth service to the client application via the user's browser as a URL fragment. The client application then accesses the token using JavaScript.
In the implicit flow, this POST request is exposed to attackers via their browser. As a result, this behavior can lead to a serious vulnerability if the client application doesn't properly check that the access token matches the other data in the request. In this case, an attacker can simply change the parameters sent to the server to impersonate any user.


# Wiener has completed the login access

![image](https://github.com/user-attachments/assets/da53fe9f-c2d0-47de-abbd-3a530d4dfc7f)

# Web application knows the client-id and display user's profile

![image](https://github.com/user-attachments/assets/0239a6fe-0fc7-45c4-b0f1-ca7530738a17)

![image](https://github.com/user-attachments/assets/931d62d7-8ca4-4d51-99a8-6653c5d09c4a)

# After that change the carlos gmail instead of wiener

![image](https://github.com/user-attachments/assets/22f3cba3-a717-44c1-af4c-74d0e550ba0f)

# In burpsuite, request in browser > in orginal session 

![image](https://github.com/user-attachments/assets/f83eb069-e653-4c2c-ac50-613b55668155)

Because of the lack of token validation, carlos user completed the login access










