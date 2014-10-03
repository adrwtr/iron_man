-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: unimestre_horus_branco
-- ------------------------------------------------------
-- Server version 	5.5.25-log
-- Date: Wed, 01 Oct 2014 11:29:37 -0300

--
-- Table structure for table `estnc_estagios`
--

DROP TABLE IF EXISTS `estnc_estagios`;
CREATE TABLE `estnc_estagios` (
  `cd_estagio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cd_empresa` int(11) NOT NULL,
  `cd_instituicao` int(11) DEFAULT NULL,
  `cd_curso` int(10) unsigned DEFAULT NULL,
  `cd_pessoa` int(11) NOT NULL,
  `cd_supervisor` int(11) NOT NULL,
  `cd_vaga_origem` int(10) unsigned DEFAULT NULL,
  `dt_inicial` datetime DEFAULT '0000-00-00 00:00:00',
  `dt_final` datetime DEFAULT '0000-00-00 00:00:00',
  `cd_situacao` int(11) NOT NULL,
  `sn_deferido_completo` tinyint(1) DEFAULT NULL,
  `dt_inicial_cadastro` datetime DEFAULT NULL,
  `dt_final_cadastro` datetime DEFAULT NULL,
  `cd_matricula` int(11) unsigned NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`cd_estagio`),
  KEY `ix_estnc_estagios_cd_pessoa` (`cd_pessoa`),
  KEY `ix_estnc_estagios_cd_curso` (`cd_curso`),
  KEY `ix_estnc_estagios_empresa` (`cd_empresa`),
  KEY `ix_estnc_estagios_vaga` (`cd_vaga_origem`),
  KEY `ix_estnc_matricula` (`cd_matricula`),
  KEY `FK_pessoas_supervisores` (`cd_supervisor`),
  KEY `FK_NC_ESTAGIOS_CD_INSTITUICAO` (`cd_instituicao`),
  KEY `FK_NC_ESTAGIOS_CD_SITUACAO` (`cd_situacao`),
  CONSTRAINT `FK_estagios_alunos` FOREIGN KEY (`cd_pessoa`) REFERENCES `pessoas` (`cd_pessoa`),
  CONSTRAINT `FK_NC_ESTAGIOS_CD_CURSO` FOREIGN KEY (`cd_curso`) REFERENCES `estnc_cursos` (`cd_curso`),
  CONSTRAINT `FK_NC_ESTAGIOS_CD_EMPRESA` FOREIGN KEY (`cd_empresa`) REFERENCES `empresas` (`cd_empresa`),
  CONSTRAINT `FK_NC_ESTAGIOS_CD_INSTITUICAO` FOREIGN KEY (`cd_instituicao`) REFERENCES `instituicoes_ensino` (`cd_instituicao`),
  CONSTRAINT `FK_NC_ESTAGIOS_CD_MATRICULA` FOREIGN KEY (`cd_matricula`) REFERENCES `estnc_matriculas` (`cd_matricula`),
  CONSTRAINT `FK_NC_ESTAGIOS_CD_SITUACAO` FOREIGN KEY (`cd_situacao`) REFERENCES `estnc_situacoes_estagios` (`cd_situacao_estagio`),
  CONSTRAINT `FK_pessoas_supervisores` FOREIGN KEY (`cd_supervisor`) REFERENCES `pessoas` (`cd_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estnc_estagios`
--

LOCK TABLES `estnc_estagios` WRITE;
INSERT INTO `estnc_estagios` VALUES (27,1,1,1,776767,6,NULL,'2014-08-12 00:00:00','2014-08-29 00:00:00',6,1,'2014-08-12 00:00:00','2014-08-29 00:00:00',3,'2014-08-22 09:20:49');
INSERT INTO `estnc_estagios` VALUES (30,2972,1,16,777100,777038,NULL,'2014-10-03 00:00:00','2014-10-31 00:00:00',2,0,'2014-10-03 00:00:00','2014-10-31 00:00:00',11,'2014-08-25 10:57:52');
INSERT INTO `estnc_estagios` VALUES (31,2972,1,16,777100,777038,NULL,'2014-12-25 00:00:00','2014-12-28 00:00:00',1,0,'2014-12-25 00:00:00','2014-12-28 00:00:00',11,'2014-08-25 11:11:24');
INSERT INTO `estnc_estagios` VALUES (32,2972,1,16,777100,777038,NULL,'2014-12-25 00:00:00','2014-12-28 00:00:00',1,0,'2014-12-25 00:00:00','2014-12-28 00:00:00',11,'2014-08-25 11:12:30');
INSERT INTO `estnc_estagios` VALUES (40,1,1,2,776783,11,NULL,'2014-09-02 00:00:00','2014-09-12 00:00:00',4,1,'2014-09-02 00:00:00','2014-09-12 00:00:00',2,'2014-09-04 11:10:34');
INSERT INTO `estnc_estagios` VALUES (42,1,1,1,776660,5,NULL,'2014-10-07 00:00:00','2014-10-17 00:00:00',1,1,'2014-10-07 00:00:00','2014-10-17 00:00:00',12,'2014-09-04 11:24:00');
INSERT INTO `estnc_estagios` VALUES (46,1,1,1,776767,11,NULL,'2014-09-03 00:00:00','2014-09-12 00:00:00',4,0,'2014-09-03 00:00:00','2014-09-12 00:00:00',3,'2014-09-04 13:43:27');
INSERT INTO `estnc_estagios` VALUES (47,1,1,1,776660,11,NULL,'2014-09-09 00:00:00','2014-09-12 00:00:00',4,0,'2014-09-09 00:00:00','2014-09-12 00:00:00',12,'2014-09-04 13:53:37');
INSERT INTO `estnc_estagios` VALUES (48,1,1,1,776660,11,NULL,'2014-11-04 00:00:00','2014-11-18 00:00:00',1,1,'2014-11-04 00:00:00','2014-11-18 00:00:00',12,'2014-09-11 09:10:16');
INSERT INTO `estnc_estagios` VALUES (52,2962,1,1,776767,776627,NULL,'2014-09-10 00:00:00','2014-09-12 00:00:00',4,1,'2014-09-10 00:00:00','2014-09-12 00:00:00',3,'2014-09-11 10:41:02');
INSERT INTO `estnc_estagios` VALUES (53,2972,1,1,776767,777038,NULL,'2014-09-15 00:00:00','2015-09-16 00:00:00',1,1,'2014-09-15 00:00:00','2015-09-16 00:00:00',3,'2014-09-12 16:34:53');
INSERT INTO `estnc_estagios` VALUES (57,1,1,2,776783,11,NULL,'2014-09-15 00:00:00','2015-09-15 00:00:00',1,1,'2014-09-15 00:00:00','2015-09-15 00:00:00',2,'2014-09-15 13:54:28');
INSERT INTO `estnc_estagios` VALUES (58,2,1,2,776783,12,NULL,'2014-09-15 00:00:00','2015-09-15 00:00:00',1,0,'2014-09-15 00:00:00','2015-09-15 00:00:00',2,'2014-09-15 14:00:56');
INSERT INTO `estnc_estagios` VALUES (59,1,1,1,776767,6,NULL,'2014-09-23 00:00:00','2014-09-30 00:00:00',5,0,'2014-09-23 00:00:00','2014-09-30 00:00:00',3,'2014-09-24 16:22:12');
UNLOCK TABLES;

--
-- Table structure for view `avaliacoes_parametros`
--

DROP TABLE IF EXISTS `avaliacoes_parametros`;
/*!50001 DROP VIEW IF EXISTS `avaliacoes_parametros`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `avaliacoes_parametros` AS select `apm`.`cd_avaliacao` AS `cd_avaliacao`,`apm`.`cd_coligada_matriz` AS `cd_coligada_matriz`,`apm`.`ds_avaliacao` AS `ds_avaliacao`,`apm`.`nr_avaliacoes` AS `nr_avaliacoes`,`apm`.`nr_maximo_aulas` AS `nr_maximo_aulas`,`apm`.`cd_periodo_avaliacao` AS `cd_periodo_avaliacao`,`apm`.`ds_cond_aprov_direta` AS `ds_cond_aprov_direta`,`apm`.`ds_cond_repro_direta` AS `ds_cond_repro_direta`,`apm`.`ds_formula_media_anual` AS `ds_formula_media_anual`,`apm`.`ds_formula_media_final` AS `ds_formula_media_final`,`apm`.`ds_formula_media_exame` AS `ds_formula_media_exame`,`apm`.`ds_formula_media_segunda` AS `ds_formula_media_segunda`,`apm`.`ds_cond_aprov_exame` AS `ds_cond_aprov_exame`,`apm`.`ds_cond_aprov_segunda` AS `ds_cond_aprov_segunda`,`apm`.`nr_max_disci_exame` AS `nr_max_disci_exame`,`apm`.`nr_max_disci_segunda` AS `nr_max_disci_segunda`,`apm`.`sn_notas` AS `sn_notas`,`apm`.`sn_conceitos` AS `sn_conceitos`,`apm`.`sn_conceitos_parciais` AS `sn_conceitos_parciais`,`apm`.`sn_descricao` AS `sn_descricao`,`apm`.`sn_exame` AS `sn_exame`,`apm`.`sn_pi` AS `sn_pi`,`apm`.`ds_formula_media_sem_pi` AS `ds_formula_media_sem_pi`,`apm`.`sn_segunda_epoca` AS `sn_segunda_epoca`,`apm`.`sn_frequencia_global` AS `sn_frequencia_global`,`apm`.`ds_frequencia_tipo` AS `ds_frequencia_tipo`,`apm`.`cd_disci_frequencia` AS `cd_disci_frequencia`,`apm`.`sn_recuperacao` AS `sn_recuperacao`,`apm`.`ds_formula_recuperacao` AS `ds_formula_recuperacao`,`apm`.`ds_criterio_recuperacao` AS `ds_criterio_recuperacao`,`apm`.`nr_casas_decimais` AS `nr_casas_decimais`,`apm`.`ds_cond_recuperacao` AS `ds_cond_recuperacao`,`apm`.`vl_arredondamento` AS `vl_arredondamento`,`apm`.`sn_notas_diario_online` AS `sn_notas_diario_online`,`apm`.`sn_notas_diario` AS `sn_notas_diario`,`apm`.`sn_desblo_coorde` AS `sn_desblo_coorde`,`apm`.`sn_diario_imp_notas` AS `sn_diario_imp_notas`,`apm`.`sn_diario_imp_freqs` AS `sn_diario_imp_freqs`,`apm`.`sn_notas_truncar` AS `sn_notas_truncar`,`apm`.`sn_anual_truncar` AS `sn_anual_truncar`,`apm`.`sn_medias_truncar` AS `sn_medias_truncar`,`apm`.`sn_diario_imp_contprog` AS `sn_diario_imp_contprog`,`apm`.`ds_nota_exame` AS `ds_nota_exame`,`apm`.`ds_nota_segunda` AS `ds_nota_segunda`,`apm`.`sn_diario_online` AS `sn_diario_online`,`apm`.`sn_extra_classe` AS `sn_extra_classe`,`apm`.`sn_diario_eletro` AS `sn_diario_eletro`,`apm`.`sn_diario_online_provas` AS `sn_diario_online_provas`,`apm`.`sn_diario_online_aulas` AS `sn_diario_online_aulas`,`apm`.`sn_diario_online_recalc_medias` AS `sn_diario_online_recalc_medias`,`apm`.`sn_diario_online_bloque_aulas` AS `sn_diario_online_bloque_aulas`,`apm`.`sn_diario_online_bloque_provas` AS `sn_diario_online_bloque_provas`,`apm`.`nr_casas_decimais_forcado` AS `nr_casas_decimais_forcado`,`apm`.`tp_ajuste_forcado` AS `tp_ajuste_forcado`,`apm`.`nr_casas_forcado_media` AS `nr_casas_forcado_media`,`apm`.`tp_ajuste_forcado_media` AS `tp_ajuste_forcado_media`,`apm`.`sn_altera_notas_direta` AS `sn_altera_notas_direta`,`apm`.`sn_converter_notas_nulas` AS `sn_converter_notas_nulas`,`apm`.`sn_mostrar_alunos_curs_padrao` AS `sn_mostrar_alunos_curs_padrao`,`apm`.`sn_ins_aulas_semhorario` AS `sn_ins_aulas_semhorario`,`apm`.`sn_copiar_conteudo_pordata` AS `sn_copiar_conteudo_pordata`,`apm`.`sn_ajuste_apos_recuperacao` AS `sn_ajuste_apos_recuperacao`,`apm`.`ds_formula_padrao` AS `ds_formula_padrao`,`apm`.`sn_obrigar_formula_padrao` AS `sn_obrigar_formula_padrao`,`apm`.`ds_formula_media_curso` AS `ds_formula_media_curso`,`apm`.`nr_inicio_aulas_extras` AS `nr_inicio_aulas_extras`,`apm`.`sn_usar_media_curso` AS `sn_usar_media_curso`,`apm`.`ds_sigla` AS `ds_sigla`,`apm`.`ds_formula_periodo` AS `ds_formula_periodo`,`apm`.`nr_periodos` AS `nr_periodos`,`apm`.`ds_condicao_situacao_periodo` AS `ds_condicao_situacao_periodo`,`apm`.`sn_diario_online_mostra_ajuste` AS `sn_diario_online_mostra_ajuste`,`apm`.`nr_dias_diario_bloq_provas` AS `nr_dias_diario_bloq_provas`,`apm`.`sn_descricao_fixa` AS `sn_descricao_fixa`,`apm`.`sn_freque_pergunta` AS `sn_freque_pergunta`,`apm`.`sn_freque_pergunta_padrao` AS `sn_freque_pergunta_padrao`,`apm`.`sn_professor_fecha_diario` AS `sn_professor_fecha_diario`,`apm`.`sn_profes_digita_peso` AS `sn_profes_digita_peso`,`apm`.`cd_situacao_concluida` AS `cd_situacao_concluida`,`apm`.`nr_qtd_aulas_impressao` AS `nr_qtd_aulas_impressao`,`apm`.`nr_notas_max_alteracoes` AS `nr_notas_max_alteracoes`,`apm`.`sn_digita_exame_diario_online` AS `sn_digita_exame_diario_online`,`apm`.`ds_formula_pi` AS `ds_formula_pi`,`apm`.`cd_tipo_horario` AS `cd_tipo_horario`,`apm`.`cd_situacao_aprov_direta` AS `cd_situacao_aprov_direta`,`apm`.`cd_situacao_aprov_exame` AS `cd_situacao_aprov_exame`,`apm`.`cd_situacao_aprov_2epoca` AS `cd_situacao_aprov_2epoca`,`apm`.`sn_frequencia_turma` AS `sn_frequencia_turma`,`apm`.`sn_diario_online_atividades` AS `sn_diario_online_atividades`,`apm`.`nr_media_proficiencia` AS `nr_media_proficiencia`,`apm`.`sn_alterar_nota_exame` AS `sn_alterar_nota_exame`,`apm`.`sn_digita_todas_notas` AS `sn_digita_todas_notas`,`apm`.`sn_ajuste_media` AS `sn_ajuste_media`,`apm`.`sn_alterar_2epoca` AS `sn_alterar_2epoca`,`apm`.`sn_calcular_media_aritmetica` AS `sn_calcular_media_aritmetica`,`apm`.`sn_falta_exame_forca_2epoca` AS `sn_falta_exame_forca_2epoca`,`apm`.`sn_digita_2epoca_diario_online` AS `sn_digita_2epoca_diario_online`,`apm`.`nm_nome_exame_etapa` AS `nm_nome_exame_etapa`,`apm`.`nm_nome_exame_especial` AS `nm_nome_exame_especial`,`apm`.`sn_gerar_taxa_recorrencia` AS `sn_gerar_taxa_recorrencia`,`apm`.`cd_titulo_2epoca` AS `cd_titulo_2epoca`,`apm`.`calcular_media_fecha_diario` AS `calcular_media_fecha_diario`,`apm`.`sn_aulas_datas` AS `sn_aulas_datas`,`apm`.`sn_exibir_descricao` AS `sn_exibir_descricao`,`apm`.`cd_situacao_proficiencia` AS `cd_situacao_proficiencia`,`apm`.`sn_agrupar_aulas_online` AS `sn_agrupar_aulas_online`,`apm`.`ds_cronograma_visualiza_inicio` AS `ds_cronograma_visualiza_inicio`,`apm`.`ds_cronograma_visualiza_fim` AS `ds_cronograma_visualiza_fim`,`apm`.`ds_cronograma_notas_inicio` AS `ds_cronograma_notas_inicio`,`apm`.`ds_cronograma_notas_fim` AS `ds_cronograma_notas_fim`,`apm`.`ds_cronograma_aulas_inicio` AS `ds_cronograma_aulas_inicio`,`apm`.`ds_cronograma_aulas_fim` AS `ds_cronograma_aulas_fim`,`apm`.`ds_cronograma_liberacao` AS `ds_cronograma_liberacao`,`apm`.`nr_casas_decimais_frequencia` AS `nr_casas_decimais_frequencia`,`apm`.`ds_frequencia_registro` AS `ds_frequencia_registro`,`apm`.`sn_calculo_media_automatico` AS `sn_calculo_media_automatico`,`apm`.`sn_observacao_nota` AS `sn_observacao_nota`,`apm`.`sn_agrupar_avaliacao_tipo` AS `sn_agrupar_avaliacao_tipo`,`apm`.`sn_media_notas_digitadas` AS `sn_media_notas_digitadas`,`apm`.`sn_notas_calcular_medias` AS `sn_notas_calcular_medias`,`apm`.`vl_ajuste_min` AS `vl_ajuste_min`,`apm`.`vl_ajuste_max` AS `vl_ajuste_max`,`apm`.`sn_falta_cancela_taxa` AS `sn_falta_cancela_taxa`,`apm`.`sn_verificar_data_matricula` AS `sn_verificar_data_matricula`,`apm`.`sn_arred_forcado_antes_ajuste` AS `sn_arred_forcado_antes_ajuste`,`apm`.`vl_media_arredondamento` AS `vl_media_arredondamento`,`apm`.`vl_media_arredondamento_exame` AS `vl_media_arredondamento_exame`,`apm`.`vl_media_arredondamento_2epoca` AS `vl_media_arredondamento_2epoca`,`apm`.`sn_libera_freq_apos_fim_etapa` AS `sn_libera_freq_apos_fim_etapa`,`apm`.`sn_preencher_notas_nulas_zero` AS `sn_preencher_notas_nulas_zero`,`apm`.`ds_sintese_avaliacao` AS `ds_sintese_avaliacao`,`apm`.`vl_hora_aula` AS `vl_hora_aula`,`apm`.`sn_bloquear_diario` AS `sn_bloquear_diario`,`apm`.`sn_valida_fecha_diario` AS `sn_valida_fecha_diario`,`apm`.`sn_alterar_provas` AS `sn_alterar_provas`,`apm`.`sn_deferir_notas_diario` AS `sn_deferir_notas_diario`,`apm`.`sn_diario_online_bloque_cont` AS `sn_diario_online_bloque_cont`,`c`.`cd_coligada` AS `cd_coligada` from (`avaliacoes_parametros_matriz` `apm` join `coligadas` `c` on((`c`.`CD_COLIGADA_MATRIZ` = `apm`.`cd_coligada_matriz`))) group by `apm`.`cd_avaliacao` */;

--
-- Table structure for view `bib_aquisicoes_titulos_sugestoes_titulos`
--

DROP TABLE IF EXISTS `bib_aquisicoes_titulos_sugestoes_titulos`;
/*!50001 DROP VIEW IF EXISTS `bib_aquisicoes_titulos_sugestoes_titulos`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `bib_aquisicoes_titulos_sugestoes_titulos` AS select `bib_aquisicoes_sugestoes`.`cd_aquisicao_sugestao` AS `cd_aquisicao_sugestao`,`bib_aquisicoes_sugestoes`.`cd_aquisicao_titulo` AS `cd_aquisicao_titulo`,`bib_aquisicoes_sugestoes`.`cd_sugestao_titulo` AS `cd_sugestao_titulo` from `bib_aquisicoes_sugestoes` */;

--
-- Table structure for view `bib_bibliotecas_localizacoes_tipos`
--

DROP TABLE IF EXISTS `bib_bibliotecas_localizacoes_tipos`;
/*!50001 DROP VIEW IF EXISTS `bib_bibliotecas_localizacoes_tipos`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `bib_bibliotecas_localizacoes_tipos` AS select `bib_localizacoes_tipos`.`cd_localizacao_tipo` AS `cd_localizacao_tipo`,`bib_localizacoes_tipos`.`ds_nome_localizacao` AS `ds_nome_localizacao` from `bib_localizacoes_tipos` */;

--
-- Table structure for view `bib_modalidades_movimento_grupo`
--

DROP TABLE IF EXISTS `bib_modalidades_movimento_grupo`;
/*!50001 DROP VIEW IF EXISTS `bib_modalidades_movimento_grupo`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `bib_modalidades_movimento_grupo` AS select `bib_modalidades_movimento_grp`.`cd_modalidade_grupo` AS `cd_modalidade_grupo`,`bib_modalidades_movimento_grp`.`cd_modalidade` AS `cd_modalidade`,`bib_modalidades_movimento_grp`.`cd_bib_grupo` AS `cd_bib_grupo`,`bib_modalidades_movimento_grp`.`nr_dias_proximo_emprestimo` AS `nr_dias_proximo_emprestimo`,`bib_modalidades_movimento_grp`.`nr_maximo_renovacoes_local` AS `nr_maximo_renovacoes_local`,`bib_modalidades_movimento_grp`.`nr_dias_expira_reserva` AS `nr_dias_expira_reserva`,`bib_modalidades_movimento_grp`.`nr_renovacoes_garantidas` AS `nr_renovacoes_garantidas`,`bib_modalidades_movimento_grp`.`nr_maximo_renovacoes_online` AS `nr_maximo_renovacoes_online`,`bib_modalidades_movimento_grp`.`sn_reserva_local` AS `sn_reserva_local`,`bib_modalidades_movimento_grp`.`sn_reserva_online` AS `sn_reserva_online`,`bib_modalidades_movimento_grp`.`sn_emprestimo` AS `sn_emprestimo`,`bib_modalidades_movimento_grp`.`nr_emprestimos_simultaneos` AS `nr_emprestimos_simultaneos`,`bib_modalidades_movimento_grp`.`sn_multa_base_calendario` AS `sn_multa_base_calendario`,`bib_modalidades_movimento_grp`.`db_multa_valor` AS `db_multa_valor`,`bib_modalidades_movimento_grp`.`nr_multa_horas_intervalo_conta` AS `nr_multa_horas_intervalo_conta`,`bib_modalidades_movimento_grp`.`sn_empresta_reservados` AS `sn_empresta_reservados`,`bib_modalidades_movimento_grp`.`tm_hora_limite_devolucoes` AS `tm_hora_limite_devolucoes`,`bib_modalidades_movimento_grp`.`tm_hora_limite_devolve_reserva` AS `tm_hora_limite_devolve_reserva`,`bib_modalidades_movimento_grp`.`tm_hora_limite_renovacoes` AS `tm_hora_limite_renovacoes`,`bib_modalidades_movimento_grp`.`tm_hora_limite_renovacao_onl` AS `tm_hora_limite_renovacao_onl`,`bib_modalidades_movimento_grp`.`tm_hora_limite_emprestimos` AS `tm_hora_limite_emprestimos`,`bib_modalidades_movimento_grp`.`tm_hora_limite_reservas_local` AS `tm_hora_limite_reservas_local`,`bib_modalidades_movimento_grp`.`tm_hora_limite_reservas_online` AS `tm_hora_limite_reservas_online`,`bib_modalidades_movimento_grp`.`nr_horas_emprestimo` AS `nr_horas_emprestimo`,`bib_modalidades_movimento_grp`.`sn_emprestar_mais_exemplares` AS `sn_emprestar_mais_exemplares`,`bib_modalidades_movimento_grp`.`db_multa_minima_bloquear` AS `db_multa_minima_bloquear`,`bib_modalidades_movimento_grp`.`db_multa_minima_bloq_res` AS `db_multa_minima_bloq_res` from `bib_modalidades_movimento_grp` */;

--
-- Table structure for view `bib_titulos_exemplares_arquivos`
--

DROP TABLE IF EXISTS `bib_titulos_exemplares_arquivos`;
/*!50001 DROP VIEW IF EXISTS `bib_titulos_exemplares_arquivos`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `bib_titulos_exemplares_arquivos` AS select `bib_titulos_exemplares_arq`.`cd_exemplar_arquivo` AS `cd_exemplar_arquivo`,`bib_titulos_exemplares_arq`.`cd_exemplar` AS `cd_exemplar`,`bib_titulos_exemplares_arq`.`sn_capa` AS `sn_capa`,`bib_titulos_exemplares_arq`.`ds_nome_original` AS `ds_nome_original`,`bib_titulos_exemplares_arq`.`ds_nome_servidor` AS `ds_nome_servidor`,`bib_titulos_exemplares_arq`.`bb_arquivo` AS `bb_arquivo` from `bib_titulos_exemplares_arq` */;

--
-- Table structure for view `bloquetos`
--

DROP TABLE IF EXISTS `bloquetos`;
/*!50001 DROP VIEW IF EXISTS `bloquetos`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `bloquetos` AS select `me`.`codigoaluno` AS `cd_aluno`,`me`.`parcela` AS `nr_parcela`,`me`.`datavencimento` AS `dt_vencimento`,`me`.`turma` AS `cd_turma`,`pe`.`sn_bloqueto_empresa` AS `sn_bloqueto_empresa`,`em`.`nm_empresa` AS `nm_empresa`,`em`.`ds_cnpj` AS `ds_cnpj`,`me`.`cd_mensalidade` AS `cd_mensalidade` from (((`mensalidades` `me` join `fin_boleto` `bo` on(((`bo`.`cd_boleto` = `me`.`cd_boleto`) and (`bo`.`cd_pessoa` = `me`.`codigoaluno`)))) join `pessoas` `pe` on((`pe`.`cd_pessoa` = `me`.`codigoaluno`))) left join `empresas` `em` on((`em`.`cd_empresa` = `pe`.`cd_empresa`))) */;

--
-- Table structure for view `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!50001 DROP VIEW IF EXISTS `cursos`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `cursos` AS select `t`.`anosemestre` AS `ANOSEMESTRE`,`cc`.`CD_CURSO` AS `CODIGO`,`cm`.`DS_APELIDO` AS `APELIDO`,cast(`cm`.`DS_CURSO` as char charset latin1) AS `DESCRICAO`,`cm`.`NR_GRAU` AS `GRAU`,cast(NULL as char charset latin1) AS `PARECERAUTORIZACAO`,cast(NULL as char charset latin1) AS `PARECERRECONHECIMENTO`,cast(NULL as datetime) AS `DATACEE`,`cc`.`NR_CARGA_HORARIA` AS `CARGAHORARIATOTAL`,`cc`.`NR_DIAS_LETIVOS` AS `DIASLETIVOS`,cast(NULL as signed) AS `SEMANASLETIVAS`,cast(NULL as signed) AS `DIASSEMANASLETIVAS`,cast(NULL as signed) AS `HORARIOLETIVO`,`cc`.`NR_DURACAO_AULA` AS `DURACAOHORAAULA`,cast(NULL as signed) AS `DIASLETIVOSSEMANAIS`,`cc`.`NR_SERIES` AS `NUMERODESERIES`,`cc`.`DS_NOME_ETAPA` AS `NOME_ETAPA`,`cc`.`DS_CONTRATO` AS `CONTRATO`,cast(NULL as signed) AS `QTADEBIMESTRES`,`cc`.`CD_DEPTO` AS `DEPTO`,cast(NULL as signed) AS `SEMANASLETIVASV`,cast(NULL as signed) AS `SEMANASLETIVASN`,`cc`.`DS_REQUERIMENTO` AS `REQUERIMENTO`,cast(NULL as char charset latin1) AS `SENHA`,cast(NULL as char charset latin1) AS `SENHAPROVISORIA`,cast(NULL as signed) AS `CD_REGIMENTO`,cast(NULL as signed) AS `CD_EDITAL`,cast(NULL as signed) AS `CD_INSTRU_GERAIS`,`cc`.`CD_CURSO_EQUIVALENTE` AS `CD_CURSO_EQUIVALENTE`,`cc`.`CD_CURSO_MEC` AS `MEC_CD_CURSO`,`cc`.`CD_HABILITACAO_MEC` AS `MEC_CD_HABILITACAO`,`cc`.`CD_GRAU_MEC` AS `MEC_CD_GRAU`,cast(NULL as datetime) AS `DT_RESULTADO_FINAL`,cast(NULL as char charset latin1) AS `CLI_MOSTRAR_SITE`,cast(NULL as char charset latin1) AS `DS_HABILITACAO`,`cc`.`CD_GRADE` AS `CD_GRADE`,`cc`.`CD_CURSO` AS `CD_CURSO`,`cc`.`ME_OBSERVACOES` AS `OBSERVACOES`,`cc`.`SN_ACADEMICO` AS `SN_ACADEMICO`,`cc`.`CD_COLIGADA` AS `CD_COLIGADA` from ((`cursos_mestre` `cm` join `cursos_coligadas` `cc` on(((`cc`.`CD_CURSO` = `cm`.`CD_CURSO`) and (`cc`.`SN_ATIVO` = 1)))) join `turmas` `t` on(((`t`.`curso` = `cc`.`CD_CURSO`) and (`t`.`cd_coligada` = `cc`.`CD_COLIGADA`)))) group by `t`.`anosemestre`,`cc`.`CD_CURSO` */;

--
-- Table structure for view `cursos_turmas_campos_adicionais`
--

DROP TABLE IF EXISTS `cursos_turmas_campos_adicionais`;
/*!50001 DROP VIEW IF EXISTS `cursos_turmas_campos_adicionais`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `cursos_turmas_campos_adicionais` AS select `cursos_turmas_extras`.`cd_campo` AS `cd_campo`,`cursos_turmas_extras`.`ds_campo` AS `ds_campo`,`cursos_turmas_extras`.`ds_campo_descricao` AS `ds_campo_descricao`,`cursos_turmas_extras`.`ds_tipo` AS `ds_tipo`,`cursos_turmas_extras`.`nr_ordem` AS `nr_ordem`,`cursos_turmas_extras`.`sn_curso` AS `sn_curso`,`cursos_turmas_extras`.`cd_opcao` AS `cd_opcao`,`cursos_turmas_extras`.`nr_ordem_externa` AS `nr_ordem_externa`,`cursos_turmas_extras`.`sn_apenas_cadastro` AS `sn_apenas_cadastro` from `cursos_turmas_extras` */;

--
-- Table structure for view `diario_lista_presenca`
--

DROP TABLE IF EXISTS `diario_lista_presenca`;
/*!50001 DROP VIEW IF EXISTS `diario_lista_presenca`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `diario_lista_presenca` AS select `daa`.`cd_pessoa` AS `cd_pessoa`,`da`.`anosemestre` AS `nr_anosemestre`,`thc`.`cd_horario` AS `cd_horario`,`da`.`data` AS `dt_aula`,`daa`.`ds_freq` AS `ds_freq`,(case when ((length(coalesce(replace(replace(`daa`.`ds_freq`,'F',''),'-',''),'')) + length(coalesce(replace(replace(`daa`.`ds_freq`,'F',''),'C',''),''))) > length(coalesce(replace(replace(`daa`.`ds_freq`,'C',''),'-',''),''))) then 'S' when (length(coalesce(`daa`.`ds_freq`,'')) > 0) then 'N' else NULL end) AS `sn_presente`,'S' AS `sn_imp_diario`,0 AS `sn_atualizado`,`da`.`turma` AS `cd_turma`,`da`.`disciplina` AS `cd_disciplina` from (((`diario_aulas` `da` join `diario_aulas_alunos` `daa` on(((`daa`.`cd_turma` = `da`.`turma`) and (`daa`.`nr_anosem` = `da`.`anosemestre`) and (`daa`.`cd_disciplina` = `da`.`disciplina`) and (`daa`.`cd_bimestre` = `da`.`bimestre`) and (`daa`.`nr_aula` = `da`.`nro_aula`)))) join `diario_aulas_turmas_horarios` `dath` on((`dath`.`cd_diario_aula` = `da`.`cd_diario_aula`))) join `turmas_horarios_config` `thc` on((`thc`.`cd_turmas_horarios` = `dath`.`cd_turma_horario`))) where (`IS_HORARIO_TURMA_ATIVA`(`da`.`data`,`thc`.`dt_inicial`,`thc`.`dt_final`,`thc`.`sn_ativo`) = 1) */;

--
-- Table structure for view `diario_matriculas`
--

DROP TABLE IF EXISTS `diario_matriculas`;
/*!50001 DROP VIEW IF EXISTS `diario_matriculas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `diario_matriculas` AS select `fi`.`codigoaluno` AS `CODALUNO`,`fi`.`turma` AS `TURMA`,`fi`.`anosemestre` AS `ANOSEMESTRE`,`fi`.`disciplina` AS `DISCIPLINA`,`dpt`.`bimestre` AS `BIMESTRE`,`dpt`.`cd_grupo` AS `CD_GRUPO`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,1) AS `NOTA1`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,2) AS `NOTA2`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,3) AS `NOTA3`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,4) AS `NOTA4`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,5) AS `NOTA5`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,6) AS `NOTA6`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,7) AS `NOTA7`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,8) AS `NOTA8`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,9) AS `NOTA9`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,10) AS `NOTA10`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,11) AS `NOTA11`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,12) AS `NOTA12`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,13) AS `NOTA13`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,14) AS `NOTA14`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,15) AS `NOTA15`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,16) AS `NOTA16`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,17) AS `NOTA17`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,18) AS `NOTA18`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,19) AS `NOTA19`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,20) AS `NOTA20`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,21) AS `NOTA21`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,22) AS `NOTA22`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,23) AS `NOTA23`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,24) AS `NOTA24`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,25) AS `NOTA25`,`GET_NOTA`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,-(1)) AS `NOTA_ESPECIAL`,(case when (`dpt`.`bimestre` = 1) then `fi`.`nota1` when (`dpt`.`bimestre` = 2) then `fi`.`nota2` when (`dpt`.`bimestre` = 3) then `fi`.`nota3` when (`dpt`.`bimestre` = 4) then `fi`.`nota4` when (`dpt`.`bimestre` = 5) then `fi`.`nota5` when (`dpt`.`bimestre` = 6) then `fi`.`nota6` when (`dpt`.`bimestre` = 7) then `fi`.`nota7` when (`dpt`.`bimestre` = 8) then `fi`.`nota8` when (`dpt`.`bimestre` = 9) then `fi`.`nota9` when (`dpt`.`bimestre` = 10) then `fi`.`nota10` else NULL end) AS `MEDIA`,(case when (`dpt`.`bimestre` = 1) then `fi`.`falta1` when (`dpt`.`bimestre` = 2) then `fi`.`falta2` when (`dpt`.`bimestre` = 3) then `fi`.`falta3` when (`dpt`.`bimestre` = 4) then `fi`.`falta4` when (`dpt`.`bimestre` = 5) then `fi`.`falta5` when (`dpt`.`bimestre` = 6) then `fi`.`falta6` when (`dpt`.`bimestre` = 7) then `fi`.`falta7` when (`dpt`.`bimestre` = 8) then `fi`.`falta8` when (`dpt`.`bimestre` = 9) then `fi`.`falta9` when (`dpt`.`bimestre` = 10) then `fi`.`falta10` else NULL end) AS `FALTAS`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,1) AS `FREQ1`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,2) AS `FREQ2`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,3) AS `FREQ3`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,4) AS `FREQ4`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,5) AS `FREQ5`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,6) AS `FREQ6`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,7) AS `FREQ7`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,8) AS `FREQ8`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,9) AS `FREQ9`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,10) AS `FREQ10`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,11) AS `FREQ11`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,12) AS `FREQ12`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,13) AS `FREQ13`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,14) AS `FREQ14`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,15) AS `FREQ15`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,16) AS `FREQ16`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,17) AS `FREQ17`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,18) AS `FREQ18`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,19) AS `FREQ19`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,20) AS `FREQ20`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,21) AS `FREQ21`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,22) AS `FREQ22`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,23) AS `FREQ23`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,24) AS `FREQ24`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,25) AS `FREQ25`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,26) AS `FREQ26`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,27) AS `FREQ27`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,28) AS `FREQ28`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,29) AS `FREQ29`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,30) AS `FREQ30`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,31) AS `FREQ31`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,32) AS `FREQ32`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,33) AS `FREQ33`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,34) AS `FREQ34`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,35) AS `FREQ35`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,36) AS `FREQ36`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,37) AS `FREQ37`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,38) AS `FREQ38`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,39) AS `FREQ39`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,40) AS `FREQ40`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,41) AS `FREQ41`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,42) AS `FREQ42`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,43) AS `FREQ43`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,44) AS `FREQ44`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,45) AS `FREQ45`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,46) AS `FREQ46`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,47) AS `FREQ47`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,48) AS `FREQ48`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,49) AS `FREQ49`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,50) AS `FREQ50`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,51) AS `FREQ51`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,52) AS `FREQ52`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,53) AS `FREQ53`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,54) AS `FREQ54`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,55) AS `FREQ55`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,56) AS `FREQ56`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,57) AS `FREQ57`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,58) AS `FREQ58`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,59) AS `FREQ59`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,60) AS `FREQ60`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,61) AS `FREQ61`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,62) AS `FREQ62`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,63) AS `FREQ63`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,64) AS `FREQ64`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,65) AS `FREQ65`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,66) AS `FREQ66`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,67) AS `FREQ67`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,68) AS `FREQ68`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,69) AS `FREQ69`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,70) AS `FREQ70`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,71) AS `FREQ71`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,72) AS `FREQ72`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,73) AS `FREQ73`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,74) AS `FREQ74`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,75) AS `FREQ75`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,76) AS `FREQ76`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,77) AS `FREQ77`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,78) AS `FREQ78`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,79) AS `FREQ79`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,80) AS `FREQ80`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,81) AS `FREQ81`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,82) AS `FREQ82`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,83) AS `FREQ83`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,84) AS `FREQ84`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,85) AS `FREQ85`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,86) AS `FREQ86`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,87) AS `FREQ87`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,88) AS `FREQ88`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,89) AS `FREQ89`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,90) AS `FREQ90`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,91) AS `FREQ91`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,92) AS `FREQ92`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,93) AS `FREQ93`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,94) AS `FREQ94`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,95) AS `FREQ95`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,96) AS `FREQ96`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,97) AS `FREQ97`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,98) AS `FREQ98`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,99) AS `FREQ99`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,100) AS `FREQ100`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,101) AS `FREQ101`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,102) AS `FREQ102`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,103) AS `FREQ103`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,104) AS `FREQ104`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,105) AS `FREQ105`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,106) AS `FREQ106`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,107) AS `FREQ107`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,108) AS `FREQ108`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,109) AS `FREQ109`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,110) AS `FREQ110`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,111) AS `FREQ111`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,112) AS `FREQ112`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,113) AS `FREQ113`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,114) AS `FREQ114`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,115) AS `FREQ115`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,116) AS `FREQ116`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,117) AS `FREQ117`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,118) AS `FREQ118`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,119) AS `FREQ119`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,120) AS `FREQ120`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,121) AS `FREQ121`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,122) AS `FREQ122`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,123) AS `FREQ123`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,124) AS `FREQ124`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,125) AS `FREQ125`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,126) AS `FREQ126`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,127) AS `FREQ127`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,128) AS `FREQ128`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,129) AS `FREQ129`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,130) AS `FREQ130`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,131) AS `FREQ131`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,132) AS `FREQ132`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,133) AS `FREQ133`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,134) AS `FREQ134`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,135) AS `FREQ135`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,136) AS `FREQ136`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,137) AS `FREQ137`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,138) AS `FREQ138`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,139) AS `FREQ139`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,140) AS `FREQ140`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,141) AS `FREQ141`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,142) AS `FREQ142`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,143) AS `FREQ143`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,144) AS `FREQ144`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,145) AS `FREQ145`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,146) AS `FREQ146`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,147) AS `FREQ147`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,148) AS `FREQ148`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,149) AS `FREQ149`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,150) AS `FREQ150`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,151) AS `FREQ151`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,152) AS `FREQ152`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,153) AS `FREQ153`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,154) AS `FREQ154`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,155) AS `FREQ155`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,156) AS `FREQ156`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,157) AS `FREQ157`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,158) AS `FREQ158`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,159) AS `FREQ159`,`GET_FREQ`(`fi`.`codigoaluno`,`fi`.`anosemestre`,`fi`.`turma`,`fi`.`disciplina`,`dpt`.`bimestre`,160) AS `FREQ160`,(case when (`dpt`.`bimestre` = 1) then `fi`.`ajuste1` when (`dpt`.`bimestre` = 2) then `fi`.`ajuste2` when (`dpt`.`bimestre` = 3) then `fi`.`ajuste3` when (`dpt`.`bimestre` = 4) then `fi`.`ajuste4` when (`dpt`.`bimestre` = 5) then `fi`.`ajuste5` when (`dpt`.`bimestre` = 6) then `fi`.`ajuste6` when (`dpt`.`bimestre` = 7) then `fi`.`ajuste7` when (`dpt`.`bimestre` = 8) then `fi`.`ajuste8` when (`dpt`.`bimestre` = 9) then `fi`.`ajuste9` when (`dpt`.`bimestre` = 10) then `fi`.`ajuste10` end) AS `ajuste`,`fi`.`situacao` AS `situacao` from (`fichaindividual` `fi` join `diario_turmas` `dpt` on(((`fi`.`anosemestre` = `dpt`.`anosemestre`) and (`fi`.`curso` = `dpt`.`curso`) and (`fi`.`turma` = `dpt`.`turma`) and (`fi`.`disciplina` = `dpt`.`disciplina`)))) */;

