# Codificador e Decodificador de Sessões PHP

Essa biblioteca permite a codificação e decodificação dos dados das sessões PHP.

[![Build Status](https://scrutinizer-ci.com/g/feeh27/session-encoder-decoder/badges/build.png?b=master)](https://scrutinizer-ci.com/g/feeh27/session-encoder-decoder/build-status/master)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/feeh27/session-encoder-decoder/master)](https://scrutinizer-ci.com/g/feeh27/session-encoder-decoder/?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/quality/g/feeh27/session-encoder-decoder/master)](https://scrutinizer-ci.com/g/feeh27/session-encoder-decoder/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/feeh27/session-encoder-decoder/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

[![Packagist Version](https://img.shields.io/packagist/v/feeh27/session-encoder-decoder)](https://packagist.org/packages/feeh27/session-encoder-decoder)
[![PHP Version](https://img.shields.io/packagist/php-v/feeh27/session-encoder-decoder?label=php%20version)](https://packagist.org/packages/feeh27/session-encoder-decoder)
![Top Language](https://img.shields.io/github/languages/top/feeh27/session-encoder-decoder)
![Repo size](https://img.shields.io/github/repo-size/feeh27/session-encoder-decoder)
![License](https://img.shields.io/github/license/feeh27/session-encoder-decoder)

## Requisitos

 - PHP 7.2 ou mais recente
 - Composer

## Instalação

É preferível que seja instalado via [composer](https://getcomposer.org/):

```bash
composer require feeh27/session-encoder-decoder
```

## Por que utilizar essa biblioteca?

As funções nativas PHP de codificação  e decodificação de sessões possui certas limitações, tais como:

 - `session_encode()` (Codificação):
    - Não é possível utilizar caso não haja uma sessão ativa
    - Codifica somente os dados presentes na variável global de sessão `$_SESSION`
    - Não aceita parâmetros com os dados decodificados

 - `session_decode()` (Decodificação):
    - Não é possível utilizar caso não haja uma sessão ativa
    - Ao invés de retornar o valor decodificado (array), salva diretamente na variável global de sessão `$_SESSION`

## Utilizando a biblioteca

Crie uma nova instância da biblioteca:

```php
$session = new SessionEncoderDecoder\PSR7Session();
```

### Codificando

```php
$decodedData = [
    'user_id' => '389',
    'profile_id' => 27,
];

$encodedData = $session->encode($decodedData);

echo $encodedData; // 'user_id|s:3:"389";profile_id|i:27;'
```

### Decodificando

```php
$encodedData = 'user_id|s:3:"389";profile_id|i:27;';

$decodedData = $session->encode($encodedData);

print_r($decodedData);
// Array
// (
//     [user_id] => 389
//     [profile_id] => 27
// )
```

## Fontes

Essa biblioteca foi baseada na biblioteca `psr7-sessions/session-encode-decode` e que por algum parece que foi descontinuada.

Fiz diversas modificações em todas as suas classes para adequar melhor ao meu cenário e acredito que outras pessoas também a acharão útil.

## Contribuidores desse repositório

Felipe Dominguesche - [Linkedin](https://linkedin.com/in/felipe-dominguesche)
