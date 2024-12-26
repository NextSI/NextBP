## PO-PR15 - MODELAGEM DE PROCESSOS

[Modelagem de Processos (Diagrama)](?i=pt-BR&p=processos_modelagem_de_processos_diagrama)

**PASSO 1:** Após logar com o usuário ADMIN, prosseguir com o seguinte caminho:

Processos > Modelagem de Processos

Ou pode-se digitar "modelagem de processo" no campo de busca:

![]([PATH_IMG]/mp-po-pr15-01.png)

![]([PATH_IMG]/mp-po-pr15-02.png)

**PASSO 2:** Para criar um novo processo, clique em "Novo":

![]([PATH_IMG]/mp-po-pr15-03.png)


**PASSO 3:** Na aba “configurações” digite o nome do processo e o nome da tabela (essa informação precisa ser única e exclusiva, pois vai gerar uma tabela no banco de dados contendo todos os campos e informações que foram modelados dentro do formulário). Preencha a descrição do processo da forma mais detalhada possível.

![]([PATH_IMG]/mp-po-pr15-04.png)

**PASSO 4:** Abaixo segue descrição das permissões disponíveis:

Processo ativo: permite a utilização dessa modelagem ao solicitar o processo ou permite indisponibilizar seu acesso

Selecionar um cliente no início do processo: exibe campo para selecionar um cliente previamente cadastrado no BP

Cliente poderá visualizar solicitações vinculados a ele: usuário do tipo “cliente” poderá interagir com as solicitações

Permite download de formulários e atividades não concluídas: possibilita imprimir formulário do processo caso a atividade ainda esteja com dados parcialmente preenchidos, ou seja, não concluída

Armazenar anexos no módulo de documentos: permite armazenar os anexos do processo em uma pasta definida dentro do GED (passo abaixo).

![]([PATH_IMG]/mp-po-pr15-05.png)


**PASSO 5:** Escolha o local onde serão armazenados todos os anexos das solicitações (caso essa permissão seja habilitada), clicando no ícone "lupa".

Em seguida selecione a categoria (cadastro feito anteriormente - organização ao iniciar processo. Ex.: depto ao qual pertence um determinado processo) clicando no respectivo campo.

O Calendário de trabalho será utilizado como base para as datas definidas na modelagem do processo.

Em “Formulário”, escolha o formulário que será utilizado neste processo (feito na etapa de modelagem de formulário):

![]([PATH_IMG]/mp-po-pr15-06.png)


**PASSO 6:** Na aba “atividades”, clicar em nova atividade para iniciar a modelagem do processo

![]([PATH_IMG]/mp-po-pr15-07.png)


**PASSO 7:** Na aba “geral”, preencha o nome da atividade (o que será feito nessa atividade - verbo de ação) e escolha o tipo da atividade.

Obs: para a primeira atividade, escolher o tipo “início”;

Para atividades intermediarias, escolher tipo “normal”;

Para atividade final (encerramento do processo), escolher tipo “fim”.

