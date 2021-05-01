<?php
class user_model extends CI_Model {
    public function adminUserLoginCheck($admin_id,$password) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', trim($admin_id));
        $this->db->where('password', trim($password));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function UserLoginCheck($user_name,$password) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_name', trim($user_name));
        $this->db->where('password', trim($password));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SelectShopInfoByUserId($shop_id) {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_id', trim($shop_id));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SelectProductCategoryByShopId($shop_id) {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_id', trim($shop_id));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SelectSubCategoryByCategoryId($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_product_sub_category');
        $this->db->where('category_id', trim($category_id));
        $resultSet = $this->db->get();
        return $resultSet->result();
    }
    public function selectSubCategoryBySubId($data) {
        $this->db->select('*');
        $this->db->from('tbl_product_sub_category');
        $this->db->where('sub_id', trim($data['sub_id']));
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SaveProductIntoGodown($data,$num) {
        for($i=0;$i<=($num-1); $i++) {
            $this->db->set('product_sl',$data['product_sl'][$i]);
            $this->db->set('product_name',$data['product_name'][$i]);
            $this->db->set('description',$data['description'][$i]);
            $this->db->set('buy_price',$data['buy_price'][$i]);
            $this->db->set('cover_price',$data['cover_price'][$i]);
            $this->db->set('warrenty',$data['warrenty'][$i]);
            $this->db->set('entry_by',$this->session->userdata('user_name'));
            $this->db->set('entry_date',$data['entry_date']);
            $this->db->set('sub_id',$data['sub_id']);
            $this->db->set('shop_id',$this->session->userdata('shop_id'));
            $this->db->insert('tbl_godown');
        }
    }
    public function SendProductIntoStock($data,$count) {
        for($i=0;$i<=($count-1);$i++) {
            $this->db->select('*');
            $this->db->from('tbl_godown');
            $this->db->where('godown_id',$data['godown_id'][$i]);
            $resultSet = $this->db->get();
            $result=$resultSet->row();
            if($result){
            $this->db->set('product_sl',$result->product_sl);
            $this->db->set('product_name',$result->product_name);
            $this->db->set('description',$result->description);
            $this->db->set('buy_price',$result->buy_price);
            $this->db->set('cover_price',$result->cover_price);
            $this->db->set('warrenty',$result->warrenty);
            $this->db->set('entry_by',$this->session->userdata('user_name'));
            $this->db->set('entry_date',$data['entry_date']);
            $this->db->set('sub_id',$result->sub_id);
            $this->db->set('shop_id',$this->session->userdata('shop_id'));
            $this->db->insert('tbl_stock');
            $this->db->where('product_sl',$result->product_sl);
            $this->db->where('sub_id',$result->sub_id);
            $this->db->where('shop_id',$this->session->userdata('shop_id'));
            $this->db->delete('tbl_godown');
            }
        }


    }
}
?>
