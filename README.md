
## Testes unitários e TDD com PHP e PHPUnit

### Material do curso
https://www.udemy.com/testes-unitarios-php-phpunit/

## Instruções

Clone o projeto:

`git clone git@github.com:viniciuswebdev/curso-php-phpunit.git`

#### Parte 1

Para executar os testes da `parte 1` basta acessar o diretório:

`cd curso-php-phpunit/parte_1`

E executar os testes:

`php run_tests.php`

#### Parte 2

Para executar os testes da `parte 2` siga as seguintes instruções:

 Acesse o diretório do projeto:
 
`cd curso-php-phpunit/parte_2`

 Instale as dependências:
 
`./composer.phar install`

 Execute os testes:
 
`./vendor/bin/phpunit src/`

#### NOTES

Testes Unitarios e testar as classes de forma isolada

Nomenclaturas para testes

shouldBeValidWhenValueIsANumber ou whenValueIsANumberShouldBeValid

* O que esta sendo testado?
* Quais as circunstancias?
* Qual o resultado esperado?

Pode ser usado _ (underscore) para separar o nome

Testar Entidades?
NOTE: Metodos que possuem regras de negocio estes devem ser testados.

#### Stubs

Testes Unitarios e testar as classes de forma isolada

O que fazer quando uma classe tem muitas dependencias?

O principio da responsabilidade unica também se aplica para testes

a solução usando PHPUnit e usar stubs, que é um objeto com um comportamento fixo e previsivel, ou seja, um objeto falso que muito semelhando ao objeto real so que sem funcionalidade so retorna os valores fixos.

foca na classe que sera testada e simulo as dependencias.

#### Mocks

Mocks faz a mesma coisa que um Stub diferenciando na possibilidade de fazer a asserção do comportamento.
Um cenario para ser utilizado e quando temos metodos que não retornam nada e precisamos de asserção no comportamento do objeto.
Garantindo que ele vai chamar um metodo ou não.