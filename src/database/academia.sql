drop database if exists academia;
CREATE DATABASE ACADEMIA;
USE ACADEMIA;

CREATE TABLE cliente (
    id BIGINT AUTO_INCREMENT,
    nome VARCHAR(255),
    cpf BIGINT,
    data_nascimento DATE,
    dia_pagamento INTEGER,
    valor_mensalidade DOUBLE,
    PRIMARY KEY (id)
);
 
CREATE TABLE fornecedor (
    id BIGINT AUTO_INCREMENT,
    cnpj BIGINT,
    nome VARCHAR(255),
    PRIMARY KEY (id)
);
 
CREATE TABLE funcionario (
    id BIGINT AUTO_INCREMENT,
    cpf BIGINT,
    data_nascimento DATE,
    dia_pagamento INTEGER,
    nome VARCHAR(255),
    salario DOUBLE,
    tipo VARCHAR(255),
    PRIMARY KEY (id)
);
 
CREATE TABLE modalidade (
    id BIGINT AUTO_INCREMENT,
    nome VARCHAR(255),
    valor DOUBLE,
    PRIMARY KEY (id)
);
 
CREATE TABLE produto (
    id BIGINT AUTO_INCREMENT,
    nome VARCHAR(255),
    valor DOUBLE,
    estoque INT,
    id_fornecedor BIGINT,
    PRIMARY KEY (id)
);
 
CREATE TABLE venda (
    id BIGINT AUTO_INCREMENT,
    data_venda DATE,
    cliente_id BIGINT,
    produto BIGINT,
    quantidade INTEGER,
    total FLOAT(10 , 2 ),
    PRIMARY KEY (id)
);

CREATE TABLE itensDeVenda (
    id BIGINT AUTO_INCREMENT,
    venda_id BIGINT,
    produto_id BIGINT,
    PRIMARY KEY (id)
);
 
CREATE TABLE equipamento (
    id BIGINT AUTO_INCREMENT,
    nome VARCHAR(255),
    periodo_revisao INTEGER,
    id_fornecedor BIGINT,
    PRIMARY KEY (id)
);
 
CREATE TABLE cliente_modalidade (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    cliente BIGINT,
    modalidade BIGINT
);
 
alter table cliente_modalidade add constraint fkcliente foreign key (cliente) references cliente(id),
add constraint fkmodalidade foreign key(modalidade) references modalidade(id);
alter table equipamento add constraint FK2ye80m9og9nwbc71ayr9hidfs foreign key (id_fornecedor) references fornecedor(id);
alter table produto add constraint FK97xhfdrjyom0fwvvuvutyl8tn foreign key (id_fornecedor) references fornecedor(id);
alter table itensDeVenda add constraint FKfo53yjo27lj947nv5iqioqtlm foreign key (produto_id) references produto(id);
alter table itensDeVenda add constraint FKfo53yjo27lj947nv5iqioqtls foreign key (venda_id) references venda(id);
alter table venda add constraint FKms1fkyapk1kh2luce0k31jhoe foreign key (cliente_id) references cliente(id);


INSERT INTO MODALIDADE(NOME,VALOR)
VALUES('NATAÇÃO',90.00);
INSERT INTO MODALIDADE(NOME,VALOR)
VALUES('BOXE',125.00);
INSERT INTO MODALIDADE(NOME,VALOR)
VALUES('MUSCULAÇÃO',70.00);
INSERT INTO MODALIDADE(NOME,VALOR)
VALUES('CROSSFIT',89.99);

use academia;

drop view if exists vw_produtosFornecedores;
create view vw_produtosFornecedores as
select p.*,f.nome as 'fornecedor' from produto p inner join fornecedor f
on p.id_fornecedor=f.id;

drop view if exists vw_clientes_modalidades;
create view vw_clientes_modalidades as
select c.*,m.id as modalidade_id,m.nome as modalidade_nome,m.valor from cliente c inner join cliente_modalidade cm on
c.id=cm.cliente inner join modalidade m 
on m.id=cm.modalidade;

drop view if exists vw_equipamento_fornecedor;
create view vw_equipamento_fornecedor as
select e.*,f.nome as fornecedor from equipamento e inner join fornecedor f 
on e.id_fornecedor=f.id;

drop view if exists vw_venda_cliente;
create view vw_venda_cliente as
select v.*,c.nome from venda v inner join cliente c 
on v.cliente_id=c.id;

drop procedure if exists pd_cliente_modalidade;
delimiter $
create procedure pd_cliente_modalidade(id bigint, cliente bigint,modalidade bigint)
begin
insert into cliente_modalidade values(id,cliente,modalidade);
end
$

