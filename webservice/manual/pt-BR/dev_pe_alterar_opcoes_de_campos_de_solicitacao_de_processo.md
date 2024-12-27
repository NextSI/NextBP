# Ponto de Entrada: Alterar Opções de Campos de Formulários em Solicitação de Processo

Para alterar as opções do campo podemos utilizar o ponto de entrada `solicitacao_atividade_preencher` e a funcion `Util::valor_campo_formulario`. Exemplo:

```php
<?php
use \Sys\PE;
use \Sys\Util;

PE::add('solicitacao_atividade_preencher', function(&$solicitacao_atividade_model) {
    if ($solicitacao_atividade_model->processo_id !== ID_DO_MEU_PROCESSO) return;
    Util::valor_campo_formulario(
        $solicitacao_atividade_model->formulario, 
        'id_do_meu_campo_de_opcoes',
        null, null, true, 
        ['Azul', 'Amarelo', 'Vermelho']
    );
});
```