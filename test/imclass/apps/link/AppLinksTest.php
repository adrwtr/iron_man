<?php
namespace test\imclass\apps\link;

use imclass\apps\link\AppLinks;
use imclass\apps\link\LinkCampo;

class AppLinksTest extends \PHPUnit_Framework_TestCase
{
    public function testAddLinkCampo()
    {
        $objAppLinks = new AppLinks();
        
        $objAppLinks->addLinkCampo(
            $this->getLinkCampo()
        );

        $arrLinkCampo = $objAppLinks->getLinkCampos();

        $this->assertEquals(
            'imclass\apps\link\LinkCampo',
            get_class(
                $arrLinkCampo[0]
            )
        );
    }


    private function getLinkCampo()
    {
        $ds_nome_classe = 'ds_nome_classe';
        $ds_path_classe = 'ds_path_classe';
        $ds_nome_campo  = 'ds_nome_campo';

        $objLinkCampo = new LinkCampo(
            $ds_nome_classe,
            $ds_path_classe,
            $ds_nome_campo
        );

        return $objLinkCampo;
    }
}