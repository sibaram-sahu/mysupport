<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function view($page = 'dashoboard'){

			if($this->session->has_userdata('logged_in')){
				 if(!file_exists(APPPATH.'/views//'.$page.'.php'))
	 			 {
	 					show_404();
	 			 }
				 $data['name'] = ucfirst($_SESSION['logged_in']['name']);
	 			 $this->load->view('dashboard',$data);
			}
			else{
				$this->load->view('index');
			}
	}
}
