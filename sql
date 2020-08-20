CREATE TABLE departments(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    short_code varchar(255),
    code varchar(255),
);

CREATE TABLE student(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    dob MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
    department_id int,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);

CREATE TABLE users(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    lastname varchar(255),
    firstname varchar(255),
    description MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
    age int,
    department_id int,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);
