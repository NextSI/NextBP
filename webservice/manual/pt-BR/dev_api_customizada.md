# APIs Customizadas

Requisitos:

* [entendimento sobre o webservice](?i=pt-BR&p=dev_webservice)
* [entendimento sobre o diretório específicos](?i=pt-BR&p=dev_especificos)

Veja abaixo o exemplo do desenvolvimento de duas rotas para listar e salvar dados:

**webservice/especificos/model/Exemplo.model.php**:
```
<?php 
use \Sys\Model; 
use \Sys\Validation; 

class Exemplo_Model extends Model { 

    public $nome_completo; 
    
    function __construct() { 
       parent::__construct(); 
    } 
    
    function validation() { 
       $validation = new Validation(); 
       
       if (strlen($this->nome_completo) == 0 || is_null($this->nome_completo)) {
           $validation->add(Validation::VALID_ERR_FIELD, 'Informe o nome completo');
       }

       return $validation;
    }
}
```

**webservice/especificos/dao/Exemplo.dao.php**:
```
<?php 

use \Sys\DAO; 
use \Sys\DB; 

class Exemplo_DAO extends DAO { 

    function insert($exemplo_model) { 
        $sql = "INSERT INTO sua_tabela ( campo_1, campo_2 ) VALUES ( :nome_completo, :conteudo_2 ) "; 

        $params[':nome_completo'] = $exemplo_model->nome_completo;

        //Trecho responsável por executar a query
        //$query = Sys\DB::exec($sql, $params);

        return $params;
    }


    function listar()
    {
        $sql = "SELECT
                    id,
                    nome,
                    cor
                FROM agenda_tipo
                WHERE excluido = 'N'
                LIMIT 0, 4";

        $params = array();

        $query = DB::query($sql, $params);
    
        return $query;
    }
}
```

**webservice/especificos/controller/Exemplo.controller.php**:
```
<?php

use \Sys\App;

class Exemplo_Controller extends \Sys\Controller {
    
    function salvar($url_params) {
        
        //Obtendo os parâmetros
        $nome_completo = $this->ReadPost('nome_completo', null);

        //Carregando os models
        $exemplo_model = new Exemplo_Model;

        //Setando os valores do model
        $exemplo_model->nome_completo = $nome_completo;
        
        try {
            $exemplo_dao = new Exemplo_DAO;
            $ret = $exemplo_dao->insert($exemplo_model);

            $this->print_json($ret);
        }
        catch (BusinessException $e) {
            $this->print_json($e);
        }
    }

    function listar($url_params){

        // valida token
        $sessao_model = \Sys\Sessao::objeto(self::$instance_token);
        // valida permissões
        \Sys\Permissions::verificar(App::$emp, $sessao_model->dados->permissoes, array('gestao_projetos', 'agenda'));

        // instancio o projeto
        $exemplo_dao = new Exemplo_DAO;

        try {
            $lista = $exemplo_dao->listar();
            $this->print_json($lista);
        }
        catch (BusinessException $e) {
            $this->print_json($e);
        }  
    }
}
```

**webservice/especificos/routes/RouteMap.config.php**:
```
<?php 
class RouteMapEspecifico_Config extends \Sys\RouteMap
{
    static function adicionarRotas()
    {
        $rotas_especificas = array(
            '/exemplo/salvar/' => array('Exemplo', 'salvar'),
            '/exemplo/listar/' => array('Exemplo', 'listar')
        );

        return $rotas_especificas;
    }
}
```