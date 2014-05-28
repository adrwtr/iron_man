# ordem de execução - 8

set @cd_pessoa := 13;
set @nome_aluno := 'Aluno 1';

delete from estnc_alunos where cd_pessoa = @cd_pessoa;
delete from nu_grupos_pessoas where cd_pessoa = @cd_pessoa;
delete from pessoas where cd_pessoa = @cd_pessoa;
delete from contatos_pessoas where cd_pessoa = @cd_pessoa;


INSERT INTO `pessoas` (`cd_pessoa`, `cd_resp_finan`, `cd_resp_acad`, `cd_mae`, `cd_pai`, `nm_pessoa`, 
   `nm_contato`, `dt_nascimento`, `ds_cidade_nascimento`, `cd_municipio`, `ds_estado_nascimento`, `ds_pais_nascimento`, 
   `cd_pais`, `cd_pais_nascimento`, `cd_logradouro`, `ds_logradouro`, `ds_logradouro_nro`, `ds_complemento`, `ds_cep`, 
   `ds_bairro`, `ds_cidade`, `ds_estado`, `ds_pais`, `ds_sexo`, `ds_nacionalidade`, `ds_identidade`, `cd_orgao_emissor`, 
   `ds_identidade_orgao_exp`, `dt_identidade_expedicao`, `ds_cpf`, `ds_rm_corporacao`, `nr_dia_vencimento`, `sn_nao_bloquear_financeiro`, 
   `ds_rm_org_numero`, `dt_rm_exp`, `ds_rm_doc_numero`, `ds_rm_orgao`, `ds_rm_doc_tipo`, `ds_titulo_numero`, `ds_titulo_secao`, 
   `ds_titulo_zona`, `dt_titulo_emissao`, `nm_pai`, `nm_mae`, `cd_estado_civil`, `ds_estado_civil`, `nm_conjuge`, `cd_usuario`, 
   `dt_revisao`, `cd_pessoa_alteracao`, `dt_cadastro`, `nm_sem_acento`, `ds_arquivo_documento`, `cd_empresa`, `ds_cargo`, `ds_observacao`, 
   `ds_login`, `ds_senha`, `ds_senha_md4`, `sn_senha_provisoria`, `sn_bloqueto_empresa`, `im_pessoa`, `sn_foto_publica`, 
   `sn_pai`, `sn_mae`, `tp_pessoa`, `ds_cnpj`, `ds_inscri_estadual`, `tp_cert`, `nr_cert_termo`, `ds_cert_folha`, 
   `ds_cert_livro`, `dt_cert`, `ds_cert_uf`, `ds_cert_orgao`, `cd_municipio_nasc`, `nr_praca`, 
   `cd_estado_nascimento`, `cd_estado`, `cd_convenio`, `sn_pais_como_resp`, `sn_pai_resp`, `sn_mae_resp`, 
   `cd_cert_uf`, `cd_localidade`, `cd_localidade_nasc`, `sn_obito`, `sn_requerimentos_email`, `cd_instituicao_ensino`, 
   `cd_raca`, `cd_mec`, `sn_foto`, `sn_bloqueado`, `ds_inscri_municipal`, `cd_bairro`, `cd_usuario_pessoa`, 
   `sn_bloq_cartas`, `sn_bloq_emails`, `sn_naturalizado`) 
VALUES 
( @cd_pessoa, NULL, NULL, 0, 0, @nome_aluno, NULL, '2013-09-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
 '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-09-12 00:00:00', '63469405700', NULL, NULL, 0, NULL, NULL, NULL, NULL, 
 NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aluno ', NULL, NULL, 'Aluno', NULL, 
 @cd_pessoa, 'e2fc714c4727ee9395f324cd2e7f331f', NULL, 'N', 'N', NULL, 'S', 'N', 'N', 'F', NULL, NULL, 0, NULL, NULL, NULL, 
 NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 1, NULL, NULL, NULL, 0, 'S', 5, NULL, NULL, 'S', 0, NULL, NULL, NULL,
  NULL, NULL, NULL);


INSERT INTO `nu_grupos_pessoas` (`cd_grupo_pessoa`, `cd_grupo`, `cd_pessoa`, `cd_coligada`) VALUES (null, (select cd_grupo from nu_grupos where ds_papel='ALUNO' limit 1), @cd_pessoa, 1);


INSERT INTO `contatos_pessoas` (`cd_pessoa`, `cd_contato`, `ds_contato`) VALUES ( @cd_pessoa, '4', 'adriano@unimestre.com');