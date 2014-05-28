# ordem de execução - 5

set @cd_curso_1          := 'GP';
set @cd_disciplina_pai_1 := 'TEMPO';
set @cd_disciplina_1     := 1;


select * from disciplinas where codigo = @cd_disciplina_1 and cd_disciplina_pai = @cd_disciplina_pai_1;
select * from disciplinas_mestre where cd_disciplina_pai = @cd_disciplina_pai_1;



delete from disciplinas where codigo = @cd_disciplina_1 and cd_disciplina_pai = @cd_disciplina_pai_1;
delete from disciplinas_mestre where cd_disciplina_pai = @cd_disciplina_pai_1;



insert into disciplinas_mestre (
cd_disciplina_pai, 
ds_disciplina, 
nr_ordem, 
ds_sigla, 
cd_disc_mec
) 
VALUES 
(
   @cd_disciplina_pai_1, 
   'Gerenciamento de Tempo', 
   1, 
   @cd_disciplina_pai_1, 
   1
);

INSERT INTO disciplinas ( 
cd_disciplina_pai, 
codigo, 
ordem, 
curso, 
sigla, 
descricao, 
ementa_backup, 
id_disciplina, 
qtd_frases_fixas, 
cd_disc_mec, 
sn_bloqueado, 
sn_ementa_padrao, 
sn_exporta_moodle 
) 
VALUES 
( 
@cd_disciplina_pai_1,
@cd_disciplina_1,
1,
@cd_curso_1,
@cd_disciplina_pai_1,
'Gerenciamento de Tempo',
NULL,
NULL,
0,
1,
1,
1,
1)
;