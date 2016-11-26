# microservicio-demo
(Provisional) Demo about micro-services with Slim &amp;  Redbeanphp

La demo se basará em crear un sistema de marcadores de enlaces catalogado por etiquetas y trazabilidad. En la actualidad solo está creado el entorno con una base de datos rellenado con datos iniciales y un par de llamadas GET.

## Requisitos

El entrono está preparada para ser creado y configurado por Vagrant y Virtualbox tecleando el comando

 vagrant up

Pero en el caso de que quieras crear tu propio entorno puedes repasar el contenido de los scripts para Vagrant, que estan el directorio provision
* provision/vagrant_boot.sh // Estan indicado los módulos de PHP que se utilizan. Instalación de los servidores MySQL y Apache.
* provision/etc/000-default.conf // La configuracion del VirtualHost de Apache
* provision/composer_php.sh // Instalación del Composer PHP
* provision/vagrant_framework.sh // Instala el Slim con Composer; Añade el RedBeanPHP; Crea la base de datos, tablas y e inserta datos iniciales.

## Estructura de directorios
* /framework
* /framework/microdemo código del proyecto..
* /framework/vendor: software externo, Sim, RedBeanPHP
* /html: acceso externo a los servicios.

## Pruebas

Supongamos que el servidor es el 10.1.1.2

Para obtener la lista de etiquetas en JSON
curl -v http://10.1.1.2/index.php
curl -v http://10.1.1.2/

Para obtener la lista de enlaces de una etiqueta en JSON
curl -v http://10.1.1.2/index.php/tag/RESTfull
curl -v http://10.1.1.2/tag/RESTfull
