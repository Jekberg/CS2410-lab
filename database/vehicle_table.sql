CREATE TABLE vehicles
(
	reg_no VARCHAR(8) NOT NULL,
	category ENUM('car', 'truck') NOT NULL DEFAULT 'car',  
	brand VARCHAR(30) NULL DEFAULT '',
	description VARCHAR(256) NULL DEFAULT '',
	photo BLOB NULL,   
	daily_rate DECIMAL(6,2) NOT NULL DEFAULT 9.99,
	PRIMARY KEY (reg_no),
	INDEX (reg_no)
);

CREATE TABLE customers
(
	customer_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(30) NOT NULL DEFAULT '',
	address VARCHAR(80) NOT NULL DEFAULT '',
	phone VARCHAR(15) NOT NULL DEFAULT '',
	discount DOUBLE NOT NULL DEFAULT 0.0,
	PRIMARY KEY (customer_id),
	UNIQUE INDEX (phone),  
	INDEX (name)           
)
ENGINE=InnoDB;

CREATE TABLE rent_records
(
	rent_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	reg_no VARCHAR(8) NOT NULL,
	customer_id INT UNSIGNED  NOT NULL,
	start_date DATE NOT NULL DEFAULT '0000-00-00',
	end_date DATE NOT NULL DEFAULT '0000-00-00',
	lastUpdated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (rent_id),
	FOREIGN KEY (customer_id) REFERENCES customers (customer_id) ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY (reg_no) REFERENCES vehicles (reg_no) ON DELETE RESTRICT ON UPDATE CASCADE
)
ENGINE=InnoDB;

INSERT INTO vehicles VALUES
	('BA6611A', 'car', 'NISSAN SUNNY 1.6L', '4 Door Saloon, Automatic', NULL, 9.99),
	('SB6522B', 'car', 'TOYOTA ALTIS 1.6L', '4 Door Saloon, Automatic', NULL, 9.99),
	('SB6733C', 'car', 'HONDA CIVIC 1.8L',  '4 Door Saloon, Automatic', NULL, 11.99),
	('GA5955E', 'truck', 'NISSAN CABSTAR 3.0L',  'Lorry, Manual ', NULL, 8.99),
	('GA6666F', 'truck', 'OPEL COMBO 1.6L',  'Van, Manual', NULL, 6.99);

INSERT INTO customers VALUES
	(1001, 'John Teck', '8 Happy Ave', '88888888', 0.1),
	(NULL, 'Mohammed Ali', '10 Chester Road', '99999999', 0.15),
	(NULL, 'Kumar', '5 Serangoon Road', '55555555', 0),
	(NULL, 'Kevin Jones', '2 Sunset boulevard', '22222222', 0.2);

INSERT INTO rent_records VALUES
	(NULL, 'BA6611A', 1001, '2018-01-01', '2018-01-21', NULL),
	(NULL, 'BA6611A', 1001, '2018-02-01', '2018-02-05', NULL),
	(NULL, 'GA5955E', 1003, '2018-01-05', '2018-01-31', NULL),
	(NULL, 'GA6666F', 1004, '2018-01-20', '2018-02-20', NULL);
