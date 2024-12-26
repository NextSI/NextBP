# Enviar E-mail

Para adicionar um e-mail na caixa de saída, utilize o código abaixo:

```php
$email_job_model = new Email_Job_Model;
$email_job_model->para = 'destinario@email.com.br';
$email_job_model->assunto = 'Assunto do e-mail';
$email_job_model->corpo = '<p>Mensagem do e-mail.<p>';
$email_job_dao = new Email_Job_DAO;
$email_job_dao->salvar($email_job_model);
```

Os e-mails salvos serão enviados através do job `Emails.job.php`.

Também é possível adicionar anexos ao e-mail. Os anexos devem ser documentos salvos no Next BP. Para isso será utilizada a propriedade `$email_job_model->documentos`, informando um `array` contendo vários `documento_revisao_id`:

```php
$email_job_model->documentos = [
    ['documento_revisao_id' => 345],
    ['documento_revisao_id' => 743],
    ['documento_revisao_id' => 238],
];
```

## Enviar um e-mail personalizado com anexos ao avançar uma etapa de processo

No processo de exemplo, temos um formulário com os campos:

* `documento_numero`: tipo texto;
* `documento_anexo`: tipo documento;
* `comprovante`: tipo documento, campo de tabela.

Também temos uma atividade de código `EXPL01`, onde ao avançá-la o e-mail será processado.

![]([PATH_IMG]/BPM23630_formulario.png)

```php
<?php

use \Sys\PE;

PE::add('solicitacao_atividade_enviar_depois', function($solicitacao_atividade_model, $anexos=null, $acao=null, $destinos=null) {
    if ($solicitacao_atividade_model->processo_atividade_codigo != 'EXPL01') return;

    $documento_numero = \Sys\Util::valor_campo_formulario($solicitacao_atividade_model->formulario, 'documento_numero');

    $documentos = [];

    $documento_anexo = \Sys\Util::valor_campo_formulario($solicitacao_atividade_model->formulario, 'documento_anexo');
    if (!empty($documento_anexo)) {
        $documentos[] = ['documento_revisao_id' => $documento_anexo];
    }
    
    $comprovante_linhas = \Sys\Util::linhas_campo_tabela_formulario($solicitacao_atividade_model->formulario, 'comprovante');
    for ($linha=0; $linha < $comprovante_linhas; $linha++) { 
        $comprovante = \Sys\Util::valor_campo_tabela_formulario($solicitacao_atividade_model->formulario, 'comprovante', $linha);
        if (!empty($comprovante)) {
            $documentos[] = ['documento_revisao_id' => $comprovante];
        }
    }

    $email_job_model = new Email_Job_Model;
    $email_job_model->para = 'destinario@email.com.br';
    $email_job_model->assunto = 'Solicitacao #' . $solicitacao_atividade_model->solicitacao_id;
    $email_job_model->corpo = '<p>Documento Número: ' . $documento_numero . '<p>';
    $email_job_model->documentos = $documentos;
    $email_job_dao = new Email_Job_DAO;
    $email_job_dao->salvar($email_job_model);
});
```

Após entregar a atividade do processo o e-mail estará na fila da "Saída de E-mail":

![]([PATH_IMG]/BPM23630_email_job.png)