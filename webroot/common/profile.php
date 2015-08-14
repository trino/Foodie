
<?php
date_default_timezone_set('America/Toronto');
//echo date('M t, h:i');

?>
<div class="form-group">
    <div class="col-xs-12">
        <h2>Delivery Detail</h2>
    </div>
</div>
<div class="form-group">
    <div class="col-xs-12">
    <input type="text" style="padding-top: 0;margin-top: 0;" placeholder="Name" class="form-control  form-control--contact" name="ordered_by" id="fullname" required="">
    </div>                        
  </div>
  <div class="form-group">
  <div class="col-xs-12 col-sm-6">
    <input type="email" placeholder="Email" class="form-control  form-control--contact" name="email" id="ordered_email" required="">                        
  </div>
  <div class="col-xs-12 col-sm-6">
    <input type="text" placeholder="Phone Number" class="form-control  form-control--contact" name="contact" id="ordered_contact" required="">
    </div>
    <div class="clearfix"></div>                        
  </div>
  <div class="form-group">
      <div class="col-xs-12 col-sm-6">
        <input type="text" placeholder="Date" class="form-control  form-control--contact hasDatepicker" name="ordered_on_date" id="ordered_on_date" required="">
        <select class="form-control  form-control--contact hasTimepicker" name="ordered_on_time" id="ordered_on_time" required="">
            <option>ASAP</option>
            <?php
            for($i=30;$i<570;$i=$i+30)
{
    
    echo "<option value='".date('M t, ', strtotime("+".($i-30)." minutes")). date('h:i', strtotime("+".($i-30)." minutes")) . ' - '. date('h:i', strtotime("+".$i." minutes"))."'>". date('M t, ', strtotime("+".($i-30)." minutes")). date('h:i', strtotime("+".($i-30)." minutes")) . ' - '. date('h:i', strtotime("+".$i." minutes"))."</option>";
    
    
}
    ?>        
        </select>
      </div>  

</div>
<div class="form-group">
<!--textarea placeholder="Address 2" name="address2"></textarea-->   
<div class="col-xs-12 col-sm-6">
<input type="text" placeholder="Address 2" class="form-control  form-control--contact" name="address2">
</div>                        



<div class="col-xs-12 col-sm-6">                        
    <input type="text" placeholder="City" class="form-control  form-control--contact" name="city" id="city" required="">                        
</div>
</div>
<div class="form-group">
<div class="col-xs-12 col-sm-6">
<select required="" class="form-control form-control--contact" name="province">
    <option value="Alberta">Alberta</option>
    <option value="British Columbia">British Columbia</option>
    <option value="Manitoba">Manitoba</option>
    <option value="New Brunswick">New Brunswick</option>
    <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
    <option value="Nova Scotia">Nova Scotia</option>
    <option selected="selected" value="Ontario">Ontario</option>
    <option value="Prince Edward Island">Prince Edward Island</option>
    <option value="Quebec">Quebec</option>
    <option value="Saskatchewan">Saskatchewan</option>
</select>
                        
</div>
<div class="col-xs-12 col-sm-6">
    <input type="text" placeholder="Postal Code" class="form-control  form-control--contact" name="postal_code" id="postal_code" required="">
</div>                        
<div class="clearfix"></div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<textarea placeholder="Additional Notes" name="remarks"></textarea>
</div> 
<div class="clearfix"></div>                       
</div>
<div class="form-group">
<div class="col-xs-12">
<a href="javascript:void(0)" class="btn btn-primary" onclick="checkout();">Checkout</a>
</div>
<div class="clearfix"></div>  
</div>