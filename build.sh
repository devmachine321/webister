dpkg-deb --build app
rm -rf /var/webister
rm -rf /tmp/webister
dpkg -i app.deb