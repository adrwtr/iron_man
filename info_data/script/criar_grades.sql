# ordem de execução - 6

set @nr_anosemestre      := '20141';
set @cd_curso_1          := 'GP';
set @cd_turma_1          := 'GP01';
set @cd_disciplina_1     := 1;
set @cd_grade_1          := 1; 


select * from grades where cd_grade = @cd_grade_1;
select * from grades_disciplinas where cd_grade = @cd_grade_1;

delete from grades where cd_grade = @cd_grade_1;
delete from grades_disciplinas where cd_grade = @cd_grade_1;


insert into grades ( 
cd_grade, 
cd_curso, 
ds_grade, 
nr_ano_inicial, 
sn_ativo, 
nr_carga_curso, 
nr_carga_atividades, 
sn_padrao
)
values(
@cd_grade_1, 
@cd_curso_1, 
'GRADE GP 01', 
@nr_anosemestre, 
'S', 
30, 
NULL, 
1
);



insert  into grades_disciplinas ( 
cd_grade, 
cd_curso, 
cd_disciplina, 
nr_serie, 
nr_aulas, 
vl_valor, 
sn_compartilhada, 
nr_creditos_academicos, 
cd_disciplina_categoria, 
nr_carga_horaria_pratica, 
nr_carga_horaria_teorica, 
nr_ch_teorica_pratica ) 
values ( 
 @cd_grade_1, 
 @cd_curso_1, 
 @cd_disciplina_1, 
 1, 
null, 
null, 
null, 
null, 
null, 
null, 
null, 
null 
);


-- atualizar turmas
update turmas set cd_grade=@cd_grade_1 where codigo = @cd_turma_1;
