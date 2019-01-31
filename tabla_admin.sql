create table admin
(id integer(11),
 username char(50),
 passcode char(50),
 primary key(id,username));
 insert into admin(id,username,passcode) select (customerNumber,trim(substring(customerName,1,8)),contactLastName);
 
 