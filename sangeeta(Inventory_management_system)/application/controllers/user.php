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
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['category_id']=$this->input->post('category_id',$data,TRUE);
            $data['result']=$this->user_model->selectSubCategoryBySubId($data);
            $data['maincontent']=$this->load->view('user/send_godown', $data, TRUE);
            $this->load->view('index', $data);
        }
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
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['category_id']=$this->input->post('category_id',$data,TRUE);
            $data['result']=$this->user_model->selectSubCategoryBySubId($data);
            $data['maincontent']=$this->load->view('user/send_stock', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function retriveSubCategory_stock($category_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['category_id']=$category_id;
            $data['result'] = $this->user_model->SelectSubCategoryByCategoryId($category_id);
            $this->load->view('user/select_sub_category_stk', $data);
        }
    }
    public function SendProductintoStock() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $count=count($this->input->post('num',$data,TRUE));
            $data['godown_id']=$this->input->post('num',$data,TRUE);
            $error=0;
            for($i=0;$i<=1;$i++) {
                if(!$data['godown_id']) {
                    $error++;
                }
            }
            if($count==1 and $error!=0) {
                $_SESSION['errMessage']="<div class='err_msg'>Please Select Checkbox for Product Send into Stock</div>";

                $this->sendStock();
            }else {
                $data['entry_date']=date('d/m/Y');
                $data['result']=$this->user_model->SendProductIntoStock($data,$count);
                if($data['godown_id']) {
                    $_SESSION['successMessage']="<div class='success_msg'>Successfully Product Send to Stock    .</div>";
                    $this->ProductViewCondition();
                }
            }
            //$this->load->view('index', $data);

        }
    }
    // proudct sell condition start//
    public function product_sell() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $shop_id=$this->session->userdata('shop_id');
            $data['maincontent']=$this->load->view('user/select_category_for_sell', $data, TRUE);
            $this->load->view('index', $data);
        }
    }


    public function retriveSubCategoryForSell($category_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['category_id']=$category_id;
            $data['result'] = $this->user_model->SelectSubCategoryByCategoryId($category_id);
            $this->load->view('user/select_sub_category_for_sell', $data);
        }
    }
    public function ProductViewForSell() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['category_id']=$this->input->post('category_id',$data,TRUE);
            $data['result']=$this->user_model->selectSubCategoryBySubId($data);
            $data['maincontent']=$this->load->view('user/view_proudct_for_sell', $data, TRUE);
            $this->load->view('index', $data);

        }
    }
    public function proudctAddtoCart() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['category_id']=$this->input->post('category_id',$data,TRUE);
            $error=0;
            $stock_id=$this->input->post('stock_id',$data,TRUE);
            $num=count($stock_id);
            for($i=0;$i<$num;$i++) {
                $q=mysql_query("select * from tbl_tmp_cart where stock_id='$stock_id[$i]'");
                $num_row=mysql_num_rows($q);
                if($num_row>0) {
                    $error++;
                }
            }
            if($error>0) {
                $data['category_id']=$this->input->post('category_id1');
                $data['sub_id']=$this->input->post('sub_id1');
                $data['shop_id']=$this->input->post('shop_id');
                $data['result']=$this->user_model->selectSubCategoryBySubId($data);
                $_SESSION['errMessage']="<div class='err_msg'>Please Select Checkbox for Product send.</div>";
                $data['maincontent']=$this->load->view('user/view_proudct_for_sell', $data, TRUE);
            }
            else {
                for($j=0;$j<$num;$j++) {
                    $date=date('d-m-y[h:i:s]');
                    if($stock_id[$j]>0)
                        mysql_query("insert into tbl_tmp_cart (stock_id,entry_time)values('$stock_id[$j]','$date')");
                }
                $data['category_id']=$this->input->post('category_id1');
                $data['sub_id']=$this->input->post('sub_id1');
                $data['shop_id']=$this->input->post('shop_id');
                $data['result']=$this->user_model->selectSubCategoryBySubId($data);
                $_SESSION['successMessage']="<div class='success_msg'>Successfully Product Send to Queue.</div>";
                $data['maincontent']=$this->load->view('user/view_proudct_for_sell', $data, TRUE);
            }
            $this->load->view('index', $data);
        }
    }
    public function product_sell_memo() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['maincontent']=$this->load->view('user/view_sell_queue', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
//view and edit send godown condition
    public function view_godown_all() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $shop_id=$this->session->userdata('shop_id');
            $data['maincontent']=$this->load->view('user/view_godown_all', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function iframe_retrive_for_all_godown($category_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['category_id']=$category_id;
            $this->load->view('user/view_godown_all_iframe', $data);
        }
    }
    public function retrive_all_data_for_view_godown_all($category_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['category_id']=$category_id;
            $this->load->view('user/view_godown_data_by_category', $data);
        }
    }
    public function view_godown() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $shop_id=$this->session->userdata('shop_id');
            $data['maincontent']=$this->load->view('user/view_godown', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function retriveSubCategoryForView($category_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['category_id']=$category_id;
            $data['result'] = $this->user_model->SelectSubCategoryByCategoryId($category_id);
            $this->load->view('user/select_sub_category_for_view', $data);
        }
    }
    public function ProductViewForEdit() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['category_id']=$this->input->post('category_id',$data,TRUE);
            $data['result']=$this->user_model->selectSubCategoryBySubId($data);
            $data['maincontent']=$this->load->view('user/view_proudct_for_edit', $data, TRUE);
            $this->load->view('index', $data);

        }
    }
    //edit--dlt//
    public function proudct_edit_dlt() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['godown_id']=$this->input->post('godown_id',$data,TRUE);
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['category_id']=$this->input->post('category_id',$data,TRUE);
            $data['category_name']=$this->input->post('category_name',$data,TRUE);
            $data['sub_category_name']=$this->input->post('sub_category_name',$data,TRUE);
            if($this->input->post('edit_btn')) {
                $data['maincontent']=$this->load->view('user/edit_godown_product', $data, TRUE);
                $this->load->view('index', $data);
            }
            if($this->input->post('dlt_btn')) {
                $count=count($data['godown_id']);
                $data['result']=$this->user_model->delete_product_godown($data,$count);
                if($data['result']) {
                    $this->ProductViewForEdit();
                    echo "<script type='text/javascript'>alert('Thank you. Successfully Deleted.')</script>";
                }
            }
        }
    }
    public function product_edit_save() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $count=$this->input->post('count',$data,TRUE);
            $data['category_name']=$this->input->post('category_name',$data,TRUE);
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['sub_category_name']=$this->input->post('sub_category_name',$data,TRUE);
            $data['godown_id']=$this->input->post('godown_id',$data,TRUE);
            $data['product_sl']=$this->input->post('product_sl',$data,TRUE);
            $data['product_name']=$this->input->post('product_name',$data,TRUE);
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['buy_price']=$this->input->post('buy_price',$data,TRUE);
            $data['warrenty']=$this->input->post('warrenty',$data,TRUE);
            $data['cover_price']=$this->input->post('cover_price',$data,TRUE);
            $data['result']=$this->user_model->update_product_godown($data,$count);
            if(!$data['result']) {
                $_SESSION['errMessage']="<div class='err_msg'>Duplicate Found!</div>";
            } else {
                $_SESSION['successMessage']="<div class='success_msg'>Successfully Product Updated.</div>";
            }
            $data['maincontent']=$this->load->view('user/edit_godown_product', $data, TRUE);
            $this->load->view('index', $data);
        }
    }

