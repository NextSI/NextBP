# Servidor Next BP no Linux Debian 9 x64

## Configurar o Timezone do sistema operacional:
```bash
sudo timedatectl set-timezone America/Sao_Paulo
```

## Atualizar repositórios do apt:
```bash
sudo apt-get update
```

## MariaDB – MySQL Server
```bash
sudo apt-get install mariadb-server-10.1
```

Execute o procedimento de instalação segura do MySQL, removendo usuários anônimos, desabilitando login remoto do root, removendo bases de testes e recarregando os novos privilégios.
```bash
sudo mysql_secure_installation
Change the root password? N
Remove anonymous users? Y
Disallow root login remotely? Y
Remove test database and access to it? Y
Reload privilege tables now? Y 
```

Acesse o MySQL
```bash
sudo mysql
```

Execute as instrução para criar o base de dados next_bp, o usuário next_bp e adicionar o privilégio total de acesso à base next_bp ao usuário next_bp:
```sql
CREATE SCHEMA next_bp DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE USER 'next_bp'@'localhost' IDENTIFIED BY 'senha_do_banco';
GRANT ALL PRIVILEGES ON next_bp.* TO 'next_bp'@'localhost' WITH GRANT OPTION; 
```

Saia do MySQL
```sql
exit;
```

## Apache + PHP

Instale o Apache2 e o PHP7
```bash
sudo apt-get install apache2
sudo apt-get install php libapache2-mod-php php-mcrypt php-json php-gd php-imap php-interbase php-ldap php-odbc php-xml php-xmlrpc php-mysql php-curl php-mbstring php-zip
```

Habilite o módulo rewrite do Apache:
```bash
sudo a2enmod rewrite 
```

Configure o “Virtual Host” em:
```bash
nano /etc/apache2/sites-available/000-default.conf
```

Após a linha `DocumentRoot /var/www/html/`, adicione o bloco `Directory`:
```
DocumentRoot /var/www/html/
<Directory /var/www/html>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Ative o site e reinicie o Apache.
```bash
sudo a2ensite 000-default
sudo service apache2 restart
```

Adicione no arquivo `index.php` a chamada da função `phpinfo()` para testar o Apache e PHP:
```
sudo rm /var/www/html/index.html
sudo nano /var/www/html/index.php 
```

Adicione o código
```
<?php phpinfo();
```

Acesse pelo navegador o IP do servidor e veja se carregou o PHP Info.

Localize o arquivo `php.ini` utilizado pelo apache e altere algumas configurações:
```bash
sudo nano /etc/php/7.0/apache2/php.ini
```

```
post_max_size=1024M 
upload_max_filesize=100M 
max_file_uploads=100
max_input_time = 3600
max_execution_time = 300 
```

Caso necessário aumente os parâmetros da configuração sugerida acima.

## IonCube
Realize o download dos loaders do IonCube
```bash
wget http://downloads3.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz
sudo tar -zxvf ioncube_loaders_lin_x86-64.tar.gz -C /usr/lib/php/ 
```

Encontre qual é arquivo compativel com sua versão do PHP, acesse a paginal inicial através do IP e verifique qual é o número da versão do PHP se a versão Thread Safety ou não (se for utilizar arquivos com “_ts”), além da localização do arquivo php.ini para adicionar a nova extensão.
```bash
 sudo ls /usr/lib/php/ioncube/ioncube_loader_lin_*
/usr/lib/php/ioncube/ioncube_loader_lin_7.0.so
/usr/lib/php/ioncube/ioncube_loader_lin_7.0_ts.so
/usr/lib/php/ioncube/ioncube_loader_lin_7.1.so
/usr/lib/php/ioncube/ioncube_loader_lin_7.1_ts.so

sudo nano /etc/php/7.0/apache2/php.ini 
```
No final do arquivo, adicione:
```
[ionCube]
zend_extension=/usr/lib/php/ioncube/ioncube_loader_lin_[SUA VERSÃO DO PHP].so 
```

Para testar, reinicie o apache e acesse novamente no navegador:
```bash
sudo service apache2 restart
```

No navegador, você deverá encontrar o texto “with the ionCube PHP Loader (enabled)”

**ATENÇÃO!**
Repetir o mesmo procedimento para o `/etc/php/7.0/cli/php.ini`.
Este arquivo se refere ao PHP que é chamado na linha de comando.

Para testar digite no console:
```bash
php -v
```
No console, você deverá encontrar o texto `with the ionCube PHP Loader (enabled)`

## Next BP
Através de seu computador, envie para o servidor o arquivo de instalação do Next BP.
```bash
scp -P 22 bp_17_01_27_01.zip usuario@host_do_servidor:~ 
```
Ou faça o download utilizando o comando wget.
```bash
wget https://github.com/NextSI/NextBP/releases/download/23.52.1/bp_23_52_1_php70.zip
```

Outra opção é utilizar o FileZilla para enviar o arquivo.

No servidor, mova o arquivo zip para a pasta `/var/www/html/`
```bash
sudo mv ~/bp_17_01_27_01.zip /var/www/html/ 
```

Instale a biblioteca zip para poder descompactar o Next BP.
```bash
sudo apt-get install zip 
```

Acesse a pasta `/var/www/html/` e descompacte o Next BP:
```bash
cd /var/www/html/
sudo unzip bp_17_01_27_01.zip

replace index.php? A 
```
Crie a pasta `data`
```bash
sudo mkdir /var/www/data/ 
```

Defina permissões ao grupo www-data para os novos arquivos e diretório
```bash
sudo chown -R www-data:www-data /var/www/html/
sudo chown -R www-data:www-data /var/www/data/
sudo chmod -R 775 /var/www/html/ 
```

Configure o webservice
```bash
cd /var/www/html/webservice/config/
sudo cp System.config.php.sample System.config.php
sudo nano System.config.php 
```

Alterar as constantes:
```bash
define('APP_FRONTEND', '/var/www/html/');
define('APP_DATA', '/var/www/data/');
define('DB_PASSWORD', 'senha_do_banco'); 
```

Atualize a base de dados do Next BP acessando pelo navegador `http://ip_do_servidor/#admin` ou executando o comando
```bash
php /var/www/html/webservice/job/Executar.php -dbu
```

Configure o local de armazenamento para `/var/www/data/`

Configure os Job Scheduler corretamente, desativando scripts desnecessários.

Cron
```bash
sudo crontab -u www-data -e
```

Adicione a linha:
```
*/5 * * * * php /var/www/html/webservice/job/Executar.php
```

Reinicie o serviço do cron para que ele carregue as novas configurações:

```bash
sudo service cron restart
```

## Dicas para gerenciamento

Analisar arquivo de log do Apache e PHP em tempo real utilize o comando.
```bash
tail -f /var/log/apache2/error.log 
```

Verificar consumo do processador e memória:
```bash
top
```

Status um serviço, exemplo apache:
```bash
sudo service apache2 status
```

Parar um serviço, exemplo apache:
```bash
sudo service apache2 stop 
```

Iniciar um serviço, exemplo mysql:
```bash
sudo service mysql start
```

Reiniciar um serviço, exemplo cron:
```bash
sudo service cron restart 
```
