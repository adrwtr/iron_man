<?
define('C_PATH', './');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( 'conexao.php' );
require_once( 'control/IndexControl.class.php' );

require_once( C_PATH_CLASS . 'banco_dados/IMConexaoBancoDados.class.php' );
require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
require_once( C_PATH_CLASS . 'core/IMExecuta.class.php' );
require_once( C_PATH_CLASS . 'php/IMReflection.class.php' );
require_once( C_PATH_CLASS . 'php/IMJson.class.php' );
require_once( C_PATH_CLASS . 'base/IMString.class.php' );
require_once( C_PATH_CLASS . 'base/IMArray.class.php' );

$objIndexControl        = new IndexControl();
$objIMMemoria           = new IMMemoria();
$objIMExecuta           = new IMExecuta();
$objIMReflection        = null; // new IMReflection(null);
$objIMString            = new IMString();
$objIMArray             = new IMArray();

$excluir      = $_REQUEST['excluir'];
$id           = $_REQUEST['id'];
$classe       = $_REQUEST['classe'];
$atribuir     = $_REQUEST['atribuir'];
$comando      = $_REQUEST['comando'];
$add_pilha    = $_REQUEST['add_pilha'];
$salvar_pilha = $_REQUEST['salvar_pilha'];
$painel       = $_REQUEST['painel'];

$ordem        = $_REQUEST['ordem'];
$limpar_pilha = $_REQUEST['limpar_pilha'];


$objIMMemoria->setConexao( $objIMConexaoBancoDados );
$objIndexControl->setConexao( $objIMConexaoBancoDados );
$objIMExecuta->setConexao( $objIMConexaoBancoDados );

/**
 * Listas
  */
$arrMemoriaTemp   = $objIndexControl->getListaMemoriaTemporaria();
$arrExecucaoTemp  = $objIndexControl->getListaPilhaDeExecucao();
$arrExecutar      = $objIndexControl->getListaExecucao();


/**
 * Leitura das classes
 */
$objDir = dir( C_PATH_CLASS  );

while (false !== ($diretorio = $objDir->read())) 
{  
   if ( is_dir( C_PATH_CLASS . $diretorio) && ( $diretorio != '..' && $diretorio != '.' ) ) 
   {
      $dirhandle = opendir( C_PATH_CLASS . $diretorio ); 

      while ( $file = readdir($dirhandle) ) 
      { 
         if ( $file != '.' && $file != '..' )
         {
            $arrClasses[] = C_PATH_CLASS . $diretorio . '/' . $file;
         }
      } 
      
      closedir($dirhandle);      
   }   
}

$objDir->close();

/**
 * Le parametros da classe
 */
if ( $classe != '' )
{
   require_once( $classe );

   $objIMArray->set( explode("/", $classe ) );
   
   $nome_classe   = $objIMArray->getUltimo();
   $nome_classe   = str_replace( ".class.php", "", $nome_classe );
   $objTemp       = new $nome_classe('');

   $objIMReflection = new IMReflection( $objTemp );

   $arrMetodos = $objIMReflection->getMetodos();    
}

/**
 * Verifica se o comando tem parametros
 */
if ( $comando != '' )
{
   if ( is_array($arrMetodos) )
   {
      foreach ( $arrMetodos as $metodos_id => $metodos_v ) 
      {
         if ( $metodos_id == $comando )
         {
            // mostra comando e parametros
            if ( is_array($metodos_v) )
            {
               foreach ( $metodos_v as $parametros_id => $parametros_v ) 
               {
                  $arrComandoParametros[] = $parametros_v;
               }
            }   
         }         
      }
   }
}

require_once('index_html.php');
?>