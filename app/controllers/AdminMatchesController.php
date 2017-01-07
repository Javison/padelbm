<?php

class AdminMatchesController extends \BaseController {

	/**
	 * Manages discharges for booking or tournaments/lessons
	 *
	 * @return Response
	 */
	public function index() {
		//2014-12-25
		//Format: 2014-12-25 00:00:00
		$today = date("Y-m-d");//date("Ymd")=20140503		
		$dayRequest = Input::get('day',$today);
		//Get Matches for a day
		//$arrPadelClass = Padel::getDayMatches($dayRequest);
		
		return View::make('admin.matches');
	}
	

	/**
	 * Display messages
	 *
	 * @return Response
	 */
	public function dayView() {
		return View::make('admin.discharge');
	}

	/**
	 * Manages Padel matches.
	 *
	 * @return Response
	 */
	public function matches() {
		//2014-12-25
		//Format: 2014-12-25 00:00:00
		$today = date("Y-m-d");//date("Ymd")=20140503		
		$dayRequest = Input::get('day',$today);
		//Get Matches for a day
		//$arrPadelClass = Padel::getDayMatches($dayRequest);
		
		return View::make('admin.matches');
	}
	
	
	
	
	

}
