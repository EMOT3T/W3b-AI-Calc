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