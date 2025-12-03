# Exemplo de customização de impressão de chamados

```php
<?php

use \Sys\PE;
use \Sys\Basic;

define('CHAMADO_PDF_MENSAGENS_CSS_BORDA_PADRAO', '1px solid #000');
define('CHAMADO_PDF_MENSAGENS_CSS_BORDER_COLLAPSE', 'collapse');

function chamado_imprimir_mensagens_div_titulo($titulo) {
    return '<h3 id="tituloMensagens" style="font-weight:bold;font-size:20px;text-align:center;margin-bottom:25px;text-decoration:underline;">'.$titulo.'</h3>';
}

PE::add('chamado_imprimir_mensagens_antes', function($chamado_model, &$html) {
    // Formulário de abertura
    if (!empty($chamado_model->formulario_abertura_id) && !empty($chamado_model->formulario_chamado_abertura_id)) {
        $formulario_model = Formulario_Personalizado_DAO::get_formulario($chamado_model->formulario_abertura_id, 'formulario_chamado_abertura', ['chamado_id' => $chamado_model->id]);
        $formulario_html = chamado_imprimir_mensagens_div_titulo('Formulário de Abertura');
        $formulario_html .= Formulario_PDF::html($formulario_model, CHAMADO_PDF_MENSAGENS_CSS_BORDA_PADRAO, 0, CHAMADO_PDF_MENSAGENS_CSS_BORDER_COLLAPSE);
        $html .= $formulario_html;
    }
});

PE::add('chamado_imprimir_mensagens_depois', function($chamado_model, &$html) {
    if ($chamado_model->situacao === Chamado_Model::SITUACAO_ENCERRADO || $chamado_model->situacao === Chamado_Model::SITUACAO_ENCERRADO_INATIVIDADE) {        
        
        // Formulário de avaliação
        if (!empty($chamado_model->formulario_avaliacao_id) && !empty($chamado_model->formulario_chamado_avaliacao_id)) {
            $formulario_model = Formulario_Personalizado_DAO::get_formulario($chamado_model->formulario_avaliacao_id, 'formulario_chamado_avaliacao', ['chamado_id' => $chamado_model->id]);
            $formulario_html = chamado_imprimir_mensagens_div_titulo('Formulário de Avaliação');
            $formulario_html .= Formulario_PDF::html($formulario_model, CHAMADO_PDF_MENSAGENS_CSS_BORDA_PADRAO, 0, CHAMADO_PDF_MENSAGENS_CSS_BORDER_COLLAPSE);
            $html .= $formulario_html;
        }

        // Formulário de encerramento (somente para colaboradores)
        $sessao_model = \Sys\Sessao::objeto((Basic::instance_token()));
        if ($sessao_model->dados->tipo == Usuario_Model::USUARIO_TIPO_COLABORADOR
            && !empty($chamado_model->formulario_encerramento_id)
            && !empty($chamado_model->formulario_chamado_encerramento_id))
        {
            $formulario_model = Formulario_Personalizado_DAO::get_formulario($chamado_model->formulario_encerramento_id, 'formulario_chamado_avaliacao', ['chamado_id' => $chamado_model->id]);
            $formulario_html = chamado_imprimir_mensagens_div_titulo('Formulário de Encerramento');
            $formulario_html .= Formulario_PDF::html($formulario_model, CHAMADO_PDF_MENSAGENS_CSS_BORDA_PADRAO, 0, CHAMADO_PDF_MENSAGENS_CSS_BORDER_COLLAPSE);
            $html .= $formulario_html;
        }
    }
});
```
