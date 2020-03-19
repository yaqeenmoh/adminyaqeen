<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard extends  CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

		$data['title']=$this->lang->line('dashboard_page');
		$data['page']='dashboard/home';
		$this->load->view('index',$data);

	}

}
