create schema if not exists FedNews;

create table if not exists User (
    id int auto_increment
        primary key,
    email varchar(128) not null,
    password varchar(255) not null
    );

INSERT INTO User (email, password)
VALUES ('example@federation.edu.au', '$2y$12$L3IDNE5DS.ShSOaNamTQo.0hv9JZYyMOwyvE.jV8BUZwIGnJgny8q');