# Backup

## Base de dados
Configure o backup da base de dados MySQL diariamente através do agendados de tarefas do seu sistema operacional.

| Sistema | Aplicativo           | Comando      |
| ------- | -------------------- | ------------ |
| Windows | Agendador de Tarefas | `taskschd`   | 
| Linux   | Cron                 | `crontab -e` |

### Realizar backup
Utilize a ferramenta `mysqldump` para realizar o backup da base de dados.
```bash
mysqldump -u [usuário] -p[senha] -h [endereço servidor mysql] --skip-triggers [schema] > [arquivo destino.sql]
```
Exemplo Windows:
```bash
C:\Program Files\MySQL\MySQL Server 5.7\bin\mysqldump.exe -u root -pSENHA -h 192.168.0.2 --skip-triggers next_bp > bkp_next_bp.sql
```

Exemplo Linux com compactação gzip:
```bash
mysqldump -u root -pSENHA -h 192.168.0.2 --skip-triggers next_bp > bkp_next_bp.sql && gzip bkp_next_bp.sql
```
Será gerado o arquivo bkp_next_bp.sql.gz

### Restaurar backup

Utilize a ferramenta `mysql` para restaurar o backup da base de dados.
```bash
mysql -u [usuário] -p[senha] [schema destino] < [arquivo de backup]
```
Exemplo:
```bash
mysql -u root -pSENHA next_bp < bkp_next_bp.sql
```

Antes de restaurar, certifique-se de ter criado o schema onde será restaurado o backup.
Caso o backup seja um arquivo gzip, descompacte ele com `gzip -d bkp_next_bp.sql.gz`

## Diretório Data
Este diretório é utilizado para armazenar arquivos temporários. Também pode ser utilizado como local de armazenamento. Verifique as políticas de backup de sua empresa e solicite o backup do diretório data. Para verificar a localização do diretório, acesse o arquivo webservice/config/System.config.php e encontre a constante APP_DATA.

## Locais de Armazenamento
Os documentos salvos nos locais de armazenamentos devem possuir backup configurado em seu servidor. Verifique as políticas de backup de sua empresa e solicite o backup dos locais de armazenamentos utilizados.