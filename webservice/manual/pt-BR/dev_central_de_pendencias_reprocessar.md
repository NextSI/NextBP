# Reprocessar Central de Pendências

## Reprocessamento geral
Acesse o servidor e execute o comando:
```
php webservice/cli.php -cp
```

## Reprocessamento por módulo

```
php webservice/cli.php -cp --agenda-evento
php webservice/cli.php -cp --tarefa-cartao
php webservice/cli.php -cp --chamado
php webservice/cli.php -cp --documento-aprovacao-alcada
php webservice/cli.php -cp --documento-distribuicao-controlada
php webservice/cli.php -cp --processo-solicitacao-atividade
php webservice/cli.php -cp --projeto-atividade
php webservice/cli.php -cp --pdca-atividade
php webservice/cli.php -cp --crm-oportunidade
php webservice/cli.php -cp --crm-oportunidade-orcamento
php webservice/cli.php -cp --crm-oportunidade-agenda
```

### Parâmetros opcionais

Exemplo de reprocessamento de uma atividade de solicitação de processo:
```
php webservice/cli.php -cp --processo-solicitacao-atividade solicitacao_atividade_id=4547871
```

Exemplo de reprocessamento de todas as atividade da solicitação id 500:
```
php webservice/cli.php -cp --processo-solicitacao-atividade solicitacao_id=500
```

Exemplo de reprocessamento de todas as atividades somente do projeto id 100:
```
php webservice/cli.php -cp --projeto-atividade projeto_id=100
```

### Lista completa de parâmetros opcionais:

Parâmetro | Opcionais
--------------------------------------|-----------------------
--agenda-evento                       | agenda_evento_id
--agenda-evento                       | agenda_recorrente_id
--tarefa-cartao                       | tarefa_quadro_lista_cartao_id
--tarefa-cartao                       | tarefa_quadro_lista_id
--tarefa-cartao                       | tarefa_quadro_id
--chamado                             | chamado_id
--documento-aprovacao-alcada          | documento_aprovacao_alcada_id
--documento-aprovacao-alcada          | documento_revisao_id
--documento-aprovacao-alcada          | documento_id
--documento-distribuicao-controlada   | documento_distribuicao_controlada_id
--documento-distribuicao-controlada   | documento_revisao_id
--documento-distribuicao-controlada   | documento_id
--processo-solicitacao-atividade      | solicitacao_atividade_id
--processo-solicitacao-atividade      | solicitacao_id
--projeto-atividade                   | projeto_atividade_id
--projeto-atividade                   | projeto_id
--pdca-atividade                      | pdca_atividade_id
--pdca-atividade                      | pdca_id
--crm-oportunidade                    | oportunidade_id
--crm-oportunidade-orcamento          | oportunidade_orcamento_id
--crm-oportunidade-agenda             | oportunidade_agenda_id
