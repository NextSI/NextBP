# Específicos (customizações no ambiente)

O Next BP possui uma estrutura de pastas para que seja desenvolvidos scripts customizados para o ambiente. Estes scripts específicos deverão ser armazenados em `[Diretório Next BP]/webservice/especificos/`.

Neste diretório podemos encontrar vários arquivos `.sample`, que servem como uma amostra de como iniciar sua customização.

Regra: Todo arquivo php deve ser **UTF-8 (Sem BOM)**

A estrutura de diretórios dispõe-se da seguinte forma:
```
webservice
└── especificos
    ├── controller
    │   └── Exemplo.controller.php
    ├── dao
    │   └── Exemplo.dao.php
    ├── job
    │   └── Exemplo.job.php
    ├── model
    │   └── Exemplo.model.php
    ├── pe
    │   └── Exemplo.pe.php
    ├── peJS
    │   ├── especificos.pe.js
    │   └── menu.pe.js
    ├── permissions
    │   └── Permissions.config.php
    ├── routes
    │   └── RouteMap.config.php
    └── view
        ├── exemplo_a
        │   ├── tela_a.js
        │   └── tela_a.html
        └── exemplo_b
            ├── tela_b.js
            └── tela_b.html
```

| Diretório/Arquivo                 | Função      |
| ----------------------- | ----------- |
| `especificos` | Diretório raiz das customizações, sem ele os demais diretórios/arquivos não são localizados |
| `especificos/controller` | Todos os arquivos responsáveis por conter a lógica da aplicação, bem como direcionamento das rotas |
| `especificos/dao` | Todos os arquivos responsáveis por manipular/gerenciar informações do banco de dados |
| `especificos/model` | Todos os arquivos responsáveis por conter as estruturas de campos do BD bem como suas validações |
| `especificos/view` | Responsável por conter os arquivos visuais |
| `especificos/routes/RouteMap.config.php` | Responsável por gerenciar todas as rotas de arquivos customizados, fazendo com que conversem entre si e com os arquivos padrões do BP |