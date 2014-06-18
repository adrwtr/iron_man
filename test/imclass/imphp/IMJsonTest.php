<?
namespace test\imclass\imphp;

use imclass\imphp\IMJson;


class IMJsonTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function __construct()
    {
        $this->obj = new IMJson();
    }

    public function testOfencode()
    {
        $arrteste = array(
            1 => 'valor 1',
            2 => 'valor 2'
        );

        $valor = $this->obj->encode($arrteste);
        $teste = '{"1":"valor 1","2":"valor 2"}';

        $this->assertEquals($teste, $valor);
    }


    public function testOfdecode()
    {
        $str = '{"1":"valor 1","2":"valor 2"}';

        $valor = $this->obj->decode($str);

        $arrteste = array(
            1 => 'valor 1',
            2 => 'valor 2'
        );

        $this->assertEquals($arrteste, $valor);
    }


}

?>