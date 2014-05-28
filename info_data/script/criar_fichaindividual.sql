# ordem de execução - 9

set @nr_anosemestre      := '20141';
set @cd_curso_1          := 'GP';
set @cd_turma_1          := 'GP01';
set @cd_disciplina_1     := 1;
set @cd_grade_1          := 1; 
set @cd_aluno            := 12;

select *  from fichaindividual where anosemestre = @nr_anosemestre and codigoaluno = @cd_aluno and curso = @cd_curso_1;

delete from fichaindividual where anosemestre = @nr_anosemestre and codigoaluno = @cd_aluno and curso = @cd_curso_1;


insert into fichaindividual ( 
anosemestre,
codigoaluno,
turma,
turmamatricula,
disciplina,
situacao,
curso,
serie,
grau
) 
values 
(
@nr_anosemestre,
@cd_aluno,
@cd_turma_1,
@cd_turma_1,
@cd_disciplina_1,
1,
@cd_curso_1,
1,
1);




