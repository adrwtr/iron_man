<?php
class IMBaseTestSuit extends BaseTestSuite {
   
   
   /**
    * Construtor da classe PHP5
    * 
    * @access  public
    */
   function __construct() {
      parent::__construct('Test das classes de Base');      
   }   
   
   /**
    * Adiciona os testes do pacote 
    * Favor seguir a ordem dos testes
    * 
    * @access  public
    */
   function addTestCases() 
   {      
      $this->addClassTest( 'class.base.TestOfIMString');      
      $this->addClassTest( 'class.banco_dados.TestOfIMConexaoAtributos');      
      $this->addClassTest( 'class.banco_dados.TestOfIMConexaoBancoDados');
      $this->addClassTest( 'class.banco_dados.sql_parser.TestOfIMSqlParserInsert');
      $this->addClassTest( 'class.base.TestOfIMErro');      
      $this->addClassTest( 'class.php.TestOfIMPDOStatement');      
      $this->addClassTest( 'class.base.TestOfIMArray');      
      $this->addClassTest( 'class.php.TestOfIMReflection');      
      $this->addClassTest( 'class.php.TestOfIMJson');      
      $this->addClassTest( 'class.banco_dados.TestOfIMSql');      
      $this->addClassTest( 'class.conversores.TestOfIMToHTMLTable');
      $this->addClassTest( 'class.html.TestOfIMHtmlTable');
      $this->addClassTest( 'class.html.table.TestOfIMHtmlTr');
      $this->addClassTest( 'class.html.table.TestOfIMHtmlTd');


   }   
}
?>