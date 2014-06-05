<?php
namespace test\imclass\apps\link;

use imclass\apps\link\LinkCampo;

class LinkCampoTest extends \PHPUnit_Framework_TestCase
{
   private $objLinkCampo;
   private $nome_campo;
   private $nome_classe;
   private $nome_tipo;

   public function __construct()
   {
      $this->nome_classe = 'nome_classe';
      $this->nome_campo  = 'nome_campo';
      $this->nome_tipo   = 'nome_tipo';

      $this->objLinkCampo = new LinkCampo(
         $this->nome_classe,
         $this->nome_campo,
         $this->nome_tipo
      );
   }

   public function testgetters()
   {
      $this->assertEquals(
         $this->nome_campo,
         $this->objLinkCampo
            ->getNomeCampo()
      );

      $this->assertEquals(
         $this->nome_tipo,
         $this->objLinkCampo
            ->getTipo()
      );

      $this->assertEquals(
         $this->nome_classe,
         $this->objLinkCampo
            ->getObjBase()
      );
   }

   public function testsetters()
   {
      $this->objLinkCampo
         ->setNomeCampo( $this->nome_campo );
         
      $this->objLinkCampo
         ->setTipo( $this->nome_tipo );
         
      $this->objLinkCampo
         ->setObjBase( $this->nome_classe );
         

      $this->testgetters();
   }
}
?>