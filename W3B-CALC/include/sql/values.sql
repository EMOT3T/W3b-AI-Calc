CREATE TABLE Policy (
  policyId INTEGER AUTO_INCREMENT PRIMARY KEY,
  policyName VARCHAR(15) NOT NULL,
  policyType INT NOT NULL
);

CREATE TABLE University (
  universityId INTEGER AUTO_INCREMENT PRIMARY KEY,
  universityName VARCHAR(127) NOT NULL,
  universityAddress VARCHAR(127),
  universityWebsite VARCHAR(255)
);

CREATE TABLE Users (
  userId INTEGER AUTO_INCREMENT PRIMARY KEY,
  userFullname VARCHAR(255) NOT NULL,
  userEmail VARCHAR(127) NOT NULL UNIQUE,
  userPasswordHash VARCHAR(255) NOT NULL,
  userSalt VARCHAR(128) NOT NULL,
  userRegisterDay DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  universityId INTEGER NOT NULL,
  FOREIGN KEY (universityId) REFERENCES University (universityId)
);

CREATE TABLE PolicyUsers (
  userId INTEGER,
  policyId INTEGER,
  PRIMARY KEY (userd, policyId),
  FOREIGN KEY (userId) REFERENCES Users (userId),
  FOREIGN KEY (policyId) REFERENCES Policy (policyId)
);

CREATE TABLE ValuesUser (
  valuesUserId INTEGER AUTO_INCREMENT PRIMARY KEY,
  valuesUserName VARCHAR(64) NOT NULL UNIQUE, /* Nome da matéria */
  userId INTEGER NOT NULL, <-- FOREIGN DA TABELA USERS NO BANCO USERS . VERIFICAR SE O ID DE SESSÃO EXISTE NA TABELA Users do bando USERS ANTES DE LIBERAR ACESSO AO SITE! FAZER ISSO PELA FUNÇÃO SessionVerify().
  FOREIGN KEY (userId) REFERENCES Users (userId)
);

CREATE TABLE ValuesData (
  valuesDataId INTEGER AUTO_INCREMENT PRIMARY KEY,
  valuesUserId INTEGER,
  valuesSubjectsName VARCHAR(10) NOT NULL, /* Exam or Activities or Projects */
  valuesSubjectsType INT NOT NULL, /* 7 = Exam, 8 = Activities, 9 = Projects */
  valuesData FLOAT NOT NULL,
  FOREIGN KEY (valuesUserId) REFERENCES ValuesUser (valuesUserId)
);