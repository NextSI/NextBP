# Next BP com Docker

Pré-requisitos: Docker e Docker Compose instalados no servidor. https://docs.docker.com/engine/install/ubuntu/

No exemplo abaixo foi utilizando Ubuntu 26.04.

1. Faça o download dos ambientes em https://download-bp.nextsi.com.br/docker/bp-docker.zip
```bash
mkdir /opt/bp-docker/
cd /opt/bp-docker/
sudo wget https://download-bp.nextsi.com.br/docker/bp-docker.zip
sudo apt install -y unzip
sudo unzip bp-docker.zip
```

2. Configure as variáveis de ambiente de homologação
```bash
cd /opt/bp-docker/homologacao
sudo cp .env.sample .env
sudo nano .env
```
Defina a versão da imagem (`BP_VERSION`), a porta de acesso (`APP_PORT`), o nome/URL da
aplicação (`APP_NOME`, `APP_URL`) e as credenciais do banco. Essas variáveis alimentam tanto o
container do MySQL quanto o da aplicação — não é preciso repeti-las em outro arquivo.

3. Suba o ambiente
```bash
sudo docker compose up -d
```

4. Na primeira execução, monte a estrutura do banco de dados
```bash
sudo docker compose exec app php webservice/cli.php -dbu
```

5. Verifique se os serviços estão rodando e se estão nas portas corretas
```bash
sudo docker ps
```

Para atualizar de versão depois: altere `BP_VERSION` no `.env`, rode `docker compose pull &&
docker compose up -d` e execute o passo 4 novamente (o DBU só aplica o que estiver pendente).

6. Repita o passo 2 até o 5 para o ambiente de produção.

7. Configureo servidor proxy reverso Caddy para orquestrar os apps do BP e os certificados HTTPS

```bash
cd /opt/bp-docker/caddy/
sudo cp .env.sample .env
sudo nano .env
```

Inicie o serviço:

```bash
sudo docker compose up -d
```