--
-- Table structure for view `fin_centro_custos`
--

DROP TABLE IF EXISTS `fin_centro_custos`;
/*!50001 DROP VIEW IF EXISTS `fin_centro_custos`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `fin_centro_custos` AS select `fccc`.`cd_centro` AS `cd_centro`,`fccc`.`cd_coligada_matriz` AS `cd_coligada_matriz`,`fccc`.`ds_centro` AS `ds_centro`,`fccc`.`ds_observacao` AS `ds_observacao`,`fccc`.`cd_classificacao` AS `cd_classificacao`,`fccc`.`tp_centro` AS `tp_centro`,`fccc`.`cd_grupo` AS `cd_grupo`,`fccc`.`sn_ativo` AS `sn_ativo`,`c`.`cd_coligada` AS `cd_coligada` from (`fin_config_centro_custos` `fccc` join `coligadas` `c` on((`c`.`CD_COLIGADA_MATRIZ` = `fccc`.`cd_coligada_matriz`))) */;

--
-- Table structure for view `fin_formas_pgto`
--

DROP TABLE IF EXISTS `fin_formas_pgto`;
/*!50001 DROP VIEW IF EXISTS `fin_formas_pgto`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `fin_formas_pgto` AS select `fcfp`.`cd_forma_pgto` AS `cd_forma_pgto`,`fcfp`.`cd_coligada_matriz` AS `cd_coligada_matriz`,`fcfp`.`ds_forma_pgto` AS `ds_forma_pgto`,`fcfp`.`sn_cadastra_cheque` AS `sn_cadastra_cheque`,`fcfp`.`sn_ativo` AS `sn_ativo`,`fcfp`.`sn_compensa_auto` AS `sn_compensa_auto`,`fcfp`.`cd_forma_banco` AS `cd_forma_banco`,`fcfp`.`cd_chave_pgto` AS `cd_chave_pgto`,`c`.`cd_coligada` AS `cd_coligada` from (`fin_config_formas_pgto` `fcfp` join `coligadas` `c` on((`c`.`CD_COLIGADA_MATRIZ` = `fcfp`.`cd_coligada_matriz`))) */;

