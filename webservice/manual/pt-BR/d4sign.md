# D4Sign - Assinatura Digital e Eletrônica de Documentos

No Next BP existe a possibilidade de integração com a ferramenta D4Sign de assinaturas digitais e eletrônicas.

## Quais as premissas para configurar a integração com o NextBP

**Na plataforma do D4Sign:**

* O usuário, após realizar o cadastro na plataforma da D4Sign, deverá criar um cofre, clicando no botão **CRIAR NOVO COFRE**, localizado a esquerda, logo abaixo da seção **CAIXA DE ENTRADA** para que seja possível depositar os documentos
* Deverá ser solicitado ao time do suporte da D4Sign a liberação dos dados da API ( Token, Crypt Key )
* Na seção WebHook, alterar a opção do Content-Type para **DEFINIDO COMO JSON**
* Na seção WebHook HMAC clicar no botão **Gerar Secret Key HMAC** para gerar uma chave HMAC, com o intuito de garantir a segurança da rota utilizada pelo NextBP na configuração do WebHook da D4Sign

## Como eu solicito o Token, Crypt Key e HMAC ?

Para obter um Token, Crypt Key e HMAC o usuário deverá enviar um email para **suporte@d4sign.com.br**, passando os dados da conta do titular para que a liberação dessas informações sejam disponibilizadas.
Posteriormente para acessá-las, basta acessar um dos endereços abaixo:

* Produção: **secure.d4sign.com.br**
* Homologação: **sandbox.d4sign.com.br**

Após logar no sistema, clique sob o email do usuário que fica no canto superior a direita e acesse a opção **Dev(API)**, e com isso serão listadas todas as informações vinculadas a conta.

Menu:

![]([PATH_IMG]/BPM5929_dados_secretos.png)

Dados da API:

![]([PATH_IMG]/BPM5929_dados_api.png)

## Onde eu configuro meu "D4Sign" com o Next BP?

**Para habilitar esta integração é necessário que você (administrador do sistema) possua uma conta com API de integração ativa no D4Sign.**

Posteriormente, no menu de Configurações você deverá configurar a comunicação com o D4Sign. Segue exemplo abaixo:

* Configurações > D4Sign Assinaturas

![]([PATH_IMG]/BPM5929_d4sign_assinaturas.png)

Onde:

* D4Sign API URL: Endereço utilizado pela API do D4Sign

* Token: Token gerado pelo D4Sign para realizar requisições na API (disponibilizado pelo D4Sign)

* Crypt Key: Chave de criptografia disponibilizado na plataforma da D4Sign (disponibilizado pelo D4Sign)

* Cofre: Evento responsável por realizar a listagem de todos os cofres criados na plataforma da D4Sign para onde os documentos poderão ser enviados

* Webhook HMAC SHA256 Secret: Chave de segurança para validar se o usuário tem permissão para consumir a API e permitir o acesso dos Webhooks (disponibilizado pelo D4Sign)

## Como eu solicito a assinatura de documentos?

Caso a opção "Habilitar assinaturas de documentos com o D4Sign" esteja igual a "Sim", então ao entrar no módulo GED e pressionar o botão direito em cima de um documento será exibido o menu "D4Sign (Assinaturas)".

![]([PATH_IMG]/BPM5929_menu_d4sign.png)

Ao clicar no novo menu o usuário será direcionado a tela de Histórico de Integrações pertinentes ao documento em questão.

![]([PATH_IMG]/BPM5929_historico_documentos.png)

Onde:

* Data de Envio: Data de Envio do documento ao D4Sign
* Situação do Documento: Como está a situação do documento (assinaturas) no D4Sign. (Andamento, Cancelado ou Pendente)
* Nome do arquivo
* Signatário: Nome do(s) Signatário(s) para aprovação ou rejeição do documento
* A última coluna contém 2 botões exibidos em momentos distintos, sendo:
    * Enquanto o documento estiver com a situação Andamento será possível efetuar o cancelamento do mesmo.
    * Caso o documento tenha sindo Finalizado ou Cancelado (ou seja, aprovado/rejeitado por todos) será possível efetuar o download do mesmo

Essa tela também possibilita ao usuário um botão para inserção dos signatários para o documento (Botão Solicitar Assinaturas). Clicando nesse botão o usuário irá se deparar com a tela abaixo:

![]([PATH_IMG]/BPM5929_solicitar_assinaturas.png)

Onde:

* Email: Email do signatário que irá realizar a aprovação
* Nome Completo: Nome Completo do Signatário
* Assinar como: tipo da assinatura
* Possui CPF: trata-se de um brasileiro ou estrangeiro

Nas solicitações de Processo foi desenvolvido um novo botão para que seja possível efetuar também a assinatura do documento, onde seu comportamento é o mesmo presente no GED.

![]([PATH_IMG]/BPM5929_solicitacao_signatarios.png)

## Considerações Finais:

Documentos com extensões diferentes de doc, docx ou pdf não permitirão a comunicação com o D4Sign pois o mesmo só trabalha com esses três padrões de extensão de arquivo