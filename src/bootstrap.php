<?php
namespace PPI2;
require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

include 'rotas.php';

$loader = new FilesystemLoader(__DIR__.'/View');
$twig = new Environment($loader);

//ultima aula https://symfony.com/doc/current/components/routing.html

$request = Request::createFromGlobals();

$reponse = Response::create();
//$reponse->setContent('qualquer coisa');

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($rotas, $context);

try{ 
    $atributos = $matcher->match($context->getPathInfo());
    //print_r($atributos);
    $controller = $atributos['_controller'];
    $method = $atributos['_method'];
    
    if(isset($atributos['id'])){
        $parametros = $atributos['id'];
        
    }
    else {
        $parametros = '';
    }
    
    $obj = new $controller($reponse,$twig, $request);
    $obj->$method($parametros);
   
    
} catch (ResourceNotFoundException $ex) {
    $reponse->setContent('Página não encontrada seu lerdo!', $reponse::HTTP_NOT_FOUND);
}
//Enviar
//$reponse = Response::create();
//$reponse->setContent('qualquer coisa');
//$reponse->send();
$reponse->send();
//Como funciona o ID 
//print_r($request->query->get('id','35'));
//print_r($request->getPathInfo());
//print_r($request->getContent());
//echo "<h1> Olá do Bootstrap</h1>";
//print_r($_SERVER);