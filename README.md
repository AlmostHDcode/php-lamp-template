## PHP Full Stack LAMP Template Project

* Simple Template to help you get started with a fullstack php application
* Created using PHP, Mysql, JQuery, Bootstrap

### Project Structure
* conn -> connection string to mysql
* login -> login page, login checking and authentication logic, logout
* page-assets -> holds file used to init page, html ,head, body creation, js scripts, plugins links
* src -> the web root, holds all php pages
  * public -> public images, favicon
  * plugins - external files or libraries used
  * styles -> css files
* env.php -> holds definitions for constants, mysql db connection info
* template.php -> sample template file that shows how to setup each page
* db-sql-example.sql -> sample sql to help setup user table, login logs table, active logins table

### How to Setup
* requires a mysql database
* edit the env.php file
  * Update the SITE_NAME, BASE_DIR
  * Update the putenv lines that hold mysql db info for hostname, username, password, db name
* Update the require_once() line at the beginning of each new page to link to your env.php file
* Update Time Zone in conn.php page

### Features
* Login Authentication system
* Pages can be set to be open to all users, or admin only
* Sweetalert2 used to create alerts and modals
* Pace Loading bar
* Loading Screen when ajax call is made
* Sidebar with animated folding and opening submenus
* User can dynamically add additional js scripts or styles to any page
* Automatic Logout after being idle for a cetain amount of time
* Secure session management and regeneration
* Keep track of active login sessions, and save records of past logins

### Screenshots

![image](https://github.com/user-attachments/assets/5aa5f0da-cfac-4cd3-84c0-bbc2b1f688a3)

![image](https://github.com/user-attachments/assets/acd53740-368e-4395-8d46-c20d0043921a)

![image](https://github.com/user-attachments/assets/491f7e2a-f20a-468a-9292-c74e77304414)

![image](https://github.com/user-attachments/assets/4ef4903f-415d-4e45-b032-b887d93114e4)
