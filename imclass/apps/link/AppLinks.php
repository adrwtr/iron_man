<?php
namespace imclass\apps\link;

use imclass\apps\link\LinkCampo;

/**
 * Representa os links que uma app tem
 */
class AppLinks
{
    /**
     * Array de campos linkados
     */
    var $arrLinkCampo;

    /**
     * Adiciona um campo linkado
     * @param LinkCampo
     */
    public function addLinkCampo(LinkCampo $objLinkCampo)
    {
        $this->arrLinkCampo[] = $objLinkCampo;
        return $this;
    }

    /**
     * Retorna os campos linkados
     * @return array
     */
    public function getLinkCampos()
    {
        return $this->arrLinkCampo;
    }
}