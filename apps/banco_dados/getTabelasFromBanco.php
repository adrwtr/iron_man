<?
use imclass\apps\AppConcreto;
use imclass\apps\AppTiposRetornos;

use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;

use imclass\apps\link\LinkCampo;
use imclass\apps\link\iAppLink;

use imclass\uteis\base\IMGetConexaoBancoFromNome;
use imclass\conversores\imarray\IMArrayToHTMLTable;

use imclass\apps\inputs\InputSelectList;

/**
 * Recupera as tabelas de um banco de dados
 */
class getTabelasFromBanco extends AppConcreto implements iAppLink {

   /**
    * Construtor
    */
   public function __construct()
   {      
      $this->setDescricao('Recupera as tabelas de um banco de dados');      
      $this->setCampos();
      $this->setLinkRetornos();
   }

   /**
    * Cria os campos necessários
    */
   public function setCampos()
   {
      $objInputText = new InputText();
      $objInputText->setNome('ds_nome_tabela');
      $objInputText->setLabel('Filtro de Nome da Tabela');

      $this->setInput( $objInputText );


      $objInputConexoesMysql = new InputConexoesMysql();
      $objInputConexoesMysql->setNome('nm_obj_conexao');

      $this->setInput( $objInputConexoesMysql );
   }

   /**
    * Executa a função
    */
   public function executar()
   {     
      $retorno        = '';
      $ds_nome_tabela = $this->getInputValor( 'ds_nome_tabela' );
      $nm_obj_conexao = $this->getInputValor( 'nm_obj_conexao' );
      
      $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao( $nm_obj_conexao );
      $objIMConexaoAtributos  = $objIMConexaoBancoDados->getobjIMConexaoAtributos();
      $banco                  = $objIMConexaoAtributos->getBanco();

      if ( $objIMConexaoBancoDados != null )
      {         
         $query = "
            SHOW TABLES FROM $banco;
         ";

         $arrValores            = $objIMConexaoBancoDados->query( $query );
                  
         $objInputSelectList = new InputSelectList();
         $objInputSelectList->setNome( 'ds_nome_tabela' );

         foreach ($arrValores as $key => $value) 
         {
            $valor = array_pop( $value );
            $objInputSelectList->addValoresCampo( $valor, $valor );
         }


         $html .= $objInputSelectList->getComponente();

         /*
         $objIMArrayToHTMLTable = new IMArrayToHTMLTable();
                  
         $objIMHtmlTable = $objIMArrayToHTMLTable->convertTabelaHorizontal( 
           $arrValores
         );
         
         $html = $this->getHTML( 
            $objIMHtmlTable
         );*/

         $html .= "<BR> ". $query;

         return $html;
      }
   }

   private function getHTML( $objIMHtmlTable )
   {

      $objIMHtmlTable->setAttr( ' class="table" ' );

      $html = '
         <div class="panel panel-default">         
         <div class="panel-heading">Resultado</div>
      ';

      

      // $html .= $objIMHtmlTable->getHTML();
      
      $html .= '</div>';

      return $html;
   }

   /**
    * seta os possiveis retornos que esta classe pode fazer
    * para outra classe
    */
   public function setLinkRetornos()
   {
      $this->setRetornosLinkados(
         new LinkCampo( 
            'getCamposFromTabela',
            'apps/banco_dados/',
            'ds_nome_tabela'
         )
      );
   }

   /**
    * Nao faz nada
    */
   public function setLinkCampos()
   {
      return null;
   }
}
?>