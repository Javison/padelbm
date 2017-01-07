/*
* VERSION: 1.1
*   1.1: 
*
* Script creates DB
* 7 TABLES:
*   PLAYER: Stores common web page users
*   GAME: Stores padel matches
*   RESERVATION: Stores court reservation request
*   PAYMENT: Stores payment type
*   BILL: Stores payment receipt 
*/

/* TABLE GAME  
* FIELDS: 
id, court, game_num, status, player_id1, player_id2, player_id3, player_id4, game_date, discharge, price, paid, notes
*/ 
-- INSERTS
INSERT INTO game (court, game_num, status, player_id1, player_id2, player_id3, player_id4, game_date, discharge, price, paid, notes) 
VALUES ( '1', '16', 'academy', /*player_id1*/ NULL, NULL, NULL, NULL, 
    /*game_date*/ '2015-02-25', /*discharge*/ NOW(), '20', '15', null)
   
-- UPDATES
UPDATE game 
SET court='1', game_num='12', status='avaliable', game_date='2015-02-27', discharge=NOW(), price='20.00', paid='0.00', notes='' 
WHERE id = '30'

/* PLAYER */
INSERT INTO player (player_id, nick, email, password, phone, player_level, total_games, player_created, last_login)
    VALUES (1, "Juan", "player1@dmsi.com", 'password', '12353425', '3.25', 2, Now(), Now());   

INSERT INTO player (player_id, nick, email, password, phone, player_level, player_created, last_login)
    VALUES (2, "Robert", "player2@dmskkk.com", 'password', '123343435', '2.25', Now(), Now());   


/* TABLE PAYMENT  */  
INSERT INTO payment (payment_id, payment_name, payment_description, payment_details)
    VALUES (1, 'Transfer', 'Transfer to bank account', '1234235463423452345');   
    
INSERT INTO payment (payment_id, payment_name, payment_description, payment_details)
    VALUES (2, 'Desk', 'Paid on reception desk', '');   


/* TABLE BILL */
INSERT INTO bill (bill_id, player_id, bill_ref, bill_date, payment_id, bill_state, total_price)
    VALUES (1, 1, 'AA29-JSD23-20140411', Now(), 1, 'closed', '23.55'); 
    
INSERT INTO bill (bill_id, player_id, bill_ref, bill_date, payment_id, bill_state, total_price)
    VALUES (2, 1, 'AA29-JSD23-20140412', Now(), 2, 'closed', '20.00'); 
   

/* TABLE RESERVATION */ 
INSERT INTO reservation (reservation_id, game_id, player_id, bill_id, res_price, res_paid, res_status, res_time)
    VALUES (1, 1, 1, '5.0', '5.0', '', Now());  
 
INSERT INTO reservation (reservation_id, game_id, player_id, bill_id, res_price, res_paid, res_status, res_time)
    VALUES (2, 1, 'password', 'orlator@hotmail.es', 1, Now(), Now());   
 

/*
* FREQUENT QUERYS
*
*/

/* GAME */

SELECT * FROM GAME 
WHERE court = '1' 
AND game_date BETWEEN '2015-02-18' AND '2015-02-18'
ORDER BY game_num



 
/* MOST FREQUENT QUERYS */
-- BOOKING SUMMARY
SELECT p.COURT, p.GAME_TIME, p.STATE FROM padel p
WHERE p.GAME_TIME BETWEEN '2014-12-25 00:00:00' AND '2014-12-25 23:59:59'
GROUP BY COURT, GAME_TIME

-- SELECT PLAYER DETAILS
SELECT NICK, EMAIL, PHONE, PLAYER_LEVEL, TOTAL_GAMES FROM PLAYER 
WHERE EMAIL = $email
AND PASSWORD = $email

-- SELECT 10 PLAYERS WITH MORE MATCHES
SELECT NICK, PLAYER_LEVEL, TOTAL_GAMES
FROM   PLAYER
ORDER BY TOTAL_GAMES DESC
LIMIT 10;

-- SELECT RESERVATIONS FOR PLAYER ORDER BY DATE

-- SELECT ALL RESERVATIONS TO SHOW ON HOME
SELECT * FROM padel p
WHERE p.padel_time BETWEEN '2014-12-25 00:00:00' AND '2014-12-25 23:59:59'
GROUP BY court, padel_time

SELECT * FROM padel p
WHERE p.padel_time BETWEEN '2014-12-25 00:00:00' AND '2014-12-25 23:59:59'
ORDER BY p.padel_time ASC

-- SELECT * INFO ABOUT A MATCH
SELECT * FROM padel p WHERE p.padel_id = '23423'

SELECT * FROM reservation r WHERE r.game_id = '23423'

SELECT * FROM player WHERE id_player = ''

-- ??????????
SELECT * FROM padel pa, reservation re, player pl
WHERE pa.padel_id=re.game_id AND pl.player_id=re.game_id
AND pa.padel_id = '23423'

--SELECT MATCH PLAYERS
SELECT * FROM padel p, reservation r 
WHERE p.padel_id=r.game_id
AND p.padel_id = '23423'
