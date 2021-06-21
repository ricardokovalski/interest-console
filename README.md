<h1 align="center">ricardokovalski/interest-console</h1>

<p align="center">
    <strong>Uma aplicação PHP para calcular Juros utilizando a biblioteca ricardokovalski/interest-calculation.</strong>
</p>

<p align="center">
    <a href="https://github.com/ricardokovalski/interest-console"><img src="http://img.shields.io/badge/source-ricardokovalski/interest--console-blue.svg" alt="Source Code"></a>
    <a href="https://php.net"><img src="https://img.shields.io/badge/php-%3E=5.6-777bb3.svg" alt="PHP Programming Language"></a>
    <a href="https://github.com/ricardokovalski/interest-console/releases"><img src="https://img.shields.io/github/release/ricardokovalski/interest-console.svg" alt="Source Code"></a>
    <a href="https://packagist.org/packages/ricardokovalski/interest-console"><img src="https://poser.pugx.org/ricardokovalski/interest-console/v/stable" alt="Source Code"></a>
    <a href="https://github.com/ricardokovalski"><img src="http://img.shields.io/badge/author-@ricardokovalski-blue.svg" alt="Author"></a>
    <a href="https://github.com/ricardokovalski/interest-console/blob/main/LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg" alt="Read License"></a>
</p>

<h1>Sobre</h1>

ricardokovalski/interest-console é uma aplicação PHP que serve para calcular juros utilizando a biblioteca ricardokovalski/interest-calculation.

<h1>Instalação</h1>

Instale este pacote como uma dependência usando [Composer](https://getcomposer.org).

```bash
composer require ricardokovalski/interest-console
```

<h1>Exemplos</h1>

Se instalado em sua aplicação, você pode executar o aplicativo de console a partir da linha de comando:

```bash
$ ./vendor/bin/interest
```

Se instalado globalmente usando o Composer, certifique-se de que a instalação global do Composer esteja em seu PATH(geralmente é em algum lugar ~/.composer/vendor/bin). Então, você pode executá-lo:

```bash
$ interest
```

Esteja ciente de que alguns sistemas podem já ter um aplicativo de linha de comando chamado interest instalado, portanto, isso pode criar um conflito se algo usando seu PATH esperar a outra interest ferramenta.

Veja a seguir a estrutura de argumentos para o comando.

```bash
$ ./vendor/bin/interest calculate {first argument} {second argument} {third argument} {fourteen argument} onde:
```

First argument é o tipo de juros que queremos calcular. Atualmente suportamos Financial (Financiamento), Compound (Composto) e Simple (Simples).
Second argument é juros do tipo float. Ex.: 1.99, 2.75, e assim por diante.
Third argument é o total da compra a ser calculado. Tipo float. Ex.: 50.76, 345.08, 1000.45, e assim por diante.
Fourteen argument é a parcela que queremos calcular. Tipo int.

Então vejamos um exemplo abaixo. Para calcular o juros de financiamento com uma taxa de 2.99 e uma compra de 350.90 na segunda parcela:

```bash
$ ./vendor/bin/interest calculate Financial 2.99 350.90 2
// 366.71513681364
``` 

A opção -r ou --reverse indica que podemos obter o valor do juros reverso.

```bash
$ ./vendor/bin/interest calculate Financial 2.99 350.90 2 -r
// 15.133085468258
```

Para obter ajuda, basta digitar ./vendor/bin/interest e ler as informações de ajuda.

## Copyright and License

The ricardokovalski/interest-console library is copyright © [Ricardo Kovalski](https://github.com/ricardokovalski)
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
