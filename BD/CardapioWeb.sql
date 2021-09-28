/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     28/09/2021 23:24:30                          */
/*==============================================================*/
drop database if exists `cardapio_web_db`;
create database if not exists `cardapio_web_db`;
use `cardapio_web_db`;

/*==============================================================*/
/* Table: categoria                                             */
/*==============================================================*/
create table categoria
(
   id                   int not null auto_increment  comment '',
   nome                 varchar(70) not null  comment '',
   primary key (id)
);

/*==============================================================*/
/* Index: index_nome_categoria                                  */
/*==============================================================*/
create unique index index_nome_categoria on categoria
(
   nome
);

/*==============================================================*/
/* Table: produto                                               */
/*==============================================================*/
create table produto
(
   id                   int not null auto_increment  comment '',
   categoria_id         int not null  comment '',
   nome                 varchar(100) not null  comment '',
   descricao            text  comment '',
   valor                decimal(18,2) not null  comment '',
   imagem               varchar(200)  comment '',
   primary key (id)
);

/*==============================================================*/
/* Index: index_nome_produro                                    */
/*==============================================================*/
create index index_nome_produro on produto
(
   nome
);

alter table produto add constraint fk_produto_reference_categori foreign key (categoria_id)
      references categoria (id) on delete restrict on update restrict;

