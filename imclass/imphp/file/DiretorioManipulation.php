<?
namespace imclass\imphp\file;

/**
 * Classe responsável por manipular diretorios
 */
class DiretorioManipulation {

   /**
    * Retorna um array com todos os arquivos
    * @param  [str] $dir_path [description]
    * @return [array]           [description]
    */
   public static function getAllArquivos( $dir_path )
   {
      $arrArquivos = null;
      
      if ( $handle = opendir( $dir_path ) )  
      {
         while (false !== ($file = readdir($handle))) 
         {
            if ($file != "." && $file != "..") 
            {
               $arrArquivos[] = $file;
            }
         }

         closedir($handle);
      }
   
      return $arrArquivos;
   }
}
?>