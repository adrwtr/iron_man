<?
class TestOfIMArray extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'base/IMArray.class.php' ); 
      $this->obj = new IMArray();
   }

   public function testOfGetSet()
   {
      $obj = $this->obj;

      $arr = array( 1 => 'teste');

      $obj->set( 
         $arr
      );

      $this->assertTrue( $arr == $obj->get(), 'Getters e Setters não funcionam' );            
   }  

   public function testOfgetUltimo()
   {
      $obj = $this->obj;

      $arr = array( 1 => 'teste', 2 => 'coisa' );

      $obj->set( 
         $arr
      );

      $this->assertTrue( 'coisa'  == $obj->getUltimo(), 'Pegar o último elemento' );          
   }  
}
?>