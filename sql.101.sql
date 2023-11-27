CREATE TABLE UserProfile (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    email VARCHAR (255),
    passwordd VARCHAR (255),
    phone_number INT,
    date_create TIMESTAMP
)ENGINE = InnoDB;

CREATE Table UserContacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    email VARCHAR (255),
    describ VARCHAR (255),
    date_create TIMESTAMP,
    user_profile_id INT,
    FOREIGN KEY (user_profile_id) REFERENCES UserProfile (id)
)ENGINE = InnoDB;
