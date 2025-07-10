/**
 * Next Business Process
 * www.nextsi.com.br
 * @copyright Copyright © 2014-2020 Next Soluções Inteligentes
 */
define([],function(){return function(t){"use strict";var i=this;this.html_id=t,this.dialog=$("#"+this.html_id),this.title="Cores de itens",this.dx_cores_itens=this.dialog.find(".dx_cores_itens"),this.dataGrid=null,this.listar=function(){i.dataGrid=dx_Listagem_Padrao({div_html:i.dx_cores_itens,coluna_chave:"id",colunas:dx_Cores_Itens_Colunas(i),toolbar:[dx_Cores_Itens_Btn_Novo(i)],datasource:WS_URI+"cores_itens/listar/",nome:this.title,nome_parametro_usuario:"grid_cores_itens",editing_mode:dx_Cores_Itens_Editing_Mode(),funcao_botao_salvar:dx_Cores_Itens_Funcao_Salvar(i),on_loaded:dx_Cores_Itens_OnLoaded(i),diferenca_altura:110})},this.unload=function(){View.unload(this.html_id)},this.listar()}});