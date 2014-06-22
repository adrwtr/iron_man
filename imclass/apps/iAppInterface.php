<?php
namespace imclass\apps;

use imclass\apps\link\LinkCampo;

/**
 * Interface basica para qualquer app
 * essa interface indica o que toda app deve ter para funcionar juntamente
 * com o layout padrao da aplicacao
 */
interface IAppInterface
{
    // toda classe app deve ter uma descricao do que ela faz
    public function setDescricao($str_descricao = '');

    public function getDescricao();

    // toda classe app deve executar alguma coisa
    public function executar();

    // retorna o resultado.
    public function getResultado();

    // saida output para a tela
    public function getResultadoOutput();
}