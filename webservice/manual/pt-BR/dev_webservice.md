# Entendendo o Webservice

## Conjunto de caracteres

Por padrão, todos os arquivos do webservice são escritos em charset **UTF-8 (Sem BOM)**

## Configuração do ambiente

Script de Configurações deve estar localizado em `webservice/config/System.config.php`

## Fluxo da aplicação

![]([PATH_IMG]/dev_webservice_fluxo.png)

Todas as requisições devem passar pelo script `index.php`, este arquivo é responsável por:

Ao instânciar a classe App é carregado no sistema as classes básicas necessárias para executar uma requisição. (RouteMap, Basic, Controller, Model, DAO, Permissions...)


| Diretório               | Função      |
| ----------------------- | ----------- |
| `config`                | Arquivos de configuração **(editável)** |
| `especificos`           | Classes específicas do ambiente **(editável)** |
| `log`                   | Logs do webservice **(consultivo)** |
| `controller`            | Classes Controllers exclusivas do Next BP |
| `dao`                   | Classes DAO exclusivas do Next BP |
| `job`                   | Classes JOB exclusivas do Next BP |
| `mail`                  | Classes Mail exclusivas do Next BP |
| `model`                 | Classes Model exclusivas do Next BP |
| `pdf`                   | Classes PDF exclusivas do Next BP |
| `sys`                   | Classes e scripts exclusivas do Next BP |