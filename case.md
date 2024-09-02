Case - Desenvolvedor
Case: Desenvolvimento de um Sistema de Autenticação e CRUD de Usuários

Objetivo: Desenvolver um sistema de autenticação com um endpoint de login e um CRUD (Create, Read, Update, Delete) para a gestão de usuários, utilizando PHP. A proposta inclui a implementação de boas práticas de segurança, como autenticação e autorização, e a criação de uma API documentada com Swagger.

Descrição do Sistema: O sistema deverá permitir a autenticação de usuários via API e oferecer funcionalidades para criar, visualizar, atualizar e excluir usuários. O objetivo é testar as habilidades do candidato na criação de um back-end robusto, focado em boas práticas de segurança e eficiência, além de garantir que o sistema seja modular e bem estruturado.

O foco principal será na criação de endpoints para:

Login de usuários;
Gestão de usuários, com as funcionalidades de criação, listagem, edição e exclusão.
Requisitos Funcionais:

Autenticação:

Implementar um endpoint de login com autenticação via JWT ou outro sistema de tokens seguro.
O sistema deve permitir autenticação baseada em e-mail e senha.
Após o login, o usuário deverá receber um token que será utilizado para autorizar as operações subsequentes.
CRUD de Usuários:

Criar endpoints para criar, visualizar, editar e excluir usuários.
Somente usuários autenticados devem ter acesso aos endpoints de gestão de usuários.
Os usuários devem ter os seguintes atributos:
Nome
E-mail (único)
Senha (armazenada de forma segura)
Telefone
CPF ou CNPJ (com validação)
Perfil (admin ou usuário regular)
Segurança:

Implementar boas práticas de segurança, como criptografia de senhas e proteção contra ataques comuns (XSS, CSRF, SQL Injection, etc.).
Garantir que apenas usuários com perfil "admin" possam criar, editar ou excluir outros usuários.
Documentação de API:

Utilizar o Swagger para documentar os endpoints da API.
Incluir detalhes sobre os parâmetros de entrada e saída, bem como as respostas HTTP.
Requisitos Técnicos:

Autenticação e Autorização: Implementar autenticação baseada em JWT ou outro sistema seguro.
Banco de Dados: Utilizar MySQL para a persistência dos dados.
Documentação: Utilizar Swagger para documentar os endpoints da API.
Versionamento de Código: O código deve ser versionado utilizando Git, com commits claros e organizados.
Entrega Esperada:

Código fonte do sistema desenvolvido utilizando.
Documentação da API gerada pelo Swagger.
Instruções detalhadas para execução do projeto (incluindo como rodar o projeto).
Apresentação técnica, explicando as principais decisões de arquitetura e segurança.
Critérios de Avaliação:

Aderência às boas práticas de segurança no desenvolvimento web.
Qualidade da implementação da autenticação e autorização.
Clareza e organização da documentação da API.
Organização e legibilidade do código.
Eficiência e escalabilidade do código e da arquitetura.
Uso correto do Git para versionamento de código.

Importante: Não é necessário trabalhar no desenvolvimento do front-end, pois isso não será considerado na avaliação.
