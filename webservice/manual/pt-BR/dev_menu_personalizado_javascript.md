# Menu Personalizado em JavaScript

No exemplo abaixo vamos adicionar no módulo de Chamados um menu e um submenu com evento de click para abrir o site da Next SI:

`[Diretório Next BP]/webservice/especificos/peJS/menu.pe.js`

```
function manutencao_menu() {

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
            nome: "Site da Next",
            permissao: null
        }
    );
    
}
```

Obtemos este resultado:

![]([PATH_IMG]/dev_pontos_de_entrada_menu.png)
