<?php
/**
 * @author javigm
 * Obtiene informacion de BD relativa a pistas.
 * 
 * 
 */
class Games {
	
	
	/**
	 * @return Respuesta query
	 *
	 */
	public static function getGameInfoById($idGame) {
	
		Log::info("Games>getGameInfoById");
			
		//try{
		//Ejecuta Query
		$matchInfoStd = DB::select("
				SELECT * FROM game g, player p1, player p2, player p3, player p4 
				WHERE g.player_id1=p1.id AND g.player_id2=p2.id AND g.player_id3=p3.id AND g.player_id4=p4.id 
				AND g.id = ?
				", array($idGame));
			
		Log::info('Games>getGameInfoById $matchInfoStd:',array($matchInfoStd));
			
		if( count($matchInfoStd)>0 ){
	
			return $matchInfoStd;
	
		}else{
	
			return "Empty";
		}
	
		//}catch (Exception $e){
		//Log::error('ERROR Matches>dischargeCheck() Exception:',array($e->getMessage()));
		//return("KO");
		//}
	
	}
	
	
	/**
	 * @return Respuesta query
	 *
	 */
	public static function dischargeOk($dayGamesInsertArray, $dayGamesUpdateArray) {
	
		Log::info("Games>dischargeOk", array($dayGamesInsertArray, $dayGamesUpdateArray));
		
		//try{
		$resultadosInsertAr = array();
		
		$resultadosInsert = array();
		$resultadosUpdate = array();
		 
		$countInserts = 0;
		$countUpdates = 0;
		
		if(count($dayGamesInsertArray) > 0){
			
			foreach($dayGamesInsertArray as $clave => $valor ){
				
// 				Log::info("Games>dischargeOk", array($clave, $valor['game_num']));
				
				$resultadosInsert[$countInserts] = DB::insert("INSERT INTO GAME (court, game_num, status, game_date, discharge, price, paid, notes) 
					VALUES ( ?, ?, ?, ?, NOW(), ?, ?, ?)", 
						array($valor['court'], $valor['game_num'], $valor['status'], $valor['game_date'], $valor['price'], $valor['paid'], $valor['notes']));		

				$countInserts++;
				
			}			
		}
		
		if(count($dayGamesUpdateArray) > 0){
			foreach($dayGamesUpdateArray as $clave => $valor ){
			
// 				Log::info("Games>dischargeOk", array($clave, $valor['game_num']));
			
				$resultadosUpdate[$countUpdates] = DB::update("
						UPDATE game SET court=?, game_num=?, status=?, game_date=?, discharge=NOW(), price=?, paid=?, notes=? WHERE id = ?",
						array($valor['court'], $valor['game_num'], $valor['status'], $valor['game_date'], $valor['price'], $valor['paid'], $valor['notes'], $valor['id']));
			
				$countUpdates++;
			
			}
			
		}
					
		Log::info('Games>dischargeOk $resultadosInsert:',array($resultadosInsert));
		Log::info('Games>dischargeOk $resultadosUpdate:',array($resultadosUpdate));
			
		$resultsQuerys = array("Inserts" => $resultadosInsert, "Updates" => $resultadosUpdate);
		
		return $resultsQuerys;
		
// 		Log::info("Games>dischargeOk $resultsQuerys", $resultsQuerys);
	
		//}catch (Exception $e){
		//Log::error('ERROR Matches>dischargeCheck() Exception:',array($e->getMessage()));
		//return("KO");
		//}
	
	}
	
	
	/**
	 * @return Respuesta query
	 *
	 */
	public static function getGamesList($fromDateStr) {
	
		Log::info("Games>dischargeCheck");
			
		//try{
			//Ejecuta Query
			$matchesStd = DB::select("
				SELECT * FROM GAME 
				WHERE court = '1' 
				AND game_date BETWEEN ? AND ?
				ORDER BY game_num", array($fromDateStr, $fromDateStr));
			
			Log::info('Games>dischargeCheck $matchesStd:',array($matchesStd));
			
			
			if( count($matchesStd)>0 ){
				
				return $matchesStd;
				
			}else{

				return "Empty";
			}
		
		//}catch (Exception $e){
			//Log::error('ERROR Matches>dischargeCheck() Exception:',array($e->getMessage()));
			//return("KO");
		//}
	
	}
		
	
	
	
}