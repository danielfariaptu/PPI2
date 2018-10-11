<?php
namespace PPI2\Rotas;
//arquivo separado
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$rotas = new RouteCollection();

$rotas->add('inicio',new Route('/',array('_controller' => 'PPI2\Controller\ControllerIndex','_method'=>'show')));
$rotas->add('listarProdutos',new Route('/produtos',array('_controller' => 'PPI2\Controller\ControllerProduto','_method'=>'listarProdutos')));
$rotas->add('cadastrarProduto',new Route('/produtos/cadastro',array('_controller' => 'PPI2\Controller\ControllerProduto','_method'=>'cadastrarProduto')));
$rotas->add('efetivarCadastro',new Route('/produtos/cadastro/efetivar',array('_controller' => 'PPI2\Controller\ControllerProduto','_method'=>'efetivarCadastro')));

$rotas->add('buscarProduto',new Route('/produtos/exibir/{id}',array('_controller' => 'PPI2\Controller\ControllerProduto','_method'=>'buscarProduto','id'=>'')));
$rotas->add('exibirproduto',new Route('/produtos/exibir/{id}',array('_controller' => 'PPI2\Controller\ControllerIndex','_method'=>'exibirProduto','id'=>'')));

return $rotas;
