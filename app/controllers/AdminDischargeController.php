<?php

class AdminDischargeController extends \BaseController {

	/**
	 * Manages discharges for booking or tournaments/lessons
	 *
	 * @return Response
	 */
	public function index() {
		return View::make('admin.discharge');
	}
	

	/**
	 * Dicharge matches step1: Check dates have no value
	 *
	 * @return Response
	 */
	public function dischargeCheck() {
		Log::info('AdminDischargeController>dischargeCheck');
		
		//Verifica formato fecha recibida fromDateTime
		if(Helper::isValidDate('Y-m-d', Input::get('fromDate'))){
			$fromDate = DateTime::createFromFormat('Y-m-d', Input::get('fromDate'));
				
		}else{
			$fromDate = new DateTime();
		}
			
		//Verifica formato fecha toDateTime
// 		if(Helper::isValidDate('Y-m-d', Input::get('toDate'))){
// 			$toDate = DateTime::createFromFormat('Y-m-d', Input::get('toDate'));
				
// 		}else{
// 			$toDate = new DateTime();
// 		}
			
		//Parsear fechas a String para query SQL
		$fromDateStr = $fromDate->format("Y-m-d");
// 		$toDateStr = $toDate->format("Y-m-d");
		
		Log::info('AdminDischargeController>dischargeCheck Fechas:',array($fromDateStr));
		
		//Obtener de BD reservas pista_1 de un dia
		$matchesStd = Games::getGamesList($fromDateStr);
		
		Log::info('AdminDischargeController>dischargeCheck $matchesStd:',array($matchesStd));
		
		if($matchesStd !== "KO"){
			$dayGamesClass = new DayGamesClass();
			$dayGamesClass->setDataForDischarge($matchesStd, $fromDateStr);
			
			return View::make('admin.discharge')
				->with('dayGamesClass', $dayGamesClass);
			
		}else{
			$message = "Se ha producido un error. Contacte con el administrador.";
				
			return View::make('admin.discharge')
			->with('message', $message);
		}		
		
	}
	
	/**
	 * Dicharge matches step1: Check dates have no value
	 *
	 * @return Response
	 */
	public function dischargeOk() {
		Log::info('AdminDischargeController>discharge Input:',array(Input::all()));	
			
		//Has values to input
		if(Input::has("game_num") && Input::has("status") && Input::has("price") && Input::has("paid") && Input::has("notes")){
			//Prepare data to insert
			$dayGamesClass = new DayGamesClass();

			//Pass values to class
			$dayGamesClass->setDataToInsertDB(Input::get("game_id"), Input::get("court"), Input::get("game_num"),Input::get("status"), Input::get("game_date"),
					Input::get("price"),Input::get("paid"), Input::get("discharge"),Input::get("notes"));
			
			$resultsQuerysArray = Games::dischargeOk($dayGamesClass->dataToInsert, $dayGamesClass->dataToUpdate);
			
			Log::info('AdminDischargeController>dischargeOk $ettype($resultsQuerysArray):',array(gettype($resultsQuerysArray)));
			
			if(gettype($resultsQuerysArray)=="array"){
				
				$resultsInsert = $resultsQuerysArray['Inserts'];
				$resultsUpdate = $resultsQuerysArray['Updates'];
				
				$numOKInserts = Helper::countValues($resultsInsert, 1);
				$numOKUpdates = Helper::countValues($resultsUpdate, 1);
				
				Log::info('AdminDischargeController>dischargeOk $$numOKInserts:',array($numOKInserts, $numOKUpdates));
				
				$messageOK = "Informacion actualizada: ".$numOKInserts."/".count($resultsInsert)." Inserts, ".$numOKUpdates."/".count($resultsUpdate)." Updates";
				
				return View::make('admin.discharge')
					->with('messageOK', $messageOK);
				
			}else{
				$messageKO = "Se ha producido un error de BD. Contacte con el administrador.";
					
				return View::make('admin.discharge')
					->with('messageKO', $messageKO);
			}
			
		}else{
			$messageKO = "No se han recibido los valores necesarios. Contacte con el administrador.";
			
			return View::make('admin.discharge')
				->with('messageKO', $messageKO);
		}
	
	}
	
	
	
	
	

}
