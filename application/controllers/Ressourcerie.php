<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ressourcerie extends CI_Controller {



	public function __construct() {

	   parent::__construct();
	   $this->load->helper('url_helper');
   }


   public function index()
   {
			   $this->load->view('header');
	   		   $this->load->view('main/ressourcerie');
			   $this->load->view('footer');
   }
}
