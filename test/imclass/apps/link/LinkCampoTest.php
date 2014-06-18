<?php
namespace test\imclass\apps\link;

use imclass\apps\link\LinkCampo;

class LinkCampoTest extends \PHPUnit_Framework_TestCase
{
   private $objLinkCampo;

   private $ds_nome_classe;
   private $ds_path_classe;
   private $ds_nome_campo;

   public function __construct()
   {
$this->ds_nome_classe  = 'ds_nome_classe';
      $this->ds_path_classe  = 'ds_path_classe';
      $this->ds_nome_campo   = 'ds_nome_campo';

      $this->objLinkCampo = new LinkCampo(
         $this->ds_nome_classe,
         $this->ds_path_classe,
         $this->ds_nome_campo
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
   }

   public function testsetters()
   {
      $this->objLinkCampo
         ->setDsNomeClasse( $this->ds_nome_classe );

      $this->objLinkCampo
         ->setDsPathClasse( $this->ds_path_classe );

      $this->objLinkCampo
         ->setDsNomeCampo( $this->ds_nome_campo );

      $this->testgetters();
   }
}
