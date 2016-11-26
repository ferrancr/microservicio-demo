#!/bin/sh
# Directorio raiz para la descarga del composer.
#     Cambialo si necesitas que sea otro
base_dir="/home/vagrant"
# Directorio de trabajo. Cambialo si necesitas que sea otro.
dir_name="bin"

tmp_dir=${base_dir}/${dir_name}
cd $base_dir
# Creamos el directorio de trabajo.
mkdir ${dir_name}
# Recuperarmos signtura
EXPECTED_SIGNATURE=$(wget https://composer.github.io/installer.sig -O - -q)
# Descargamos el paquete
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")
# Si todo ha ido bien, procedemos a realizar la instalación
if [ "$EXPECTED_SIGNATURE" = "$ACTUAL_SIGNATURE" ]
then
    php composer-setup.php --quiet --install-dir=${tmp_dir}
    RESULT=$?
    rm composer-setup.php
    echo "copy ${tmp_dir}/composer.phr /usr/local/bin/composer"
    cp ${tmp_dir}/composer.phar /usr/local/bin/composer
    exit $RESULT
else
    >&2 echo 'ERROR: Invalid installer signature'
    rm composer-setup.php
    exit 1
fi


