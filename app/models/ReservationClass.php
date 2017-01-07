<?php
/*
* Contains info about 1 match
*
*/
class ReservationClass {
	public $reservation_id;
	public $game_id;
	public $id_player;
	public $bill_id;
	public $res_price;
	public $res_paid;
	public $res_status;
	public $res_notes;
	public $res_time;
	
	/*Constructor
	* Recibe Object stdClass
	* 
	*/
  function __construct ($payload) {
	//Log::info('+++ MessageClass>Constructor:',array($payload));	
	foreach($payload as $clave => $valor) {
		//Log::info('+++ PlayersClass>from_array 1:',array($valor));	
        $this->{$clave} = $valor;
	}
  }

  
  /*GETTER & SETTER*/
  public function getReservation_id(){
	return $this->reservation_id;
  }
  
  public function getGame_id(){
	return $this->game_id;
  }
  
  public function getId_player(){
	return $this->id_player;
  }
  
  public function getBill_id(){
	return $this->bill_id;
  }
  
  public function getRes_price(){
	return $this->res_price;
  }
  
  public function getRes_paid(){
	return $this->res_paid;
  }
  
  public function getRes_status(){
	return $this->res_status;
  }
  
  public function getRes_notes(){
	return $this->res_notes;
  }
  
  public function getRes_time(){
	return $this->res_time;
  }

	
}
