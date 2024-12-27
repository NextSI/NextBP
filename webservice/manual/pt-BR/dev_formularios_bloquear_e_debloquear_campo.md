# Formulário: Bloquear e Debloquear Campo

Utilize o método `set_bloqueado([campo], [bool])` para definir o bloqueio de um campo. Exemplo:

```
set_bloqueado(txtCPF, true); // bloqueia o campo
set_bloqueado(txtCNPJ, false); // desbloqueia o campo
```

Outra alternative é utilizar jQuery, altere a propriedade disabled do elemento, veja exemplo:
```javascript
edtSoma.prop('disabled', true);
```

Caso o bloqueio do campo deva ser realizado na inicialização do formulário, adicione o código acima no evento “Ao Iniciar” do formulário.

![]([PATH_IMG]/dev_form_exemplo_somar_readonly.png)