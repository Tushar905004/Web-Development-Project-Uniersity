<?php if($result){
        ?>
<form action="<?php echo base_url(); ?>user/ProductEntryCondition" method="post">
<select name="sub_id" required="1">
    <?php foreach($result as $row) { ?>
    <option value="<?php echo $row->sub_id; ?>"><?php echo $row->sub_category_name; ?></option>
    
        <?php } ?>
</select>
    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
<input type="submit" value="search"/>
</form>
<?php } ?>