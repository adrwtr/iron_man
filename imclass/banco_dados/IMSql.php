<?
namespace imclass\banco_dados;

class IMSql {
   
   public $query;
   public $tabela;
   public $arrCampos;

   public function __construct()
   {
      $this->set( '' );
      $this->setTabela( '' );      
   }

   public function set( $q )
   {
      $this->query = $q;
   }
   
   public function get()
   {
      return $this->query;
   }

   public function setTabela($tabela)
   {
      $this->tabela = $tabela;
   }

   public function getTabela()
   {
      return $this->tabela;
   }

   public function clear()
   {
      $this->set('');
   }

   public function montaSelect( $tabela='' ) 
   {
      $this->set('SELECT ');

      if ( $tabela != '' )
      {
         $this->setTabela( $tabela );   
      }      

      if ( count($this->getCampos()) > 0 )
      {
         $str_campos = implode( ", ", $this->getCampos() );
      }
      else
      {
         $str_campos = ' * ';
      }

      $this->set( $this->get() . $str_campos . ' from ' . $this->getTabela() );
   }

   public function setCampos( $valores )
   {      
      if ( is_array($valores) )
      {
         $this->arrCampos = $valores;
      }
      else
      {
         $this->addCampo( $valores );
      }
   }

   public function addCampo( $valor )
   {
      $this->arrCampos[] = $valor;
   }

   public function clearCampos()
   {
      $this->arrCampos = array();
   }

   public function getCampos()
   {
      return $this->arrCampos;
   }

}
?>