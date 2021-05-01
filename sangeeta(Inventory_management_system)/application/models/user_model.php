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
            if($result) {
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
    //product in godown update//
    public function update_product_godown($data,$count) {
        $error=0;
        for($i=0;$i<$count;$i++) {
            $this->db->select('*');
            $this->db->from('tbl_godown');
            $this->db->where('product_sl',$data['product_sl'][$i]);
            $this->db->where('godown_id !=',trim($data['godown_id'][$i]));
            $this->db->where('sub_id',trim($data['sub_id'][$i]));
            $resultSet = $this->db->get();
if($resultSet->num_rows()<1) {
                $this->db->set('product_sl',$data['product_sl'][$i]);
                $this->db->set('product_name',$data['product_name'][$i]);
                $this->db->set('description',$data['description'][$i]);
                $this->db->set('buy_price',$data['buy_price'][$i]);
                $this->db->set('cover_price',$data['cover_price'][$i]);
                $this->db->set('warrenty',$data['warrenty'][$i]);
                $this->db->set('entry_by',$this->session->userdata('user_name'));
                $this->db->where('godown_id',$data['godown_id'][$i]);
                $this->db->update('tbl_godown');
            }else{
                $error++;
            }
        }//end of for
if($error>0) return FALSE;
else return TRUE;
    }//end of function
    public function delete_product_godown($data,$count) {
        for($i=0;$i<$count;$i++) {
            $this->db->where('godown_id',$data['godown_id'][$i]);
            $this->db->delete('tbl_godown');
        }
        return TRUE;
    }

    //product in stock update//
    public function update_product_stock($data,$count) {
    $error=0;
        for($i=0;$i<$count;$i++) {
            $this->db->select('*');
            $this->db->from('tbl_stock');
            $this->db->where('product_sl',$data['product_sl'][$i]);
            $this->db->where('stock_id !=',trim($data['stock_id'][$i]));
            $resultSet = $this->db->get();
            
            if($resultSet->num_rows()<1) {
                //continue;
                $this->db->set('product_sl',$data['product_sl'][$i]);
                $this->db->set('product_name',$data['product_name'][$i]);
                $this->db->set('description',$data['description'][$i]);
                $this->db->set('buy_price',$data['buy_price'][$i]);
                $this->db->set('cover_price',$data['cover_price'][$i]);
                $this->db->set('warrenty',$data['warrenty'][$i]);
                $this->db->set('entry_by',$this->session->userdata('user_name'));
                $this->db->where('stock_id',$data['stock_id'][$i]);
                $this->db->update('tbl_stock');
                //return TRUE;
            }else{
                $error++;
            }
        }//end of for
if($error>0) return FALSE;
else return TRUE;
    }//end of function
    public function delete_product_stock($data,$count) {
        for($i=0;$i<$count;$i++) {
            $this->db->where('stock_id',$data['stock_id'][$i]);
            $this->db->delete('tbl_stock');
        }
        return TRUE;
    }
    public function send_sell_tbl($data) {
        $error=0;
        $error1=0;
        if($data['cust_id_fixed']<1) { //if customer is not fixed then apply this condition
            $this->db->select('*');
            $this->db->from('tbl_customer_info');
            $this->db->where('reg_date',date("ymdhi"));
            $this->db->or_where('reg_date',date("ymdhi")-1);
            $results = $this->db->get();
            if($results->num_rows()<1) {
                $this->db->set('cus_name',$data['cus_name']);
                $this->db->set('address',$data['address']);
                $this->db->set('mob_no',$data['mob_no']);
                $this->db->set('reg_date',date("ymdhi"));
                $this->db->insert('tbl_customer_info');
                $data['cust_id']=$this->db->insert_id();
            }
            else {
                $error++;
                echo"<script type='text/javascript'>alert('Please do not refresh.');</script>";
            }
        }//end of if
        if($error=='0') { //there have no error
//check memo id
            $this->db->select('*');
            $this->db->from('tbl_memo');
            $this->db->where('cust_id',trim($data['cust_id']));
            $this->db->where('date',date("ymdhi"));
            $this->db->or_where('date',date("ymdhi")-1);
            $results = $this->db->get();
            if($results->num_rows()<1) {
            for($j=0;$j<count($data['product_sl']);$j++) {
            $this->db->select('*');
            $this->db->from('tbl_sell');
            $this->db->where('product_sl',trim($data['product_sl'][$j]));
            $this->db->where('sub_id',trim($data['sub_id'][$j]));
            $this->db->where('sell_date',trim($data['sell_date']));
            $result = $this->db->get();
            if($result->num_rows()>0){
            $error1++;
            break;
            }}
            if($error1<1){
                $this->db->set('cust_id',$data['cust_id']);
                $this->db->set('date',date("ymdhi"));
                $this->db->set('memo_date',date("d-m-Y"));
                $this->db->insert('tbl_memo');
                $memo_id=$this->db->insert_id();
                $sessionData=array();
                $sessionData['memo_id'] = $memo_id;
                $this->session->set_userdata($sessionData);
                //insert into tbl_sell
            for($i=0;$i<count($data['product_sl']);$i++) {
                    $this->db->set('product_sl',$data['product_sl'][$i]);
                    $this->db->set('product_name',$data['product_name'][$i]);
                    $this->db->set('description',$data['description'][$i]);
                    $this->db->set('warrenty',$data['warrenty'][$i]);
                    $this->db->set('buy_price',$data['buy_price'][$i]);
                    $this->db->set('cover_price',$data['cover_price'][$i]);
                    $this->db->set('sell_by',$this->session->userdata('user_name'));
                    $this->db->set('sell_date',$data['sell_date']);
                    $this->db->set('month',date("F"));
                    $this->db->set('year',date("Y"));
                    $this->db->set('sub_id',$data['sub_id'][$i]);
                    $this->db->set('shop_id',$this->session->userdata('shop_id'));
                    $this->db->set('cust_id',$data['cust_id']);
                    $this->db->set('memo_id',$memo_id);
                    $this->db->insert('tbl_sell');
            $this->db->where('stock_id',$data['stock_id'][$i]);
            $this->db->delete('tbl_stock');

            $this->db->where('stock_id',$data['stock_id'][$i]);
            $this->db->delete('tbl_tmp_cart');
			}
            $this->db->set('memo_id',$memo_id);
            $this->db->set('date',date('d-m-Y'));
            $this->db->set('instalment',$data['instalment']);
            $this->db->set('total_price',$this->session->userdata('total_price'));
            $this->db->set('paid',$this->session->userdata('pay'));
            $this->db->set('discount',$data['discount']);
            $this->db->set('cust_id',$data['cust_id']);
            $this->db->set('month',date("F"));
            $this->db->set('year',date("Y"));
            $this->db->set('sell_by',$this->session->userdata('user_name'));
            $this->db->insert('tbl_sell_history');
            }
            else{
                $error1++;
            echo"<script type='text/javascript'>alert('Duplicate Product Found.');</script>";
            }
            }
        }//end of error condition
else{
echo"<script type='text/javascript'>alert('Wait for 2 min.');</script>";
}
    }
    public function saveIntoSellHistory($data){
    $this->db->set('paid',$data['paid']);
    $this->db->set('date',date('d-m-Y'));
    $this->db->set('month',date("F"));
    $this->db->set('year',date("Y"));
    $this->db->set('instalment',$data['instalment']);
    $this->db->where('memo_id',$data['memo_id']);
    $this->db->update('tbl_sell_history');

    }

    //product sell quickly//
    public function quick_sell_tbl($data) {
        $error=0;
        $error1=0;
        if($data['cust_id_fixed']<1) { //if customer is not fixed then apply this condition
            $this->db->select('*');
            $this->db->from('tbl_customer_info');
            $this->db->where('reg_date',date("ymdhi"));
            $this->db->or_where('reg_date',date("ymdhi")-1);
            $results = $this->db->get();
            if($results->num_rows()<1) {
                $this->db->set('cus_name',$data['cus_name']);
                $this->db->set('address',$data['address']);
                $this->db->set('mob_no',$data['mob_no']);
                $this->db->set('reg_date',date("ymdhi"));
                $this->db->insert('tbl_customer_info');
                $data['cust_id']=$this->db->insert_id();
            }
            else {
                $error++;
                echo"<script type='text/javascript'>alert('Please do not refresh.');</script>";
            }
        }//end of if
        if($error=='0') { //there have no error
//check memo id
            $this->db->select('*');
            $this->db->from('tbl_memo');
            $this->db->where('cust_id',trim($data['cust_id']));
            $this->db->where('date',date("ymdhi"));
            $this->db->or_where('date',date("ymdhi")-1);
            $results = $this->db->get();
            if($results->num_rows()<1) {
            $this->db->select('*');
            $this->db->from('tbl_sell');
            $this->db->where('product_sl',trim($data['product_sl']));
            $this->db->where('sub_id',trim($data['sub_id']));
            $this->db->where('sell_date',trim($data['sell_date']));
            $result = $this->db->get();
            if($result->num_rows()>0){
            $error1++;
            }
            if($error1<1){
                $this->db->set('cust_id',$data['cust_id']);
                $this->db->set('date',date("ymdhi"));
                $this->db->set('memo_date',date("d-m-Y"));
                $this->db->insert('tbl_memo');
                $memo_id=$this->db->insert_id();
                $sessionData=array();
                $sessionData['memo_id'] = $memo_id;
                $this->session->set_userdata($sessionData);
                //insert into tbl_sell
                    $this->db->set('product_sl',$data['product_sl']);
                    $this->db->set('product_name',$data['product_name']);
                    $this->db->set('description',$data['description']);
                    $this->db->set('warrenty',$data['warrenty']);
                    $this->db->set('buy_price',$data['buy_price']);
                    $this->db->set('cover_price',$data['cover_price']);
                    $this->db->set('sell_by',$this->session->userdata('user_name'));
                    $this->db->set('sell_date',$data['sell_date']);
                    $this->db->set('month',date("F"));
                    $this->db->set('year',date("Y"));
                    $this->db->set('sub_id',$data['sub_id']);
                    $this->db->set('shop_id',$this->session->userdata('shop_id'));
                    $this->db->set('cust_id',$data['cust_id']);
                    $this->db->set('memo_id',$memo_id);
                    $this->db->insert('tbl_sell');
            $this->db->where('stock_id',$data['stock_id']);
            $this->db->delete('tbl_stock');

            $this->db->where('stock_id',$data['stock_id']);
            $this->db->delete('tbl_tmp_cart');

            $this->db->set('memo_id',$memo_id);
            $this->db->set('date',date('d-m-Y'));
            $this->db->set('instalment',$data['instalment']);
            $this->db->set('total_price',$this->session->userdata('total_price'));
            $this->db->set('paid',$this->session->userdata('pay'));
            $this->db->set('sell_by',$this->session->userdata('user_name'));
            $this->db->set('cust_id',$data['cust_id']);
            $this->db->set('discount',$data['discount']);
                    $this->db->set('month',date("F"));
                    $this->db->set('year',date("Y"));
            $this->db->insert('tbl_sell_history');
            }
            else{
                $error1++;
            echo"<script type='text/javascript'>alert('Duplicate Product Found.');</script>";
            }
            }
        }//end of error condition
else{
echo"<script type='text/javascript'>alert('Wait for 2 min.');</script>";
}
    }

//other income functions//
    public function SaveIncome($data) {
        $this->db->insert('tbl_income',$data);
    }
    public function searchIncomeByIncomeId($Income_id) {
        $this->db->select('*');
        $this->db->from('tbl_income');
        $this->db->where('Income_id', $Income_id);
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SaveUpdatedIncome($data) {
        $this->db->set('description',$data['description']);
        $this->db->set('amount',$data['amount']);
        $this->db->where('income_id',$data['income_id']);
        $this->db->update('tbl_income');
    }
    public function DeleteIncomeByIncomeId($Income_id) {
        $this->db->where('income_id',$Income_id);
        $this->db->delete('tbl_income');
    }
//other Expend functions//
    public function SaveExpend($data) {
        $this->db->insert('tbl_expend',$data);
    }
    public function searchExpendByExpendId($expend_id) {
        $this->db->select('*');
        $this->db->from('tbl_expend');
        $this->db->where('expend_id', $expend_id);
        $resultSet = $this->db->get();
        return $resultSet->row();
    }
    public function SaveUpdatedExpend($data) {
        $this->db->set('description',$data['description']);
        $this->db->set('amount',$data['amount']);
        $this->db->where('expend_id',$data['expend_id']);
        $this->db->update('tbl_expend');
    }
    public function DeleteExpendByExpendId($expend_id) {
        $this->db->where('expend_id',$expend_id);
        $this->db->delete('tbl_expend');
    }
    public function SelectFixedCustomer(){
        $this->db->select('*');
        $this->db->from('tbl_customer_info');
        $this->db->where('status','fixed');
        $this->db->order_by('cus_name','ASC');
        $resultSet = $this->db->get();
        return $resultSet->result();
    }
} //end of class
?>