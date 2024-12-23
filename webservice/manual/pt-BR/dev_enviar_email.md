# Enviar E-mail

Para adicionar um e-mail na caixa de saída, utilize o código abaixo:

```php
$email_job_model = \Sys\Basic::LoadModel('Email_Job', true);
$email_job_model->para = 'destinario@email.com.br';
$email_job_model->assunto = 'Assunto do e-mail';
$email_job_model->corpo = '<p>Mensagem do e-mail.<p>';
$email_job_dao = \Sys\Basic::LoadDAO('Email_Job', true);
$email_job_dao->salvar($email_job_model);
```

Os e-mails salvos serão enviados através do job `Emails.job.php`.