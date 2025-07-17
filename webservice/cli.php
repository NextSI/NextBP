<?php

define('JOB_PATH', dirname(__FILE__, 1));
set_include_path(JOB_PATH);

// Token fixo para a autenticação
$valid_token = '76c894e9e01a8484d44cfc16bffe79309ae20e64f805ff52e799c7f565e0095d';
$command_line_interface = true;

// Verifica se a requisição é via HTTP (não via terminal)
if (php_sapi_name() !== 'cli') {
    error_log('Next BP webservice/cli.php');
    // Verifica o token enviado no cabeçalho Authorization
    $headers = apache_request_headers();
    
    if (!isset($headers['Dbutoken']) || $headers['Dbutoken'] !== $valid_token) {
        http_response_code(500);
        $log = 'Dbutoken inválido ou não fornecido no header';
        error_log($log);
        exit($log);
    }

    // Simulando o comportamento do $argv com $_GET
    if (!isset($_REQUEST['argv']) || empty($_REQUEST['argv'])) {
        http_response_code(500);
        $log = 'Parâmetros não fornecidos';
        error_log($log);
        exit($log);
    }

    // Caso os parâmetros estejam disponíveis na URL
    $argv = explode(' ', $_REQUEST['argv']);

    //error_log(sprintf('argv: %s', print_r($argv, true)));

    $command_line_interface = true;
} else {
    // Caso o script esteja sendo executado no terminal
    if (!isset($argv)) {
        exit;
    }
}

function help() {
    $help = "
        Lista completa de parametros aceitos:
        -h      Esta listagem
        -dbu    Atualizacao da base de dados
        -job    Execucao do agendador de tarefas
        -cp     Reprocessamento da Central de Pendencias
        -cp --agenda-evento
        -cp --agenda-evento agenda_evento_id=[ID]
        -cp --agenda-evento agenda_recorrente_id=[ID]
        -cp --tarefa-cartao tarefa_quadro_lista_cartao_id=[ID]
        -cp --tarefa-cartao tarefa_quadro_lista_id=[ID]
        -cp --tarefa-cartao tarefa_quadro_id=[ID]
        -cp --chamado
        -cp --chamado chamado_id=[ID]
        -cp --documento-aprovacao-alcada
        -cp --documento-aprovacao-alcada documento_aprovacao_alcada_id=[ID]
        -cp --documento-aprovacao-alcada documento_revisao_id=[ID]
        -cp --documento-aprovacao-alcada documento_id=[ID]
        -cp --documento-distribuicao-controlada
        -cp --documento-distribuicao-controlada documento_distribuicao_controlada_id=[ID]
        -cp --documento-distribuicao-controlada documento_revisao_id=[ID]
        -cp --documento-distribuicao-controlada documento_id=[ID]
        -cp --processo-solicitacao-atividade
        -cp --processo-solicitacao-atividade solicitacao_atividade_id=[ID]
        -cp --processo-solicitacao-atividade solicitacao_id=[ID]
        -cp --projeto-atividade
        -cp --projeto-atividade projeto_atividade_id=[ID]
        -cp --projeto-atividade projeto_id=[ID]
        -cp --pdca-atividade
        -cp --pdca-atividade pdca_atividade_id=[ID]
        -cp --pdca-atividade pdca_id=[ID]
        -cp --crm-oportunidade 
        -cp --crm-oportunidade oportunidade_id=[ID]
        -cp --crm-oportunidade-orcamento
        -cp --crm-oportunidade-orcamento oportunidade_orcamento_id=[ID]
        -cp --crm-oportunidade-agenda
        -cp --crm-oportunidade-agenda oportunidade_agenda_id=[ID]
    ";

    echo $help;
    exit;
}

$argumento_selecionado = NULL;

// desabilito cores
if (in_array('-nocolor', $argv)) {
    define('CLI_NOCOLOR', true);
}

if (in_array('-color', $argv)) {
    if (!defined('CLI_NOCOLOR'))
        define('CLI_NOCOLOR', false);
}

require 'index.php';

use Sys\Log;
use Sys\Basic;

if (in_array('--help', $argv) || in_array('-h', $argv)) {
    $argumento_selecionado = true;
    help();
}

if (in_array('-dbu', $argv)) {
    $argumento_selecionado = true;
    $atualizacao_dao = new Atualizacao_DAO();
    $atualizacao_dao->dbu_cli($command_line_interface);
    exit;
}

