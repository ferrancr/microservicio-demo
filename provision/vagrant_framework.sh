# Directorio raiz del proyecto. Cambialo si necesitas que sea otro
webroot="/var/www/microservicio"

echo "donwload & install redbeanphp"
# Importamos del composer el slim, como usuario vagrant
cd ${webroot}/framework
composer require slim/slim "^3.0"
# Recuperamos el ORM redbeanphp, para prototipar y configurar
cd /tmp/
wget http://www.redbeanphp.com/downloadredbean.php --output-document="redbeanphp.tar.gz"
mkdir -p ${webroot}/framework/vendor/rb
cd ${webroot}/framework/vendor/rb
tar -zxvf /tmp/redbeanphp.tar.gz
# Crear la base de datos
echo "CREATE DATABASE IF NOT EXISTS microdemo;
CREATE USER 'micro'@'localhost' IDENTIFIED BY 'demo123123123!';
GRANT ALL PRIVILEGES ON microdemo.* TO 'micro'@'localhost'" | mysql -u root 
# Definimos la estructura de la base de datos para guardar el arbol de enlaces.
# y lo rellenamos con una relación de datos iniciales.
cd ${webroot}/framework/
echo "Define tables and initial data"
php microdemo/init.php
