use BK;
delimiter $
create trigger TotalCost_Each_Product
before insert on cart 
for each row
begin
set new.totalcost=new.quantity * new.price;
end $
delimiter ;
drop trigger if exists TotalCost_Each_Product;

delimiter $
create function TotalCost(id int)
returns double
deterministic
BEGIN
return (SELECT sum(totalcost) from cart where id_customer=id);
end  $

delimiter ;


