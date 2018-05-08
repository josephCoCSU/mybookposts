-- create and select the database
DROP DATABASE IF EXISTS bookpostsDB;
CREATE DATABASE bookpostsDB;
USE bookpostsDB;

-- create the tables for the database
CREATE TABLE user (
  userID            INT            NOT NULL AUTO_INCREMENT,
  username          VARCHAR(60)    NOT NULL,
  email             VARCHAR(255)   NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  avatar            VARCHAR(60)    NOT NULL,
  PRIMARY KEY (userID),
  UNIQUE INDEX emailAddress (emailAddress)
);

CREATE TABLE post {
  postID            INT             NOT NULL AUTO_INCREMENT,
  userID            INT             NOT NULL,
  content           VARCHAR(255)    NOT NULL,
  stamp             DATETIME        NOT NULL,
  PRIMARY KEY (postID)
  FOREIGN KEY (userID)
};

INSERT INTO user (userID, email, password, username) VALUES
(1,'cowley_joseph@columbusstate.edu','azure17','josephcsu');