# Formulário: Preencher Campos com Resultado de Consulta de Integração
Para exemplificar, elaboramos uma “Consulta de Integração” que realiza listagem em uma tabela de usuários através da SQL:

```sql
SELECT id, nome, email, idioma FROM usuario
```

Criamos o formulário com os campos:

![]([PATH_IMG]/dev_form_consulta_integracao_a.png)

No campo “Usuário” vinculamos a consulta de integração citada acima, no evento “Ao Selecionar”, adicionamos o código javascript:
```javascript
var usuario_selecionado = JSON.parse(txtUsuario.attr('objeto'));

set_valor(txtID, usuario_selecionado.id);
set_valor(txtNome, usuario_selecionado.nome);
set_valor(txtIdioma, usuario_selecionado.idioma);
```
O resultado após a seleção do usuário é a seguinte:

![]([PATH_IMG]/dev_form_consulta_integracao_b.png)
