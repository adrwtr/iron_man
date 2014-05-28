# ordem de execução - 2

set @cd_instituicao      := 2;
set @cd_departamento     := 2;
set @cd_coligada         := 2;

select * from departamentos where codigo = @cd_departamento;

delete from departamentos where codigo = @cd_departamento;

insert into departamentos ( 
codigo,
descricao,
razaosocial,
sn_online,
cd_caixa,
cd_coligada,
cd_boleto_padrao,
sn_alterar_boleto,
ds_cnpj,
cd_boleto_online,
ds_mascara_matricula,
ds_endereco,
ds_bairro,
ds_cidade,
ds_estado,
ds_cep,
cd_instituicao
)
values
(
@cd_departamento,
'Departamento Adriano',
'Departamento Adriano',
'S',
0,
@cd_coligada,
0,
0,
'',
0,
null,
null,
null,
null,
null,
null,
@cd_instituicao
);