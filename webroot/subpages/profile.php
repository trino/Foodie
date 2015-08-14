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
<div class="form-group" >
  <select>
    <option value="asap">ASAP</option>
    <?php
    date_default_timezone_set('US/Eastern');
      echo $date = date('M d H:m A');
      
    ?>
  </select>
</div>
<div class="form-group">
                        
</div>
<div style="<?php if(!isset($_GET['delivery']))echo "display:none" ;?>">
<div class="form-group">
 <div class="col-xs-12">
 <!--textarea required="" placeholder="Address 1" name="address1"></textarea-->			
  <input type="text" placeholder="Address 1" class="form-control  form-control--contact" name="address1" required="">
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