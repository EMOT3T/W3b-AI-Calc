/* CRIAR UM BANCO APENAS PARA O LOGIN, OU SEJA, ISOLAR A ÁREA DE LOGIN E ISOLAR AS DE NOTAS */
/* ADICIONAAR UMA TABELA PARA UNIVERSIDADES E ESCOLAR E RELACIONAR COM USERS! */
CREATE TABLE Policy (
  policy_id INTEGER AUTO_INCREMENT,
  policy_name VARCHAR(45) NOT NULL,
  policy_type INT NOT NULL,
  PRIMARY KEY (policy_id)
);

CREATE TABLE Users (
  user_id INTEGER AUTO_INCREMENT,
  user_fullname VARCHAR(255) NOT NULL,
  user_email VARCHAR(128) NOT NULL,
  user_password_hash VARCHAR(60) NOT NULL,
  user_salt VARCHAR(128) NOT NULL,
  user_register_day TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (user_id)
);

CREATE TABLE PolicyUsers (
  user_id INTEGER,
  policy_id INTEGER,
  PRIMARY KEY (user_id, policy_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (policy_id) REFERENCES Policy(policy_id)
);

CREATE TABLE TestValues (
  test_id INTEGER AUTO_INCREMENT,
  test_value_0 FLOAT NOT NULL,
  test_value_1 FLOAT,
  test_value_2 FLOAT,
  test_weight FLOAT NOT NULL,
  PRIMARY KEY (test_id)
);

CREATE TABLE Activities (
  activity_id INTEGER AUTO_INCREMENT,
  activity_value_0 FLOAT NOT NULL,
  activity_value_1 FLOAT,
  activity_value_2 FLOAT,
  activity_value_3 FLOAT,
  activity_value_4 FLOAT,
  activity_value_5 FLOAT,
  activity_value_6 FLOAT,
  activity_value_7 FLOAT,
  activity_value_8 FLOAT,
  activity_value_9 FLOAT,
  activity_weight FLOAT NOT NULL,
  PRIMARY KEY (activity_id)
);

CREATE TABLE Presentations (
  presentation_id INTEGER AUTO_INCREMENT,
  presentation_value_0 FLOAT NOT NULL,
  presentation_value_1 FLOAT,
  presentation_value_2 FLOAT,
  presentation_value_3 FLOAT,
  presentation_value_4 FLOAT,
  presentation_value_5 FLOAT,
  presentation_value_6 FLOAT,
  presentation_weight FLOAT NOT NULL,
  PRIMARY KEY (presentation_id)
);

CREATE TABLE Courses (
  course_id INTEGER AUTO_INCREMENT,
  course_name VARCHAR(128) NOT NULL,
  user_id INTEGER,
  test_id INTEGER,
  activity_id INTEGER,
  presentation_id INTEGER,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (test_id) REFERENCES TestValues(test_id),
  FOREIGN KEY (activity_id) REFERENCES Activities(activity_id),
  FOREIGN KEY (presentation_id) REFERENCES Presentations(presentation_id)
);