<?php
namespace PPI2\Models;
use PPI2\Util\Conexao;
use \PPI2\Entity\Produto;
use PDO;

class ModelProduto {

    public function __construct() {
        
    }
    
    function listarProdutos() {
        try {

            $sql = 'select * from produtos';
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
             return $p_sql->fetchAll(PDO::FETCH_OBJ);
             
        } catch (Exception $e) {
            print 'Ocorreu um erro ao tentar executar esta ação. ';
        }
    }
    /*function cadastrarProduto() {
        try {
       
            $sql = "INSERT INTO produtos (nome,preco) VALUES (:nome, :preco)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);    
            $p_sql->bindParam(':preco', $_POST['preco'], PDO::PARAM_STR); 
            $p_sql->execute();
             
        } catch (Exception $e) {
            print 'Ocorreu um erro ao tentar executar esta ação. ';
        }
    }*/
    function efetivarCadastro(Produto $produto) {
        try {
       
            $sql = "INSERT INTO produtos (nome,preco) VALUES (:nome, :preco)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(':nome', $produto->getNome(), PDO::PARAM_STR);    
            $p_sql->bindParam(':preco',$produto->getPreco(), PDO::PARAM_STR); 
            
            if($p_sql->execute()){
               
                return Conexao::getInstance()->lastInsertId();
            }
             
        } catch (Exception $e) {
            print 'Ocorreu um erro ao tentar executar esta ação. ';
        }
    }
    
    function buscarProduto($id){ 
        try {

            $sql = 'select * from produtos where id = :id';
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':id',$id);
            $p_sql->execute();
            
            return $p_sql->fetch(PDO::FETCH_OBJ);
            
        } catch (Exception $e) {
            print 'Ocorreu um erro ao tentar executar esta ação. ';
        }
    }

}
