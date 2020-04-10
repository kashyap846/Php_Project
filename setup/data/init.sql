USE MyDB;

CREATE TABLE authors (
email VARCHAR(128) NOT NULL PRIMARY KEY,
hash_password VARCHAR(255) NOT NULL,
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
biography TEXT NOT NULL,
create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
last_login_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO authors (email, hash_password, first_name, last_name, biography) VALUES ("kashyap846@gmail.com","$2y$10$G5dFib4AHX37bWzsrfvEI.CYqfAtQkhRQlF0wAywPxTAg8xQmvcTW","kashyap","KK","Professor");