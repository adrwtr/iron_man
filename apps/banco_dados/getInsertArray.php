<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;

use imclass\banco_dados\sql_parser\IMSqlParserInsert;
use imclass\conversores\imarray\IMArrayToHTMLTable;

class getInsertArray extends AppConcreto {

   /**
    * Construtor
    */
   public function __construct()
   {      
      $this->setDescricao('Retorna uma tabela baseado nos campos e valores de um sql insert');      
      $this->setCampos();
   }

   /**
    * Cria os campos necessários
    */
   public function setCampos()
   {
      $objInputText = new InputText();
      $objInputText->setNome('query');
      $objInputText->setLabel('query');
      
      $this->setInput( $objInputText );
   }

   /**
    * Executa a função
    */
   public function executar()
   {     
      $return = '';

      $objIMSqlParserInsert = new IMSqlParserInsert();
      $objIMSqlParserInsert->parse( $this->getInputValor( 'query' ) );

      $return .= 'Recupera o insert<BR>';
      $return .= '<BR>';
      
      $return .= 'Tabela: ' . $objIMSqlParserInsert->getStrTableName();      
      $return .= '<HR>';
      
      $objIMArrayToHTMLTable = new IMArrayToHTMLTable();
        
      // $return .= $objIMArrayToHTMLTable->convertTabelaVertical( 
      //    $objIMSqlParserInsert->mergeArray() 
      // )->getHTML();
      
      $return .= $objIMArrayToHTMLTable->convertTabelaHorizontal( 
         $objIMSqlParserInsert->mergeArray() 
      )->getHTML();
  
      return $return;      
   }

}
?>