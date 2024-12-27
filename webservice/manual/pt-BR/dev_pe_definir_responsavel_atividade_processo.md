# Ponto de Entrada: Definir Responsável de Atividade de Processo
Exemplo de como definir o responsável por uma atividade via Ponto de Entrada, onde iremos considerar informações do formulário para decidir quem será o responsável, como por exemplo uma autorização de compras.

No formulário teremos o campo `txtValor`.

No sistema teremos os usuários **pessoa1@nextsi.com.br**, **pessoa2@nextsi.com.br** e **pessoa3@nextsi.com.br**
Ao salvar e enviar a atividade de processo, “Solicitação de Compra”, deverá ser enviada para a atividade “Análise da solicitação”, **se o `txtValor` for abaixo de 100,00 deverá ser analisado pela *pessoa1*, caso seja entre 100,00 e 1.000,00 será analisado pela *pessoa2*, e acima de 1.000,00 será analisado pela *pessoa3***.

No PHP, vamos criar uma classe chamada `Analise_Solicitacao_Compra_DAO`, ela deverá conter a regra de negócio citada acima. Nesta classe vamos declarar a função `definir_aprovador` que será posteriormente chamada por um ponto de entrada. Vamos utilizar esta mesma classe para definir constantes com o id de cada atividade do processo, para identificarmos se a atividade que está sendo salva e enviada é a “Solicitação de Compra”.

`[Diretório Next BP]/webservice/especificos/dao/Analise_Solicitacao_Compra.dao.php`
```php
<?php
use \Sys\Basic;

class Analise_Solicitacao_Compra_DAO {

    // acesse a tela de edição da atividade para descobrir seu ID, neste exemplo é o ID 62
    const ANALISE_SOLICITACAO_COMPRA_ID_ATIVIDADE_ANALISE = 62;

    public static function definir_aprovador(&$solicitacao_atividade_model) {
        
        // verifico se a atividade que está sendo iniciada é a atividade de análise
        if ($solicitacao_atividade_model->processo_atividade_id == self::ANALISE_SOLICITACAO_COMPRA_ID_ATIVIDADE_ANALISE) {
            
            // obtenho valor do campo do formulário
            $txtValor = \Sys\Util::valor_campo_formulario($solicitacao_atividade_model->formulario, 'txtValor');

            // instancio o DAO de usuário
            $usuario_dao = Basic::LoadDAO('Usuario', true);

            // verifico os valores para definir quem é o responsável
            if ($txtValor <= 100) {
                $solicitacao_atividade_model->responsavel_id = $usuario_dao->popular_por_email('pessoa1@nextsi.com.br')->id;
            }
            else if ($txtValor > 100 && $txtValor <= 1000) {
                $solicitacao_atividade_model->responsavel_id = $usuario_dao->popular_por_email('pessoa2@nextsi.com.br')->id;
            }
            else if ($txtValor > 1000) {
                $solicitacao_atividade_model->responsavel_id = $usuario_dao->popular_por_email('pessoa3@nextsi.com.br')->id;
            }

        }

    }

}
```

Agora vamos editar o ponto de entrada `Solicitacao_Atividade_Nova.pe.php`, caso ele ainda não exista, faça uma cópia e renomeie o arquivo `Solicitacao_Atividade_Nova.pe.php.sample`. Para mais informações sobre pontos de entrada leia o manual de [Pontos de Entrada](?i=pt-BR&p=dev_pontos_de_entrada).

No ponto de entrada vamos carregar de nossa classe `Analise_Solicitacao_Compra_DAO` e chamar sua função `definir_aprovador`.

`[Diretório Next BP]/webservice/pe/Solicitacao_Atividade_Nova.pe.php`
```php
<?php
use \Sys\Basic;

function solicitacao_atividade_nova_antes($solicitacao_atividade_model) {
    // ação antes de criar a nova atividade
    Basic::LoadDAO('Analise_Solicitacao_Compra');
    Analise_Solicitacao_Compra_DAO::definir_aprovador($solicitacao_atividade_model);
};
```

Para sucesso deste código, é fundamental definir permissão de leitura ou edição na atividade “Análise da solicitação”, caso contrário não conseguiremos obter o `txtValor` informado anteriormente na atividade “Solicitação de Compra”.