<?php
// webservice/especificos/pe/minha_rota_personalizada.pe.php
// atenção: é obrigatório que o arquivos esteja nesta pasta e com a extenção .pe.php

use \Sys\RouteMap;
use \Sys\App;
use \Sys\Basic;
use \Sys\Sessao;

RouteMap::add('/exemplos/minha_rota_personalizada/', function() {
    // Validar autenticação. Comente as duas linhas abaixo caso não precise de autenticação
    $basic = new Basic;
    Sessao::objeto($basic->instance_token());

    // Retorno do endpoint
    $response = ['carro', 'moto', 'caminhão'];
    App::print_json($response);
});

// Acesso por seu_endereço_do_next_bp/webservice/index.php/exemplos/minha_rota_personalizada/
