# About
NYU class project re-creating the 2xl robot game from the 1970s and 1980s.  This has the same functionality of asking questions and getting different paths for your question/answer but with a modern twist allowing it to be played online.  Below is how the database is set up:

DROP TABLE IF EXISTS questions_8track, users_teams, game_logs, questions, 8track, users, teams, topic;
CREATE TABLE topic (
	topic_id INT(11) NOT NULL AUTO_INCREMENT,
	topic_name VARCHAR(90) DEFAULT NULL,
	PRIMARY KEY (topic_id)
);
CREATE TABLE users (
	user_id INT(11) NOT NULL AUTO_INCREMENT,
	username VARCHAR(30) DEFAULT NULL,
	password VARCHAR(30) DEFAULT NULL,
	creditcard_number BIGINT(20) DEFAULT NULL,
	creditcard_expiration VARCHAR(6) DEFAULT NULL,
	creditcard_cvv INT(11) DEFAULT NULL,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (user_id)
);
CREATE TABLE teams (
	team_id int(11) NOT NULL AUTO_INCREMENT,
	team_name VARCHAR(30) DEFAULT NULL,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (team_id)
);
CREATE TABLE questions (
	question_id INT(11) NOT NULL AUTO_INCREMENT,
	topic_id INT(11) DEFAULT NULL,
	question VARCHAR(200) DEFAULT NULL,
	option_A VARCHAR(200) DEFAULT NULL,
	option_B VARCHAR(200) DEFAULT NULL,
	option_C VARCHAR(200) DEFAULT NULL,
	answer ENUM('A','B','C') DEFAULT NULL,
	hint VARCHAR(200) DEFAULT NULL,
	PRIMARY KEY (question_id),
	FOREIGN KEY (topic_id) REFERENCES topic(topic_id)
);
CREATE TABLE 8track (
	cartridge_id INT(11) NOT NULL AUTO_INCREMENT,
	title VARCHAR(60) DEFAULT NULL,
	topic_id INT(11) DEFAULT NULL,
	author INT(11) DEFAULT NULL,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (cartridge_id),
	FOREIGN KEY (topic_id) REFERENCES topic(topic_id),
	FOREIGN KEY (author) REFERENCES users(user_id)
);
CREATE TABLE game_logs (
	log_id int(11) NOT NULL AUTO_INCREMENT,
	cartridge_id INT(11) DEFAULT NULL,
	user_id int(11) DEFAULT NULL,
	team_id int(11) DEFAULT NULL,
	score INT(11) NOT NULL DEFAULT 0,
	progress INT(11) NOT NULL DEFAULT 0,
	last_answer TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    time_started TIMESTAMP NOT NULL,
	PRIMARY KEY (log_id),
	FOREIGN KEY (cartridge_id) REFERENCES 8track(cartridge_id),
	FOREIGN KEY (user_id) REFERENCES users(user_id),
	FOREIGN KEY (team_id) REFERENCES teams(team_id)
);
CREATE TABLE users_teams (
	id INT(11) NOT NULL AUTO_INCREMENT,
	user_id INT(11) DEFAULT NULL,
	team_id INT(11) DEFAULT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES users(user_id),
	FOREIGN KEY (team_id) REFERENCES teams(team_id)
);
CREATE TABLE questions_8track (
	id INT(11) NOT NULL AUTO_INCREMENT,
	cartridge_id INT(11) DEFAULT NULL,
	question_id INT(11) DEFAULT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (cartridge_id) REFERENCES 8track(cartridge_id),
	FOREIGN KEY (question_id) REFERENCES questions(question_id)
);

insert into topic (topic_name) values ('Science');
insert into topic (topic_name) values ('History');
insert into topic (topic_name) values ('Math');
insert into topic (topic_name) values ('mysql');
insert into topic (topic_name) values ('Music');
insert into topic (topic_name) values ('Cooking');
insert into users (username, password, creditcard_number, creditcard_expiration, creditcard_cvv) values ('paulacquaro','professor','4567456745674567','122025','932');
insert into users (username, password, creditcard_number, creditcard_expiration, creditcard_cvv) values ('dylanoldham','guitar','1234123412341234','072021','403');
insert into users (username, password, creditcard_number, creditcard_expiration, creditcard_cvv) values ('luciancooper','moocow','1294129412941294','032020','293');
insert into users (username, password, creditcard_number, creditcard_expiration, creditcard_cvv) values ('gavinokray','chromebook','9123912391239123','082018','392');
insert into teams (team_name) values ('group project');
insert into teams (team_name) values ('team rocket');
insert into users_teams (user_id,team_id) values ('2','1');
insert into users_teams (user_id,team_id) values ('3','1');
insert into users_teams (user_id,team_id) values ('4','1');
insert into users_teams (user_id,team_id) values ('1','2');
insert into users_teams (user_id,team_id) values ('2','2');
insert into users_teams (user_id,team_id) values ('3','2');
insert into users_teams (user_id,team_id) values ('4','2');
insert into questions (topic_id,question,option_A,option_B,option_C,answer,hint) values ('1','What color is the sky?','Red','Green','Blue','C','Go outside and look up!');
insert into questions (topic_id,question,option_A,option_B,option_C,answer,hint) values ('3','What is 2+2','4','12','-3','A','Add them together!');
insert into 8track (title,topic_id) values ('Cool Math','3');
insert into 8track (title,topic_id) values ('Interesting Science','1');
insert into 8track (title,topic_id) values ('Fun History','2');
insert into 8track (title,topic_id,author) values ("Professor Acquaro's SQL Quiz",'4','1');
insert into 8track (title,topic_id,author) values ("Dylan's Guitar Test",'5','2');
insert into 8track (title,topic_id,author) values ("Gavin's Cooking Conundrum",'6','4');
insert into questions_8track (cartridge_id,question_id) values ('2','1');
insert into questions_8track (cartridge_id,question_id) values ('1','2');