drop trigger if exists tg_mensalidade;
delimiter $
create trigger tg_mensalidade
after insert on cliente
for each row
begin
declare modalidade int;
if(new.valor_mensalidade=90) then
set modalidade=1;
end if;
if(new.valor_mensalidade=125)then
set modalidade=2;
end if;
if(new.valor_mensalidade=70)then
set modalidade=3;
end if;
if(new.valor_mensalidade=89.99) then
set modalidade = 4;
end if;
call pd_cliente_modalidade(null,new.id,modalidade);
end
$

/*
drop procedure if exists pd_itensDeVendas;
delimiter $
create procedure pd_itensDeVendas(venda bigint ,produto bigint,quantidade integer,total float(10,2))
begin
insert into itensDeVenda values (null,venda,produto,quantidade,total);
end $
drop trigger if exists tg_itensDeVendas;
delimiter $
create trigger tg_itensDeVendas 
after insert on Venda
for each row
begin
declare total float(10,2);
select total = p.valor*v.quantidade into total from itensDeVenda i inner join produto p
on p.id=i.produto_id inner join venda v
on v.id=i.venda_id;
call pd_itensDeVendas(new.id,new.produto,new.quantidade,total);
end $
*/

drop procedure if exists pd_itensDeVendas;
delimiter $
create procedure pd_itensDeVendas(venda bigint ,produto bigint)
begin
insert into itensdevenda values(null,venda,produto);
end $

drop trigger if exists tg_itensDeVendas;
delimiter $
create trigger tg_itensDeVendas 
after insert on Venda
for each row
begin
call pd_itensDeVendas(new.id,new.produto);
end $

#AQUI PRECISA MEXER
drop procedure if exists pd_venda;
delimiter $
create procedure pd_venda(id bigint,data_venda date, cliente_id bigint,produto bigint,quantidade int)
begin
select valor into @valor from produto
where produto.id=produto;
insert into venda(id,data_venda,cliente_id,produto,quantidade,total) values (id,data_venda,cliente_id,produto,quantidade,@valor*quantidade);
end $

drop procedure if exists pd_validar_cliente;
delimiter $
create procedure pd_validar_cliente(nome varchar(255),cpf bigint,data_nascimento date, dia_pagamento int, valor_mensalidade float(10,2))
main:begin
declare existe int;
if(CPF.length() > 11 or CPF.length() < 11) then
select 'CPF inválido' as 'Resposta';
leave main;
end if;
select count(c.cpf) into existe from cliente c 
where cpf=c.cpf;
if(existe>0) then 
select 'CPF já existente no sistema' as 'resposta';
leave main;
end if;
insert into cliente values(null,nome,cpf,data_nascimento,dia_pagamento,valor_mensalidade);
end
$

delimiter $
create trigger tg_delete_cliente
before delete on cliente
for each row
begin

delete from itensdevenda
where venda_id=(select id from venda
where cliente_id=old.id group by cliente_id);
DELETE FROM venda 
WHERE cliente_id = old.id;

delete from cliente_modalidade
where cliente=old.id;
end
$

$
create trigger tg_delete_venda
before delete on venda
for each row
begin
delete from itensdevenda
where venda_id=old.id;
end
$

insert into fornecedor values(null,12345678912312,'abelardo');
insert into produto values(null,'Anilha de 5kg',50,200,1),(null,'Barra de ferro 5kg',80,50,1);
INSERT INTO CLIENTE(id,NOME,CPF,VALOR_MENSALIDADE,DATA_NASCIMENTO,DIA_PAGAMENTO) VALUES(null,'LUIS',16564423616,90.00,'2004-08-17',10),(null,'CARLOS EDUARDO',13649862313,70,'2005-02-24',22);
INSERT INTO FUNCIONARIO(id,NOME,CPF,DATA_NASCIMENTO,DIA_PAGAMENTO,SALARIO,TIPO)VALUES(null,'DAYLER',12345678910,'1988-10-20',3,25000,'RH');
INSERT INTO FUNCIONARIO(id,NOME,CPF,DATA_NASCIMENTO,DIA_PAGAMENTO,SALARIO,TIPO)VALUES(null,'ROSINEI',12345678910,'1988-10-20',3,25000,'RH');
INSERT INTO FUNCIONARIO(id,NOME,CPF,DATA_NASCIMENTO,DIA_PAGAMENTO,SALARIO,TIPO)VALUES(null,'GEOVALIA',12345678910,'1988-10-20',3,25000,'RH');
insert into cliente values(null,'luis',16564424736,'2004-08-17',20,89.99);
insert into cliente values(null,'abelardo',12345678920,'1990-10-10',20,70.00);
insert into equipamento values(null,'Crossover',3,1);

call pd_venda(null,'2022-10-09',1,1,2);
call pd_venda(null,'2022-10-09',2,2,5);
call pd_venda(null,'2022-10-09',2,2,5);
call pd_venda(null,'2022-10-09',2,1,5);

create table administrador(
id bigint auto_increment primary key,
email varchar(255),
senha varchar(255)
);

insert into administrador values(null,'guleite3@gmail.com','guguevivi2022');



