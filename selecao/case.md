# Case - Desenvolvedor

Desenvolvimento de um Sistema de Autenticação e CRUD de Usuários

# Objetivo

Desenvolver um sistema de autenticação com um endpoint de login e um CRUD (Create, Read, Update, Delete) para a gestão de usuários, utilizando PHP. A proposta inclui a implementação de boas práticas de segurança, como autenticação e autorização, e a criação de uma API documentada com Swagger.

# Descrição do Sistema

O sistema deverá permitir a autenticação de usuários via API e oferecer funcionalidades para criar, visualizar, atualizar e excluir usuários. O objetivo é testar as habilidades do candidato na criação de um back-end robusto, focado em boas práticas de segurança e eficiência, além de garantir que o sistema seja modular e bem estruturado.

O foco principal será na criação de endpoints para:

## 1) Autenticação

Implementar um endpoint de login com autenticação via JWT ou outro sistema de tokens seguro.
O sistema deve permitir autenticação baseada em e-mail e senha.

## 2) CRUD de Usuários

Endpoints para criar, visualizar, editar e excluir usuários.

Somente usuários autenticados devem ter acesso aos endpoints de gestão de usuários.

Os usuários devem ter os seguintes atributos:

* Nome
* E-mail (único)
* Senha (armazenada de forma segura)
* Telefone
* CPF ou CNPJ (com validação)
* Perfil (admin ou usuário regular)

## 4) Segurança

Implementar boas práticas de segurança, como criptografia de senhas e proteção contra ataques comuns (XSS, CSRF, SQL Injection, etc.).
Garantir que apenas usuários com perfil "admin" possam criar, editar ou excluir outros usuários.

## 5) Documentação de API

Utilizar o Swagger para documentar os endpoints da API.
Incluir detalhes sobre os parâmetros de entrada e saída, bem como as respostas HTTP.

# Requisitos Técnicos

**Linguagem:** PHP 8;
**Banco de Dados:** Utilizar MySQL para a persistência dos dados;
**Documentação:** Utilizar Swagger para documentar os endpoints da API;
**Versionamento de Código:** O código deve ser versionado utilizando Git, com commits claros e organizados.

# Entrega Esperada

1) Código fonte do sistema desenvolvido utilizando.
2) Documentação da API gerada pelo Swagger.
3) Instruções detalhadas para execução do projeto (README.md).
4) Apresentação técnica, explicando as principais decisões de arquitetura e segurança.

# Critérios de Avaliação

1) Aderência às boas práticas de segurança no desenvolvimento web.
2) Qualidade da implementação da autenticação e autorização.
3) Clareza e organização da documentação da API.
4) Organização e legibilidade do código.
5) Eficiência e escalabilidade do código e da arquitetura.
6) Uso correto do Git para versionamento de código.

Importante: Não é necessário trabalhar no desenvolvimento do front-end, pois isso não será considerado na avaliação.
