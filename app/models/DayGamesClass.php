<?php
/*
* Contains info about 1 day
*
*/
class DayGamesClass {

	public $games1; //array games day at field 1
	public $games2; //array games day at field 2
	public $games3; //array games day at field 3
	public $games4; //array games day at field 4
	
	
	public $dataToInsert;
	public $dataToUpdate;
	
	  
  
  public function setDataForDischarge ($matchesStd = "Empty", $fromDateStr = "") {
  	
  	$matchesArray = array();
  	 
  	if($matchesStd !== 'Empty'){
  			
  		foreach ($matchesStd as $key => $value) {
  			//Cada posicion del vector contiene la respuesta y el numero de veces que se ha dado
  			$matchesArray[$value->game_num] = new GameClass($value->id, $value->court, $value->status, $value->game_date,
  					$value->game_num, $value->discharge, $value->price, $value->paid, $value->notes);
  		}
  	
  		for ($i = 0; $i <= 16; $i++) {
  			if(!array_key_exists($i, $matchesArray)){
  				$matchesArray[$i] = new GameClass(""/*id*/, ""/*court*/, "avaliable"/*status*/, $fromDateStr/*game_date*/,
  						$i/*game_num*/, ""/*discharge*/, "20"/*price*/, "0"/*paid*/, ""/*notes*/);
  			}
  			}
  	
  		}else{
  	
  		for ($i = 0; $i <= 16; $i++) {
  			$matchesArray[$i] = new GameClass(""/*id*/, ""/*court*/, "avaliable"/*status*/, $fromDateStr/*game_date*/,
  			$i/*game_num*/, ""/*discharge*/, "20"/*price*/, "0"/*paid*/, ""/*notes*/);
  			}
  			 }
  			 
  			$this->games1 = $matchesArray;
  	
  }
  
  public function setDataForMatches ($matchesStd = "Empty", $fromDateStr = "") {
  	 
  	$matchesArray = array();
  
  	if($matchesStd !== 'Empty'){
  			
  		foreach ($matchesStd as $key => $value) {
  			//Cada posicion del vector contiene la respuesta y el numero de veces que se ha dado
  			$matchesArray[$value->game_num] = new GameClass($value->id, $value->court, $value->status, $value->game_date,
  					$value->game_num, $value->discharge, $value->price, $value->paid, $value->notes);
  		}
  		 
  		for ($i = 0; $i <= 16; $i++) {
  			if(!array_key_exists($i, $matchesArray)){
  				$matchesArray[$i] = new GameClass(""/*id*/, ""/*court*/, "nondisposable"/*status*/, $fromDateStr/*game_date*/,
  						$i/*game_num*/, ""/*discharge*/, "20"/*price*/, "0"/*paid*/, ""/*notes*/);
  			}
  		}
  		 
  	}else{
  		 
  		for ($i = 0; $i <= 16; $i++) {
  			$matchesArray[$i] = new GameClass(""/*id*/, ""/*court*/, "nondisposable"/*status*/, $fromDateStr/*game_date*/,
  					$i/*game_num*/, ""/*discharge*/, "20"/*price*/, "0"/*paid*/, ""/*notes*/);
  		}
  	}
  
  	$this->games1 = $matchesArray;
  	 
  }
  
  
  
  
  public function setDataToInsertDB ($game_idAr, $courtAr, $game_numAr, $statusAr, $game_dateAr, $priceAr, $paidAr, $dischargeAr, $notesAr) {
  	
  	$dataToInsert = array();
  	$dataToUpdate = array();
  	
  	$countInserts = 0;
  	$countUpdates = 0;
  	
  	for ($i = 0; $i <= 16; $i++) {
  		if(empty($game_idAr[$i])){
  			$dataToInsert[$countInserts] = array("court" => $courtAr[$i], "game_num" => $game_numAr[$i], "status" => $statusAr[$i], 
  					"game_date" => $game_dateAr[$i], "price" => $priceAr[$i], "paid" => $paidAr[$i], "notes" => $notesAr[$i]);
  			
  			$countInserts++;
  		}else{
  			$dataToUpdate[$countUpdates] = array("id" => $game_idAr[$i], "court" => $courtAr[$i], "game_num" => $game_numAr[$i], "status" => $statusAr[$i],
  					"game_date" => $game_dateAr[$i], "price" => $priceAr[$i], "paid" => $paidAr[$i], "notes" => $notesAr[$i]);
  				
  			$countUpdates++;
  		}
  		
  	}
  	
  	Log::info('AdminDischargeController>discharge $dataToInsert:',array($dataToInsert));
  	Log::info('AdminDischargeController>discharge $dataToUpdate:',array($dataToUpdate));
  	
  	$this->dataToInsert = $dataToInsert;
  	$this->dataToUpdate = $dataToUpdate;
  	
  	
  }
  
  
  /*
   * 
   * 0=08:00, 1=09:00, 2=10:00, 3=11:00, 4:12:00
   * 
   * 
   * */
  
  
  
  /*GETTER & SETTER*/
  public function getPadelId(){
	return $this->padel_id;
  }
  
  public function getcourt(){
	return $this->court;
  }
  
	
}