--
-- Table structure for view `fin_plano_contas`
--

DROP TABLE IF EXISTS `fin_plano_contas`;
/*!50001 DROP VIEW IF EXISTS `fin_plano_contas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `fin_plano_contas` AS select `fcpc`.`cd_conta` AS `cd_conta`,`fcpc`.`cd_coligada_matriz` AS `cd_coligada_matriz`,`fcpc`.`ds_conta` AS `ds_conta`,`fcpc`.`ds_observacao` AS `ds_observacao`,`fcpc`.`cd_classificacao` AS `cd_classificacao`,`fcpc`.`cd_apropriacao` AS `cd_apropriacao`,`fcpc`.`tp_conta` AS `tp_conta`,`fcpc`.`tp_entrada_saida` AS `tp_entrada_saida`,`fcpc`.`sn_ativo` AS `sn_ativo`,`fcpc`.`cd_conta_contabil` AS `cd_conta_contabil`,`fcpc`.`cd_grupo_principal` AS `cd_grupo_principal`,`fcpc`.`cd_class1` AS `cd_class1`,`fcpc`.`cd_class2` AS `cd_class2`,`fcpc`.`cd_class3` AS `cd_class3`,`fcpc`.`cd_class4` AS `cd_class4`,`fcpc`.`cd_class5` AS `cd_class5`,`fcpc`.`cd_class6` AS `cd_class6`,`fcpc`.`cd_class7` AS `cd_class7`,`fcpc`.`cd_class8` AS `cd_class8`,`fcpc`.`cd_class9` AS `cd_class9`,`fcpc`.`ds_formula_calculo` AS `ds_formula_calculo`,`fcpc`.`cd_criterio` AS `cd_criterio`,`fcpc`.`sn_custeio` AS `sn_custeio`,`fcpc`.`cd_grupo_custeio` AS `cd_grupo_custeio`,`c`.`cd_coligada` AS `cd_coligada` from (`fin_config_plano_contas` `fcpc` join `coligadas` `c` on((`c`.`CD_COLIGADA_MATRIZ` = `fcpc`.`cd_coligada_matriz`))) */;

