# Importação de Usuários do LDAP

## Configurando Servidor LDAP

Primeiro passo é configurar o servidor LDAP.

![]([PATH_IMG]/ldap_configuracao.png)

* **Nome:** Informe um nome para o servidor que irá configurar.
* **Tipo de Integração:** Você pode escolher se irá utilzar o Active Directory do Windows ou o OpenLDAP.
* **Endereço:** Informe o endereço para acessar o servidor que se encontra o servidor com o LDAP.
* **Porta:** Informe a porta do servidor (o Padrão é 389, e em servidores com LDAPS costuma-se utilizar 636)
* **SSL:** Habilite para conexão LDAPS
* **Dominio:** Informe o dominio do servidor LDAP
* **Filtro para consulta de usuários:** Você pode alterar o filtro da conexão neste campo. Observação: caso não tenha conhecimento em LDAP recomendo que você mantenha o padrão "(&(objectClass=user)(objectCategory=person)(!userAccountControl:1.2.840.113556.1.4.803:=2))" sem aspas, que irá trazer todos os usuários e todos os grupos.
* **Base DN para consulta de usuários:** Você pode pegar está informação no Active Directory, conforme imagem abaixo:

![]([PATH_IMG]/ldap_base_dn.png)

## Testando a Conexão

Após informar os dados de conexão do servidor LDAP, clique no botão "Testar Conexão".

Estas são as possíveis mensagens de retorno:

* Usuário e/ou senha inválido(s)
* Conexão realizada com sucesso
* Não foi possível conectar ao servidor LDAP (ldap_bind): O endereço do servidor ou porta estão inválidos. Outra possibilidade é de ser obrigatório de utilizar SSL para conectar-se ao servidor LDAP.

## Testando o Filtro

Clique no botão "Testar Filtro" para que a conexão seja testada e uma consulta com a "Base DN" e "Filtro" seja executada no servidor LDAP.

Estas são as possíveis mensagens de retorno:

* Conexão realizada com sucesso. O filtro retornou XXX entradas. (ldap_get_entries)
* Erro ao realizar consulta no servidor LDAP. Confira o "Base DN" e "Filtro" informados. (ldap_search)

## Requisitos Técnicos

O PHP utiliza a biblioteca **OpenLDAP** para realizar a comunicação com o servidor LDAP. Portanto, é necessário que essa biblioteca esteja intalada no servidor do Next BP.

Para casos de uso de **LDAPS**, muitas vezes será necessário realizar configurações no OpenLDAP para autenticação com certificado. Essas configurações são realizadas no arquivo `ldap.conf` do OpenLDAP. O local desse arquivo pode variar para cada versão de sistema operacional. Exemplo:

Sistema	| Diretório
--------|-----------
Windows | C:\OpenLDAP\sysconf\ldap.conf
Linux   | /etc/ldap/ldap.conf ou /etc/openldap/ldap.conf

Neste arquivo de configuração você pode adicionar o caminho do certificado:
```
TLS_CACERT diretorio/meu_certificado_ca.pem
TLS_REQCERT hard
```

Ou você pode desativar a verificação de certificado, o que não é seguro, mas pode ser útil para testar a conexão:

```
TLS_REQCERT never
```

## Importando os Usuários do LDAP

No menu principal, clique em "Importação de Usuários", será solicitado um servidor (que configuramos no item anterior) um usuário e senha válido do LDAP no servidor que queremos importar os usuários. Também será possível modificar a "Base DN" e "Filtros" para listagem de registros (usuários).

![]([PATH_IMG]/ldap_importacao_autenticar.png)


### Considerações

Por padrão o AD limita a 1.000 registros de usuários, você pode montar/customizar o filtro ou mudar essa configuração no AD.

Abra o Editor de Política de Grupo (gpedit.msc).
Navegue para Configuração do Computador -> Configurações do Windows -> Configurações de Segurança -> Políticas Locais -> Opções de Segurança.
Encontre a opção "Limitar o tamanho de consulta para não administradores" e ajuste conforme necessário.

### Definindo os Usuários

Após autenticar os dados no servidor, você deverá escolher quais usuários deseja importar, basta escolher por usuário ou grupo de usuários conforme imagem abaixo:

![]([PATH_IMG]/ldap_importacao_usuarios.png)

### Definindo Configurações

Você Deverá informar algumas informações antes de importar os usuários como: Empresa, Área, Calendário de Trabalho, Nivel e Permissões.
Não será possivel importar os usuários sem essas informações.

![]([PATH_IMG]/ldap_importacao_configuracoes.png)

Em seguida, clique em "Confirmar" será exibido a mensagem "Deseja aplicar as alterações à todos os usuários?".

![]([PATH_IMG]/ldap_importacao_aplicar_alteracoes.png)

Caso você clique em "Sim" todos os usuários da listagem irão receber as informações de Empresa, Área, Calendário de Trabalho, Nivel e Permissões que você definiu.

Porém se você clicar em "Não" os usuários da listagem irão receber apenas as informações de Empresa e Permissões que você definiu.

**Observações:**

* Empresa e Permissões não será possivel alterar individualmente, caso necessite, você deverá realizar duas importações ou alterar as informações no cadastro de usuários, posterior a importação.

* É possível alterar as informações de Área, Calendário de Trabalho, Nivel para cada usuário, caso necessite.

### Vinculando Usuário Existe

Caso Já exista um usuário no BPMS Next que você deseja vincular a um usuário do LDAP você deverá escolher o usuário, conforme imagem abaixo:

![]([PATH_IMG]/ldap_importacao_vincular_usuario.png)

**Observações:**

* No vinculo de usuário não serão importados as informações de Empresa, Área, Calendário de Trabalho, Nivel e Permissões que você definiu. 

* Ao realizar um vinculo, o login e senha atual do usuário vinculado será APAGADO e o usuário passará a utilizar apenas o usuário do LDAP, pois não é permitido possuir login do LDAP e Nome de Usuário.

### Realizando a Importação

Finalmente, após tudo configurado e definido basta clicar em "Importar", será aberto uma Janela, onde você pode acompanhar a importação.

![]([PATH_IMG]/ldap_importacao.png)

**Observações:**

* Recomendo que não feche está janela, para poder acompanhar os usuários importados.

* Caso o usuário do LDAP já exista ou esteja vinculado à outro usuário não será importado.

* Caso exista um usuário do LDAP que seja igual a um usuário do BPMS Next este não será importado, para evitar conflitos.