<?
namespace imclass\apps;

/**
 * Classe que representa uma app
 */
class AppDescricao {
   
   var $class;
   var $path;

   public function setClass( $valor )
   {
      $this->class = $valor;
   }

   public function getClass()
   {
      return $this->class;
   }

   public function setPath( $valor )
   {
      $this->path = $valor;
   }

   public function getPath()
   {
      return $this->path;
   }

   public function AppPath()
   {
      return $this->path . $this->class;
   }
}
?>