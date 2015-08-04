
    <!-- Big banner -->
    <div class="row " style="padding-top: 20px;">
        <div class="col-xs-12">
            <div class="">
                <!--div class="banners--big">
Welcome, test
</div-->
            </div>
        </div>
    </div>
  <div class="col-md-12">
    <?php echo $this->element('restaurant_menus');?>
    <div class="col-xs-10  col-sm-9">
      <div class="grid">
        
        
        <h3 class="sidebar__title">Restaurant Detail Manager</h3>
        <hr class="shop__divider">
        <div class="dashboard">
          
           <form action="" method="post">
           <div class="row">
                <div class="col-md-4 profilepic">
                <p>
                    
                    <strong>Restaurant Image</strong><br /><br />
                    <img id="picture" src="<?=$this->request->webroot."/images/default.png"; ?>" title="" style="width: 100%;"  /><br />
                    
                    <a href="javascript:void(0);" id="uploadbtn" class="btn btn-success">Change Image</a>
                </p>
                </div>
                <div class="col-md-4">
                <strong>Restaurant Info</strong><br /><br />
                <p class="inputs">
                
                    <input type="text" name="name" placeholder="Restaurant Name" title="Restaurant Name" value="Charlies" />
                    <input type="text" name="email" placeholder="Restaurant Email" title="Restaurant Email" value="test@test.com" />
                    <input type="text" name="street" placeholder="Street Address" title="Street Address" value="" />
                    <input type="text" name="city" placeholder="City" title="City" value="" />
                    <input type="text" name="prov_state" placeholder="State/Province" title="State/Province" value="" />
                    <input type="text" name="pos_zip" placeholder="Postal Code" title="Postal Code" value="" />
                    <input type="text" name="phone" placeholder="Phone" title="Phone" value="" />
                    
                    
                </p>
                </div>
                <div class="col-md-4">
                <p class="inputs">
                <strong>&nbsp;</strong><br /><br />
                    <!--input type="text" name="cuisine" placeholder="Cuisine" value="<?php echo $res['Restaurant']['cuisine'];?>" /-->
                    <textarea name="description" placeholder="Description" title="Description"></textarea>
                </p>
                
                </div>
                <div class="clearfix"></div>
            
                </div>
                
                <hr class="divider" />
                
                <div class="row">
		
					
				<div class="col-xs-12 col-sm-12"><h5 class="sidebar__subtitle" style="width: 100%;">Hours of Operation</h5></div>
                <div class="clearfix"></div>	
                <div class="col-xs-12 col-sm-6 opening">
                
                     
            
                    <table class="table days">
                        <tr><td>Sunday</td><td><input value="" type="text" class="timepicker" name="sunday_from" placeholder="From" style="width: 48%;" />  <input value="" style="width: 48%;" type="text" class="timepicker" name="sunday_to" placeholder="To" /></td></tr>
                        <tr><td>Monday</td><td><input value="" type="text" class="timepicker" name="monday_from" placeholder="From" style="width: 48%;" />  <input value="" style="width: 48%;" type="text" class="timepicker" name="monday_to" placeholder="To" /></tr>
                        <tr><td>Tuesday</td><td><input value="" type="text" class="timepicker" name="tuesday_from" placeholder="From" style="width: 48%;" />  <input value="" style="width: 48%;" type="text" class="timepicker" name="tuesday_to" placeholder="To" /></td></tr>
                        <tr><td>Wednesday</td><td><input value="" type="text" class="timepicker" name="wednesday_from" placeholder="From" style="width: 48%;" />  <input value="" style="width: 48%;" type="text" class="timepicker" name="wednesday_to" placeholder="To" /></td></tr>
                    </table>
                
                </div>
                <div class="col-xs-12 col-sm-6 opening">
                
                    
                    <table class="table days">
                        <tr><td>Thursday</td><td><input value="" type="text" class="timepicker" name="thursday_from" placeholder="From" style="width: 48%;" />  <input value="" style="width: 48%;" type="text" class="timepicker" name="thursday_to" placeholder="To" /></td></tr>
                        <tr><td>Friday</td><td><input value="" type="text" class="timepicker" name="friday_from" placeholder="From" style="width: 48%;" />  <input value="" style="width: 48%;" type="text" class="timepicker" name="friday_to" placeholder="To" /></td></tr>
                        <tr><td>Saturday</td><td><input value="" type="text" class="timepicker" name="saturday_from" placeholder="From" style="width: 48%;" />  <input value="" style="width: 48%;" type="text" class="timepicker" name="saturday_to" placeholder="To" /></td></tr>
                    </table>
                
                </div>
                
                
                </div>
                <div class="divider"></div>
                    <div class="inputs col-xs-12 col-sm-6 opening">
                     <h5 class="sidebar__subtitle">Delivery Fee</h5>
                        <input type="text" name="delivery_fee" value="" placeholder="Delivery Fee" />
                    </div>
                    <div class="inputs col-xs-12 col-sm-6 opening">
                     <h5 class="sidebar__subtitle">Minimum sub total for delivery</h5>
                        <input type="text" name="min_delivery" value="" placeholder="Delivery Fee" />
                    </div>
                    
                    
                    <div class="clearfix"></div>
                <hr class="shop__divider"/>
                <input type="submit" class="btn btn-primary" value="Save Changes" />
            </form>
            
            
              
        </div>
            
          
          <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
        <?php /*<div class="shop__pagination">
          <ul class="pagination">
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
            <li><a href="#">1</a></li>
            <li><a class="active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
          </ul>
        </div><?php */?>
      </div>
    </div>

