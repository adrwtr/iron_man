<?php
namespace test\imclass\apps\link;

use imclass\apps\link\AppLinks;
use imclass\apps\link\LinkCampo;

class AppLinksTest extends \PHPUnit_Framework_TestCase
{
    private $objAppLinks;

    /**
     * Adiciona um campo linkado
     * @param LinkCampo
     */
    public function testAddLinkCampo()
    {
        $objAppLinks = new AppLinks();

        $objLinkCampo = new LinkCampo(
            'valor1',
            'valor2',
            'valor3'
        );

        $objAppLinks->addLinkCampo($objLinkCampo);

        $this->assertEquals(
            array(0 => $objLinkCampo), 
            $objAppLinks->getLinkCampos()
        );
    }
}
