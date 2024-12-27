# Criar Permissões

Esta funcionalidade pode ser utilizada caso exista a necessidade de criar alguma nova permissão a algum tipo de usuário, e esta permissão deve ser validada em algum outro ponto de entrada.

Para adicionar novas permissões ao Next BP utilize o ponto de entrada `webservice/especificos/permissions/Permissions.config.php`. Para auxiliar na criação do PE utilize o arquivo modelo `Permissions.config.php.sample`:

```php
<?php
use \Sys\Basic;

class PermissionsEspecifico_Config extends \Sys\Permissions
{
    static function Register() {
        Basic::LoadModel('Usuario');

        $permissions = array(
            'exemplo_permissao_a' => array(
                'especifico' => true,
                'descricao' => 'Exemplo Permissão A',
                'perfil' => Usuario_Model::USUARIO_TIPO_COLABORADOR
            ),
            'exemplo_permissao_b' => array(
                'especifico' => true, 
                'descricao' => 'Exemplo Permissão B', 
                'perfil' => Usuario_Model::USUARIO_TIPO_COLABORADOR
            ),
            'exemplo_permissao_c' => array(
                'especifico' => true, 
                'descricao' => 'Exemplo Permissão C', 
                'perfil' => Usuario_Model::USUARIO_TIPO_COLABORADOR
            ),
            'exemplo_permissao_d' => array(
                'especifico' => true, 
                'descricao' => 'Exemplo Permissão D', 
                'perfil' => Usuario_Model::USUARIO_TIPO_CLIENTE
            ),
            'exemplo_permissao_e' => array(
                'especifico' => true, 
                'descricao' => 'Exemplo Permissão E', 
                'perfil' => array(
                    Usuario_Model::USUARIO_TIPO_CLIENTE, Usuario_Model::USUARIO_TIPO_PROSPECT
                )
            ),
            'exemplo_permissao_f' => array(
                'especifico' => true, 
                'descricao' => 'Exemplo Permissão F', 
                'perfil' => Usuario_Model::USUARIO_TIPO_CLIENTE
            ),
            'exemplo_permissao_g' => array(
                'especifico' => true, 
                'descricao' => 'Exemplo Permissão G', 
                'perfil' => Usuario_Model::USUARIO_TIPO_FORNECEDOR
            ),
            'exemplo_permissao_h' => array(
                'especifico' => true, 
                'descricao' => 'Exemplo Permissão H'
                // quando o perfil não for informado, a permissão aparecerá para todos os perfis
            ),
        );

        return $permissions;
    }

}
```

Veja também como Validar Permissões em [PHP](?i=pt-BR&p=dev_validar_permissoes_php) e [JavaScript](?i=pt-BR&p=dev_validar_permissoes_javascript)