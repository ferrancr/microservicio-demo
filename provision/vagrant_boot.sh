echo "Update the repository."
apt-get update >/dev/null
echo "install mysql"
DEBIAN_FRONTEND=noninteractive apt-get install mysql-server-5.5 -y 
echo "install Apache"
apt-get install apache2 -y 
echo "Install PHP and Apache\'s mod_php extension."
apt-get install php5 libapache2-mod-php5 php5-mcrypt php5-json -y 
apt-get install php5-gd php5-mysql -y >/dev/null
echo "copy default virtualhost"
cp /vagrant/provision/etc/000-default.conf /etc/apache2/sites-available/
echo "Active rewrite engine into Apache2"
a2enmod rewrite
echo "Intall PHP Composer."
echo "Previos upgrade libssl1"
apt-get install --only-upgrade libssl1.0.0 -y

service apache2 start
echo "Composer"
/bin/sh /vagrant/provision/composer_php.sh
if [ $? -ne 0 ]; then
    echo "No se ha podido instalar composer, eso impide instalar slim"
    exit 1
fi

