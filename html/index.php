<?php
// define('LITTLE_AUTOLOAD', true);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require "../framework/fullspeed.php";

$app = new \Slim\App(["settings" => $config]);

// handle GET requests for /links
$app->get('/', function (Request $request, Response $response) {  
  // query database for all links
  $tags = array(); 
  foreach ((array) R::findAll('tag') as $tag ) {
    $tags[] = $tag->title;
  }
  // send response header for JSON content type
  $response = $response->withHeader('Content-Type', 'application/json');
   
  // return JSON-encoded response body with query results
  $response->getBody()->write(json_encode($tags));

  // devuelve el nuevo  $response al modificar las cabeceras
  return $response;
});


// handle GET requests for /links/tag/:tag
$app->get('/tag/{tagtofind}', function (Request $request, Response $response,$args) {
  $tagToFind = filter_var($args['tagtofind'], FILTER_SANITIZE_STRING);
  try {
    // query database for single article
    $links = R::tagged('linketeca', array($tagToFind));
     
    if ($links) {
      // if found, return JSON response
      $response = $response->withHeader('Content-Type', 'application/json');
      $response->getBody()->write(json_encode(R::exportAll($links)));
    } else {
      // else throw exception
      throw new ResourceNotFoundException();
    }
  } catch (ResourceNotFoundException $e) {
    // Crea un nuevo $response con el estatus de error 404 
    $response = $response->withStatus(404, 'Not found tag');
  } catch (Exception $e) {
    // Crea un nuevo $response con el estatus de error 400
    $response = $response->withStatus(400, $e->getMessage());
  }
  return $response;
});

 

// run
$app->run();
