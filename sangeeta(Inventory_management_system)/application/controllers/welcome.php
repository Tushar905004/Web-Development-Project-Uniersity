<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

            $data=array();
            $data['maincontent']=$this->load->view('index_message',$data,true);
            $this->load->view('index',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */