# Ponto de Entrada: Gerar Novas Solicitações ao Salvar e Enviar uma Atividade

Temos na modelagem de processos e formulários o "Processo A" e "Processo B":

![]([PATH_IMG]/dev_pe_processo_a.png)

![]([PATH_IMG]/dev_pe_formulario_a.png)

![]([PATH_IMG]/dev_pe_tabela_a.png)

![]([PATH_IMG]/dev_pe_formulario_b.png)

![]([PATH_IMG]/dev_pe_tabela_b.png)

Ao Salvar e Enviar a "Atividade A.1" (do "Processo A"), desejamos que seja solicitado automaticamente o "Processo B".

Nesta solicitação automatizada, teremos algumas condições:

* Só irá ocorrer a abertura do "Processo B" se no "Processo A" o campo "opcoes" estiver com o "Item Y" selecionado.
* Devemos copiar alguns valores dos campos do "Processo A" para campos do "Processo B"
* Vamos vincular à "Atividade A.1" o "Processo B" que foi solicitado automaticamente.

Para isso, vamos editar o ponto de entrada `Solicitacao_Atividade_Enviar.pe.php`.

`[Diretório Next BP]/webservice/especificos/pe/Solicitacao_Atividade_Enviar.pe.php`:

```php
<?php

use \Sys\Util;
use \Sys\Basic;
use \Sys\Validation;
use \Sys\DB;

function solicitacao_atividade_enviar_depois($solicitacao_atividade_model, $anexos=null, $acao=null, $destinos=null) {

	$id_atividade_a1 = 1; // ID da atividade "Atividade A.1", do "Processo A"
	$id_processo_b = 2; // ID do "Processo B"

	// se for "Atividade A.1"
	if ($solicitacao_atividade_model->processo_atividade_id == $id_atividade_a1) {
		
		// o conteúdo de $solicitacao_atividade_model é referente a "Atividade A.1" 

		// se o conteúdo do campo "Opções" for "Item Y"
		$campo_opcoes = Util::valor_campo_formulario($solicitacao_atividade_model->formulario, 'opcoes');
		if ($campo_opcoes == 'Item Y') {

			// Preparo os valores iniciais do formulário do "Processo B" que será iniciado automaticamente
			$campos_do_novo_formulario = [];

			// campo_de_texto_b
			$campos_do_novo_formulario[] = [
				'campo_id' => 'campo_de_texto_b',
				'valor' => Util::valor_campo_formulario($solicitacao_atividade_model->formulario, 'campo_de_texto')
			];

			// obtenho a quantidade de linhas de algum campo/coluna da tabela_a (pode ser qualquer um)
			$linhas_tabela_a = Util::linhas_campo_tabela_formulario($solicitacao_atividade_model->formulario, 'coluna_a1');
			
			// percorro todas as linhas da tabela_a e replico os dados para a tabela_b
			for ($linha = 0; $linha < $linhas_tabela_a; $linha++) {
				// coluna_b1
				$campos_do_novo_formulario[] = [
					'campo_id' => 'coluna_b1',
					'linha' => $linha,
					'valor' => Util::valor_campo_tabela_formulario($solicitacao_atividade_model->formulario, 'coluna_a1', $linha)
				];
				// coluna_b2
				$campos_do_novo_formulario[] = [
					'campo_id' => 'coluna_b2',
					'linha' => $linha,
					'valor' => Util::valor_campo_tabela_formulario($solicitacao_atividade_model->formulario, 'coluna_a2', $linha)
				];
			}

			// Iniciar uma nova solicitação do "Processo B"
			$solicitacao_dao = Basic::LoadDAO('Solicitacao', true);
			$nova_solicitacao_processo_b = $solicitacao_dao->nova_por_processo(
				$id_processo_b, // ID de Processo
				null, // Opcional: Data Referencia, quando controle de horas é por data de referência
				null, // Opcional: ID da atividade de projeto, quando existe vinculo com atividade de projeto
				null, // Opcional: ID do projeto, quando existe vinculo com projeto
				null, // Opcional: E-mail do responsável pela atividade inicial (deve ser e-mail de um usuário do BP). Se não for informado, será obtido automaticamente da modelagem do processo
				null, // Opcional: E-mail do solicitante da atividade inicial (deve ser e-mail de um usuário do BP). Se não for informado, será considerado o usuário logado no sistema
				json_encode($campos_do_novo_formulario) // Opcional: Valores iniciais do formulário
			);

			// Existe a possiblidade de referenciar processos (cabeçalhos e/ou atividades) com outros processos (cabeçalhos e/ou atividades)
			// Sendo assim, temos quatro possibilidades de vínculo. Utilize as possibilidades de referência que atenderão suas necessidades.

			// Referência entre cabeçalho da solicitações "Processo A" e "Processo B"
            Referencia_DAO::salvar(
                Referencia_Model::TABELA_SOLICITACAO, $solicitacao_atividade_model->solicitacao_id,
                Referencia_Model::TABELA_SOLICITACAO, $nova_solicitacao_processo_b->solicitacao_id
            );

            // Referência entre as atividades "Atividade A.1" e "Atividade B.1"
            Referencia_DAO::salvar(
                Referencia_Model::TABELA_SOLICITACAO_ATIVIDADE, $solicitacao_atividade_model->id,
                Referencia_Model::TABELA_SOLICITACAO_ATIVIDADE, $nova_solicitacao_processo_b->id
            );

            // Referência entre cabeçalho da solicitação "Processo A" com atividade "Atividade B.1"
            Referencia_DAO::salvar(
                Referencia_Model::TABELA_SOLICITACAO, $solicitacao_atividade_model->solicitacao_id,
                Referencia_Model::TABELA_SOLICITACAO_ATIVIDADE, $nova_solicitacao_processo_b->id
            );

            // Referência entre a atividades "Atividade A.1" com o cabeçalho da solicitação "Processo B"
            Referencia_DAO::salvar(
                Referencia_Model::TABELA_SOLICITACAO_ATIVIDADE, $solicitacao_atividade_model->id,
                Referencia_Model::TABELA_SOLICITACAO, $nova_solicitacao_processo_b->solicitacao_id
            );
		}

	}

}
```

Para testar, vamos clicar em "Nova Solicitação" e selecionar o "Processo A", preencher os campos do formulário, selecione o "Item Y". Clique em Salvar e Enviar:

![]([PATH_IMG]/dev_pe_sol_24_atividade_a1.png)

![]([PATH_IMG]/dev_pe_sol_24_atividade_a1_entrega.png)

Ao retornar para a listagem de processos (se o filtro estiver de acordo) podemos verificar que foi iniciado o "Processo B":

![]([PATH_IMG]/dev_pe_listagem_solicitacoes.png)

Ao visualizar a "Atividade B.1" do "Processo B", é possível conferir os campos do formulário que foram copiados:

![]([PATH_IMG]/dev_pe_sol_25_atividade_b1.png)

Ao visualizar a "Atividade A.1" do "Processo A", encontramos na aba "Referências" os vínculos com o "Processo B":

![]([PATH_IMG]/dev_pe_sol_24_atividade_a1_vinculo_com_25.png)

![]([PATH_IMG]/dev_pe_sol_24_atividade_a1_vinculo_com_25_ativ.png)

Também encontramos na aba "Histórico" os vínculos com o "Processo B":

![]([PATH_IMG]/dev_pe_sol_24_atividade_a1_vinculo_com_25_hist.png)

Repita o mesmo teste, mas não selecione o "Item Y", note que o "Processo B" não será iniciado.