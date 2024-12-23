# Componente Padrão de Listagem

Abaixo segue uma imagem do componente padrão de listagem do Next BPMS.

![]([PATH_IMG]/listagem_datagrid.png)

## Ordenação
No modo único, um usuário seleciona uma ordem de classificação no menu de contexto ou clica no cabeçalho de uma coluna para aplicar a classificação. Cliques subsequentes no mesmo cabeçalho inverter a ordem de classificação. Aplicar classificação a outra coluna limpa as configurações de classificação da coluna anterior. No modo múltiplo, as configurações de classificação aplicadas a outras colunas permanecem intactas quando um usuário seleciona uma ordem de classificação no menu de contexto de outra coluna.

![]([PATH_IMG]/sorting_sorted_columns.png)


O menu de contexto também pode ser usado para limpar as configurações de classificação de uma coluna.

![]([PATH_IMG]/sorting_context_menu.png)

Você pode utilizar os atalhos do teclado caso esteja habilitado o modo múltiplo é necessário segurar a tecla "Shift" de seu teclado antes de clicar na coluna para fazer ordenações múltiplas. já para remover apenas uma seleção é necessário segurar a tecla "Ctrl" de seu teclado antes de clicar na coluna.

## Painel de Pesquisa
O painel de pesquisa permite procurar valores em várias colunas de uma só vez. A pesquisa é insensível a maiúsculas e minúsculas.

![]([PATH_IMG]/search_panel.png)

## Filtrar Linha
A linha do filtro permite que um usuário filtre dados por valores de colunas individuais. Normalmente, as células da linha do filtro são caixas de texto, mas as células das colunas que contêm data ou valores Booleanos contêm outros controles de filtragem (calendários ou caixas de seleção).

![]([PATH_IMG]/filter_row.png)

## Filtro de Cabeçalho
Um filtro de cabeçalho permite que um usuário filtre valores em uma coluna individual, incluindo ou excluindo-os do filtro aplicado. Clicar em um ícone de filtro de cabeçalho chama um menu pop-up com todos os valores exclusivos da coluna. Um usuário inclui ou exclui valores do filtro selecionando ou limpando sua seleção nesse menu.

![]([PATH_IMG]/header_filter.png)

## Exportação para Excel
Quando essa opção estiver habilitada, a barra de ferramentas da grade irá contar o botão "Exportar" clique em ![]([PATH_IMG]/toolbar_export.png) e será aberto um menu que contém o comando "Exportar linhas selecionadas" e "Exportar todos os dados".

![]([PATH_IMG]/Export_SelectedRows.png)

## Redimensionamento de Colunas
Por padrão, a largura de cada coluna depende da largura e do número total de colunas. porém é possível redimensionar as colunas.

## Seletor de Colunas
O seletor de coluna permite que você escolha quais colunas deseja exibir/ocultar para melhor visualização, existem dois modos de selecionar as colunas. No modo arrastar e soltar, um usuário move os cabeçalhos da coluna para e do seletor de coluna arrastando e soltando. No modo de seleção, o usuário seleciona cabeçalhos de coluna no seletor de colunas usando caixas de seleção. O modo de seleção é projetado principalmente para dispositivos mobiles.

![]([PATH_IMG]/column_chooser.png)

## Totalizadores
Existem dois tipos de totalizadores, um teles sempre irá trazer o resultado de todos os itens contidos na grid o outro irá apenas totalizar os itens selecionados, lembrando que nesta segunda opção é possível selecionar todos os registros.

## Visualização salva
Um recurso desta grid é que todos seus dados serão salvos para a próxima visualização.