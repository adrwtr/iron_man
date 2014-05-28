
set @cd_turma_1        := 'GP01';
set @nr_anosemestre    := '20141';
set @cd_disciplina_1   := 1;
set @bimestre          := 1;
set @nro_aula          := 1;
set @data_aula         := '2014-05-28';
set @qtd_aula          := 2;
set @cd_professor      := 14;
set @ds_aula           := 'Descrição';

select * from diario_aulas where 
   turma = @cd_turma_1 and
   anosemestre = @nr_anosemestre and
   disciplina = @cd_disciplina_1 and
   bimestre = @bimestre and
   nro_aula = @nro_aula;


delete from diario_aulas where 
   turma = @cd_turma_1 and
   anosemestre = @nr_anosemestre and
   disciplina = @cd_disciplina_1 and
   bimestre = @bimestre and
   nro_aula = @nro_aula;



insert into 
   diario_aulas ( 
turma,
anosemestre,
disciplina,
bimestre,
nro_aula,
data,
qtd_aulas,
sn_bloqueado,
cd_professor,
conteudo,
me_material_aula,
me_transporte,
me_local_aula,
me_hospedagem,
me_gerenc_prof,
me_gerenc_gest,
dt_envio,
me_observacao,
cd_situacao_material_aula,
cd_situacao_transporte,
cd_situacao_local_aula,
cd_situacao_hospedagem,
cd_situacao_gerenc_prof,
cd_situacao_gerenc_gest,
vl_total_transporte,
nr_quilometragem,
vl_km,
nr_qtd_diarias_material,
vl_diaria_material,
vl_total_material,
nr_qtd_diarias_hospedagem,
vl_diaria_hospedagem,
vl_total_hospedagem,
nr_qtd_diarias_local,
vl_diaria_local,
vl_total_local,
cd_grupo
) values ( 
   @cd_turma_1,
   @nr_anosemestre,
   @cd_disciplina_1,
   @bimestre,
   @nro_aula, 
   @data_aula, 
   @qtd_aula,
   0, 
   @cd_professor, 
   @ds_aula, 
   '', '', '', '', '', '' , '2014-05-28' , '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1 );

aaa