command -v dpkg-sig >/dev/null 2>&1 || { echo >&2 "I require dpkg-sig but it's not installed.  Aborting."; exit 1; }
echo "Compiling Packages..."
dpkg-deb --build application
echo "Signing Packages..."
gpg --import sign.asc
sudo dpkg-sig  application.deb -s "thomas" -k 48CD53C6 -m tecflare --also-v2-sig    
echo "Installing Package..."
rm -rf /var/webister
rm -rf /tmp/webister
dpkg -i application.deb
echo "Cleaning Up.."
rm -rf application.deb