--
-- Table structure for view `fin_tipos_titulo`
--

DROP TABLE IF EXISTS `fin_tipos_titulo`;
/*!50001 DROP VIEW IF EXISTS `fin_tipos_titulo`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `fin_tipos_titulo` AS select `fctt`.`cd_tipo_titulo` AS `cd_tipo_titulo`,`fctt`.`cd_coligada_matriz` AS `cd_coligada_matriz`,`fctt`.`ds_tipo_titulo` AS `ds_tipo_titulo`,`fctt`.`ct_tipo_titulo` AS `ct_tipo_titulo`,`fctt`.`cd_conta` AS `cd_conta`,`fctt`.`cd_padrao` AS `cd_padrao`,`fctt`.`vl_padrao` AS `vl_padrao`,`fctt`.`cd_conta_debito` AS `cd_conta_debito`,`fctt`.`nr_parcela` AS `nr_parcela`,`fctt`.`sn_faturamento` AS `sn_faturamento`,`fctt`.`ds_grupo_boleto` AS `ds_grupo_boleto`,`fctt`.`sn_libera_juros` AS `sn_libera_juros`,`fctt`.`dt_padrao_geracao` AS `dt_padrao_geracao`,`fctt`.`cd_titulo_banco` AS `cd_titulo_banco`,`fctt`.`cd_nfe_g2ka_servico_titulo` AS `cd_nfe_g2ka_servico_titulo`,`c`.`cd_coligada` AS `cd_coligada`,`fctt`.`cd_conta_cancel` AS `cd_conta_cancel` from (`fin_config_tipos_titulo` `fctt` join `coligadas` `c` on((`c`.`CD_COLIGADA_MATRIZ` = `fctt`.`cd_coligada_matriz`))) */;

