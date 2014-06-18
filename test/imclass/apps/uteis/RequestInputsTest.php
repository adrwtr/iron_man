<?php
namespace test\imclass\apps\uteis;

use imclass\apps\uteis\RequestInputs;
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;

class RequestInputsTest extends \PHPUnit_Framework_TestCase
{
    public function testrequestValores()
    {
        $objRequestInputs = new RequestInputs();
        $objAppConcreto = new AppConcreto();
        $objInputText = new InputText();

        $nome_campo = 'nome';
        $valor = 'valor';

        $_REQUEST[ $nome_campo ] = $valor;

        $objInputText->setNome( $nome_campo );
        $objAppConcreto->setInput( $objInputText );
        $objAppConcreto->setInputValor( $nome_campo, $valor );

        $objRequestInputs->requestValores( $objAppConcreto );

        $this->assertEquals(
            $objAppConcreto->getInputValor( $nome_campo ),
            $valor
        );
    }
}
