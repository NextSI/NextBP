## PO-PR10 - MODELAGEM DE FORMULÁRIOS

**PASSO 1:** Após logar com o usuário ADMIN, prosseguir com o seguinte caminho: 

Processos > Modelagem de formulários

Ou pode-se digitar "modelagem de formulários" no campo de busca:

![]([PATH_IMG]/mp-po-pr10-01.png)

![]([PATH_IMG]/mp-po-pr10-02.png)


**PASSO 2:** Clicar em "Novo" para criar um novo formulário:

![]([PATH_IMG]/mp-po-pr10-03.png)

**PASSO 3:** Na aba “modelagem”, digite o nome do formulário, em seguida insira um novo grupo de campos clicando em "mais grupo", então digite o nome do grupo e adicione campos clicando em "mais campo":

![]([PATH_IMG]/mp-po-pr10-04.png)

**PASSO 4:** Na aba “geral”, preencha o campo "rótulo" com o nome do título a ser preenchido (o ID do campo é preenchido automaticamente mas pode ser alterado, e deve ser único). Definir o “tipo do campo” clicando na seta do respectivo campo; definir o “tamanho de caracteres” quando for o caso, bem como a “largura da linha”, incrementando a quantidade de linhas ao incrementar-se o valor inserido.

![]([PATH_IMG]/mp-po-pr10-05.png)

**Passo 5:** Defina a largura do campo adicionando um valor ao campo “colunas (layout)”, sendo que uma linha possui, no total, 12 colunas (largura do formulário como um todo), ou seja, se colocar o valor 1, o campo terá um espaço equivalente a 1/12 da largura total do formulário.

![]([PATH_IMG]/mp-po-pr10-06.png)

**PASSO 6:** Na aba “eventos” é possível criar uma automação em linguagem javascript (detalhes fornecidos em treinamento específico).

![]([PATH_IMG]/mp-po-pr10-07.png)

**PASSO 7:** TIPOS DE CAMPOS:

**Texto fixo:** permite adicionar um texto informativo ao formulário, podendo conter uma orientação ou observação:

![]([PATH_IMG]/mp-po-pr10-08.png)

**Número decimal:** com a quantidade de casas

![]([PATH_IMG]/mp-po-pr10-09.png)

**Opções:** este campo permite criar uma lista de opções adicionando valores a serem escolhidos pelo usuário, nos seguintes formatos:

* Lista suspensa: retângulo com a setinha ao lado e somente permitirá selecionar uma opção
* Lista suspensa múltipla: retângulo com a setinha ao lado permitirá selecionar mais de uma opção
* Caixa de seleção: marcação das bolinhas, e somente permitirá selecionar uma bolinha
* Caixa de verificação: múltipla: marcação das bolinhas, podendo marcar mais de uma

![]([PATH_IMG]/mp-po-pr10-10.png)

**Máscara:** permite definir a aparência dos dados em um campo. Costuma ser utilizado para informações com formatação fixa (ex: CPF, CNPJ, telefone, placa de veículos, etc):

![]([PATH_IMG]/mp-po-pr10-11.png)

**Data:** além de inserir a data em formato padrão, permite também conceder permissões relativas à retroatividade do campo (não permitir data retroativa, e/ou não permitir data retroativa nem igual ao dia corrente):

![]([PATH_IMG]/mp-po-pr10-12.png)

**Anexo:** permite incluir um arquivo ao formulário, que será armazenado no GED:

![]([PATH_IMG]/mp-po-pr10-13.png)

**Seleção de documentos:** permite buscar um arquivo dentro de um local específico em uma pasta dentro do GED (definido no campo “pastas”), disponibilizando-o ao usuário:

![]([PATH_IMG]/mp-po-pr10-14.png)

**Caixa de verificação:** campo do tipo "check", similar a um do tipo “Li e concordo com os termos”:

![]([PATH_IMG]/mp-po-pr10-15.png)

**Botão:** permite adicionar um botão que executará uma rotina programada em javascript (detalhes em treinamento específico):

![]([PATH_IMG]/mp-po-pr10-16.png)

**PASSO 8:** PERMISSÕES COMUNS:

Há algumas permissões que são comuns a todos os tipos de campo, as quais são:

* Tornar o campo obrigatório
* Utilizar em filtros (habilita o campo a aparecer no filtro especialista)
* Exibir o campo na descrição da solicitação em andamento (habilita o campo a aparecer na grid de processos)
* Exibir este campo na impressão (e-mail/pdf)

Para encerrar clique em "ok".

![]([PATH_IMG]/mp-po-pr10-17.png)