--
-- Table structure for view `gradecurricular`
--

DROP TABLE IF EXISTS `gradecurricular`;
/*!50001 DROP VIEW IF EXISTS `gradecurricular`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `gradecurricular` AS select distinct `t`.`anosemestre` AS `ANOSEMESTRE`,`g`.`CD_CURSO` AS `CURSO`,`gd`.`CD_DISCIPLINA` AS `DISCIPLINA`,`gd`.`NR_SERIE` AS `SERIE`,`t`.`turno` AS `TURNO`,`gd`.`NR_AULAS` AS `NUMEROAULAS`,`gd`.`VL_VALOR` AS `VALOR`,cast(concat(`t`.`anosemestre`,`g`.`CD_CURSO`,convert(lpad(`gd`.`NR_SERIE`,2,0) using latin1),`t`.`turno`,convert(lpad(`gd`.`CD_DISCIPLINA`,10,0) using latin1)) as char charset latin1) AS `CODIGO`,`gd`.`SN_COMPARTILHADA` AS `SN_COMPARTILHADA`,`gd`.`NR_CREDITOS_ACADEMICOS` AS `NR_CREDITOS_ACADEMICOS`,`gd`.`CD_GRADE` AS `CD_GRADE`,`gd`.`CD_DISCIPLINA_CATEGORIA` AS `CD_DISC_CATEGORIA`,`gd`.`NR_CARGA_HORARIA_PRATICA` AS `NR_CH_PRATICA`,`gd`.`NR_CARGA_HORARIA_TEORICA` AS `NR_CH_TEORICA` from ((`turmas` `t` join `grades` `g` on(((`g`.`CD_GRADE` = `t`.`cd_grade`) and (`g`.`CD_CURSO` = `t`.`curso`) and (`g`.`SN_ATIVO` = _latin1'S')))) join `grades_disciplinas` `gd` on(((`gd`.`CD_GRADE` = `g`.`CD_GRADE`) and (`gd`.`CD_CURSO` = `g`.`CD_CURSO`) and (`t`.`serie` = `gd`.`NR_SERIE`)))) */;

--
-- Table structure for view `itensplanospagamento`
--

DROP TABLE IF EXISTS `itensplanospagamento`;
/*!50001 DROP VIEW IF EXISTS `itensplanospagamento`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `itensplanospagamento` AS select `fpi`.`CD_PLANO` AS `codigoplano`,`fp`.`CD_COLIGADA` AS `cd_coligada`,`fpi`.`NR_MES` AS `mes`,`fpi`.`NR_PARCELA` AS `parcela`,`fpi`.`VL_BRUTO` AS `valorbruto`,`fpi`.`VL_DESCONTO` AS `valordesconto`,`fpi`.`VL_EXTRA` AS `valorextra`,`fpi`.`VL_DESCONTO_EXTRA` AS `descontoextra`,`fpi`.`VL_TOTAL` AS `valortotal`,`fpi`.`NR_DIA` AS `nr_dia`,`fpi`.`NR_ANO` AS `nr_ano`,`fpi`.`NR_CREDITOS_MINIMOS` AS `nr_creditos_minimos`,(case when (`fpi`.`SN_CREDITO_PARCELA` = 1) then _latin1'S' else _latin1'N' end) AS `sn_credito_parcela`,`fpi`.`CD_TIPO_PARCELA` AS `cd_tipo_parcela`,`fpi`.`CD_PLANO_ITEM` AS `cd_item_plano` from (`fin_planos_itens` `fpi` join `fin_planos` `fp` on((`fp`.`CD_PLANO` = `fpi`.`CD_PLANO`))) */;

--
-- Table structure for view `leitora_provas_alunos_disciplinas`
--

DROP TABLE IF EXISTS `leitora_provas_alunos_disciplinas`;
/*!50001 DROP VIEW IF EXISTS `leitora_provas_alunos_disciplinas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `leitora_provas_alunos_disciplinas` AS select `leitora_provas_alunos_dis`.`cd_prova_aluno_disciplina` AS `cd_prova_aluno_disciplina`,`leitora_provas_alunos_dis`.`cd_prova_aluno` AS `cd_prova_aluno`,`leitora_provas_alunos_dis`.`cd_prova_disciplina` AS `cd_prova_disciplina`,`leitora_provas_alunos_dis`.`nr_acertos` AS `nr_acertos` from `leitora_provas_alunos_dis` */;

--
-- Table structure for view `leitora_provas_alunos_respostas`
--

DROP TABLE IF EXISTS `leitora_provas_alunos_respostas`;
/*!50001 DROP VIEW IF EXISTS `leitora_provas_alunos_respostas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `leitora_provas_alunos_respostas` AS select `leitora_provas_alunos_resp`.`cd_prova_aluno_resposta` AS `cd_prova_aluno_resposta`,`leitora_provas_alunos_resp`.`cd_prova_aluno` AS `cd_prova_aluno`,`leitora_provas_alunos_resp`.`nr_questao` AS `nr_questao`,`leitora_provas_alunos_resp`.`ds_resposta` AS `ds_resposta`,`leitora_provas_alunos_resp`.`cd_situacao` AS `cd_situacao`,`leitora_provas_alunos_resp`.`nr_correcao` AS `nr_correcao`,`leitora_provas_alunos_resp`.`db_pontuacao` AS `db_pontuacao` from `leitora_provas_alunos_resp` */;

--
-- Table structure for view `leitora_provas_alunos_respostas_situacoes`
--

DROP TABLE IF EXISTS `leitora_provas_alunos_respostas_situacoes`;
/*!50001 DROP VIEW IF EXISTS `leitora_provas_alunos_respostas_situacoes`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `leitora_provas_alunos_respostas_situacoes` AS select `leitora_provas_alunos_resp_sit`.`cd_situacao` AS `cd_situacao`,`leitora_provas_alunos_resp_sit`.`ds_situacao` AS `ds_situacao` from `leitora_provas_alunos_resp_sit` */;

--
-- Table structure for view `leitora_provas_gabaritos_respostas`
--

DROP TABLE IF EXISTS `leitora_provas_gabaritos_respostas`;
/*!50001 DROP VIEW IF EXISTS `leitora_provas_gabaritos_respostas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `leitora_provas_gabaritos_respostas` AS select `leitora_provas_gabaritos_resp`.`cd_prova_gabarito_resposta` AS `cd_prova_gabarito_resposta`,`leitora_provas_gabaritos_resp`.`cd_prova_gabarito` AS `cd_prova_gabarito`,`leitora_provas_gabaritos_resp`.`nr_alternativas` AS `nr_alternativas`,`leitora_provas_gabaritos_resp`.`nr_questao` AS `nr_questao`,`leitora_provas_gabaritos_resp`.`ds_resposta` AS `ds_resposta`,`leitora_provas_gabaritos_resp`.`cd_prova_disciplina` AS `cd_prova_disciplina`,`leitora_provas_gabaritos_resp`.`vl_peso` AS `vl_peso`,`leitora_provas_gabaritos_resp`.`cd_situacao` AS `cd_situacao`,`leitora_provas_gabaritos_resp`.`sn_discursiva` AS `sn_discursiva`,`leitora_provas_gabaritos_resp`.`sn_parcial` AS `sn_parcial` from `leitora_provas_gabaritos_resp` */;

--
-- Table structure for view `nu_modulos_matriculas_situacoes`
--

DROP TABLE IF EXISTS `nu_modulos_matriculas_situacoes`;
/*!50001 DROP VIEW IF EXISTS `nu_modulos_matriculas_situacoes`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `nu_modulos_matriculas_situacoes` AS select `nu_modulos_matriculas_sit`.`cd_modulos_matriculas_sit` AS `cd_modulos_matriculas_sit`,`nu_modulos_matriculas_sit`.`cd_modulo` AS `cd_modulo`,`nu_modulos_matriculas_sit`.`cd_situacao` AS `cd_situacao`,`nu_modulos_matriculas_sit`.`sn_aceita` AS `sn_aceita` from `nu_modulos_matriculas_sit` */;

--
-- Table structure for view `pessoas_campos_adicionais_opcoes`
--

DROP TABLE IF EXISTS `pessoas_campos_adicionais_opcoes`;
/*!50001 DROP VIEW IF EXISTS `pessoas_campos_adicionais_opcoes`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `pessoas_campos_adicionais_opcoes` AS select `pessoas_campos_adicionais_opc`.`cd_opcao` AS `cd_opcao`,`pessoas_campos_adicionais_opc`.`cd_campo` AS `cd_campo`,`pessoas_campos_adicionais_opc`.`ds_opcao` AS `ds_opcao` from `pessoas_campos_adicionais_opc` */;

--
-- Table structure for view `pint_provas_pessoas_alternativas`
--

DROP TABLE IF EXISTS `pint_provas_pessoas_alternativas`;
/*!50001 DROP VIEW IF EXISTS `pint_provas_pessoas_alternativas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `pint_provas_pessoas_alternativas` AS select `pint_provas_pessoas_alt`.`cd_prova_pessoa_alternativa` AS `cd_prova_pessoa_alternativa`,`pint_provas_pessoas_alt`.`cd_prova_pessoa_questao` AS `cd_prova_pessoa_questao`,`pint_provas_pessoas_alt`.`cd_alternativa` AS `cd_alternativa`,`pint_provas_pessoas_alt`.`nr_ordem_alternativa` AS `nr_ordem_alternativa` from `pint_provas_pessoas_alt` */;

--
-- Table structure for view `pint_provas_questoes_disciplinas`
--

DROP TABLE IF EXISTS `pint_provas_questoes_disciplinas`;
/*!50001 DROP VIEW IF EXISTS `pint_provas_questoes_disciplinas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `pint_provas_questoes_disciplinas` AS select `pint_provas_questoes_dis`.`cd_questao` AS `cd_questao`,`pint_provas_questoes_dis`.`cd_disciplina` AS `cd_disciplina`,`pint_provas_questoes_dis`.`cd_prova` AS `cd_prova`,`pint_provas_questoes_dis`.`cd_curso` AS `cd_curso`,`pint_provas_questoes_dis`.`cd_turma` AS `cd_turma`,`pint_provas_questoes_dis`.`nr_anosemestre` AS `nr_anosemestre`,`pint_provas_questoes_dis`.`sn_aprovado` AS `sn_aprovado`,`pint_provas_questoes_dis`.`sn_selecionada_primeira` AS `sn_selecionada_primeira`,`pint_provas_questoes_dis`.`sn_selecionada_segunda` AS `sn_selecionada_segunda` from `pint_provas_questoes_dis` */;

--
-- Table structure for view `planospagamento`
--

