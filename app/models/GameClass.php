<?php
/*
* Contains info about 1 h
* 
* id INT(10) unsigned NOT NULL AUTO_INCREMENT,
    court SMALLINT NOT NULL,
    status VARCHAR(16) NOT NULL,
	game_date DATE NOT NULL,
	game_num SMALLINT NOT NULL,
    discharge DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    price DECIMAL(6,2) DEFAULT '0.00',
    paid DECIMAL(6,2) DEFAULT '0.00',
    notes VARCHAR(255) DEFAULT NULL,
*
*/
class GameClass {
	//BD Fields
	public $id;
	public $court;
	public $status;
	public $game_date;
	public $game_num;
	public $discharge;
	public $price;
	public $paid;
	public $notes;
	//Extra fields
	public $hour;
	
	
	/*Constructor
	* Recibe Object stdClass
	* 
	* 
	*/	
  function __construct ($id = "", $court, $status, $game_date, $game_num, $discharge, $price, $paid, $notes) {
	//Log::info('GameClass>Constructor:',array($id, $court, $status, $game_date, $game_num, $discharge, $price, $paid, $notes));	
		$this->id = $id;
		$this->court = $court;
		$this->game_date = $game_date;
		$this->game_num = $game_num;
		$this->discharge = $discharge;
		
		if($price !== ""){ $this->price = $price; }else{ $this->price = "20"; }
		
		if($paid !== ""){ $this->paid = $paid; }else{ $this->paid = "0"; }				
		
		if($status !== ""){ $this->status = $status; }else{ $this->status = "avaliable"; }
		
		$this->notes = $notes;
		$this->hour = $this->setHourByNum($game_num);
  }
  
  
  
  public function getColor(){
	switch ($this->status) :
        case "avaliable": return 'green';
        case "complete": return 'red';
        case "3left": return 'blue';
        case "2left": return 'yellow';
        case "1left": return 'orange';
        case "academy": return 'grey';
        case "tournament": return 'violet';
        case "nondisposable": return 'black';
        
		default:
			return 'white'; //noAvaliable
    endswitch;		
  }
  
  public function canJoinGame(){
  	switch ($this->status) :
	  	case "avaliable": return true; 
	  	case "complete": return false;
	  	case "3left": return true;
	  	case "2left": return true;
	  	case "1left": return true;
	  	case "academy": return false;
	  	case "tournament": return false;
	  	case "nondisposable": return false;
  
  	default:
  		return false; //shouldt reach this
  		endswitch;
  }
  
  
  public function setHourByNum($game_num){
  	switch ($game_num) :
	  	case "0": return '08:00'; 
	  	case "1": return '09:00';
	  	case "2": return '10:00';
	  	case "3": return '11:00';
	  	case "4": return '12:00';
	  	case "5": return '13:00';
	  	case "6": return '14:00';
	  	case "7": return '15:00';
	  	case "8": return '16:00';
	  	case "9": return '17:00';
	  	case "10": return '18:00';
	  	case "11": return '19:00';
	  	case "12": return '20:00';
	  	case "13": return '21:00';
	  	case "14": return '22:00';
	  	case "15": return '23:00';
	  	case "16": return '24:00';
	  	default:
	  		return '0'; //noAvaliable
	  	endswitch;
  }
  
  
  /*
	* 
	* Return hour in format: 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 .. 21,22,23,24
	*/
  public function getHour(){
	//date("Y-m-d H:i:s");  -->  2001-03-10 17:16:18
	//2014-12-25 08:00:00
	$this->padel_time;
	
	//$dt = DateTime::CreateFromFormat("Y-m-d H:i:s", "011-07-26 20:05:00");
	$dt = DateTime::CreateFromFormat("Y-m-d H:i:s", $this->padel_time);	
	$hour = $dt->format('H'); // '07'
		
	return $hour;		
  }

  
  /*GETTER & SETTER*/
  public function getPadelId(){
	return $this->padel_id;
  }
  
  public function getcourt(){
	return $this->court;
  }
	
}
