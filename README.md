

API Padrão
==============================


Requerimentos
------------

Veja o arquivo [composer.json](composer.json) .

Instalação
------------

### Na pasta do projeto executar


```bash
$ composer install
```

### Todos os métodos

Habilitando o método de desenvolvedor

```bash
$ composer development-enable
```

Inicializando o servidor:

```bash
$ php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
# ou use o composer alias:
$ composer serve
```

Gerando migrações:

```bash
$ composer migrations-generate
```

Executando migrações:

```bash
$ composer migrations-migrate
```

Voltando para migração anterior:

```bash
$ composer migrations-migrate first
```

Verificando status das migrações:

```bash
$ composer migrations-status
```

Autenticação usuário root
--------

```bash
POST /oauth HTTP/1.1
Accept: application/json
Authorization: Basic dGVzdGNsaWVudDp0ZXN0cGFzcw==
Content-Type: application/json

{
    "grant_type": "password",
    "username": "root",
    "password": "root"
}
```

Ferramentas para Qualidade
--------

Instalar:

```bash
$ composer require --dev squizlabs/php_codesniffer
```

O phpcs faz uma verificação no padrão do código e o phpunit é responsável pelos tests unitários:

```bash
# Executar CS:
$ composer cs-check
# Corrigir erros de padrão:
$ composer cs-fix
# Executar testes com phpunit:
$ composer test
```