//view and edit send Stock condition
    public function view_stock_all() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $shop_id=$this->session->userdata('shop_id');
            $data['maincontent']=$this->load->view('user/view_stock_all', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function iframe_retrive_for_all_stock($category_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['category_id']=$category_id;
            $this->load->view('user/view_stock_all_iframe', $data);
        }
    }
    public function retrive_all_data_for_view_stock_all($category_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['category_id']=$category_id;
            $this->load->view('user/view_stock_data_by_category', $data);
        }
    }
    public function view_stock() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $shop_id=$this->session->userdata('shop_id');
            $data['maincontent']=$this->load->view('user/view_stock', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function retriveSubCategoryForView_stock($category_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['category_id']=$category_id;
            $data['result'] = $this->user_model->SelectSubCategoryByCategoryId($category_id);
            $this->load->view('user/select_sub_category_for_view_stock', $data);
        }
    }
    public function StockViewForEdit() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['category_id']=$this->input->post('category_id',$data,TRUE);
            $data['result']=$this->user_model->selectSubCategoryBySubId($data);
            $data['maincontent']=$this->load->view('user/view_stock_for_edit', $data, TRUE);
            $this->load->view('index', $data);

        }
    }
    //edit--dlt//
    public function stock_edit_dlt() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['stock_id']=$this->input->post('stock_id',$data,TRUE);
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['category_id']=$this->input->post('category_id',$data,TRUE);
            $data['category_name']=$this->input->post('category_name',$data,TRUE);
            $data['sub_category_name']=$this->input->post('sub_category_name',$data,TRUE);
            if($this->input->post('edit_btn')) {
                $data['maincontent']=$this->load->view('user/edit_stock', $data, TRUE);
                $this->load->view('index', $data);
            }
            if($this->input->post('dlt_btn')) {
                $count=count($data['stock_id']);
                $data['result']=$this->user_model->delete_product_stock($data,$count);
                if($data['result']) {
                    $this->ProductViewForEdit();
                    echo "<script type='text/javascript'>alert('Thank you. Successfully Deleted.')</script>";
                }
            }
        }
    }
    public function stock_edit_save() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $count=$this->input->post('count',$data,TRUE);
            $data['category_name']=$this->input->post('category_name',$data,TRUE);
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['sub_category_name']=$this->input->post('sub_category_name',$data,TRUE);
            $data['stock_id']=$this->input->post('stock_id',$data,TRUE);
            $data['product_sl']=$this->input->post('product_sl',$data,TRUE);
            $data['product_name']=$this->input->post('product_name',$data,TRUE);
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['buy_price']=$this->input->post('buy_price',$data,TRUE);
            $data['warrenty']=$this->input->post('warrenty',$data,TRUE);
            $data['cover_price']=$this->input->post('cover_price',$data,TRUE);
            $data['result']=$this->user_model->update_product_stock($data,$count);
            if(!$data['result']) {
                $_SESSION['errMessage']="<div class='err_msg'>Duplicate Found!</div>";
            } else {
                $_SESSION['successMessage']="<div class='success_msg'>Successfully Product Updated.</div>";
            }
            $data['maincontent']=$this->load->view('user/edit_stock', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function send_memo_creator() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['stock_id']=$this->input->post('stock_id',$data,TRUE);
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['product_sl']=$this->input->post('product_sl',$data,TRUE);
            $data['product_name']=$this->input->post('product_name',$data,TRUE);
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['warrenty']=$this->input->post('warrenty',$data,TRUE);
            $data['buy_price']=$this->input->post('buy_price',$data,TRUE);
            $data['cover_price']=$this->input->post('cover_price',$data,TRUE);
            $data['discount']=$this->input->post('discount',$data,TRUE);
            $data['maincontent']=$this->load->view('user/sell_product_step1', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function sell_final() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['cus_name']=$this->input->post('cus_name',$data,TRUE);
            $data['address']=$this->input->post('address',$data,TRUE);
            $data['mob_no']=$this->input->post('mob_no',$data,TRUE);

            $data['stock_id']=$this->input->post('stock_id',$data,TRUE);
            $data['product_sl']=$this->input->post('product_sl',$data,TRUE);
            $data['product_name']=$this->input->post('product_name',$data,TRUE);
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['warrenty']=$this->input->post('warrenty',$data,TRUE);
            $data['buy_price']=$this->input->post('buy_price',$data,TRUE);
            $data['cover_price']=$this->input->post('cover_price',$data,TRUE);
            $data['discount']=$this->input->post('discount',$data,TRUE);
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['shop_id']=$this->session->userdata('shop_id');
            $data['cust_id_fixed']=$this->input->post('cust_id_fixed',$data,TRUE);
            $data['cust_id']=$this->input->post('cust_id_fixed',$data,TRUE);
            $data['instalment']=$this->input->post('instalment',$data,TRUE);
            $data['sell_by']=$this->session->userdata('user_name');
            $data['sell_date']=date('d-m-Y');
            $session=array();
            $session['total_price']=$this->input->post('total_price',$data,TRUE);
            $session['pay']=$this->input->post('pay',$data,TRUE);
            $this->session->set_userdata($session);
            $data['result']=$this->user_model->send_sell_tbl($data);
            if(!$data['result']) {
                $_SESSION['errMessage']="<div class='err_msg'>Duplicate Found!</div>";
            } else {
                $_SESSION['successMessage']="<div class='success_msg'>Successfully Product Updated.</div>";
            }
            $data['maincontent']=$this->load->view('user/sell_product_memo', $data, TRUE);
            $this->load->view('index', $data);
        }

    }
    public function sell_product_iframe() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $this->load->view('user/memo_iframe', $data);
        }
    }
    public function view_memo() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['maincontent']=$this->load->view('user/instalment/memo_view', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function retriveDataforMemo($str='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            if($str=='') {
                //$data['search']='not';
                echo "<font color='red'>Please Type a value into the box.</font>";
                exit();
            }
            $data['search']=$str;
            $this->load->view('user/instalment/memo_view_step1', $data);
        }
    }
    public function paidInstalment($memo_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['memo_id']=$memo_id;
            $data['maincontent']=$this->load->view('user/instalment/memo_customer_info_view', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function SaveInstalment() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['pay']=$this->input->post('pay',$data,TRUE);
            $data['due']=trim($this->input->post('due',$data,TRUE));
            $data['total_with_discount']=trim($this->input->post('t_discount',$data,TRUE));
            $data['old_paid']=$this->input->post('paid',$data,TRUE);
            $data['memo_id']=$this->input->post('memo_id',$data,TRUE);
            if($data['pay']>$data['due']) {
                echo"<script type='text/javascript'>alert('You can not pay more than sell price.');</script>";
                echo "<a href='' onclick='history.go(-1)'>Go back</a>";
            }else {
                $data['paid']=$data['old_paid']+$data['pay'];
                if(($data['total_with_discount']-$data['paid'])==0) {
                    $data['instalment']=0;
                } else {
                    $data['instalment']=1;
                }
                $data['result']=$this->user_model->saveIntoSellHistory($data);
                $data['maincontent']=$this->load->view('user/instalment/memo_customer_info_view', $data, TRUE);
                $this->load->view('index', $data);
            }
        }
    }

    public function quick_sell() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['maincontent']=$this->load->view('user/quick_sell/product_view', $data, TRUE);
            $this->load->view('index', $data);
        }
    }
    public function retriveDataforQuickSell($str='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            if($str=='') {
                //$data['search']='not';
                echo "<font color='red'>Please Type a value into the box.</font>";
                exit();
            }
            $data['search']=$str;
            $this->load->view('user/quick_sell/product_sell_step1', $data);
        }
    }
    public function quickSellStep1() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['cover_price']=$this->input->post('cover_price',$data,TRUE);
            $data['discount']=$this->input->post('discount',$data,TRUE);
            $data['stock_id']=$this->input->post('stock_id',$data,TRUE);
            //$data['result']=$this->user_model->saveIntoSellHistory($data);
            $data['maincontent']=$this->load->view('user/quick_sell/sell_step2', $data,true);
            $this->load->view('index', $data);
        }
    }

    public function quick_sell_final() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        }
        else {
            $data=array();
            $data['cus_name']=$this->input->post('cus_name',$data,TRUE);
            $data['address']=$this->input->post('address',$data,TRUE);
            $data['mob_no']=$this->input->post('mob_no',$data,TRUE);

            $data['stock_id']=$this->input->post('stock_id',$data,TRUE);
            $data['product_sl']=$this->input->post('product_sl',$data,TRUE);
            $data['product_name']=$this->input->post('product_name',$data,TRUE);
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['warrenty']=$this->input->post('warrenty',$data,TRUE);
            $data['buy_price']=$this->input->post('buy_price',$data,TRUE);
            $data['cover_price']=$this->input->post('cover_price',$data,TRUE);
            $data['discount']=$this->input->post('discount',$data,TRUE);
            $data['sub_id']=$this->input->post('sub_id',$data,TRUE);
            $data['shop_id']=$this->session->userdata('shop_id');
            $data['cust_id_fixed']=$this->input->post('cust_id_fixed',$data,TRUE);
            $data['cust_id']=$this->input->post('cust_id_fixed',$data,TRUE);
            $data['instalment']=$this->input->post('instalment',$data,TRUE);
            $data['sell_by']=$this->session->userdata('user_name');
            $data['sell_date']=date('d-m-Y');

            $session=array();
            $session['total_price']=$this->input->post('total_price',$data,TRUE);
            $session['pay']=$this->input->post('pay',$data,TRUE);
            $this->session->set_userdata($session);
            $data['result']=$this->user_model->quick_sell_tbl($data);
            if(!$data['result']) {
                $_SESSION['errMessage']="<div class='err_msg'>Duplicate Found!</div>";
            } else {
                $_SESSION['successMessage']="<div class='success_msg'>Successfully Product Updated.</div>";
            }
            $data['maincontent']=$this->load->view('user/sell_product_memo', $data, TRUE);
            $this->load->view('index', $data);
        }

    }
    //create other income //

    public function add_income($msg='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg'>Add information successfull.<div>";
            }
            $data['maincontent']=$this->load->view('user/add_income',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public  function save_income() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['amount']=$this->input->post('amount',$data,TRUE);
            $data['date']=$this->input->post('d',$data,TRUE)."-".$this->input->post('m',$data,TRUE)."-".$this->input->post('y',$data,TRUE);
            $data['month']=date("F");
            $data['year']=date("Y");
            $data['result']=$this->user_model->SaveIncome($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>সফলভাবে বেতন দেোয়া হযেছে।<div>";
            redirect('user/add_income/1');
        }
    }

    public function view_income() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();

            $data['maincontent']=$this->load->view('user/view_income',$data,TRUE);
            $this->load->view('index',$data);

        }
    }
    public function edit_income($income_id) {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->user_model->searchIncomeByIncomeId($income_id);
            $data['maincontent']=$this->load->view('user/edit_income',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function UpdateIncomeSave() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['amount']=$this->input->post('amount',$data,TRUE);
            $data['date']=$this->input->post('date',$data,TRUE);
            $data['income_id']=$this->input->post('income_id',$data,TRUE);
            $data['month']=date("F");
            $data['year']=date("Y");
            $data['result']=$this->user_model->SaveUpdatedIncome($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>Update Information Successfull.</div>";
            $this->view_income();
        }
    }
    public function delete_income($income_id) {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->user_model->DeleteIncomeByIncomeId($income_id);
            $_SESSION['successMessage'] = "<div class='success_msg'>Delete Vendor Successfull.</div>";
            $data['maincontent']=$this->load->view('user/view_income',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
//create other expend //

    public function add_expend($msg='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg'>Add information successfull.<div>";
            }
            $data['maincontent']=$this->load->view('user/add_expend',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public  function save_expend() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['amount']=$this->input->post('amount',$data,TRUE);
            $data['date']=$this->input->post('d',$data,TRUE)."-".$this->input->post('m',$data,TRUE)."-".$this->input->post('y',$data,TRUE);
            $data['month']=date("F");
            $data['year']=date("Y");
            $data['result']=$this->user_model->SaveExpend($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>সফলভাবে বেতন দেোয়া হযেছে।<div>";
            redirect('user/add_expend/1');
        }
    }

    public function view_expend() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();

            $data['maincontent']=$this->load->view('user/view_expend',$data,TRUE);
            $this->load->view('index',$data);

        }
    }
    public function edit_expend($expend_id) {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->user_model->searchExpendByExpendId($expend_id);
            $data['maincontent']=$this->load->view('user/edit_expend',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function UpdateexpendSave() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['description']=$this->input->post('description',$data,TRUE);
            $data['amount']=$this->input->post('amount',$data,TRUE);
            $data['date']=$this->input->post('date',$data,TRUE);
            $data['expend_id']=$this->input->post('expend_id',$data,TRUE);
            $data['month']=date("F");
            $data['year']=date("Y");
            $data['result']=$this->user_model->SaveUpdatedExpend($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>Update Information Successfull.</div>";
            $this->view_expend();
        }
    }
    public function delete_expend($expend_id) {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->user_model->DeleteExpendByExpendId($expend_id);
            $_SESSION['successMessage'] = "<div class='success_msg'>Delete Vendor Successfull.</div>";
            $data['maincontent']=$this->load->view('user/view_expend',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function src_memo() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['memo_id']=$this->input->post('memo_id',$data,TRUE);
            $data['maincontent']=$this->load->view('user/instalment/memo_search',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function memo_search1($memo_id) {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['memo_id']=$memo_id;
            $this->load->view('user/instalment/memo_iframe',$data);
        }
    }
//fixed customer section

    public function fixed_customer() {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->user_model->SelectFixedCustomer();
            $data['maincontent']=$this->load->view('user/fixed_customer/view_customer',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function view_customer_info_1($customer_id='') {
        if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['customer_id']=$customer_id;
            $data['maincontent']=$this->load->view('user/fixed_customer/view_customer_info_1',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function fixed_customer_memo_view($memo_id=''){
          if(!$this->session->userdata('user_id')) {
            $this->login();
        } else {
            $data=array();
            $data['memo_id']=$memo_id;
            $data['maincontent']=$this->load->view('user/fixed_customer/fixed_customer_memo_view',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
}
?>