<?
class TestOfIMJson extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'php/IMJson.class.php' ); 
      
      $this->obj = new IMJson();
   }

   public function testOfencode()
   {      
      $arrteste = array(
         1 => 'valor 1',
         2 => 'valor 2'
      );

      $valor = $this->obj->encode( $arrteste );
      $teste = '{"1":"valor 1","2":"valor 2"}';

      $this->assertTrue( $teste == $valor, 'Erro json encode' );            
   }


   public function testOfdecode()
   {      
      $str   = '{"1":"valor 1","2":"valor 2"}';

      $valor = $this->obj->decode( $str );
      
      $arrteste = array(
         1 => 'valor 1',
         2 => 'valor 2'
      );

      $this->assertTrue( $arrteste == $valor, 'Erro json decode' );            
   }
  

}
?>