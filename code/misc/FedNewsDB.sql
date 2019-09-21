create schema FedNews collate latin1_swedish_ci;

create table User (
    username varchar(128) not null
        primary key,
    password varchar(255) not null,
    permissions enum ('student', 'staff', 'admin') not null
    );

INSERT INTO FedNews.User (username, password, permissions)
VALUES ('30331949', '$2y$12$YoqlO07S4kO2m.4Nu0AAZuv3zKDGIJ4c2eF0T0YSdhE4leibuDf12', 'student');
INSERT INTO FedNews.User (username, password, permissions)
VALUES ('30331950', '$2y$12$iCDFzj3hhA/gTP20O2UuKusrTvDM.BE9x.ogDdMVLsu6PTBqhRxhy', 'staff');
INSERT INTO FedNews.User (username, password, permissions)
VALUES ('30331951', '$2y$12$gmzU6j7C8sIau.eVU5TC6OLH//GhDKKrI1.3VfexsPq9pt1SFLHz.', 'admin');