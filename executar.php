<?
define('C_PATH', './');
define('C_PATH_CLASS', C_PATH . 'class/' );

require_once( 'conexao.php' );

require_once( 'control/ExecutarControl.class.php' );

require_once( C_PATH_CLASS . 'banco_dados/IMConexaoBancoDados.class.php' );
require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' );
require_once( C_PATH_CLASS . 'core/IMExecuta.class.php' );
require_once( C_PATH_CLASS . 'php/IMReflection.class.php' );
require_once( C_PATH_CLASS . 'php/IMJson.class.php' );
require_once( C_PATH_CLASS . 'base/IMString.class.php' );
require_once( C_PATH_CLASS . 'base/IMArray.class.php' );

$objExecutarControl     = new ExecutarControl();
$objIMMemoria           = new IMMemoria();
$objIMExecuta           = new IMExecuta();
$objIMReflection        = null; // new IMReflection(null);
$objIMString            = new IMString();
$objIMArray             = new IMArray();

$id              = $_REQUEST['id'];
$reexecutar      = $_REQUEST['reexecutar'];
$descricao       = $_REQUEST['descricao'];
$salvar_retorno  = $_REQUEST['salvar_retorno'];
$retorno_id      = $_REQUEST['retorno_id']; // representa a posição no link 




$arrTabela       = array();
$contador_tabela = 0;

$objIMMemoria->setConexao( $objIMConexaoBancoDados );
$objIMExecuta->setConexao( $objIMConexaoBancoDados );
$objExecutarControl->setConexao( $objIMConexaoBancoDados );

if ( $conectou == true )
{

   /**
    * requere todas as classes
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
               require_once( C_PATH_CLASS . $diretorio . '/' . $file );
            }
         } 
      }
   }


   // recupera lista de execução
   $arrTree = $objIMExecuta->getListaExecucaoById( $id );


   $ds_classe = '';

   foreach ( $arrTree as $tree_id => $tree_v) 
   {

      // enquanto as classes nao sao diferentes, executa sempre com a mesma.
      if ( $ds_classe != $tree_v['ds_classe'] )
      {
         $ds_classe              = $tree_v['ds_classe'];

         // se for para usar o retorno, deve usar a classe do comando anterior para executar a ação.
         if ( $tree_v['sn_usar_retorno'] == 1 )
         {
            $objClasseExecucao = end( $arrRetorno );
         }
         else
         {
            // cria nova classe com o comando atual
            $objClasseExecucao = new $ds_classe('');
         }
      }

      $ds_comando             = $tree_v['ds_comando'];
      $cd_memoria_parametro   = $tree_v['cd_memoria_parametro'];

      // mostra na tela
      $arrTabela[$contador_tabela]['classe']    = $tree_v['ds_classe'];
      $arrTabela[$contador_tabela]['comando']   = $tree_v['ds_comando'];
      

      // o comando atual, tem parametros?
      if ( $cd_memoria_parametro > 0 )
      {

         // verifica se foi reexecutado com outro valor de memoria
         $valor_memoria_temp = $_REQUEST['memoria_temp_' . $contador_tabela ];
         $valor_memoria_info = $_REQUEST['memoria_info_' . $contador_tabela ];

         if ( $valor_memoria_info != '' )
         {
            $arrParametro = $objIMMemoria->getFromMemoriaInfo( $valor_memoria_info );      
            $arrTabela[$contador_tabela]['parametro']['valor_selecionado'] = $valor_memoria_info;
         }
         else
         {
            if ( $valor_memoria_temp != '' )
            {
               $arrParametro = $objIMMemoria->getFromMemoriaTemporaria( $valor_memoria_temp );                           
               $arrTabela[$contador_tabela]['parametro']['valor_selecionado'] = $valor_memoria_temp;
            }
            else
            {
               $arrParametro = $objIMMemoria->getFromMemoriaInfo( $cd_memoria_parametro );               
            }
         }

         $arrParametro = $arrParametro[0];      
         
         // mostra parametro
         $arrTabela[$contador_tabela]['parametro']['classe'] = $arrParametro['ds_classe'];

         $classe_parametro     = $arrParametro['ds_classe'];
         $arrClasseParametros  = IMJson::decode( $arrParametro['ds_parametros'] ); 

         
         // cria a classe parametro         
         if ( $classe_parametro != '' )
         {
            $objParametro = new $classe_parametro('');


            // atribui os parametros da classe de parametro
            if ( is_array($arrClasseParametros) )
            {
               foreach ($arrClasseParametros as $parametro_id => $parametro_v ) 
               {
                  $objParametro->$parametro_id = $parametro_v;
               }
            }
            

            if ( $classe_parametro == IMString_nome )
            {
               $objParametro = $objParametro->get();
               $arrTabela[$contador_tabela]['parametro']['valor'] = $objParametro;            

               // caso usuário tenha alterado string
               $string_valor_alterado = $_REQUEST['string_' . $contador_tabela ];               

               if ( $string_valor_alterado != '' && $string_valor_alterado != $objParametro )
               {
                  $arrTabela[$contador_tabela]['parametro']['valor'] = $string_valor_alterado;
                  $objParametro = $string_valor_alterado;
               }

            }
            else
            {
               $arrTabela[$contador_tabela]['parametro']['valor'] = IMJson::encode( $objParametro ); 
            }

            /**
             * Pega os parametros que sao iguais ao parametro atual
             */            
            $arrRelacionados = $objIMMemoria->getRelacionadosFromMemoriaInfo( $classe_parametro );            
            $arrTabela[$contador_tabela]['parametro']['arrRelacionados'] = $arrRelacionados;

            $arrRelacionadosTemp = $objIMMemoria->getRelacionadosFromMemoriaTemporaria( $classe_parametro );
            $arrTabela[$contador_tabela]['parametro']['arrRelacionadosTemp'] = $arrRelacionadosTemp;
         }

      }

      $contador_tabela++;

      // cria a classe de execucao
      $objReflectionMethod = null;

      if ( $ds_comando != '' )
      {
         try 
         {
            $objReflectionMethod = new ReflectionMethod( $ds_classe, $ds_comando );
         }
         catch( Exception $e ) 
         {
           echo "Erro na criação da classe: '" . $ds_classe . "' com os parametros: '". $ds_comando ."'-- : <BR>" . $e->getMessage(), "<BR>";
         }
      }

      try 
      {
         $valor = $objReflectionMethod->invokeArgs($objClasseExecucao, array( $objParametro ));      

         $arrRetorno[] = $valor;

         if ( $salvar_retorno == 1 && $retorno_id == (count($arrRetorno)-1) )
         {
            // salva na memoria temporaria      
            $objUMReflection  = new IMReflection( $valor );
            $descricao_temp   = "Resultado de execução";
            $objIMMemoria->SalvarMemoriaTemporaria( $descricao_temp, $objUMReflection->getNome(), $objUMReflection->getAtributos() );
         }
      }
      catch( Exception $e )
      {
         echo "Erro na execução do comando \\" . get_class( $objParametro ) ."\\ da classe " . get_class( $objClasseExecucao ) . " : <BR>" . $e->getMessage(), "<BR>";
      }
      
   }
}

require_once('executar_html.php');
?>