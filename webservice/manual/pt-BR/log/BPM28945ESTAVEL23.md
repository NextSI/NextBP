# Formulário Personalizado - "Chamado - Contabilidade"
17/10/2024
## Correção
## Referência: BPM28945
## Módulo: Chamados
***

Foi realizada a correção no comportamento dos formulários dentro do módulo de Chamados. A mudança garante que, caso existam campos obrigatórios que não tenham sido preenchidos, a variável de controle, que indica se a validação foi satisfeita, seja redefinida para falso após a exibição da mensagem de aviso. Dessa forma, o formulário será validado corretamente a cada tentativa de confirmação, evitando que o chamado fique travado mesmo após o preenchimento dos campos obrigatórios.