if (in_array('-job', $argv)) {
    $argumento_selecionado = true;
    $job_scheduler_dao = new Job_Scheduler_DAO();

    try {
        $job_scheduler_dao->processar();
        exit;
    }
    catch (BusinessException $e) {
        Log::escrever(basename(__FILE__), json_encode($e, JSON_PRETTY_PRINT), defined('JOB_PATH'), Log::CLI_DANGER);
    }
}

if (in_array('-cp', $argv)) {
    $argumento_selecionado = true;
    
    // processar todos
    if (end($argv) == '-cp') {
        try {
            Central_Pendencias_DAO::reprocessar(true);
            exit;
        }
        catch (BusinessException $e) {
            Log::escrever(basename(__FILE__), json_encode($e, JSON_PRETTY_PRINT), defined('JOB_PATH'), Log::CLI_DANGER);
        }
    }
    $tipo = NULL;
    $campos_chave = NULL;
    $calcular_opcionais = function() use (&$campos_chave, $argv, &$tipo) {
        $opcionais = explode('=', end($argv));
        $campos_chave['tipo'] = $tipo;
        $campos_chave[$opcionais[0]] = $opcionais[1];
    };
    $processar_modulo = function($arg, $enum, $dao) use (&$calcular_opcionais, $argv, &$tipo) {
        if (in_array($arg, $argv)) {
            $tipo = $enum;
            if (end($argv) == $arg) {
                $dao::reprocessar(true);
                exit;
            }
            else {
                $calcular_opcionais();
            }
        }
    };

    $processar_modulo(
        '--agenda-evento',
        Central_Pendencias_Model::TIPO_AGENDA_EVENTO,
        'Central_Pendencias_Agenda_Evento_DAO'
    );

    $processar_modulo(
        '--tarefa-cartao',
        Central_Pendencias_Model::TIPO_TAREFA_CARTAO,
        'Central_Pendencias_Tarefa_Quadro_Lista_Cartao_DAO'
    );

    $processar_modulo(
        '--chamado',
        Central_Pendencias_Model::TIPO_CHAMADO,
        'Central_Pendencias_Chamado_DAO'
    );

    $processar_modulo(
        '--documento-aprovacao-alcada',
        Central_Pendencias_Model::TIPO_DOCUMENTO_APROVACAO_ALCADA,
        'Central_Pendencias_Documento_Aprovacao_Alcada_DAO'
    );

    $processar_modulo(
        '--documento-distribuicao-controlada',
        Central_Pendencias_Model::TIPO_DOCUMENTO_DISTRIBUICAO_CONTROLADA,
        'Central_Pendencias_Documento_Distribuicao_Controlada_DAO'
    );

    $processar_modulo(
        '--processo-solicitacao-atividade',
        Central_Pendencias_Model::TIPO_PROCESSO_SOLICITACAO_ATIVIDADE,
        'Central_Pendencias_Processo_Solicitacao_Atividade_DAO'
    );
    
    $processar_modulo(
        '--projeto-atividade',
        Central_Pendencias_Model::TIPO_PROJETO_ATIVIDADE,
        'Central_Pendencias_Projeto_Atividade_DAO'
    );

    $processar_modulo(
        '--pdca-atividade',
        Central_Pendencias_Model::TIPO_PDCA_ATIVIDADE,
        'Central_Pendencias_PDCA_Atividade_DAO'
    );

    $processar_modulo(
        '--crm-oportunidade',
        Central_Pendencias_Model::TIPO_CRM_OPORTUNIDADE,
        'Central_Pendencias_Oportunidade_DAO'
    );

    $processar_modulo(
        '--crm-oportunidade-orcamento',
        Central_Pendencias_Model::TIPO_CRM_OPORTUNIDADE_ORCAMENTO,
        'Central_Pendencias_Oportunidade_Orcamento_DAO'
    );

    $processar_modulo(
        '--crm-oportunidade-agenda',
        Central_Pendencias_Model::TIPO_CRM_OPORTUNIDADE_AGENDA,
        'Central_Pendencias_Oportunidade_Agenda_DAO'
    );
    
    if (empty($tipo)) {
        echo PHP_EOL . "Parametro invalido";
        exit;
    }

    if (empty($campos_chave)) {
        echo PHP_EOL . "Parametro invalido";
        exit;
    }

    if (!empty($campos_chave)) {
        if (sizeof($campos_chave) < 2) {
            echo PHP_EOL . "Parametro invalido";
            exit;
        }
        Central_Pendencias_DAO::adicionar($campos_chave);
        exit;
    }

}

if (empty($argumento_selecionado)) {
    help();
}

// executa script
foreach ($argv as $key => $arg) {   
    if ($arg == '-script') {
        if (file_exists($argv[$key+1])) {
            require_once($argv[$key+1]);
            exit;
        }
    }
}