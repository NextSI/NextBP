function manutencao_menu() {
    return;
    
    App.menu_add(
        "modulo_crm",
        "mc_custos_menu",
        {
            click: function() {
                // evento que será executado ao clicar no menu
                View.load('imposto/listar', function(html_id, imposto_listar) {
                    imposto_listar.show();
                }, View.ABA.SIM, true);
            },
            nome: "Impostos",
            permissao: null
        }
    );

    // menu "Exemplo Menu"
    App.menu_add(
        "modulo_chamados",          // módulo id
        null,                       // menu pai id (opcional)
        {
            click: null,            // click do menu
            id: "mc_exemplo_menu",  // id do menu
            nome: "Exemplo Menu",   // nome do menu
            permissao: null         // chave de permissao para não exibir o menu
        }
    );

    // submenu "Site da Next"
    App.menu_add(
        "modulo_chamados",
        "mc_exemplo_menu",
        {
            click: function() {
                // evento que será executado ao clicar no menu
                View.navegador('http://www.nextsi.com.br', 'Site Next', View.ABA.SIM);
            },
            id: "id_unico",
            nome: "Site da Next",
            permissao: null
        }
    );
    
}