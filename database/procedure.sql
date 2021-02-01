use BK;
drop procedure if exists T_products;
delimiter $
create procedure T_products(in name_product varchar(50),in category varchar(50),price double)
begin

insert into products (name_product,category,price_product) values (name_product,category,price);
end $
delimiter ;
call T_products("Banana Bread","Breads",30);
call T_products("Baguette","Breads",35);
call T_products("Breadstick","Breads",35);
call T_products("Challah","Breads",40);
call T_products("Ciabatta","Breads",45);
call T_products("Whoopie Pies","Cookies",25);
call T_products("Sugar Cookies","Cookies",25);
call T_products("Molasses","Cookies",20);
call T_products("Spritz","Cookies",20);
call T_products("Pound Cake","Cakes",15);
call T_products("Red Velvet","Cakes",15);
call T_products("Carrot","Cakes",17);
call T_products("Sponge","Cakes",15);
call T_products("Genoise","Cakes",15);
call T_products("Blind baking","Pastries",16);
call T_products("Filo pastry","Pastries",16);
call T_products("Puff pastry","Pastries",20);



delimiter $
create procedure Sign_up(in name_customer varchar(50),in address varchar(50),in username varchar(50),in phone_number varchar(20),in passwordd varchar(500))
BEGIN
INSERT into register(name_customer,address,username,phone_number,passwordd)values(name_customer,address,username,phone_number,passwordd);
END $
delimiter ;

drop procedure if exists Sign_up;


delimiter $
create procedure AddtoCart(id_customer int ,id_product int,name_product varchar(50),category varchar(50),price double ,quantity int)
BEGIN
INSERT into cart (id_customer,id_product,name_product,category_product,price,quantity)
 values (id_customer,id_product,name_product,category,price,quantity);
END $
delimiter ;


delimiter $
create procedure insert_customer(customer_id int,username varchar(50))
BEGIN
insert into customer(customer_id,username)values(customer_id,username);
END $
delimiter ;

delimiter $
create procedure insert_card(customer_id int,name_card varchar(50),creadit_card varchar(50),cvv varchar(20),totalcost double)
BEGIN
insert into card(customer_id,name_card,creadit_card,cvv,totalcost)values(customer_id,name_card,creadit_card,cvv,totalcost);
END $
delimiter ;

