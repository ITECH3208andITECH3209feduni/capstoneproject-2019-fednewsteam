create schema FedNews collate latin1_swedish_ci;

create table Article
(
    id int auto_increment,
    title varchar(128) not null,
    text varchar(5000) not null,
    audience enum('public', 'student', 'staff') not null,
    author varchar(128) not null,
    reviewed enum('pending', 'reviewed', 'approved', 'rejected') default 'pending' not null,
    constraint Article_id_uindex
        unique (id)
    );

alter table Article
    add primary key (id);

create table User
(
    username varchar(128) not null
        primary key,
    password varchar(255) not null,
    permissions enum('student', 'staff', 'admin') not null
    );



INSERT INTO FedNews.User (username, password, permissions) VALUES ('30331949', '$2y$12$YoqlO07S4kO2m.4Nu0AAZuv3zKDGIJ4c2eF0T0YSdhE4leibuDf12', 'student');
INSERT INTO FedNews.User (username, password, permissions) VALUES ('30331950', '$2y$12$iCDFzj3hhA/gTP20O2UuKusrTvDM.BE9x.ogDdMVLsu6PTBqhRxhy', 'staff');
INSERT INTO FedNews.User (username, password, permissions) VALUES ('30331951', '$2y$12$gmzU6j7C8sIau.eVU5TC6OLH//GhDKKrI1.3VfexsPq9pt1SFLHz.', 'admin');

INSERT INTO FedNews.Article (id, title, text, audience, author, reviewed) VALUES (1, 'title 1', 'text 1', 'student', '30331949', 'pending');
INSERT INTO FedNews.Article (id, title, text, audience, author, reviewed) VALUES (2, 'title 2', 'text 2', 'staff', '30331949', 'pending');
INSERT INTO FedNews.Article (id, title, text, audience, author, reviewed) VALUES (3, 'title 2', 'text 2', 'public', '30331949', 'pending');
INSERT INTO FedNews.Article (id, title, text, audience, author, reviewed) VALUES (4, 'title 2', 'text 2', 'public', '30331949', 'pending');
INSERT INTO FedNews.Article (id, title, text, audience, author, reviewed) VALUES (5, 'title 2', 'text 2', 'public', '30331949', 'pending');
INSERT INTO FedNews.Article (id, title, text, audience, author, reviewed) VALUES (6, 'title 2', 'text 2', 'public', '30331949', 'pending');
INSERT INTO FedNews.Article (id, title, text, audience, author, reviewed) VALUES (7, 'asd', 'hello', 'staff', '30331949', 'pending');