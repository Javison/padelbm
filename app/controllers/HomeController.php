<?php

class HomeController extends \BaseController {

	/**
	 * Show main view for matches
	 *
	 * @return Response
	 */
	public function index() {
		Log::info('HomeController>index');
			
		
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
		
		return View::make('home');
		
	}
		

}
