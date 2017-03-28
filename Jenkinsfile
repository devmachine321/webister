node {
   stage 'build'
   sh 'rm -rf webister && git clone https://github.com/alwaysontop617/webister.git'
   sh 'cd webister && cp * ../'
   sh 'echo "Compiling Packages..."';
   sh 'dpkg-deb --build application';
   sh "wget https://github.com/alwaysontop617/webister/archive/master.zip";
   
   stage 'req'
   sh 'wget https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v2.1.2/php-cs-fixer.phar -O php-cs-fixer'
   parallel 'test': {
   sh 'wget https://raw.githubusercontent.com/alwaysontop617/webister/master/test.sh'
   sh 'sh test.sh > log.txt'
   }
   
   stage 'md5'
   sh 'md5sum master.zip application.deb log.txt > md5.txt'
   
   stage 'archive'
   archive 'master.zip'
   archive 'application.deb'
   archive 'log.txt'
   archive 'md5.txt'
}


