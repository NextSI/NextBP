# Criar funções javascript específicas (e globais)
O Next BP possui um arquivo padrão para declaração de funções específicas. Tudo que for declarado neste arquivo estará no escopo global do aplicativo, podendo ser acessado à qualquer momento.

Na pasta `[Diretório Next BP]/webservice/especificos/peJS/` crie o arquivo `especificos.pe.js`, ou renomeie o arquivo `especificos.pe.js.sample`.
Para exemplificar, neste arquivo vamos declarar o uma função que poderá ser utilizada por qualquer formulário de processo.

```javascript
function multiplicar(valor1, valor2) {
    return valor1*valor2;
}
```

Após alterar o arquivo especificos.pe.js o aplicativo deverá ser recarregado pelo navegador (F5), se necessário limpe o cache.

Após o arquivo ser recarregado pelo navegador, você poderá utilizar a função multiplicar, e qualquer outra função declaradas, em qualquer evento do formulário e de seus campos, e em gateways automatizados (modelagem de processo).

![]([PATH_IMG]/dev_especificos.pe.js.png)