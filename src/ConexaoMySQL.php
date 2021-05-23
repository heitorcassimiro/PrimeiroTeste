<?php


class ConexaoMySQL{
    
    private $banco;
    private $username;
    private $server;
    private $password;
    private $conexao;
    
    
    
    
    public function __construct() {
        $this->server = "localhost";
        $this->banco = "HANDY";
        $this->username = "root";
        $this->password = "0123";
        
    }
    
    
    
    public function abrirBanco() {
        
        $this->conexao = new mysqli($this->server, $this->username, $this->password, $this->banco);
        
        $this->conexao->set_charset("utf8");
        
        if(!mysqli_connect_errno()){
            
        }
        
        else{
            echo"Falha na conexao.".mysqli_erro($this->conexao);
        }
        
        return $this->conexao;
    }
    
    
    public function fecharBanco() {
        
        $this->conexao->close();
        
    }
    
    
    
    
    
    
    
    
}