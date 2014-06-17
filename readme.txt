iron_man
========

Fazendo objetos interagirem para resolver problemas, executando ações em sequência.


Autor             : Adriano Waltrick
Contato           : akuma.majunia @ Google mail
Data de criação   : 06/05/2013

1 - O que é este projeto?

É a tentativa de fazer o PHP executar metodos de classes pré-definidas, 
em uma ordem para se chegar a um resultado.

2 - Como surgiu?

Após assistir ao filme Iron Man 1 e pensar sobre o J.A.R.V.I.S..
::Is Tony Stark's artificially intelligent computer.

Basicamente o personagem principal interage com o computador, e o computador resolve problemas para ele.

3 - Como deveria funcionar?

Tendo objetos do mundo real pré-definidos, pela lógica poderíamos solicitar para o objeto resolver qualquer problema do qual ele é capaz ou que ele tenha o conhecimento.
Se for um objeto de conexão com banco de dados, ele poderia se conectar em um banco qualquer. Se for um objeto de diretórios, ele poderia listar os arquivos. Etc.

O sistema deve ser capaz de receber informações e parametros, e a partir disso executar os metodos das classes em sequencia para chegar a um resultado.
Levando isso cada vez para o mais alto nível até chegar em um comportamento semi-humano, ou resultado entendível pelo homem.

4 - Como foi construído?

Com PHP e MYSQL.
HTML - Jquery - Sublime Text.
As classes são em PHP puro, o usuário interage atraves de HTML e o MYSQL serve para armazenar os atributos dos objetos em banco de dados.

5 - Qual o Objetivo?

Fazer com que o PHP possa realizar qualquer ação e operação computacional, através de objetos bem construídos que possam se assemelhar a comportamentos do mundo real.

6 - Requisitos

PDO
DOCTRINE
MYSQL
PHP - namespace
JAVASCRIPT
ANGULARJS

7 - Como instalar e rodar?

A) Crie um banco de dados mysql. Por padrão a aplicação tem essa config:
user - moodle
senha - moodle
banco - adriano

B) Crie o usuário moodle para este banco:

CREATE USER 'moodle'@'localhost' IDENTIFIED BY 'moodle';
GRANT ALL ON *.* TO 'moodle'@'localhost';
GRANT SELECT ON *.* TO 'moodle'@'localhost';
GRANT USAGE ON *.* TO 'moodle'@'localhost' WITH MAX_QUERIES_PER_HOUR 90;

C) Configurar os paths das classes do COMPOSER:
Entre no path: externos > doctrine > vendor > composer > 

No arquivo autoload_namespaces.php
Configure os namespaces:

'imclass' => array( 'C:\GitHub\iron_man' ),   // local aonde estao as classes
'info_data' => array( 'C:\GitHub\iron_man' ), // local aonde tem informações para as aplicações usarem
'test' => array( 'C:\GitHub\iron_man' ),      // unit de test
'org' => array( 'C:\GitHub\iron_man\externos\vsf' ), // biblioteca externa

D) Utilize o doctrine para criar as tabelas do banco de dados
orm:schema-tool:update --force

Em minha máquina rodo assim,
Dentro da raiz do projeto:
[[ LOCAL DO PHP ]]  [[LOCAL DO DOCTRINE]]                                  [[ COMANDO ]]
c:\Apache24\php\php externos\doctrine\vendor\doctrine\orm\bin\doctrine.php orm:schema-tool:create --force


E) Execute:
http://localhost:8081/git/iron_man/apps/

**obs: por padrão, na raiz não tem index.php. Apenas na pasta apps


