<?php
namespace PPI2\Controller;

use PPI2\Entity\Produto;
use PPI2\Models\ModelProduto;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ControllerProduto {
    
    private $response;
    private $twig;
    private $request;
    
    function __construct(Response $response, Environment $twig, Request $request) {
        $this->response = $response;
        $this->twig = $twig;
        $this->request = $request;
    }

    
    function listarProdutos(){
       
        $model = new ModelProduto();
        $dados = $model->listarProdutos();
      //  print_r($dados);
        
        return $this->response->setContent($this->twig->render("/produtos.twig",["dados" => $dados]));//$obj->nome);
       
        //$this->response->setContent('ola');
                
        //print_r($model->listarProdutos());
    }
    
    function buscarProduto( $id ){
        $model = new ModelProduto();
        $obj = $model->buscarProduto($id);
        return $this->response->setContent($this->twig->render("/produtos.twig"));//$obj->nome);
       
    }
    
     function cadastrarProduto(){
      
         $this->response->setContent($this->twig->render("/cadastro.twig"));//$obj->nome);
    }
    
    function efetivarCadastro(){
     //   print_r($this->request->getClientIp());/*
        
        
        $nome = $this->request->get('nome');
        $preco = $this->request->get('preco');
        
        if(!empty($nome) && !empty($preco)){
        
            $produto = new Produto();
            $produto->setNome($nome);
            $produto->setPreco($preco);
            $model = new ModelProduto();
        
        $id = $model->efetivarCadastro($produto);
        
        //print_r($id);
        $redirect = new RedirectResponse('/produtos');
        $redirect->send();
        
        //return $this->response->setContent($this->twig->render("/efetivar.twig"));//$obj->nome);
        }
        else {
        $redirect = new RedirectResponse('/produtos/cadastro');
        $redirect->send();
        }
        
    }
    
}
