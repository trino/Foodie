
<div class="col-md-12">
    <?php echo $this->element('user_menu');?>
    <div class="col-md-10">
    
        <div class="dashboard">
            <div class="content-page">
                <h1>Menu Manager</h1>
                <hr />
                <a href="javascript:void(0);" onclick="add_item();" class="btn btn-primary">Add New Menu Item</a>
                <div class="addnew" style="display: none;"></div>
                <hr />
                <ul class="parentinfo">
                
                    <li class="infolistwhite row marbot newmenu" id="parent4">
                        
                        <div class="col-md-4 menu_item">
                            
                            <div class="col-sm-4" style="padding: 0;">
                                <img class="itemimg4 itemimg" src="<?php echo $this->request->webroot;?>/img/products/k2.jpg"  />
                            </div>
                            <div class="col-sm-8">
                                <h4  class="itemtitle4" >Chow Fun</h4>
                            </div>
                            <div class="clearfix"></div>
                
                        </div>
                
                        <div class="col-md-8">
                        <a href="javascript:void(0)" id="edititem4" onclick="edit_item(4)" class="btn btn-success">Edit Item</a>
                        <a href="javascript:void(0)" id="addimgitem4" class="btn btn-info addimgcat">Add Image</a>
                        <a href="javascript:void(0)" id="deleteitem4" onclick="delete_item(4)" class="deletecat btn btn-danger">Delete</a>
                        <a href="javascript:void(0)" class="expandbtn expand1"><span class="expand"></span></a>
                        
                
                        <div style="clear: both;"></div>
                        </div>
                
                        <div class="clearfix"></div>
                         
                
                 </li>
                 
                 <li class="infolistwhite row marbot newmenu" id="parent3">
                        
                        <div class="col-md-4 menu_item">
                            
                            <div class="col-sm-4" style="padding: 0;">
                                <img class="itemimg3 itemimg" src="<?php echo $this->request->webroot;?>/img/products/k3.jpg"  />
                            </div>
                            <div class="col-sm-8">
                                <h4  class="itemtitle3" >Chow Fun</h4>
                            </div>
                            <div class="clearfix"></div>
                
                        </div>
                
                        <div class="col-md-8">
                        <a href="javascript:void(0)" id="edititem3" onclick="edit_item(3)" class="btn btn-success">Edit Item</a>
                        <a href="javascript:void(0)" id="addimgitem3" class="btn btn-info addimgcat">Add Image</a>
                        <a href="javascript:void(0)" id="deleteitem3" onclick="delete_item(3)" class="deletecat btn btn-danger">Delete</a>
                        <a href="javascript:void(0)" class="expandbtn expand1"><span class="expand"></span></a>
                        
                
                        <div style="clear: both;"></div>
                        </div>
                
                        <div class="clearfix"></div>
                         
                
                 </li>
                 
                 <li class="infolistwhite row marbot newmenu" id="parent2">
                        
                        <div class="col-md-4 menu_item">
                            
                            <div class="col-sm-4" style="padding: 0;">
                                <img class="itemimg2 itemimg" src="<?php echo $this->request->webroot;?>/img/products/k2.jpg"  />
                            </div>
                            <div class="col-sm-8">
                                <h4  class="itemtitle2" >Chow Fun</h4>
                            </div>
                            <div class="clearfix"></div>
                
                        </div>
                
                        <div class="col-md-8">
                        <a href="javascript:void(0)" id="edititem2" onclick="edit_item(2)" class="btn btn-success">Edit Item</a>
                        <a href="javascript:void(0)" id="addimgitem2" class="btn btn-info addimgcat">Add Image</a>
                        <a href="javascript:void(0)" id="deleteitem2" onclick="delete_item(2)" class="deletecat btn btn-danger">Delete</a>
                        <a href="javascript:void(0)" class="expandbtn expand1"><span class="expand"></span></a>
                        
                
                        <div style="clear: both;"></div>
                        </div>
                
                        <div class="clearfix"></div>
                         
                
                 </li>
                 
                 <li class="infolistwhite row marbot newmenu" id="parent1">
                        
                        <div class="col-md-4 menu_item">
                            
                            <div class="col-sm-4" style="padding: 0;">
                                <img class="itemimg1 itemimg" src="<?php echo $this->request->webroot;?>/img/products/k1.jpg"  />
                            </div>
                            <div class="col-sm-8">
                                <h4  class="itemtitle1" >Chow Fun</h4>
                            </div>
                            <div class="clearfix"></div>
                
                        </div>
                
                        <div class="col-md-8">
                        <a href="javascript:void(0)" id="edititem1" onclick="edit_item(1)" class="btn btn-success">Edit Item</a>
                        <a href="javascript:void(0)" id="addimgitem1" class="btn btn-info addimgcat">Add Image</a>
                        <a href="javascript:void(0)" id="deleteitem1" onclick="delete_item(1)" class="deletecat btn btn-danger">Delete</a>
                        <a href="javascript:void(0)" class="expandbtn expand1"><span class="expand"></span></a>
                        
                
                        <div style="clear: both;"></div>
                        </div>
                
                        <div class="clearfix"></div>
                         
                
                 </li>
                
                </ul>
            </div>
        
        
        </div>
        <div class="clearfix  hidden-xs"></div>
    
    
    </div>
</div>


<script>
function clear_all(cat_id)
{
$('#addopt'+cat_id+' .addopt').each(function(){
$(this).remove();
});
$('#addopt'+cat_id).hide();
$('.hasopt'+cat_id).val(0);
}
</script>