<?php
class admin_model extends CI_Model {
    public function adminUserLoginCheck($admin_id,$password) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', trim($admin_id));
        $this->db->where('password', trim($password));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SelectDuplicatebyMobileNo($data) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('mobile_no', trim($data['mobile_no']));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SaveNewEmployee($data) {
        $this->db->insert('tbl_user',$data);
    }

    public function UserLoginCheck($user_name,$password) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_name', trim($user_name));
        $this->db->where('password', trim($password));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function PasswordRecoverbyUserId($data) {
        $this->db->set('password',$data['password']);
        $this->db->where('user_id',$data['user_id']);
        $this->db->update('tbl_user');
    }
    public function AddNewShop($data) {
        $this->db->insert('tbl_shop',$data);
    }
    public  function SelectDuplicateShop($data) {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_name', trim($data['shop_name']));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function searchShopByShopId($shop_id) {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_id', $shop_id);
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SaveUpdatedShop($data) {
        $this->db->set('shop_name',$data['shop_name']);
        $this->db->set('shop_address',$data['shop_address']);
        $this->db->where('shop_id',$data['shop_id']);
        $this->db->update('tbl_shop');
    }
    public function DeleteShopByShopId($shop_id) {
        $this->db->where('shop_id',$shop_id);
        $this->db->delete('tbl_shop');

    }
    // veiw ,edit.delete
    Public function searchProductByProductId($buying_id){
        $this->db->select('*');
        $this->db->from('tbl_product_buying');
        $this->db->where('buying_id', $buying_id);
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SaveUpdatedProduct($data) {
        $this->db->set('note',$data['note']);
        $this->db->set('total_amount',$data['total_amount']);
        $this->db->set('paid',$data['paid']);
        $this->db->set('due',$data['due']);
        $this->db->set('date',$data['date']);
        $this->db->set('vendor_id',$data['vendor_id']);
        $this->db->set('month',$data['month']);
        $this->db->where('buying_id',$data['buying_id']);
        $this->db->update('tbl_product_buying');
    }
     public function DeleteProductByProductId($buying_id) {
        $this->db->where('buying_id',$buying_id);
        $this->db->delete('tbl_product_buying');

    }
    //veiw ,edit.delete

    public function CheckUserInfoById($data) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', trim($data['user_id']));
        $resultSet = $this->db->get();
        return $resultSet->row();

    }
    public function CheckUserByUserId($data) {
        $this->db->select('*');
        $this->db->from('tbl_sallery');
        $this->db->where('user_id', trim($data['user_id']));
        $this->db->where('month', trim($data['month']));
        $resultSet = $this->db->get();
        return $resultSet->result();
        //$this->db->join('tbl_user', 'tbl_sallery.user_id = tbl_user.user_id');
    }
    public function SaveSallery($data) {
        $this->db->insert('tbl_sallery',$data);
    }
    public function SaveVendor($data) {
        $this->db->insert('tbl_vendor',$data);
    }

    public function searchVendorByVendorId($vendor_id) {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('vendor_id', $vendor_id);
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SaveUpdatedVendor($data) {
        $this->db->set('vendor_name',$data['vendor_name']);
        $this->db->set('vendor_address',$data['vendor_address']);
        $this->db->where('vendor_id',$data['vendor_id']);
        $this->db->update('tbl_vendor');
    }
    public function DeleteVendorByVendorId($vendor_id) {
        $this->db->where('vendor_id',$vendor_id);
        $this->db->delete('tbl_vendor');
    }
    public function SavePersonalAccount($data) {
        $this->db->insert('tbl_personal_account',$data);
    }
    public function searchAccountByAccountId($account_id){
        $this->db->select('*');
        $this->db->from('tbl_personal_account');
        $this->db->where('account_id', $account_id);
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SaveUpdatedAccount($data){
        $this->db->set('description',$data['description']);
        $this->db->set('amount',$data['amount']);
        $this->db->set('date',$data['date']);
        $this->db->set('entry_date',$data['entry_date']);
        $this->db->where('account_id',$data['account_id']);
        $this->db->update('tbl_personal_account');
        
    }
    public function DeleteAccountByAccountId($account_id){
        $this->db->where('account_id',$account_id);
        $this->db->delete('tbl_personal_account');

    }
    public function SaveProductBuying ($data) {
        $this->db->insert('tbl_product_buying',$data);
    }
    public function SaveProductCategory($category_name,$sub_category,$num) {
        $this->db->set('category_name',$category_name);
        $this->db->insert('tbl_product_category');
        $insert_id=mysql_insert_id();
        for($i=0;$i<=($num-1); $i++) {
            $this->db->set('sub_category_name',$sub_category[$i]);
            $this->db->set('product_id',$insert_id);
            $this->db->insert('tbl_product_sub_category');
        }

    }
    public function selectProductCategory() {
        $this->db->select('*');
        $this->db->from('tbl_product_category');
        $resultSet = $this->db->get();
        return $resultSet->result();

    }
    public function selectSubCategoryByCategoryId($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_product_sub_category');
        $this->db->where('category_id', $category_id);
        $resultSet = $this->db->get();
        return $resultSet->result();
    }
    public function SaveNewSubcategory($data) {
        $this->db->insert('tbl_product_sub_category',$data);
    }
    public function selectSubCategoryByCategoryName($data){
        $this->db->select('*');
        $this->db->from('tbl_product_sub_category');
        $this->db->where('sub_category_name', $data['sub_category_name']);
        $resultSet = $this->db->get();
        $row=$resultSet->num_rows();
        return $row;
    }
    public function selectSubCategoryBySubId($data){
        $this->db->select('*');
        $this->db->from('tbl_product_sub_category');
        $this->db->where('sub_id', $data['sub_id']);
        $resultSet = $this->db->get();
        return $resultSet->row();
        return $resultSet;
    }
    public function UpdatedSubcategory($data){
        $this->db->set('sub_category_name',$data['sub_category_name']);
        $this->db->where('sub_id', $data['sub_id']);
        $this->db->update('tbl_product_sub_category');
    }
    public function DeleteSubcategory($data){
        $this->db->where('sub_id', $data['sub_id']);
        $this->db->delete('tbl_product_sub_category');
    }

    //bonus//
    public function CheckUserByUserIdForBonus($data) {
        $this->db->select('*');
        $this->db->from('tbl_bonus');
        $this->db->where('user_id', trim($data['user_id']));
        $this->db->where('month', trim($data['month']));
        $resultSet = $this->db->get();
        return $resultSet->result();
        //$this->db->join('tbl_user', 'tbl_sallery.user_id = tbl_user.user_id');
    }
    public function SaveBonus($data) {
        $this->db->insert('tbl_bonus',$data);
    }
    public function SelectAllBonusByMonth($data){
        $this->db->select('*');
        $this->db->from('tbl_bonus');
        $this->db->where('month', trim($data['month']));
        $resultSet = $this->db->get();
        return $resultSet->result();
    }


}
?>