# ordem de execução - 3

set @nr_anosemestre      := '20141';
set @cd_coligada         := 2;
set @cd_departamento     := 2;

set @cd_curso_1          := 'GP';


select * from cursos_coligadas where cd_curso = @cd_curso_1;
select * from cursos_mestre where cd_curso = @cd_curso_1;



-- cursos
delete from cursos_coligadas where cd_curso = @cd_curso_1;
delete from cursos_mestre where cd_curso = @cd_curso_1;


insert into cursos_mestre (
cd_curso,
ds_curso,
ds_apelido,
nr_grau,
ds_habilitacao,
sn_ativo,
nr_relevancia,
cd_titulacao,
nr_incremento
)
values (
@cd_curso_1,
'Curso Gerenciamento Projetos',
'Curso Gerenciamento Projetos',
'1',
'',
'S',
'1',
1,
0
);


insert into cursos_coligadas (
cd_curso,
cd_curso_equivalente,
cd_grade,
ds_contrato,
nr_carga_horaria,
cd_coligada,
cd_depto,
nr_dias_letivos,
nr_duracao_aula,
cd_curso_mec,
cd_grau_mec,
cd_habilitacao_mec,
ds_nome_etapa,
nr_series,
me_observacoes,
ds_requerimento,
sn_academico,
sn_ativo
)
values
(
@cd_curso_1,
null,
null,
'Curso Gerenciamento Projetos',
'36',
@cd_coligada,
@cd_departamento,
'9',
'4',
null,
null,
null,
'1',
'1',
'',
'',
'1',
'1'
);   