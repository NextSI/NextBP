# PDCA - 5W2H: Novo PDCA e inclusão de atividades

Para criar um novo PDCA, definir sua equipe e incluir atividades, utilize o código abaixo:

```php
// Definir o PDCA
$pdca_model = Basic::LoadModel('PDCA', true);
$pdca_model->numero = '123';
$pdca_model->objetivo = 'Reunião X';
$pdca_model->data_inicio = '2020-02-01';
$pdca_model->data_fim = '2020-03-01';

// Definir os usuários da equipe e suas permissões
$pdca_model->equipe = [
    [
        'usuario_id' => 2,
        'gerente' => true, // é gerente
        'equipe' => true, // faz parte da equipe de executores
        'acompanhamento' => false // faz somente o acompanhamento do PDCA
    ],
    [
        'usuario_id' => 3,
        'gerente' => false,
        'equipe' => true,
        'acompanhamento' => false
    ],
    [
        'usuario_id' => 4,
        'gerente' => false,
        'equipe' => false,
        'acompanhamento' => true
    ]
];

// Definir grupos de usuários da equipe e suas permissões
$pdca_model->grupo_usuarios_equipe = [
    [
        'grupo_usuarios_id' => 1,
        'gerente' => false,
        'equipe' => false,
        'acompanhamento' => true
    ]
];

// Salva o PDCA
$pdca_dao = Basic::LoadDAO('PDCA', true);
$pdca_model = $pdca_dao->salvar($pdca_model);

// Definir atividades
Basic::LoadModel('PDCA_Atividade');

$atividade_a = (object)['type' => 'insert', 'data' => (object)[
    'situacao' => PDCA_Atividade_Model::ABERTO,
    'que' => 'Que A',
    'porque' => 'PQ A',
    'quem' => 2,
    'onde' => 'Onde A',
    'data_inicio' => '2020-02-10',
    'data_fim' => '2020-02-13',
    'como' => 'Como A',
    'quanto' => 300,
    'conclusao' => 30, // % de conclusão
    'observacao' => 'Obs A',
    'data_conclusao' => '' // informar somente se a atividade já estiver concluída
]];

$atividade_b = (object)['type' => 'insert', 'data' => (object)[
    'situacao' => PDCA_Atividade_Model::ABERTO,
    'que' => 'Que B',
    'porque' => 'PQ B',
    'quem' => 2,
    'onde' => 'Onde B',
    'data_inicio' => '2020-02-14',
    'data_fim' => '2020-02-17',
    'como' => 'Como B',
    'quanto' => 700.54,
    'conclusao' => 70, // % de conclusão
    'observacao' => 'Obs B',
    'data_conclusao' => '' // informar somente se a atividade já estiver concluída
]];

// salvar atividades
$pdca_atividade_dao = Basic::LoadDAO('PDCA_Atividade', true);
$pdca_atividade_dao->salvar([$atividade_a, $atividade_b], $pdca_model->id);
```