<?

define('C_PATH', '../../');
define('C_PATH_CLASS', C_PATH . 'class/' );
define('C_PATH_INFO', C_PATH . 'info_data/' );

require_once( C_PATH_CLASS . 'apps/AppDescricao.php' );

/**
 * Classe responsavel por ter uma lista de todas as apps disponiveis
 */
class AppsDisponiveis {
   
   var $arrApps;
   
   /**
    * adiciona um app na lista de apps
    * @param [str] $nome [nome da classe]
    * @param [str] $path [path da classe]
    */
   public function setNewApp( $nome, $path )
   {
      $objAppDescricao = new AppDescricao();
      $objAppDescricao->setPath( $path );
      $objAppDescricao->setClass( $nome );

      $this->arrApps[ $nome ] = $objAppDescricao;
   }

   /**
    * Retorna um app da lista
    * @param [str] [nome da classe]
    * @return  [objeto AppDescricao]
    */
   public function getAppByName( $nome )
   {
      return $this->arrApps[ $nome ];
   }

   /**
    * Retorna todas as apps disponiveis
    * @return [array] [array de objetos]
    */
   public function getAllApps()
   {
      return $this->arrApps;
   }
}
?>