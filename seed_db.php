<?php

require_once 'config.php';
require_once 'lib/database.php';
require_once 'lib/user_model.php';
require_once 'lib/experience_model.php';
require_once 'views/view-loader.php';

// Check if the database is already seeded

$status = [];
$continue_seeding = true;

try {
  $connection = Database::getConnection();
  $status['database'] = 'connected';
} catch (Exception $e) {
  $status['database'] = 'Failed to connect to database';
  $continue_seeding = false;
}

if ($continue_seeding) {
  // Create the users table

  $sql = "CREATE TABLE users (
      id INT NOT NULL AUTO_INCREMENT,
      username VARCHAR(255) NOT NULL,
      password VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL,
      PRIMARY KEY (id)
    );";

  try {
    $connection->exec($sql);
  } catch (Exception $e) {
    if ($e->getCode() == '42S01') {
      $status['users table'] = 'Table already exists';
    } else {
      $status['users table'] = 'Failed to create the table.';
      $continue_seeding = false;
    }
  }
}


if ($continue_seeding) {

  // Create the experience table

  $sql = "CREATE TABLE experiences (
      id INT NOT NULL AUTO_INCREMENT,
      title VARCHAR(255) NOT NULL,
      type VARCHAR(255) NULL,
      company VARCHAR(255) NOT NULL,
      location VARCHAR(255) NULL,
      start_date DATE NOT NULL,
      end_date DATE,
      description TEXT NULL,
      PRIMARY KEY (id)
    );";

  try {
    $connection->exec($sql);
  } catch (Exception $e) {
    if ($e->getCode() == '42S01') {
      $status['experiences table'] = 'Table already exists';
    } else {
      $status['experiences table'] = 'Failed to create the table.';
      $continue_seeding = false;
    }
  }
}

if ($continue_seeding) {

  // Create the messages table

  $sql = "CREATE TABLE messages (
      id INT NOT NULL AUTO_INCREMENT,
      sender_name VARCHAR(255) NULL,
      sender_email VARCHAR(255) NULL,
      title VARCHAR(255) NOT NULL,
      body TEXT NOT NULL,
      created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (id)
    );";

  try {
    $connection->exec($sql);
  } catch (Exception $e) {
    if ($e->getCode() == '42S01') {
      $status['messages table'] = 'Table already exists';
    } else {
      $status['messages table'] = 'Failed to create the table.';
      $continue_seeding = false;
    }
  }
}


if ($continue_seeding) {

  // Create the users data

  $user = new User();
  try {
    $user->create('admin','admin','admin@admin.com');
  } catch (Exception $e) {
    if ($e->getCode() == '23000') {
      $status['admin user'] = 'User already exists';
    } else {
      $status['admin user'] = 'Failed to create the admin user.';
      $continue_seeding = false;
    }
  }
}


if ($continue_seeding) {
  
  // Create experiences data

  $experience = new Experience();
  $experience->title = 'Graphics Designer';
  $experience->type = 'Full-time';
  $experience->company = 'Fekrah Digital Printing';
  $experience->location = 'Buraydah, Saudi Arabia';
  $experience->start_date = '2016-03-01';
  $experience->end_date = '2017-03-01';

  try {
    $experience->create();
    $status['experience 1'] = 'Experience created successfully.';
  } catch (Exception $e) {
      $status['experience 1'] = 'Failed to create the experience.';
    
  }

  $experience = new Experience();
  $experience->title = 'Social Media Manager';
  $experience->type = 'Remote';
  $experience->company = 'SAFEIS';
  $experience->location = 'Riyadh, Saudi Arabia';
  $experience->start_date = '2018-06-01';
  $experience->end_date = '2019-06-01';
  $experience->description = 'Managed the social media accounts of the organization.';

  try {
    $experience->create();
    $status['experience 2'] = 'Experience created successfully.';
  } catch (Exception $e) {
      $status['experience 2'] = 'Failed to create the experience.';
    
  }

  $experience = new Experience();
  $experience->title = 'Projects Coordinator';
  $experience->type = 'Remote';
  $experience->company = 'MultiCreators';
  $experience->location = 'Riyadh, Saudi Arabia';
  $experience->start_date = '2019-06-01';
  $experience->end_date = '2020-06-01';
  $experience->description = 'Collaborated to many projects of the organization.';

  try {
    $experience->create();
    $status['experience 3'] = 'Experience created successfully.';
  } catch (Exception $e) {
      $status['experience 3'] = 'Failed to create the experience.';
    
  }

  $experience = new Experience();
  $experience->title = 'Data Scientist';
  $experience->type = 'Internship';
  $experience->company = 'MRSOOL';
  $experience->location = 'Riyadh, Saudi Arabia';
  $experience->start_date = '2022-08-01';
  $experience->end_date = '2022-10-01';
  $experience->description = 'As part of my college internship, I was trained in many data roles within MRSOOL. And I was able to work on a project that helped the company to classify orders based on their text description by building a machine learning model.';
  
  try {
    $experience->create();
    $status['experience 3'] = 'Experience created successfully.';
  } catch (Exception $e) {
      $status['experience 3'] = 'Failed to create the experience.';
    
  }

}
view('seed_db_status', ['status' => $status]);

?>


