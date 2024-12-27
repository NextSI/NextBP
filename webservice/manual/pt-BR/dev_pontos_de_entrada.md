# Pontos de Entrada

Requisitos:

* [entendimento sobre o webservice](?i=pt-BR&p=dev_webservice)
* [entendimento sobre o diretório específicos](?i=pt-BR&p=dev_especificos)

## Pontos de Entrada em regras de Negócio – Webservice
A ferramenta Next BP possui pontos de entrada que interceptam processos de regras de negócio no momento de sua execução.

Para obter a lista completa de pontos de entrada, acesse o diretório `[Diretório Next BP]/webservice/especificos/pe/` e verifique os arquivos **.pe.php.sample**. Estes arquivos são uma amostra de uso do ponto de entrada. Para que um ponto de entrada seja reconhecido pelo Next BP, copie o **[arquivo].pe.php.sample** e renomeie para **[arquivo].pe.php**.

Com o objetivo de deixar o código dos pontos de entrada mais organizados, recomendamos que sejam criados scripts PHP específicos com as regras de negócio que deverão ser executadas pelo ponto de entrada. Estes scripts específicos deverão ser armazenados em `[Diretório Next BP]/webservice/especificos/`.

Atenção: após criar o arquivo de ponto de entrada sua disponibilidade para funcionamento será imediata, portanto, esteja ciente que **um script PHP com códigos inadequados poderá causar impactos no comportamento ferramenta**.

Dica 1: Sempre que for necessário realizar um require ou include, utilize as funções **require_once** ou **include_once**, pois se por ventura dois pontos de entrada forem executados em um mesmo processamento e ambos possuírem “require” ou “include”, sem “_once”, apontando para o mesmo script, fará com que o script seja carregado mais que uma vezes, podendo causar erros de execução como por exemplo duplicidade de classes, funções e constantes.

Dica 2: Para maiores detalhes, segue o [link para o tutorial de como criar uma API customizada](?i=pt-BR&p=dev_api_customizada):

## Pontos de entrada em telas – Frontend

Através de pontos de entrada em JavaScript, podemos criar variáveis e funções genéricas, além de incluir novos itens no menu.

Os pontos de entrada em javascript se encontram na pasta `[Diretório Next BP]/webservice/especificos/peJS/`.

Existem dois PEs que são carregados automaticamente ao logar-se no Next BP:

* especificoes.pe.js ([Criar Funções em JavaScript para Utilizar em Todo o Aplicativo](?i=pt-BR&p=dev_criar_funcoes_javascript))
* menu.pe.js ([Menu Personalizado em JavaScript](?i=pt-BR&p=dev_menu_personalizado_javascript))

Os demais PEs, para serem carregados pelo Next BP, é necessário utilizar a função `View.loadPE`, conforme o código de exemplo `View.loadPE('Oportunidade_Detalhes_Novo', main);`.