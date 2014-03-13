<?
class TestOfIMPDOStatement extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'php/IMPDOStatement.class.php' ); 
      $this->obj = new IMPDOStatement();
   }

  
   public function testOfehValido()
   {
      $obj = $this->obj;

      $objPDO = new PDO( 
            'mysql:dbname=adriano;host=localhost', 
            'backup', 
            'UniSeguro' 
      );

      $obj->setArr( $objPDO->query( 'select * from test_im_memoria_temp limit 1') );

      $this->assertTrue( true == $obj->ehValido(), 'Erro de teste de query valida' );            
   }  

   public function testOftoIMResultado()
   {
      $obj = $this->obj;

      $objPDO = new PDO( 
            'mysql:dbname=adriano;host=localhost', 
            'backup', 
            'UniSeguro' 
      );
      
      $query = "truncate table test_im_memoria_temp";
      $objPDOStatement = $objPDO->prepare( $query );      
      $objPDOStatement->execute();

      $query = "insert into test_im_memoria_temp ( id ) value ( 1 )";
      $objPDOStatement = $objPDO->prepare( $query );      
      $objPDOStatement->execute();

      $query = 'select id, ds_descricao, ds_classe from test_im_memoria_temp limit 1';
      $objPDOStatement = $objPDO->prepare( $query );      
      $objPDOStatement->execute();
      
      $obj->setArr( $objPDOStatement );

      $arrColunas = array(
         array(
            'id'           =>  1,
            'ds_descricao' => null,
            'ds_classe'    => null
         )
      );

      $objIMResultado = $obj->toIMResultado();          

      $this->assertTrue( $arrColunas == $objIMResultado->get(), '2 - Não foi possivel converter para uma tabela' );            
   }

   public function testOftoIMArray()
   {
      $obj = $this->obj;

      $objPDO = new PDO( 
            'mysql:dbname=adriano;host=localhost', 
            'backup', 
            'UniSeguro' 
      );

      $query = 'select id, ds_descricao, ds_classe from test_im_memoria_temp limit 1';
      $obj->setArr( $objPDO->query( $query ) );
      
      $arrColunas = array(
         'id',
         'ds_descricao',
         'ds_classe'
      );

      $objIMResultado = $obj->toIMResultado();

      $this->assertTrue( get_class( new IMResultado() ) == get_class( $objIMResultado ), 'Não foi possivel converter para um array' );                  
   }

}
?>