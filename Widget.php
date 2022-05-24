<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends MY_Controller {

	// Override 404 error
	// Match with $route['404_override'] value from /application/config/routes.php
	public function index()
	{
		$this->render($this->mCtrler.'/home','empty');
	}
	public function spin1(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');
	}
	public function grouping(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function pickone1(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function pickone2(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function pair1(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function pair2(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function pair3(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function pair4(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function star5(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function stopwatch1(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function stopwatch2(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function stopwatch3(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function stopwatch4(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}
	public function wordcloud1(){
		$this->render($this->mCtrler.'/'.$this->mAction,'empty');	
	}


}