# Identificar colunas não utilizadas na tabela de um processo

Este script identifica colunas que podem não estar sendo utilizadas em um processo.

Com o objetivo de auxiliar na limpeza de colunas desnecessárias, otimizando o desempenho e a manutenção do banco de dados.

Substitua os parâmetros:
* NOME_DA_BASE_DE_DADOS
* NOME_DA_TABELA_DO_PROCESSO
* ID_DO_PROCESSO

```sql
SELECT COLUMN_NAME AS colunas_nao_utilizadas
FROM information_schema.COLUMNS
WHERE TABLE_SCHEMA = NOME_DA_BASE_DE_DADOS
AND TABLE_NAME = NOME_DA_TABELA_DO_PROCESSO
AND COLUMN_NAME != 'solicitacao_atividade_id' -- IGNORA COLUNA CHAVE DA TABELA

-- VERIFICA EM SOLICITAÇÕES EM ANDAMENTO
AND TRIM(COLUMN_NAME) NOT IN (
    SELECT TRIM(jt.id_elemento)
    FROM solicitacao_atividade
    INNER JOIN versao_processo_atividade ON solicitacao_atividade.versao_processo_atividade_id = versao_processo_atividade.id
    INNER JOIN versao_processo ON versao_processo.id = versao_processo_atividade.versao_processo_id
    INNER JOIN versao_formulario ON versao_formulario.versao_processo_id = versao_processo.id
    INNER JOIN versao_formulario_grupo ON versao_formulario_grupo.versao_formulario_id = versao_formulario.id
    INNER JOIN JSON_TABLE(
        versao_formulario_grupo.elementos,
        '$[*]' COLUMNS (
            idx FOR ORDINALITY,
            id_elemento VARCHAR(255) PATH '$.id_elemento',
            tipo INT PATH '$.tipo'
        )
    ) AS jt
    WHERE
        solicitacao_atividade.situacao IN (0, 3) -- SOMENTE ANDAMENTO / ATRASADA
        AND jt.id_elemento IS NOT NULL AND jt.id_elemento != '' -- IGNORA CAMPO SEM ID
        AND jt.tipo != 6 -- IGNORA TABELA
        AND versao_processo.processo_id = ID_DO_PROCESSO
    GROUP BY
        versao_formulario_grupo.id, jt.id_elemento
)

-- VERIRICA NA MODELAGEM CORRENTE
AND TRIM(COLUMN_NAME) NOT IN (
    SELECT jt.id_elemento
    FROM processo
    INNER JOIN formulario ON formulario.id = processo.formulario_id
    INNER JOIN formulario_grupo ON formulario_grupo.formulario_id = formulario.id
    INNER JOIN JSON_TABLE(
        formulario_grupo.elementos,
        '$[*]' COLUMNS (
            idx FOR ORDINALITY,
            id_elemento VARCHAR(255) PATH '$.id_elemento',
            tipo INT PATH '$.tipo'
        )
    ) AS jt
    WHERE
        jt.id_elemento IS NOT NULL AND jt.id_elemento != '' -- IGNORA CAMPO SEM ID
        AND jt.tipo != 6 -- IGNORA TABELA
        AND processo.id = ID_DO_PROCESSO
    GROUP BY
        jt.id_elemento
)

ORDER BY ORDINAL_POSITION
```