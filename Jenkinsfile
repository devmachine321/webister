// see https://dzone.com/refcardz/continuous-delivery-with-jenkins-workflow for tutorial
// see https://documentation.cloudbees.com/docs/cookbook/_pipeline_dsl_keywords.html for dsl reference
// This Jenkinsfile should simulate a minimal Jenkins pipeline and can serve as a starting point.
// NOTE: sleep commands are solelely inserted for the purpose of simulating long running tasks when you run the pipeline
node {
   stage 'build'
   sh 'echo "Compiling Packages..."';
   sh 'dpkg-deb --build application';
   sh "wget https://github.com/alwaysontop617/webister/archive/master.zip";
   
   stage 'check pre-requirements'
   sh 'wget https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v2.1.2/php-cs-fixer.phar -O php-cs-fixer'
   sh 'php php-cs-fixer self-update'
   
   stage 'check system'
   sh 'for f in $(find /tmp -name '*.php' -or -name '*.php'); do php php-cs-fixer fix $f; done'
   
   stage 'archive'
   archive 'master.zip'
   archive 'application.deb'
}


