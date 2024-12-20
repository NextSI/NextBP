# Formulários: Calcular Campos de Tabelas

Neste exemplo, desejamos calcular a `campo_c`, que será a multiplicação entre a `campo_a` e `campo_b`.

![]([PATH_IMG]/dev_formularios_calcular_campos_tabela_a.png)

No evento `Ao Alterar` dos `campo_a` e `campo_b`, adicione a chamada de função:

```javascript
App.form_exemplo_tabela.ao_alterar_campos(main, handler);
```

No evento `Ao Iniciar` do formulário, crie o evento:

```javascript
App.form_exemplo_tabela = {};
App.form_exemplo_tabela.ao_alterar_campos = function(handler) {
  const linha = $(handler.target).closest("tr");

  const valor_campo_a = linha.find('[id_elemento="campo_a"]').maskMoney('unmasked')[0];
  const valor_campo_b = linha.find('[id_elemento="campo_b"]').maskMoney('unmasked')[0];
  
  // calcula o novo valor
  let valor_campo_c = valor_campo_a * valor_campo_b;

  // atualiza o valor do campo_c
  linha.find('[id_elemento="campo_c"]').maskMoney('mask', parseFloat(valor_campo_c)).trigger('change');
  
  set_bloqueado(campo_c, true);
}
```

Resultado:

![]([PATH_IMG]/dev_formularios_calcular_campos_resultado.png)