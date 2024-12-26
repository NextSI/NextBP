# Aplicativos Conectados (OAuth Client)

## Exemplo de conexão OAuth para Microsoft Exchange Online

1. No Next BP, através do menu, acesse `Aplicativos Conectados (OAuth Client)` e insira um novo registro.

![]([PATH_IMG]/BPM8430_00_oauth_client.png)

2. Será solicitado o `Client Id`. Ele deve ser adquirido após registrar um aplicativo no Microsoft Entra.

![]([PATH_IMG]/BPM8430_01_registrar_aplicativo.png)

![]([PATH_IMG]/BPM8430_02_id_aplicativo.png)

3. Crie e copie e cole no Next BP o segredo do cliente `Client Secret`.

![]([PATH_IMG]/BPM8430_03_segredo_cliente.png)

![]([PATH_IMG]/BPM8430_04_copiar_segredo.png)

4. Copie os pontos de extremidade do aplicativo e cole no Next BP.
![]([PATH_IMG]/BPM8430_05_pontos_extremidade.png)
![]([PATH_IMG]/BPM8430_06_pontos_extremidade.png)

5. Após salvar o aplicativo no Next BP, será possível copiar a url de redirecionamento, posteriormente configure ela na Microsoft.

![]([PATH_IMG]/BPM8430_07_url_redirecionamento.png)
![]([PATH_IMG]/BPM8430_08_url_redirecionamento.png)
![]([PATH_IMG]/BPM8430_09_url_redirecionamento.png)
![]([PATH_IMG]/BPM8430_10_url_redirecionamento.png)

6. Solicite o acesso. Importante: se autentique com o usuário que será utilizado na conexão e não como administrador da conta Microsoft.

![]([PATH_IMG]/BPM8430_11_solicitar_acesso.png)
![]([PATH_IMG]/BPM8430_12_solicitar_acesso.png)
![]([PATH_IMG]/BPM8430_13_solicitar_acesso_callback.png)

7. Finalize selecionando o OAuth Client nas Configurações de E-mail do Next BP.

![]([PATH_IMG]/BPM8430_14_email_oauth.png)