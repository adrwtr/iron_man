# ordem de execução - 1

set @cd_coligada         := 2;
set @cd_coligada_matriz  := 2;
set @cd_instituicao      := 2;

select * from instituicoes_ensino where cd_instituicao = @cd_instituicao;
select * from coligadas where cd_coligada = @cd_coligada;
select * from coligadas_matriz where cd_coligada = @cd_coligada_matriz;

-- cria coligada matriz
delete from instituicoes_ensino where cd_instituicao = @cd_instituicao;
delete from coligadas where cd_coligada = @cd_coligada;
delete from coligadas_matriz where cd_coligada = @cd_coligada_matriz;


/**
 * Cria coligada e instituição de ensino
 * a colugada vira matriz
 */

insert into coligadas_matriz ( 
cd_coligada,
nm_coligada,
nm_razao_social
)
VALUES(
@cd_coligada_matriz,
'Coligada Adriano Matriz',
'Coligada Adriano Matriz'
);


insert into coligadas ( 
cd_coligada,
nm_coligada,
nm_razao_social,
ds_cnpj,
sn_academico,
sn_financeiro,
SN_MATRIZ,
cd_coligada_matriz
)
values 
(
@cd_coligada,
'Coligada Adriano',
'Coligada Adriano',
'',
1,
1,
0,
@cd_coligada_matriz
);



insert into instituicoes_ensino (
cd_instituicao,
nm_instituicao,
nm_fantasia,
ds_email,
sn_educacao_infantil,
sn_ensino_fundamental,
sn_ensino_medio,
sn_ensino_superior
)
values
(
@cd_instituicao,
'Instituição Adriano',
'Instituição Adriano',
'adriano@unimestre.com',
1,
1,
1,
1
);