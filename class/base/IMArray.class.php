<?
class IMArray {

   private $arr;

   public function __construct()
   {
      $this->set(array());
   }

   public function get()
   {
      return $this->arr;
   }

   public function set( $arr )
   {
      $this->arr = $arr;
   }

   public function getUltimo()
   {
      return end( $this->arr );
   }

   /**
    * Retorna os valores do array no formato csv
    * 
    * @return [string] [description]
    */
   public function getLikeCSV()
   {     
      $string = "";

      if ( is_array( $this->get() ) )
      {
         foreach ( $this->get() as $key => $value ) 
         {
            $string .= $value .";<BR>";            
         }
      }

      return $string;
   }
   
}
?>