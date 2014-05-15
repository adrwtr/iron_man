<?
namespace Imclass\Beans\Internos\Execucoes;

/**
 * Classe que representa uma execuчуo de uma app
 */
class IMExecucoes {

   private $cd_execucao;
   private $ds_nome_classe;
   private $ds_path_classe;

   public function getCdExecucao() 
   {
      return $this->cd_execucao;
   }
   
   public function setCdExecucao($cd_execucao) 
   {
      $this->cd_execucao = $cd_execucao;   
      return $this;
   }

   public function getDsNomeClasse() 
   {
      return $this->nome_classe;
   }

   public function setDsNomeClasse($ds_nome_classe) 
   {
      $this->ds_nome_classe = $ds_nome_classe;
      return $this;
   }


   public function getDsPathClasse() 
   {
      return $this->ds_path_classe;
   }
   
   public function setDsPathClasse($ds_path_classe) 
   {
       $this->ds_path_classe = $ds_path_classe;   
       return $this;
   }
}
?>