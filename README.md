# Twitter Clone

## Description:

### This is a fullstack application built in the course *Desenvolvimento Web Completo* (Complete Web Development) from Udemy, taught by Jorge Santana and Jamilton Damasceno. Said course teaches PHP as the backend language and MySQL as the database.

### In this project, we went through all the main concepts for web development, having PHP as the focus, while the frontend was mainly built to be useful, with simple Bootstrap classes.

## What is it capable of?
### This application is able to do the main functions of (now X) Twitter:

***1 - user registration***
***2 - user validation***
***3 - user following***
***4 - user posting (create, delete)***
***5 - user search ***
***6 - follow/unfollow ***

### There's a TODO list for later implementations.

### The full web application is deployed for testing at:

[{not_yet_implemented}]


## Environment Setup for Development (easier way):

### having Apache and MySQL installed via XAMPP(line 50) installed, both services on the XAMPP, create the database by accessing the adress
http://localhost/phpmyadmin/index.php

### and in the SQL tab, paste the queries from lines 75-97, then execute.

## Define the PHP executable as an environment variable (as explained in the lines 52-60)

## on the terminal, navigate to the folder twitter_clone/public and execute the command: 

php -S localhost:8080

## this will allow the built-in web server from php to run. Then access the address localhost:8080 and the project should work. Note that Apache and  MySQL should be active for the project to work.

## Environment Setup for a Local Deploy:

### If you're a dev, you probably have a code editor at your disposal. This project was entirely developed on VSCode on Windows, so the setup will be described as to be done on Windows. <I plan to post Linux and Mac Configs later>>>

## Tools:
***OS: Windows***
***VSCode***
***XAMPP - my version is the v3.3.0, at [{https://www.apachefriends.org/}]***

## XAMPP installation: pretty straightforward, click on the executable, when the package selection pops up, select Apache, MySQL, PHP, PHPMyAdmin, and just keep the default paths, allow Apache to access permissions through the firewall. After the installation, make sure you START both services: Apache and MySQL on XAMPP and the ports are 80 and 443 for Apache and 3306 for MySQL.

## //as self reminder: Newer versions of PHP have built-in HTTP request server, so, in order to load the application, a new Envinronment Variable needs to be configured.

## at the Settings Menu, go to advanced settings, then select Environment Variables (Can be simplified by just typing Envi on the windows search bar from windows 7 and above), click on Path, then New, and add the PHP installation path. If the default path was kept, it should be C:\xampp\php

## With the php environment variable set, we can execute php commands via terminal. check if it worked by typing on the terminal: 

php -version

## should show you your current installed PHP version //end self reminder

# Application Setup:

## start Apache and MySQL services on the XAMPP 

## go to 

http://localhost/phpmyadmin/index.php

## Click the SQL tab, copy and paste, then execute following Query to setup the Database:

<details>
<summary>Queries for the Database</summary>

create database twitter_clone;

use twitter_clone;

create table usuarios(
	id int not null primary key AUTO_INCREMENT,
	nome varchar(100) not null,
	email varchar(150) not null,
	senha varchar(32) not null
);

create table tweets(
	id int not null PRIMARY KEY AUTO_INCREMENT,
	id_usuario int not null,
	tweet varchar(140) not null,
	data datetime default current_timestamp
);

create table usuarios_seguidores(
	id int not null primary key auto_increment,
	id_usuario int not null,
	id_usuario_seguindo int not null
);
</details>


## Open the XAMPP folder, and inside the htdocs folder, create a new folder for backup and paste all the content inside the htdocs folder inside the new folder.

## then, go to the twitter_clone/public folder, copy all files/folders (css, img, .htaccess, index) to the folder htdocs - these are the files for the users to access.

## now, in the xampp folder, at the same level as the htdocs folder, create a new folder called twitter_clone and paste all the folders (except the public folder) inside.

## adjust the paths to the vendor file in the index.php (inside htdocs) from:

require_once "../vendor/autoload.php";

## to

require_once "../twitter_clone/vendor/autoload.php";

## then: adjust the path on line 33 in the file Action.php inside the folder C:\xampp\twitter_clone\vendor\MF\Controller\Action.php from:

require_once "../App/views/". $classeAtual . "/". $this->view->page .".phtml";

## to:

require_once "../twitter_clone/App/views/". $classeAtual . "/". $this->view->page .".phtml";

## and then, adjust in the same file the paths on lines 19 and 20 to:

"../twitter_clone/App/Views/" . $layout . ".phtml"
***and***
require_once "../twitter_clone/App/Views/" . $layout . ".phtml";

## finally, open the adress localhost and the application should work.


