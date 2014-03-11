<?
class IMErro {

   private $string;

   public function __construct( $mensagem )
   {
      $this->set( $mensagem );
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