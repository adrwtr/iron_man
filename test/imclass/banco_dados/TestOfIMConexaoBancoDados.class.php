<?
class TestOfIMConexaoBancoDados extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'banco_dados/IMConexaoBancoDados.class.php' ); 
      require_once( 'TestOfIMConexaoAtributos.class.php' ); 
      $this->obj = new IMConexaoBancoDados();
   }

   public function testOfconectarMysql()
   {
      $obj = $this->obj;

      $objIMConexaoAtributos = new IMConexaoAtributos();

      $objIMConexaoAtributos->setNomeBanco("unimestre");
      $objIMConexaoAtributos->setLogin("backup");
      $objIMConexaoAtributos->setSenha("UniSeguro");
      $objIMConexaoAtributos->setBanco("adriano");
      $objIMConexaoAtributos->setHost("localhost");
      $objIMConexaoAtributos->setPorta("");

      $conectou = $obj->conectarMysql( $objIMConexaoAtributos );
      
      $this->assertTrue( true == $conectou, 'Erro na conexao' );    
   }  

   public function testOfquery()
   {
      $obj     = $this->obj;

      $result  = $obj->executa("truncate table test_im_memoria_temp");
      $result  = $obj->executa("insert into test_im_memoria_temp ( id ) value ( 1 )");      
      $result  = $obj->query("select * from test_im_memoria_temp limit 1");      
      
      $this->assertTrue( get_class($result) == 'IMPDOStatement' , 'Erro na execução de uma query com prepare' );
   }

   public function testOfexecuta()
   {
      $obj     = $this->obj;

      $result  = $obj->executa("truncate table test_im_memoria_temp");
      
      $result  = $obj->executa("insert into test_im_memoria_temp ( id ) value ( 1 )");      
      $result  = $obj->executa("delete from test_im_memoria_temp where  id = 1");
      
      $this->assertTrue( $result == 1, 'Erro na execução de uma query com exec' );

      $obj->executa("truncate table test_im_memoria_temp");
   }
}
?>