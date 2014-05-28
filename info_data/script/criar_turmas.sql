# ordem de execução - 4

set @cd_coligada         := 2;
set @nr_anosemestre      := '20141';
set @cd_curso_1          := 'GP';
set @cd_turma_1          := 'GP01';
set @cd_professor        := null;


select * from turmas where codigo = @cd_turma_1;
delete from turmas where codigo = @cd_turma_1;


insert into turmas (
anosemestre,
codigo,
curso,
grau,
serie,
turno,
descricao,
vagas,
sn_bloquear_vagas,
horainicio,
horafim,
datainicio,
datafim,
diassemanaisletivos,
horasaula,
professor_responsavel,
cd_coligada,
cd_etapa_mec,
sn_ativa,
cd_situacao,
sn_usar_plano
)
values
(
   @nr_anosemestre,
   @cd_turma_1,
   @cd_curso_1,
   '1',
   '1',
   'N',
   'GP01 TURMA',
   '10',
   '1',
   '1899-12-30 19:00:00',
   '1899-12-30 23:00:00',
   '2014-01-01 00:00:00',
   '2014-12-12 00:00:00',
   1,
   '4',
   @cd_professor,
   @cd_coligada,
   1,
   1,
   1,
   1 
);