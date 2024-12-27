# Formulário: Diferença Entre Datas
Adicione em um grupo do formulário dois campos tipo “Data”: edtData1 e edtData2.

Adicione no mesmo grupo um campo tipo “Botão”, btnCalcular.
No evento “Ao Clicar” do btnCalcular, adicione o código:

```javascript
var dias = date_diff(get_datepicker(edtData1), get_datepicker(edtData2));
alert(dias);
```