
create table account(
	id int auto_increment primary key, 
	name varchar(200) not null, 
	password int not null,
        delete_flg = 0 not null
);

insert into account values(1, '佐藤一郎', 'aaaaa');
insert into account values(2, '佐藤二郎', 'bbbbb');
insert into account values(3, '佐藤三郎', 'ccccc');
insert into account values(4, '佐藤一郎', 'ddddd');
insert into account values(5, '佐藤五郎', 'eeeee');
insert into account values(6, '佐藤3郎',  'fffff');
