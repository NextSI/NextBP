# Exemplo de bloqueio de reabertura de chamados

```php
<?php

use \Sys\PE;
use \Sys\Validation;

PE::add('chamado_mensagem_salvar_antes', function ($mensagem_model, $chamado_model) {
    // Encerra a função caso não seja uma reabertura
    if ($mensagem_model->tipo != Mensagem_Model::MENSAGEM_TIPO_REABERTURA) return;

    // Verifica se a situação do chamado está encerrado por inatividade
    if ($chamado_model->situacao == Chamado_Model::SITUACAO_ENCERRADO_INATIVIDADE) {

        // Dispara validação
        $validation = new Validation();
        $validation->add(Validation::VALID_ERR, 'Reabertura não permita para chamados encerrados por inatividade.');
        throw new BusinessException($validation);
        
    }
});

```