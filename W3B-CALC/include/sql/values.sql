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