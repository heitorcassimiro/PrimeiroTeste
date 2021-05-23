<?php
use src\Tomador;
use src\RepositorioTomador;

require_once 'src/Tomador.php';
require_once 'src/RepositorioPrestador.php';

// Atributos

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$cpf = $_POST['cpf'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$genero = $_POST['genero'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$status = $_POST['status'];

$Tomador = new Tomador();    
$RU = new RepositorioTomador();

$Tomador->setNome($nome);
$Tomador->setSobrenome($telefone);
$Tomador->setSexo($celular);
$Tomador->setDataNascimento($cpf);
$Tomador->setSenha($estado);
$Tomador->setEstadoCivil($cidade);
$Tomador->setCpf($genero);
$Tomador->setCidade($login);
$Tomador->setCep($senha);
$Tomador->setStatus($status);

$retorno = $RU->cadastrarTomador($Tomador);

if($retorno==TRUE){
   
    echo '<br/>
              <table width="400" border="0"  align="center">
                <tr style="background:green;color:white;border-radius:5px;" ><td align="center"><b>Usuário cadastrado com sucesso!</b></td></tr>
                <tr>
                   <td align="center" colspan="2">
                      <br/>
                      <a href="index.php" style="background:#005b96;border-radius:5px;padding: 7px 18px;color: white;text-decoration: none;">Voltar</a>
                    </td>
                </tr>
              </table>';
    
}
else
{
    
    echo '<br/>
              <table width="400" border="0"  align="center">
                <tr style="background:red;color:white;border-radius:5px;" ><td align="center"><b>Falha no Cadastro do usuário!</b></td></tr>
                <tr>
                   <td align="center" colspan="2">
                      <br/>
                      <a href="cadastroPrestador.php" style="background:#005b96;border-radius:5px;padding: 7px 18px;color: white;text-decoration: none;">Voltar</a>
                   </td>
                </tr>
              </table>';
}


