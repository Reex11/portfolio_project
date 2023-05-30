<?php

require 'config.php';
require 'lib/database.php';
require 'lib/user_model.php';
require 'lib/experience_model.php';

$connection = Database::getConnection();

// Create the users table

$sql = "CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
  );";

$connection->exec($sql);


// Create the experience table

$sql = "CREATE TABLE experiences (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    type VARCHAR(255) NULL,
    company VARCHAR(255) NOT NULL,
    location VARCHAR(255) NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
  );";

$connection->exec($sql);

// Create the messages table

$sql = "CREATE TABLE messages (
    id INT NOT NULL AUTO_INCREMENT,
    sender_name VARCHAR(255) NULL,
    sender_email VARCHAR(255) NULL,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    PRIMARY KEY (id)
  );";

$connection->exec($sql);


// Create the users data

$user = new User();
$user->username = 'admin';
$user->password = 'admin';
$user->email = 'admin@admin.com';

$user->create();


// Create experiences data

require 'lib/experience_model.php';


$experience = new Experience();
$experience->title = 'Graphics Designer';
$experience->type = 'Full-time';
$experience->company = 'Fekrah Digital Printing';
$experience->location = 'Buraydah, Saudi Arabia';
$experience->start_date = '2016-03-01';
$experience->end_date = '2017-03-01';

$experience->create();

$experience = new Experience();
$experience->title = 'Social Media Manager';
$experience->type = 'Remote';
$experience->company = 'SAFEIS';
$experience->location = 'Riyadh, Saudi Arabia';
$experience->start_date = '2018-06-01';
$experience->end_date = '2019-06-01';
$experience->description = 'Managed the social media accounts of the organization.';

$experience->create();

$experience = new Experience();
$experience->title = 'Projects Coordinator';
$experience->type = 'Remote';
$experience->company = 'MultiCreators';
$experience->location = 'Riyadh, Saudi Arabia';
$experience->start_date = '2019-06-01';
$experience->end_date = '2020-06-01';
$experience->description = 'Collaborated to many projects of the organization.';

$experience->create();

$experience = new Experience();
$experience->title = 'Data Scientist';
$experience->type = 'Internship';
$experience->company = 'MRSOOL';
$experience->location = 'Riyadh, Saudi Arabia';
$experience->start_date = '2022-08-01';
$experience->end_date = '2022-10-01';
$experience->description = 'As part of my college internship, I was trained in many data roles within MRSOOL. And I was able to work on a project that helped the company to classify orders based on their text description by building a machine learning model.';

$experience->create();


