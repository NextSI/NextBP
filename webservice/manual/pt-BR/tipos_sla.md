# Tipos de SLA em Chamados

## Introdução

O SLA, ou Acordo de Nível de Serviço, é um contrato ou acordo estabelecido entre um provedor de serviços e um cliente. Ele define as expectativas e responsabilidades de ambas as partes em relação ao serviço prestado. O objetivo principal do SLA é garantir que o cliente receba um serviço de qualidade e que o provedor cumpra com as metas e prazos acordados.

O SLA define o tempo máximo que o provedor tem para resolver um atendimento ou solicitação do cliente. Esses prazos podem variar de acordo com a gravidade do problema ou a prioridade do atendimento. Por exemplo, um problema urgente pode ter um prazo de resposta e resolução mais curto do que um problema de menor impacto.

O SLA também pode incluir outros aspectos, como o tempo máximo para fornecer uma atualização ao cliente sobre o andamento do ticket e a disponibilidade do serviço em determinados períodos.

## Tipos de SLA

Diferentes tipos de SLA permitem uma análise mais detalhada do atendimento e ajudam a identificar pontos de melhoria no processo. Eles asseguram que o cliente receba uma resposta rápida e uma solução eficiente para suas solicitações, ao mesmo tempo em que auxiliam o provedor de serviços a manter um alto padrão de qualidade no atendimento ao cliente.

* **Tempo de Atendimento** O Tempo de Atendimento representa o tempo total empenhado pelos recursos técnicos na resolução do problema. Ou seja, é o tempo real gasto pela equipe de suporte para identificar e solucionar o problema relatado pelo cliente. O Tempo de Atendimento é interrompido quando o Chamado está aguardando solicitante ou aguardando fornecedor.

* **Tempo de Reação:** O Tempo de Reação é o indicador que mede o tempo decorrido desde a abertura do chamado até a primeira interação da equipe de atendimento. É o tempo que a equipe leva para iniciar o processo de triagem e análise da solicitação do cliente.

* **Tempo de Resolução de Problema:** O Tempo de Resolução de Problema é o indicador que quantifica o tempo real necessário para resolver o problema do cliente. É calculado a partir da subtração entre o *Tempo de Atendimento* atual e o *Tempo de Reação*.

* **Tempo Total:** O Tempo Total é o período contabilizado desde a abertura até o encerramento do chamado na plataforma de atendimento. Esse indicador engloba todo o tempo dedicado ao atendimento do cliente, desde o momento em que ele reportou o problema até o momento em que a solução foi completamente entregue.

* **Tempo de Pendência do Solicitante:** O Tempo de Pendência do Solicitante é calculado a partir do tempo de espera do cliente por pendências ou respostas adicionais.

* **Tempo Encerrado:** O Tempo Encerrado indica por quanto tempo o atendimento do cliente permaneceu encerrado. Esse tempo é interrompido quando o atendimento é reaberto, caso necessário.

![]([PATH_IMG]/fluxo_sla.png)

## Colunas de SLA com o sufixo "Real"

No módulo de Chamados, o usuário pode se deparar com colunas de SLA que contenham "Real" em seus nomes. Por exemplo, para o **SLA de Tempo Total**, irão existir as colunas *SLA Total* e *SLA Total Real*. A diferença entre essas colunas é que a primeira é calculada pelo sistema no momento em que alguma ação é realizada no Chamado, e a segunda é calculada por um Job automático do BP, ou seja, em *tempo real*.

Ainda no exemplo do **SLA Total**, a primeira coluna é calculada no momento que o Chamado é encerrado, e a segunda coluna continuará sendo calculada em tempo real pelo Job até que o Chamado seja encerrado. Quando o Chamado for encerrado, o Job irá interromper o cálculo dessa coluna.

As outras colunas de SLA recebem o seguinte tipo de tratamento:

* **Tempo de Reação:** é calculado na primeira reclassificação do Chamado. O tempo real dessa coluna é calculado enquanto a primeira reclassificação não ocorre. Note que na listagem de Chamados há um botão com ícone de engrenagem que acessa as configurações do módulo, e na janela que se abre há uma configuração que determina se o Tempo de Reação será calculado quando o Chamado receber uma interação de reclassificação em qualquer Motivo de Chamado ou um Motivo de Chamado específico. Essas configurações só podem ser acessadas por usuários administradores do sistema.

* **Tempo de Resolução de Problema:** é calculado com a diferença entre *Tempo de Atendimento* atual e o *Tempo de Reação*, toda vez que uma interação é realizada no Chamado, até o seu encerramento. O tempo real dessa coluna é continua sendo calculado a partir do momento em que há um *Tempo de Reação* calculado para o Chamado, até o seu encerramento.

* **Tempo de Pendência do Solicitante:** é calculado pelo sistema no momento em que o Chamado volta para o atendente responsável. O tempo real dessa coluna é calculado enquanto o Chamado permanece com o solicitante.

* **Tempo Encerrado:** é calculado pelo sistema no momento em que o Chamado é reaberto. O tempo real dessa coluna é calculado enquanto o Chamado permanece encerrado.

* **Tempo de Atendimento** esse SLA é sempre calculado em tempo real.

O Job que calcula essas colunas em tempo real é o `Calcular_SLA_Chamados.job.php`. As colunas de tempo real só serão atualizadas caso esse Job esteja ativo e programado para executar periodicamente em um tempo determinado pelo usuário.