DROP TABLE IF EXISTS `planospagamento`;
/*!50001 DROP VIEW IF EXISTS `planospagamento`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `planospagamento` AS select `fp`.`CD_PLANO` AS `codigo`,`fp`.`CD_COLIGADA` AS `cd_coligada`,`fp`.`NR_ANOSEMESTRE` AS `anosemestre`,`fp`.`DS_PLANO` AS `descricao`,`fpt`.`CD_TURMA` AS `turma`,`fpt`.`CD_CURSO` AS `curso`,`fp`.`NR_PARCELAS` AS `parcelas`,`fp`.`VL_COBRADO` AS `valorcobrado`,`fp`.`VL_CONTRATO` AS `valorcontrato`,`fp`.`VL_TAXAMATERIAL` AS `taxamaterial`,`fp`.`VL_TAXAAPOSTILA` AS `taxaapostila`,`fp`.`VL_DESCONTO` AS `desconto`,`fp`.`VL_MATRICULA` AS `matricula`,`fp`.`DT_APARTIR` AS `apartir`,`fp`.`NR_TAXASMATERIAL` AS `numerotaxasmaterial`,`fp`.`DS_PARAGRAFO3` AS `paragrafo3`,`fp`.`NR_DIAS_PARCELA_ZERO` AS `nr_dias_parczero`,(case when (`fp`.`SN_DIAS_UTEIS` = 1) then _latin1'S' else _latin1'N' end) AS `sn_dias_uteis`,(case when (`fp`.`SN_CREDITOS` = 1) then _latin1'S' else _latin1'N' end) AS `sn_creditos`,`fp`.`NR_CREDITOS_BASE` AS `nr_creditos_base`,`fp`.`NR_MAX_DISCIPLINAS` AS `nr_max_disciplinas`,`fp`.`CD_TIPO_PLANO` AS `cd_tipo_plano` from (`fin_planos` `fp` join `fin_planos_turmas` `fpt` on((`fpt`.`CD_PLANO` = `fp`.`CD_PLANO`))) */;

--
-- Table structure for view `provainstitucional_anexodisciplinas`
--

DROP TABLE IF EXISTS `provainstitucional_anexodisciplinas`;
/*!50001 DROP VIEW IF EXISTS `provainstitucional_anexodisciplinas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `provainstitucional_anexodisciplinas` AS select `provainstitucional_anexosdisciplinas`.`anosemestre` AS `anosemestre`,`provainstitucional_anexosdisciplinas`.`professor` AS `professor`,`provainstitucional_anexosdisciplinas`.`disciplina` AS `disciplina`,`provainstitucional_anexosdisciplinas`.`anexo` AS `anexo` from `provainstitucional_anexosdisciplinas` */;

--
-- Table structure for view `turmas_horarios`
--

DROP TABLE IF EXISTS `turmas_horarios`;
/*!50001 DROP VIEW IF EXISTS `turmas_horarios`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `turmas_horarios` AS select `thc`.`nr_anosemestre` AS `anosemestre`,`thc`.`cd_turma` AS `turma`,`thc`.`cd_turma_base` AS `turma_base`,`thc`.`cd_disciplina` AS `disciplina`,`thc`.`cd_horario` AS `cd_horario`,`thc`.`nr_dia_semana` AS `dia_semana`,`thc`.`cd_professor` AS `cd_professor`,`thc`.`ds_legenda` AS `ds_legenda` from (`turmas_horarios_config` `thc` join `horarios` `h` on((`h`.`codigo` = `thc`.`cd_horario`))) where ((`IS_HORARIO_TURMA_ATIVA`(now(),`thc`.`dt_inicial`,`thc`.`dt_final`,`thc`.`sn_ativo`) = 1) and (`h`.`sn_ativo` = 1)) */;

--
-- Table structure for view `um_estnc_cursos`
--

DROP TABLE IF EXISTS `um_estnc_cursos`;
/*!50001 DROP VIEW IF EXISTS `um_estnc_cursos`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `um_estnc_cursos` AS select `cursos`.`CODIGO` AS `cd_curso`,`cursos`.`DESCRICAO` AS `ds_curso` from `cursos` group by `cursos`.`CODIGO`,`cursos`.`DESCRICAO` order by `cursos`.`DESCRICAO` */;

--
-- Table structure for view `um_estnc_historico`
--

DROP TABLE IF EXISTS `um_estnc_historico`;
/*!50001 DROP VIEW IF EXISTS `um_estnc_historico`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `um_estnc_historico` AS select `uni_p`.`ds_cpf` AS `ds_cpf`,`uni_d`.`descricao` AS `ds_disciplina`,`uni_g`.`NR_CH_PRATICA` AS `nr_ch_pratica`,`uni_g`.`NR_CH_TEORICA` AS `nr_ch_teorica`,`uni_f`.`serie` AS `nr_serie`,`uni_f`.`anosemestre` AS `nr_anosemestre`,`uni_f`.`frequencia` AS `nr_frequencia`,`uni_f`.`mediaFinal` AS `vl_nota`,`uni_s`.`ds_situacao` AS `ds_situacao` from ((((((`fichaindividual` `uni_f` join `pessoas` `uni_p` on((`uni_p`.`cd_pessoa` = `uni_f`.`codigoaluno`))) join `disciplinas` `uni_d` on(((`uni_d`.`codigo` = `uni_f`.`disciplina`) and (`uni_d`.`curso` = `uni_f`.`curso`)))) join `situacao` `uni_s` on((`uni_s`.`cd_situacao` = `uni_f`.`situacao`))) left join `turmas` `uni_t` on(((`uni_t`.`anosemestre` = `uni_f`.`anosemestre`) and (`uni_t`.`curso` = `uni_f`.`curso`) and (`uni_t`.`grau` = `uni_f`.`grau`) and (`uni_t`.`serie` = `uni_f`.`serie`)))) left join `gradecurricular` `uni_g` on(((`uni_g`.`ANOSEMESTRE` = `uni_f`.`anosemestre`) and (`uni_g`.`CURSO` = `uni_f`.`curso`) and (`uni_g`.`DISCIPLINA` = `uni_d`.`codigo`) and (`uni_g`.`SERIE` = `uni_f`.`serie`) and (`uni_g`.`CD_GRADE` = `uni_t`.`cd_grade`)))) left join `cursos` `uni_c` on(((`uni_f`.`curso` = `uni_c`.`CODIGO`) and (`uni_f`.`anosemestre` = `uni_c`.`ANOSEMESTRE`)))) */;

--
-- Table structure for view `um_estnc_matriculas`
--

DROP TABLE IF EXISTS `um_estnc_matriculas`;
/*!50001 DROP VIEW IF EXISTS `um_estnc_matriculas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `um_estnc_matriculas` AS select `uni_p`.`ds_cpf` AS `ds_cpf`,`uni_c`.`CODIGO` AS `cd_curso`,`uni_c`.`DESCRICAO` AS `ds_curso`,`uni_m`.`turma` AS `ds_turma`,`uni_s`.`ds_situacao` AS `ds_situacao`,`uni_m`.`anosemestre` AS `nr_anosemestre` from (((`matriculas` `uni_m` join `pessoas` `uni_p` on((`uni_m`.`codigoaluno` = `uni_p`.`cd_pessoa`))) join `cursos` `uni_c` on(((`uni_c`.`CODIGO` = `uni_m`.`curso`) and (`uni_c`.`ANOSEMESTRE` = `uni_m`.`anosemestre`)))) join `situacao` `uni_s` on((`uni_s`.`cd_situacao` = `uni_m`.`situacao`))) order by `uni_m`.`anosemestre` */;

--
-- Table structure for view `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!50001 DROP VIEW IF EXISTS `usuarios`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `usuarios` AS select `p`.`cd_usuario_pessoa` AS `cd_usuario_pessoa`,`np`.`cd_pessoa` AS `CODIGO`,(case when ((`p`.`sn_bloqueado` = 1) or (coalesce(`ngp`.`nr_permissao`,0) = 0)) then _latin1'N' else _latin1'S' end) AS `SN_ONLINE`,cast(ucase(coalesce(`p`.`ds_login`,`p`.`cd_pessoa`)) as char charset latin1) AS `NOME`,`p`.`ds_senha` AS `SENHA`,(case when ((`p`.`sn_bloqueado` = 1) or (coalesce(`ngp`.`nr_permissao`,0) = 0)) then _latin1'N' else _latin1'S' end) AS `ONLINE`,`np`.`cd_pessoa` AS `CD_PESSOA` from (((`pessoas` `p` left join `nu_grupos_pessoas` `np` on((`p`.`cd_pessoa` = `np`.`cd_pessoa`))) left join `nu_modulos_acoes` `nma` on(((`nma`.`ds_chave` = _latin1'1') and (`nma`.`cd_modulo` = (select `nu_modulos`.`cd_modulo` AS `cd_modulo` from `nu_modulos` where (`nu_modulos`.`ds_chave` = _latin1'Academico')))))) left join `nu_grupos_permissoes` `ngp` on(((`ngp`.`cd_acao` = `nma`.`cd_acao`) and (`np`.`cd_grupo` = `ngp`.`cd_grupo`)))) where (`p`.`cd_usuario_pessoa` is not null) group by `p`.`cd_pessoa` */;

--
-- Table structure for view `view_competencias`
--

DROP TABLE IF EXISTS `view_competencias`;
/*!50001 DROP VIEW IF EXISTS `view_competencias`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_competencias` AS select `m`.`codigoaluno` AS `codigoaluno`,`m`.`cd_mensalidade` AS `cd_mensalidade`,ifnull(`mo`.`cd_mensalidade`,if((`m`.`tipoparcela` = 1),`m`.`cd_mensalidade_origem`,`m`.`cd_mensalidade`)) AS `cd_mensalidade_competencia`,ifnull(ifnull(`mo`.`dt_competencia`,`mx`.`dt_competencia`),`m`.`dt_competencia`) AS `dt_competencia_origem`,if(isnull(`c`.`vl_competencia`),`m`.`valorpago`,if(((`m`.`valorbruto` + ifnull(`m`.`valorextra`,0)) > 0),((`c`.`vl_competencia` / `m`.`valorbruto`) * `m`.`valorpago`),`m`.`valorpago`)) AS `vl_pago_liquido`,if(isnull(`c`.`vl_competencia`),`m`.`descontoextra`,if(((`m`.`valorbruto` + ifnull(`m`.`valorextra`,0)) > 0),((`c`.`vl_competencia` / (`m`.`valorbruto` + ifnull(`m`.`valorextra`,0))) * `m`.`descontoextra`),`m`.`descontoextra`)) AS `vl_pago_bolsa`,if(isnull(`c`.`vl_competencia`),`m`.`valordesconto`,if(((`m`.`valorbruto` + ifnull(`m`.`valorextra`,0)) > 0),((`c`.`vl_competencia` / (`m`.`valorbruto` + ifnull(`m`.`valorextra`,0))) * `m`.`valordesconto`),`m`.`valordesconto`)) AS `vl_pago_desconto`,if(isnull(`c`.`vl_competencia`),`m`.`valorjuros`,if((`m`.`valorbruto` > 0),(((`c`.`vl_competencia` / `m`.`valorbruto`) * `m`.`valorjuros`) + ((`c`.`vl_competencia` / `m`.`valorbruto`) * ifnull(`m`.`valorextra`,0))),(`m`.`valorjuros` + ifnull(`m`.`valorextra`,0)))) AS `vl_pago_juros`,if(isnull(`c`.`vl_competencia`),((ifnull(`m`.`valorbruto`,0) + ifnull(`m`.`valorextra`,0)) - ifnull(`m`.`descontoextra`,0)),`c`.`vl_competencia`) AS `vl_cancelado`,ifnull(ifnull(`mo`.`nossonumero`,`mx`.`nossonumero`),`m`.`nossonumero`) AS `nn_origem`,ifnull(ifnull(`mo`.`cd_tipo_titulo`,`mx`.`cd_tipo_titulo`),`m`.`cd_tipo_titulo`) AS `cd_tipo_titulo_origem`,ifnull(ifnull(`mo`.`cd_coligada`,`mx`.`cd_coligada`),`m`.`cd_coligada`) AS `cd_coligada_tt_origem`,ifnull(`c`.`cd_negocia_competencia`,-(1)) AS `cd_negocia_competencia` from (((`mensalidades` `m` left join `fin_negocia_competencia` `c` on((`m`.`cd_mensalidade` = `c`.`cd_mensalidade_nova`))) left join `mensalidades` `mo` on((`c`.`cd_mensalidade` = `mo`.`cd_mensalidade`))) left join `mensalidades` `mx` on((`m`.`cd_mensalidade_origem` = `mx`.`cd_mensalidade`))) */;

