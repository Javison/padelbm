<?php

class MatchesController extends \BaseController {

	/**
	 * Show main view for matches
	 *
	 * @return Response
	 */
	public function index() {
		Log::info('MatchesController>index');
		
		//Verifica formato fecha recibida fromDate
		if(Helper::isValidDate('Y-m-d', Input::get('fromDate'))){
			$fromDate = DateTime::createFromFormat('Y-m-d', Input::get('fromDate'));
		
		}else{
			$fromDate = new DateTime();
		}
		
		//Parsear fechas a String para query SQL
		$fromDateStr = $fromDate->format("Y-m-d");
		
		//Obtener de BD reservas pista_1 de un dia
		$matchesStd = Games::getGamesList($fromDateStr);
		
		Log::info('MatchesController>index $matchesStd:',array($matchesStd));
		
		if($matchesStd !== "KO"){
			$dayGamesClass = new DayGamesClass();
			$dayGamesClass->setDataForMatches($matchesStd);
				
			return View::make('matches')
				->with('dayGamesClass', $dayGamesClass);
				
		}else{
			$message = "Se ha producido un error. Contacte con el administrador.";
		
			return View::make('matches')
				->with('messageKO', $message);
		}
		
		
		//TODO TRAZASSS
		Log::info('+++ PagesController>matches Auth::check():',array(Auth::check()));
		if(Auth::check()){
			Log::info('+++ PagesController>matches Auth::id():',array(Auth::id()));
			Log::info('+++ PagesController>matches Auth::user()->email:',array(Auth::user()->email));
			Log::info('+++ PagesController>matches Auth::user()->username:',array(Auth::user()->username));
			$user = Confide::user();
			$myText = print_r($user,true);
			Log::info('+++ PagesController>matches myText:',array($myText));
		}
		
	}
	
	/**
	 * Show main view for matches
	 *
	 * @return Response
	 */
	public function showGameDetails($idGame) {
		Log::info('MatchesController>index');
	
		//Check id game to prevent sql inyection
		//id_game only can be numbers
		$patron = '/^[1-9][0-9]*$/';
		if (preg_match($patron, $idGame)) {
			
			//get game with idGame
			$gameInfoStd = Games::getGameInfoById($idGame);
			
			if(gettype($gameInfoStd) == "array"){
				//$id = "", $court, $status, $game_date, $game_num, $discharge, $price, $paid, $notes
				
				$gameClass = new GameClass($gameInfoStd[0]->id, $gameInfoStd[0]->court, $gameInfoStd[0]->status, $gameInfoStd[0]->game_date, 
						$gameInfoStd[0]->game_num, $gameInfoStd[0]->discharge, $gameInfoStd[0]->price, $gameInfoStd[0]->paid, $gameInfoStd[0]->notes);
				
				$gameClass->setReservations();
					
				return View::make('match_details');
				
			}else{

				return View::make('match_details')
					->with('messageKO','Upps, couldnt find that match');				
			}
			
		} else {
			return View::make('match_details')
				->with('messageKO','Upps, couldnt find that match');
		}
	
	}
	
	
	
	

}
