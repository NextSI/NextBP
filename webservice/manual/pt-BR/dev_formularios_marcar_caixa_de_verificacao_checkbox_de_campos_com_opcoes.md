# Formulário: Marcar Caixa de Verificação (checkbox) de Campos com Opções
Temos um campo de opção com seleção múltipla.

![]([PATH_IMG]/dev_form_exemplo_lista_animais_campo.png)

Para selecionar automaticamente a opção "Cachorro", execute o seguinte código:

```javascript
lista_animais.each(function(index, input) {
    if (input.value == "Cachorro") {
        $(input).prop('checked', true).trigger('change');
    }
})
```

Ao executar o código veremos o resultado:

![]([PATH_IMG]/dev_form_exemplo_lista_animais_resultado.png)