--
-- Table structure for view `view_disciplinas_juntadas`
--

DROP TABLE IF EXISTS `view_disciplinas_juntadas`;
/*!50001 DROP VIEW IF EXISTS `view_disciplinas_juntadas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_disciplinas_juntadas` AS select `tp`.`anosemestre` AS `nr_anosemestre`,`tp`.`curso` AS `cd_curso`,`tp`.`codigo` AS `cd_turma`,`gc`.`DISCIPLINA` AS `cd_disciplina`,ifnull(`ax`.`nr_creditos_academicos`,`gc`.`NR_CREDITOS_ACADEMICOS`) AS `nr_creditos_academicos`,ifnull(`ax`.`nr_creditos_financeiros`,`gc`.`NUMEROAULAS`) AS `numeroaulas`,ifnull(`ax`.`vl_ch`,`gc`.`VALOR`) AS `valor` from ((`turmas` `tp` join `gradecurricular` `gc` on(((`gc`.`ANOSEMESTRE` = `tp`.`anosemestre`) and (`gc`.`CURSO` = `tp`.`curso`) and (`gc`.`TURNO` = `tp`.`turno`) and (`gc`.`CD_GRADE` = `tp`.`cd_grade`) and (`gc`.`SERIE` = `tp`.`serie`)))) left join `view_disciplinas_juntadas_aux` `ax` on(((`ax`.`cd_disciplina` = `gc`.`DISCIPLINA`) and (`ax`.`cd_turma` = `tp`.`codigo`) and (`ax`.`nr_anosemestre` = `tp`.`anosemestre`) and (`ax`.`cd_curso` = `tp`.`curso`)))) group by `tp`.`anosemestre`,`tp`.`curso`,`tp`.`codigo`,`gc`.`DISCIPLINA` */;

--
-- Table structure for view `view_disciplinas_juntadas_aux`
--

DROP TABLE IF EXISTS `view_disciplinas_juntadas_aux`;
/*!50001 DROP VIEW IF EXISTS `view_disciplinas_juntadas_aux`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_disciplinas_juntadas_aux` AS select `tt`.`anosemestre` AS `nr_anosemestre`,`da`.`cd_agrupamento` AS `cd_agrupamento`,`da`.`cd_disciplina` AS `cd_disciplina`,`tt`.`curso` AS `cd_curso`,`da`.`cd_turma` AS `cd_turma`,(max(`gt`.`NR_CREDITOS_ACADEMICOS`) / count(0)) AS `nr_creditos_academicos`,(max(`gt`.`NUMEROAULAS`) / count(0)) AS `nr_creditos_financeiros`,(max(`gt`.`VALOR`) / count(0)) AS `vl_ch` from ((((`disp_disciplina_agrupamento` `ag` join `disp_disciplinas_agrupadas` `da` on((`da`.`cd_agrupamento` = `ag`.`cd_agrupamento`))) join `disp_disciplinas_agrupadas` `dt` on((`dt`.`cd_agrupamento` = `da`.`cd_agrupamento`))) join `turmas` `tt` on(((`tt`.`anosemestre` = `ag`.`nr_anosemestre`) and (`dt`.`cd_turma` = `tt`.`codigo`)))) left join `gradecurricular` `gt` on(((`gt`.`ANOSEMESTRE` = `tt`.`anosemestre`) and (`gt`.`DISCIPLINA` = `dt`.`cd_disciplina`) and (`gt`.`CURSO` = `tt`.`curso`) and (`gt`.`TURNO` = `tt`.`turno`) and (`gt`.`CD_GRADE` = `tt`.`cd_grade`) and (`gt`.`SERIE` = `tt`.`serie`)))) group by `ag`.`nr_anosemestre`,`ag`.`cd_curso`,`da`.`cd_disciplina`,`da`.`cd_turma` */;

--
-- Table structure for view `view_eventos_carga`
--

DROP TABLE IF EXISTS `view_eventos_carga`;
/*!50001 DROP VIEW IF EXISTS `view_eventos_carga`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_eventos_carga` AS select `ti`.`CD_INSCRICAO` AS `cd_inscricao`,`ti`.`CD_PESSOA` AS `cd_pessoa`,sum(ifnull(`ta`.`nr_horas`,0)) AS `nr_horas_evento`,group_concat(_latin1'(',if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),_latin1' MENOS ',if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`),_latin1')=',time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))) separator ',') AS `formula`,round(sum(((ifnull(time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))),0) / 60) / 60)),0) AS `nr_horas_participacao`,round(((sum(((ifnull(time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))),0) / 60) / 60)) * 100) / sum(ifnull(`ta`.`nr_horas`,0))),0) AS `vl_presenca`,if((`t`.`SN_CALCULO_CARGA_HORARIA` = 2),if((((min(((ifnull(time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))),0) / 60) / 60)) * 100) / min(ifnull(`ta`.`nr_horas`,0))) < `t`.`VL_PRESENCA`),0,1),if((round(((sum(((ifnull(time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))),0) / 60) / 60)) * 100) / sum(ifnull(`ta`.`nr_horas`,0))),0) < `t`.`VL_PRESENCA`),0,1)) AS `sn_certificar`,`t`.`SN_CALCULO_CARGA_HORARIA` AS `sn_calculo_carga_horaria`,`t`.`VL_PRESENCA` AS `presenca_minima` from ((((`tam_inscricoes` `ti` join `tam_inscricoes_atividades` `tia` on((`ti`.`CD_INSCRICAO` = `tia`.`cd_inscricao`))) join `tam_atividades` `ta` on((`ta`.`cd_atividade` = `tia`.`cd_atividade`))) left join `tam_entradas` `te` on((`te`.`cd_inscricao_atividade` = `tia`.`cd_inscricao_atividade`))) join `tam_eventos` `t` on((`t`.`CD_EVENTO` = `ta`.`cd_evento`))) where (isnull(`tia`.`sn_fila`) or (`tia`.`sn_fila` = 0)) group by `tia`.`cd_inscricao` */;

--
-- Table structure for view `view_eventos_carga_atividades`
--

DROP TABLE IF EXISTS `view_eventos_carga_atividades`;
/*!50001 DROP VIEW IF EXISTS `view_eventos_carga_atividades`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_eventos_carga_atividades` AS select `ti`.`CD_INSCRICAO` AS `cd_inscricao`,`ti`.`CD_PESSOA` AS `cd_pessoa`,sum(ifnull(`ta`.`nr_horas`,0)) AS `nr_horas_evento`,round(sum(((ifnull(time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))),0) / 60) / 60)),0) AS `nr_horas_participacao`,round(((sum(((ifnull(time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))),0) / 60) / 60)) * 100) / sum(ifnull(`ta`.`nr_horas`,0))),0) AS `vl_presenca`,if((`t`.`SN_CALCULO_CARGA_HORARIA` = 2),if((((min(((ifnull(time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))),0) / 60) / 60)) * 100) / sum(ifnull(`ta`.`nr_horas`,0))) < `t`.`VL_PRESENCA`),0,1),if((round(((sum(((ifnull(time_to_sec(timediff(if(((`ta`.`hr_fim` < cast(`te`.`DT_SAIDA` as time)) and (`ta`.`hr_fim` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_fim`),`te`.`DT_SAIDA`),if(((`ta`.`hr_inicio` > cast(`te`.`DT_ENTRADA` as time)) and (`ta`.`hr_inicio` is not null)),concat(`ta`.`dt_atividade`,_latin1' ',`ta`.`hr_inicio`),`te`.`DT_ENTRADA`))),0) / 60) / 60)) * 100) / ifnull(`ta`.`nr_horas`,0)),0) < `t`.`VL_PRESENCA`),0,1)) AS `sn_certificar`,`t`.`SN_CALCULO_CARGA_HORARIA` AS `sn_calculo_carga_horaria`,`t`.`VL_PRESENCA` AS `presenca_minima`,`ta`.`cd_atividade` AS `cd_atividade` from ((((`tam_inscricoes` `ti` join `tam_inscricoes_atividades` `tia` on((`ti`.`CD_INSCRICAO` = `tia`.`cd_inscricao`))) join `tam_atividades` `ta` on((`ta`.`cd_atividade` = `tia`.`cd_atividade`))) left join `tam_entradas` `te` on((`te`.`cd_inscricao_atividade` = `tia`.`cd_inscricao_atividade`))) join `tam_eventos` `t` on((`t`.`CD_EVENTO` = `ta`.`cd_evento`))) group by `tia`.`cd_inscricao_atividade` */;

--
-- Table structure for view `view_horarios`
--

DROP TABLE IF EXISTS `view_horarios`;
/*!50001 DROP VIEW IF EXISTS `view_horarios`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_horarios` AS select `t`.`anosemestre` AS `anosemestre`,`t`.`codigo` AS `turma`,`t`.`curso` AS `curso`,`h`.`disciplina` AS `disciplina`,`h`.`dia_semana` AS `dia_semana`,`h`.`cd_horario` AS `cd_horario`,group_concat(concat(_latin1'(',`h`.`dia_semana`,_latin1'|',`h`.`cd_horario`,_latin1')') separator ',                   ') AS `CH`,group_concat(concat(`h`.`dia_semana`,_latin1'|',`ho`.`ds_horario`),_latin1'' separator ',') AS `Hor` from ((`turmas_horarios` `h` join `turmas` `t` on(((`h`.`turma` = `t`.`codigo`) and (`h`.`anosemestre` = `t`.`anosemestre`)))) join `horarios` `ho` on((`ho`.`codigo` = `h`.`cd_horario`))) group by `t`.`anosemestre`,`t`.`curso`,`h`.`disciplina` order by `t`.`codigo` */;

--
-- Table structure for view `view_pessoas_temp`
--

DROP TABLE IF EXISTS `view_pessoas_temp`;
/*!50001 DROP VIEW IF EXISTS `view_pessoas_temp`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_pessoas_temp` AS (select `pessoas`.`cd_pessoa` AS `cd_pessoa`,`pessoas`.`ds_senha` AS `ds_senha` from `pessoas` where (length(`pessoas`.`ds_senha`) < 32)) */;

--
-- Table structure for view `view_resumo_matriculas`
--

DROP TABLE IF EXISTS `view_resumo_matriculas`;
/*!50001 DROP VIEW IF EXISTS `view_resumo_matriculas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_resumo_matriculas` AS select `ma`.`anosemestre` AS `nr_anosem`,`ma`.`turma` AS `cd_turma`,`ma`.`codigoaluno` AS `cd_pessoa`,`ma`.`dataemissao` AS `dt_emissao`,`mc`.`dt_conclusao` AS `dt_conclusao`,if(isnull(`rem`.`codigoaluno`),_latin1'M',_latin1'R') AS `sn_rematri`,`ma`.`datasaida` AS `dt_saida`,`ma`.`situacao` AS `cd_situ_tur`,`mc`.`cd_situacao` AS `cd_situ_cur` from ((`matriculas` `ma` join `matriculas_curso` `mc` on(((`ma`.`codigoaluno` = `mc`.`cd_pessoa`) and (`ma`.`cd_matricula_curso` = `mc`.`cd_matricula_curso`)))) left join `matriculas` `rem` on(((`ma`.`codigoaluno` = `rem`.`codigoaluno`) and (`rem`.`anosemestre` = (`ma`.`anosemestre` - if((right(`ma`.`anosemestre`,1) = 1),9,1)))))) where (`ma`.`situacao` not in (10,8)) group by `ma`.`anosemestre`,`ma`.`turma`,`ma`.`codigoaluno` */;

