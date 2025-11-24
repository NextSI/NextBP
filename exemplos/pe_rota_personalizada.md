# Exemplo de rota personalizada no webservice do Next BP

```php
<?php
// webservice/especificos/pe/minha_rota_personalizada.pe.php
// ATENÇÃO: é obrigatório que o arquivo esteja nesta pasta e com a extenção .pe.php

use \Sys\RouteMap;
use \Sys\App;
use \Sys\Basic;
use \Sys\Sessao;

RouteMap::add('/exemplos/minha_rota_personalizada/', function() {
    // Validar autenticação. Comente as duas linhas abaixo caso não precise de autenticação
    $basic = new Basic;
    Sessao::objeto($basic->instance_token());

    // Obter parâmetros da requisição
    $cor = Controller::Param('cor');
    $combustivel = Controller::Param('combustivel');

    // Retorno do endpoint
    $response = ['carro', 'moto', 'caminhão'];
    App::print_json($response);
});

```

Dessa forma, será possível no JavaScript dos formulários do Next BP realizar a requisição:
```javascript
WS.get({
    route:'/exemplos/minha_rota_personalizada/',
    data: { cor: 'vermelho', combustivel: 'gasolina' },
    func_response: (response) => {
        console.log(response);
    },
});
```

<img width="500" height="178" alt="image" src="https://github.com/user-attachments/assets/d70388c2-3f35-4711-9423-050c11a53779" />
