<?php
namespace test\imclass\apps\link;

use imclass\apps\link\LinkCampo;

class LinkCampoTest extends \PHPUnit_Framework_TestCase
{
   private $objLinkCampo;

   private $ds_nome_classe;
   private $ds_path_classe;
   private $ds_nome_campo;
   private $ds_tipo_retorno;

   public function __construct()
   {
      $this->ds_nome_classe  = 'ds_nome_classe';
      $this->ds_path_classe  = 'ds_path_classe';
      $this->ds_nome_campo   = 'ds_nome_campo'; 
      $this->ds_tipo_retorno = 'ds_tipo_retorno'; 

      $this->objLinkCampo = new LinkCampo(
         $this->ds_nome_classe,
         $this->ds_path_classe,
         $this->ds_nome_campo,
         $this->ds_tipo_retorno
      );
   }

   public function testgetters()
   {
      $this->assertEquals(
         $this->ds_nome_classe,
         $this->objLinkCampo
            ->getDsNomeClasse()
      );

      $this->assertEquals(
         $this->ds_path_classe,
         $this->objLinkCampo
            ->getDsPathClasse()
      );

      $this->assertEquals(
         $this->ds_nome_campo,
         $this->objLinkCampo
            ->getDsNomeCampo()
      );

      $this->assertEquals(
         $this->ds_tipo_retorno,
         $this->objLinkCampo
            ->getDsTipoRetorno()
      );      
   }

   public function testsetters()
   {
      $this->objLinkCampo
         ->setDsNomeClasse( $this->ds_nome_classe );
         
      $this->objLinkCampo
         ->setDsTipoRetorno( $this->ds_tipo_retorno );
         
      $this->objLinkCampo
         ->setDsPathClasse( $this->ds_path_classe );
                  
      $this->objLinkCampo
         ->setDsNomeCampo( $this->ds_nome_campo );       

      $this->testgetters();
   }
}
?>