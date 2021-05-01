<?php
class formBuilder{
  public function __construct($action,$method='post',$name='form',$css_class='form-control'){
    echo '<form class="'.$css_class.'" action="'.$action.'" method="'.$method.'" id="'.$name.'">'."\n";
  }
 
  public function __destruct(){
    echo '</form>'."\n";
  }
 
 
   public function inputField($label="",$type,$name, $value='', $placeholder, $input_css_class=''){
  $form_input=$label.'<input type="'.$type.'" class="'.$input_css_class.'" name="'.$name.'" id="'.$name.'" value="'.$value.'" placeholder="'.$placeholder.'" />';
    echo $form_input;
  }
 
  public function textareaField($label="",$name,$value,$rows=3,$cols=20,$input_css_class='form-control'){
   
      $form_input=$label.'<textarea class="'.$input_css_class.'" rows="'.$rows.'" $cols="'.$cols.'" name="'.$name.'" id="'.$name.'">'.$value.'</textarea>';
      echo $form_input;
       
    }
 
    public function selectField($label,$name, array $value=array(),$default="",$input_css_class='form-control'){
    $r =$label.'<select  class="form-control" name="'.$name.'" id="'.$name.'">';
    if(is_array($value)){
      foreach($value as $k=>$v){
        if($k === $default)
         $r .= "<option value='$k' selected>$v</option>\n";
         else
         $r .= "<option value='$k'>$v</option>\n";
      }
    }
    $r .='</select>';
    echo $r;
  }
 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
 
 
    <fieldset>
 
      <!-- Form Name -->
      <legend align="center" style="background-color:#cccccc"><b>Information Form</b></legend>
 
     <?php
  $form=new formBuilder("process.php","post","form","well form-horizontal");
  ?>
      <div class="form-group">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <?php $form->inputField("","text","name","","Enter your Name","form-control");?>
          </div>
        </div>
      </div>
 
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label">E-Mail</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <?php $form->inputField("","email","email","","Enter your E-Mail","form-control");?>
          </div>
        </div>
      </div>
 
 <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label">Password</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
             <?php $form->inputField("","password","password","","******","form-control");?>
          </div>
        </div>
      </div>
     
        <!-- radio checks -->
      <div class="form-group">
        <label class="col-md-4 control-label">Gender</label>
        <div class="col-md-4">
          <div class="radio">
            <label>
                                     <?php echo $form->inputField("","radio","gender","Male","");?> Male
                                </label>
          </div>
          <div class="radio">
            <label>
                                     <?php echo $form->inputField("","radio","gender","Female","");?> Female
                                </label>
          </div>
        </div>
      </div>
 
 
      <div class="form-group">
        <label class="col-md-4 control-label">Address</label>
        <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
             <?php $form->textareaField("","address","","","");?>
          </div>
        </div>
      </div>
 
  
      <div class="form-group">
        <label class="col-md-4 control-label">Country</label>
        <div class="col-md-4 selectContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          <?php $form->selectField("","country",["Bangladesh","India","Pakistan","Nepal","Srilanka"]);?>
          </div>
        </div>
      </div>
 
      
       
      <!-- Button -->
      <br/>
      <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4 col-lg-offset-1">
         
           <?php $form->inputField("","submit","submit","Submit","","btn btn-warning");?>
           &nbsp;
<?php  $form->inputField("","reset","reset","Reset","","btn btn-success");?>
        </div>
        </div>
      </div>
 
    </fieldset>
  
</div>
</div>
<!-- /.container -->
</body>
</html>