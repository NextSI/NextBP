# Gerar Excel para Download

Para criar arquivos de planilha excel (xlsx), o Next BP utiliza a biblioteca [PhpSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet).

Neste exemplo será criado no webservice o endpoint `exemplo/excel`, que será responsável por validar a sessão do usuário e posteriormente gerar um arquivo de excel.

```php
// webservice/especificos/pe/minha_rota_personalizada.pe.php
// ATENÇÃO: é obrigatório que o arquivo esteja nesta pasta e com a extenção .pe.php

use \Sys\RouteMap;
use \Sys\Controller;
use \Sys\Sessao;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

RouteMap::add('/exemplo/excel/', function() {
    // Obter parâmetros da requisição
    $token_publico = Controller::Param('token_publico');
    $nome = Controller::Param('nome');

    // Validar autenticação
    $sessao_model = Sessao::objeto_publico($token_publico);

    // Daqui pra baixo é só um exemplo de como usar a biblioteca PhpSpreadsheet para criar uma planilha Excel
    // Extraído do exemplo oficial: https://github.com/PHPOffice/PhpSpreadsheet/blob/master/samples/Basic/01_Simple_download_xlsx.php

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Parâmetro Nome')
        ->setCellValue('B1', $nome)
        ->setCellValue('A2', 'Usuário da Sessão')
        ->setCellValue('B2', $sessao_model->dados->nome);

    // Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Simple');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="01simple.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
});
```

No frontend (javascript) podemos chamar a execução do endpoint através da chamada:

```js
App.obter_token_publico((token_publico) => {
    let url = new URL(window.WS_URI + "/exemplo/excel/");
    url.searchParams.set('token_publico', token_publico);
    url.searchParams.set('nome', 'Meu Parametro Nome');
    App.download(url.toString());
});
```

Após o download, o retorno experado é:

<img width="215" height="56" alt="image" src="https://github.com/user-attachments/assets/28a04305-257b-406f-822f-2a8ce9df47f8" />

