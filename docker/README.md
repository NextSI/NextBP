# Next BP com Docker

Pré-requisitos: Docker e Docker Compose instalados no servidor. Nenhum PHP, MySQL ou Node
precisa estar instalado — tudo roda em container.

1. Faça o download dos ambientes em http://download-bp.nextsi.com.br/docker/bp-docker.zip
```bash
wget http://download-bp.nextsi.com.br/docker/bp-docker.zip
cd /opt/
unzip bp-docker.zip
```

2. Configure as variáveis de ambiente de homologação
```bash
cd homologacao
cp .env.sample .env
nano .env
```
Defina a versão da imagem (`BP_VERSION`), a porta de acesso (`APP_PORT`), o nome/URL da
aplicação (`APP_NOME`, `APP_URL`) e as credenciais do banco. Essas variáveis alimentam tanto o
container do MySQL quanto o da aplicação — não é preciso repeti-las em outro arquivo.

3. Suba o ambiente
```bash
docker compose up -d
```

4. Na primeira execução, monte a estrutura do banco de dados
```bash
docker compose exec app php webservice/cli.php -dbu
```

5. Verifique se os serviços estão rodando e se estão nas portas corretas
```bash
docker ps
```

Para atualizar de versão depois: altere `BP_VERSION` no `.env`, rode `docker compose pull &&
docker compose up -d` e execute o passo 4 novamente (o DBU só aplica o que estiver pendente).

6. Repita o passo 2 até o 5 para o ambiente de produção.

7. Inicie o servidor de proxy reverso Caddy para orquestrar os apps do BP e os certificados HTTPS