CREATE TABLE users (
    id INT AUTO_INCREMENT,
    firstname TEXT,
    lastname TEXT,
    email VARCHAR(255),
    contact TEXT,
    state TEXT,
    city TEXT,
    password VARCHAR(255),
    registered_at TIMESTAMP,
    PRIMARY KEY (id)
);