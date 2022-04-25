create table teacher (
    teacherid int auto_increment primary key,
    name varchar(255) null,
    furigananame varchar(255) null,
    address varchar(255) null,
    tel int null,
    emergencycontact int null,
    age int null,
    gex int null,
    birthday date null,
    domain int not null
    deleteflg boolean notnull
);