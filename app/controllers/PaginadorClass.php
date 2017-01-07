<?php

class PaginadorClass {
	private $rowsPerPage = 20; //constant
	private $firstRowOfPage = 0; 
	public $totalPages = 0;
	public $currentPage = 1;
	public $totalEntries;
	public $route; //Is the actual route. Example: admin/messages
	public $urls = array(); //array with all urls

	
	/*Constructor
	* $route: 
	* $totalEntries: 
	* $currentPage:
	* 
	*/
  function __construct ($route, $totalEntries, $currentPage) {
	//TRAZA
	Log::info('+++ PaginadorClass>Constructor:', array("totalEntries:",$totalEntries,"currentPage:",$currentPage));		
	$this->totalEntries = $totalEntries;
	$this->currentPage=$currentPage;
	//$urlCurrent = URL::current();
	$this->route=$route;

	if($totalEntries > $this->rowsPerPage){
		//Total pages
		$pages = $totalEntries / $this->rowsPerPage;
		$pages = ceil($pages); //ceil get roundUp number of float
		$this->totalPages = $pages;
		//current start row: pageTobeSeen * rowsPerPage - rowsPerPage
		if($currentPage>1){		
			$this->firstRowOfPage = ($currentPage * $this->rowsPerPage) - $this->rowsPerPage;
		}
		//Create URL link for all pages
		if($this->totalPages > 1){
			for($i = 1; $i <= $pages; $i++){
				$pageUrl = $route . "?page=" . $i;
				Log::info('+++ PaginadorClass>URLs:', array(URL::current()));
				$this->urls[$i] = $pageUrl;
			}
		}
		//TRAZA
		//Log::info('+++ PaginadorClass>Pages:', array($pages, $this->firstRowOfPage, $this->rowsPerPage));		
		//Log::info('+++ PaginadorClass>URLs:', $this->urls);
	}
  }

  
  /*GETTER & SETTER*/
  public function getFirst(){
	return $this->first;
  }
  
  public function getLast(){
	return $this->last;
  }
  
  public function getTotalEntries(){
	return $this->totalEntries;
  }
  
  public function getTotalPages(){
	return $this->totalPages;
  }
  
  public function getRowsPerPage(){
	return $this->rowsPerPage;
  }
  
  public function getFirstRowOfPage(){
	return $this->firstRowOfPage;
  }
  
  /*TO STRING*/
	
}
