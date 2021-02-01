create database BK;
use BK;

create table register(id  int not null auto_increment  ,primary key(id),name_customer varchar(50),address varchar(50),username varchar(50),phone_number varchar(20),passwordd varchar(500));
create table customer(customer_id int,username varchar(50),foreign key (customer_id) REFERENCES register(id));
create table products(id int not null auto_increment,primary key(id),name_product varchar(50),category varchar(50),price_product double);
create table cart(id_customer int,foreign key (id_customer) REFERENCES register(id),
id_product int,name_product varchar(50),category_product varchar(50),foreign key (id_product)REFERENCES products(id),
price double, quantity int,totalcost double);
create table card(customer_id int,foreign key (customer_id) REFERENCES register(id),
name_card varchar(50),creadit_card varchar(50),cvv varchar(20),totalcost double);

drop table register;
drop table customer;
drop table products;
drop table card;
delete from card;
select *from customer;
select *from cart;
select *from register;
delete from register;
