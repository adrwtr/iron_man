<?
define('C_PATH', './../../');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( C_PATH . 'conexao.php' );
require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
require_once( C_PATH_CLASS . 'base/IMString.class.php' );
require_once( C_PATH_CLASS . 'php/IMReflection.class.php' );
require_once( C_PATH_CLASS . 'base/IMArray.class.php' );
require_once( C_PATH_CLASS . 'php/IMJson.class.php' );

require_once( C_PATH . 'conexao.php' );

$objIMArray    = new IMArray();
$objIMMemoria  = new IMMemoria();

$atribuir      = $_REQUEST['atribuir'];
$classe        = $_REQUEST['classe'];
$descricao     = $_REQUEST['descricao'];


$objIMMemoria->setConexao( $objIMConexaoBancoDados );


/**
 * Atribui valores para a classe e salva ela em memoria de trabalho
 */
if ( $atribuir != '' && $classe != '' )
{
   $classe = str_replace("./class/", C_PATH_CLASS, $classe );
   require_once( $classe );

   $objIMArray->set( explode("/", $classe ) );
   
   $nome_classe   = $objIMArray->getUltimo();
   $nome_classe   = str_replace( ".class.php", "", $nome_classe );
   $objTemp       = new $nome_classe('');


   foreach ( $_REQUEST['arrParametros'] as $request_id => $request_v ) 
   {      
      $function = $request_v;   

      if ( $function != '' )
      {
         $arrMemoriaTempRequest = $_REQUEST['arrMemoriaTemp'];
         
         $classe_id = $arrMemoriaTempRequest[ $request_id ];          
         $arrClasse = $objIMMemoria->getFromMemoriaTemporaria( $classe_id );

                  
         $classe_memoria = $arrClasse[0]['ds_classe'];
         $arrParametros  = IMJson::decode( $arrClasse[0]['ds_parametros'] ); 
         
         
         if ( $classe_memoria == 'IMString' )
         {            
            $objTemp->$function( $arrParametros['string'] );            
         }         
      }
   }

   $objUMReflection = new IMReflection( $objTemp );      
   $objIMMemoria->SalvarMemoriaTemporaria( $descricao, $objUMReflection->getNome(), $objUMReflection->getAtributos() );
   
   header("Location: ../../index.php?painel=2");
   
}

?>