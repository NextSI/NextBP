# Crie suas próprias telas

O Next BP possui um sistema de "views", sendo possível carrega-las em abas ou em modal.

Uma view é composta por dois arquivos, um HTML e outro JavaScript.

Segue abaixo um exemplo prático:

`[Diretório Next BP]/webservice/especificos/view/exemplo/modal.html`

```html
<div class="modal bs-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn_cancelar close">&times;</button>
                <h4 class="modal-title">Exemplo Modal</h4>
            </div>
            <div class="modal-body">                
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label for="edt_nome">Nome Fantasia</label>
                            <input type="text" class="edt_nome form-control" maxlength="50" placeholder="Filtro por nome fantasia">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label for="edt_razao_social">Razão Social</label>
                            <input type="text" class="edt_razao_social form-control" maxlength="50" placeholder="Filtro por razão social">
                        </div>
                    </div>            
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="edt_telefone">Telefone</label>
                            <input type="text" class="edt_telefone form-control" maxlength="50" placeholder="Filtro por telefone">
                        </div>
                    </div>            
                </div>
            </div>
            <div class="modal-footer" style="bottom: 0px;">
                <button type="button" class="btn_cancelar btn btn-default">Cancelar</button>
                <button type="button" class="btn_pesquisar btn btn-primary">Pesquisar</button>                
            </div>
        </div>
    </div>
</div>
```

`[Diretório Next BP]/webservice/especificos/view/exemplo/modal.js`

```javascript
define([], function() {

    var Exemplo_Modal = function(html_id) {
        'use strict';
        var main = this;

        // janela
        this.html_id = html_id;
        this.dialog = $('#' + this.html_id);
        this.modal = this.dialog.find('.modal');
        this.modal.attr('id', this.html_id + '_modal');
        this.onselect = null;
        this.onclose = null;

        // elementos
        this.edt_nome = this.dialog.find('.edt_nome');
        this.edt_razao_social = this.dialog.find('.edt_razao_social');
        this.edt_telefone = this.dialog.find('.edt_telefone');
        this.btn_cancelar = this.dialog.find('.btn_cancelar');
        this.btn_pesquisar = this.dialog.find('.btn_pesquisar');        

        // métodos
        this.show = function(nome) {
            set_focus(main.edt_nome);
            show_modal(main.modal.attr('id'));
        };

        // close
        this.close = function() {
            close_modal(main.modal.attr('id'));

            if ((typeof main.onclose != "undefined") && (main.onclose)) {
                main.onclose();
            }  
        };

        // unload
        this.unload = function() {
            main.close();
            View.unload(this.html_id);
        };

        // eventos
        this.btn_cancelar.unbind('click');
        this.btn_cancelar.click(function() {
            main.unload();
        });

        this.btn_pesquisar.unbind('click');
        this.btn_pesquisar.click(function() {
            alert_modal('Título', 'Clicou em Pesquisar');
        });

    }

    return Exemplo_Modal;

});
```

Para abrir a view, execute o código:
```javascript
View.load(
    "exemplo/modal",
    function(html_id, exemplo_modal){
        exemplo_modal.show();
    },
    View.ABA.NAO,
    true
);
```

![]([PATH_IMG]/dev_views_exemplo_modal.png)