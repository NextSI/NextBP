# Central de Pendencias

Utilize função `Central_Pendencias_DAO::adicionar` para processar as listas de pendências dos módulos.

Caso exista alguma transação já iniciada na base de dados, o processamento das pendências ocorrerão automaticamente após o commit da transação. Dessa forma a tabela `central_pendencias` não ficara travada durante o processamento da transação que já estava iniciada, evitando "deadlock".

## Sintaxe
```php
Central_Pendencias_DAO::adicionar($campos_chave=[], $parametros_opcionais=[]);
```

## Campos Chave

Chave "tipo", Central_Pendencias_Model:: | Chave de referência
------------------------------------------------------------------|-----------------------
TIPO_AGENDA_EVENTO                       | agenda_evento_id
TIPO_AGENDA_EVENTO                       | agenda_recorrente_id
TIPO_TAREFA_CARTAO                       | tarefa_quadro_lista_cartao_id
TIPO_TAREFA_CARTAO                       | tarefa_quadro_lista_id
TIPO_TAREFA_CARTAO                       | tarefa_quadro_id
TIPO_CHAMADO                             | chamado_id
TIPO_DOCUMENTO_APROVACAO_ALCADA          | documento_aprovacao_alcada_id
TIPO_DOCUMENTO_APROVACAO_ALCADA          | documento_revisao_id
TIPO_DOCUMENTO_APROVACAO_ALCADA          | documento_id
TIPO_DOCUMENTO_DISTRIBUICAO_CONTROLADA   | documento_distribuicao_controlada_id
TIPO_DOCUMENTO_DISTRIBUICAO_CONTROLADA   | documento_revisao_id
TIPO_DOCUMENTO_DISTRIBUICAO_CONTROLADA   | documento_id
TIPO_PROCESSO_SOLICITACAO_ATIVIDADE      | solicitacao_atividade_id
TIPO_PROCESSO_SOLICITACAO_ATIVIDADE      | solicitacao_id
TIPO_PROJETO_ATIVIDADE                   | projeto_atividade_id
TIPO_PROJETO_ATIVIDADE                   | projeto_id
TIPO_PDCA_ATIVIDADE                      | pdca_atividade_id
TIPO_PDCA_ATIVIDADE                      | pdca_id
TIPO_CRM_OPORTUNIDADE                    | oportunidade_id
TIPO_CRM_OPORTUNIDADE_ORCAMENTO          | oportunidade_orcamento_id
TIPO_CRM_OPORTUNIDADE_AGENDA             | oportunidade_agenda_id

## Exemplos

Evento da agenda:
```php
Central_Pendencias_DAO::adicionar([
    'tipo' => Central_Pendencias_Model::TIPO_AGENDA_EVENTO,
    'agenda_evento_id' => $agenda_evento_model->id
]);
```

Todos os eventos de uma recorrencia:
```php
Central_Pendencias_DAO::adicionar(
    // campos chave, que serão reprocessados
    [
        'tipo' => Central_Pendencias_Model::TIPO_AGENDA_EVENTO,
        'agenda_recorrente_id' => $agenda_evento_model->agenda_recorrente_id,
    ],
    // parâmetros opcionais
    [
        'tipo_reprogramacao' => Agenda_Evento_Model::TIPO_RECORRENTE_DESDE_INICIO
    ]
);
```

Todos os eventos de uma recorrencia de uma data prazo adiante:
```php
Central_Pendencias_DAO::adicionar(
    // campos chave, que serão reprocessados
    [
        'tipo' => Central_Pendencias_Model::TIPO_AGENDA_EVENTO,
        'agenda_recorrente_id' => $agenda_evento_model->agenda_recorrente_id,
    ],
    // parâmetros opcionais
    [
        'tipo_reprogramacao' => Agenda_Evento_Model::TIPO_RECORRENTE_ADIANTE,
        'prazo_adiante' => $agenda_evento_model->agenda_recorrente->intervalo_recorrencia_data_inicial
    ]
);
```

Obs: até o momento os parâmetros opcionais se aplicam somente ao tipo `Central_Pendencias_Model::TIPO_AGENDA_EVENTO`.

Chamados:
```php
Central_Pendencias_DAO::adicionar([
    'tipo' => Central_Pendencias_Model::TIPO_CHAMADO,
    'chamado_id' => $chamado_model->id
]);
```

Oportunidade:
```php
Central_Pendencias_DAO::adicionar([
    'tipo' => Central_Pendencias_Model::TIPO_CRM_OPORTUNIDADE,
    'oportunidade_id' => $oportunidade_model->id
]);
```

Atividade de projeto:
```php
Central_Pendencias_DAO::adicionar([
    'tipo' => Central_Pendencias_Model::TIPO_PROJETO_ATIVIDADE,
    'projeto_atividade_id' => $atividade_projeto_model->id
]);
```

Todas as atividades de um projeto:
```php
Central_Pendencias_DAO::adicionar([
    'tipo' => Central_Pendencias_Model::TIPO_PROJETO_ATIVIDADE,
    'projeto_id' => $projeto_model->id
]);
```