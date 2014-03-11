<?
namespace imclass\apps\inputs;

use imclass\apps\inputs\iInput;

/**
 * Representa um campo de combo box que mostra todas as conexões mysql disponiveis
 * que estão na pasta info_data/base
 */
class InputConexoesMysql implements iInput {

   var $nome;
   var $label;

   var $dir_conexoes;

   public function __construct()
   {
      $this->setDirConexoes('../info_data/base/');
   }

   public function setNome( $valor )
   {
      $this->nome = $valor;
   }

   public function getNome()
   {
      return $this->nome;
   }

   public function setLabel( $valor )
   {
      $this->label = $valor;
   }

   public function getLabel()
   {
      return $this->label;
   }

   public function setDirConexoes( $valor )
   {
      $this->dir_conexoes = $valor;
   }

   public function getDirConexoes()
   {
      return $this->dir_conexoes;
   }


   public function getComponente()
   {
      $campo = '
      <div class="row">
      <div class="col-lg-6">
      <div class="input-group">
      <div class="input-group-btn">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Conexões<span class="caret">
      </span></button>
      <ul class="dropdown-menu">
      ';

      foreach ( $this->getAllConexoes() as $key => $value ) 
      {
         $campo .= '<li><a href="#" onclick="$(\'#'. $this->getNome() . '\').val(\''. $value .'\');">'. $value .'</a></li>';
      }

      $campo .= '
      </ul>
      </div>
      <!-- /btn-group -->
      <input type="text" class="form-control" id="'. $this->getNome() .'" name="'. $this->getNome() .'">
      </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
      ';

      return $campo;
   }

   public function getTipo()
   {
      return 'InputConexoesMysql';
   }

   public function getAllConexoes()
   {
      require_once( C_PATH_CLASS . 'php/file/DiretorioManipulation.php' );
            
      $arrArquivos = DiretorioManipulation::getAllArquivos( 
         $this->getDirConexoes()
      );

      return $arrArquivos;    
   }

}
?>