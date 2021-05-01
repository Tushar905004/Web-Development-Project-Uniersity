<?php
if($this->session->userdata('memo_id')){
    ?>
<iframe src="<?php echo base_url(); ?>user/sell_product_iframe?memo_id=<?php echo $result; ?>" height="788" style="float: left; margin: 9px 0px 12px 164px; border: 1px dotted red; width: 625px"></iframe>
<?php
} ?>