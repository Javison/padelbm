<?php
/**
 * @author javigm
 * Obtiene informacion de BD relativa a pistas.
 * 
 * game (
    id INT(10) unsigned NOT NULL AUTO_INCREMENT,
    court SMALLINT NOT NULL,
    status VARCHAR(16) NOT NULL,
    game_time DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    price DECIMAL(6,2) DEFAULT '0.00',
    paid DECIMAL(6,2) DEFAULT '0.00',
    notes VARCHAR(255) DEFAULT NULL,
 *
 * status -> avaliable, complete, 3left, 2left, 1left, teamleft, academy, tournament, noAvaliable
 */
class Matches {
	
	/**
	 * @return Respuesta query
	 *
	 */
	public static function dischargeCheck($fromDate, $toDate) {
	
		Log::info("Matches>dischargeCheck");
		
		/*
		 * INSERT INTO GAME (court, status, game_date, game_num, discharge, price, paid) 
			VALUES (1, 'avaliable', '2015-02-18', 1, NOW(), '0.0', '0.0')
			
			SELECT * FROM GAME 
			WHERE court = '1' 
			AND game_date BETWEEN '2015-02-18' AND '2015-02-18'
			ORDER BY game_num
		 * */
	
		try{
			//Ejecuta Query
			$matchesStd = DB::select("
				SELECT * FROM GAME 
				WHERE court = '1' 
				AND game_date BETWEEN '?' AND '?'
				ORDER BY game_num", array($fromDateStr, $toDateStr));
			
			if( count($matchesStd)>0 ){
				
				return $matchesStd;
				
			}else{

				return "Empty";
			}
		
		}catch (Exception $e){
			Log::error('ERROR Matches>dischargeCheck() Exception:',array($e->getMessage()));
			return("KO");
		}
	
	}
		
	
	/**
	 * @return Respuesta query
	 *
	 */
	public static function getRespuestasMenu($codigoMenu, $fromDateStr, $toDateStr) {
		
		Log::info("Menus>getRespuestasMenu");
		
		try{
			//Ejecuta Query
			$respuestasMenuStd = DB::select("
				SELECT EXT_DATO AS respuesta, COUNT(*) AS count FROM TBLNSVRUESTPASOS tp, TBLNSVRUDATEXTERNOS te
				WHERE tp.PAS_IDENTIFICADOR=te.EXT_IDENTIFICADOR
				AND tp.PAS_CODIGO = ?
				AND tp.PAS_FECHAINI >= ? AND tp.PAS_FECHAINI <= ?
				AND EXT_SECUENCIAL = '6'
				AND te.EXT_DATO IS NOT null
				AND ROWNUM <= 10
				GROUP BY EXT_DATO ORDER BY count DESC", array($codigoMenu, $fromDateStr, $toDateStr));
				
			return $respuestasMenuStd;
		
		}catch (Exception $e){
			Log::error('ERROR Menus>getRespuestasMenu() Exception:',array($e->getMessage()));
			return("KO");
		}
	
	}
	
	
}