<?
require_once( C_PATH_CLASS . 'apps/AppConcreto.php' );
require_once( C_PATH_CLASS . 'apps/inputs/InputText.php' );


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
      require_once( C_PATH_CLASS . 'banco_dados/sql_parser/IMSqlParserInsert.class.php' );
      require_once( C_PATH_CLASS . 'conversores/IMArrayToHTMLTable.class.php' );

      $objIMSqlParserInsert = new IMSqlParserInsert();
      $objIMSqlParserInsert->parse( $this->getInputValor( 'query' ) );
      ?>
      Recupera o insert<BR>
      <BR>
      <?
      echo $objIMSqlParserInsert->getStrTableName();
      echo "<HR>";
      echo IMArrayToHTMLTable::convertTabelaVertical( $objIMSqlParserInsert->mergeArray() );
      
   }

}
?>