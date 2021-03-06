# ordem de execução - 7
# 

select * from cursos_coligadas;
-- GP
-- GV

select * from turmasprofessores where curso='GP';
delete from turmasprofessores where professor in (14, 15);

select * from fichaindividual where curso='GP';
select * from fichaindividual where curso='GV'
delete from fichaindividual where curso='GP';
delete from fichaindividual where curso='GV';

select * from diario_provas_alunos where cd_pessoa in ( 964476, 13, 11, 12, 1012479 );
select * from diario_provas_alteracoes where codaluno in ( 964476, 13, 11, 12, 1012479 ); 
select * from diario_provas where cd_professor IN ( 14, 15 );
select * from diario_provas where turma IN ( 'GP02', 'GP01', 'GV01' );
select * from diario_aulas where turma IN ( 'GP02', 'GP01', 'GV01' );
select * from turmas where curso in ( 'GP', 'GV' );
select * from matriculas_curso where matriculas.codigoaluno in ( 964476, 13, 11, 12, 1012479 ); 
select * from matriculas where cd_pessoa in ( 964476, 13, 11, 12, 1012479 );

select * from turmas_horarios_config where cd_turma IN ( 'GP02', 'GP01', 'GV01' );

delete from turmas_horarios_config where cd_turma IN ( 'GP02', 'GP01', 'GV01' );
delete from diario_provas_alunos where cd_pessoa in ( 964476, 13, 11, 12, 1012479 );
delete from diario_provas_alteracoes where codaluno in ( 964476, 13, 11, 12, 1012479 ); 
delete from diario_provas where cd_professor IN ( 14, 15 );
delete from diario_provas where turma IN ( 'GP02', 'GP01', 'GV01' );
delete from diario_aulas where turma IN ( 'GP02', 'GP01', 'GV01' );
delete from turmas where curso in ( 'GP', 'GV' );
delete from matriculas_curso where cd_pessoa in ( 964476, 13, 11, 12, 1012479 );
delete from matriculas where matriculas.codigoaluno in ( 964476, 13, 11, 12, 1012479 );


select * from diario_cronogramas where turma IN ( 'GP02', 'GP01', 'GV01' );
delete from diario_cronogramas where turma IN ( 'GP02', 'GP01', 'GV01' );


set @cd_curso_1          := 'GP';
set @nr_anosemestre      := '20141';
set @cd_turma_1          := 'GP01';
set @cd_grade_1          := 1; 
set @cd_aluno_1          := '964476';

set @cd_matricula_curso  := 1;
set @nr_matricula        := 1;



select * from matriculas where codigoaluno = @cd_aluno_1 and cd_matricula_curso=@cd_matricula_curso and cd_matricula=@nr_matricula;
select * from matriculas_curso where cd_matricula_curso=@cd_matricula_curso;

delete from matriculas where codigoaluno = @cd_aluno_1 and cd_matricula_curso=@cd_matricula_curso and cd_matricula=@nr_matricula;
delete from matriculas_curso where cd_matricula_curso=@cd_matricula_curso;




insert into matriculas_curso (
cd_matricula_curso,
cd_pessoa,
nr_matricula,
cd_curso,
cd_grade,
nr_anosem_grade,
nr_anosem_ingresso,
cd_turno,
cd_situacao
)
value 
(
@cd_matricula_curso,
@cd_aluno_1,
@nr_matricula,
@cd_curso_1,
@cd_grade_1,
'20141',
'20141',
'M',
1
);


insert into matriculas (
anosemestre,
turma,
codigoaluno,
curso,
dataemissao,
usuario,
planopagamento,
situacao,
planodesconto,
cd_ingresso,
cd_instituicao_origem,
nr_aluno,
cd_matricula,
cd_matricula_curso
) values (
@nr_anosemestre,
@cd_turma_1,
@cd_aluno_1,
@cd_curso_1,
null,
'ADMIN',
0,
10,
null,
0,
0,
0,
@nr_matricula,
@cd_matricula_curso
);


UPDATE
 matriculas SET usuario ='ADMIN' 
WHERE
 codigoaluno = @cd_aluno_1
AND
 anosemestre = @nr_anosemestre
AND 
turma = @cd_turma_1;