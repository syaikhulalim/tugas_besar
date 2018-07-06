<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//if($this->session->userdata('logged_in') == null){
		//	redirect('Login','refresh');
		//}
	}

	public function index()
	{
		$idKuliner = $this->uri->segment(2);
		$this->load->helper('url', 'form');
		$data['kuliner_list'] = $this->db->where('
			idKuliner', $idKuliner)->get('
			kuliner_malang')->row_array();
		$this->load->view('single_post', $data);
	}
}
