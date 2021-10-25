
CREATE DATABASE IS NOT EXISTS stage2;

CREATE TABLE users(
	users_id INT PRIMARY KEY UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
	name VARCHAR(80) COLLATE Utf8_general_ci NULL, 
	surname VARCHAR(80) COLLATE Utf8_general_ci NULL,
	email VARCHAR(80) COLLATE Utf8_general_ci NULL,
	phone VARCHAR(80) Utf8_general_ci NULL,
	password VARCHAR(80)Utf8_general_ci NULL,
)ENGINE=INNODB;

CREATE TABLE posts (
	id INT PRIMARY KEY UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
	title VARCHAR(200) COLLATE Utf8_general_ci NOT NULL,
	date DATE NOT NULL,
	content TEXT COLLATE Utf8_general_ci NOT NULL,
	autor_id INT UNSIGNED NOT NULL,
	tag VARCHAR(30) Utf8_general_ci NOT NULL,
	CREATE INDEX `autor_id` ON posts(autor_id),
	CONSTRAINT `posts_ibfk_1`
	FOREIGN KEY (autor_id) 
	REFERENCES users(users_id) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=INNODB;

 
