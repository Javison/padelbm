/*
* VERSION: 2.0
*   1.1: 
*   1.2: Correct nomenclature. Change 'reservation'-'game' relation. Engine MyISAM
*   1.3: table padel. Field mail_list
*   1.4: player_image -> field image(64)
*   1.5: Change padelStatus varchar size. Added pade match & reservation note field. xxx_id
*   1.6: replied field
*   1.7: Simplified table padel (delete reservation_id*4). Field res_summary
*   2.0: Delete user, messages. New fields player and game
*
* Script creates DB
* 7 TABLES:
*   PLAYER: Stores common web page users
*   GAME: Stores padel matches
*   RESERVATION: Stores court reservation request
*   PAYMENT: Stores payment type
*   BILL: Stores payment receipt 
*/

/*
--Create and select new database
CREATE DATABASE IF NOT EXISTS wepadeldb;
USE wepadeldb;
*/

/*
* PLAYER: Save web users.
    Quizás necesario crear entrada o tabla remember_token o reminder
    Y cambiar 2 por created_at y updated_at
*/
CREATE TABLE IF NOT EXISTS player (
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    nick VARCHAR(32) DEFAULT NULL,
    email VARCHAR(64) NOT NULL,
    password VARCHAR(64) NOT NULL,
    phone VARCHAR(16) DEFAULT NULL,
    player_level DECIMAL(3,2) DEFAULT NULL,
    total_games INT(10) UNSIGNED DEFAULT '0',
    player_image VARCHAR(64) NOT NULL,
    mail_list SMALLINT DEFAULT '0',
    player_created TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    last_login TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    last_match TIMESTAMP DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


/*
* GAME: Save game reservation.
*   status -> avaliable, complete, 3left, 2left, 1left, academy, tournament, nondisposable
*   game_num -> Numero segun hora. 08:00 = 1, 09:00 = 2, 
*/
CREATE TABLE IF NOT EXISTS game (
    id INT(10) unsigned NOT NULL AUTO_INCREMENT,
    court SMALLINT NOT NULL,
	game_num SMALLINT NOT NULL, 
    status VARCHAR(16) NOT NULL,
	player_id1 INT(10) UNSIGNED,
	player_id2 INT(10) UNSIGNED,
	player_id3 INT(10) UNSIGNED,
	player_id4 INT(10) UNSIGNED,
	game_date DATE NOT NULL, /* 'YYYY-MM-DD' */	
    discharge DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    price DECIMAL(6,2) DEFAULT '0.00',
    paid DECIMAL(6,2) DEFAULT '0.00',
    notes VARCHAR(255) DEFAULT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*
* RESERVATION: Relation player-game
* PADEL res_summary in padel : downLeft, downRight, upRight, upLeft
*/
CREATE TABLE IF NOT EXISTS reservation (
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    game_id INT(10) UNSIGNED NOT NULL,
    id_player INT(10) UNSIGNED NOT NULL,
    res_summary VARCHAR(255) DEFAULT NULL,
    bill_id INT(10) DEFAULT NULL,
    res_price DECIMAL(6,2) DEFAULT '0.00',
    res_paid DECIMAL(6,2) DEFAULT '0.00',
    res_status VARCHAR(8) NOT NULL,
    res_notes VARCHAR(255) DEFAULT NULL,
    res_time DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*
* PAYMENT: Stores the different payment methods and their characteristics.
*/
CREATE TABLE IF NOT EXISTS  payment (
    id SMALLINT UNSIGNED NOT NULL auto_increment,
    name VARCHAR(20) NOT NULL default '',
    description VARCHAR(128) NOT NULL default '',
    details VARCHAR(64) NOT NULL default '',
PRIMARY KEY  (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*
* TABLE_BILL: Stores the group of orders placed by the user.
*   BILL_STATE -> 'new', 'paid', 'closed','cancel'
*/
CREATE TABLE IF NOT EXISTS  bill (
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    player_id INT(10) UNSIGNED NOT NULL,
    payment_id SMALLINT UNSIGNED NOT NULL default '0',
    reference VARCHAR(40) DEFAULT NULL,
    bill_date TIMESTAMP NOT NULL default '0000-00-00 00:00:00',
    bill_state VARCHAR(10) NOT NULL default 'new',
    total_price DECIMAL(9,2) NOT NULL default '0.00',
PRIMARY KEY  (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;   







