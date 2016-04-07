import socket, threading
import os
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind(('', 10011))
s.listen(1)
 
lock = threading.Lock()
 
welcome_message = 'Welcome to Webister\npwr. Shutdown Server\nrestart. Restarts Server\nserver. Restarts Webister\nmysql. Restarts Mysql Server\nexit. Exits the Server\n>'
cc = '>'
def play_sound():
    #sound the horn
    return
 
def open_window():
    # open a window
    return
 
class daemon(threading.Thread):
 
    def __init__(self, (socket,address)):
        threading.Thread.__init__(self)
        self.socket = socket
        self.address = address
 
    def run(self):
 
        # display welcome message
        self.socket.send(welcome_message)
 
        while(True):
 
            # wait for keypress + enter
            data = self.socket.recv(1024)
 
            # handle menu alterantives and set proper return message
            if data[0] == 'pwr':
                os.system("shutdown now")
            elif data[0] == 'restart':
                os.system("sudo reboot")
            elif data[0] == 'server':
                os.system("service webister restart")
            elif data[0] == 'mysql':
                os.system("service mysql restart")
            elif data[0] == 'exit' :
                self.socket.close()
            else:
                data = cc
 
            # send the designated message back to the client
            self.socket.send(data);
 
        # close connection
        self.socket.close()
 
while True:
    daemon(s.accept()).start()
