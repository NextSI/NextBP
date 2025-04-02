# API Webservice – Autenticação

Para realizar qualquer requisição ao WebService Next BP, devemos adicionar nos headers da requisição, o parâmetro `X-Auth-Token`, com o valor do token da sessão do usuário.
Este manual tem como objetivo **iniciar uma nova sessão** no Next BP e **obter o seu Token** para futuras requisições.

Este exemplo será realizado no Linux utilizando a biblioteca cURL (Client URL), o mesmo poderá ser reproduzido em consoles de outros sistemas operacionais e com linguagens de programação que tenham suporte a biblioteca cURL ou são capazes de realizar requisições HTTP. Outro requisito é a possibilidade de criptografia de textos para base64, sendo necessário aplica-la no usuário e senha.

Dicas de bibliotecas e linguagens:

* Windows, Linux, Mac: libcurl (cURL)
* PHP: Funções cURL
* C#: Classe System.Net.Http.HttpClient
* Java: Classe java.net.URL ou java.net.URLConnection
* ADVPL: Função FWRest


Prosseguindo com o exemplo, no terminal do linux gere o base64 do e-mail do usuário:
```
echo -n "joao@empresa.com.br" | base64
am9hb0BlbXByZXNhLmNvbS5icg==
```

Gere o base64 da senha do usuário:
```
echo -n "123abc" | base64
MTIzYWJj
```

Envie a requisição de login com usuário e senha:
```
curl --data "username=am9hb0BlbXByZXNhLmNvbS5icg==&senha=MTIzYWJj" http://[endereço Next BP]/webservice/index.php/login/validar/
```

Confira o objeto de retorno da requisição:
```
{  
    "app": "BP TESTES",
    "token": "b4a6effed6f69833607868b18ba9da46",
    "token_midia": "97ded5251e365b902beaa0c11e996dec",
    "inicio": "2016-01-08 16:19:40",
    "dados": {  
        "usuario_id": 195,
        "nome": "Joao Valentim",
        "email": "joao@empresa.com.br",
        "admin": false,
        "nivel": 10,
        "area_id": 2,
        "calendario_trabalho_id": 1,
        "tipo": 2,
        "ip": "192.168.1.67",
        "permissoes": [
            { "chave": "gestao_chamados" },
            { "chave": "gestao_processos" }
        ],
        "supervisor": "N",
        "tecnico": "N",
        "cliente_id": null,
        "representante": "N"
    }
}
```

Caso o usuário e senha estejam incorretos, o objeto de retorno será:
```
{  
   "validation":{  
      "messages":[  
         {  
            "code":"-1",
            "message":"Usu\u00e1rio ou senha inv\u00e1lido(s)",
            "ref":null
         }
      ]
   }
}
```

Para mais detalhes sobre a API, acesse a [Documentação da API Webservice]([PATH_SWAGGER]#/Login/post_webservice_index_php_login_validar_)

# URL de login automático

Podemos gerar uma URL utilizando tokens privados para que o navegador de um usuário possa se logar automaticamente com o Next BP.
Exemplo: você possui uma aplicação própria e gostaria que sua aplicação redirecione o usuário para o Next BP sem a necessidade que o mesmo realize o login novamente.

Para isso, utilize o token obtido no exemplo do tópico anterior. É requisito que o usuário deste token possua permissão de administrador.

Utilize [API de obter token público para um determinado usuário]([PATH_SWAGGER]#/Login/post_webservice_index_php_login_obter_token_publico_usuario_) através da requisição:
```
curl --location 'http://[endereço Next BP]/webservice/index.php/login/obter_token_publico_usuario/' \
--header 'X-Auth-Token: b4a6effed6f69833607868b18ba9da46' \
--form 'usuario_id="4"'
```

Retorno:
```
{
  "token_publico":"afc4f6a2cc04b7758d4a362fe25baf91"
}
```

Posteriormente encaminhamos o usuário para o link do Next BP passando o token público como parâmetro: `http://[endereço Next BP]/#/auth/afc4f6a2cc04b7758d4a362fe25baf91`

Por questões de segurança um token público só pode ser utilizado uma vez. Após seu uso ele é automaticamente destruído.

Também podemos forçar o Next BP a realizar automaticamente algumas ações após o login. Como por exemplo realizar a solicitação de um novo processo.
Exemplo: `http://[endereço Next BP]/#/auth/[token público]/processo/novo/[processo.id]`

Caso você não deseje realizar a autenticação automática mas gostaria que após o login seja realizada uma ação, então remova o trecho `/auth/[token público]`.
Exemplo: `http://[endereço Next BP]/#/processo/novo/[processo.id]`

Veja a lista completa de possibilidades a seguir.

# URL de ação

## Abre janela de novo processo
`http://[endereço Next BP]/#/processo/novo/[processo.id]`

## Abre janela de listagem de solicitações processos
`http://[endereço Next BP]/#/processo/listar/todas`

`http://[endereço Next BP]/#/processo/listar/[numero da solicitacao]`

## Abre janela do detalhe da solicitação processo com visão da atividade
`http://[endereço Next BP]/#/processo/[solicitacao_atividade.id]`
`http://[endereço Next BP]/#/solicitacao_atividade/[solicitacao_atividade.id]`

## Abre janela do detalhe da solicitação processo com visão da solicitação (Gestor)
`http://[endereço Next BP]/#/solicitacao/[solicitacao_atividade.id]`

## Abre janela de listagem de agendas
`http://[endereço Next BP]/#/agenda`

## Abre janela do detalhe da agenda
`http://[endereço Next BP]/#/agenda/[agenda_evento.id]`

## Abre janela de aprovações pendentes de documentos
`http://[endereço Next BP]/#/documento/aprovacao`

## Abre janela de dos arquivos de uma pasta
`http://[endereço Next BP]/#/documento/pasta/[documento_pasta.id]`

## Abre janela de detalhes do documento
`http://[endereço Next BP]/#/documento/detalhe/[documento.id]`

## Abre janela de detalhes da pasta
`http://[endereço Next BP]/#/documento/detalhe/pasta/[documento_pasta.id]`

## Abre janela de listagem de chamados
`http://[endereço Next BP]/#/chamado/listar`

## Abre janela de novo chamado
`http://[endereço Next BP]/#/chamado/novo`

## Abre janela de detalhes do chamado
`http://[endereço Next BP]/#/chamado/[chamado.id]`

## Abre janela de listagem de projetos
`http://[endereço Next BP]/#/projeto/listar`

## Abre janela de listagem de atividades de projeto
`http://[endereço Next BP]/#/projeto/atividades/[projeto.id]`

## Abre janela de detalhes da atividades de projeto
`http://[endereço Next BP]/#/projeto/atividade/[projeto_atividade.id]`

## Abre janela de listagem de oportunidades
`http://[endereço Next BP]/#/oportunidade`

## Abre janela de nova oportunidade
`http://[endereço Next BP]/#/oportunidade/nova/[funil_vendas.id]`

## Abre janela de aprovações pendentes de orçamento
`http://[endereço Next BP]/#/oportunidade/aprovacao`

## Abre janela de detalhes da oportunidade
`http://[endereço Next BP]/#/oportunidade/detalhes/[oportunidade.id]`

## Abre janela de atividades do PDCA
`http://[endereço Next BP]/#/pdca/[pdca.id]/[pdca_atividade.id]`

# Modo embarcado
Adicione `embedded` aos parâmetros da URL para carregar o Next BP embutido em outro sistema, sem que os menus do BP sejam carregados.
`http://[endereço Next BP]/#/auth/[token público]/chamado/listar/embedded`