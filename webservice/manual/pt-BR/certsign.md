# Certsign - Assinatura Digital e Eletrônica de Documentos

No Next BP existe a possibilidade de integração com a ferramenta Certsign de assinaturas digitais e eletrônicas.

## Onde eu configuro meu "Certsign" com o Next BP?

**Para habilitar esta integração é necessário que você (administrador do sistema) possua uma conta com API de integração ativa no Certsign.**

Posteriormente, no menu de Configurações você deverá configurar a comunicação com o Certsign. Segue exemplo abaixo:

* Configurações > Certsign Assinaturas

![]([PATH_IMG]/BPM2997_certsign_assinaturas.png)

Onde:

* Certsign API URL: Endereço utilizado pela API do Certsign

* Token: Token gerado pelo Certsign para realizar requisições na API

* Disparo: No página do Certsign, ao configurar um Callback, no campo "Disparo" selecione a opção "Action".

* URL: No página do Certsign, ao configurar um Callback, no campo "URL", informe este endereço do Next BP.

* Header: Chave de segurança para validar se o usuário tem permissão para consumir a API e permitir o acesso dos Webhooks. Copie este header e valor para a página do Certsign.

* Habilitar assinaturas de documentos com o Certsign: permite ou não realizar o envio de documentos ao Certsign para solicitar a assinatura digital

## Como eu solicito a assinatura de documentos?

Caso a opção "Habilitar assinaturas de documentos com o Certsign" esteja igual a "Sim", então ao entrar no módulo GED e pressionar o botão direito em cima de um documento será exibido o menu "Certsign (Assinaturas)".

![]([PATH_IMG]/BPM2997_menu_certsign.png)

Ao clicar no novo menu o usuário será direcionado a tela de Histórico de Integrações pertinentes ao documento em questão.

![]([PATH_IMG]/BPM2997_historico_documentos.png)

Onde:

* Data de Envio: Data de Envio do documento ao Certsign
* Situação do Documento: Como está a situação do documento (assinaturas) no Certsign. (Andamento, Cancelado ou Pendente)
* Nome do arquivo
* Signatário: Nome do(s) Signatário(s) para aprovação ou rejeição do documento
* A última coluna contém 2 botões exibidos em momentos distintos, sendo:
    * Enquanto o documento estiver com a situação Andamento será possível efetuar o cancelamento do mesmo.
    * Caso o documento tenha sindo Finalizado ou Cancelado (ou seja, aprovado/rejeitado por todos) será possível efetuar o download do mesmo

Essa tela também possibilita ao usuário um botão para inserção dos signatários para o documento (Botão Solicitar Assinaturas). Clicando nesse botão o usuário irá se deparar com a tela abaixo:

![]([PATH_IMG]/BPM2997_solicitar_assinaturas.png)

Onde:

* Email: email do signatário que irá realizar a aprovação
* Assinar como: tipo da assinatura
* Nome Completo
* CPF

Nas solicitações de Processo foi desenvolvido um novo botão para que seja possível efetuar também a assinatura do documento, onde seu comportamento é o mesmo presente no GED.

![]([PATH_IMG]/BPM2997_solicitacao_signatarios.png)

## Considerações Finais:

Documentos com extensões diferentes de doc, docx ou pdf não permitirão a comunicação com o Certsign pois o mesmo só trabalha com esses três padrões de extensão de arquivo