<?php
namespace src;


require_once 'src/Tomador.php';
require_once 'src/ConexaoMySQL.php';

class RepositorioTomador
{
    private $ConexaoMySQL;
    private $Tomador;
    private $autenticado;
    
    public function __construct(){
        $this->autenticado = FALSE;
        $this->ConexaoMySQL = new \ConexaoMySQL();
        $this->Tomador = new Tomador();
    }
    
    // consultar Tomador
    public function cadastrarTomador($Tomador){
        
        $retorno = FALSE;
        
        $cadastro = " INSERT INTO TOMADOR " .
            "(NOME, TELEFONE, CELULAR, CPF, PROFISSAO, ESTADO, CIDADE, GENERO,
            CIDADEATENDE, PLANO, LOGIN, SENHA, STATUS) VALUES " .
              "('" . $Tomador->getNome() ."',"."
              '" . $Tomador->getTelefone() ."',"."
              '" . $Tomador->getCelular() ."',"."
              '" . $Tomador->getCpf() ."',"."
              '" . $Tomador->getEstado() . "',"."
              '" . $Tomador->getCidade() . "',"."
              '" . $Tomador->getGenero() . "',"."
              '" . $Tomador->getLogin() . "',"."
              '" . $Tomador->getSenha() . "',"."
              " . $Tomador->getStatus() . ")";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
       
        
        if ( $conexao->query($cadastro) === TRUE) {
            
            $retorno = TRUE;
            
            
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
        
    }
    
    //autenticar login
    public function autenticarTomador($login,$senha){
        $Tomador = new Tomador();
        $consulta = "SELECT * FROM Tomador WHERE  STATUS = 1 AND LOGIN = '". $login ."' AND SENHA = '".$senha."';";
        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consulta);
        
        if ( $resultado->num_rows > 0 ){
            $linha = $resultado->fetch_assoc();
            
            $Tomador->setId($linha['ID']);
            $Tomador->setNome($linha['NOME']);
            $Tomador->setSobrenome($linha['SOBRENOME']);
            $Tomador->setSexo($linha['SEXO']);
            $Tomador->setDataNascimento($linha['DATANASCIMENTO']);
            $Tomador->setEmail($linha['EMAIL']);
            $Tomador->setSenha($linha['SENHA']);
            $Tomador->setEstadoCivil($linha['ESTADOCIVIL']);
            $Tomador->setCpf($linha['CPF']);
            $Tomador->setRg($linha['RG']);
            $Tomador->setUf($linha['UF']);
            $Tomador->setCidade($linha['CIDADE']);
            $Tomador->setCep($linha['CEP']);
            $Tomador->setLogradouro($linha['LOGRADOURO']);
            $Tomador->setComplemento($linha['COMPLEMENTO']);
            $Tomador->setPontoReferencia($linha['PONTOREFERENCIA']);
            $Tomador->setLogin($linha['LOGIN']);
            $Tomador->setNumero($linha['NUMERO']);
            $Tomador->setBairro($linha['BAIRRO']);
            $Tomador->setStatus($linha['STATUS']);
            
            $this->autenticado = TRUE;
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Tomador;
    }
   
    
    //alterar Tomador
    
    public function consultarTomador($id,$modo){
        
        $Tomador = new Tomador();
        
        $consulta = "SELECT * FROM Tomador WHERE ID = " . $id . ";";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        $resultado = $conexao->query($consulta);
        
        
        if ( $resultado->num_rows > 0 ){
            
            while( $linha = $resultado->fetch_assoc() )
            {
                $Tomador->setId($linha['ID']);
                $Tomador->setNome($linha['NOME']);
                $Tomador->setSobrenome($linha['SOBRENOME']);
                $Tomador->setSexo($linha['SEXO']);
                $Tomador->setDataNascimento($linha['DATANASCIMENTO']);
                $Tomador->setEmail($linha['EMAIL']);
                $Tomador->setSenha($linha['SENHA']);
                $Tomador->setEstadoCivil($linha['ESTADOCIVIL']);
                $Tomador->setCpf($linha['CPF']);
                $Tomador->setRg($linha['RG']);
                $Tomador->setUf($linha['UF']);
                $Tomador->setCidade($linha['CIDADE']);
                $Tomador->setCep($linha['CEP']);
                $Tomador->setLogradouro($linha['LOGRADOURO']);
                $Tomador->setComplemento($linha['COMPLEMENTO']);
                $Tomador->setPontoReferencia($linha['PONTOREFERENCIA']);
                $Tomador->setLogin($linha['LOGIN']);
                $Tomador->setNumero($linha['NUMERO']);
                $Tomador->setBairro($linha['BAIRRO']);
                $Tomador->setStatus($linha['STATUS']);
                
                if ( $modo == "consultar" ){
                    echo '<!doctype html>
                        <html lang="Pt-br">
                          <head>
                            <!-- Required meta tags -->
                            <meta charset="utf-8">
                            
                        
                            <!-- Bootstrap CSS -->
                            <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
                            <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
                            <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
                        
                            <title>Consultar Tomador</title>
                          </head>
                          <body>
                    	<div class="container">
                          <!-- Div responsavel por todo o formulario-->
                                    <div class="row">
                                      <!-- classe Row responsavel por uma linha do formulario -->
                                        <div class="col-12 text-center my-5">
                                            <!-- classe Col responsavel por uma coluna e tamanho do formulario -->
                                            <h1 class="display-4"> <i class="fa fa-clipboard text-primary"></i> Resultado da consulta</h1>
                                             <!-- classe display responsavel por dar mais destaque e tamanho ao titulo -->
                                        </div>
                                     </div>    
                                     <div class="row justify-content-center mb-5">
                                            
                                         <div class="col-sm-12 col-md-10 col-lg-8"> <!-- Definindo os tamanhos das coluna -->
                                            
                                             <form method="post" action="excluirTomador3.php">
                                             
                                             		
                                                    <div class="form-row">
                                                        
                                                       <div class="form-group col-sm-6">
                                                                <label >Nome:</label>
                                                                <input type="text" class="form-control" name="nome" placeholder="Nome" value="'. $Tomador->getNome().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Sobrenome:</label>
                                                                <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" value="'.$Tomador->getSobrenome().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Login:</label>
                                                                <input type="text" class="form-control" name="login" placeholder="Login" value="'. $Tomador->getLogin().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Senha:</label>
                                                                <input type="password" class="form-control" name="senha" placeholder="Senha" value="'. $Tomador->getSenha().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >E-Mail:</label>
                                                                <input type="email" class="form-control" name="email" placeholder="@-Email" value="'. $Tomador->getEmail().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Sexo:</label>
                                                                <input type="text" class="form-control" name="sexo" value="'.$Tomador->getSexo().'" readonly>
                                                                      
                                                        
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Data de Nascimento:</label>
                                                                <input type="date" class="form-control" name="dataNascimento" value="'. $Tomador->getDataNascimento().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Estado Civil:</label>
                                                                <input type="text" class="form-control" name="estadoCivil" value="'.$Tomador->getEstadoCivil().'" readonly>
                                                                     
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >CPF:</label>
                                                                <input type="text" class="form-control" name="cpf" maxlength="14" placeholder="CPF" value="'. $Tomador->getCpf().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >RG:</label>
                                                                <input type="text" class="form-control" name="rg" maxlength="10" placeholder="RG" value="'. $Tomador->getRg().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >UF:</label>
                                                                <input type="text" class="form-control" name="uf" value="'. $Tomador->getUf().'" readonly >
                                                                     
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-row">
                                                        
                                                        <div class="form-group col-md-6">
                                                            
                                                            <label >Cidade:</label>
                                                            <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="'. $Tomador->getCidade().'"readonly/>
                                                            
                                                        </div>
                                                        
                                                        <div class="form-group col-md-4">
                                                            
                                                            <label >Bairro:</label>
                                                            <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="'. $Tomador->getBairro().'"readonly/>
                                                            
                                                        </div>
                                                            
                                                        <div class="form-group col-md-2">
                                                            
                                                            <label >CEP:</label>
                                                            <input type="text" class="form-control" maxlength="8" name="cep" placeholder="CEP" value="'. $Tomador->getCep().'" readonly/>
                                                            
                                                        </div>
                                                  </div>
                                                 
                                                 <div class="form-row">
                                                 
                                                     <div class="form-group col-sm-6">
                                                        
                                                                <label >Logradouro:</label>
                                                                <input type="text" class="form-control" name="logradouro" placeholder="Logradouro" value="'.$Tomador->getLogradouro().'"readonly>
                                                        
                                                    </div>
                                                     
                                                     <div class="form-group col-sm-4">
                                                        
                                                                <label >Complemento:</label>
                                                                <input type="text" class="form-control" name="complemento" placeholder="Complemento" value="'.$Tomador->getComplemento().'"readonly>
                                                        
                                                    </div>
                                                     
                                                     
                                                     <div class="form-group col-sm-2">
                                                     
                                                         <label >Numero:</label>
                                                            <input type="text" class="form-control"  name="numero" placeholder="N°" value="'. $Tomador->getNumero().'"readonly/>
                                                            
                                                                
                                                     </div>
                                                 
                                                     
                                                     
                                                 </div>
                                                 
                                                 <div class="form-row">
                                                 
                                                 		<div class="form-group col-sm-4">
                                                        
                                                                <label >Ponto de Referencia:</label>
                                                                <input type="tet" class="form-control" name="pontoReferencia" placeholder="Ponto de Referencia" value="'. $Tomador->getPontoReferencia().'"readonly>
                                                        
                                                       </div>
                                                               
                                                 </div>
                                                 
                                                 <div class="form-row">
                                                 
                                                 	<div class="col-sm-2">
                                                 	
                                                 		<label >Status:</label>
                                                 		
                                          					<input type="number" class="form-control" name="status" value="'. $Tomador->getStatus().'" readonly/> 
                                          					
                                                 	</div>
                                                 	
                                                 </div>
                                                 <div class="form-row">
                                                     
                                                     <div class="col-sm-12">
                                                        
                                                         <a class="btn btn-danger" href="home2.php" role="button">Voltar</a>
                                                         
                                                     </div>
                                                     
                                                 </div>
                                                 
                                             </form>
                                             
                                         </div>
                                         
                                    </div>
                                
                               </div>        
                         </body>
                    </html>';
                }
            }
            
        }
        else
        {
            
            echo '<br/><table width="400" border="0" style="background:red;color:white;border-radius:5px;" align="center"><tr><td align="center"><b>Usuário não encontrado!</b></td></tr></table>';
            
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Tomador;
    }
    
    
    
    public function alterarTomador($Tomador){
        
        $retorno = FALSE;
        
        
        $alterar = " UPDATE Tomador SET LOGIN = '" . $Tomador->getLogin() .
        "', NOME = '" . $Tomador->getNome() .
        "', SOBRENOME = '" . $Tomador->getSobrenome().
        "', SEXO = '" . $Tomador->getSexo() .
        "', DATANASCIMENTO = '" . $Tomador->getDataNascimento() .
        "', EMAIL = '". $Tomador->getEmail() .
        "', SENHA = '" . $Tomador->getSenha() .
        "', ESTADOCIVIL = '" . $Tomador->getEstadoCivil() .
        "', CPF = '" . $Tomador->getCpf() .
        "', RG = '" . $Tomador->getRg() .
        "', UF = '" . $Tomador->getUf() .
        "', CIDADE = '" . $Tomador->getCidade() .
        "', CEP = '" . $Tomador->getCep() .
        "', LOGRADOURO = '" . $Tomador->getLogradouro() .
        "', COMPLEMENTO = '" . $Tomador->getComplemento() .
        "', PONTOREFERENCIA = '" . $Tomador->getPontoReferencia() .
        "', NUMERO = '" . $Tomador->getNumero() .
        "', BAIRRO = '" . $Tomador->getBairro() .
        "', STATUS = " . $Tomador->getStatus() .
        " WHERE ID = " . $Tomador->getId() . ";";
        
        
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if ( $conexao->query($alterar) === TRUE) {
            
            $retorno = TRUE;
  
            
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
        
    }
    
    public function listarTomador(){
        
        $Tomadors = null;
        
        $consulta = "SELECT * FROM Tomador";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        $resultado = $conexao->query($consulta);
        
        if ( $resultado->num_rows > 0 ){
            
            
            $contador = 0;
            while ( $linha = $resultado->fetch_assoc() ){
                
                $Tomador = new Tomador();
                $Tomador->setId($linha['ID']);
                $Tomador->setNome($linha['NOME']);
                $Tomador->setSobrenome($linha['SOBRENOME']);
                $Tomador->setSexo($linha['SEXO']);
                $Tomador->setDataNascimento($linha['DATANASCIMENTO']);
                $Tomador->setEmail($linha['EMAIL']);
                $Tomador->setSenha($linha['SENHA']);
                $Tomador->setEstadoCivil($linha['ESTADOCIVIL']);
                $Tomador->setCpf($linha['CPF']);
                $Tomador->setRg($linha['RG']);
                $Tomador->setUf($linha['UF']);
                $Tomador->setCidade($linha['CIDADE']);
                $Tomador->setCep($linha['CEP']);
                $Tomador->setLogradouro($linha['LOGRADOURO']);
                $Tomador->setComplemento($linha['COMPLEMENTO']);
                $Tomador->setPontoReferencia($linha['PONTOREFERENCIA']);
                $Tomador->setLogin($linha['LOGIN']);
                $Tomador->setNumero($linha['NUMERO']);
                $Tomador->setBairro($linha['BAIRRO']);
                $Tomador->setStatus($linha['STATUS']);
                
                $Tomadors[$contador] = $Tomador;
                $contador++;
                
                
            }
            
            
        } else {
            
            echo '<br/>
                    <table width="400" border="0" style="background:red;color:white;border-radius:5px;" align="center">
                        <tr><td align="center"><b>nenhum Tomador  cadastrado!</b></td></tr>
                    </table>';
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Tomadors;
        
    }
    
    public function excluirTomador($id){
        
        $retorno = FALSE;
        
        $excluir = "DELETE FROM Tomador WHERE ID = " . $id . ";";
        
       
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if ( $conexao->query($excluir) === TRUE) {
            
            $retorno = TRUE;
           
            
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
       
    }
    
    public function getAutenticado() {
        return $this->autenticado;
    }
    
    
}

