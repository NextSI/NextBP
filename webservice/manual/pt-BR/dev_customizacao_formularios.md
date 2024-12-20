# Formulários Customizados
Para acessar as ferramentas do desenvolvedor, clique no menu, “Mais opções”, “Ferramentas do Desenvolvedor”. [Saiba mais neste link](https://developers.google.com/web/tools/chrome-devtools/)

Uma das ferramentas é o “Console”, nele podemos digitar códigos Java Script. Outra ferramenta importante na customização de formulários é a “Sources”, que irá exibir todos os arquivos carregados pelo navegador.

Em um evento de um formulário, na aba console ou em qualquer código javascript executado no Next BP, podemos utilizar alguns comandos nos ajudar a “debugar” nosso código:

| Comando                 | Função      |
| ----------------------- | ----------- |
| `console.log(variavel)`   | Exibe no log o conteúdo de alguma variável (texto, numero, array, objeto, etc) |
| `debugger;`               | Define um break point no código, utilizar nos eventos dos formulários. Obs: só funciona quando o F12 estiver habilitado |

Para facilitar a customização, **utilize seletores jQuery nos elementos do formulário**. Obs: para conhecer mais sobre a jQuery, acesse www.jquery.com

Exemplos:
| Comando                 | Função      |
| ----------------------- | ----------- |
| `.find('...')` | Para encontrar um elemento |
| `.parent()` | Para acessar o elemento anterior |
| `get_valor(id_campo)` | Utilizado para obter o valor do campo. O resultado precisa ser armazenado em uma variável para ser acessado. Para campos de tabela, a função retorna os valores de cada linha. |
| `get_dados_integracao(id_campo)` | Utilizado para obter dados adicionais de um campo de integração. Retorna um objeto, e o resultado precisa ser armazenado em uma variável para ser acessado. Para campos de tabela, a função retorna os dados de cada linha. |
| `set_valor(id_campo, valor, obj_integracao)` | Utilizado para aplicar o valor em um campo do formulário. O terceiro parâmetro é utilizado em campos de integração, recebe um objeto que será gravado como dados adicionais do campo de integração. |
| `.maskMoney('mask', parseFloat(novo valor)).trigger('change')` | Para alterar valor de campos numéricos |
| `.maskMoney('unmasked')[0]` | Para para obter o valor (float) de campos numéricos |

Agora que conhecemos estas duas ferramentas e alguns comandos básicos, vamos à customização de um formulário.