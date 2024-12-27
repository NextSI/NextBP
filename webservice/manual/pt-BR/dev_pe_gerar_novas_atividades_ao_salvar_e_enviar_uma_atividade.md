# Ponto de Entrada: Gerar Novas Atividades ao Salvar e Enviar uma Atividade

Temos na modelagem de processos e formulários o "Processo A":

![]([PATH_IMG]/dev_pe_atividade_informativa_modelagem_processo.png)

![]([PATH_IMG]/dev_pe_atividade_informativa_modelagem_processo_a1.png)

![]([PATH_IMG]/dev_pe_atividade_informativa_modelagem_formulario.png)

![]([PATH_IMG]/dev_pe_atividade_informativa_modelagem_tabela.png)

Ao Salvar e Enviar a "Atividade A.1" (do "Processo A"), desejamos que a "Atividade Informativa" seja enviada para todos os usuários informados na tabela do formulário, campo `usuario_email`.

Para isso, vamos editar o ponto de entrada Solicitacao_Atividade_Enviar.pe.php.

`[Diretório Next BP]/webservice/especificos/pe/Solicitacao_Atividade_Enviar.pe.php`

```php
<?php

use \Sys\Util;
use \Sys\Basic;
use \Sys\Validation;
use \Sys\DB;

function solicitacao_atividade_enviar_antes($solicitacao_atividade_model, $anexos=null, $acao=null, &$destinos=null) {

	$id_atividade_a1 = 1; // ID da "Atividade A.1"
	$id_atividade_informativa = 7; // ID da "Atividade Informativa"

	// se for "Atividade A.1"
	if ($solicitacao_atividade_model->processo_atividade_id == $id_atividade_a1) {
		
		// obtenho a quantidade de linhas de algum campo/coluna da tabela (pode ser qualquer um)
		$linhas_tabela_notificacao = Util::linhas_campo_tabela_formulario($solicitacao_atividade_model->formulario, 'usuario_email');

		// percorro todas as linhas da tabela
		for ($linha = 0; $linha < $linhas_tabela_notificacao; $linha++) {
			$usuario_email = Util::valor_campo_tabela_formulario($solicitacao_atividade_model->formulario, 'usuario_email', $linha);
			
			// encontro o ID do usuário a ser notificado
			$usuario_id = 0;
			try {
				$usuario_dao = Basic::LoadDAO('Usuario', true);
				$usuario_id = $usuario_dao->popular_por_email($usuario_email)->id;
				// ATENÇÃO: neste exemplo estamos utilizando o e-mail do usuário para encontrar o ID dele no Next BP
				// Também existem outras funções para encontrar o usuário, exemplo:
				// $usuario_dao->popular_por_email('pessoa@email.com')
				// $usuario_dao->popular_por_username('login_da_pessoa')
				// $usuario_dao->popular_por_cpf('99999999999')
				// $usuario_dao->popular_por_cpf('999.999.999-99')
				// $usuario_dao->popular_por_codigo_externo('000000000')
			}
			catch (BusinessException $e) {
				$usuario_id = 0;
			}

			// se o usuário possui ID, inicio uma "Atividade Informativa" definindo ele como responsável
			if ($usuario_id > 0) {

				// encontro a "Atividade Informativa" na modelagem do processo e adiciono ela aos $destinos
				if (isset($solicitacao_atividade_model->solicitacao->versao_processo->elementos)) {
					foreach ($solicitacao_atividade_model->solicitacao->versao_processo->elementos as $elemento_key => $elemento) {
						if ($elemento['elemento_tipo'] == Processo_Model::PROCESSO_ELEMENTO_TIPO_ATIVIDADE) {
							if ($elemento['processo_atividade_id'] == $id_atividade_informativa) {
								$destino_atividade_informativa = (object)$elemento;
								$destino_atividade_informativa->solicitante_responsavel = false;
								$destino_atividade_informativa->responsavel_obrigatorio = true;
								$destino_atividade_informativa->responsavel_id = $usuario_id;
								$destinos[] = $destino_atividade_informativa;
							}
						}
					}
				}
			}

		}

	}

}
```

Para testar, vamos clicar em "Nova Solicitação" e selecionar o "Processo A", preencher os campos do formulário com e-mails de usuários do sistema. Clique em Salvar e Enviar:

![]([PATH_IMG]/dev_pe_atividade_informativa_atividade_a1.png)

![]([PATH_IMG]/dev_pe_atividade_informativa_atividade_a1_enviar.png)

Ao retornar para a listagem de processos (se o filtro estiver de acordo) podemos verificar que foi iniciada a "Atividade Informativa" para cada um dos usuários informados no campo `usuario_email`.

![]([PATH_IMG]/dev_pe_atividade_informativa_listagem.png)