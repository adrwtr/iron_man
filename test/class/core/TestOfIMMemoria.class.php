<?
class TestOfIMMemoria extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'core/IMMemoria.class.php' ); 
      require_once( C_PATH_CLASS . 'base/IMString.class.php' ); 
      require_once( C_PATH_CLASS . 'php/IMReflection.class.php' ); 

      $this->obj = new IMMemoria();      
   }

  
   public function testOfSalvarEGet()
   {  
      $objIMString = new IMString();
      $objIMString->set( 'texto' );


      // limpa tabela
      $objPDO = new PDO( 
            'mysql:dbname=adriano;host=localhost', 
            'backup', 
            'UniSeguro' 
      );
      
      $query = "truncate table test_im_memoria_temp";
      $objPDOStatement = $objPDO->prepare( $query );      
      $objPDOStatement->execute();



      $objIMReflection = new IMReflection( $objIMString );

      $this->obj->salvar( 'test_im_memoria_temp', 'Teste de Memoria', $objIMReflection->getNome(), $objIMReflection->getAtributos() );

      $arrRetorno = $this->obj->get( 'test_im_memoria_temp', 1 );      
      unset( $arrRetorno[0]['dt_cadastro'] );

      $arrTest    = array( 
         array(
            'id'            => '1',
            'ds_descricao'  => 'Teste de Memoria',
            'ds_classe'     => 'IMString',
            'ds_parametros' => '{"string":"texto"}'            
         )
      );

      $this->assertTrue( $arrRetorno == $arrTest, 'Erro de get de memoria' );            
   }  
}
?>