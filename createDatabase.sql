create table Accounts(
    id_account int primary key auto_increment,
    email_adress varchar(45),
    nickname varchar(45),
    pass varchar(45),
    creation_date datetime,
    descriptions varchar(250),
    profile_picture varchar(250)
);
create table Posts(
    id_post int primary key auto_increment,
    publication_date datetime,
    author int,
    FOREIGN KEY (author) REFERENCES Accounts(id_account),
    title varchar(250),
    value_type varchar(45),
    contents varchar(1000)
);
