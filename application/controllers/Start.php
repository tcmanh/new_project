<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends Auth_Controller {


	public function index()
	{ 
		$this->render('welcome_message');
	}
}
