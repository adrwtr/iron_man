<?php
namespace imclass\apps\uteis;

use imclass\apps\AppConcreto;

/**
 * Classe responsavel por tratar os requets de um APP
 */
class RequestInputs
{

    /**
     * Recebe os valores, recuperando nome e valor
     * @param  imclass\apps\iAppInterface $objiAppInterface [description]
     */
    public function requestValores(AppConcreto $objiAppInterface)
    {
        //$arrInputs = $objiAppInterface->getArrInputs();

        if (is_array($arrInputs)) {
            foreach ($arrInputs as $id => $objiInput) {
                $nome_campo = $objiInput->getNome();
                $valor_campo = $_REQUEST[ $nome_campo ];

                $objiAppInterface->setInputValor(
                    $nome_campo,
                    $valor_campo
                );
            }
        }
    }
}