# Validar Permissões em PHP
```php
// instancie o model da sessão do usuário logado
$sessao_model = \Sys\Sessao::objeto(self::$instance_token);

// verifica a permissão
\Sys\Permissions::verificar(
    App::$emp, $sessao_model->dados->permissoes,
    array('exemplo_permissao_a', 'exemplo_permissao_b')
);
```
Se a permissão não for válida, será disparada uma exceção.

Caso você não queira disparar uma exceção, e deseja armazenar em uma variável o resultado da verificação, passe o terceiro parâmetro como false, exemplo;
```php
// instancie o model da sessão do usuário logado
$sessao_model = \Sys\Sessao::objeto(self::$instance_token);

// verifica a permissão
$possui_permissao = \Sys\Permissions::verificar(
    App::$emp, $sessao_model->dados->permissoes,
    array('exemplo_permissao_a', 'exemplo_permissao_b'),
    false
);
```

Veja também como [Criar Permissões](?i=pt-BR&p=dev_permissoes)