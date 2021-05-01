<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
    }
    public function index() {
        $data = array();
        $data['maincontent'] = $this->load->view('admin/admin_login', $data, TRUE);
        $this->load->view('index', $data);
    }
    public  function admin_home() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data = array();
        $data['maincontent']=$this->load->view('admin/admin_home', $data, TRUE);
        $this->load->view('index', $data);
    }
    }
    public function login() {
        $data = array();
        $admin_id = $this->input->post('admin_id');
        $password = $this->input->post('password');
        $result = $this->admin_model->adminUserLoginCheck($admin_id, $password);

        if ($result) {
            $data = array();
            $sessionData = array();
            $sessionData['admin_id'] = $result->admin_id;
            $sessionData['logged_in'] = TRUE;
            $this->session->set_userdata($sessionData);
            $data['title'] = 'Welcome To Admin Panel';
            $data['maincontent'] = $this->load->view('admin/admin_home', $data, TRUE);
            $this->load->view('index', $data);
        } else {
            $_SESSION['errMessage'] = "<div class='err_msg'> User Name or Password Invalid !</div>";
            // $_SESSION['errMessage'] = "<div class='err_msg'>Image format not supported. we are only support(.jpeg .png .gif .bmp)</div>";
            $this->index();
        }
    }
    public function logout() {
        $this->session->unset_userdata('admin_id', 'logged_in');
        $data=array();
        $_SESSION['successMessage'] = "<div class='success_msg'>Successfully Logged Out..</div>";
        $data['maincontent'] = $this->load->view('admin/admin_login', $data, TRUE);
        $this->load->view('index', $data);
    }

    // employee registrattion start//
    public function Registration() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['maincontent']=$this->load->view('admin/user_registration',$data,TRUE);
        $this->load->view('index', $data);
    }
    public function ViewEmployee() {
    //    if(!$this->session->userdata('admin_id')) {
  //          $this->login();
//        }
        $data=array();
        $data['maincontent']=$this->load->view('admin/view_employee',$data,TRUE);
        $this->load->view('index',$data);
    }
    public function SaveUser() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['full_name']=$this->input->post('full_name',$data,TRUE);
        $data['f_name']=$this->input->post('f_name',$data,TRUE);
        $data['age']=$this->input->post('age',$data,TRUE);
        $data['address']=$this->input->post('address',$data,TRUE);
        $data['mobile_no']=$this->input->post('mobile_no',$data,TRUE);
        $data['email']=$this->input->post('email',$data,TRUE);
        $data['join_date']=$this->input->post('d',$data,TRUE)."-".$this->input->post('m',$data,TRUE)."-".$this->input->post('y',$data,TRUE);
        $data['d']=$this->input->post('d',$data,TRUE);
        $data['m']=$this->input->post('m',$data,TRUE);
        $data['y']=$this->input->post('y',$data,TRUE);
        $data['sallery']=$this->input->post('sallery',$data,TRUE);
        $data['shop_id']=$this->input->post('shop_id',$data,TRUE);
        $data['user_name']=$this->input->post('user_name',$data,TRUE);
        $data['password']=$this->input->post('password',$data,TRUE);
        $upload_dir = "images/employee";
        $file_name = $data['full_name'] . $_FILES['picture']['name'];
        $data['picture'] = $data['full_name'] . $_FILES['picture']['name'];
        $file_type = $_FILES['picture']['type'];
        $file_size = $_FILES['picture']['size'];

        if ($file_size <= 500000) {
            switch ($file_type) {
                case 'image/jpeg':
                case 'image/png':
                case 'image/gif':
                case 'image/bmp':
                    copy($_FILES['picture']['tmp_name'], "$upload_dir/$file_name");
                    $result = $this->admin_model->SelectDuplicatebyMobileNo($data);
                    if (!$result) {
                        $this->admin_model->SaveNewEmployee($data);
                        $_SESSION['successMessage'] = "<div class='success_msg'>Save Employee information successfully.</div>";
                        $this->Registration();
                        break;
                    } else {
                        $_SESSION['errMessage'] = "<div class='err_msg'>Employee Already Registered. Please check.</div>";
                        $this->Registration();
                    }
                default:
                    $_SESSION['errMessage'] = "<div class='err_msg'>Image format not supported. we are only support(.jpeg .png .gif .bmp)</div>";
                    $this->Registration();
            }
        } else {
            $_SESSION['errMessage'] = "<div class='err_msg'>Image Size too Large.Maximum Image Size 5.00mb.</div>";
            $this->Registration();
        }
        //$data['maincontent']=$this->load->view('admin/user_registration',$data,TRUE);
        //$this->load->view('index', $data);
    }
    public function edit_employee($user_id=''){
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['user_id']=$user_id;
        if($user_id>0){
        $data['maincontent']=$this->load->view('admin/view_emp_for_edit',$data,TRUE);
        $this->load->view('index',$data);
        }
    }
    public function EditEmployeeSaved(){
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['full_name']=$this->input->post('full_name',$data,TRUE);
        $data['f_name']=$this->input->post('f_name',$data,TRUE);
        $data['age']=$this->input->post('age',$data,TRUE);
        $data['address']=$this->input->post('address',$data,TRUE);
        $data['mobile_no']=$this->input->post('mobile_no',$data,TRUE);
        $data['email']=$this->input->post('email',$data,TRUE);
        $data['join_date']=$this->input->post('d',$data,TRUE)."-".$this->input->post('m',$data,TRUE)."-".$this->input->post('y',$data,TRUE);
        $data['d']=$this->input->post('d',$data,TRUE);
        $data['m']=$this->input->post('m',$data,TRUE);
        $data['y']=$this->input->post('y',$data,TRUE);
        $data['sallery']=$this->input->post('sallery',$data,TRUE);
        $data['shop_id']=$this->input->post('shop_id',$data,TRUE);
        $data['user_name']=$this->input->post('user_name',$data,TRUE);
        $data['user_id']=$this->input->post('user_id',$data,TRUE);
        $this->admin_model->UpdatedEmployee($data);
        $data['maincontent']=$this->load->view('admin/view_employee',$data,TRUE);
        $this->load->view('index',$data);

    }
    public function delete_employee($user_id=''){
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['user_id']=$user_id;
        if($user_id>0){
        $this->admin_model->DeleteEmployee($data);
        $_SESSION['successMessage'] = "<div class='success_msg'>Successfully Deleted Employee.</div>";
        $data['maincontent']=$this->load->view('admin/view_employee',$data,TRUE);
        $this->load->view('index',$data);
        }
        $this->load->view('index',$data);
    }
    public function password_recovery() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['maincontent']=$this->load->view('admin/password_recover',$data,TRUE);
        $this->load->view('index',$data);
    }
    public function password_update() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['password']=trim($this->input->post('password',$data,TRUE));
        $data['user_id']=trim($this->input->post('user_id',$data,TRUE));
        $this->admin_model->PasswordRecoverbyUserId($data);
        $_SESSION['successMessage'] = "<div class='success_msg'>Password Recovery successfull.</div>";
        $data['maincontent']=$this->load->view('admin/password_recover',$data,TRUE);
        $this->load->view('index',$data);
    }
    public function addshop() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['maincontent']=$this->load->view('admin/add_shop',$data,TRUE);
        $this->load->view('index',$data);
    }
    public function viewshop() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['maincontent']=$this->load->view('admin/view_shop',$data,TRUE);
        $this->load->view('index',$data);

    }
    public function ShopSave() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['shop_name']=trim($this->input->post('shop_name',$data,TRUE));
        $data['shop_address']=trim($this->input->post('shop_address',$data,TRUE));
        $duplicate_result=$this->admin_model->SelectDuplicateShop($data);
        if(!$duplicate_result) {
            $this->admin_model->AddNewShop($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>Add Shop Successfull.</div>";
        }
        else {
            $_SESSION['errMessage'] = "<div class='err_msg'>This shop already Registered.</div>";
        }
        $data['maincontent']=$this->load->view('admin/add_shop',$data,TRUE);
        $this->load->view('index',$data);
    }
    public function edit_shop($shop_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['result']=$this->admin_model->searchShopByShopId($shop_id);
        $data['maincontent']=$this->load->view('admin/edit_shop',$data,TRUE);
        $this->load->view('index',$data);
    }
    }
    public function UpdateShopSave() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['shop_id']=trim($this->input->post('shop_id',$data,TRUE));
        $data['shop_name']=trim($this->input->post('shop_name',$data,TRUE));
        $data['shop_address']=trim($this->input->post('shop_address',$data,TRUE));
        $duplicate_result=$this->admin_model->SelectDuplicateShop($data);
        if($duplicate_result) {
            $_SESSION['errMessage'] = "<div class='err_msg'>This shop already Registered.</div>";
        }
        else {
            $data['result']=$this->admin_model->SaveUpdatedShop($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>Update Shop Successfull.</div>";
        }
        $this->viewshop();
    }
    }
    public function delete_shop($shop_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['result']=$this->admin_model->DeleteShopByShopId($shop_id);
        $_SESSION['successMessage'] = "<div class='success_msg'>Delete Shop Successfull</div>";
        $data['maincontent']=$this->load->view('admin/view_shop',$data,TRUE);
        $this->load->view('index',$data);
    }
    }
    public function sallery($msg='') {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {

            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg'>সফলভাবে বেতন দেওয়া হয়েছে।.</div>";
            }

            $data['maincontent']=$this->load->view('admin/sallery',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function selectUserForSallery() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['user_id']=$this->input->post('user_id',$data,TRUE);
            $data['pay_month']=$this->input->post('pay_month',$data,TRUE);
            $data['pay_year']=$this->input->post('pay_year',$data,TRUE);
            $data['result']=$this->admin_model->CheckUserInfoById($data);
            $data['result1']=$this->admin_model->CheckUserByUserId($data);
            $data['maincontent']=$this->load->view('admin/sallery',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function SalleryPaid() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['paid_sallery']=$this->input->post('paid_sallery',$data,TRUE);
        $data['user_id']=$this->input->post('user_id',$data,TRUE);
        $data['total_sallery']=$this->input->post('total_sallery',$data,TRUE);
        $total_paid_ex=$this->input->post('total_paid_ex',$data,TRUE)+$this->input->post('paid_sallery',$data,TRUE);
        $data['pay_month']=$this->input->post('pay_month',$data,TRUE);
        $data['pay_year']=$this->input->post('pay_year',$data,TRUE);
        $data['paid_date']=date('d-m-Y');
        // if more than sallery given//
        if($total_paid_ex>$data['total_sallery']) {
            $_SESSION['errMessage'] = "<div style='color:red; text-align:center;'>You can't Paid more than sallery amount.</div>";
            //as like as selectUserForSallery//
            $data['result']=$this->admin_model->CheckUserInfoById($data);
            $data['result1']=$this->admin_model->CheckUserByUserId($data);
            $data['maincontent']=$this->load->view('admin/sallery',$data,TRUE);
            $this->load->view('index',$data);
        }
        else {
            //if all are right  then..../
            $data['year']=date("Y");
            $data['month']=date("F");
            $data['result']=$this->admin_model->SaveSallery($data);
            redirect('admin/sallery/1');
        }

    }
    }
    public function add_vendor($msg='') {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg'>Add vendor information successfull.<div>";
            }
            //else {
            //$_SESSION['errMessage'] = "<div class='err_msg'>This Vendor already Registered.</div>";
            //}
            $data['maincontent']=$this->load->view('admin/add_vendor',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public  function save_vendor() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['vendor_name']=$this->input->post('vendor_name',$data,TRUE);
            $data['vendor_address']=$this->input->post('vendor_address',$data,TRUE);
            $data['result']=$this->admin_model->SaveVendor($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>সফলভাবে বেতন দেোয়া হযেছে।<div>";
            redirect('admin/add_vendor/1');
            //$data['maincontent']=$this->load->view('admin/add_vendor',$data,TRUE);
            //$this->load->view('index',$data);
        }
    }

    public function view_vendor() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['maincontent']=$this->load->view('admin/view_vendor',$data,TRUE);
            $this->load->view('index',$data);

        }
    }
    public function edit_vendor($vendor_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->admin_model->searchVendorByVendorId($vendor_id);
            $data['maincontent']=$this->load->view('admin/edit_vendor',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function UpdateVendorSave() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['vendor_id']=trim($this->input->post('vendor_id',$data,TRUE));
            $data['vendor_name']=trim($this->input->post('vendor_name',$data,TRUE));
            $data['vendor_address']=trim($this->input->post('vendor_address',$data,TRUE));
            $data['result']=$this->admin_model->SaveUpdatedVendor($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>Update Vendor Information Successfull.</div>";
            $this->view_vendor();
        }
    }
    public function delete_vendor($vendor_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->admin_model->DeleteVendorByVendorId($vendor_id);
            $_SESSION['successMessage'] = "<div class='success_msg'>Delete Vendor Successfull.</div>";
            $data['maincontent']=$this->load->view('admin/view_vendor',$data,TRUE);
            $this->load->view('index',$data);
        }
    }

    public function add_account($msg='') {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg'>Successfully Add Your Information</div>";
            }
            $data['maincontent']=$this->load->view('admin/add_account',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function saveAccount() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['description']=trim($this->input->post('description',$data,TRUE));
            $data['amount']=trim($this->input->post('amount',$data,TRUE));
            $data['entry_date']=date('d-m-Y');
            $data['date']=$this->input->post('d',$data,TRUE)."/".$this->input->post('m',$data,TRUE)."/".$this->input->post('y',$data,TRUE);
            $data['month']=date("F");
            $data['year']=date("Y");
            $data['result']=$this->admin_model->SavePersonalAccount($data);
            redirect('admin/add_account/1');

        }
    }
    //view Account
    public function view_account() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['maincontent']=$this->load->view('admin/view_account',$data,TRUE);
        $this->load->view('index',$data);
    }
    public function edit_account($account_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->admin_model->searchAccountByAccountId($account_id);
            $data['maincontent']=$this->load->view('admin/edit_account',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function UpdateAccountSave() {
        $data=array();
        $data['account_id']=trim($this->input->post('account_id',$data,TRUE));
        $data['description']=trim($this->input->post('description',$data,TRUE));
        $data['date']=trim($this->input->post('date',$data,TRUE));
        $data['entry_date']=date('d/m/Y');
        $data['amount']=trim($this->input->post('amount',$data,TRUE));
        $data['result']=$this->admin_model->SaveUpdatedAccount($data);
        $_SESSION['successMessage'] = "<div class='success_msg'>Update Information Successfull.</div>";
        $this->view_account();
    }
    public function delete_account($account_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->admin_model->DeleteAccountByAccountId($account_id);
            $_SESSION['successMessage'] = "<div class='success_msg'>Delete Account Successfull.</div>";
            $data['maincontent']=$this->load->view('admin/view_account',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
//end view account

//view product
    public function view_product() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['maincontent']=$this->load->view('admin/view_product',$data,TRUE);
        $this->load->view('index',$data);
    }
    public  function view_product_search() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        }
        $data=array();
        $data['month']=trim($this->input->post('month',$data,TRUE));
        $data['year']=trim($this->input->post('year',$data,TRUE));
        $data['maincontent']=$this->load->view('admin/view_product',$data,TRUE);
        $this->load->view('index',$data);
    }

    public function edit_product() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['buying_id']=trim($this->input->post('buying_id',$data,TRUE));
            $data['result']=$this->admin_model->searchProductByProductId($data['buying_id']);
            $data['maincontent']=$this->load->view('admin/edit_product',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function UpdateProductSave() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['buying_id']=trim($this->input->post('buying_id',$data,TRUE));
        $data['vendor_id']=trim($this->input->post('vendor_id',$data,TRUE));
        $data['month']=$data['month']=date('F/Y');
        $data['note']=trim($this->input->post('note',$data,TRUE));
        $data['total_amount']=trim($this->input->post('total_amount',$data,TRUE));
        $data['paid']=trim($this->input->post('paid',$data,TRUE));
        $data['due']=trim($this->input->post('due',$data,TRUE));
        $data['date']=trim($this->input->post('date',$data,TRUE));
        $data['result']=$this->admin_model->SaveUpdatedProduct($data);
        $_SESSION['successMessage'] = "<div class='success_msg'>Update Information Successfull.</div>";
        $this->view_product();
    }
    }
    public function delete_product() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['buying_id']=trim($this->input->post('buying_id',$data,TRUE));
            $data['result']=$this->admin_model->DeleteProductByProductId($data['buying_id']);
            $_SESSION['successMessage'] = "<div class='success_msg'>Delete Product Successfull.</div>";
            $data['maincontent']=$this->load->view('admin/view_product',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    //end view product


    public function product_buying($msg='') {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg'>Successfully Add Your Information<div>";
            }
            $data['maincontent']=$this->load->view('admin/product_buying',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function SaveProduct() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['vendor_id']=trim($this->input->post('vendor_id',$data,TRUE));
            $data['total_amount']=trim($this->input->post('total_amount',$data,TRUE));
            $data['note']=trim($this->input->post('note',$data,TRUE));
            $data['paid']=trim($this->input->post('paid',$data,TRUE));
            $data['due']=trim($this->input->post('due',$data,TRUE));
            $data['date']=$this->input->post('date',$data,TRUE);
            $data['month']=date('F');
            $data['year']=date('Y');
            $data['entry_date']=date('d/m/Y');
            $result=$this->admin_model->SaveProductBuying($data);
            redirect('admin/product_buying/1');
        }

    }
    public function product_category($msg='') {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg' style='margin-left:34%'>Successfully Add Product Catagory.";
            }

            $data['maincontent']=$this->load->view('admin/add_category',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function retriveRowforCategory($num='') {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['num']=$num;
            $data['maincontent']=$this->load->view('admin/sub_category_condition',$data,TRUE);
            $this->load->view('admin/sub_category_condition', $data);
        }
    }
    public function saveProductCategory() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $category_name=trim($this->input->post('category_name',TRUE));
            $num=trim($this->input->post('num',TRUE));
            $sub_category=$this->input->post('sub_category');
            $result=$this->admin_model->SaveProductCategory($category_name,$sub_category,$num);
            redirect('admin/product_category/1');
        }
    }
    public function viewProductCategory() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['result']=$this->admin_model->selectProductCategory();
        $data['maincontent']=$this->load->view('admin/view_category',$data,TRUE);
        $this->load->view('index',$data);
    }
    }
    public function selectCategoryByCategoryId() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $category_id=trim($this->input->post('category_id',TRUE));
        $data['result']=$this->admin_model->selectProductCategory();
        $data['result1']=$this->admin_model->selectSubCategoryByCategoryId($category_id);
        $data['category_id']=$category_id;
        $data['maincontent']=$this->load->view('admin/view_category',$data,TRUE);
        $this->load->view('index',$data);
        }
    }
    public function AddNewSubCategory() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['category_id']=trim($this->input->post('category_id',TRUE));
        $data['sub_category_name']=trim($this->input->post('sub_category',TRUE));
        $result=$this->admin_model->selectSubCategoryByCategoryName($data);
        if($result>1) {
            $_SESSION['successMessage']='This category Already Registered';
        }
        else {
            $data['result']=$this->admin_model->SaveNewSubcategory($data);
        }
        $this->viewProductCategory();
    }
    }
    public function editSubCategory($sub_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['sub_id']=$sub_id;
        $data['result']=$this->admin_model->selectSubCategoryBySubId($data);
        $data['maincontent']=$this->load->view('admin/edit_category',$data,TRUE);
        $this->load->view('index',$data);
        }
    }
    public function SaveUpdatedSubcategory() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['sub_category_name']=trim($this->input->post('sub_category',TRUE));
        $data['sub_id']=trim($this->input->post('sub_id',TRUE));
        $data['result']=$this->admin_model->UpdatedSubcategory($data);
        $_SESSION['successMessage']="<font style='color:green'>Successfully Updated Category</font>";
        $this->viewProductCategory();
    }
    }
    public function deleteSubCategory($sub_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
        $data=array();
        $data['sub_id']=$sub_id;
        $data['result']=$this->admin_model->DeleteSubcategory($data);
        $_SESSION['successMessage']="<font style='color:green'>Successfully Delete Category</font>";
        $this->viewProductCategory();
    }
    }
    public function bonus($msg='') {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {

            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg'>সফলভাবে বেতন দেোয়া হযেছে।.<div>";
            }

            $data['maincontent']=$this->load->view('admin/bonus',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function selectUserForBonus() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['user_id']=$this->input->post('user_id',$data,TRUE);
            $data['pay_month']=$this->input->post('pay_month',$data,TRUE);
            $data['pay_year']=$this->input->post('pay_year',$data,TRUE);
            $data['result']=$this->admin_model->CheckUserInfoById($data);
            $data['result1']=$this->admin_model->CheckUserByUserIdForBonus($data);
            $data['maincontent']=$this->load->view('admin/bonus',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function BonusPaid() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['paid_bonus']=$this->input->post('paid_bonus',$data,TRUE);
            $data['user_id']=$this->input->post('user_id',$data,TRUE);
            $total_paid_ex=$this->input->post('total_paid_ex',$data,TRUE)+$this->input->post('paid_bonus',$data,TRUE);
            $data['pay_month']=$this->input->post('pay_month',$data,TRUE);
            $data['paid_date']=date('d-m-Y');
            $data['pay_year']=$this->input->post('pay_year',$data,TRUE);
            $data['month']=date("F");
            $data['year']=date("Y");
            $this->admin_model->SaveBonus($data);
            $_SESSION['successMessage']="<font style='color:green'>Successfully Given Bonus.</font>";
            $data['maincontent']=$this->load->view('admin/bonus',$data,TRUE);
            $this->load->view('index',$data);
        }

    }
    public function viewAllBonus() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['maincontent']=$this->load->view('admin/view_bonus',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function retriveBonusHistory() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['month']=$this->input->post('month',$data,TRUE)."/".$this->input->post('year',$data,TRUE);
            $data['result']=$this->admin_model->SelectAllBonusByMonth($data);
            $data['maincontent']=$this->load->view('admin/view_bonus',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function create_customer($msg='') {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            if($msg=='1') {
                $data['msg']="<div class='success_msg'>Add customer information successfull.<div>";
            }
            $data['maincontent']=$this->load->view('admin/add_customer',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
public  function save_customer() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['cus_name']=$this->input->post('cus_name',$data,TRUE);
            $data['address']=$this->input->post('address',$data,TRUE);
            $data['mob_no']=$this->input->post('mob_no',$data,TRUE);
            $data['status']='fixed';
            $data['result']=$this->admin_model->SaveCustomer($data);
            redirect('admin/create_customer/1');
        }
    }
public function view_customer() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['maincontent']=$this->load->view('admin/view_customer',$data,TRUE);
            $this->load->view('index',$data);

        }
    }
    public function edit_customer($customer_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->admin_model->searchCustomerByCustomerId($customer_id);
            $data['maincontent']=$this->load->view('admin/edit_customer',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
    public function UpdateCustomerSave() {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['customer_id']=trim($this->input->post('customer_id',$data,TRUE));
            $data['cus_name']=trim($this->input->post('cus_name',$data,TRUE));
            $data['address']=trim($this->input->post('address',$data,TRUE));
            $data['mob_no']=trim($this->input->post('mob_no',$data,TRUE));
            $data['result']=$this->admin_model->SaveUpdatedCustomer($data);
            $_SESSION['successMessage'] = "<div class='success_msg'>Update Customer Information Successfull.</div>";
            $this->view_customer();
        }
    }
    public function delete_customer($cus_id) {
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['result']=$this->admin_model->DeleteCustomerByCustomerId($cus_id);
            $_SESSION['successMessage'] = "<div class='success_msg'>Delete Customer Successfull.</div>";
            $data['maincontent']=$this->load->view('admin/view_customer',$data,TRUE);
            $this->load->view('index',$data);
        }
    }
//report management
  public function daily_report(){
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['maincontent']=$this->load->view('admin/report/daily_report',$data,TRUE);
            $this->load->view('index',$data);
        }
  }
  public function monthly_report(){
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['maincontent']=$this->load->view('admin/report/monthly_report_search',$data,TRUE);
            $this->load->view('index',$data);
        }
  }
  public function monthly_src_view(){
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['month']=trim($this->input->post('month',$data,TRUE));
            $data['year']=trim($this->input->post('year',$data,TRUE));
            $data['maincontent']=$this->load->view('admin/report/monthly_report_search',$data,TRUE);
            $this->load->view('index',$data);
        }
  }
  public function yearly_report(){
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['maincontent']=$this->load->view('admin/report/yearly_report_search',$data,TRUE);
            $this->load->view('index',$data);
        }
  }
  public function yearly_src_view(){
        if(!$this->session->userdata('admin_id')) {
            $this->login();
        } else {
            $data=array();
            $data['src_year']=trim($this->input->post('year',$data,TRUE));
            $data['maincontent']=$this->load->view('admin/report/yearly_report_search',$data,TRUE);
            $this->load->view('index',$data);
        }
  }
  public function backup(){
        $data=array();
            $data['maincontent']=$this->load->view('admin/report/backup',$data,TRUE);
            $this->load->view('index',$data);
  }
}

?>