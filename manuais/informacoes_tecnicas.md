# Informações técnicas Next BP

## Requisitos de Software e Hardware para funcionamento da BPMS Next BP
Este descritivo tem como objetivo especificar os requisitos de software e hardware necessários para que o Next BP possa ser utilizado de maneira plena e funcional. Caso os requisitos disponíveis em sua empresa estejam incompatíveis com os recomendados ou exista alguma dúvida em relação aos mesmos, por favor, entre em contato com nossa equipe para mais esclarecimentos. A instalação, configuração e manutenção de: SGBD, sistema operacional, rede e toda infraestrutura adicional, que não seja o próprio sistema Next BP, é responsabilidade exclusiva do cliente. Nossas equipes não poderão executar nenhum serviço de instalação, configuração e manutenção que não seja do software Next BP.

## Next BP – Server

### Hardware

| Usuários  | Cores / vCores | Memória | 
| --------- | ---------------| ------- |
| Até 25    |              2 |    8 GB |
| Até 100   |              4 |   16 GB |
| Até 250   |              8 |   24 GB |
| Até 500	  |             12 |   32 GB |
| Até 1000  |             16 |   64 GB |

* Para um melhor desempenho nas operações de leitura/escrita, recomendamos o uso de discos SSD.
* O tamanho do uso em disco irá variar de acordo com o volume de dados e documentos inseridos na aplicação. Caso o volume de dados a ser armazenado seja superior, então deverá ser utilizado um disco com capacidade superior ou adicional.
* Recomendamos a utilização de memórias DDR4 com frequência de 2400 MHz ou superior.
* Para um melhor desempenho do processamento é recomendado utilizar processadores com múltiplos núcleos e alta capacidade de processamento. Sugestão os modelos Intel Xeon ou AMD EPYC, pois são projetados para cargas de trabalho de servidor, porém evite utilizar processadores antigos e descontinuados. Se você utilizar um processador antigo em seu servidor, pode haver algumas consequências e limitações em termos de desempenho, recursos e compatibilidade. 
 
### Sistemas Operacionais
| Sistema Operacional              | Recomendado |
| -------------------------------- | ----------- |
| Ubuntu Server 24.04 LTS	         |           ✓ |
| Windows Server 2016 ou Superior	 |             |
 
### Requisitos de Softwares
| Sistema Operacional | Software | Versão              | Recomendado |
| ------------------- | -------- | ------------------- | ----------- |
| Linux	              | Apache   | 2.4.x               |           ✓ |
| Windows             | IIS      | 10.0.x ou Superior  |           ✓ |
| Linux / Windows     | PHP      | 8.2.x               |           ✓ |
| Linux / Windows     | SGBD     | MariaDB Server 11.x |           ✓ |
| Linux / Windows     | SGBD     | MySQL Server 8.x    |             |

#### Extensões PHP Obrigatórias

Nas configurações do PHP, deverão estar habilitadas as seguintes extensões:
* openssl
* ldap
* gd
* imap
* json
* xml
* mbstring
* mysqli
* pdo_mysql
* zip
* curl
* Ioncube Loader: Tanto em ambiente Windows quanto Linux é necessária a instalação do loader ioncube para versão do PHP utilizado. Mais detalhes em https://www.ioncube.com/loaders.php

#### Extensões PHP opcionais
Ao modelar processos no Next BP, em algum momento se faz necessário realizar comunicação com bases de dados de terceiros, para isso o Next BP trabalha com o padrão PDO do PHP. Sendo possível conectar em qualquer base de dados que possua uma extensão PHP para PDO.

De acordo com a necessidade, algumas extensões de drivers de conexão com SGDBs podem ser instaladas, exemplo:

* Microsoft SQL Sever
  * sqlsrv: https://learn.microsoft.com/pt-br/sql/connect/php/example-application-sqlsrv-driver?view=sql-server-ver17
  * pdo_sqlsrv: https://learn.microsoft.com/pt-br/sql/connect/php/example-application-pdo-sqlsrv-driver?view=sql-server-ver17
* Oracle
  * oci8: https://pecl.php.net/package/oci8
  * pdo_oci: https://pecl.php.net/package/PDO_OCI


 **Módulos Apache**
 
 * rewrite
 * php

#### Agendadores de Tarefas
Para a execução de tarefas em segundo plano do Next BP, como envio e leitura de caixas de e-mail, entre outros processamentos, é necessário a execução automática de tempos em tempos de scripts PHP.

| Sistema Operacional | Software             | Recomendado |
| ------------------- | -------------------- | ----------- |
| Linux	              | cron                 |           ✓ |
| Windows             | Agendador de Tarefas |           ✓ |

## Backups e atualizações periódicas
Os backups de Sistemas Operacionais e atualizações dos softwares requeridos (como Windows, Linux, Apache, IIS, PHP e suas dependências) bem como o backup dos dados são de responsabilidade do contratante.

**IMPORTANTE** Defina uma estratégia de backup com sua equipe de Tecnologia da Informação/Infraestrutura de Softwares.

## Next BP – Client (Estação de Trabalho)
Para utilizar o Next BP, independente da plataforma de sistema operacional, é necessário apenas um navegador. Seguem os navegadores homologados:

| Navegador       | Recomendado |
| --------------- | ----------- |
| Google Chrome   |           ✓ |
| Mozilla Firefox	|             |
| Opera           |             |
| Safari          |             |
| Microsoft Edge  |             |

Os requisitos de hardware recomendados para uma estação de trabalho que irá executar o Next BP são:

| Processador              | Memória RAM Mínima | Memória RAM Recomendada |
| ------------------------ | ------------------ | ----------------------- |
| Dual Core ou equivalente |               4 GB |                    8 GB |

Para um melhor desempenho nas operações de leitura/escrita, recomendamos o uso de um disco SSD.

--------

Agora que você conhece os requisitos para instalar o Next BP, [veja um exemplo de instalação da em um servidor Linux](instalacao/debian9.md).
