<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class user extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index() {
        $data = array();
        $data['maincontent']=$this->load->view('user/user_login', $data, TRUE);
        $this->load->view('index', $data);
    }
    public  function user_home() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        $data = array();
        $data['maincontent']=$this->load->view('user/user_home', $data, TRUE);
        $this->load->view('index', $data);
    }
//user login//
    public function login() {
        $data = array();
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $result = $this->user_model->UserLoginCheck($user_name, $password);
        if ($result) {
            $shop_info=$this->user_model->SelectShopInfoByUserId($result->shop_id);
            $data = array();
            $sessionData = array();
            $sessionData['user_name'] = $result->user_name;
            $sessionData['user_id'] = $result->user_id;
            $sessionData['shop_id'] = $shop_info->shop_id;
            $sessionData['shop_name'] = $shop_info->shop_name;
            $sessionData['logged_in'] = TRUE;
            $this->session->set_userdata($sessionData);
            $data['title'] = 'Welcome To User Panel';
            $data['maincontent'] = $this->load->view('user/user_home', $data, TRUE);
            $this->load->view('index', $data);
        } else {
            $_SESSION['errMessage'] = "<div class='err_msg'> User Name or Password Invalid !</div>";
            // $_SESSION['errMessage'] = "<div class='err_msg'>Image format not supported. we are only support(.jpeg .png .gif .bmp)</div>";
            $this->index();
        }
    }
    public function logout() {
        $this->session->unset_userdata('user_name','user_id', 'logged_in');

        $_SESSION['successMessage'] = "<div class='success_msg'>Successfully Logged Out..</div>";
        $this->session->sess_destroy();
        redirect('user/index');
    }
    public function sendGodown() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $shop_id=$this->session->userdata('shop_id');
            //$result = $this->user_model->SelectProductCategory($shop_id);
            $data['maincontent']=$this->load->view('user/select_cateogry_sendGodown', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function retriveSubCategory($category_id='') {
        $data=array();
        $data['category_id']=$category_id;
        $data['result'] = $this->user_model->SelectSubCategoryByCategoryId($category_id);
        $this->load->view('user/select_sub_category', $data);
    }
    public function ProductEntryCondition() {
        $data=array();
        $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
        $data['category_id']=$this->input->post('category_id',$data,TRUE);
        $data['result']=$this->user_model->selectSubCategoryBySubId($data);
        $data['maincontent']=$this->load->view('user/send_godown', $data, TRUE);
        $this->load->view('index', $data);

    }
    public function retriveRowforSendGodown($num='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['num']=$num;
            //$data['maincontent']=$this->load->view('user/sendGodown_condition',$data,TRUE);
            $this->load->view('user/sendGodown_condition', $data);
        }
    }
    public function saveProductCategory() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $num=$this->input->post('num',$data,TRUE);
            $data['num']=$this->input->post('num',$data,TRUE);
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['product_sl']=$this->input->post('product_sl',$data,TRUE);
            $data['product_name']=$this->input->post('product_name',$data,TRUE);
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['buy_price']=$this->input->post('buy_price',$data,TRUE);
            $data['cover_price']=$this->input->post('cover_price',$data,TRUE);
            $data['warrenty']=$this->input->post('warrenty',$data,TRUE);
            $data['entry_date']=date('d/m/Y');
            $product_sl=$data['product_sl'];
            $sub_id=$data['sub_id'];
            $numx=0;
            for($i=0;$i<=($num-1); $i++) {
                $q=mysql_query("select * from tbl_godown where product_sl='$product_sl[$i]' and sub_id='$sub_id'");
                $fetch=mysql_fetch_array($q);
                $nums=mysql_num_rows($q);
                if($nums>0) {
                    $numx+=$nums;
                }
            }
            if($numx>0) {
                $data['maincontent']=$this->load->view('user/err_msg',$data,TRUE);
                $this->load->view('index', $data);
            }
            else {
                $_SESSION['successMessage'] = "<div class='success_msg'>Successfully Saved Product.</div>";
                $this->user_model->SaveProductIntoGodown($data,$num);
                //$data['result']=$this->user_model->selectDuplicateProduct($data,$num);
                $this->sendGodown();
            }
        }

    }
    public function sendStock() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $shop_id=$this->session->userdata('shop_id');
            //$result = $this->user_model->SelectProductCategory($shop_id);
            $data['maincontent']=$this->load->view('user/select_category_sendStock', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function ProductViewCondition() {
        $data=array();
        $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
        $data['category_id']=$this->input->post('category_id',$data,TRUE);
        $data['result']=$this->user_model->selectSubCategoryBySubId($data);
        $data['maincontent']=$this->load->view('user/send_stock', $data, TRUE);
        $this->load->view('index', $data);

    }
    public function retriveSubCategory_stock($category_id='') {
        $data=array();
        $data['category_id']=$category_id;
        $data['result'] = $this->user_model->SelectSubCategoryByCategoryId($category_id);
        $this->load->view('user/select_sub_category_stk', $data);
    }
    public function SendProductintoStock() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            //$shop_id=$this->session->userdata('shop_id');
            //$data['product_sl']=$this->input->post('product_sl',$data,TRUE);
            $count=count($this->input->post('num',$data,TRUE));
            $data['godown_id']=$this->input->post('num',$data,TRUE);
            if($count==1) {
                $_SESSION['errMessage']="<div class='err_msg'>Please Select Checkbox for Product Send into Stock</div>";
                redirect('user/sendStock');
            }else {
                $data['entry_date']=date('d/m/Y');
                $data['result']=$this->user_model->SendProductIntoStock($data,$count);
                if($data['godown_id']) {
                    $_SESSION['successMessage']="<div class='success_msg'>Successfully Product Send to Godown.</div>";
                    $this->ProductViewCondition();
                }
            }
            $this->load->view('index', $data);

        }
    }
    public function product_sell(){
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
        $data=array();
        $data['maincontent']=$this->load->view('user/product_sell', $data, TRUE);
        $this->load->view('index', $data);
        }
    }
    public function veiw_sell_product(){
        
    }

}

?>