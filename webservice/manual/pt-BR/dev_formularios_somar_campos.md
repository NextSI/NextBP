# Formulário: Somar Campos
Adicione em um grupo do formulário três campos tipo “Número Decimal”: edtValor1, edtValor2 e edtSoma.

Adicione no mesmo grupo um campo tipo “Botão”, btnSomar, posicione o botão entre o edtValor2 e edtSoma.
No evento “Ao Clicar” do btnSomar, adicione o código:

```javascript
var valor1 = edtValor1.maskMoney('unmasked')[0];
var valor2 = edtValor2.maskMoney('unmasked')[0];
edtSoma.maskMoney('mask', parseFloat(valor1 + valor2)).trigger('change');
```
![]([PATH_IMG]/dev_form_exemplo_somar.png)