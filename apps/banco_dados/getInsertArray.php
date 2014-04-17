<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;

use imclass\banco_dados\sql_parser\IMSqlParserInsert;
use imclass\conversores\IMArrayToHTMLTable;

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
      $objIMSqlParserInsert = new IMSqlParserInsert();
      $objIMSqlParserInsert->parse( $this->getInputValor( 'query' ) );
      ?>
      Recupera o insert<BR>
      <BR>
      <?
      echo "Tabela: " . $objIMSqlParserInsert->getStrTableName();
      echo "<HR>";
      echo IMArrayToHTMLTable::convertTabelaVertical( 
         $objIMSqlParserInsert->mergeArray() 
      );
      
   }

}
?>