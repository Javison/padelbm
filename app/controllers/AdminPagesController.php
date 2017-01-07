<?php

class AdminPagesController extends \BaseController {


	/**
	 * Display main admin page.
	 * 
	 * @return Response
	 */
	public function home() {
		return View::make('admin.adminhome');
	}

	/**
	 * Display messages
	 *
	 * @return Response
	 */
	public function messages() {
		//get page from url	
		$currentPage = Input::get('page','0');
		//cout(*) messages
		$totalMessages = Message::totalMessages();
		//Manages pagination view
		$paginadorCl = new PaginadorClass("admin/messages",$totalMessages, $currentPage);
		//listPart(LIMIT, OFFSET)
		$messagesCl = Message::listPart($paginadorCl->getRowsPerPage(), $paginadorCl->getFirstRowOfPage());
		//$messagesCl = Message::listAll();		
				
		return View::make('admin.messages')
			->with(compact('messagesCl'))
			->with(compact('paginadorCl'));
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
	
	/**
	 * Manages discharges for booking or tournaments/lessons
	 *
	 * @return Response
	 */
	public function discharge() {
		//return Form::fullName();
		return View::make('admin.discharge');
	}
	
	/**
	 * Manages discharges for booking or tournaments/lessons
	 *
	 * @return Response
	 */
	public function reservations() {
		//2014-12-25
		//Format: 2014-12-25 00:00:00
		$today = date("Y-m-d");//date("Ymd")=20140503		
		$dayRequest = Input::get('day',$today);
		//Get Matches for a day
		//$arrReservationClass = Reservation::getDayReservations($dayRequest);
		
		return View::make('admin.reservations');
	}
	
	

}
