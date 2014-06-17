<?
// resultado da execução da aplicação com os valores preenchidos pelo usuário
define('C_PATH_RAIZ',      '../');

require_once("nucleo.php");
require_once("iniciador_bootstrap.php");

use imclass\apps\uteis\RequestInputs;
use imclass\entidades\internos\execucoes\IMExecucoes;
use imclass\entidades\internos\execucoes\IMExecucoesParametros;


$path = $_REQUEST['class_path'];
$nome = $_REQUEST['class_nome'];

require_once( C_PATH_RAIZ .  $path . '.php' );

$objiAppInterface = new $nome();
$objRequestInputs = new RequestInputs();

// recupera os valores dos campos para cada request
$objRequestInputs->requestValores( $objiAppInterface );

// executa o programa
$descricao        = $objiAppInterface->getDescricao();

$STRING_RESULTADO = $objiAppInterface
   ->executar()
   ->getResultadoOutput();

// salva a execução
$objIMExecucoes = new IMExecucoes();
$objIMExecucoes->setDsNomeClasse( $nome );
$objIMExecucoes->setDsPathClasse( $path );
$objIMExecucoes->setDtExecucao( new \DateTime("now") );

// recupera os campos
$campos = $objiAppInterface->getArrInputs();

foreach ( $campos as $id => $objCampo )   
{
   $objIMExecucoesParametros = new IMExecucoesParametros;
   
   $objIMExecucoesParametros->setDsNome(
      $objCampo->getNome()
   ); 

   $objIMExecucoesParametros->setDsValor(
      $objiAppInterface->getInputValor(
         $objCampo->getNome()
      )
   ); 

   $objIMExecucoesParametros->setCdExecucao($objIMExecucoes);

   $objIMExecucoes->addExecucaoParametro(
      $objIMExecucoesParametros
   );
}

// salva execuções e campos utilizados
$objIMDoctrine->persist( $objIMExecucoes );
$objIMDoctrine->flush();

$cd_execucao_atual = $objIMExecucoes->getCdExecucao();


// recupera os links de uma execucao
$arrLinks = $objiAppInterface->getLinkRetornos();

require_once( C_PATH_VIEW. 'executar_passo2.php');
?>