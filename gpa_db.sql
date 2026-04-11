CREATE DATABASE IF NOT EXISTS gpa_db;
USE gpa_db;

CREATE TABLE IF NOT EXISTS students_gpa (
  id int(11) NOT NULL AUTO_INCREMENT,
  course_name varchar(100) NOT NULL,
  credits int(11) NOT NULL,
  gpa_result decimal(5,2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
