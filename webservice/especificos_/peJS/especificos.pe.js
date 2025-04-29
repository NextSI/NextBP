App.PE.formulario_render_tabela_depois = function(tabela, obj_solicitacao) {
    if (obj_solicitacao.processo_id === 1) { // colocar o id do processo
        const lista_cores = ['Azul', 'Amarelo', 'Vermelho'];
        const campo_cores = $(tabela).find('select[id_elemento="cores"]');
        campo_cores.each((i, linha_campo_cores) => {
            $(linha_campo_cores).find('option[value="Valor inicial"]').remove();
            lista_cores.forEach((cor) => {
                const option = $(linha_campo_cores).find('option[value="'+cor+'"]');
                if (option.length == 0) add_option($(linha_campo_cores), cor, cor);
            });
        });
    }
}

App.PE.Lang_load_depois = function() {
    //App.lang.home.mural = "Orkut";
    const css_remove_social = '.mural_mensagem_div { display: none; }';
    const head = document.head || document.getElementsByTagName('head')[0];
    let style = document.createElement('style');
    style.appendChild(document.createTextNode(css_remove_social));
    head.appendChild(style);
}

App.testeDeadlock = () => {
    for (let index = 0; index < 100; index++) {
        App.solicitacaoNovaDeadlock();
        //App.documentoSalvarDeadlock();   
    }
};

App.documentoSalvarDeadlock = () => {
    const data = {
        nome: 'Teste DEADLOCK',
        codigo: null,
        validade: null,
        validade_periodo: null,
        data_vigencia: null,
        observacao_documento: null,
        observacao_historico_documento: null,
        observacao_revisao: null,
        assunto_id: 1,
        tipo_documento_id: 1,
        local_armazenamento_id: 1,
        documento_pasta_id: 1,
        usuarios_permissoes: null,
        grupos_permissoes: null,
        controle_acessos: false,
        validacao_permissoes_retroativas: [],
        atividade_id: null,
        projeto_id: null,
        solicitacao_id: null,
        solicitacao_atividade_id: null,
        oportunidade_id: null,
        tag: null,
        notificar_por_email: false,
        notificar_por_email_antes: false,
        notificar_por_email_antes_quem: null,
        dias_notificacao_email: null,
        notificar_por_usuario_seguranca: false,
        notificar_por_usuario_aprovador: false,
        emails_adicionais: [],
        tipo_anexo: null,
        arrAprovadoresManual: null,
        tipo_aprovacao: null,
        alcada_generica_id: null,
        prazo_dias: null,
        utilizar_controle_distribuicao: false,
        tornar_dist_pend_aprov_doc: false,
        distribuicao_controlada: null,
        referencia_tabela: null,
        referencia_id: null
    };
    WS.post("documento/salvar", data, (response) => console.log(response));
}

App.solicitacaoNovaDeadlock = () => {
    const data = {
        versao_processo_id: 61,
        versao_processo_atividade_id: 289,
        data_referencia: null,
        projeto_atividade_id: null,
        projeto_id: null,
        solicitacao_atividade_id: null,
        solicitacao_id: null,
        referencia_tabela: null,
        referencia_id: null
    };
    WS.post("solicitacao/nova/", data, (response) => console.log(response));
};