CREATE TABLE users (
  userid int(11) NOT NULL AUTO_INCREMENT,
  user_firstname varchar(100) NOT NULL,
  user_lastname varchar(255) NOT NULL,
  username varchar(50) NOT NULL,
  userpass text DEFAULT NULL,
  usertype enum('user','admin') NOT NULL DEFAULT 'user',
  userstatus enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (userid)
)

/* username: testuser, password: hash equals to 'test'*/
INSERT INTO users VALUES
(1, 'Test', 'User', 'testuser', '$2y$10$t362t0iKepISbsWPh7R.SeCFGZC2C9hhW1.9MbNzoHnljyuDRNt.m', 'user', 'active');

CREATE TABLE active_logins (
  login_session_id varchar(255) NOT NULL,
  userid int NOT NULL,
  login_datetime datetime NOT NULL,
  user_ip varchar(50) DEFAULT NULL,
  user_browser text DEFAULT NULL,
  PRIMARY KEY (login_session_id)
  FOREIGN KEY (userid) REFERENCES users(userid)
)

CREATE TABLE login_logs (
  login_id int NOT NULL AUTO_INCREMENT,
  userid int NOT NULL,
  login_status enum('login','logout','timeout','ajax-timeout') NOT NULL,
  login_datetime datetime NOT NULL DEFAULT current_timestamp(),
  user_ip varchar(50) DEFAULT NULL,
  user_browser text DEFAULT NULL,
  PRIMARY KEY (login_id)
  FOREIGN KEY (userid) REFERENCES users(userid)
)