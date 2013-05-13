<?
define('C_PATH', './../../');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
require_once( C_PATH_CLASS . 'base/IMString.class.php' );
require_once( C_PATH_CLASS . 'php/IMReflection.class.php' );
require_once( C_PATH_CLASS . 'base/IMArray.class.php' );
require_once( C_PATH_CLASS . 'core/IMExecuta.class.php' );

require_once( C_PATH . 'conexao.php' );

$add_pilha    = $_REQUEST['add_pilha'];
$comando      = $_REQUEST['comando'];
$classe       = $_REQUEST['classe'];
$usar_retorno = $_REQUEST['usar_retorno'];


if ( $add_pilha == 1 && $comando != '' && $classe != '' )
{
   
   require_once( C_PATH . $classe );

   $objIMMemoria = new IMMemoria();
   $objIMString  = new IMString();
   $objIMArray   = new IMArray();
   $objIMExecuta = new IMExecuta();

   $objIMExecuta->setConexao( $objIMConexaoBancoDados );

   $objIMArray->set( explode("/", $classe ) );
   
   $nome_classe   = $objIMArray->getUltimo();
   $nome_classe   = str_replace( ".class.php", "", $nome_classe );
   $objTemp       = new $nome_classe('');

   $objIMReflection = new IMReflection( $objTemp );
   $arrMetodos = $objIMReflection->getMetodos();    

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
   

   if ( is_array($arrComandoParametros) )
   {
      foreach ( $arrComandoParametros as $temp_id => $temp_v) 
      {
         $parametro           = $_REQUEST[ 'parametro_'. $temp_id ];
         $comando_parametro   = $_REQUEST[ 'comando_parametro_' . $temp_id ];
         $comando_descricao   = $_REQUEST[ 'comando_descricao_' .  $temp_id ];

         $objIMExecuta->SalvarExecutaTemporaria( $comando_descricao, $nome_classe, $comando, $comando_parametro, $usar_retorno );
      }
   }
   else
   {
      $comando_sem_parametro = $_REQUEST['comando_sem_parametro'];

      if ( $comando_sem_parametro == 1 )
      {
         $parametro           = $_REQUEST[ 'parametro_'. $temp_id ];
         $comando_parametro   = $_REQUEST[ 'comando_parametro_' . $temp_id ];
         $comando_descricao   = $_REQUEST[ 'comando_descricao_' .  $temp_id ];



         
         $objIMExecuta->SalvarExecutaTemporaria( $comando_descricao, $nome_classe, $comando, $comando_parametro, $usar_retorno );   
      }
   }

}


header("Location: ../../index.php?painel=3");
?>