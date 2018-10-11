<?php
namespace PPI2\Controller;
use Symfony\Component\HttpFoundation\Response;


class ControllerIndex {
    
    private $response;
    
    function __construct(Response $response) {
        $this->response = $response;
    }

    public function show(){ 
        //print_r('Olar');
        $this->response->setContent('ola');
        return;
    }
    
    public function exibirProduto( $id ){
        $this->response->setContent('Exibir o produto   '.$id);
        
    }
}
