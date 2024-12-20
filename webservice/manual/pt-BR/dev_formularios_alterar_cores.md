# Formulários: Alterar Cores do Campo

Utilize a função `css` da jQuery no elemento que você deseja alterar a cor.

Para alterar a cor do "bloco" do campo, utilize a função `encontrar_form_grupo_campo([campo])`.

Exemplo, aplicando estilos CSS em um campo com o id `documento`:

```
documento.css('border', '2px solid red');
encontrar_form_grupo_campo(documento).css('background-color', 'yellow');
```

![]([PATH_IMG]/dev_formularios_alterar_cores.png)