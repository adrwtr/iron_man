<?
define( 'IMString_nome', 'IMString' );

class IMString {

   public $string;

   public function __construct($str='')
   {
      $this->set($str);
   }

   public function get()
   {
      return $this->string;
   }

   public function set( $valor )
   {
      $this->string = $valor;
   }
}
?>