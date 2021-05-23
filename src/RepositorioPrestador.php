<?php
namespace src;


require_once 'src/Prestador.php';
require_once 'src/ConexaoMySQL.php';

class RepositorioPrestador
{
    private $ConexaoMySQL;
    private $Prestador;
    private $autenticado;
    
    public function __construct(){
        $this->autenticado = FALSE;
        $this->ConexaoMySQL = new \ConexaoMySQL();
        $this->Prestador = new Prestador();
    }
    
    // consultar Prestador
    public function cadastrarPrestador($Prestador){
        
        $retorno = FALSE;
        
        $cadastro = " INSERT INTO PRESTADOR " .
            "(NOME, TELEFONE, CELULAR, CPF, PROFISSAO, ESTADO, CIDADE, GENERO,
            CIDADEATENDE, PLANO, LOGIN, SENHA, STATUS) VALUES " .
              "('" . $Prestador->getNome() ."',"."
              '" . $Prestador->getTelefone() ."',"."
              '" . $Prestador->getCelular() ."',"."
              '" . $Prestador->getCpf() ."',"."
              '" . $Prestador->getProfissao() . "',"."
              '" . $Prestador->getEstado() . "',"."
              '" . $Prestador->getCidade() . "',"."
              '" . $Prestador->getGenero() . "',"."
              '" . $Prestador->getCidadeAtende() . "',"."
              '" . $Prestador->getPlano() . "',"."
              '" . $Prestador->getLogin() . "',"."
              '" . $Prestador->getSenha() . "',"."
              " . $Prestador->getStatus() . ")";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
      
        
        if ( $conexao->query($cadastro) === TRUE) {
            
            $retorno = TRUE;
            
            
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
        
    }
    
    //autenticar login
    public function autenticarPrestador($login,$senha){
        $Prestador = new Prestador();
        $consulta = "SELECT * FROM Prestador WHERE  STATUS = 1 AND LOGIN = '". $login ."' AND SENHA = '".$senha."';";
        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consulta);
        
        if ( $resultado->num_rows > 0 ){
            $linha = $resultado->fetch_assoc();
            
            $Prestador->setId($linha['ID']);
            $Prestador->setNome($linha['NOME']);
            $Prestador->setSobrenome($linha['SOBRENOME']);
            $Prestador->setSexo($linha['SEXO']);
            $Prestador->setDataNascimento($linha['DATANASCIMENTO']);
            $Prestador->setEmail($linha['EMAIL']);
            $Prestador->setSenha($linha['SENHA']);
            $Prestador->setEstadoCivil($linha['ESTADOCIVIL']);
            $Prestador->setCpf($linha['CPF']);
            $Prestador->setRg($linha['RG']);
            $Prestador->setUf($linha['UF']);
            $Prestador->setCidade($linha['CIDADE']);
            $Prestador->setCep($linha['CEP']);
            $Prestador->setLogradouro($linha['LOGRADOURO']);
            $Prestador->setComplemento($linha['COMPLEMENTO']);
            $Prestador->setPontoReferencia($linha['PONTOREFERENCIA']);
            $Prestador->setLogin($linha['LOGIN']);
            $Prestador->setNumero($linha['NUMERO']);
            $Prestador->setBairro($linha['BAIRRO']);
            $Prestador->setStatus($linha['STATUS']);
            
            $this->autenticado = TRUE;
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Prestador;
    }
   
    
    //alterar Prestador
    
    public function consultarPrestador($id,$modo){
        
        $Prestador = new Prestador();
        
        $consulta = "SELECT * FROM Prestador WHERE ID = " . $id . ";";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        $resultado = $conexao->query($consulta);
        
        
        if ( $resultado->num_rows > 0 ){
            
            while( $linha = $resultado->fetch_assoc() )
            {
                $Prestador->setId($linha['ID']);
                $Prestador->setNome($linha['NOME']);
                $Prestador->setSobrenome($linha['SOBRENOME']);
                $Prestador->setSexo($linha['SEXO']);
                $Prestador->setDataNascimento($linha['DATANASCIMENTO']);
                $Prestador->setEmail($linha['EMAIL']);
                $Prestador->setSenha($linha['SENHA']);
                $Prestador->setEstadoCivil($linha['ESTADOCIVIL']);
                $Prestador->setCpf($linha['CPF']);
                $Prestador->setRg($linha['RG']);
                $Prestador->setUf($linha['UF']);
                $Prestador->setCidade($linha['CIDADE']);
                $Prestador->setCep($linha['CEP']);
                $Prestador->setLogradouro($linha['LOGRADOURO']);
                $Prestador->setComplemento($linha['COMPLEMENTO']);
                $Prestador->setPontoReferencia($linha['PONTOREFERENCIA']);
                $Prestador->setLogin($linha['LOGIN']);
                $Prestador->setNumero($linha['NUMERO']);
                $Prestador->setBairro($linha['BAIRRO']);
                $Prestador->setStatus($linha['STATUS']);
                
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
                        
                            <title>Consultar Prestador</title>
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
                                            
                                             <form method="post" action="excluirPrestador3.php">
                                             
                                             		
                                                    <div class="form-row">
                                                        
                                                       <div class="form-group col-sm-6">
                                                                <label >Nome:</label>
                                                                <input type="text" class="form-control" name="nome" placeholder="Nome" value="'. $Prestador->getNome().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Sobrenome:</label>
                                                                <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" value="'.$Prestador->getSobrenome().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Login:</label>
                                                                <input type="text" class="form-control" name="login" placeholder="Login" value="'. $Prestador->getLogin().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Senha:</label>
                                                                <input type="password" class="form-control" name="senha" placeholder="Senha" value="'. $Prestador->getSenha().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >E-Mail:</label>
                                                                <input type="email" class="form-control" name="email" placeholder="@-Email" value="'. $Prestador->getEmail().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Sexo:</label>
                                                                <input type="text" class="form-control" name="sexo" value="'.$Prestador->getSexo().'" readonly>
                                                                      
                                                        
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Data de Nascimento:</label>
                                                                <input type="date" class="form-control" name="dataNascimento" value="'. $Prestador->getDataNascimento().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >Estado Civil:</label>
                                                                <input type="text" class="form-control" name="estadoCivil" value="'.$Prestador->getEstadoCivil().'" readonly>
                                                                     
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >CPF:</label>
                                                                <input type="text" class="form-control" name="cpf" maxlength="14" placeholder="CPF" value="'. $Prestador->getCpf().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >RG:</label>
                                                                <input type="text" class="form-control" name="rg" maxlength="10" placeholder="RG" value="'. $Prestador->getRg().'"readonly>
                                                        
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group col-sm-6">
                                                        
                                                                <label >UF:</label>
                                                                <input type="text" class="form-control" name="uf" value="'. $Prestador->getUf().'" readonly >
                                                                     
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-row">
                                                        
                                                        <div class="form-group col-md-6">
                                                            
                                                            <label >Cidade:</label>
                                                            <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="'. $Prestador->getCidade().'"readonly/>
                                                            
                                                        </div>
                                                        
                                                        <div class="form-group col-md-4">
                                                            
                                                            <label >Bairro:</label>
                                                            <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="'. $Prestador->getBairro().'"readonly/>
                                                            
                                                        </div>
                                                            
                                                        <div class="form-group col-md-2">
                                                            
                                                            <label >CEP:</label>
                                                            <input type="text" class="form-control" maxlength="8" name="cep" placeholder="CEP" value="'. $Prestador->getCep().'" readonly/>
                                                            
                                                        </div>
                                                  </div>
                                                 
                                                 <div class="form-row">
                                                 
                                                     <div class="form-group col-sm-6">
                                                        
                                                                <label >Logradouro:</label>
                                                                <input type="text" class="form-control" name="logradouro" placeholder="Logradouro" value="'.$Prestador->getLogradouro().'"readonly>
                                                        
                                                    </div>
                                                     
                                                     <div class="form-group col-sm-4">
                                                        
                                                                <label >Complemento:</label>
                                                                <input type="text" class="form-control" name="complemento" placeholder="Complemento" value="'.$Prestador->getComplemento().'"readonly>
                                                        
                                                    </div>
                                                     
                                                     
                                                     <div class="form-group col-sm-2">
                                                     
                                                         <label >Numero:</label>
                                                            <input type="text" class="form-control"  name="numero" placeholder="N°" value="'. $Prestador->getNumero().'"readonly/>
                                                            
                                                                
                                                     </div>
                                                 
                                                     
                                                     
                                                 </div>
                                                 
                                                 <div class="form-row">
                                                 
                                                 		<div class="form-group col-sm-4">
                                                        
                                                                <label >Ponto de Referencia:</label>
                                                                <input type="tet" class="form-control" name="pontoReferencia" placeholder="Ponto de Referencia" value="'. $Prestador->getPontoReferencia().'"readonly>
                                                        
                                                       </div>
                                                               
                                                 </div>
                                                 
                                                 <div class="form-row">
                                                 
                                                 	<div class="col-sm-2">
                                                 	
                                                 		<label >Status:</label>
                                                 		
                                          					<input type="number" class="form-control" name="status" value="'. $Prestador->getStatus().'" readonly/> 
                                          					
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
        
        return $Prestador;
    }
    
    
    
    public function alterarPrestador($Prestador){
        
        $retorno = FALSE;
        
        
        $alterar = " UPDATE Prestador SET LOGIN = '" . $Prestador->getLogin() .
        "', NOME = '" . $Prestador->getNome() .
        "', SOBRENOME = '" . $Prestador->getSobrenome().
        "', SEXO = '" . $Prestador->getSexo() .
        "', DATANASCIMENTO = '" . $Prestador->getDataNascimento() .
        "', EMAIL = '". $Prestador->getEmail() .
        "', SENHA = '" . $Prestador->getSenha() .
        "', ESTADOCIVIL = '" . $Prestador->getEstadoCivil() .
        "', CPF = '" . $Prestador->getCpf() .
        "', RG = '" . $Prestador->getRg() .
        "', UF = '" . $Prestador->getUf() .
        "', CIDADE = '" . $Prestador->getCidade() .
        "', CEP = '" . $Prestador->getCep() .
        "', LOGRADOURO = '" . $Prestador->getLogradouro() .
        "', COMPLEMENTO = '" . $Prestador->getComplemento() .
        "', PONTOREFERENCIA = '" . $Prestador->getPontoReferencia() .
        "', NUMERO = '" . $Prestador->getNumero() .
        "', BAIRRO = '" . $Prestador->getBairro() .
        "', STATUS = " . $Prestador->getStatus() .
        " WHERE ID = " . $Prestador->getId() . ";";
        
        
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if ( $conexao->query($alterar) === TRUE) {
            
            $retorno = TRUE;
  
            
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
        
    }
    
    public function listarPrestador(){
        
        $Prestadors = null;
        
        $consulta = "SELECT * FROM Prestador";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        $resultado = $conexao->query($consulta);
        
        if ( $resultado->num_rows > 0 ){
            
            
            $contador = 0;
            while ( $linha = $resultado->fetch_assoc() ){
                
                $Prestador = new Prestador();
                $Prestador->setId($linha['ID']);
                $Prestador->setNome($linha['NOME']);
                $Prestador->setSobrenome($linha['SOBRENOME']);
                $Prestador->setSexo($linha['SEXO']);
                $Prestador->setDataNascimento($linha['DATANASCIMENTO']);
                $Prestador->setEmail($linha['EMAIL']);
                $Prestador->setSenha($linha['SENHA']);
                $Prestador->setEstadoCivil($linha['ESTADOCIVIL']);
                $Prestador->setCpf($linha['CPF']);
                $Prestador->setRg($linha['RG']);
                $Prestador->setUf($linha['UF']);
                $Prestador->setCidade($linha['CIDADE']);
                $Prestador->setCep($linha['CEP']);
                $Prestador->setLogradouro($linha['LOGRADOURO']);
                $Prestador->setComplemento($linha['COMPLEMENTO']);
                $Prestador->setPontoReferencia($linha['PONTOREFERENCIA']);
                $Prestador->setLogin($linha['LOGIN']);
                $Prestador->setNumero($linha['NUMERO']);
                $Prestador->setBairro($linha['BAIRRO']);
                $Prestador->setStatus($linha['STATUS']);
                
                $Prestadors[$contador] = $Prestador;
                $contador++;
                
                
            }
            
            
        } else {
            
            echo '<br/>
                    <table width="400" border="0" style="background:red;color:white;border-radius:5px;" align="center">
                        <tr><td align="center"><b>nenhum Prestador  cadastrado!</b></td></tr>
                    </table>';
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Prestadors;
        
    }
    
    public function excluirPrestador($id){
        
        $retorno = FALSE;
        
        $excluir = "DELETE FROM Prestador WHERE ID = " . $id . ";";
        
       
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