Insira as informações de instrução de trabalho (como deverá ser realizada essa atividade em detalhes para que o usuário possa ser o mais autônomo possível. É possível adicionar hiperlinks para buscar documentos na internet ou dentro do próprio GED.

![]([PATH_IMG]/mp-po-pr15-08.png)

**PASSO 8:** Na aba “solicitante”, definir quem poderá abrir essa solicitação, adicionando tanto usuários individuais quanto grupos (recomendado utilizar grupos, sempre que possível, devido à maior facilidade no gerenciamento dos usuários) e definir as permissões:

* Alterar solicitante: o usuário pode abrir uma solicitação em nome de outro usuário.
* Cancela solicitação: a pessoa que iniciou pode cancelar a solicitação

![]([PATH_IMG]/mp-po-pr15-09.png)

**PASSO 9:** Na aba “notificações” as permissões se dividem em:

* Notificações no início da atividade
* Notificações na entrega da atividade

Definir conforme desejado. Caso seja necessário, é possível inserir outros e-mails para receberem notificações, além dos envolvidos no processo.

* Notificações por email no início: Ocorrem quando se clica em “nova solicitação”
* Notificações por email na entrega: ocorrem quando a atividade é preenchida e se clica em “salvar e enviar”

![]([PATH_IMG]/mp-po-pr15-10.png)

**PASSO 10:** Na aba “Gestão do tempo”, selecione as opções:

* Horas úteis: baseado no calendário de trabalho
* Dias corridos: simples dias corridos, independente do calendário de trabalho
* Data de referência: toma como base uma data especifica para entrega da atividade. Por exemplo, um processo de exportação onde o navio vai chegar em data XX. Bom base nessa data XX, adicionamos +5 +10 +15 ou -5 -10 -15 dias para calcular a data da próxima atividade.
* Permite reprogramar: permite ao usuário alterar o prazo para execução da atividade
* Acumular tempo gasto: caso a atividade possua prazo definido de 8 horas, por exemplo, e o responsável a execute em 5 horas, restará um saldo de 3 horas. Neste caso, se essa atividade voltar para o mesmo responsável, este terá apenas essas 3 horas restantes para executar a atividade, e não mais as 8 horas definidas no início da atividade.

Também há a opção de informar prazo ao concluir a atividade predecessora (permite informar manualmente, na atividade predecessora, o prazo para concluir a atividade atual).
É possível escolher a opção de notificação antes de expirar o prazo. Serão notificados tanto o solicitante quanto o responsável, bem como emails adicionais (“outros emails”).

Para finalizar clique em "ok".

![]([PATH_IMG]/mp-po-pr15-11.png)

**PASSO 11:** Na aba “permissões” são exibidos todos os grupos criados na modelagem do formulário. Neste momento, definimos se eles deverão ficar ocultos (“não exibir”), se poderão ser visualizados ou se poderão ser editados pelo usuário na atividade atual.

![]([PATH_IMG]/mp-po-pr15-12.png)

**PASSO 12:** Na aba “ações” é permitido vincular um projeto que será objeto de execução da atividade (um produto a ser produzido durante a execução do processo, por exemplo), no qual o executor/responsável deverá indicar uma porcentagem de conclusão do mesmo para que a atividade possa seguir adiante. Para finalizar clique em "ok"

![]([PATH_IMG]/mp-po-pr15-13.png)

**PASSO 13:** Para inserir um novo gateway basta clicar em "novo gateway" ou clicar com o botão direito do mouse sobre uma atividade. 


![]([PATH_IMG]/mp-po-pr15-14.png)

![]([PATH_IMG]/mp-po-pr15-15.png)

**PASSO 14:** Na aba “geral” preencha a descrição e o tipo do gateway, sendo:

**Exclusivo:** pode ter vários destinos, mas só permite uma única escolha (ex.: sim ou não, A ou B, etc);

**Paralelo (AND):** inicia todas as atividades que estiverem programadas (simultaneamente), não importando quantas ou quais sejam. Também usado como funil para receber várias atividades - ele precisa ser adicionado novamente após as atividades e aguarda o input de todas as atividades de origem - enquanto não receber todas, o processo não segue adiante. É possível dar andamentos diferentes a cada uma das ramificações - deixar sem destino por exemplo. Não é necessário ter mais um gateway paralelo para convergir tudo ao final (a não ser que o processo exija);

**Inclusivo (OR):** dá a opção de iniciar ou não as atividades configuradas como possíveis destinos de acordo com informações preenchidas/desenhadas no formulário e escolhidas pelo usuário na execução da atividade. O formulário precisa ter alguns campos que definem essa automação do gateway via javascript (mas pode funcionar sem o javascript, sendo, nesse caso, de forma manual). 

Se for usado um INCLUSIVO pra iniciar a atividade, é necessário um INCLUSIVO para convergir. Não pode colocar um PARALELO pra convergir, por exemplo, pois ele aguardaria a resposta de todas as atividades, mas no INCLUSIVO podem não ser iniciadas todas as atividades, então o paralelo aguardaria resposta de atividades não iniciadas, o que travaria o processo. Em caso de automação, o javascript é configurado na atividade que vai receber o input.

![]([PATH_IMG]/mp-po-pr15-16.png)

**PASSO 15:** Na aba “destino”, selecione o elemento de destino ao clicar no ícone "mais" e, em seguida, no menu do campo “elemento” para escolher qual a atividade a ser executada em seguida. Também é possível excluir um destino ao clicar no ícone "lixeira".

A permissão “bloquear alteração de decisão do gateway” costuma ser utilizada em automações, pois neste caso, o responsável pela etapa do processo não poderá alterar a decisão (baseada na escolha realizada em etapa anterior).

Para finalizar, clique em "ok"

![]([PATH_IMG]/mp-po-pr15-17.png)

**PASSO 16:** Ao selecionar a atividade anterior ao gateway, é possível notar que a atividade como destino será o gateway.

A opção "permite retorno" permite a atividade ser devolvida ao responsável pela atividade previamente executada.

Obs: as abas “permissões” e “ações” seguem o mesmo padrão de uma atividade normal.

Para finalizar clique em "ok'

![]([PATH_IMG]/mp-po-pr15-18.png)

**PASSO 17:** A aba “responsáveis” só é habilitada para atividades intermediárias, e possui as seguintes permissões:

* Obrigatório selecionar um responsável pela solicitação ao enviar atividade antecessora. Caso contrário todos os usuários responsáveis poderão trabalhar com essa solicitação:  obriga o processo a escolher um grupo de responsáveis pela atividade. Caso a chave esteja desativada, a atividade será exibida para todo o grupo de usuários, se tornando indisponível para eles assim que um executor realizar a atividade.
* Obrigatório selecionar um grupo responsável pela solicitação ao enviar atividade antecessora: obriga o processo a escolher um grupo de responsáveis pela atividade. Caso a chave esteja desativada, a atividade será exibida para todo o grupo de usuários, se tornando indisponível para eles assim que um executor realizar a atividade.
* Tornar automaticamente o solicitante do processo o responsável dessa atividade: define o solicitante do processo como também sendo o responsável por executar esta atividade.
* Tornar como responsável o executor de outra atividade: ao ativar essa permissão, deve-se escolher qual outra atividade será utilizada como base para definir o executor.
* Tornar responsável por esta atividade o superior imediato executor de outra atividade: ao ativar essa permissão, deve-se escolher qual outra atividade será utilizada como base para definir o superior imediato do executor.

![]([PATH_IMG]/mp-po-pr15-19.png)

**PASSO 18:** Ao inserir uma atividade do tipo “fim”, informe a descrição e a instrução de encerramento (caso necessário).

![]([PATH_IMG]/mp-po-pr15-20.png)

**PASSO 19:** Na aba “notificações”, habilite as permissões de notificações, e caso necessário inclua novos e-mails em "outros e-mails".

![]([PATH_IMG]/mp-po-pr15-21.png)

**PASSO 20:** Na aba “permissões”, defina se os campos do formulário serão ocultados (“não exibir”) exibidos, passíveis de edição (escrita) ou apenas visualização.

Para finalizar, clique em "ok"

![]([PATH_IMG]/mp-po-pr15-22.png)

**PASSO 21:** As atividades serão dispostas conforme print abaixo, podendo ser editadas ao clicar no ícone "lápis" e excluídas clicando no ícone "lixeira":

![]([PATH_IMG]/mp-po-pr15-23.png)

**PASSO 22:** É possível exportar o processo em Excel

![]([PATH_IMG]/mp-po-pr15-24.png)

**PASSO 23:** Na aba “supervisores do processo” é possível escolher supervisores que poderão acompanhar e/ou executar todo o processo (“permitir a edição”). Similar ao cadastro de supervisores geral do BP:

![]([PATH_IMG]/mp-po-pr15-25.png)

**PASSO 24:** Na aba “recorrência” é possível definir quantas vezes o processo será aberto automaticamente, em que horário e qual a quantidade por solicitante (as atividades serão atribuídas aos usuários definidos na atividade inicial do processo):

![]([PATH_IMG]/mp-po-pr15-26.png)

**PASSO 25:** Na aba “versões”, clicar em publicar nova versão para efetivar o processo – é necessário em cada alteração, seja no processo ou no formulário, exceto em casos de alteração de supervisor do processo, edição de usuários dentro dos grupos de usuários definidos e configuração de recorrência.

![]([PATH_IMG]/mp-po-pr15-27.png)

**PASSO 26:** Para finalizar, informe as mudanças realizadas no processo, em seguida clique em "salvar o processo, publicar e ativar nova versão".

![]([PATH_IMG]/mp-po-pr15-28.png)

**PASSO 27:** Para visualizar, clonar, exportar ou excluir o processo clique em:

![]([PATH_IMG]/mp-po-pr15-29.png)

**PASSO 28:** Para definir configurações padrão na tela de processos, clique em (detalhes abaixo):

![]([PATH_IMG]/mp-po-pr15-30.png)

**PASSO 29:** Dentro das configurações existem as seguintes opções:

* Utilizar controle de solicitações por processo: por padrão o BP utiliza uma numeração sequencial automática para as solicitações, não importando a qual processo pertencem (ex.: processo 1 - solicitação #1, processo 2 – solicitação #2, processo 1 - #3, processo 2 - #4, etc.). Com essa opção ativa, cada processo terá seu próprio sequenciamento na numeração das solicitações (ex.: processo 1 - #1, processo 2 - #1, processo 1 - #2, processo 2 - #2, etc).
* Utilizar nome padrão: habilita a automação no salvamento de arquivos no GED, especificada nos campos seguintes
* Nome padrão de documentos vinculados a processos: define, por meio de variáveis, o formato padrão o nome dos arquivos armazenados na aba “documentos” dentro da solicitação.
* Nome padrão de documentos vinculados a formulário de processos: define, por meio de variáveis, o formato padrão o nome dos arquivos armazenados em campos dentro do formulário.

Para finalizar clique em "salvar".

![]([PATH_IMG]/mp-po-pr15-31.png)

**PASSO 30:** Nas opções abaixo é possível atualizar a lista de processos e importar processos previamente exportados.

![]([PATH_IMG]/mp-po-pr15-32.png)

**PASSO 31:** Para importar um processo clique apresentada acima e escolha dentre as opções disponíveis, conforme exemplo abaixo:

![]([PATH_IMG]/mp-po-pr15-33.png)

**PASSO 32:** A disposição dos processos ficará da seguinte forma:

![]([PATH_IMG]/mp-po-pr15-34.png)

**PASSO 33:** Para publicar nova versão:

![]([PATH_IMG]/mp-po-pr15-35.png)

**PASSO 34:** Para programar automação em um gateway, clique na aba “destino” e, em seguida, no ícone "ferramenta":

![]([PATH_IMG]/mp-po-pr15-36.png)

**PASSO 35:** Exemplo de automação para gateway exclusivo (sim/não) em javascript (`return get_valor(ferias_aprovada) == 'NÃO';`) – detalhes em treinamento específico.

Para finalizar clique em "salvar":

![]([PATH_IMG]/mp-po-pr15-37.png)