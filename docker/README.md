# Instalar no servidor do cliente via Docker Compose

Pré-requisitos: Docker e Docker Compose instalados no servidor. Nenhum PHP, MySQL ou Node
precisa estar instalado — tudo roda em container.

1. Copie a pasta `bp_build/` para o servidor do cliente (ou clone o repositório lá).

2. Configure as variáveis de ambiente
```bash
cd bp_build
mkdir -p data
cp .env.sample .env
nano .env
```
Defina a versão da imagem (`BP_VERSION`), a porta de acesso (`APP_PORT`), o nome/URL da
aplicação (`APP_NOME`, `APP_URL`) e as credenciais do banco. Essas variáveis alimentam tanto o
container do MySQL quanto o da aplicação — não é preciso repeti-las em outro arquivo.

3. Suba o ambiente
```bash
cp docker-compose.yml.sample docker-compose.yml
docker compose up -d
```

4. Na primeira execução, monte a estrutura do banco de dados
```bash
docker compose exec app php webservice/cli.php -color -dbu
```

5. Verifique se subiu corretamente
```bash
curl http://localhost:${APP_PORT:-80}/webservice/index.php/health/
```
Deve retornar `"status":"ok"`. O `docker compose ps` também mostra o healthcheck da imagem.

Para atualizar de versão depois: altere `BP_VERSION` no `.env`, rode `docker compose pull &&
docker compose up -d` e execute o passo 4 novamente (o DBU só aplica o que estiver pendente).