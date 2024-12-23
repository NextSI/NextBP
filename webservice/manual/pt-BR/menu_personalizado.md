# Criando Menu Personalizado.

## Criando um novo menu personalizado

No menu procure a opção "Menu Personalizado", é necessário ter a devida permissão concedida ou ser um usuário administrador.
Após localizar, clique sobre ela.

![]([PATH_IMG]/menu_personalizado_menu.png)

Para criar um novo menu clique sobre o botão "Novo"

![]([PATH_IMG]/menu_personalizado_novo.png)

Em seguida, você será direcionado para uma janela onde deverá configurar o novo menu.

![]([PATH_IMG]/menu_personalizado_detalhes.png)


## 1 - Tipo do menu personalizado 
- Informe o tipo do menu personalizado, existem 3 tipos, "Next One", "Next BA" e "Outros" cada um deles tem um icone padrão que irá aparecer no menu (que pode ser alterado).
## 2 - Nome do menu personalizado 
- Informe um nome para o menu personalizado, este será o nome que irá aparecer no menu principal.
- OBS: Para tipo de menu "Next One" e "Next BA" não é possível alterar este nome.
## 3 - URL do menu personalizado
- Neste campo você deverá informar o link para onde o menu deverá direcionar ao ser clicado.
- OBS: lembre-se de colocar "http://" ou "https://" de acordo com seu link.
## 4 - URL da imagem
- Neste campo você deverá informar o link do icone que deverá aparecer no menu, pode ser utilizado imagem em formato SVG, JPG, PNG e GIF.
- OBS: Caso você utilize SSL no Next BPMS, você deverá informar link da imagem também em SSL, caso contrário a imagem será bloqueada, você também pode utilizar a imagem padrão do menu personalizado.
## 5 - Menu personalizado ativo
- Esta opção possibilita você desabilitar um menu, sem ter que excluir o mesmo, para posteriormente ativar.
## 6 - Abrir em uma nova aba do navegador
- Esta opção possibilita você configurar a opção de abrir em uma nova aba do navegador ou abrir dentro do Next BPMS.
- OBS: Caso você utilize SSL no Next BPMS, você deverá informar link também em SSL para abrir dentro do Next BPMS, caso contrário o conteúdo será bloqueado.
- OBS2: para abrir o link desejado dentro do Next BPMS é necessário que o link que será integrado permita ser chamado por um frame, caso contrário será apresentado um erro, aprenda a configurar o X-Frame-Options clicando <a target="_blank" href = "https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options">aqui</a>
- OBS3: Marcando a opção "Abrir em uma nova aba do navegador" não há necessidade de ter a opção X-Frame-Options configurada.

Salve as configurações.
Após salvar, será necessário relogar no sistema, para que seja carregado o novo menu.

## Exemplo

Após relogar, caso tudo tenha sido corretamente configurado você já terá acesso aos menus, conforme exemplo abaixo:

![]([PATH_IMG]/menu_personalizado_exemplo.png)