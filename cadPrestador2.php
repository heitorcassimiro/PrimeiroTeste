<?php
use src\Prestador;
use src\RepositorioPrestador;

require_once 'src/Prestador.php';
require_once 'src/RepositorioPrestador.php';

// Atributos

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$cpf = $_POST['cpf'];
$profissao = $_POST['profissao'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$genero = $_POST['genero'];
$cidadeAtende = $_POST['cidadeAtende'];
$plano = $_POST['plano'];
$senha = $_POST['senha'];
$status = $_POST['status'];

$Prestador = new Prestador();    
$RU = new RepositorioPrestador();

$Prestador->setNome($nome);
$Prestador->setTelefone($telefone);
$Prestador->setCelular($celular);
$Prestador->setCpf($cpf);
$Prestador->setProfissao($profissao);
$Prestador->setEstado($estado);
$Prestador->setCidade($cidade);
$Prestador->setGenero($genero);
$Prestador->setCidadeAtende($cidadeAtende);
$Prestador->setPlano($plano);
$Prestador->setSenha($senha);
$Prestador->setStatus($status);

$retorno = $RU->cadastrarPrestador($Prestador);

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


