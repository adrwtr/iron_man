<?
class TestOfIMString extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'base/IMString.class.php' ); 
      $this->obj = new IMString();
   }

   public function testOfGetSet()
   {
      $obj = $this->obj;

      $obj->set("valor");
      $this->assertTrue( "valor"== $obj->get(), 'Getters e Setters não funcionam' );      
      
      $obj->set("outro");
      $this->assertTrue( "outro"== $obj->get(), 'Getters e Setters não funcionam' );      
   }  
}
?>