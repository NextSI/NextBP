# Formulário: Obter Data e Hora do Servidor

```javascript
data_hora_servidor((r) => {
  // código que deve ser executado após a resposta do servidor
  // ...

  // campo de data
  set_valor(id_campo_de_data, r.data);

  // campo de texto com data e hora no formato aaaa-mm-dd hh:mm:ss
  set_valor(id_campo_de_texto, r.data_hora); 
});
```

**Atenção:** para evitar que a data enviada pelo formulário esteja divergente com a data do servidor, recomendamos o uso de [pontos de entrada PHP](?i=pt-BR&p=dev_pontos_de_entrada) como `solicitacao_atividade_nova_antes`, `solicitacao_atividade_nova_depois`, `solicitacao_atividade_enviar_antes` e `solicitacao_atividade_enviar_depois`.