--
-- Table structure for view `view_resumo_rematriculas`
--

DROP TABLE IF EXISTS `view_resumo_rematriculas`;
/*!50001 DROP VIEW IF EXISTS `view_resumo_rematriculas`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_resumo_rematriculas` AS select `ma`.`anosemestre` AS `nr_anosem`,`ma`.`turma` AS `cd_turma`,`ma`.`codigoaluno` AS `cd_pessoa`,`rem`.`dataemissao` AS `dt_emissao`,`rem`.`situacao` AS `cd_situ_tur` from ((`matriculas` `ma` join `matriculas_curso` `mc` on(((`ma`.`codigoaluno` = `mc`.`cd_pessoa`) and (`ma`.`cd_matricula_curso` = `mc`.`cd_matricula_curso`)))) left join `matriculas` `rem` on(((`ma`.`codigoaluno` = `rem`.`codigoaluno`) and (`rem`.`anosemestre` = (`ma`.`anosemestre` + if((right(`ma`.`anosemestre`,1) = 1),1,9)))))) where ((`ma`.`situacao` not in (3,4,5,6,7,8,10)) and (ifnull(`mc`.`cd_situacao`,0) <> 5)) group by `ma`.`anosemestre`,`ma`.`turma`,`ma`.`codigoaluno` */;

--
-- Table structure for view `view_saldos_faturamento`
--

DROP TABLE IF EXISTS `view_saldos_faturamento`;
/*!50001 DROP VIEW IF EXISTS `view_saldos_faturamento`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_saldos_faturamento` AS select `m`.`cd_mensalidade` AS `cd_mensalidade_competencia`,`m`.`cd_mensalidade` AS `cd_mensalidade`,`m`.`codigoaluno` AS `codigoaluno`,`m`.`dt_competencia` AS `dt_competencia`,_utf8'F' AS `cd_tipo`,(ifnull(if((`m`.`tipoparcela` = 0),(`m`.`valorbruto` + ifnull(`m`.`valorextra`,0)),if((`m`.`tipoparcela` = 4),`m`.`vl_faturamento`,0)),0) - ifnull(`m`.`descontoextra`,0)) AS `vl_base`,NULL AS `dt_base`,ifnull(if((`m`.`tipoparcela` = 0),(`m`.`valorbruto` + ifnull(`m`.`valorextra`,0)),if((`m`.`tipoparcela` = 4),`m`.`vl_faturamento`,0)),0) AS `vl_bruto`,ifnull(if((`m`.`tipoparcela` = 0),`m`.`descontoextra`,0),0) AS `vl_bolsas`,0 AS `cd_caixa_baixa` from `mensalidades` `m` where ((`m`.`situacao` <> 10) and ((`m`.`situacao` not in (4,5,8)) or (date_format(`m`.`dt_competencia`,_utf8'%y%m') < date_format(ifnull(`m`.`dt_credito`,`m`.`datapagamento`),_utf8'%y%m')) or (`m`.`tipoparcela` = 1) or (`m`.`sn_nfe_gerada` = 1)) and (`m`.`tipoparcela` <> 9)) union all select `c`.`cd_mensalidade_competencia` AS `cd_mensalidade_competencia`,`m`.`cd_mensalidade` AS `cd_mensalidade`,`m`.`codigoaluno` AS `codigoaluno`,`c`.`dt_competencia_origem` AS `dt_competencia_origem`,_utf8'R' AS `cd_tipo`,((ifnull(`c`.`vl_pago_liquido`,0) - ifnull(`c`.`vl_pago_juros`,0)) + ifnull(`c`.`vl_pago_desconto`,0)) AS `vl_base`,ifnull(`m`.`dt_credito`,`m`.`datapagamento`) AS `dt_base`,0 AS `vl_bruto`,0 AS `vl_bolsas`,ifnull(`t`.`cd_caixa`,0) AS `cd_caixa_baixa` from ((`mensalidades` `m` join `view_competencias` `c` on((`m`.`cd_mensalidade` = `c`.`cd_mensalidade`))) left join `fin_mov_tesouraria` `t` on(((`m`.`cd_mensalidade` = `t`.`cd_mensalidade`) and (`t`.`nr_estorno` = 0) and (`t`.`cd_acao` <> 18)))) where ((`m`.`situacao` in (0,1)) and (`m`.`tipoparcela` <> 9)) union all select `c`.`cd_mensalidade_competencia` AS `cd_mensalidade_competencia`,`m`.`cd_mensalidade` AS `cd_mensalidade`,`m`.`codigoaluno` AS `codigoaluno`,`c`.`dt_competencia_origem` AS `dt_competencia_origem`,if((`m`.`situacao` = 7),_utf8'D',_utf8'C') AS `cd_tipo`,ifnull(`c`.`vl_cancelado`,0) AS `vl_base`,ifnull(`m`.`dt_credito`,`m`.`datapagamento`) AS `dt_base`,0 AS `vl_bruto`,0 AS `vl_bolsas`,0 AS `cd_caixa_baixa` from (`mensalidades` `m` join `view_competencias` `c` on((`m`.`cd_mensalidade` = `c`.`cd_mensalidade`))) where ((`m`.`situacao` in (4,5,6,7,8)) and ((date_format(`c`.`dt_competencia_origem`,_utf8'%y%m') < date_format(ifnull(`m`.`dt_credito`,`m`.`datapagamento`),_utf8'%y%m')) or (`m`.`sn_nfe_gerada` = 1) or (`m`.`tipoparcela` = 1) or (`m`.`tipoparcela` = 4) or (`m`.`situacao` = 7)) and (`m`.`tipoparcela` <> 9)) */;

--
-- Table structure for view `view_tp_ativos_inativos`
--

DROP TABLE IF EXISTS `view_tp_ativos_inativos`;
/*!50001 DROP VIEW IF EXISTS `view_tp_ativos_inativos`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_tp_ativos_inativos` AS (select `turmasprofessores`.`cd_turmaprofessor` AS `cd_turmaprofessor`,`turmasprofessores`.`anosemestre` AS `anosemestre`,`turmasprofessores`.`curso` AS `curso`,`turmasprofessores`.`turma` AS `turma`,`turmasprofessores`.`disciplina` AS `disciplina`,`turmasprofessores`.`professor` AS `professor`,`turmasprofessores`.`numeroaulas` AS `numeroaulas`,`turmasprofessores`.`situacao` AS `situacao`,`turmasprofessores`.`cd_categoria` AS `cd_categoria`,`turmasprofessores`.`ds_sala` AS `ds_sala` from `turmasprofessores`) union (select `uni_turmasprofessores_inativos`.`cd_turmaprofessor` AS `cd_turmaprofessor`,`uni_turmasprofessores_inativos`.`nr_anosemestre` AS `anosemestre`,`uni_turmasprofessores_inativos`.`cd_curso` AS `curso`,`uni_turmasprofessores_inativos`.`cd_turma` AS `turma`,`uni_turmasprofessores_inativos`.`cd_disciplina` AS `disciplina`,`uni_turmasprofessores_inativos`.`cd_professor` AS `professor`,`uni_turmasprofessores_inativos`.`nr_aulas` AS `numeroaulas`,`uni_turmasprofessores_inativos`.`cd_situacao` AS `situacao`,`uni_turmasprofessores_inativos`.`cd_categoria` AS `cd_categoria`,`uni_turmasprofessores_inativos`.`ds_sala` AS `ds_sala` from `uni_turmasprofessores_inativos`) */;

--
-- Table structure for view `vwo_nfse_rps_variaveis`
--

DROP TABLE IF EXISTS `vwo_nfse_rps_variaveis`;
/*!50001 DROP VIEW IF EXISTS `vwo_nfse_rps_variaveis`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`backup`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vwo_nfse_rps_variaveis` AS (select ucase(`fin_nfse_rps_variaveis`.`nm_variavel`) AS `nm_variavel`,`fin_nfse_rps_variaveis`.`ds_valor` AS `ds_valor` from `fin_nfse_rps_variaveis`) union (select ucase(substring_index(`parametros`.`ds_variavel`,_latin1'_',-(1))) AS `nm_variavel`,`parametros`.`ds_valor` AS `ds_valor` from `parametros` where (`parametros`.`ds_variavel` in (_latin1'cliente_bairro',_latin1'cliente_cep',_latin1'cliente_cnpj',_latin1'cliente_email',_latin1'cliente_razao_social',_latin1'cliente_telefone',_latin1'cliente_uf',_latin1'cliente_nome_fantasia'))) */;

DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`backup`@`localhost`*/ /*!50003 TRIGGER `fichaindividual_before_ins_tr` BEFORE INSERT ON `fichaindividual`
FOR EACH ROW BEGIN
   DECLARE V_GRADE INTEGER(11);
   DECLARE V_SERIE SMALLINT(6);
   DECLARE V_TURNO CHAR(1);
    
   SELECT cd_grade, serie, turno
   FROM turmas
   WHERE codigo = NEW.turma AND anosemestre = NEW.anosemestre
   INTO V_GRADE, V_SERIE, V_TURNO;

   IF V_GRADE IS NOT NULL THEN
       SET NEW.codigograde = CAST(
		 	CONCAT(NEW.ANOSEMESTRE, V_GRADE, NEW.CURSO, LPAD(V_SERIE, 2, 0), V_TURNO, LPAD(NEW.DISCIPLINA, 10, 0)) AS char);
   END IF;
END*/;;
DELIMITER ;

DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`backup`@`localhost`*/ /*!50003 TRIGGER `fichaindividual_before_upd_tr` BEFORE UPDATE ON `fichaindividual`
FOR EACH ROW BEGIN
   DECLARE V_GRADE INTEGER(11);
   DECLARE V_SERIE SMALLINT(6);
   DECLARE V_TURNO CHAR(1);
    
   SELECT cd_grade, serie, turno
   FROM turmas
   WHERE codigo = NEW.turma AND anosemestre = NEW.anosemestre
   INTO V_GRADE, V_SERIE, V_TURNO;

   IF V_GRADE IS NOT NULL THEN
       SET NEW.codigograde = CAST(
		 	CONCAT(NEW.ANOSEMESTRE, V_GRADE, NEW.CURSO, LPAD(V_SERIE, 2, 0), V_TURNO, LPAD(NEW.DISCIPLINA, 10, 0)) AS char);
   END IF;
END*/;;
DELIMITER ;

DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`backup`@`localhost`*/ /*!50003 TRIGGER `fin_plano_contas_before_ins_tr` BEFORE INSERT ON `fin_config_plano_contas`
  FOR EACH ROW
BEGIN
  SET NEW.cd_class1 = MID(NEW.cd_classificacao, 1, 1);
  SET NEW.cd_class2 = MID(NEW.cd_classificacao, 3, 1);
  SET NEW.cd_class3 = MID(NEW.cd_classificacao, 5, 1);
  SET NEW.cd_class4 = MID(NEW.cd_classificacao, 7, 2);
  SET NEW.cd_class5 = MID(NEW.cd_classificacao, 10, 3);
END*/;;
DELIMITER ;

DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`backup`@`localhost`*/ /*!50003 TRIGGER `fin_plano_contas_before_upd_tr` BEFORE UPDATE ON `fin_config_plano_contas`
  FOR EACH ROW
BEGIN
  SET NEW.cd_class1 = MID(NEW.cd_classificacao, 1, 1);
  SET NEW.cd_class2 = MID(NEW.cd_classificacao, 3, 1);
  SET NEW.cd_class3 = MID(NEW.cd_classificacao, 5, 1);
  SET NEW.cd_class4 = MID(NEW.cd_classificacao, 7, 2);
  SET NEW.cd_class5 = MID(NEW.cd_classificacao, 10, 3);
END*/;;
DELIMITER ;

-- Dump completed on: Wed, 01 Oct 2014 11:29:38 -0300
