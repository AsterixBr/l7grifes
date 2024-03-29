delimiter ## 
drop procedure if exists iCadastro ##
create procedure iCadastro
(in nomep varchar(45), senhap varchar(45), cpfp varchar(45), dtNascp date, emailp varchar(45), out msg text)
begin
declare idp int(11) default 0;
 
select idcadastro into idp from emailp where email = emailp;
if(idp > 0)then
set msg = "Usuario já cadastrado anteriormente.";
else 
insert into cadastro values (null, nomep, senhap, cpfp, dtNascp, emailp);
set msg = "Dados cadastrados com sucesso";
select * from cadastro inner join cpf;
end if;
select msg;
end ##
delimiter ;