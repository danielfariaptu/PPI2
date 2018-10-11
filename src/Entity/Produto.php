<?php
namespace PPI2\Entity;

class Produto {
   private $id;
   private $nome;
   private $preco;
   
   function __construct() {
            
        }
        
   function getId() {
       return $this->id;
   }

   function getNome() {
       return $this->nome;
   }

   function getPreco() {
       return $this->preco;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setNome($nome) {
       $this->nome = $nome;
   }

   function setPreco($preco) {
       $this->preco = $preco;
   }


}
