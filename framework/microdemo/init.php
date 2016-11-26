<?php
define('__ROOT__', dirname(__DIR__));
require_once(__ROOT__.'/fullspeed.php'); 

R::freeze(false);
R::nuke();

$tags = array( "microservices");
// A medida que vamos incorporando enlaces definimos el modelo para linketeca
$link = R::dispense("linketeca");
$link->url = "https://www.google.es/";
$link->title = "microservices - Buscar con Google";
$link->note = null;
$link->wordsSearch = "microservices";
$link->created = R::isoDateTime();
R::tag( $link,  $tags );
R::store($link);
$before = $link;

$link = R::dispense("linketeca");
$link->url = "http://www.martinfowler.com/articles/microservices.html";
$link->title = "microservices";
$link->parent = $before;
$link->before = $before;
$link->note = null;
$link->created = R::isoDateTime();
R::tag( $link, $tags );
R::store($link);
$before = $link;

$tags = array( "microservices","RESTfull");

$link = R::dispense("linketeca");
$link->url = "http://www.ibm.com/developerworks/library/x-slim-rest/";
$link->title = "Create REST applications with the Slim micro-framework";
$link->before = $before;
$link->note = "Ademas: Utiliza redbeanphp como interface de la base de datos para realizar prototipos rapidos.";
$link->created = R::isoDateTime();
R::tag( $link, $tags );
R::store($link);
$parent = $before = $link;


$link = R::dispense("linketeca");
$link->url = "http://www.redbeanphp.com/index.php?p=/quick_tour";
$link->title = "redbeanphp quick tour";
$link->parent = $parent;
$link->before = $before;
$link->created = R::isoDateTime();
R::tag( $link, $tags );
R::store($link);
$before = $link;

$link = R::dispense("linketeca");
$link->url = "https://www.google.es/";
$link->title = "apache web server , and PUT and DELETE requests. - Buscar con Google";
$link->parent = $parent;
$link->before = $before;
$link->wordsSearch = "apache web server , and PUT and DELETE requests";
$link->created = R::isoDateTime();
R::tag( $link, $tags );
R::store($link);
$before = $link;


$link = R::dispense("linketeca");
$link->url = "https://bitworking.org/news/PUT_SaferOrDangerous";
$link->title = "PUT Safer Or Dangerous";
$link->parent = $before;
$link->before = $before;
$link->created = R::isoDateTime();
R::tag( $link, $tags );
R::store($link);
$before = $link;

$tags = array( "frameworks");
$link = R::dispense("linketeca");
$link->url = "https://bitworking.org/news/2014/05/zero_framework_manifesto";
$link->title = "No more JS frameworks";
$link->before = $before;
$link->created = R::isoDateTime();
R::tag( $link, $tags );
R::store($link);

$tags = array( "composer",'tutorial');
$link = R::dispense("linketeca");
$link->url = " http://vegibit.com/composer-autoloading-tutorial/";
$link->title = "Composer autoloading tutorial";
$link->note = "Con claridad y detalle explicado el composer autoload.  El PSR-0 ya no se utiliza, ahora hay que seguir la recomencaicón PSR-4";
$link->created = R::isoDateTime();
R::tag( $link, $tags );
R::store($link);
R::close();