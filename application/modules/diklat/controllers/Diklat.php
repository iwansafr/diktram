<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diklat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
    $this->load->helper('html');
    $this->load->library('session');
    $this->load->model('admin/data_model');
    $this->load->model('admin/config_model');
    // $this->load->model('content/content');
    $this->load->library('ECRUD/ecrud');
    $this->load->library('pagination');
    $this->load->library('esg');
    $this->load->model('diklat_model');
	}
	public function index()
	{
		$this->load->view('home/index');
	}
	public function list()
	{
		$this->load->view('home/index');
	}
	public function profile()
	{
		$this->load->view('home/index');
	}
	public function peserta()
	{
		$this->load->view('home/index');
	}

	public function cert()
	{
		$this->load->view('home/index');
	}
	public function success($str = '')
	{
		if(!empty($str))
		{
			$data['kode'] = $str;
			$this->load->view('home/index',$data);
		}
	}
	public function login()
	{
		$data['status'] = array();
		if(!empty($this->input->post()))
		{
			$tmp_data = $this->input->post();
			$peserta  = $this->db->query('SELECT * FROM peserta WHERE username = ? LIMIT 1', array($tmp_data['username']))->row_array();
			if(!empty($peserta))
			{
				if($tmp_data['password'] == $peserta['password'])
				{
					$this->session->set_userdata(base_url().'_diklat_logged_in', $peserta);
					header('Location: '.base_url('diklat/cert'));
				}else{
					$data['status']['msg']['alert'] = 'danger';
					$data['status']['msg']['msg']   = 'password salah';
				}
			}else{
				$data['status']['msg']['alert'] = 'danger';
				$data['status']['msg']['msg']   = 'username tidak dikenali';
			}
		}
		$this->load->view('home/index', $data);
	}
}