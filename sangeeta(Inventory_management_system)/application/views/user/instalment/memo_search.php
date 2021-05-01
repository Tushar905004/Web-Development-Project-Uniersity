<form action="<?php echo base_url(); ?>user/src_memo" method="post">

    <div style="margin-left: 344px; margin-top: 5px; height: 35px; padding-top: 12px; padding-left: 12px; background-color: #EDEDED; color: #000000; font-size: 17px; font-weight: bold; width: 310px;">
        Memo No:<input type="text" name="memo_id" required="1" size="22" onKeyUp="showUser(this.value)" value=""/>
        <input type="submit" value="search"/>
    </div>

</form>
<?php
if(isset($memo_id) and $memo_id>0){ ?>
<iframe src="<?php echo base_url(); ?>user/memo_search1/<?php echo $memo_id; ?>" height="788" style="float: left; margin: 9px 0px 12px 164px; border: 1px dotted red; width: 625px"></iframe>
    <?php
}
?>