**PASSO 9:** Os campos criados aparecerão como no print abaixo, e é possível clicar em “previsão” para visualizar a aparência do formulário final:

![]([PATH_IMG]/mp-po-pr10-18.png)

**PASSO 10:** Finalize a visualização clicando em ok.

![]([PATH_IMG]/mp-po-pr10-19.png)

**PASSO 11:** Também é possível inserir uma tabela contendo campos. Para tanto, basta clicar em "mais tabela":

![]([PATH_IMG]/mp-po-pr10-20.png)

**PASSO 12:** Preencha o campo “nome da tabela” e a quantidade de linhas, em seguida clique em "+ campo":

**OBS:** Preenchendo a quantidade de linhas, a tabela ficará estática, ou seja, terá exatamente a quantidade de linhas digitadas. Porém, preenchendo o valor “0”, a tabela será dinâmica, ou seja, pode-se adicionar ou remover linhas conforme a necessidade.

![]([PATH_IMG]/mp-po-pr10-21.png)


**PASSO 13:** Preencha o “rótulo” do campo da tabela e o “tamanho da coluna” baseando-se em % ou px (pixels); selecione o tipo clicando no respectivo campo (é o mesmo campo de tipo da etapa anterior).

Selecione um totalizador (somador) clicando na setinha, sendo: 

Tipos disponíveis:
* Contagem: Contagem simples da quantidade de "células"
* Contagem com distinção: soma apenas valores exclusivos, ou seja, se houver valores/textos iguais, é contabilizado apenas um deles
* Soma: somatória dos valores na última linha
* Média: média simples na última linha

![]([PATH_IMG]/mp-po-pr10-22.png)

**PASSO 14:** Segue as definições informadas no “Passo 8 – Permissões Comuns”:

![]([PATH_IMG]/mp-po-pr10-23.png)

**PASSO 15:** Permite editar alguns campos anteriores, bem como excluir o campo em questão na tabela selecionada:

![]([PATH_IMG]/mp-po-pr10-24.png)

**PASSO 16:** Para inserir mais campos à tabela, basta clicar em "mais campo".

Para remover a tabela, clique em "remover" e para finalizar a tabela clique em "ok"

![]([PATH_IMG]/mp-po-pr10-25.png)


**PASSO 17:** Para visualizar como ficaria a tabela no formulário, basta clicar em "previsão".

Para finalizar a visualização, clique em "ok"

![]([PATH_IMG]/mp-po-pr10-26.png)
![]([PATH_IMG]/mp-po-pr10-27.png)

**PASSO 18:** É possível editar a ordem dos campos dentro do formulário para a esquerda e para a direita, clicando com o botão esquerdo do mouse sobre as setas abaixo do nome do campo:

![]([PATH_IMG]/mp-po-pr10-28.png)

**PASSO 19:** É possível alterar a ordem dos campos dispostos dentro de uma tabela ao clicar nas setinhas para cima e para baixo

![]([PATH_IMG]/mp-po-pr10-29.png)


**PASSO 20:** Para criar grupos, clique em "mais grupo". Para excluir um grupo clique no ícone "lixeira" do grupo desejado.

![]([PATH_IMG]/mp-po-pr10-30.png)

**PASSO 21:** Na aba eventos dentro do formulário (ou dentro de cada grupo) é possível desenvolver uma automação utilizando a linguagem javascript (detalhes em treinamento específico).

Abaixo seguem as permissões da aba “eventos”. Para finalizar clique em "salvar".

![]([PATH_IMG]/mp-po-pr10-31.png)


**PASSO 22:** As opções dispostas abaixo referem-se à modelagem de um formulário:

* Editar o formulário
* Clonar o formulário (copiar)
* Exportar o formulário para .nbpf (next business process format)
* Excluir o formulário

![]([PATH_IMG]/mp-po-pr10-32.png)

**PASSO 23:** Os ícones listados abaixo permitem importar um formulário previamente exportado, bem como atualizar a listagem de formulários:

* Importar formulário
* Atualizar 

![]([PATH_IMG]/mp-po-pr10-33.png)


**PASSO 24:** Caso se tenha um formulário no formato em .nbpf (next business process format), previamente exportado, basta clicar em "importar" e clicar na área em branco para abrir a janela de seleção do mesmo, ou arrastar o arquivo para dentro da mesma área em branco, como indica o print abaixo.

Para finalizar clique em "salvar"

![]([PATH_IMG]/mp-po-pr10-34.png)

**DICA:** [Formulários Customizados](?i=pt-BR&p=dev_customizacao_formularios)