# Formulários: Copiar Dados de Tabelas

Neste exemplo, desejamos copiar os dados da `tabela_a` para a `tabela_b`.

![]([PATH_IMG]/dev_formularios_copiar_dados_tabelas_formulario.png)

Para isso vamos excluir as linhas da `tabela_b`, percorrer cada linha da `tabela_a`, inserir novas linhas na tabela `tabela_b` e copiar os dados.

No evento `Ao Clicar` do botão `copiar_dados_tabela`, adicione o javascript:

```javascript
// remover linhas da tabela_b
tabela_b.find('tr[linha_count] .btn_exclui_linha').click();

// percorrer linhas da tabela_a
var linhas = tabela_a.find('tr[linha_count]');

for (var linha = 0; linha < linhas.length; linha++) {
  // adicionar linha na tabela_b
  tabela_b.find('.btn_add_linha:first').click();
}

// timeout para aguardar o término do processamento de inclusão de novas linhas
setTimeout(function() {
  for (var linha = 0; linha < linhas.length; linha++) {

    // valor campo a
    var campo_a = $(linhas[linha]).find('[id_elemento="campo_a"]');
    var valor_campo_a = get_valor(campo_a);

    // valor campo b
    var valor_campo_b = $(linhas[linha]).find('[id_elemento="campo_b"]').maskMoney('unmasked')[0];
    var tabela_b_linha = tabela_b.find('tr[linha_count='+linha+']');
    var tabela_b_linha_campo_c = $(tabela_b_linha.find( '[id_elemento="campo_c"]'));
    
    set_valor(tabela_b_linha_campo_c, valor_campo_a);

    tabela_b_linha.find( '[id_elemento="campo_d"]').maskMoney('mask', valor_campo_b).trigger('change');
  }
}, 800);


// bloqueia o campo_c e campo_d
set_bloqueado(campo_c, true);
set_bloqueado(campo_d, true);

// ocultar botões
tabela_b.find('.btn_add_linha').hide();
tabela_b.find('.btn_exclui_linha').hide();
```

Resultado ao clicar no botão "Copiar Dados Tabela A para B":

![]([PATH_IMG]/dev_formularios_copiar_dados_tabelas_resultado.png)