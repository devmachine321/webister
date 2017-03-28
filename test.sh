echo Testing PHP Please Wait
OUTPUT="$(find application -iname "*.php" -exec php -l {} \; )";
myfunc() {
    find ../ -iname "*.php" -exec php -l {} \;
   reqsubstr="$1"
    shift
    string="$@"
    if [ -z "${string##*$reqsubstr*}" ] ;then
        echo "Error has been detected. System Halting";
        exit 2;
    fi
    }
    myfunc 'Php Error' $OUTPUT
    
    echo "Success Command Completed Successfully."
    exit 0;
